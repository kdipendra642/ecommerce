@extends('admin.admin_master')
@section('admin')
<script src="https://cdn.ckeditor.com/4.19.1/standard/ckeditor.js"></script>

<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Slider List
                    <a href="{{ route('manage-slider') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">
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
                    Edit Slider
                </header>
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $slider->id }}">
                        <input type="hidden" name="old_image" value="{{ $slider->slider_img }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Slider Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Slider Image</label>
                                    <div class="col-sm-5">
                                        <input type="file" name="slider_img" class="form-control" onChange="sliderImage(this)" required="" data-validation-required-message="This field is required">

                                        <img src="" alt="" id="mainSlider">
                                    </div>
                                    <div class="col-sm-5">
                                        <img src="{{ asset(''.$slider->slider_img) }}" alt="{{ $slider->title }}" style="width: 25%; height: 25%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="description" cols="30" rows="10">{{ $slider->description }}</textarea>
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
</section>
<script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js')}}"></script>

<script>
    CKEDITOR.replace('description');
</script>

<script type="text/javascript">
    function sliderImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainSlider').attr('src', e.target.result).width(90).height(90);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection