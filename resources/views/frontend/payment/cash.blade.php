@extends('frontend.main_master')
@section('content')
@section('title')
Cash On Delivery
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

            <div class="row">
                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Your Shopping Amount</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
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
                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Select Payment Method</h4>
                                </div>
                                <form action="{{ route('cash.order') }}" method="post" id="payment-form">
                                    @csrf
                                    <div class="form-row">
                                        <img src="{{ asset('frontend/assets/images/payments/2.png') }}" alt="Cash on delivery" style="width: 50%; height: 50%;">
                                        <label for="card-element">
                                            Credit or debit card
                                            <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                            <input type="hidden" name="shipping_email" value="{{ $data['shipping_email'] }}">
                                            <input type="hidden" name="shipping_phone" value="{{ $data['shipping_phone'] }}">
                                            <input type="hidden" name="postal_code" value="{{ $data['postal_code'] }}">
                                            <input type="hidden" name="division_id" value="{{ $data['division_id'] }}">
                                            <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                            <input type="hidden" name="state_id" value="{{ $data['state_id'] }}">
                                            <input type="hidden" name="description" value="{{ $data['description'] }}">
                                        </label>

                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                    <br>
                                    <button class="btn btn-primary">Submit Payment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brand')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->




<!-- /////////////////////////----------Start JavaScript ------- ///////////////////////////// -->
<script type="text/javascript">
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51LtwnvHOu0lCc0Fu184aQT6kJEH8QKTc17fwjRNUQ5vwqsJUujrb6oNlnGHXCVyMVWPC3xl71EIxhTXJNQy7viEY00CZAgLXmf');
    // Create an instance of Elements.
    var elements = stripe.elements();
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });
    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');
    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                // Inform the user if there was an error.
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                // Send the token to your server.
                stripeTokenHandler(result.token);
            }
        });
    });
    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
        // Submit the form
        form.submit();
    }
</script>

<!-- /////////////////////////----------End JavaScript ------- ///////////////////////////// -->

@endsection