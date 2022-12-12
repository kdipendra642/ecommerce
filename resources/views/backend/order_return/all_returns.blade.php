@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    All Returns List
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
                    Return List
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
                                    <th>Return Date</th>
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
                                        @if($item->return_order == 1)
                                        <span class="badge bg-primary">
                                            Pending
                                        </span>
                                        @elseif($item->return_order == 2)
                                        <span class="badge bg-success">
                                            Success
                                        </span>
                                        <span class="badge bg-success"> Return Success</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$item->cancel_date}}
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