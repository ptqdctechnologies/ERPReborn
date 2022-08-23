<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        // $("#detailPurchaseRequisitionList").hide();
        // $("#detailTransAvail").hide();
        $("#projectcode2").prop("disabled", true);
        $("#sitecode2").prop("disabled", true);
        $("#addFromDetailtoCart").prop("disabled", true);
        // $("#showContentBOQ3").hide();
        // $("#tableShowHideBOQ3").hide();

        $("#iconProductId2").hide();
        $("#iconQty2").hide();
        $("#iconUnitPrice2").hide();
        $("#iconRemark2").hide();
        $("#product_id2").prop("disabled", true);

        // $("#submitPR").prop("disabled", true);
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".detailTransaction").click(function() {
            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $(".CancelDetailPurchaseRequisition").click(function() {
            var product_id = $("#putProductId").val();
            var putProductName = $("#putProductName").val();
            var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
            var putUom = $("#putUom").val();
            var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
            var putCurrency = $("#putCurrency").val();
            var totalProcReqDetails = $("#totalProcReqDetails").val().replace(/^\s+|\s+$/g, '');
            var putRemark = $("#putRemark").val();
            var totalBalance = $("#totalBalance").val();
            var putPrice = $('#putPrice').val();
            var combinedBudget = $("#combinedBudget").val();
            var recordIDDetail = $("#recordIDDetail").val();
            var statusEditProcReqRevision = $("#statusEditProcReqRevision").val();
            if (statusEditProcReqRevision == "Yes") {

                var qtyCek = $('#putQty').val().replace(/^\s+|\s+$/g, '');
                var priceCek = $("#putPrice").val().replace(/^\s+|\s+$/g, '');
                var totalProcReqDetails = parseFloat(qtyCek * priceCek).toFixed(2);
                var putRemark = $("#putRemark2").val();

                var html = '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:5%;">' +
                    '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs EditPurchaseRequisition" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + totalProcReqDetails + '" data-id8="' + putRemark + '" data-id9="' + totalBalance + '"  style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="18" alt="" title="Edit"></button> ' +
                    '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                    '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                    '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                    '<input type="hidden" name="var_remark[]" value="' + putRemark + '">' +
                    '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +
                    '<input type="hidden" name="var_recordIDDetail[]" value="' + recordIDDetail + '">' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + qtyCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putUom + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + priceCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + totalProcReqDetails.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putCurrency + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putRemark + '</td>' +
                    '</tr>';
                $('table.TablePurchaseRequisition tbody').append(html);
                $("#statusEditProcReqRevision").val("No");
            }
            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);
            $("#putProductId").css("border", "1px solid #ced4da");

            $("#putProductId").val("");
            $("#putProductName").val("");
            $("#qtyCek").val("");
            $("#putUom").val("");
            $("#priceCek").val("");
            $("#putCurrency").val("");
            $("#totalBalance").val("");
            $("#totalProcReqDetails").val("");
            $("#putRemark").val("");
        });
    });
</script>
<script type="text/javascript">
    function addFromDetailtoCartJs() {

        var valProductId = $("#putProductId").val();
        var valQty = $("#qtyCek").val();
        var valPrice = $("#priceCek").val();
        var valRemark = $("#putRemark").val();
        var totalPo = $("#totalPo").val();
        var totalProcReqDetails = $("#totalProcReqDetails").val();
        $("#putProductId").css("border", "1px solid #ced4da");
        $("#qtyCek").css("border", "1px solid #ced4da");
        $("#priceCek").css("border", "1px solid #ced4da");
        $("#putRemark").css("border", "1px solid #ced4da");
        
        
        if (valProductId === "") {
            $("#putProductId").focus();
            $("#putProductId").attr('required', true);
            $("#putProductId").css("border", "1px solid red");
        } else if (valQty === "") {
            $("#qtyCek").focus();
            $("#qtyCek").attr('required', true);
            $("#qtyCek").css("border", "1px solid red");
        } else if (valPrice === "") {
            $("#priceCek").focus();
            $("#priceCek").attr('required', true);
            $("#priceCek").css("border", "1px solid red");
        } else if (valRemark === "") {
            $("#putRemark").focus();
            $("#putRemark").attr('required', true);
            $("#putRemark").css("border", "1px solid red");
        } else if (totalPo > totalProcReqDetails) {
            Swal.fire("Error !", "Your request must bigger than total PO !", "error");
        } else {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: '{!! route("PurchaseRequisition.StoreValidatePurchaseRequisition") !!}?putProductId=' + $('#putProductId').val(),
                success: function(data) {

                    if (data == "200") {

                        $("#product_id2").prop("disabled", true);

                        var product_id = $("#putProductId").val();
                        var putProductName = $("#putProductName").val();
                        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
                        var putUom = $("#putUom").val();
                        var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
                        var putCurrency = $("#putCurrency").val();
                        var totalProcReqDetails = $("#totalProcReqDetails").val().replace(/^\s+|\s+$/g, '');
                        var putRemark = $("#putRemark").val();
                        var totalBalance = $("#totalBalance").val();
                        var combinedBudget = $("#combinedBudget").val();
                        var recordIDDetail = $("#recordIDDetail").val();
                        var putPrice = $('#putPrice').val();
                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:5%;">' +
                            '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs EditPurchaseRequisition" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + totalProcReqDetails + '" data-id8="' + putRemark + '" data-id9="' + totalBalance + '"  style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="18" alt="" title="Edit"></button> ' +
                            '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                            '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                            '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                            '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                            '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                            '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                            '<input type="hidden" name="var_remark[]" value="' + putRemark + '">' +
                            '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +
                            '<input type="hidden" name="var_recordIDDetail[]" value="' + recordIDDetail + '">' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + qtyCek + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putUom + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + priceCek + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + totalProcReqDetails + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putCurrency + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putRemark + '</td>' +
                            '</tr>';
                        $('table.TablePurchaseRequisition tbody').append(html);
                        $("#statusEditProcReqRevision").val("No");

                        $("body").on("click", ".RemovePurchaseRequisition", function() {
                            $(this).closest("tr").remove();
                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("PurchaseRequisition.StoreValidatePurchaseRequisition2") !!}?putProductId=' + ProductId,
                            });
                        });
                        $("body").on("click", ".EditPurchaseRequisition", function() {
                            var $this = $(this);
                            var id1 = $this.data("id1");
                            var id2 = $this.data("id2");
                            var id3 = $this.data("id3");
                            var id4 = $this.data("id4");
                            var id5 = $this.data("id5");
                            var id6 = $this.data("id6");
                            var id7 = $this.data("id7");
                            var id8 = $this.data("id8");
                            var id9 = $this.data("id9");
                            var id10 = $this.data("id10");

                            $.ajax({
                                type: "POST",
                                url: '{!! route("PurchaseRequisition.StoreValidatePurchaseRequisition2") !!}?putProductId=' + id1,
                            });

                            $("#putProductId").val(id1);
                            $("#putProductName").val(id2);
                            $('#qtyCek').val(id3);
                            $("#putUom").val(id4);
                            $("#priceCek").val(id5);
                            $("#putCurrency").val(id6);
                            $("#totalProcReqDetails").val(id7);
                            $("#putRemark").val(id8);
                            $("#totalBalance").val(id9);
                            $("#statusEditProcReqRevision").val("Yes");

                            $(this).closest("tr").remove();

                            if (id10 == "Yes") {
                                $("#product_id2").prop("disabled", false);
                            } else {
                                $("#product_id2").prop("disabled", true);
                            }
                        });

                        $("#putProductId").val("");
                        $("#putProductName").val("");
                        $("#putUom").val("");
                        $("#qtyCek").val("");
                        $("#priceCek").val("");
                        $("#putCurrency").val("");
                        $("#putRemark").val("");
                        $("#totalProcReqDetails").val("");
                        $("#totalBalance").val("");

                        $("#iconProductId").hide();
                        $("#iconQty").hide();
                        $("#iconRemark").hide();
                        $("#iconProductId2").hide();
                        $("#iconQty2").hide();
                        $("#iconRemark2").hide();
                        $("#submitPR").prop("disabled", false);

                        $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
                        $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);
                        $("#detailPurchaseRequisitionList").show();

                        $("#qtyCek").attr('required', false);
                        $("#putProductId").attr('required', false);
                        $("#priceCek").attr('required', false);
                    } else {
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });
        }
    }
</script>

<script type="text/javascript">
    //GET PR LIST 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var ProcReqRefID = $("#var_recordID").val();

    $.ajax({
        type: "POST",
        url: '{!! route("PurchaseRequisition.ProcReqListCartRevision") !!}?ProcReqRefID=' + ProcReqRefID,
        success: function(data) {

            $.each(data, function(key, value) {
                $("#product_id2").prop("disabled", true);
                var statusProduct = $("#statusProduct").val();
                var html = '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:5%;">' +
                    '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs EditProcReqListCart" data-dismiss="modal" data-id1="' + value.product_RefID + '" data-id2="' + value.productName + '" data-id3="' + value.quantity + '" data-id4="' + value.quantityUnitName + '" data-id5="' + value.productUnitPriceCurrencyValue + '" data-id6="' + value.priceCurrencyISOCode + '" data-id7="' + value.remarks + '" data-id8="' + value.priceBaseCurrencyValue + '" data-id9="' + statusProduct + '" data-id10="' + value.combinedBudgetSectionDetail_RefID + '" data-id11="' + value.sys_ID + '" data-id12="' + value.combinedBudget_Quantity + '" data-id13="' + value.combinedBudget_UnitPriceBaseCurrencyValue + '" data-id14="' + value.combinedBudget_PriceBaseCurrencyValue + '" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="18" alt="" title="Edit"></button> ' +
                    '<input type="hidden" name="var_product_id[]" value="' + value.product_RefID + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + value.productName + '">' +
                    '<input type="hidden" name="var_quantity[]" value="' + value.quantity + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + value.quantityUnitName + '">' +
                    '<input type="hidden" name="var_price[]" value="' + value.productUnitPriceCurrencyValue + '">' +
                    '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + value.priceCurrencyISOCode + '">' +
                    '<input type="hidden" name="var_remark[]" value="' + value.remarks + '">' +
                    '<input type="hidden" name="var_combinedBudget[]" value="' + value.combinedBudgetSectionDetail_RefID + '">' +
                    '<input type="hidden" name="var_recordIDDetail[]" value="' + value.sys_ID + '">' +
                    '<input type="hidden" name="var_statusProduct[]" value="' + statusProduct + '">' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.remarks + '</td>' +
                    '</tr>';

                $('table.TablePurchaseRequisition tbody').append(html);
            });

            $("body").on("click", ".EditProcReqListCart", function() {
                var $this = $(this);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: '{!! route("PurchaseRequisition.StoreValidatePurchaseRequisition2") !!}?putProductId=' + $this.data("id1"),
                });

                $("#putProductId").val($this.data("id1"));
                $("#putProductName").val($this.data("id2"));
                $('#qtyCek').val($this.data("id3"));
                $('#putQty').val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#putUom").val($this.data("id4"));
                $("#priceCek").val($this.data("id5"));
                $("#putPrice").val($this.data("id5"));
                $("#putCurrency").val($this.data("id6"));
                $("#putRemark").val($this.data("id7"));
                $("#putRemark2").val($this.data("id7"));
                $("#totalProcReqDetails").val($this.data("id8").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#totalBalance").val($this.data("id14").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#totalPayment").val("0");
                $("#combinedBudget").val($this.data("id10"));
                $("#recordIDDetail").val($this.data("id11"));
                $("#ValidateQuantity").val($this.data("id12"));
                $("#ValidatePrice").val($this.data("id13"));
                $("#statusEditProcReqRevision").val("Yes");


                $(this).closest("tr").remove();

                if ($this.data("id9") == "Yes") {
                    $("#product_id2").prop("disabled", false);
                } else {
                    $("#product_id2").prop("disabled", true);
                }
            });

            $("#putProductId").val("");
            $("#putProductName").val("");
            $("#qtyCek").val("");
            $("#putUom").val("");
            $("#priceCek").val("");
            $("#putCurrency").val("");
            $("#putRemark").val("");
            $("#totalProcReqDetails").val("");
            $("#totalRequester").val("");
            $("#totalQtyRequest").val("");
            $("#totalBalance").val("");

            $("#iconProductId").hide();
            $("#iconQty").hide();
            $("#iconRemark").hide();
            $("#iconProductId2").hide();
            $("#iconQty2").hide();
            $("#iconRemark2").hide();
            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);

        },
    });

    //GET BUDGET

    var siteCodePrRevAfter = $("#siteCodePrRevAfter").val();

    $.ajax({
        type: 'GET',
        url: '{!! route("getSite") !!}?sitecode=' + siteCodePrRevAfter,

        success: function(data) {
            var no = 1;
            $.each(data, function(key, value2) {
                var html = '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:5%;">' +
                    '&nbsp;&nbsp;<button type="reset" class="btn btn-sm float-right klikBudgetProcReqRevision" data-id1="' + value2.product_RefID + '" data-id2="' + value2.quantity + '" data-id3="' + value2.unitPriceBaseCurrencyValue + '" data-id4="' + value2.sys_ID + '" data-id5="' + value2.productName + '" data-id6="' + value2.quantityUnitName + '" data-id7="' + value2.priceBaseCurrencyISOCode + '" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="15" alt="" title="Add to Detail"></button>' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' +
                    '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span>' + value2.combinedBudgetSubSectionLevel1_RefID + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span>' + value2.combinedBudgetSubSectionLevel2Name + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span>' + value2.product_RefID + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span>' + value2.productName + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span>' + 'N/A' + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span>' + value2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span>' + value2.unitPriceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span>' + value2.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span>' + value2.quantityUnitName + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span>' + value2.priceBaseCurrencyISOCode + '</span>' + '</td>' +
                    '</tr>';

                $('table.tableBudgetDetail tbody').append(html);
            });

            $('.klikBudgetProcReqRevision').on('click', function(e) {
                e.preventDefault();
                var $this = $(this);
                var price = $this.data("id3");
                var productId = $this.data("id1");
                var qty = $this.data("id2");
                var combinedBudget = $this.data("id4");
                var productName = $this.data("id5");
                var uom = $this.data("id6");
                var currency = $this.data("id7");

                if (productName == "Unspecified Product") {
                    $("#product_id2").prop("disabled", false);
                    var putProductName = "";
                    var putProductId = "";
                    $("#statusProduct").val("Yes");
                } else {
                    $("#product_id2").prop("disabled", true);
                    var putProductName = productName;
                    var putProductId = productId;
                    $("#statusProduct").val("No");
                }
                $("#putProductId").val(putProductId);
                $("#putProductName").val(putProductName);
                $("#putQty").val(qty.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#putUom").val(uom);
                $("#putPrice").val(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#priceCek").val(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#putCurrency").val(currency);
                $("#totalBalance").val(parseFloat(qty * price).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#combinedBudget").val(combinedBudget);
                $("#totalPayment").val("0");

                $("#ValidateQuantity").val($this.data("id2"));
                $("#ValidatePrice").val($this.data("id3"));


                $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", true);
                $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", true);
                $("#addFromDetailtoCart").prop("disabled", true);
                $(".available").show();
                $("#detailTransAvail").show();
                $("#putProductId2").prop("disabled", true);
            });
        }
    });
</script>

<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var productId = $('#putProductId').val();
            var qtyProduct = $('#qtyCek').val();
            var priceProduct = $('#priceCek').val();
            
            var qtyProduct2 = $('#ValidateQuantity').val();
            var priceProduct2 = $('#ValidatePrice').val();
            var total = qtyProduct * priceProduct;
            var total2 = qtyProduct2 * priceProduct2;
            
            if (parseFloat(qtyProduct) == '') {
                $("#addFromDetailtoCart").prop("disabled", true);
                $('#totalProcReqDetails').val(0);
            } else if (parseFloat(qtyProduct) > parseFloat(qtyProduct2)) {
                Swal.fire("Error !", "Your Quantity Request is Over", "error");
                $("#qtyCek").val('');
                $('#totalProcReqDetails').val('');
                $("#addFromDetailtoCart").prop("disabled", true);
            } else if (parseFloat(total) > parseFloat(total2)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $('#totalProcReqDetails').val(0);
                $("#addFromDetailtoCart").prop("disabled", true);
            } else {
                var totalReq = parseFloat(total);
                $('#totalProcReqDetails').val(parseFloat(totalReq).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#addFromDetailtoCart").prop("disabled", false);
            }

        });
    });
</script>

<script>
    $('document').ready(function() {
        $('.ChangePrice').keyup(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var productId = $('#putProductId').val();
            var qtyProduct = $('#qtyCek').val();
            var priceProduct = $('#priceCek').val();
            var totalBalance = $("#totalBalance").val();

            var qtyProduct2 = $('#ValidateQuantity').val();
            var priceProduct2 = $('#ValidatePrice').val();
            var total = qtyProduct * priceProduct;
            var total2 = qtyProduct2 * priceProduct2;
            if (parseFloat(priceProduct) == '') {
                $("#addFromDetailtoCart").prop("disabled", true);
                $('#totalProcReqDetails').val(0);
            } else if (parseFloat(priceProduct) > parseFloat(priceProduct2)) {
                Swal.fire("Error !", "Your Price Request is Over", "error");
                $("#priceCek").val("");
                $('#totalProcReqDetails').val('');
                $("#addFromDetailtoCart").prop("disabled", true);
            } else if (parseFloat(total) > parseFloat(total2)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#priceCek").val("");
                $('#totalProcReqDetails').val(0);
                $("#addFromDetailtoCart").prop("disabled", true);
            } else {
                var totalReq = parseFloat(total);
                $('#totalProcReqDetails').val(parseFloat(totalReq).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#addFromDetailtoCart").prop("disabled", false);
            }

        });
    });
</script>

<script>
    $(function() {
        $("#FormSubmitProcReqRevision").on("submit", function(e) { //id of form 
            e.preventDefault();

            var action = $(this).attr("action"); //get submit action from form
            var method = $(this).attr("method"); // get submit method
            var form_data = new FormData($(this)[0]); // convert form into formdata 
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

                            $("#loading").hide();
                            $(".loader").hide();

                            swalWithBootstrapButtons.fire({

                                title: 'Successful !',
                                type: 'success',
                                html: 'Data has been saved updated',
                                showCloseButton: false,
                                showCancelButton: false,
                                focusConfirm: false,
                                confirmButtonText: '<span style="color:black;"> Ok </span>',
                                confirmButtonColor: '#4B586A',
                                confirmButtonColor: '#e9ecef',
                                reverseButtons: true
                            });

                            window.location.href = '/PurchaseRequisition?var=1';
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

                    })
                }
            })
        });

    });
</script>

<script>
    $('#qtyCek').on('blur', function() {
        var amount = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
        if (($('#qtyCek').val() != '') && (!amount.match(/^$/))) {
            $('#qtyCek').val(parseFloat(amount).toFixed(2));
        }
    });

    $('#priceCek').on('blur', function() {
        var price = $('#priceCek').val().replace(/^\s+|\s+$/g, '');
        if (($('#priceCek').val() != '') && (!price.match(/^$/))) {
            $('#priceCek').val(parseFloat(price).toFixed(2));
        }
    });
</script>

<script type="text/javascript">
    function CancelPurchaseRequisition() {
        $("#loading").show();
        $(".loader").show();
        location.reload();
    }
</script>