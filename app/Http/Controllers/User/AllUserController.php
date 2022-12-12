<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Auth;
use PDF;
use Carbon\Carbon;

class AllUserController extends Controller
{
    public function MyOrders()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.order_view', compact('orders'));
    }

    public function OrderDetails($id)
    {
        $order = Order::with('user', 'division', 'district', 'state')->where('id', $id)->where('user_id', Auth::id())->first();
        $order_items = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.order_items', compact('order', 'order_items'));
    }

    public function DownloadInvoice($id)
    {
        $order = Order::with('user', 'division', 'district', 'state')->where('id', $id)->where('user_id', Auth::id())->first();
        $order_items = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();

        $pdf = PDF::loadView('frontend.user.order.order_invoice', compact('order', 'order_items'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('order_invoice.pdf');
    }

    public function ReturnOrder(Request $request)
    {
        $order_id = $request->order_id;
        $return_description = $request->return_description;

        Order::findorFail($order_id)->update([
            'status' => 'Cancelled',
            'return_description' => $return_description,
            'return_date' => Carbon::now()->format('d F Y'),
            // 'cancel_date' => Carbon::now()->format('d F Y'),
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Return request send successfully.',
            'alert-type' => 'success',
        );

        return redirect()->route('my.orders')->with($notification);
    }

    public function ReturnOrders()
    {
        $orders = Order::where('user_id', Auth::id())->where('return_description', '!=', NULL)->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.return_orders', compact('orders'));
    }

    public function CancelOrders()
    {
        $orders = Order::where('user_id', Auth::id())->where('status', 'Cancelled')->orderBy('id', 'DESC')->get();
        return view('frontend.user.order.cancel_orders', compact('orders'));
    }

    public function OrderTracking(Request $request)
    {
        $track = Order::where('user_id', Auth::id())->where('invoice_number', $request->invoice_number)->first();

        if ($track) {
            return view('frontend.tracking.track_order', compact('track'));
        } else {
            $notification = array(
                'message' => 'Invalid invoice number',
                'alert-type' => 'success',
            );

            return redirect()->route('my.orders')->with($notification);
        }
    }
}
