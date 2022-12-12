@extends('frontend.main_master')
@section('content')
<div class="body-content" style="margin-top: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('frontend.body.sidebar')
            </div>
            <div class="col-md-5" style="background-color: white !important; padding-bottom: 10px;">
                <div class="card">
                    <div class="car-header">
                        <h4>Shipping Details</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Shipping Name:</th>
                                    <td>{{$order->name}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Email:</th>
                                    <td>{{$order->email}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Phone:</th>
                                    <td>{{$order->phone}}:</td>
                                </tr>
                                <tr>
                                    <th>Shipping Division:</th>
                                    <td>{{$order->division->division_name}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping District:</th>
                                    <td>{{$order['district']['district_name']}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping State:</th>
                                    <td>{{$order['state']['state_name']}}</td>
                                </tr>
                                <tr>
                                    <th>Postal Code:</th>
                                    <td>{{$order->postal_code}}</td>
                                </tr>
                                <tr>
                                    <th>Order Date:</th>
                                    <td>{{$order->order_date}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-5" style="background-color: white !important; ">
                <div class="card">
                    <div class="car-header">
                        <h4>Order Details</h4>
                        <span class="text-danger">Invoice: {{$order->invoice_number}}</span>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Name:</th>
                                    <td>{{$order->user->name}}</td>
                                </tr>
                                <tr>
                                    <th>Email:</th>
                                    <td>{{$order->user->email}}</td>
                                </tr>
                                <tr>
                                    <th> Phone:</th>
                                    <td>{{$order->phone}}:</td>
                                </tr>
                                <tr>
                                    <th>Payment Type:</th>
                                    <td>{{$order->payment_method}}:</td>
                                </tr>
                                <tr>
                                    <th>Transaction ID:</th>
                                    <td>{{$order->transaction_id}}</td>
                                </tr>
                                <tr>
                                    <th>Invoice Number:</th>
                                    <td class="text-danger">{{$order->invoice_number}}</td>
                                </tr>
                                <tr>
                                    <th>Order Total:</th>
                                    <td>Rs {{$order->amount}}</td>
                                </tr>
                                <tr>
                                    <th>Order Status:</th>
                                    <td>
                                        <span class="badge badge-pill badge-warning" style="background-color: #418db9;">{{$order->status}}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table">
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
                            @foreach($order_items as $items)
                            <tr style="background-color: #e2e2e2;">
                                <td>
                                    <label for="">Image</label>
                                    <img src="{{ asset($items->product->product_thumbnail)}}" alt="{{$items->product->product_name_en}}" style="width: 100px; height: 100px;">
                                </td>
                                <td>
                                    <label for="">{{$items->product->product_name_en}}</label>
                                </td>
                                <td>
                                    <label for="">{{$items->product->product_code}}</label>
                                </td>
                                <td>
                                    <label for="">{{$items->color}}</label>
                                </td>
                                <td>
                                    <label for="">{{$items->size}}</label>
                                </td>
                                <td>
                                    <label for="">{{$items->qty}}</label>
                                </td>
                                <td>
                                    <label for="">Rs {{$items->price}}</label>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if($order->status !== "Delivered")
        @else
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-10">
                <form action="{{ route('cancel.order')}}" method="POST">
                    @csrf
                    <input type="hidden" name="order_id" value="{{$order->id}}">
                    <div class="form-group">
                        <label for="return_reason">Order Return Reason:</label>
                        <textarea name="return_description" id="" cols="130" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Cancel Order</button>
                    </div>

                </form>

            </div>
        </div>
        @endif

    </div>
</div>

@endsection