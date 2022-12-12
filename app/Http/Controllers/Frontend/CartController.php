<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShipDivision;
use App\Models\Wishlist;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        // if there is session forget previous data and load new one
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL || $product->discount_price == 0) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ]
            ]);
            return response()->json(['success' => 'Successfully added to your cart']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price - $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size,
                    'color' => $request->color,
                ]
            ]);
            return response()->json(['success' => 'Successfully added to your cart']);
        }
    }

    public function MiniCart()
    {
        $carts = Cart::content();
        $cart_qty = Cart::count();
        $cart_total = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cart_qty' => $cart_qty,
            'cart_total' => round($cart_total),
        ));
    }

    public function RemoveMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product removed from your cart']);
    }

    public function AddToWishlist(Request $request, $product_id)
    {
        if (Auth::check()) {
            $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $product_id)->first();

            if (!$exists) {
                Wishlist::insert([
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                    'created_at' => Carbon::now(),
                ]);
                return response()->json(['success' => 'Added to wishlist.']);
            } else {
                return response()->json(['error' => 'Already on wishlist.']);
            }
        } else {
            return response()->json(['error' => 'Please login to add product to wishlist.']);
        }
    }

    public function ApplyCoupon(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_code)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        $disc_amount = round(Cart::total() * $coupon->coupon_discount / 100);
        $total = round(Cart::total() - $disc_amount);
        if ($coupon) {
            Session::put('coupon', [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => $disc_amount,
                'total_amount' => $total,
            ]);

            return response()->json(array(
                'success' => 'Coupon Applied Successfully'
            ));
        } else {
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }

    public function CouponCalculator()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    }

    public function CouponRemove()
    {
        Session::forget('coupon');
        return response()->json(array('success' => 'Coupon removed successfully'));
    }

    public function CheckoutCreate()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {

                $carts = Cart::content();
                $cart_qty = Cart::count();
                $cart_total = Cart::total();

                $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();

                return view('frontend.checkout.checkout_view', compact('carts', 'cart_qty', 'cart_total', 'divisions'));
            } else {
                $notification = array(
                    'message' => 'Please buy something.',
                    'alert-type' => 'error'
                );

                return redirect()->to('/')->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Please login to continue checkout process.',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notification);
        }
    }
}
