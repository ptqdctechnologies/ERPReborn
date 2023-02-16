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
                '<td style="border:1px solid #e9ecef;width:7%;">' +
                '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditExpenseListCart(this)" data-dismiss="modal" data-id0="' + value.combinedBudget_SubSectionLevel1_RefID + '" data-id1="' + value.product_RefID + '" data-id2="' + value.productName + '" data-id3="' + value.quantity + '" data-id4="' + value.quantityUnitName + '" data-id5="' + value.productUnitPriceCurrencyValue + '" data-id6="' + value.productUnitPriceCurrencyISOCode + '" data-id7="' + value.priceBaseCurrencyValue + '" data-id8="' + value.priceCurrencyISOCode + '" data-id9="' + value.quantity + '" data-id10="' + value.quantityUnitName + '" data-id11="' + value.productUnitPriceCurrencyValue + '" data-id12="' + value.productUnitPriceCurrencyISOCode + '" data-id13="' + value.priceBaseCurrencyValue + '" data-id14="' + value.priceCurrencyISOCode + '" data-id15="' + value.remarks + '" data-id16="' + value.baseCurrency_RefID + '" data-id17="' + value.combinedBudget_PriceBaseCurrencyValue + '" data-id18="' + value.baseCurrencyISOCode + '"  data-id19="' + arf_date + '"  style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="18" alt="" title="Edit"></button> ' +
                '<input type="hidden" id="var_tranox" name="var_trano[]" value="' + value.product_RefID + '">' +
                '<input type="hidden" name="var_product_id[]" value="' + value.product_RefID + '">' +
                '<input type="hidden" name="var_product_name[]" value="' + value.productName + '">' +
                '<input type="hidden" name="var_uom[]" value="' + value.quantityUnitName + '">' +
                '<input type="hidden" name="var_price_expense[]" value="' + value.productUnitPriceCurrencyValue + '">' +
                '<input type="hidden" name="var_qty_expense[]" value="' + value.quantity + '">' +
                '<input type="hidden" name="var_total_expense[]" value="' + value.priceBaseCurrencyValue + '">' +
                '<input type="hidden" name="var_description[]" value="' + value.remarks + '">' +
                '<input type="hidden" name="var_recordIDDetail[]" value="' + value.sys_ID + '">' +  
                '</td>' +
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
                '<td style="border:1px solid #e9ecef;width:7%;">' +
                '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditAmountListCart(this)" data-dismiss="modal" data-id0="' + value.combinedBudget_SubSectionLevel1_RefID + '" data-id1="' + value.product_RefID + '" data-id2="' + value.productName + '" data-id3="' + value.quantity + '" data-id4="' + value.quantityUnitName + '" data-id5="' + value.productUnitPriceCurrencyValue + '" data-id6="' + value.productUnitPriceCurrencyISOCode + '" data-id7="' + value.priceBaseCurrencyValue + '" data-id8="' + value.priceCurrencyISOCode + '" data-id9="' + value.quantity + '" data-id10="' + value.quantityUnitName + '" data-id11="' + value.productUnitPriceCurrencyValue + '" data-id12="' + value.productUnitPriceCurrencyISOCode + '" data-id13="' + value.priceBaseCurrencyValue + '" data-id14="' + value.priceCurrencyISOCode + '" data-id15="' + value.remarks + '" data-id16="' + value.baseCurrency_RefID + '" data-id17="' + value.combinedBudget_PriceBaseCurrencyValue + '" data-id18="' + value.baseCurrencyISOCode + '"  data-id19="' + arf_date + '"  style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="18" alt="" title="Edit"></button> ' +
                '<input type="hidden" name="var_trano[]" value="' + value.product_RefID + '">' +
                '<input type="hidden" name="var_product_id[]" value="' + value.product_RefID + '">' +
                '<input type="hidden" name="var_product_name[]" value="' + value.productName + '">' +
                '<input type="hidden" name="var_uom[]" value="' + value.quantityUnitName + '">' +
                '<input type="hidden" name="var_price_amount[]" value="' + value.productUnitPriceCurrencyValue + '">' +
                '<input type="hidden" name="var_qty_amount[]" value="' + value.quantity + '">' +
                '<input type="hidden" name="var_total_amount[]" value="' + value.priceBaseCurrencyValue + '">' +
                '<input type="hidden" name="var_description[]" id="var_description[]" value="' + value.remarks + '">' +
                '<input type="hidden" name="var_recordIDDetail[]" value="' + value.sys_ID + '">' +
                '</td>' +
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

                var Product = $("input[name='var_product_id[]']").map(function(){return $(this).val();}).get();
                var QuantityExpense = $("input[name='var_qty_expense[]']").map(function(){return $(this).val();}).get();
                
                console.log(Product);
                var PriceExpense = $("input[name='var_price_expense[]']").map(function(){return $(this).val();}).get();
                var QuantityAmount = $("input[name='var_quantity_amount[]']").map(function(){return $(this).val();}).get();
                var PriceAmount = $("input[name='var_price_amount[]']").map(function(){return $(this).val();}).get();
                var RecordID = $("input[name='var_recordIDDetail[]']").map(function(){return $(this).val();}).get();

                $.each(Product, function(ProductKey, ProductValue) {
                    if(ProductValue == val2.product_RefID){
                        var_qty_expense = QuantityExpense[ProductKey];
                        var_price_expense = PriceExpense[ProductKey];
                        var_qty_amount = QuantityAmount[ProductKey];
                        var_price_amount = PriceAmount[ProductKey];
                        var_recordIDDetail = RecordID[ProductKey];
                    }
                });
                if((var_qty_expense * var_price_expense) != 0){
                    var var_total_expense = currencyTotal(var_qty_expense * var_price_expense);
                }

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
                    '<td style="border:1px solid #e9ecef;">' + value.remarks + '</td>' +

                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col third-col-asf-expense-qty">' + '<input id="qty_expense'+ key +'" style="border-radius:0;width:50px;" name="qty_expense[]" class="form-control qty_expense" autocomplete="off" '+ statusForm[key] +' value="'+ currency(var_qty_expense) +'">' + '</td>' +
                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col third-col-asf-expense-price">' + '<input id="price_expense'+ key +'" style="border-radius:0;width:90px;" name="price_expense[]" class="form-control price_expense" autocomplete="off" '+ statusForm[key] +' value="'+ currency(var_price_expense) +'">' + '</td>' +
                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col third-col-asf-expense-total">' + '<input id="total_expense'+ key +'" style="border-radius:0;width:90px;background-color:white;" name="total_expense[]" class="form-control total_expense" autocomplete="off" disabled value="'+ var_total_expense +'">' + '</td>' +

                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col second-col-asf-amount-qty">' + '<input id="qty_amount'+ key +'" style="border-radius:0;width:50px;" name="qty_amount[]" class="form-control qty_amount" autocomplete="off" '+ statusForm[key] +' value="'+ currency(var_qty_amount) +'">' + '</td>' +
                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col second-col-asf-amount-price">' + '<input id="price_amount'+ key +'" style="border-radius:0;width:90px;" name="price_amount[]" class="form-control price_amount" autocomplete="off" '+ statusForm[key] +' value="'+ currency(var_price_amount) +'">' + '</td>' +
                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col second-col-asf-amount-total">' + '<input id="total_amount'+ key +'" style="border-radius:0;width:90px;background-color:white;" name="total_amount[]" class="form-control total_amount" autocomplete="off" disabled value="'+ var_total_amount +'">' + '</td>' +
                    
                    '<td style="border:1px solid #e9ecef;background-color:white;" class="sticky-col first-col-asf-balance-total">' + '<input id="total_balance'+ key +'" style="border-radius:0;width:90px;background-color:white;" name="total_balance[]" class="form-control total_balance" autocomplete="off" disabled value="' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '">' + '</td>' +
                    
                    '</tr>';

                $('table.tableArfDetail tbody').append(html);

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
            
            // $.each(data, function(key, value) {
            //     var html =
            //         '<tr>' +
            //         '<td style="border:1px solid #e9ecef;width:5%;">' +
            //         '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs AddToDetailSettlement AddToDetailSettlement2" data-dismiss="modal" data-id0="' + value.combinedBudget_SubSectionLevel1_RefID + '" data-id1="' + advance_number + '" data-id2="' + value.quantity + '" data-id3="' + value.productUnitPriceCurrencyValue + '" data-id4="' + value.priceBaseCurrencyValue + '" data-id5="' + value.priceCurrencyISOCode + '" data-id6="' + value.quantityUnitName + '" data-id7="' + value.product_RefID + '" data-id8="' + value.productName + '" data-id9="' + value.remarks + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="18" alt="" title="Add"></button> ' +
            //         '</td>' +
            //         '<td style="border:1px solid #e9ecef;">' +
            //         '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>' +
            //         '</td>' +
            //         '<td style="border:1px solid #e9ecef;">' + advance_number + '</td>' +
            //         '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
            //         '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
            //         '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
            //         '<td style="border:1px solid #e9ecef;">' + 'N/A' + '</td>' +
            //         '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
            //         '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
            //         '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
            //         '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
            //         '<td style="border:1px solid #e9ecef;">' + value.remarks + '</td>' +
            //         '</tr>';

            //     $('table.tableArfDetail tbody').append(html);
            // });

            // $("body").on("click", ".AddToDetailSettlement", function() {
            //     $("#detailASF").show();

            //     var $this = $(this);
            //     $("#advance_number_detail").val($this.data("id1"));
            //     $("#arf_date").val("23-02-2021");
            //     $("#qty_expense").val($this.data("id2").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            //     $("#put_qty_expense").val($this.data("id2"));
            //     $("#TotalQty").val($this.data("id2"));
            //     $("#qty_expense2").val($this.data("id6"));
            //     $("#price_expense").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            //     $("#put_price_expense").val($this.data("id3"));
            //     $("#price_expense2").val($this.data("id5"));
            //     $("#total_expense").val($this.data("id4").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            //     $("#total_expense2").val($this.data("id5"));
            //     $("#qty_amount").val("0.00");
            //     $("#qty_amount2").val($this.data("id6"));
            //     $("#price_amount").val("0.00");
            //     $("#price_amount2").val($this.data("id5"));
            //     $("#total_amount").val("0.00");
            //     $("#total_amount2").val($this.data("id5"));
            //     $("#balance").val($this.data("id4").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            //     $("#balance2").val($this.data("id5"));

            //     $("#putWorkId").val($this.data("id0"));
            //     $("#putProductId").val($this.data("id7"));
            //     $("#putProductName").val($this.data("id8"));
            //     $("#putDescription").val($this.data("id9"));

            //     $(".AddToDetailSettlement2").prop("disabled", true);
            //     $(".ActionButton").prop("disabled", true);

            // });
        }
    });
</script>


<!-- <script type="text/javascript">
    function addFromDetailtoCartJs() {
        var VarArfNumber = $("#advance_number_detail").val();
        $("#advance_number_detail").css("border", "1px solid #ced4da");

        if (VarArfNumber === "") {
            $("#advance_number_detail").focus();
            $("#advance_number_detail").attr('required', true);
            $("#advance_number_detail").css("border", "1px solid red");
        } else {
            var balance = parseFloat($('#balance').val().replace(/,/g, ''));
            var putProductId = $('#putProductId').val();
            var total_expense = parseFloat($('#total_expense').val().replace(/,/g, ''));
            var total_amount = parseFloat($('#total_amount').val().replace(/,/g, ''));
            var totalExpenseAmount = +total_expense + +total_amount;
            if (totalExpenseAmount <= balance) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement") !!}?putProductId=' + $("#putProductId").val() + '&putWorkId=' + $('#putWorkId').val(),
                    success: function(data) {
                        if (data == "200") {


                            var work_id = $("#putWorkId").val();
                            var product_id = $("#putProductId").val();
                            var product_name = $("#putProductName").val();
                            var trano = $('#advance_number_detail').val();
                            var arf_date = $('#arf_date').val();
                            var balance = $('#balance').val();
                            var balance2 = $('#balance2').val();
                            var qty_expense = $('#qty_expense').val();
                            var qty_expense2 = $('#qty_expense2').val();
                            var price_expense = $('#price_expense').val();
                            var price_expense2 = $('#price_expense2').val();
                            var total_expense = $('#total_expense').val();
                            var total_expense2 = $('#total_expense2').val();
                            var qty_amount = $('#qty_amount').val();
                            var qty_amount2 = $('#qty_amount2').val();
                            var price_amount = $('#price_amount').val();
                            var price_amount2 = $('#price_amount2').val();
                            var total_amount = $('#total_amount').val();
                            var total_amount2 = $('#total_amount2').val();
                            var description = $("#putDescription").val();

                           //TOTAL AMOUNT
                           if($("#TotalAmount").html() == ""){
                                $("#TotalAmount").html('0');
                            }
                            var TotalAmount = parseFloat($("#total_amount").val().replace(/,/g, ''));
                            var TotalAmount2 = parseFloat($("#TotalAmount").html().replace(/,/g, ''));
                            $("#TotalAmount").html(parseFloat(+TotalAmount2 + TotalAmount).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));    

                            var html = '<tr>' +
                                '<td style="border:1px solid #e9ecef;width:7%;">' +
                                '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditAmount(this)" data-dismiss="modal" data-id0="' + work_id + '" data-id1="' + product_id + '" data-id2="' + arf_date + '" data-id3="' + balance + '" data-id4="' + balance2 + '" data-id5="' + qty_expense + '" data-id6="' + qty_expense2 + '" data-id7="' + price_expense + '" data-id8="' + price_expense2 + '" data-id9="' + total_expense + '" data-id110="' + total_expense2 + '" data-id11="' + qty_amount + '" data-id12="' + qty_amount2 + '" data-id13="' + price_amount + '" data-id14="' + price_amount2 + '" data-id15="' + total_amount + '" data-id16="' + total_amount2 + '" data-id17="' + trano + '" data-id18="' + product_name + '" data-id19="' + description + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                                '<input type="hidden" name="var_trano[]" value="' + trano + '">' +
                                '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                                '<input type="hidden" name="var_product_name[]" value="' + product_name + '">' +
                                '<input type="hidden" name="var_uom[]" value="' + qty_amount2 + '">' +
                                '<input type="hidden" name="var_price_amount[]" value="' + price_amount + '">' +
                                '<input type="hidden" name="var_qty_amount[]" value="' + qty_amount + '">' +
                                '<input type="hidden" name="var_total_amount[]" value="' + total_amount + '">' +
                                '<input type="hidden" name="var_description[]" id="var_description[]" value="' + description + '">' +
                                '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + product_name + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + qty_amount2 + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + qty_amount + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + price_amount + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + total_amount + '</td>' +
                                '</tr>';

                            $('table.TableAmountDueto tbody').append(html);

                            //TOTAL EXPENSE
                            if($("#TotalExpense").html() == ""){
                                $("#TotalExpense").html('0');
                            }
                            var TotalExpense = parseFloat($("#total_expense").val().replace(/,/g, ''));
                            var TotalExpense2 = parseFloat($("#TotalExpense").html().replace(/,/g, ''));
                            $("#TotalExpense").html(parseFloat(+TotalExpense2 + TotalExpense).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                            var html2 = '<tr>' +
                                '<td style="border:1px solid #e9ecef;width:7%;">' +
                                '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditExpense(this)" data-dismiss="modal" data-id0="' + work_id + '" data-id1="' + product_id + '" data-id2="' + arf_date + '" data-id3="' + balance + '" data-id4="' + balance2 + '" data-id5="' + qty_expense + '" data-id6="' + qty_expense2 + '" data-id7="' + price_expense + '" data-id8="' + price_expense2 + '" data-id9="' + total_expense + '" data-id110="' + total_expense2 + '" data-id11="' + qty_amount + '" data-id12="' + qty_amount2 + '" data-id13="' + price_amount + '" data-id14="' + price_amount2 + '" data-id15="' + total_amount + '" data-id16="' + total_amount2 + '" data-id17="' + trano + '" data-id18="' + product_name + '" data-id19="' + description + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                                '<input type="hidden" id="var_tranox" name="var_trano[]" value="' + trano + '">' +
                                '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                                '<input type="hidden" name="var_product_name[]" value="' + product_name + '">' +
                                '<input type="hidden" name="var_uom[]" value="' + qty_expense2 + '">' +
                                '<input type="hidden" name="var_price_expense[]" value="' + price_expense + '">' +
                                '<input type="hidden" name="var_qty_expense[]" value="' + qty_expense + '">' +
                                '<input type="hidden" name="var_total_expense[]" value="' + total_expense + '">' +
                                '<input type="hidden" name="var_description[]" value="' + description + '">' +
                                '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + product_name + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + qty_expense2 + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + qty_expense + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + price_expense + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + total_expense + '</td>' +
                                '</tr>';

                            $('table.TableExpenseClaim tbody').append(html2);
                            // }

                            $("#statusEditAsf").val("No");
                            $("#expenseCompanyCart").show();
                            $(".expenseCompanyCart").show();
                            $("#SaveAsfList").prop("disabled", false);

                            $("#advance_number_detail").val("");
                            $("#arf_date").val("");
                            $("#priceCek").val("");
                            $("#balance").val("");
                            $("#balance2").val("");
                            $("#qty_expense").val("");
                            $("#qty_expense2").val("");
                            $("#price_expense").val("");
                            $("#price_expense2").val("");
                            $("#total_expense").val("");
                            $("#total_expense2").val("");
                            $("#qty_amount").val("");
                            $("#qty_amount2").val("");
                            $("#price_amount").val("");
                            $("#price_amount2").val("");
                            $("#total_amount").val("");
                            $("#total_amount2").val("");

                            $("#qty_expense").prop("disabled", false);
                            $("#price_expense").prop("disabled", false);
                            $("#qty_amount").prop("disabled", false);
                            $("#price_amount").prop("disabled", false);

                            $("#qty_expense").css("border", "1px solid #ced4da");
                            $("#price_expense").css("border", "1px solid #ced4da");
                            $("#qty_amount").css("border", "1px solid #ced4da");
                            $("#price_amount").css("border", "1px solid #ced4da");

                            $(".AddToDetailSettlement2").prop("disabled", false);
                            $(".ActionButton").prop("disabled", false);

                        } else {
                            Swal.fire("Cancelled", "Please use edit to update this item !", "error");
                        }
                    },
                });
            } else {
                Swal.fire("Error !", "Request over budget", "error");
            }
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".CancelDetailAsf").click(function() {

            var work_id = $("#putWorkId").val();
            var product_id = $("#putProductId").val();
            var product_name = $("#putProductName").val();
            var trano = $('#advance_number_detail').val();
            var arf_date = $('#arf_date').val();
            var balance = $('#balance').val();
            var balance2 = $('#balance2').val();
            var qty_expense = $('#qty_expense').val();
            var qty_expense2 = $('#qty_expense2').val();
            var price_expense = $('#price_expense').val();
            var price_expense2 = $('#price_expense2').val();
            var total_expense = $('#total_expense').val();
            var total_expense2 = $('#total_expense2').val();
            var qty_amount = $('#qty_amount').val();
            var qty_amount2 = $('#qty_amount2').val();
            var price_amount = $('#price_amount').val();
            var price_amount2 = $('#price_amount2').val();
            var total_amount = $('#total_amount').val();
            var total_amount2 = $('#total_amount2').val();
            var description = $("#putDescription").val();
            var statusEditAsf = $("#statusEditAsf").val();
            if (statusEditAsf == "Yes") {

                var qty_expense = $("#ValidateQuantityExpense").val();
                var price_expense = $("#ValidatePriceExpense").val();
                var qty_amount = $("#ValidateQuantityAmount").val();
                var price_amount = $("#ValidatePriceAmount").val();
                var total_amount = parseFloat(qty_amount * price_amount).toFixed(2);
                var total_expense = parseFloat(qty_expense * price_expense).toFixed(2);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    type: "POST",
                    url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                    success: function(data) {

                        if (data == "200") {
                            
                            // if (total_amount != "") {
                                var html = '<tr>' +
                                    '<td style="border:1px solid #e9ecef;width:7%;">' +
                                    '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditAmount(this)" data-dismiss="modal" data-id0="' + work_id + '" data-id1="' + product_id + '" data-id2="' + arf_date + '" data-id3="' + balance + '" data-id4="' + balance2 + '" data-id5="' + qty_expense + '" data-id6="' + qty_expense2 + '" data-id7="' + price_expense + '" data-id8="' + price_expense2 + '" data-id9="' + total_expense + '" data-id110="' + total_expense2 + '" data-id11="' + qty_amount + '" data-id12="' + qty_amount2 + '" data-id13="' + price_amount + '" data-id14="' + price_amount2 + '" data-id15="' + total_amount + '" data-id16="' + total_amount2 + '" data-id17="' + trano + '" data-id18="' + product_name + '" data-id19="' + description + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                                    '<input type="hidden" name="var_trano[]" value="' + trano + '">' +
                                    '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                                    '<input type="hidden" name="var_product_name[]" value="' + product_name + '">' +
                                    '<input type="hidden" name="var_uom[]" value="' + qty_amount2 + '">' +
                                    '<input type="hidden" name="var_price_amount[]" value="' + price_amount + '">' +
                                    '<input type="hidden" name="var_qty_amount[]" value="' + qty_amount + '">' +
                                    '<input type="hidden" name="var_total_amount[]" value="' + total_amount + '">' +
                                    '<input type="hidden" name="var_description[]" id="var_description[]" value="' + description + '">' +
                                    '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + product_name + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + qty_amount2 + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + qty_amount + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + price_amount + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + total_amount + '</td>' +
                                    '</tr>';

                                $('table.TableAmountDueto tbody').append(html);

                                var TotalAmount = parseFloat($("#TotalAmount").html().replace(/,/g, ''));
                                $("#TotalAmount").html(parseFloat(+TotalAmount + +total_amount).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                            // }
                            // if (total_expense !== "") {
                                var html2 = '<tr>' +
                                    '<td style="border:1px solid #e9ecef;width:7%;">' +
                                    '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditExpense(this)" data-dismiss="modal" data-id0="' + work_id + '" data-id1="' + product_id + '" data-id2="' + arf_date + '" data-id3="' + balance + '" data-id4="' + balance2 + '" data-id5="' + qty_expense + '" data-id6="' + qty_expense2 + '" data-id7="' + price_expense + '" data-id8="' + price_expense2 + '" data-id9="' + total_expense + '" data-id110="' + total_expense2 + '" data-id11="' + qty_amount + '" data-id12="' + qty_amount2 + '" data-id13="' + price_amount + '" data-id14="' + price_amount2 + '" data-id15="' + total_amount + '" data-id16="' + total_amount2 + '" data-id17="' + trano + '" data-id18="' + product_name + '" data-id19="' + description + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                                    '<input type="hidden" id="var_tranox" name="var_trano[]" value="' + trano + '">' +
                                    '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                                    '<input type="hidden" name="var_product_name[]" value="' + product_name + '">' +
                                    '<input type="hidden" name="var_uom[]" value="' + qty_expense2 + '">' +
                                    '<input type="hidden" name="var_price_expense[]" value="' + price_expense + '">' +
                                    '<input type="hidden" name="var_qty_expense[]" value="' + qty_expense + '">' +
                                    '<input type="hidden" name="var_total_expense[]" value="' + total_expense + '">' +
                                    '<input type="hidden" name="var_description[]" value="' + description + '">' +
                                    '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + product_name + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + qty_expense2 + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + qty_expense + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + price_expense + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + total_expense + '</td>' +
                                    '</tr>';

                                $('table.TableExpenseClaim tbody').append(html2);

                                var TotalExpense = parseFloat($("#TotalExpense").html().replace(/,/g, ''));
                                $("#TotalExpense").html(parseFloat(+TotalExpense + +total_expense).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                            // }
                        }
                        else {
                            Swal.fire("Error !", "Please use edit to update this item !", "error");
                        }
                    },
                });
                $("#statusEditAsf").val("No");
            }

            $("#advance_number_detail").val("");
            $("#arf_date").val("");
            $("#balance").val("");
            $("#balance2").val("");
            $("#qty_expense").val("");
            $("#qty_expense2").val("");
            $("#price_expense").val("");
            $("#price_expense2").val("");
            $("#total_expense").val("");
            $("#total_expense2").val("");
            $("#qty_amount").val("");
            $("#qty_amount2").val("");
            $("#price_amount").val("");
            $("#price_amount2").val("");
            $("#total_amount").val("");
            $("#total_amount2").val("");

            $("#putProductId").css("border", "1px solid #ced4da");

            $(".AddToDetailSettlement2").prop("disabled", false);
            $(".ActionButton").prop("disabled", false);
        });
    });
</script>

<script>
    function EditExpense(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TableExpenseClaim").deleteRow(i);
        document.getElementById("TableAmountDueto").deleteRow(i);

        var $this = $(t);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        

        $.ajax({
            type: "POST",
            url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement2") !!}?putProductId=' + $this.data("id1") + '&putWorkId=' + $this.data("id0"),
        });

        $("#putWorkId").val($this.data("id0"));
        $("#putProductId").val($this.data("id1"));
        $("#putProductName").val($this.data("id18"));
        $("#putDescription").val($this.data("id19"));
        $("#advance_number_detail").val($this.data("id17"));
        $("#arf_date").val($this.data("id2"));
        $("#balance").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#balance2").val($this.data("id4"));
        $("#qty_expense").val($this.data("id5"));
        $("#qty_expense2").val($this.data("id6"));
        $("#price_expense").val($this.data("id7"));
        $("#price_expense2").val($this.data("id8"));
        $("#total_expense").val($this.data("id9"));
        $("#total_expense2").val($this.data("id10"));
        $("#qty_amount").val($this.data("id11"));
        $("#qty_amount2").val($this.data("id12"));
        $("#price_amount").val($this.data("id13"));
        $("#price_amount2").val($this.data("id14"));
        $("#total_amount").val($this.data("id15"));
        $("#total_amount2").val($this.data("id16"));
        $("#statusEditAsf").val("Yes");
        
        $("#ValidateQuantityExpense").val($this.data("id5"));
        $("#ValidatePriceExpense").val($this.data("id7"));
        $("#ValidateQuantityAmount").val($this.data("id11"));
        $("#ValidatePriceAmount").val($this.data("id13"));

        $(".AddToDetailSettlement2").prop("disabled", true);
        $(".ActionButton").prop("disabled", true);
        $("#detailASF").show();

        var total_expense = parseFloat($("#total_expense").val().replace(/,/g, ''));
        var TotalExpense = parseFloat($("#TotalExpense").html().replace(/,/g, '')); 
        $("#TotalExpense").html(parseFloat(TotalExpense - total_expense).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var total_amount = parseFloat($("#total_amount").val().replace(/,/g, ''));
        var TotalAmount = parseFloat($("#TotalAmount").html().replace(/,/g, ''));
        $("#TotalAmount").html(parseFloat(TotalAmount - total_amount).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

    }

    function EditExpenseListCart(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TableExpenseClaim").deleteRow(i);
        document.getElementById("TableAmountDueto").deleteRow(i);

        var $this = $(t);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: "POST",
            url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement2") !!}?putProductId=' + $this.data("id1") + '&putWorkId=' + $this.data("id0"),
        });

        $("#putWorkId").val($this.data("id0"));
        $("#putProductId").val($this.data("id1"));
        $("#putProductName").val($this.data("id2"));
        $("#qty_expense").val($this.data("id3"));
        $("#qty_expense2").val($this.data("id4"));
        $("#price_expense").val($this.data("id5"));
        $("#price_expense2").val($this.data("id6"));
        $("#total_expense").val($this.data("id7"));
        $("#total_expense2").val($this.data("id8"));
        $("#qty_amount").val($this.data("id9"));
        $("#qty_amount2").val($this.data("id10"));
        $("#price_amount").val($this.data("id11"));
        $("#price_amount2").val($this.data("id12"));
        $("#total_amount").val($this.data("id13"));
        $("#total_amount2").val($this.data("id14"));

        $("#arf_date").val($this.data("id19"));
        $("#putDescription").val($this.data("id15"));
        $("#advance_number_detail").val($this.data("id16"));
        $("#balance").val($this.data("id17"));
        $("#balance2").val($this.data("id18"));
        

        $("#statusEditAsf").val("Yes");

        $("#ValidateQuantityExpense").val($this.data("id3"));
        $("#ValidatePriceExpense").val($this.data("id5"));
        $("#ValidateQuantityAmount").val($this.data("id9"));
        $("#ValidatePriceAmount").val($this.data("id11"));

        $(".AddToDetailSettlement2").prop("disabled", true);
        $(".ActionButton").prop("disabled", true);
        $("#detailASF").show();

        var total_expense = parseFloat($("#total_expense").val().replace(/,/g, ''));
        var TotalExpense = parseFloat($("#TotalExpense").html().replace(/,/g, ''));
        $("#TotalExpense").html(parseFloat(TotalExpense - total_expense).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var total_amount = parseFloat($("#total_amount").val().replace(/,/g, ''));
        var TotalAmount = parseFloat($("#TotalAmount").html().replace(/,/g, ''));
        $("#TotalAmount").html(parseFloat(TotalAmount - total_amount).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

    }
</script>

<script>
    function EditAmount(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TableExpenseClaim").deleteRow(i);
        document.getElementById("TableAmountDueto").deleteRow(i);

        var $this = $(t);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: "POST",
            url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement2") !!}?putProductId=' + $this.data("id1") + '&putWorkId=' + $this.data("id0"),
        });

        $("#putWorkId").val($this.data("id0"));
        $("#putProductId").val($this.data("id1"));
        $("#putProductName").val($this.data("id18"));
        $("#putDescription").val($this.data("id19"));
        $("#advance_number_detail").val($this.data("id17"));
        $("#arf_date").val($this.data("id2"));
        $("#balance").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#balance2").val($this.data("id4"));
        $("#qty_expense").val($this.data("id5"));
        $("#qty_expense2").val($this.data("id6"));
        $("#price_expense").val($this.data("id7"));
        $("#price_expense2").val($this.data("id8"));
        $("#total_expense").val($this.data("id9"));
        $("#total_expense2").val($this.data("id10"));
        $("#qty_amount").val($this.data("id11"));
        $("#qty_amount2").val($this.data("id12"));
        $("#price_amount").val($this.data("id13"));
        $("#price_amount2").val($this.data("id14"));
        $("#total_amount").val($this.data("id15"));
        $("#total_amount2").val($this.data("id16"));
        $("#statusEditAsf").val("Yes");

        
        $("#ValidateQuantityExpense").val($this.data("id5"));
        $("#ValidatePriceExpense").val($this.data("id7"));
        $("#ValidateQuantityAmount").val($this.data("id11"));
        $("#ValidatePriceAmount").val($this.data("id13"));

        $(".AddToDetailSettlement2").prop("disabled", true);
        $(".ActionButton").prop("disabled", true);
        $("#detailASF").show();

        var total_expense = parseFloat($("#total_expense").val().replace(/,/g, ''));
        var TotalExpense = parseFloat($("#TotalExpense").html().replace(/,/g, '')); 
        $("#TotalExpense").html(parseFloat(TotalExpense - total_expense).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var total_amount = parseFloat($("#total_amount").val().replace(/,/g, ''));
        var TotalAmount = parseFloat($("#TotalAmount").html().replace(/,/g, ''));
        $("#TotalAmount").html(parseFloat(TotalAmount - total_amount).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

    }

    function EditAmountListCart(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TableExpenseClaim").deleteRow(i);
        document.getElementById("TableAmountDueto").deleteRow(i);

        var $this = $(t);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: "POST",
            url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement2") !!}?putProductId=' + $this.data("id1") + '&putWorkId=' + $this.data("id0"),
        });

        $("#putWorkId").val($this.data("id0"));
        $("#putProductId").val($this.data("id1"));
        $("#putProductName").val($this.data("id2"));
        $("#qty_expense").val($this.data("id3"));
        $("#qty_expense2").val($this.data("id4"));
        $("#price_expense").val($this.data("id5"));
        $("#price_expense2").val($this.data("id6"));
        $("#total_expense").val($this.data("id7"));
        $("#total_expense2").val($this.data("id8"));
        $("#qty_amount").val($this.data("id9"));
        $("#qty_amount2").val($this.data("id10"));
        $("#price_amount").val($this.data("id11"));
        $("#price_amount2").val($this.data("id12"));
        $("#total_amount").val($this.data("id13"));
        $("#total_amount2").val($this.data("id14"));

        $("#arf_date").val($this.data("id19"));
        $("#putDescription").val($this.data("id15"));
        $("#advance_number_detail").val($this.data("id16"));
        $("#balance").val($this.data("id17"));
        $("#balance2").val($this.data("id18"));
        

        $("#statusEditAsf").val("Yes");

        $("#ValidateQuantityExpense").val($this.data("id3"));
        $("#ValidatePriceExpense").val($this.data("id5"));
        $("#ValidateQuantityAmount").val($this.data("id9"));
        $("#ValidatePriceAmount").val($this.data("id11"));

        $(".AddToDetailSettlement2").prop("disabled", true);
        $(".ActionButton").prop("disabled", true);
        $("#detailASF").show();

        var total_expense = parseFloat($("#total_expense").val().replace(/,/g, ''));
        var TotalExpense = parseFloat($("#TotalExpense").html().replace(/,/g, ''));
        $("#TotalExpense").html(parseFloat(TotalExpense - total_expense).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var total_amount = parseFloat($("#total_amount").val().replace(/,/g, ''));
        var TotalAmount = parseFloat($("#TotalAmount").html().replace(/,/g, ''));
        $("#TotalAmount").html(parseFloat(TotalAmount - total_amount).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

    }
</script>

<script>
    $('document').ready(function() {
        $('#qty_expense').keyup(function() {
            var qty_expense = $(this).val();
            var qty_amount = $('#qty_amount').val();
            var price_expense = parseFloat($('#price_expense').val().replace(/,/g, ''));
            var total_expense = qty_expense * price_expense;
            var TotalQty = $('#TotalQty').val();
            var TotalQty2 = +qty_expense + +qty_amount;
            if (qty_expense == '') {
                $('#total_expense').val("");
            } else if (parseFloat(TotalQty2) > parseFloat(TotalQty)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#qty_expense").css("border", "1px solid red");
                $('#qty_expense').val("");
                $('#total_expense').val("");
            } else {
                $("#qty_expense").css("border", "1px solid #ced4da");
                $('#total_expense').val(parseFloat(total_expense).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }
        });

        $('#qty_amount').keyup(function() {
            var qty_amount = $(this).val();
            var qty_expense = $('#qty_expense').val();
            var price_amount = parseFloat($('#price_amount').val().replace(/,/g, ''));
            var total_amount = qty_amount * price_amount;
            var TotalQty = $('#TotalQty').val();
            var TotalQty2 = +qty_expense + +qty_amount;
            if (qty_amount == '') {
                $('#total_amount').val("");
            } else if (parseFloat(TotalQty2) > parseFloat(TotalQty)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#qty_amount").css("border", "1px solid red");
                $('#qty_amount').val("");
                $('#total_amount').val("");
            } else {
                $("#qty_amount").css("border", "1px solid #ced4da");
                $('#total_amount').val(parseFloat(total_amount).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }
        });

        $('#price_expense').keyup(function() {
            var price_expense = $(this).val();
            var qty_expense = $('#qty_expense').val();
            var put_price_expense = $('#put_price_expense').val();
            var total_expense = price_expense * qty_expense;

            if (price_expense == '') {
                $('#total_expense').val("");
            } else if (parseFloat(price_expense) > parseFloat(put_price_expense)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#price_expense").css("border", "1px solid red");
                $('#price_expense').val("");
                $('#total_expense').val("");
            } else {
                $("#price_expense").css("border", "1px solid #ced4da");
                $('#total_expense').val(parseFloat(total_expense).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }
        });

        $('#price_amount').keyup(function() {
            var price_amount = $(this).val();
            var qty_amount = $('#qty_amount').val();
            var put_price_expense = $('#put_price_expense').val();
            var total_amount = price_amount * qty_amount;
            if (price_amount == '') {
                $('#total_amount').val("");
            } else if (parseFloat(price_amount) > parseFloat(put_price_expense)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#price_amount").css("border", "1px solid red");
                $('#price_amount').val("");
                $('#total_amount').val("");
            } else {
                $("#price_amount").css("border", "1px solid #ced4da");
                $('#total_amount').val(parseFloat(total_amount).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }
        });
    });
</script> -->


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