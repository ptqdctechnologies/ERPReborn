@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProduk')
@include('Purchase.Purchase.Functions.PopUp.PopUpPrRevision')
@include('getFunction.getProject')

<div class="content-wrapper" style="position:relative;bottom:25px;">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Purchase Requisition</label>
        </div>
      </div>
      @include('Purchase.Purchase.Functions.Menu.MenuProcReq')
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
                  @include('Purchase.Purchase.Functions.Header.HeaderProcReq')
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
                                  <!-- <input type="file" class="form-control filenames_1" id="filenames_1" style="height:26px;" name="filenames"> -->
                                  <input id="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" type="file" onchange="javascript:(function(varObj, varReturnDOMObject) {if ((typeof varObj != 'undefined') &amp;&amp; (typeof varReturnDOMObject != 'undefined')) {var varObjFileList = varObj.files; if(varObjFileList.length > 0){try {varObj.disabled = true; varReturnDOMObject.disabled = true; var varReturn = ''; var varStagingTag = '::StgFlsRPK::OverWrite::'; var varAccumulatedFiles = 0; var varJSONDataBuilder = ''; var varRotateLog_FileUploadStagingArea_RefRPK = parseInt(JSON.parse(function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.getNewID', 'latest', {'applicationKey' : '{{ Session::get('SessionLogin') }}'}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }()).data.recordRPK);for(var i = 0; i < varObjFileList.length; i++){(function(varObjCurrentFile, i) {var varObjFileReader = new FileReader(); varObjFileReader.onloadend = function(event) {varAccumulatedFiles++; if(varAccumulatedFiles != 1) {varJSONDataBuilder = varJSONDataBuilder + ', '; }var varJSONDataBuilderNew = '{' + String.fromCharCode(34) + 'rotateLog_FileUploadStagingArea_RefRPK' + String.fromCharCode(34) + ' : ' + (varRotateLog_FileUploadStagingArea_RefRPK) + ', ' + String.fromCharCode(34) + 'sequence' + String.fromCharCode(34) + ' : ' + (i+1) + ', ' + String.fromCharCode(34) + 'name' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'size' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.size) + ', ' + String.fromCharCode(34) + 'MIME' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + ((event.target.result.split(',')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'extension' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name.split('.').pop().toLowerCase()) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'contentBase64' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(',') + 1)) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedDateTimeTZ' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedUnixTimestamp' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.lastModified) + '' + '}'; var varObjDOMInputTemp = document.createElement('INPUT'); varObjDOMInputTemp.setAttribute('type', 'text'); varObjDOMInputTemp.setAttribute('value', varJSONDataBuilderNew);varJSONDataBuilder = varJSONDataBuilder + varJSONDataBuilderNew; var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToLocalStorage', 'latest', {'entities' : JSON.parse(varObjDOMInputTemp.getAttribute('value'))}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();if(varAccumulatedFiles == varObjFileList.length) {var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToCloudStorage', 'latest', {'rotateLog_FileUploadStagingArea_RefRPK' : + varRotateLog_FileUploadStagingArea_RefRPK}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();varReturn = varRotateLog_FileUploadStagingArea_RefRPK; varObj.disabled = false; varReturnDOMObject.disabled = false; }}; varObjFileReader.readAsDataURL(varObjCurrentFile); }) (varObjFileList[i], i); } setTimeout((function() {try {if(varReturn!='') {if(varReturn == '[object Object]') {varObj.value=null; varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0]; alert('An internal error has occurred. Please to select file(s) again'); }else {varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0] + varStagingTag + varReturn; }return varReturn;}else {}}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Object\n(' + varError + ')'); }}), 500);}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Process\n(' + varError + ')'); }}}else {alert('ERP Reborn Error Notification\n\nInvalid DOM Objects'); }})(this, document.getElementById('dataInput_Log_FileUpload_Pointer_RefID'));">
                                  <input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" class="form-control filenames_1" value="" readonly="true">&nbsp;

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
                            <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Total</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Remark</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;width:10%;border:1px solid #e9ecef;">Balance</th>
                          </tr>
                        </thead>
                        <tbody>
                          <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                              &nbsp;<input id="putProductId" style="border-radius:0;" class="form-control" readonly>
                              <div class="input-group-append">
                                <span style="border-radius:0;" class="input-group-text form-control">
                                  <a href="#"><i id="product_id2" data-toggle="modal" data-target="#myProductArf" class="fas fa-gift" style="color:grey;"></i></a>
                                </span>
                              </div>
                            </div>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <input id="putProductName" style="border-radius:0;" type="text" class="form-control" readonly="">
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <input id="qtyCek" style="border-radius:0;" type="text" class="form-control ChangeQty quantity" autocomplete="off" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency">
                            <span id="putQtybyId"></span>
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
                            <input id="totalProcReqDetails" style="border-radius:0;" type="text" class="form-control" readonly="">
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <textarea id="putRemark" rows="1" cols="30" class="form-control"></textarea>
                          </td>
                          <td style="border:1px solid #e9ecef;">
                            <input id="totalBalance" style="border-radius:0;" type="text" class="form-control" readonly="">
                          </td>
                          <!-- Untuk Validasi -->
                          <input id="statusEditPr" style="border-radius:0;" type="hidden" class="form-control" readonly="" value="No">
                          <input id="ValidateQuantity" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                          <input id="ValidatePrice" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                          <input id="ValidateRemark" style="border-radius:0;" type="hidden" class="form-control">
                        </tbody>
                      </table>
                      <br>
                      <div style="padding-right:10px;">
                        <a class="btn btn-default btn-sm float-right CancelDetailPurchaseRequisition" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
                          <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel to Add Purchase Requisition List Cart"> Cancel
                        </a>
                        <a class="btn btn-default btn-sm float-right" onclick="addFromDetailtoCartJs();" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                          <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Purchase Requisition List"> Add
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
                        Purchase Requisition List (Cart)
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>

                    <div class="card-body table-responsive p-0" id="detailPurchaseRequisitionList">
                      <table class="table table-head-fixed text-nowrap table-sm TablePurchaseRequisition">
                        <thead>
                          <tr>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Action</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Product Id</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Product Name</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Qty</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Uom</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Price</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Total</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Currency</th>
                            <th style="padding-bottom: 10px;padding-top: 10px;border:1px solid #e9ecef;text-align: center;">Remark</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <a onclick="CancelPurchaseRequisition();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel Advance List Cart"> Cancel
                  </a>
                  <button class="btn btn-default btn-sm float-right" type="submit" id="submitPR" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/save.png') }}" width="13" alt="" title="Submit to Purchase Requisition"> Submit
                  </button>

                </div>
              </div>
            </div>
        </form>
      </div>
      @else
      <img src="{{ asset('AdminLTE-master/dist/img/qdc.png') }}" style="display: block;margin-left: auto;margin-right: auto;margin-left: auto;margin-right: auto;margin-top:20%; width: 20%;" alt="">
      @endif
    </div>
  </section>
</div>
@include('Partials.footer')

@include('Purchase.Purchase.Functions.Footer.FooterPurchaseRequisition')
@endsection