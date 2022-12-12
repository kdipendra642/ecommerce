@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Products Stock
                    <a href="{{ route('add-product') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">Add Product</a>
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
                    Products Stock
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th style="width: 50%;">Name (English)</th>
                                    <th>Quantity</th>
                                    <th>Selling Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset(''.$item->product_thumbnail) }}" alt="{{ $item->product_name_en }}" style="width: 100px; height: 100px;">
                                    </td>
                                    <td>{{ $item->product_name_en }}</td>
                                    <td>{{ $item->product_qty }}</td>
                                    <td>Rs. {{ $item->selling_price }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </section>
        </div>
    </div>
    <!-- page end-->
</section>



@endsection