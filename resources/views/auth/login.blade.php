@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-12 col-sm-12 sign-in">
                    <h4 class="">Sign in</h4>
                    <div class="social-sign-in outer-top-xs">
                        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with
                            Facebook</a>
                        <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                    </div>

                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
                            <input class="form-control unicase-form-control text-input" id="email" type="email" name="email" :value="old('email')" required autofocus>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputPassword1">Password <span>*</span></label>
                            <input class="form-control unicase-form-control text-input" id="password" type="password" name="password" required autocomplete="current-password">
                        </div>
                        <div class="radio outer-xs">
                            <label>
                                <input type="radio" id="remember_me" name="remember">Remember me!
                            </label>
                            <br>
                            <br>
                            @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="forgot-password ">Forgot your Password?</a>
                            @endif
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
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