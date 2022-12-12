@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <aside class="profile-info col-lg-12">
            <section>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Profile Info
                        <a href="{{ route('all.admin.user') }}" class="btn btn-success" style="float: right; margin-top: -5px;">
                            << Back</a>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-6">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-6">
                                    <input type="email" name="email" class="form-control">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Phone</label>
                                <div class="col-lg-6">
                                    <input type="tel" name="phone" class="form-control">

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
                                    <img id="show_image" src="" style="width: 100px; height: 100px;">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="brand">
                                            Brand
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="category">
                                            Category
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="product">
                                            Product
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="slider">
                                            Slider
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="coupons">
                                            Coupons
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="shipping">
                                            Shipping
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="orders">
                                            Orders
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="return_order">
                                            Return Orders
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="reports">
                                            Reports
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="stock">
                                            Stock
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="allusers">
                                            All Users
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="blogs">
                                            Blogs
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="setting">
                                            Setting
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="reviews">
                                            Reviews
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">
                                            <input type="checkbox" value="1" name="adminuserrole">
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