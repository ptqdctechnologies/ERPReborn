<script type="text/javascript">
  $(document).ready(function() {
    $("#brfhide1").hide();
    $("#brfhide3").hide();
    $("#brfhide4").hide();
    $("#brfhide5").hide();
    $(".brfhide6").hide();
    $(".budgetDetail").hide();
    $("#tableShowHideBOQ3").hide();
    $("#sitecode2").prop("disabled", true);
    $("#request_name2").prop("disabled", true);
    $("#saveBrfList").prop("disabled", true);
  });
</script>

<script>
  $(function() {
    $('.klikProject').on('click', function(e) {
      e.preventDefault();
      let $this = $(this);
      let code = $this.data("id");
      let name = $this.data("name");
      $("#projectcode").val(code);
      $("#projectcode2").val(code);
      $("#projectname").val(name);
      $("#headerProjectCode").val(code);
      $("#sitecode2").prop("disabled", false);
      $("#advance_number2").prop("disabled", false);
      $("#headerPrNumber2").prop("disabled", false);

      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $.ajax({
        type: 'GET',
        url: '{!! route("getProject") !!}?projectcode=' + $('#projectcode').val(),
        success: function(data) {

          var no = 1;

          var t = $('#tableGetSite').DataTable();
          $.each(data, function(key, val) {

            t.row.add([
              '<tbody><tr><td>' + no++ + '</td>',
              '<td><span data-dismiss="modal" class="klikSite" data-id="' + val.sys_ID + '" data-name="' + val.sys_Text + '">' + val.sys_ID + '</span></td>',
              '<td style="border:1px solid #e9ecef;">' + val.sys_Text + '</td></tr></tbody>'
            ]).draw();

          });

          $('.klikSite').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var code = $this.data("id");
            var name = $this.data("name");
            $("#sitecode").val(code);
            $("#sitecode2").val(name);
            $("#sitename").val(name);
            $("#sitecode2").prop("disabled", true);
            $("#projectcode2").prop("disabled", true);
            $("#tableShowHideBOQ3").show();
            $("#request_name2").prop("disabled", false);

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
              type: 'GET',
              url: '{!! route("getSite") !!}?sitecode=' + $('#sitecode').val(),
              success: function(data) {
                var no = 1;
                $.each(data, function(key, val2) {
                  var html = '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:5%;">' +
                    '&nbsp;&nbsp;<button type="reset" class="btn btn-sm klikBudgetDetail" data-id1="' + val2.product_RefID + '" data-id2="' + val2.quantity + '" data-id3="' + val2.unitPriceBaseCurrencyValue + '" data-id4="' + val2.sys_ID + '" data-id5="' + val2.productName + '" data-id6="' + val2.quantityUnitName + '" data-id7="' + val2.priceBaseCurrencyISOCode + '" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="15" alt="" title="Add to Detail"></button>' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' +
                    '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkId">' + val2.combinedBudgetSubSectionLevel1_RefID + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkName">' + val2.combinedBudgetSubSectionLevel2Name + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getProductId">' + val2.product_RefID + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getProductName">' + val2.productName + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getQty">' + val2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getQty2">' + val2.quantityRemain.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getPrice">' + val2.unitPriceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="totalArf">' + val2.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getUom">' + val2.quantityUnitName + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getCurrency">' + val2.priceBaseCurrencyISOCode + '</span>' + '</td>' +
                    '</tr>';

                  $('table.tableBudgetDetail tbody').append(html);
                });

                $('.klikBudgetDetail').on('click', function(e) {
                  e.preventDefault();
                  var $this = $(this);
                  var price = $this.data("id3");
                  var productId = $this.data("id1");
                  var qty = $this.data("id2");
                  var combinedBudget = $this.data("id4");
                  var productName = $this.data("id5");
                  var uom = $this.data("id6");
                  var currency = $this.data("id7");

                  if (productName == "Unspecified Product") {
                    $("#product_id2").prop("disabled", false);
                    var putProductName = "";
                    var putProductId = "";
                    $("#statusProduct").val("Yes");
                  } else {
                    $("#product_id2").prop("disabled", true);
                    var putProductName = productName;
                    var putProductId = productId;
                    $("#statusProduct").val("No");
                  }
                  $("#putProductId").val(putProductId);
                  $("#putProductName").val(putProductName);
                  $("#qtyCek").val(qty);
                  $("#putQty").val(qty);
                  $("#putUom").val(uom);
                  $("#priceCek").val(parseFloat(price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                  $("#putPrice").val(price);
                  $("#putCurrency").val(currency);
                  $("#totalArfDetails").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                  $("#totalPieceMealDetails").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                  $("#totalProcReqDetails").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                  $("#totalBalance").val(parseFloat(qty * price).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                  $("#combinedBudget").val(combinedBudget);


                  // $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", true);
                  $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", true);
                  $("#brfhide1").show();
                });
              }
            });

          });
        }
      });
    });

  });
</script>


<script>
  $('document').ready(function() {
    $(".klikWorker").on('click', function(e) {
      e.preventDefault(); // in chase you change to a link or button
      var $this = $(this);
      var id = $this.data("id");
      var name = $this.data("name");
      $("#request_id").val(id);
      $("#request_name").val(id + ' - ' + name);
    });
  });
</script>


<script>
  $(document).ready(function() {
    $('#longTerm').click(function() {
      $("#sequenceRequest").val('0');
      $(".budgetDetail").show();
      $("#sequenceRequest").prop("disabled", false);
    });

    $('#shortTerm').click(function() {
      $("#sequenceRequest").val('1');
      $(".budgetDetail").show();
      $("#sequenceRequest").prop("disabled", true);
    });

    $('#dayTripTravel').click(function() {
      $("#sequenceRequest").val('1');
      $(".budgetDetail").show();
      $("#sequenceRequest").prop("disabled", true);
    });
  });
</script>

<script>
  var varTotal = 0;
  var valAllowance = 0;
  var valTransport = 0;
  var valAirportTax = 0;
  var valAccomodation = 0;
  var valOthers = 0;
  var varTotalBrf = 0;
  var y = 0;

  $('#AddToBrfListCart').click(function(ev) {
    ev.preventDefault();
    ev.stopPropagation();

    var varBudgetRequest = $('#budgetRequest').val();
    var varSequenceReq = $('#sequenceRequest').val();
    var varSequence = $('#sequence').val();
    var varAllowance = $('#allowance').val();
    var varTransport = $('#transport').val();
    var varAirport_tax = $('#airport_tax').val();
    var varAccomodation = $('#accomodation').val();
    var varOther = $('#other').val();

    if (varSequence > varSequenceReq) {
      Swal.fire("Error !", "Total Sequence more than Sequence Request", "error");
    } else {

      if (varSequence == varSequenceReq) {
        $("#saveBrfList").prop("disabled", false);
      }

      var sequence = $('#sequence').val();
      var allowance = $('#allowance').val();
      var transport = $('#transport').val();
      var airport_tax = $('#airport_tax').val();
      var accomodation = $('#accomodation').val();
      var other = $('#other').val();

      var varLoop = +varSequence + 1;
      $("#sequence").val(varLoop);

      var varTotal = +allowance + +transport + +airport_tax + +accomodation + +other;

      if (varTotal > varBudgetRequest) {

        Swal.fire("Error !", "Total Budget more than Budget Request", "error");
        var varLoop = $("#sequence").val() - 1;
        $("#sequence").val(varLoop);

      } else {

        valAllowance += +allowance;
        valTransport += +transport;
        valAirportTax += +airport_tax;
        valAccomodation += +accomodation;
        valOthers += +other;

        varTotalBrf = +valAllowance + +valTransport + +valAirportTax + +valAccomodation + +valOthers;

        $("#valAllowance").html(valAllowance);
        $("#valTransport").html(valTransport);
        $("#valAirportTax").html(valAirportTax);
        $("#valAccomodation").html(valAccomodation);
        $("#valOthers").html(valOthers);
        $("#totalBrf").html(varTotalBrf);
        $("#totalSequence").html(varSequenceReq);

        var html = '<tr>' +
          '<td>' +
          '<button type="button" class="btn btn-danger btn-xs remove"><i class="fa fa-trash"></i></button> ' +
          '<button type="button" class="btn btn-warning btn-xs edit" data-dismiss="modal" data-id1="' + allowance + '" data-id2="' + transport + '" data-id3="' + airport_tax + '" data-id4="' + accomodation + '" data-id5="' + other + '"><i class="fa fa-edit" style="color:white;"></i></button> ' +
          '<input type="hidden" name="sequence[]" value="' + sequence + '">' +
          '<input type="hidden" name="allowance[]" value="' + allowance + '">' +
          '<input type="hidden" name="transport[]" value="' + transport + '">' +
          '<input type="hidden" name="airport_tax[]" value="' + airport_tax + '">' +
          '<input type="hidden" name="accomodation[]" value="' + accomodation + '">' +
          '<input type="hidden" name="other[]" value="' + other + '">' +
          '</td>' +
          '<td>' + allowance + '</td>' +
          '<td>' + transport + '</td>' +
          '<td>' + airport_tax + '</td>' +
          '<td>' + accomodation + '</td>' +
          '<td>' + other + '</td>' +
          '</tr>';

        $('table.tableBrf tbody').append(html);
        $(".brfhide6").show();
      }
    }
    $("body").on("click", ".remove", function() {
      var varLoop = varSequence - 1;
      $("#sequence").val(varLoop);
      $(this).closest("tr").remove();

      if (varSequenceReq != varLoop) {
        $("#saveBrfList").prop("disabled", true);
      }
    });

    $("body").on("click", ".edit", function() {
      var $this = $(this);
      var id1 = $this.data("id1");
      var id2 = $this.data("id2");
      var id3 = $this.data("id3");
      var id4 = $this.data("id4");
      var id5 = $this.data("id5");
      $("#allowance").val(id1);
      $("#transport").val(id2);
      $('#airport_tax').val(id3);
      $("#accomodation").val(id4);
      $("#other ").val(id5);

      var varLoop = varSequence - 1;
      $("#sequence").val(varLoop);
      $(this).closest("tr").remove();
    });

    $("#allowance").val("");
    $("#transport").val("");
    $('#airport_tax').val("");
    $("#accomodation").val("");
    $("#other ").val("");
  });
</script>

<script type="text/javascript">
    function CancelBusinessTrip() {
        $("#loading").show();
        $(".loader").show();
        location.reload();
    }
</script>