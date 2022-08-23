<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
  $(document).ready(function() {
    $("#addToDoDetail").prop("disabled", true);
    $("#SubmitMaterialReturn").prop("disabled", true);
    $("#MaterialReturnList").hide();
    $("#DetailMaterialReturn").hide();
    $("#tableShowHideMaterialReturn").hide();

  });
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
  $(function() {

    $('#addToDoDetail').on('click', function(e) {
      e.preventDefault(); // in chase you change to a link or button
      $("#tableShowHideMaterialReturn").show();
      $("#addToDoDetail").prop("disabled", true);
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
              '&nbsp;&nbsp;<button type="reset" class="btn btn-sm klikDoDetail" data-id1="' + val2.product_RefID + '" data-id2="' + val2.quantity + '" data-id3="' + val2.unitPriceBaseCurrencyValue + '" data-id4="' + val2.sys_ID + '" data-id5="' + val2.productName + '" data-id6="' + val2.quantityUnitName + '" data-id7="' + val2.combinedBudgetSubSectionLevel1_RefID + '" data-id8="' + val2.priceBaseCurrencyISOCode + '" data-id9="' + val2.combinedBudgetSubSectionLevel1_RefID + '"  data-id10="' + val2.combinedBudgetSubSectionLevel2Name + '" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="15" alt="" title="Add to Detail"></button>' +
              '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkId">' + val2.combinedBudgetSubSectionLevel1_RefID + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkName">' + val2.combinedBudgetSubSectionLevel2Name + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getProductId">' + val2.product_RefID + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getProductName">' + val2.productName + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getQty2">' + val2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getUom">' + val2.quantityUnitName + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getPrice">' + val2.unitPriceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getCurrency">' + val2.priceBaseCurrencyISOCode + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getQty">' + 'N/A' + '</span>' + '</td>' +
              '</tr>';

            $('table.tableDetailDoMret tbody').append(html);
          });

          $('.klikDoDetail').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            $("#DetailMaterialReturn").show();

            $("#ProductId").val($this.data("id1"));
            $("#ProductName").val($this.data("id5"));
            $("#QuantityHide").val($this.data("id2"));
            $("#Uom").val($this.data("id6"));
            $("#Price").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            $("#Currency").val($this.data("id8"));
            $("#WorkId").val($this.data("id9"));
            $("#WorkName").val($this.data("id10"));

            $("#tableShowHideMaterialReturn").find("input,button,textarea,select").attr("disabled", true);
          });
        }
      });
    });
  });
</script>


<script type="text/javascript">
  $(document).ready(function() {
    $(".CancelDetailMatret").click(function() {

      var ProductId = $("#ProductId").val();
      var ProductName = $("#ProductName").val();
      var Quantity = $('#Quantity').val().replace(/^\s+|\s+$/g, '');
      var Uom = $("#Uom").val();
      var Price = $("#Price").val().replace(/^\s+|\s+$/g, '');
      var Currency = $("#Currency").val();
      var WorkId = $("#WorkId").val();
      var WorkName = $("#WorkName").val();
      var Remark = $("#Remark").val();
      var statusEditMatRet = $("#statusEditMatRet").val();

      if (statusEditMatRet == "Yes") {
        var Quantity = $('#QuantityHide2').val();
        var Remark = $('#Remark2').val();

        var html = '<tr>' +
          '<td style="border:1px solid #e9ecef;width:7%;">' +
          '&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs RemoveDetailMatRet" data-id1="' + ProductId + '"  style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
          '&nbsp;<button type="button" class="btn btn-xs EditMatRet" data-dismiss="modal" data-id1="' + ProductId + '" data-id2="' + ProductName + '" data-id3="' + Quantity + '" data-id4="' + Uom + '" data-id5="' + Price + '" data-id6="' + Currency + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
          '<input type="hidden" name="var_ProductId[]" value="' + ProductId + '">' +
          '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + ProductName + '">' +
          '<input type="hidden" name="var_quantity[]" value="' + Quantity + '">' +
          '<input type="hidden" name="var_uom[]" value="' + Uom + '">' +  
          '<input type="hidden" name="var_price[]" value="' + Price + '">' +
          '<input type="hidden" name="var_totalPrice[]" value="' + (Price * Quantity) + '">' +
          '<input type="hidden" name="var_currency[]" value="' + Currency + '">' +
          '</td>' +
          '<td style="border:1px solid #e9ecef;">' + WorkId + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + WorkName + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + ProductId + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + ProductName + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + Quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + Uom + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + Price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + Currency + '</td>' +
          '<td style="border:1px solid #e9ecef;">' + Remark + '</td>' +
          '</tr>';
        $('table.TableMaterialReturn tbody').append(html);
        $("#statusEditMatRet").val("No");
      }
      $("#tableShowHideMaterialReturn").find("input,button,textarea,select").attr("disabled", false);
      $("#ProductId").val("");
      $("#ProductName").val("");
      $("#Quantity").val("");
      $("#Uom").val("");
      $("#Price").val("");
      $("#Currency").val("");
      $("#Remark").val("");
    });
  });
</script>



<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $(document).ready(function() {
    $('#addFromDetailtoCart').click(function(ev) {
      ev.preventDefault();
      ev.stopPropagation();

      var ProductId = $("#ProductId").val();
      var Quantity = $("#Quantity").val();
      var Remark = $("#Remark").val();

      if (ProductId === "") {
        Swal.fire("Error !", "Product Cannot Empty", "error");
      } else if (Quantity === "") {
        Swal.fire("Error !", "Quantity Cannot Empty", "error");
      } else if (Remark === "") {
        Swal.fire("Error !", "Remark Cannot Empty", "error");
      } else {

        $.ajax({
          type: "POST",
          url: '{!! route("MaterialReturn.StoreValidateiMaterialReturn") !!}?ProductId=' + $('#ProductId').val(),
          success: function(data) {

            if (data == "200") {
              $("#MaterialReturnList").show();

              var ProductId = $("#ProductId").val();
              var ProductName = $("#ProductName").val();
              var Quantity = $('#Quantity').val().replace(/^\s+|\s+$/g, '');
              var Uom = $("#Uom").val();
              var Price = $("#Price").val().replace(/^\s+|\s+$/g, '');
              var Currency = $("#Currency").val();
              var WorkId = $("#WorkId").val();
              var WorkName = $("#WorkName").val();
              var Remark = $("#Remark").val();

              var html = '<tr>' +
                '<td style="border:1px solid #e9ecef;width:7%;">' +
                '&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs RemoveDetailMatRet" data-id1="' + ProductId + '"  style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                '&nbsp;<button type="button" class="btn btn-xs EditMatRet" data-dismiss="modal" data-id1="' + ProductId + '" data-id2="' + ProductName + '" data-id3="' + Quantity + '" data-id4="' + Uom + '" data-id5="' + Price + '" data-id6="' + Currency + '" data-id7="' + Remark + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                '<input type="hidden" name="var_ProductId[]" value="' + ProductId + '">' +
                '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + ProductName + '">' +
                '<input type="hidden" name="var_quantity[]" value="' + Quantity + '">' +
                '<input type="hidden" name="var_uom[]" value="' + Uom + '">' +
                '<input type="hidden" name="var_price[]" value="' + Price + '">' +
                '<input type="hidden" name="var_totalPrice[]" value="' + (Price * Quantity) + '">' +
                '<input type="hidden" name="var_currency[]" value="' + Currency + '">' +
                '</td>' +
                '<td style="border:1px solid #e9ecef;">' + WorkId + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + WorkName + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + ProductId + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + ProductName + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + Quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + Uom + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + Price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + Currency + '</td>' +
                '<td style="border:1px solid #e9ecef;">' + Remark + '</td>' +
                '</tr>';
              $('table.TableMaterialReturn tbody').append(html);
              $("#statusEditMatRet").val("No");

              $("body").on("click", ".RemoveDetailMatRet", function() {
                $(this).closest("tr").remove();
                var ProductId = $(this).data("id1");
                $.ajax({
                  type: "POST",
                  url: '{!! route("MaterialReturn.StoreValidateiMaterialReturn2") !!}?ProductId=' + ProductId,
                });
              });

              $("body").on("click", ".EditMatRet", function() {
                var $this = $(this);

                $.ajax({
                  type: "POST",
                  url: '{!! route("MaterialReturn.StoreValidateiMaterialReturn2") !!}?ProductId=' + $this.data("id1"),
                });

                $("#ProductId").val($this.data("id1"));
                $("#ProductName").val($this.data("id2"));
                $("#Quantity").val($this.data("id3"));
                $("#QuantityHide2").val($this.data("id3"));
                $("#Uom").val($this.data("id4"));
                $("#Price").val($this.data("id5"));
                $("#Currency").val($this.data("id6"));
                $("#Remark").val($this.data("id7"));
                $("#Remark2").val($this.data("id7"));
                $("#statusEditMatRet").val("Yes");

                $(this).closest("tr").remove();
              });

              $("#ProductId").val("");
              $("#ProductName").val("");
              $("#Quantity").val("");
              $("#Uom").val("");
              $("#Price").val("");
              $("#Currency").val("");
              $("#Remark").val("");

              $("#tableShowHideMaterialReturn").find("input,button,textarea,select").attr("disabled", false);
              $("#SubmitMaterialReturn").prop("disabled", false);

            } else {
              Swal.fire("Error !", "Please use edit to update this item !", "error");
            }
          },
        });
      }
    });
  });
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

                    window.location.href = '/iSupp?var=1';
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

            })
          }
        })
      }
    });

  });
</script>


<script>
  $('document').ready(function() {
    $('.ChangeQty').keyup(function() {
      var qtyReq = $(this).val();
      var putQty = $('#QuantityHide').val();
      if (parseFloat(qtyReq) == '') {
        $("#Quantity").css("border", "1px solid red");
      } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
        Swal.fire("Error !", "Your Quantity Request is Over", "error");
        $("#Quantity").val("");
        $("#Quantity").css("border", "1px solid red");
      } else {
        $("#Quantity").css("border", "1px solid #ced4da");
      }
    });
  });
</script>

<script>
  $('#Quantity').on('blur', function() {
    var amount = $('#Quantity').val().replace(/^\s+|\s+$/g, '');
    if (($('#Quantity').val() != '') && (!amount.match(/^$/))) {
      $('#Quantity').val(parseFloat(amount).toFixed(2));
    }
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
  }
</script>