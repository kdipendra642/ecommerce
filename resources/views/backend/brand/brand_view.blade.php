@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Brands List
                    <a href="{{ route('brand.create') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">Add Brand</a>
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
                    Brands List
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                            <thead>
                                <tr>
                                    <th>Name (English)</th>
                                    <th>Name (Nepali)</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $brand)
                                <tr>
                                    <td>{{$brand->brand_name_en}}</td>
                                    <td>{{$brand->brand_name_hin}}</td>
                                    <td>
                                        <img src="{{ asset(''.$brand->brand_image) }}" alt="" style="width: 70px; height: 70px;">
                                    </td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-success btn-xs btn-round"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('brand.delete', $brand->id) }}" class="btn btn-danger btn-xs btn-round" id="delete" style="margin-left: 5px;"><i class="fa fa-trash-o"></i> Delete</a>
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