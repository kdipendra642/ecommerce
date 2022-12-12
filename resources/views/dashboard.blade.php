@extends('frontend.main_master')
@section('content')
<div class="body-content" style="margin-top: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('frontend.body.sidebar')
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <h3 class="text-center">Hi <strong>{{ Auth::user()->name }}</strong> Welcome to Ecommerce Online Shop</h3>
                </div>


            </div>

        </div>
    </div>
</div>

@endsection