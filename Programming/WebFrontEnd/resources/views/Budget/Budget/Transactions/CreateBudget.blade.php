@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProjects')
@include('getFunction.getSites')
@include('getFunction.getWorks')
@include('getFunction.getProductss')
@include('getFunction.getCurrencies')
@include('Budget.Budget.Functions.PopUp.PopUpBudgetRevision')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Budget
                    </label>
                </div>
            </div>

            @include('Budget.Budget.Functions.Menu.MenuBudget')

            @if($var == 0)
                <div class="card">
                    <!-- CUSTOMER ORDER -->
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Budget
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section Budget Information">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    @include('Budget.Budget.Functions.Header.HeaderBudget')
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- IMPORT FROM EXCEL -->
                    <div class="tab-content px-3 pb-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Import From Excel
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    @include('Budget.Budget.Functions.Header.HeaderImportFromExcel')
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIMELINE -->
                    <div class="tab-content px-3 pb-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Timeline
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    @include('Budget.Budget.Functions.Header.HeaderTimeline')
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BUTTON -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-default btn-sm float-right" onclick="" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Budget"> Submit
                                </button>

                                <a onclick="cancelForm('{{ route('Budget.index', ['var' => 1]) }}')" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Budget List Cart"> Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>

@include('Budget.Budget.Functions.Footer.FooterBudget')
@include('Partials.footer')
@endsection