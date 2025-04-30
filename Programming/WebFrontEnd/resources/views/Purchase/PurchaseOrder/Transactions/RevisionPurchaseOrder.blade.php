@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Revision Purchase Order
          </label>
        </div>
      </div>

      @include('Purchase.PurchaseOrder.Functions.Menu.MenuPurchaseOrder')
      <div class="card">
        <input type="hidden" name="DocumentTypeID" id="DocumentTypeID">
        <input type="hidden" id="DataPurchaseOrderDetail" value='<?= json_encode($detail ?? []) ?>'>
        
        <!-- PURCHASE ORDER -->
        <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    Purchase Order
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                @include('Purchase.PurchaseOrder.Functions.Header.headerPO2Revision')
              </div>
            </div>
          </div>
        </div>

        <!-- PURCHASE ORDER DETAIL -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    Purchase Order Detail
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                @include('Purchase.PurchaseOrder.Functions.Header.headerPORevision')
              </div>
            </div>
          </div>
        </div>

        <!-- FILE ATTACHMENTS -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
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

        <!-- PURCHASE ORDER DETAIL -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    Purchase Order Detail
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                @include('Purchase.PurchaseOrder.Functions.Table.tablePRDetail')
              </div>
            </div>
          </div>
        </div>

        <!-- PURCHASE ORDER LIST (CART) -->
        <div class="tab-content px-3 pb-2" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    Purchase Order List (Cart)
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>

                <!-- TABLE -->
                <div class="card-body table-responsive p-0" style="height:135px;">
                  <table class="table table-head-fixed text-nowrap table-sm" id="tablePurchaseOrderList">
                    <thead>
                      <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">MSR Number</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Code</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Product Name</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">UOM</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Currency</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Price</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Qty</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Total</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border-right:1px solid #e9ecef;text-align: center;">Remark</th>
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
              <a onclick="CancelPurchaseOrder()" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Purchase Order List Cart"> Cancel
              </a>

              <button class="btn btn-default btn-sm float-right" type="submit" id="submitPurchaseOrder" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;" disabled>
                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Purchase Order"> Submit
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Purchase.PurchaseOrder.Functions.Footer.footerPORevision')
@endsection