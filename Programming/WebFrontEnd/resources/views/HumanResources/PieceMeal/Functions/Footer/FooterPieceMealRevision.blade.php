<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        // $("#detailPieceMealList").hide();
        $("#detailTransAvail").hide();
        $("#sitecode2").prop("disabled", true);
        $("#request_name2").prop("disabled", true);
        $("#addFromDetailtoCart").prop("disabled", true);
        // $("#tableShowHideBOQ3").hide();
        $("#product_id2").prop("disabled", true);
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".CancelDetailPieceMeal").click(function() {
            let product_id = $("#putProductId").val();
            let putProductName = $("#putProductName").val();
            let qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
            let putUom = $("#putUom").val();
            let priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
            let putCurrency = $("#putCurrency").val();
            let totalPieceMealDetails = $("#totalPieceMealDetails").val().replace(/^\s+|\s+$/g, '');
            let putRemark = $("#putRemark").val();
            let totalBalance = $("#totalBalance").val();
            let putPrice = $('#putPrice').val();
            let statusEditPieceMeal = $("#statusEditPieceMeal").val();
            if (statusEditPieceMeal == "Yes") {

                qtyCek = $('#ValidateQuantity').val();
                priceCek = $('#ValidatePrice').val();
                putRemark = $('#ValidateRemark').val();
                totalPieceMealDetails = parseFloat(qtyCek.replace(/,/g, '') * priceCek.replace(/,/g, ''));

                var html = '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:7%;">' +
                    '&nbsp;<button type="button" class="btn btn-xs EditPieceMeal" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + totalPieceMealDetails.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '" data-id8="' + putRemark + '" data-id9="' + totalBalance + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                    '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                    '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                    '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                    '<input type="hidden" name="var_remark[]" value="' + putRemark + '">' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + qtyCek + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putUom + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + priceCek + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + totalPieceMealDetails.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putCurrency + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + putRemark + '</td>' +
                    '</tr>';
                $('table.TablePieceMeal tbody').append(html);
                $("#statusEditPieceMeal").val("No");
            }
            $("#putProductId").css("border", "1px solid #ced4da");

            $("#putProductId").val("");
            $("#putProductName").val("");
            $("#qtyCek").val("");
            $("#putUom").val("");
            $("#priceCek").val("");
            $("#putCurrency").val("");
            $("#totalBalance").val("");
            $("#totalPieceMealDetails").val("");
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
        var valPutRemark = $("#putRemark").val();

        $("#putProductId").css("border", "1px solid #ced4da");
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
        } else if (valPutRemark === "") {
            $("#putRemark").focus();
            // $("#putRemark").attr('required', true);
            $("#putRemark").css("border", "1px solid red");
        } else {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: '{!! route("PieceMeal.StoreValidatePieceMeal") !!}?putProductId=' + $('#putProductId').val(),
                success: function(data) {

                    if (data == "200") {

                        $("#product_id2").prop("disabled", true);

                        var product_id = $("#putProductId").val();
                        var putProductName = $("#putProductName").val();
                        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
                        var putUom = $("#putUom").val();
                        var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
                        var putCurrency = $("#putCurrency").val();
                        var totalPieceMealDetails = $("#totalPieceMealDetails").val().replace(/^\s+|\s+$/g, '');
                        var putRemark = $("#putRemark").val();
                        var totalBalance = $("#totalBalance").val();
                        var putPrice = $('#putPrice').val();
                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs EditPieceMeal" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + totalPieceMealDetails + '" data-id8="' + putRemark + '" data-id9="' + totalBalance + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                            '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                            '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                            '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                            '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                            '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                            '<input type="hidden" name="var_remark[]" value="' + putRemark + '">' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + qtyCek + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putUom + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + priceCek + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + totalPieceMealDetails + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putCurrency + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putRemark + '</td>' +
                            '</tr>';
                        $('table.TablePieceMeal tbody').append(html);
                        $("#statusEditPieceMeal").val("No");

                        $("body").on("click", ".RemovePieceMeal", function() {
                            $(this).closest("tr").remove();
                            $.ajax({
                                type: "POST",
                                url: '{!! route("PieceMeal.StoreValidatePieceMeal2") !!}?putProductId=' + $(this).data("id1"),
                            });
                        });
                        $("body").on("click", ".EditPieceMeal", function() {
                            var $this = $(this);

                            $.ajax({
                                type: "POST",
                                url: '{!! route("PieceMeal.StoreValidatePieceMeal2") !!}?putProductId=' + $this.data("id1"),
                            });

                            $("#putProductId").val($this.data("id1"));
                            $("#putProductName").val($this.data("id2"));
                            $('#qtyCek').val($this.data("id3"));
                            $("#putUom").val($this.data("id4"));
                            $("#priceCek").val($this.data("id5"));
                            $("#putCurrency").val($this.data("id6"));
                            $("#totalPieceMealDetails").val($this.data("id7"));
                            $("#putRemark").val($this.data("id8"));
                            $("#totalBalance").val($this.data("id9"));

                            $("#statusEditPieceMeal").val("Yes");
                            $("#ValidateQuantity").val($this.data("id3"));
                            $("#ValidateRemark").val($this.data("id8"));
                            $("#ValidatePrice").val($this.data("id5"));

                            $(this).closest("tr").remove();

                            if ($this.data("id10") == "Yes") {
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
                        $("#totalPieceMealDetails").val("");
                        $("#totalBalance").val("");

                        $("#saveArfList").prop("disabled", false);
                        $("#detailPieceMealList").show();

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
    // GET PM LIST 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var var_recordID = $("#var_recordID").val();

    $.ajax({
        type: "POST",
        url: '{!! route("PieceMeal.PieceMealListCartRevision") !!}?var_recordID=' + var_recordID,
        success: function(data) {
            $.each(data, function(key, value) {
                $("#product_id2").prop("disabled", true);
                var statusProduct = $("#statusProduct").val();
                var html = '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:5%;">' +
                    '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs EditPieceMealCart" data-dismiss="modal" data-id1="' + value.product_RefID + '" data-id2="' + value.productName + '" data-id3="' + value.quantity + '" data-id4="' + value.quantityUnitName + '" data-id5="' + value.productUnitPriceCurrencyValue + '" data-id6="' + value.priceCurrencyISOCode + '" data-id7="' + value.remarks + '" data-id8="' + value.priceBaseCurrencyValue + '" data-id9="' + statusProduct + '" data-id10="' + value.combinedBudgetSectionDetail_RefID + '" data-id11="' + value.sys_ID + '" data-id12="' + value.combinedBudget_Quantity + '" data-id13="' + value.combinedBudget_UnitPriceBaseCurrencyValue + '" data-id14="' + value.combinedBudget_PriceBaseCurrencyValue + '" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="18" alt="" title="Edit"></button> ' +
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

                $('table.TablePieceMeal tbody').append(html);
            });

            $("body").on("click", ".EditPieceMealCart", function() {
                
                var $this = $(this);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: '{!! route("PieceMeal.StoreValidatePieceMeal2") !!}?putProductId=' + $this.data("id1"),
                });

                
                $("#detailTransAvail").show();
                $("#putProductId").val($this.data("id1"));
                $("#putProductName").val($this.data("id2"));
                $('#qtyCek').val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $('#putQty').val($this.data("id3"));
                $("#putUom").val($this.data("id4"));
                $("#priceCek").val($this.data("id5").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#putPrice").val($this.data("id5"));
                $("#putCurrency").val($this.data("id6"));
                $("#putRemark").val($this.data("id7"));
                $("#totalPieceMealDetails").val($this.data("id8").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#totalBalance").val($this.data("id14").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#totalPayment").val("0");
                $("#combinedBudget").val($this.data("id10"));
                $("#recordIDDetail").val($this.data("id11"));
                $("#ValidateQuantity").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#ValidatePrice").val($this.data("id5").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#ValidateRemark").val($this.data("id7"));
                $("#statusEditPieceMeal").val("Yes");


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
            $("#totalPieceMealDetails").val("");
            $("#totalRequester").val("");
            $("#totalQtyRequest").val("");
            $("#totalBalance").val("");
        },
    });

    //GET BUDGET

    var sitecode = $("#sitecode").val();

    $.ajax({
        type: 'GET',
        url: '{!! route("getBudget") !!}?sitecode=' + sitecode,

        success: function(data) {
            var no = 1;
            $.each(data, function(key, value2) {
                let applied = Math.round(value2.quantityRemainRatio * 100);
                var status = "";
                if(applied == 100){
                    var status = "disabled";
                }
                var html = '<tr>' +
                '<td style="border:1px solid #e9ecef;width:5%;">' +
                '&nbsp;&nbsp;<button type="reset" '+ status +' class="btn btn-sm float-right klikBudgetPieceMealRevision" data-id1="' + value2.product_RefID + '" data-id2="' + value2.quantity + '" data-id3="' + value2.unitPriceBaseCurrencyValue + '" data-id4="' + value2.sys_ID + '" data-id5="' + value2.productName + '" data-id6="' + value2.quantityUnitName + '" data-id7="' + value2.priceBaseCurrencyISOCode + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="15" alt="" title="Add to Detail"></button>' +
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

            $('.klikBudgetPieceMealRevision').on('click', function(e) {
                e.preventDefault();
                var $this = $(this);
                var price = $this.data("id3");
                var productId = $this.data("id1");
                var qty = $this.data("id2");
                var combinedBudget = $this.data("id4");
                var productName = $this.data("id5");
                var uom = $this.data("id6");
                var currency = $this.data("id7");
                var total = parseFloat(qty.replace(/,/g, '') * price.replace(/,/g, ''));

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
                $("#qtyCek").val(qty);
                $("#putQty").val(qty);
                $("#putUom").val(uom);
                $("#putPrice").val(price);
                $("#priceCek").val(price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#putCurrency").val(currency);
                $("#totalBalance").val(total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#totalPieceMealDetails").val(total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#combinedBudget").val(combinedBudget);
                $("#totalPayment").val("0");

                $("#ValidateQuantity").val($this.data("id2"));
                $("#ValidatePrice").val($this.data("id3"));

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
            var qtyReq = $(this).val();
            var putQty = $('#putQty').val();
            var priceCek = parseFloat($('#priceCek').val().replace(/,/g, ''));
            var total = putQty * priceCek;
            var total2 = qtyReq * priceCek;

            if (parseFloat(qtyReq) == '') {
                $('#totalPieceMealDetails').val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Quantity Request is Over", "error");
                $("#qtyCek").val(0);
                $('#totalPieceMealDetails').val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(total2) > parseFloat(total)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $('#totalPieceMealDetails').val(0);

                $("#qtyCek").css("border", "1px solid red");
            } else {
                var totalReq = parseFloat(total2);
                $('#totalPieceMealDetails').val(parseFloat(totalReq).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
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
                $('#totalPieceMealDetails').val(0);
                $("#priceCek").css("border", "1px solid red");
            } else if (parseFloat(total) > parseFloat(total2)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#priceCek").val(0);
                $('#totalPieceMealDetails').val(0);

                $("#priceCek").css("border", "1px solid red");
            } else {
                var totalReq = total;
                $('#totalPieceMealDetails').val(parseFloat(totalReq).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#priceCek").css("border", "1px solid #ced4da");
            }

        });
    });
</script>

<script>
    $(function() {
        $("#FormSubmitPieceMeal").on("submit", function(e) { //id of form 
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
                            if (response.status) {

                                $("#loading").hide();
                                $(".loader").hide();

                                swalWithBootstrapButtons.fire(
                                    'Succesful ',
                                    'Data has been updated',
                                    'success'
                                )

                                window.location.href = '/PieceMeal?var=1';
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

                            window.location.href = '/PieceMeal?var=1';
                        }
                    })
                }
            })
        });

    });
</script>

<script type="text/javascript">
    function CancelPieceMeal() {
        $("#loading").show();
        $(".loader").show();
        location.reload();
    }
</script>