@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Report Budget
                        </label>
                    </div>
                </div>

                <div class="card">
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row p-1" style="row-gap: 1rem;">
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <!-- BUDGET -->
                                                <div class="row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0 text-bold">Budget</label>
                                                    <div
                                                        class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                                                        <div>
                                                            <span class="input-group-text form-control"
                                                                style="border-radius:0;cursor:pointer;">
                                                                <i id="iconBudget" class="fas fa-gift"></i>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <input type="text" class="form-control"
                                                                style="border-radius:0;background-color:white;" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="budgetMessage"
                                                    style="margin-top: .3rem;display: none;">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                                                    <div
                                                        class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end text-red">
                                                        Budget cannot be empty.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <!-- EXPORT -->
                                                <div class="row align-items-center"
                                                    style="margin-bottom: 1rem; gap: 0.5rem;">
                                                    <div>
                                                        <select name="print_type" id="print_type" class="form-control">
                                                            <option value="PDF">Export PDF</option>
                                                            <option value="EXCEL">Export Excel</option>
                                                        </select>
                                                    </div>
                                                    <button type="button" class="btn btn-default btn-sm"
                                                        onclick="validateExportButton()">
                                                        <span>
                                                            <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}"
                                                                width="17" alt="" />
                                                        </span>
                                                    </button>
                                                </div>

                                                <!-- SUBMIT -->
                                                <div class="row" style="gap: 0.5rem;">
                                                    <button type="button" class="btn btn-default btn-sm"
                                                        onclick="validateShowButton()" style="margin-top: -5px;">
                                                        <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}"
                                                            width="12" alt="show" title="Show">
                                                        Show
                                                    </button>
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        onclick="resetForm()" style="margin-top: -5px;">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12" id="table_container" style="display: inline-block;">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table table-head-fixed w-100" id="table_summary">
                                                <thead>
                                                    <tr>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 10px;">
                                                            No</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 100px">
                                                            Sub Budget</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 100px">
                                                            Work ID</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 100px">
                                                            Start</th>
                                                        <th
                                                            style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;width: 100px">
                                                            End</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('Partials.footer')
@endsection