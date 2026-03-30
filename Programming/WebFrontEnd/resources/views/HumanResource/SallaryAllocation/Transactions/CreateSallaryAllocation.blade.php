@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProjects')
@include('getFunction.getSites')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Sallary Allocation
                    </label>
                </div>
            </div>

            <!-- CONTENT -->
            @if($var == 0)
            <div class="card">
                <!-- SALLARY ALLOCATION -->
                <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- HEADER -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Sallary Allocation
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- BODY -->
                                <div class="card-body">
                                    <div class="row py-3" style="gap: 1rem;">
                                        <!-- BUDGET CODE -->
                                        <div class="col-md-12 col-lg-5">
                                            <div class="row">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
                                                <div class="col-5 d-flex">
                                                    <div>
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="javascript:;" id="myProjectsTrigger" data-toggle="modal" data-target="#myProjects" style="display: block;">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectsTrigger">
                                                            </a>

                                                            <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                                                                <span class="sr-only">Loading...</span>
                                                            </div>
                                                        </span>
                                                    </div>
                                                    <div style="flex: 100%;">
                                                        <div class="input-group">
                                                            <input id="budget_name" class="form-control" name="budget_name" readonly style="border-radius:0; background-color: white;">
                                                            <input id="budget_id" class="form-control" name="budget_id" hidden style="border-radius:0;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="budgetMessage" style="margin-top: .3rem;display: none;">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                                                <div class="col text-red">
                                                    Budget Code cannot be empty.
                                                </div>
                                            </div>
                                        </div>

                                        <!-- SUB BUDGET CODE -->
                                        <div class="col-md-12 col-lg-5">
                                            <div class="row">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget Code</label>
                                                <div class="col-5 d-flex">
                                                    <div>
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="javascript:;" id="mySitesTrigger" data-toggle="modal" data-target="#mySites">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySitesTrigger">
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div style="flex: 100%;">
                                                        <div class="input-group">
                                                            <input id="sub_budget_name" class="form-control" name="sub_budget_name" readonly style="border-radius:0; background-color: white;">
                                                            <input id="sub_budget_id" class="form-control" name="sub_budget_id" hidden style="border-radius:0;">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="subBudgetMessage" style="margin-top: .3rem;display: none;">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                                                <div class="col text-red">
                                                    Sub Budget Code cannot be empty.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BUDGET DETAILS -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- TITLE -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Budget Detail
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- BODY -->
                                <div class="wrapper-budget table-responsive card-body p-0" style="height: 12em;">
                                    <table id="budgetTable" class="table table-head-fixed text-wrap table-sm">
                                        <thead>
                                            <tr>
                                                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Action</th>
                                                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Work</th>
                                                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Product</th>
                                                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Currency</th>
                                                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Total Budget</th>
                                                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Balance Budget</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SALLARY ALLOCATION DETAIL -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- TITLE -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Sallary Allocation Detail
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- BODY -->
                                <div class="wrapper-budget table-responsive card-body p-0" style="height: 12em;">
                                    <table id="sallaryTable" class="table table-head-fixed text-wrap table-sm">
                                        <thead>
                                            <tr>
                                                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Action</th>
                                                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Budget</th>
                                                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Period</th>
                                                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Net Sallary</th>
                                                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Tax</th>
                                                <th style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important;">Provision THR & Bonus</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sallaryBodyTable"></tbody>
                                    </table>
                                </div>

                                <!-- FOOTER -->
                                <div class="card-body tableShowHideBudget">
                                    <div class="row" style="margin-bottom: 0.5rem;">
                                        <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
                                            Total Net Sallary: <span id="totalNetSallary">0.00</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 0.5rem;">
                                        <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
                                            Total Tax: <span id="totalTax">0.00</span>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 0.5rem;">
                                        <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
                                            Total Provision: <span id="totalProvision">0.00</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
                                            Grand Total: <span id="grandTotal">0.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="px-3 pb-3">
                    <div style="display: flex; justify-content: flex-end; gap: 8px;">
                        <button class="btn btn-default btn-sm button-submit" id="cancelButton" type="button" onclick="cancelForm('{{ route('BusinessTripRequest.index', ['var' => 1]) }}')">
                            <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" />
                            <div>Cancel</div>
                        </button>

                        <button type="button" class="btn btn-default btn-sm button-submit" onclick="validationForm()">
                            <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" />
                            <div>Submit</div>
                        </button>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>

@include('Partials.footer')
@include('HumanResource.SallaryAllocation.Functions.Footer.FooterSallaryAllocation')
@endsection