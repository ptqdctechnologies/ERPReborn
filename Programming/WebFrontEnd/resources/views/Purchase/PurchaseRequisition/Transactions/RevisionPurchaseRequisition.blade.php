@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getDeliverTo')
@include('getFunction.getWorkFlow')
@include('getFunction.getPurchaseRequisition')
@include('Purchase.PurchaseRequisition.Functions.PopUp.PopUpPrRevision')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Revision Purchase Requisition
          </label>
        </div>
      </div>

      @include('Purchase.PurchaseOrder.Functions.Menu.MenuPurchaseOrder')
      <div class="card">
        <input type="hidden" name="DocumentTypeID" id="DocumentTypeID">
        <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID">
        <input type="hidden" id="purchaseRequisitionDetail" value='<?= json_encode($detail ?? []) ?>'>

        <!-- PURCHASE REQUISITION -->
        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    Purchase Requisition
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                @include('Purchase.PurchaseRequisition.Functions.Header.HeaderProcReqRevision')
              </div>
            </div>
          </div>
        </div>

        <!-- PURCHASE REQUISITION DETAIL -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    Purchase Requisition Detail
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                @include('Purchase.PurchaseRequisition.Functions.Header.HeaderProcReq2Revision')
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

        <!-- BUDGET DETAILS -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
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

                {{-- @include('Purchase.PurchaseRequisition.Functions.Table.getBOQ') --}}

                <!-- BODY -->
                <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
                  <table class="table table-head-fixed text-nowrap table-sm" id="tableGetPRDetails">
                    <thead>
                      <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Budget</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Unit Price</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total Budget</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                        <th class="sticky-col fifth-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Qty Req</th>
                        <th class="sticky-col forth-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Price Req</th>
                        <th class="sticky-col third-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Total Req</th>
                        <th class="sticky-col second-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Balance Qty</th>
                        <th class="sticky-col first-col-pr" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Remark</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                      <tr class="loadingPRDetails">
                        <td colspan="13" class="p-0" style="border: 0px; height: 150px;">
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
                      <tr class="errorMessageContainerPRDetails">
                        <td colspan="13" class="p-0" style="border: 0px;">
                          <div class="d-flex flex-column justify-content-center align-items-center py-3">
                            <div id="errorMessagePRDetails" class="mt-3 text-red" style="font-size: 1rem; font-weight: 700;"></div>
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
                      <th style="position: relative;right:20px;"> Total : <span id="TotalBudgetSelected">0.00</span></th>
                    </tr>
                    <tr>
                      <td>
                        <br>
                        <a class="btn btn-default btn-sm float-right" id="budget-details-add" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                          <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                        </a>
                        <a class="btn btn-default btn-sm float-right" id="budget-details-reset" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
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

        <!-- PURCHASE REQUISITION (CART) -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    Purchase Requisition List (Cart)
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                <!-- TABLE -->
                <div class="card-body table-responsive p-0" style="height:135px;">
                  <table class="table table-head-fixed text-nowrap table-sm" id="tablePRDetailList">
                    <thead>
                      <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Remark</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>

                <!-- FOOTER -->
                <div class="card-body">
                  <table style="float:right;">
                    <tr>
                      <th> Total Item :
                        <span id="GrandTotal">0.00</span>
                      </th>
                    </tr>
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
              <a class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
              </a>

              <button class="btn btn-default btn-sm float-right" type="submit" id="submitPR" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Purchase.PurchaseRequisition.Functions.Footer.FooterPurchaseRequisitionRevision')
@endsection