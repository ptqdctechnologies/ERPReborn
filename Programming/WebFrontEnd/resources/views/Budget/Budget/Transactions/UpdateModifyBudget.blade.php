@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProject')
@include('getFunction.getProducts')
@include('getFunction.getProduct')
@include('getFunction.getCurrency')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITTLE -->
            <div class="row mb-1 title-pages">
                <div class="col-sm-6 title">
                    Update Modify Budget
                </div>
            </div>

            <form id="modifyBudgetForm" method="post" enctype="multipart/form-data" action="{{ route('Budget.PreviewModifyBudget') }}">
            @csrf
                <input type="hidden" id="hiddenBudgetData" name="hiddenBudgetData" value="{{ $hiddenBudgetData }}">

                <!-- CONTENT -->
                <div class="card">
                    <!-- Add New Advance Request -->
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Update Budget & Sub Budget Code
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        @include('Budget.Budget.Functions.Header.HeaderUpdateModifyBudget')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ADD NEW MODIFY BUDGET -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            Add New Modify Budget
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="py-3">
                                            <!-- =====REASON FOR MODIFY===== -->
                                            <div class="row" style="margin-bottom: 1rem;">
                                                <div class="col-lg-5">
                                                    <div class="row">
                                                        <label for="reason_modify" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Reason for Modify</label>
                                                        <div class="col-sm-9 col-md-8 col-lg-7 p-0">
                                                            <div class="input-group">
                                                                <input id="reason_modify" style="border-radius:0;" class="form-control" name="reason_modify" autocomplete="off" value="{{ request('reason') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- ADDITIONAL CO -->
                                            <div class="row">
                                                <div class="col-lg-5">
                                                    <div class="row">
                                                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Additional CO</label>
                                                        <div class="col-sm-9 col-md-8 col-lg-7 p-0" style="display: flex; gap: 16px;">
                                                            <div>
                                                                <input type="radio" name="additional_co" value="yes" {{ $additionalCO == 'yes' ? 'checked' : '' }}>
                                                                <label>Yes</label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="additional_co" value="no" {{ $additionalCO == 'no' ? 'checked' : '' }}>
                                                                <label>No</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- CURRENCY -->
                                            <div id="currency_field" class="row" style="margin-bottom: 1rem; display: none; margin-top: 1rem;">
                                                <div class="col-lg-5">
                                                    <div class="row">
                                                        <label for="currency_popup" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Currency</label>
                                                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                            <div>
                                                                <input id="currency_id" hidden name="currency_id" value="{{ request('currencyID') }}">
                                                                <input id="currency_symbol" style="border-radius:0; width: 40px;" class="form-control" name="currency_symbol" value="{{ request('currencySymbol') }}" readonly>
                                                            </div>
                                                            <div>
                                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                                    <a href="#" id="currency_popup" data-toggle="modal" data-target="#myCurrency" class="myCurrency">
                                                                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                                                    </a>
                                                                </span>
                                                            </div>
                                                            <div style="flex: 100%;">
                                                                <div class="input-group">
                                                                    <input id="currency_name" style="border-radius:0;" name="currency_name" class="form-control" value="{{ request('currencyName') }}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- EXCHANGE RATE -->
                                            <div id="value_idr_rate_field" class="row" style="margin-bottom: 1rem; display: none;">
                                                <div class="col-lg-5">
                                                    <div class="row">
                                                        <label for="value_idr_rate" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Exchange Rate</label>
                                                        <div class="col-sm-9 col-md-8 col-lg-2 p-0">
                                                            <div class="input-group">
                                                                <input id="value_idr_rate" style="border-radius:0;" class="form-control" name="value_idr_rate" value="{{ request('exchangeRate') && request('exchangeRate') != '-' ? request('exchangeRate') : '' }}" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- VALUE CO -->
                                            <div id="value_co_field" class="row" style="margin-bottom: 1rem; display: none;">
                                                <div class="col-lg-5">
                                                    <div class="row">
                                                        <label for="value_co" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Value CO(+/-)</label>
                                                        <div class="col-sm-9 col-md-8 col-lg-2 p-0">
                                                            <div class="input-group" data-toggle="tooltip" data-placement="top" title="Pesan">
                                                                <input id="value_co" style="border-radius:0;" class="form-control number-only" name="value_co" autocomplete="off" value="{{ request('valueCO') }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FILE ATTACHMENT -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <label class="card-title">
                                            File Attachment
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="row pt-3">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <div class="col p-0">
                                                        <input type="text" id="dataInput_Log_FileUpload_1" name="dataInput_Log_FileUpload_1" value="{{ $files }}" style="display:none">
                                                        @if($files)
                                                            <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile( \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                                            $varAPIWebToken,
                                                            'dataInput_Log_FileUpload_1',
                                                            $files,
                                                            'dataInput_Return'
                                                            ).
                                                            ''; ?>
                                                        @else
                                                            <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile( \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                                            $varAPIWebToken,
                                                            'dataInput_Log_FileUpload_1',
                                                            null,
                                                            'dataInput_Return'
                                                            ).
                                                            ''; ?>
                                                        @endif
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
                                    <div class="card-header">
                                        <label class="card-title">
                                            Budget Details
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Budget.Budget.Functions.Footer.footerUpdateModifyBudget')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css-page/ModifyBudget.css') }}">
@endpush