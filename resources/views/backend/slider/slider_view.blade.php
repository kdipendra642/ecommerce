@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Sliders List
                    <a href="{{ route('slider.add')}}" class="btn btn-success btn-rounded btn-sm" style="float:right;">Add Slider</a>
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
                    Sliders List
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                            <thead>
                                <tr>
                                    <th>Slider Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sliders as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset(''.$item->slider_img) }}" alt="" style="width: 70px; height: 70px;">
                                    </td>
                                    <td>{{$item->title}}</td>
                                    <td>{!! Str::limit($item->description, 50) !!}</td>
                                    <td>
                                        @if($item->status == "1")
                                        <button class="btn btn-round btn-success btn-xs" title="Active">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        @else
                                        <button class="btn btn-round btn-danger btn-xs" title="Inactive">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="{{ route('edit.slider', $item->id) }}" class="btn btn-success btn-xs" title=""><i class="fa fa-pencil"></i> Edit</a>
                                            @if($item->status == "1")
                                            <a href="{{ route('slider.deactivate', $item->id) }}" class="btn btn-danger btn-xs btn-round" title="Deactivate this slider" style="margin-left: 5px;"><i class="fa fa-arrow-down"></i> Off</a>
                                            @else
                                            <a href="{{ route('slider.activate', $item->id) }}" class="btn btn-success btn-xs btn-round" title="Activate this slider" style="margin-left: 5px;"><i class="fa fa-arrow-up"></i> On</a>
                                            @endif
                                            <a href="{{ route('delete.slider', $item->id) }}" class="btn btn-danger btn-xs" id="delete" style="margin-left: 5px;"><i class="fa fa-trash-o"></i> Delete</a>
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