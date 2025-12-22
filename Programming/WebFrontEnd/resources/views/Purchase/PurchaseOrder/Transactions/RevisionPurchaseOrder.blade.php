@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
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
            Revision Purchase Order
          </label>
        </div>
      </div>

      @include('Purchase.PurchaseOrder.Functions.Menu.MenuPurchaseOrder')
      <div class="card">
        <form method="post" action="{{ route('SelectWorkFlow') }}" id="FormSubmitRevisionPurchaseOrder">
        @csrf
          <input type="hidden" name="DocumentTypeID" id="DocumentTypeID" value="<?= $documentTypeRefID; ?>" />
          <input type="hidden" name="var_combinedBudget_RefID" id="var_combinedBudget_RefID" value="<?= $header['budgetID']; ?>" />
          <input type="hidden" name="purchaseOrderRecord_RefID" id="purchaseOrderRecord_RefID" />
          <input type="hidden" name="tariffCurrencyValue" id="tariffCurrencyValue" />
          <input type="hidden" name="transactionTaxDetail_RefID" id="transactionTaxDetail_RefID" value="<?= $header['transactionTaxDetailRefID']; ?>" />

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
                        <?php if ($header['fileID']) { ?>
                          <input type="text" id="dataInput_Log_FileUpload" name="dataInput_Log_FileUpload_1" style="display:none" value="<?= $header['fileID']; ?>">
                          <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                            $varAPIWebToken,
                            'dataInput_Log_FileUpload',
                            $header['fileID'],
                            'dataInput_Return'
                            ).
                          ''; ?>
                        <?php } else { ?>
                          <input type="text" id="dataInput_Log_FileUpload" name="dataInput_Log_FileUpload_1" style="display:none">
                          <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                            $varAPIWebToken,
                            'dataInput_Log_FileUpload',
                            null,
                            'dataInput_Return'
                            ).
                          ''; ?>
                        <?php } ?>
                      </div>
                    </div>
                    <br>
                  </div>
                </div>
              </div>
            </div>
          </div>

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

                  @include('Purchase.PurchaseOrder.Functions.Table.tableRevisionPRDetail')
                </div>
              </div>
            </div>
          </div>

          <!-- BUTTON -->
          <div class="tab-content px-3 pb-2" id="nav-tabContent">
            <div class="row">
              <div class="col">
                <button type="button" class="btn btn-default btn-sm float-right" onclick="validationForm()" style="background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                </button>

                <a onclick="cancelForm('{{ route('PurchaseOrder.index', ['var' => 1]) }}')" class="btn btn-default btn-sm float-right" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Purchase Order List Cart"> Cancel
                </a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

@include('Partials.footer')
@include('Purchase.PurchaseOrder.Functions.Footer.footerPORevision')
@endsection