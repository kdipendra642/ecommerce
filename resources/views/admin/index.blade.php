@extends('admin.admin_master')
@section('admin')

@php
$date = date('d-m-y');
$daily_sale = App\Models\Order::where('order_date', $date)->sum('amount');

$month = date('F');
$monthly_sale = App\Models\Order::where('order_month', $month)->sum('amount');

$year = date('Y');
$yearly_sale = App\Models\Order::where('order_year', $year)->sum('amount');

$pending_orders = App\Models\Order::where('status', 'pending')->get();

@endphp

<!-- Main content -->
<!--main content start-->
<section class="wrapper">
    <!--state overview start-->
    <div class="row state-overview">
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol terques">
                    <i class="fa fa-money"></i>
                </div>
                <div class="value">
                    <h3 class="count" style="color: #c6cad6">
                        Rs {{$daily_sale}}
                    </h3>
                    <p>Today's Sale</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol red">
                    <i class="fa fa-tags"></i>
                </div>
                <div class="value">
                    <h3 class=" count2" style="color: #c6cad6">
                        Rs {{$monthly_sale}}
                    </h3>
                    <p>Monthly Sale</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol yellow">
                    <i class="fa fa-money"></i>
                </div>
                <div class="value">
                    <h3 class=" count3" style="color: #c6cad6">
                        Rs {{$yearly_sale}}
                    </h3>
                    <p>Yearly Sales</p>
                </div>
            </section>
        </div>
        <div class="col-lg-3 col-sm-6">
            <section class="panel">
                <div class="symbol blue">
                    <i class="fa fa-bar-chart-o"></i>
                </div>
                <div class="value">
                    <h3 class=" count4" style="color: #c6cad6">
                        {{count($pending_orders)}}
                    </h3>
                    <p>Pending Orders</p>
                </div>
            </section>
        </div>
    </div>
    <!--state overview end-->

    <div class="row">
        <div class="col-lg-12">
            <!--work progress start-->
            <section class="panel">
                <div class="panel-body progress-panel">
                    <div class="task-progress">
                        <h1>All Pending Orders</h1>
                    </div>
                    @php
                    $orders = App\Models\Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
                    @endphp
                </div>
                <table class="table table-hover personal-task">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $item)
                        <tr>
                            <td>{{$item->order_date}}</td>
                            <td>{{$item->invoice_number}}</td>
                            <td>{{$item->amount}}</td>
                            <td>{{$item->payment_type}}</td>
                            <td>
                                <span class="badge bg-primary ">
                                    {{$item->status}}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
            <!--work progress end-->
        </div>
    </div>
</section>
<!-- /.content -->
@endsection