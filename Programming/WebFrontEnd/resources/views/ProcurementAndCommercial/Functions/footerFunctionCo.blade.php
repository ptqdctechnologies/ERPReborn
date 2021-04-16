<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailArfList").hide();
        $("#detailTransAvail").hide();
        $("#popUpCustomerInput").prop("disabled", true);
    });
</script>
<!--  END SHOW HIDE AVAILABEL -->

<script>
  $(document).ready(function() {
    $('#statusCoEstimate').click(function() {

        $("#popUpCustomerInput").prop("disabled", false);        
        $("#register_co2").prop("disabled", true);
        $("#register_co").val("");
        $("#customer_input").val("");
        
        $("#customer").val("");
        $("#customer2").val("");
        $("#po_customer").val("");
        $("#value_idr").val("");
        $("#value_usd").val("");
        $("#description").val("");
        $("#confirmation_form").val("");
        
        $("#register_co").prop("disabled", true);
        $("#customer").prop("disabled", true);
        $("#customer2").prop("disabled", true);
        $("#po_customer").prop("disabled", true);
        $("#value_idr").prop("disabled", true);
        $("#value_usd").prop("disabled", true);
        $("#description").prop("disabled", true);
        $("#confirmation_form").prop("disabled", true);
    });

    $('#statusCoOriginal').click(function() {

        $("#popUpCustomerInput").prop("disabled", true);
        $("#register_co2").prop("disabled", false);
        $("#customer_input").val("");
        $("#customer_input2").val("");

        $("#register_co").prop("disabled", false);
        $("#customer").prop("disabled", false);
        $("#customer2").prop("disabled", false);
        $("#po_customer").prop("disabled", false);
        $("#value_idr").prop("disabled", false);
        $("#value_usd").prop("disabled", false);
        $("#description").prop("disabled", false);
        $("#confirmation_form").prop("disabled", false);
    });
  });
</script>


<script>
    function formDetailTransAttch() {
        
        var original_budget = document.forms["formArf1"]["origin_budget"].value;
        var requester_name = document.forms["formArf1"]["requester_name"].value;
        var project_code = document.forms["formArf1"]["project_code"].value;
        var site_code = document.forms["formArf1"]["site_code"].value;
        var beneficiary = document.forms["formArf1"]["beneficiary"].value;
        var bank_name = document.forms["formArf1"]["bank_name"].value;
        var account_name = document.forms["formArf1"]["account_name"].value;
        var account_number = document.forms["formArf1"]["account_number"].value;
        var internal_notes = document.forms["formArf1"]["internal_notes"].value;
        var filenames = document.forms["formArf1"]["filenames"].value;
        
        if (original_budget == "") {
            Swal.fire("Error !", "Please Input Original Budget !", "error");
        }
        else if (project_code == "") {
            Swal.fire("Error !", "Please Input Project code !", "error");
        }
        else if (site_code == "") {
            Swal.fire("Error !", "Please Input Site code !", "error");
        }
        else if (requester_name == "") {
            Swal.fire("Error !", "Please Input Requester Name !", "error");
        }
        else if (beneficiary == "") {
            Swal.fire("Error !", "Please Input Beneficiary !", "error");
        }
        else if (bank_name == "") {
            Swal.fire("Error !", "Please Input Bank name code !", "error");
        }
        else if (account_name == "") {
            Swal.fire("Error !", "Please Input Account name code !", "error");
        }
        else if (account_number == "") {
            Swal.fire("Error !", "Please Input Account number code !", "error");
        }
        else if (internal_notes == "") {
            Swal.fire("Error !", "Please Input Internal notes code !", "error");
        }
        // else if (filenames == "") {
        //     Swal.fire("Error !", "Please Input Filenames !", "error");
        // }
        else{
            $("#projectcode").prop("disabled", true);
            $("#subprojectc").prop("disabled", true);
            $("#projectcode2").prop("disabled", true);
            $("#subprojectc2").prop("disabled", true);
            $("#product-comments-tab").show();
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".detailTransaction").click(function() {
            $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", false);
        });
    });
</script>

<script>
    var x = 1,
        y = 0;
    xx = 0; //initlal text box count

    $('#buttonAddCo').click(function() {
        
        // var work_id = document.forms["formArf2"]["putWorkId"].value;
        // var product_id = document.forms["formArf2"]["putProductId"].value;
        // var qtyx = document.forms["formArf2"]["qtyCek"].value;
        // var remark = document.forms["formArf2"]["remark"].value;

        // if (work_id == "") {
        //     Swal.fire("Error !", "Please Input Work Id !", "error");
        // }
        // else if (product_id == "") {
        //     Swal.fire("Error !", "Please Input Product Id !", "error");
        // }
        // else if (qtyx == 0) {
        //     Swal.fire("Error !", "Please Input Qty !", "error");
        // }
        // else if (remark == "") {
        //     Swal.fire("Error !", "Please Input Remark !", "error");
        // }
        // else{

            var datas = [];

            for (var i = 1; i <= x; i++) {
                var data = {
                    origin_budget: $('#register_co').val(),
                    projectcode: $('#projectcode').val(),
                    projectname: "x",
                    subprojectc: $('#sitecode').val(),
                    subprojectn: "x",
                    beneficiary: $('#customer').val(),
                    bank_name: $('#po_customer').val(),
                    account_name: $('#type').val(),
                    account_number: $('#value_idr').val(),
                    internal_notes: $('#value_usd').val(),
                    requestNameArf: $('#description').val(),
                    putWorkId: "x",
                    putWorkName: "x",
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
            console.log(json_object);

            $.ajax({
                type: "POST",
                url: '{{route('ARF.store')}}',
                data: json_object,
                contentType: "application/json",
                processData: true,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(data) {
                    Swal.fire("Success !", "Data add to cart", "success");
                    console.log(data);
                    y++;
                    $.each(data, function(key, val) {
                        $('#tableCoCart').append('<tr id="control-group"><td><center><button class="btn btn-outline-danger btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;"><i class="fa fa-trash"></i></button></center></td><td><span id="lastWorkId_' + y + '">' + val.origin_budget + '</span></td><td><span id="lastWorkName_' + y + '">' + val.projectcode + '</span></td><td><span id="lastProductId_' + y + '">' + val.subprojectc + '</span></td><td><span id="lastProductName_' + y + '">' + val.beneficiary + '</span></td><td><span id="lastProductName_' + y + '">' + val.bank_name + '</span></td><td><span id="lastUom_' + y + '">' + val.account_name + '</span></td><td><span id="lastPrice_' + y + '">' + val.account_number + '</span></td><td><span id="totalArfDetails_' + y + '">' + val.internal_notes + '</span></td><td><span id="lastCurrency_' + y + '">' + val.requestNameArf + '</span></td></tr>');
                    });
                },
                error: function(data) {
                    Swal.fire("Error !", "Data Canceled Added", "error");
                }
            });
        // }

    });


    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    $('.add_field_button').click(function() {
        cek = 0;
        addColomn();
    });

    function addColomn() { //on add input button click
        if (cek == 0) {
            cek++;
            x++; //text box increment
            for($x=1; $x<5; $x++){
                
            }
            $(wrapper).append(

                '<div class="col-md-12">' +
                '<div class="form-group">' +
                '<div class="input-group control-group" style="width:105%;position:relative;right:8px;">' +
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
    // var y = 1; //initlal text box count
    $('#saveArfList').click(function() {

        var original_budget = document.forms["formArf1"]["origin_budget"].value;
        var requester_name = document.forms["formArf1"]["requester_name"].value;
        var project_code = document.forms["formArf1"]["project_code"].value;
        var site_code = document.forms["formArf1"]["site_code"].value;
        var beneficiary = document.forms["formArf1"]["beneficiary"].value;
        var bank_name = document.forms["formArf1"]["bank_name"].value;
        var account_name = document.forms["formArf1"]["account_name"].value;
        var account_number = document.forms["formArf1"]["account_number"].value;
        var internal_notes = document.forms["formArf1"]["internal_notes"].value;
        var filenames = document.forms["formArf1"]["filenames"].value;
        // var work_id = document.forms["formArf2"]["putWorkId"].value;
        // var product_id = document.forms["formArf2"]["putProductId"].value;
        // var qtyx = document.forms["formArf2"]["qtyCek"].value;
        // var remark = document.forms["formArf2"]["remark"].value;
        
        if (original_budget == "") {
            Swal.fire("Error !", "Please Input Original Budget !", "error");
        }
        else if (project_code == "") {
            Swal.fire("Error !", "Please Input Project code !", "error");
        }
        else if (site_code == "") {
            Swal.fire("Error !", "Please Input Site code !", "error");
        }
        else if (requester_name == "") {
            Swal.fire("Error !", "Please Input Requester Name !", "error");
        }
        else if (beneficiary == "") {
            Swal.fire("Error !", "Please Input Beneficiary !", "error");
        }
        else if (bank_name == "") {
            Swal.fire("Error !", "Please Input Bank name code !", "error");
        }
        else if (account_name == "") {
            Swal.fire("Error !", "Please Input Account name code !", "error");
        }
        else if (account_number == "") {
            Swal.fire("Error !", "Please Input Account number code !", "error");
        }
        else if (internal_notes == "") {
            Swal.fire("Error !", "Please Input Internal notes code !", "error");
        }
        // else if (work_id == "") {
        //     Swal.fire("Error !", "Please Input Work Id !", "error");
        // }
        // else if (product_id == "") {
        //     Swal.fire("Error !", "Please Input Product Id !", "error");
        // }
        // else if (qtyx == 0) {
        //     Swal.fire("Error !", "Please Input Qty !", "error");
        // }
        // else if (remark == "") {
        //     Swal.fire("Error !", "Please Input Remark !", "error");
        // }
        // else if (filenames == "") {
        //     Swal.fire("Error !", "Please Input Filenames !", "error");
        // }
        else{

            const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
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
                    url: '{{route('ARF.tests')}}',
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
        }
    });
</script>


<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {

            var qtyReq = $(this).val();
            if (qtyReq == 0 || qtyReq == '') {
                qtyReq = 0;
            }
            var putQty = parseFloat($('#putQty').val());
            var putPrice = parseFloat($('#putPrice').val());
            var total = parseFloat(putQty * putPrice);
            var total2 = parseFloat(qtyReq * putPrice);

            if (qtyReq == '') {
                $("#buttonArfList").prop("disabled", true);             
            } else if (total2 > total) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $('#totalArfDetails').val(0);
                $("#buttonArfList").prop("disabled", true);               
            } else {
                var totalReq = parseFloat(total2).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                $('#totalArfDetails').val(totalReq);
                $("#buttonArfList").prop("disabled", false);
            }

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("body").on("click", ".remove-attachment", function() {
            $(this).parents("#control-group").remove();
        });
    });
</script>