@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Site Setting
                    <a href="{{ route('all.brand') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">
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
                    Update Site Settings
                </header>
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="{{ route('update.site.settings', $setting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="old_image" value="{{ $setting->logo }}">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Logo</label>
                            <div class="col-sm-5">
                                <input type="file" name="logo" class="form-control" onChange="sliderImage(this)">

                                <!-- <img src="" alt="" id="mainSlider"> -->
                            </div>
                            <div class="col-sm-5">
                                <img src="{{ asset(''.$setting->logo) }}" alt="{{ $setting->title }}" style="width: 25%; height: 25%;" id="mainSlider">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Contact One</label>
                            <div class="col-sm-10">
                                <input type="tel" name="phone_one" class="form-control" value="{{ $setting->phone_one}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Contact Two</label>
                            <div class="col-sm-10">
                                <input type="tel" name="phone_two" class="form-control" value="{{ $setting->phone_two}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Company Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" value="{{ $setting->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Company Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="company_name" class="form-control" value="{{ $setting->company_name}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Company Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="company_address" class="form-control" value="{{ $setting->company_address}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Facebook Link</label>
                            <div class="col-sm-10">
                                <input type="url" name="facebook" class="form-control" value="{{ $setting->facebook}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Twitter Link</label>
                            <div class="col-sm-10">
                                <input type="url" name="twitter" class="form-control" value="{{ $setting->twitter}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Linkedin Link</label>
                            <div class="col-sm-10">
                                <input type="url" name="linkedin" class="form-control" value="{{ $setting->linkedin}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Youtube Link</label>
                            <div class="col-sm-10">
                                <input type="url" name="youtube" class="form-control" value="{{ $setting->youtube}}">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>

<script type="text/javascript">
    function sliderImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainSlider').attr('src', e.target.result).width(139).height(36);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection