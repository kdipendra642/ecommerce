@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Pending Orders List
                    <!-- <a href="#" class="btn btn-success btn-rounded btn-sm" style="float:right;">Add Coupons</a> -->
                </header>
                <div class="panel-body">
                </div>
            </section>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Orders List
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Invoice</th>
                                    <th>Amount</th>
                                    <th>Payment</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($processing_order as $item)
                                <tr>
                                    <td>{{$item->order_date}}</td>
                                    <td>{{$item->invoice_number}}</td>
                                    <td>{{$item->amount}}</td>
                                    <td>{{$item->payment_type}}</td>
                                    <td>
                                        <span class="badge bg-primary">
                                            {{$item->status}}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="{{ route('pending.orders.details', $item->id) }}" class="btn btn-info  btn-xs btn-round" title="View this order" style="margin-left: 5px;"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{ route('invoice.download', $item->id) }}" target="_blank" class="btn btn-danger btn-xs btn-round" title="Download invoice" id="download" style="margin-left: 5px;"><i class="fa fa-download"></i> Download</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>



@endsection