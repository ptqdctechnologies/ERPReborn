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
        @foreach($data5 as $datas)
        <form method="post" enctype="multipart/form-data" action="{{ route('ARF.update', 1) }}" id="formUpdateArf">
          @csrf
          @method('PUT')

          <input id="var_recordID" style="border-radius:0;" name="var_recordID" value="{{$datas['sys_ID']}}" class="form-control" type="hidden">
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
                  @include('Advance.Advance.Functions.Header.headerArfRevision')
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
                        <div class="card-body table-responsive p-0" style="height: 50px;width:100%;">
                          <table class="table table-head-fixed text-nowrap">
                            <div class="form-group input_fields_wrap">
                              <div class="input-group control-group" style="width:100%;">
                                <!-- <input type="file" class="form-control filenames_1" id="filenames_1" style="height:26px;" name="filenames"> -->
                                <input style="width: 90px;position:relative;top:2px;" id="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" type="file" onchange="javascript:(function(varObj, varReturnDOMObject) {if ((typeof varObj != 'undefined') &amp;&amp; (typeof varReturnDOMObject != 'undefined')) {var varObjFileList = varObj.files; if(varObjFileList.length > 0){try {varObj.disabled = true; varReturnDOMObject.disabled = true; var varReturn = ''; var varStagingTag = '::StgFlsRPK::OverWrite::'; var varAccumulatedFiles = 0; var varJSONDataBuilder = ''; var varRotateLog_FileUploadStagingArea_RefRPK = parseInt(JSON.parse(function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.getNewID', 'latest', {'applicationKey' : '{{ Session::get('SessionLogin') }}'}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }()).data.recordRPK);for(var i = 0; i < varObjFileList.length; i++){(function(varObjCurrentFile, i) {var varObjFileReader = new FileReader(); varObjFileReader.onloadend = function(event) {varAccumulatedFiles++; if(varAccumulatedFiles != 1) {varJSONDataBuilder = varJSONDataBuilder + ', '; }var varJSONDataBuilderNew = '{' + String.fromCharCode(34) + 'rotateLog_FileUploadStagingArea_RefRPK' + String.fromCharCode(34) + ' : ' + (varRotateLog_FileUploadStagingArea_RefRPK) + ', ' + String.fromCharCode(34) + 'sequence' + String.fromCharCode(34) + ' : ' + (i+1) + ', ' + String.fromCharCode(34) + 'name' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'size' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.size) + ', ' + String.fromCharCode(34) + 'MIME' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + ((event.target.result.split(',')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'extension' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name.split('.').pop().toLowerCase()) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'contentBase64' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(',') + 1)) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedDateTimeTZ' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedUnixTimestamp' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.lastModified) + '' + '}'; var varObjDOMInputTemp = document.createElement('INPUT'); varObjDOMInputTemp.setAttribute('type', 'text'); varObjDOMInputTemp.setAttribute('value', varJSONDataBuilderNew);varJSONDataBuilder = varJSONDataBuilder + varJSONDataBuilderNew; var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToLocalStorage', 'latest', {'entities' : JSON.parse(varObjDOMInputTemp.getAttribute('value'))}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();if(varAccumulatedFiles == varObjFileList.length) {var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToCloudStorage', 'latest', {'rotateLog_FileUploadStagingArea_RefRPK' : + varRotateLog_FileUploadStagingArea_RefRPK}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();varReturn = varRotateLog_FileUploadStagingArea_RefRPK; varObj.disabled = false; varReturnDOMObject.disabled = false; }}; varObjFileReader.readAsDataURL(varObjCurrentFile); }) (varObjFileList[i], i); } setTimeout((function() {try {if(varReturn!='') {if(varReturn == '[object Object]') {varObj.value=null; varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0]; alert('An internal error has occurred. Please to select file(s) again'); }else {varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0] + varStagingTag + varReturn; }return varReturn;}else {}}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Object\n(' + varError + ')'); }}), 500);}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Process\n(' + varError + ')'); }}}else {alert('ERP Reborn Error Notification\n\nInvalid DOM Objects'); }})(this, document.getElementById('dataInput_Log_FileUpload_Pointer_RefID'));">
                                <input style="background-color: white;" type="text" id="dataInput_Log_FileUpload_Pointer_RefID" class="form-control filenames_1" value="" readonly="true">&nbsp;
                                    
                                <div class="input-group-btn">
                                <button class="btn btn-outline-secondary btn-sm add_field_button" type="button"><i class="fa fa-plus"></i></button>
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

                  <div class="card-body" id="detailTransAvail">
                      <div class="row">
                    <table class="table table-head-fixed text-nowrap" style="text-align: center;">
                      <thead>
                        <tr>
                          <th>Product Id</th>
                          <th>Product Name</th>
                          <th>Qty</th>
                          <th>Uom</th>
                          <th>Unit Price</th>
                          <th>Currency</th>
                          <th>Total</th>
                          <th>Balance</th>
                          <th>Payment</th>
                        </tr>
                      </thead>
                      <tbody>
                          <td>
                            <div class="input-group">
                              <input id="putProductId" style="border-radius:0;width:100px;" name="putProductId" class="form-control" readonly>
                              <div class="input-group-append">
                                <span style="border-radius:0;" class="input-group-text form-control">
                                  <a href="#"><i id="product_id2" data-toggle="modal" data-target="#myProductArf" class="fas fa-gift" style="color:grey;"></i></a>
                                </span>
                              </div>
                            </div>
                          </td>
                          <td>
                            <input name="product_name" id="putProductName" style="border-radius:0;" type="text" class="form-control" readonly="">
                          </td>
                          <td>
                            <input name="qtyCek" id="qtyCek" style="border-radius:0;width:100px;" type="number" class="form-control ChangeQty quantity" autocomplete="off" value="0">
                            <span id="putQtybyId"></span>
                            <input name="putQty" id="putQty" style="border-radius:0;" type="hidden" class="form-control">
                          </td>
                          <td>
                            <input name="qty_detail" id="putUom" style="border-radius:0;width:40px;" type="text" class="form-control" readonly="">
                          </td>
                          <td>
                            <input name="price" id="priceCek" style="border-radius:0;width:100px;" type="text" class="form-control ChangePrice" value="0" autocomplete="off">
                            <input name="price2" id="putPrice" style="border-radius:0;" type="hidden" class="form-control">
                          </td>
                          <td>
                            <input name="price_detail" id="putCurrency" style="border-radius:0;width:40px;" type="text" class="form-control" readonly="">
                          </td>
                          <td>
                            <input name="total" id="totalArfDetails" style="border-radius:0;" type="text" class="form-control" readonly="">
                          </td>

                          <td>
                            <input name="balance" id="totalBalance" style="border-radius:0;" type="text" class="form-control" readonly="">
                          </td>

                          <td>
                            <input name="payment" id="totalPayment" style="border-radius:0;" type="text" class="form-control" readonly="">
                          </td>

                          <td>
                            <input name="statusProduct" id="statusProduct" style="border-radius:0;" type="hidden" class="form-control" readonly="">
                          </td>
                          

                      </tbody>
                    </table>
                  </div>
                  <a class="btn btn-outline btn-danger btn-sm float-right cancelDetailArf">
                    <i class="fa fa-times" aria-hidden="true" title="Cancel to Add Advance List Cart" style="color: white;">Cancel</i>
                  </a>
                  <a class="btn btn-outline btn-success btn-sm float-right" id="addFromDetailtoCart" style="margin-right: 5px;">
                    <i class="fa fa-plus" aria-hidden="true" title="Add to Advance List" style="color: white;">Add</i>
                  </a>

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

                  <!-- <div class="card-body table-responsive p-0" id=""> -->
                  <div class="card-body" id="detailArfList">
                      <div class="row">
                    <table class="table table-head-fixed text-nowrap tableArf">
                      <thead>
                        <tr>
                          <th>Edit</th>
                          <th>Product Id</th>
                          <th>Product Name</th>
                          <th>Qty</th>
                          <th>Uom</th>
                          <th>Price</th>
                          <th>Total</th>
                          <th>Currency</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <table>
                          <tr>
                            <td><label>Remark</label></td>
                            <td>
                              <textarea name="var_remark" id="putRemark" rows="2" cols="1000" class="form-control" required>{{$datas['remarks']}}</textarea>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <a href="{{ route('ARF.index') }}" class="btn btn-outline btn-danger btn-sm float-right remove-arf-list">
                  <i class="fa fa-times" aria-hidden="true" title="Cancel Advance List Cart">Cancel</i>
                </a>
                <button class="btn btn-outline btn-success btn-sm float-right" type="submit" style="margin-right: 5px;color:white;" id="submitArf">
                  <i class="fas fa-save" aria-hidden="true" title="Submit to Advance">Submit</i>
                </button>
              </div>
            </div>
          </div>
        </form>
        @endforeach
      </div>
    </div>
  </section>
</div>
@include('Partials.footer')

@include('Advance.Advance.Functions.Footer.footerArfRevision')
@endsection