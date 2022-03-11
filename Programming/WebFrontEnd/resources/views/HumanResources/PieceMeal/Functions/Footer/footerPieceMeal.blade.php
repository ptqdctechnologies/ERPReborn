<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailPRList").hide();
        $("#detailTransAvail").hide();
        $("#sitecode2").prop("disabled", true);
        $("#request_name2").prop("disabled", true);
        $("#addFromDetailtoCart").prop("disabled", true);
        $("#showContentBOQ3").hide();
        $("#tableShowHideBOQ3").hide();

        $("#iconProductId2").hide();
        $("#iconQty2").hide();
        $("#iconUnitPrice2").hide();
        $("#iconRemark2").hide();
        $("#product_id2").prop("disabled", true);

        $("#submitPR").prop("disabled", true);
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
   $(document).ready(function () {
    
    $('#addFromDetailtoCart').click(function(ev){
    ev.preventDefault();
    ev.stopPropagation();

    var product_id = $("#putProductId").val();
    var putProductName = $("#putProductName").val();
    var qtyCek = $('#qtyCek').val();
    var putUom = $("#putUom").val();
    var priceCek = $("#priceCek").val().replace(/[^a-zA-Z0-9 ]/g, "");
    var putCurrency = $("#putCurrency").val();
    var totalPRDetails = $("#totalPRDetails").val().replace(/[^a-zA-Z0-9 ]/g, "");
    var putRemark = $("#putRemark").val();
    var totalBalance = $("#totalBalance").val();
    var putPrice = $('#putPrice').val();
    var status = $("#status").val();

    // if (product_id == "") {
    //     $("#putProductId").css("border", "1px solid red");
    //     $("#putProductName").css("border", "1px solid red");
    //     $("#iconProductId").css("border", "1px solid red");
    //     $("#iconProductId").css("borderRadius", "100pt");
    //     $("#iconProductId").css("paddingRight", "5px");
    //     $("#iconProductId").css("paddingLeft", "5px");
    //     $("#iconProductId").css("paddingTop", "1px");
    //     $("#iconProductId").css("paddingBottom", "1px");
    //     $("#iconProductId2").show();
    //     return false;

    // } else if (qtyx == 0) {
    //     $("#qtyCek").css    ("border", "1px solid red");
    //     $("#putUom").css("border", "1px solid red");
    //     $("#iconQty").css("border", "1px solid red");
    //     $("#iconQty").css("borderRadius", "100pt");
    //     $("#iconQty").css("paddingRight", "5px");
    //     $("#iconQty").css("paddingLeft", "5px");
    //     $("#iconQty").css("paddingTop", "1px");
    //     $("#iconQty").css("paddingBottom", "1px");
    //     $("#iconQty2").show();
    //     return false;

    // } else if (priceCek == "") {
    //     $("#priceCek").css("border", "1px solid red");
    //     $("#putCurrency").css("border", "1px solid red");
    //     $("#iconUnitPrice").css("border", "1px solid red");
    //     $("#iconUnitPrice").css("borderRadius", "100pt");
    //     $("#iconUnitPrice").css("paddingRight", "5px");
    //     $("#iconUnitPrice").css("paddingLeft", "5px");
    //     $("#iconUnitPrice").css("paddingTop", "1px");
    //     $("#iconUnitPrice").css("paddingBottom", "1px");
    //     $("#iconUnitPrice2").show();
    //     return false;

    // } else if (putRemark == "") {
    //     $("#putRemark").css("border", "1px solid red");
    //     $("#iconRemark").css("border", "1px solid red");
    //     $("#iconRemark").css("borderRadius", "100pt");
    //     $("#iconRemark").css("paddingRight", "5px");
    //     $("#iconRemark").css("paddingLeft", "5px");
    //     $("#iconRemark").css("paddingTop", "1px");
    //     $("#iconRemark").css("paddingBottom", "1px");
    //     $("#iconRemark2").show();
    //     return false;

    // } else {

        var html = '<tr>'+
                    '<td>'+
                        '<button type="button" class="btn btn-danger btn-xs remove"><i class="fa fa-trash"></i></button> '+
                        '<button type="button" class="btn btn-warning btn-xs edit" data-dismiss="modal" data-id1="'+product_id+'" data-id2="'+putProductName+'" data-id3="'+qtyCek+'" data-id4="'+putUom+'" data-id5="'+priceCek+'" data-id6="'+putCurrency+'" data-id7="'+totalPRDetails+'" data-id8="'+putRemark+'" data-id9="'+totalBalance+'" data-id10="'+status+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                        '<input type="hidden" name="var_product_id[]" value="'+product_id+'">'+
                        '<input type="hidden" name="var_product_name[]" value="'+putProductName+'">'+
                        '<input type="hidden" name="var_quantity[]" value="'+qtyCek+'">'+
                        '<input type="hidden" name="var_uom[]" value="'+putUom+'">'+
                        '<input type="hidden" name="var_price[]" value="'+priceCek+'">'+
                        '<input type="hidden" name="var_totalPrice[]" value="'+(priceCek * qtyCek)+'">'+
                        '<input type="hidden" name="var_currency[]" value="'+putCurrency+'">'+
                        '<input type="hidden" name="var_remark[]" value="'+putRemark+'">'+
                    '</td>'+
                    '<td>'+product_id+'</td>'+
                    '<td>'+putProductName+'</td>'+
                    '<td>'+qtyCek+'</td>'+
                    '<td>'+putUom+'</td>'+
                    '<td>'+priceCek+'</td>'+
                    '<td>'+(priceCek * qtyCek)+'</td>'+
                    '<td>'+putCurrency+'</td>'+
                    '<td>'+putRemark+'</td>'+
                '</tr>';
                
        $('table.tablePR tbody').append(html);

        $("body").on("click", ".remove", function () {
            $(this).closest("tr").remove();
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
            var id10 = $this.data("id10");
            $("#putProductId").val(id1);
            $("#putProductName").val(id2);
            $('#qtyCek').val(id3);
            $("#putUom").val(id4);
            $("#priceCek").val(id5);
            $("#putCurrency").val(id6);
            $("#totalPRDetails").val(id7);
            $("#putRemark").val(id8);
            $("#totalBalance").val(id9);

            $(this).closest("tr").remove();

            if(id10 == "Unspecified Product"){
                $("#product_id2").prop("disabled", false);
            }
            else{
                $("#product_id2").prop("disabled", true);
            }
        });

        $("#putProductId").css("border", "1px solid #ced4da");
        $("#putProductName").css("border", "1px solid #ced4da");
        $("#putRemark").css("border", "1px solid #ced4da");
        $("#qtyCek").css    ("border", "1px solid #ced4da");
        $("#putUom").css    ("border", "1px solid #ced4da");

        $("#putProductId").val("");
        $("#putProductName").val("");
        $("#qtyCek").val("0");
        $("#putUom").val("");
        $("#priceCek").val("0");
        $("#putCurrency").val("");
        $("#putRemark").val("");
        $("#totalPRDetails").val("");
        $("#totalRequester").val("0");
        $("#totalQtyRequest").val("0");
        $("#totalBalance").val("0");

        $("#iconProductId").hide();
        $("#iconQty").hide();
        $("#iconRemark").hide();
        $("#iconProductId2").hide();
        $("#iconQty2").hide();
        $("#iconRemark2").hide();

        $("#savePRList").prop("disabled", false);
        $("#submitPR").prop("disabled", false);

        $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
        $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);
        $("#detailPRList").show();
    // }
    });
});
</script>

<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {
            var qtyReq = $(this).val().replace(/[^a-zA-Z0-9 ]/g, "");
            if (qtyReq == 0 || qtyReq == '') {
                qtyReq = 0;
            }
            var putQty = $('#putQty').val();
            var priceCek = $('#priceCek').val();
            var total = putQty * priceCek;
            var total2 = qtyReq * priceCek;

            var status = $('#status').val();
            if(status == "Unspecified Product"){
                if (qtyReq == '') {
                $("#addFromDetailtoCart").prop("disabled", true);
                $("#savePRList").prop("disabled", true);
                $('#totalPRDetails').val(0);

                } else if (total2 > total) {
                    Swal.fire("Error !", "Your Request Is Over Budget", "error");
                    $('#totalPRDetails').val(0);
                    $("#addFromDetailtoCart").prop("disabled", true);
                } else {
                    var totalReq = parseFloat(total2);
                    $('#totalPRDetails').val(totalReq);
                    $("#addFromDetailtoCart").prop("disabled", false);
                }
            }
            else{
                if (qtyReq == '') {
                    $("#addFromDetailtoCart").prop("disabled", true);
                    $("#savePRList").prop("disabled", true);
                    $('#totalPRDetails').val(0);

                } else if (qtyReq > putQty) {
                    Swal.fire("Error !", "Your Qty Request is Over", "error");
                    $("#qtyCek").val(0);
                    $('#totalPRDetails').val(0);
                    $("#addFromDetailtoCart").prop("disabled", true);
                    $("#savePRList").prop("disabled", true);
                } else if (total2 > total) {
                    Swal.fire("Error !", "Your Request Is Over Budget", "error");
                    $('#totalPRDetails').val(0);
                    $("#addFromDetailtoCart").prop("disabled", true);
                } else {
                    var totalReq = parseFloat(total2);
                    $('#totalPRDetails').val(totalReq);
                    $("#addFromDetailtoCart").prop("disabled", false);
                }
            }
            

        });
    });
</script>

<script>
    $('document').ready(function() {
        $('.ChangePrice').keyup(function() {

            var priceReq = $(this).val().replace(/[^a-zA-Z0-9 ]/g, "");
            if (priceReq == 0 || priceReq == '') {
                priceReq = 0;
            }
            var qtyCek = $('#qtyCek').val();
            var putPrice = $('#putPrice').val();
            var total = qtyCek * priceReq;
            var total2 = qtyCek * putPrice;
            var totalBalance = $("#totalBalance").val();
            
            var status = $('#status').val();

            if(status == "Unspecified Product"){    
                if (priceReq == '') {
                    $("#addFromDetailtoCart").prop("disabled", true);
                    $('#totalPRDetails').val(0);

                } else if (total > totalBalance) {
                    Swal.fire("Error !", "Your Request Price Is Over Budget", "error");
                    $("#priceCek").val(0);
                    $('#totalPRDetails').val(0);
                    $("#addFromDetailtoCart").prop("disabled", true);
                } else {
                    var totalReq = total;
                    $('#totalPRDetails').val(totalReq);
                    $("#addFromDetailtoCart").prop("disabled", false);
                }
            }
            else{
                
                if (priceReq == '') {
                    $("#addFromDetailtoCart").prop("disabled", true);
                    $('#totalPRDetails').val(0);

                } else if (total > total2) {
                    Swal.fire("Error !", "Your Request Price Is Over Budget", "error");
                    $("#priceCek").val(0);
                    $('#totalPRDetails').val(0);
                    $("#addFromDetailtoCart").prop("disabled", true);
                } else {
                    var totalReq = total;
                    $('#totalPRDetails').val(totalReq);
                    $("#addFromDetailtoCart").prop("disabled", false);
                }
            }

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
        $("#formCreatePR").validate({
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
                                totalPRDetails: $('#totalPRDetails_' + i).html(),
                                lastCurrency: $('#lastCurrency_' + i).html(),
                                lastRemark: $('#lastRemark_' + i).html(),

                            }
                            datax.push(data);
                        }

                        var json_object = JSON.stringify(datax);
                        console.log(json_object);

                        $.ajax({
                            type: "POST",
                            url: '{{route("PPM.store2")}}',
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

<!-- <script>
    var x = 1,
        y = 0;

    $('#addFromDetailtoCart').click(function() {

        var product_id = $("#putProductId").val();
        var qtyx = $("#qtyCek").val();
        var priceCek = $("#priceCek").val().replace(/[^a-zA-Z0-9 ]/g, "");
        var putRemark = $("#putRemark").val();
        var totalBalance = $("#totalBalance").val();
        var qtyCek = $('#qtyCek').val();
        var putPrice = $('#putPrice').val();

        if (product_id == "") {
            $("#putProductId").css("border", "1px solid red");
            $("#putProductName").css("border", "1px solid red");
            $("#iconProductId").css("border", "1px solid red");
            $("#iconProductId").css("borderRadius", "100pt");
            $("#iconProductId").css("paddingRight", "5px");
            $("#iconProductId").css("paddingLeft", "5px");
            $("#iconProductId").css("paddingTop", "1px");
            $("#iconProductId").css("paddingBottom", "1px");
            $("#iconProductId2").show();
            return false;

        } else if (qtyx == 0) {
            $("#qtyCek").css    ("border", "1px solid red");
            $("#putUom").css("border", "1px solid red");
            $("#iconQty").css("border", "1px solid red");
            $("#iconQty").css("borderRadius", "100pt");
            $("#iconQty").css("paddingRight", "5px");
            $("#iconQty").css("paddingLeft", "5px");
            $("#iconQty").css("paddingTop", "1px");
            $("#iconQty").css("paddingBottom", "1px");
            $("#iconQty2").show();
            return false;

        } else if (priceCek == "") {
            $("#priceCek").css("border", "1px solid red");
            $("#putCurrency").css("border", "1px solid red");
            $("#iconUnitPrice").css("border", "1px solid red");
            $("#iconUnitPrice").css("borderRadius", "100pt");
            $("#iconUnitPrice").css("paddingRight", "5px");
            $("#iconUnitPrice").css("paddingLeft", "5px");
            $("#iconUnitPrice").css("paddingTop", "1px");
            $("#iconUnitPrice").css("paddingBottom", "1px");
            $("#iconUnitPrice2").show();
            return false;

        } else if (putRemark == "") {
            $("#putRemark").css("border", "1px solid red");
            $("#iconRemark").css("border", "1px solid red");
            $("#iconRemark").css("borderRadius", "100pt");
            $("#iconRemark").css("paddingRight", "5px");
            $("#iconRemark").css("paddingLeft", "5px");
            $("#iconRemark").css("paddingTop", "1px");
            $("#iconRemark").css("paddingBottom", "1px");
            $("#iconRemark2").show();
            return false;

        } else {

            var datas = [];
            var tamp = [];

            for (var i = 1; i <= x; i++) {
                var data = {
                    // origin_budget: $('#origin_budget').val(),
                    projectcode: $('#projectcode').val(),
                    projectname: $('#projectname').val(),
                    sitecode: $('#sitecode').val(),
                    sitecode2: $('#sitecode2').val(),
                    beneficiary: $('#beneficiary').val(),
                    bank_name: $('#bank_name').val(),
                    account_name: $('#account_name').val(),
                    account_number: $('#account_number').val(),
                    internal_notes: $('#internal_notes').val(),
                    request_name: $('#request_name').val(),
                    putProductId: $('#putProductId').val(),
                    putProductName: $('#putProductName').val(),
                    putQty: $('#qtyCek').val(),
                    putQtys: $('#putQty').val(),
                    putUom: $('#putUom').val(),
                    putPrice: $('#priceCek').val().replace(/[^a-zA-Z0-9 ]/g, ""),
                    putCurrency: $('#putCurrency').val(),
                    totalPRDetails: $('#totalPRDetails').val(),
                    putRemark: $('#putRemark').val(),
                    // filenames: $('#dataInput_Log_FileUpload_Pointer_RefID' + i).val(),
                    trano: '',
                }
                datas.push(data);
            }

            var json_object = JSON.stringify(datas);    
            console.log(json_object);

            $.ajax({
                type: "POST",
                url: '{{route("PR.store")}}',
                data: json_object,
                contentType: "application/json",
                processData: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    Swal.fire("Success !", "Data add to cart", "success");
                    console.log(data);
                    y++;
                    $.each(data, function(key, val) {
                        var t = $('#tablePR').DataTable();
                        t.row.add([
                                '<tr id="myRow">' +
                                '<td><center><a class="btn btn-outline-danger btn-rounded btn-sm my-0 remove-val-list delete-PR" style="border-radius: 100px;"><i class="fa fa-trash"></i></a></center></td>',
                                '<td id="lastProductId' + y + '">' + val.putProductId + '</td>',
                                '<td id="lastProductName_' + y + '">' + val.putProductName + '</td>',
                                '<td><input name="qty" style="border-radius:0;width:50px;border:1px solid white;" type="text" class="form-control ChangeQtys" autocomplete="off" id="lastQty" value=' + val.putQty + '></td>',
                                '<td id="lastUom_' + y + '">' + val.putUom + '</td>',
                                '<td><input name="price" style="border-radius:0;width:70px;border:1px solid white;" type="text" class="form-control ChangePrices" autocomplete="off" id="lastPrice" value=' + val.putPrice + '></td>',
                                '<td id="totalAkhir">' + val.totalPRDetails + '</td>',
                                '<td id="lastCurrency_' + y + '">' + val.putCurrency + '</td>',
                                '<td id="lastRemark_' + y + '">' + val.putRemark + '</td>',
                                '</tr>'
                        ]).draw();

                        $('.delete-PR').click(function() {
                            console.log('hahaha');
                            
                            var row = document.getElementById("myRow");
                            row.deleteCell(0);
                            row.deleteCell(1);
                            row.deleteCell(2);
                            row.deleteCell(3);
                            row.deleteCell(4);
                        });

                        

                        $('.ChangeQtys').keyup(function() {

                            var qtyReq = $(this).val().replace(/[^a-zA-Z0-9 ]/g, "");
                            if (qtyReq == 0 || qtyReq == '') {
                                qtyReq = 0;
                            }
                            var putQty = val.putQtys;
                            var qty = val.putQty;
                            var putPrice = val.putPrice.replace(/[^a-zA-Z0-9 ]/g, "");
                            var awal = putQty * putPrice;
                            var akhir = qtyReq * putPrice;
                            var status = $('#status').val();

                            qtyCek = qtyReq;

                            if(status == "Unspecified Product"){
                                if (qtyReq == '') {
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                    $("#savePRList").prop("disabled", true);
                                } else if (akhir > totalBalance) {
                                    Swal.fire("Error !", "Your Request Is Over Budget", "error");
                                    $("#lastQty").val(qty);
                                    $('#totalAkhir').html(qty * putPrice);
                                    $("#savePRList").prop("disabled", true);
                                } else {
                                    var totalReq = parseFloat(akhir);
                                    $('#totalAkhir').html(totalReq);
                                    $("#savePRList").prop("disabled", false);
                                }
                            }
                            else{
                                if (qtyReq == '') {
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                    $("#savePRList").prop("disabled", true);
                                } else if (qtyReq > putQty) {
                                    Swal.fire("Error !", "Your Qty Request is Over", "error");
                                    $("#lastQty").val(qty);
                                    $('#totalAkhir').html(qty * putPrice);
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                    $("#savePRList").prop("disabled", true);
                                } else if (akhir > awal) {
                                    Swal.fire("Error !", "Your Request Is Over Budget", "error");
                                    $("#lastQty").val(qty);
                                    $('#totalAkhir').html(qty * putPrice);
                                    $("#savePRList").prop("disabled", true);
                                } else {
                                    var totalReq = parseFloat(akhir);
                                    $('#totalAkhir').html(totalReq);
                                    $("#savePRList").prop("disabled", false);
                                }
                            }

                        });

                        $('.ChangePrices').keyup(function() {
                            var priceReq = $(this).val().replace(/[^a-zA-Z0-9 ]/g, "");
                            if (priceReq == 0 || priceReq == '') {
                                priceReq = 0;
                            }
                            
                            var total = qtyCek * priceReq;
                            var total2 = qtyCek * putPrice;
                            var status = $('#status').val();

                            if(status == "Unspecified Product"){    
                                if (priceReq == '') {
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                    $('#totalAkhir').html(0);

                                } else if (total > totalBalance) {
                                    alert(priceCek);
                                    Swal.fire("Error !", "Your Request Price Is Over Budget", "error");
                                    $("#lastPrice").val(priceCek);
                                    $('#totalAkhir').html(qtyCek * priceCek);
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                } else {
                                    var totalReq = total;
                                    $('#totalAkhir').html(totalReq);
                                    $("#addFromDetailtoCart").prop("disabled", false);
                                }
                            }
                            else{
                                
                                if (priceReq == '') {
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                    $('#totalAkhir').html(qtyCek * priceCek);

                                }  
                                else if (priceReq > putPrice) {
                                    Swal.fire("Error !", "Your Price Is Over Budget", "error");
                                    $("#lastPrice").val(priceCek);
                                    $('#totalAkhir').html(qtyCek * priceCek);
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                } 
                                else if (total > total2) {
                                    Swal.fire("Error !", "Your Request Price Is Over Budget", "error");
                                    $("#lastPrice").val(priceCek);
                                    $('#totalAkhir').html(qtyCek * priceCek);
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                }else {
                                    var totalReq = total;
                                    $('#totalAkhir').html(totalReq);
                                    $("#addFromDetailtoCart").prop("disabled", false);
                                }
                            }

                        });

                    });
                },
                error: function(data) {
                    Swal.fire("Error !", "Data Canceled Added", "error");
                }
            });


            $("#putProductId").css("border", "1px solid #ced4da");
            $("#putProductName").css("border", "1px solid #ced4da");
            $("#putRemark").css("border", "1px solid #ced4da");
            $("#qtyCek").css    ("border", "1px solid #ced4da");
            $("#putUom").css    ("border", "1px solid #ced4da");

            $("#putProductId").val("");
            $("#putProductName").val("");
            $("#qtyCek").val("0");
            $("#putUom").val("");
            $("#priceCek").val("0");
            $("#putCurrency").val("");
            $("#putRemark").val("");
            $("#totalPRDetails").val("");
            $("#totalRequester").val("0");
            $("#totalQtyRequest").val("0");
            $("#totalBalance").val("0");

            $("#iconProductId").hide();
            $("#iconQty").hide();
            $("#iconRemark").hide();
            $("#iconProductId2").hide();
            $("#iconQty2").hide();
            $("#iconRemark2").hide();

            $("#savePRList").prop("disabled", false);




            $("#submitPR").prop("disabled", false);

            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);
            $("#detailPRList").show();

        }

    });
</script> -->