<script type="text/javascript">
    $(document).ready(function() {
        $(".headerDor1").hide();
        $(".headerDor2").hide();
        $(".headerDor3").hide();
        $(".headerDor4").hide();
        $("#detailPR").hide();
        $("#detailDo").hide();
        $("#headerPrNumber2").prop("disabled", true);
        $("#transporter").css("background-color", "white");
        $("#searchDor").prop("disabled", true);
        $("#SubmitDo").prop("disabled", true);
        $("#dor_number2").prop("disabled", true);
    });
</script>

<script>
    function TableSearchDorInDo(data) {
        $('.TableSearchDorInDo').find('tbody').empty();
        var no = 1;
        t = $('#TableSearchDorInDo').DataTable();
        t.clear().draw();

        var keys = 0;

        $.each(data, function(key, val) {
            keys += 1;
            t.row.add([
                '<tbody><tr><input id="delivery_order_request_id' + keys + '" value="' + val.Sys_ID + '" type="hidden"><input id="supplier_id' + keys + '" value="' + val.RequesterWorkerJobsPosition_RefID + '" type="hidden"><td>' + no++ + '</td>',
                '<td>' + val.DocumentNumber + '</td>',
                '<td>' + val.CombinedBudgetCode + '</td>',
                '<td>' + val.CombinedBudgetSectionCode + '</td>',
                '<td>' + val.RequesterWorkerName + '</td></tr></tbody>'
            ]).draw();

        });
    }
</script>

<script>
    $('#delivery_order_request2').one('click', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("AdvanceRequest.AdvanceListData") !!}',
            success: function(data) {

                TableSearchDorInDo(data);

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

                    TableSearchDorInDo(data);

                }
            })
        });
    });
</script>



<script>
    var keys = 0;

    $('#TableSearchDorInDo tbody').on('click', 'tr', function() {

        $("#mySearDeliveryOrderRequest").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var delivery_order_request_id = $('#delivery_order_request_id' + id).val();
        var delivery_order_request = row.find("td:nth-child(2)").text();
        $("#delivery_order_request").val(delivery_order_request);


        var supplier_id = $('#supplier_id' + id).val();
        var supplier = row.find("td:nth-child(5)").text();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '{!! route("DeliveryOrder.StoreValidateDeliveryOrderSupplier") !!}?supplier_id=' + supplier_id + '&supplier=' + supplier + '&delivery_order_request_id=' + delivery_order_request_id,
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
                            '<input name="getWorkId[]" value="' + value.CombinedBudgetSubSectionLevel1_RefID + '" type="hidden">' +
                            '<input name="getWorkName[]" value="' + value.CombinedBudgetSubSectionLevel1Name + '" type="hidden">' +
                            '<input name="getProductId[]" value="' + value.Product_RefID + '" type="hidden">' +
                            '<input name="getProductName[]" value="' + value.ProductName + '" type="hidden">' +
                            '<input name="getQty[]" id="budget_qty' + keys + '" value="' + value.Quantity + '" type="hidden">' +
                            '<input name="getPrice[]" id="budget_price' + keys + '" value="' + value.ProductUnitPriceCurrencyValue + '" type="hidden">' +
                            '<input name="getUom[]" value="' + value.QuantityUnitName + '" type="hidden">' +
                            '<input name="getCurrency[]" value="' + value.ProductUnitPriceCurrencyISOCode + '" type="hidden">' +
                            '<input name="getTotal[]" value="' + value.PriceBaseCurrencyValue + '" type="hidden">' +
                            '<input name="combinedBudget" value="' + value.sys_ID + '" type="hidden">' +
                            '<input name="getTrano[]" value="' + delivery_order_request + '" type="hidden">' +

                            '<td style="border:1px solid #e9ecef;">' + '<span>' + delivery_order_request + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.Product_RefID + '</td>' +
                            '<td style="border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + value.ProductName + '">' + value.ProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.ProductUnitPriceCurrencyISOCode + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + currencyTotal(value.Quantity) + '</td>' +

                            '<td class="sticky-col second-col-dor-qty" style="border:1px solid #e9ecef;background-color:white;">' + '<input onkeyup="total_req(' + keys + ', this)" onkeypress="return isNumberKey(this, event);" id="total_req' + keys + '" style="border-radius:0;" name="total_req[]" class="form-control total_req" autocomplete="off" ' + statusForm[keys] + '>' + '</td>' +
                            '<td class="sticky-col first-col-dor-note" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="note_req' + keys + '" style="border-radius:0;" name="note_req[]" class="form-control note_req" autocomplete="off" ' + statusForm[keys] + '>' + '</td>' +

                            '</tr>';

                        $('table.TableDorDetail tbody').append(html);
                    });
                } else if (data.status == "501") {
                    Swal.fire("Cancelled", "You have chosen this number !", "error");
                } else {
                    Swal.fire("Cancelled", "Please use same requester !", "error");
                }
            },
        });
    });
    //VALIDASI QTY
    function total_req(key, value) {
        var qty_val = (value.value).replace(/,/g, '');
        var budget_qty_val = $("#budget_qty" + key).val();

        if (qty_val == "") {
            $("input[name='total_req[]']").css("border", "1px solid #ced4da");
        } else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {

            swal({
                onOpen: function() {
                    swal.disableConfirmButton();
                    Swal.fire("Error !", "Qty is over budget !", "error");
                }
            });

            $('#total_req' + key).val("");
            $('#total_req' + key).css("border", "1px solid red");
            $('#total_req' + key).focus();
        } else {
            $("input[name='total_req[]']").css("border", "1px solid #ced4da");
        }
        //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
        TotalBudgetSelected();
    }
</script>

<script>
    function addFromDetailtoCartJs() {

        $('#TableDoCart').find('tbody').empty();

        $(".detailDoList").show();

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
        var total_req = $("input[name='total_req[]']").map(function() {
            return $(this).val();
        }).get();
        var note_req = $("input[name='note_req[]']").map(function() {
            return $(this).val();
        }).get();

        var combinedBudget = $("input[name='combinedBudget']").val();

        var TotalBudgetSelectedTamp = 0;
        var TotalQty = 0;

        $.each(total_req, function(index, data) {
            if (total_req[index] != "" && total_req[index] > "0.00" && total_req[index] != "NaN.00") {

                var putProductId = getProductId[index];
                var putProductName = getProductName[index];

                if (getProductName[index] == "Unspecified Product") {
                    var putProductId = $("#putProductId" + index).val();
                    var putProductName = $("#putProductName" + index).html();
                }
                TotalBudgetSelectedTamp += +total_req[index].replace(/,/g, '');
                TotalQty += +total_req[index].replace(/,/g, '');
                var html = '<tr>' +

                    '<input type="hidden" name="var_product_id[]" value="' + putProductId + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity[]" class="total_req2' + index + '" data-id="' + index + '" value="' + currencyTotal(total_req[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + getCurrency[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +


                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getTrano[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + note_req[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + currencyTotal(total_req[index]) + '</td>' +

                    '</tr>';

                $('table.TableDoCart tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelectedTamp));
                // $("#GrandTotal").html(currencyTotal(TotalBudgetSelectedTamp));
                $("#TotalQty").html(currencyTotal(TotalQty));

                $("#SubmitDo").prop("disabled", false);
            }
        });

    }
</script>

<script>
    function klikTransporter(code, name, address, phone, fax, contact_person, handphone) {
        $("#transporter").val(name);
        $("#address").val(address);
        $("#phone").val(phone);
        $("#fax").val(fax);
        $("#contact_person").val(contact_person);
        $("#handphone").val(handphone);
    }
</script>

<script type="text/javascript">
    function CancelDo() {
        ShowLoading();
        window.location.href = '/DeliveryOrder?var=1';
    }
</script>



<script>
    $(function() {
        $("#FormSubmitDo").on("submit", function(e) { //id of form 
            e.preventDefault();

            // var valRequestName = $("#request_name").val();
            // var valRemark = $("#putRemark").val();
            // $("#request_name").css("border", "1px solid #ced4da");
            // $("#putRemark").css("border", "1px solid #ced4da");

            // if (valRequestName === "") {
            //     $("#request_name").focus();
            //     $("#request_name").attr('required', true);
            //     $("#request_name").css("border", "1px solid red");
            // } else if (valRemark === "") {
            //     $("#putRemark").focus();
            //     $("#putRemark").attr('required', true);
            //     $("#putRemark").css("border", "1px solid red");
            // } else {
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
                                    window.location.href = '/DeliveryOrder?var=1';
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
                            window.location.href = '/DeliveryOrder?var=1';
                        }
                    })
                }
            })
            // }
        });

    });
</script>