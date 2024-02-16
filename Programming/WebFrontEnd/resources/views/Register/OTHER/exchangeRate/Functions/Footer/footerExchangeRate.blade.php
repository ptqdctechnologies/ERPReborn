<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailArfList").hide();
        $("#detailTransAvail").hide();
        $("#projectcode2").prop("disabled", true);
        $("#sitecode2").prop("disabled", true);
        $("#requester_name2").prop("disabled", true);
        $("#buttonArfList").prop("disabled", true);
        $("#product-comments-tab").prop("disabled", true);
    });
</script>

<script>
    var x = 1,
        y = 0;

    $('#addTranoType').click(function() {
        var datas = [];

        for (var i = 1; i <= x; i++) {
            var data = {
                tranoType: $('#tranoType').val(),
                tranoPrefix: $('#tranoPrefix').val(),
                remark: $('#remark').val(),
            }
            datas.push(data);
        }

        var json_object = JSON.stringify(datas);
        // console.log(json_object);

        $.ajax({
            type: "POST",
            url: '{{route("tranoType.store")}}',
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

                    var t = $('#tableTranoType').DataTable();
                    t.row.add([
                        '<center><button class="btn btn-outline-danger btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;"><i class="fa fa-trash"></i></button></center>',
                        '<span id="lastProductId_' + y + '">' + val.tranoType + '</span>',
                        '<span id="lastProductName_' + y + '">' + val.tranoPrefix + '</span>',
                        '<span id="lastUom_' + y + '">' + val.remark + '</span>'
                    ]).draw();
                });
            },
            error: function(data) {
                Swal.fire("Error !", "Data Canceled Added", "error");
            }
        });

        $("#saveArfList").prop("disabled", false);
        $("#iconProductId").hide();
        $("#iconQty").hide();
        $("#iconUnitPrice").hide();
        $("#iconRemark").hide();
        document.formArf2.putProductId.style.border = "1px solid #ced4da";
        document.formArf2.qtyx.style.border = "1px solid #ced4da";
        document.formArf2.putPrice.style.border = "1px solid #ced4da";
        document.formArf2.putRemark.style.border = "1px solid #ced4da";
    });
</script>

<script>
    // var y = 1; //initlal text box count
    $('#saveArfList').click(function() {

        var original_budget = document.forms["formArf1"]["origin_budget"].value;
        var requester_name = document.forms["formArf1"]["requester_name"].value;
        var projectcode = document.forms["formArf1"]["projectcode"].value;
        var sitecode = document.forms["formArf1"]["sitecode"].value;
        var beneficiary = document.forms["formArf1"]["beneficiary"].value;
        var bank_name = document.forms["formArf1"]["bank_name"].value;
        var account_name = document.forms["formArf1"]["account_name"].value;
        var account_number = document.forms["formArf1"]["account_number"].value;
        var internal_notes = document.forms["formArf1"]["internal_notes"].value;
        var filenames = document.forms["formArf1"]["filenames"].value;

        if (original_budget == "") {
            Swal.fire("Error !", "Please Input Original Budget !", "error");
        } else if (projectcode == "") {
            Swal.fire("Error !", "Please Input Project code !", "error");
        } else if (sitecode == "") {
            Swal.fire("Error !", "Please Input Site code !", "error");
        } else if (requester_name == "") {
            Swal.fire("Error !", "Please Input Requester Name !", "error");
        } else if (beneficiary == "") {
            Swal.fire("Error !", "Please Input Beneficiary !", "error");
        } else if (bank_name == "") {
            Swal.fire("Error !", "Please Input Bank name code !", "error");
        } else if (account_name == "") {
            Swal.fire("Error !", "Please Input Account name code !", "error");
        } else if (account_number == "") {
            Swal.fire("Error !", "Please Input Account number code !", "error");
        } else if (internal_notes == "") {
            Swal.fire("Error !", "Please Input Internal notes code !", "error");
        } else {

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
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("body").on("click", ".remove-attachment", function() {
            $(this).parents("#control-group").remove();
        });
    });
</script>