@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Account Payable
          </label>
        </div>
      </div>

      @include('Finance.AccountPayable.Functions.Menu.MenuAccountPayable')

      @if($var == 0)
      <div class="card">

        <input type="hidden" name="DocumentTypeID" id="DocumentTypeID" value="<?= $documentType_RefID; ?>">
        <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID">

        <!-- PO INFORMATION -->
        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    PO Information
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
                    <!-- LEFT -->
                    <div class="col-md-12 col-lg-5">
                      <!-- PURCHASE ORDER -->
                      <div class="row">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">PO Number</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <span class="input-group-text form-control" style="border-radius:0;">
                              <a href="javascript:;" id="purchase_order_trigger" data-toggle="modal" data-target="#myProjectSecond" style="display: block; cursor: pointer;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box">
                              </a>

                              <div id="purchase_order_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                              </div>
                            </span>
                          </div>
                          <div>
                            <div class="input-group">
                              <input id="purchase_order_number" class="form-control" size="16" readonly style="border-radius:0; background-color: white; cursor: default;">
                              <input id="purchase_order_id" name="purchase_order_id" style="border-radius:0;" class="form-control" hidden>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row" id="purchase_order_message" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div class="text-red">
                            Purchase Order cannot be empty.
                          </div>
                        </div>
                      </div>

                      <!-- SUPPLIER -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <div class="input-group">
                              <input id="purchase_order_supplier" style="border-radius:0;" class="form-control" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- CURRENCY -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Currency</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <div class="input-group">
                              <input id="purchase_order_currency" style="border-radius:0;" class="form-control" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- PAYMENT TERM -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Payment Term</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <div class="input-group">
                              <input id="purchase_order_payment_term" style="border-radius:0;" class="form-control" readonly>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="col-md-12 col-lg-5">
                      <!-- DELIVERY FROM -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Delivery From</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <div class="input-group">
                              <textarea id="purchase_order_delivery_from" cols="20" rows="4" class="form-control"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- DELIVERY TO -->
                      <div class="row" style="margin-bottom: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Delivery To</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <div class="input-group">
                              <textarea id="purchase_order_delivery_to" cols="20" rows="4" class="form-control"></textarea>
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

        <!-- ACCOUNT PAYABLE -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    Account Payable
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
                    <!-- LEFT -->
                    <div class="col-md-12 col-lg-5">
                      <!-- SUPPLIER INVOICE NUMBER -->
                      <div class="row">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier Invoice Number</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <div class="input-group">
                              <input id="purchase_order_supplier" style="border-radius:0;" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- PAYMENT TRANSFER TO -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Payment Transfer To</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <span class="input-group-text form-control" style="border-radius:0;">
                              <a href="javascript:;" id="purchase_order_trigger" data-toggle="modal" data-target="#myProjectSecond" style="display: block; cursor: pointer;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box">
                              </a>

                              <div id="purchase_order_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                              </div>
                            </span>
                          </div>
                          <div>
                            <div class="input-group">
                              <input id="purchase_order_number" class="form-control" size="16" readonly style="border-radius:0; background-color: white; cursor: default;">
                              <input id="purchase_order_id" name="purchase_order_id" style="border-radius:0;" class="form-control" hidden>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row" id="purchase_order_message" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div class="text-red">
                            Purchase Order cannot be empty.
                          </div>
                        </div>
                      </div>

                      <!-- RECEIPT/INVOICE ORIGIN -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Receipt/Invoice Origin</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div class="form-group d-flex" style="gap: 10%;">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                              <label for="customRadio1" class="custom-control-label" style="padding-top: 35%;">No</label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                              <label for="customRadio2" class="custom-control-label" style="padding-top: 28%;">Yes</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- CONTRACT/PO SIGNED -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Contract/PO Signed</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div class="form-group d-flex" style="gap: 10%;">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                              <label for="customRadio1" class="custom-control-label" style="padding-top: 35%;">No</label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                              <label for="customRadio2" class="custom-control-label" style="padding-top: 28%;">Yes</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- VAT Origin -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">VAT Origin</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div class="form-group d-flex" style="gap: 10%;">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                              <label for="customRadio1" class="custom-control-label" style="padding-top: 35%;">No</label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                              <label for="customRadio2" class="custom-control-label" style="padding-top: 28%;">Yes</label>
                            </div>
                            <div>
                              <select type="text" id="ppn" class="form-control" name="ppn" onchange="onChangeVAT(this)" style="border-radius:0;width:auto;">
                                <option value="No">10%</option>
                                <option value="Yes">20%</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- VAT NUMBER -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">VAT Number</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <div class="input-group">
                              <input id="purchase_order_supplier" style="border-radius:0;" class="form-control">
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- CONTRACT/PO SIGNED -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">BAST/FAT/PAT/DO Origin</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div class="form-group d-flex" style="gap: 10%;">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                              <label for="customRadio1" class="custom-control-label" style="padding-top: 35%;">No</label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                              <label for="customRadio2" class="custom-control-label" style="padding-top: 28%;">Yes</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- NOTES -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Notes</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <div class="input-group">
                              <textarea id="purchase_order_delivery_from" cols="20" rows="4" class="form-control"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="col-md-12 col-lg-5">
                      <!-- ASSET -->
                      <div class="row">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Asset</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div class="form-group d-flex" style="gap: 10%;">
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio">
                              <label for="customRadio1" class="custom-control-label" style="padding-top: 35%;">No</label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                              <label for="customRadio2" class="custom-control-label" style="padding-top: 28%;">Yes</label>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- CATEGORY -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Category</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <span class="input-group-text form-control" style="border-radius:0;">
                              <a href="javascript:;" id="purchase_order_trigger" data-toggle="modal" data-target="#myProjectSecond" style="display: block; cursor: pointer;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box">
                              </a>

                              <div id="purchase_order_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                              </div>
                            </span>
                          </div>
                          <div>
                            <div class="input-group">
                              <input id="purchase_order_number" class="form-control" size="15" readonly style="border-radius:0; background-color: white; cursor: default;">
                              <input id="purchase_order_id" name="purchase_order_id" style="border-radius:0;" class="form-control" hidden>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row" id="purchase_order_message" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div class="text-red">
                            Purchase Order cannot be empty.
                          </div>
                        </div>
                      </div>

                      <!-- DEPRECIATION RATE -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Depreciation Rate</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div id="containerSelectTOP">
                            <select class="form-control" name="termOfPaymentValue" id="termOfPaymentOption" style="border-radius:0;" type="text">
                              <option disabled selected>Straight Line</option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <!-- DEPRECIATION RATE -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Depreciation Method</label>
                        <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                          <div class="row">
                            <div class="col-4">
                              <input id="purchase_order_number" class="form-control" size="8" readonly style="border-radius:0; background-color: white; cursor: default;">
                            </div>
                            <div class="col">
                              <div class="row">
                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Years</label>
                                <div class="col-6">
                                  <input id="purchase_order_number" class="form-control" size="8" readonly style="border-radius:0; background-color: white; cursor: default;">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- DEPRECIATION COA -->
                      <div class="row" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Depreciation COA</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <span class="input-group-text form-control" style="border-radius:0;">
                              <a href="javascript:;" id="purchase_order_trigger" data-toggle="modal" data-target="#myProjectSecond" style="display: block; cursor: pointer;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box">
                              </a>

                              <div id="purchase_order_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                              </div>
                            </span>
                          </div>
                          <div>
                            <div class="input-group">
                              <input id="purchase_order_number" class="form-control" size="15" readonly style="border-radius:0; background-color: white; cursor: default;">
                              <input id="purchase_order_id" name="purchase_order_id" style="border-radius:0;" class="form-control" hidden>
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

        <!-- ACCOUNT PAYABLE DETAILS -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    Account Payable Details
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                <!-- BODY -->
                <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
                  <table class="table table-head-fixed text-nowrap table-sm" id="invoice_details_table">
                    <thead>
                      <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty PO</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price PO</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total PO</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 125px;">Qty AP</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 125px;">Total AP</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 125px;">WHT (2%)</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;background-color:#4B586A;border-right:1px solid #fff;text-align: center;color: white;width: 100px;padding-right: 0 !important;">COA</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                      <tr id="invoice_loading_table" style="display: none;">
                        <td colspan="5" class="p-0" style="border: 0px; height: 150px;">
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
                      <div class="text-red" id="invoice_details_message" style="display: none; margin-bottom: 1rem;">
                        Please input at least one item.
                      </div>
                      <div class="row">
                        <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">Deduction</label>
                        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                          <div>
                            <div class="input-group">
                              <input id="budget_details_deduction" class="form-control" style="border-radius:0;">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
                      <div id="invoice_details_total" class="col text-right" style="margin-bottom: 0.6rem;">
                        Total Tax Based: 0.00
                      </div>
                      <div id="invoice_details_total" class="col text-right" style="margin-bottom: 0.6rem;">
                        Total VAT: 0.00
                      </div>
                      <div id="invoice_details_total" class="col text-right" style="margin-bottom: 0.6rem;">
                        Total WHT: 0.00
                      </div>
                      <div id="invoice_details_vat" class="col text-right" style="margin-bottom: 0.6rem;">
                        Total Deduction: 0.00
                      </div>
                    </div>
                  </div>

                  <hr class="m-0" />
                  
                  <div class="row">
                    <div class="col"></div>
                    <div class="col" style="margin-right: 20px; font-size: 0.77rem; color: #212529; font-weight: 600;">
                      <div id="invoice_details_total" class="col text-right" style="margin-top: 0.6rem;">
                        Grand Total: 0.00
                      </div>
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
              <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
              </button>

              <a onclick="cancelForm('{{ route('Invoice.index', ['var' => 1]) }}')" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Purchase Order List Cart"> Cancel
              </a>
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Finance.Invoice.Functions.Footer.FooterCreateInvoice')
@endsection