<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailTransAvail").hide();
        $("#addPOListCart").prop("disabled", true);
        $("#pr_number2").prop("disabled", true);
        $("#tableShowHidePRDetail").hide();

        $("#amountCompanyCart").hide();
        $("#expenseCompanyCart").hide();
    });
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addFromDetailtoCartJs() {
        // var VarPrNumber = $("#pr_number4").val();
        // $("#pr_number4").css("border", "1px solid #ced4da");
        var VarRemark = $("#putRemark").val();
        $("#putRemark").css("border", "1px solid #ced4da");
        // if (VarPrNumber === "") {
        //     $("#pr_number4").focus();
        //     $("#pr_number4").attr('required', true);
        //     $("#pr_number4").css("border", "1px solid red");
        // else 
        if (VarRemark === "") {
            $("#putRemark").focus();
            $("#putRemark").attr('required', true);
            $("#putRemark").css("border", "1px solid red");
        } else {
            // var balance = parseFloat($('#balance').val().replace(/,/g, ''));
            // var putProductId = $('#putProductId').val();
            // var putPrice = parseFloat($('#priceCek').val().replace(/,/g, ''));
            // var putQty = parseFloat($('#qtyCek').val().replace(/,/g, ''));
            // var totalPO = +putPrice + +putQty;
            $.ajax({
                type: "POST",
                url: '{!! route("PurchaseOrder.StoreValidatePurchaseOrder") !!}?putProductId=' + $("#product_id")+ '&putWorkId=' + $('#putWorkId').val(),
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
                        // var ppn = $("#ppn").val();
                        // var ppn_per =$("#ppn_per").val();
                        // 
                        // if (ppn = "yes" && ppn_per = "1") {
                        // var totalPOppn = (1/100*qtyCek*priceCek)+(qtyCek*priceCek);
                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;<button type="button" class="btn btn-xs RemovePurchaseOrder"  data-id1="' + product_id + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                            // '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="RemovePurchaseOrder(\'' + work_id + '\', \'' + product_id + '\', \'' + totalPO + '\',  this);" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                            '&nbsp;<button type="button" class="btn btn-xs" data-dismiss="modal" onclick="EditPurchaseOrder(this)" data-dismiss="modal" data-id1="' + pr_number + '" data-id2="' + product_id + '" data-id3="' + product_name + '" data-id4="' + qtyCek + '" data-id5="' + priceCek + '" data-id6="' + uom + '" data-id7="' + totalPO +'" data-id8="' + remark + '"data-id9="' + balance + '"  style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
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
                            // '<td style="border:1px solid #e9ecef;">' + balance + '</td>' +
                            '</tr>';

                        $('table.tableShoppingCart tbody').append(html);
                        
                        $("#expenseCompanyCart").show();
                        $("#statusEditPr").val("No");
                        $("#expenseCompanyCart").show();
                        $(".expenseCompanyCart").show();

                        $("#pr_number4").val("");
                        $("#product_id").val("");
                        $("#product_name").val("");
                        $("#qtyCek").val("");
                        $("#priceCek").val("");
                        $("#uom").val("");
                        $("#totalPO").val("");
                        $("#putRemark").val("");
                        $("#balance").val("");

                        $(".AddToDetaiPO2").prop("disabled", false);
                        $(".ActionButton").prop("disabled", false);
                        

                    } else {
                        Swal.fire("Cancelled", "Please use edit to update this item !", "error");
                    }
                },
            });
        
        }
    }
</script>
<script>

    function RemovePurchaseOrder(workId, ProductId, totalPO, tr) {
        var i = tr.parentNode.parentNode.rowIndex;
        document.getElementById("tableShoppingCart").deleteRow(i);
        
        $.ajax({
            type: "POST",
            url: '{!! route("PurchaseOrder.StoreValidatePurchaseOrder2") !!}?putProductId=' + ProductId+ '&putWorkId=' + $('#putWorkId').val(),
        });

        var totalPO = parseFloat(totalPO.replace(/,/g, ''));
        var TotalPurchaseOrder = parseFloat($("#TotalPurchaseRequisition").html().replace(/,/g, ''));
        $("#TotalPurchaseRequisition").html(parseFloat(TotalPurchaseRequisition - totalPO).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }

</script>

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
    function klikPrNumberinPO(id, docNumber) {
        $("#pr_number").val(docNumber);
        $("#projectcode3").val(id);
        var trano = $("#pr_number").val();
        $("#tableShowHidePRDetail").show();
        $("#projectcode2").prop("disabled", true);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '{!! route("PurchaseOrder.StoreValidatePurchaseOrderPrNumber") !!}?var_RefID=' + id ,
            success: function(data) {
                console.log(data);
                if (data.status == "200") {

                    $("#pr_number").val(docNumber);

                    $.each(data.DataPurchaseRequisitionList, function(key, value) {
                        console.log(value);
                        if(value.combinedBudget_Quantity == "0.00" && value.quantity == "0.00"){
                            var applied = 0;
                        }
                        else{
                            var applied = Math.round((parseFloat(value.quantity) - parseFloat(value.combinedBudget_Quantity) / parseFloat(value.quantity)) * 100);
                        }
                        var status = "";
                        if(applied >= 100){
                            var status = "disabled";
                        }
                        var html =
                            '<tr>' +
                            // '<td style="border:1px solid #e9ecef;width:5%;">' +
                            // '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs AddToDetailPO AddToDetailPO2" data-dismiss="modal" data-id1="' + trano + '" data-id2="' + value.quantity + '" data-id3="' + value.productUnitPriceCurrencyValue + '" data-id4="' + value.priceBaseCurrencyValue + '" data-id5="' + value.priceCurrencyISOCode + '" data-id6="' + value.quantityUnitName + '" data-id7="' + value.product_RefID + '" data-id8="' + value.productName + '" data-id9="' + value.remarks + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="18" alt="" title="Add"></button> ' +
                            // '</td>' +
                            '<td style="border:1px solid #e9ecef;">' +
                            '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.combinedBudgetSectionDetail_RefID + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.combinedBudgetSectionDetail_SubSectionLevel1Name+ '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.combinedBudget_Quantity + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            // '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +

                            '<td class="sticky-col third-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req'+ key +'" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +
                            '<td class="sticky-col second-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="price_req'+ key +'" style="border-radius:0;" name="price_req[]" class="form-control price_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +
                            '<td class="sticky-col first-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_req'+ key +'" style="border-radius:0;background-color:white;" name="total_req[]" class="form-control total_req" autocomplete="off" disabled>' + '</td>' +
                            '</tr>';

                        $('table.tablePRDetail tbody').append(html);
                        
                        //     '<input name="getTrano[]" value="'+ trano +'" type="hidden">' +
                        //     '<input name="getWorkId[]" value="'+ value.combinedBudgetSectionDetail_RefID +'" type="hidden">' +
                        //     '<input name="getWorkName[]" value="'+ value.combinedBudgetSubSectionLevel1Name +'" type="hidden">' +
                        //     '<input name="getProductId[]" value="'+ value.product_RefID +'" type="hidden">' +
                        //     '<input name="getProductName[]" value="'+ value.productName +'" type="hidden">' +
                        //     '<input name="getQty[]" id="budget_qty'+ key +'" value="'+ value.quantityRemain +'" type="hidden">' +
                        //     '<input name="getQty1[]" id="budget_qty'+ key +'" value="'+ value.quantityUnitName +'" type="hidden">' +
                        //     '<input name="getPrice[]" id="budget_price'+ key +'" value="'+ value.unitPriceBaseCurrencyValue +'" type="hidden">' +
                        //     '<input name="getUom[]" value="'+ value.quantityUnitName +'" type="hidden">' +
                        //     '<input name="getCurrency[]" value="'+ value.priceBaseCurrencyISOCode +'" type="hidden">' +
                        //     '<input name="combinedBudget" value="'+ value.sys_ID +'" type="hidden">' +

                        //     '<td style="border:1px solid #e9ecef;">' +
                        //         '&nbsp;&nbsp;&nbsp;<div class="progress '+ status +' progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                        //     '</td>' +

                        //     '<td style="border:1px solid #e9ecef;display:'+ statusDisplay[key] +'";">' + 
                        //         '<div class="input-group">' +
                        //             '<input id="putProductId'+ key +'" style="border-radius:0;width:130px;background-color:white;" name="putProductId" class="form-control" readonly>' +
                        //             '<div class="input-group-append">' +
                        //             '<span style="border-radius:0;" class="input-group-text form-control" data-id="10">' +
                        //                 '<a id="product_id2" data-toggle="modal" data-target="#myProduct" onclick="KeyFunction('+ key +')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                        //             '</span>' +
                        //             '</div>' +
                        //         '</div>' +
                        //     '</td>' +

                        //     '<td style="border:1px solid #e9ecef;display:'+ statusDisplay2[key] +'">' + '<span>' + val2.product_RefID + '</span>' + '</td>' +
                        
                        //     '<td style="border:1px solid #e9ecef;">' + '<span id="putProductName'+ key +'">' + val2.productName + '</span>' + '</td>' +
                        //     '<td style="border:1px solid #e9ecef;">' + '<span">' + val2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        //     '<td style="border:1px solid #e9ecef;">' + '<span">' + val2.quantityRemain.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        //     '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.unitPriceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +

                        //     '<td class="sticky-col third-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req'+ key +'" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +
                        //     '<td class="sticky-col second-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="price_req'+ key +'" style="border-radius:0;" name="price_req[]" class="form-control price_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +
                        //     '<td class="sticky-col first-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_req'+ key +'" style="border-radius:0;background-color:white;" name="total_req[]" class="form-control total_req" autocomplete="off" disabled>' + '</td>' +

                        // '</tr>';
                        // $('table.tableBudgetDetail tbody').append(html);
                    });

                    $("body").on("click", ".AddToDetailPO", function() {
                        
                        $("#tableShowHideArfDetail").find("input,button,textarea,select").attr("disabled", true);
                        $("#detailTransAvail").show();

                        var $this = $(this);
                        var price = $this.data("id3");
                        var qty = $this.data("id2");
                        $("#pr_number4").val($this.data("id1"));
                        $("#product_id").val($this.data("id7"));
                        $("#product_name").val($this.data("id8"));
                        $("#uom").val($this.data("id6"));
                        $("#qtyCek").val(qty);
                        $("#putQty").val(qty);
                        $("#priceCek").val(parseFloat(price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        $("#putPrice").val(price);
                        $("#totalPO").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        $("#balance").val($this.data("id4").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                        $("#productIdHide").val($this.data("id7"));
                        $("#nameMaterialHide").val($this.data("id8"));
                        $("#descriptionHide").val($this.data("id9"));

                        $(".AddToDetailPO2").prop("disabled", true);
                        $(".ActionButton").prop("disabled", true);


                    });
                } else {
                    Swal.fire("Cancelled", "You have chosen this number !", "error");
                }
            },
        });
    };
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

<script type="text/javascript">
    $(document).ready(function() {
        $(".CancelDetailPO").click(function() {

            $("#pr_number4").val("");
            $("#product_id").val("");
            $("#product_name").val("");
            $("#uom").val("");
            $("#qtyCek").val("");
            $("#putQty").val("");
            $("#priceCek").val("");
            $("#putPrice").val("");
            $("#totalPO").val("");
            $("#balance").val("");

            $("#productIdHide").val("");
            $("#nameMaterialHide").val("");
            $("#descriptionHide").val("");

            $(".AddToDetailPO2").prop("disabled", false);
            
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
    function EditPurchaseOrder(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("tableShoppingCart").deleteRow(i);
        var $this = $(t);
        
        $.ajax({
            type: "POST",
            url: '{!! route("PurchaseOrder.StoreValidatePurchaseOrder2") !!}?putProductId=' + $("#product_id")+ '&putWorkId=' + $('#putWorkId').val(),
        });
        $("#pr_number4").val($this.data("id1"));
        $("#product_id").val($this.data("id2"));
        $("#product_name").val($this.data("id3"));
        $("#qtyCek").val($this.data("id4"));
        $("#priceCek").val($this.data("id5"));
        $("#uom").val($this.data("id6"));
        $("#totalPO").val($this.data("id7"));
        $("#putRemark").val($this.data("id8"));
        $("#balance").val($this.data("id9"));
        $("#statusEditPr").val("Yes");
        $("#statusEditAsf").val("Yes");

        $(".AddToDetailPO2").prop("disabled", true);
        $(".ActionButton").prop("disabled", true);

        var total_expense = parseFloat($("#total_expense").val().replace(/,/g, ''));
        var TotalExpense = parseFloat($("#TotalExpense").html().replace(/,/g, ''));
        $("#TotalExpense").html(parseFloat(TotalExpense - total_expense).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var total_amount = parseFloat($("#total_amount").val().replace(/,/g, ''));
        var TotalAmount = parseFloat($("#TotalAmount").html().replace(/,/g, ''));
        $("#TotalAmount").html(parseFloat(TotalAmount - total_amount).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

    }
</script>
