<script type="text/javascript">
  $(document).ready(function() {
    $("#FollowingCondition").hide();
    $("#brfhide3").hide();
    $("#brfhide4").hide();
    $(".FormTransportDetails").hide();
    $(".brfhide6").hide();
    $(".budgetDetail").hide();
    $(".tableShowHideBOQ3").hide();
    $("#sitecode2").prop("disabled", true);
    $("#request_name2").prop("disabled", true);
    // $("#saveBrfList").prop("disabled", true);
    $("#dateEnd").prop("disabled", true);
    $("#dateEnd").css("background-color", "white");
    $("#dateArrival").prop("disabled", true);
    $("#dateArrival").css("background-color", "white");
    $("#putProductId2").prop("disabled", true);
    $("#sequenceRequest").prop("disabled", true);
    $(".FollowingCondition").hide();
    $(".TransportDetails").hide();

    $('.paymentSequence').attr('colspan', 4);

    $(".a_airport_tax").hide();
    $(".a_extra_baggage_charge").hide();
    $(".a_ticket_fare").hide();
    $(".b_ticket_fare").hide();
    $(".m_ticket_fare").hide();
    $(".cc_fuel_charge").hide();
    $(".cc_parking_charge").hide();
    $(".cc_toll_charge").hide();
    $(".cm_fuel_charge").hide();
    $(".cm_parking_charge").hide();
    $(".cm_toll_charge").hide();
    $(".ec_compensation_fee").hide();
    $(".ec_fuel_charge").hide();
    $(".ec_parking_charge").hide();
    $(".ec_toll_charge").hide();
    $(".em_compensation_fee").hide();
    $(".em_fuel_charge").hide();
    $(".em_parking_charge").hide();
    $(".em_toll_charge").hide();
    $(".ib_ticket_fare").hide();
    $(".it_ticket_fare").hide();
    $(".it_extra_baggage_charge").hide();
    $(".s_ticket_fare").hide();
    $(".tb_rental_fee").hide();
    $(".tb_fuel_charge").hide();
    $(".tb_parking_charge").hide();
    $(".tb_toll_charge").hide();
    $(".t_driver_fee").hide();
    $(".t_rental_fee").hide();
    $(".t_fuel_charge").hide();
    $(".t_parking_charge").hide();
    $(".t_toll_charge").hide();


  });
</script>


<script>
  function klikProject(sys_ID, code, name) {
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
      url: '{!! route("getSite") !!}?projectcode=' + sys_ID,
      success: function(data) {

        var no = 1;

        var t = $('#tableGetSite').DataTable();
        t.clear();
        $.each(data, function(key, val) {
          t.row.add([
            '<tbody><tr><td><span data-dismiss="modal" onclick="klikSite(\'' + val.sys_ID + '\', \'' + val.code + '\', \'' + val.name + '\');">' + no++ + '</span></td>',
            '<td><span data-dismiss="modal" onclick="klikSite(\'' + val.sys_ID + '\', \'' + val.code + '\', \'' + val.name + '\');">' + val.code + '</span></td>',
            '<td><span data-dismiss="modal" onclick="klikSite(\'' + val.sys_ID + '\', \'' + val.code + '\', \'' + val.name + '\');">' + val.name + '</span></td></tr></tbody>'
          ]).draw();
        });
      }
    });
  }
</script>

<script>

    // $(document).ready(function() {
    function klikSite(sys_ID, code, name) {
        $("#sitecode").val(code);
        $("#sitename").val(name);
        $("#sitecode2").prop("disabled", true);

        $("#projectcode2").prop("disabled", true);
        $("#addToDoDetail").prop("disabled", false);
        $(".tableShowHideBOQ3").show();
        $("#request_name2").prop("disabled", false);
        $("#beneficiary_name2").prop("disabled", false);
        $("#bank_name2").prop("disabled", false);


        $(".file-attachment").show();
        $(".advance-detail").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBudget") !!}?sitecode=' + sys_ID,
            // url: '{!! route("getBudget") !!}?sitecode=' + 143000000000305,
            success: function(data) {
                var no = 1; applied = 0; status = ""; statusDisplay = [];statusDisplay2 = []; statusForm = [];
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
                        '<input name="getQtyId[]" value="'+ val2.quantityUnit_RefID +'" type="hidden">' +
                        '<input name="getQty[]" id="budget_qty'+ key +'" value="'+ val2.quantityRemain +'" type="hidden">' +
                        '<input name="getPrice[]" id="budget_price'+ key +'" value="'+ val2.unitPriceBaseCurrencyValue +'" type="hidden">' +
                        '<input name="getUom[]" value="'+ val2.quantityUnitName +'" type="hidden">' +
                        '<input name="getCurrency[]" value="'+ val2.priceBaseCurrencyISOCode +'" type="hidden">' +
                        '<input name="getCurrencyId[]" value="'+ val2.sys_BaseCurrency_RefID +'" type="hidden">' +
                        '<input name="combinedBudgetSectionDetail_RefID[]" value="'+ val2.sys_ID +'" type="hidden">' +
                        '<input name="combinedBudget_RefID" value="'+ val2.combinedBudget_RefID +'" type="hidden">' +

                        '<td style="border:1px solid #e9ecef;">' +
                        '&nbsp;&nbsp;&nbsp;<div class="progress '+ status +' progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                        '</td>' +

                        '<td style="border:1px solid #e9ecef;display:'+ statusDisplay[key] +'";">' + 
                            '<div class="input-group">' +
                                '<input id="putProductId'+ key +'" style="border-radius:0;width:130px;background-color:white;" name="putProductId" class="form-control" readonly>' +
                                '<div class="input-group-append">' +
                                '<span style="border-radius:0;" class="input-group-text form-control" data-id="10">' +
                                    '<a id="product_id2" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction('+ key +')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                                '</span>' +
                                '</div>' +
                            '</div>' +
                        '</td>' +

                        '<td style="border:1px solid #e9ecef;display:'+ statusDisplay2[key] +'">' + '<span>' + val2.product_RefID + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span id="putProductName'+ key +'">' + val2.productName + '</span>' + '</td>' +
                        '<input id="putUom'+ key +'" type="hidden">' +

                        '<input id="TotalBudget'+ key +'" type="hidden">' +

                        '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.unitPriceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + '<span>' + val2.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +

                        '<td class="sticky-col forth-col-brf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req'+ key +'" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +
                        '<td class="sticky-col third-col-brf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="price_req'+ key +'" style="border-radius:0;" name="price_req[]" class="form-control price_req" autocomplete="off" '+ statusForm[key] +'>' + '</td>' +
                        '<td class="sticky-col second-col-brf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_req'+ key +'" style="border-radius:0;background-color:white;" name="total_req[]" class="form-control total_req" autocomplete="off" disabled '+ statusForm[key] +'>' + '</td>' +
                        '<td class="sticky-col first-col-brf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_balance'+ key +'" style="border-radius:0;width:90px;background-color:white;" name="total_balance[]" class="form-control total_balance" autocomplete="off" disabled value="' + currencyTotal(val2.quantityRemain * val2.unitPriceBaseCurrencyValue) + '">' + '</td>' +

                        '</tr>';
                    $('table.tableBudgetDetail tbody').append(html);
                    

                    if(val2.productName == "Unspecified Product"){

                        //VALIDASI QTY
                        $('#qty_req'+key).keyup(function() {
                            $(this).val(currency($(this).val()));
                            var qty_val = $(this).val().replace(/,/g, '');
                            var budget_qty_val = $("#budget_qty"+key).val();
                            var price_req = $("#price_req"+key).val().replace(/,/g, '');
                            var total_balance = $("#total_balance"+key).val().replace(/,/g, '');
                            var total = qty_val * price_req;

                            if (qty_val == "") {
                                $('#total_req'+key).val("");
                                $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                            }
                            else if (parseFloat(total) > parseFloat(total_balance)) {

                                swal({
                                    onOpen: function () {
                                        swal.disableConfirmButton();
                                        Swal.fire("Error !", "Total request is over budget than Balance!", "error");
                                    }
                                });

                                $('#qty_req'+key).val("");
                                $('#total_req'+key).val("");
                                $('#qty_req'+key).css("border", "1px solid red");
                                $('#qty_req'+key).focus();
                                }
                            else {
                                $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                                $('#total_req'+key).val(currencyTotal(total));
                            }

                            //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                            TotalBudgetSelected();
                        });

                        //VALIDASI PRICE
                        $('#price_req'+key).keyup(function() {
                            $(this).val(currency($(this).val()));
                            var price_val = $(this).val().replace(/,/g, '');
                            var budget_price_val = $("#budget_price"+key).val().replace(/,/g, '');
                            var qty_req = $("#qty_req"+key).val();
                            var total_balance = $("#total_balance"+key).val().replace(/,/g, '');
                            var total = price_val * qty_req;
                            
                            if (price_val == "") {
                                $('#total_req'+key).val("");
                                $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                            }
                            else if (parseFloat(price_val) > parseFloat(budget_price_val)) {

                                swal({
                                    onOpen: function () {
                                        swal.disableConfirmButton();
                                        Swal.fire("Error !", "Price is over budget !", "error");
                                    }
                                });

                                $('#price_req'+key).val("");
                                $('#total_req'+key).val("");
                                $('#price_req'+key).css("border", "1px solid red");
                                $('#price_req'+key).focus();
                            }
                            else if (parseFloat(total) > parseFloat(total_balance)) {

                                swal({
                                    onOpen: function () {
                                        swal.disableConfirmButton();
                                        Swal.fire("Error !", "Total request is over budget than Balance!", "error");
                                    }
                                });

                                $('#price_req'+key).val("");
                                $('#total_req'+key).val("");
                                $('#price_req'+key).css("border", "1px solid red");
                                $('#price_req'+key).focus();
                            }
                            else {
                                $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                                $('#total_req'+key).val(currencyTotal(total));

                            }

                            //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                            TotalBudgetSelected();
                        });

                    }

                    else{

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

                                swal({
                                    onOpen: function () {
                                        swal.disableConfirmButton();
                                        Swal.fire("Error !", "Qty is over budget !", "error");
                                    }
                                });

                                $('#qty_req'+key).val("");
                                $('#total_req'+key).val("");
                                $('#qty_req'+key).css("border", "1px solid red");
                                $('#qty_req'+key).focus();
                            }
                            else {

                                $("input[name='qty_req[]']").css("border", "1px solid #ced4da");
                                $('#total_req'+key).val(currencyTotal(total));
                            }

                            //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                            TotalBudgetSelected();
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

                                swal({
                                    onOpen: function () {
                                        swal.disableConfirmButton();
                                        Swal.fire("Error !", "Price is over budget !", "error");
                                    }
                                });

                                $('#price_req'+key).val("");
                                $('#total_req'+key).val("");
                                $('#price_req'+key).css("border", "1px solid red");
                                $('#price_req'+key).focus();
                            }
                            else {

                                $("input[name='price_req[]']").css("border", "1px solid #ced4da");
                                $('#total_req'+key).val(currencyTotal(total));
                            }

                            //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
                            TotalBudgetSelected();

                        });
                    }

                });
            }
        });
    }
    // });
</script>

<script>
    function TotalBudgetSelected(){

        var TotalBudgetSelected = 0;
        var total_req = $("input[name='total_req[]']").map(function(){return $(this).val();}).get();

        $.each(total_req, function(index, data) {
            if(total_req[index] != "" && total_req[index] > "0.00" && total_req[index] != "NaN.00"){
                TotalBudgetSelected += parseFloat(total_req[index].replace(/,/g, ''));
            }
        });

        $('#TotalBudgetSelected').html(currencyTotal(TotalBudgetSelected));
        
    }
</script>

<script>

  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
  
  function addFromDetailtoCartJs() {
      
      var varTotal = 0;
      var varTotalBrf = 0;
      var y = 0;
      
      var statusDisplay = [];
      var paymentSequenceValuePerID = [];
      var paymentSequenceID = [];
      var paymentSequenceValue = [];
      
      $.each($("input[name='formPaymentSequence']:visible"), function(){
        paymentSequenceID.push($(this).data("id"));
        paymentSequenceValue.push($(this).val());
      });

      var data = [81000000000001, 81000000000003, 221000000000041, 221000000000042, 221000000000040, 221000000000031, 221000000000035, 221000000000016, 221000000000018, 221000000000017, 221000000000002, 221000000000004, 221000000000003, 221000000000029, 221000000000026, 221000000000028, 221000000000027, 221000000000014, 221000000000011, 221000000000013, 221000000000012, 221000000000033, 221000000000037, 221000000000038, 221000000000044, 221000000000006, 221000000000007, 221000000000009, 221000000000008, 221000000000021, 221000000000020, 221000000000022, 221000000000024, 221000000000023, 81000000000004];
      
      for (let index = 0; index < data.length; index++) {
    
        for (let index2 = 0; index2 < paymentSequenceID.length; index2++) {
          if(paymentSequenceID[index2] == data[index]){
            statusDisplay[index] = "";
            paymentSequenceValuePerID[index] = paymentSequenceValue[index2];
            if(paymentSequenceValue[index2] == ""){
              paymentSequenceValuePerID[index] = "0.00";
            }
            varTotal += +paymentSequenceValue[index2];

            if($("#"+paymentSequenceID[index2]).html() == ""){ $("#"+paymentSequenceID[index2]).html('0'); }
            var val_allowance = parseFloat($("#"+paymentSequenceID[index2]).html().replace(/,/g, ''));
            $("#"+paymentSequenceID[index2]).html(parseFloat(+val_allowance + +paymentSequenceValuePerID[index]).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

            break;
          }
          else{
            statusDisplay[index] = "none;";
            paymentSequenceValuePerID[index] = "";
          }
        } 
      }

      var totalPaymentSequence = paymentSequenceID.length;
      var totalBalance = $('#totalBalance').val().replace(/,/g, '');
      var budgetRequest = $('#budgetRequest').val().replace(/,/g, '');
      var varSequenceReq = $('#sequenceRequest').val();
      var varSequence = $('#sequence').val();
      var putProductId = $('#putProductId').val();
      var putProductName = $('#putProductName').val();
      var combinedBudget = $("#combinedBudget").val();

      if(putProductId === ""){
        $("#putProductId").focus();
        $("#putProductId").attr('required', true);
        $("#putProductId").css("border", "1px solid red");
      }
      else if(budgetRequest === ""){
        $("#budgetRequest").focus();
        $("#budgetRequest").attr('required', true);
        $("#budgetRequest").css("border", "1px solid red");
      }
      else if (varSequence > varSequenceReq) {
        Swal.fire("Error !", "Total Sequence more than Sequence Request", "error");
      } else {
        
        var sequence = $('#sequence').val();

        var varLoop = +varSequence + 1;
        $("#sequence").val(varLoop);

        if($("#totalCostPerProduct").val() == ""){ $("#totalCostPerProduct").val('0'); }
        var totalCostPerProduct = parseFloat($("#totalCostPerProduct").val().replace(/,/g, ''));
        $("#totalCostPerProduct").val(parseFloat(+totalCostPerProduct + +varTotal).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        var totalCostPerProduct = parseFloat($("#totalCostPerProduct").val().replace(/,/g, ''));
    
        if (parseFloat(totalCostPerProduct) > parseFloat(budgetRequest)) {
          Swal.fire("Error !", "Total Budget Request more than Budget", "error");
          var varLoop = $("#sequence").val() - 1;
          $("#sequence").val(varLoop);

          $("#totalCostPerProduct").val(parseFloat(totalCostPerProduct - varTotal).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        } else { 

            var statusEditBrf = $('#statusEditBrf').val();
            if (statusEditBrf == 'Yes') {
              $('#putProductId').val("");
              $('#putProductName').val("");
              $('#sequenceRequest').val("");
              $('#totalBalance').val("");
              $('#budgetRequest').val("");
              $('#totalCostPerProduct').val("");
              $('#sequence').val("1");
              $("#sequenceRequest").prop("disabled", false);
              $("#putSequence").val();
            }
            else{
              var putSequence = $('#TableBusinessTrip tr').length;
              $("#putSequence").val(putSequence -1);
            }
            
            if($("#totalBrf").html() == ""){ $("#totalBrf").html('0'); }
            var totalBrf = parseFloat($("#totalBrf").html().replace(/,/g, ''));
            $("#totalBrf").html(parseFloat(+totalBrf + +varTotal).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

            if($("#totalSequence").html() == ""){ $("#totalSequence").html('0'); }
            $("#totalSequence").html(+$("#totalSequence").html() + +1);
            var totalSequence = $("#totalSequence").html();

            var html2 = [];
            for (let indexx = 0; indexx < data.length; indexx++) {
              html2[indexx] = '<td style="border:1px solid #e9ecef;display:'+ statusDisplay[indexx]  +'">' + paymentSequenceValuePerID[indexx] + '</td>';
            }
            var html = '<tr>' +
              '<td style="border:1px solid #e9ecef;width:7%;">' +
              // '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="RemoveBusinessTrip(this);"  data-id1="' + allowance + '" data-id2="' + transport + '" data-id3="' + airport_tax + '" data-id4="' + accomodation + '" data-id5="' + other + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
              '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton " onclick="EditBusinessTrip(this);" data-dismiss="modal" data-id1="' + paymentSequenceValue + '" data-id2="' + putProductId + '" data-id3="' + putProductName + '" data-id4="' + $("#putSequence").val() + '" data-id5="' + varSequenceReq + '" data-id6="' + totalBalance + '" data-id7="' + budgetRequest + '" data-id8="' + totalCostPerProduct + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
              '<input type="hidden" name="var_product_id[]" value="' + putProductId + '">' +
              '<input type="hidden" name="paymentSequenceID[]" value="' + paymentSequenceID + '">' +
              '<input type="hidden" name="paymentSequenceValue[]" value="' + paymentSequenceValue + '">' +
              '<input type="hidden" name="totalSequence" value="' + totalSequence + '">' +
              '<input type="hidden" name="totalPaymentSequence" value="' + totalPaymentSequence + '">' +
              '<input type="hidden" name="var_combinedBudget" value="' + combinedBudget + '">' +
              '</td>' +
              '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + $("#putSequence").val() + '</td>' +

              html2 +
              
              '</tr>';
            
            $('table.TableBusinessTrip tbody').append(html);

            $("#statusEditBrf").val('No');
            $(".brfhide6").show();
            $("#putProductId").css("border", "1px solid #ced4da");
            $(".klikBudgetDetail2").prop("disabled", false);
            $(".ActionButton").prop("disabled", false);

            if (varSequence == varSequenceReq) {
              $('#putProductId').val("");
              $('#putProductName').val("");
              $('#sequenceRequest').val("");
              $('#budgetRequest').val("");
              $('#totalCostPerProduct').val("");
              $('#totalBalance').val("");
              $('#sequence').val("1");
              $("#saveBrfList").prop("disabled", false);
              $("#putProductId").css("background-color", "#e9ecef");
              $("#putProductName").css("background-color", "#e9ecef");
            }
        }
      }
      $("input[name='formPaymentSequence']").val("");
      
  }
</script>


<script type="text/javascript">
    function CancelDetailBrf() {
        $(".klikBudgetDetail2").prop("disabled", false);
        $("#putProductId2").prop("disabled", true);

        var statusDisplay = [];
        var paymentSequenceValuePerID = [];
        var paymentSequenceID = [];
        var paymentSequenceValue = [];
      
        $.each($("input[name='formPaymentSequence']:visible"), function(){
          paymentSequenceID.push($(this).data("id"));
          paymentSequenceValue.push($(this).val());
        });

        var data = [81000000000001, 81000000000003, 221000000000041, 221000000000042, 221000000000040, 221000000000031, 221000000000035, 221000000000016, 221000000000018, 221000000000017, 221000000000002, 221000000000004, 221000000000003, 221000000000029, 221000000000026, 221000000000028, 221000000000027, 221000000000014, 221000000000011, 221000000000013, 221000000000012, 221000000000033, 221000000000037, 221000000000038, 221000000000044, 221000000000006, 221000000000007, 221000000000009, 221000000000008, 221000000000021, 221000000000020, 221000000000022, 221000000000024, 221000000000023, 81000000000004];
      
        for (let index = 0; index < data.length; index++) {
      
          for (let index2 = 0; index2 < paymentSequenceID.length; index2++) {
            if(paymentSequenceID[index2] == data[index]){
              statusDisplay[index] = "";
              paymentSequenceValuePerID[index] = paymentSequenceValue[index2];
              if(paymentSequenceValue[index2] == ""){
                paymentSequenceValuePerID[index] = "0.00";
              }
              varTotal += +paymentSequenceValue[index2];

              if($("#"+paymentSequenceID[index2]).html() == ""){ $("#"+paymentSequenceID[index2]).html('0'); }
              var val_allowance = parseFloat($("#"+paymentSequenceID[index2]).html().replace(/,/g, ''));
              $("#"+paymentSequenceID[index2]).html(parseFloat(+val_allowance + +paymentSequenceValuePerID[index]).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

              break;
            }
            else{
              statusDisplay[index] = "none;";
              paymentSequenceValuePerID[index] = "";
            }
          } 
        }

        var totalPaymentSequence = paymentSequenceID.length;
        var totalBalance = $('#totalBalance').val().replace(/,/g, '');
        var budgetRequest = $('#budgetRequest').val().replace(/,/g, '');
        var varSequenceReq = $('#sequenceRequest').val();
        var varSequence = $('#sequence').val();
        var putProductId = $('#putProductId').val();
        var putProductName = $('#putProductName').val();
        var combinedBudget = $("#combinedBudget").val();


        if($("#totalSequence").html() == ""){ $("#totalSequence").html('0'); }
          $("#totalSequence").html(+$("#totalSequence").html() + +1);
          var totalSequence = $("#totalSequence").html();
          
      
        if (statusEditBrf == "Yes") {

          $("#putSequence").val(putSequence);

          var html2 = [];
          for (let indexx = 0; indexx < data.length; indexx++) {
            html2[indexx] = '<td style="border:1px solid #e9ecef;display:'+ statusDisplay[indexx]  +'">' + paymentSequenceValuePerID[indexx] + '</td>';
          }
          
          var html = '<tr>' +
            '<td style="border:1px solid #e9ecef;width:7%;">' +
            // '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="RemoveBusinessTrip(this);"  data-id1="' + allowance + '" data-id2="' + transport + '" data-id3="' + airport_tax + '" data-id4="' + accomodation + '" data-id5="' + other + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
            '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton " onclick="EditBusinessTrip(this);" data-dismiss="modal" data-id1="' + paymentSequenceValue + '" data-id2="' + putProductId + '" data-id3="' + putProductName + '" data-id4="' + $("#putSequence").val() + '" data-id5="' + varSequenceReq + '" data-id6="' + totalBalance + '" data-id7="' + budgetRequest + '" data-id8="' + totalCostPerProduct + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
            '<input type="hidden" name="var_product_id[]" value="' + putProductId + '">' +
            '<input type="hidden" name="paymentSequenceID[]" value="' + paymentSequenceID + '">' +
            '<input type="hidden" name="paymentSequenceValue[]" value="' + paymentSequenceValue + '">' +
            '<input type="hidden" name="totalSequence" value="' + totalSequence + '">' +
            '<input type="hidden" name="totalPaymentSequence" value="' + totalPaymentSequence + '">' +
            '<input type="hidden" name="var_combinedBudget" value="' + combinedBudget + '">' +
            '</td>' +
            '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + $("#putSequence").val() + '</td>' +

            html2 +
            
            '</tr>';
          
          $('table.TableBusinessTrip tbody').append(html);
          
          $("#statusEditBrf").val('No');
        }
        
        if($("#val_allowance").html() == ""){ $("#val_allowance").html('0'); }
        var val_allowance = parseFloat($("#val_allowance").html().replace(/,/g, ''));
        $("#val_allowance").html(parseFloat(+val_allowance + +allowance).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        
        if($("#valTransport").html() == ""){ $("#valTransport").html('0'); }
        var valTransport = parseFloat($("#valTransport").html().replace(/,/g, ''));
        $("#valTransport").html(parseFloat(+valTransport + +transport).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        if($("#valAirportTax").html() == ""){ $("#valAirportTax").html('0'); }
        var valAirportTax = parseFloat($("#valAirportTax").html().replace(/,/g, ''));
        $("#valAirportTax").html(parseFloat(+valAirportTax + +airport_tax).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        if($("#val_accomodation").html() == ""){ $("#val_accomodation").html('0'); }
        var val_accomodation = parseFloat($("#val_accomodation").html().replace(/,/g, ''));
        $("#val_accomodation").html(parseFloat(+val_accomodation + +accomodation).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        if($("#val_others").html() == ""){ $("#val_others").html('0'); }
        var val_others = parseFloat($("#val_others").html().replace(/,/g, ''));
        $("#val_others").html(parseFloat(+val_others + +other).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        if($("#totalBrf").html() == ""){ $("#totalBrf").html('0'); }
        var totalBrf = parseFloat($("#totalBrf").html().replace(/,/g, ''));
        var varTotal = +allowance + +transport + +airport_tax + +accomodation + +other;
        $("#totalBrf").html(parseFloat(+totalBrf + +varTotal).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var totalSequence = $("#totalSequence").html();
        $("#totalSequence").html(+totalSequence + +1);

        $("#putProductId").val("");
        $("#putProductName").val("");
        $("input[name='formPaymentSequence']").val("");
        $("#totalBalance").val("");
        $("#sequence").val("");
        $("#sequenceRequest").val("");
        $('#budgetRequest').val("");
        $("#putProductId").css("background-color", "#e9ecef");
        $("#putProductName").css("background-color", "#e9ecef");
        $(".ActionButton").prop("disabled", false);
    }
</script>


<script>

    function EditBusinessTrip(tr) {
      var i = tr.parentNode.parentNode.rowIndex;
        document.getElementById("TableBusinessTrip").deleteRow(i);

        var $this = $(tr);
        var varTotalBrf = 0;
        var numbersArray = $this.data("id1").split(',');

        $.each($("input[name='formPaymentSequence']:visible"), function(index, value) { 
         
          var tamp = parseFloat($("#"+$(this).data("id")).html().replace(/,/g, ''));
          $("#"+$(this).data("id")).html(parseFloat(tamp - numbersArray[index]).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

          $(this).val(numbersArray[index]);
          varTotalBrf += +numbersArray[index];
        });

        
        $("#putProductId").val($this.data("id2"));
        $("#putProductName").val($this.data("id3"));
        // $("#sequence").val($this.data("id4"));
        $("#sequenceRequest").val($this.data("id5"));
        $("#totalBalance").val($this.data("id6"));
        $("#budgetRequest").val($this.data("id7").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        // $("#totalCostPerProduct").val($this.data("id12").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        // // console.log($("#totalCostPerProduct").val());

      
        $("#putSequence").val($this.data("id4"));

        // var val_others = parseFloat($("#val_others").html().replace(/,/g, ''));
        // $("#val_others").html(parseFloat(val_others - others).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var totalBrf = parseFloat($("#totalBrf").html().replace(/,/g, ''));
        $("#totalBrf").html(parseFloat(totalBrf - varTotalBrf).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var totalSequence = $("#totalSequence").html();
        $("#totalSequence").html(totalSequence - 1);

        // console.log($("#totalCostPerProduct").val());

        var totalCostPerProduct = parseFloat($("#totalCostPerProduct").val().replace(/,/g, ''));
        $("#totalCostPerProduct").val(parseFloat(totalCostPerProduct - varTotalBrf).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        // console.log($("#totalCostPerProduct").val());
        
        $("#statusEditBrf").val('Yes');
        $("#sequenceRequest").prop("disabled", true);
        $(".klikBudgetDetail2").prop("disabled", true);
        $(".ActionButton").prop("disabled", true);
    } 

    function RemoveBusinessTrip(tr) {
        var i = tr.parentNode.parentNode.rowIndex;
        document.getElementById("TableBusinessTrip").deleteRow(i);

        var $this = $(tr);
        allowance = $this.data("id1");
        transport = $this.data("id2");
        airportTax = $this.data("id3");
        accomodation = $this.data("id4");
        others = $this.data("id5");
        
        var val_allowance = parseFloat($("#val_allowance").html().replace(/,/g, ''));
        $("#val_allowance").html(parseFloat(val_allowance - allowance).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var valTransport = parseFloat($("#valTransport").html().replace(/,/g, ''));
        $("#valTransport").html(parseFloat(valTransport - transport).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var valAirportTax = parseFloat($("#valAirportTax").html().replace(/,/g, ''));
        $("#valAirportTax").html(parseFloat(valAirportTax - airportTax).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var val_accomodation = parseFloat($("#val_accomodation").html().replace(/,/g, ''));
        $("#val_accomodation").html(parseFloat(val_accomodation - accomodation).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        
        var val_others = parseFloat($("#val_others").html().replace(/,/g, ''));
        $("#val_others").html(parseFloat(val_others - others).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        varTotalBrf = +allowance + +transport + +airportTax + +accomodation + +others;
        var totalBrf = parseFloat($("#totalBrf").html().replace(/,/g, ''));
        $("#totalBrf").html(parseFloat(totalBrf - varTotalBrf).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        var totalSequence = $("#totalSequence").html();
        $("#totalSequence").html(totalSequence - 1);

    }
</script>

<script type="text/javascript">

    function AddFormTransportDetails() {  
      $(".FormTransportDetails").show();
    }

    function CancelFormTransportDetails() {  
      $(".FormTransportDetails").hide();
      $("#transportType").val("");
      $("#transportBooking").val("");
      $("#dateDepart").val("");
      $("#dateArrival").val("");
      $("#qoutedFare").val("");
      $("#transportType").css("border", "1px solid #ced4da");
      $("#transportBooking").css("border", "1px solid #ced4da");
      $("#dateDepart").css("border", "1px solid #ced4da");
      $("#dateArrival").css("border", "1px solid #ced4da");
      $("#qoutedFare").css("border", "1px solid #ced4da");
    }

    function UpdateFormTransportDetails() {

      var transportType = $("#transportType").val();
      var transportBooking = $("#transportBooking").val();
      var dateDepart = $("#dateDepart").val();
      var dateArrival = $("#dateArrival").val();
      var qoutedFare = $("#qoutedFare").val();

      if (transportType === "") {
          $("#transportType").focus();
          $("#transportType").attr('required', true);
          $("#transportType").css("border", "1px solid red");
      }else if (transportBooking === "") {
          $("#transportBooking").focus();
          $("#transportBooking").attr('required', true);
          $("#transportBooking").css("border", "1px solid red");
          $("#transportType").css("border", "1px solid #ced4da");
      }else if (dateDepart === "") {
          $("#dateDepart").focus();
          $("#dateDepart").attr('required', true);
          $("#dateDepart").css("border", "1px solid red");
          $("#transportBooking").css("border", "1px solid #ced4da");
      }else if (dateArrival === "") {
          $("#dateArrival").focus();
          $("#dateArrival").attr('required', true);
          $("#dateArrival").css("border", "1px solid red");
          $("#dateDepart").css("border", "1px solid #ced4da");
      }else if (qoutedFare === "") {
          $("#qoutedFare").focus();
          $("#qoutedFare").attr('required', true);
          $("#qoutedFare").css("border", "1px solid red");
          $("#dateArrival").css("border", "1px solid #ced4da");
      }
      else {
        $("#transportType").css("border", "1px solid #ced4da");
        $("#transportBooking").css("border", "1px solid #ced4da");
        $("#dateDepart").css("border", "1px solid #ced4da");
        $("#dateArrival").css("border", "1px solid #ced4da");
        $("#qoutedFare").css("border", "1px solid #ced4da");
        $(".FormTransportDetails").hide();
        var html = '<tr>' +
            '<td style="border:1px solid #e9ecef;width:10px;">' +
            '&nbsp;<button type="button" class="btn btn-xs" onclick="RemoveTransportDetails(this);" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
            '<input type="hidden" name="transportType[]" value="' + transportType + '">' +
            '<input type="hidden" name="transportBooking[]" value="' + transportBooking + '">' +
            '<input type="hidden" name="dateDepart[]" value="' + dateDepart + '">' +
            '<input type="hidden" name="dateArrival[]" value="' + dateArrival + '">' +
            '<input type="hidden" name="qoutedFare[]" value="' + qoutedFare + '">' +
            '</td>' +
            '<td style="border:1px solid #e9ecef;">' + transportType + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + transportBooking + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + dateDepart + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + dateArrival + '</td>' +
            '<td style="border:1px solid #e9ecef;">' + qoutedFare + '</td>' +
            '</tr>';

          $('table.TableTransportDetails tbody').append(html);
          
        $("#transportType").val("");
        $("#transportBooking").val("");
        $("#dateDepart").val("");
        $("#dateArrival").val("");
        $("#qoutedFare").val("");
      }
    }

    function RemoveTransportDetails(tr) {
        var i = tr.parentNode.parentNode.rowIndex;
        document.getElementById("TableTransportDetails").deleteRow(i);
    }
</script>


<script>
    $('document').ready(function() {
        $('#budgetRequest').keyup(function() {

            var budgetRequest = parseFloat($(this).val().replace(/,/g, ''));
            var totalBalance = parseFloat($('#totalBalance').val().replace(/,/g, ''));

            if (parseFloat(budgetRequest) == '') {
                $('#totalBalance').val(0);
            } else if (parseFloat(budgetRequest) > parseFloat(totalBalance)) {
                Swal.fire("Error !", "Your Budget Request is Over", "error");
                $("#budgetRequest").val(0);
                $("#budgetRequest").css("border", "1px solid red");
            }  else {
                // $('#budgetRequest').val(budgetRequest);
                $("#budgetRequest").css("border", "1px solid #ced4da");
            }
        });
    });
</script>


<script type="text/javascript">
  function CancelBusinessTrip() {
    $("#loading").show();
    $(".loader").show();
    window.location.href = '/BusinessTripRequest?var=1';
  }
</script>

<script>
  var date = new Date();
  var today = new Date(date.setMonth(date.getMonth() - 3));
  document.getElementById('dateCommance').setAttribute('min', today.toISOString().split('T')[0]);
  document.getElementById('dateDepart').setAttribute('min', today.toISOString().split('T')[0]);
</script>

<script>
  $(document).ready(function() {
    $('#dateCommance').change(function() {
      $("#dateEnd").prop("disabled", false);
      var dateCommance = new Date($("#dateCommance").val());
      document.getElementById('dateEnd').setAttribute('min', dateCommance.toISOString().split('T')[0]);
    });

    $('#dateDepart').change(function() {
      $("#dateArrival").prop("disabled", false);
      var dateDepart = new Date($("#dateDepart").val());
      document.getElementById('dateArrival').setAttribute('min', dateDepart.toISOString().split('T')[0]);
    });
  });
</script>


<script>
  $(document).ready(function() {
    $('#longTerm').click(function() {
      $("#sequenceRequest").prop("disabled", false);
      $("#sequenceRequest").val('0');
      $("#lupsum").prop("disabled", true);
      radiobtn = document.getElementById("nonLupsum");
      radiobtn.checked = true;
    });

    $('#shortTerm').click(function() {
      $("#sequenceRequest").val('1');
      $("#sequenceRequest").prop("disabled", true);
      $("#lupsum").prop("disabled", false);
    });

    $('#dayTripTravel').click(function() {
      $("#sequenceRequest").val('1');
      $("#sequenceRequest").prop("disabled", true);
      $("#lupsum").prop("disabled", false);
    });
  });
</script>

<script>
    $(function() {
        $(".idFollowingCondition").on('click', function(e) {
            $("#transportDetails").hide();
            $("#followingCondition").show();
            $(".FollowingCondition").show();
        });
    });

    $(function() {
        $(".idTransportDetails").on('click', function(e) {
            $("#followingCondition").hide();
            $("#transportDetails").show();
            $(".TransportDetails").show();
        });
    });
</script>

<script type="text/javascript">

    $(".transportApplicable").change(function() {
      if(this.checked) {
        

        var var_ID = $(this).val();
        // console.log(var_ID);
        var num = 0;

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $.ajax({
          type: 'GET',
          url: '{!! route("getBusinessTripCostComponentEntity") !!}?TripTransportationType=' + var_ID,
          success: function(data) {
          }
        });


        if(var_ID == 220000000000011){
          $(".a_airport_tax").show();
          $(".a_extra_baggage_charge").show();
          $(".a_ticket_fare").show();
          num += 3;
        }
        else if(var_ID == 220000000000007){
          $(".b_ticket_fare").show();
          num += 1;
        }
        else if(var_ID == 220000000000009){
          $(".m_ticket_fare").show();
          num += 1;
        }
        else if(var_ID == 220000000000004){
          $(".cc_fuel_charge").show();
          $(".cc_parking_charge").show();
          $(".cc_toll_charge").show();
          num += 3;
        }
        else if(var_ID == 220000000000001){
          $(".cm_fuel_charge").show();
          $(".cm_parking_charge").show();
          $(".cm_toll_charge").show();
          num += 3;
        }
        else if(var_ID == 220000000000006){
          $(".ec_compensation_fee").show();
          $(".ec_fuel_charge").show();
          $(".ec_parking_charge").show();
          $(".ec_toll_charge").show();
          num += 4;
        }
        else if(var_ID == 220000000000003){
          $(".em_compensation_fee").show();
          $(".em_fuel_charge").show();
          $(".em_parking_charge").show();
          $(".em_toll_charge").show();
          num += 4;
        }
        else if(var_ID == 220000000000008){
          $(".ib_ticket_fare").show();
          num += 1;
        }
        else if(var_ID == 220000000000010){
          $(".it_ticket_fare").show();
          $(".it_extra_baggage_charge").show();
          num += 2;
        }
        else if(var_ID == 220000000000012){
         $(".s_ticket_fare").show();
          num += 1;
        }
        else if(var_ID == 220000000000002){
          $(".tb_rental_fee").show();
          $(".tb_fuel_charge").show();
          $(".tb_parking_charge").show();
          $(".tb_toll_charge").show();
          num += 4;
        }
        else if(var_ID == 220000000000005){
          $(".t_driver_fee").show();
          $(".t_rental_fee").show();
          $(".t_fuel_charge").show();
          $(".t_parking_charge").show();
          $(".t_toll_charge").show();
          num += 4;
        }
        
        $("#"+var_ID).prop("disabled", true);

        $("#"+var_ID).attr('readonly', 'readonly');

        var paymentSequence = $("#paymentSequence").val();
        $("#paymentSequence").val(+paymentSequence + num);
        var paymentSequence2 = $("#paymentSequence").val();
        
        $('.paymentSequence').attr('colspan', paymentSequence2);

      }
    });

</script>

<script>
  $(function() {
    $("#FormSubmitBusinessTrip").on("submit", function(e) { //id of form 
      e.preventDefault();
      // var request_name = $("#request_name").val();
      // var jobTitle = $("#jobTitle").val();
      // var department = $("#department").val();
      // var reasonTravel = $("#reasonTravel").val();
      // var dateCommance = $("#dateCommance").val();
      // var dateEnd = $("#dateEnd").val();
      // var headStationLocation = $("#headStationLocation").val();
      // var bussinesLocation = $("#bussinesLocation").val();
      // var contactPhone = $("#contactPhone").val();
      
      // $("#request_name").css("border", "1px solid #ced4da");
      // $("#jobTitle").css("border", "1px solid #ced4da");
      // $("#department").css("border", "1px solid #ced4da");
      // $("#reasonTravel").css("border", "1px solid #ced4da");
      // $("#dateCommance").css("border", "1px solid #ced4da");
      // $("#dateEnd").css("border", "1px solid #ced4da");
      // $("#headStationLocation").css("border", "1px solid #ced4da");
      // $("#bussinesLocation").css("border", "1px solid #ced4da");
      // $("#contactPhone").css("border", "1px solid #ced4da");

      // if (request_name === "") {
      //   $("#request_name").focus();
      //   $("#request_name").attr('required', true);
      //   $("#request_name").css("border", "1px solid red");
      // }  else if (jobTitle === "") {
      //   $("#jobTitle").focus();
      //   $("#jobTitle").attr('required', true);
      //   $("#jobTitle").css("border", "1px solid red");
      // } else if (department === "") {
      //   $("#department").focus();
      //   $("#department").attr('required', true);
      //   $("#department").css("border", "1px solid red");
      // } else if (reasonTravel === "") {
      //   $("#reasonTravel").focus();
      //   $("#reasonTravel").attr('required', true);
      //   $("#reasonTravel").css("border", "1px solid red");
      // }  else if (dateCommance === "") {
      //   $("#dateCommance").focus();
      //   $("#dateCommance").attr('required', true);
      //   $("#dateCommance").css("border", "1px solid red");
      // }  else if (dateEnd === "") {
      //   $("#dateEnd").focus();
      //   $("#dateEnd").attr('required', true);
      //   $("#dateEnd").css("border", "1px solid red");
      // }  else if (headStationLocation === "") {
      //   $("#headStationLocation").focus();
      //   $("#headStationLocation").attr('required', true);
      //   $("#headStationLocation").css("border", "1px solid red");
      // }  else if (bussinesLocation === "") {
      //   $("#bussinesLocation").focus();
      //   $("#bussinesLocation").attr('required', true);
      //   $("#bussinesLocation").css("border", "1px solid red");
      // }  else if (contactPhone === "") {
      //   $("#contactPhone").focus();
      //   $("#contactPhone").attr('required', true);
      //   $("#contactPhone").css("border", "1px solid red");
      // } 
      // else {

        var arr = [];
        $.each($("input[name='TransportType']:checked"), function(){
          arr.push($(this).val());
        });
        
        var html = '<input type="hidden" name="TransportType" value="' + arr + '">';
          $('table.TableBusinessTrip tbody').append(html);

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
                  html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + response.brfnumber + '</span>',
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

                    window.location.href = '/BusinessTripRequest?var=1';
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

                  window.location.href = '/BusinessTripRequest?var=1';
                }
              })
          }
        })
      // }
    });

  });
</script>
