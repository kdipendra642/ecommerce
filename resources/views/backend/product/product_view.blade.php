@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Products List
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
                    Products List
                </header>
                <div class="panel-body">
                    <div class="adv-table">
                        <table class="display table table-bordered table-striped dataTable" id="dynamic-table" aria-describedby="dynamic-table_info">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name (English)</th>
                                    <th>Name (Nepali)</th>
                                    <th>Quantity</th>
                                    <th>S.P.</th>
                                    <th>Disc.</th>
                                    <th>Status</th>
                                    <th style="width: 30%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                <tr>
                                    <td>
                                        <img src="{{ asset(''.$item->product_thumbnail) }}" alt="{{ $item->product_name_en }}" style="width: 100px; height: 100px;">
                                    </td>
                                    <td>{{ $item->product_name_en }}</td>
                                    <td>{{ $item->product_name_hin }}</td>
                                    <td>{{ $item->product_qty }}</td>
                                    <td>Rs. {{ $item->selling_price }}</td>
                                    <td>
                                        @if($item->discount_price == 0 || $item->discount_price == NULL)
                                        No Disc.
                                        @else
                                        @php
                                        $disc_percentage = ($item->discount_price * 100) / $item->selling_price ;
                                        @endphp

                                        <span class="badge bg-important"> {{ round($disc_percentage, 2) }}%</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status == "1")
                                        <button class="btn btn-round btn-success btn-xs" title="Active">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        @else
                                        <button class="btn btn-round btn-danger btn-xs" title="Inactive">
                                            <i class="fa fa-minus-circle"></i>
                                        </button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn btn-group">
                                            <a href="#" class="btn btn-primary btn-xs btn-round" title="View this product"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{ route('product.edit', $item->id) }}" class="btn btn-info  btn-xs btn-round" title="Edit this product" style="margin-left: 5px;"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="#" class="btn btn-success btn-xs btn-round" title="Generate PDF" style="margin-left: 5px;"><i class="fa fa-download"></i> Download </a>
                                            @if($item->status == "1")
                                            <a href="{{ route('product.deactivate', $item->id) }}" class="btn btn-danger btn-xs btn-round" title="Deactivate this product" style="margin-left: 5px;"><i class="fa fa-arrow-down"></i> Off</a>
                                            @else
                                            <a href="{{ route('product.activate', $item->id) }}" class="btn btn-success btn-xs btn-round" title="Activate this product" style="margin-left: 5px;"><i class="fa fa-arrow-up"></i> On</a>
                                            @endif

                                            <a href="{{ route('delete.product', $item->id) }}" class="btn btn-danger btn-xs btn-round" title="Delete this product" id="delete" style="margin-left: 5px;"><i class="fa fa-trash-o"></i> Delete</a>
                                        </div>
                                    </td>
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