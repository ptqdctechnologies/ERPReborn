<script type="text/javascript">
    $(document).ready(function() {
        $("#detailDo").hide();
        // $(".detailDoList").hide();
        // $("#tableShowHideDo").hide();
        $("#transporter").css("background-color", "white");
        $("#searchDor").prop("disabled", true);
        $("#transporter2").prop("disabled", true);

    });
</script>

<script type="text/javascript">
    //GET DO LIST 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var trano = $("#trano").val();
    var var_recordID = $("#var_recordID").val();
    var TotalBudgetSelected = 0;
    var TotalQty = 0;

    $.ajax({
        type: "POST",
        url: '{!! route("DeliveryOrder.DeliveryOrderListCartRevision") !!}?var_recordID=' + var_recordID,
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
                    '<input type="hidden" name="var_product_id[]" value="' + value.product_RefID + '">' +
                    '<input type="hidden" name="var_product_name[]" value="' + value.productName + '">' +
                    '<input type="hidden" name="var_quantity[]" value="' + value.quantity + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + value.quantityUnitName + '">' +
                    '<input type="hidden" name="var_price[]" value="' + value.productUnitPriceCurrencyValue + '">' +
                    '<input type="hidden" name="var_totalPrice[]" value="' + value.priceBaseCurrencyValue + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + value.priceCurrencyISOCode + '">' +
                    '<input type="hidden" name="var_combinedBudget[]" value="' + value.combinedBudgetSectionDetail_RefID + '">' +
                    '<input type="hidden" name="var_recordIDDetail[]" value="' + value.sys_ID + '">' +

                    '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.combinedBudgetSubSectionLevel1_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.combinedBudgetSubSectionLevel1Name + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.remarks + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '</tr>';

                $('table.TableDoCart tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                // $("#GrandTotal").html(currencyTotal(TotalBudgetSelected));
                $("#TotalQty").html(currencyTotal(TotalQty));


                //GET DOR DETAIL
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
                    '<input name="getAverage[]" value="' + value.priceBaseCurrencyValue + '" type="hidden">' +
                    '<input name="combinedBudget" value="' + value.sys_ID + '" type="hidden">' +
                    '<input name="getRecordIDDetail[]" value="' + trano + '"  type="hidden">' +
                    '<input name="getTrano[]" value="' + trano + '" type="hidden">' +


                    '<td style="border:1px solid #e9ecef;">' +
                    '&nbsp;&nbsp;&nbsp;<div class="progress ' + status + ' progress-xs" style="height: 14px;border-radius:8px;"> @if(' + applied + ' >= ' + 0 + ' && ' + applied + ' <= ' + 40 + ')<div class="progress-bar bg-red" style="width:' + applied + '%;"></div> @elseif(' + applied + ' >= ' + 41 + ' && ' + applied + ' <= ' + 89 + ')<div class="progress-bar bg-blue" style="width:' + applied + '%;"></div> @elseif(' + applied + ' >= ' + 90 + ' && ' + applied + ' <= ' + 100 + ')<div class="progress-bar bg-green" style="width:' + applied + '%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>' + applied + ' %</center></small>' +
                    '</td>' +


                    '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + +'</td>' +

                    '<td class="sticky-col second-col-dor-qty" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req' + key + '" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" ' + statusForm[key] + ' value="' + currency(value.quantity) + '">' + '</td>' +
                    '<td class="sticky-col first-col-dor-note" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="note_req' + key + '" style="border-radius:0;" name="note_req[]" class="form-control note_req" autocomplete="off" ' + statusForm[key] + ' value="' + value.remarks + '">' + '</td>' +


                    '</tr>';
                $('table.TableDorDetail tbody').append(html);

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

        $('#TableDoCart').find('tbody').empty();

        $(".detailDoList").show();

        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getTrano = $("input[name='getTrano[]']").map(function() {
            return $(this).val();
        }).get();
        console.log(getTrano);
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


                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getTrano[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkId[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkName[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + note_req[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + qty_req[index] + '</td>' +

                    '</tr>';

                $('table.TableDoCart tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                // $("#GrandTotal").html(currencyTotal(TotalBudgetSelected));
                $("#TotalQty").html(currencyTotal(TotalQty));

                $("#SubmitDo").prop("disabled", false);
            }
        });

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
        $("#FormSubmitDoRevision").on("submit", function(e) { //id of form 
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