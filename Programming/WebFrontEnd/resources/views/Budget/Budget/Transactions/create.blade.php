@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getBudgetCode')
    @include('getFunction.getSites')
    @include('getFunction.getProductss')
    @include('getFunction.getWorks')
    @include('getFunction.getCurrencies')
    @include('Budget.Budget.Functions.PopUp.summary')
    @include('Budget.Budget.Functions.PopUp.PopUpBudgetRevision')
    @include('Budget.Budget.Functions.PopUp.PopUpBudgetSCurve')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Create Budget
                        </label>
                    </div>
                </div>

                @include('Budget.Budget.Functions.Menu.index')

                <form id="budgetForm">
                    @csrf

                    <input type="hidden" id="workflow_path_id" name="workflow_path_id" />
                    <input type="hidden" id="workflow_comment" name="workflow_comment" />
                    <input type="hidden" id="data_store" name="data_store" />

                    <div class="card">
                        <!-- HEADER -->
                        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Header
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Header Information">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Budget.Budget.Functions.Header.header')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- IMPORT FROM EXCEL -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Detail
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Detail Information">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Budget.Budget.Functions.Header.import')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TIMELINE -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Timeline
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    aria-label="Collapse Section Timeline Information">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Budget.Budget.Functions.Header.timeline')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-default btn-sm float-right"
                                        onclick="validateForm()"
                                        style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt=""
                                            title="Submit to Budget"> Submit
                                    </button>

                                    <button type="button" class="btn btn-default btn-sm float-right"
                                        onclick="cancelForm('{{ route('Budget.index') }}')"
                                        style="background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt=""
                                            title="Cancel to Budget"> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    @include('Budget.Budget.Functions.Footer.create')
    @include('Partials.footer')
@endsection