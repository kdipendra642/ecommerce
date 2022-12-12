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
                                Add Product
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
                        <form class="form-horizontal tasi-form" method="POST" action="{{ route('product-store') }}" enctype="multipart/form-data">
                            @csrf
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
                                                        <option value="{{ $brand->id }}">{{ $brand->brand_name_en }} | {{ $brand->brand_name_hin }}</option>
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
                                                        <option value="{{ $cate->id }}">{{ $cate->category_name_en }} | {{ $cate->category_name_hin }}</option>
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
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Name (Eng)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="product_name_en">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Name (Nep)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="product_name_hin">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Product Code</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="product_code">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Product Quantity</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="product_qty">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Buying Price(Per Unit)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="buying_price">
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Selling Price(Per Unit)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="selling_price">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Discount (Per Unit)</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="discount_price">
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
                                                    <input name="product_tags_en" id="tagsinput" class="tagsinput" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Tags (Nep)</label>
                                                <div class="col-sm-10">
                                                    <input name="product_tags_hin" id="tagsinput" class="tagsinput" />
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
                                                    <input name="product_size_en" id="tagsinput" class="tagsinput" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Size (Nepali)</label>
                                                <div class="col-sm-10">
                                                    <input name="product_size_hin" id="tagsinput" class="tagsinput" />
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
                                                    <input name="product_color_en" id="tagsinput" class="tagsinput" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Color (Nepali)</label>
                                                <div class="col-sm-10">
                                                    <input name="product_color_hin" id="tagsinput" class="tagsinput" />
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
                                                <label class="col-sm-2 col-sm-2 control-label">Multiple Images</label>
                                                <div class="col-sm-10">
                                                    <input type="file" class="form-control" name="photo_name[]" multiple="multiple" id="multiImg">

                                                    <div class="row" id="preview_img">

                                                    </div>
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
                                                    <textarea name="short_description_en" id="" cols="60" rows="10"></textarea>
                                                    <!-- <textarea name="editor1"></textarea> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Short Description (Nep)</label>
                                                <div class="col-sm-10">
                                                    <textarea name="short_description_hin" id="" cols="60" rows="10"></textarea>
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
                                                    <textarea name="long_description_en"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Long Description (Nep)</label>
                                                <div class="col-sm-10">
                                                    <textarea name="long_description_hin"></textarea>
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
                                                    <input type="checkbox" value="1" name="hot_deals">
                                                    Hot Deals
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    <input type="checkbox" value="1" name="special_offer">
                                                    Special Offer
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    <input type="checkbox" value="1" name="featured">
                                                    Featured
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-sm-4 control-label">
                                                    <input type="checkbox" value="1" name="special_deals">
                                                    Special Deals
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <section class="panel">
                                <div class="panel-body">
                                    <hr>
                                    <div class="btn-group" style="float: right;">
                                        <button type="submit" class="btn btn-info">Submit</button>
                                        <a href="" class="btn btn-danger">Refresh</a>
                                    </div>
                                </div>
                            </section>
                        </form>
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

</body>

<!-- Mirrored from thevectorlab.net/flatlab/form_component.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Jan 2019 05:31:31 GMT -->

</html>