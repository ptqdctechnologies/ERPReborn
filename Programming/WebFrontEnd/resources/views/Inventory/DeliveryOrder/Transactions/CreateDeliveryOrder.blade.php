@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('Inventory.DeliveryOrder.Functions.PopUp.PopUpDoRevision')
@include('getFunction.getReferenceNumber')
@include('getFunction.getTransporter')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- TITLE -->
            <div class="row mb-1" style="background-color:#4B586A;">
                <div class="col-sm-6" style="height:30px;">
                    <label style="font-size:15px;position:relative;top:7px;color:white;">
                        Delivery Order
                    </label>
                </div>
            </div>

            @include('Inventory.DeliveryOrder.Functions.Menu.MenuDeliveryOrder')
            @if($var == 0)
            <div class="card">
                <!-- ADD NEW DELIVERY ORDER -->
                <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- HEADER -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Add New Delivery Order
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
                                        <div class="col-md-12 col-lg-5">
                                            <div class="row">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                    Reference Number
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="reference_number" style="border-radius:0;" name="reference_number" class="form-control" size="20" readonly>
                                                        <input id="reference_id" style="border-radius:0;" name="reference_id" class="form-control" hidden>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                          <a href="javascript:;" id="referenceNumberTrigger" data-toggle="modal" data-target="#referenceNumberModal" style="display: block;">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="referenceNumberTrigger">
                                                          </a>
                                                        </span>
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

                <!-- TRANSPORTER DETAIL -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- HEADER -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Transporter Detail
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
                                            <div class="row" style="margin-bottom: 1rem;">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                    Transporter
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="transporter_name" style="border-radius:0;" name="transporter_name" class="form-control" size="20" readonly>
                                                        <input id="transporter_id" style="border-radius:0;" name="transporter_id" class="form-control" hidden>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control myTransporter">
                                                          <a href="javascript:;" id="myTransporterTrigger" data-toggle="modal" data-target="#myTransporter" style="display: block;">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myTransporterTrigger">
                                                          </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- TRANS. PHONE -->
                                            <div class="row" style="margin-bottom: 1rem;">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                    Trans. Phone
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="transporter_phone" style="border-radius:0;" name="transporter_phone" class="form-control" size="20" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- TRANS. FAX -->
                                            <div class="row">
                                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                                                    Trans. Fax
                                                </label>
                                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                                    <div>
                                                        <input id="transporter_fax" style="border-radius:0;" name="transporter_fax" class="form-control" size="20" readonly>
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
                                                        <input id="transporter_contact" style="border-radius:0;" name="transporter_contact" class="form-control" size="20" readonly>
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
                                                        <input id="transporter_handphone" style="border-radius:0;" name="transporter_handphone" class="form-control" size="20" readonly>
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
                                                        <textarea id="transporter_address" rows="3" name="transporter_address" style="border-radius:0;" class="form-control" readonly></textarea>
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

                <!-- REFERENCE NUMBER DETAIL -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- HEADER -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Reference Number Detail
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- BODY -->
                                <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
                                    <table class="table table-head-fixed text-nowrap table-sm" id="tableReferenceNumberDetail">
                                        <thead>
                                            <tr>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Reference Number</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Reference</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Req</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Balance</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Note</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                        <tfoot>
                                            <tr class="loadingReferenceNumberDetail">
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
                                              <tr class="errorMessageContainerReferenceNumberDetail">
                                                <td colspan="9" class="p-0" style="border: 0px;">
                                                  <div class="d-flex flex-column justify-content-center align-items-center py-3">
                                                    <div id="errorMessageReferenceNumberDetail" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
                                                  </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <!-- FOOTER -->
                                <div class="card-body tableShowHideBudget">
                                    <table style="float:right;">
                                        <tr>
                                            <th style="position: relative;right:20px;"> Total : <span id="TotalReferenceNumber">0.00</span></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <br>
                                                <a class="btn btn-default btn-sm float-right" id="reference-number-details-add" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                                    <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                                                </a>
                                                <a class="btn btn-default btn-sm float-right" id="reference-number-details-reset" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                                    <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Add to Advance List"> Reset
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- REFERENCE NUMBER LIST (CART) -->
                <div class="tab-content px-3 pb-2" id="nav-tabContent">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <!-- HEADER -->
                                <div class="card-header">
                                    <label class="card-title">
                                        Reference Number List (Cart)
                                    </label>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                        </button>
                                    </div>
                                </div>

                                <!-- BODY -->
                                <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
                                    <table class="table table-head-fixed text-nowrap table-sm" id="tableReferenceNumberList">
                                        <thead>
                                            <tr>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Reference Number</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Req</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Balance</th>
                                                <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Note</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>

                                <!-- FOOTER -->
                                <div class="card-body tableShowHideBudget">
                                    <table style="float:right;">
                                        <tr>
                                            <th style="position: relative;right:20px;"> Total : <span id="GrandTotal">0.00</span></th>
                                        </tr>
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
                            <a onclick="CancelDeliveryOrder()" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                            </a>

                            <button class="btn btn-default btn-sm float-right" type="submit" id="submitArf" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
</div>

@include('Partials.footer')
@include('Inventory.DeliveryOrder.Functions.Footer.FooterDeliveryOrder')
@endsection