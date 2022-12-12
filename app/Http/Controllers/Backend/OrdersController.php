<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Auth;
use Carbon\Carbon;
use PDF;
use DB;



class OrdersController extends Controller
{
    public function PendingOrders()
    {
        $pending_orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders', compact('pending_orders'));
    }


    public function PendingOrderDetails($order_id)
    {
        $pending_order = Order::with('user', 'division', 'district', 'state')->where('id', $order_id)->first();
        $pending_order_items = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_order_details', compact('pending_order', 'pending_order_items'));
    }

    public function ConfirmOrders()
    {
        $confirm_orders = Order::where('status', 'confirm')->orderBy('id', 'DESC')->get();
        return view('backend.orders.confirm_orders', compact('confirm_orders'));
    }

    public function ProcessingOrders()
    {
        $processing_order = Order::where('status', 'processing')->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_order', compact('processing_order'));
    }

    public function PickedOrders()
    {
        $picked_order = Order::where('status', 'picked')->orderBy('id', 'DESC')->get();
        return view('backend.orders.picked_order', compact('picked_order'));
    }

    public function ShippedOrders()
    {
        $shipped_order = Order::where('status', 'shipped')->orderBy('id', 'DESC')->get();
        return view('backend.orders.shipped_order', compact('shipped_order'));
    }

    public function DeliveredOrders()
    {
        $delivered_order = Order::where('status', 'delivered')->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_order', compact('delivered_order'));
    }

    public function CancelledOrders()
    {
        $cancelled_orders = Order::where('status', 'cancelled')->orderBy('id', 'DESC')->get();
        return view('backend.orders.cancelled_orders', compact('cancelled_orders'));
    }

    public function ConfirmOrder($id)
    {
        Order::findorFail($id)->update([
            'status' => 'Confirm',
            'confirmation_date' => Carbon::now()->format('d F Y')
        ]);

        $notification = array(
            'message' => 'Your order confirmed successfully.',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }
    public function ProcessOrder($id)
    {
        Order::findorFail($id)->update([
            'status' => 'Processing',
            'processing_date' => Carbon::now()->format('d F Y')
        ]);

        $notification = array(
            'message' => 'This order is processing successfully.',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function OrderPicked($id)
    {
        Order::findorFail($id)->update([
            'status' => 'Picked',
            'picked_date' => Carbon::now()->format('d F Y')
        ]);

        $notification = array(
            'message' => 'This order is picked safely.',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function OrderShipped($id)
    {
        Order::findorFail($id)->update([
            'status' => 'Shipped',
            'shipped_date' => Carbon::now()->format('d F Y')
        ]);

        $notification = array(
            'message' => 'This order is shipped successfully.',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function OrderDelivered($id)
    {
        Order::findorFail($id)->update([
            'status' => 'Delivered',
            'delivered_date' => Carbon::now()->format('d F Y')
        ]);

        $product = OrderItem::where('order_id', $id)->get();

        foreach ($product as $item) {
            Product::where('id', $item->id)->update([
                'product_qty' => DB::raw('product_qty-' . $item->qty),
            ]);
        }

        $notification = array(
            'message' => 'This order is delivered successfully.',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function OrderCancelled($id)
    {
        Order::findorFail($id)->update([
            'status' => 'Cancelled',
            'cancel_date' => Carbon::now()->format('d F Y')
        ]);

        $notification = array(
            'message' => 'This order is cancelled successfully.',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);
    }

    public function InvoiceDownload($id)
    {
        $order = Order::with('user', 'division', 'district', 'state')->where('id', $id)->first();
        $order_items = OrderItem::with('product')->where('order_id', $id)->orderBy('id', 'DESC')->get();

        $pdf = PDF::loadView('frontend.user.order.order_invoice', compact('order', 'order_items'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('order_invoice.pdf');
    }
}
