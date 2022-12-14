@extends('admin.admin_master')
@section('admin')

<div class="container-full">

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Change Password</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form method="POST" action="{{ route('admin.password.update') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Current Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="oldpassword" class="form-control" id="current_password" required="" data-validation-required-message="This field is required" aria-invalid="false">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6"></div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>New Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" name="password" id="password" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false">
                                                <div class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6"></div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <h5>Confirm Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="" data-validation-required-message="This field is required" aria-invalid="false">
                                            <div class="help-block"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="text-xs-right">
                                    <button type="submit" class="btn btn-rounded btn-info">Submit</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </section>
    <!-- /.content -->
</div>

@endsection