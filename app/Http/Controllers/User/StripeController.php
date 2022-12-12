<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use App\Mail\OrderMail;


class StripeController extends Controller
{
    public function StripeOrder(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }
        \Stripe\Stripe::setApiKey('sk_test_51LtwnvHOu0lCc0FudPMqRP7z5nWJlqaLJkifcUqB5UwkqIRDLLwY1AIqS8IepXCcJhiP6bF0KRWAHShRWvzxW4iH00M2jbEvzF');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $total_amount * 100,
            'currency' => 'usd',
            'description' => 'My First Ecommerce Store',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        // dd($request->name);
        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->shipping_email,
            'phone' => $request->shipping_phone,
            'postal_code' => $request->postal_code,
            'description' => $request->description,
            'payment_type' => 'Stripe',
            'payment_method' => $charge->payment_method,
            'transaction_id' => $charge->balance_transaction,
            'currency' => $charge->currency,
            'amount' => $total_amount,
            'order_number' => $charge->metadata->order_id,
            'invoice_number' => 'DIP' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'Pending',
            'created_at' => Carbon::now(),
        ]);

        // send email code
        $invoice = Order::findOrFail($order_id);

        $data = [
            'invoice_number' => $invoice->invoice_number,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->shipping_email,
        ];

        Mail::to($request->shipping_email)->send(new OrderMail($data));


        // end send email code

        $carts = Cart::content();
        foreach ($carts as $item) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $item->id,
                'color' => $item->options->color,
                'size' => $item->options->size,
                'qty' => $item->qty,
                'price' => $item->price,
                'created_at' => Carbon::now(),
            ]);
        }

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Your order placed successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('user.dashboard')->with($notification);
    }
}
