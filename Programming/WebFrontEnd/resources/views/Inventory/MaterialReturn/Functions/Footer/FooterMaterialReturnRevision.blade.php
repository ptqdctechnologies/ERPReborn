<script type="text/javascript">
  $(document).ready(function() {
    $("#addToDoDetail").prop("disabled", true);
    $("#SubmitMaterialReturn").prop("disabled", true);
    // $(".MaterialReturnList").hide();
    $("#DetailMaterialReturn").hide();
    // $("#tableShowHideMaterialReturn").hide();
    $("#sitecode2").prop("disabled", true);

  });
</script>


<script type="text/javascript">


    //GET MATRET LIST 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var var_recordID = $("#var_recordID").val();
    var TotalBudgetSelected = 0;
    var TotalQty = 0;

    $.ajax({
        type: "POST",
        url: '{!! route("MaterialReturn.MaterialReturnListCartRevision") !!}?var_recordID=' + var_recordID,
        success: function(data) {

            $.each(data, function(key, value) {
                TotalBudgetSelected += +value.priceBaseCurrencyValue.replace(/,/g, '');
                TotalQty+= +value.quantity.replace(/,/g, '');
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
                    
                    // '<td style="border:1px solid #e9ecef;">' + value.combinedBudget_SubSectionLevel1_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.remarks + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '</tr>';

                $('table.TableMaterialReturn tbody').append(html);

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                // $("#GrandTotal").html(currencyTotal(TotalBudgetSelected));
                $("#TotalQty").html(currencyTotal(TotalQty));
            });
        },
    });

    //GET DOR DETAIL

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "GET",
        url: '{!! route("MaterialReturn.MaterialReturnByDorID") !!}?var_recordID=' + var_recordID,
        success: function(data) {
            var no = 1; applied = 0; TotalBudgetSelected = 0;status = ""; []; statusForm = [];
            
            $.each(data.DataAdvanceList, function(key, val2) {  
                var var_qtys = "";
                var var_recordIDDetail = "";
                var var_totalPayment = 0;
                var var_totalBalance = 0;

                // if(value.quantityAbsorption == "0.00" && value.quantity == "0.00"){
                if(val2.quantity == "0.00"){
                    var applied = 0;
                }
                else{
                    // var applied = Math.round(parseFloat(val2.quantityAbsorption) / parseFloat(val2.quantity) * 100);
                    var applied = Math.round(parseFloat(val2.quantity) * 100);
                }
                if(applied >= 100){
                    var status = "disabled";
                }
                var Product = $("input[name='var_product_id[]']").map(function(){return $(this).val();}).get();
                var Quantity = $("input[name='var_quantity[]']").map(function(){return $(this).val();}).get();
                var RecordID = $("input[name='var_recordIDDetail[]']").map(function(){return $(this).val();}).get();

                $.each(Product, function(ProductKey, ProductValue) {
                    if(ProductValue == val2.product_RefID){
                        var_qtys = Quantity[ProductKey];
                        var_recordIDDetail = RecordID[ProductKey];
                    }
                });
                var html = '<tr>' +

                    '<input name="getWorkId[]" value="'+ val2.combinedBudget_SubSectionLevel1_RefID +'" type="hidden">' +
                    '<input name="getWorkName[]" value="'+ val2.combinedBudget_SubSectionLevel1Name +'" type="hidden">' +
                    '<input name="getProductId[]" value="'+ val2.product_RefID +'" type="hidden">' +
                    '<input name="getProductName[]" value="'+ val2.productName +'" type="hidden">' +
                    '<input name="getQty[]" id="budget_qty'+ key +'" value="'+ val2.quantity +'" type="hidden">' +
                    '<input name="getPrice[]" id="budget_price'+ key +'" value="'+ val2.productUnitPriceCurrencyValue +'" type="hidden">' +
                    '<input name="getUom[]" value="'+ val2.quantityUnitName +'" type="hidden">' +
                    '<input name="getCurrency[]" value="'+ val2.priceCurrencyISOCode +'" type="hidden">' +
                    '<input name="getAverage[]" value="'+ val2.priceBaseCurrencyValue +'" type="hidden">' +
                    '<input name="combinedBudget" value="'+ val2.sys_ID +'" type="hidden">' +
                    '<input name="getRecordIDDetail[]" value="' + var_recordIDDetail + '"  type="hidden">' +
                    '<input name="getTrano[]" value="'+ val2.sys_ID +'" type="hidden">' +


                    '<td style="border:1px solid #e9ecef;">' +
                    '&nbsp;&nbsp;&nbsp;<div class="progress '+ status +' progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                    '</td>' +


                    '<td style="border:1px solid #e9ecef;">' + val2.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + val2.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + val2.priceCurrencyISOCode + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + val2.quantity + '</td>' +

                    '<td class="sticky-col second-col-dor-qty" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="qty_req'+ key +'" style="border-radius:0;" name="qty_req[]" class="form-control qty_req" autocomplete="off" '+ statusForm[key] +' value="'+ currency(var_qtys) +'">' + '</td>' +
                    '<td class="sticky-col first-col-dor-note" style="border:1px solid #e9ecef;background-color:white;">' + '<input id="note_req'+ key +'" style="border-radius:0;" name="note_req[]" class="form-control note_req" autocomplete="off" '+ statusForm[key] +' value="'+ val2.remarks +'">' + '</td>' +


                    '</tr>';
                $('table.TableDorDetail tbody').append(html);
                
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
        }
    });

</script>

<script>
    function addFromDetailtoCartJs() {

        $('#TableMaterialReturn').find('tbody').empty();

        $(".MaterialReturnList").show();
        $("#SubmitMaterialReturn").prop("disabled", false);

        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getTrano = $("input[name='getTrano[]']").map(function(){return $(this).val();}).get();
        var getWorkId = $("input[name='getWorkId[]']").map(function(){return $(this).val();}).get();
        var getWorkName = $("input[name='getWorkName[]']").map(function(){return $(this).val();}).get();
        var getProductId = $("input[name='getProductId[]']").map(function(){return $(this).val();}).get();
        var getProductName = $("input[name='getProductName[]']").map(function(){return $(this).val();}).get();
        var getUom = $("input[name='getUom[]']").map(function(){return $(this).val();}).get();
        var getCurrency = $("input[name='getCurrency[]']").map(function(){return $(this).val();}).get();
        var qty_req = $("input[name='qty_req[]']").map(function(){return $(this).val();}).get();
        var note_req = $("input[name='note_req[]']").map(function(){return $(this).val();}).get();

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
                    '<input type="hidden" name="var_currency[]" value="' + getCurrency[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +
                    
                    
                    // '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getTrano[index] + '</td>' +
                    // '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkName[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + note_req[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + qty_req[index] + '</td>' +

                    '</tr>';

                $('table.TableMaterialReturn tbody').append(html);  

                $("#TotalBudgetSelected").html(currencyTotal(TotalBudgetSelected));
                // $("#GrandTotal").html(currencyTotal(TotalBudgetSelected));
                $("#TotalQty").html(currencyTotal(TotalQty));

                $("#SubmitDo").prop("disabled", false);
            }
        });
        
    }
</script>

<script>
  $(function() {

    $("#address").val("Jakarta");
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
    $("#loading").show();
    $(".loader").show();
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
    $("#formSubmitMatRet").on("submit", function(e) { //id of form 
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
                    $("#loading").show();
                    $(".loader").show();

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
                  $("#loading").show();
                  $(".loader").show();

                  window.location.href = '/MaterialReturn?var=1';
                }
              })
          }
        })
      }
    });

  });
</script>