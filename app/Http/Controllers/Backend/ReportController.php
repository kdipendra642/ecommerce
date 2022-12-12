<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;
use App\Models\OrderItem;

class ReportController extends Controller
{
    public function AllReports()
    {
        return view('backend.report.report_view');
    }

    public function SearchByDate(Request $request)
    {
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');

        $orders = Order::where('order_date', $formatDate)->where('status', 'Delivered')->get();
        return view('backend.report.report_date', compact('orders'));
    }

    public function SearchByMonth(Request $request)
    {
        $orders = Order::where('order_month', $request->order_month)->where('order_year', $request->order_year)->where('status', 'Delivered')->get();
        return view('backend.report.report_date', compact('orders'));
    }

    public function SearchByYear(Request $request)
    {
        $orders = Order::where('order_year', $request->order_year)->where('status', 'Delivered')->get();
        return view('backend.report.report_date', compact('orders'));
    }
}
