@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getPurchaseRequisition')
@include('getFunction.getSuppliers')
@include('getFunction.getWorkFlow')
@include('getFunction.getPurchaseOrder')
@include('Purchase.PurchaseOrder.Functions.PopUp.PopUpPORevision')
@include('Purchase.PurchaseOrder.Functions.PopUp.PopUpPurchaseOrderSummaryData')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Purchase Order
          </label>
        </div>
      </div>

      @include('Purchase.PurchaseOrder.Functions.Menu.MenuPurchaseOrder')
      @if($var == 0)
        <div class="card">
          <form method="post" action="{{ route('SelectWorkFlow') }}" id="FormSubmitPurchaseOrder">
          @csrf
            <input type="hidden" name="DocumentTypeID" id="DocumentTypeID">
            <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID">
            <input type="hidden" name="tariffCurrencyValue" id="tariffCurrencyValue">

            <!-- CREATE NEW PURCHASE ORDER DETAIL -->
            <div class="tab-content px-3 pt-4 pb-2" id="nav-tabContent">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <!-- HEADER -->
                    <div class="card-header">
                      <label class="card-title">
                        Create New Purchase Order Detail
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>

                    @include('Purchase.PurchaseOrder.Functions.Header.headerPO')
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

            <!-- ADD NEW PURCHASE ORDER -->
            <div class="tab-content px-3 pb-2" id="nav-tabContent">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <!-- HEADER -->
                    <div class="card-header">
                      <label class="card-title">
                        Add New Purchase Order
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>

                    @include('Purchase.PurchaseOrder.Functions.Header.headerPO2')
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

            <!-- BUTTON -->
            <div class="tab-content px-3 pb-2" id="nav-tabContent">
              <div class="row">
                <div class="col">
                  <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="margin-left: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                  </button>

                  <a onclick="CancelPurchaseOrder()" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Purchase Order List Cart"> Cancel
                  </a>
                </div>
              </div>
            </div>
          </form>
        </div>
      @endif
    </div>
  </section>
</div>

@include('Purchase.PurchaseOrder.Functions.Footer.footerPO')
@include('Partials.footer')
@endsection