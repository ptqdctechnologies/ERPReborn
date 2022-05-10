<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailArfList").hide();
        $("#detailTransAvail").hide();
        $("#sitecode2").prop("disabled", true);
        $("#customerPopUp").prop("disabled", true);
        $("#request_name2").prop("disabled", true);
        $("#currencyPopUp").prop("disabled", true);
        $("#addFromDetailtoCart").prop("disabled", true);
        $("#showContentBOQ3").hide();
        $("#tableShowHideBOQ3").hide();

        $("#iconProductId2").hide();
        $("#iconQty2").hide();
        $("#iconUnitPrice2").hide();
        $("#iconRemark2").hide();
        $("#productIdRemPopUp").prop("disabled", true);

        $("#submitArf").prop("disabled", true);
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".detailTransaction").click(function() {
            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);
        });
    });
</script>

<script type="text/javascript">
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
   $(document).ready(function () {
    $('#addFromDetailtoCart').click(function(ev){
        ev.preventDefault();
        ev.stopPropagation();

        var val = $("#productIdRem").val();
        if(val != ""){
            $.ajax({
                type: "POST",
                url: '{!! route("Rem.StoreValidateRem") !!}?productIdRem=' + $('#productIdRem').val(),
                success: function(data) {

                    if(data == "200"){
                        var productIdRem = $("#productIdRem").val();
                        var productNameRem = $('#productNameRem').val();
                        var qtyRem = $("#qtyRem").val();
                        var unitPriceRem = $('#unitPriceRem').val().replace(/[^a-zA-Z0-9 ]/g, "");
                        var totalRem = $("#totalRem").val();
                        var unitPriceNameRem = $("#unitPriceNameRem").val();
                        var qtyNameRem = $("#qtyNameRem").val();
                        
                        var html = '<tr>'+
                                    '<td>'+
                                        '<button type="button" class="btn btn-danger btn-xs remove" data-id1="'+productIdRem+'"><i class="fa fa-trash"></i></button> '+
                                        '<button type="button" class="btn btn-warning btn-xs edit" data-dismiss="modal" data-id1="'+productIdRem+'" data-id2="'+productNameRem+'" data-id3="'+qtyRem+'" data-id4="'+unitPriceRem+'" data-id5="'+totalRem+'" data-id6="'+unitPriceNameRem+'" data-id7="'+qtyNameRem+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                                    '</td>'+
                                    '<td>'+productIdRem+'</td>'+
                                    '<td>'+productNameRem+'</td>'+
                                    '<td>'+qtyRem+'</td>'+
                                    '<td>'+qtyNameRem+'</td>'+
                                    '<td>'+unitPriceRem+'</td>'+
                                    '<td>'+unitPriceNameRem+'</td>'+
                                    '<td>'+(qtyRem * unitPriceRem)+'</td>'+
                                '</tr>';
                        $('table.tableArf tbody').append(html);

                        $("body").on("click", ".remove", function () {
                            $(this).closest("tr").remove();
                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("Rem.StoreValidateRem2") !!}?productIdRem=' + ProductId,
                            });
                        });
                        $("body").on("click", ".edit", function () {
                            var $this = $(this);
                            var id1 = $this.data("id1");
                            var id2 = $this.data("id2");
                            var id3 = $this.data("id3");
                            var id4 = $this.data("id4");
                            var id5 = $this.data("id5");
                            var id6 = $this.data("id6");
                            var id7 = $this.data("id7");
                            var id8 = $this.data("id8");
                            var id9 = $this.data("id9");

                            $.ajax({
                                type: "POST",
                                url: '{!! route("Rem.StoreValidateRem2") !!}?productIdRem=' + id1,
                            });

                            $("#productIdRem").val(id1);
                            $("#productNameRem").val(id2);
                            $('#qtyRem').val(id3);
                            $("#unitPriceRem").val(id4);
                            $("#totalRem").val(id5);
                            $("#unitPriceNameRem").val(id6);
                            $("#qtyNameRem").val(id7);
                            $(this).closest("tr").remove();

                            // if(id1 == "Unspecified Product"){
                            //     $("#productIdRemPopUp").prop("disabled", false);
                            // }
                            // else{
                            //     $("#productIdRemPopUp").prop("disabled", true);
                            // }
                        });

                        $("#productIdRem").css("border", "1px solid #ced4da");
                        $("#productIdRem").css("border", "1px solid #ced4da");
                        $("#productNameRem").css    ("border", "1px solid #ced4da");
                        $("#unitPriceNameRem").css    ("border", "1px solid #ced4da");

                        $("#productIdRem").val("");
                        $("#productNameRem").val("");
                        $("#qtyRem").val("");
                        $("#unitPriceRem").val("");
                        $("#totalRem").val("");
                        $("#unitPriceNameRem").val("");
                        $("#qtyNameRem").val("");
                        
                        $("#iconProductId").hide();
                        $("#iconQty").hide();
                        $("#iconRemark").hide();
                        $("#iconProductId2").hide();
                        $("#iconQty2").hide();
                        $("#iconRemark2").hide();

                        $("#saveArfList").prop("disabled", false);
                        $("#submitArf").prop("disabled", false);

                        $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
                        $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);
                        $("#detailArfList").show();
                    }
                    else{
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });   
        }
        else{
            Swal.fire("Error !", "Data Cannot Empty", "error");
        }
    });
});
</script>


<script>
    $('document').ready(function() {
        $('.unitPriceRem').keyup(function() {
            var price = $(this).val().replace(/[^a-zA-Z0-9 ]/g, "");
            if (price == 0 || price == '') {
                price = 0;
            }
            var qty = $('#qtyRem').val();
            var total = qty * price;
            $('#totalRem').val(total);
        });
    });
</script>

<script>
    $('document').ready(function() {
        $('.cancelRem').click(function() {
            $("#productIdRem").val("");
            $("#productNameRem").val("");
            $("#qtyRem").val("");
            $("#unitPriceRem").val("");
            $("#totalRem").val("");
            $("#unitPriceNameRem").val("");
            $("#qtyNameRem").val("");
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        // Format mata uang.
        $('.uang').mask('000.000.000.000', {
            reverse: true
        });
        // $( '.quantity' ).mask('000.000.000', {reverse: true});
    })
</script>

<script>
    $(document).ready(function() {
        $("#formCreateArf").validate({
            rules: {
                // origin_budget: "required",
                projectcode: "required",
                projectname: "required",
                sitecode: "required",
                sitename: "required",
                request_name: "required",
                beneficiary: "required",
                internal_notes: "required",
                bank_name: "required",
                account_name: "required",
                account_number: {
                    required: true,
                    number: true,
                    min: 0,
                }
            },
            messages: {
                // origin_budget: "<span title='Please Enter Origin Budget ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                projectcode: "",
                projectname: "<span title='Please Enter Projec Name ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                sitecode: "",
                sitename: "<span title='Please Enter Site Name ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                request_name: "",
                beneficiary: "<span title='Please Enter Beneficiary ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                internal_notes: "<span title='Please Enter Internal Notes' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                bank_name: "<span title='Please Enter Bank Name ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                account_name: "<span title='Please Enter Account Name ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                account_number: "<span title='Please Enter Account Number ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
            },
            unhighlight: function(element) {
                $(element).removeClass('error');
            },
            submitHandler: function(form) {

                form.submit();

                const swalWithBootstrapButtons = Swal.mixin({
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger',
                    buttonsStyling: true,
                })

                swalWithBootstrapButtons.fire({

                    title: 'Are you sure?',
                    text: "Save this data?",
                    type: 'question',

                    showCancelButton: true,
                    confirmButtonText: 'Yes, save it!',
                    cancelButtonText: 'No, cancel!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        swalWithBootstrapButtons.fire(
                            'Succesful!',
                            'Data has been updated !',
                            'success'
                        )
                        //Batas
                        var datax = [];
                        for (var i = 1; i <= y; i++) {
                            var data = {
                                lastProductId: $('#lastProductId_' + i).html(),
                                lastProductName: $('#lastProductName_' + i).html(),
                                lastQty: $('#lastQty_' + i).val(),
                                lastUom: $('#lastUom_' + i).html(),
                                lastPrice: $('#lastPrice_' + i).html(),
                                totalArfDetails: $('#totalArfDetails_' + i).html(),
                                lastCurrency: $('#lastCurrency_' + i).html(),
                                lastRemark: $('#lastRemark_' + i).html(),

                            }
                            datax.push(data);
                        }

                        var json_object = JSON.stringify(datax);
                        $.ajax({
                            type: "POST",
                            url: '{{route("ARF.store")}}',
                            data: json_object,
                            contentType: "application/json",
                            processData: true,
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                console.log(data);
                            },
                            error: function(data) {
                                Swal.fire("Error !", "Data Canceled Added", "error");
                            }
                        });

                        //EndBatas

                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Cancelled',
                            'Process Canceled !',
                            'error'
                        )
                    }
                })
            }
        });
    });
</script>

<script>
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    $('.add_field_button').click(function() {
        cek = 0;
        addColomn();
    });

    function addColomn() { //on add input button click
        if (cek == 0) {
            cek++;
            x++; //text box increment
            for ($x = 1; $x < 5; $x++) {

            }
            $(wrapper).append(
                '<div class="col-md-12">' +
                    '<div class="form-group">' +
                        '<div class="input-group control-group" style="width:105%;position:relative;right:8px;">' +
                        
                            // '<input style="width: 90px;position:relative;top:2px;" id="dataInput_Log_FileUpload_Pointer_RefID_Action" multiple="multiple" type="file" onchange="javascript:(function(varObj, varReturnDOMObject) {if ((typeof varObj != 'undefined') &amp;&amp; (typeof varReturnDOMObject != 'undefined')) {var varObjFileList = varObj.files; if(varObjFileList.length > 0){try {varObj.disabled = true; varReturnDOMObject.disabled = true; var varReturn = ''; var varStagingTag = '::StgFlsRPK::OverWrite::'; var varAccumulatedFiles = 0; var varJSONDataBuilder = ''; var varRotateLog_FileUploadStagingArea_RefRPK = parseInt(JSON.parse(function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.getNewID', 'latest', {'applicationKey' : '{{ Session::get('SessionLogin') }}'}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }()).data.recordRPK);for(var i = 0; i < varObjFileList.length; i++){(function(varObjCurrentFile, i) {var varObjFileReader = new FileReader(); varObjFileReader.onloadend = function(event) {varAccumulatedFiles++; if(varAccumulatedFiles != 1) {varJSONDataBuilder = varJSONDataBuilder + ', '; }var varJSONDataBuilderNew = '{' + String.fromCharCode(34) + 'rotateLog_FileUploadStagingArea_RefRPK' + String.fromCharCode(34) + ' : ' + (varRotateLog_FileUploadStagingArea_RefRPK) + ', ' + String.fromCharCode(34) + 'sequence' + String.fromCharCode(34) + ' : ' + (i+1) + ', ' + String.fromCharCode(34) + 'name' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'size' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.size) + ', ' + String.fromCharCode(34) + 'MIME' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + ((event.target.result.split(',')[0]).match(/[^:\s*]\w+\/[\w-+\d.]+(?=[;| ])/)[0]) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'extension' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.name.split('.').pop().toLowerCase()) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'contentBase64' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (event.target.result.substr(event.target.result.indexOf(',') + 1)) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedDateTimeTZ' + String.fromCharCode(34) + ' : ' + String.fromCharCode(34) + (varObjCurrentFile.lastModifiedDate) + String.fromCharCode(34) + ', ' + String.fromCharCode(34) + 'lastModifiedUnixTimestamp' + String.fromCharCode(34) + ' : ' + (varObjCurrentFile.lastModified) + '' + '}'; var varObjDOMInputTemp = document.createElement('INPUT'); varObjDOMInputTemp.setAttribute('type', 'text'); varObjDOMInputTemp.setAttribute('value', varJSONDataBuilderNew);varJSONDataBuilder = varJSONDataBuilder + varJSONDataBuilderNew; var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToLocalStorage', 'latest', {'entities' : JSON.parse(varObjDOMInputTemp.getAttribute('value'))}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();if(varAccumulatedFiles == varObjFileList.length) {var varNothing = function() { varReturn = null; try { varReturn = new zht_JSAPIRequest_Gateway('{{ Session::get('SessionLogin') }}', 'http://172.28.0.3/api/gateway', 'fileHandling.upload.stagingArea.setFilesToCloudStorage', 'latest', {'rotateLog_FileUploadStagingArea_RefRPK' : + varRotateLog_FileUploadStagingArea_RefRPK}); } catch(varError) { alert('ERP Reborn Error Notification\n\nInvalid Data Request\n(' + varError + ')'); } return varReturn.value; }();varReturn = varRotateLog_FileUploadStagingArea_RefRPK; varObj.disabled = false; varReturnDOMObject.disabled = false; }}; varObjFileReader.readAsDataURL(varObjCurrentFile); }) (varObjFileList[i], i); } setTimeout((function() {try {if(varReturn!='') {if(varReturn == '[object Object]') {varObj.value=null; varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0]; alert('An internal error has occurred. Please to select file(s) again'); }else {varReturnDOMObject.value = (varReturnDOMObject.value.split(varStagingTag))[0] + varStagingTag + varReturn; }return varReturn;}else {}}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Object\n(' + varError + ')'); }}), 500);}catch(varError) {alert('ERP Reborn Error Notification\n\nInvalid Process\n(' + varError + ')'); }}}else {alert('ERP Reborn Error Notification\n\nInvalid DOM Objects'); }})(this, document.getElementById('dataInput_Log_FileUpload_Pointer_RefID'));">' +
                            // '<input style="background-color: white;" type="text" id="dataInput_Log_FileUpload_Pointer_RefID" class="form-control filenames_1" value="" readonly="true">&nbsp' +
                                        
                            '<input type="file" class="form-control filenames" id="filenames_' + x + '" style="height:26px;">' +

                            '<div class="input-group-btn">' +
                                '<button class="btn btn-outline-secondary btn-sm remove_field" type="button"><i class="fa fa-trash"></i></button>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                '</div>'

            ); //add input box                
        }
    }

    $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
        e.preventDefault();
        $(this).parent().parent().parent('div').remove();
        x--;
    })
</script>