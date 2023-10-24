@extends('Partials.app')
  @section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')
    @include('getFunction.getProject')
    @include('getFunction.getSite')
    @include('getFunction.getSupplier')
    @include('getFunction.getDeliverTo')
    @include('getFunction.getProduk')
    @include('Purchase.PurchaseOrder.Functions.PopUp.searchPR')


    <div class="content-wrapper">
      <section class="content">
        <div class="container-fluid">
          <div class="row mb-1" style="background-color:#4B586A;">
            <div class="col-sm-6" style="height:30px;">
              <label style="font-size:15px;position:relative;top:7px;color:white;">Purchase Order</label>
            </div>
          </div>
          @include('Purchase.PurchaseOrder.Functions.Menu.MenuPurchaseOrder')
          @if($var == 0)
            <div class="card" style="position:relative;bottom:10px;">
              <form method="post" enctype="multipart/form-data" action="{{ route('PurchaseOrder.store') }}" name="formPO">
                <div class="tab-content p-3" id="nav-tabContent">
                  <div class="row">
                    @csrf
                    <div class="col-12">
                      <div class="card">
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

                  <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <label class="card-title">
                              Create New Purchase Order
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
                          <div class="card-body fileAttachment">
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

                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <label class="card-title">
                            Purchase Order Detail 
                            <!-- &nbsp;&nbsp; || &nbsp;&nbsp; Select PR Number
                              <a href="#" id="pr_number2" data-toggle="modal" data-target="#mySearchPR"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></a> -->
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
                    <nav class="w-100">
                      <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active idExpense" id="product-comments-tab" data-toggle="tab" href="#expense" role="tab" aria-controls="product-comments" aria-selected="true"><span style="font-weight:bold;padding:10px;color:#212529;">PO Shopping Cart</span></a>&nbsp;&nbsp;&nbsp;
                        <a class="nav-item nav-link idAmount" id="product-desc-tab" data-toggle="tab" href="#amountdueto" role="tab" aria-controls="product-desc" aria-selected="false"><span style="font-weight:bold;padding:10px;color:#212529;">Price History</span></a>
                      </div><br>
                    </nav>

                    <div class="tab-pane fade show active" id="expense" role="tabpanel" aria-labelledby="product-comments-tab">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                            <div class="card-header">
                              <label class="card-title">
                                PO Shopping Cart
                              </label>
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                </button>
                              </div>
                            </div>

                            <div class="card-body table-responsive p-0 expenseCompanyCart"  style="height: 180px;" id="expenseCompanyCart">
                              <table class="table text-nowrap table-striped tableShoppingCart" id="tableShoppingCart">
                                <thead>
                                  <tr>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Trano</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Id</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">UOM</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Currency</th>
                                
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Description</th>          
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Price</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Total</th>
                                  </tr>
                                  
                                </thead>
                                <tbody>

                                </tbody>
                              </table>
                              <div class="card-body tableShowHidePRDetail">
                                <table style="float:right;">
                                  <tr>
                                    <th style="position: relative;right:20px;"> Total Request: <span id="TotalBudgetSelected">0.00</span></th>
                                  </tr>
                                  <tr>
                                    <th style="position: relative;right:20px;"> PPN: <span id="TotalPpn">0.00</span></th>
                                  </tr>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="amountdueto" role="tabpanel" aria-labelledby="product-desc-tab">
                      <div class="row">
                        <div class="col-12">
                          <div class="card">
                      
                            <div class="card-header">
                              <label class="card-title">
                                Price History
                              </label>
                              <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                  <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                                </button>
                              </div>
                            </div>

                            <div class="card-body table-responsive p-0" style="height: 180px;" id="amountCompanyCart">
                              <table class="table text-nowrap table-striped tableAmountDueto">
                                <thead>
                                  <tr>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Action</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Trano</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Id</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">UOM</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Price</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Total</th>
                                    <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Description</th>
                                  </tr>
                                </thead>
                                <tbody>

                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a onclick="CancelAdvanceSettlement();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                      <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                    </a>
                    <button class="btn btn-default btn-sm float-right" type="submit" id="SaveAsfList" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                      <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit"> Submit
                    </button>
                  </div>
                </form>
              </div>
          @endif
        </div>
      </section>
    </div>
    @include('Partials.footer')
    @include('Purchase.PurchaseOrder.Functions.Footer.footerPO')
  @endsection