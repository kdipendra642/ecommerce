@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Brands List
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
                    Edit Brands
                </header>
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="{{ route('brand.update', $brands->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $brands->id }}">
                        <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Brand Name (English)</label>
                            <div class="col-sm-10">
                                <input type="text" name="brand_name_en" class="form-control" required="" value="{{ $brands->brand_name_en }}" data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Brand Name (Nepali)</label>
                            <div class="col-sm-10">
                                <input type="text" name="brand_name_hin" class="form-control" required="" value="{{ $brands->brand_name_hin }}" data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Brand Image</label>
                            <div class="col-sm-5">
                                <input type="file" name="brand_image" class="form-control">
                            </div>
                            <div class="col-sm-5">
                                <img src="{{ asset(''.$brands->brand_image) }}" alt="{{ $brands->brand_name_en }}" style="width: 25%; height: 25%;">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>

@endsection