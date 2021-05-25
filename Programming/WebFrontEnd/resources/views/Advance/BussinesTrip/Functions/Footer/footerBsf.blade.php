<script type="text/javascript">
    $(document).ready(function() {
        $(".detailASF").hide();
        $("#detailArfList").hide();
        $("#buttonDetailBsf").prop("disabled", true);
        $("#amountCompanyCart").hide();
        $("#saveBsf").prop("disabled", true);
    });
</script>

<script>
    var x = 1, y = 0; xx = 0;//initlal text box count
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    $('.add_field_button').click(function () {
            cek = 0;
            addColomn();
    });
    function addColomn(){ //on add input button click
        if(cek == 0){
            cek++;
            x++; //text box increment
            $(wrapper).append(

                '<div class="col-md-12">'
                +   '<div class="form-group">'
                +       '<div class="input-group control-group" style="width:105%;position:relative;right:8px;">'
                +           '<input type="file" class="form-control filenames" id="filenames_' + x + '" style="height:26px;">'
                +           '<div class="input-group-btn">'
                +               '<button class="btn btn-outline-secondary btn-sm remove_field" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>'
                +           '</div>'
                +       '</div>'
                +    '</div>'
                +'</div>'

            ); //add input box                
        }                        
    }

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent().parent().parent('div').remove(); x--;
    })
</script>

<script>
    $('#buttonDetailBsf').click(function() {
        var brf_number2 = document.forms["formValidationBsf"]["brf_number2"].value;
        var brf_date = document.forms["formValidationBsf"]["brf_date"].value;
        var projectcode = document.forms["formValidationBsf"]["projectcode"].value;
        var sitecode = document.forms["formValidationBsf"]["sitecode"].value;
        var cfs_code = document.forms["formValidationBsf"]["cfs_code"].value;
        var total_arf = document.forms["formValidationBsf"]["total_arf"].value;
        var total_bsf = document.forms["formValidationBsf"]["total_bsf"].value;
        var balance = document.forms["formValidationBsf"]["balance"].value;
        var qty_expense = document.forms["formValidationBsf"]["qty_expense"].value;
        var price_expense = document.forms["formValidationBsf"]["price_expense"].value;
        var total_expense = document.forms["formValidationBsf"]["total_expense"].value;
        var qty_amount = document.forms["formValidationBsf"]["qty_amount"].value;
        var price_amount = document.forms["formValidationBsf"]["price_amount"].value;
        var total_amount = document.forms["formValidationBsf"]["total_amount"].value;
        
        if (brf_number2 == "") {
            Swal.fire("Error !", "BRF Number tidak boleh kosong !", "error");
        }
        else if (brf_date == "") {
            Swal.fire("Error !", "BRF Date tidak boleh kosong !", "error");
        }
        else if (projectcode == "") {
            Swal.fire("Error !", "Project Code tidak boleh kosong !", "error");
        }
        else if (sitecode == "") {
            Swal.fire("Error !", "Site Code tidak boleh kosong !", "error");
        }
        else if (cfs_code == "") {
            Swal.fire("Error !", "CFS code tidak boleh kosong !", "error");
        }
        else if (total_arf == "") {
            Swal.fire("Error !", "Total ARF tidak boleh kosong !", "error");
        }
        else if (total_bsf == "") {
            Swal.fire("Error !", "Total BSF tidak boleh kosong !", "error");
        }
        else if (balance == "") {
            Swal.fire("Error !", "Balance tidak boleh kosong !", "error");
        }
        else if (qty_expense == "") {
            Swal.fire("Error !", "Qty Expense tidak boleh kosong !", "error");
        }
        else if (price_expense == "") {
            Swal.fire("Error !", "Price Expense tidak boleh kosong !", "error");
        }
        else if (total_expense == "") {
            Swal.fire("Error !", "Total Expence tidak boleh kosong !", "error");
        }
        else if (qty_amount == "") {
            Swal.fire("Error !", "Qty Amount tidak boleh kosong !", "error");
        }
        else if (price_amount == "") {
            Swal.fire("Error !", "Price Amount tidak boleh kosong !", "error");
        }
        else if (total_amount == "") {
            Swal.fire("Error !", "Total Amount tidak boleh kosong !", "error");
        }
        else{
            var datas = [];

            for (var i = 1; i <= x; i++) {
                var data = {
                    origin_budget: "x",
                    projectcode: "x",
                    projectname: "x",
                    sitecode: "x",
                    sitecode2: "x",
                    beneficiary: "x",
                    bank_name: "x",
                    account_name: "x",
                    account_number: "x",
                    internal_notes: "x",
                    request_name: "x",
                    putProductId: "x",
                    putProductName: "x",
                    putQty: "x",
                    putQtys: "x",
                    putUom: "x",
                    putPrice: "x",
                    putCurrency: "x",
                    totalArfDetails: "x",
                    putRemark: "x",
                    filenames: "x",
                }
                datas.push(data);
            }

            var json_object = JSON.stringify(datas);
            // console.log(json_object);

            $.ajax({
                type: "POST",
                url: '{{route("ARF.store")}}',
                data: json_object,
                contentType: "application/json",
                processData: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {

                Swal.fire("Success !", "Data add to cart", "success");

                $("#amountCompanyCart").show();

                y++;
                $.each(data, function(key, val) {
                    var t = $('#tableAmountDuetoBsf').DataTable();
                    t.row.add([
                        '<center><button class="btn btn-outline-success btn-rounded btn-sm my-0 remove-val-list remove-attachment addAsf" style="border-radius: 100px;"><i class="fa fa-plus"></i></button></center>',
                        '<span id="lastProductId_' + y + '">' + val.putProductId + '</span>',
                        '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                        '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                        '<span id="lastProductName_' + y + '">' + val.putProductName + '</span>',
                        '<span id="lastPrice_' + y + '">' + val.putPrice + '</span>',
                        '<span id="totalArfDetails_' + y + '">' + val.totalArfDetails + '</span>',
                        '<span id="lastCurrency_' + y + '">' + val.putCurrency + '</span>',
                        '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                        '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                        '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>'
                    ]).draw();

                    var t = $('#tableExpenseClaimBsf').DataTable();
                    t.row.add([
                        '<center><button class="btn btn-outline-success btn-rounded btn-sm my-0 remove-val-list remove-attachment addAsf" style="border-radius: 100px;"><i class="fa fa-plus"></i></button></center>',
                        '<span id="lastProductId_' + y + '">' + val.putProductId + '</span>',
                        '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                        '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                        '<span id="lastProductName_' + y + '">' + val.putProductName + '</span>',
                        '<span id="lastPrice_' + y + '">' + val.putPrice + '</span>',
                        '<span id="totalArfDetails_' + y + '">' + val.totalArfDetails + '</span>',
                        '<span id="lastCurrency_' + y + '">' + val.putCurrency + '</span>',
                        '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                        '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>',
                        '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>'
                    ]).draw();
                  });
                },
                error: function(data) {
                    Swal.fire("Error !", "Data Canceled Added", "error");
                }
            });

            $("#saveBsf").prop("disabled", false);
        }
    });
</script>

<script>
  $('#saveBsf').click(function() {

    // var origin_budget = document.forms["formHeaderBrf"]["origin_budget"].value;
    // var projectcode = document.forms["formHeaderBrf"]["projectcode"].value;
    // var sitecode = document.forms["formHeaderBrf"]["sitecode"].value;
    // var request_name = document.forms["formHeaderBrf"]["request_name"].value;
    // var jobTitle = document.forms["formHeaderBrf"]["jobTitle"].value;
    // var department = document.forms["formHeaderBrf"]["department"].value;
    // var reasonTravel = document.forms["formHeaderBrf"]["reasonTravel"].value;
    // var headStationLocation = document.forms["formHeaderBrf"]["headStationLocation"].value;
    // var bussinesLocation = document.forms["formHeaderBrf"]["bussinesLocation"].value;
    // var contactPhone = document.forms["formHeaderBrf"]["contactPhone"].value;

    // if (origin_budget == "") {
    //   Swal.fire("Error !", "Please Input Origin Budget !", "error");
    // } else if (projectcode == "") {
    //   Swal.fire("Error !", "Please Input Project Code !", "error");
    // } else if (sitecode == "") {
    //   Swal.fire("Error !", "Please Input Site Code !", "error");
    // } else if (request_name == "") {
    //   Swal.fire("Error !", "Please Input Requester !", "error");
    // } else if (jobTitle == "") {
    //   Swal.fire("Error !", "Please Input Job Title !", "error");
    // } else if (department == "") {
    //   Swal.fire("Error !", "Please Input Department !", "error");
    // } else if (reasonTravel == "") {
    //   Swal.fire("Error !", "Please Input Reason Travel !", "error");
    // } else if (headStationLocation == "") {
    //   Swal.fire("Error !", "Please Input Head Station Location !", "error");
    // } else if (bussinesLocation == "") {
    //   Swal.fire("Error !", "Please Input Bussines Trip Location !", "error");
    // } else if (contactPhone == "") {
    //   Swal.fire("Error !", "Please Input Contact Phone !", "error");
    // } else {

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
    // }
  });
</script>