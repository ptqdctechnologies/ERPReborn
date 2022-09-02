@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProduk')
@include('Advance.Advance.Functions.PopUp.popUpArfRevision')
@include('Advance.Advance.Functions.PopUp.popUpSearchArfRevision')
@include('getFunction.getProject')
@include('Advance.Advance.Functions.PopUp.popUpRequesterArf')
@include('getFunction.getWorker')

<div class="content-wrapper" style="position:relative;bottom:12px;">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Advance Request</label>
        </div>
      </div>
      @include('Advance.Advance.Functions.Menu.MenuAdvanceRequest')
      @if($var == 0)
      <div class="card" style="position:relative;bottom:10px;">
        <form method="post" enctype="multipart/form-data" action="{{ route('AdvanceRequest.store') }}" id="formSubmitArf">
          @csrf
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Add New Advance Request
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  @include('Advance.Advance.Functions.Header.headerArf')
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
                    @include('getFunction.BOQ3')
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
                        <div class="col-md-6">
                          <div class="card-body table-responsive p-0" style="width:100%;">
                            <table class="table table-head-fixed text-nowrap">
                              <div class="form-group input_fields_wrap">
                                <div class="input-group control-group" style="width:100%;">


                                  <!-- <input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value="91000000000011" readonly="true">
                                  <input type="file" id="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" onchange="javascript: @php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxFunc_DOMInputFileContent(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(), $varAPIWebToken, 'Upload', 'dataInput_Log_FileUpload_Pointer_RefID', 'dataShow_ActionPanel', 'dataShow_MasterFileRecord'); @endphp;" />
                                  <div id="dataShow_MasterFileRecord" style="border-style:solid; border-width:1px;"></div>
                                  <div id="dataShow_ActionPanel" style="border-style:solid; border-width:1px;"></div>
 -->




                                  <div class="input-group-btn">
                                    <button style="background-color:#e9ecef;border:1px solid #ced4da;" class="btn btn-sm add_field_button" type="button"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="15" alt=""> Add</button>
                                  </div>
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
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Detail Transaction Request & Balance
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body table-responsive p-0" id="detailTransAvail">
                    <table class="table table-head-fixed text-nowrap table-sm" style="text-align: center;">
                      <thead>
                        <tr>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:15%;border:1px solid #e9ecef;">Product Id</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:20%;border:1px solid #e9ecef;">Product Name</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:5%;border:1px solid #e9ecef;">Qty</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:5%;border:1px solid #e9ecef;">Uom</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Unit Price</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:5%;border:1px solid #e9ecef;">Currency</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:15%;border:1px solid #e9ecef;">Total</th>
                          <th style="padding-bottom: 10px;padding-top: 10px;width:15%;border:1px solid #e9ecef;">Balance</th>
                        </tr>
                      </thead>
                      <tbody>
                        <td style="border:1px solid #e9ecef;">
                          <div class="input-group">
                            &nbsp;<input id="putProductId" style="border-radius:0;" class="form-control" readonly>
                            <div class="input-group-append">
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="#" id="product_id2" data-toggle="modal" data-target="#myProductArf"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                              </span>
                            </div>
                          </div>
                        </td>
                        <td style="border:1px solid #e9ecef;">
                          <input id="putProductName" style="border-radius:0;" type="text" class="form-control" readonly="">
                        </td>
                        <td style="border:1px solid #e9ecef;">
                          <input id="qtyCek" style="border-radius:0;" type="text" class="form-control ChangeQty quantity" autocomplete="off" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                          <input id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                        </td>
                        <td style="border:1px solid #e9ecef;">
                          <input id="putUom" style="border-radius:0;" type="text" class="form-control" readonly="">
                        </td>
                        <td style="border:1px solid #e9ecef;">
                          <input id="priceCek" style="border-radius:0;" type="text" class="form-control ChangePrice" autocomplete="off" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                          <input id="putPrice" style="border-radius:0;" type="hidden" class="form-control">
                        </td>
                        <td style="border:1px solid #e9ecef;">
                          <input id="putCurrency" style="border-radius:0;" type="text" class="form-control" readonly="">
                        </td>
                        <td style="border:1px solid #e9ecef;">
                          <input id="totalArfDetails" style="border-radius:0;" type="text" class="form-control" readonly="">
                        </td>
                        <td style="border:1px solid #e9ecef;">
                          <input id="totalBalance" style="border-radius:0;" type="text" class="form-control" readonly="">
                        </td>
                        <!-- Untuk Validasi -->
                        <input id="statusProduct" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                        <input id="statusEditArf" style="border-radius:0;" type="hidden" class="form-control" readonly="" value="No">
                        <input id="ValidateQuantity" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                        <input id="ValidatePrice" style="border-radius:0;" type="hidden" class="form-control" readonly="">

                      </tbody>
                    </table>
                    <div style="padding-right:10px;padding-top:10px;">
                      <a class="btn btn-default btn-sm float-right cancelDetailArf" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel to Add Advance List Cart"> Cancel
                      </a>
                      <a class="btn btn-default btn-sm float-right" onclick="addFromDetailtoCartJs();" id="addFromDetailtoCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Add
                      </a>
                    </div>
                    <br><br><br>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Advance List (Cart)
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>

                  <div class="card-body table-responsive p-0" id="detailArfList">
                    <table class="table table-head-fixed table-sm text-nowrap TableAdvance">
                      <thead>
                        <tr>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Action</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Id</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Qty</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Uom</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Price</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Total</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;">Currency</th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <table>
                          <tr>
                            <td><label>Remark&nbsp;&nbsp;</label></td>
                            <td>
                              <textarea name="var_remark" id="putRemark" rows="2" cols="1000" class="form-control"></textarea>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <a onclick="cancelAdvance();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                </a>
                <button class="btn btn-default btn-sm float-right" type="submit" id="submitArf" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                  <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Advance"> Submit
                </button>
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

@include('Advance.Advance.Functions.Footer.FooterAdvanceRequest')
@endsection