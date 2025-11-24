@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProjects')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Create Customer Order
                    </label>
                </div>
            </div>

            @include('Sales.CustomerOrder.Functions.Menu.MenuCustomerOrder')

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
                                            Customer Order
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section Budget Information">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    @include('Sales.CustomerOrder.Functions.Header.HeaderCustomerOrder')
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FILE ATTACHMENT -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Attachment
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    <div class="card-body">
                                        <div class="row py-3">
                                            <div class="col-lg-5">
                                                <div class="row">
                                                    <div class="col p-0">
                                                        <input type="text" id="dataInput_Log_FileUpload" name="dataInput_Log_FileUpload_1" style="display:none">
                                                        <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                                                            $varAPIWebToken,
                                                            'dataInput_Log_FileUpload',
                                                            null,
                                                            'dataInput_Return'
                                                            ).
                                                        ''; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- IMPORT FROM EXCEL -->
                    <div class="tab-content px-3 pb-2" id="tab_import_from_excel" style="display: none;">
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

                                    <div class="card-body">
                                        <div class="row py-3" style="gap: 1rem;">
                                            <!-- CO FILE -->
                                            <div class="col-md-12 col-lg-5">
                                                <div class="row">
                                                    <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">CO File</label>
                                                    <div class="col-5 d-flex">
                                                        <div>
                                                            <span class="input-group-text form-control" style="border-radius: 0;">
                                                                <label id="uploadCOFile" style="display: block;margin-bottom: 0; cursor: pointer;">
                                                                    <i class="fas fa-paperclip"></i>
                                                                    <input type="file" id="excel_file" accept=".xls,.xlsx" style="display:none;">
                                                                </label>
                                                            </span>
                                                        </div>
                                                        <div style="flex: 100%;">
                                                            <div class="input-group">
                                                                <input type="text" id="excel_name" class="form-control" readonly style="border-radius:0; background-color: white;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: .3rem;">
                                                    <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                                                    <a href="{{ route('CustomerOrder.Download') }}" class="col">
                                                        Download Template
                                                    </a>
                                                </div>
                                            </div>

                                            <!-- GENERATE EXCEL -->
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px; border: 1px solid #e9ecef;">
                                                        <table class="table table-head-fixed text-nowrap table-sm" id="table_import_from_excel">
                                                            <thead>
                                                                <tr>
                                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;border-left:1px solid #e9ecef;text-align: center;">Sub Budget</th>
                                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Value</th>
                                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Notes</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ADD MANUALLY -->
                    <div class="tab-content px-3 pb-2" id="tab_add_manually" style="display: none;">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Add Manually
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
                                        <table class="table table-head-fixed text-nowrap table-sm" id="table_add_manually">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Action</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;width: 180px;">Sub Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;width: 180px;">Value</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Notes</th>
                                                </tr>
                                            </thead>
                                            <tbody id="table_tbody_add_manually"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BUTTON -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-default btn-sm float-right" onclick="submitJournalDetails()" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Account Payable"> Submit
                                </button>

                                <a onclick="cancelForm('{{ route('CustomerOrder.index', ['var' => 1]) }}')" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Account Payable List Cart"> Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
</div>

@include('Sales.CustomerOrder.Functions.Footer.FooterCustomerOrder')
@include('Partials.footer')
@endsection