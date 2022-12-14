@extends('frontend.main_master')
@section('content')
@section('title')
Order Tracking
@endsection

<style>
    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #157ed2
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #157ed2;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .itemside {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: 100%
    }

    .itemside .aside {
        position: relative;
        -ms-flex-negative: 0;
        flex-shrink: 0
    }

    .img-sm {
        width: 80px;
        height: 80px;
        padding: 7px
    }

    ul.row,
    ul.row-sm {
        list-style: none;
        padding: 0
    }

    .itemside .info {
        padding-left: 15px;
        padding-right: 7px
    }

    .itemside .title {
        display: block;
        margin-bottom: 5px;
        color: #212529
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem
    }

    .btn-warning {
        color: #ffffff;
        background-color: #157ed2;
        border-color: #157ed2;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #ff2b00;
        border-color: #ff2b00;
        border-radius: 1px
    }
</style>

<div class="container">
    <article class="card">
        <header class="card-header">
            <b>My Orders / Tracking</b>
        </header>
        <div class="card-body">
            <div class="container">
                <div class="row ">
                    <div class="col-md-2">
                        <b> Invoice Number </b><br>
                        {{ $track->invoice_no }}
                    </div> <!-- // end col md 2 -->

                    <div class="col-md-2">
                        <b> Order Date </b><br>
                        {{ $track->order_date }}
                    </div> <!-- // end col md 2 -->

                    <div class="col-md-2">
                        <b> Shipping By - {{ $track->name }} </b><br>
                        {{ $track->division->division_name }} / {{ $track->district->district_name }}
                    </div> <!-- // end col md 2 -->

                    <div class="col-md-2">
                        <b> User Mobile Number </b><br>
                        {{ $track->phone }}
                    </div> <!-- // end col md 2 -->

                    <div class="col-md-2">
                        <b> Payment Method </b><br>
                        {{ $track->payment_type  }}
                    </div> <!-- // end col md 2 -->

                    <div class="col-md-2">
                        <b> Total Amount </b><br>
                        $ {{ $track->amount  }}
                    </div> <!-- // end col md 2 -->
                </div>

            </div>


            <div class="track">
                @if($track->status == 'Pending')
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-clock-o"></i>
                    </span>
                    <span class="text">Order Pending</span>
                </div>

                @elseif($track->status == 'Confirm')
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-clock-o"></i>
                    </span>
                    <span class="text">Order Pending</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-check"></i>
                    </span>
                    <span class="text">Confirmed</span>
                </div>
                @elseif($track->status == 'Processing')
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-clock-o"></i>
                    </span>
                    <span class="text">Order Pending</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-check"></i>
                    </span>
                    <span class="text">Confirmed</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-spinner"></i>
                    </span>
                    <span class="text">Processing</span>
                </div>
                @elseif($track->status == 'Picked')
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-clock-o"></i>
                    </span>
                    <span class="text">Order Pending</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-check"></i>
                    </span>
                    <span class="text">Confirmed</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-spinner"></i>
                    </span>
                    <span class="text">Processing</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-truck"></i>
                    </span>
                    <span class="text">Picked</span>
                </div>
                @elseif($track->status == 'Shipped')
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-clock-o"></i>
                    </span>
                    <span class="text">Order Pending</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-check"></i>
                    </span>
                    <span class="text">Confirmed</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-spinner"></i>
                    </span>
                    <span class="text">Processing</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-truck"></i>
                    </span>
                    <span class="text">Picked</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-ship"></i>
                    </span>
                    <span class="text">Shipped</span>
                </div>
                @elseif($track->status == 'Delivered')
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-clock-o"></i>
                    </span>
                    <span class="text">Order Pending</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-check"></i>
                    </span>
                    <span class="text">Confirmed</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-spinner"></i>
                    </span>
                    <span class="text">Processing</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-truck"></i>
                    </span>
                    <span class="text">Picked</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-ship"></i>
                    </span>
                    <span class="text">Shipped</span>
                </div>
                <div class="step active">
                    <span class="icon">
                        <i class="fa fa-truck"></i>
                    </span>
                    <span class="text">Delivered</span>
                </div>
                @endif
            </div>
            <hr>
            <br>
            <hr>
        </div>
    </article>
</div>


@endsection