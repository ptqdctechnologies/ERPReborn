@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getJournal')
@include('getFunction.getBanksAccount')
@include('getFunction.getChartOfAccount')
@include('getFunction.getAllTransactions')
@include('getFunction.getWorkFlows')
@include('Finance.Journal.Functions.PopUp.PopUpJournalRevision')
@include('Finance.Journal.Functions.PopUp.PopUpJournalSummaryData')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Journal
                    </label>
                </div>
            </div>

            @include('Finance.Journal.Functions.Menu.MenuJournal')

            @if($var == 0)
            <!-- CONTENT -->
            <div class="card">
                <!-- JOURNAL -->
                <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- TITLE -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Journal
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                @include('Finance.Journal.Functions.Header.HeaderJournal')
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DETAIL JOURNAL -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- HEADER -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Detail Journal
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                @include('Finance.Journal.Functions.Table.TableJournal')
                            </div>
                        </div>
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Account Payable"> Submit
                            </button>

                            <button type="button" class="btn btn-default btn-sm float-right" onclick="cancelForm('{{ route('Journal.index', ['var' => 1]) }}')" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel to Account Payable"> Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>

@include('Finance.Journal.Functions.Footer.FooterJournal')
@include('Partials.footer')
@endsection