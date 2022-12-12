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
                    <h3 class="text-center">View your return orders</h3>
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
                                            <label for="">
                                                Return Reason
                                            </label>
                                        </td>
                                        <td class="col-md-2">
                                            <label for="">Status</label>
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
                                            {{$items->return_description}}

                                            <!-- <a href="{{ route('order.details', $items->id) }}" class="btn btn-sm btn-primary btn-round"><i class="fa fa-eye"></i> View</a>
                                                <a href="{{ route('user.invoice.download', $items->id)}}" target="_blank" class="btn btn-sm btn-danger btn-round" style="margin-top: 5px;"><i class="fa fa-download"></i> Invoice</a> -->
                                        </td>
                                        <td class="col-md-2">
                                            @if($items->return_order == 0)
                                            <span class="badge badge-pill badge-warning" style="background-color: #418DB9;">
                                                No Return Request
                                            </span>
                                            @elseif($items->return_order == 1)
                                            <span class="badge badge-pill badge-warning" style="background-color: #800000;">
                                                Pending
                                            </span>
                                            <span class="badge bg-danger" style="background-color: red;">
                                                Return Requested
                                            </span>
                                            @elseif($items->return_order == 2)
                                            <span class="badge badge-pill badge-warning" style="background-color: #008000;">
                                                Success
                                            </span>
                                            @endif
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