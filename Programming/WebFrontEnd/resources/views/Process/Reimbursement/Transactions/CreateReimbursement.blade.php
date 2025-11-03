@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProjects')
@include('getFunction.getSites')
@include('getFunction.getCustomer')
@include('getFunction.getBeneficiaries')
@include('getFunction.getBanks')
@include('getFunction.getBanksAccount')
@include('getFunction.getWorkFlow')
@include('getFunction.getReimbursement')
@include('Process.Reimbursement.Functions.PopUp.PopUpRemRevision')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Reimbursement
                    </label>
                </div>
            </div>

            <!-- MENU -->
            @include('Process.Reimbursement.Functions.Menu.MenuReimbursement')

            <?php if ($var == 0) { ?>
                <!-- CONTENT -->
                <div class="card">
                    <form method="post" action="{{ route('SelectWorkFlow') }}" id="FormSubmitReimbursement">
                    @csrf
                        <input type="hidden" name="DocumentTypeID" id="DocumentTypeID">
                        <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID">

                        <!-- ADD NEW REIMBURSEMENT -->
                        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Add New Reimbursement
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        @include('Process.Reimbursement.Functions.Header.HeaderReimbursement')
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- REIMBURSEMENT DETAIL -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Reimbursement Detail
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        @include('Process.Reimbursement.Functions.Header.HeaderReimbursementDetail')
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
                                                File Attachment
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section File Attachment">
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

                        <!-- REIMBURSEMENT DETAILS -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label class="card-title">
                                                Reimbursement Details
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section Budget Details">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- BODY -->
                                        <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
                                            <table class="table table-head-fixed text-nowrap table-sm" id="tableGetBudgetDetails">
                                                <thead>
                                                    <tr>
                                                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                                                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                                                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                                                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;background: #4B586A;color: white;width: 80px;">Qty</th>
                                                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;background: #4B586A;color: white;width: 100px;">Price</th>
                                                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;background: #4B586A;color: white;width: 150px;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                                <tfoot>
                                                    <tr class="loadingBudgetDetails">
                                                        <td colspan="11" class="p-0" style="border: 0px; height: 150px;">
                                                            <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                                <div class="spinner-border" role="status">
                                                                    <span class="sr-only">Loading...</span>
                                                                </div>
                                                                <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                                                                    Loading...
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr class="errorMessageContainerBudgetDetails">
                                                        <td colspan="11" class="p-0" style="border: 0px;">
                                                            <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                                <div id="errorMessageBudgetDetails" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>

                                        <!-- FOOTER -->
                                        <div class="card-body tableShowHideBudget">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="text-red" id="budgetDetailsMessage" style="display: none;">
                                                        Please input at least one item.
                                                    </div>
                                                </div>
                                                <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
                                                    Total : <span id="TotalBudgetSelected">0.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- REMARK -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <!-- HEADER -->
                                        <div class="card-header">
                                            <label for="remark" class="card-title">
                                                Remark
                                            </label>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse" aria-label="Collapse Section Remark">
                                                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <!-- CONTENT -->
                                        <div class="card-body">
                                            <div class="row py-3">
                                                <textarea name="var_remark" id="remark" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BUTTON -->
                        <div class="tab-content px-3 pb-2" id="nav-tabContent">
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                                    </button>
                                    <a onclick="cancelReimbursement()" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>
        </div>
    </section>
</div>

<div class="modal fade" id="reimbursementFormModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document" style="height: calc(100vh - 3.5rem); display: flex; align-items: center;">
        <div class="modal-content">
            <div class="modal-header">
                <h3 style="margin: 0px;font-weight:bold;">Are you sure you want to save this data?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="wrapper-budget card-body table-responsive p-0" style="max-height:200px;">
                    <table class="table table-head-fixed text-nowrap table-sm" id="tableRemList" style="border: 1px solid #dee2e6;">
                        <tbody></tbody>
                    </table>
                </div>
                <div class="card-body">
                    <table style="float:right;">
                        <tr>
                            <th id="GrandTotal"></th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="submitRem" class="btn btn-default btn-sm" onclick="submitForm();" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Rem"> Yes, save it
                </button>

                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Rem List Cart"> No, cancel
                </button>
            </div>
        </div>
    </div>
</div>

@include('Process.Reimbursement.Functions.Footer.FooterReimbursement')
@include('Partials.footer')
@endsection