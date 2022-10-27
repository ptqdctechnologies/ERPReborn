<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".detailPurchaseRequisitionList").hide();
        $("#detailTransAvail").hide();
        $("#sitecode2").prop("disabled", true);
        $("#request_name2").prop("disabled", true);
        $("#addFromDetailtoCart").prop("disabled", true);
        $("#showContentBOQ3").hide();
        $("#tableShowHideBOQ3").hide();
        $("#product_id2").prop("disabled", true);

        $("#submitPR").prop("disabled", true);
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $(".CancelDetailPurchaseRequisition").click(function() {
            var work_id = $("#putWorkId").val();
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
            var statusEditPr = $("#statusEditPr").val();
            if (statusEditPr == "Yes") {

                qtyCek = $('#ValidateQuantity').val();
                priceCek = $('#ValidatePrice').val();
                totalProcReqDetails = parseFloat(qtyCek.replace(/,/g, '') * priceCek.replace(/,/g, ''));
                putRemark = $("#ValidateRemark").val();
                $.ajax({
                    type: "POST",
                    url: '{!! route("PurchaseRequisition.StoreValidatePurchaseRequisition") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                    success: function(data) {
                        if (data == "200") {
                            var html = '<tr>' +
                                '<td style="border:1px solid #e9ecef;">' +
                                '&nbsp;&nbsp;<button type="button" class="btn btn-xs" onclick="RemovePurchaseRequisition(\'' + work_id + '\', \'' + product_id + '\', \'' + totalProcReqDetails + '\', this);" data-id1="' + product_id + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                                '&nbsp;<button type="button" class="btn btn-xs" onclick="EditPurchaseRequisition(this)" data-dismiss="modal" data-id0="' + work_id + '" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + totalProcReqDetails.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '" data-id8="' + putRemark + '" data-id9="' + totalBalance + '"  style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                                '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                                '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                                '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                                '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                                '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                                '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                                '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                                '<input type="hidden" name="var_remark[]" value="' + putRemark + '">' +
                                '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +
                                '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + qtyCek + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + putUom + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + priceCek + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + totalProcReqDetails.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + putCurrency + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + putRemark + '</td>' +
                                '</tr>';
                            $('table.TablePurchaseRequisition tbody').append(html);

                            var TotalPurchaseRequisition = parseFloat($("#TotalPurchaseRequisition").html().replace(/,/g, ''));
                            $("#TotalPurchaseRequisition").html(parseFloat(+TotalPurchaseRequisition + totalProcReqDetails).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                        }
                        else {
                            Swal.fire("Error !", "Please use edit to update this item !", "error");
                        }
                    },
                });
                $("#statusEditPr").val("No");
            }


            $(".klikBudgetDetail2").prop("disabled", false);
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addFromDetailtoCartJs() {

        var valProductId = $("#putProductId").val();
        var valQty = $("#qtyCek").val();
        var valPrice = $("#priceCek").val();
        var valRemark = $("#putRemark").val();

        $("#putProductId").css("border", "1px solid #ced4da");

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
        } else {
            
            $("#putRemark").css("border", "1px solid #ced4da");

            $.ajax({
                type: "POST",
                url: '{!! route("PurchaseRequisition.StoreValidatePurchaseRequisition") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                success: function(data) {

                    if (data == "200") {

                        $("#product_id2").prop("disabled", true);
                        var work_id = $("#putWorkId").val();
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
                        var putPrice = $('#putPrice').val();
                        //TOTAL PR
                        if($("#TotalPurchaseRequisition").html() == ""){
                            $("#TotalPurchaseRequisition").html('0');
                        }
                        var TotalPurchaseRequisition = parseFloat($("#totalProcReqDetails").val().replace(/,/g, ''));
                        var TotalPurchaseRequisition2 = parseFloat($("#TotalPurchaseRequisition").html().replace(/,/g, ''));
                        $("#TotalPurchaseRequisition").html(parseFloat(+TotalPurchaseRequisition2 + TotalPurchaseRequisition).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));


                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;<button type="button" class="btn btn-xs" onclick="RemovePurchaseRequisition(\'' + work_id + '\', \'' + product_id + '\', \'' + totalProcReqDetails + '\', this);" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                            '&nbsp;<button type="button" class="btn btn-xs" data-dismiss="modal" onclick="EditPurchaseRequisition(this)" data-dismiss="modal" data-id0="' + work_id + '" data-id1="' + product_id + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + totalProcReqDetails + '" data-id8="' + putRemark + '" data-id9="' + totalBalance + '"  style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                            '<input type="hidden" name="var_product_name[]" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + parseFloat(qtyCek.replace(/,/g, '')) + '">' +
                            '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                            '<input type="hidden" name="var_price[]" value="' + parseFloat(priceCek.replace(/,/g, '')) + '">' +
                            '<input type="hidden" name="var_totalPrice[]" value="' + parseFloat(totalProcReqDetails.replace(/,/g, '')) + '">' +
                            '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                            '<input type="hidden" name="var_remark[]" value="' + putRemark + '">' +
                            '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +
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
                        $("#statusEditPr").val("No");

                        $("#putProductId").val("");
                        $("#putProductName").val("");
                        $("#putUom").val("");
                        $("#qtyCek").val("");
                        $("#priceCek").val("");
                        $("#putCurrency").val("");
                        $("#putRemark").val("");
                        $("#totalProcReqDetails").val("");
                        $("#totalBalance").val("");
                        $("#submitPR").prop("disabled", false);


                        $(".klikBudgetDetail2").prop("disabled", false);
                        $(".detailPurchaseRequisitionList").show();

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

<script>

    function RemovePurchaseRequisition(workId, ProductId, totalProcReqDetails, tr) {
        var i = tr.parentNode.parentNode.rowIndex;
        document.getElementById("TablePurchaseRequisition").deleteRow(i);
        
        $.ajax({
            type: "POST",
            url: '{!! route("PurchaseRequisition.StoreValidatePurchaseRequisition2") !!}?putProductId=' + ProductId + '&putWorkId=' + workId,
        });

        var totalProcReqDetails = parseFloat(totalProcReqDetails.replace(/,/g, ''));
        var TotalPurchaseRequisition = parseFloat($("#TotalPurchaseRequisition").html().replace(/,/g, ''));
        $("#TotalPurchaseRequisition").html(parseFloat(TotalPurchaseRequisition - totalProcReqDetails).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }

</script>

<script>
    function EditPurchaseRequisition(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TablePurchaseRequisition").deleteRow(i);

        var $this = $(t);

        $.ajax({
            type: "POST",
            url: '{!! route("PurchaseRequisition.StoreValidatePurchaseRequisition2") !!}?putProductId=' + $this.data("id1") + '&putWorkId=' + $this.data("id0"),
        });

        $("#putWorkId").val($this.data("id0"));
        $("#putProductId").val($this.data("id1"));
        $("#putProductName").val($this.data("id2"));
        $("#qtyCek").val($this.data("id3"));
        $("#putUom").val($this.data("id4"));
        $("#priceCek").val($this.data("id5"));
        $("#putCurrency").val($this.data("id6"));
        $("#putRemark").val($this.data("id8"));
        $("#ValidateRemark").val($this.data("id8"));
        $("#totalProcReqDetails").val($this.data("id7"));
        $("#totalBalance").val($this.data("id9"));
        $("#statusEditPr").val("Yes");
        $("#ValidateQuantity").val($this.data("id3"));
        $("#ValidatePrice").val($this.data("id5"));
        $("#statusEditArf").val("Yes");

        var totalProcReqDetails = parseFloat($("#totalProcReqDetails").val().replace(/,/g, ''));
        var TotalPurchaseRequisition = parseFloat($("#TotalPurchaseRequisition").html().replace(/,/g, ''));
        $("#TotalPurchaseRequisition").html(parseFloat(TotalPurchaseRequisition - totalProcReqDetails).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        if ($this.data("id10") == "Yes") {
            $("#product_id2").prop("disabled", false);
        } else {
            $("#product_id2").prop("disabled", true);
        }

        $(".klikBudgetDetail2").prop("disabled", true);
    }
</script>

<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {

            var qtyReq = $(this).val();
            var putQty = $('#putQty').val();
            var priceCek = parseFloat($('#priceCek').val().replace(/,/g, ''));
            var total = putQty * priceCek;
            var total2 = qtyReq * priceCek;

            if (parseFloat(qtyReq) == '') {
                $('#totalProcReqDetails').val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Quantity Request is Over", "error");
                $("#qtyCek").val(0);
                $('#totalProcReqDetails').val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(total2) > parseFloat(total)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $('#totalProcReqDetails').val(0);

                $("#qtyCek").css("border", "1px solid red");
            } else {
                var totalReq = parseFloat(total2);
                $('#totalProcReqDetails').val(parseFloat(totalReq).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#qtyCek").css("border", "1px solid #ced4da");
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
                $('#totalProcReqDetails').val(0);
                $("#priceCek").css("border", "1px solid red");
            } else if (parseFloat(total) > parseFloat(total2)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#priceCek").val(0);
                $('#totalProcReqDetails').val(0);
                $("#priceCek").css("border", "1px solid red");
            } else {
                var totalReq = total;
                $('#totalProcReqDetails').val(parseFloat(totalReq).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#priceCek").css("border", "1px solid #ced4da");
            }
        });
    });
</script>

<script type="text/javascript">
    function CancelPurchaseRequisition() {
        $("#loading").show();
        $(".loader").show();
        location.reload();
    }
</script>

<script>
    function klikProject(code, name) {
        $("#projectcode").val(code);
        $("#projectname").val(name);
        $("#sitecode2").prop("disabled", false);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getSite") !!}?projectcode=' + $('#projectcode').val(),
            success: function(data) {

                var no = 1;

                var t = $('#tableGetSite').DataTable();
                $.each(data, function(key, val) {

                    t.row.add([
                        '<tbody><tr><td>' + no++ + '</td>',
                        '<td><span data-dismiss="modal" onclick="klikSite(\'' + val.sys_ID + '\', \'' + val.sys_Text + '\');">' + val.sys_ID + '</span></td>',
                        '<td style="border:1px solid #e9ecef;">' + val.sys_Text + '</td></tr></tbody>'
                    ]).draw();

                });
            }
        });
    }
</script>

<script>
    function klikSite(code, name) {
        $("#sitecode").val(code);
        $("#sitename").val(name);
        $("#sitecode2").prop("disabled", true);
        $("#projectcode2").prop("disabled", true);
        $("#tableShowHideBOQ3").show();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBudget") !!}?sitecode=' + $('#sitecode').val(),
            success: function(data) {
                var no = 1;
                $.each(data, function(key, val2) {
                    if(val2.quantityAbsorption == "0.00" && val2.quantity == "0.00"){
                        var applied = 0;
                    }
                    else{
                        var applied = Math.round(parseFloat(val2.quantityAbsorption) / parseFloat(val2.quantity) * 100);
                    }
                    var status = "";
                    if(applied >= 100){
                        var status = "disabled";
                    }
                    var html = '<tr>' +
                        '<td style="border:1px solid #e9ecef;width:5%;">' +
                        '&nbsp;&nbsp;<button type="reset" '+ status +' class="btn btn-sm klikBudgetDetail klikBudgetDetail2' + status + '" data-id0="' + val2.combinedBudgetSubSectionLevel1_RefID + '" data-id1="' + val2.product_RefID + '" data-id2="' + val2.quantityRemain + '" data-id3="' + val2.unitPriceBaseCurrencyValue + '" data-id4="' + val2.sys_ID + '" data-id5="' + val2.productName + '" data-id6="' + val2.quantityUnitName + '" data-id7="' + val2.priceBaseCurrencyISOCode + '" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="15" alt="" title="Add to Detail"></button>' +
                        '</td>' +
                        '<td style="border:1px solid #e9ecef;">' +
                        '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                        '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkId">' + val2.combinedBudgetSubSectionLevel1_RefID + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkName">' + val2.combinedBudgetSubSectionLevel2Name + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="getProductId">' + val2.product_RefID + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="getProductName">' + val2.productName + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="getQty">' + val2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="getQty2">' + val2.quantityRemain.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="getPrice">' + val2.unitPriceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="totalArf">' + val2.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="getUom">' + val2.quantityUnitName + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="getCurrency">' + val2.priceBaseCurrencyISOCode + '</span>' + '</td>' +
                        '</tr>';

                    $('table.tableBudgetDetail tbody').append(html);
                });

                $('.klikBudgetDetail').on('click', function(e) {
                    e.preventDefault();
                    var $this = $(this);
                    var workId = $this.data("id0");
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
                    $("#putWorkId").val(workId);
                    $("#putProductId").val(putProductId);
                    $("#putProductName").val(putProductName);
                    $("#qtyCek").val(qty);
                    $("#putQty").val(qty);
                    $("#putUom").val(uom);
                    $("#priceCek").val(parseFloat(price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $("#putPrice").val(price);
                    $("#putCurrency").val(currency);
                    $("#totalProcReqDetails").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $("#totalPieceMealDetails").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $("#totalProcReqDetails").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $("#totalBalance").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    $("#combinedBudget").val(combinedBudget);

                    $(".klikBudgetDetail2").prop("disabled", true);
                    $("#detailTransAvail").show();
                    $("#putProductId2").prop("disabled", true);
                });
            }
        });
    }
</script>

<script>
    $(function() {
        $("#FormSubmitProcReq").on("submit", function(e) { //id of form 
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
                                html: 'Data has been saved. Your transaction number iss ' + '<span style="color:red;">' + response.ProcReqNumber + '</span>',
                                showCloseButton: false,
                                showCancelButton: false,
                                focusConfirm: false,
                                confirmButtonText: '<span style="color:black;"> Ok </span>',
                                confirmButtonColor: '#4B586A',
                                confirmButtonColor: '#e9ecef',
                                reverseButtons: true
                            }).then((result) => {
                                if (result.value) {
                                    $("#loading").show();
                                    $(".loader").show();
                                    window.location.href = '/PurchaseRequisition?var=1';
                                }
                            })
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
                            window.location.href = '/PurchaseRequisition?var=1';
                        }
                    })
                }
            })
        });

    });
</script>