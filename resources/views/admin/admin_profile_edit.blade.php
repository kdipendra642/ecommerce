@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <aside class="profile-nav col-lg-3">
            <section class="panel">
                <div class="user-heading round">
                    <a href="{{ route('admin.profile.edit') }}">
                        <img src="{{ (!empty($editData->profile_photo_path)) ? asset($editData->profile_photo_path) : asset('backend/images/avatar/avatar-13.png')}}" alt="">
                    </a>
                    <h1>{{ $editData->name  }}</h1>
                    <p>{{ $editData->email  }}</p>
                </div>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="{{ route('admin.profile') }}"> <i class="fa fa-user"></i> Profile</a></li>
                    <li class="active"><a href="{{ route('admin.profile.edit') }}"> <i class="fa fa-edit"></i> Edit profile</a></li>
                </ul>
            </section>
        </aside>
        <aside class="profile-info col-lg-9">
            <section class="panel">
                <div class="panel-body bio-graph-info">
                    <h1> Profile Info</h1>
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $editData->profile_photo_path}}">

                        <div class="form-group">
                            <label class="col-lg-2 control-label">Name</label>
                            <div class="col-lg-6">
                                <input type="text" name="name" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{ $editData->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-6">
                                <input type="email" name="email" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false" value="{{ $editData->email }}">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Photo</label>
                            <div class="col-lg-6">
                                <input type="file" name="profile_photo_path" class="form-control" id="profile_image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">Preview</label>
                            <div class="col-lg-6">
                                <img id="show_image" src="{{ (!empty($editData->profile_photo_path)) ? asset($editData->profile_photo_path) : asset('backend/images/avatar/avatar-13.png')}}" alt="User Avatar" style="width: 100px; height: 100px;">
                            </div>
                        </div>
                        <div class="form-group" style="float: left;">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <section>
                <div class="panel panel-primary">
                    <div class="panel-heading"> Change Password</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.password.update') }}">
                            @csrf
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Current Password</label>
                                <div class="col-lg-6">
                                    <input type="password" name="oldpassword" class="form-control" id="current_password" required="" data-validation-required-message="This field is required" aria-invalid="false">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">New Password</label>
                                <div class="col-lg-6">
                                    <input type="password" name="password" id="password" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Re-type New Password</label>
                                <div class="col-lg-6">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-info">Save</button>
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </aside>
    </div>

    <!-- page end-->
</section>
<script type="text/javascript">
    $(document).ready(function() {
        $('#profile_image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#show_image').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>

@endsection