@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Pending Order Items List
                    <a href="{{ route('pending-orders') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">
                        << Back</a>
                </header>
                <div class="panel-body">
                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    Shipping Details
                </header>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Shipping Name:</th>
                                <td>{{$pending_order->name}}</td>
                            </tr>
                            <tr>
                                <th>Shipping Email:</th>
                                <td>{{$pending_order->email}}</td>
                            </tr>
                            <tr>
                                <th>Shipping Phone:</th>
                                <td>{{$pending_order->phone}}:</td>
                            </tr>
                            <tr>
                                <th>Shipping Division:</th>
                                <td>{{$pending_order->division->division_name}}</td>
                            </tr>
                            <tr>
                                <th>Shipping District:</th>
                                <td>{{$pending_order['district']['district_name']}}</td>
                            </tr>
                            <tr>
                                <th>Shipping State:</th>
                                <td>{{$pending_order['state']['state_name']}}</td>
                            </tr>
                            <tr>
                                <th>Postal Code:</th>
                                <td>{{$pending_order->postal_code}}</td>
                            </tr>
                            <tr>
                                <th>Order Date:</th>
                                <td>{{$pending_order->order_date}}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </section>
        </div>
        <div class="col-lg-6">
            <section class="panel">
                <header class="panel-heading">
                    Order List
                </header>
                <div class="panel-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Name:</th>
                                <td>{{$pending_order->name}}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{$pending_order->email}}</td>
                            </tr>
                            <tr>
                                <th> Phone:</th>
                                <td>{{$pending_order->phone}}:</td>
                            </tr>
                            <tr>
                                <th>Payment Type:</th>
                                <td>{{$pending_order->payment_type}}</td>
                            </tr>
                            <tr>
                                <th>Transaction ID:</th>
                                <td>{{$pending_order->transaction_id}}</td>
                            </tr>
                            <tr>
                                <th>Invoice Number:</th>
                                <td class="text-danger">{{$pending_order->invoice_number}}</td>
                            </tr>
                            <tr>
                                <th> Total:</th>
                                <td>Rs {{$pending_order->amount}}</td>
                            </tr>
                            <tr>
                                <th>Order Status:</th>
                                <td>
                                    <span class="badge bg-primary">{{$pending_order->status}}</span>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <th>
                                    @if($pending_order->status == "Pending")
                                    <a href="{{ route('pending-confirm', $pending_order->id)}}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                                    @elseif($pending_order->status == "Confirm")
                                    <a href="{{ route('pending-processing', $pending_order->id)}}" class="btn btn-block btn-success" id="processing">Process Order</a>
                                    @elseif($pending_order->status == "Processing")
                                    <a href="{{ route('pending-picked', $pending_order->id)}}" class="btn btn-block btn-success" id="picked">Order Picked</a>
                                    @elseif($pending_order->status == "Picked")
                                    <a href="{{ route('pending-shipped', $pending_order->id)}}" class="btn btn-block btn-success" id="shipped">Ship Order</a>
                                    @elseif($pending_order->status == "Shipped")
                                    <a href="{{ route('pending-delivered', $pending_order->id)}}" class="btn btn-block btn-success" id="delivered">Order Delivered</a>
                                    @elseif($pending_order->status == "Delivered")
                                    <a href="{{ route('pending-cancelled', $pending_order->id)}}" class="btn btn-block btn-success" id="cancelled">Order Cancelled</a>
                                    @endif

                                </th>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </section>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Items List
                </header>
                <div class="panel-body">
                    <div class="table-responsive" tabindex="1" style="overflow: hidden; outline: none;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pending_order_items as $items)
                                <tr>
                                    <td>
                                        <img src="{{ asset($items->product->product_thumbnail)}}" alt="{{$items->product->product_name_en}}" style="width: 100px; height: 100px;">
                                    </td>
                                    <td>{{$items->product->product_name_en}}</td>
                                    <td>{{$items->product->product_code}} </td>
                                    <td>{{$items->color}} </td>
                                    <td>{{$items->size}} </td>
                                    <td>{{$items->qty}} </td>
                                    <td>Rs {{$items->price}} </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @if($pending_order->status == "Cancelled")
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Return Reason
                </header>
                <div class="panel-body">
                    <p>{{$pending_order->return_description}}</p>
                </div>
            </section>
        </div>
    </div>
    @endif

    <!-- page end-->
</section>


<script>
    $(function() {
        // confirm
        $(document).on('click', '#confirm', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure you want to confirm this order?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, confirm it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        'Confirmed!',
                        'This product has been confirmed',
                        'success'
                    )
                }
            })
        })

        //process
        $(document).on('click', '#processing', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure you want to process this order?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, process it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        'Confirmed!',
                        'This product has been processed',
                        'success'
                    )
                }
            })
        })

        // picked
        $(document).on('click', '#picked', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure the product is picked?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, picked it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        'Confirmed!',
                        'This product has been picked',
                        'success'
                    )
                }
            })
        })

        // shipped
        $(document).on('click', '#shipped', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure the product is shipped?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, ship it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        'Confirmed!',
                        'This product has been shipped',
                        'success'
                    )
                }
            })
        })

        // delivered
        $(document).on('click', '#delivered', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure the product is delivered?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, deliver it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        'Confirmed!',
                        'This product has been delivered',
                        'success'
                    )
                }
            })
        })

        // cancelled
        $(document).on('click', '#cancelled', function(e) {
            e.preventDefault();
            var link = $(this).attr('href');
            Swal.fire({
                title: 'Are you sure the product is cancelled?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, cancel it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        'Confirmed!',
                        'This product has been cancelled',
                        'success'
                    )
                }
            })
        })
    })
</script>


@endsection