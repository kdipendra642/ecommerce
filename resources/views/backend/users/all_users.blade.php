@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Customers List
                    <!-- <a href="{{ route('brand.create') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">Add Brand</a> -->
                </header>
                <div class="panel-body">
                </div>
            </section>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    All Customers List
                    <span class="badge badge-pill bg-danger" style="background-color: #ec6459;">{{ count($users)}}</span>
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td><img src="{{ !empty($user->profile_photo_path) ?url('upload/user_images/'.$user->profile_photo_path) : url('upload/no_image.png') }}" alt="" style="width: 50px; height: 50px;"></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if($user->UserOnline())
                                        <span class="badge badge-pill bg-success">Active</span>
                                        @else
                                        <span class="badge badge-pill bg-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans()}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-primary btn-xs btn-round" title="View User"><i class="fa fa-eye"></i> View</a>
                                            <a href="#" class="btn btn-danger btn-xs btn-round" title="Delete This User" style="margin-left: 5px;"><i class="fa fa-trash-o"></i> Delete</a>
                                        </div>
                                    </td>
                                </tr>


                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>



@endsection