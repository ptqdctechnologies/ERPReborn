<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#projectcode2").prop("disabled", true);
        $("#sitecode2").prop("disabled", true);
        $("#request_name2").prop("disabled", true);
        $("#addFromDetailtoCart").prop("disabled", true);
        $("#showContentBOQ3").hide();
        $("#product_id2").prop("disabled", true);
        $("#submitArf").prop("disabled", true);
    });
</script>

<script type="text/javascript">
    function CancelDetailArfRevision() {
        var work_id = $("#putWorkId").val();
        var product_id = $("#putProductId").val();
        var putProductName = $("#putProductName").val();
        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
        var putUom = $("#putUom").val();
        var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
        var putCurrency = $("#putCurrency").val();
        var totalArfDetails = $("#totalArfDetails").val().replace(/^\s+|\s+$/g, '');
        var putRemark = $("#putRemark").val();
        var totalBalance = $("#totalBalance").val();
        var combinedBudget = $("#combinedBudget").val();
        var recordIDDetail = $("#recordIDDetail").val();
        var statusProduct = $("#statusProduct").val();
        var statusEditArfRevision = $("#statusEditArfRevision").val();
        if (statusEditArfRevision == "Yes") {

            var qtyCek = $('#putQty').val().replace(/^\s+|\s+$/g, '');
            var priceCek = $("#putPrice").val().replace(/^\s+|\s+$/g, '');
            var totalArfDetails = parseFloat(qtyCek.replace(/,/g, '') * priceCek.replace(/,/g, ''));

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: "POST",
                url: '{!! route("AdvanceRequest.StoreValidateAdvance") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                success: function(data) {
                    if (data == "200") {
                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:5%;">' +
                            '&nbsp;&nbsp;<button type="button" class="btn btn-xs" onclick="EditAdvance(this)" data-dismiss="modal" data-id0="' + work_id + '" data-id1="' + product_id + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + totalArfDetails.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '" data-id8="' + putRemark + '" data-id9="' + totalBalance + '"  style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                            '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                            '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                            '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                            '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                            '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                            '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +
                            '<input type="hidden" name="var_recordIDDetail[]" value="' + recordIDDetail + '">' +
                            '<input type="hidden" name="var_statusProduct[]" value="' + statusProduct + '">' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + qtyCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putUom + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + priceCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + totalArfDetails.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putCurrency + '</td>' +
                            '</tr>';
                        $('table.TableAdvance tbody').append(html);

                        var TotalAdvance = parseFloat($("#TotalAdvance").html().replace(/,/g, ''));
                        $("#TotalAdvance").html(parseFloat(+TotalAdvance + totalArfDetails).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    }
                    else {
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });
            $("#statusEditArfRevision").val("No");
        }

        $(".klikBudgetAdvanceRevision2").prop("disabled", false);

        $("#putProductId").val("");
        $("#putProductName").val("");
        $("#qtyCek").val("");
        $("#putUom").val("");
        $("#priceCek").val("");
        $("#putCurrency").val("");
        $("#totalBalance").val("");
        $("#totalPayment").val("");
        $("#totalArfDetails").val("");
        $("#totalPayment").val("");
    }
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
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({data-id0="' + value.combinedBudgetSectionDetail_SubSectionLevel1_RefID + '"
                type: "POST",
                url: '{!! route("AdvanceRequest.StoreValidateAdvance") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
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
                        var totalArfDetails = $("#totalArfDetails").val().replace(/^\s+|\s+$/g, '');
                        var putRemark = $("#putRemark").val();
                        var totalBalance = $("#totalBalance").val();
                        var putPrice = $('#putPrice').val();
                        var combinedBudget = $("#combinedBudget").val();
                        var recordIDDetail = $("#recordIDDetail").val();
                        var statusProduct = $("#statusProduct").val();

                        //TOTAL ADVANCE
                        if($("#TotalAdvance").html() == ""){
                            $("#TotalAdvance").html('0');
                        }
                        var TotalAdvance = parseFloat($("#totalArfDetails").val().replace(/,/g, ''));
                        var TotalAdvance2 = parseFloat($("#TotalAdvance").html().replace(/,/g, ''));
                        $("#TotalAdvance").html(parseFloat(+TotalAdvance2 + TotalAdvance).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:5%;">' +
                            '&nbsp;&nbsp;<button type="button" class="btn btn-xs" onclick="EditAdvance(this)" data-dismiss="modal" data-id0="' + work_id + '" data-id1="' + product_id + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + totalArfDetails + '" data-id8="' + putRemark + '" data-id9="' + totalBalance + '"  style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                            '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + parseFloat(qtyCek.replace(/,/g, '')) + '">' +
                            '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                            '<input type="hidden" name="var_price[]" value="' + parseFloat(priceCek.replace(/,/g, '')) + '">' +
                            '<input type="hidden" name="var_totalPrice[]" value="' + parseFloat(totalArfDetails.replace(/,/g, '')) + '">' +
                            '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                            '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +
                            '<input type="hidden" name="var_recordIDDetail[]" value="' + recordIDDetail + '">' +
                            '<input type="hidden" name="var_statusProduct[]" value="' + statusProduct + '">' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + qtyCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putUom + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + priceCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + totalArfDetails.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putCurrency + '</td>' +
                            '</tr>';
                        $('table.TableAdvance tbody').append(html);
                        $("#statusEditArfRevision").val("No");

                        $("#putProductId").val("");
                        $("#putProductName").val("");
                        $("#qtyCek").val("");
                        $("#putUom").val("");
                        $("#priceCek").val("");
                        $("#putCurrency").val("");
                        $("#totalArfDetails").val("");
                        $("#totalRequester").val("");
                        $("#totalQtyRequest").val("");
                        $("#totalBalance").val("");
                        $("#totalPayment").val("");

                        $("#saveArfList").prop("disabled", false);
                        $("#submitArf").prop("disabled", false);

                        $(".klikBudgetAdvanceRevision2").prop("disabled", false);
                        $("#detailArfList").show();
                    } else {
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });
        }
    }
</script>

<script type="text/javascript">
    //GET ARF LIST 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var advance_RefID = $("#var_recordID").val();

    $.ajax({
        type: "POST",
        url: '{!! route("AdvanceRequest.AdvanceListCartRevision") !!}?advance_RefID=' + advance_RefID,
        success: function(data) {

            $.each(data, function(key, value) {
                
                //TOTAL ADVANCE
                if($("#TotalAdvance").html() == ""){
                    $("#TotalAdvance").html('0');
                }
                var TotalAdvance = parseFloat(value.priceBaseCurrencyValue.replace(/,/g, ''));
                var TotalAdvance2 = parseFloat($("#TotalAdvance").html().replace(/,/g, ''));
                $("#TotalAdvance").html(parseFloat(+TotalAdvance2 + +TotalAdvance).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

            
                $("#product_id2").prop("disabled", true);
                var statusProduct = $("#statusProduct").val();
                var html =
                    '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:5%;">' +
                    '&nbsp;&nbsp;<button type="button" class="btn btn-xs" onclick="EditAdvanListCart(this)" data-dismiss="modal" data-id0="' + value.combinedBudget_SubSectionLevel1_RefID + '" data-id1="' + value.product_RefID + '" data-id2="' + value.productName + '" data-id3="' + value.quantity + '" data-id4="' + value.quantityUnitName + '" data-id5="' + value.productUnitPriceCurrencyValue + '" data-id6="' + value.priceCurrencyISOCode + '" data-id7="' + value.remarks + '" data-id8="' + value.priceBaseCurrencyValue + '" data-id9="' + statusProduct + '" data-id10="' + value.combinedBudgetSectionDetail_RefID + '" data-id11="' + value.sys_ID + '" data-id12="' + value.combinedBudget_Quantity + '" data-id13="' + value.combinedBudget_UnitPriceBaseCurrencyValue + '" data-id14="' + value.combinedBudget_PriceBaseCurrencyValue + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="18" alt="" title="Edit"></button> ' +
                    '<input type="hidden" name="var_product_id[]" value="' + value.product_RefID + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + value.productName + '">' +
                    '<input type="hidden" name="var_quantity[]" value="' + value.quantity + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + value.quantityUnitName + '">' +
                    '<input type="hidden" name="var_price[]" value="' + value.productUnitPriceCurrencyValue + '">' +
                    '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + value.priceCurrencyISOCode + '">' +
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
                    '</tr>';

                $('table.TableAdvance tbody').append(html);
            });

            $("#putProductId").val("");
            $("#putProductName").val("");
            $("#qtyCek").val("");
            $("#putUom").val("");
            $("#priceCek").val("");
            $("#putCurrency").val("");
            $("#totalArfDetails").val("");
            $("#totalRequester").val("");
            $("#totalQtyRequest").val("");
            $("#totalBalance").val("");

            $("#saveArfList").prop("disabled", false);
            $("#submitArf").prop("disabled", false);

            $(".klikBudgetAdvanceRevision2").prop("disabled", false);
            $("#detailArfList").show();

        },
    });

    //GET BUDGET

    var siteCodeRevArfAfter = $("#siteCodeRevArfAfter").val();

    $.ajax({
        type: 'GET',
        url: '{!! route("getBudget") !!}?sitecode=' + siteCodeRevArfAfter,

        success: function(data) {
            var no = 1;
            $.each(data, function(key, value2) {
                if(value2.quantityAbsorption == "0.00" && value2.quantity == "0.00"){
                    var applied = 0;
                }
                else{
                    var applied = Math.round(parseFloat(value2.quantityAbsorption) / parseFloat(value2.quantity) * 100);
                }
                var status = "";
                if(applied >= 100){
                    var status = "disabled";
                }
                var html = '<tr>' +
                '<td style="border:1px solid #e9ecef;width:5%;">' +
                '&nbsp;&nbsp;<button type="reset" '+ status +' class="btn btn-sm float-right klikBudgetAdvanceRevision klikBudgetAdvanceRevision2' + status + '" data-id0="' + value2.combinedBudgetSubSectionLevel1_RefID + '" data-id1="' + value2.product_RefID + '" data-id2="' + value2.quantityRemain + '" data-id3="' + value2.unitPriceBaseCurrencyValue + '" data-id4="' + value2.sys_ID + '" data-id5="' + value2.productName + '" data-id6="' + value2.quantityUnitName + '" data-id7="' + value2.priceBaseCurrencyISOCode + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="15" alt="" title="Add to Detail"></button>' +
                '</td>' +
                '<td style="border:1px solid #e9ecef;">' +
                '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                '</td>' +
                '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkId">' + value2.combinedBudgetSubSectionLevel1_RefID + '</span>' + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkName">' + value2.combinedBudgetSubSectionLevel2Name + '</span>' + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + '<span id="getProductId">' + value2.product_RefID + '</span>' + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + '<span id="getProductName">' + value2.productName + '</span>' + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + '<span id="getQty">' + value2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + '<span id="getQty2">' + value2.quantityRemain.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + '<span id="getPrice">' + value2.unitPriceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + '<span id="totalArf">' + value2.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + '<span id="getUom">' + value2.quantityUnitName + '</span>' + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + '<span id="getCurrency">' + value2.priceBaseCurrencyISOCode + '</span>' + '</td>' +
                '</tr>';
                $('table.tableBudgetDetail tbody').append(html);
                
            });

            $('.klikBudgetAdvanceRevision').on('click', function(e) {
                e.preventDefault();
                var $this = $(this);
                var workId = $this.data("id0");
                var productId = $this.data("id1");
                var qty = $this.data("id2");
                var price = $this.data("id3");
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
                $("#totalArfDetails").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#totalBalance").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#combinedBudget").val(combinedBudget);
                $("#totalPayment").val("0");

                $("#ValidateQuantity").val($this.data("id2"));
                $("#ValidatePrice").val($this.data("id3"));

                $(".klikBudgetAdvanceRevision2").prop("disabled", true);
                $("#addFromDetailtoCart").prop("disabled", true);
                $(".available").show();
                $("#detailTransAvail").show();
                $("#putProductId2").prop("disabled", true);
            });
        }
    });
</script>

<script>
    function EditAdvance(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TableAdvance").deleteRow(i);

        var $this = $(t);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: "POST",
            url: '{!! route("AdvanceRequest.StoreValidateAdvance2") !!}?putProductId=' + $this.data("id1") + '&putWorkId=' + $this.data("id0"),
        });

        $("#putWorkId").val($this.data("id0"));
        $("#putProductId").val($this.data("id1"));
        $("#putProductName").val($this.data("id2"));
        $("#qtyCek").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#ValidateQuantity").val($this.data("id3"));
        $("#putUom").val($this.data("id4"));
        $("#priceCek").val($this.data("id5").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#ValidatePrice").val($this.data("id5").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#putCurrency").val($this.data("id6"));
        $("#putRemark").val($this.data("id8"));
        $("#totalArfDetails").val($this.data("id7").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#totalBalance").val($this.data("id9").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#statusEditArfRevision").val("Yes");

        var totalArfDetails = parseFloat($("#totalArfDetails").val().replace(/,/g, ''));
        var TotalAdvance = parseFloat($("#TotalAdvance").html().replace(/,/g, ''));
        $("#TotalAdvance").html(parseFloat(TotalAdvance - totalArfDetails).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        if ($this.data("id10") == "Yes") {
            $("#product_id2").prop("disabled", false);
        } else {
            $("#product_id2").prop("disabled", true);
        }

        $(".klikBudgetAdvanceRevision2").prop("disabled", true);
    }

    function EditAdvanListCart(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TableAdvance").deleteRow(i);

        var $this = $(t);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: '{!! route("AdvanceRequest.StoreValidateAdvance2") !!}?putProductId=' + $this.data("id1") + '&putWorkId=' + $this.data("id0"),
        });

        $("#putWorkId").val($this.data("id0"));
        $("#putProductId").val($this.data("id1"));
        $("#putProductName").val($this.data("id2"));
        $('#qtyCek').val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('#putQty').val($this.data("id3"));
        $("#putUom").val($this.data("id4"));
        $("#priceCek").val($this.data("id5").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#putPrice").val($this.data("id5"));
        $("#putCurrency").val($this.data("id6"));
        $("#putRemark").val($this.data("id7"));
        $("#totalArfDetails").val($this.data("id8").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#totalPayment").val("0");
        $("#combinedBudget").val($this.data("id10"));
        $("#recordIDDetail").val($this.data("id11"));
        $("#ValidateQuantity").val($this.data("id12").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#ValidatePrice").val($this.data("id13").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#totalBalance").val($this.data("id14").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#statusEditArfRevision").val("Yes");

        var totalArfDetails = parseFloat($("#totalArfDetails").val().replace(/,/g, ''));
        var TotalAdvance = parseFloat($("#TotalAdvance").html().replace(/,/g, ''));
        $("#TotalAdvance").html(parseFloat(TotalAdvance - totalArfDetails).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));


        $(this).closest("tr").remove();

        if ($this.data("id9") == "Yes") {
            $("#product_id2").prop("disabled", false);
        } else {
            $("#product_id2").prop("disabled", true);
        }

        $(".klikBudgetAdvanceRevision2").prop("disabled", true);
    }
</script>

<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {
            var qtyProduct = $('#qtyCek').val();
            var priceProduct = parseFloat($('#priceCek').val().replace(/,/g, ''));

            var qtyProduct2 = $('#ValidateQuantity').val();
            var priceProduct2 = $('#ValidatePrice').val();
            var total = qtyProduct * priceProduct;
            var total2 = qtyProduct2 * priceProduct2;

            if (parseFloat(qtyProduct) == '') {
                $("#addFromDetailtoCart").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
                $('#totalArfDetails').val(0);
            } else if (parseFloat(qtyProduct) > parseFloat(qtyProduct2)) {
                Swal.fire("Error !", "Your Quantity Request is Over", "error");
                $("#qtyCek").val('');
                $('#totalArfDetails').val('');
                $("#addFromDetailtoCart").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
            } else if (parseFloat(total) > parseFloat(total2)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $('#totalArfDetails').val(0);
                $("#addFromDetailtoCart").prop("disabled", true);
            } else {
                var totalReq = parseFloat(total);
                $('#totalArfDetails').val(parseFloat(totalReq).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#addFromDetailtoCart").prop("disabled", false);
            }
        });
    });
</script>

<script>
    $('document').ready(function() {
        $('.ChangePrice').keyup(function() {

            var qtyProduct = $('#qtyCek').val();
            var priceProduct = parseFloat($('#priceCek').val().replace(/,/g, ''));
            var totalBalance = $("#totalBalance").val();

            var qtyProduct2 = $('#ValidateQuantity').val();
            var priceProduct2 = $('#ValidatePrice').val();
            var total = qtyProduct * priceProduct;
            var total2 = qtyProduct2 * priceProduct2;

            if (parseFloat(priceProduct) == '') {
                $("#addFromDetailtoCart").prop("disabled", true);
                $('#totalArfDetails').val(0);
            } else if (parseFloat(priceProduct) > parseFloat(priceProduct2)) {
                Swal.fire("Error !", "Your Price Request is Over", "error");
                $("#priceCek").val("");
                $('#totalArfDetails').val('');
                $("#addFromDetailtoCart").prop("disabled", true);
            } else if (parseFloat(total) > parseFloat(total2)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#priceCek").val("");
                $('#totalArfDetails').val(0);
                $("#addFromDetailtoCart").prop("disabled", true);
            } else {
                var totalReq = parseFloat(total);
                $('#totalArfDetails').val(parseFloat(totalReq).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#addFromDetailtoCart").prop("disabled", false);
            }

        });
    });
</script>
<!-- 
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
</script> -->

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

<script type="text/javascript">
    function cancelAdvance() {
        $("#loading").show();
        $(".loader").show();
        location.reload();
    }
</script>