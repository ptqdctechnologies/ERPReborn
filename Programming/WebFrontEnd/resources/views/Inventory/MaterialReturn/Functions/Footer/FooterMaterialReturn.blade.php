<script type="text/javascript">
  $(document).ready(function() {
    $("#addToDoDetail").prop("disabled", true);
    $("#SubmitMaterialReturn").prop("disabled", true);
    $("#DetailMaterialReturn").hide();
    $("#sitecode2").prop("disabled", true);
    $("#SubmitMaterialReturn").prop("disabled", true);


  });
</script>

<script>
  $('#tableGetProject tbody').on('click', 'tr', function() {

    //RESET FORM
    document.getElementById("FormSubmitMatRet").reset();
    $('.TableDorDetail').find('tbody').empty();
    $('.TableMaterialReturn').find('tbody').empty();
    $('#TotalBudgetSelected').html(0);
    $('#TotalQty').html(0);
    $("#SubmitMaterialReturn").prop("disabled", true);
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

    var key = 0;
    $.ajax({
      type: 'GET',
      url: '{!! route("getSite") !!}?project_code=' + sys_id,
      success: function(data) {

        var no = 1;
        var t = $('#tableGetSite').DataTable();
        t.clear();
        $.each(data, function(key, val) {
          key += 1;
          t.row.add([
            '<tbody><tr><input id="sys_id_site' + key + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
            '<td>' + val.Code + '</td>',
            '<td>' + val.Name + '</td></tr></tbody>'
          ]).draw();
        });
      }
    });
  });
</script>


<script>
  $('#tableGetSite tbody').on('click', 'tr', function() {

    //RESET FORM
    $('.TableDorDetail').find('tbody').empty();
    $('.TableMaterialReturn').find('tbody').empty();
    $('#TotalBudgetSelected').html(0);
    $('#TotalQty').html(0);
    $("#SubmitMaterialReturn").prop("disabled", true);
    //END RESET FORM

    $("#mySiteCode").modal('toggle');

    var row = $(this).closest("tr");
    var id = row.find("td:nth-child(1)").text();
    var sys_id = $('#sys_id_site' + id).val();
    var code = row.find("td:nth-child(2)").text();
    var name = row.find("td:nth-child(3)").text();

    $("#siteid").val(sys_id);
    $("#sitecode").val(code);
    $("#sitename").val(name);

    $("#addToDoDetail").prop("disabled", false);

  });
</script>

<script>
  $(function() {

    $('#addToDoDetail').on('click', function(e) {
      e.preventDefault(); // in chase you change to a link or button
      $("#addToDoDetail").prop("disabled", true);
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });


      $.ajax({
        type: 'GET',
        url: '{!! route("getBudget") !!}?site_code=' + $('#siteid').val(),
        success: function(data) {

          var no = 1;
          applied = 0;
          TotalBudgetSelectedTamp = 0;
          status = "";
          statusDisplay = [];
          statusDisplay2 = [];
          statusForm = [];
          $.each(data, function(key, value) {

            var used = value.quantityAbsorptionRatio * 100;
            if (used == "0.00" && value.quantity == "0.00") {
              var applied = 0;
            } else {
              var applied = Math.round(used);
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

            var html = '<tr>' +
              '<input name="getWorkId[]" value="' + value.combinedBudgetSubSectionLevel1_RefID + '" type="hidden">' +
              '<input name="getWorkName[]" value="' + value.combinedBudgetSubSectionLevel1Name + '" type="hidden">' +
              '<input name="getProductId[]" value="' + value.product_RefID + '" type="hidden">' +
              '<input name="getProductName[]" value="' + value.productName + '" type="hidden">' +
              '<input name="getQtyId[]" id="budget_qty_id' + key + '" value="' + value.quantityUnit_RefID + '" type="hidden">' +
              '<input name="getQty[]" id="budget_qty' + key + '" value="' + value.quantity + '" type="hidden">' +
              '<input name="getPrice[]" id="budget_price' + key + '" value="' + value.priceBaseCurrencyValue + '" type="hidden">' +
              '<input name="getUom[]" value="' + value.quantityUnitName + '" type="hidden">' +
              '<input name="getCurrency[]" value="' + value.priceBaseCurrencyISOCode + '" type="hidden">' +
              '<input name="getCurrencyId[]" value="' + value.sys_BaseCurrency_RefID + '" type="hidden">' +
              '<input name="combinedBudgetSectionDetail_RefID[]" value="' + value.sys_ID + '" type="hidden">' +
              '<input name="combinedBudget_RefID" value="' + value.combinedBudget_RefID + '" type="hidden">' +

              '<td style="border:1px solid #e9ecef;display:' + statusDisplay[key] + '";">' +
              '<div class="input-group">' +
              '<input id="product_id' + key + '" style="border-radius:0;width:130px;background-color:white;" name="product_id" class="form-control" readonly>' +
              '<div class="input-group-append">' +
              '<span style="border-radius:0;" class="input-group-text form-control" data-id="10">' +
              '<a id="product_id2" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(' + key + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
              '</span>' +
              '</div>' +
              '</div>' +
              '</td>' +

              '<td style="border:1px solid #e9ecef;display:' + statusDisplay2[key] + '">' + '<span>' + value.product_RefID + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + value.productName + '">' + '<span id="product_name' + key + '">' + value.productName + '</span>' + '</td>' +
              '<input id="putUom' + key + '" type="hidden">' +

              '<input id="TotalBudget' + key + '" type="hidden">' +

              '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyISOCode + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + currencyTotal(value.quantity)+ '</td>' +

              '<td class="sticky-col second-col-dor-qty" style="border:1px solid #e9ecef;background-color:white;">' + '<input onkeypress="return isNumberKey(this, event);" id="qty_req' + key + '" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" ' + statusForm[key] + '>' + '</td>' +
              '<td class="sticky-col first-col-dor-note" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="note_req' + key + '" style="border-radius:0;" name="note_req[]" class="form-control note_req" autocomplete="off" ' + statusForm[key] + '>' + '</td>' +

              '</tr>';
            $('table.TableDorDetail tbody').append(html);

            //VALIDASI QTY
            $('#qty_req' + key).keyup(function() {
              var qty_val = $(this).val().replace(/,/g, '');
              var budget_qty_val = $("#budget_qty" + key).val();

              if (qty_val == "") {
                $('#qty_req' + key).val("");
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
                $('#qty_req' + key).val(qty_val);
              }

              //MEMANGGIL FUNCTION TOTAL BUDGET SELECTED
              // TotalBudgetSelected();
            });

          });
        },
      });
    });
  });
</script>

<script>
  function addFromDetailtoCartJs() {

    $('#TableMaterialReturn').find('tbody').empty();

    $("#SubmitMaterialReturn").prop("disabled", false);

    var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
    var getTrano = $("input[name='getTrano[]']").map(function() {
      return $(this).val();
    }).get();
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

    var TotalBudgetSelectedTamp = 0;
    var TotalQty = 0;

    $.each(qty_req, function(index, data) {
      if (qty_req[index] != "" && qty_req[index] > "0.00" && qty_req[index] != "NaN.00") {

        var product_id = getProductId[index];
        var product_name = getProductName[index];
        var putUom = getUom[index];

        if (getProductName[index] == "Unspecified Product") {
            var product_id = $("#product_id" + index).val();
            var product_name = $("#product_name" + index).html();
            var putUom = $("#putUom" + index).val();
        }
        TotalBudgetSelectedTamp += +qty_req[index].replace(/,/g, '');
        TotalQty += +qty_req[index].replace(/,/g, '');
        var html = '<tr>' +

          '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
          '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + product_name + '">' +
          '<input type="hidden" name="var_quantity[]" class="qty_req2' + index + '" data-id="' + index + '" value="' + currencyTotal(qty_req[index]).replace(/,/g, '') + '">' +
          '<input type="hidden" name="var_uom[]" value="' + getUom[index] + '">' +
          '<input type="hidden" name="var_currency[]" value="' + getCurrency[index] + '">' +
          '<input type="hidden" name="var_date" value="' + date + '">' +
          '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +

          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + product_id + '</td>' +
          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;max-width:15px;overflow: hidden;" title="' + product_name + '">' + product_name + '</td>' +
          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + note_req[index] + '</td>' +
          '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + qty_req[index] + '</td>' +

          '</tr>';

        $('table.TableMaterialReturn tbody').append(html);

        $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelectedTamp));
        // $("#GrandTotal").html(currencyTotal(TotalBudgetSelectedTamp));
        $("#TotalQty").html(currencyTotal(TotalQty));

        $("#SubmitDo").prop("disabled", false);
      }
    });

  }
</script>

<script>
  $(function() {
    $(".warehouseMret").on('click', function(e) {
      e.preventDefault();
      var valAddress = $(".warehouseMret").val();
      if (valAddress == "Jakarta") {
        $("#address").val("Jakarta");
      } else if (valAddress == "Bandung") {
        $("#address").val("Bandung");
      } else if (valAddress == "Surabaya") {
        $("#address").val("Surabaya");
      }
    });
  });
</script>

<script>
  $('document').ready(function() {
    $('.ChangeQty').keyup(function() {
      var qtyReq = $(this).val();
      var putQty = $('#putQty').val();
      var priceCek = parseFloat($('#priceCek').val().replace(/,/g, ''));
      var total = qtyReq * priceCek;

      if (parseFloat(qtyReq) == '') {
        $("#qtyCek").css("border", "1px solid red");
      } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
        Swal.fire("Error !", "Your Quantity Request is Over", "error");
        $("#qtyCek").val("");
        $("#qtyCek").css("border", "1px solid red");
      } else {
        var totalReq = parseFloat(total);
        $('#totalMret').val(parseFloat(totalReq).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $("#qtyCek").css("border", "1px solid #ced4da");
      }
    });
  });
</script>

<script type="text/javascript">
  function CancelMatRet() {
    ShowLoading();
    window.location.href = '/MaterialReturn?var=1';
  }
</script>

<script type="text/javascript">
  function ResetMaterialReturn() {
    $("#projectcode").val("");
    $("#warehouseMret").val("");
    $("#address").val("");
    $("#sitecode").val("");
    $("#DoNumberMret").val("");
    $("#delivery").val("");
    $("#receive").val("");
    $("#projectname").val("");
    $("#sitename").val("");

    $("#projectcode2").prop("disabled", false);
    $("#sitecode2").prop("disabled", false);
  }
</script>

<script>
  $(function() {
    $("#FormSubmitMatRet").on("submit", function(e) { //id of form 
      e.preventDefault();


      var warehouseMret = $("#warehouseMret").val();
      var DoNumberMret = $("#DoNumberMret").val();
      var delivery = $("#delivery").val();
      var receive = $("#receive").val();
      $("#warehouseMret").css("border", "1px solid #ced4da");
      $("#DoNumberMret").css("border", "1px solid #ced4da");
      $("#delivery").css("border", "1px solid #ced4da");
      $("#receive").css("border", "1px solid #ced4da");

      if (warehouseMret === "") {
        $("#warehouseMret").focus();
        $("#warehouseMret").attr('required', true);
        $("#warehouseMret").css("border", "1px solid red");
      } else if (DoNumberMret === "") {
        $("#DoNumberMret").focus();
        $("#DoNumberMret").attr('required', true);
        $("#DoNumberMret").css("border", "1px solid red");
      } else if (delivery === "") {
        $("#delivery").focus();
        $("#delivery").attr('required', true);
        $("#delivery").css("border", "1px solid red");
      } else if (receive === "") {
        $("#receive").focus();
        $("#receive").attr('required', true);
        $("#receive").css("border", "1px solid red");
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
                    window.location.href = '/MaterialReturn?var=1';
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
                window.location.href = '/MaterialReturn?var=1';
              }
            })
          }
        })
      }
    });

  });
</script>