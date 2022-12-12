@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add SubCategory
                    <a href="{{ route('all.subcategory') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">
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
                    Create SubCategory
                </header>
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="{{ route('subcategory.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label" for="inputSuccess">Select Category</label>
                            <div class="col-lg-10">
                                <select class="form-control m-bot15" name="category_id">
                                    <option value="0">--Please choose category--</option>
                                    @foreach($category as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->category_name_en }} | {{ $cate->category_name_hin }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">SubCategory Name (English)</label>
                            <div class="col-sm-10">
                                <input type="text" name="sub_category_en" class="form-control" required="" data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">SubCategory Name (Nepali)</label>
                            <div class="col-sm-10">
                                <input type="text" name="sub_category_hin" class="form-control" required="" data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>

@endsection