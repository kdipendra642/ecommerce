<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutController extends Controller
{
    public function GetDistrict($division_id)
    {
        $ship_district = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($ship_district);
    }

    public function GetState($district_id)
    {
        $ship_state = ShipState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
        return json_encode($ship_state);
    }

    public function StoreCheckout(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['postal_code'] = $request->postal_code;
        $data['division_id'] = $request->division_id;
        $data['description'] = $request->description;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;

        $cart_total = Cart::total();

        if ($request->payment_method == 'stripe') {
            return view('frontend.payment.stripe', compact('data', 'cart_total'));
        } else if ($request->payment_method == 'card') {
            dd('card');
        } else if ($request->payment_method == 'cash') {
            return view('frontend.payment.cash', compact('data', 'cart_total'));
        } else {
            dd('Please select any payment method.');
        }
    }
}
