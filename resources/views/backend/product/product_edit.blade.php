<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/form_component.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Jan 2019 05:31:23 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Ecom CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-datepicker/css/datepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-colorpicker/css/colorpicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap-daterangepicker/daterangepicker.css')}}" />
    <!--right slidebar-->
    <link href="{{ asset('backend/css/slidebars.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('backend/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('backend/css/style-responsive.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

    <script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>
    <style>
        .thumb {
            margin-left: 15px;
        }
    </style>

</head>

<body>
    <section id="container" class="">
        <!--header start-->
        @include('admin.body.header')
        <!--header end-->
        <!--sidebar start-->
        @include('admin.body.sidebar')
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">

            <!-- contents are in index.blade.php -->
            <section class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Edit Product
                                <a href="{{ route('manage-product') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">
                                    << Back</a>
                            </header>
                            <div class="panel-body">
                            </div>
                        </section>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal tasi-form" method="POST" action="{{ route('product.update') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $products->id }}" name="product_id">
                            <input type="hidden" name="old_image" value="{{ $products->product_thumbnail }}">

                            <section class="panel">
                                <header class="panel-heading">
                                    Product Detail
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Brand</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control m-bot15" name="brand_id">
                                                        <option value="0">--Please choose brand--</option>
                                                        @foreach($brands as $brand)
                                                        <option value="{{ $brand->id }}" {{ ($brand->id == $products->brand_id) ? 'selected' : ''}}>{{ $brand->brand_name_en }} | {{ $brand->brand_name_hin }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Category</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control m-bot15" name="category_id">
                                                        <option value="0">--Please choose category--</option>
                                                        @foreach($category as $cate)
                                                        <option value="{{ $cate->id }}" {{ ($cate->id == $products->category_id) ? 'selected' : ''}}>{{ $cate->category_name_en }} | {{ $cate->category_name_hin }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Sub-Category</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control m-bot15" name="subcategory_id">
                                                        <option value="0">--Please choose sub-category--</option>
                                                        @foreach($subcategories as $subcategory)
                                                        <option value="{{ $subcategory->id }}" {{ ($subcategory->id == $products->subcategory_id) ? 'selected' : ''}}>{{ $subcategory->sub_category_en }} | {{ $subcategory->sub_category_hin }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Sub-Sub-Category</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control m-bot15" name="subsubcategory_id">
                                                        <option value="0">--Please choose sub-sub-category--</option>
                                                        @foreach($subsubcategories as $subsubcategory)
                                                        <option value="{{ $subsubcategory->id }}" {{ ($subsubcategory->id == $products->subsubcategory_id) ? 'selected' : ''}}>{{ $subsubcategory->sub_sub_category_en }} | {{ $subsubcategory->sub_sub_category_hin }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Name (Eng)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="product_name_en" value="{{$products->product_name_en}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Name (Nep)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="product_name_hin" value="{{$products->product_name_hin}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Product Code</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="product_code" value="{{$products->product_code}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Product Quantity</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="product_qty" value="{{$products->product_qty}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Buying Price (Per Unit)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="buying_price" value="{{$products->buying_price}}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Selling Price (Per Unit)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="selling_price" value="{{$products->selling_price}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Discount (Per Unit)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="discount_price" value="{{$products->discount_price}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="panel">
                                <header class="panel-heading">
                                    Product Tags
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Tags (Eng)</label>
                                                <div class="col-sm-10">
                                                    <input name="product_tags_en" id="tagsinput" class="tagsinput" value="{{$products->product_tags_en}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Tags (Nep)</label>
                                                <div class="col-sm-10">
                                                    <input name="product_tags_hin" id="tagsinput" class="tagsinput" value="{{$products->product_tags_hin}}" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </section>
                            <section class="panel">
                                <header class="panel-heading">
                                    Product Size
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Size (Eng)</label>
                                                <div class="col-sm-10">
                                                    <input name="product_size_en" id="tagsinput" class="tagsinput" value="{{$products->product_size_en}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Size (Nepali)</label>
                                                <div class="col-sm-10">
                                                    <input name="product_size_hin" id="tagsinput" class="tagsinput" value="{{$products->product_size_hin}}" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </section>
                            <section class="panel">
                                <header class="panel-heading">
                                    Product Colors
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Color (Eng)</label>
                                                <div class="col-sm-10">
                                                    <input name="product_color_en" id="tagsinput" class="tagsinput" value="{{$products->product_color_en}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Color (Nepali)</label>
                                                <div class="col-sm-10">
                                                    <input name="product_color_hin" id="tagsinput" class="tagsinput" value="{{$products->product_color_hin}}" />
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </section>

                            <section class="panel">
                                <header class="panel-heading">
                                    Product Images
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Cover Image</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="product_thumbnail" onChange="mainThumbUrl(this)">

                                                    <img src="" alt="" id="mainThumb">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Previous Images</label>
                                                <div class="col-sm-10">
                                                    <!-- <input type="file" class="form-control" name=""> -->
                                                    <br>
                                                    <img src="{{ asset('').$products->product_thumbnail }}" alt="" style="width: 90px; height: 90px;">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="panel">
                                <header class="panel-heading">
                                    Product Short Description
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Short Description (Eng)</label>
                                                <div class="col-sm-10">
                                                    <textarea name="short_description_en" id="" cols="40" rows="10">{{ $products->short_description_en }}</textarea>
                                                    <!-- <textarea name="editor1"></textarea> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Short Description (Nep)</label>
                                                <div class="col-sm-10">
                                                    <textarea name="short_description_hin" id="" cols="40" rows="10">{{ $products->short_description_hin }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="panel">
                                <header class="panel-heading">
                                    Product Short Description
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Long Description (Eng)</label>
                                                <div class="col-sm-10">
                                                    <textarea name="long_description_en">{!! $products->long_description_en !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Long Description (Nep)</label>
                                                <div class="col-sm-10">
                                                    <textarea name="long_description_hin">{!! $products->long_description_hin !!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="panel">
                                <header class="panel-heading">
                                    Product Features
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">

                                                    <input type="checkbox" value="1" name="hot_deals" @if ($products->hot_deals == 1) checked @endif>
                                                    Hot Deals
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    <input type="checkbox" value="1" name="special_offer" @if ($products->special_offer == 1) checked @endif>
                                                    Special Offer
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    <input type="checkbox" value="1" name="featured" @if ($products->featured == 1) checked @endif>
                                                    Featured
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    <input type="checkbox" value="1" name="special_deals" @if ($products->special_deals == 1) checked @endif>
                                                    Special Deals
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="btn-group" style="float: right;">
                                        <button type="submit" class="btn btn-info">Update</button>
                                        <a href="" class="btn btn-danger mr-4">Refresh</a>
                                    </div>
                                </div>
                            </section>
                        </form>

                        <form action="{{ route('multiple.images') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $products->id }}" name="product_id">

                            <section class="panel">
                                <header class="panel-heading">
                                    Product Upload Images
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Multiple Images</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="photo_name[]" multiple="multiple" id="multiImg">

                                                    <div class="row" id="preview_img">

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="btn-group" style="float: right;">
                                        <button type="submit" class="btn btn-info">Upload</button>
                                        <a href="" class="btn btn-danger mr-4">Refresh</a>
                                    </div>
                                </div>
                            </section>
                        </form>
                        <section class="panel">
                            <header class="panel-heading">
                                Product Supportive Images
                            </header>
                            <div class="panel-body" style="width: 90%; margin-left: auto; margin-right: auto;">
                                <div class="row">
                                    @foreach($multiImgs as $multiImg)
                                    <div class="col-md-3 col-sm-12">
                                        <div class="card">
                                            <img class="card-img-top" src="{{ asset('').$multiImg->photo_name }}" alt="{{ $products->name }}" style="width: 250px; height: 250px;">
                                            <div class="card-body">
                                                <a href="{{ route('delete.image', $multiImg->id) }}" class="btn btn-danger btn-sm" id="delete" style="width: 100%;"> <i class="fa fa-trash-o"></i> Delete Image</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </section>
        <!--main content end-->
        <!--footer start-->
        @include('admin.body.footer')
        <!--footer end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('backend/js/jquery.js')}}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('backend/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{ asset('backend/js/jquery.nicescroll.js')}}" type="text/javascript"></script>

    <script src="{{ asset('backend/js/jquery-ui-1.9.2.custom.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{ asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>

    <!--custom switch-->
    <script src="{{ asset('backend/js/bootstrap-switch.js')}}"></script>
    <!--custom tagsinput-->
    <script src="{{ asset('backend/js/jquery.tagsinput.js')}}"></script>
    <!--custom checkbox & radio-->
    <script type="text/javascript" src="{{ asset('backend/js/ga.js')}}"></script>

    <script type="text/javascript" src="{{ asset('assets/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap-daterangepicker/date.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js')}}"></script>

    <script type="text/javascript" src="{{ asset('assets/bootstrap-inputmask/bootstrap-inputmask.min.js')}}"></script>
    <script src="{{ asset('backend/js/respond.min.js')}}"></script>

    <!--right slidebar-->
    <script src="{{ asset('backend/js/slidebars.min.js')}}"></script>


    <!--common script for all pages-->
    <script src="{{ asset('backend/js/common-scripts.js')}}"></script>

    <!--script for this page-->
    <script src="{{ asset('backend/js/form-component.js')}}"></script>

    <script>
        CKEDITOR.replace('long_description_en');
    </script>
    <script>
        CKEDITOR.replace('long_description_hin');
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subsubcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.sub_category_en + '|' + value.sub_category_hin + '</option>');
                            })
                        }
                    })
                }
            });

            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();
                if (subcategory_id) {
                    $.ajax({
                        url: "{{ url('/category/subsubcategory/ajax') }}/" + subcategory_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="subsubcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.sub_sub_category_en + '|' + value.sub_sub_category_hin + '</option>');
                            })
                        }
                    })
                }
            });
        });
    </script>
    <script type="text/javascript">
        function mainThumbUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThumb').attr('src', e.target.result).width(90).height(90);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(100)
                                        .height(100); //create image element 
                                    $('#preview_img').append(img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            $(document).on('click', '#delete', function(e) {
                e.preventDefault();
                var link = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = link;
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })
            })
        })
    </script>
    <!-- end new template -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type') }}";
        switch (type) {
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
        @endif
    </script>

</body>


</html>