@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Coupons List
                    <a href="{{ route('manage-coupons') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">
                        << Back</a>
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
                    Update Coupon
                </header>
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="{{ route('coupon.update', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Coupon Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="coupon_name" class="form-control" required="" value="{{$coupon->coupon_name}}" data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Coupon Discount</label>
                            <div class="col-sm-10">
                                <input type="text" name="coupon_discount" class="form-control" required="" value="{{$coupon->coupon_discount}}" data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Coupon Expiry Date</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-inline input-medium default-date-picker" value="{{$coupon->coupon_validity}}" size="16" type="date" min="{{Carbon\Carbon::now()->format('Y-m-d')}}" name="coupon_validity" required="" data-validation-required-message="This field is required">
                                <span class="help-block">Select date</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>

@endsection