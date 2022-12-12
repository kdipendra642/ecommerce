@extends('admin.admin_master')
@section('admin')
<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    All Report List
                    <!-- <a href="{{ route('brand.create') }}" class="btn btn-success btn-rounded btn-sm" style="float:right;">Add Brand</a> -->
                </header>
                <div class="panel-body">
                </div>
            </section>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <section class="panel">
                <header class="panel-heading">
                    Search By Date
                </header>
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="{{ route('search.date.reports') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Select Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control" required="" data-validation-required-message="This field is required">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info">Search</button>
                    </form>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <section class="panel">
                <header class="panel-heading">
                    Search By Month
                </header>
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="{{ route('search.month.reports') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Select Month</label>
                            <div class="col-sm-10">
                                <select name="order_month" class="form-control" id="order_month">
                                    <option label="Choose Month"></option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Select Year</label>
                            <div class="col-sm-10">
                                <select name="order_year" class="form-control" id="order_year">
                                    <option label="Choose Year"></option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <section class="panel">
                <header class="panel-heading">
                    Search By Year
                </header>
                <div class="panel-body">
                    <form class="form-horizontal tasi-form" action="{{ route('search.year.reports') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Select Year</label>
                            <div class="col-sm-10">
                                <select name="order_year" class="form-control" id="order_year">
                                    <option label="Choose Year"></option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>


    <!-- page end-->
</section>



@endsection