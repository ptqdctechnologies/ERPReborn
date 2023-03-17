<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailTransAvail").hide();
        $("#addAsfListCart").prop("disabled", true);
        $("#pr_number2").prop("disabled", true);
        $(".tableShowHidePRDetail").hide();
        $(".fileAttachment").hide();
        $("#amountCompanyCart").hide();
        $("#expenseCompanyCart").hide();
    });
</script>


<!-- <script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addFromDetailtoCartJs() {

        var VarRemark = $("#putRemark").val();
        $("#putRemark").css("border", "1px solid #ced4da");

        if (VarRemark === "") {
            $("#putRemark").focus();
            $("#putRemark").attr('required', true);
            $("#putRemark").css("border", "1px solid red");
        } else {
            
            
            $.ajax({
                type: "POST",
                url: '{!! route("PurchaseOrder.StoreValidatePurchaseOrder") !!}?putProductId=' + $("#product_id").val(),
                success: function(data) {
                    console.log(data);
                    if (data == "200") {

                        var pr_number = $('#pr_number4').val();
                        var product_id = $('#product_id').val();
                        var product_name = $('#product_name').val();
                        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
                        var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
                        var putPrice = $('#putPrice').val();
                        var totalPO = $("#totalPO").val().replace(/^\s+|\s+$/g, '');
                        var uom = $('#uom').val();
                        var remark = $('#putRemark').val();
                        var balance = $('#balance').val();
                        // if (total_amount != "") {
                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;<button type="button" class="btn btn-xs RemovePurchaseOrder"  data-id1="' + product_id + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                            '&nbsp;<button type="button" class="btn btn-xs EditPurchaseOrder" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + product_id + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '<input type="hidden" name="var_pr_number[]" value="' + pr_number + '">' +
                            '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                            '<input type="hidden" name="var_product_name[]" value="' + product_name + '">' +
                            '<input type="hidden" name="var_uom[]" value="' + uom+ '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                            '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                            '<input type="hidden" name="var_totalPO[]" value="' + (qtyCek*priceCek) + '">' +
                            '<input type="hidden" name="var_remark[]" id="var_description[]" value="' + remark + '">' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + pr_number + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + product_name + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + uom + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + qtyCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + priceCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + totalPO.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + remark + '</td>' +
                            '</tr>';

                        $('table.tableExpenseClaim tbody').append(html);
                        
                        $("#expenseCompanyCart").show();
                        
                        $("body").on("click", ".RemovePurchaseOrder", function() {
                            $(this).closest("tr").remove();
                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("PurchaseRequisition.StoreValidatePurchaseRequisition2") !!}?putProductId=' + ProductId,
                            });
                        });
                        $("body").on("click", ".EditPurchaseOrder", function() {
                            var $this = $(this);

                            $.ajax({
                                type: "POST",
                                url: '{!! route("PurchaseRequisition.StoreValidatePurchaseRequisition2") !!}?putProductId=' + $this.data("id1"),
                            });
                            $("#pr_number4").val($this.data("id1"));
                            $("#product_id").val($this.data("id7"));
                            $("#product_name").val($this.data("id8"));
                            $("#uom").val($this.data("id6"));
                            $("#qtyCek").val(qty);
                            $("#putQty").val(qty);
                            $("#priceCek").val(parseFloat(price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                            $("#putPrice").val(price);
                            $("#totalPO").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                            $("#statusEditPr").val("Yes");

                            $(this).closest("tr").remove();

                            if ($this.data("id10") == "Yes") {
                                $("#product_id2").prop("disabled", false);
                            } else {
                                $("#product_id2").prop("disabled", true);
                            }
                        });
                        $("#pr_number4").val("");
                        $("#product_id").val("");
                        $("#product_name").val("");
                        $("#qtyCek").val("");
                        $("#priceCek").val("");
                        $("#uom").val("");
                        $("#totalPO").val("");
                        $("#putRemark").val("");
                        $("#balance").val("");
                        

                    } else {
                        Swal.fire("Cancelled", "Please use edit to update this item !", "error");
                    }
                },
            });
        
        }
    }
</script> -->

<script>
    function klikProject(code, name) {
        // alert ('test');
        $("#projectcode").val(code);
        $("#projectname").val(name);
        $("#pr_number2").prop("disabled", false);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getPurchaseRequisitionByBudgetID") !!}?projectcode=' + $('#projectcode').val(),
            success: function(data) {

                var no = 1;
                t = $('#TablesearchPRinPO').DataTable();
                $.each(data.DataPurchaseRequisition, function(key, val) {
                    t.row.add([
                        '<tbody><tr><td>' + no++ + '</td>',
                        '<td><span data-dismiss="modal" onclick="klikPrNumberinPO(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\');">' + val.documentNumber + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikPrNumberinPO(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\');">' + val.combinedBudget_RefID + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikPrNumberinPO(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\');">' + val.combinedBudgetName + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikPrNumberinPO(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\');">' + val.combinedBudgetSection_RefID + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikPrNumberinPO(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\');">' + val.combinedBudgetSectionName + '</span></td>',
                    ]).draw();

                });
            }
        });
    }
</script>

<script>
    function klikPrNumberinPO(id, docNum) {
        var var_recordID = id;
        var trano = docNum;
        $("#pr_number").val(docNum);
        $("#projectcode3").val(id);
        $(".tableShowHidePRDetail").show();
        $(".fileAttachment").show();
        $("#projectcode2").prop("disabled", true);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "GET",
            url: '{!! route("PurchaseOrder.PurchaseOrderByPrID") !!}?var_recordID=' + var_recordID,
            success: function(data) {

                var no = 1; applied = 0; TotalBudgetSelected = 0;status = ""; statusDisplay = [];statusDisplay2 = []; statusForm = [];
                $.each(data.DataPurchaseList, function(key, value) {
                    console.log(value);
                    // if(value.quantityAbsorption == "0.00" && value.quantity == "0.00"){
                    if(value.quantity == "0.00"){
                        var applied = 0;
                    }
                    else{
                        // var applied = Math.round(parseFloat(value.quantityAbsorption) / parseFloat(value.quantity) * 100);
                        // var applied = Math.round(parseFloat(value.quantity) * 100);
                        var applied = Math.round(parseFloat((value.quantity)-(value.quantity)) * 100/100);
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

                    var html = '<tr>' +
                        '<input name="getWorkId[]" value="'+ value.combinedBudget_SubSectionLevel1_RefID +'" type="hidden">' +
                        '<input name="getWorkName[]" value="'+ value.combinedBudget_SubSectionLevel1Name +'" type="hidden">' +
                        '<input name="getProductId[]" value="'+ value.product_RefID +'" type="hidden">' +
                        '<input name="getProductName[]" value="'+ value.productName +'" type="hidden">' +
                        '<input name="getQty[]" id="budget_qty'+ key +'" value="'+ value.quantity +'" type="hidden">' +
                        '<input name="getPrice[]" id="budget_price'+ key +'" value="'+ value.productUnitPriceCurrencyValue +'" type="hidden">' +
                        '<input name="getUom[]" value="'+ value.quantityUnitName +'" type="hidden">' +
                        '<input name="getCurrency[]" value="'+ value.priceCurrencyISOCode +'" type="hidden">' +
                        '<input name="getTotal[]" value="'+ value.priceBaseCurrencyValue +'" type="hidden">' +
                        '<input name="getTrano[]" value="'+ trano +'" type="hidden">' +
                        '<input name="combinedBudget" value="'+ value.sys_ID +'" type="hidden">' +

                        '<td style="border:1px solid #e9ecef;">' +
                        '&nbsp;&nbsp;&nbsp;<div class="progress '+ status +' progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                        '</td>' +
                        
                        '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + 'N/A' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +

                        '<td class="sticky-col six-col" style="border:1px solid #e9ecef;background-color:white;">' + '<select id="ppn' + key + '" class="form-control " style=" border-radius:0;" name="ppn[]"><option value="No"> No </option><option value="Yes"> Yes </option></select>' + '</td>' +
                        '<td class="sticky-col five-col" style="border:1px solid #e9ecef;background-color:white;">' + '<select id="ppn_persen' + key + '" class="form-control " style="border-radius:0;" name="ppn_persen[]"><option selected="selected">Select Tax</option><option value="1">1%</option><option value="11">11%</option></select>' + '</td>' +
                        '<td class="sticky-col forth-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req'+ key +'" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +   
                        '<td class="sticky-col third-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="price_req'+ key +'" style="border-radius:0;" name="price_req[]" class="form-control price_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +
                        '<td class="sticky-col second-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_req'+ key +'" style="border-radius:0;background-color:white;" name="total_req[]" class="form-control total_req" autocomplete="off" disabled>' + '</td>' +
                        '<td class="sticky-col first-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="remark_req'+ key +'" style="border-radius:0;background-color:white;" name="remark_req[]" class="form-control" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +

                        '</tr>';

                    $('table.TablePRDetail tbody').append(html);

                    //VALIDASI QTY
                    $('#qty_req'+key).keyup(function() {
                        $(this).val(currency($(this).val()));
                        var qty_val = $(this).val().replace(/,/g, '');
                        var budget_qty_val = $("#budget_qty"+key).val();

                        if (qty_val == "") {
                            $('#total_req'+key).val("");
                            $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                        }
                        else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {

                            swal({
                                onOpen: function () {
                                    swal.disableConfirmButton();
                                    Swal.fire("Error !", "Qty is over budget !", "error");
                                }
                            });

                            $('#qty_req'+key).val("");
                            $('#qty_req'+key).css("border", "1px solid red");
                            $('#qty_req'+key).focus();
                        }
                        else {
                            $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                        }
                    });

                    
                    $('#price_req'+key).keyup(function() {
                        $(this).val(currency($(this).val()));
                        var price_val = $(this).val().replace(/,/g, '');
                        var budget_price_val = $("#budget_price"+key).val().replace(/,/g, '');
                        var qty_req = $("#qty_req"+key).val();
                        var total = price_val * qty_req;
                        var ppn = $("#ppn"+key).val();
                        var ppn_persen = $("#ppn_persen"+key).val();
                        var var_ppn = 0; 
                        if(ppn == "Yes"){
                            if(ppn_persen == "1"){
                                var_ppn = 0.01;    
                            }
                            else if(ppn_persen == "11"){
                                var_ppn = 0.11;    
                            }
                        }
                        if (price_val == "") {
                            $('#total_req'+key).val("");
                            $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                        }
                        else if (parseFloat(price_val) > parseFloat(budget_price_val)) {

                            swal({
                                onOpen: function () {
                                    swal.disableConfirmButton();
                                    Swal.fire("Error !", "Price is over budget !", "error");
                                }
                            });

                            $('#price_req'+key).val("");
                            $('#total_req'+key).val("");
                            $('#price_req'+key).css("border", "1px solid red");
                            $('#price_req'+key).focus();
                        }
                        else {
                            $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                            $('#total_req'+key).val(currencyTotal(total+(total*var_ppn)));

                        }
                    });
                    $('#ppn_persen'+key).on('click', function(e) {
                        e.preventDefault();
                        var ppn_persen = $(this).val().replace(/,/g, '');
                        var price_req = $("#price_req"+key).val().replace(/,/g, '');
                        var qty_req = $("#qty_req"+key).val();
                        var total = price_req * qty_req;
                        var ppn = $("#ppn"+key).val();
                        var var_ppn = 0; 
                        if(ppn == "Yes"){
                            if(ppn_persen == "1"){
                                var_ppn = 0.01;    
                            }
                            else if(ppn_persen == "11"){
                                var_ppn = 0.11;    
                            }
                        }
                        $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                        $('#total_req'+key).val(currencyTotal(total+(total*var_ppn)));
                    });

                    $('#ppn'+key).on('click', function(e) {
                        e.preventDefault();
                        var ppn = $(this).val().replace(/,/g, '');
                        var price_req = $("#price_req"+key).val().replace(/,/g, '');
                        var qty_req = $("#qty_req"+key).val();
                        var total = price_req * qty_req;
                        var ppn_persen = $("#ppn_persen"+key).val();
                        var var_ppn = 0; 
                        if(ppn == "Yes"){
                            if(ppn_persen == "1"){
                                var_ppn = 0.01;    
                            }
                            else if(ppn_persen == "11"){
                                var_ppn = 0.11;    
                            }
                        }
                        $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                        $('#total_req'+key).val(currencyTotal(total+(total*var_ppn)));
                    });

                });
            },
        });

    }
</script>

<script>
    function addFromDetailtoCartJs() {

        $('#tableShoppingCart').find('tbody').empty();

        $(".expenseCompanyCart").show();
        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getTrano = $("input[name='getTrano[]']").map(function(){return $(this).val();}).get();
        var getWorkId = $("input[name='getWorkId[]']").map(function(){return $(this).val();}).get();
        var getWorkName = $("input[name='getWorkName[]']").map(function(){return $(this).val();}).get();
        var getProductId = $("input[name='getProductId[]']").map(function(){return $(this).val();}).get();
        var getProductName = $("input[name='getProductName[]']").map(function(){return $(this).val();}).get();
        var getUom = $("input[name='getUom[]']").map(function(){return $(this).val();}).get();
        var getCurrency = $("input[name='getCurrency[]']").map(function(){return $(this).val();}).get();
        var getRemark = $("input[name='remark_req[]']").map(function(){return $(this).val();}).get();
        var qty_req = $("input[name='qty_req[]']").map(function(){return $(this).val();}).get();
        var price_req = $("input[name='price_req[]']").map(function(){return $(this).val();}).get();

        var combinedBudget = $("input[name='combinedBudget']").val();

        var TotalBudgetSelected = 0;
        var TotalQty = 0;
        var TotalPrice = 0;

        var total_req = $("input[name='total_req[]']").map(function(){return $(this).val();}).get();
        $.each(total_req, function(index, data) {
            if(total_req[index] != "" && total_req[index] > "0.00" && total_req[index] != "NaN.00"){

                var putProductId = getProductId[index];
                var putProductName = getProductName[index];

                if(getProductName[index] == "Unspecified Product"){
                    var putProductId = $("#putProductId"+index).val();
                    var putProductName = $("#putProductName"+index).html();
                }
                
                TotalBudgetSelected += +total_req[index].replace(/,/g, '');
                TotalQty+= +qty_req[index].replace(/,/g, '');
                TotalPrice+= +price_req[index].replace(/,/g, '');
                var html = '<tr>' +
                    '<input type="hidden" name="var_product_id[]" value="' + putProductId + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity[]" class="qty_req2'+ index +'" data-id="'+ index +'" value="' + currencyTotal(qty_req[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_price[]" class="price_req2'+ index +'" value="' + currencyTotal(price_req[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_total[]" class="total_req2'+ index +'" value="' + total_req[index] + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + getCurrency[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +
                    '<input type="hidden" name="var_remark[]" value="' + getRemark[index] + '">' +

                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getTrano[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getUom[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getRemark[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="price_req2'+ index +'">' + currencyTotal(price_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="qty_req2'+ index +'">' + currencyTotal(qty_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="total_req2'+ index +'">' + currencyTotal(total_req[index]) + '</span>' + '</td>' +
                    
                    '</tr>';
                $('table.tableShoppingCart tbody').append(html);  

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                $("#GrandTotal").html(currencyTotal(TotalBudgetSelected));
                $("#TotalQty").html(currencyTotal(TotalQty));
                $("#TotalPrice").html(currencyTotal(TotalPrice));

                $("#submitPR").prop("disabled", false);
                $(".ActionButton").prop("disabled", false);
                $(".ActionButtonAll").prop("disabled", false);        
            }
        });
        
    }
</script>

<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {
            var qtyReq = $(this).val();
            if (qtyReq == 0 || qtyReq == '') {
                qtyReq = 0;
            }
            var putQty = $('#putQty').val();
            var priceCek = $('#priceCek').val();
            var total = putQty * priceCek;
            var total2 = qtyReq * priceCek;
            if (parseFloat(qtyReq) == '') {
                $("#addFromDetailtoCartJs").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);

            } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Qty Request is Over", "error");
                $("#qtyCek").val(0);
                $('#totalArfDetails').val(0);
                $("#addFromDetailtoCartJs").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
            } else if (parseFloat(total2) > parseFloat(total)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $('#totalArfDetails').val(0);
                $("#addFromDetailtoCartJs").prop("disabled", true);
            } else {
                var totalReq = parseFloat(total2);
                $('#totalPO').val(parseFloat(totalReq).toFixed(2));
                $("#addFromDetailtoCartJs").prop("disabled", false);
            }
        });
    });
</script>

<script>
    $('document').ready(function() {
        $('.ChangePrice').keyup(function() {
            var priceReq = parseFloat($(this).val().replace(/,/g, ''));
            var qtyCek = $('#qtyCek').val();
            var putPrice = parseFloat($('#putPrice').val().replace(/,/g, ''));
            var total = qtyCek * priceReq;
            var total2 = qtyCek * putPrice;
            var totalBalance = $("#totalBalance").val();

            if (priceReq == '') {
                $('#totalPO').val(0);
                $("#priceCek").css("border", "1px solid red");
            }else if (parseFloat(priceReq) > parseFloat(putPrice)) {
                Swal.fire("Error !", "Your Qty Request is Over", "error");
                $("#priceCek").val(0);
                $('#totalArfDetails').val(0);
                $("#addFromDetailtoCartJs").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
            } else if (parseFloat(total) > parseFloat(total2)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#priceCek").val(0);
                $('#totalPO').val(0);
                $("#priceCek").css("border", "1px solid red");
            } else {
                var totalReq = total;
                $('#totalPO').val(parseFloat(totalReq).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#priceCek").css("border", "1px solid #ced4da");
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
        });
    });

    $(function() {
        $(".idAmount").on('click', function(e) {
            $("#expense").hide();
            $("#amountCompanyCart").show();
            $("#amountdueto").show();
        });
    });
</script>
