@extends('Partials.app')
@section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getBanksAccount')
    @include('getFunction.getChartOfAccount')
    @include('getFunction.getAllTransactions')
    @include('Finance.Journal.Functions.PopUp.summary')

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <!-- TITLE -->
                <div class="row mb-1" style="background-color:#4B586A;">
                    <div class="col-sm-6" style="height:30px;">
                        <label style="font-size:15px;position:relative;top:7px;color:white;">
                            Create Cash & Bank
                        </label>
                    </div>
                </div>

                @include('Finance.Journal.Functions.Menu.index')

                <form id="journalForm">
                    @csrf

                    <input type="hidden" id="workflow_path_id" name="workflow_path_id" />
                    <input type="hidden" id="workflow_comment" name="workflow_comment" />
                    <input type="hidden" id="journal_details" name="journal_details" />

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
                                                    aria-label="Collapse Section Headers">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Finance.Journal.Functions.Header.sectionOne')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- DETAIL -->
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
                                                    aria-label="Collapse Section Details">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        @include('Finance.Journal.Functions.Header.sectionTwo')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col">
                                    <button type="button" id="journal_submit_button"
                                        class="btn btn-default btn-sm float-right" data-toggle="modal"
                                        data-target="#journal_summary_modal" onclick="validationForm()"
                                        style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="submit"
                                            title="Submit to Journal" />
                                        Submit
                                    </button>
                                    <button type="button" id="journal_cancel_button"
                                        class="btn btn-default btn-sm float-right"
                                        onclick="cancelForm('{{ route('Journal.index') }}')"
                                        style="background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13"
                                            alt="cancel" title="Cancel to Journal"> Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    @include('Finance.Journal.Functions.Footer.index')
    @include('Finance.Journal.Functions.Footer.create')
    @include('Partials.footer')
@endsection