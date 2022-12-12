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
                                Seo Setting

                            </header>
                            <div class="panel-body">
                            </div>
                        </section>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form class="form-horizontal tasi-form" method="POST" action="{{ route('update.seo.setting', $seo_setting->id) }}">
                            @csrf
                            <section class="panel">
                                <header class="panel-heading">
                                    Update Seo Setting
                                </header>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Meta Title</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="meta_title" value="{{ $seo_setting->meta_title }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Meta Author</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" name="meta_author" value="{{ $seo_setting->meta_author }}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Meta Keyword</label>
                                                <div class="col-sm-10">
                                                    <input name="meta_keyword" id="tagsinput" class="tagsinput" value="{{ $seo_setting->meta_keyword }}" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Meta Description </label>
                                                <div class="col-sm-10">
                                                    <textarea name="meta_description">{!! $seo_setting->meta_description !!}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Google Analytics </label>
                                                <div class="col-sm-10">
                                                    <textarea class="w-100" name="google_analytics" cols="100" rows="8" style="width: 100%;">{{ $seo_setting->google_analytics}}</textarea>
                                                </div>
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
        CKEDITOR.replace('meta_description');
    </script>
</body>

</html>