@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <aside class="profile-info col-lg-12">
            <section>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Profile Info Edit
                        <a href="{{ route('all.admin.user') }}" class="btn btn-success" style="float: right; margin-top: -5px;">
                            << Back</a>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.user.update', $adminuser->id) }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="old_image" value="{{ $adminuser->profile_photo_path}}">
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-6">
                                    <input type="text" name="name" class="form-control" value="{{ $adminuser->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-6">
                                    <input type="email" name="email" class="form-control" value="{{ $adminuser->email }}">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Phone</label>
                                <div class="col-lg-6">
                                    <input type="tel" name="phone" class="form-control" value="{{ $adminuser->phone }}">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Password</label>
                                <div class="col-lg-6">
                                    <input type="password" name="password" class="form-control">

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
                                    <img id="show_image" src="{{ asset($adminuser->profile_photo_path) }}" style="width: 100px; height: 100px;">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="brand" @if ($adminuser->brand == 1) checked @endif>
                                            Brand
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="category" {{ $adminuser->category == 1 ? 'checked' : '' }}>
                                            Category
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="product" {{ $adminuser->product == 1 ? 'checked' : '' }}>
                                            Product
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="slider" {{ $adminuser->slider == 1 ? 'checked' : '' }}>
                                            Slider
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="coupons" {{ $adminuser->coupons == 1 ? 'checked' : '' }}>
                                            Coupons
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="shipping" {{ $adminuser->shipping == 1 ? 'checked' : '' }}>
                                            Shipping
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="orders" {{ $adminuser->orders == 1 ? 'checked' : '' }}>
                                            Orders
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="return_order" {{ $adminuser->return_order == 1 ? 'checked' : '' }}>
                                            Return Orders
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="reports" {{ $adminuser->reports == 1 ? 'checked' : '' }}>
                                            Reports
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="stock" {{ $adminuser->stock == 1 ? 'checked' : '' }}>
                                            Stock
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="allusers" {{ $adminuser->allusers == 1 ? 'checked' : '' }}>
                                            All Users
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="blogs" {{ $adminuser->blogs == 1 ? 'checked' : '' }}>
                                            Blogs
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="setting" {{ $adminuser->setting == 1 ? 'checked' : '' }}>
                                            Setting
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="reviews" {{ $adminuser->reviews == 1 ? 'checked' : '' }}>
                                            Reviews
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="adminuserrole" {{ $adminuser->adminuserrole == 1 ? 'checked' : '' }}>
                                            AdminUserRole
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="float: left;">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button type="submit" class="btn btn-success">Save</button>
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