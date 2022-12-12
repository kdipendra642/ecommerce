@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-12 col-sm-12 sign-in text-center">
                    <h4 class="">Forgot Password</h4>
                    <p class="">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input class="form-control unicase-form-control text-input" id="email" type="email" name="email" :value="old('email')" required autofocus>
                        </div>

                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
                    </form>


                </div>
                <!-- Sign-in -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brand')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div>


@endsection