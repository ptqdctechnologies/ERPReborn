<script type="text/javascript">
    $("#addAsfListCart").prop("disabled", true);
    $("#SaveAsfList").prop("disabled", true);
    $("#bank_name2").prop("disabled", true);
    $("#bank_account2").prop("disabled", true);
    $("#detailASF").hide();
</script>

<script>
    function TableSearchArfinAsf(data) {
        $('.TableSearchArfinAsf').find('tbody').empty();
        var no = 1;
        t = $('#TableSearchArfinAsf').DataTable();
        t.clear().draw();

        var keys = 0;

        $.each(data, function(key, val) {
            keys += 1;
            t.row.add([
                '<tbody><tr><input id="advance_RefID' + keys + '" value="' + val.Sys_ID + '" type="hidden"><input id="beneficiary_id' + keys + '" value="' + val.BeneficiaryWorkerJobsPosition_RefID + '" type="hidden"><td>' + no++ + '</td>',
                '<td>' + val.DocumentNumber + '</td>',
                '<td>' + val.CombinedBudgetCode + '</td>',
                '<td>' + val.CombinedBudgetSectionCode + '</td>',
                '<td>' + val.RequesterWorkerName + '</td>',
                '<td>' + val.BeneficiaryWorkerName + '</td></tr></tbody>'
            ]).draw();

        });
    }
</script>

<script>
    $('#advance_number2').one('click', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var keys = 0;

        $.ajax({
            type: 'GET',
            url: '{!! route("AdvanceRequest.AdvanceListData") !!}',
            success: function(data) {
                TableSearchArfinAsf(data);
            }
        });
    });
</script>

<script>
    $(function() {
        $("#FormSubmitSearchAdvance").on("submit", function(e) { //id of form 
            e.preventDefault();

            var action = $(this).attr("action"); //get submit action from form
            var method = $(this).attr("method"); // get submit method
            var form_data = new FormData($(this)[0]); // convert form into formdata 
            var form = $(this);

            $.ajax({
                url: action,
                dataType: 'json', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: method,
                success: function(data) {

                    TableSearchArfinAsf(data);
                }
            })
        });
    });
</script>


<script>
    var keys = 0;

    $('#TableSearchArfinAsf tbody').on('click', 'tr', function() {

        //RESET FORM
        // document.getElementById("FormStoreAdvanceSettlement").reset();
        // $("#dataInput_Log_FileUpload_Pointer_RefID").val("");
        // $("#dataInput_Log_FileUpload_Pointer_RefID_Action").val("");
        // $('.TableArfDetail').find('tbody').empty();
        // $('.TableExpenseClaim').find('tbody').empty();
        // $('.TableAmountDueto').find('tbody').empty();
        // $('#zhtSysObjDOMTable_Upload_ActionPanel').find('tbody').empty();
        // $('#TotalBudgetSelected').html(0);
        // $('#TotalQtyExpense').html(0);
        // $('#TotalQtyAmount').html(0);
        // $('#GrandTotalExpense').html(0);
        // $('#GrandTotalAmount').html(0);
        // $("#SaveAsfList").prop("disabled", true);
        //END RESET FORM

        $("#mySearchArf").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var advance_RefID = $('#advance_RefID' + id).val();
        var advance_number = row.find("td:nth-child(2)").text();

        var beneficiary_id = $('#beneficiary_id' + id).val();
        var beneficiary = row.find("td:nth-child(6)").text();

        $("#advance_number").val(advance_number);
        $(".tableShowHideArfDetail").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlementBeneficiary") !!}?beneficiary_id=' + beneficiary_id + '&beneficiary=' + beneficiary + '&advance_RefID=' + advance_RefID,
            success: function(data) {

                if (data.status == "200") {

                    $("#beneficiary_id").val(data.data[0]['BeneficiaryWorkerJobsPosition_RefID']);
                    $("#beneficiary").val(data.data[0]['BeneficiaryWorkerName']);
                    $("#dataInput_Log_FileUpload_Pointer_RefID").val(data.data[0]['Log_FileUpload_Pointer_RefID']);

                    // $("input[name='dataInput_Log_FileUpload_Pointer_RefID']").val(91000000000728);


                    $("#bank_code").val(data.data[0]['Bank_RefID']);
                    $("#bank_name").val(data.data[0]['BankAcronym']);
                    $("#bank_name_detail").val(data.data[0]['BankName']);
                    $("#bank_account_id").val(data.data[0]['BankAccount_RefID']);
                    $("#bank_account").val(data.data[0]['BankAccountNumber']);
                    $("#bank_account_detail").val(data.data[0]['BankAccountName']);


                    var no = 1;
                    applied = 0;
                    TotalBudgetSelected = 0;
                    status = "";
                    statusDisplay = [];
                    statusDisplay2 = [];
                    statusForm = [];
                    $.each(data.data, function(key, value) {

                        keys += 1;

                        // if(value.QuantityAbsorption == "0.00" && value.Quantity == "0.00"){
                        if (value.Quantity == "0.00") {
                            var applied = 0;
                        } else {
                            // var applied = Math.round(parseFloat(value.QuantityAbsorption) / parseFloat(value.Quantity) * 100);
                            var applied = Math.round(parseFloat(value.Quantity) * 100);
                        }
                        if (applied >= 100) {
                            var status = "disabled";
                        }
                        if (value.ProductName == "Unspecified Product") {
                            statusDisplay[keys] = "";
                            statusDisplay2[keys] = "none";
                            statusForm[keys] = "disabled";
                        } else {
                            statusDisplay[keys] = "none";
                            statusDisplay2[keys] = "";
                            statusForm[keys] = "";
                        }
                        var html =
                            '<tr>' +
                            '<input name="getProductId[]" value="' + value.Product_RefID + '" type="hidden">' +
                            '<input name="getProductName[]" value="' + value.ProductName + '" type="hidden">' +
                            '<input name="getQty[]" id="budget_qty' + keys + '" value="' + value.Quantity + '" type="hidden">' +
                            '<input name="getQtyExpenseID[]" value="' + value.QuantityUnit_RefID + '" type="hidden">' +
                            '<input name="getQtyAmountID[]" value="' + value.QuantityUnit_RefID + '" type="hidden">' +
                            '<input name="getCurrencyExpenseID[]" value="' + value.PriceCurrency_RefID + '" type="hidden">' +
                            '<input name="getCurrencyAmountID[]" value="' + value.PriceCurrency_RefID + '" type="hidden">' +
                            '<input name="getExchangeRateExpenseID[]" value="' + value.ProductUnitPriceCurrency_RefID + '" type="hidden">' +
                            '<input name="getExchangeRateAmountID[]" value="' + value.ProductUnitPriceCurrency_RefID + '" type="hidden">' +
                            '<input name="getPrice[]" id="budget_price' + keys + '" value="' + value.ProductUnitPriceBaseCurrencyValue + '" type="hidden">' +
                            '<input name="getUom[]" value="' + value.QuantityUnitName + '" type="hidden">' +
                            '<input name="getCurrency[]" value="' + value.ProductUnitPriceCurrencyISOCode + '" type="hidden">' +
                            '<input name="getAdvanceNumber[]" value="' + value.DocumentNumber + '" type="hidden">' +
                            '<input name="getRemark[]" value="' + value.Remarks + '" type="hidden">' +
                            '<input name="getAdvanceDetail_RefID[]" value="' + value.Sys_ID_AdvanceDetail + '" type="hidden">' +
                            '<input name="combinedBudget" value="' + value.CombinedBudget_RefID + '" type="hidden">' +


                            '<td style="border:1px solid #e9ecef;">' + value.DocumentNumber + '</td>' +

                            '<td style="border:1px solid #e9ecef;display:' + statusDisplay[keys] + '";">' +
                            '<div class="input-group">' +
                            '<input id="product_id' + keys + '" style="border-radius:0;width:130px;background-color:white;" name="product_id" class="form-control" readonly>' +
                            '<div class="input-group-append">' +
                            '<span style="border-radius:0;" class="input-group-text form-control" data-id="10">' +
                            '<a id="product_id2" data-toggle="modal" data-target="#myProduct" onclick="KeyFunction(' + keys + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                            '</span>' +
                            '</div>' +
                            '</div>' +
                            '</td>' +

                            '<td style="border:1px solid #e9ecef;display:' + statusDisplay2[keys] + '">' + '<span>' + value.Product_RefID + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + value.ProductName + '">' + '<span id="product_name' + keys + '">' + value.ProductName + '</span>' + '</td>' +


                            '<td style="border:1px solid #e9ecef;">' + '<span id="total_balance_qty2' + keys + '">' + currencyTotal(value.Quantity) + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.Quantity + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.QuantityUnitName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + currencyTotal(value.ProductUnitPriceBaseCurrencyValue) + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + currencyTotal(value.PriceBaseCurrencyValue) + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.ProductUnitPriceCurrencyISOCode + '</td>' +

                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col third-col-asf-expense-qty">' + '<input onkeyup="qty_expense(' + keys + ', this)" id="qty_expense' + keys + '" style="border-radius:0;width:50px;" name="qty_expense[]" class="form-control qty_expense" onkeypress="return isNumberKey(this, event);" autocomplete="off" ' + statusForm[keys] + ' value="0">' + '</td>' +
                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col third-col-asf-expense-price">' + '<input onkeyup="price_expense(' + keys + ', this)" id="price_expense' + keys + '" style="border-radius:0;width:90px;" name="price_expense[]" class="form-control price_expense" onkeypress="return isNumberKey(this, event);" autocomplete="off" ' + statusForm[keys] + ' value="' + currency(value.ProductUnitPriceBaseCurrencyValue) + '">' + '</td>' +
                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col third-col-asf-expense-total">' + '<input id="total_expense' + keys + '" style="border-radius:0;width:90px;background-color:white;" name="total_expense[]" class="form-control total_expense" autocomplete="off" disabled value="0">' + '</td>' +

                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col second-col-asf-amount-qty">' + '<input onkeyup="qty_amount(' + keys + ', this)" id="qty_amount' + keys + '" style="border-radius:0;width:50px;" name="qty_amount[]" class="form-control qty_amount" onkeypress="return isNumberKey(this, event);" autocomplete="off" ' + statusForm[keys] + ' value="0">' + '</td>' +
                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col second-col-asf-amount-price">' + '<input onkeyup="price_amount(' + keys + ', this)" id="price_amount' + keys + '" style="border-radius:0;width:90px;" name="price_amount[]" class="form-control price_amount" onkeypress="return isNumberKey(this, event);" autocomplete="off" ' + statusForm[keys] + ' value="' + currency(value.ProductUnitPriceBaseCurrencyValue) + '">' + '</td>' +
                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col second-col-asf-amount-total">' + '<input id="total_amount' + keys + '" style="border-radius:0;width:90px;background-color:white;" name="total_amount[]" class="form-control total_amount" autocomplete="off" disabled value="0">' + '</td>' +

                            '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col first-col-asf-balance-total">' + '<input id="total_balance_qty' + keys + '" style="border-radius:0;width:90px;background-color:white;" name="total_balance_qty[]" class="form-control total_balance_qty" autocomplete="off" disabled value="' + currencyTotal(value.Quantity) + '">' + '</td>' +

                            '</tr>';

                        $('table.TableArfDetail tbody').append(html);

                    });

                } else if (data.status == "501") {
                    Swal.fire("Cancelled", "You have chosen this number !", "error");
                } else {
                    Swal.fire("Cancelled", "Please use same benificiary !", "error");
                }
            },
        });
    });

    //VALIDASI QTY EXPENSE

    function qty_expense(key, value) {

        var qty_val = (value.value).replace(/,/g, '');
        var budget_qty_val = $("#budget_qty" + key).val();
        var price_expense = $("#price_expense" + key).val().replace(/,/g, '');

        var qty_amount = $("#qty_amount" + key).val().replace(/,/g, '');
        var TotalQty = +qty_val + +qty_amount;

        if (qty_val == "") {
            $('#total_expense' + key).val("");
            $("input[name='qty_expense[]']").css("border", "1px solid #ced4da");
        } else if (parseFloat(TotalQty) > parseFloat(budget_qty_val)) {
            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Qty is over budget !", "error");
                }
            });

            $('#qty_expense' + key).val("");
            $('#total_expense' + key).val("");
            $('#qty_expense' + key).css("border", "1px solid red");
            $('#qty_expense' + key).focus();
        } else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {

            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Qty is over budget !", "error");
                }
            });

            $('#qty_expense' + key).val("");
            $('#total_expense' + key).val("");
            $('#qty_expense' + key).css("border", "1px solid red");
            $('#qty_expense' + key).focus();
        } else {
            var total = qty_val * price_expense;
            $("input[name='qty_expense[]']").css("border", "1px solid #ced4da");
            $('#total_expense' + key).val(currencyTotal(total));
        }

        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED SETTLEMENT
        TotalBudgetSettlementSelected();
        //MEMANGGIL FUNCTION TOTAL BALANCE VALUE SELECTED
        TotalBalanceQtySettlementSelected(key);

    }

    //VALIDASI QTY AMOUNT
    function qty_amount(key, value) {

        var qty_val = (value.value).replace(/,/g, '');
        var budget_qty_val = $("#budget_qty" + key).val();
        var price_amount = $("#price_amount" + key).val().replace(/,/g, '');

        var qty_expense = $("#qty_expense" + key).val().replace(/,/g, '');
        var TotalQty = +qty_val + +qty_expense;

        if (qty_val == "") {
            $('#total_amount' + key).val("");
            $("input[name='qty_amount[]']").css("border", "1px solid #ced4da");
        } else if (parseFloat(TotalQty) > parseFloat(budget_qty_val)) {
            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Qty is over budget !", "error");
                }
            });

            $('#qty_amount' + key).val("");
            $('#total_amount' + key).val("");
            $('#qty_amount' + key).css("border", "1px solid red");
            $('#qty_amount' + key).focus();
        } else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {
            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Qty is over budget !", "error");
                }
            });

            $('#qty_amount' + key).val("");
            $('#total_amount' + key).val("");
            $('#qty_amount' + key).css("border", "1px solid red");
            $('#qty_amount' + key).focus();
        } else {
            var total = qty_val * price_amount;
            $("input[name='qty_amount[]']").css("border", "1px solid #ced4da");
            $('#total_amount' + key).val(currencyTotal(total));
        }
        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED SETTLEMENT
        TotalBudgetSettlementSelected();
        //MEMANGGIL FUNCTION TOTAL BALANCE VALUE SELECTED
        TotalBalanceQtySettlementSelected(key);
    }

    //VALIDASI PRICE EXPENSE

    function price_expense(key, value) {

        var price_val = (value.value).replace(/,/g, '');
        var budget_price_val = $("#budget_price" + key).val().replace(/,/g, '');
        var qty_expense = $("#qty_expense" + key).val();

        if (price_val == "") {
            $('#total_expense' + key).val("");
            $("input[name='price_expense[]']").css("border", "1px solid #ced4da");
        } else if (parseFloat(price_val) > parseFloat(budget_price_val)) {

            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Price is over budget !", "error");
                }
            });

            $('#price_expense' + key).val("");
            $('#total_expense' + key).val("");
            $('#price_expense' + key).css("border", "1px solid red");
            $('#price_expense' + key).focus();
        } else {
            var total = price_val * qty_expense;
            $("input[name='price_expense[]']").css("border", "1px solid #ced4da");
            $('#total_expense' + key).val(currencyTotal(total));
        }
        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED SETTLEMENT
        TotalBudgetSettlementSelected();
        //MEMANGGIL FUNCTION TOTAL BALANCE VALUE SELECTED
        TotalBalanceQtySettlementSelected(key);
    }

    //VALIDASI PRICE AMOUNT
    function price_amount(key, value) {

        var price_val = (value.value).replace(/,/g, '');
        var budget_price_val = $("#budget_price" + key).val().replace(/,/g, '');
        var qty_amount = $("#qty_amount" + key).val();

        if (price_val == "") {
            $('#total_amount' + key).val("");
            $("input[name='price_amount[]']").css("border", "1px solid #ced4da");
        } else if (parseFloat(price_val) > parseFloat(budget_price_val)) {

            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Price is over budget !", "error");
                }
            });

            $('#price_amount' + key).val("");
            $('#total_amount' + key).val("");
            $('#price_amount' + key).css("border", "1px solid red");
            $('#price_amount' + key).focus();
        } else {
            var total = price_val * qty_amount;
            $("input[name='price_amount[]']").css("border", "1px solid #ced4da");
            $('#total_amount' + key).val(currencyTotal(total));
        }
        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED SETTLEMENT
        TotalBudgetSettlementSelected();
        //MEMANGGIL FUNCTION TOTAL BALANCE VALUE SELECTED
        TotalBalanceQtySettlementSelected(key);
    }
</script>

<script>
    function addFromDetailtoCartJs() {

        $('#TableExpenseClaim').find('tbody').empty();
        $('#TableAmountDueto').find('tbody').empty();

        $("#expenseCompanyCart").show();
        $(".expenseCompanyCart").show();

        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');

        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getAdvanceNumber = $("input[name='getAdvanceNumber[]']").map(function() {
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
        var getCurrency = $("input[name='getCurrency[]']").map(function() {
            return $(this).val();
        }).get();
        var getRemark = $("input[name='getRemark[]']").map(function() {
            return $(this).val();
        }).get();
        var getAdvanceDetail_RefID = $("input[name='getAdvanceDetail_RefID[]']").map(function() {
            return $(this).val();
        }).get();

        var getQtyExpenseID = $("input[name='getQtyExpenseID[]']").map(function() {
            return $(this).val();
        }).get();

        var getCurrencyExpenseID = $("input[name='getCurrencyExpenseID[]']").map(function() {
            return $(this).val();
        }).get();

        var getExchangeRateExpenseID = $("input[name='getExchangeRateExpenseID[]']").map(function() {
            return $(this).val();
        }).get();

        var getQtyAmountID = $("input[name='getQtyAmountID[]']").map(function() {
            return $(this).val();
        }).get();

        var getCurrencyAmountID = $("input[name='getCurrencyAmountID[]']").map(function() {
            return $(this).val();
        }).get();

        var getExchangeRateAmountID = $("input[name='getExchangeRateAmountID[]']").map(function() {
            return $(this).val();
        }).get();
        var qty_expense = $("input[name='qty_expense[]']").map(function() {
            return $(this).val();
        }).get();
        var price_expense = $("input[name='price_expense[]']").map(function() {
            return $(this).val();
        }).get();
        var total_expense = $("input[name='total_expense[]']").map(function() {
            return $(this).val();
        }).get();

        var qty_amount = $("input[name='qty_amount[]']").map(function() {
            return $(this).val();
        }).get();
        var price_amount = $("input[name='price_amount[]']").map(function() {
            return $(this).val();
        }).get();
        var total_amount = $("input[name='total_amount[]']").map(function() {
            return $(this).val();
        }).get();

        var combinedBudget = $("input[name='combinedBudget']").val();

        var TotalBudgetSelected = 0;
        var TotalQtyExpense = 0;
        var TotalQtyAmount = 0;
        var GrandTotalExpense = 0;
        var GrandTotalAmount = 0;

        $.each(total_expense, function(index, data) {
            if (total_expense[index] != "" && total_expense[index] > "0.00" && total_expense[index] != "NaN.00") {

                var product_id = getProductId[index];
                var product_name = getProductName[index];

                if (getProductName[index] == "Unspecified Product") {
                    var product_id = $("#product_id" + index).val();
                    var product_name = $("#product_name" + index).html();
                }
                TotalBudgetSelected += +total_expense[index].replace(/,/g, '');
                GrandTotalExpense += +total_expense[index].replace(/,/g, '');
                TotalQtyExpense += +qty_expense[index].replace(/,/g, '');

                var html = '<tr>' +

                    '<input type="hidden" name="var_qty_id_expense[]" value="' + getQtyExpenseID[index] + '">' +
                    '<input type="hidden" name="var_currency_id_expense[]" value="' + getCurrencyExpenseID[index] + '">' +
                    '<input type="hidden" name="var_exchange_rate_id_expense[]" value="' + getExchangeRateExpenseID[index] + '">' +

                    '<input type="hidden" name="var_product_id_expense[]" value="' + product_id + '">' +
                    '<input type="hidden" name="var_product_name_expense[]" id="var_product_name" value="' + product_name + '">' +
                    '<input type="hidden" name="var_quantity_expense[]" class="qty_expense2' + index + '" data-id="' + index + '" value="' + currencyTotal(qty_expense[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom_expense[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_price_expense[]" class="price_expense2' + index + '" value="' + currencyTotal(price_expense[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_total_expense[]" class="total_expense2' + index + '" value="' + total_expense[index] + '">' +
                    '<input type="hidden" name="var_currency_expense[]" value="' + getCurrency[index] + '">' +

                    '<input type="hidden" name="var_advance_number" value="' + getAdvanceNumber[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combined_budget" value="' + combinedBudget + '">' +
                    '<input type="hidden" name="var_remark" value="' + getRemark[index] + '">' +
                    '<input type="hidden" name="var_advance_detail_id" value="' + getAdvanceDetail_RefID[index] + '">' +

                    '<td style="border:1px solid #e9ecef;">' + getAdvanceNumber[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + product_name + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + getUom[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + currencyTotal(price_expense[index]) + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + currencyTotal(qty_expense[index]) + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + currencyTotal(total_expense[index]) + '</td>' +
                    '</tr>';

                $('table.TableExpenseClaim tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                $("#GrandTotalExpense").html(currencyTotal(GrandTotalExpense));
                $("#TotalQtyExpense").html(currencyTotal(TotalQtyExpense));

                $("#SaveAsfList").prop("disabled", false);
            }
        });

        $.each(total_amount, function(index, data) {
            if (total_amount[index] != "" && total_amount[index] > "0.00" && total_amount[index] != "NaN.00") {

                var product_id = getProductId[index];
                var product_name = getProductName[index];

                if (getProductName[index] == "Unspecified Product") {
                    var product_id = $("#product_id" + index).val();
                    var product_name = $("#product_name" + index).html();
                }
                TotalBudgetSelected += +total_amount[index].replace(/,/g, '');
                GrandTotalAmount += +total_amount[index].replace(/,/g, '');
                TotalQtyAmount += +qty_amount[index].replace(/,/g, '');

                var html = '<tr>' +

                    '<input type="hidden" name="var_quantity_id_amount[]" value="' + getQtyAmountID[index] + '">' +
                    '<input type="hidden" name="var_currency_id_amount[]" value="' + getCurrencyAmountID[index] + '">' +
                    '<input type="hidden" name="var_exchange_rate_id_amount[]" value="' + getExchangeRateAmountID[index] + '">' +

                    '<input type="hidden" name="var_product_id_amount[]" value="' + product_id + '">' +
                    '<input type="hidden" name="var_product_name_amount[]" id="var_product_name" value="' + product_name + '">' +
                    '<input type="hidden" name="var_quantity_amount[]" class="qty_amount2' + index + '" data-id="' + index + '" value="' + currencyTotal(qty_amount[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom_amount[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_price_amount[]" class="price_amount2' + index + '" value="' + currencyTotal(price_amount[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_total_amount[]" class="total_amount2' + index + '" value="' + total_amount[index] + '">' +
                    '<input type="hidden" name="var_currency_amount[]" value="' + getCurrency[index] + '">' +

                    '<input type="hidden" name="var_advance_number" value="' + getAdvanceNumber[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combined_budget" value="' + combinedBudget + '">' +
                    '<input type="hidden" name="var_remark" value="' + getRemark[index] + '">' +
                    '<input type="hidden" name="var_advance_detail_id" value="' + getAdvanceDetail_RefID[index] + '">' +

                    '<td style="border:1px solid #e9ecef;">' + getAdvanceNumber[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + product_name + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + getUom[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + currencyTotal(price_amount[index]) + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + currencyTotal(qty_amount[index]) + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + currencyTotal(total_amount[index]) + '</td>' +
                    '</tr>';

                $('table.TableAmountDueto tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                $("#GrandTotalAmount").html(currencyTotal(GrandTotalAmount));
                $("#TotalQtyAmount").html(currencyTotal(TotalQtyAmount));

                $("#SaveAsfList").prop("disabled", false);
            }
        });

    }
</script>

<script>
    $(function() {
        $("#FormStoreAdvanceSettlement").on("submit", function(e) {
            e.preventDefault();
            var valRemark = $("#remark").val();
            $("#remark").css("border", "1px solid #ced4da");
            if (valRemark === "") {
                $("#remark").focus();
                $("#remark").attr('required', true);
                $("#remark").css("border", "1px solid red");
            } else {

                var fileAttachment = $("#dataInput_Log_FileUpload_Pointer_RefID_Action").val();
                if (fileAttachment) {
                    varFileUpload_UniqueID = "Upload";
                    window['JSFunc_GetActionPanel_CommitFromOutside_' + varFileUpload_UniqueID]();
                }

                var action = $(this).attr("action");
                var method = $(this).attr("method");
                var form_data = new FormData($(this)[0]);
                var form = $(this);


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

                        // ShowLoading();

                        $.ajax({
                            url: action,
                            dataType: 'json',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: method,
                            success: function(response) {

                                HideLoading();

                                swalWithBootstrapButtons.fire({

                                    title: 'Successful !',
                                    type: 'success',
                                    html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + response.advnumber + '</span>',
                                    showCloseButton: false,
                                    showCancelButton: false,
                                    focusConfirm: false,
                                    confirmButtonText: '<span style="color:black;"> Ok </span>',
                                    confirmButtonColor: '#4B586A',
                                    confirmButtonColor: '#e9ecef',
                                    reverseButtons: true
                                }).then((result) => {
                                    if (result.value) {
                                        ShowLoading();
                                        window.location.href = '/AdvanceSettlement?var=1';
                                    }
                                })
                            },

                            error: function(response) {
                                Swal.fire("Cancelled", "Data Cancel Inputed", "error");
                            },

                        })


                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({

                            title: 'Cancelled',
                            text: "Process Canceled",
                            type: 'error',
                            confirmButtonColor: '#e9ecef',
                            confirmButtonText: '<span style="color:black;"> Ok </span>',

                        }).then((result) => {
                            if (result.value) {
                                ShowLoading();
                                window.location.href = '/AdvanceSettlement?var=1';
                            }
                        })
                    }
                })
            }
        });

    });
</script>


<script>
    $(function() {
        $(".idExpense").on('click', function(e) {
            $("#amountdueto").hide();
            $("#expense").show();
            $("#expenseCompanyCart").show();
            $(".expenseCompanyCart").show();
        });
    });

    $(function() {
        $(".idAmount").on('click', function(e) {
            $("#expense").hide();
            $("#amountCompanyCart").show();
            $(".amountCompanyCart").show();
            $("#amountdueto").show();
        });
    });
</script>

<script type="text/javascript">
    function CancelAdvanceSettlement() {
        ShowLoading();
        location.reload();
    }
</script>

<!-- RESET FILTER  -->
<script type="text/javascript">
    function ResetFilter() {
        $("#trano").val("");
        $("#budget_code").val("");
        $("#sub_budget_code").val("");
        $("#requester").val("");
        $("#benificary").val("");
    }
</script>

<!-- HIDE SEARCHING PLUGIN FROM DATATABLE -->
<script>
    $(document).ready(function() {
        $('.TableSearchArfinAsf').DataTable({
            "searching": false,
            "dom": 'rtip'
        });
    });
</script>