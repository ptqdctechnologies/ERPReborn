@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')
@include('getFunction.getSite')
@include('getFunction.getRequester')
@include('getFunction.getProduk')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <form method="post" enctype="multipart/form-data" action="#" id="formCreateArf">
          @csrf
          <div class="tab-content p-3" id="nav-tabContent">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Add New Advanced
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
                        Advance
                      </label>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <table>
                              <tr>
                                <td><label>Requester Name</label></td>
                                <td>
                                  <div class="input-group">
                                    <input name="request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly>
                                    <div class="input-group-append">
                                      <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#"><i id="request_name2" data-toggle="modal" data-target="#myRequester" class="fas fa-gift" style="color:grey;"></i></a>
                                      </span>
                                    </div>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td><label>Name Of Beneficiary</label></td>
                                <td>
                                  <div class="input-group">
                                    <input name="beneficiary" id="beneficiary" style="border-radius:0;" type="text" class="form-control">
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td><Label>Internal Notes</Label></td>
                                <td>
                                  <div class="input-group">
                                    <textarea name="internal_notes" id="internal_notes" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <table>
                              <tr>
                                <td><label>Bank Name</label></td>
                                <td>
                                  <div class="input-group">
                                    <input name="bank_name" id="bank_name" style="border-radius:0;" type="text" class="form-control">
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td><label>Account Name</label></td>
                                <td>
                                  <div class="input-group">
                                    <input name="account_name" id="account_name" style="border-radius:0;" type="text" class="form-control">
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td><label>Account Number</label></td>
                                <td>
                                  <div class="input-group">
                                    <input name="account_number" id="account_number" style="border-radius:0;" type="number" class="form-control">
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>


                        <div class="col-md-4">
                          <div class="form-group">
                            <table>
                              <tr>
                                <td><label>Attach File</label></td>
                                <td>
                                  <div class="form-group input_fields_wrap">
                                    <div class="input-group control-group">
                                      <input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" value="" readonly="true">
                                      <input id="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" type="file" onchange="javascript:(function(varObj, varReturnDOMObject) {if ((typeof varObj != 'undefined') &amp;&amp; (typeof varReturnDOMObject != 'undefined')) {var varObjFileList = varObj.files; if(varObjFileList.length > 0){try {varObj.disabled = true; varReturnDOMObject.disabled = true; var varReturn = ''; var varStagingTag = '::StgFlsRPK::OverWrite::'; var varAccumulatedFiles = 0; var varJSONDataBuilder = ''; var varRotateLog_FileUploadStagingArea_RefRPK = parseInt(JSON.parse(function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.getNewID', 'latest', {'applicationKey' : '{{ Session::get('SessionLogin') }}'}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }()).data.recordRPK);for(var i = 0; i < varObjFileList.length; i++){(function(varObjCurrentFile, i) {var varObjFileReader = new FileReader(); varObjFileReader.onloadend = function(event) {varAccumulatedFiles++; if(varAccumulatedFiles != 1) {varJSONDataBuilder = varJSONDataBuilder + ', '; }var varJSONDataBuilderNew = '{' + String.fromCharCode(34) + 'rotateLog_FileUploadStagingArea_RefRPK' + String.fromCharCode(34) + ' : ' + (varRotateLog_FileUploadStagingArea_RefRPK) + ', ' + String.fromCharCode(34) + 'sequence' + String.fromCharCode(34) + ' : ' + (i+1) + ', ' + String.fromCharCode(34) + 'name' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'size' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.size) + ', ' + String.fromCharCode(34) + 'MIME' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + ((event.target.result.split(',')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'extension' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name.split('.').pop().toLowerCase()) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'contentBase64' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(',') + 1)) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedDateTimeTZ' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedUnixTimestamp' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.lastModified) + '' + '}'; var varObjDOMInputTemp = document.createElement('INPUT'); varObjDOMInputTemp.setAttribute('type', 'text'); varObjDOMInputTemp.setAttribute('value', varJSONDataBuilderNew);varJSONDataBuilder = varJSONDataBuilder + varJSONDataBuilderNew; var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToLocalStorage', 'latest', {'entities' : JSON.parse(varObjDOMInputTemp.getAttribute('value'))}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();if(varAccumulatedFiles == varObjFileList.length) {var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToCloudStorage', 'latest', {'rotateLog_FileUploadStagingArea_RefRPK' : + varRotateLog_FileUploadStagingArea_RefRPK}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();varReturn = varRotateLog_FileUploadStagingArea_RefRPK; varObj.disabled = false; varReturnDOMObject.disabled = false; }}; varObjFileReader.readAsDataURL(varObjCurrentFile); }) (varObjFileList[i], i); } setTimeout((function() {try {if(varReturn!='') {if(varReturn == '[object Object]') {varObj.value=null; varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0]; alert('An internal error has occurred. Please to select file(s) again'); }else {varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0] + varStagingTag + varReturn; }return varReturn;}else {}}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Object\n(' + varError + ')'); }}), 500);}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Process\n(' + varError + ')'); }}}else {alert('ERP Reborn Error Notification\n\nInvalid DOM Objects'); }})(this, document.getElementById('dataInput_Log_FileUpload_Pointer_RefID'));">
                                    </div>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <form method="post" enctype="multipart/form-data">
              @csrf
              <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="product-desc-tab">
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
                      <div class="card-body" id="detailTransAvail">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <table>
                                <tr>
                                  <td><label>Product Id</label></td>
                                  <td>
                                    <div class="input-group">
                                      <input id="putProductId" style="border-radius:0;width:60px;" name="putProductId" class="form-control" readonly>
                                      <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                          <a href="#"><i id="product_id2" data-toggle="modal" data-target="#myProductArf" class="fas fa-gift" style="color:grey;"></i></a>
                                        </span>
                                      </div>
                                    </div>
                                  </td>
                                  <td>
                                    <input name="product_name" id="putProductName" style="border-radius:0;width:95px;" type="text" class="form-control" readonly="">
                                  </td>
                                  <td>
                                    <div id="iconProductId" style="color:red;margin-left:3px;" title="Please input product id"><span id="iconProductId2">!</span></div>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Qty</label></td>
                                  <td>
                                    <input name="qtyx" id="qtyCek" style="border-radius:0;width:90px;" type="number" class="form-control ChangeQty quantity" value="0" autocomplete="off">
                                    <span id="putQtybyId"></span>
                                    <input name="qty" id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                                  </td>
                                  <td>
                                    <input name="qty_detail" id="putUom" style="border-radius:0;width:50px;" type="text" class="form-control" readonly="">
                                  </td>
                                  <td>
                                    <div id="iconQty" style="color: red;margin-left:5px;" title="Please input qty"><span id="iconQty2">!</span></div>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Unit Price</label></td>
                                  <td>
                                    <input name="price" id="priceCek" style="border-radius:0;width:90px;" type="text" class="form-control ChangePrice uang" value="0" autocomplete="off">
                                    <input name="price2" id="putPrice" style="border-radius:0;" type="hidden" class="form-control">
                                  </td>
                                  <td>
                                    <input name="price_detail" id="putCurrency" style="border-radius:0;width:50px;" type="text" class="form-control" readonly="">
                                  </td>
                                  <td>
                                    <div id="iconUnitPrice" style="color: red;position:relative;right:30px;"><span id="iconUnitPrice2">!</span></div>
                                  </td>
                                </tr>
                                <tr>
                                  <td><label>Total</label></td>
                                  <td>
                                    <input name="price" id="totalArfDetails" style="border-radius:0;width:90px;" type="text" class="form-control" readonly="">
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <table>
                                <tr>
                                  <td><Label>Remark</Label></td>
                                  <td>
                                    <textarea name="remarks" id="putRemark" rows="5" cols="51" class="form-control"></textarea>
                                  </td>
                                  <td>
                                    <div id="iconRemark" style="color: red;margin-left:5px;" title="Please input remark"><span id="iconRemark2">!</span></div>
                                  </td>
                                </tr>
                              </table>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="card">
                              <div class="card-body">
                                <div class="card-title" style="border:5px solid #DCDCDC;width:100%;">
                                  <p style="position:relative;text-align:center;top:7px;">Balance</p>
                                </div>
                                <div class="card-body table-responsive p-0 available" style="height:100px;">
                                  <table>
                                    <tbody>
                                      <tr>
                                        <input name="price" id="totalBudget" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="" hidden>
                                        <td><label>Total Requested </label></td>
                                        <td>:</td>
                                        <td style="font-weight:bold;">
                                          <input name="price" id="totalRequester" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                        </td>
                                        <td>IDR</td>
                                      </tr>
                                      <tr>
                                        <td title="Total BOQ Detail"><label>Total Qty Requested</label></td>
                                        <td>:</td>
                                        <td style="font-weight:bold;">
                                          <input name="price" id="totalQtyRequest" style="border-radius:0;background-color:white;border:1px solid white;" type="text" class="form-control" readonly="">
                                        </td>
                                      </tr>
                                      <br>
                                      <tr>
                                        <td><label>Balance</label></td>
                                        <td>:</td>
                                        <td style="font-weight:bold;color:red;">
                                          <input name="price" id="totalBalance" style="border-radius:0;background-color:white;border:1px solid white;color:red;" type="text" class="form-control" readonly="">
                                        </td>
                                        <td>IDR</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            </div>
                            <button type="reset" class="btn btn-outline btn-danger btn-sm float-right detailTransaction">
                              <i class="fa fa-times" aria-hidden="true" title="Cancel to Add Advance List Cart">Cancel</i>
                            </button>
                            <a class="btn btn-outline btn-success btn-sm float-right" id="addFromDetailtoCart" style="margin-right: 5px;">
                              <i class="fa fa-plus" aria-hidden="true" title="Add to Advance List" style="color: white;">Add</i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>

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
                    <table id="tableArf" class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>Delete</th>
                          <th>Product Id</th>
                          <th>Product Name</th>
                          <th>Qty</th>
                          <th>Uom</th>
                          <th>Price</th>
                          <th>Total</th>
                          <th>Currency</th>
                          <th>Remark</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
                <a href="{{ url('arflist/cancel/') }}" class="btn btn-outline btn-danger btn-sm float-right remove-arf-list">
                  <i class="fa fa-times" aria-hidden="true" title="Cancel Advance List Cart">Cancel</i>
                </a>
                <button class="btn btn-outline btn-success btn-sm float-right" type="submit" style="margin-right: 5px;color:white;" id="submitArf">
                  <i class="fas fa-save" aria-hidden="true" title="Submit to Advance">Submit</i>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
@include('Partials.footer')

@include('Advance.Advance.Functions.Footer.footerArf')
@endsection