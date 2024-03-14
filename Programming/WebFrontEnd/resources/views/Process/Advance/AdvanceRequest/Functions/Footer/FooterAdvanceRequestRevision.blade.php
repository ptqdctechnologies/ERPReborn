<script type="text/javascript">
    $("#project_code_popup").prop("disabled", true);
    $("#site_code_popup").prop("disabled", true);
    $("#addFromDetailtoCart").prop("disabled", true);
    $("#showContentBOQ3").hide();
    $("#product_id2").prop("disabled", true);
    // $("#submitArf").prop("disabled", true);
</script>

<script type="text/javascript">
    var TotalBudgetList = 0;
    var TotalQty = 0;
    var TotalPayment = 0;
    var dataDetail = $.parseJSON('<?= json_encode($dataDetail) ?>');
    dataDetail.forEach((dataDetails, key) => {

        TotalBudgetList += +(dataDetails['PriceBaseCurrencyValue']);

        // TABLE LIST 
        var html =
            '<tr>' +
            '<td style="border:1px solid #e9ecef;">' + dataDetails['DocumentNumber'] + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + dataDetails['Product_RefID'] + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + dataDetails['ProductName'] + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + dataDetails['QuantityUnitName'] + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + dataDetails['ProductUnitPriceCurrencyISOCode'] + '</td>' +
            '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + key + '" class="price_req2' + key + '">' + currencyTotal(dataDetails['ProductUnitPriceBaseCurrencyValue']) + '</span>' + '</td>' +
            '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + key + '" class="qty_req2' + key + '">' + currencyTotal(dataDetails['Quantity']) + '</span>' + '</td>' +
            '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + key + '" class="total_req2' + key + '">' + currencyTotal(dataDetails['PriceBaseCurrencyValue']) + '</span>' + '</td>' +
            '</tr>';

        $('table.TableAdvance tbody').append(html);

        $("#GrandTotal").html(currencyTotal(TotalBudgetList));


        // TABLE BUDGET 

        applied = 0;
        status = "";
        statusDisplay = [];
        statusDisplay2 = [];
        statusForm = [];

        if (dataDetails['Quantity'] == "0.00" && dataDetails['Quantity'] == "0.00") {
            var applied = 0;
        } else {
            var applied = Math.round(parseFloat(dataDetails['Quantity']) / parseFloat(dataDetails['Quantity']) * 100);
        }
        if (dataDetails['ProductName'] == "Unspecified Product") {
            statusDisplay[key] = "";
            statusDisplay2[key] = "none";
            statusForm[key] = "disabled";
        } else {
            statusDisplay[key] = "none";
            statusDisplay2[key] = "";
            statusForm[key] = "";
        }

        var html2 =
            '<tr>' +
            '<input name="var_product_id[]" value="' + dataDetails['Product_RefID'] + '" type="hidden">' +
            '<input name="var_product_name[]" value="' + dataDetails['ProductName'] + '" type="hidden">' +
            '<input name="var_qty_id[]" value="' + dataDetails['QuantityUnit_RefID'] + '" type="hidden">' +
            '<input id="budget_qty' + key + '" value="' + dataDetails['Quantity'] + '" type="hidden">' +
            '<input id="budget_price' + key + '" value="' + dataDetails['ProductUnitPriceBaseCurrencyValue'] + '" type="hidden">' +
            '<input name="var_uom[]" value="' + dataDetails['QuantityUnitName'] + '" type="hidden">' +
            '<input name="var_currency_id[]" value="' + dataDetails['PriceCurrency_RefID'] + '" type="hidden">' +
            '<input name="var_currency[]" value="' + dataDetails['ProductUnitPriceCurrencyISOCode'] + '" type="hidden">' +
            '<input name="var_combinedBudgetSectionDetail_RefID[]" value="' + dataDetails['CombinedBudgetSectionDetail_RefID'] + '" type="hidden">' +
            '<input name="var_recordIDDetail[]" value="' + dataDetails['Sys_ID_AdvanceDetail'] + '"  type="hidden">' +
            '<input name="var_combinedBudget_RefID" value="' + dataDetails['CombinedBudget_RefID'] + '" type="hidden">' +
            '<input name="var_recordID" value="' + dataDetails['Sys_ID_Advance'] + '"  type="hidden">' +
            '<input name="total_payment[]" value="' + TotalPayment + '"  type="hidden">' +

            '<td style="border:1px solid #e9ecef;display:' + statusDisplay[key] + '";">' +
            '<div class="input-group">' +
            '<input id="product_id' + key + '" style="border-radius:0;width:130px;background-color:white;" name="product_id" class="form-control" readonly>' +
            '<div class="input-group-append">' +
            '<span style="border-radius:0;" class="input-group-text form-control" data-id="10">' +
            '<a id="product_id2" data-toggle="modal" data-target="#myProduct" onclick="KeyFunction(' + key + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
            '</span>' +
            '</div>' +
            '</div>' +
            '</td>' +

            '<td style="border:1px solid #e9ecef;">' + '<span>' + dataDetails['DocumentNumber'] + '</span>' + '</td>' +
            '<td style="border:1px solid #e9ecef;display:' + statusDisplay2[key] + '">' + '<span>' + dataDetails['Product_RefID'] + '</span>' + '</td>' +
            '<td style="border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + dataDetails['ProductName'] + '">' + '<span id="product_name' + key + '">' + dataDetails['ProductName'] + '</span>' + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + '<span id="total_balance_qty2' + key + '">' + currencyTotal(dataDetails['Quantity']) + '</span>' + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + '<span">' + currencyTotal(dataDetails['Quantity']) + '</span>' + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + '<span>' + currencyTotal(dataDetails['ProductUnitPriceBaseCurrencyValue']) + '</span>' + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + '<span>' + dataDetails['ProductUnitPriceCurrencyISOCode'] + '</span>' + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + '<span id="total_budget' + key + '">' + currencyTotal(dataDetails['PriceBaseCurrencyValue']) + '</span>' + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + '<span id="total_payment' + key + '">' + currencyTotal(TotalPayment) + '</span>' + '</td>' +

            '<td class="sticky-col forth-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req' + key + '" style="border-radius:0;" name="var_quantity[]" class="form-control qty_req" autocomplete="off" ' + statusForm[key] + ' onkeypress="return isNumberKey(this, event);" value="' + currencyTotal(dataDetails['Quantity']) + '">' + '</td>' +
            '<td class="sticky-col third-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="price_req' + key + '" style="border-radius:0;" name="var_price[]" class="form-control price_req" autocomplete="off" ' + statusForm[key] + ' onkeypress="return isNumberKey(this, event);" value="' + currencyTotal(dataDetails['ProductUnitPriceBaseCurrencyValue']) + '">' + '</td>' +
            '<td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_req' + key + '" style="border-radius:0;background-color:white;" name="total_req[]" class="form-control total_req" autocomplete="off" disabled value="' + currencyTotal(dataDetails['PriceBaseCurrencyValue']) + '">' + '</td>' +
            '<td class="sticky-col first-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_balance_qty' + key + '" style="border-radius:0;background-color:white;" name="total_balance_qty[]" class="form-control total_balance_qty" autocomplete="off" disabled value="' + currencyTotal(dataDetails['Quantity']) + '">' + '</td>' +
            '</tr>';

        $('table.tableBudgetDetail tbody').append(html2);

        $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetList));

        if (dataDetails['ProductName'] == "Unspecified Product") {
            //VALIDASI QTY
            $('#qty_req' + key).keyup(function() {
                var qty_val = $(this).val().replace(/,/g, '');
                var budget_qty_val = $("#budget_qty" + key).val();
                var price_req = $("#price_req" + key).val().replace(/,/g, '');
                var total_budget = $("#total_budget" + key).html().replace(/,/g, '');
                var total_payment = $("#total_payment" + key).html().replace(/,/g, '');
                var total = qty_val * price_req;

                if (qty_val == "") {
                    $('#total_req' + key).val("");
                    $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                } else if (parseFloat(total) > parseFloat(total_budget)) {

                    swal({
                        onOpen: function() {
                            swal.disableConfirmButton();
                            Swal.fire("Error !", "Total request is over budget than Budget!", "error");
                        }
                    });

                    $('#qty_req' + key).val("");
                    $('#total_req' + key).val("0.00");
                    $('#qty_req' + key).css("border", "1px solid red");
                    $('#qty_req' + key).focus();
                } else if (parseFloat(total) < parseFloat(total_payment)) {
                    swal({
                        onOpen: function() {
                            swal.disableConfirmButton();
                            Swal.fire("Error !", "Total Request cannot less than Total Payment !", "error");
                        }
                    });

                    $('#qty_req' + key).val("");
                    $('#total_req' + key).val("0.00");
                    $('#qty_req' + key).focus();
                } else {
                    $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                    $('#total_req' + key).val(currencyTotal(total));
                }

                //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                TotalBudgetSelected();
                //MEMANGGIL FUNCTION TOTAL BALANCE QTY MISSCELNOUS SELECTED
                TotalBalanceQtyMisscelnousSelected(key);
            });

            //VALIDASI PRICE
            $('#price_req' + key).keyup(function() {
                var price_val = $(this).val().replace(/,/g, '');
                var budget_price_val = $("#budget_price" + key).val().replace(/,/g, '');
                var qty_req = $("#qty_req" + key).val();
                var total_budget = $("#total_budget" + key).html().replace(/,/g, '');
                var total_payment = $("#total_payment" + key).html().replace(/,/g, '');
                var total = price_val * qty_req;

                if (price_val == "") {
                    $('#total_req' + key).val("");
                    $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                } else if (parseFloat(total) > parseFloat(total_budget)) {
                    swal({
                        onOpen: function() {
                            swal.disableConfirmButton();
                            Swal.fire("Error !", "Total request is over budget than Budget!", "error");
                        }
                    });

                    $('#price_req' + key).val("");
                    $('#total_req' + key).val("0.00");
                    $('#price_req' + key).css("border", "1px solid red");
                    $('#price_req' + key).focus();
                } else if (parseFloat(total) < parseFloat(total_payment)) {
                    swal({
                        onOpen: function() {
                            swal.disableConfirmButton();
                            Swal.fire("Error !", "Total Request cannot less than Total Payment !", "error");
                        }
                    });

                    $('#total_req' + key).val("0.00");
                    $('#price_req' + key).val("");
                    $('#price_req' + key).focus();
                } else if (parseFloat(price_val) > parseFloat(budget_price_val)) {
                    swal({
                        onOpen: function() {
                            swal.disableConfirmButton();
                            Swal.fire("Error !", "Price is over budget !", "error");
                        }
                    });
                    $('#price_req' + key).val("");
                    $('#total_req' + key).val("0.00");
                    $('#price_req' + key).focus();
                } else {
                    $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                    $('#total_req' + key).val(currencyTotal(total));

                }

                //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                TotalBudgetSelected();
                //MEMANGGIL FUNCTION TOTAL BALANCE QTY MISSCELNOUS SELECTED
                TotalBalanceQtyMisscelnousSelected(key);
            });
        } else {
            //VALIDASI QTY
            $('#qty_req' + key).keyup(function() {
                var qty_val = $(this).val().replace(/,/g, '');
                var budget_qty_val = $("#budget_qty" + key).val();
                var price_req = $("#price_req" + key).val().replace(/,/g, '');
                var total_payment = $("#total_payment" + key).html().replace(/,/g, '');
                var total = qty_val * price_req;

                if (qty_val == "") {
                    $('#total_req' + key).val("");
                    $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                } else if (parseFloat(total) < parseFloat(total_payment)) {

                    // CALL FUNCTION ERROR NOTIFICATION
                    ErrorNotif("Total Request cannot less than Total Payment !");

                    $('#qty_req' + key).val("");
                    $('#total_req' + key).val("0.00");
                    $('#qty_req' + key).focus();
                } else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {

                    // CALL FUNCTION ERROR NOTIFICATION
                    ErrorNotif("Qty is over budget !");

                    $('#qty_req' + key).val("");
                    $('#total_req' + key).val("0.00");
                    $('#qty_req' + key).focus();
                } else {
                    $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                    $('#total_req' + key).val(currencyTotal(total));
                }

                //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                TotalBudgetSelected();
                //MEMANGGIL FUNCTION TOTAL BALANCE QTY SELECTED
                TotalBalanceQtySelected(key);
            });

            //VALIDASI PRICE
            $('#price_req' + key).keyup(function() {
                var price_val = $(this).val().replace(/,/g, '');
                var budget_price_val = $("#budget_price" + key).val().replace(/,/g, '');
                var qty_req = $("#qty_req" + key).val();
                var total_payment = $("#total_payment" + key).html().replace(/,/g, '');
                var total = price_val * qty_req;

                if (price_val == "") {
                    $('#total_req' + key).val("");
                    $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                } else if (parseFloat(total) < parseFloat(total_payment)) {

                    // CALL FUNCTION ERROR NOTIFICATION
                    ErrorNotif("Total Request cannot less than Total Payment !");

                    $('#price_req' + key).val("");
                    $('#total_req' + key).val("0.00");
                    $('#price_req' + key).focus();
                } else if (parseFloat(price_val) > parseFloat(budget_price_val)) {

                    // CALL FUNCTION ERROR NOTIFICATION
                    ErrorNotif("Price is over budget !");

                    $('#price_req' + key).val("");
                    $('#total_req' + key).val("0.00");
                    $('#price_req' + key).focus();
                } else {
                    $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                    $('#total_req' + key).val(currencyTotal(total));

                }

                //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                TotalBudgetSelected();
                //MEMANGGIL FUNCTION TOTAL BALANCE QTY SELECTED
                TotalBalanceQtySelected(key);
            });
        }

    });
</script>

<script>
    function addFromDetailtoCartJs() {

        $('#TableAdvance').find('tbody').empty();
        $(".AdvanceListCart").show();
        $(".Remark").show();

        var trano = $.parseJSON('<?= json_encode($dataDetail[0]['DocumentNumber']) ?>');

        var getProductId = $("input[name='var_product_id[]']").map(function() {
            return $(this).val();
        }).get();
        var getProductName = $("input[name='var_product_name[]']").map(function() {
            return $(this).val();
        }).get();
        var getUom = $("input[name='var_uom[]']").map(function() {
            return $(this).val();
        }).get();
        var getCurrency = $("input[name='var_currency[]']").map(function() {
            return $(this).val();
        }).get();
        var qty_req = $("input[name='var_quantity[]']").map(function() {
            return $(this).val();
        }).get();
        var price_req = $("input[name='var_price[]']").map(function() {
            return $(this).val();
        }).get();
        var total_req = $("input[name='total_req[]']").map(function() {
            return $(this).val();
        }).get();
        var total_payment = $("input[name='total_payment[]']").map(function() {
            return $(this).val();
        }).get();

        var TotalBudgetList = 0;
        var TotalQty = 0;

        $.each(total_req, function(index, data) {

            if (total_req[index] < total_payment[index]) {

                // CALL FUNCTION ERROR NOTIFICATION
                ErrorNotif("Total Payment is over budget than Total Request !");

                $('#qty_req' + index).focus();
            } else {

                var product_id = getProductId[index];
                var product_name = getProductName[index];

                if (getProductName[index] == "Unspecified Product") {
                    var product_id = $("#product_id" + index).val();
                    var product_name = $("#product_name" + index).html();
                }
                TotalBudgetList += +total_req[index].replace(/,/g, '');
                TotalQty += +qty_req[index].replace(/,/g, '');
                var html = '<tr>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + trano + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + product_id + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + product_name + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getUom[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="price_req2' + index + '">' + currencyTotal(price_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="qty_req2' + index + '">' + currencyTotal(qty_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="total_req2' + index + '">' + currencyTotal(total_req[index]) + '</span>' + '</td>' +
                    '</tr>';
                $('table.TableAdvance tbody').append(html);

                $("#GrandTotal").html(currencyTotal(TotalBudgetList));
                $("#TotalQty").html(currencyTotal(TotalQty));

                $("#submitArf").prop("disabled", false);
            }
        });

    }
</script>



<script>
    $(function() {
        $("#FormUpdateAdvance").on("submit", function(e) { //id of form 
            e.preventDefault();

            // MANDATORY VALIDATION
            var MandatoryListVar = new Object();
            MandatoryListVar['remark'] = $("#remark").val();
            MandatoryListVar['bank_account'] = $("#bank_account").val();
            MandatoryListVar['bank_name'] = $("#bank_name").val();
            MandatoryListVar['beneficiary'] = $("#beneficiary").val();
            MandatoryListVar['requester'] = $("#requester").val();

            var MandatoryListCount = MandatoryListFunction(MandatoryListVar);
            // // END MANDATORY VALIDATION

            if (MandatoryListCount == 0) {
                $("#submitArf").prop("disabled", true);

                const swalWithBootstrapButtons = Swal.mixin({
                    confirmButtonClass: 'btn btn-success btn-sm',
                    cancelButtonClass: 'btn btn-danger btn-sm',
                    buttonsStyling: true,
                })

                swalWithBootstrapButtons.fire({

                    title: 'Are you sure?',
                    text: "Save this data?",
                    type: 'question',

                    showCancelButton: true,
                    confirmButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/save.png") }}" width="13" alt=""><span style="color:black;">Yes, save it </span>',
                    cancelButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/cancel.png") }}" width="13" alt=""><span style="color:black;"> No, cancel </span>',
                    confirmButtonColor: '#e9ecef',
                    cancelButtonColor: '#e9ecef',
                    reverseButtons: true
                }).then((result) => {

                    if (result.value) {
                        
                        var action = $(this).attr("action"); //get submit action from form
                        var method = $(this).attr("method"); // get submit method
                        var form_data = new FormData($(this)[0]); // convert form into formdata 
                        var form = $(this);

                        ShowLoading();

                        $.ajax({
                            url: action,
                            dataType: 'json', // what to expect back from the server
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: method,
                            success: function(response) {
                                console.log(response);
                                if (response.message == "WorkflowError") {
                                    HideLoading();
                                    $("#submitArf").prop("disabled", false);
                                    // CALL FUNCTION DO NOT HAVE ACCESS NOTIF
                                    CancelNotif("You don't have access", '/AdvanceRequest?var=1');
                                }
                                else if (response.message == "MoreThanOne") {

                                    HideLoading();

                                    $('#getWorkFlow').modal('toggle');

                                    var t = $('#tableGetWorkFlow').DataTable();
                                    t.clear();
                                    $.each(response.data, function(key, val) {
                                        t.row.add([
                                            '<td><span data-dismiss="modal" onclick="SelectWorkFlow(\'' + val.Sys_ID + '\', \'' + val.NextApprover_RefID + '\', \'' + response.approverEntity_RefID + '\', \'' + response.documentTypeID + '\', \'' + response.Sys_ID_Advance + '\');"><img src="{{ asset("AdminLTE-master/dist/img/add.png") }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></span></td>',
                                            '<td style="border:1px solid #e9ecef;">' + val.FullApproverPath + '</td></tr></tbody>'
                                        ]).draw();
                                    });

                                } else {

                                    HideLoading();

                                    SelectWorkFlow(response.workFlowPath_RefID, response.nextApprover_RefID, response.approverEntity_RefID, response.documentTypeID, response.Sys_ID_Advance);

                                }
                            },

                            error: function(response) {
                                HideLoading();
                                $("#submitArf").prop("disabled", false);
                                // CALL FUNCTION DO NOT HAVE ACCESS NOTIF
                                CancelNotif("You don't have access", '/AdvanceRequest?var=1');

                            },

                        })


                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        HideLoading();
                        // FUNCTION ERROR NOTIFICATION 
                        CancelNotif("Data Cancel Inputed", '/AdvanceRequest?var=1');
                    }
                })
            }
        });
    });
</script>

<script>
    function SelectWorkFlow(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, documentTypeID, Sys_ID_Advance) {

        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success btn-sm',
            cancelButtonClass: 'btn btn-danger btn-sm',
            buttonsStyling: true,
        })

        swalWithBootstrapButtons.fire({

            title: 'Comment',
            text: "Please write your comment here",
            type: 'question',
            input: 'textarea',
            showCloseButton: false,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: '<span style="color:black;"> OK </span>',
            confirmButtonColor: '#4B586A',
            confirmButtonColor: '#e9ecef',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                ShowLoading();

                var fileAttachment = "";
                var file = $("#dataInput_Log_FileUpload_Pointer_RefID_Action").val();
                if (file) {

                    setTimeout(function(){

                        varFileUpload_UniqueID = "Upload";
                        window['JSFunc_GetActionPanel_CommitFromOutside_' + varFileUpload_UniqueID]();
                        fileAttachment = $("#dataInput_Log_FileUpload_Pointer_RefID").val();
                        if(fileAttachment != ""){
                            
                            AdvanceRequestStore(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, fileAttachment, documentTypeID, result.value, Sys_ID_Advance);

                        }
                    }, 20);
                }
                else{

                    AdvanceRequestStore(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, fileAttachment, documentTypeID, result.value, Sys_ID_Advance);
                    
                }
                

            }
        })

    }
</script>

<script type="text/javascript">
    function AdvanceRequestStore(workFlowPath_RefID, nextApprover_RefID, approverEntity_RefID, fileAttachment, documentTypeID, comment, Sys_ID_Advance) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var data = {
            workFlowPath_RefID : workFlowPath_RefID,
            nextApprover_RefID : nextApprover_RefID,
            approverEntity_RefID : approverEntity_RefID,
            fileAttachment : fileAttachment,
            documentTypeID : documentTypeID,
            Sys_ID_Advance : Sys_ID_Advance,
            comment : comment

         };

        $.ajax({
            type: 'POST',
            data: data,
            url: '{!! route("AdvanceRequest.updates") !!}',
            success: function(data) {
                HideLoading();
                if(data.status == 200){
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    })

                    swalWithBootstrapButtons.fire({

                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been updated',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        if (result.value) {
                            ShowLoading();
                            window.location.href = '/AdvanceRequest?var=1';
                        }
                    })
                }
                else{
                    ErrorNotif("Data Cancel Inputed");
                }

            },
            error: function(jqXHR, textStatus, errorThrown) {
                // FUNCTION ERROR NOTIFICATION 
                ErrorNotif("Data Cancel Inputed");
            }
        });
    }
    
</script>

<script type="text/javascript">
    function CancelAdvance() {
        ShowLoading();
        window.location.href = '/AdvanceRequest?var=1';
    }
</script>