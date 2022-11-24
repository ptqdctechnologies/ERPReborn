<script type="text/javascript">
  $(document).ready(function() {
    $("#addToDoDetail").prop("disabled", true);
    $("#SubmitMaterialReturn").prop("disabled", true);
    $(".MaterialReturnList").hide();
    $("#DetailMaterialReturn").hide();
    $("#tableShowHideMaterialReturn").hide();
    $("#sitecode2").prop("disabled", true);

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
    function klikSite(code, name) {
        $("#sitecode").val(code);
        $("#sitename").val(name);
        $("#projectcode2").prop("disabled", true);
        $("#sitecode2").prop("disabled", true);
        $("#addToDoDetail").prop("disabled", false);
    }
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
        url: '{!! route("getBudget") !!}?sitecode=' + $('#sitecode').val(),
        success: function(data) {
          var no = 1;
          $.each(data, function(key, val2) {
            var html = '<tr>' +
              '<td style="border:1px solid #e9ecef;width:5%;">' +
              '&nbsp;&nbsp;<button type="reset" class="btn btn-sm klikDoDetail klikDoDetail2" data-id0="' + val2.combinedBudgetSubSectionLevel1_RefID + '" data-id1="' + val2.product_RefID + '" data-id2="' + val2.quantity + '" data-id3="' + val2.unitPriceBaseCurrencyValue + '" data-id4="' + val2.sys_ID + '" data-id5="' + val2.productName + '" data-id6="' + val2.quantityUnitName + '" data-id7="' + val2.combinedBudgetSubSectionLevel1_RefID + '" data-id8="' + val2.priceBaseCurrencyISOCode + '" data-id9="' + val2.combinedBudgetSubSectionLevel1_RefID + '"  data-id10="' + val2.combinedBudgetSubSectionLevel2Name + '" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="15" alt="" title="Add to Detail"></button>' +
              '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkId">' + val2.combinedBudgetSubSectionLevel1_RefID + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkName">' + val2.combinedBudgetSubSectionLevel2Name + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getputProductId">' + val2.product_RefID + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getputProductName">' + val2.productName + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getQty2">' + val2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getputUom">' + val2.quantityUnitName + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getPrice">' + val2.unitPriceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getCurrency">' + val2.priceBaseCurrencyISOCode + '</span>' + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + '<span id="getQty">' + 'N/A' + '</span>' + '</td>' +
              '</tr>';

            $('table.TableDorDetail tbody').append(html);
          });

          $('.klikDoDetail').on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            $("#DetailMaterialReturn").show();

            $("#putWorkId").val($this.data("id0"));
            $("#putProductId").val($this.data("id1"));
            $("#putProductName").val($this.data("id5"));
            $("#qtyCek").val($this.data("id2"));
            $("#putQty").val($this.data("id2"));
            $("#putUom").val($this.data("id6"));
            $("#priceCek").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            $("#totalMret").val(parseFloat($this.data("id2") * $this.data("id3")));
            $("#putCurrency").val($this.data("id8"));
              
            $(".klikDoDetail2").prop("disabled", true);
            $(".ActionButton").prop("disabled", true);

            $("#tableShowHideMaterialReturn").find("input,button,textarea,select").attr("disabled", true);
          });
        }
      });
    });
  });
</script>

<script type="text/javascript">
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  
  function addFromDetailtoCartJs() {
    var putProductId = $("#putProductId").val();
    var qtyCek = $("#qtyCek").val();
    var putRemark = $("#putRemark").val();

    $("#putProductId").css("border", "1px solid #ced4da");
    $("#qtyCek").css("border", "1px solid #ced4da");
    $("#putRemark").css("border", "1px solid #ced4da");

    if (putProductId === "") {
        $("#putProductId").focus();
        $("#putProductId").attr('required', true);
        $("#putProductId").css("border", "1px solid red");
    } else if (qtyCek === "") {
        $("#qtyCek").focus();
        $("#qtyCek").attr('required', true);
        $("#qtyCek").css("border", "1px solid red");
    } else if (putRemark === "") {
        $("#putRemark").focus();
        $("#putRemark").attr('required', true);
        $("#putRemark").css("border", "1px solid red");
    } else {

      $.ajax({
        type: "POST",
        url: '{!! route("MaterialReturn.StoreValidateiMaterialReturn") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
        success: function(data) {

          if (data == "200") {
            $(".MaterialReturnList").show();

            var putWorkId = $('#putWorkId').val();
            var putProductId = $("#putProductId").val();
            var putProductName = $("#putProductName").val();
            var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
            var putUom = $("#putUom").val();
            var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
            var putCurrency = $("#putCurrency").val();
            var putRemark = $("#putRemark").val();
            var totalMret = $("#totalMret").val().replace(/^\s+|\s+$/g, '');

            if($("#TotalMaterialReturn").html() == ""){
                $("#TotalMaterialReturn").html('0');
            }
            var TotalMaterialReturn = parseFloat($("#qtyCek").val().replace(/,/g, ''));
            var TotalMaterialReturn2 = parseFloat($("#TotalMaterialReturn").html().replace(/,/g, ''));
            $("#TotalMaterialReturn").html(parseFloat(+TotalMaterialReturn2 + TotalMaterialReturn).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

            var html = '<tr>' +
              '<td style="border:1px solid #e9ecef;width:7%;">' +
              '&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="RemoveDetailMatRet(\'' + putWorkId + '\'\'' + putProductId + '\', \'' + qtyCek + '\', this);" " style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
              '&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditMatRet(this)" data-dismiss="modal" data-id0="' + putWorkId + '" data-id1="' + putProductId + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + putRemark + '" data-id8="' + totalMret + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
              '<input type="hidden" name="var_putProductId[]" value="' + putProductId + '">' +
              '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
              '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
              '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
              '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
              '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
              '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
              '</td>' +
              '<td style="border:1px solid #e9ecef;">' + putWorkId + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + qtyCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + putUom + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + priceCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + totalMret.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + putCurrency + '</td>' +
              '<td style="border:1px solid #e9ecef;">' + putRemark + '</td>' +
              '</tr>';
            $('table.TableMaterialReturn tbody').append(html);
            $("#statusEditMatRet").val("No");

            $("#putWorkId").val("");
            $("#putProductId").val("");
            $("#putProductName").val("");
            $("#qtyCek").val("");
            $("#putUom").val("");
            $("#priceCek").val("");
            $("#putCurrency").val("");
            $("#putRemark").val("");

            $("#tableShowHideMaterialReturn").find("input,button,textarea,select").attr("disabled", false);
            $("#SubmitMaterialReturn").prop("disabled", false);
            $(".klikDoDetail2").prop("disabled", false);
            $(".ActionButton").prop("disabled", false);

          } else {
            Swal.fire("Error !", "Please use edit to update this item !", "error");
          }
        },
      });
    }
  }
</script>

<script type="text/javascript">

    function CancelDetailMatret() {
      var putWorkId = $('#putWorkId').val();
      var putProductId = $("#putProductId").val();
      var putProductName = $("#putProductName").val();
      var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
      var putUom = $("#putUom").val();
      var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
      var totalMret = $("#totalMret").val().replace(/^\s+|\s+$/g, '');
      var putCurrency = $("#putCurrency").val();
      var putRemark = $("#putRemark").val();
      var statusEditMatRet = $("#statusEditMatRet").val();

      if (statusEditMatRet == "Yes") {
        var qtyCek = $('#ValidateQuantity').val();
        var putRemark = $('#putRemark2').val();
        var totalMret = parseFloat(qtyCek.replace(/,/g, '') * priceCek.replace(/,/g, ''));
        
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: "POST",
                url: '{!! route("MaterialReturn.StoreValidateiMaterialReturn") !!}?utProductId=' + $('#utProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                success: function(data) {

                  if (data == "200") {

                    var html = '<tr>' +
                      '<td style="border:1px solid #e9ecef;width:7%;">' +
                      '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="RemoveDetailMatRet((\'' + putWorkId + '\', \'' + putProductId + '\', \'' + qtyCek + '\', this);" " style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                      '&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditMatRet(this)" data-dismiss="modal" data-id0="' + putWorkId + '" data-id1="' + putProductId + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + putRemark + '" data-id8="' + totalMret + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                      '<input type="hidden" name="var_putProductId[]" value="' + putProductId + '">' +
                      '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                      '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                      '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +  
                      '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                      '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                      '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                      '</td>' +
                      '<td style="border:1px solid #e9ecef;">' + putWorkId + '</td>' +
                      '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
                      '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                      '<td style="border:1px solid #e9ecef;">' + qtyCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                      '<td style="border:1px solid #e9ecef;">' + putUom + '</td>' +
                      '<td style="border:1px solid #e9ecef;">' + priceCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                      '<td style="border:1px solid #e9ecef;">' + totalMret.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                      '<td style="border:1px solid #e9ecef;">' + putCurrency + '</td>' +
                      '<td style="border:1px solid #e9ecef;">' + putRemark + '</td>' +
                      '</tr>';
                    $('table.TableMaterialReturn tbody').append(html);
                    $("#statusEditMatRet").val("No");

                    var TotalMaterialReturn = parseFloat($("#TotalMaterialReturn").html().replace(/,/g, ''));
                    $("#TotalMaterialReturn").html(parseFloat(+TotalMaterialReturn + +qtyCek).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                  }else {
                      Swal.fire("Error !", "Please use edit to update this item !", "error");
                  }
              },
          });
      }
      $(".klikDoDetail2").prop("disabled", false);
      $(".ActionButton").prop("disabled", false);

      $("#tableShowHideMaterialReturn").find("input,button,textarea,select").attr("disabled", false);
      $("#putWorkId").val("");
      $("#putProductId").val("");
      $("#putProductName").val("");
      $("#qtyCek").val("");
      $("#putUom").val("");
      $("#priceCek").val("");
      $("#putCurrency").val("");
      $("#putRemark").val("");
    }
</script>

<script>

    function RemoveDetailMatRet(putWorkId, putProductId, qty, tr) {
        var i = tr.parentNode.parentNode.rowIndex;
        document.getElementById("TableMaterialReturn").deleteRow(i);
        
        $.ajax({
          type: "POST",
          url: '{!! route("MaterialReturn.StoreValidateiMaterialReturn2") !!}?putProductId=' + putProductId + '&putWorkId=' + putWorkId,
        });

        var qty = parseFloat(qty.replace(/,/g, ''));
        var TotalMaterialReturn = parseFloat($("#TotalMaterialReturn").html().replace(/,/g, ''));
        $("#TotalMaterialReturn").html(parseFloat(TotalMaterialReturn - qty).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }

</script>

<script>
    function EditMatRet(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TableMaterialReturn").deleteRow(i);

        var $this = $(t);
        console.log($this.data("id3"));
        $.ajax({
          type: "POST",
          url: '{!! route("MaterialReturn.StoreValidateiMaterialReturn2") !!}?putProductId=' + $this.data("id1") + '&putWorkId=' + $this.data("id0"),
        });

        $("#putWorkId").val($this.data("id0"));
        $("#putProductId").val($this.data("id1"));
        $("#putProductName").val($this.data("id2"));
        $("#qtyCek").val($this.data("id3"));
        // $("#putQty").val($this.data("id3"));
        $("#ValidateQuantity").val($this.data("id3"));
        $("#putUom").val($this.data("id4"));
        $("#priceCek").val($this.data("id5"));
        $("#putCurrency").val($this.data("id6"));
        $("#putRemark").val($this.data("id7"));
        $("#putRemark2").val($this.data("id7"));
        $("#totalMret").val($this.data("id8"));
        $("#statusEditMatRet").val("Yes");
        
        var qty = parseFloat($("#qtyCek").val().replace(/,/g, ''));
        var TotalMaterialReturn = parseFloat($("#TotalMaterialReturn").html().replace(/,/g, ''));
        $("#TotalMaterialReturn").html(parseFloat(TotalMaterialReturn - qty).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        
        $(".klikDoDetail2").prop("disabled", true);
        $(".ActionButton").prop("disabled", true);
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