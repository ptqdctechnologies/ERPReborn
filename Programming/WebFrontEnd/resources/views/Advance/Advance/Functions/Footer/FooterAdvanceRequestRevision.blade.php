<script type="text/javascript">
    $(document).ready(function() {
        $("#projectcode2").prop("disabled", true);
        $("#sitecode2").prop("disabled", true);
        $("#request_name2").prop("disabled", true);
        $("#addFromDetailtoCart").prop("disabled", true);
        $("#showContentBOQ3").hide();
        $("#product_id2").prop("disabled", true);
        // $("#submitArf").prop("disabled", true);
    });
</script>

<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var advance_RefID = $("#var_recordID").val();
    var trano = $("#trano").val();
    var TotalBudgetList = 0;
    var TotalQty = 0;
    var TotalPayment = 0;

    $.ajax({
        type: "POST",
        url: '{!! route("AdvanceRequest.AdvanceListCartRevision") !!}?advance_RefID=' + advance_RefID,
        success: function(data) {
            var no = 1; applied = 0; status = ""; statusDisplay = [];statusDisplay2 = []; statusForm = [];
            $.each(data, function(key, value) {
                TotalBudgetList += +(value.quantity * value.productUnitPriceCurrencyValue);
                TotalQty+= +value.quantity.replace(/,/g, '');

                // TABLE LIST 
                var html =
                    '<tr>' +
                        '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.combinedBudgetSubSectionLevel1_RefID + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.combinedBudgetSubSectionLevel1Name + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                        '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ key +'" class="price_req2'+ key +'">' + currencyTotal(value.productUnitPriceCurrencyValue) + '</span>' + '</td>' +
                        '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ key +'" class="qty_req2'+ key +'">' + currencyTotal(value.quantity) + '</span>' + '</td>' +
                        '<td style="padding-top: 10px;padding-btwottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ key +'" class="total_req2'+ key +'">' + currencyTotal(value.quantity * value.productUnitPriceCurrencyValue) + '</span>' + '</td>' +
                    '</tr>';

                $('table.TableAdvance tbody').append(html);

                $("#GrandTotal").html(currencyTotal(TotalBudgetList));
                $("#TotalQty").html(currencyTotal(TotalQty));

                // TABLE BUDGET 

                if(value.quantity == "0.00" && value.quantity == "0.00"){
                    var applied = 0;
                }
                else{
                    var applied = Math.round(parseFloat(value.quantity) / parseFloat(value.quantity) * 100);
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

                var html2 = 
                    '<tr>' +
                        '<input name="getWorkId[]" value="'+ value.combinedBudgetSubSectionLevel1_RefID +'" type="hidden">' +
                        '<input name="getWorkName[]" value="'+ value.combinedBudgetSubSectionLevel1Name +'" type="hidden">' +
                        '<input name="getProductId[]" value="'+ value.product_RefID +'" type="hidden">' +
                        '<input name="getProductName[]" value="'+ value.productName +'" type="hidden">' +
                        '<input name="getQty[]" id="budget_qty'+ key +'" value="'+ value.quantity +'" type="hidden">' +
                        '<input name="getPrice[]" id="budget_price'+ key +'" value="'+ value.productUnitPriceCurrencyValue +'" type="hidden">' +
                        '<input name="getUom[]" value="'+ value.quantityUnitName +'" type="hidden">' +
                        '<input name="getCurrency[]" value="'+ value.priceCurrencyISOCode +'" type="hidden">' +
                        '<input name="combinedBudgetSectionDetail_RefID[]" value="'+ value.sys_ID +'" type="hidden">' +
                        '<input name="combinedBudget_RefID" value="'+ value.combinedBudget_RefID +'" type="hidden">' +
                        '<input name="getRecordIDDetail[]" value="' + value.sys_ID + '"  type="hidden">' +

                        '<td style="border:1px solid #e9ecef;">' +
                        '&nbsp;&nbsp;&nbsp;<div class="progress '+ status +' progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                        '</td>' +

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

                        '<td style="border:1px solid #e9ecef;">' + '<span>' + trano + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;display:'+ statusDisplay2[key] +'">' + '<span>' + value.product_RefID + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="putProductName'+ key +'">' + value.productName + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="total_balance_qty2'+ key +'">' + currencyTotal(value.quantity) + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span">' + currencyTotal(value.quantity) + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span>' + currencyTotal(value.productUnitPriceCurrencyValue) + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="total_budget'+ key +'">' + currencyTotal(value.priceBaseCurrencyValue) + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="total_payment'+ key +'">' + currencyTotal(TotalPayment) + '</span>' + '</td>' +

                        '<td class="sticky-col forth-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req'+ key +'" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" '+ statusForm[key] +' onkeypress="return isNumberKey(this, event);" value="'+ currencyTotal(value.quantity) +'">' + '</td>' +
                        '<td class="sticky-col third-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="price_req'+ key +'" style="border-radius:0;" name="price_req[]" class="form-control price_req" autocomplete="off" '+ statusForm[key] +' onkeypress="return isNumberKey(this, event);" value="'+ currencyTotal(value.productUnitPriceCurrencyValue) +'">' + '</td>' +
                        '<td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_req'+ key +'" style="border-radius:0;background-color:white;" name="total_req[]" class="form-control total_req" autocomplete="off" disabled value="'+ currencyTotal(value.quantity * value.productUnitPriceCurrencyValue) +'">' + '</td>' +
                        '<td class="sticky-col first-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_balance_qty'+ key +'" style="border-radius:0;background-color:white;" name="total_balance_qty[]" class="form-control total_balance_qty" autocomplete="off" disabled value="'+ currencyTotal(value.quantity) +'">' + '</td>' +
                    '</tr>';

                $('table.tableBudgetDetail tbody').append(html2);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetList));
                
                if(value.productName == "Unspecified Product"){
                    //VALIDASI QTY
                    $('#qty_req'+key).keyup(function() {
                        var qty_val = $(this).val().replace(/,/g, '');
                        var budget_qty_val = $("#budget_qty"+key).val();
                        var price_req = $("#price_req"+key).val().replace(/,/g, '');
                        var total_budget = $("#total_budget"+key).html().replace(/,/g, '');
                        var total_payment = $("#total_payment"+key).html().replace(/,/g, '');
                        var total = qty_val * price_req;

                        if (qty_val == "") {
                            $('#total_req'+key).val("");
                            $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                        }
                        else if (parseFloat(total) > parseFloat(total_budget)) {

                            swal({
                                onOpen: function () {
                                    swal.disableConfirmButton();
                                    Swal.fire("Error !", "Total request is over budget than Budget!", "error");
                                }
                            });

                            $('#qty_req'+key).val("");
                            $('#total_req'+key).val("0.00");
                            $('#qty_req'+key).css("border", "1px solid red");
                            $('#qty_req'+key).focus();
                        }
                        else if(parseFloat(total) < parseFloat(total_payment)){
                            swal({
                                onOpen: function () {
                                    swal.disableConfirmButton();
                                    Swal.fire("Error !", "Total Request cannot less than Total Payment !", "error");
                                }                
                            });

                            $('#qty_req'+key).val("");
                            $('#total_req'+key).val("0.00");
                            $('#qty_req'+key).focus();
                        }
                        else {
                            $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                            $('#total_req'+key).val(currencyTotal(total));
                        }

                        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                        TotalBudgetSelected();
                        //MEMANGGIL FUNCTION TOTAL BALANCE QTY MISSCELNOUS SELECTED
                        TotalBalanceQtyMisscelnousSelected(key);
                    });

                    //VALIDASI PRICE
                    $('#price_req'+key).keyup(function() {
                        var price_val = $(this).val().replace(/,/g, '');
                        var budget_price_val = $("#budget_price"+key).val().replace(/,/g, '');
                        var qty_req = $("#qty_req"+key).val();
                        var total_budget = $("#total_budget"+key).html().replace(/,/g, '');
                        var total_payment = $("#total_payment"+key).html().replace(/,/g, '');
                        var total = price_val * qty_req;

                        if (price_val == "") {
                            $('#total_req'+key).val("");
                            $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                        }
                        else if (parseFloat(total) > parseFloat(total_budget)) {
                            swal({
                                onOpen: function () {
                                    swal.disableConfirmButton();
                                    Swal.fire("Error !", "Total request is over budget than Budget!", "error");
                                }
                            });

                            $('#price_req'+key).val("");
                            $('#total_req'+key).val("0.00");
                            $('#price_req'+key).css("border", "1px solid red");
                            $('#price_req'+key).focus();
                        }
                        else if(parseFloat(total) < parseFloat(total_payment)){
                            swal({
                                onOpen: function () {
                                    swal.disableConfirmButton();
                                    Swal.fire("Error !", "Total Request cannot less than Total Payment !", "error");
                                }                
                            });

                            $('#total_req'+key).val("0.00");
                            $('#price_req'+key).val("");
                            $('#price_req'+key).focus();
                        }
                        else if (parseFloat(price_val) > parseFloat(budget_price_val)) {
                            swal({
                                onOpen: function () {
                                    swal.disableConfirmButton();
                                    Swal.fire("Error !", "Price is over budget !", "error");
                                }
                            });
                            $('#price_req'+key).val("");
                            $('#total_req'+key).val("0.00");
                            $('#price_req'+key).focus();
                        }
                        else {
                            $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                            $('#total_req'+key).val(currencyTotal(total));

                        }

                        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                        TotalBudgetSelected();
                        //MEMANGGIL FUNCTION TOTAL BALANCE QTY MISSCELNOUS SELECTED
                        TotalBalanceQtyMisscelnousSelected(key);
                    });
                }
                else{
                    //VALIDASI QTY
                    $('#qty_req'+key).keyup(function() {
                        var qty_val = $(this).val().replace(/,/g, '');
                        var budget_qty_val = $("#budget_qty"+key).val();
                        var price_req = $("#price_req"+key).val().replace(/,/g, '');
                        var total_payment = $("#total_payment"+key).html().replace(/,/g, '');
                        var total = qty_val * price_req;

                        if (qty_val == "") {
                            $('#total_req'+key).val("");
                            $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                        }
                        else if(parseFloat(total) < parseFloat(total_payment)){
                            swal({
                                onOpen: function () {
                                    swal.disableConfirmButton();
                                    Swal.fire("Error !", "Total Request cannot less than Total Payment !", "error");
                                }                
                            });

                            $('#qty_req'+key).val("");
                            $('#total_req'+key).val("0.00");
                            $('#qty_req'+key).focus();
                        }
                        else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {
                            swal({
                                onOpen: function () {
                                    swal.disableConfirmButton();
                                    Swal.fire("Error !", "Qty is over budget !", "error");
                                }                
                            });
                            $('#qty_req'+key).val("");
                            $('#total_req'+key).val("0.00");
                            $('#qty_req'+key).focus();
                        }
                        else {
                            $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                            $('#total_req'+key).val(currencyTotal(total));
                        }

                        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                        TotalBudgetSelected();
                        //MEMANGGIL FUNCTION TOTAL BALANCE QTY SELECTED
                        TotalBalanceQtySelected(key);
                    });

                    //VALIDASI PRICE
                    $('#price_req'+key).keyup(function() {
                        var price_val = $(this).val().replace(/,/g, '');
                        var budget_price_val = $("#budget_price"+key).val().replace(/,/g, '');
                        var qty_req = $("#qty_req"+key).val();
                        var total_payment = $("#total_payment"+key).html().replace(/,/g, '');
                        var total = price_val * qty_req;

                        if (price_val == "") {
                            $('#total_req'+key).val("");
                            $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                        }
                        else if(parseFloat(total) < parseFloat(total_payment)){
                            swal({
                                onOpen: function () {
                                    swal.disableConfirmButton();
                                    Swal.fire("Error !", "Total Request cannot less than Total Payment !", "error");
                                }                
                            });

                            $('#price_req'+key).val("");
                            $('#total_req'+key).val("0.00");
                            $('#price_req'+key).focus();
                        }
                        else if (parseFloat(price_val) > parseFloat(budget_price_val)) {
                            swal({
                                onOpen: function () {
                                    swal.disableConfirmButton();
                                    Swal.fire("Error !", "Price is over budget !", "error");
                                }
                            });
                            $('#price_req'+key).val("");
                            $('#total_req'+key).val("0.00");
                            $('#price_req'+key).focus();
                        }
                        else {
                            $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                            $('#total_req'+key).val(currencyTotal(total));

                        }

                        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                        TotalBudgetSelected();
                        //MEMANGGIL FUNCTION TOTAL BALANCE QTY SELECTED
                        TotalBalanceQtySelected(key);
                    });
                }

            });
        },
    });

</script>

<script>
    function addFromDetailtoCartJs() {

        $('#TableAdvance').find('tbody').empty();

        $(".AdvanceListCart").show();
        $(".Remark").show();
        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getWorkId = $("input[name='getWorkId[]']").map(function(){return $(this).val();}).get();
        var getWorkName = $("input[name='getWorkName[]']").map(function(){return $(this).val();}).get();
        var getProductId = $("input[name='getProductId[]']").map(function(){return $(this).val();}).get();
        var getProductName = $("input[name='getProductName[]']").map(function(){return $(this).val();}).get();
        var getUom = $("input[name='getUom[]']").map(function(){return $(this).val();}).get();
        var getCurrency = $("input[name='getCurrency[]']").map(function(){return $(this).val();}).get();
        var getRecordIDDetail = $("input[name='getRecordIDDetail[]']").map(function(){return $(this).val();}).get();
        var qty_req = $("input[name='qty_req[]']").map(function(){return $(this).val();}).get();
        var price_req = $("input[name='price_req[]']").map(function(){return $(this).val();}).get();

        var combinedBudgetSectionDetail_RefID = $("input[name='combinedBudgetSectionDetail_RefID[]']").map(function(){return $(this).val();}).get();
        var combinedBudget_RefID = $("input[name='combinedBudget_RefID']").val();

        var TotalBudgetList = 0;
        var TotalQty = 0;


        var trano = $("#trano").val();

        var total_req = $("input[name='total_req[]']").map(function(){return $(this).val();}).get();
        // var total_balance_qty = $("input[name='total_balance_qty[]']").map(function(){return $(this).val();}).get();
        var total_payment = $("input[name='total_payment[]']").map(function(){return $(this).val();}).get();
        
        $.each(total_req, function(index, data) {
            if(total_req[index] < total_payment){
                swal({
                    onOpen: function () {
                        swal.disableConfirmButton();
                        Swal.fire("Error !", "Total Payment is over budget than Total Request !", "error");
                    }                
                });
                $('#qty_req'+index).focus();
            }
            // else if(total_req[index] != "" && total_req[index] > "0.00" && total_req[index] != "NaN.00"){
            else {

                var putProductId = getProductId[index];
                var putProductName = getProductName[index];

                if(getProductName[index] == "Unspecified Product"){
                    var putProductId = $("#putProductId"+index).val();
                    var putProductName = $("#putProductName"+index).html();
                }
                TotalBudgetList += +total_req[index].replace(/,/g, '');
                TotalQty+= +qty_req[index].replace(/,/g, '');
                var html = '<tr>' +

                    '<input type="hidden" name="var_product_id[]" value="' + putProductId + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity[]" class="qty_req2'+ index +'" data-id="'+ index +'" value="' + currencyTotal(qty_req[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_price[]" class="price_req2'+ index +'" value="' + currencyTotal(price_req[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_total[]" class="total_req2'+ index +'" value="' + total_req[index] + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + getCurrency[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combinedBudgetSectionDetail_RefID[]" value="' + combinedBudgetSectionDetail_RefID[index] + '">' +
                    '<input type="hidden" name="combinedBudget_RefID" value="' + combinedBudget_RefID + '">' +
                    '<input type="hidden" name="var_recordIDDetail[]" value="' + getRecordIDDetail[index] + '">' +
                    
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + trano + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkId[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkName[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getUom[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="price_req2'+ index +'">' + currencyTotal(price_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="qty_req2'+ index +'">' + currencyTotal(qty_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="total_req2'+ index +'">' + currencyTotal(total_req[index]) + '</span>' + '</td>' +
                    '</tr>';
                $('table.TableAdvance tbody').append(html);  

                $("#GrandTotal").html(currencyTotal(TotalBudgetList));
                $("#TotalQty").html(currencyTotal(TotalQty));

                $("#submitArf").prop("disabled", false);
            }
        });
        
    }
</script>


<script type="text/javascript">
    function CancelAdvance() {
        $("#loading").show();
        $(".loader").show();
        window.location.href = '/AdvanceRequest?var=1';
    }
</script>

<script>
    $(function() {
        $("#formUpdateArf").on("submit", function(e) { //id of form 
            e.preventDefault();

            var valRequestName = $("#request_name").val();
            var valRemark = $("#putRemark").val();
            $("#request_name").css("border", "1px solid #ced4da");
            $("#putRemark").css("border", "1px solid #ced4da");

            if (valRequestName === "") {
                $("#request_name").focus();
                $("#request_name").attr('required', true);
                $("#request_name").css("border", "1px solid red");
            } else if (valRemark === "") {
                $("#putRemark").focus();
                $("#putRemark").attr('required', true);
                $("#putRemark").css("border", "1px solid red");
            } else {

                var varFileUpload_UniqueID = "Upload";
                window['JSFunc_GetActionPanel_CommitFromOutside_' + varFileUpload_UniqueID]();
                
                var action = $(this).attr("action"); //get submit action from form
                var method = $(this).attr("method"); // get submit method
                var form_data = new FormData($(this)[0]); // convert form into formdata 
                var form = $(this);


                const swalWithBootstrapButtons = Swal.mixin({
                    confirmButtonClass: 'btn btn-sm',
                    cancelButtonClass: 'btn btn-sm',
                    buttonsStyling: true,
                })

                swalWithBootstrapButtons.fire({

                    title: 'Are you sure?',
                    text: "Save this data?",
                    type: 'question',

                    showCancelButton: true,
                    confirmButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/save.png") }}" width="13" alt=""> <span style="color:black;"> Yes, save it </span>',
                    cancelButtonText: '<img src="{{ asset("AdminLTE-master/dist/img/cancel.png") }}" width="13" alt=""> <span style="color:black;"> No, cancel </span>',
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

                                    window.location.href = '/AdvanceRequest?var=1';
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
                            text: "Process Canceled !",
                            type: 'error',
                            confirmButtonColor: '#e9ecef',
                            confirmButtonText: '<span style="color:black;"> Oke </span>',

                        }).then((result) => {
                            if (result.value) {
                                $("#loading").show();
                                $(".loader").show();

                                window.location.href = '/AdvanceRequest?var=1';
                            }
                        })
                    }
                })
            }
        });

    });
</script>
