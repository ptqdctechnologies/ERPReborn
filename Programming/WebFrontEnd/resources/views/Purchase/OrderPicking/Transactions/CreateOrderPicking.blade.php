@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getSupplier')
@include('getFunction.getDeliverTo')
@include('getFunction.getProduct')
@include('Purchase.OrderPicking.Functions.PopUp.SearchPurchaseRequest')
@include('Purchase.OrderPicking.Functions.PopUp.SearchOrderPicking')


<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">OrderPicking</label>
        </div>
      </div>
      @include('Purchase.OrderPicking.Functions.Menu.MenuOrderPicking')
      @if($var == 0)
      <div class="card" style="position:relative;bottom:10px;">
        <form method="post" enctype="multipart/form-data" action="{{ route('OrderPicking.store') }}" name="formPO">
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="row">
              @csrf
              <div class="col-12">
                <div class="card">
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

            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
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
                          <input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" readonly="true" name="dataInput_Log_FileUpload_Pointer_RefID">
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

              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        Stock List
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0 MaterialReceiveCart" style="height: 180px;">
                      <table class="table table-head-fixed text-nowrap table-striped TableMaterialReceiveCart" id="TableMaterialReceiveCart">
                        <thead>
                          <tr>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Action</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Product</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Qty Available</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">UOM</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Average Price</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                    <div class="card-body AdvanceListCart">
                      <table style="float:right;">
                        <tr>
                          <th style="position: relative;right:15px;"> Total Item : <span id="TotalQty">
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <label class="card-title">
                        Order Picking List
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0 MaterialReceiveCart" style="height: 180px;">
                      <table class="table table-head-fixed text-nowrap table-striped TableDorDetail">
                        <thead>
                          <tr>
                            <th style="border:1px solid #e9ecef;text-align: center;">Product</th>
                            <th style="border:1px solid #e9ecef;text-align: center;">Qty Stock</th>
                            <th style="border:1px solid #e9ecef;text-align: center;">UOM</th>
                            <th style="border:1px solid #e9ecef;text-align: center;">Average Price</th>
                            <th style="border:1px solid #e9ecef;text-align: center;">Total</th>
                            <th class="sticky-col second-col-dor-qty" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Qty Request</th>
                            <th class="sticky-col first-col-dor-note" style="padding-top: 10px;padding-bottom: 10px;text-align: center;background-color:#4B586A;color:white;">Balance</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                    <div class="card-body AdvanceListCart">
                      <table style="float:right;">
                        <tr>
                          <th style="position: relative;right:15px;"> Total Item : <span id="TotalQty">
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <a onclick="CancelAdvanceSettlement();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
              </a>
              <button class="btn btn-default btn-sm float-right" type="submit" id="SaveAsfList" style="margin-right: 5px;margin-bottom: 15px;background-color:#e9ecef;border:1px solid #ced4da;">
                <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit"> Submit
              </button>
            </div>
          </div>
        </form>
      </div>
      @endif
    </div>
  </section>
</div>
@include('Partials.footer')
@include('Purchase.OrderPicking.Functions.Footer.FooterOrderPicking')
@endsection