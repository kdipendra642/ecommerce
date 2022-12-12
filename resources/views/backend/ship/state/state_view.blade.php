@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Shipping State List
                    <a href="#myModal" data-toggle="modal" class="btn btn-success btn-rounded btn-sm" style="float:right;">Add State</a>
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
                    Ship State List
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                            <thead>
                                <tr>
                                    <th>District Name</th>
                                    <th>Division Name</th>
                                    <th>State Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($shipstate as $item)
                                <tr>
                                    <td>{{$item->district->district_name}}</td>
                                    <td>{{$item->division->division_name}}</td>
                                    <td>{{$item->state_name}}</td>
                                    <td>
                                        {{Carbon\Carbon::parse($item->created_at)->format('D, d F Y')}}
                                    </td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="#myModal{{$item->id}}" data-toggle="modal" class="btn btn-info  btn-xs btn-round" title="Edit this coupon" style="margin-left: 5px;"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('state.delete', $item->id) }}" class="btn btn-danger btn-xs btn-round" title="Delete this coupon" id="delete" style="margin-left: 5px;"><i class="fa fa-trash-o"></i> Delete</a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- division edit modal -->
                                @include('backend.ship.state.state_edit_modal')
                                <!-- end division edit modal -->
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


<!-- create ship division modal -->
@include('backend.ship.state.state_create_modal')
<!-- end ship division modal -->
@endsection