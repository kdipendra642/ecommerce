@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    All Admin List
                    <a href="{{ route('add.admin') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">Add Admin</a>
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
                    Total Admin Users
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Access</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($adminuser as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset($item->profile_photo_path)}}" alt="{{$item->name}}" style="width: 50px; height: 50px;">
                                    </td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>
                                        @if($item->brand == 1)
                                        <span class="badge btn-primary">Brand</span>
                                        @else
                                        @endif

                                        @if($item->category == 1)
                                        <span class="badge btn-danger">category</span>
                                        @else
                                        @endif

                                        @if($item->product == 1)
                                        <span class="badge btn-secondary">product</span>
                                        @else
                                        @endif

                                        @if($item->slider == 1)
                                        <span class="badge btn-dark">slider</span>
                                        @else
                                        @endif

                                        @if($item->coupons == 1)
                                        <span class="badge btn-success">coupons</span>
                                        @else
                                        @endif

                                        @if($item->shipping == 1)
                                        <span class="badge btn-warning">shipping</span>
                                        @else
                                        @endif

                                        @if($item->orders == 1)
                                        <span class="badge btn-info">orders</span>
                                        @else
                                        @endif

                                        @if($item->return_order == 1)
                                        <span class="badge btn-light">return_order</span>
                                        @else
                                        @endif

                                        @if($item->reports == 1)
                                        <span class="badge btn-dark">reports</span>
                                        @else
                                        @endif

                                        @if($item->stock == 1)
                                        <span class="badge btn-primary">stock</span>
                                        @else
                                        @endif

                                        @if($item->allusers == 1)
                                        <span class="badge btn-secondary">allusers</span>
                                        @else
                                        @endif

                                        @if($item->blogs == 1)
                                        <span class="badge btn-info">blogs</span>
                                        @else
                                        @endif

                                        @if($item->setting == 1)
                                        <span class="badge btn-success">setting</span>
                                        @else
                                        @endif

                                        @if($item->reviews == 1)
                                        <span class="badge btn-warning">reviews</span>
                                        @else
                                        @endif

                                        @if($item->adminuserrole == 1)
                                        <span class="badge btn-light">adminuserrole</span>
                                        @else
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('edit.admin.user', $item->id)}}" class="btn btn-sm btn-success btn-round" data-title="Edit Admin Info"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('delete.admin.user', $item->id)}}" class="btn btn-sm btn-danger btn-round" data-title="Delete Admin" style="margin-left: 2px;" id="delete"><i class="fa fa-trash-o"></i> Delete</a>
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