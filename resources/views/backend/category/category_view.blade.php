@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Category List
                    <a href="{{ route('category.create') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">Add Category</a>
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
                    SubCategory List
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                            <thead>
                                <tr>
                                    <th>Category Icon</th>
                                    <th>Name (English)</th>
                                    <th>Name (Nepali)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $cate)
                                <tr>
                                    <td>
                                        <span><i class="{{ $cate->category_icon }}" style="font-size: 32px;"></i></span>
                                    </td>
                                    <td>{{$cate->category_name_en}}</td>
                                    <td>{{$cate->category_name_hin}}</td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="{{ route('category.edit', $cate->id) }}" class="btn btn-success btn-xs btn-round"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('category.delete', $cate->id) }}" class="btn btn-danger btn-xs btn-round" id="delete" style="margin-left: 5px;"><i class="fa fa-trash-o"></i> Delete</a>
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