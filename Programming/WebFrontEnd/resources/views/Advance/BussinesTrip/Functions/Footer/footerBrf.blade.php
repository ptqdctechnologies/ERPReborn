<script type="text/javascript">
  $(document).ready(function() {
    $("#brfhide1").hide();
    $("#brfhide3").hide();
    $("#brfhide4").hide();
    $("#brfhide5").hide();
    $(".brfhide6").hide();
    $(".budgetDetail").hide();
    $("#tableShowHideGetBudgetArf").hide();
    

    $("#sitecode2").prop("disabled", true);
    $("#request_name2").prop("disabled", true);
    $("#saveBrfList").prop("disabled", true);
  });
</script>

<script>
    $(function() {
        $("#sitecode2").on('click', function(e) {
            e.preventDefault();
            var val = $("#sitecode2").val();
            if (val == "") {
                $("#request_name2").prop("disabled", true);
            } else {
                $("#request_name2").prop("disabled", false);
            }
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
  var x = 1; //initlal text box count        
  var wrapper = $(".input_fields_wrap"); //Fields wrapper
  $('.add_field_button').click(function() {
    cek = 0;
    addColomn();
  });

  function addColomn() { //on add input button click
    if (cek == 0) {
      cek++;
      x++; //text box increment
      $(wrapper).append(

        '<div class="col-md-12">' +
        '<div class="form-group">' +
        '<div class="input-group control-group" style="width:105%;position:relative;center:8px;">' +
        '<input type="file" class="form-control filenames" id="filenames_' + x + '" style="height:26px;">' +
        '<div class="input-group-btn">' +
        '<button class="btn btn-outline-secondary btn-sm remove_field" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>'

      ); //add input box                
    }
  }

  $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
    e.preventDefault();
    $(this).parent().parent().parent('div').remove();
    x--;
  })
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

  $('#AddToBrfListCart').click(function(ev){
    ev.preventDefault();
    ev.stopPropagation();
  // function validateFormAsfPaymentSequence() {
    // var allowance = document.forms["formAsfPaymentSequence"]["allowance"].value;
    // var transport = document.forms["formAsfPaymentSequence"]["transport"].value;
    // var airport_tax = document.forms["formAsfPaymentSequence"]["airport_tax"].value;
    // var accomodation = document.forms["formAsfPaymentSequence"]["accomodation"].value;
    // var other = document.forms["formAsfPaymentSequence"]["other"].value;

    // if (allowance == "") {
    //   document.formAsfPaymentSequence.allowance.focus();
    //   document.formAsfPaymentSequence.allowance.style.border = "1px solid red";
    //   document.getElementById("iconAllowance").style.border = "1px solid red";
    //   document.getElementById("iconAllowance").style.borderRadius = "100pt";
    //   document.getElementById("iconAllowance").style.paddingRight = "7px";
    //   document.getElementById("iconAllowance").style.paddingLeft = "8px";
    //   document.getElementById("iconAllowance").style.paddingTop = "3px";
    //   document.getElementById("iconAllowance").style.paddingBottom = "3px";
    //   document.getElementById("iconAllowance").innerHTML = "&#33";
    //   return false;
    // } else if (transport == "") {
    //   document.formAsfPaymentSequence.transport.focus();
    //   document.formAsfPaymentSequence.transport.style.border = "1px solid red";
    //   document.getElementById("iconTransport").style.border = "1px solid red";
    //   document.getElementById("iconTransport").style.borderRadius = "100pt";
    //   document.getElementById("iconTransport").style.paddingRight = "7px";
    //   document.getElementById("iconTransport").style.paddingLeft = "8px";
    //   document.getElementById("iconTransport").style.paddingTop = "3px";
    //   document.getElementById("iconTransport").style.paddingBottom = "3px";
    //   document.getElementById("iconTransport").innerHTML = "&#33";
    //   return false;
    // } else if (airport_tax == "") {
    //   document.formAsfPaymentSequence.airport_tax.focus();
    //   document.formAsfPaymentSequence.airport_tax.style.border = "1px solid red";
    //   document.getElementById("iconAirportTax").style.border = "1px solid red";
    //   document.getElementById("iconAirportTax").style.borderRadius = "100pt";
    //   document.getElementById("iconAirportTax").style.paddingRight = "7px";
    //   document.getElementById("iconAirportTax").style.paddingLeft = "8px";
    //   document.getElementById("iconAirportTax").style.paddingTop = "3px";
    //   document.getElementById("iconAirportTax").style.paddingBottom = "3px";
    //   document.getElementById("iconAirportTax").innerHTML = "&#33";
    //   return false;
    // } else if (accomodation == "") {
    //   document.formAsfPaymentSequence.accomodation.focus();
    //   document.formAsfPaymentSequence.accomodation.style.border = "1px solid red";
    //   document.getElementById("iconAccomodation").style.border = "1px solid red";
    //   document.getElementById("iconAccomodation").style.borderRadius = "100pt";
    //   document.getElementById("iconAccomodation").style.paddingRight = "7px";
    //   document.getElementById("iconAccomodation").style.paddingLeft = "8px";
    //   document.getElementById("iconAccomodation").style.paddingTop = "3px";
    //   document.getElementById("iconAccomodation").style.paddingBottom = "3px";
    //   document.getElementById("iconAccomodation").innerHTML = "&#33";
    //   return false;
    // } else if (other == "") {
    //   document.formAsfPaymentSequence.other.focus();
    //   document.formAsfPaymentSequence.other.style.border = "1px solid red";
    //   document.getElementById("iconOther").style.border = "1px solid red";
    //   document.getElementById("iconOther").style.borderRadius = "100pt";
    //   document.getElementById("iconOther").style.paddingRight = "7px";
    //   document.getElementById("iconOther").style.paddingLeft = "8px";
    //   document.getElementById("iconOther").style.paddingTop = "3px";
    //   document.getElementById("iconOther").style.paddingBottom = "3px";
    //   document.getElementById("iconOther").innerHTML = "&#33";
    //   return false;
    // } else {


      var varBudgetRequest = $('#budgetRequest').val();
      var varSequenceReq = $('#sequenceRequest').val();
      var varSequence = $('#sequence').val();
      var varAllowance = $('#allowance').val();
      var varTransport = $('#transport').val();
      var varAirport_tax = $('#airport_tax').val();
      var varAccomodation = $('#accomodation').val();
      var varOther = $('#other').val();
      var varSum = +varAllowance + +varTransport + +varAirport_tax + +varAccomodation + +varOther;
      
      if (varSequence > varSequenceReq) {
        Swal.fire("Error !", "Total Sequence more than Sequence Request", "error");
      } else {

        
          $("#sum").val(varSum);
          var sequence = $('#sequence').val();
          var allowance = $('#allowance').val();
          var transport = $('#transport').val();
          var airport_tax = $('#airport_tax').val();
          var accomodation = $('#accomodation').val();
          var other = $('#other').val();
          var sum = $('#sum').val();

          var html = '<tr>'+
                    '<td>'+
                        '<button type="button" class="btn btn-danger btn-xs remove"><i class="fa fa-trash"></i></button> '+
                        '<button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit" style="color:white;"></i></button> '+
                        '<input type="hidden" name="var_product_id[]" value="'+sequence+'">'+
                        '<input type="hidden" name="var_product_name[]" value="'+allowance+'">'+
                        '<input type="hidden" name="var_quantity[]" value="'+transport+'">'+
                        '<input type="hidden" name="var_uom[]" value="'+airport_tax+'">'+
                        '<input type="hidden" name="var_uom[]" value="'+accomodation+'">'+
                        '<input type="hidden" name="var_price[]" value="'+other+'">'+
                    '</td>'+
                    '<td>'+sequence+'</td>'+
                    '<td>'+allowance+'</td>'+
                    '<td>'+transport+'</td>'+
                    '<td>'+airport_tax+'</td>'+
                    '<td>'+accomodation+'</td>'+
                    '<td>'+other+'</td>'+
                '</tr>';
                  
          $('table.tableBrf tbody').append(html);
          
          var varLoop = +varSequence + 1;
          $("#sequence").val(varLoop);

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

          $(".brfhide6").show();
        // }
      }

      $("body").on("click", ".remove", function () {
          var varLoop = varSequence - 1;
          $("#sequence").val(varLoop);
          $(this).closest("tr").remove();
      });
      
    // }
    $("#saveBrfList").prop("disabled", false);
  });
</script>

<script>
  $('#saveBrfList').click(function() {

    const swalWithBootstrapButtons = Swal.mixin({
      confirmButtonClass: 'btn btn-success btn-sm',
      cancelButtonClass: 'btn btn-danger  btn-sm',
      buttonsStyling: true,
    })

    swalWithBootstrapButtons.fire({

      title: 'Are you sure?',
      text: "Save this data?",
      type: 'question',

      showCancelButton: true,
      confirmButtonText: 'Yes, save it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        swalWithBootstrapButtons.fire(
          'Succesful!',
          'Data has been updated !',
          'success'
        )

        //Batas

        var datax = [];
        for (var i = 1; i <= y; i++) {
          var data = {
            lastWorkId: $('#lastWorkId_' + i).html(),
            lastWorkName: $('#lastWorkName_' + i).html(),
            lastProductId: $('#lastProductId_' + i).html(),
            lastProductName: $('#lastProductName_' + i).html(),
            lastQty: $('#lastQty_' + i).val(),
            lastUom: $('#lastUom_' + i).html(),
            lastPrice: $('#lastPrice_' + i).html(),
            totalArfDetails: $('#totalArfDetails_' + i).html(),
            lastCurrency: $('#lastCurrency_' + i).html(),
            lastRemark: $('#lastRemark_' + i).html(),

          }
          datax.push(data);
        }

        var json_object = JSON.stringify(datax);
        console.log(json_object);

        $.ajax({
          type: "POST",
          url: '{{route("ARF.tests")}}',
          data: json_object,
          contentType: "application/json",
          processData: true,
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          },
          success: function(data) {
            console.log(data);
          },
          error: function(data) {
            Swal.fire("Error !", "Data Canceled Added", "error");
          }
        });

        //EndBatas

      } else if (
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Process Canceled !',
          'error'
        )
      }
    })
  });
</script>

<script>
    $(document).ready(function() {
        $('.klikBudgetArf1').click(function() {
          $("#brfhide1").show();
          $("#brfhide5").show();
          $("#budgetNameArf").val("ARF-0001");
        });
        $('.klikBudgetArf2').click(function() {
          $("#brfhide1").show();
          $("#brfhide5").show();
          $("#budgetNameArf").val("ARF-0001");
        });
        $('.klikBudgetArf3').click(function() {
          $("#brfhide1").show();
          $("#brfhide5").show();
          $("#budgetNameArf").val("ARF-0001");
        });
        $('.klikBudgetArf4').click(function() {
          $("#brfhide1").show();
          $("#brfhide5").show();
          $("#budgetNameArf").val("ARF-0001");
        });
    });
</script>