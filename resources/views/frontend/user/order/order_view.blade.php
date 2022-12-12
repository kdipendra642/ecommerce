@extends('frontend.main_master')
@section('content')
<div class="body-content" style="margin-top: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                @include('frontend.body.sidebar')
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-8" style="background-color: white !important; padding-bottom: 10px;">
                <div class="card">
                    <h3 class="text-center">View your orders</h3>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr style="background-color: #e2e2e2;">
                                        <td class="col-md-1">
                                            <label for="">Date</label>
                                        </td>
                                        <td class="col-md-3">
                                            <label for="">Total</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">Payment</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">Invoice</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">Status</label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">
                                                Action
                                            </label>
                                        </td>
                                    </tr>
                                    @foreach($orders as $items)
                                    <tr>
                                        <td class="col-md-1">
                                            {{$items->order_date}}
                                        </td>
                                        <td class="col-md-3">
                                            Rs {{$items->amount}}
                                        </td>
                                        <td class="col-md-2">
                                            {{$items->payment_type}}
                                        </td>
                                        <td class="col-md-2">
                                            {{$items->invoice_number}}
                                        </td>
                                        <td class="col-md-2">
                                            @if($items->status == "Pending")
                                            <span class="badge badge-pill badge-warning" style="background-color: #800080;">
                                                {{$items->status}}
                                            </span>
                                            @elseif($items->status == "Confirm")
                                            <span class="badge badge-pill badge-warning" style="background-color: #0000ff;">
                                                {{$items->status}}
                                            </span>
                                            @elseif($items->status == "Processing")
                                            <span class="badge badge-pill badge-warning" style="background-color: #ffa500;">
                                                {{$items->status}}
                                            </span>
                                            @elseif($items->status == "Picked")
                                            <span class="badge badge-pill badge-warning" style="background-color: #808000;">
                                                {{$items->status}}
                                            </span>
                                            @elseif($items->status == "Shipped")
                                            <span class="badge badge-pill badge-warning" style="background-color: #808080;">
                                                {{$items->status}}
                                            </span>
                                            @elseif($items->status == "Delivered")
                                            <span class="badge badge-pill badge-warning" style="background-color: #008000;">
                                                {{$items->status}}
                                            </span>
                                            @elseif($items->status == "Cancelled")
                                            <span class="badge badge-pill badge-warning" style="background-color: #008000;">
                                                Delivered
                                            </span>
                                            @if($items->return_order == 1)
                                            <span class="badge badge-pill badge-warning" style="background-color: red;">
                                                Return requested
                                            </span>
                                            @endif
                                            @else
                                            <span class="badge badge-pill badge-warning" style="background-color: #418DB9;">
                                                {{$items->status}}
                                            </span>
                                            @endif


                                        </td>
                                        <td class="col-md-2">
                                            <a href="{{ route('order.details', $items->id) }}" class="btn btn-sm btn-primary btn-round"><i class="fa fa-eye"></i> View</a>
                                            <a href="{{ route('user.invoice.download', $items->id)}}" target="_blank" class="btn btn-sm btn-danger btn-round" style="margin-top: 5px;"><i class="fa fa-download"></i> Invoice</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection