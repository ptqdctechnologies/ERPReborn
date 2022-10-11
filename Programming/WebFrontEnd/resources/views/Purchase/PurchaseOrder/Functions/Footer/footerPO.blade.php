<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailTransAvail").hide();
        $("#addAsfListCart").prop("disabled", true);
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
                        var html =
                            '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:5%;">' +
                            '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs AddToDetailPO" data-dismiss="modal" data-id1="' + trano + '" data-id2="' + value.quantity + '" data-id3="' + value.productUnitPriceCurrencyValue + '" data-id4="' + value.priceBaseCurrencyValue + '" data-id5="' + value.priceCurrencyISOCode + '" data-id6="' + value.quantityUnitName + '" data-id7="' + value.product_RefID + '" data-id8="' + value.productName + '" data-id9="' + value.remarks + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="18" alt="" title="Add"></button> ' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' +
                            '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.combinedBudgetSectionDetail_RefID + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.combinedBudgetSectionDetail_Name + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + 'N/A' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                            '</tr>';

                        $('table.tablePRDetail tbody').append(html);
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
