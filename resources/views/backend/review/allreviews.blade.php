@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Reviews List
                    <a href="{{ route('add-blogs') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">Add Blog</a>
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
                    All Customers Review
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                            <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Customer Name</th>
                                    <th>Summary</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $item)
                                <tr>
                                    <td>{{$item->product->product_name_en}}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->summary}}</td>
                                    <td>{{$item->comment}}</td>
                                    <td>
                                        @if($item->status == 0)
                                        <span class="badge btn-danger">Off</span>
                                        @else
                                        <span class="badge btn-success">On</span>
                                        @endif
                                    </td>
                                    <td>{{Carbon\Carbon::parse($item->created_at)->format('D, d F Y')}}</td>
                                    <td>
                                        <div class="btn-group">
                                            @if($item->status == 0)
                                            <a href="{{ route('approve.review', $item->id)}}" class="btn btn-success btn-xs btn-round"><i class="fa fa-arrow-down"></i> Approve</a>
                                            @else
                                            <a href="{{ route('disable.review', $item->id)}}" class="btn btn-danger btn-xs btn-round"><i class="fa fa-arrow-up"></i> Disable</a>
                                            @endif
                                            <a href="{{ route('delete.review', $item->id)}}" class="btn btn-danger btn-xs btn-round hidden" id="delete"><i class="fa fa-arrow-up"></i> Delete</a>

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