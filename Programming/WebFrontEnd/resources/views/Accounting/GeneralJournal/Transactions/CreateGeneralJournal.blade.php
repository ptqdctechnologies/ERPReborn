@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getAllTransactions')
@include('getFunction.getChartOfAccount')
@include('getFunction.getProductss')
@include('getFunction.getAccountPayable')
@include('getFunction.getCategory')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        General Journal
                    </label>
                </div>
            </div>

            @include('Accounting.GeneralJournal.Functions.Menu.MenuGeneralJournal')

            @if($var == 0)
            <!-- CONTENT -->
            <div class="card">
                <!-- GENERAL JOURNAL -->
                <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- TITLE -->
                                <div class="card-header">
                                    <label class="card-title">
                                        General Journal
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                @include('Accounting.GeneralJournal.Functions.Header.HeaderGeneralJournal')
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DETAIL JOURNAL SETTLEMENT -->
                <div class="tab-content detail-journal-settlement px-3 pb-2" id="nav-tabContent" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- TITLE -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Detail Journal Settlement
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                @include('Accounting.GeneralJournal.Functions.Header.HeaderJournalSettlement')
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DETAIL JOURNAL ADJUSTMENT -->
                <div class="tab-content detail-journal-adjustment px-3 pb-2" id="nav-tabContent" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- TITLE -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Detail Journal Adjustment
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                @include('Accounting.GeneralJournal.Functions.Header.HeaderJournalAdjustment')
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DETAIL JOURNAL FIXED ASSET -->
                <div class="tab-content detail-journal-fixed-asset px-3 pb-2" id="nav-tabContent" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- TITLE -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Fixed Asset
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                @include('Accounting.GeneralJournal.Functions.Header.HeaderJournalFixedAsset')
                            </div>
                        </div>
                    </div>
                </div>

                <!-- REMARK -->
                <div class="tab-content px-3 pb-2 journal-remark" id="nav-tabContent" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- TITLE -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Remark
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- CONTENT -->
                                <div class="card-body">
                                    <div class="row py-3">
                                        <div class="col p-0">
                                            <textarea name="remark" id="remark" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="tab-content px-3 pb-2 journal-button" id="nav-tabContent" style="display: none;">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Account Payable"> Submit
                            </button>

                            <button type="button" class="btn btn-default btn-sm float-right" onclick="cancelForm('{{ route('GeneralJournal.index', ['var' => 1]) }}')" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Account Payable List Cart"> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>

@include('Accounting.GeneralJournal.Functions.Footer.FooterGeneralJournal')
@include('Accounting.GeneralJournal.Functions.Footer.FooterJournalFixedAsset')
@include('Accounting.GeneralJournal.Functions.Footer.FooterJournalSettlement')
@include('Partials.footer')
@endsection