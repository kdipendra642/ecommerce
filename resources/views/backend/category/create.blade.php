@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add Category
                    <a href="{{ route('all.category') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">
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
                    Create Category
                </header>
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Category Name (English)</label>
                            <div class="col-sm-10">
                                <input type="text" name="category_name_en" class="form-control" required="" data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Category Name (Nepali)</label>
                            <div class="col-sm-10">
                                <input type="text" name="category_name_hin" class="form-control" required="" data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Category Icon</label>
                            <div class="col-sm-10">
                                <input type="text" name="category_icon" class="form-control" required="" data-validation-required-message="This field is required">
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