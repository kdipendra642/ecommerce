@extends('frontend.main_master')
@section('content')
<div class="body-content">
    <div class="container">
        <div class="sign-in-page">
            <div class="row">
                <!-- create a new account -->
                <div class="col-md-12 col-sm-12 create-new-account">
                    <h4 class="checkout-subtitle">Create a new account</h4>
                    <p class="text title-tag-line">Create your new account.</p>

                    <form class="register-form outer-top-xs" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                            <input class="form-control unicase-form-control text-input" id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                            <input class="form-control unicase-form-control text-input" id="email" type="email" name="email" :value="old('email')" required>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Password <span>*</span></label>
                            <input type="password" class="form-control unicase-form-control text-input" id="password" name="password" required autocomplete="new-password">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail1">Confirm Password
                                <span>*</span></label>
                            <input class="form-control unicase-form-control text-input" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Sign
                            Up</button>
                    </form>



                </div>
                <!-- create a new account -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brand')
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div>
@endsection