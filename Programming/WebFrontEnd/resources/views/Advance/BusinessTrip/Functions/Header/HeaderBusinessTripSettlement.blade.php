<div class="card-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <table>
                    <tr>
                        <td><label>BRF Number</label></td>
                        <td>
                            <div class="input-group">
                                <input required="" id="arfNumberAsf" style="border-radius:0;" name="arfNumberAsf" type="text" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#"><i data-toggle="modal" data-target="#mySearchBrf" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td><label>Requester</label></td>
                        <td>
                            <div class="input-group">
                                <input required="" id="requester" style="border-radius:0;" name="requester" type="text" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Manager Name</label></td>
                        <td>
                            <div class="input-group">
                                <input required="" id="managerUid" style="border-radius:0;" name="managerUid" type="text" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#"><i id="ManagerNameId" data-toggle="modal" data-target="#myManager" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input required="" id="managerName" name="managerName" style="border-radius:0;" readonly="" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Currency</label></td>
                        <td>
                            <div class="input-group">
                                <input required="" id="currencyCode" style="border-radius:0;" name="currencyCode" type="text" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#"><i id="CurrencyId" data-toggle="modal" data-target="#myCurrency" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                </div>
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
                        <td><label>Finance Receiving Name</label></td>
                        <td>
                            <div class="input-group">
                                <input required="" id="financeUid" style="border-radius:0;" name="financeUid" type="text" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#"><i id="FinanceId" data-toggle="modal" data-target="#myfinance" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input required="" id="financeName" name="financeName" style="border-radius:0;" readonly="" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Remark</label></td>
                        <td>
                            <div class="input-group">
                                <input required="" id="remark" style="border-radius:0;" name="remark" type="text" class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Total</label></td>
                        <td>
                            <div class="input-group">
                                <input required="" id="total" style="border-radius:0;" name="total" type="text" class="form-control">
                            </div>
                        </td>
                        <td>
                            <input required="" id="totalDetail" name="totalDetail" style="border-radius:0;width:30px;" readonly="" class="form-control">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-body table-responsive p-0">
                <table>
                    <tr>
                        <td><label>File</label></td>
                        <td>
                            <div class="form-group input_fields_wrap">
                                <div class="input-group control-group">
                                    <!-- <input type="file" class="form-control filenames_1" id="filenames_1" style="height:26px;" name="filenames"> -->
                                    <input id="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" type="file" onchange="javascript:(function(varObj, varReturnDOMObject) {if ((typeof varObj != 'undefined') &amp;&amp; (typeof varReturnDOMObject != 'undefined')) {var varObjFileList = varObj.files; if(varObjFileList.length > 0){try {varObj.disabled = true; varReturnDOMObject.disabled = true; var varReturn = ''; var varStagingTag = '::StgFlsRPK::OverWrite::'; var varAccumulatedFiles = 0; var varJSONDataBuilder = ''; var varRotateLog_FileUploadStagingArea_RefRPK = parseInt(JSON.parse(function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.getNewID', 'latest', {'applicationKey' : '{{ Session::get('SessionLogin') }}'}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }()).data.recordRPK);for(var i = 0; i < varObjFileList.length; i++){(function(varObjCurrentFile, i) {var varObjFileReader = new FileReader(); varObjFileReader.onloadend = function(event) {varAccumulatedFiles++; if(varAccumulatedFiles != 1) {varJSONDataBuilder = varJSONDataBuilder + ', '; }var varJSONDataBuilderNew = '{' + String.fromCharCode(34) + 'rotateLog_FileUploadStagingArea_RefRPK' + String.fromCharCode(34) + ' : ' + (varRotateLog_FileUploadStagingArea_RefRPK) + ', ' + String.fromCharCode(34) + 'sequence' + String.fromCharCode(34) + ' : ' + (i+1) + ', ' + String.fromCharCode(34) + 'name' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'size' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.size) + ', ' + String.fromCharCode(34) + 'MIME' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + ((event.target.result.split(',')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'extension' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name.split('.').pop().toLowerCase()) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'contentBase64' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(',') + 1)) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedDateTimeTZ' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedUnixTimestamp' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.lastModified) + '' + '}'; var varObjDOMInputTemp = document.createElement('INPUT'); varObjDOMInputTemp.setAttribute('type', 'text'); varObjDOMInputTemp.setAttribute('value', varJSONDataBuilderNew);varJSONDataBuilder = varJSONDataBuilder + varJSONDataBuilderNew; var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToLocalStorage', 'latest', {'entities' : JSON.parse(varObjDOMInputTemp.getAttribute('value'))}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();if(varAccumulatedFiles == varObjFileList.length) {var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToCloudStorage', 'latest', {'rotateLog_FileUploadStagingArea_RefRPK' : + varRotateLog_FileUploadStagingArea_RefRPK}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();varReturn = varRotateLog_FileUploadStagingArea_RefRPK; varObj.disabled = false; varReturnDOMObject.disabled = false; }}; varObjFileReader.readAsDataURL(varObjCurrentFile); }) (varObjFileList[i], i); } setTimeout((function() {try {if(varReturn!='') {if(varReturn == '[object Object]') {varObj.value=null; varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0]; alert('An internal error has occurred. Please to select file(s) again'); }else {varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0] + varStagingTag + varReturn; }return varReturn;}else {}}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Object\n(' + varError + ')'); }}), 500);}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Process\n(' + varError + ')'); }}}else {alert('ERP Reborn Error Notification\n\nInvalid DOM Objects'); }})(this, document.getElementById('dataInput_Log_FileUpload_Pointer_RefID'));">
                                    <!-- <input type="text" id="dataInput_Log_FileUpload_Pointer_RefID" class="form-control filenames_1" value="" readonly="true">&nbsp; -->
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group-btn">
                                <button style="background-color:#e9ecef;border:1px solid #ced4da;" class="btn btn-sm add_field_button" type="button"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="15" alt=""> Add</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <button type="reset" class="btn btn-default btn-sm float-right" title="Reset">
        <!-- <i class="fa fa-times" aria-hidden="true">Reset</i> -->
        <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Reset"> Reset
    </button>
</div>