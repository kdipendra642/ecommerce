@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    SubCategory List
                    <a href="{{ route('subcategory.create') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">Add SubCategory</a>
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
                    SubCategory
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Name (English)</th>
                                    <th>Name (Nepali)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subcategory as $subcate)
                                <tr>
                                    <td>{{$subcate['category']['category_name_en']}}</td>
                                    <td>{{$subcate->sub_category_en}}</td>
                                    <td>{{$subcate->sub_category_hin}}</td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="{{ route('subcategory.edit', $subcate->id) }}" class="btn btn-success btn-xs btn-round"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('subcategory.delete', $subcate->id) }}" class="btn btn-danger btn-xs btn-round" id="delete" style="margin-left: 5px;"><i class="fa fa-trash-o"></i> Delete</a>
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