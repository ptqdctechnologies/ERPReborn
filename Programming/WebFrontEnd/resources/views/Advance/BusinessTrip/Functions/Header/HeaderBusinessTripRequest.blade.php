<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <table>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Budget Code</label></td>
                        <td>
                            <div class="input-group" style="width: 70%;">
                                <input id="projectcode" style="border-radius:0;" name="projectcode" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="projectcode2" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group" style="width: 140%;position:relative;right:38%;">
                                <input id="projectname" style="border-radius:0;" class="form-control" name="projectname" readonly>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <table>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Sub Budget Code</label></td>
                        <td>
                            <div class="input-group" style="width: 70%;">
                                <input id="sitecode" style="border-radius:0;" name="sitecode" class="form-control" readonly>
                                <input name="var_combinedBudget" id="combinedBudget" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="sitecode2" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group" style="width: 140%;position:relative;right:38%;">
                                <input id="sitename" style="border-radius:0;" class="form-control" name="sitename" readonly>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- <div class="col-md-4">
            <div class="card-body table-responsive p-0">
                <table>
                    <tr>
                        <td><label>File</label></td>
                        <td>
                            <div class="form-group input_fields_wrap">
                                <div class="input-group control-group">
                                    <input id="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" type="file" onchange="javascript:(function(varObj, varReturnDOMObject) {if ((typeof varObj != 'undefined') &amp;&amp; (typeof varReturnDOMObject != 'undefined')) {var varObjFileList = varObj.files; if(varObjFileList.length > 0){try {varObj.disabled = true; varReturnDOMObject.disabled = true; var varReturn = ''; var varStagingTag = '::StgFlsRPK::OverWrite::'; var varAccumulatedFiles = 0; var varJSONDataBuilder = ''; var varRotateLog_FileUploadStagingArea_RefRPK = parseInt(JSON.parse(function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.getNewID', 'latest', {'applicationKey' : '{{ Session::get('SessionLogin') }}'}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }()).data.recordRPK);for(var i = 0; i < varObjFileList.length; i++){(function(varObjCurrentFile, i) {var varObjFileReader = new FileReader(); varObjFileReader.onloadend = function(event) {varAccumulatedFiles++; if(varAccumulatedFiles != 1) {varJSONDataBuilder = varJSONDataBuilder + ', '; }var varJSONDataBuilderNew = '{' + String.fromCharCode(34) + 'rotateLog_FileUploadStagingArea_RefRPK' + String.fromCharCode(34) + ' : ' + (varRotateLog_FileUploadStagingArea_RefRPK) + ', ' + String.fromCharCode(34) + 'sequence' + String.fromCharCode(34) + ' : ' + (i+1) + ', ' + String.fromCharCode(34) + 'name' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'size' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.size) + ', ' + String.fromCharCode(34) + 'MIME' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + ((event.target.result.split(',')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'extension' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name.split('.').pop().toLowerCase()) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'contentBase64' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(',') + 1)) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedDateTimeTZ' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedUnixTimestamp' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.lastModified) + '' + '}'; var varObjDOMInputTemp = document.createElement('INPUT'); varObjDOMInputTemp.setAttribute('type', 'text'); varObjDOMInputTemp.setAttribute('value', varJSONDataBuilderNew);varJSONDataBuilder = varJSONDataBuilder + varJSONDataBuilderNew; var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToLocalStorage', 'latest', {'entities' : JSON.parse(varObjDOMInputTemp.getAttribute('value'))}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();if(varAccumulatedFiles == varObjFileList.length) {var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToCloudStorage', 'latest', {'rotateLog_FileUploadStagingArea_RefRPK' : + varRotateLog_FileUploadStagingArea_RefRPK}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();varReturn = varRotateLog_FileUploadStagingArea_RefRPK; varObj.disabled = false; varReturnDOMObject.disabled = false; }}; varObjFileReader.readAsDataURL(varObjCurrentFile); }) (varObjFileList[i], i); } setTimeout((function() {try {if(varReturn!='') {if(varReturn == '[object Object]') {varObj.value=null; varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0]; alert('An internal error has occurred. Please to select file(s) again'); }else {varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0] + varStagingTag + varReturn; }return varReturn;}else {}}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Object\n(' + varError + ')'); }}), 500);}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Process\n(' + varError + ')'); }}}else {alert('ERP Reborn Error Notification\n\nInvalid DOM Objects'); }})(this, document.getElementById('dataInput_Log_FileUpload_Pointer_RefID'));">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group-btn">
                                <button style="background-color:#e9ecef;border:1px solid #ced4da;" class="btn btn-sm add_field_button" type="button"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="15" alt=""> Add</button>
                            </div>
                        </td>
                    </tr>
                    </tr>
                </table>
            </div>
        </div> -->
    </div>
</div>