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
                

                var source = $("#Source").val();

                if(source == "Stock Movement"){
                    
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    var keys = 0;

                    $.ajax({
                        type: "POST",
                        url: '{!! route("DeliveryOrderRequest.DeliveryOrderRequestListCartRevision") !!}?var_recordID=' + 76000000000189,
                        success: function(data) {
                            console.log(data);
                            var no = 1;
                            $.each(data, function(key, value) {

                                keys += 1;

                                var html = '<tr>' +
                                    '<input name="getProductId[]" value="' + value.Product_RefID + '" type="hidden">' +
                                    '<input name="getProductName[]" value="' + value.ProductName + '" type="hidden">' +
                                    '<input name="getQty[]" id="budget_qty' + keys + '" value="' + value.Quantity + '" type="hidden">' +
                                    '<input name="getPrice[]" id="budget_price' + keys + '" value="' + value.ProductUnitPriceBaseCurrencyValue + '" type="hidden">' +
                                    '<input name="getUom[]" value="' + value.QuantityUnitName + '" type="hidden">' +
                                    '<input name="getCurrency[]" value="' + value.PriceBaseCurrencyISOCode + '" type="hidden">' +
                                    '<input name="getTotal[]" value="' + value.PriceBaseCurrencyValue + '" type="hidden">' +
                                    '<input name="combinedBudget" value="' + value.sys_ID + '" type="hidden">' +
                                    '<input name="getDocumentNumber[]" value="' + value.DocumentNumber + '" type="hidden">' +

                                    '<td style="border:1px solid #e9ecef;">' + '<span>' + value.DocumentNumber + '</span>' + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + '<span id="putProductId' + keys + '">' + value.Product_RefID + '</span>' + '</td>' +
                                    '<td style="border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + value.ProductName + '">' + '<span id="putProductName' + keys + '">' + value.ProductName + '</span>' + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + '<span">' + currencyTotal(value.Quantity) + '</span>' + '</td>' +
                                    '<td style="border:1px solid #e9ecef;">' + '<span">' + currencyTotal(value.Quantity) + '</span>' + '</td>' +

                                    '<td class="sticky-col second-col-dor-qty" style="border:1px solid #e9ecef;">' + '<input onkeyup="total_req(' + keys + ', this)" onkeypress="return isNumberKey(this, event);" id="total_req' + keys + '" style="border-radius:0;background-color:white;" name="total_req[]" class="form-control total_req" autocomplete="off">' + '</td>' +
                                    '<td class="sticky-col first-col-dor-note" style="border:1px solid #e9ecef;">' + '<input id="balance_qty_po' + keys + '" style="border-radius:0;background-color:white;" name="balance_qty_po[]" disabled class="form-control balance_qty_po" value="' + currencyTotal(value.Quantity) + '">' + '</td>' +
                                    
                                    '</tr>';

                                $('table.TableSourceDetailDor tbody').append(html);
                            });
                        },
                        
                    });
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
        $('#myGetWarehouse').one('click', function(e) {
            console.log('sana');
            
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
                    console.log('data sana', data);
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
                $("#warehouse_code").val(code);
                $("#warehouse_name").val(name);
                $("#warehouse_address").val(address);

            });

        });
    });
</script>