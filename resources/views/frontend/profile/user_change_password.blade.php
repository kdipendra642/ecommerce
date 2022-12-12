@extends('frontend.main_master')
@section('content')
<div class="body-content" style="margin-top: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('frontend.body.sidebar')
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8" style="background-color: white !important; padding-bottom: 10px;">
                <div class="card">
                    <h3 class="text-center">Update Your Password</h3>

                    <div class="card-body">
                        <form action="{{ route('user.password.update') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Current Password <span>*</span></label>
                                <input class="form-control" id="current_password" type="password" name="oldpassword" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">New Password <span>*</span></label>
                                <input class="form-control" id="password" name="password" type="password" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required>
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update Password</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection