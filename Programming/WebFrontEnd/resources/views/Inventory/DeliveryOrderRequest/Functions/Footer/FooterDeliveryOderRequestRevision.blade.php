<script type="text/javascript">
    $(document).ready(function() {

        $(".WarehouseLeft").hide();
        $(".SiteLeft").hide();
        $(".Supplier").hide();
        $(".WarehouseRight").hide();
        $(".SiteRight").hide();
        
        $(".UserRight").hide();
        $(".ArrowIcon").hide();

        $("#WTH").hide();
        $("#WTS").hide();
        $("#WTU").hide();
        $("#SUTW").hide();
        $("#STS").hide();
        $("#SITW").hide();

        $("#detailPR").hide();
        $("#detailDor").hide();
        $("#headerPrNumber2").prop("disabled", true);
        $("#SubmitDor").prop("disabled", true);

        $(".ShowPO").hide();
        $(".ShowOP").hide();
        $(".ShowSM").hide();
        $(".ShowReceiver").hide();
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $(".deliverType").on('click', function(e) {
            e.preventDefault();
            var valType = $(".deliverType").val();
            if (valType == "Warehouse to Warehouse") {
                $(".WarehouseLeft").show();
                $(".SiteLeft").hide();
                $(".Supplier").hide();
                $(".WarehouseRight").show();
                $(".SiteRight").hide();
                
                $(".UserRight").hide();
                $(".ArrowIcon").show();
            } else if (valType == "Warehouse to Site") {
                $(".WarehouseLeft").show();
                $(".SiteLeft").hide();
                $(".Supplier").hide();
                $(".WarehouseRight").hide();
                $(".SiteRight").show();
                
                $(".UserRight").hide();
                $(".ArrowIcon").show();
            } else if (valType == "Warehouse to User") {
                $(".WarehouseLeft").show();
                $(".SiteLeft").hide();
                $(".Supplier").hide();
                $(".WarehouseRight").hide();
                $(".SiteRight").hide();
                
                $(".UserRight").show();
                $(".ArrowIcon").show();
            } else if (valType == "Supplier to Warehouse") {
                $(".WarehouseLeft").hide();
                $(".SiteLeft").hide();
                $(".Supplier").show();
                $(".WarehouseRight").show();
                $(".SiteRight").hide();
                
                $(".UserRight").hide();
                $(".ArrowIcon").show();
            } else if (valType == "Supplier to Site") {
                $(".WarehouseLeft").hide();
                $(".SiteLeft").hide();
                $(".Supplier").show();
                $(".WarehouseRight").hide();
                $(".SiteRight").show();
                
                $(".UserRight").hide();
                $(".ArrowIcon").show();
            } else if (valType == "Site to Warehouse") {
                $(".WarehouseLeft").hide();
                $(".SiteLeft").show();
                $(".Supplier").hide();
                $(".WarehouseRight").show();
                $(".SiteRight").hide();
                
                $(".UserRight").hide();
                $(".ArrowIcon").show();
            }
            else{
                $(".WarehouseLeft").hide();
                $(".SiteLeft").hide();
                $(".Supplier").hide();
                $(".WarehouseRight").hide();
                $(".SiteRight").hide();
                
                $(".UserRight").hide();
                $(".ArrowIcon").hide();
            }
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function() {
        $(".Source").on('click', function(e) {
            e.preventDefault();
            var valSource = $(".Source").val();

            if (valSource == "Purchase Order") {
                $(".ShowPO").show();
                $(".ShowOP").hide();
                $(".ShowSM").hide();
                $(".ShowReceiver").show();
                $(".ShowReceiver").show();

                $("#WTH").hide();
                $("#WTS").hide();
                $("#WTU").hide();
                $("#SUTW").show();
                $("#STS").show();
                $("#SITW").hide();
                
            } else if (valSource == "Order Picking") {
                $(".ShowPO").hide();
                $(".ShowOP").show();
                $(".ShowSM").hide();
                $(".ShowReceiver").show();

                $("#WTH").show();
                $("#WTS").show();
                $("#WTU").hide();
                $("#SUTW").hide();
                $("#STS").hide();
                $("#SITW").show();

            } else if (valSource == "Stock Movement") {
                $(".ShowPO").hide();
                $(".ShowOP").hide();
                $(".ShowSM").show();
                $(".ShowReceiver").show();

                $("#WTH").show();
                $("#WTS").hide();
                $("#WTU").show();
                $("#SUTW").hide();
                $("#STS").hide();
                $("#SITW").hide();
            }

            $(".deliverType").val("");

            $(".WarehouseLeft").hide();
            $(".SiteLeft").hide();
            $(".Supplier").hide();
            $(".WarehouseRight").hide();
            $(".SiteRight").hide();
            
            $(".UserRight").hide();
            $(".ArrowIcon").hide();
            
        });
    });
</script>

<script>
    $('#purchase_order2').one('click', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("AdvanceRequest.AdvanceListData") !!}',
            success: function(data) {

                TableSearchPoInDor(data);

            }
        });
    });
</script>

<script>
    $('#order_picking2').one('click', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("AdvanceRequest.AdvanceListData") !!}',
            success: function(data) {

                TableSearchOpInDor(data);

            }
        });
    });
</script>

<script>
    $('#stock_movement2').one('click', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("AdvanceRequest.AdvanceListData") !!}',
            success: function(data) {

                TableSearchSmInDor(data);

            }
        });
    });
</script>

<script>
    function TableSearchPoInDor(data) {
        $('.TableSearchPoInDor').find('tbody').empty();
        var no = 1;
        t = $('#TableSearchPoInDor').DataTable();
        t.clear().draw();

        var keys = 0;

        $.each(data, function(key, val) {
            keys += 1;
            t.row.add([
                '<tbody><tr><input id="purchase_order_id' + keys + '" value="' + val.Sys_ID + '" type="hidden"><input id="supplier_id' + keys + '" value="' + val.RequesterWorkerJobsPosition_RefID + '" type="hidden"><td>' + no++ + '</td>',
                '<td>' + val.DocumentNumber + '</td>',
                '<td>' + val.CombinedBudgetCode + '</td>',
                '<td>' + val.CombinedBudgetSectionCode + '</td>',
                '<td>' + val.RequesterWorkerName + '</td></tr></tbody>'
            ]).draw();

        });
    }
</script>

<script>
    function TableSearchOpInDor(data) {
        $('.TableSearchOpInDor').find('tbody').empty();
        var no = 1;
        t = $('#TableSearchOpInDor').DataTable();
        t.clear().draw();

        var keys = 0;

        $.each(data, function(key, val) {
            keys += 1;
            t.row.add([
                '<tbody><tr><input id="order_picking_id' + keys + '" value="' + val.Sys_ID + '" type="hidden"><input id="supplier_id' + keys + '" value="' + val.RequesterWorkerJobsPosition_RefID + '" type="hidden"><td>' + no++ + '</td>',
                '<td>' + val.DocumentNumber + '</td>',
                '<td>' + val.CombinedBudgetCode + '</td>',
                '<td>' + val.CombinedBudgetSectionCode + '</td>',
                '<td>' + val.RequesterWorkerName + '</td></tr></tbody>'
            ]).draw();

        });
    }
</script>

<script>
    function TableSearchSmInDor(data) {
        $('.TableSearchSmInDor').find('tbody').empty();
        var no = 1;
        t = $('#TableSearchSmInDor').DataTable();
        t.clear().draw();

        var keys = 0;

        $.each(data, function(key, val) {
            keys += 1;
            t.row.add([
                '<tbody><tr><input id="stock_movement_id' + keys + '" value="' + val.Sys_ID + '" type="hidden"><input id="supplier_id' + keys + '" value="' + val.RequesterWorkerJobsPosition_RefID + '" type="hidden"><td>' + no++ + '</td>',
                '<td>' + val.DocumentNumber + '</td>',
                '<td>' + val.CombinedBudgetCode + '</td>',
                '<td>' + val.CombinedBudgetSectionCode + '</td>',
                '<td>' + val.RequesterWorkerName + '</td></tr></tbody>'
            ]).draw();

        });
    }
</script>

<script>
    $(function() {
        $("#FormSubmitSearchPurchaseOrder").on("submit", function(e) { //id of form 
            e.preventDefault();

            var action = $(this).attr("action"); //get submit action from form
            var method = $(this).attr("method"); // get submit method
            var form_data = new FormData($(this)[0]); // convert form into formdata 
            var form = $(this);

            $.ajax({
                url: action,
                dataType: 'json', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: method,
                success: function(data) {

                    TableSearchPoInDor(data);

                }
            })
        });
    });
</script>

<script>
    $(function() {
        $("#FormSubmitSearchOrderPicking").on("submit", function(e) { //id of form 
            e.preventDefault();

            var action = $(this).attr("action"); //get submit action from form
            var method = $(this).attr("method"); // get submit method
            var form_data = new FormData($(this)[0]); // convert form into formdata 
            var form = $(this);

            $.ajax({
                url: action,
                dataType: 'json', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: method,
                success: function(data) {

                    TableSearchOpInDor(data);

                }
            })
        });
    });
</script>


<script>
    $(function() {
        $("#FormSubmitSearchStockMovement").on("submit", function(e) { //id of form 
            e.preventDefault();

            var action = $(this).attr("action"); //get submit action from form
            var method = $(this).attr("method"); // get submit method
            var form_data = new FormData($(this)[0]); // convert form into formdata 
            var form = $(this);

            $.ajax({
                url: action,
                dataType: 'json', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: method,
                success: function(data) {

                    TableSearchSmInDor(data);

                }
            })
        });
    });
</script>

<script>
    var keys = 0;

    $('#TableSearchPoInDor tbody').on('click', 'tr', function() {

        $("#mySearchPurchaseOrder").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var document_id = $('#purchase_order_id' + id).val();
        var document = row.find("td:nth-child(2)").text();
        $("#purchase_order").val(document);


        var supplier_id = $('#supplier_id' + id).val();
        var supplier = row.find("td:nth-child(5)").text();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequestSupplier") !!}?supplier_id=' + supplier_id + '&supplier=' + supplier + '&document_id=' + document_id,
            success: function(data) {
                var no = 1;
                applied = 0;
                TotalBudgetSelectedTamp = 0;
                status = "";
                statusDisplay = [];
                statusDisplay2 = [];
                statusForm = [];
                if (data.status == "200") {

                    $("#supplier_id").val(data.supplier_id);
                    $("#supplier").val(data.supplier);

                    $.each(data.data, function(key, value) {

                        keys += 1;

                        // if(value.QuantityAbsorption == "0.00" && value.Quantity == "0.00"){
                        if (value.Quantity == "0.00") {
                            var applied = 0;
                        } else {
                            // var applied = Math.round(parseFloat(value.QuantityAbsorption) / parseFloat(value.Quantity) * 100);
                            var applied = Math.round(parseFloat(value.Quantity) * 100);
                        }
                        if (applied >= 100) {
                            var status = "disabled";
                        }
                        if (value.ProductName == "Unspecified Product") {
                            statusDisplay[keys] = "";
                            statusDisplay2[keys] = "none";
                            statusForm[keys] = "disabled";
                        } else {
                            statusDisplay[keys] = "none";
                            statusDisplay2[keys] = "";
                            statusForm[keys] = "";
                        }

                        var html = '<tr>' +
                            '<input name="getProductId[]" value="' + value.Product_RefID + '" type="hidden">' +
                            '<input name="getProductName[]" value="' + value.ProductName + '" type="hidden">' +
                            '<input name="getQty[]" id="budget_qty' + keys + '" value="' + value.Quantity + '" type="hidden">' +
                            '<input name="getPrice[]" id="budget_price' + keys + '" value="' + value.ProductUnitPriceBaseCurrencyValue + '" type="hidden">' +
                            '<input name="getUom[]" value="' + value.QuantityUnitName + '" type="hidden">' +
                            '<input name="getCurrency[]" value="' + value.PriceBaseCurrencyISOCode + '" type="hidden">' +
                            '<input name="getTotal[]" value="' + value.PriceBaseCurrencyValue + '" type="hidden">' +
                            '<input name="combinedBudget" value="' + value.sys_ID + '" type="hidden">' +

                            '<td style="border:1px solid #e9ecef;">' + '<span>' + document + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="putProductId' + keys + '">' + value.Product_RefID + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + value.ProductName + '">' + '<span id="putProductName' + keys + '">' + value.ProductName + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span">' + currencyTotal(value.Quantity) + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span">' + currencyTotal(value.ProductUnitPriceBaseCurrencyValue) + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span>' + currencyTotal(value.PriceBaseCurrencyValue) + '</span>' + '</td>' +

                            '<td class="sticky-col first-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input onkeyup="total_req(' + keys + ', this)" onkeypress="return isNumberKey(this, event);" id="total_req' + keys + '" style="border-radius:0;" name="total_req[]" class="form-control total_req" autocomplete="off" ' + statusForm[keys] + '>' + '</td>' +

                            '</tr>';

                        $('table.TableSourceDetailDor tbody').append(html);
                    });
                } else if (data.status == "501") {
                    Swal.fire("Cancelled", "You have chosen this number !", "error");
                } else {
                    Swal.fire("Cancelled", "Please use same requester !", "error");
                }
            },
        });
    });

    //VALIDASI QTY EXPENSE

    function total_req(keys, value) {

        var qty_val = (value.value).replace(/,/g, '');
        var budget_qty_val = $("#budget_qty" + keys).val();

        if (qty_val == "") {
            $("input[name='total_req[]']").css("border", "1px solid #ced4da");
        } else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {

            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Qty is over budget !", "error");
                }
            });

            $('#total_req' + keys).val("");
            $('#total_req' + keys).css("border", "1px solid red");
            $('#total_req' + keys).focus();
        } else {
            $("input[name='total_req[]']").css("border", "1px solid #ced4da");
            $('#total_req' + keys).val(qty_val);
        }

        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
        TotalBudgetSelected();
    }
</script>


<script>
    var keys = 0;

    $('#TableSearchOpInDor tbody').on('click', 'tr', function() {

        $("#mySearchOrderPicking").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var document_id = $('#order_picking_id' + id).val();
        var document = row.find("td:nth-child(2)").text();
        $("#order_picking").val(document);


        var supplier_id = $('#supplier_id' + id).val();
        var supplier = row.find("td:nth-child(5)").text();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequestSupplier") !!}?supplier_id=' + supplier_id + '&supplier=' + supplier + '&document_id=' + document_id,
            success: function(data) {
                var no = 1;
                applied = 0;
                TotalBudgetSelectedTamp = 0;
                status = "";
                statusDisplay = [];
                statusDisplay2 = [];
                statusForm = [];
                if (data.status == "200") {

                    $("#supplier_id").val(data.supplier_id);
                    $("#supplier").val(data.supplier);

                    $.each(data.data, function(key, value) {

                        keys += 1;

                        // if(value.QuantityAbsorption == "0.00" && value.Quantity == "0.00"){
                        if (value.Quantity == "0.00") {
                            var applied = 0;
                        } else {
                            // var applied = Math.round(parseFloat(value.QuantityAbsorption) / parseFloat(value.Quantity) * 100);
                            var applied = Math.round(parseFloat(value.Quantity) * 100);
                        }
                        if (applied >= 100) {
                            var status = "disabled";
                        }
                        if (value.ProductName == "Unspecified Product") {
                            statusDisplay[keys] = "";
                            statusDisplay2[keys] = "none";
                            statusForm[keys] = "disabled";
                        } else {
                            statusDisplay[keys] = "none";
                            statusDisplay2[keys] = "";
                            statusForm[keys] = "";
                        }

                        var html = '<tr>' +
                            '<input name="getProductId[]" value="' + value.Product_RefID + '" type="hidden">' +
                            '<input name="getProductName[]" value="' + value.ProductName + '" type="hidden">' +
                            '<input name="getQty[]" id="budget_qty' + keys + '" value="' + value.Quantity + '" type="hidden">' +
                            '<input name="getPrice[]" id="budget_price' + keys + '" value="' + value.ProductUnitPriceBaseCurrencyValue + '" type="hidden">' +
                            '<input name="getUom[]" value="' + value.QuantityUnitName + '" type="hidden">' +
                            '<input name="getCurrency[]" value="' + value.PriceBaseCurrencyISOCode + '" type="hidden">' +
                            '<input name="getTotal[]" value="' + value.PriceBaseCurrencyValue + '" type="hidden">' +
                            '<input name="combinedBudget" value="' + value.sys_ID + '" type="hidden">' +

                            '<td style="border:1px solid #e9ecef;">' + '<span>' + document + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="putProductId' + keys + '">' + value.Product_RefID + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + value.ProductName + '">' + '<span id="putProductName' + keys + '">' + value.ProductName + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span">' + currencyTotal(value.Quantity) + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span">' + currencyTotal(value.ProductUnitPriceBaseCurrencyValue) + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span>' + currencyTotal(value.PriceBaseCurrencyValue) + '</span>' + '</td>' +

                            '<td class="sticky-col first-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input onkeyup="total_req(' + keys + ', this)" onkeypress="return isNumberKey(this, event);" id="total_req' + keys + '" style="border-radius:0;" name="total_req[]" class="form-control total_req" autocomplete="off" ' + statusForm[keys] + '>' + '</td>' +

                            '</tr>';

                        $('table.TableSourceDetailDor tbody').append(html);
                    });
                } else if (data.status == "501") {
                    Swal.fire("Cancelled", "You have chosen this number !", "error");
                } else {
                    Swal.fire("Cancelled", "Please use same requester !", "error");
                }
            },
        });
    });

    //VALIDASI QTY EXPENSE

    function total_req(keys, value) {

        var qty_val = (value.value).replace(/,/g, '');
        var budget_qty_val = $("#budget_qty" + keys).val();

        if (qty_val == "") {
            $("input[name='total_req[]']").css("border", "1px solid #ced4da");
        } else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {

            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Qty is over budget !", "error");
                }
            });

            $('#total_req' + keys).val("");
            $('#total_req' + keys).css("border", "1px solid red");
            $('#total_req' + keys).focus();
        } else {
            $("input[name='total_req[]']").css("border", "1px solid #ced4da");
            $('#total_req' + keys).val(qty_val);
        }

        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
        TotalBudgetSelected();
    }
</script>

<script>
    var keys = 0;

    $('#TableSearchSmInDor tbody').on('click', 'tr', function() {

        $("#mySearchStockMovement").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var document_id = $('#stock_movement_id' + id).val();
        var document = row.find("td:nth-child(2)").text();
        $("#stock_movement").val(document);


        var supplier_id = $('#supplier_id' + id).val();
        var supplier = row.find("td:nth-child(5)").text();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequestSupplier") !!}?supplier_id=' + supplier_id + '&supplier=' + supplier + '&document_id=' + document_id,
            success: function(data) {
                var no = 1;
                applied = 0;
                TotalBudgetSelectedTamp = 0;
                status = "";
                statusDisplay = [];
                statusDisplay2 = [];
                statusForm = [];
                if (data.status == "200") {

                    $("#supplier_id").val(data.supplier_id);
                    $("#supplier").val(data.supplier);

                    $.each(data.data, function(key, value) {

                        keys += 1;

                        // if(value.QuantityAbsorption == "0.00" && value.Quantity == "0.00"){
                        if (value.Quantity == "0.00") {
                            var applied = 0;
                        } else {
                            // var applied = Math.round(parseFloat(value.QuantityAbsorption) / parseFloat(value.Quantity) * 100);
                            var applied = Math.round(parseFloat(value.Quantity) * 100);
                        }
                        if (applied >= 100) {
                            var status = "disabled";
                        }
                        if (value.ProductName == "Unspecified Product") {
                            statusDisplay[keys] = "";
                            statusDisplay2[keys] = "none";
                            statusForm[keys] = "disabled";
                        } else {
                            statusDisplay[keys] = "none";
                            statusDisplay2[keys] = "";
                            statusForm[keys] = "";
                        }

                        var html = '<tr>' +
                            '<input name="getProductId[]" value="' + value.Product_RefID + '" type="hidden">' +
                            '<input name="getProductName[]" value="' + value.ProductName + '" type="hidden">' +
                            '<input name="getQty[]" id="budget_qty' + keys + '" value="' + value.Quantity + '" type="hidden">' +
                            '<input name="getPrice[]" id="budget_price' + keys + '" value="' + value.ProductUnitPriceBaseCurrencyValue + '" type="hidden">' +
                            '<input name="getUom[]" value="' + value.QuantityUnitName + '" type="hidden">' +
                            '<input name="getCurrency[]" value="' + value.PriceBaseCurrencyISOCode + '" type="hidden">' +
                            '<input name="getTotal[]" value="' + value.PriceBaseCurrencyValue + '" type="hidden">' +
                            '<input name="combinedBudget" value="' + value.sys_ID + '" type="hidden">' +

                            '<td style="border:1px solid #e9ecef;">' + '<span>' + document + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="putProductId' + keys + '">' + value.Product_RefID + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + value.ProductName + '">' + '<span id="putProductName' + keys + '">' + value.ProductName + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span">' + currencyTotal(value.Quantity) + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span">' + currencyTotal(value.ProductUnitPriceBaseCurrencyValue) + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span>' + currencyTotal(value.PriceBaseCurrencyValue) + '</span>' + '</td>' +

                            '<td class="sticky-col first-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input onkeyup="total_req(' + keys + ', this)" onkeypress="return isNumberKey(this, event);" id="total_req' + keys + '" style="border-radius:0;" name="total_req[]" class="form-control total_req" autocomplete="off" ' + statusForm[keys] + '>' + '</td>' +

                            '</tr>';

                        $('table.TableSourceDetailDor tbody').append(html);
                    });
                } else if (data.status == "501") {
                    Swal.fire("Cancelled", "You have chosen this number !", "error");
                } else {
                    Swal.fire("Cancelled", "Please use same requester !", "error");
                }
            },
        });
    });

    //VALIDASI QTY EXPENSE

    function total_req(keys, value) {

        var qty_val = (value.value).replace(/,/g, '');
        var budget_qty_val = $("#budget_qty" + keys).val();

        if (qty_val == "") {
            $("input[name='total_req[]']").css("border", "1px solid #ced4da");
        } else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {

            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Qty is over budget !", "error");
                }
            });

            $('#total_req' + keys).val("");
            $('#total_req' + keys).css("border", "1px solid red");
            $('#total_req' + keys).focus();
        } else {
            $("input[name='total_req[]']").css("border", "1px solid #ced4da");
            $('#total_req' + keys).val(qty_val);
        }

        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
        TotalBudgetSelected();
    }
</script>

<script type="text/javascript">
    // GET DOR LIST 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var var_recordID = $("#var_recordID").val();
    var TotalBudgetSelected = 0;
    var TotalQty = 0;
    var trano = $("#trano").val();

    $.ajax({
        type: "POST",
        url: '{!! route("DeliveryOrderRequest.DeliveryOrderRequestListCartRevision") !!}?var_recordID=' + var_recordID,
        success: function(data) {
            var no = 1;
            applied = 0;
            TotalBudgetList = 0;
            status = "";
            statusDisplay = [];
            statusDisplay2 = [];
            statusForm = [];
            $.each(data, function(key, value) {
                TotalBudgetSelected += +value.priceBaseCurrencyValue.replace(/,/g, '');
                TotalQty += +value.quantity.replace(/,/g, '');
                var html =
                    '<tr>' +
                    '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '</tr>';

                $('table.TableDorCart tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                $("#GrandTotal").html(currencyTotal(TotalBudgetSelected));
                $("#TotalQty").html(currencyTotal(TotalQty));

                //GET PR DATA 

                // if(value.quantityAbsorption == "0.00" && value.quantity == "0.00"){
                if (value.quantity == "0.00") {
                    var applied = 0;
                } else {
                    // var applied = Math.round(parseFloat(value.quantityAbsorption) / parseFloat(value.quantity) * 100);
                    var applied = Math.round(parseFloat(value.quantity) * 100);
                }
                if (applied >= 100) {
                    var status = "disabled";
                }
                if (value.productName == "Unspecified Product") {
                    statusDisplay[key] = "";
                    statusDisplay2[key] = "none";
                    statusForm[key] = "disabled";
                } else {
                    statusDisplay[key] = "none";
                    statusDisplay2[key] = "";
                    statusForm[key] = "";
                }
                var html = '<tr>' +

                    '<input name="getWorkId[]" value="' + value.combinedBudget_SubSectionLevel1_RefID + '" type="hidden">' +
                    '<input name="getWorkName[]" value="' + value.combinedBudget_SubSectionLevel1Name + '" type="hidden">' +
                    '<input name="getProductId[]" value="' + value.product_RefID + '" type="hidden">' +
                    '<input name="getProductName[]" value="' + value.productName + '" type="hidden">' +
                    '<input name="getQty[]" id="budget_qty' + key + '" value="' + value.quantity + '" type="hidden">' +
                    '<input name="getPrice[]" id="budget_price' + key + '" value="' + value.productUnitPriceCurrencyValue + '" type="hidden">' +
                    '<input name="getUom[]" value="' + value.quantityUnitName + '" type="hidden">' +
                    '<input name="getCurrency[]" value="' + value.priceBaseCurrencyISOCode + '" type="hidden">' +
                    '<input name="getAverage[]" value="' + value.priceBaseCurrencyValue + '" type="hidden">' +
                    '<input name="combinedBudget" value="' + value.sys_ID + '" type="hidden">' +
                    '<input name="getRecordIDDetail[]" value="' + value.sys_ID + '"  type="hidden">' +
                    '<input name="getTrano[]" value="' + trano + '" type="hidden">' +

                    '<td style="border:1px solid #e9ecef;">' +
                    '&nbsp;&nbsp;&nbsp;<div class="progress ' + status + ' progress-xs" style="height: 14px;border-radius:8px;"> @if(' + applied + ' >= ' + 0 + ' && ' + applied + ' <= ' + 40 + ')<div class="progress-bar bg-red" style="width:' + applied + '%;"></div> @elseif(' + applied + ' >= ' + 41 + ' && ' + applied + ' <= ' + 89 + ')<div class="progress-bar bg-blue" style="width:' + applied + '%;"></div> @elseif(' + applied + ' >= ' + 90 + ' && ' + applied + ' <= ' + 100 + ')<div class="progress-bar bg-green" style="width:' + applied + '%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>' + applied + ' %</center></small>' +
                    '</td>' +


                    '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td class="sticky-col first-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req' + key + '" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" ' + statusForm[key] + ' value="' + currency(value.quantity) + '">' + '</td>' +

                    '</tr>';
                $('table.TableSourceDetailDor tbody').append(html);

                //VALIDASI QTY
                $('#qty_req' + key).keyup(function() {
                    $(this).val(currency($(this).val()));
                    var qty_val = $(this).val().replace(/,/g, '');
                    var budget_qty_val = $("#budget_qty" + key).val();

                    if (qty_val == "") {
                        $('#total_req' + key).val("");
                        $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                    } else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {

                        swal({
                            onOpen: function() {
                                swal.disableConfirmButton();
                                Swal.fire("Error !", "Qty is over budget !", "error");
                            }
                        });

                        $('#qty_req' + key).val("");
                        $('#qty_req' + key).css("border", "1px solid red");
                        $('#qty_req' + key).focus();
                    } else {
                        $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                    }
                });
            });
        },
    });
</script>

<script>
    function addFromDetailtoCartJs() {

        $('#TableDorCart').find('tbody').empty();

        $(".detailDorList").show();
        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getTrano = $("input[name='getTrano[]']").map(function() {
            return $(this).val();
        }).get();
        var getWorkId = $("input[name='getWorkId[]']").map(function() {
            return $(this).val();
        }).get();
        var getWorkName = $("input[name='getWorkName[]']").map(function() {
            return $(this).val();
        }).get();
        var getProductId = $("input[name='getProductId[]']").map(function() {
            return $(this).val();
        }).get();
        var getProductName = $("input[name='getProductName[]']").map(function() {
            return $(this).val();
        }).get();
        var getUom = $("input[name='getUom[]']").map(function() {
            return $(this).val();
        }).get();
        var getCurrency = $("input[name='getCurrency[]']").map(function() {
            return $(this).val();
        }).get();
        var getPrice = $("input[name='getPrice[]']").map(function() {
            return $(this).val();
        }).get();
        var getAverage = $("input[name='getAverage[]']").map(function() {
            return $(this).val();
        }).get();

        var qty_req = $("input[name='qty_req[]']").map(function() {
            return $(this).val();
        }).get();

        var combinedBudget = $("input[name='combinedBudget']").val();

        var TotalBudgetSelected = 0;
        var TotalQty = 0;

        $.each(qty_req, function(index, data) {
            if (qty_req[index] != "" && qty_req[index] > "0.00" && qty_req[index] != "NaN.00") {

                var putProductId = getProductId[index];
                var putProductName = getProductName[index];

                if (getProductName[index] == "Unspecified Product") {
                    var putProductId = $("#putProductId" + index).val();
                    var putProductName = $("#putProductName" + index).html();
                }
                TotalBudgetSelected += +qty_req[index].replace(/,/g, '');
                TotalQty += +qty_req[index].replace(/,/g, '');
                var html = '<tr>' +

                    '<input type="hidden" name="var_product_id[]" value="' + putProductId + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity[]" class="qty_req2' + index + '" data-id="' + index + '" value="' + currencyTotal(qty_req[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_price[]" class="price_req2' + index + '" value="' + currencyTotal(getPrice[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + getCurrency[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +

                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getTrano[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getPrice[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + currencyTotal(getAverage[index]).replace(/,/g, '') + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + qty_req[index] + '</td>' +
                    '</tr>';
                $('table.TableDorCart tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                $("#GrandTotal").html(currencyTotal(TotalBudgetSelected));
                $("#TotalQty").html(currencyTotal(TotalQty));

                $("#SubmitDor").prop("disabled", false);
            }
        });

    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".deliverType").on('click', function(e) {
            e.preventDefault();
            var valType = $(".deliverType").val();
            if (valType == "Warehouse to Site") {
                $(".headerDor1").show();
                $(".headerDor2").hide();
                $(".headerDor3").hide();
                $(".headerDor4").hide();
            } else if (valType == "Warehouse to Warehouse") {
                $(".headerDor2").show();
                $(".headerDor1").hide();
                $(".headerDor3").hide();
                $(".headerDor4").hide();
            } else if (valType == "Supplier to Site") {
                $(".headerDor3").show();
                $(".headerDor2").hide();
                $(".headerDor1").hide();
                $(".headerDor4").hide();
            } else if (valType == "Site to Warehouse") {
                $(".headerDor4").show();
                $(".headerDor3").hide();
                $(".headerDor2").hide();
                $(".headerDor1").hide();
            }
        });

        $(".siteName1").on('click', function(e) {
            e.preventDefault();
            var valSite = $(".siteName1").val();
            if (valSite == "WH-001") {
                $("#headerAddressSiteName1").val("Jl. Baru Leko. Kode Pos, : 97796. Desa/Kelurahan, : DESA LEKO SULA. Kecamatan/Kota (LN), Kec. Mangoli Barat, Kab. Kepulauan Sula, Prov. Maluku Utara");
            } else if (valSite == "WH-002") {
                $("#headerAddressSiteName1").val("Bekasi cyber park, RT.001/RW.009, Kayuringin Jaya, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17415");
            }
        });

        $(".siteName2").on('click', function(e) {
            e.preventDefault();
            var valSite = $(".siteName2").val();
            if (valSite == "WH-001") {
                $("#headerAddressSiteName2").val("Jl. Baru Leko. Kode Pos, : 97796. Desa/Kelurahan, : DESA LEKO SULA. Kecamatan/Kota (LN), Kec. Mangoli Barat, Kab. Kepulauan Sula, Prov. Maluku Utara");
            } else if (valSite == "WH-002") {
                $("#headerAddressSiteName2").val("Bekasi cyber park, RT.001/RW.009, Kayuringin Jaya, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17415");
            }
        });

        $(".siteName3").on('click', function(e) {
            e.preventDefault();
            var valSite = $(".siteName3").val();
            if (valSite == "WH-001") {
                $("#headerAddressSiteName3").val("Jl. Baru Leko. Kode Pos, : 97796. Desa/Kelurahan, : DESA LEKO SULA. Kecamatan/Kota (LN), Kec. Mangoli Barat, Kab. Kepulauan Sula, Prov. Maluku Utara");
            } else if (valSite == "WH-002") {
                $("#headerAddressSiteName3").val("Bekasi cyber park, RT.001/RW.009, Kayuringin Jaya, Kec. Bekasi Bar., Kota Bks, Jawa Barat 17415");
            }
        });
    });
</script>

<script type="text/javascript">
    function CancelDor() {
        ShowLoading();
        window.location.href = '/DeliveryOrderRequest?var=1';
    }
</script>

<script>
    $(function() {
        $("#FormSubmitDorRevision").on("submit", function(e) { //id of form 
            e.preventDefault();

            var requester_name = $("#requester_name").val();
            var deliver_type = $("#deliver_type").val();
            $("#requester_name").css("border", "1px solid #ced4da");
            $("#deliver_type").css("border", "1px solid #ced4da");

            if (requester_name === "") {
                $("#requester_name").focus();
                $("#requester_name").attr('required', true);
                $("#requester_name").css("border", "1px solid red");
            } else if (deliver_type === "") {
                $("#deliver_type").focus();
                $("#deliver_type").attr('required', true);
                $("#deliver_type").css("border", "1px solid red");
            } else if (deliver_type === "") {
                $("#deliver_type").focus();
                $("#deliver_type").attr('required', true);
                $("#deliver_type").css("border", "1px solid red");
            } else {
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

                        ShowLoading();
                        $.ajax({
                            url: action,
                            dataType: 'json', // what to expect back from the server
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: method,
                            success: function(response) {

                                HideLoading();

                                swalWithBootstrapButtons.fire({

                                    title: 'Successful !',
                                    type: 'success',
                                    html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + response.advnumber + '</span>',
                                    showCloseButton: false,
                                    showCancelButton: false,
                                    focusConfirm: false,
                                    confirmButtonText: '<span style="color:black;"> Ok </span>',
                                    confirmButtonColor: '#4B586A',
                                    confirmButtonColor: '#e9ecef',
                                    reverseButtons: true
                                }).then((result) => {
                                    if (result.value) {
                                        ShowLoading();
                                        window.location.href = '/DeliveryOrderRequest?var=1';
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
                                ShowLoading();
                                window.location.href = '/DeliveryOrderRequest?var=1';
                            }
                        })
                    }
                })
            }
        });

    });
</script>