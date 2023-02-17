<script type="text/javascript">
    $(document).ready(function() {
        $(".headerDor1").hide();
        $(".headerDor2").hide();
        $(".headerDor3").hide();
        $(".headerDor4").hide();
        $("#detailPR").hide();
        $("#detailDor").hide();
        $(".detailDorList").hide();
        // $("#tableShowHideDor").hide();
        $("#headerPrNumber2").prop("disabled", true);
        $("#pr_number2").prop("disabled", true);
        $("#SubmitDor").prop("disabled", true);
        // $("#pr_number").css("background-color", "white");
    });
</script>

<script>
    function klikProject(code, name) {
        $("#projectcode").val(code);
        $("#projectname").val(name);
        $("#pr_number2").prop("disabled", false);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("DeliveryOrderRequest.DeliveryOrderRequestByBudgetID") !!}?projectcode=' + $('#projectcode').val(),
            success: function(data) {

                var no = 1;
                t = $('#tableSearchPrInDor').DataTable();
                $.each(data.DataAdvanceRequest, function(key, val) {
                    t.row.add([
                        '<tbody><tr><td>' + no++ + '</td>',
                        '<td><span data-dismiss="modal" onclick="klikPrNumberInDor(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.documentNumber + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikPrNumberInDor(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudget_RefID + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikPrNumberInDor(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudgetName + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikPrNumberInDor(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudgetSection_RefID + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikPrNumberInDor(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudgetSectionName + '</span></td>',
                    ]).draw();

                });
            }
        });
    }
</script>


<script>
    function klikPrNumberInDor(id, docNum, reqId, reqName) {
        var pr_RefID = id;
        var pr_number = docNum;
        var requester_RefID = reqId;
        var requester_name = reqName;
        $("#pr_number").val(docNum);
        $("#tableShowHideDor").show();
        $("#projectcode2").prop("disabled", true);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '{!! route("DeliveryOrderRequest.StoreValidateDeliveryOrderRequestRequester") !!}?requester_id=' + requester_RefID + '&requester_name=' + requester_name + '&requester_id2=' + $('#requester_id').val() + '&pr_RefID=' + pr_RefID,
            success: function(data) {
                var no = 1; applied = 0; TotalBudgetSelected = 0;status = ""; statusDisplay = [];statusDisplay2 = []; statusForm = [];
                if (data.status == "200") {

                    $("#requester_id").val(data.requester_id);
                    $("#requester_name").val(data.requester_name);

                    $.each(data.DataDorList, function(key, value) {

                        console.log(value);

                        // if(value.quantityAbsorption == "0.00" && value.quantity == "0.00"){
                        if(value.quantity == "0.00"){
                            var applied = 0;
                        }
                        else{
                            // var applied = Math.round(parseFloat(value.quantityAbsorption) / parseFloat(value.quantity) * 100);
                            var applied = Math.round(parseFloat(value.quantity) * 100);
                        }
                        if(applied >= 100){
                            var status = "disabled";
                        }
                        if(value.productName == "Unspecified Product"){
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
                            '<input name="getWorkId[]" value="'+ value.combinedBudget_SubSectionLevel1_RefID +'" type="hidden">' +
                            '<input name="getWorkName[]" value="'+ value.combinedBudget_SubSectionLevel1Name +'" type="hidden">' +
                            '<input name="getProductId[]" value="'+ value.product_RefID +'" type="hidden">' +
                            '<input name="getProductName[]" value="'+ value.productName +'" type="hidden">' +
                            '<input name="getQty[]" id="budget_qty'+ key +'" value="'+ value.quantity +'" type="hidden">' +
                            '<input name="getPrice[]" id="budget_price'+ key +'" value="'+ value.productUnitPriceCurrencyValue +'" type="hidden">' +
                            '<input name="getUom[]" value="'+ value.quantityUnitName +'" type="hidden">' +
                            '<input name="getCurrency[]" value="'+ value.priceBaseCurrencyISOCode +'" type="hidden">' +
                            '<input name="getTotal[]" value="'+ value.priceBaseCurrencyValue +'" type="hidden">' +
                            '<input name="combinedBudget" value="'+ value.sys_ID +'" type="hidden">' +

                            '<td style="border:1px solid #e9ecef;">' +
                            '&nbsp;&nbsp;&nbsp;<div class="progress '+ status +' progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                            '</td>' +
                            
                            '<td style="border:1px solid #e9ecef;">' + '<span>' + pr_number + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="putProductId'+ key +'">' + value.product_RefID + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="putProductName'+ key +'">' + value.productName + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span>' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +

                            '<td class="sticky-col first-col" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req'+ key +'" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +

                            '</tr>';

                        $('table.TablePrDetailDor tbody').append(html);
                        
                        //VALIDASI QTY
                        $('#qty_req'+key).keyup(function() {
                            $(this).val(currency($(this).val()));
                            var qty_val = $(this).val().replace(/,/g, '');
                            var budget_qty_val = $("#budget_qty"+key).val();

                            if (qty_val == "") {
                                $('#total_req'+key).val("");
                                $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                            }
                            else if (parseFloat(qty_val) > parseFloat(budget_qty_val)) {

                                swal({
                                    onOpen: function () {
                                        swal.disableConfirmButton();
                                        Swal.fire("Error !", "Qty is over budget !", "error");
                                    }
                                });

                                $('#qty_req'+key).val("");
                                $('#qty_req'+key).css("border", "1px solid red");
                                $('#qty_req'+key).focus();
                            }
                            else {
                                $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                            }
                        });

                    });
                } else if (data.status == "501") {
                    Swal.fire("Cancelled", "You have chosen this number !", "error");
                } else {
                    Swal.fire("Cancelled", "Please use same requester !", "error");
                }
            },
        });
    }
</script>

<script>
    function addFromDetailtoCartJs() {

        $('#TableDorCart').find('tbody').empty();

        $(".detailDorList").show();
        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getWorkId = $("input[name='getWorkId[]']").map(function(){return $(this).val();}).get();
        var getWorkName = $("input[name='getWorkName[]']").map(function(){return $(this).val();}).get();
        var getProductId = $("input[name='getProductId[]']").map(function(){return $(this).val();}).get();
        var getProductName = $("input[name='getProductName[]']").map(function(){return $(this).val();}).get();
        var getUom = $("input[name='getUom[]']").map(function(){return $(this).val();}).get();
        var getCurrency = $("input[name='getCurrency[]']").map(function(){return $(this).val();}).get();
        var getPrice = $("input[name='getPrice[]']").map(function(){return $(this).val();}).get();
        var getTotal = $("input[name='getTotal[]']").map(function(){return $(this).val();}).get();
        
        var qty_req = $("input[name='qty_req[]']").map(function(){return $(this).val();}).get();

        var combinedBudget = $("input[name='combinedBudget']").val();

        var TotalBudgetSelected = 0;
        var TotalQty = 0;

        $.each(qty_req, function(index, data) {
            if(qty_req[index] != "" && qty_req[index] > "0.00" && qty_req[index] != "NaN.00"){

                var putProductId = getProductId[index];
                var putProductName = getProductName[index];

                if(getProductName[index] == "Unspecified Product"){
                    var putProductId = $("#putProductId"+index).val();
                    var putProductName = $("#putProductName"+index).html();
                }
                TotalBudgetSelected += +qty_req[index].replace(/,/g, '');
                TotalQty+= +qty_req[index].replace(/,/g, '');
                var html = '<tr>' +

                    '<input type="hidden" name="var_product_id[]" value="' + putProductId + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity[]" class="qty_req2'+ index +'" data-id="'+ index +'" value="' + currencyTotal(qty_req[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_price[]" class="price_req2'+ index +'" value="' + currencyTotal(getPrice[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + getCurrency[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +
                    
                    // '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkName[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkId[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getPrice[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + qty_req[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + currencyTotal(getTotal[index]).replace(/,/g, '') + '</td>' +
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
    function CancelDor() {
        $("#loading").show();
        $(".loader").show();
        window.location.href = '/DeliveryOrderRequest?var=1';
    }
</script>

<script>
    $(function() {
        $("#FormSubmitDor").on("submit", function(e) { //id of form 
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
                                $("#loading").show();
                                $(".loader").show();

                                window.location.href = '/DeliveryOrderRequest?var=1';
                            }
                        })
                    }
                })
            }
        });

    });
</script>