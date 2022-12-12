<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;

class OrderReturnController extends Controller
{
    public function ReturnOrders()
    {
        $orders = Order::where('return_order', 1)->orderBy('id', 'DESC')->get();
        return view('backend.order_return.return_request', compact('orders'));
    }

    public function ApproveReturn($id)
    {
        Order::where('id', $id)->update([
            'return_order' => 2,
            'cancel_date' => Carbon::now()->format('d F Y'),
        ]);

        $notification = array(
            'message' => 'Return request approved successfully.',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function AllReturns()
    {
        $orders = Order::where('return_order', 2)->orderBy('id', 'DESC')->get();
        return view('backend.order_return.all_returns', compact('orders'));
    }
}
