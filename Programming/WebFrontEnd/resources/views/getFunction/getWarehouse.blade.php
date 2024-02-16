<div id="myGetWarehouse" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Warehouse</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap TableGetWarehouse" id="TableGetWarehouse">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Warehouse Code</th>
                                            <th>Warehouse Name</th>
                                            <th>Warehouse Type</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- WAREHOUSE ON INVENTORY  -->

<script>
    $(function() {
        $('.myGetWarehouseFrom').one('click', function(e) {
            e.preventDefault();
            // ShowLoading();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var keys = 0;

            $.ajax({
                type: 'GET',
                url: '{!! route("getWarehouse") !!}',
                success: function(data) {
                    var no = 1;
                    var t = $('#TableGetWarehouse').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_warehouse' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.Code + '</td>',
                            '<td>' + val.Name + '</td>',
                            '<td>' + val.Type + '</td>',
                            '<td>' + val.Address + '</td></tr></tbody>',
                        ]).draw();
                    });
                }
            });

            $('#TableGetWarehouse tbody').on('click', 'tr', function() {

                $("#myGetWarehouse").modal('toggle');

                var row = $(this).closest("tr");
                var id = row.find("td:nth-child(1)").text();
                var sys_id_warehouse = $('#sys_id_warehouse' + id).val();
                var code = row.find("td:nth-child(2)").text();
                var name = row.find("td:nth-child(3)").text();
                var address = row.find("td:nth-child(5)").text();

                $("#warehouse_from_id").val(sys_id_warehouse);
                $("#warehouse_from").val(code + ' - ' + name);
                $("#warehouse_from_addres").val(address);


                
                //FROM YANG AKAN MUNCUL KETIKA KLIK WAREHOUSE FROM KETIKA SOURCE NYA STOCK MOVEMENT
                var keys = 0;

                var source = $("#Source").val();

                if(source == "Stock Movement"){

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
                }

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


            });

        });
    });
</script>


<script>
    $(function() {
        $('.myGetWarehouseTo').one('click', function(e) {
            e.preventDefault();
            // ShowLoading();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var keys = 0;

            $.ajax({
                type: 'GET',
                url: '{!! route("getWarehouse") !!}',
                success: function(data) {
                    var no = 1;
                    var t = $('#TableGetWarehouse').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_warehouse' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.Code + '</td>',
                            '<td>' + val.Name + '</td>',
                            '<td>' + val.Type + '</td>',
                            '<td>' + val.Address + '</td></tr></tbody>',
                        ]).draw();
                    });
                }
            });

            $('#TableGetWarehouse tbody').on('click', 'tr', function() {

                $("#myGetWarehouse").modal('toggle');

                var row = $(this).closest("tr");
                var id = row.find("td:nth-child(1)").text();
                var sys_id_warehouse = $('#sys_id_warehouse' + id).val();
                var code = row.find("td:nth-child(2)").text();
                var name = row.find("td:nth-child(3)").text();
                var address = row.find("td:nth-child(5)").text();

                $("#warehouse_to_id").val(sys_id_warehouse);
                $("#warehouse_to").val(code + ' - ' + name);
                $("#warehouse_to_addres").val(address);

            });

        });
    });
</script>

<!-- WAREHOUSE ON MASTER -->

<script>
    $(function() {
        $('.PopUpWarehouseRevision').one('click', function(e) {
            e.preventDefault();
            // ShowLoading();


            // $("#PopUpWarehouseRevision").modal('toggle');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var keys = 0;

            $.ajax({
                type: 'GET',
                url: '{!! route("getWarehouse") !!}',
                success: function(data) {
                    var no = 1;
                    var t = $('#TableGetWarehouse').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_warehouse' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.Code + '</td>',
                            '<td>' + val.Name + '</td>',
                            '<td>' + val.Type + '</td>',
                            '<td>' + val.Address + '</td></tr></tbody>',
                        ]).draw();
                    });
                }
            });

            $('#TableGetWarehouse tbody').on('click', 'tr', function() {

                $("#myGetWarehouse").modal('toggle');

                var row = $(this).closest("tr");
                var id = row.find("td:nth-child(1)").text();
                var sys_id_warehouse = $('#sys_id_warehouse' + id).val();
                var code = row.find("td:nth-child(2)").text();
                var name = row.find("td:nth-child(3)").text();
                var address = row.find("td:nth-child(5)").text();

                $("#warehouse_id").val(sys_id_warehouse);
                $("#warehouse_name").val(code);

            });

        });
    });
</script>