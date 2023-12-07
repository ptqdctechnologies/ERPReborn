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
        $("#addToPoDetail").prop("disabled", true);
        $("#po_number").css("background-color", "white");
        $("#warehouse1").css("background-color", "white");
        $("#do_number").css("background-color", "white");
        $("#warehouse1").css("background-color", "white");
        $("#warehouse2").css("background-color", "white");
        $("#warehouse3").css("background-color", "white");
    });
</script>

<script>
    $('#TablePoNumber tbody').on('click', 'tr', function() {

        $("#myPoNumber").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_budget' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#po_number").val(code);
        $("#sitecode").val("143000000000300");
        $(".projectcode").val("143000000000300");
        $("#projectcode2").val("Pengadaan jasa elektrifikasi PI 402 (Kluster KMJ 11, KMJ9, dan KMJ 24) di PT PGE area Kamojang");
        $("#supplier_code").val("VDR2279");
        $("#supplier_code2").val("Infra Media Dinamika");
        $("#netActMaterialReceive").val("");
        $("#addToPoDetail").prop("disabled", false);

    });
</script>


<script>
    $('#TableDoNumber tbody').on('click', 'tr', function() {

        $("#myDoNumber").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_budget' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();


        $("#do_number").val(code);
        $("#sitecode").val("143000000000300");
        $(".projectcode").val("143000000000300");
        $("#projectcode4").val("Pengadaan jasa elektrifikasi PI 402 (Kluster KMJ 11, KMJ9, dan KMJ 24) di PT PGE area Kamojang");
        // $("#remarkMaterialReceive2").val("Tagihan Listrik Infra media dinamika bulan Mei 2022.");
        $("#warehouse2").val("Head Office Jakarta");
        $("#warehouse3").val("Pasar Jatinegara");
        $("#addToPoDetail").prop("disabled", false);

    });
</script>


<script>
    $('#addToPoDetail').on('click', function(e) {
        e.preventDefault(); // in chase you change to a link or button
        $(".tableShowHideSupp").show();
        $("#FileReceipt").show();
        $("#addToPoDetail").prop("disabled", true);

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
                applied = 0;
                TotalBudgetSelected = 0;
                status = "";
                statusDisplay = [];
                statusDisplay2 = [];
                statusForm = [];
                $.each(data, function(key, value) {
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

                    var html = '<tr>' +

                        '<input name="getWorkId[]" value="' + value.combinedBudgetSubSectionLevel1_RefID + '" type="hidden">' +
                        '<input name="getWorkName[]" value="' + value.combinedBudgetSubSectionLevel1Name + '" type="hidden">' +
                        '<input name="getProductId[]" value="' + value.product_RefID + '" type="hidden">' +
                        '<input name="getProductName[]" value="' + value.productName + '" type="hidden">' +
                        '<input name="getQty[]" id="budget_qty' + key + '" value="' + value.quantity + '" type="hidden">' +
                        '<input name="getPrice[]" id="budget_price' + key + '" value="' + value.productUnitPriceCurrencyValue + '" type="hidden">' +
                        '<input name="getUom[]" value="' + value.quantityUnitName + '" type="hidden">' +
                        '<input name="getCurrency[]" value="' + value.priceCurrencyISOCode + '" type="hidden">' +
                        '<input name="getTotal[]" value="' + value.priceBaseCurrencyValue + '" type="hidden">' +
                        '<input name="combinedBudget" value="' + value.sys_ID + '" type="hidden">' +

                        '<td style="border:1px solid #e9ecef;">' +
                        '&nbsp;&nbsp;&nbsp;<div class="progress ' + status + ' progress-xs" style="height: 14px;border-radius:8px;"> @if(' + applied + ' >= ' + 0 + ' && ' + applied + ' <= ' + 40 + ')<div class="progress-bar bg-red" style="width:' + applied + '%;"></div> @elseif(' + applied + ' >= ' + 41 + ' && ' + applied + ' <= ' + 89 + ')<div class="progress-bar bg-blue" style="width:' + applied + '%;"></div> @elseif(' + applied + ' >= ' + 90 + ' && ' + applied + ' <= ' + 100 + ')<div class="progress-bar bg-green" style="width:' + applied + '%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>' + applied + ' %</center></small>' +
                        '</td>' +

                        '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.quantityRemain.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +

                        '<td class="sticky-col second-col-dor-qty" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req' + key + '" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" ' + statusForm[key] + '>' + '</td>' +
                        '<td class="sticky-col first-col-dor-note" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="note_req' + key + '" style="border-radius:0;" name="note_req[]" class="form-control note_req" autocomplete="off" ' + statusForm[key] + '>' + '</td>' +

                        '</tr>';

                    $('table.tablePoDetailMaterialReceive tbody').append(html);

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
    });
</script>


<script>
    function addFromDetailtoCartJs() {

        $('#TableMaterialReceiveCart').find('tbody').empty();

        $("#SubmitMaterialReceive").prop("disabled", false);
        $(".MaterialReceiveCart").show();

        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
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


                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkId[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
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
        $(".materialSource").on('click', function(e) {
            e.preventDefault();
            var valType = $(".materialSource").val();

            if (valType == "Supplier to Site") {
                $(".headerMaterialReceive1").show();
                $(".headerMaterialReceive2").hide();
            } else if (valType == "Warehouse to Warehouse") {
                $(".headerMaterialReceive2").show();
                $(".headerMaterialReceive1").hide();
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