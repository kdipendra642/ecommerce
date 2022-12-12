@extends('frontend.main_master')
@section('content')
@section('title')
Checkout Form
@endsection

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="home.html">Home</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <form class="register-form" action="{{ route('checkout.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- checkout-step-01  -->
                            <div class="panel panel-default checkout-step-01">
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <!-- panel-body  -->
                                    <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <h4 class="checkout-subtitle"><b>Perosnal Information</b> </h4>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Shipping Name
                                                        <span>*</span></label>
                                                    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="shipping_name" required="required" placeholder="Full Name" value="{{ Auth::user()->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Shipping Email
                                                        <span>*</span></label>
                                                    <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="shipping_email" required="required" placeholder="Full Email Address" value="{{ Auth::user()->email }}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Phone
                                                        <span>*</span></label>
                                                    <input type="tel" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="shipping_phone" required="required" placeholder="Contact Number">
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Postal Code
                                                    </label>
                                                    <input type="text" class="form-control unicase-form-control text-input" id="exampleInputEmail1" name="postal_code" placeholder="Postal Code">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 already-registered-login">
                                                <h4 class="checkout-subtitle"><b>Shipping Information</b> </h4>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Select Division</label>
                                                    <select class="form-control m-bot15" name="division_id">
                                                        <option value="0">--Please choose division--</option>
                                                        @foreach($divisions as $division)
                                                        <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Select District</label>
                                                    <select class="form-control m-bot15" name="district_id">
                                                        <option value="0">--Please choose district--</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Select State</label>
                                                    <select class="form-control m-bot15" name="state_id">
                                                        <option value="0">--Please choose state--</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="info-title" for="exampleInputEmail1">Message
                                                    </label>
                                                    <textarea name="description" id="" cols="30" rows="4" class="form-control" placeholder="Message..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- panel-body  -->
                                </div><!-- row -->
                            </div>
                            <!-- checkout-step-01  -->
                        </div><!-- /.checkout-steps -->
                    </div>
                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Your Checkout Progress</h4>
                                    </div>
                                    <div class="">
                                        <ul class="nav nav-checkout-progress list-unstyled">
                                            @foreach($carts as $item)
                                            <li>
                                                <strong>Image:</strong>
                                                <img src="{{asset($item->options->image)}}" alt="" style="width: 100px; height: 100px;">
                                            </li>
                                            <li>
                                                <strong>Name:</strong>
                                                {{$item->name}}
                                                <br>
                                                <strong>Qty: </strong>
                                                ({{$item->qty}})
                                                <br>
                                                @if($item->options->color != '--Choose color--')
                                                <strong>Color: </strong>
                                                ({{$item->options->color}})
                                                <br>
                                                @endif
                                                @if($item->options->size != '--Choose Size--')
                                                <strong>Size: </strong>
                                                ({{$item->options->size}})
                                                <br>
                                                @endif
                                            </li>
                                            <hr>
                                            @endforeach
                                            <li>
                                                <strong>Subtotal: </strong> Rs {{$cart_total}}
                                                <br>
                                                <hr>
                                                @if(Session::has('coupon'))
                                                <strong>Coupon: </strong> {{ session()->get('coupon')['coupon_name'] }} ({{session()->get('coupon')['coupon_discount']}} %)
                                                <br>
                                                <hr>
                                                <strong>Grand Total: </strong> </strong><span class="text-success" style="font-weight: bold;">Rs {{ session()->get('coupon')['total_amount'] }}</span>
                                                <br>
                                                @else
                                                <strong>Grand Total: </strong><span class="text-success" style="font-weight: bold;">Rs {{$cart_total}}</span>
                                                @endif
                                            </li>
                                            <hr>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                    </div>

                    <div class="col-md-4">
                        <!-- checkout-progress-sidebar -->
                        <div class="checkout-progress-sidebar ">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="radio" name="payment_method" value="stripe">
                                            <label for="">Stripe</label>
                                            <img src="{{ asset('frontend/assets/images/payments/4.png') }}" alt="">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" name="payment_method" value="card">
                                            <label for="">Card</label>
                                            <img src="{{ asset('frontend/assets/images/payments/3.png') }}" alt="">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" name="payment_method" value="cash">
                                            <label for="">Cash</label>
                                            <img src="{{ asset('frontend/assets/images/payments/2.png') }}" alt="">
                                        </div>
                                    </div>
                                    <hr>
                                    <button type="submit" class="btn btn-upper btn-primary checkout-page-button">Payment Step</button>
                                </div>
                            </div>
                        </div>
                        <!-- checkout-progress-sidebar -->
                    </div>
                </div><!-- /.row -->
            </form>

        </div><!-- /.checkout-box -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brand')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->



<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function() {
            var division_id = $(this).val();
            if (division_id) {
                $.ajax({
                    url: "{{ url('/district-get/ajax') }}/" + division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="state_id"]').empty();
                        var d = $('select[name="district_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                        })
                    }
                })
            }
        });

        $('select[name="district_id"]').on('change', function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "{{ url('/state-get/ajax') }}/" + district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="state_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state_id"]').append('<option value="' + value.id + '">' + value.state_name + '</option>');
                        })
                    }
                })
            }
        });
    });
</script>

@endsection