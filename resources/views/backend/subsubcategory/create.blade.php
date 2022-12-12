@extends('admin.admin_master')
@section('admin')
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Add SubSubCategory
                    <a href="{{ route('all.subsubcategory') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">
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
                    Create SubSubCategory
                </header>
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="{{ route('subsubcategory.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" for="inputSuccess">Category</label>
                                    <div class="col-lg-10">
                                        <select class="form-control m-bot15" name="category_id">
                                            <option value="0">--Please choose category--</option>
                                            @foreach($category as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->category_name_en }} | {{ $cate->category_name_hin }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" for="inputSuccess">Sub-Category</label>
                                    <div class="col-lg-10">
                                        <select class="form-control m-bot15" name="sub_category_id">
                                            <option value="" selected disabled>--Please choose sub category--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">SubSubCategory Name (English)</label>
                            <div class="col-sm-10">
                                <input type="text" name="sub_sub_category_en" class="form-control" required="" data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">SubSubCategory Name (Nepali)</label>
                            <div class="col-sm-10">
                                <input type="text" name="sub_sub_category_hin" class="form-control" required="" data-validation-required-message="This field is required">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</section>

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
                        var d = $('select[name="sub_category_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="sub_category_id"]').append('<option value="' + value.id + '">' + value.sub_category_en + '</option>');
                        })
                    }
                })
            }
        });
    });
</script>

@endsection