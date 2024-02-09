<script type="text/javascript">
  $(".FormTransportDetails").hide();
  $("#sitecode2").prop("disabled", true);
  $("#request_name2").prop("disabled", true);
  // $("#saveBrfList").prop("disabled", true);
  $("#dateEnd").prop("disabled", true);
  $("#dateEnd").css("background-color", "white");
  $("#dateArrival").prop("disabled", true);
  $("#dateArrival").css("background-color", "white");
  $("#putProductId2").prop("disabled", true);
  $("#sequenceRequest").prop("disabled", true);
</script>


<script type="text/javascript">
  //GET BRF LIST 

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var advance_RefID = $("#var_recordID").val();
  var trano = $("#trano").val();
  var TotalBudgetList = 0;
  var TotalAllowance = 0;
  var TotalAccomodation = 0;
  var TotalOther = 0;
  var TotalPayment = 0;

  $.ajax({
    type: "POST",
    url: '{!! route("BusinessTripRequest.BusinessTripRequestListCartRevision") !!}?advance_RefID=' + advance_RefID,
    success: function(data) {
      var no = 1;
      applied = 0;
      status = "";
      statusDisplay = [];
      statusDisplay2 = [];
      statusForm = [];
      $.each(data, function(key, value) {

        TotalBudgetList += +value.priceBaseCurrencyValue.replace(/,/g, '');
        TotalAllowance += +value.quantity.replace(/,/g, '');
        TotalAccomodation += +value.quantity.replace(/,/g, '');
        TotalOther += +value.quantity.replace(/,/g, '');
        TotalPayment = 1;

        // TABLE LIST BRF 

        var html =
          '<tr>' +
          '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + value.combinedBudgetSubSectionLevel1_RefID + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + value.combinedBudgetSubSectionLevel1Name + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + key + '" class="price_req2' + key + '">' + currencyTotal(value.productUnitPriceBaseCurrencyValue) + '</span>' + '</td>' +
          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + key + '" class="qty_req2' + key + '">' + currencyTotal(value.productUnitPriceBaseCurrencyValue) + '</span>' + '</td>' +
          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + key + '" class="qty_req2' + key + '">' + currencyTotal(value.productUnitPriceBaseCurrencyValue) + '</span>' + '</td>' +
          '<td style="padding-top: 10px;padding-btwottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + key + '" class="total_req2' + key + '">' + currencyTotal(value.priceBaseCurrencyValue) + '</span>' + '</td>' +
          '</tr>';

        $('table.TableBusinessTrip tbody').append(html);

        $("#GrandTotal").html(currencyTotal(TotalBudgetList));
        $("#TotalAllowance").html(currencyTotal(TotalAllowance));
        $("#TotalAccomodation").html(currencyTotal(TotalAccomodation));
        $("#TotalOther").html(currencyTotal(TotalOther));

        // TABLE BUDGET 

        if (value.quantityAbsorption == "0.00" && value.quantity == "0.00") {
          var applied = 0;
        } else {
          var applied = Math.round(parseFloat(value.quantityAbsorption) / parseFloat(value.quantity) * 100);
        }
        if (applied >= 100) {
          var status = "disabled";
        }
        if (value.productName == "Unspecified Product") {
          statusDisplay[key] = "";
          statusDisplay2[key] = "none";
          statusForm[key] = "disabled";
        } else {
          statusDisplay[key] = "none";
          statusDisplay2[key] = "";
          statusForm[key] = "";
        }

        var html =
          '<tr>' +
          '<input name="getWorkId[]" value="' + value.combinedBudgetSubSectionLevel1_RefID + '" type="hidden">' +
          '<input name="getWorkName[]" value="' + value.combinedBudgetSubSectionLevel1Name + '" type="hidden">' +
          '<input name="getProductId[]" value="' + value.product_RefID + '" type="hidden">' +
          '<input name="getProductName[]" value="' + value.productName + '" type="hidden">' +
          '<input name="getQty[]" id="budget_qty' + key + '" value="' + value.quantity + '" type="hidden">' +
          '<input name="getPrice[]" id="budget_price' + key + '" value="' + value.productUnitPriceBaseCurrencyValue + '" type="hidden">' +
          '<input name="getBudgetTotal[]" id="budget_total' + key + '" value="' + (value.quantity * value.productUnitPriceBaseCurrencyValue) + '" type="hidden">' +
          '<input name="getUom[]" value="' + value.quantityUnitName + '" type="hidden">' +
          '<input name="getCurrency[]" value="' + value.priceBaseCurrencyISOCode + '" type="hidden">' +
          '<input name="combinedBudgetSectionDetail_RefID[]" value="' + value.sys_ID + '" type="hidden">' +
          '<input name="combinedBudget_RefID" value="' + value.combinedBudget_RefID + '" type="hidden">' +
          '<input name="getRecordIDDetail[]" value="' + value.sys_ID + '"  type="hidden">' +

          '<td style="border:1px solid #e9ecef;">' +
          '&nbsp;&nbsp;&nbsp;<div class="progress ' + status + ' progress-xs" style="height: 14px;border-radius:8px;"> @if(' + applied + ' >= ' + 0 + ' && ' + applied + ' <= ' + 40 + ')<div class="progress-bar bg-red" style="width:' + applied + '%;"></div> @elseif(' + applied + ' >= ' + 41 + ' && ' + applied + ' <= ' + 89 + ')<div class="progress-bar bg-blue" style="width:' + applied + '%;"></div> @elseif(' + applied + ' >= ' + 90 + ' && ' + applied + ' <= ' + 100 + ')<div class="progress-bar bg-green" style="width:' + applied + '%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>' + applied + ' %</center></small>' +
          '</td>' +

          '<td style="border:1px solid #e9ecef;display:' + statusDisplay[key] + '";">' +
          '<div class="input-group">' +
          '<input id="putProductId' + key + '" style="border-radius:0;width:130px;background-color:white;" name="putProductId" class="form-control" readonly>' +
          '<div class="input-group-append">' +
          '<span style="border-radius:0;" class="input-group-text form-control" data-id="10">' +
          '<a id="product_id2" data-toggle="modal" data-target="#myProduct" onclick="KeyFunction(' + key + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
          '</span>' +
          '</div>' +
          '</div>' +
          '</td>' +

          '<td style="border:1px solid #e9ecef;">' + '<span>' + trano + '</span>' + '</td>' +
          '<td style="border:1px solid #e9ecef;display:' + statusDisplay2[key] + '">' + '<span>' + value.product_RefID + '</span>' + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + '<span id="putProductName' + key + '">' + value.productName + '</span>' + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + '<span">' + currencyTotal(value.quantity) + '</span>' + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + '<span">' + currencyTotal(value.quantity) + '</span>' + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + '<span>' + currencyTotal(value.productUnitPriceBaseCurrencyValue) + '</span>' + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + '<span id="total_balance_value2' + key + '">' + currencyTotal(value.quantity * value.productUnitPriceBaseCurrencyValue) + '</span>' + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + '<span id="total_payment' + key + '">' + currencyTotal(TotalPayment) + '</span>' + '</td>' +

          '<td class="sticky-col fifth-col-brf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="allowance_req' + key + '" style="border-radius:0;" name="allowance_req[]" class="form-control allowance_req" onkeypress="return isNumberKey(this, event);" autocomplete="off" ' + statusForm[key] + 'value="' + currencyTotal(value.productUnitPriceBaseCurrencyValue) + '">' + '</td>' +
          '<td class="sticky-col forth-col-brf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="accomodation_req' + key + '" style="border-radius:0;" name="accomodation_req[]" class="form-control accomodation_req" onkeypress="return isNumberKey(this, event);" autocomplete="off" ' + statusForm[key] + 'value="' + currencyTotal(value.productUnitPriceBaseCurrencyValue) + '">' + '</td>' +
          '<td class="sticky-col third-col-brf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="other_req' + key + '" style="border-radius:0;" name="other_req[]" class="form-control total_req" onkeypress="return isNumberKey(this, event);" autocomplete="off" ' + statusForm[key] + 'value="' + currencyTotal(value.productUnitPriceBaseCurrencyValue) + '">' + '</td>' +
          '<td class="sticky-col second-col-arf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_req' + key + '" style="border-radius:0;background-color:white;" name="total_req[]" class="form-control total_req" autocomplete="off" disabled value="' + currencyTotal(value.productUnitPriceBaseCurrencyValue) + '">' + '</td>' +
          '<td class="sticky-col first-col-brf" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="total_balance_value' + key + '" style="border-radius:0;width:90px;background-color:white;" name="total_balance_value[]" class="form-control total_balance_value" autocomplete="off" disabled value="' + currencyTotal(value.priceBaseCurrencyValue) + '">' + '</td>' +

          '</tr>';
        $('table.tableBudgetDetail tbody').append(html);

        $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetList));

        //VALIDASI ALLOWANCE
        $('#allowance_req' + key).keyup(function() {
          value.quantity
          $(this).val(currency($(this).val()));
          var allowance_req = $(this).val().replace(/,/g, '');
          var budget_total = $("#budget_total" + key).val();
          var accomodation_req = $("#accomodation_req" + key).val().replace(/,/g, '');
          var other_req = $("#other_req" + key).val().replace(/,/g, '');
          var totalWith = +allowance_req + +accomodation_req + +other_req;
          var totalWithout = +accomodation_req + +other_req;
          var total_payment = $("#total_payment" + key).html().replace(/,/g, '');

          if (allowance_req == "") {
            $('#total_req' + key).val("0.00");
            $("input[name='allowance_req[]']").css("border", "1px solid #ced4da");
          } else if (parseFloat(totalWith) < parseFloat(total_payment)) {
            swal({
              onOpen: function() {
                swal.disableConfirmButton();
                Swal.fire("Error !", "Total Request cannot less than Total Payment !", "error");
              }
            });

            $('#allowance_req' + key).val("");
            $('#total_req' + key).val(currencyTotal(value.priceBaseCurrencyValue));
            $('#allowance_req' + key).focus();
          } else if (parseFloat(totalWith) > parseFloat(budget_total)) {

            swal({
              onOpen: function() {
                swal.disableConfirmButton();
                Swal.fire("Error !", "Your request is over budget !", "error");
              }
            });

            $('#allowance_req' + key).val("");
            $('#total_req' + key).val("0.00");
            $('#allowance_req' + key).css("border", "1px solid red");
            $('#allowance_req' + key).focus();
          } else {

            $("input[name='allowance_req[]']").css("border", "1px solid #ced4da");
            $('#total_req' + key).val(currencyTotal(totalWith));
          }

          //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
          TotalBudgetSelected();
          //MEMANGGIL FUNCTION TOTAL BALANCE QTY SELECTED
          TotalBalanceValueSelected(key);
        });

        //VALIDASI ACCOMODATION
        $('#accomodation_req' + key).keyup(function() {
          $(this).val(currency($(this).val()));
          var accomodation_req = $(this).val().replace(/,/g, '');
          var budget_total = $("#budget_total" + key).val();
          var allowance_req = $("#allowance_req" + key).val().replace(/,/g, '');
          var other_req = $("#other_req" + key).val().replace(/,/g, '');
          var totalWith = +allowance_req + +accomodation_req + +other_req;
          var totalWithout = +allowance_req + +other_req;
          var total_payment = $("#total_payment" + key).html().replace(/,/g, '');

          if (accomodation_req == "") {
            $('#total_req' + key).val("0.00");
            $("input[name='accomodation_req[]']").css("border", "1px solid #ced4da");
          } else if (parseFloat(totalWith) < parseFloat(total_payment)) {
            swal({
              onOpen: function() {
                swal.disableConfirmButton();
                Swal.fire("Error !", "Total Request cannot less than Total Payment !", "error");
              }
            });

            $('#accomodation_req' + key).val("");
            $('#total_req' + key).val(currencyTotal(value.priceBaseCurrencyValue));
            $('#accomodation_req' + key).focus();
          } else if (parseFloat(totalWith) > parseFloat(budget_total)) {

            swal({
              onOpen: function() {
                swal.disableConfirmButton();
                Swal.fire("Error !", "Your request is over budget !", "error");
              }
            });

            $('#accomodation_req' + key).val("");
            $('#total_req' + key).val("0.00");
            $('#accomodation_req' + key).css("border", "1px solid red");
            $('#accomodation_req' + key).focus();
          } else {

            $("input[name='accomodation_req[]']").css("border", "1px solid #ced4da");
            $('#total_req' + key).val(currencyTotal(totalWith));
          }

          //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
          TotalBudgetSelected();
          //MEMANGGIL FUNCTION TOTAL BALANCE QTY SELECTED
          TotalBalanceValueSelected(key);
        });

        //VALIDASI OTHER
        $('#other_req' + key).keyup(function() {
          $(this).val(currency($(this).val()));
          var other_req = $(this).val().replace(/,/g, '');
          var budget_total = $("#budget_total" + key).val();
          var allowance_req = $("#allowance_req" + key).val().replace(/,/g, '');
          var accomodation_req = $("#accomodation_req" + key).val().replace(/,/g, '');
          var totalWith = +allowance_req + +accomodation_req + +other_req;
          var totalWithout = +allowance_req + +accomodation_req;
          var total_payment = $("#total_payment" + key).html().replace(/,/g, '');

          if (other_req == "") {
            $('#total_req' + key).val("0.00");
            $("input[name='other_req[]']").css("border", "1px solid #ced4da");
          } else if (parseFloat(totalWith) < parseFloat(total_payment)) {
            swal({
              onOpen: function() {
                swal.disableConfirmButton();
                Swal.fire("Error !", "Total Request cannot less than Total Payment !", "error");
              }
            });

            $('#other_req' + key).val("");
            $('#total_req' + key).val(currencyTotal(value.priceBaseCurrencyValue));
            $('#other_req' + key).focus();
          } else if (parseFloat(totalWith) > parseFloat(budget_total)) {

            swal({
              onOpen: function() {
                swal.disableConfirmButton();
                Swal.fire("Error !", "Your request is over budget !", "error");
              }
            });

            $('#other_req' + key).val("");
            $('#total_req' + key).val("0.00");
            $('#other_req' + key).css("border", "1px solid red");
            $('#other_req' + key).focus();
          } else {

            $("input[name='other_req[]']").css("border", "1px solid #ced4da");
            $('#total_req' + key).val(currencyTotal(totalWith));
          }

          //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
          TotalBudgetSelected();
          //MEMANGGIL FUNCTION TOTAL BALANCE QTY SELECTED
          TotalBalanceValueSelected(key);
        });
      });
    },
  });
</script>

<script>
  function addFromDetailtoCartJs() {

    $('#TableBusinessTrip').find('tbody').empty();

    $(".BrfListCart").show();
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
    var getQtyId = $("input[name='getQtyId[]']").map(function() {
      return $(this).val();
    }).get();
    var getCurrencyId = $("input[name='getCurrencyId[]']").map(function() {
      return $(this).val();
    }).get();
    var getCurrency = $("input[name='getCurrency[]']").map(function() {
      return $(this).val();
    }).get();
    var allowance_req = $("input[name='allowance_req[]']").map(function() {
      return $(this).val();
    }).get();
    var accomodation_req = $("input[name='accomodation_req[]']").map(function() {
      return $(this).val();
    }).get();
    var other_req = $("input[name='other_req[]']").map(function() {
      return $(this).val();
    }).get();
    var combinedBudgetSectionDetail_RefID = $("input[name='combinedBudgetSectionDetail_RefID[]']").map(function() {
      return $(this).val();
    }).get();
    var combinedBudget_RefID = $("input[name='combinedBudget_RefID']").val();
    var getRecordIDDetail = $("input[name='getRecordIDDetail[]']").map(function() {
      return $(this).val();
    }).get();
    var TotalBudgetList = 0;
    var TotalAllowance = 0;
    var TotalAccomodation = 0;
    var TotalOther = 0;

    var trano = $("#trano").val();

    var total_req = $("input[name='total_req[]']").map(function() {
      return $(this).val();
    }).get();
    $.each(total_req, function(index, data) {
      // if(total_req[index] != "" && total_req[index] > "0.00" && total_req[index] != "NaN.00"){
      var putProductId = getProductId[index];
      var putProductName = getProductName[index];
      var putUom = getUom[index];

      if (getProductName[index] == "Unspecified Product") {
        var putProductId = $("#putProductId" + index).val();
        var putProductName = $("#putProductName" + index).html();
        var putUom = $("#putUom" + index).val();
      }
      TotalBudgetList += +total_req[index].replace(/,/g, '');
      TotalAllowance += +allowance_req[index].replace(/,/g, '');
      TotalAccomodation += +accomodation_req[index].replace(/,/g, '');
      TotalOther += +other_req[index].replace(/,/g, '');

      var html = '<tr>' +

        '<input type="hidden" name="var_product_id[]" value="' + putProductId + '">' +
        '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
        '<input type="hidden" name="var_uom[]" value="' + getUom[index] + '">' +
        '<input type="hidden" name="var_qty_id[]" value="' + getQtyId[index] + '">' +
        '<input type="hidden" name="var_currency_id[]" value="' + getCurrencyId[index] + '">' +
        '<input type="hidden" name="var_quantity[]" class="allowance_req2' + index + '" data-id="' + index + '" value="' + currencyTotal(allowance_req[index]).replace(/,/g, '') + '">' +
        '<input type="hidden" name="var_price[]" class="accomodation_req2' + index + '" value="' + currencyTotal(accomodation_req[index]).replace(/,/g, '') + '">' +
        '<input type="hidden" name="var_quantity[]" class="other_req2' + index + '" data-id="' + index + '" value="' + currencyTotal(other_req[index]).replace(/,/g, '') + '">' +
        '<input type="hidden" name="var_total[]" class="total_req2' + index + '" value="' + total_req[index] + '">' +
        '<input type="hidden" name="var_currency[]" value="' + getCurrency[index] + '">' +
        '<input type="hidden" name="var_date" value="' + date + '">' +
        '<input type="hidden" name="var_combinedBudgetSectionDetail_RefID[]" value="' + combinedBudgetSectionDetail_RefID[index] + '">' +
        '<input type="hidden" name="var_combinedBudget_RefID" value="' + combinedBudget_RefID + '">' +
        '<input type="hidden" name="var_recordIDDetail[]" value="' + getRecordIDDetail[index] + '">' +

        '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + trano + '</td>' +
        '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkId[index] + '</td>' +
        '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkName[index] + '</td>' +
        '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
        '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
        // '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putUom + '</td>' +
        // '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
        '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="accomodation_req2' + index + '">' + currencyTotal(allowance_req[index]) + '</span>' + '</td>' +
        '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="allowance_req2' + index + '">' + currencyTotal(accomodation_req[index]) + '</span>' + '</td>' +
        '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="other_req2' + index + '">' + currencyTotal(other_req[index]) + '</span>' + '</td>' +
        '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="total_req2' + index + '">' + currencyTotal(total_req[index]) + '</span>' + '</td>' +
        '</tr>';
      $('table.TableBusinessTrip tbody').append(html);

      $("#GrandTotal").html(currencyTotal(TotalBudgetList));
      $("#TotalAllowance").html(currencyTotal(TotalAllowance));
      $("#TotalAccomodation").html(currencyTotal(TotalAccomodation));
      $("#TotalOther").html(currencyTotal(TotalOther));

      $("#saveBrfList").prop("disabled", false);
      // }
    });

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
    } else if (transportBooking === "") {
      $("#transportBooking").focus();
      $("#transportBooking").attr('required', true);
      $("#transportBooking").css("border", "1px solid red");
      $("#transportType").css("border", "1px solid #ced4da");
    } else if (dateDepart === "") {
      $("#dateDepart").focus();
      $("#dateDepart").attr('required', true);
      $("#dateDepart").css("border", "1px solid red");
      $("#transportBooking").css("border", "1px solid #ced4da");
    } else if (dateArrival === "") {
      $("#dateArrival").focus();
      $("#dateArrival").attr('required', true);
      $("#dateArrival").css("border", "1px solid red");
      $("#dateDepart").css("border", "1px solid #ced4da");
    } else if (qoutedFare === "") {
      $("#qoutedFare").focus();
      $("#qoutedFare").attr('required', true);
      $("#qoutedFare").css("border", "1px solid red");
      $("#dateArrival").css("border", "1px solid #ced4da");
    } else {
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

<script type="text/javascript">
  function CancelBusinessTrip() {
    ShowLoading();
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

    // $('#nonLupsum').click(function() {
    //   $("#sequenceRequest").prop("disabled", false);
    //   $("#sequenceRequest").val('0');
    // });

    // $('#lupsum').click(function() {
    //   $("#sequenceRequest").val('1');
    //   $("#sequenceRequest").prop("disabled", true);
    //   $("#lupsum").prop("disabled", false);
    // });
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

<script>
  $(function() {
    $("#FormSubmitBusinessTrip").on("submit", function(e) { //id of form 
      e.preventDefault();
      var request_name = $("#request_name").val();
      var jobTitle = $("#jobTitle").val();
      var department = $("#department").val();
      var reasonTravel = $("#reasonTravel").val();
      var dateCommance = $("#dateCommance").val();
      var dateEnd = $("#dateEnd").val();
      var headStationLocation = $("#headStationLocation").val();
      var bussinesLocation = $("#bussinesLocation").val();
      var contactPhone = $("#contactPhone").val();

      $("#request_name").css("border", "1px solid #ced4da");
      $("#jobTitle").css("border", "1px solid #ced4da");
      $("#department").css("border", "1px solid #ced4da");
      $("#reasonTravel").css("border", "1px solid #ced4da");
      $("#dateCommance").css("border", "1px solid #ced4da");
      $("#dateEnd").css("border", "1px solid #ced4da");
      $("#headStationLocation").css("border", "1px solid #ced4da");
      $("#bussinesLocation").css("border", "1px solid #ced4da");
      $("#contactPhone").css("border", "1px solid #ced4da");

      if (request_name === "") {
        $("#request_name").focus();
        $("#request_name").attr('required', true);
        $("#request_name").css("border", "1px solid red");
      } else if (jobTitle === "") {
        $("#jobTitle").focus();
        $("#jobTitle").attr('required', true);
        $("#jobTitle").css("border", "1px solid red");
      } else if (department === "") {
        $("#department").focus();
        $("#department").attr('required', true);
        $("#department").css("border", "1px solid red");
      } else if (reasonTravel === "") {
        $("#reasonTravel").focus();
        $("#reasonTravel").attr('required', true);
        $("#reasonTravel").css("border", "1px solid red");
      } else if (dateCommance === "") {
        $("#dateCommance").focus();
        $("#dateCommance").attr('required', true);
        $("#dateCommance").css("border", "1px solid red");
      } else if (dateEnd === "") {
        $("#dateEnd").focus();
        $("#dateEnd").attr('required', true);
        $("#dateEnd").css("border", "1px solid red");
      } else if (headStationLocation === "") {
        $("#headStationLocation").focus();
        $("#headStationLocation").attr('required', true);
        $("#headStationLocation").css("border", "1px solid red");
      } else if (bussinesLocation === "") {
        $("#bussinesLocation").focus();
        $("#bussinesLocation").attr('required', true);
        $("#bussinesLocation").css("border", "1px solid red");
      } else if (contactPhone === "") {
        $("#contactPhone").focus();
        $("#contactPhone").attr('required', true);
        $("#contactPhone").css("border", "1px solid red");
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
                if (response.status) {

                  HideLoading();

                  swalWithBootstrapButtons.fire(
                    'Succesful ',
                    'Data has been updated',
                    'success'
                  )

                  window.location.href = '/BusinessTripRequest?var=1';
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
              text: "Process Canceled",
              type: 'error',
              confirmButtonColor: '#e9ecef',
              confirmButtonText: '<span style="color:black;"> Ok </span>',

            }).then((result) => {
              if (result.value) {
                ShowLoading();
                window.location.href = '/BusinessTripRequest?var=1';
              }
            })
          }
        })
      }
    });

  });
</script>