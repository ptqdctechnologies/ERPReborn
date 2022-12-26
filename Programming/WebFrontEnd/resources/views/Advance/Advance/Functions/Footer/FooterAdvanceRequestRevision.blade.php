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
    //GET ARF LIST 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var advance_RefID = $("#var_recordID").val();
    var TotalBudgetSelected = 0;
    var TotalQty = 0;

    $.ajax({
        type: "POST",
        url: '{!! route("AdvanceRequest.AdvanceListCartRevision") !!}?advance_RefID=' + advance_RefID,
        success: function(data) {

            $.each(data, function(key, value) {
                
                TotalBudgetSelected += +value.priceBaseCurrencyValue.replace(/,/g, '');
                TotalQty+= +value.quantity.replace(/,/g, '');
                
                var html =
                    '<tr>' +
                    '<input type="hidden" name="var_product_id[]" value="' + value.product_RefID + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + value.productName + '">' +
                    '<input type="hidden" name="var_quantity[]" value="' + value.quantity + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + value.quantityUnitName + '">' +
                    '<input type="hidden" name="var_price[]" value="' + value.productUnitPriceCurrencyValue + '">' +
                    '<input type="hidden" name="var_totalPrice[]" value="' + value.priceBaseCurrencyValue + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + value.priceCurrencyISOCode + '">' +
                    '<input type="hidden" name="var_combinedBudget[]" value="' + value.combinedBudgetSectionDetail_RefID + '">' +
                    '<input type="hidden" name="var_recordIDDetail[]" value="' + value.sys_ID + '">' +
                    
                    '<td style="border:1px solid #e9ecef;">' + value.combinedBudget_SubSectionLevel1_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.combinedBudgetSubSectionLevel1Name + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ key +'" class="price_req2'+ key +'">' + currencyTotal(value.productUnitPriceCurrencyValue) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ key +'" class="qty_req2'+ key +'">' + currencyTotal(value.quantity) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ key +'" class="total_req2'+ key +'">' + currencyTotal(value.priceBaseCurrencyValue) + '</span>' + '</td>' +
                    '</tr>';

                $('table.TableAdvance tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                $("#GrandTotal").html(currencyTotal(TotalBudgetSelected));
                $("#TotalQty").html(currencyTotal(TotalQty));
            });
        },
    });

    //GET BUDGET

    var siteCodeRevArfAfter = $("#siteCodeRevArfAfter").val();

    $.ajax({
        type: 'GET',
        url: '{!! route("getBudget") !!}?sitecode=' + siteCodeRevArfAfter,
        success: function(data) {
            var no = 1; applied = 0; TotalBudgetSelected = 0;status = ""; statusDisplay = [];statusDisplay2 = []; statusForm = [];
            $.each(data, function(key, val2) {
                if(val2.quantityAbsorption == "0.00" && val2.quantity == "0.00"){
                    var applied = 0;
                }
                else{
                    var applied = Math.round(parseFloat(val2.quantityAbsorption) / parseFloat(val2.quantity) * 100);
                }
                if(applied >= 100){
                    var status = "disabled";
                }
                if(val2.productName == "Unspecified Product"){
                    statusDisplay[key] = "";
                    statusDisplay2[key] = "none";
                    statusForm[key] = "disabled";
                }
                else{
                    statusDisplay[key] = "none";
                    statusDisplay2[key] = "";
                    statusForm[key] = "";
                }
                
                var html = '<tr>' +
                    '<input name="getWorkId[]" value="'+ val2.combinedBudgetSubSectionLevel1_RefID +'" type="hidden">' +
                    '<input name="getWorkName[]" value="'+ val2.combinedBudgetSubSectionLevel1Name +'" type="hidden">' +
                    '<input name="getProductId[]" value="'+ val2.product_RefID +'" type="hidden">' +
                    '<input name="getProductName[]" value="'+ val2.productName +'" type="hidden">' +
                    '<input name="getQty[]" id="budget_qty'+ key +'" value="'+ val2.quantityRemain +'" type="hidden">' +
                    '<input name="getPrice[]" id="budget_price'+ key +'" value="'+ val2.unitPriceBaseCurrencyValue +'" type="hidden">' +
                    '<input name="getUom[]" value="'+ val2.quantityUnitName +'" type="hidden">' +
                    '<input name="getCurrency[]" value="'+ val2.priceBaseCurrencyISOCode +'" type="hidden">' +
                    '<input name="combinedBudget" value="'+ val2.sys_ID +'" type="hidden">' +

                    '<td style="border:1px solid #e9ecef;">' +
                    '&nbsp;&nbsp;&nbsp;<div class="progress '+ status +' progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                    '</td>' +

                    '<td style="border:1px solid #e9ecef;display:'+ statusDisplay[key] +'";">' + 
                        '<div class="input-group">' +
                            '<input id="putProductId'+ key +'" style="border-radius:0;width:130px;background-color:white;" name="putProductId" class="form-control" readonly>' +
                            '<div class="input-group-append">' +
                            '<span style="border-radius:0;" class="input-group-text form-control" data-id="10">' +
                                '<a id="product_id2" data-toggle="modal" data-target="#myProduct" onclick="KeyFunction('+ key +')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                            '</span>' +
                            '</div>' +
                        '</div>' +
                    '</td>' +

                    '<td style="border:1px solid #e9ecef;display:'+ statusDisplay2[key] +'">' + '<span>' + val2.product_RefID + '</span>' + '</td>' +
                    
                    '<td style="border:1px solid #e9ecef;">' + '<span id="putProductName'+ key +'">' + val2.productName + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span">' + val2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span">' + val2.quantityRemain.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.unitPriceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span>' + "0.00" + '</span>' + '</td>' +

                    '<td class="sticky-col third-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req'+ key +'" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +
                    '<td class="sticky-col second-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="price_req'+ key +'" style="border-radius:0;" name="price_req[]" class="form-control price_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +
                    '<td class="sticky-col first-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_req'+ key +'" style="border-radius:0;background-color:white;" name="total_req[]" class="form-control total_req" autocomplete="off" disabled>' + '</td>' +

                    '</tr>';
                $('table.tableBudgetDetail tbody').append(html);
                
                //VALIDASI QTY
                $('#qty_req'+key).keyup(function() {

                    $(this).val(currency($(this).val()));

                    var qty_val = $(this).val().replace(/,/g, '');
                    var budget_qty_val = $("#budget_qty"+key).val();
                    var price_req = $("#price_req"+key).val().replace(/,/g, '');
                    var total = qty_val * price_req;

                    if (qty_val == "") {
                        $('#total_req'+key).val("");
                        $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                    }
                    else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {
                        Swal.fire("Error !", "Qty is over budget !", "error");
                        $('#qty_req'+key).val("");
                        $('#total_req'+key).val("0.00");
                        $('#qty_req'+key).css("border", "1px solid red");
                        $('#qty_req'+key).focus();
                    }
                        else {
                        $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                        $('#total_req'+key).val(currencyTotal(total));
                    }
                });

                //VALIDASI PRICE
                $('#price_req'+key).keyup(function() {

                    $(this).val(currency($(this).val()));

                    var price_val = $(this).val().replace(/,/g, '');
                    var budget_price_val = $("#budget_price"+key).val().replace(/,/g, '');
                    var qty_req = $("#qty_req"+key).val();
                    var total = price_val * qty_req;
                    
                    if (price_val == "") {
                        $('#total_req'+key).val("");
                        $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                    }
                    else if (parseFloat(price_val) > parseFloat(budget_price_val)) {
                        Swal.fire("Error !", "Price is over budget !", "error");
                        $('#price_req'+key).val("");
                        $('#total_req'+key).val("0.00");
                        $('#price_req'+key).css("border", "1px solid red");
                        $('#price_req'+key).focus();
                    }
                    else {
                        $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                        $('#total_req'+key).val(currencyTotal(total));

                    }
                });

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
            
            $.ajax({
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
                            '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditAdvance(this)" data-dismiss="modal" data-id0="' + work_id + '" data-id1="' + product_id + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + totalArfDetails + '" data-id8="' + putRemark + '" data-id9="' + totalBalance + '" data-id10="' + statusProduct + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
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
                            '<td style="border:1px solid #e9ecef;">' + work_id + '</td>' +
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

                        $("#putProductId").css("background-color", "#e9ecef");
                        $("#putProductName").css("background-color", "#e9ecef");
                        
                        $(".klikBudgetAdvanceRevision2").prop("disabled", false);
                        $(".ActionButton").prop("disabled", false);
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
    function cancelAdvance() {
        $("#loading").show();
        $(".loader").show();
        location.reload();
    }
</script>

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
