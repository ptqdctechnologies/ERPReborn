<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".detailASF").hide();
        $("#amountCompanyCart").hide();
        $("#addAsfListCart").prop("disabled", true);
        $("#saveAsfList").prop("disabled", true);
        $("#ManagerNameId").prop("disabled", true);
        $("#CurrencyId").prop("disabled", true);
        $("#FinanceId").prop("disabled", true);
    });
</script>

<script>
    $(function() {
        $("#product-desc-tab").on('click', function(e) {
            $("#amountCompanyCart").show();
        });
    });
</script>

<script>
    var x = 1,
        y = 0;
    xx = 0; //initlal text box count

    $('#addAsfListCart').click(function() {

        var balance = $('#balance').val();
        var total_expense = $('#total_expense').val();
        var total_amount = $('#total_amount').val();
        var totalExpenseAmount = +total_expense + +total_amount;

        if (totalExpenseAmount <= balance) {
            // var qty_expense = document.forms["formAsf1"]["qty_expense"].value;
            // var price_expense = document.forms["formAsf1"]["price_expense"].value;
            // var qty_amount = document.forms["formAsf1"]["qty_amount"].value;
            // var price_amount = document.forms["formAsf1"]["price_amount"].value;

            // if (qty_expense == "") {

            //     document.formAsf1.qty_expense.focus();
            //     document.formAsf1.qty_expense2.focus();
            //     document.formAsf1.qty_expense.style.border = "1px solid red";
            //     document.formAsf1.qty_expense2.style.border = "1px solid red";
            //     document.getElementById("iconQtyExpense").style.border = "1px solid red";
            //     document.getElementById("iconQtyExpense").style.borderRadius = "100pt";
            //     document.getElementById("iconQtyExpense").style.paddingRight = "7px";
            //     document.getElementById("iconQtyExpense").style.paddingLeft = "8px";
            //     document.getElementById("iconQtyExpense").style.paddingTop = "3px";
            //     document.getElementById("iconQtyExpense").style.paddingBottom = "3px";
            //     document.getElementById("iconQtyExpense").innerHTML = "&#33";
            //     return false;

            // } else if (price_expense == "") {

            //     document.formAsf1.price_expense.focus();
            //     document.formAsf1.price_expense2.focus();
            //     document.formAsf1.price_expense.style.border = "1px solid red";
            //     document.formAsf1.price_expense2.style.border = "1px solid red";
            //     document.getElementById("iconPriceExpense").style.border = "1px solid red";
            //     document.getElementById("iconPriceExpense").style.borderRadius = "100pt";
            //     document.getElementById("iconPriceExpense").style.paddingRight = "7px";
            //     document.getElementById("iconPriceExpense").style.paddingLeft = "8px";
            //     document.getElementById("iconPriceExpense").style.paddingTop = "3px";
            //     document.getElementById("iconPriceExpense").style.paddingBottom = "3px";
            //     document.getElementById("iconPriceExpense").innerHTML = "&#33";
            //     return false;

            // } else if (qty_amount == "") {

            //     document.formAsf1.qty_amount.focus();
            //     document.formAsf1.qty_amount2.focus();
            //     document.formAsf1.qty_amount.style.border = "1px solid red";
            //     document.formAsf1.qty_amount2.style.border = "1px solid red";
            //     document.getElementById("iconQtyAmount").style.border = "1px solid red";
            //     document.getElementById("iconQtyAmount").style.borderRadius = "100pt";
            //     document.getElementById("iconQtyAmount").style.paddingRight = "7px";
            //     document.getElementById("iconQtyAmount").style.paddingLeft = "8px";
            //     document.getElementById("iconQtyAmount").style.paddingTop = "3px";
            //     document.getElementById("iconQtyAmount").style.paddingBottom = "3px";
            //     document.getElementById("iconQtyAmount").innerHTML = "&#33";
            //     return false;
            // } else if (price_amount == "") {
            //     document.formAsf1.price_amount.focus();
            //     document.formAsf1.price_amount2.focus();
            //     document.formAsf1.price_amount.style.border = "1px solid red";
            //     document.formAsf1.price_amount2.style.border = "1px solid red";
            //     document.getElementById("iconPriceAmount").style.border = "1px solid red";
            //     document.getElementById("iconPriceAmount").style.borderRadius = "100pt";
            //     document.getElementById("iconPriceAmount").style.paddingRight = "7px";
            //     document.getElementById("iconPriceAmount").style.paddingLeft = "8px";
            //     document.getElementById("iconPriceAmount").style.paddingTop = "3px";
            //     document.getElementById("iconPriceAmount").style.paddingBottom = "3px";
            //     document.getElementById("iconPriceAmount").innerHTML = "&#33";
            //     return false;

            // } else {

                var datas = [];

                for (var i = 1; i <= x; i++) {
                    var data = {


                        trano: $('#arfNumberAsf').val(),
                        productId: $('#lastProductId').html(),
                        nameMaterial: $('#lastProductName').html(),
                        uom: $('#lastUom').html(),
                        unitPriceExpense: $('#price_expense').val(),
                        qtyExpense: $('#qty_expense').val(),
                        totalExpense: $('#total_expense').val(),
                        unitPriceAmount: $('#price_amount').val(),
                        qtyAmount: $('#qty_amount').val(),
                        totalAmount: $('#total_amount').val(),
                        description: $('#lastRemark').html(),

                    }
                    datas.push(data);
                }

                var json_object = JSON.stringify(datas);
                // console.log(json_object);

                $.ajax({
                    type: "POST",
                    url: '{{route("ASF.addListCartAsf")}}',
                    data: json_object,
                    contentType: "application/json",
                    processData: true,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    success: function(data) {

                        Swal.fire("Success !", "Data add to cart", "success");

                        y++;
                        $.each(data, function(key, val) {

                            var t = $('#tableAmountDueto').DataTable();
                            t.row.add([
                                '<center><button class="btn btn-outline-primary btn-rounded btn-sm my-0 remove-val-list remove-attachment addAsf" style="border-radius: 100px;"><i class="fa fa-edit"></i></button></center>',
                                '<span id="Trano_' + y + '">' + val.trano + '</span>',
                                '<span id="productId' + y + '">' + val.productId + '</span>',
                                '<span id="NameMaterial_' + y + '">' + val.nameMaterial + '</span>',
                                '<span id="Uom_' + y + '">' + val.uom + '</span>',
                                '<span id="UnitPriceExpense_' + y + '">' + val.unitPriceExpense + '</span>',
                                '<span id="QtyExpense_' + y + '">' + val.qtyExpense + '</span>',
                                '<span id="TotalExpense_' + y + '">' + val.totalExpense + '</span>',
                                '<span id="Description' + y + '">' + val.description + '</span>'
                            ]).draw();

                            var t = $('#tableExpenseClaim').DataTable();
                            t.row.add([
                                '<center><button class="btn btn-outline-primary btn-rounded btn-sm my-0 remove-val-list remove-attachment addAsf" style="border-radius: 100px;"><i class="fa fa-edit"></i></button></center>',
                                '<span id="Trano_' + y + '">' + val.trano + '</span>',
                                '<span id="productId' + y + '">' + val.productId + '</span>',
                                '<span id="NameMaterial_' + y + '">' + val.nameMaterial + '</span>',
                                '<span id="Uom_' + y + '">' + val.uom + '</span>',
                                '<span id="UnitPriceAmount_' + y + '">' + val.unitPriceAmount + '</span>',
                                '<span id="QtyAmount' + y + '">' + val.qtyAmount + '</span>',
                                '<span id="TotalAmount_' + y + '">' + val.totalAmount + '</span>',
                                '<span id="Description' + y + '">' + val.description + '</span>'
                            ]).draw();
                        });
                    },
                    error: function(data) {
                        Swal.fire("Error !", "Data Canceled Added", "error");
                    }
                });

                $("#amountCompanyCart").show();
                $("#saveAsfList").prop("disabled", false);
            // }
        } else {
            Swal.fire("Error !", "Total expense claim + amount do to company <= balance", "error");
        }
    });
</script>

<script>
    // var y = 1; //initlal text box count

    $('#saveAsfList').click(function() {

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