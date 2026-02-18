@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProjects')
@include('getFunction.getSites')
@include('getFunction.getAllTransactions')
@include('getFunction.getChartOfAccount')
@include('getFunction.getProductss')
@include('getFunction.getAccountPayable')
@include('getFunction.getCategory')
@include('Accounting.GeneralJournal.Functions.PopUp.PopUpGeneralJournalRevision')
@include('Accounting.GeneralJournal.Functions.PopUp.PopUpJournalSettlement')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Revision General Journal
                    </label>
                </div>
            </div>

            @include('Accounting.GeneralJournal.Functions.Menu.MenuGeneralJournal')

            <!-- CONTENT -->
            <div class="card">
                <!-- DETAIL JOURNAL SETTLEMENT -->
                <div class="tab-content detail-journal-settlement px-3 pb-2" id="nav-tabContent">
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

                                @include('Accounting.GeneralJournal.Functions.Header.HeaderRevisionJournalSettlement')
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="tab-content px-3 pb-2 journal-button" id="nav-tabContent">
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
        </div>
    </section>
</div>

@include('Partials.footer')
@endsection