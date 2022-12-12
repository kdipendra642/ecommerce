@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Coupons List
                    <a href="{{ route('coupon.create') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">Add Coupons</a>
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
                    Coupons List
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                            <thead>
                                <tr>
                                    <th>Coupon Name</th>
                                    <th>Coupon Discount</th>
                                    <th>Expiry Date</th>
                                    <th>Validity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($coupons as $item)
                                <tr>
                                    <td>{{$item->coupon_name}}</td>
                                    <td>{{$item->coupon_discount}}%</td>
                                    <td>
                                        {{Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y')}}
                                    </td>
                                    <td>@if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                        <button class="btn btn-round btn-success btn-xs" title="Valid">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        @else
                                        <button class="btn btn-round btn-danger btn-xs" title="Invalid">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="{{ route('coupon.edit', $item->id) }}" class="btn btn-info  btn-xs btn-round" title="Edit this coupon" style="margin-left: 5px;"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('coupon.delete', $item->id) }}" class="btn btn-danger btn-xs btn-round" title="Delete this coupon" id="delete" style="margin-left: 5px;"><i class="fa fa-trash-o"></i> Delete</a>
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