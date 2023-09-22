@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProduct')
@include('Purchase.PurchaseRequisition.Functions.PopUp.PopUpPrRevision')
@include('getFunction.getProject')
@include('getFunction.getWorkFlow')
@include('getFunction.getSupplier')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Purchase Requisition</label>
        </div>
      </div>
      @include('Purchase.PurchaseRequisition.Functions.Menu.MenuProcReq')
      @if($var == 0)
      <div class="card" style="position:relative;bottom:10px;">
        <form method="post" enctype="multipart/form-data" action="{{ route('PurchaseRequisition.store') }}" id="FormSubmitProcReq">
          @csrf
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Add New Purchase Requisition
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Purchase.PurchaseRequisition.Functions.Header.HeaderProcReq')
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card">
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
                  @include('Purchase.PurchaseRequisition.Functions.Header.HeaderProcReq')
                </div>
              </div>
            </div>
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
              <div class="row">
                <div class="col-12">
                  <div class="card">
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
                    <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                              <input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value="" readonly="true" name="dataInput_Log_FileUpload_Pointer_RefID">
                              <input type="file" id="dataInput_Log_FileUpload_Pointer_RefID_Action" name="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" onchange="javascript: @php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_DOMInputFileContent(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIWebToken, 'Upload', 'dataInput_Log_FileUpload_Pointer_RefID', 'dataInput_Log_FileUpload_Pointer_RefID_Action', 'dataShow_ActionPanel', 'dataShow_MasterFileRecord'); @endphp;" />
                          </div>
                          <br><br>
                          <div class="col-md-12">
                              <div class="card-body table-responsive p-0" style="height:125px;">

                                  <table class="table table-head-fixed table-sm text-nowrap">
                                      <div class="form-group input_fields_wrap">

                                          <div class="input-group control-group">

                                              <!-- <div id="dataShow_MasterFileRecord" style="border-style:solid; border-width:1px;"></div> -->
                                              <div id="dataShow_ActionPanel"></div>

                                          </div>
                                      </div>

                                  </table>

                              </div>
                          </div>

                        </div>
                    </div>
                  </div>
                </div>
              </div>


              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <div class="row">
                  <div class="col-12">
                    <div class="card">
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
                      @include('Purchase.PurchaseRequisition.Functions.Table.getBOQ')
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="card">
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

                    <div class="card-body table-responsive p-0 detailPurchaseRequisitionList" style="height: 135px;">
                      <table class="table table-head-fixed text-nowrap table-sm TablePurchaseRequisition" id="TablePurchaseRequisition">
                        <thead>
                          <tr>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Work Id</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Work Name</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Id</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Uom</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Currency</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Remark</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Price</th> 
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Total</th>
                          
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                    <div class="card-body detailPurchaseRequisitionList" >
                      <table style="float:right;">
                          <tr>
                              <th> Total Item : <span id="GrandTotal"></span></th>
                          </tr>
                      </table>
                    </div>

                    <div class="card-body detailPurchaseRequisitionList" >
                        <table style="float:right;">
                            <tr>
                                <th>
                                  <button class="btn btn-default btn-sm float-right" type="submit" id="submitPR" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Purchase Requisition"> Submit
                                  </button>
                                  <a onclick="CancelPurchaseRequisition();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                                  </a>
                                </th>
                            </tr>
                        </table>
                    </div>
                    
                  </div>
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

@include('Purchase.PurchaseRequisition.Functions.Footer.FooterPurchaseRequisition')
@endsection