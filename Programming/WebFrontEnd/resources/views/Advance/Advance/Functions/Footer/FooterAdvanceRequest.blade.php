<script type="text/javascript">
    $("#sitecode2").prop("disabled", true);
    $("#request_name2").prop("disabled", true);
    $("#beneficiary_name2").prop("disabled", true);
    $("#product_id2").prop("disabled", true);
    $("#bank_name2").prop("disabled", true);
    $("#bank_account2").prop("disabled", true);
    // $("#submitArf").prop("disabled", true);
</script>

<script>
    $('#tableGetProject tbody').on('click', 'tr', function() {

        //RESET FORM
        document.getElementById("formSubmitArf").reset();
        $("#dataInput_Log_FileUpload_Pointer_RefID").val("");
        $("#dataInput_Log_FileUpload_Pointer_RefID_Action").val("");
        $('.tableBudgetDetail').find('tbody').empty();
        $('.TableAdvance').find('tbody').empty();
        $('#zhtSysObjDOMTable_Upload_ActionPanel').find('tbody').empty();
        $('#TotalBudgetSelected').html(0);
        $('#GrandTotal').html(0);
        $("#submitArf").prop("disabled", true);
        //END RESET FORM

        $("#myProject").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_budget' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#projectcode").val(code);
        $("#projectname").val(name);
        $("#sitecode2").prop("disabled", false);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getSite") !!}?projectcode=' + sys_id,
            success: function(data) {

                var no = 1;
                var t = $('#tableGetSite').DataTable();
                t.clear();
                $.each(data, function(key, val) {
                    keys += 1;
                    t.row.add([
                        '<tbody><tr><input id="sys_id_site' + keys + '" value="' + val.sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                        '<td>' + val.code + '</td>',
                        '<td>' + val.name + '</td></tr></tbody>'
                    ]).draw();
                });
            }
        });
    });
</script>

<script>
    $('#tableGetSite tbody').on('click', 'tr', function() {

        //RESET FORM
        $('.TableAdvance').find('tbody').empty();
        $('.tableBudgetDetail').find('tbody').empty();
        $('#TotalBudgetSelected').html(0);
        $('#GrandTotal').html(0);
        $("#submitArf").prop("disabled", true);
        //END RESET FORM


        $("#mySiteCode").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_site' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#sitecode").val(code);
        $("#sitename").val(name);

        $("#addToDoDetail").prop("disabled", false);
        $(".tableShowHideBudget").show();
        $("#request_name2").prop("disabled", false);
        $("#beneficiary_name2").prop("disabled", false);


        $(".file-attachment").show();
        $(".advance-detail").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBudget") !!}?sitecode=' + sys_id,
            success: function(data) {
                var no = 1;
                applied = 0;
                status = "";
                statusDisplay = [];
                statusDisplay2 = [];
                statusForm = [];
                $.each(data, function(key, val2) {

                    var used = val2.quantityAbsorptionRatio * 100;

                    if (used == "0.00" && val2.quantity == "0.00") {
                        var applied = 0;
                    } else {
                        var applied = Math.round(used);
                    }
                    if (applied >= 100) {
                        var status = "disabled";
                    }
                    if (val2.productName == "Unspecified Product") {
                        statusDisplay[key] = "";
                        statusDisplay2[key] = "none";
                        statusForm[key] = "disabled";
                        balance_qty = "-";
                    } else {
                        statusDisplay[key] = "none";
                        statusDisplay2[key] = "";
                        statusForm[key] = "";
                        balance_qty = currencyTotal(val2.quantityRemain);
                    }

                    var html = '<tr>' +
                        '<input name="getWorkId[]" value="' + val2.combinedBudgetSubSectionLevel1_RefID + '" type="hidden">' +
                        '<input name="getWorkName[]" value="' + val2.combinedBudgetSubSectionLevel1Name + '" type="hidden">' +
                        '<input name="getProductId[]" value="' + val2.product_RefID + '" type="hidden">' +
                        '<input name="getProductName[]" value="' + val2.productName + '" type="hidden">' +
                        '<input name="getQtyId[]" id="budget_qty_id' + key + '" value="' + val2.quantityUnit_RefID + '" type="hidden">' +
                        '<input name="getQty[]" id="budget_qty' + key + '" value="' + val2.quantity + '" type="hidden">' +
                        '<input name="getPrice[]" id="budget_price' + key + '" value="' + val2.priceBaseCurrencyValue + '" type="hidden">' +
                        '<input name="getUom[]" value="' + val2.quantityUnitName + '" type="hidden">' +
                        '<input name="getCurrency[]" value="' + val2.priceBaseCurrencyISOCode + '" type="hidden">' +
                        '<input name="getCurrencyId[]" value="' + val2.sys_BaseCurrency_RefID + '" type="hidden">' +
                        '<input name="combinedBudgetSectionDetail_RefID[]" value="' + val2.sys_ID + '" type="hidden">' +
                        '<input name="combinedBudget_RefID" value="' + val2.combinedBudget_RefID + '" type="hidden">' +

                        '<td style="border:1px solid #e9ecef;">' +
                        '&nbsp;&nbsp;&nbsp;<div class="progress ' + status + ' progress-xs" style="height: 14px;border-radius:8px;"> @if(' + applied + ' >= ' + 0 + ' && ' + applied + ' <= ' + 40 + ')<div class="progress-bar bg-red" style="width:' + applied + '%;"></div> @elseif(' + applied + ' >= ' + 41 + ' && ' + applied + ' <= ' + 89 + ')<div class="progress-bar bg-blue" style="width:' + applied + '%;"></div> @elseif(' + applied + ' >= ' + 90 + ' && ' + applied + ' <= ' + 100 + ')<div class="progress-bar bg-green" style="width:' + applied + '%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>' + applied + ' %</center></small>' +
                        '</td>' +

                        '<td style="border:1px solid #e9ecef;display:' + statusDisplay[key] + '";">' +
                        '<div class="input-group">' +
                        '<input id="putProductId' + key + '" style="border-radius:0;width:130px;background-color:white;" name="putProductId" class="form-control" readonly>' +
                        '<div class="input-group-append">' +
                        '<span style="border-radius:0;" class="input-group-text form-control" data-id="10">' +
                        '<a id="product_id2" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(' + key + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                        '</span>' +
                        '</div>' +
                        '</div>' +
                        '</td>' +

                        '<td style="border:1px solid #e9ecef;display:' + statusDisplay2[key] + '">' + '<span>' + val2.product_RefID + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="putProductName' + key + '">' + val2.productName + '</span>' + '</td>' +
                        '<input id="putUom' + key + '" type="hidden">' +

                        '<input id="TotalBudget' + key + '" type="hidden">' +

                        '<td style="border:1px solid #e9ecef;">' + '<span>' + currencyTotal(val2.quantity) + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="total_balance_qty2' + key + '">' + balance_qty + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span>' + currencyTotal(val2.priceBaseCurrencyValue) + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.priceBaseCurrencyISOCode + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="total_budget' + key + '">' + currencyTotal(val2.quantity * val2.priceBaseCurrencyValue) + '</span>' + '</td>' +
                        // '<td style="border:1px solid #e9ecef;">' + '<span>' + currencyTotal(val2.priceBaseCurrencyValue) + '</span>' + '</td>' +

                        '<td class="sticky-col forth-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req' + key + '" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" onkeypress="return isNumberKey(this, event);" autocomplete="off" ' + statusForm[key] + '>' + '</td>' +
                        '<td class="sticky-col third-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="price_req' + key + '" style="border-radius:0;" name="price_req[]" class="form-control price_req" onkeypress="return isNumberKey(this, event);" autocomplete="off" ' + statusForm[key] + '>' + '</td>' +
                        '<td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_req' + key + '" style="border-radius:0;background-color:white;" name="total_req[]" class="form-control total_req" autocomplete="off" disabled>' + '</td>' +
                        '<td class="sticky-col first-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_balance_qty' + key + '" style="border-radius:0;width:90px;background-color:white;" name="total_balance_qty[]" class="form-control total_balance_qty" autocomplete="off" disabled value="' + balance_qty + '">' + '</td>' +

                        '</tr>';
                    $('table.tableBudgetDetail tbody').append(html);

                    if (val2.productName == "Unspecified Product") {

                        //VALIDASI QTY
                        $('#qty_req' + key).keyup(function() {
                            $(this).val(currency($(this).val()));
                            var qty_val = $(this).val().replace(/,/g, '');
                            var budget_qty_val = $("#budget_qty" + key).val().replace(/,/g, '');
                            var price_req = $("#price_req" + key).val().replace(/,/g, '');
                            var total_budget = $("#total_budget" + key).html().replace(/,/g, '');
                            var total = qty_val * price_req;

                            if (qty_val == "") {
                                $('#total_req' + key).val("");
                                $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                            } else if (parseFloat(total) > parseFloat(total_budget)) {

                                // CALL FUNCTION ERROR NOTIFICATION 
                                ErrorNotif("Total request is over budget than Budget!");

                                $('#qty_req' + key).val("");
                                $('#total_req' + key).val("");
                                $('#qty_req' + key).css("border", "1px solid red");
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
                            $(this).val(currency($(this).val()));
                            var price_val = $(this).val().replace(/,/g, '');
                            var budget_price_val = $("#budget_price" + key).val().replace(/,/g, '');
                            var qty_req = $("#qty_req" + key).val().replace(/,/g, '');
                            var total_budget = $("#total_budget" + key).html().replace(/,/g, '');
                            var total = price_val * qty_req;

                            if (price_val == "") {
                                $('#total_req' + key).val("");
                                $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                            } else if (parseFloat(price_val) > parseFloat(budget_price_val)) {

                                // CALL FUNCTION ERROR NOTIFICATION
                                ErrorNotif("Price is over budget !");

                                $('#price_req' + key).val("");
                                $('#total_req' + key).val("");
                                $('#price_req' + key).css("border", "1px solid red");
                                $('#price_req' + key).focus();
                            } else if (parseFloat(total) > parseFloat(total_budget)) {

                                // CALL FUNCTION ERROR NOTIFICATION
                                ErrorNotif("Total request is over budget than Budget !");

                                $('#price_req' + key).val("");
                                $('#total_req' + key).val("");
                                $('#price_req' + key).css("border", "1px solid red");
                                $('#price_req' + key).focus();
                            } else {
                                $("input[name='price_req[]']").css("border", "1px solid #ced4da");
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
                            $(this).val(currency($(this).val()));
                            var qty_val = $(this).val().replace(/,/g, '');
                            var budget_qty_val = $("#budget_qty" + key).val().replace(/,/g, '');
                            var price_req = $("#price_req" + key).val().replace(/,/g, '');
                            var total = qty_val * price_req;

                            if (qty_val == "") {
                                $('#total_req' + key).val("");
                                $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                            } else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {

                                // CALL FUNCTION ERROR NOTIFICATION
                                ErrorNotif("Qty is over budget !");

                                $('#qty_req' + key).val("");
                                $('#total_req' + key).val("");
                                $('#qty_req' + key).css("border", "1px solid red");
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
                            $(this).val(currency($(this).val()));
                            var price_val = $(this).val().replace(/,/g, '');
                            var budget_price_val = $("#budget_price" + key).val().replace(/,/g, '');
                            var qty_req = $("#qty_req" + key).val().replace(/,/g, '');
                            var total = price_val * qty_req;

                            if (price_val == "") {
                                $('#total_req' + key).val("");
                                $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                            } else if (parseFloat(price_val) > parseFloat(budget_price_val)) {

                                // CALL FUNCTION ERROR NOTIFICATION
                                ErrorNotif("Price is over budget !");

                                $('#price_req' + key).val("");
                                $('#total_req' + key).val("");
                                $('#price_req' + key).css("border", "1px solid red");
                                $('#price_req' + key).focus();
                            } else {

                                $("input[name='price_rmisaleq[]']").css("border", "1px solid #ced4da");
                                $('#total_req' + key).val(currencyTotal(total));
                            }

                            //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                            TotalBudgetSelected();
                            //MEMANGGIL FUNCTION TOTAL BALANCE QTY SELECTED
                            TotalBalanceQtySelected(key);

                        });
                    }

                });
            }
        });
    });
</script>

<script>
    function addFromDetailtoCartJs() {

        $('#TableAdvance').find('tbody').empty();

        $(".AdvanceListCart").show();
        $(".Remark").show();

        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');

        // var today = new Date();
        // var date = formatDate(today);

        var getWorkId = $("input[name='getWorkId[]']").map(function() {
            return $(this).val();
        }).get();
        var getWorkName = $("input[name='getWorkName[]']").map(function() {
            return $(this).val();
        }).get();
        var getProductId = $("input[name='getProductId[]']").map(function() {
            return $(this).val();
        }).get();
        var getProductName = $("input[name='getProductName[]']").map(function() {
            return $(this).val();
        }).get();
        var getUom = $("input[name='getUom[]']").map(function() {
            return $(this).val();
        }).get();
        var getQtyId = $("input[name='getQtyId[]']").map(function() {
            return $(this).val();
        }).get();
        var getCurrencyId = $("input[name='getCurrencyId[]']").map(function() {
            return $(this).val();
        }).get();
        var getCurrency = $("input[name='getCurrency[]']").map(function() {
            return $(this).val();
        }).get();
        var qty_req = $("input[name='qty_req[]']").map(function() {
            return $(this).val();
        }).get();
        var price_req = $("input[name='price_req[]']").map(function() {
            return $(this).val();
        }).get();
        var combinedBudgetSectionDetail_RefID = $("input[name='combinedBudgetSectionDetail_RefID[]']").map(function() {
            return $(this).val();
        }).get();
        var combinedBudget_RefID = $("input[name='combinedBudget_RefID']").val();
        var TotalBudget = 0;
        var TotalQty = 0;

        var total_req = $("input[name='total_req[]']").map(function() {
            return $(this).val();
        }).get();
        $.each(total_req, function(index, data) {
            if (total_req[index] != "" && total_req[index] > "0.00" && total_req[index] != "NaN.00") {

                var putProductId = getProductId[index];
                var putProductName = getProductName[index];
                var putUom = getUom[index];

                if (getProductName[index] == "Unspecified Product") {
                    var putProductId = $("#putProductId" + index).val();
                    var putProductName = $("#putProductName" + index).html();
                    var putUom = $("#putUom" + index).val();
                }
                TotalBudget += +total_req[index].replace(/,/g, '');
                TotalQty += +qty_req[index].replace(/,/g, '');
                var html = '<tr>' +

                    '<input type="hidden" name="var_product_id[]" value="' + putProductId + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity[]" class="qty_req2' + index + '" data-id="' + index + '" value="' + currencyTotal(qty_req[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_qty_id[]" value="' + getQtyId[index] + '">' +
                    '<input type="hidden" name="var_currency_id[]" value="' + getCurrencyId[index] + '">' +
                    '<input type="hidden" name="var_price[]" class="price_req2' + index + '" value="' + currencyTotal(price_req[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_total[]" class="total_req2' + index + '" value="' + total_req[index] + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + getCurrency[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combinedBudgetSectionDetail_RefID[]" value="' + combinedBudgetSectionDetail_RefID[index] + '">' +
                    '<input type="hidden" name="var_combinedBudget_RefID" value="' + combinedBudget_RefID + '">' +

                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkId[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkName[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putUom + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="price_req2' + index + '">' + currencyTotal(price_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="qty_req2' + index + '">' + currencyTotal(qty_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="total_req2' + index + '">' + currencyTotal(total_req[index]) + '</span>' + '</td>' +
                    '</tr>';
                $('table.TableAdvance tbody').append(html);

                $("#GrandTotal").html(currencyTotal(TotalBudget));
                $("#TotalQty").html(currencyTotal(TotalQty));
                $("#submitArf").prop("disabled", false);
            }
        });

    }
</script>

<script>
    $(function() {
        $("#formSubmitArf").on("submit", function(e) { //id of form 
            e.preventDefault();
            var valRequestName = $("#request_name").val();
            var valBeneficiaryName = $("#beneficiary_name").val();
            var valBankName = $("#bank_name").val();
            var valBankAccount = $("#bank_account").val();
            var valRemark = $("#putRemark").val();
            $("#request_name").css("border", "1px solid #ced4da");
            $("#putRemark").css("border", "1px solid #ced4da");

            if (valRequestName === "") {
                $("#request_name").focus();
                $("#request_name").attr('required', true);
                $("#request_name").css("border", "1px solid red");
            } else if (valBeneficiaryName === "") {
                $("#beneficiary_name").focus();
                $("#beneficiary_name").attr('required', true);
                $("#beneficiary_name").css("border", "1px solid red");
            } else if (valBankName === "") {
                $("#bank_name").focus();
                $("#bank_name").attr('required', true);
                $("#bank_name").css("border", "1px solid red");
            } else if (valBankAccount === "") {
                $("#bank_account").focus();
                $("#bank_account").attr('required', true);
                $("#bank_account").css("border", "1px solid red");
            } else if (valRemark === "") {
                $("#putRemark").focus();
                $("#putRemark").attr('required', true);
                $("#putRemark").css("border", "1px solid red");
            } else {

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

                        varFileUpload_UniqueID = "Upload";
                        window['JSFunc_GetActionPanel_CommitFromOutside_' + varFileUpload_UniqueID]();

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
                                if (response.message == "MoreThanOne") {

                                    HideLoading();

                                    $('#getWorkFlow').modal('toggle');

                                    var t = $('#tableGetWorkFlow').DataTable();
                                    t.clear();
                                    $.each(response.data, function(key, val) {
                                        t.row.add([
                                            '<td><span data-dismiss="modal" onclick="SelectWorkFlow(\'' + val.sys_ID + '\', \'' + response.businessDocument_RefID + '\', \'' + response.documentNumber + '\', \'' + response.approverEntity_RefID + '\');"><img src="{{ asset("AdminLTE-master/dist/img/add.png") }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></span></td>',
                                            '<td style="border:1px solid #e9ecef;">' + val.fullApproverPath + '</td></tr></tbody>'
                                        ]).draw();
                                    });

                                } else {

                                    HideLoading();

                                    SelectWorkFlow(response.workFlowPath_RefID, response.businessDocument_RefID, response.documentNumber, response.approverEntity_RefID);

                                }
                            },

                            error: function(response) { // handle the error
                                HideLoading();
                                $("#submitArf").prop("disabled", false);
                                // CALL FUNCTION DO NOT HAVE ACCESS NOTIF
                                DoNotHaveAccessNotif("You don't have access", '/AdvanceRequest?var=1');

                            },

                        })


                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        HideLoading();
                        // FUNCTION ERROR NOTIFICATION 
                        ErrorNotif("Data Cancel Inputed");
                    }
                })
            }
        });
    });
</script>

<script>
    function SelectWorkFlow(workFlowPath_RefID, businessDocument_RefID, documentNumber, approverEntity_RefID) {

        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success btn-sm',
            cancelButtonClass: 'btn btn-danger btn-sm',
            buttonsStyling: true,
        })

        swalWithBootstrapButtons.fire({

            title: 'Comment',
            text: "Please write your comment here",
            type: 'question',
            input: 'text',
            showCloseButton: false,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: '<span style="color:black;"> OK </span>',
            confirmButtonColor: '#4B586A',
            confirmButtonColor: '#e9ecef',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'GET',
                    url: '{!! route("StoreWorkFlow") !!}?workFlowPath_RefID=' + workFlowPath_RefID + '&businessDocument_RefID=' + businessDocument_RefID + '&documentNumber=' + documentNumber + '&approverEntity_RefID=' + approverEntity_RefID + '&comment=' + result.value,
                    success: function(data) {

                        HideLoading();

                        swalWithBootstrapButtons.fire({

                            title: 'Successful !',
                            type: 'success',
                            html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + data.documentNumber + '</span>',
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

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // FUNCTION ERROR NOTIFICATION 
                        ErrorNotif("Data Cancel Inputed");
                    }
                });

            }
        })

    }
</script>

<script type="text/javascript">
    function CancelAdvance() {
        ShowLoading();
        window.location.href = '/AdvanceRequest?var=1';
    }
</script>