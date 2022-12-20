<script type="text/javascript">
    $(document).ready(function() {
        $(".AdvanceListCart").hide();
        $(".Remark").hide();
        $("#detailTransAvail").hide();
        $("#sitecode2").prop("disabled", true);
        $("#request_name2").prop("disabled", true);
        $("#request_name").prop("readonly", true);
        // $("#showContentBOQ3").hide();
        // $("#tableShowHideBOQ3").hide();
        $("#iconUnitPrice2").hide();
        $("#product_id2").prop("disabled", true);
        $("#submitArf").prop("disabled", true);
    });
</script>

<script>
    function klikProject(code, name) {
        $("#projectcode").val(code);
        $("#projectname").val(name);
        $("#sitecode2").prop("disabled", false);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getSite") !!}?projectcode=' + $('#projectcode').val(),
            success: function(data) {

                var no = 1;

                var t = $('#tableGetSite').DataTable();
                t.clear();
                $.each(data, function(key, val) {
                    t.row.add([
                        '<tbody><tr><td>' + no++ + '</td>',
                        '<td><span data-dismiss="modal" onclick="klikSite(\'' + val.sys_ID + '\', \'' + val.sys_Text + '\');">' + val.sys_ID + '</span></td>',
                        '<td style="border:1px solid #e9ecef;">' + val.sys_Text + '</td></tr></tbody>'
                    ]).draw();
                });
            }
        });
    }
    
</script>

<script>

    $(document).ready(function() {
    // function klikSite(code, name) {
    //     $("#sitecode").val(code);
    //     $("#sitename").val(name);
    //     $("#sitecode2").prop("disabled", true);

    //     $("#projectcode2").prop("disabled", true);
    //     $("#addToDoDetail").prop("disabled", false);
    //     $("#tableShowHideBOQ3").show();
    //     $("#request_name2").prop("disabled", false);
    //     $("#request_name").attr('required', true);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            // url: '{!! route("getBudget") !!}?sitecode=' + $('#sitecode').val(),
            url: '{!! route("getBudget") !!}?sitecode=' + 143000000000305,
            success: function(data) {
                var no = 1; applied = 0;
                $.each(data, function(key, val2) {
                    if(val2.quantityAbsorption == "0.00" && val2.quantity == "0.00"){
                        var applied = 0;
                    }
                    else{
                        var applied = Math.round(parseFloat(val2.quantityAbsorption) / parseFloat(val2.quantity) * 100);
                    }
                    var status = "";
                    if(applied >= 100){
                        var status = "disabled";
                    }
                    var html = '<tr>' +
                        '<input name="getWorkId[]" value="'+ val2.combinedBudgetSubSectionLevel1_RefID +'" type="hidden">' +
                        '<input name="getWorkName[]" value="'+ val2.combinedBudgetSubSectionLevel1Name +'" type="hidden">' +
                        '<input name="getProductId[]" value="'+ val2.product_RefID +'" type="hidden">' +
                        '<input name="getProductName[]" value="'+ val2.productName +'" type="hidden">' +
                        '<input name="getPrice[]" value="'+ val2.unitPriceBaseCurrencyValue +'" type="hidden">' +
                        '<input name="getUom[]" value="'+ val2.quantityUnitName +'" type="hidden">' +
                        '<input name="getCurrency[]" value="'+ val2.priceBaseCurrencyISOCode +'" type="hidden">' +
                        '<input name="combinedBudget" value="'+ val2.sys_ID +'" type="hidden">' +

                        '<td style="border:1px solid #e9ecef;">' +
                        '&nbsp;&nbsp;&nbsp;<div class="progress progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                        '</td>' +

                        '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.product_RefID + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.productName + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span">' + val2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span">' + val2.quantityRemain.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.unitPriceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +

                        '<td class="sticky-col third-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req'+ key +'" style="border-radius:0;" name="qty_req[]" class="form-control qty_req">' + '</td>' +
                        '<td class="sticky-col second-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="price_req'+ key +'" style="border-radius:0;" name="price_req[]" class="form-control price_req">' + '</td>' +
                        '<td class="sticky-col first-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_req'+ key +'" style="border-radius:0;" name="total_req[]" class="form-control total_req">' + '</td>' +

                        '</tr>';
                    $('table.tableBudgetDetail tbody').append(html);
                    // console.log(html);

                    $('#qty_req').focus();

                });

                // $('.klikBudgetDetail').on('click', function(e) {
                //     e.preventDefault();
                //     var $this = $(this);
                //     var workId = $this.data("id0");
                //     var productId = $this.data("id1");
                //     var qty = $this.data("id2");
                //     var price = $this.data("id3");
                //     var combinedBudget = $this.data("id4");
                //     var productName = $this.data("id5");
                //     var uom = $this.data("id6");
                //     var currency = $this.data("id7");

                //     if (productName == "Unspecified Product") {
                //         $("#product_id2").prop("disabled", false);
                //         var putProductName = "";
                //         var putProductId = "";
                //         $("#statusProduct").val("Yes");
                //         $("#putProductId").css("background-color", "white");
                //         $("#putProductName").css("background-color", "white");
                //     } else {
                //         $("#product_id2").prop("disabled", true);
                //         var putProductName = productName;
                //         var putProductId = productId;
                //         $("#statusProduct").val("No");
                //         $("#putProductId").css("background-color", "#e9ecef");
                //         $("#putProductName").css("background-color", "#e9ecef");
                //     }
                //     $("#putWorkId").val(workId);
                //     $("#putProductId").val(putProductId);
                //     $("#putProductName").val(putProductName);
                //     $("#qtyCek").val(qty);
                //     $("#putQty").val(qty);
                //     $("#putUom").val(uom);
                //     $("#priceCek").val(parseFloat(price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                //     $("#putPrice").val(price);
                //     $("#putCurrency").val(currency);
                //     $("#totalArfDetails").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                //     $("#totalBalance").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                //     $("#combinedBudget").val(combinedBudget);

                //     $(".klikBudgetDetail2").prop("disabled", true);
                //     $(".ActionButton").prop("disabled", true);
                //     $(".available").show();
                //     $("#detailTransAvail").show();
                //     $("#statusEditArf").val("No");
                // });
            }
        });
    // }
    });
</script>

<script>
    function addFromDetailtoCartJs() {

        $(".AdvanceListCart").show();
        $(".Remark").show();
        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getWorkId = $("input[name='getWorkId[]']").map(function(){return $(this).val();}).get();
        var getWorkName = $("input[name='getWorkName[]']").map(function(){return $(this).val();}).get();
        var getProductId = $("input[name='getProductId[]']").map(function(){return $(this).val();}).get();
        var getProductName = $("input[name='getProductName[]']").map(function(){return $(this).val();}).get();
        var getUom = $("input[name='getUom[]']").map(function(){return $(this).val();}).get();
        var getCurrency = $("input[name='getCurrency[]']").map(function(){return $(this).val();}).get();
        var qty_req = $("input[name='qty_req[]']").map(function(){return $(this).val();}).get();
        var price_req = $("input[name='price_req[]']").map(function(){return $(this).val();}).get();

        var combinedBudget = $("input[name='combinedBudget']").val();

        var TotalBudgetSelected = 0;
        var TotalQty = 0;

        var total_req = $("input[name='total_req[]']").map(function(){return $(this).val();}).get();
        
        $.each(total_req, function(index, data) {

            if(total_req[index] != "" && total_req[index] > 0){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    type: "POST",
                    url: '{!! route("AdvanceRequest.StoreValidateAdvance") !!}?putProductId=' + getProductId[index] + '&putWorkId=' + getWorkId[index],
                    success: function(data) {

                        TotalBudgetSelected += +total_req[index];
                        TotalQty+= +qty_req[index];
                        
                        if (data == "200") {
                            var html = '<tr>' +
                                // '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;width:7%;">' +
                                // '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="RemoveAdvance(\'' + work_id + '\', \'' + product_id + '\', \'' + totalArfDetails + '\', this);" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                                '&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditAdvance(this)" data-dismiss="modal" data-id0="' + index +'" data-id1="' + qty_req +'" data-id2="' + price_req +'" data-id3="' + total_req +'" data-id4="' + getWorkId[index] +'" data-id5="' + getProductId[index] +'" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                                '<input type="hidden" name="var_product_id[]" value="' + getProductId[index] + '">' +
                                '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + getProductName[index] + '">' +
                                '<input type="hidden" name="var_quantity[]" class="qty_req2'+ index +'" data-id="'+ index +'" value="' + qty_req[index] + '">' +
                                '<input type="hidden" name="var_uom[]" value="' + getUom[index] + '">' +
                                '<input type="hidden" name="var_price[]" class="price_req2'+ index +'" value="' + price_req[index] + '">' +
                                '<input type="hidden" name="var_total[]" class="total_req2'+ index +'" value="' + total_req[index] + '">' +
                                '<input type="hidden" name="var_currency[]" value="' + getCurrency[index] + '">' +
                                '<input type="hidden" name="var_date" value="' + date + '">' +
                                '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +
                                // '</td>' +
                                '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkId[index] + '</td>' +
                                '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkName[index] + '</td>' +
                                '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getProductId[index] + '</td>' +
                                '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getProductName[index] + '</td>' +
                                '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="qty_req2'+ index +'">' + qty_req[index] + '</span>' + '</td>' +
                                '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getUom[index] + '</td>' +
                                '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="price_req2'+ index +'">' + price_req[index] + '</span>' + '</td>' +
                                '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
                                '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="total_req2'+ index +'">' + total_req[index] + '</span>' + '</td>' +
                                '</tr>';
                            $('table.TableAdvance tbody').append(html);  

                            $("#TotalBudgetSelected").html(TotalBudgetSelected.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                            $("#TotalAdvance").html(TotalBudgetSelected.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                            $("#TotalQty").html(TotalQty.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                            $("#submitArf").prop("disabled", false);
                            $(".ActionButton").prop("disabled", false);
                            $(".ActionButtonAll").prop("disabled", false);
                            

                        } else {
                            //BLADE VIEW
                            $(".qty_req2"+index).html(qty_req[index]);
                            $(".price_req2"+index).html(price_req[index]);
                            $(".total_req2"+index).html(total_req[index]);
                            //CONTROLLER DB
                            $(".qty_req2"+index).val(qty_req[index]);
                            $(".price_req2"+index).val(price_req[index]);
                            $(".total_req2"+index).val(total_req[index]);
                            //TOTAL
                            $("#TotalBudgetSelected").html(TotalBudgetSelected.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                            $("#TotalAdvance").html(TotalBudgetSelected.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                            $("#TotalQty").html(TotalQty.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        }
                    },
                });
            }
        });
        
    }
</script>

<script>

    function RemoveAdvance(workId, ProductId, totalArfDetails, tr) {
        var i = tr.parentNode.parentNode.rowIndex;
        document.getElementById("TableAdvance").deleteRow(i);
        
        $.ajax({
            type: "POST",
            url: '{!! route("AdvanceRequest.StoreValidateAdvance2") !!}?putProductId=' + ProductId + '&putWorkId=' + workId,
        });

        var totalArfDetails = parseFloat(totalArfDetails.replace(/,/g, ''));
        var TotalAdvance = parseFloat($("#TotalAdvance").html().replace(/,/g, ''));
        $("#TotalAdvance").html(parseFloat(TotalAdvance - totalArfDetails).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }

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
                $('#totalArfDetails').val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Quantity Request is Over", "error");
                $("#qtyCek").val(0);
                $('#totalArfDetails').val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(total2) > parseFloat(total)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $('#totalArfDetails').val(0);

                $("#qtyCek").css("border", "1px solid red");
            } else {
                var totalReq = parseFloat(total2);
                $('#totalArfDetails').val(parseFloat(totalReq).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
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
                $('#totalArfDetails').val(0);
                $("#priceCek").css("border", "1px solid red");
            } else if (parseFloat(total) > parseFloat(total2)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#priceCek").val(0);
                $('#totalArfDetails').val(0);

                $("#priceCek").css("border", "1px solid red");
            } else {
                var totalReq = total;
                $('#totalArfDetails').val(parseFloat(totalReq).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#priceCek").css("border", "1px solid #ced4da");
            }

        });
    });
</script>


<script type="text/javascript">
    function ResetBudget() {
      $("input[name='qty_req[]']").val("");
      $("input[name='price_req[]']").val("");
      $("input[name='total_req[]']").val("");
    }
</script>

<script>
    $(function() {
        $("#formSubmitArf").on("submit", function(e) { //id of form 
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

                                $("#loading").hide();
                                $(".loader").hide();

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
                                        $("#loading").show();
                                        $(".loader").show();

                                        window.location.href = '/AdvanceRequest?var=1';
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
                                $("#loading").show();
                                $(".loader").show();

                                window.location.href = '/AdvanceRequest?var=1';
                            }
                        })
                    }
                })
            // }
        });

    });
</script>

<script type="text/javascript">
    function CancelAdvance() {
        $("#loading").show();
        $(".loader").show();
        window.location.href = '/AdvanceRequest?var=1';
    }
</script>