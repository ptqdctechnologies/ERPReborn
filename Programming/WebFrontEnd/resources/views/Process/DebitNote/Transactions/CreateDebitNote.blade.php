@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getWorkFlow')
@include('getFunction.getReferenceReimbursementAccountPayable')
@include('getFunction.getDebitNote')
@include('getFunction.getChartOfAccount')
@include('Process.DebitNote.Functions.PopUp.PopUpDebitNoteRevision')
@include('Process.DebitNote.Functions.PopUp.PopUpDebitNoteSummaryData')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Debit Note
                    </label>
                </div>
            </div>

            @include('Process.DebitNote.Functions.Menu.MenuDebitNote')

            <!-- CONTENT -->
            @if($var == 0)
            <div class="card">
                <form method="post" action="{{ route('SelectWorkFlow') }}" id="debit_note_form">
                @csrf
                    <input type="hidden" name="DocumentTypeID" id="DocumentTypeID" value="<?= $documentType_RefID; ?>" />
                    <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID" />

                    <!-- ADD NEW DEBIT NOTE -->
                    <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Add New Debit Note
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    <div class="card-body">
                                        <div class="row py-3" style="gap: 15px;">
                                            <!-- REFERENCE NUMBER -->
                                            <div class="col-md-12 col-lg-5">
                                                <div class="row">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Reference Number</label>
                                                    <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                        <div>
                                                            <div class="input-group">
                                                                <input id="debit_note_reference_number" style="border-radius:0;" class="form-control" readonly>
                                                                <input id="debit_note_reference_id" name="debit_note_reference_id" style="border-radius:0;" class="form-control" hidden>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                                <a href="javascript:;" id="debit_note_reference_trigger" data-toggle="modal" data-target="#myGetModalReimbursementAccountPayable" style="display: block;">
                                                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box">
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="debit_note_reference_message" style="margin-top: .3rem; display: none;">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                                                    <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                        <div class="text-red">
                                                            Reference Number cannot be empty.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- PARTNER (CUSTOMER/SUPPLIER) -->
                                            <div class="col-md-12 col-lg-5">
                                                <div class="row">
                                                    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Customer</label>
                                                    <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                        <div>
                                                            <div class="input-group">
                                                                <input id="debit_note_partner_number" style="border-radius:0;" class="form-control" readonly>
                                                                <input id="debit_note_partner_id" name="debit_note_partner_id" style="border-radius:0;" class="form-control" hidden>
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
                                    <!-- HEADER -->
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

                    <!-- DEBIT NOTE DETAILS -->
                    <div class="tab-content px-3 pb-2" id="nav-tabContent">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- HEADER -->
                                    <div class="card-header">
                                        <label class="card-title">
                                            Debit Note Details
                                        </label>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- BODY -->
                                    <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
                                        <table class="table table-head-fixed text-nowrap table-sm" id="debit_note_details_table">
                                            <thead>
                                                <tr>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Reference Number</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Budget</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Balance</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 100px;">DN Value</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 100px;">DN Tax</th>
                                                    <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 150px;">COA</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                            <tfoot>
                                                <tr id="debit_note_loading_table" style="display: none;">
                                                    <td colspan="9" class="p-0" style="border: 0px; height: 150px;">
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
                                            </tfoot>
                                        </table>
                                    </div>

                                    <!-- FOOTER -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="text-red" id="debit_note_details_message" style="display: none;">
                                                    Please input at least one item.
                                                </div>
                                            </div>
                                            <div id="debit_note_details_total" class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
                                                Total 0.00
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
                                            Remarks
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
                                            <div class="col p-0">
                                                <textarea name="remarks" id="remarks" class="form-control"></textarea>
                                            </div>
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
                                <a id="debit_note_cancel_button" class="btn btn-default btn-sm float-right" onclick="cancelForm('{{ route('DebitNote.index', ['var' => 1]) }}')" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="cancel" title="Cancel Debit Note"> Cancel
                                </a>

                                <button type="button" id="debit_note_submit_button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="submit" title="Submit Debit Note"> Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Process.DebitNote.Functions.Footer.FooterCreateDebitNote')
@include('Process.DebitNote.Functions.Footer.FooterDebitNote')
@endsection