@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getPurchaseRequisition')
@include('getFunction.getWarehouse')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Order Picking
          </label>
        </div>
      </div>

      @include('Purchase.OrderPicking.Functions.Menu.MenuOrderPicking')
      @if($var == 0)
      <div class="card">

        <!-- ADD NEW ORDER PICKING -->
        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    Add New Order Picking
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                @include('Purchase.OrderPicking.Functions.Header.HeaderOrderPicking')
              </div>
            </div>
          </div>
        </div>

        <!-- FILE ATTACHMENTS -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    File Attachments
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
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
                  <br><br>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- PR DETAIL -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    PR Details
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                <!-- BODY -->
                <div class="wrapper-budget card-body table-responsive p-0" style="height: 230px;">
                  <table class="table table-head-fixed text-nowrap table-sm" id="tableGetBudgetDetails">
                    <thead>
                      <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">PR Number</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty PR</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Avail</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Stok</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;background-color: #4B586A;color: white;">Qty Req</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;background-color: #4B586A;color: white;">Balance</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                      <tr class="loadingBudgetDetails">
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
                      <tr class="errorMessageContainerBudgetDetails">
                        <td colspan="13" class="p-0" style="border: 0px;">
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
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ORDER PICKING (CART) -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    Order Picking List (Cart)
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                <!-- TABLE -->
                <div class="card-body table-responsive p-0" style="height:135px;">
                  <table class="table table-head-fixed text-nowrap table-sm" id="tablePurchaseRequisitionList">
                    <thead>
                      <tr>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">PR Number</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                        <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty Req</th>
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
                    <tr>
                      <td>
                        <br>
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
      @endif
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Purchase.OrderPicking.Functions.Footer.FooterOrderPicking')
@endsection