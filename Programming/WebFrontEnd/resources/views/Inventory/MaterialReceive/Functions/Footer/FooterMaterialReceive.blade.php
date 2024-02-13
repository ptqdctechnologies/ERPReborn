<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".headerMaterialReceive1").hide();
        $(".headerMaterialReceive2").hide();
        $("#detailPR").hide();
        $("#FileReceipt").hide();
        $("#DetailMaterialReceive").hide();
        $("#headerPrNumber2").prop("disabled", true);
        $("#SubmitMaterialReceive").prop("disabled", true);
        $("#AddToDetail").prop("disabled", true);
        $("#po_number").css("background-color", "white");
        $("#warehouse1").css("background-color", "white");
        $("#do_number").css("background-color", "white");
        $("#warehouse1").css("background-color", "white");
        $("#warehouse2").css("background-color", "white");
        $("#warehouse3").css("background-color", "white");
    });
</script>

<script>
    $('#AddToDetail').on('click', function(e) {

        var ms_type = $(".materialSource").val();

        e.preventDefault(); // in chase you change to a link or button
        $(".tableShowHideSupp").show();
        $("#FileReceipt").show();
        $("#AddToDetail").prop("disabled", true);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        if (ms_type == "Supplier to Site") {
            $.ajax({
                type: 'GET',
                url: '{!! route("MaterialReceive.MaterialReceiveListDataPO") !!}?purchase_order_id=' + $("#purchase_order_id").val(),
                success: function(data) {

                    var no = 1;
                    applied = 0;
                    TotalBudgetSelected = 0;
                    status = "";
                    statusDisplay = [];
                    statusDisplay2 = [];
                    statusForm = [];
                    $.each(data, function(key, value) {
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

                        var html = '<tr>' +

                            '<input name="getProductId[]" value="' + value.Product_RefID + '" type="hidden">' +
                            '<input name="getProductName[]" value="' + value.ProductName + '" type="hidden">' +
                            '<input name="getQty[]" id="budget_qty' + key + '" value="' + value.Quantity + '" type="hidden">' +
                            '<input name="getPrice[]" id="budget_price' + key + '" value="' + value.ProductUnitPriceCurrencyValue + '" type="hidden">' +
                            '<input name="getUom[]" value="' + value.QuantityUnitName + '" type="hidden">' +
                            '<input name="getCurrency[]" value="' + value.PriceCurrencyISOCode + '" type="hidden">' +
                            '<input name="getTotal[]" value="' + value.PriceBaseCurrencyValue + '" type="hidden">' +
                            '<input name="combinedBudget" value="' + value.sys_ID + '" type="hidden">' +
                            '<input name="getTrano[]" value="' + $("#purchase_order").val() + '" type="hidden">' +

                            '<td style="border:1px solid #e9ecef;">' + $("#purchase_order").val() + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.Product_RefID + '</td>' +
                            '<td style="border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + value.ProductName + '">' + value.ProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + currencyTotal(value.Quantity) + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + currencyTotal(value.Quantity) + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.QuantityUnitName + '</td>' +

                            '<td class="sticky-col second-col-dor-qty" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req' + key + '" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" ' + statusForm[key] + '>' + '</td>' +
                            '<td class="sticky-col first-col-dor-note" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="note_req' + key + '" style="border-radius:0;" name="note_req[]" class="form-control note_req" autocomplete="off" ' + statusForm[key] + '>' + '</td>' +

                            '</tr>';

                        $('table.TableMaterialResource tbody').append(html);

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
        } else {
            $.ajax({
                type: 'GET',
                url: '{!! route("MaterialReceive.MaterialReceiveListDataDO") !!}?delivery_order_id=' + $("#delivery_order_id").val(),
                success: function(data) {

                    var no = 1;
                    applied = 0;
                    TotalBudgetSelected = 0;
                    status = "";
                    statusDisplay = [];
                    statusDisplay2 = [];
                    statusForm = [];
                    $.each(data, function(key, value) {
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

                        var html = '<tr>' +

                            '<input name="getProductId[]" value="' + value.Product_RefID + '" type="hidden">' +
                            '<input name="getProductName[]" value="' + value.ProductName + '" type="hidden">' +
                            '<input name="getQty[]" id="budget_qty' + key + '" value="' + value.Quantity + '" type="hidden">' +
                            '<input name="getPrice[]" id="budget_price' + key + '" value="' + value.ProductUnitPriceCurrencyValue + '" type="hidden">' +
                            '<input name="getUom[]" value="' + value.QuantityUnitName + '" type="hidden">' +
                            '<input name="getCurrency[]" value="' + value.PriceCurrencyISOCode + '" type="hidden">' +
                            '<input name="getTotal[]" value="' + value.PriceBaseCurrencyValue + '" type="hidden">' +
                            '<input name="combinedBudget" value="' + value.sys_ID + '" type="hidden">' +
                            '<input name="getTrano[]" value="' + $("#delivery_order").val() + '" type="hidden">' +

                            '<td style="border:1px solid #e9ecef;">' + $("#delivery_order").val() + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.Product_RefID + '</td>' +
                            '<td style="border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + value.ProductName + '">' + value.ProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + currencyTotal(value.Quantity) + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + currencyTotal(value.Quantity) + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.QuantityUnitName + '</td>' +

                            '<td class="sticky-col second-col-dor-qty" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req' + key + '" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" ' + statusForm[key] + '>' + '</td>' +
                            '<td class="sticky-col first-col-dor-note" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="note_req' + key + '" style="border-radius:0;" name="note_req[]" class="form-control note_req" autocomplete="off" ' + statusForm[key] + '>' + '</td>' +

                            '</tr>';

                        $('table.TableMaterialResource tbody').append(html);

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
        }
    });
</script>


<script>
    function addFromDetailtoCartJs() {

        $('#TableMaterialReceiveCart').find('tbody').empty();

        $("#SubmitMaterialReceive").prop("disabled", false);
        $(".MaterialReceiveCart").show();

        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getTrano = $("input[name='getTrano[]']").map(function() {
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
        var qty_req = $("input[name='qty_req[]']").map(function() {
            return $(this).val();
        }).get();
        var note_req = $("input[name='note_req[]']").map(function() {
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
                    '<input type="hidden" name="var_currency[]" value="' + getCurrency[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +

                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getTrano[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + putProductName + '">' + putProductName + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getUom[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + note_req[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + qty_req[index] + '</td>' +

                    '</tr>';

                $('table.TableMaterialReceiveCart tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                // $("#GrandTotal").html(currencyTotal(TotalBudgetSelected));
                $("#TotalQty").html(currencyTotal(TotalQty));

                $("#SubmitDo").prop("disabled", false);
            }
        });

    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#ms_type").html("");
        $(".materialSource").on('click', function(e) {
            e.preventDefault();
            var valType = $(".materialSource").val();


            $('.TableMaterialReceiveCart').find('tbody').empty();
            $('.TableMaterialResource').find('tbody').empty();


            if (valType == "Supplier to Site") {
                $(".headerMaterialReceive1").show();
                $(".headerMaterialReceive2").hide();
                $("#ms_type").html("Purchase Order");
            } else if (valType == "Warehouse to Warehouse") {
                $(".headerMaterialReceive2").show();
                $(".headerMaterialReceive1").hide();
                $("#ms_type").html("Delivery Order");
            }
        });
    });
</script>


<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {
            var qtyReq = $(this).val();
            var putQty = $('#totalBalance').val();
            if (parseFloat(qtyReq) == '') {
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Quantity Request is Over", "error");
                $("#qtyCek").val("");
                $("#qtyCek").css("border", "1px solid red");
            } else {
                $("#qtyCek").css("border", "1px solid #ced4da");
            }
        });
    });
</script>

<script type="text/javascript">
    function CancelMaterialReceive() {
        ShowLoading();
        window.location.href = '/MaterialReceive?var=1';
    }
</script>

<script>
    $(function() {
        $("#FormSubmitMaterialReceive").on("submit", function(e) { //id of form 
            e.preventDefault();

            var po_number = $("#po_number").val();
            var cek = 0;
            if (po_number !== "") {
                var remarkPo = $("#remarkPo").val();
                var headerWarehouse1 = $("#headerWarehouse1").val();
                $("#remarkPo").css("border", "1px solid #ced4da");
                $("#headerWarehouse1").css("border", "1px solid #ced4da");
                if (remarkPo === "") {
                    $("#remarkPo").focus();
                    $("#remarkPo").attr('required', true);
                    $("#remarkPo").css("border", "1px solid red");
                } else if (headerWarehouse1 === "") {
                    $("#headerWarehouse1").focus();
                    $("#headerWarehouse1").attr('required', true);
                    $("#headerWarehouse1").css("border", "1px solid red");
                } else {
                    cek = 1;
                }
            } else {
                var remarkDo = $("#remarkDo").val();
                $("#remarkDo").css("border", "1px solid #ced4da");
                if (remarkDo === "") {
                    $("#remarkDo").focus();
                    $("#remarkDo").attr('required', true);
                    $("#remarkDo").css("border", "1px solid red");
                } else {
                    cek = 1;
                }
            }

            if (cek === 1) {

                var varFileUpload_UniqueID = "Upload";
                window['JSFunc_GetActionPanel_CommitFromOutside_' + varFileUpload_UniqueID]();

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
                                    html: 'Data has been saved',
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

                                        window.location.href = '/MaterialReceive?var=1';
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

                                window.location.href = '/MaterialReceive?var=1';
                            }
                        })
                    }
                })
            }
        });

    });
</script>

<script>
    function TableSearchPoInMaterialReceive(data) {
        $('.TableSearchPoInMaterialReceive').find('tbody').empty();
        var no = 1;
        t = $('#TableSearchPoInMaterialReceive').DataTable();
        t.clear().draw();

        var keys = 0;

        $.each(data, function(key, val) {
            keys += 1;
            t.row.add([
                '<tbody><tr><input id="purchase_order_id' + keys + '" value="' + val.Sys_ID + '" type="hidden"><input id="supplier_id' + keys + '" value="' + val.RequesterWorkerJobsPosition_RefID + '" type="hidden"><input id="budget_name' + keys + '" value="' + val.CombinedBudgetName + '" type="hidden"><td>' + no++ + '</td>',
                '<td>' + val.DocumentNumber + '</td>',
                '<td>' + val.CombinedBudgetCode + '</td>',
                '<td>' + val.CombinedBudgetSectionCode + '</td>',
                '<td>' + val.RequesterWorkerName + '</td></tr></tbody>'
            ]).draw();

        });
    }
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

                TableSearchPoInMaterialReceive(data);

            }
        });
    });
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

                    TableSearchPoInMaterialReceive(data);

                }
            })
        });
    });
</script>


<script>
    var keys = 0;

    $('#TableSearchPoInMaterialReceive tbody').on('click', 'tr', function() {

        $("#mySearchPurchaseOrder").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var purchase_order_id = $('#purchase_order_id' + id).val();
        var purchase_order = row.find("td:nth-child(2)").text();
        var budget_code = row.find("td:nth-child(3)").text();
        var budget_name = $('#budget_name' + id).val();
        var supplier_id = $('#supplier_id' + id).val();
        var supplier_name = row.find("td:nth-child(5)").text();
        $("#purchase_order_id").val(purchase_order_id);
        $("#purchase_order").val(purchase_order);
        $("#budget_code_po").val(budget_code);
        $("#budget_name_po").val(budget_name);
        $("#supplier_code_po").val(supplier_id);
        $("#supplier_name_po").val(supplier_name);

    });
</script>


<script>
    function TableSearchDoInMaterialReceive(data) {
        $('.TableSearchDoInMaterialReceive').find('tbody').empty();
        var no = 1;
        t = $('#TableSearchDoInMaterialReceive').DataTable();
        t.clear().draw();

        var keys = 0;

        $.each(data, function(key, val) {
            keys += 1;
            t.row.add([
                '<tbody><tr><input id="delivery_order_id' + keys + '" value="' + val.Sys_ID + '" type="hidden"><input id="budget_name' + keys + '" value="' + val.CombinedBudgetName + '" type="hidden"><td>' + no++ + '</td>',
                '<td>' + val.DocumentNumber + '</td>',
                '<td>' + val.CombinedBudgetCode + '</td>',
                '<td>' + val.CombinedBudgetSectionCode + '</td></tr></tbody>'
            ]).draw();

        });
    }
</script>

<script>
    $('#delivery_order2').one('click', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("AdvanceRequest.AdvanceListData") !!}',
            success: function(data) {

                TableSearchDoInMaterialReceive(data);

            }
        });
    });
</script>

<script>
    $(function() {
        $("#FormSubmitSearchDeliveryOrder").on("submit", function(e) { //id of form 
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

                    TableSearchDoInMaterialReceive(data);

                }
            })
        });
    });
</script>


<script>
    var keys = 0;

    $('#TableSearchDoInMaterialReceive tbody').on('click', 'tr', function() {

        $("#mySearchDeliveryOrder").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var delivery_order_id = $('#delivery_order_id' + id).val();
        var delivery_order = row.find("td:nth-child(2)").text();
        var budget_code = row.find("td:nth-child(3)").text();
        var budget_name = $('#budget_name' + id).val();
        $("#delivery_order_id").val(delivery_order_id);
        $("#delivery_order").val(delivery_order);
        $("#budget_code_do").val(budget_code);
        $("#budget_name_do").val(budget_name);
    });
</script>