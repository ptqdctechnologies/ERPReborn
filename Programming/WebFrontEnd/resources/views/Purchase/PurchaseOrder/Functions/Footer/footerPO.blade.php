<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailTransAvail").hide();
        $("#addAsfListCart").prop("disabled", true);
        // $("#pr_number2").prop("disabled", true);
        $(".tableShowHidePRDetail").hide();
        $(".fileAttachment").hide();
        $("#amountCompanyCart").hide();
        $("#expenseCompanyCart").hide();
        // $("#supplier_code2").prop("disabled", true);
        // $("#deliver_code2").prop("disabled", true);
    });
</script>

<script>
    $('#pr_number2').one('click', function () {
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("PurchaseRequisition.PurchaseRequisitionListData") !!}',
            success: function(data) {
                console.log(data);
                var keys=0;
                var no = 1;
                t = $('#TableSearchPRinPO').DataTable();
                $.each(data.data, function(key, val) {
                    keys += 1;
                    t.row.add([
                        '<tbody><tr><input id="pr_RefID' + keys + '" value="' + val.sys_ID + '" type="hidden"><input id="supplier_id' + keys + '" value="' + val.requesterWorkerJobsPosition_RefID + '" type="hidden"><input id="supplier_code' + keys + '" value="' + val.requesterWorkerJobsPosition_RefID + '" type="hidden"><input id="supplier_name' + keys + '" value="' + val.requesterWorkerName + '" type="hidden"><td>' + no++ + '</td>',
                        '<td>' + val.documentNumber + '</td>',
                        '<td>' + val.combinedBudgetCode + '</td>',
                        '<td>' + val.combinedBudgetName + '</td>',
                        '<td>' + val.combinedBudgetSectionCode + '</td>',
                        '<td>' + val.combinedBudgetSectionName + '</td></tr></tbody>'                 
                    ]).draw();

                });
            }
        });
    });
</script>

<script>
    var keys = 0;

    $('#TableSearchPRinPO tbody').on('click', 'tr', function () {

        $("#mySearchPR").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var pr_RefID = $('#pr_RefID' + id).val();
        var supplier_id = $('#supplier_id' + id).val();
        var supplier_code = $('#supplier_code' + id).val();
        var supplier_name = $('#supplier_name' + id).val();
        var pr_number = row.find("td:nth-child(2)").text();
        $("#pr_number").val(pr_number);
        $(".tableShowHidePRDetail").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
          url: '{!! route("PurchaseOrder.StoreValidatePurchaseOrderPrNumber") !!}?supplier_id=' + supplier_id + '&supplier_code=' + supplier_code + '&supplier_name=' + supplier_name + '&pr_RefID=' + pr_RefID,
            success: function(data) {
                console.log('data', data);
                
                if(data.status == 200){
                 
                    $("#supplier_id").val(data.supplier_id);
                    $("#supplier_code").val(data.supplier_code);
                    $("#supplier_name").val(data.supplier_name);
                   
                    var no = 1; applied = 0; status = ""; statusDisplay = [];statusDisplay2 = []; statusForm = [];
                    $.each(data.data, function(key, value) {
                        keys += 1;
                        // console.log(value);
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
                            statusDisplay[keys] = "";
                            statusDisplay2[keys] = "none";
                            statusForm[keys] = "disabled";
                        }
                        else{
                            statusDisplay[keys] = "none";
                            statusDisplay2[keys] = "";
                            statusForm[keys] = "";
                        }

                        var html = '<tr>' +
                            '<input name="getWorkId[]" value="'+ value.combinedBudget_SubSectionLevel1_RefID +'" type="hidden">' +
                            '<input name="getWorkName[]" value="'+ value.combinedBudget_SubSectionLevel1Name +'" type="hidden">' +
                            '<input name="getProductId[]" value="'+ value.product_RefID +'" type="hidden">' +
                            '<input name="getProductName[]" value="'+ value.productName +'" type="hidden">' +
                            '<input name="getQty[]" id="budget_qty'+ keys +'" value="'+ value.quantity +'" type="hidden">' +
                            '<input name="getPrice[]" id="budget_price'+ keys +'" value="'+ value.productUnitPriceCurrencyValue +'" type="hidden">' +
                            '<input name="getUom[]" value="'+ value.quantityUnitName +'" type="hidden">' +
                            '<input name="getCurrency[]" value="'+ value.priceCurrencyISOCode +'" type="hidden">' +
                            '<input name="getTotal[]" value="'+ value.priceBaseCurrencyValue +'" type="hidden">' +
                            '<input name="getTrano[]" value="'+ pr_number +'" type="hidden">' +
                            '<input name="combinedBudget" value="'+ value.sys_ID +'" type="hidden">' +

                        
                            
                            '<td style="border:1px solid #e9ecef;">' + pr_number + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + 'N/A' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="total_balance_qty2'+keys+'">'+ value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") +'</span>'  + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                        
                            '<td class="sticky-col fifth-col-pr" style="border:1px solid #e9ecef;background-color:white;">' + '<input onkeyup="qty_req(' + keys + ', this)" id="qty_req'+ keys +'" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" onkeypress="return isNumberKey(this, event);" autocomplete="off" '+ statusForm[keys] +'>' + '</td>' +
                            '<td class="sticky-col forth-col-pr" style="border:1px solid #e9ecef;background-color:white;">' + '<input onkeyup="price_req(' + keys + ', this)" id="price_req'+ keys +'" style="border-radius:0;" name="price_req[]" class="form-control price_req" onkeypress="return isNumberKey(this, event);" autocomplete="off" '+ statusForm[keys] +'>' + '</td>' +
                            '<td class="sticky-col third-col-pr" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_req'+ keys +'" style="border-radius:0;background-color:white;" name="total_req[]" class="form-control total_req" autocomplete="off" disabled>' + '</td>' +
                            '<td class="sticky-col second-col-pr" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="remark_req'+ keys +'" style="border-radius:0;background-color:white;" name="remark_req[]" class="form-control" autocomplete="off" '+ statusForm[keys] +'>' + '</td>' +
                            '<td class="sticky-col first-col-pr" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_balance_qty'+ keys +'" style="border-radius:0;background-color:white;" name="total_balance_qty[]" class="form-control total_balance_qty" autocomplete="off" disabled value="' + currencyTotal(value.quantity) + '">' + '</td>' +
                            '</tr>';

                        $('table.TablePRDetail tbody').append(html);

                        

                        $('#ppn').on('click', function(e) {
                            
                            e.preventDefault();
                            var ppn = $(this).val();
                            var ppn_persen = $("#ppn_persen").val();
                            var totalBudget = $("#TotalBudgetSelected").html().replace(/,/g, '');
                            var totalPpn = $("#TotalPpn").html();
                            
                            
                            var var_ppn = 0; 

                            if(ppn == "Yes"){
                                if(ppn_persen == "1"){
                                    var_ppn = 0.01;    
                                }
                                else if(ppn_persen == "11"){
                                    var_ppn = 0.11;    
                                }
                            }
                            var totalBudgetPpn = parseFloat(+totalBudget + +(totalBudget*var_ppn));
                            
                            $('#TotalBudgetSelectedPpn').html(currencyTotal(totalBudgetPpn));
                            var totalPpn = parseFloat(totalBudget*var_ppn);
                            $('#TotalPpn').html(currencyTotal(totalPpn));


                            $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                        });


                        $('#ppn_persen').on('click', function(e) {
                            e.preventDefault();
                            var ppn_persen = $(this).val();
                            var ppn = $("#ppn").val();
                            var totalBudget = $("#TotalBudgetSelected").html().replace(/,/g, '');
                            var totalPpn = $("#TotalPpn").html();

                            var var_ppn = 0; 
                            if(ppn == "Yes"){
                                if(ppn_persen == "1"){
                                    var_ppn = 0.01;    
                                }
                                else if(ppn_persen == "11"){
                                    var_ppn = 0.11;
                                }
                            }

                            var totalBudgetPpn = parseFloat(+totalBudget + +(totalBudget*var_ppn));
                            $('#TotalBudgetSelectedPpn').html(currencyTotal(totalBudgetPpn));
                            var totalPpn = parseFloat(totalBudget*var_ppn);
                            $('#TotalPpn').html(currencyTotal(totalPpn));

                            $("input[name='price_req[]']").css("border", "1px solid #ced4da");

                        });

                    });
                }
                else if(data.status == 500){
                    Swal.fire("Cancelled","Please Use Same Supplier","error");
                }
                else{
                    Swal.fire("Cancelled","You Have Chosen This Number","error");
                }
            },
        });

    });
    // VALIDASI QTY
    function qty_req(key, value){
        var qty_val = (value.value).replace(/,/g, '');
        var budget_qty_val = $("#budget_qty"+key).val().replace(/,/g, '');

        var price_req = $("#price_req"+key).val().replace(/,/g, '');
        var total = price_req * qty_val;

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
            $('#total_req'+key).val(currencyTotal(total));
            
        }
        TotalBudgetSelected();
        TotalBalanceQtySelected(key);
        var ppn = $("#ppn").val();
        var ppn_persen = $("#ppn_persen").val();    
        var var_ppn = 0; 
        if(ppn == "Yes"){
            if(ppn_persen == "1"){
                var_ppn = 0.01;    
            }
            else if(ppn_persen == "11"){
                var_ppn = 0.11;    
            }
        }
        var totalBudget = $("#TotalBudgetSelected").html().replace(/,/g, '');
        var totalPpn = parseFloat(totalBudget*var_ppn);
        $('#TotalPpn').html(currencyTotal(totalPpn));
        var totalBudgetPpn = parseFloat(+totalBudget + +(totalBudget*var_ppn));
        $('#TotalBudgetSelectedPpn').html(currencyTotal(totalBudgetPpn));
        
    }
    function price_req(key, value){
        var price_val =(value.value).replace(/,/g, '');
        var budget_price_val = $("#budget_price"+key).val().replace(/,/g, '');
        var qty_req = $("#qty_req"+key).val();
        var total = price_val * qty_req;
        
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
            $('#total_req'+key).val(currencyTotal(total));
            $('#price_req'+key).val(currency(value.value));


        }
        
        TotalBudgetSelected();
        var ppn = $("#ppn").val();
        var ppn_persen = $("#ppn_persen").val();
        var var_ppn = 0; 
        if(ppn == "Yes"){
            if(ppn_persen == "1"){
                var_ppn = 0.01;    
            }
            else if(ppn_persen == "11"){
                var_ppn = 0.11;    
            }
        }
        var totalBudget = $("#TotalBudgetSelected").html().replace(/,/g, '');
        var totalPpn = parseFloat(totalBudget*var_ppn);
        $('#TotalPpn').html(currencyTotal(totalPpn));
        var totalBudgetPpn = parseFloat(+totalBudget + +(totalBudget*var_ppn));
        $('#TotalBudgetSelectedPpn').html(currencyTotal(totalBudgetPpn));
        
        
    }
</script>

<script>
    function TotalBudgetSelected(){

        var TotalBudgetSelected = 0;
        var total_req = $("input[name='total_req[]']").map(function(){return $(this).val();}).get();

        $.each(total_req, function(index, data) {
            if(total_req[index] != "" && total_req[index] > "0.00" && total_req[index] != "NaN.00"){
                TotalBudgetSelected += parseFloat(total_req[index].replace(/,/g, ''));
            }
        });

        $('#TotalBudgetSelected').html(currencyTotal(TotalBudgetSelected));
        
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

                // $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                $("#TotalRequestTableShoppingCart").html($('#TotalBudgetSelected').html());
                $("#TotalPpnTableShoppingCart").html($('#TotalPpn').html());
                $("#TotalReqPpnTableShoppingCart").html($('#TotalBudgetSelectedPpn').html());

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
<script>
    $(document).ready(function() {
        $("input[name='dp']").on("change", function() {
            let selectedValue = $(this).val();

           
            $("#dp_section").hide();

         
            if (selectedValue === "yes") {
                $("#dp_section").show();
            }
        });
    });
</script>