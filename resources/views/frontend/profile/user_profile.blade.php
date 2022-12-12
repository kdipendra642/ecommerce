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
                    <h3 class="text-center">Update Your Profile</h3>

                    <div class="card-body">
                        <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
                                <input class="form-control" id="name" type="text" name="name" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input class="form-control" id="email" type="email" name="email" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail2">Email Address <span>*</span></label>
                                <input class="form-control" id="profile_photo_path" type="file" name="profile_photo_path">
                            </div>
                            <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Update Profile</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection