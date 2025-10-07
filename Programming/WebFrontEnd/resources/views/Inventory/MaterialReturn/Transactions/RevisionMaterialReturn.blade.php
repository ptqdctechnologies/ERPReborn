@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getTransporter')
@include('getFunction.getMaterialReturn')
@include('getFunction.getMaterialReceive')
@include('Inventory.MaterialReturn.Functions.PopUp.PopUpMaterialReturnRevision')
@include('Inventory.MaterialReturn.Functions.PopUp.PopUpMaterialReturnSummaryData')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Material Return Revision
                    </label>
                </div>
            </div>

            @include('Inventory.MaterialReturn.Functions.Menu.MenuMaterialReturn')

            <!-- CONTENT -->
            <div class="card">
                <input type="hidden" name="DocumentTypeID" id="DocumentTypeID" />
                <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID" value="<?= $header['combinedBudget_RefID']; ?>" />

                <!-- MATERIAL RETURN -->
                <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- HEADER -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Material Return
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
                                        <!-- LEFT COLUMN -->
                                        <div class="col-md-12 col-lg-5">
                                            <!-- MATERIAL RECEIVE -->
                                            <div class="row">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                    Material Receive Number
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="material_receive_number" class="form-control" size="20" value="<?= $header['materialReturnNumber']; ?>" readonly style="border-radius:0;">
                                                        <input type="hidden" id="material_receive_id" class="form-control" name="material_receive_id" value="<?= $header['materialReturn_RefID']; ?>" style="border-radius:0;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- RIGHT COLUMN -->
                                        <div class="col-md-12 col-lg-5">
                                            <!-- BUDGET CODE -->
                                            <div class="row">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                    Budget Code
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="material_receive_budget_id" class="form-control" style="border-radius:0;" readonly value="<?= $header['combinedBudgetCode'] . " - " . $header['combinedBudgetName']; ?>">
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

                <!-- TRANSPORTER -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- HEADER -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Transporter
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
                                        <!-- LEFT COLUMN -->
                                        <div class="col-md-12 col-lg-5">
                                            <!-- TRANSPORTER -->
                                            <div class="row">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                    Transporter
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="transporter_name" style="border-radius:0;" class="form-control" size="20" readonly value="<?= $header['transporterName']; ?>" />
                                                        <input id="transporter_id" style="border-radius:0;" name="transporter_id" class="form-control" hidden value="<?= $header['transporter_RefID']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" id="transporterMessage" style="margin-top: .3rem;display: none;">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div class="text-red">
                                                        Transporter cannot be empty.
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- TRANS. PHONE -->
                                            <div class="row" style="margin-top: 1rem;">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                    Trans. Phone
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="transporter_phone" style="border-radius:0;" class="form-control" size="20" readonly value="<?= $header['transporterPhone']; ?>" />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- TRANS. FAX -->
                                            <div class="row" style="margin-top: 1rem;">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                    Trans. Fax
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="transporter_fax" style="border-radius:0;" class="form-control" size="20" readonly value="<?= $header['transporterFax']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- RIGHT COLUMN -->
                                        <div class="col-md-12 col-lg-5">
                                            <!-- TRANS. CONTACT PERSON -->
                                            <div class="row" style="margin-bottom: 1rem;">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                    Trans. Contact Person
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="transporter_contact" style="border-radius:0;" class="form-control" size="20" value="<?= $header['transporterContactPerson']; ?>" readonly />
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- TRANS. HANDPHONE -->
                                            <div class="row" style="margin-bottom: 1rem;">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                    Trans. Handphone
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="transporter_handphone" style="border-radius:0;" class="form-control" size="20" value="<?= $header['transporterHandphone']; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- TRANS. ADDRESS -->
                                            <div class="row">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                    Trans. Address
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <textarea id="transporter_address" rows="3" style="border-radius:0;" class="form-control" readonly><?= $header['transporterAddress']; ?></textarea>
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

                <!-- MATERIAL RETURN DETAILS -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- HEADER -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Material Return Details
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- BODY -->
                                <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
                                    <table class="table table-head-fixed text-nowrap table-sm" id="material_return_details_table">
                                        <thead>
                                            <tr>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Sub Budget</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Note</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Receive</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 130px;">Qty Return</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 200px;">Note</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>

                                <!-- FOOTER -->
                                <div class="card-body tableShowHideBudget">
                                    <div class="row">
                                        <div class="col">
                                            <div class="text-red" id="material_return_details_message" style="display: none;">
                                                Please input at least one item.
                                            </div>
                                        </div>
                                        <div class="col text-right" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
                                            Total : <span id="material_return_details_total">0.00</span>
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
                                            <textarea name="remarks" id="remarks" class="form-control"><?= $header['remarks']; ?></textarea>
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
                            <button type="button" id="material_return_submit_button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="submit" title="Submit Material Return"> Submit
                            </button>

                            <a id="material_return_cancel_button" class="btn btn-default btn-sm float-right" onclick="cancelForm('{{ route('MaterialReturn.index', ['var' => 1]) }}')" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="cancel" title="Cancel Material Return"> Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Inventory.MaterialReturn.Functions.Footer.FooterMaterialReturnRevision')
@endsection