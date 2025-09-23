@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getTransporter')
@include('getFunction.getMaterialReceive')

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
                <!-- ADD NEW MATERIAL RETURN -->
                <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- HEADER -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Add New Material Return
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
                                                    MR Number
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="material_receive_number" style="border-radius:0;" class="form-control" size="20" readonly>
                                                        <input id="material_receive_id" name="material_receive_id" style="border-radius:0;" class="form-control" hidden>
                                                    </div>
                                                    <div>
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="javascript:;" id="materialReceiveTrigger" data-toggle="modal" data-target="#myGetModalMaterialReceive" style="display: block;">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="materialReceiveTrigger">
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- RIGHT COLUMN -->
                                        <div class="col-md-12 col-lg-5"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ADD NEW TRANSPORTER -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- HEADER -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Add New Transporter
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
                                                        <input id="transporter_name" style="border-radius:0;" class="form-control" size="20" readonly>
                                                        <input id="transporter_id" style="border-radius:0;" name="transporter_id" class="form-control" hidden>
                                                    </div>
                                                    <div>
                                                        <span style="border-radius:0;" class="input-group-text form-control myTransporter">
                                                            <a href="javascript:;" id="myTransporterTrigger" data-toggle="modal" data-target="#myTransporter" style="display: block;">
                                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myTransporterTrigger">
                                                            </a>
                                                        </span>
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
                                                        <input id="transporter_phone" style="border-radius:0;" class="form-control" size="20" readonly>
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
                                                        <input id="transporter_fax" style="border-radius:0;" class="form-control" size="20" readonly>
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
                                                        <input id="transporter_contact" style="border-radius:0;" class="form-control" size="20" readonly>
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
                                                        <input id="transporter_handphone" style="border-radius:0;" class="form-control" size="20" readonly>
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
                                                        <textarea id="transporter_address" rows="3" style="border-radius:0;" class="form-control" readonly></textarea>
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
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Valuta</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Note</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Receive</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 130px;">Qty Return</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 200px;">Note</th>
                                            </tr>
                                        </thead>
                                    </table>
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
            </div>
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Inventory.MaterialReturn.Functions.Footer.FooterMaterialReturnRevision')
@endsection