<script type="text/javascript">
    $(document).ready(function() {
        $("#addAsfListCart").prop("disabled", true);
        $("#SaveAsfList").prop("disabled", true);
        $("#projectcode2").prop("disabled", true);
        $("#advance_number2").prop("disabled", true);
        $("#detailASF").hide();
        $("#amountCompanyCart").hide();
        $(".amountCompanyCart").hide();
        // $("#expenseCompanyCart").hide();
        // $(".expenseCompanyCart").hide();
    });
</script>


<script type="text/javascript">
    //GET ASF LIST 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var arf_date = $('23-02-2021').val();
    var var_recordID = $("#var_recordID").val();
    var TotalBudgetSelected = 0;
    var TotalQtyExpense = 0;
    var TotalQtyAmount = 0;
    var GrandTotalExpense = 0;
    var GrandTotalAmount = 0;

    $.ajax({
        type: "GET",
        url: '{!! route("AdvanceSettlement.AdvanceSettlementListCartRevision") !!}?var_recordID=' + var_recordID,
        success: function(data) {

            $.each(data, function(key, value) {
                TotalBudgetSelected += +value.priceBaseCurrencyValue.replace(/,/g, '');
                GrandTotalExpense += +value.priceBaseCurrencyValue.replace(/,/g, '');
                TotalQtyExpense+= +value.quantity.replace(/,/g, '');
                var html = '<tr>' +

                '<input type="hidden" id="var_tranox" name="var_trano[]" value="' + value.product_RefID + '">' +
                '<input type="hidden" name="var_product_id_expense[]" value="' + value.product_RefID + '">' +
                '<input type="hidden" name="var_product_name[]" value="' + value.productName + '">' +
                '<input type="hidden" name="var_uom[]" value="' + value.quantityUnitName + '">' +
                '<input type="hidden" name="var_price_expense[]" value="' + value.productUnitPriceCurrencyValue + '">' +
                '<input type="hidden" name="var_qty_expense[]" value="' + value.quantity + '">' +
                '<input type="hidden" name="var_total_expense[]" value="' + value.priceBaseCurrencyValue + '">' +
                '<input type="hidden" name="var_description[]" value="' + value.remarks + '">' +
                '<input type="hidden" name="var_recordIDDetail[]" value="' + value.sys_ID + '">' +

                '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                '</tr>';

                $('table.TableExpenseClaim tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                $("#GrandTotalExpense").html(currencyTotal(GrandTotalExpense));
                $("#TotalQtyExpense").html(currencyTotal(TotalQtyExpense));
            });

            $.each(data, function(key, value) {
                TotalBudgetSelected += +value.priceBaseCurrencyValue.replace(/,/g, '');
                GrandTotalAmount += +value.priceBaseCurrencyValue.replace(/,/g, '');
                
                TotalQtyAmount+= +value.quantity.replace(/,/g, '');
                var html = '<tr>' +
                
                '<input type="hidden" name="var_trano[]" value="' + value.product_RefID + '">' +
                '<input type="hidden" name="var_product_id_amount[]" value="' + value.product_RefID + '">' +
                '<input type="hidden" name="var_product_name[]" value="' + value.productName + '">' +
                '<input type="hidden" name="var_uom[]" value="' + value.quantityUnitName + '">' +
                '<input type="hidden" name="var_price_amount[]" value="' + value.productUnitPriceCurrencyValue + '">' +
                '<input type="hidden" name="var_qty_amount[]" value="' + value.quantity + '">' +
                '<input type="hidden" name="var_total_amount[]" value="' + value.priceBaseCurrencyValue + '">' +
                '<input type="hidden" name="var_description[]" id="var_description[]" value="' + value.remarks + '">' +
                '<input type="hidden" name="var_recordIDDetail[]" value="' + value.sys_ID + '">' +
                
                '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                '</tr>';

                $('table.TableAmountDueto tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                $("#GrandTotalAmount").html(currencyTotal(GrandTotalAmount));
                $("#TotalQtyAmount").html(currencyTotal(TotalQtyAmount));
            });
        }
    });

    //GET ARF DATA

    var var_recordID = $("#var_recordID").val();
    var advance_number = $("#advance_number").val();

    $.ajax({
        type: 'GET',
        url: '{!! route("AdvanceSettlement.AdvanceSettlementListDataById") !!}?var_recordID=' + var_recordID,

        success: function(data) {

            var no = 1; applied = 0; TotalBudgetSelected = 0;status = ""; statusDisplay = [];statusDisplay2 = []; statusForm = [];
            $.each(data, function(key, value) {
                var var_qty_expense = "";
                var var_price_expense = "";
                var var_qty_amount = "";
                var var_price_amount = "";
                var var_total = "";
                var var_recordIDDetail = "";
                var var_totalPayment = 0;
                var var_totalBalance = 0;


                // if(value.quantityAbsorption == "0.00" && value.quantity == "0.00"){
                if(value.quantity == "0.00"){
                    var applied = 0;
                }
                else{
                    // var applied = Math.round(parseFloat(value.quantityAbsorption) / parseFloat(value.quantity) * 100);
                    var applied = Math.round(parseFloat(value.quantity) * 100);
                }
                if(applied >= 100){
                    var status = "disabled";
                }
                if(value.productName == "Unspecified Product"){
                    statusDisplay[key] = "";
                    statusDisplay2[key] = "none";
                    statusForm[key] = "disabled";
                }
                else{
                    statusDisplay[key] = "none";
                    statusDisplay2[key] = "";
                    statusForm[key] = "";
                }

                var ProductExpense = $("input[name='var_product_id_expense[]']").map(function(){return $(this).val();}).get();
                var ProductAmount = $("input[name='var_product_id_amount[]']").map(function(){return $(this).val();}).get();
                var QuantityExpense = $("input[name='var_qty_expense[]']").map(function(){return $(this).val();}).get();
                var PriceExpense = $("input[name='var_price_expense[]']").map(function(){return $(this).val();}).get();
                var QuantityAmount = $("input[name='var_qty_amount[]']").map(function(){return $(this).val();}).get();
                var PriceAmount = $("input[name='var_price_amount[]']").map(function(){return $(this).val();}).get();
                var RecordID = $("input[name='var_recordIDDetail[]']").map(function(){return $(this).val();}).get();

                $.each(ProductExpense, function(ProductKey, ProductValue) {
                    if(ProductValue == value.product_RefID){
                        var_qty_expense = QuantityExpense[ProductKey];
                        var_price_expense = PriceExpense[ProductKey];
                        var_recordIDDetail = RecordID[ProductKey];
                    }
                });

                if((var_qty_expense * var_price_expense) != 0){
                    var var_total_expense = currencyTotal(var_qty_expense * var_price_expense);
                }

                $.each(ProductAmount, function(ProductKey2, ProductValue2) {
                    if(ProductValue2 == value.product_RefID){
                        var_qty_amount = QuantityAmount[ProductKey2];
                        var_price_amount = PriceAmount[ProductKey2];
                        var_recordIDDetail = RecordID[ProductKey2];
                    }
                });

                console.log(QuantityExpense);

                if((var_qty_amount * var_price_amount) != 0){
                    var var_total_amount = currencyTotal(var_qty_amount * var_price_amount);
                }
                var html =
                    '<tr>' +

                    '<input name="getWorkId[]" value="'+ value.combinedBudgetSubSectionLevel1_RefID +'" type="hidden">' +
                    '<input name="getWorkName[]" value="'+ value.combinedBudgetSubSectionLevel1Name +'" type="hidden">' +
                    '<input name="getProductId[]" value="'+ value.product_RefID +'" type="hidden">' +
                    '<input name="getProductName[]" value="'+ value.productName +'" type="hidden">' +
                    '<input name="getQty[]" id="budget_qty'+ key +'" value="'+ value.quantity +'" type="hidden">' +
                    '<input name="getPrice[]" id="budget_price'+ key +'" value="'+ value.productUnitPriceCurrencyValue +'" type="hidden">' +
                    '<input name="getUom[]" value="'+ value.quantityUnitName +'" type="hidden">' +
                    '<input name="getCurrency[]" value="'+ value.priceCurrencyISOCode +'" type="hidden">' +
                    '<input name="getAdvanceNumber[]" value="'+ advance_number +'" type="hidden">' +
                    '<input name="getRemark[]" value="'+ value.remarks +'" type="hidden">' +
                    '<input name="combinedBudget" value="'+ value.sys_ID +'" type="hidden">' +
                    '<input name="getRecordIDDetail[]" value="' + var_recordIDDetail + '"  type="hidden">' +

                    '<td style="border:1px solid #e9ecef;">' +
                    '&nbsp;&nbsp;&nbsp;<div class="progress '+ status +' progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                    '</td>' +

                    '<td style="border:1px solid #e9ecef;">' + advance_number + '</td>' +

                    '<td style="border:1px solid #e9ecef;display:'+ statusDisplay[key] +'";">' + 
                        '<div class="input-group">' +
                            '<input id="putProductId'+ key +'" style="border-radius:0;width:130px;background-color:white;" name="putProductId" class="form-control" readonly>' +
                            '<div class="input-group-append">' +
                            '<span style="border-radius:0;" class="input-group-text form-control" data-id="10">' +
                                '<a id="product_id2" data-toggle="modal" data-target="#myProduct" onclick="KeyFunction('+ key +')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                            '</span>' +
                            '</div>' +
                        '</div>' +
                    '</td>' +

                    '<td style="border:1px solid #e9ecef;display:'+ statusDisplay2[key] +'">' + '<span>' + value.product_RefID + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="putProductName'+ key +'">' + value.productName + '</span>' + '</td>' +
                    
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + 'N/A' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +

                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col third-col-asf-expense-qty">' + '<input id="qty_expense'+ key +'" style="border-radius:0;width:50px;" name="qty_expense[]" class="form-control qty_expense" autocomplete="off" '+ statusForm[key] +' value="'+ currency(var_qty_expense) +'">' + '</td>' +
                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col third-col-asf-expense-price">' + '<input id="price_expense'+ key +'" style="border-radius:0;width:90px;" name="price_expense[]" class="form-control price_expense" autocomplete="off" '+ statusForm[key] +' value="'+ currency(var_price_expense) +'">' + '</td>' +
                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col third-col-asf-expense-total">' + '<input id="total_expense'+ key +'" style="border-radius:0;width:90px;background-color:white;" name="total_expense[]" class="form-control total_expense" autocomplete="off" disabled value="'+ var_total_expense +'">' + '</td>' +

                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col second-col-asf-amount-qty">' + '<input id="qty_amount'+ key +'" style="border-radius:0;width:50px;" name="qty_amount[]" class="form-control qty_amount" autocomplete="off" '+ statusForm[key] +' value="'+ currency(var_qty_amount) +'">' + '</td>' +
                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col second-col-asf-amount-price">' + '<input id="price_amount'+ key +'" style="border-radius:0;width:90px;" name="price_amount[]" class="form-control price_amount" autocomplete="off" '+ statusForm[key] +' value="'+ currency(var_price_amount) +'">' + '</td>' +
                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col second-col-asf-amount-total">' + '<input id="total_amount'+ key +'" style="border-radius:0;width:90px;background-color:white;" name="total_amount[]" class="form-control total_amount" autocomplete="off" disabled value="'+ var_total_amount +'">' + '</td>' +
                    
                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col first-col-asf-balance-total">' + '<input id="total_balance'+ key +'" style="border-radius:0;width:90px;background-color:white;" name="total_balance[]" class="form-control total_balance" autocomplete="off" disabled value="' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '">' + '</td>' +
                    
                    '</tr>';

                $('table.TableArfDetail tbody').append(html);

                //VALIDASI QTY EXPENSE
                $('#qty_expense'+key).keyup(function() {
                    var qty_val = $(this).val().replace(/,/g, '');
                    var budget_qty_val = $("#budget_qty"+key).val();
                    var price_expense = $("#price_expense"+key).val().replace(/,/g, '');

                    var qty_amount = $("#qty_amount"+key).val().replace(/,/g, '');
                    var TotalQty = +qty_val + +qty_amount;

                    if (qty_val == "") {
                        $('#total_expense'+key).val("");
                        $("input[name='qty_expense[]']").css("border", "1px solid #ced4da");
                    }
                    else if (parseFloat(TotalQty) > parseFloat(budget_qty_val)) {
                        swal({
                            onOpen: function () {
                                swal.disableConfirmButton();
                                Swal.fire("Error !", "Qty is over budget !", "error");
                            }
                        });

                        $('#qty_expense'+key).val("");
                        $('#total_expense'+key).val("");
                        $('#qty_expense'+key).css("border", "1px solid red");
                        $('#qty_expense'+key).focus();
                    }
                    else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {

                        swal({
                            onOpen: function () {
                                swal.disableConfirmButton();
                                Swal.fire("Error !", "Qty is over budget !", "error");
                            }
                        });

                        $('#qty_expense'+key).val("");
                        $('#total_expense'+key).val("");
                        $('#qty_expense'+key).css("border", "1px solid red");
                        $('#qty_expense'+key).focus();
                    }
                    else {
                        var total = qty_val * price_expense;
                        $("input[name='qty_expense[]']").css("border", "1px solid #ced4da");
                        $('#total_expense'+key).val(currencyTotal(total));
                    }
                });

                //VALIDASI QTY AMOUNT
                $('#qty_amount'+key).keyup(function() {
                    var qty_val = $(this).val().replace(/,/g, '');
                    var budget_qty_val = $("#budget_qty"+key).val();
                    var price_amount = $("#price_amount"+key).val().replace(/,/g, '');

                    var qty_expense = $("#qty_expense"+key).val().replace(/,/g, '');
                    var TotalQty = +qty_val + +qty_expense;

                    if (qty_val == "") {
                        $('#total_amount'+key).val("");
                        $("input[name='qty_amount[]']").css("border", "1px solid #ced4da");
                    }
                    else if (parseFloat(TotalQty) > parseFloat(budget_qty_val)) {
                        swal({
                            onOpen: function () {
                                swal.disableConfirmButton();
                                Swal.fire("Error !", "Qty is over budget !", "error");
                            }
                        });

                        $('#qty_amount'+key).val("");
                        $('#total_amount'+key).val("");
                        $('#qty_amount'+key).css("border", "1px solid red");
                        $('#qty_amount'+key).focus();
                    }
                    else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {
                        swal({
                            onOpen: function () {
                                swal.disableConfirmButton();
                                Swal.fire("Error !", "Qty is over budget !", "error");
                            }
                        });

                        $('#qty_amount'+key).val("");
                        $('#total_amount'+key).val("");
                        $('#qty_amount'+key).css("border", "1px solid red");
                        $('#qty_amount'+key).focus();
                    }
                    else {
                        var total = qty_val * price_amount;
                        $("input[name='qty_amount[]']").css("border", "1px solid #ced4da");
                        $('#total_amount'+key).val(currencyTotal(total));
                    }
                });

                //VALIDASI PRICE EXPENSE
                $('#price_expense'+key).keyup(function() {
                    var price_val = $(this).val().replace(/,/g, '');
                    var budget_price_val = $("#budget_price"+key).val().replace(/,/g, '');
                    var qty_expense = $("#qty_expense"+key).val();
                    
                    if (price_val == "") {
                        $('#total_expense'+key).val("");
                        $("input[name='price_expense[]']").css("border", "1px solid #ced4da");
                    }
                    else if (parseFloat(price_val) > parseFloat(budget_price_val)) {

                        swal({
                            onOpen: function () {
                                swal.disableConfirmButton();
                                Swal.fire("Error !", "Price is over budget !", "error");
                            }
                        });

                        $('#price_expense'+key).val("");
                        $('#total_expense'+key).val("");
                        $('#price_expense'+key).css("border", "1px solid red");
                        $('#price_expense'+key).focus();
                    }
                    else {
                        var total = price_val * qty_expense;
                        $("input[name='price_expense[]']").css("border", "1px solid #ced4da");
                        $('#total_expense'+key).val(currencyTotal(total));
                    }
                });

                //VALIDASI PRICE AMOUNT
                $('#price_amount'+key).keyup(function() {
                    var price_val = $(this).val().replace(/,/g, '');
                    var budget_price_val = $("#budget_price"+key).val().replace(/,/g, '');
                    var qty_amount = $("#qty_amount"+key).val();
                    
                    if (price_val == "") {
                        $('#total_amount'+key).val("");
                        $("input[name='price_amount[]']").css("border", "1px solid #ced4da");
                    }
                    else if (parseFloat(price_val) > parseFloat(budget_price_val)) {

                        swal({
                            onOpen: function () {
                                swal.disableConfirmButton();
                                Swal.fire("Error !", "Price is over budget !", "error");
                            }
                        });

                        $('#price_amount'+key).val("");
                        $('#total_amount'+key).val("");
                        $('#price_amount'+key).css("border", "1px solid red");
                        $('#price_amount'+key).focus();
                    }
                    else {
                        var total = price_val * qty_amount;
                        $("input[name='price_amount[]']").css("border", "1px solid #ced4da");
                        $('#total_amount'+key).val(currencyTotal(total));
                    }
                });
            
            });
        }
    });
</script>


<script>
    function addFromDetailtoCartJs() {

        $('#TableExpenseClaim').find('tbody').empty();
        $('#TableAmountDueto').find('tbody').empty();

        $("#expenseCompanyCart").show();
        $(".expenseCompanyCart").show();
                            
        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getAdvanceNumber = $("input[name='getAdvanceNumber[]']").map(function(){return $(this).val();}).get();
        var getWorkId = $("input[name='getWorkId[]']").map(function(){return $(this).val();}).get();
        var getWorkName = $("input[name='getWorkName[]']").map(function(){return $(this).val();}).get();
        var getProductId = $("input[name='getProductId[]']").map(function(){return $(this).val();}).get();
        var getProductName = $("input[name='getProductName[]']").map(function(){return $(this).val();}).get();
        var getUom = $("input[name='getUom[]']").map(function(){return $(this).val();}).get();
        var getCurrency = $("input[name='getCurrency[]']").map(function(){return $(this).val();}).get();
        var getRemark = $("input[name='getRemark[]']").map(function(){return $(this).val();}).get();

        var qty_expense = $("input[name='qty_expense[]']").map(function(){return $(this).val();}).get();
        var price_expense = $("input[name='price_expense[]']").map(function(){return $(this).val();}).get();
        var total_expense = $("input[name='total_expense[]']").map(function(){return $(this).val();}).get();

        var qty_amount = $("input[name='qty_amount[]']").map(function(){return $(this).val();}).get();
        var price_amount = $("input[name='price_amount[]']").map(function(){return $(this).val();}).get();
        var total_amount = $("input[name='total_amount[]']").map(function(){return $(this).val();}).get();

        var combinedBudget = $("input[name='combinedBudget']").val();

        var TotalBudgetSelected = 0;
        var TotalQtyExpense = 0;
        var TotalQtyAmount = 0;
        var GrandTotalExpense = 0;
        var GrandTotalAmount = 0;

        $.each(total_expense, function(index, data) {
            if(total_expense[index] != "" && total_expense[index] > "0.00" && total_expense[index] != "NaN.00"){

                var putProductId = getProductId[index];
                var putProductName = getProductName[index];

                if(getProductName[index] == "Unspecified Product"){
                    var putProductId = $("#putProductId"+index).val();
                    var putProductName = $("#putProductName"+index).html();
                }
                TotalBudgetSelected += +total_expense[index].replace(/,/g, '');
                GrandTotalExpense += +total_expense[index].replace(/,/g, '');
                TotalQtyExpense+= +qty_expense[index].replace(/,/g, '');

                var html = '<tr>' +

                    '<input type="hidden" name="var_product_id_expense[]" value="' + putProductId + '">' +
                    '<input type="hidden" name="var_product_name_expense[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity_expense[]" class="qty_expense2'+ index +'" data-id="'+ index +'" value="' + currencyTotal(qty_expense[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom_expense[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_price_expense[]" class="price_expense2'+ index +'" value="' + currencyTotal(price_expense[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_total_expense[]" class="total_expense2'+ index +'" value="' + total_expense[index] + '">' +
                    '<input type="hidden" name="var_currency_expense[]" value="' + getCurrency[index] + '">' +
                    
                    '<input type="hidden" name="var_advance_number" value="' + getAdvanceNumber[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combined_budget" value="' + combinedBudget + '">' +
                    '<input type="hidden" name="var_remark" value="' + getRemark[index] + '">' +

                    '<td style="border:1px solid #e9ecef;">' + getAdvanceNumber[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + getUom[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + price_expense[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + qty_expense[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + total_expense[index] + '</td>' +
                    '</tr>';

                $('table.TableExpenseClaim tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                $("#GrandTotalExpense").html(currencyTotal(GrandTotalExpense));
                $("#TotalQtyExpense").html(currencyTotal(TotalQtyExpense));

                $("#SaveAsfList").prop("disabled", false);
            }
        });

        $.each(total_amount, function(index, data) {
            if(total_amount[index] != "" && total_amount[index] > "0.00" && total_amount[index] != "NaN.00"){

                var putProductId = getProductId[index];
                var putProductName = getProductName[index];

                if(getProductName[index] == "Unspecified Product"){
                    var putProductId = $("#putProductId"+index).val();
                    var putProductName = $("#putProductName"+index).html();
                }
                TotalBudgetSelected += +total_amount[index].replace(/,/g, '');
                GrandTotalAmount += +total_amount[index].replace(/,/g, '');
                TotalQtyAmount+= +qty_amount[index].replace(/,/g, '');

                var html = '<tr>' +

                    '<input type="hidden" name="var_product_id_amount[]" value="' + putProductId + '">' +
                    '<input type="hidden" name="var_product_name_amount[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity_amount[]" class="qty_amount2'+ index +'" data-id="'+ index +'" value="' + currencyTotal(qty_amount[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom_amount[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_price_amount[]" class="price_amount2'+ index +'" value="' + currencyTotal(price_amount[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_total_amount[]" class="total_amount2'+ index +'" value="' + total_amount[index] + '">' +
                    '<input type="hidden" name="var_currency_amount[]" value="' + getCurrency[index] + '">' +
                    
                    '<input type="hidden" name="var_advance_number" value="' + getAdvanceNumber[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combined_budget" value="' + combinedBudget + '">' +
                    '<input type="hidden" name="var_remark" value="' + getRemark[index] + '">' +

                    '<td style="border:1px solid #e9ecef;">' + getAdvanceNumber[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + getUom[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + price_amount[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + qty_amount[index] + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + total_amount[index] + '</td>' +
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
        $("#FormStoreAdvanceSettlementRevision").on("submit", function(e) {
            e.preventDefault();
            var valRemark = $("#remark").val();
            $("#remark").css("border", "1px solid #ced4da");
            if (valRemark === "") {
                $("#remark").focus();
                $("#remark").attr('required', true);
                $("#remark").css("border", "1px solid red");
            } else {

                var varFileUpload_UniqueID = "Upload";
                window['JSFunc_GetActionPanel_CommitFromOutside_' + varFileUpload_UniqueID]();
                
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

                        $("#loading").show();
                        $(".loader").show();

                        $.ajax({
                            url: action,
                            dataType: 'json', // what to expect back from the server
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: method,
                            success: function(response) {
                                if (response.status) {

                                    $("#loading").hide();
                                    $(".loader").hide();

                                    swalWithBootstrapButtons.fire(
                                        'Succesful ',
                                        'Data has been updated',
                                        'success'
                                    )

                                    window.location.href = '/AdvanceSettlement?var=1';
                                }
                            },

                            error: function(response) { // handle the error
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
                                $("#loading").show();
                                $(".loader").show();

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
        $("#loading").show();
        $(".loader").show();
        location.reload();
    }
</script>