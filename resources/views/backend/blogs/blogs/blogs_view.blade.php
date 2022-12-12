@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Blogs List
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
                    Blogs List
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Title (Eng)</th>
                                    <th>Title (Nep)</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                <tr>
                                    <td>
                                        <img src="{{ asset(''.$blog->post_image) }}" alt="{{$blog->blog_category->blog_category_name_en}}" style="width: 70px; height: 70px;">
                                    </td>
                                    <td>{{$blog->blog_category->blog_category_name_en}}</td>
                                    <td>{{$blog->post_title_en}}</td>
                                    <td>{{$blog->post_title_nep}}</td>
                                    <td>{{Carbon\Carbon::parse($blog->created_at)->format('D, d F Y')}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('blog.edit', $blog->id)}}" class="btn btn-success btn-xs btn-round"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('blog.delete', $blog->id)}}" class="btn btn-danger btn-xs btn-round" id="delete" style="margin-left: 5px;"><i class="fa fa-trash-o"></i> Delete</a>
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