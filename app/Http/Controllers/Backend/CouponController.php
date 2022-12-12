<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function ViewCoupons()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('backend.coupon.coupon_view', compact('coupons'));
    }

    public function AddCoupon()
    {
        return view('backend.coupon.coupon_create');
    }

    public function CouponStore(Request $request)
    {
        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Coupon inserted successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('manage-coupons')->with($notification);
    }

    public function EditCoupon($id)
    {
        $coupon = Coupon::find($id);

        return view('backend.coupon.edit', compact('coupon'));
    }

    public function DeleteCoupon($id)
    {
        Coupon::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Coupon Deleted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function UpdateCoupon(Request $request, $id)
    {
        Coupon::findOrFail($id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
        ]);

        $notification = array(
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('manage-coupons')->with($notification);
    }
}
