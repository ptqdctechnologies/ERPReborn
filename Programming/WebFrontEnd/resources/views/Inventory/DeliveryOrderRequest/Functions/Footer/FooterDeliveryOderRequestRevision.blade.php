<script type="text/javascript">
    $(document).ready(function() {
        $(".headerDor1").hide();
        $(".headerDor2").hide();
        $(".headerDor3").hide();
        $(".headerDor4").hide();
        $("#detailPR").hide();
        $("#detailDor").hide();
        $(".detailDorList").hide();
        $("#tableShowHideDor").hide();
        $("#headerPrNumber2").prop("disabled", true);
        $("#pr_number2").prop("disabled", true);
    });
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
                console.log(statusProduct);
                var html =
                    '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:5%;">' +
                    '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditAdvanListCart(this)" data-dismiss="modal" data-id0="' + value.combinedBudget_SubSectionLevel1_RefID + '" data-id1="' + value.product_RefID + '" data-id2="' + value.productName + '" data-id3="' + value.quantity + '" data-id4="' + value.quantityUnitName + '" data-id5="' + value.productUnitPriceCurrencyValue + '" data-id6="' + value.priceCurrencyISOCode + '" data-id7="' + value.remarks + '" data-id8="' + value.priceBaseCurrencyValue + '" data-id9="' + statusProduct + '" data-id10="' + value.combinedBudgetSectionDetail_RefID + '" data-id11="' + value.sys_ID + '" data-id12="' + value.combinedBudget_Quantity + '" data-id13="' + value.combinedBudget_UnitPriceBaseCurrencyValue + '" data-id14="' + value.combinedBudget_PriceBaseCurrencyValue + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="18" alt="" title="Edit"></button> ' +
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
                    '<td style="border:1px solid #e9ecef;">' + value.combinedBudget_SubSectionLevel1_RefID + '</td>' +
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
                    $("#putProductId").css("background-color", "white");
                    $("#putProductName").css("background-color", "white");
                } else {
                    $("#product_id2").prop("disabled", true);
                    var putProductName = productName;
                    var putProductId = productId;
                    $("#statusProduct").val("No");
                    $("#putProductId").css("background-color", "#e9ecef");
                    $("#putProductName").css("background-color", "#e9ecef");
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
                $(".ActionButton").prop("disabled", true);
                $("#addFromDetailtoCart").prop("disabled", true);
                $(".available").show();
                $("#detailTransAvail").show();
                $("#putProductId2").prop("disabled", true);
            });
        }
    });
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addFromDetailtoCartJs() {
        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var valQty = $("#qtyCek").val();
        var valPrNumber = $("#pr_number_detail").val();

        $("#qtyCek").css("border", "1px solid #ced4da");
        $("#pr_number_detail").css("border", "1px solid #ced4da");

        if (valQty === "") {
            $("#qtyCek").focus();
            $("#qtyCek").attr('required', true);
            $("#qtyCek").css("border", "1px solid red");
        } else if (valPrNumber === "") {
            $("#pr_number_detail").focus();
            $("#pr_number_detail").attr('required', true);
            $("#pr_number_detail").css("border", "1px solid red");
        } else {
            $.ajax({
                type: "POST",
                url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequest") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                success: function(data) {

                    if (data == "200") {

                        $("#product_id2").prop("disabled", true);
                        var trano = $("#pr_number_detail").val();
                        var work_id = $("#putWorkId").val();
                        var putProductId = $("#putProductId").val();
                        var putProductName = $("#putProductName").val();
                        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
                        var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
                        var average = $("#average").val().replace(/^\s+|\s+$/g, '');
                        var totalBalance = $("#totalBalance").val();
                        var putPrice = $('#putPrice').val();
                        var putQty = $('#putQty').val();

                        //TOTAL ADVANCE
                        if($("#TotalDeliveryOrderRequest").html() == ""){
                            $("#TotalDeliveryOrderRequest").html('0');
                        }
                        var TotalDeliveryOrderRequest = parseFloat($("#average").val().replace(/,/g, ''));
                        var TotalDeliveryOrderRequest2 = parseFloat($("#TotalDeliveryOrderRequest").html().replace(/,/g, ''));
                        $("#TotalDeliveryOrderRequest").html(parseFloat(+TotalDeliveryOrderRequest2 + TotalDeliveryOrderRequest).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="RemoveDeliveryOrderRequest(\'' + work_id + '\', \'' + putProductId + '\', \'' + average + '\', this);" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                            '&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditDeliveryOrderRequest(this)" data-dismiss="modal" data-id0="' + work_id + '" data-id1="' + putProductId + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + priceCek + '" data-id5="' + average + '" data-id6="' + totalBalance + '" data-id7="' + trano + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '<input type="hidden" name="var_putProductId[]" value="' + putProductId + '">' +
                            '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + parseFloat(qtyCek.replace(/,/g, '')) + '">' +
                            '<input type="hidden" name="var_price[]" value="' + parseFloat(priceCek.replace(/,/g, '')) + '">' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + work_id + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + qtyCek + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + priceCek + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + average + '</td>' +
                            '</tr>';

                        $('table.TableDorCart tbody').append(html);
                        $("#statusEditDor").val("No");


                        $("#pr_number_detail").val("");
                        $("#putWorkId").val("");
                        $("#putProductId").val("");
                        $("#putProductName").val("");
                        $("#qtyCek").val("");
                        $("#priceCek").val("");
                        $("#average").val("");
                        $("#totalBalance").val("");

                        $(".AddToDetail2").prop("disabled", false);
                        $(".ActionButton").prop("disabled", false);
                        $(".detailDorList").show();

                    } else {
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });
        }
    }
    
</script>

<script type="text/javascript">
    function CancelDetailDor() {
        var trano = $('#pr_number_detail').val();
        var work_id = $("#putWorkId").val();
        var putProductId = $("#putProductId").val();
        var putProductName = $("#putProductName").val();
        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
        var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
        var average = $("#average").val().replace(/^\s+|\s+$/g, '');
        var totalBalance = $("#totalBalance").val();
        var putPrice = $('#putPrice').val();
        var statusEditDor = $("#statusEditDor").val();

        if (statusEditDor == "Yes") {

            qtyCek = $('#ValidateQuantity').val();
            average = parseFloat(qtyCek.replace(/,/g, '') * priceCek.replace(/,/g, ''));

            $.ajaxSetup({
                headers: {
                    'X-CSRFcac-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: "POST",
                url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequest") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                success: function(data) {

                    if (data == "200") {

                        let html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="RemoveDor(\'' + work_id + '\', \'' + putProductId + '\', \'' + average + '\', this);" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                            '&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditDor(this)" data-dismiss="modal" data-id0="' + work_id + '" data-id1="' + putProductId + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + priceCek + '" data-id5="' + average.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '" data-id6="' + totalBalance + '" data-id7="' + trano + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '<input type="hidden" name="var_putProductId[]" value="' + putProductId + '">' +
                            '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                            '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + work_id + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + qtyCek + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + priceCek + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + average.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '</tr>';
                        $('table.TableDorCart tbody').append(html);

                        var TotalDeliveryOrderRequest = parseFloat($("#TotalDeliveryOrderRequest").html().replace(/,/g, ''));
                        $("#TotalDeliveryOrderRequest").html(parseFloat(+TotalDeliveryOrderRequest + average).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                    }else {
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });
            $("#statusEditDor").val("No");
        }

        $(".AddToDetail2").prop("disabled", false);
        $(".ActionButton").prop("disabled", false);

        
        $("#putProductId").css("border", "1px solid #ced4da");
        $("#putProductId").val("");
        $("#pr_number_detail").val("");
        $("#putWorkId").val("");
        $("#putProductName").val("");
        $("#qtyCek").val("");
        $("#priceCek").val("");
        $("#totalBalance").val("");
        $("#average").val("");
    }
</script>


<script>

    function RemoveDeliveryOrderRequest(workId, ProductId, average, tr) {
        var i = tr.parentNode.parentNode.rowIndex;
        document.getElementById("TableDorCart").deleteRow(i);
        
        $.ajax({
            type: "POST",
            url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequest2") !!}?putProductId=' + ProductId + '&putWorkId=' + workId,
        });

        var average = parseFloat(average.replace(/,/g, ''));
        var TotalDeliveryOrderRequest = parseFloat($("#TotalDeliveryOrderRequest").html().replace(/,/g, ''));
        $("#TotalDeliveryOrderRequest").html(parseFloat(TotalDeliveryOrderRequest - average).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }

</script>

<script>
    function EditDeliveryOrderRequest(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TableDorCart").deleteRow(i);

        var $this = $(t);

        $.ajax({
            type: "POST",
            url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequest2") !!}?putProductId=' + $this.data("id1") + '&putWorkId=' + $this.data("id0"),
        });

        $("#putWorkId").val($this.data("id0"));
        $("#putProductId").val($this.data("id1"));
        $("#putProductName").val($this.data("id2"));
        $("#qtyCek").val($this.data("id3"));
        $("#priceCek").val($this.data("id4"));
        $("#average").val($this.data("id5"));
        $("#totalBalance").val($this.data("id6"));
        $("#pr_number_detail").val($this.data("id7"));
        $("#statusEditDor").val("Yes");

        $("#ValidateQuantity").val($this.data("id3"));

        var average = parseFloat($("#average").val().replace(/,/g, ''));
        var TotalDeliveryOrderRequest = parseFloat($("#TotalDeliveryOrderRequest").html().replace(/,/g, ''));
        $("#TotalDeliveryOrderRequest").html(parseFloat(TotalDeliveryOrderRequest - average).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        $(".AddToDetail2").prop("disabled", true);
        $(".ActionButton").prop("disabled", true);
    }
</script>

<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {
            
            var qtyCek = parseFloat($(this).val().replace(/,/g, ''));
            var putQty = $('#putQty').val();
            var putPrice = parseFloat($('#putPrice').val().replace(/,/g, ''));
            var total = qtyCek * putPrice;            
            console.log(putQty);
            if (qtyCek == '') {
                $("#addFromDetailDortoCart").prop("disabled", true);
                $("#average").val(0);
            } else if (qtyCek > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Qty Request is Over", "error");
                $("#qtyCek").val(0);
                $("#average").val(0);
                $("#qtyCek").css("border", "1px solid red");
                $("#addFromDetailDortoCart").prop("disabled", true);
            } else {
                $("#qtyCek").css("border", "1px solid #ced4da");
                $('#average').val(parseFloat(total).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#addFromDetailDortoCart").prop("disabled", false);
            }

        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
      $(".deliverType").on('click', function(e) {
          e.preventDefault();
          var valType = $(".deliverType").val();
          if(valType == "Warehouse to Site"){
              $(".headerDor1").show();
              $(".headerDor2").hide();
              $(".headerDor3").hide();
              $(".headerDor4").hide();
          }
          else if(valType == "Warehouse to Warehouse"){
              $(".headerDor2").show();
              $(".headerDor1").hide();
              $(".headerDor3").hide();
              $(".headerDor4").hide();
          }
          else if(valType == "Supplier to Site"){
              $(".headerDor3").show();
              $(".headerDor2").hide();
              $(".headerDor1").hide();
              $(".headerDor4").hide();
          }
          else if(valType == "Site to Warehouse"){
              $(".headerDor4").show();
              $(".headerDor3").hide();
              $(".headerDor2").hide();
              $(".headerDor1").hide();
          }
      });

      $(".siteName1").on('click', function(e) {
          e.preventDefault();
          var valSite = $(".siteName1").val();
          if(valSite == "WH-001"){
              $("#headerAddressSiteName1").val("Jl. Baru Leko. Kode Pos, : 97796. Desa/Kelurahan, : DESA LEKO SULA. Kecamatan/Kota (LN), Kec. Mangoli Barat, Kab. Kepulauan Sula, Prov. Maluku Utara");
          }
          else if(valSite == "WH-002"){
              $("#headerAddressSiteName1").val("Bekasi cyber park, RT.001/RW.009, Kayuringin Jaya, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17415");
          }
      });

      $(".siteName2").on('click', function(e) {
          e.preventDefault();
          var valSite = $(".siteName2").val();
          if(valSite == "WH-001"){
              $("#headerAddressSiteName2").val("Jl. Baru Leko. Kode Pos, : 97796. Desa/Kelurahan, : DESA LEKO SULA. Kecamatan/Kota (LN), Kec. Mangoli Barat, Kab. Kepulauan Sula, Prov. Maluku Utara");
          }
          else if(valSite == "WH-002"){
              $("#headerAddressSiteName2").val("Bekasi cyber park, RT.001/RW.009, Kayuringin Jaya, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17415");
          }
      });

      $(".siteName3").on('click', function(e) {
          e.preventDefault();
          var valSite = $(".siteName3").val();
          if(valSite == "WH-001"){
              $("#headerAddressSiteName3").val("Jl. Baru Leko. Kode Pos, : 97796. Desa/Kelurahan, : DESA LEKO SULA. Kecamatan/Kota (LN), Kec. Mangoli Barat, Kab. Kepulauan Sula, Prov. Maluku Utara");
          }
          else if(valSite == "WH-002"){
              $("#headerAddressSiteName3").val("Bekasi cyber park, RT.001/RW.009, Kayuringin Jaya, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17415");
          }
      });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".CancelDor").click(function() {
            $("#tableShowHideDor").find("input,button,textarea,select").attr("disabled", false);
        });
    });
</script>