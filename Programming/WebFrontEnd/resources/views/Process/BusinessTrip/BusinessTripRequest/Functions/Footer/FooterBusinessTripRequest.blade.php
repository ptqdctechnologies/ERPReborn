<script type="text/javascript">
  $("#brfhide3").hide();
  $("#brfhide4").hide();
  $(".FormTransportDetails").hide();
  $(".brfhide6").hide();
  $(".budgetDetail").hide();
  $("#sitecode2").prop("disabled", true);
  $("#request_name2").prop("disabled", true);
  $("#SaveBrfList").prop("disabled", true);
  $("#dateEnd").prop("disabled", true);
  $("#dateEnd").css("background-color", "white");
  $("#dateArrival").prop("disabled", true);
  $("#dateArrival").css("background-color", "white");
  $("#putProductId2").prop("disabled", true);
  $("#sequenceRequest").prop("disabled", true);
  $("#FollowingCondition").hide();
  $(".TransportDetails").hide();
  // $(".BrfListCart").hide();
  // $(".file-attachment").hide();
  // $(".tableShowHideBOQ3").hide();
  // $(".FollowingCondition").hide();
  $("#requester_icon").hide();
</script>

<!-- GET SUB BUDGET CODE FROM BUDGET CODE -->
<script>
  $('#tableGetProject tbody').on('click', 'tr', function() {

    //RESET FORM
    // document.getElementById("FormSubmitBusinessTrip").reset();
    $("#dataInput_Log_FileUpload_Pointer_RefID").val("");
    $("#dataInput_Log_FileUpload_Pointer_RefID_Action").val("");
    $('#zhtSysObjDOMTable_Upload_ActionPanel').find('tbody').empty();
    $('.tableBudgetDetail').find('tbody').empty();
    $('.TableBusinessTrip').find('tbody').empty();
    $('#TotalBudgetSelected').html(0);
    $('#GrandTotal').html(0);
    $("#SaveBrfList").prop("disabled", true);
    //END RESET FORM
    
    $("#myProject").modal('toggle');

    var row = $(this).closest("tr");
    var id = row.find("td:nth-child(1)").text();
    var sys_id = $('#sys_id_budget' + id).val();
    var code = row.find("td:nth-child(2)").text();
    var name = row.find("td:nth-child(3)").text();

    $("#projectcode").val(code);
    $("#projectname").val(name);
    $("#sitecode2").prop("disabled", false);

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var keys = 0;
    $.ajax({
      type: 'GET',
      url: '{!! route("getSite") !!}?project_code=' + sys_id,
      success: function(data) {
        var no = 1;
        var t = $('#tableGetSite').DataTable();
        t.clear();
        $.each(data, function(key, val) {
          keys += 1;
          t.row.add([
            '<tbody><tr><input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
            '<td>' + val.Code + '</td>',
            '<td>' + val.Name + '</td></tr></tbody>'
          ]).draw();
        });
      }
    });
  });
</script>

<!-- GET BUDGET DETAILS FROM SUB BUDGET CODE -->
<script>
  $('#tableGetSite tbody').on('click', 'tr', function() {
    const searchBudgetBtn = document.getElementById('budget_detail_search');

    //RESET FORM
    $('.tableBudgetDetail').find('tbody').empty();
    $('.TableBusinessTrip').find('tbody').empty();
    $('#TotalBudgetSelected').html(0);
    $('#GrandTotal').html(0);
    $("#SaveBrfList").prop("disabled", true);
    //END RESET FORM

    $("#mySiteCode").modal('toggle');

    var row = $(this).closest("tr");
    var id = row.find("td:nth-child(1)").text();
    var sys_ID = $('#sys_id_site' + id).val();
    var code = row.find("td:nth-child(2)").text();
    var name = row.find("td:nth-child(3)").text();

    $("#sitecode").val(code);
    $("#sitename").val(name);

    $("#addToDoDetail").prop("disabled", false);
    $(".tableShowHideBOQ3").show();
    $("#request_name2").prop("disabled", false);
    $("#beneficiary_name2").prop("disabled", false);
    $("#bank_name2").prop("disabled", false);

    $(".advance-detail").show();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $.ajax({
      type: 'GET',
      url: '{!! route("getBudget") !!}?site_code=' + sys_ID,
      success: function(data) {
        searchBudgetBtn.style.display = 'block';

        $.each(data, function(key, val2) {
          var html = 
            '<tr>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                '<input type="checkbox" aria-label="Checkbox for following text input">' +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                val2.product_RefID +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                val2.productName +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                numberFormatPHPCustom(val2.quantity, 2) +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                numberFormatPHPCustom(val2.quantityRemaining, 2) +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                numberFormatPHPCustom(val2.priceBaseCurrencyValue, 2) +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                val2.priceBaseCurrencyISOCode +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                numberFormatPHPCustom(50000, 2) +
              '</td>' +
              '<td style="padding-top: 10px !important; padding-bottom: 10px !important; text-align: center !important; border: 1px solid #e9ecef !important; padding-left: 10px !important; padding-right: 10px !important;">' +
                numberFormatPHPCustom(val2.quantity * val2.priceBaseCurrencyValue, 2) +
              '</td>' +
            '</tr>';

          $('table#budgetTable tbody').append(html);
        });

        handleCheckboxSelection();
      }
    });
  });
</script>

<!-- FUNCTION SEARCH BUDGET DETAILS -->
<script>
  $(document).ready(function() {
    $('#budget_detail_search').on('input', function() {
      const searchValue = $(this).val().toLowerCase();
      
      const rows = $('#budgetTable tbody tr');

      rows.each(function() {
        const row = $(this);
        const productId = row.find('td:eq(1)').text().trim().toLowerCase();
        const productName = row.find('td:eq(2)').text().trim().toLowerCase();
        
        if (productId.includes(searchValue) || productName.includes(searchValue)) {
          row.show();
        } else {
          row.hide();
        }
      });
    });

    $('#budget_detail_search').on('change', function() {
      if ($(this).val() === '') {
        $('#budgetTable tbody tr').show();
      }
    });
  });
</script>

<script>
  function addFromDetailtoCartJs() {

    $('#TableBusinessTrip').find('tbody').empty();

    $(".BrfListCart").show();
    var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
    // var getWorkId = $("input[name='getWorkId[]']").map(function() {
    //   return $(this).val();
    // }).get();
    // var getWorkName = $("input[name='getWorkName[]']").map(function() {
    //   return $(this).val();
    // }).get();
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
    var TotalBudgetSelected = 0;
    var TotalAllowance = 0;
    var TotalAccomodation = 0;
    var TotalOther = 0;

    var total_req = $("input[name='total_req[]']").map(function() {
      return $(this).val();
    }).get();
    $.each(total_req, function(index, data) {
      if (total_req[index] != "" && total_req[index] > "0.00" && total_req[index] != "NaN.00") {

        var putProductId = getProductId[index];
        var putProductName = getProductName[index];
        var putUom = getUom[index];

        if (getProductName[index] == "Unspecified Product") {
          var putProductId = $("#putProductId" + index).val();
          var putProductName = $("#putProductName" + index).html();
          var putUom = $("#putUom" + index).val();
        }
        TotalBudgetSelected += +total_req[index].replace(/,/g, '');
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
          '<input type="hidden" name="var_allowance[]" value="' + allowance_req[index] + '">' +
          '<input type="hidden" name="var_accomodation[]" value="' + accomodation_req[index] + '">' +
          '<input type="hidden" name="var_other[]" value="' + other_req[index] + '">' +

          // '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkId[index] + '</td>' +
          // '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkName[index] + '</td>' +
          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
          // '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putUom + '</td>' +
          // '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="allowance_req2' + index + '">' + currencyTotal(allowance_req[index]) + '</span>' + '</td>' +
          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="accomodation_req2' + index + '">' + currencyTotal(accomodation_req[index]) + '</span>' + '</td>' +
          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="other_req2' + index + '">' + currencyTotal(other_req[index]) + '</span>' + '</td>' +
          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="' + index + '" class="total_req2' + index + '">' + currencyTotal(total_req[index]) + '</span>' + '</td>' +
          '</tr>';
        $('table.TableBusinessTrip tbody').append(html);

        $("#GrandTotal").html(currencyTotal(TotalBudgetSelected));
        $("#TotalAllowance").html(currencyTotal(TotalAllowance));
        $("#TotalAccomodation").html(currencyTotal(TotalAccomodation));
        $("#TotalOther").html(currencyTotal(TotalOther));

        $("#SaveBrfList").prop("disabled", false);
      }
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
  // document.getElementById('dateDepart').setAttribute('min', today.toISOString().split('T')[0]);
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

<script>
  $(function() {
    $("#FormSubmitBusinessTrip").on("submit", function(e) { //id of form 
      e.preventDefault();
      var request_name = $("#request_name").val();
      var projectcode = $("#projectcode").val();
      var sitecode = $("#sitecode").val();
      var reasonTravel = $("#reasonTravel").val();
      var dateCommance = $("#dateCommance").val();
      var dateEnd = $("#dateEnd").val();
      var headStationLocation = $("#headStationLocation").val();
      var bussinesLocation = $("#bussinesLocation").val();
      var contactPhone = $("#contactPhone").val();
      var transportApplicable = $(".transportApplicable").val();

      var arrayTransportTypeApplicable = [];
      $.each($("input[name='TransportTypeApplicable']:checked"), function() {
        arrayTransportTypeApplicable.push($(this).val());
      });

      $("#projectcode").css("border", "1px solid #ced4da");
      $("#sitecode").css("border", "1px solid #ced4da");
      $("#request_name").css("border", "1px solid #ced4da");
      $("#contactPhone").css("border", "1px solid #ced4da");
      $("#dateCommance").css("border", "1px solid #ced4da");
      $("#dateEnd").css("border", "1px solid #ced4da");
      $("#headStationLocation").css("border", "1px solid #ced4da");
      $("#bussinesLocation").css("border", "1px solid #ced4da");
      $("#reasonTravel").css("border", "1px solid #ced4da");
      document.getElementsByClassName("form-group")[5].style.border = '1px solid #ced4da';

      // if (projectcode === "") {
      //   $("#projectcode").focus();
      //   $("#projectcode").attr('required', true);
      //   $("#projectcode").css("border", "1px solid red");
      // } else if (sitecode === "") {
      //   $("#sitecode").focus();
      //   $("#sitecode").attr('required', true);
      //   $("#sitecode").css("border", "1px solid red");
      // } else if (request_name === "") {
      //   $("#request_name").focus();
      //   $("#request_name").attr('required', true);
      //   $("#request_name").css("border", "1px solid red");
      // }  else if (contactPhone === "") {
      //   $("#contactPhone").focus();
      //   $("#contactPhone").attr('required', true);
      //   $("#contactPhone").css("border", "1px solid red");
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
      // } else if (reasonTravel === "") {
      //   $("#reasonTravel").focus();
      //   $("#reasonTravel").attr('required', true);
      //   $("#reasonTravel").css("border", "1px solid red");
      // } else if (arrayTransportTypeApplicable.length == 0) {
      //   $(".FollowingCondition").show();
      //   document.getElementsByClassName("form-group")[5].style.border = '1px solid red';
      // }  
      // else {

      var arr = [];
      $.each($("input[name='TransportTypeApplicable']:checked"), function() {
        arr.push($(this).val());
      });

      var html = '<input type="hidden" name="TransportTypeApplicable" value="' + arr + '">';
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
                  ShowLoading();
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
              ShowLoading();
              window.location.href = '/BusinessTripRequest?var=1';
            }
          })
        }
      })
      // }
    });

  });
</script>

<script>
  // Fungsi untuk menangani checkbox pada tabel
  function handleCheckboxSelection() {
    // Ambil semua checkbox dalam tabel
    const checkboxes = document.querySelectorAll('#budgetTable tbody input[type="checkbox"]');
    
    // Tambahkan event listener untuk setiap checkbox
    checkboxes.forEach((checkbox, index) => {
      checkbox.addEventListener('change', function() {
        if (this.checked) {
          // Jika checkbox ini dicentang, nonaktifkan semua checkbox lainnya
          checkboxes.forEach((otherCheckbox, otherIndex) => {
            if (otherIndex !== index) {
              otherCheckbox.disabled = true;
              otherCheckbox.checked = false;
            }
          });
          // Panggil fungsi untuk menyimpan data saat checkbox dicentang
          getSelectedRowData();
        } else {
          // Jika checkbox ini dinonaktifkan, aktifkan kembali semua checkbox
          checkboxes.forEach(otherCheckbox => {
            otherCheckbox.disabled = false;
          });
          // Kosongkan input saat tidak ada checkbox yang dicentang
          document.getElementById('budgetDetailsData').value = '';
        }
      });
    });
  }

  // Fungsi untuk mengubah string angka dengan format ke number
  function parseFormattedNumber(strNumber) {
    return parseFloat(strNumber.replace(/,/g, ''));
  }
  
  // Fungsi untuk mendapatkan data baris yang dicentang dan menyimpan ke input
  function getSelectedRowData() {
    const selectedCheckbox = document.querySelector('#budgetTable tbody input[type="checkbox"]:checked');
    const budgetDetailsInput = document.getElementById('budgetDetailsData');
    const totalBusinessTripInput = document.getElementById('total_business_trip');
    
    if (selectedCheckbox) {
      const row = selectedCheckbox.closest('tr');
      const datas = {
        productId: row.cells[1].textContent.trim(),
        productName: row.cells[2].textContent.trim(),
        qtyBudget: row.cells[3].textContent.trim(),
        qtyAvail: row.cells[4].textContent.trim(),
        price: row.cells[5].textContent.trim(),
        currency: row.cells[6].textContent.trim(),
        balanceBudget: row.cells[7].textContent.trim(),
        totalBudget: row.cells[8].textContent.trim()
      };
      
      // Simpan data ke dalam input sebagai JSON string
      budgetDetailsInput.value = JSON.stringify(datas);

      // Validasi balance budget dengan total business trip
      const balanceBudget = parseFormattedNumber(datas.balanceBudget);
      const totalBusinessTrip = parseFormattedNumber(totalBusinessTripInput.value || '0');

      if (totalBusinessTrip > balanceBudget) {
        Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
      }
    } else {
      // Kosongkan input jika tidak ada checkbox yang dicentang
      budgetDetailsInput.value = '';
    }
  }
</script>

<!-- FUNCTION TOTAL TRANSPORT -->
<script>
  const totalBusinessTrip = [];
  const initialValue = 0;

  function calculateTotalTransport() {
    const taxi = parseFloat(document.getElementById('taxi').value.replace(/,/g, '')) || 0;
    const airplane = parseFloat(document.getElementById('airplane').value.replace(/,/g, '')) || 0;
    const train = parseFloat(document.getElementById('train').value.replace(/,/g, '')) || 0;
    const bus = parseFloat(document.getElementById('bus').value.replace(/,/g, '')) || 0;
    const ship = parseFloat(document.getElementById('ship').value.replace(/,/g, '')) || 0;
    const tolRoad = parseFloat(document.getElementById('tol_road').value.replace(/,/g, '')) || 0;
    const park = parseFloat(document.getElementById('park').value.replace(/,/g, '')) || 0;
    const accessBagage = parseFloat(document.getElementById('access_bagage').value.replace(/,/g, '')) || 0;
    const fuel = parseFloat(document.getElementById('fuel').value.replace(/,/g, '')) || 0;

    let newFormatBudget = 0;
    let budgetDetailsDataJSON = null;
    try {
      budgetDetailsDataJSON = document.getElementById('budgetDetailsData').value;
      if (budgetDetailsDataJSON) {
        const parsedData = JSON.parse(budgetDetailsDataJSON);
        newFormatBudget = parseFloat(parsedData.balanceBudget.replace(/,/g, '')) || 0;
      } else {
        // console.warn('Budget details data is empty');
      }
    } catch (error) {
      console.error('Error parsing budget details JSON:', error);
      return;
    }

    const total = taxi + airplane + train + bus + ship + tolRoad + park + accessBagage + fuel;
    totalBusinessTrip[0] = total;

    const sumTotalBusinessTrip = totalBusinessTrip.reduce((accumulator, currentValue) => accumulator + currentValue, initialValue);

    document.getElementById('total_transport').value = numberFormatPHPCustom(total, 2);
    document.getElementById('total_business_trip').value = numberFormatPHPCustom(sumTotalBusinessTrip, 2);

    if (budgetDetailsDataJSON && sumTotalBusinessTrip > newFormatBudget) {
      Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
    }
  }

  const transportInputs = [
    'taxi',
    'airplane',
    'train',
    'bus',
    'ship',
    'tol_road',
    'park',
    'access_bagage',
    'fuel'
  ];

  transportInputs.forEach(id => {
    const inputElement = document.getElementById(id);
    if (inputElement) {
      inputElement.addEventListener('input', calculateTotalTransport);
    }
  });
</script>

<!-- FUNCTION TOTAL ACCOMODATION -->
<script>
  function calculateTotalAccomodation() {
    const hotel = parseFloat(document.getElementById('hotel').value.replace(/,/g, '')) || 0;
    const mess = parseFloat(document.getElementById('mess').value.replace(/,/g, '')) || 0;
    const guest_house = parseFloat(document.getElementById('guest_house').value.replace(/,/g, '')) || 0;
    const other_accomodation = parseFloat(document.getElementById('other_accomodation').value.replace(/,/g, '')) || 0;

    let newFormatBudget = 0;
    let budgetDetailsDataJSON = null;
    try {
      budgetDetailsDataJSON = document.getElementById('budgetDetailsData').value;
      if (budgetDetailsDataJSON) {
        const parsedData = JSON.parse(budgetDetailsDataJSON);
        newFormatBudget = parseFloat(parsedData.balanceBudget.replace(/,/g, '')) || 0;
      } else {
        // console.warn('Budget details data is empty');
      }
    } catch (error) {
      console.error('Error parsing budget details JSON:', error);
      return;
    }

    const total = hotel + mess + guest_house + other_accomodation;
    totalBusinessTrip[1] = total;

    const sumTotalBusinessTrip = totalBusinessTrip.reduce((accumulator, currentValue) => accumulator + currentValue,initialValue);
    
    document.getElementById('total_accomodation').value = numberFormatPHPCustom(total, 2);
    document.getElementById('total_business_trip').value = numberFormatPHPCustom(sumTotalBusinessTrip, 2);

    if (budgetDetailsDataJSON && sumTotalBusinessTrip > newFormatBudget) {
      Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
    }
  }

  const accomodationInputs = [
    'hotel',
    'mess',
    'guest_house',
    'other_accomodation',
  ];

  accomodationInputs.forEach(id => {
    const inputElement = document.getElementById(id);
    if (inputElement) {
      inputElement.addEventListener('input', calculateTotalAccomodation);
    }
  });
</script>

<!-- FUNCTION TOTAL BUSINESS TRIP -->
<script>
  function calculateTotalBusinessTrip() {
    const allowance = parseFloat(document.getElementById('allowance').value.replace(/,/g, '')) || 0;
    const entertainment = parseFloat(document.getElementById('entertainment').value.replace(/,/g, '')) || 0;
    const other = parseFloat(document.getElementById('other').value.replace(/,/g, '')) || 0;

    let newFormatBudget = 0;
    let budgetDetailsDataJSON = null;
    try {
      budgetDetailsDataJSON = document.getElementById('budgetDetailsData').value;
      if (budgetDetailsDataJSON) {
        const parsedData = JSON.parse(budgetDetailsDataJSON);
        newFormatBudget = parseFloat(parsedData.balanceBudget.replace(/,/g, '')) || 0;
      } else {
        // console.warn('Budget details data is empty');
      }
    } catch (error) {
      console.error('Error parsing budget details JSON:', error);
      return;
    }

    const total = allowance + entertainment + other;
    totalBusinessTrip[2] = total;

    const sumTotalBusinessTrip = totalBusinessTrip.reduce((accumulator, currentValue) => accumulator + currentValue,initialValue);

    document.getElementById('total_business_trip').value = numberFormatPHPCustom(sumTotalBusinessTrip, 2);

    if (budgetDetailsDataJSON && sumTotalBusinessTrip > newFormatBudget) {
      Swal.fire("Error", `Total Business Trip must not exceed the selected Balanced Budget`, "error");
    }
  }

  const businessTripInputs = [
    'allowance',
    'entertainment',
    'other',
  ];

  businessTripInputs.forEach(id => {
    const inputElement = document.getElementById(id);
    
    if (inputElement) {
      inputElement.addEventListener('input', calculateTotalBusinessTrip);
    }
  });
</script>