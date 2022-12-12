@extends('admin.admin_master')
@section('admin')
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Create Blog
                    <a href="{{ route('all.blog') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">
                        << Back</a>
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
                    Add Blogs
                </header>
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="{{ route('create.blog.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" for="inputSuccess">Select Category</label>
                                    <div class="col-lg-10">
                                        <select class="form-control m-bot15" name="blog_category_id">
                                            <option value="0">--Please choose category--</option>
                                            @foreach($blog_categories as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->blog_category_name_en }} | {{ $cate->blog_category_name_nep }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Blog Title (En)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="post_title_en" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Blog Title(Nep)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="post_title_nep" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Blog Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="post_image" class="form-control" onChange="sliderImage(this)" required="" data-validation-required-message="This field is required">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Preview</label>
                                    <div class="col-sm-10">
                                        <img src="" alt="" id="mainCoverImage">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Description (Eng)</label>
                                    <div class="col-sm-10">
                                        <textarea name="post_description_en" id="post_description_en" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Description (Nep)</label>
                                    <div class="col-sm-10">
                                        <textarea name="post_description_hin" id="post_description_hin" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-info" style="float: right;">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <!-- page end-->
</section>

<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('post_description_en');
</script>
<script>
    CKEDITOR.replace('post_description_hin');
</script>
<script type="text/javascript">
    function sliderImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainCoverImage').attr('src', e.target.result).width(90).height(90);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection