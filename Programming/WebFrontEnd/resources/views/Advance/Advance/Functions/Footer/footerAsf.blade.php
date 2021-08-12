<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".detailASF").hide();
        $("#addAsfListCart").prop("disabled", true);
        $("#saveAsfList").prop("disabled", true);
        $("#ManagerNameId").prop("disabled", true);
        $("#CurrencyId").prop("disabled", true);
        $("#FinanceId").prop("disabled", true);
        // $("#projectcode2").prop("disabled", true);
        // $("#sitecode2").prop("disabled", true);
        $("#showContentBOQ2").hide();
        $("#tableShowHideBOQ2").hide();

        $("#amountCompanyCart").hide();
        $("#expenseCompanyCart").hide();
    });
</script>

<script>
    $(function() {
        $("#origin_budget").on('click', function(e) {
            e.preventDefault();
            var val = $("#origin_budget").val();
            if (val == "") {
                $("#projectcode2").prop("disabled", true);
            } else {
                $("#projectcode2").prop("disabled", false);
            }
        });
    });
</script>

<script>
    $(function() {
        $(".idExpense").on('click', function(e) {
            $("#amountdueto").hide();
            $("#expense").show();
            $("#expenseCompanyCart").show();
        });
    });

    $(function() {
        $(".idAmount").on('click', function(e) {
            $("#expense").hide();
            $("#amountCompanyCart").show();
            $("#amountdueto").show();
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

                    trano: $("#getTrano1").html(),
                    productId: $("#productIdHide").val(),
                    nameMaterial: $("#nameMaterialHide").val(),
                    uom: $("#uomHide").val(),
                    unitPriceExpense: $('#price_expense').val(),
                    qtyExpense: $('#qty_expense').val(),
                    totalExpense: $('#total_expense').val(),
                    unitPriceAmount: $('#price_amount').val(),
                    qtyAmount: $('#qty_amount').val(),
                    totalAmount: $('#total_amount').val(),
                    description: "cek",

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
                            '<span id="Trano">' + val.trano + '</span>',
                            '<span id="bbbbbbb">' + val.productId + '</span>',
                            '<span id="NameMaterial">' + val.nameMaterial + '</span>',
                            '<span id="Uom">' + val.uom + '</span>',
                            '<span id="UnitPriceAmount">' + val.unitPriceAmount + '</span>',
                            '<span id="QtyAmount">' + val.qtyAmount + '</span>',
                            '<span id="TotalAmount">' + val.totalAmount + '</span>',
                            '<span id="Description">' + val.description + '</span>'
                        ]).draw();

                        var t = $('#tableExpenseClaim').DataTable();
                        t.row.add([
                            '<center><button class="btn btn-outline-primary btn-rounded btn-sm my-0 remove-val-list remove-attachment addAsf" style="border-radius: 100px;"><i class="fa fa-edit"></i></button></center>',
                            '<span id="Trano">' + val.trano + '</span>',
                            '<span id="productId">' + val.productId + '</span>',
                            '<span id="NameMaterial">' + val.nameMaterial + '</span>',
                            '<span id="Uom">' + val.uom + '</span>',
                            '<span id="UnitPriceExpense">' + val.unitPriceExpense + '</span>',
                            '<span id="QtyExpense">' + val.qtyExpense + '</span>',
                            '<span id="TotalExpense">' + val.totalExpense + '</span>',
                            '<span id="Description">' + val.description + '</span>'
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

<script>
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    $('.add_field_button').click(function() {
        cek = 0;
        addColomn();
    });

    function addColomn() { //on add input button click
        if (cek == 0) {
            cek++;
            x++; //text box increment
            for ($x = 1; $x < 5; $x++) {

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
    $(document).ready(function() {

        $('.klikArfDetail1').click(function() {

            $("#tableShowHideBOQ2").find("input,button,textarea,select").attr("disabled", true);
            $("#addAsfListCart").prop("disabled", false);
            $(".detailASF").show();
            $("#arf_number").val($("#getTrano1").html());
            $("#arf_date").val("23-02-2021");

            $("#productIdHide").val($("#getProductId1").html());
            $("#nameMaterialHide").val($("#getProductName1").html());
            $("#uomHide").val($("#getUom1").html());

            var getTotalArfDetail1 = $("#getTotalArfDetail1").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalArfDetail2 = $("#getTotalArfDetail2").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalArfDetail3 = $("#getTotalArfDetail3").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalArfDetail4 = $("#getTotalArfDetail4").html().replace(/[^a-zA-Z0-9 ]/g, "");

            var getTotalArf =(+getTotalArfDetail1 + +getTotalArfDetail2 + +getTotalArfDetail3 + +getTotalArfDetail4);
            var getBalance = (getTotalArf - getTotalArfDetail1);

            $("#total_arf").val(getTotalArf);
            $("#total_arf2").val("IDR");
            $("#total_asf").val($("#getTotalArfDetail1").html());
            $("#total_asf2").val("IDR");
            $("#balance").val(getBalance);
            $("#balance2").val("IDR");
            $("#qty_expense2").val("Ls");
            $("#price_expense2").val("IDR");
            $("#total_expense2").val("IDR");
            $("#qty_amount2").val("Ls");
            $("#price_amount2").val("IDR");
            $("#total_amount2").val("IDR");

        });
        $('.klikArfDetail2').click(function() {

            $("#tableShowHideBOQ2").find("input,button,textarea,select").attr("disabled", true);
            $("#addAsfListCart").prop("disabled", false);
            $(".detailASF").show();
            $("#arf_number").val($("#getTrano2").html());
            $("#arf_date").val("23-02-2021");

            $("#productIdHide").val($("#getProductId2").html());
            $("#nameMaterialHide").val($("#getProductName2").html());
            $("#uomHide").val($("#getUom2").html());

            var getTotalArfDetail1 = $("#getTotalArfDetail1").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalArfDetail2 = $("#getTotalArfDetail2").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalArfDetail3 = $("#getTotalArfDetail3").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalArfDetail4 = $("#getTotalArfDetail4").html().replace(/[^a-zA-Z0-9 ]/g, "");

            var getTotalArf =(+getTotalArfDetail1 + +getTotalArfDetail2 + +getTotalArfDetail3 + +getTotalArfDetail4).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            var getBalance = ((+getTotalArfDetail1 + +getTotalArfDetail2 + +getTotalArfDetail3 + +getTotalArfDetail4) - getTotalArfDetail2).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

            $("#total_arf").val(getTotalArf);
            $("#total_arf2").val("IDR");
            $("#total_asf").val($("#getTotalArfDetail2").html());
            $("#total_asf2").val("IDR");
            $("#balance").val(getBalance);
            $("#balance2").val("IDR");
            $("#qty_expense2").val("Ls");
            $("#price_expense2").val("IDR");
            $("#total_expense2").val("IDR");
            $("#qty_amount2").val("Ls");
            $("#price_amount2").val("IDR");
            $("#total_amount2").val("IDR");
        });
        $('.klikArfDetail3').click(function() {

            $("#tableShowHideBOQ2").find("input,button,textarea,select").attr("disabled", true);
            $("#addAsfListCart").prop("disabled", false);
            $(".detailASF").show();
            $("#arf_number").val($("#getTrano3").html());
            $("#arf_date").val("23-02-2021");

            $("#productIdHide").val($("#getProductId3").html());
            $("#nameMaterialHide").val($("#getProductName3").html());
            $("#uomHide").val($("#getUom3").html());

            var getTotalArfDetail1 = $("#getTotalArfDetail1").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalArfDetail2 = $("#getTotalArfDetail2").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalArfDetail3 = $("#getTotalArfDetail3").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalArfDetail4 = $("#getTotalArfDetail4").html().replace(/[^a-zA-Z0-9 ]/g, "");

            var getTotalArf =(+getTotalArfDetail1 + +getTotalArfDetail2 + +getTotalArfDetail3 + +getTotalArfDetail4).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            var getBalance = ((+getTotalArfDetail1 + +getTotalArfDetail2 + +getTotalArfDetail3 + +getTotalArfDetail4) - getTotalArfDetail3).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

            $("#total_arf").val(getTotalArf);
            $("#total_arf2").val("IDR");
            $("#total_asf").val($("#getTotalArfDetail3").html());
            $("#total_asf2").val("IDR");
            $("#balance").val(getBalance);
            $("#balance2").val("IDR");
            $("#qty_expense2").val("Ls");
            $("#price_expense2").val("IDR");
            $("#total_expense2").val("IDR");
            $("#qty_amount2").val("Ls");
            $("#price_amount2").val("IDR");
            $("#total_amount2").val("IDR");
        });
        $('.klikArfDetail4').click(function() {

            $("#tableShowHideBOQ2").find("input,button,textarea,select").attr("disabled", true);
            $("#addAsfListCart").prop("disabled", false);
            $(".detailASF").show();
            $("#arf_number").val($("#getTrano4").html());
            $("#arf_date").val("23-02-2021");

            $("#productIdHide").val($("#getProductId4").html());
            $("#nameMaterialHide").val($("#getProductName4").html());
            $("#uomHide").val($("#getUom4").html());

            var getTotalArfDetail1 = $("#getTotalArfDetail1").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalArfDetail2 = $("#getTotalArfDetail2").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalArfDetail3 = $("#getTotalArfDetail3").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalArfDetail4 = $("#getTotalArfDetail4").html().replace(/[^a-zA-Z0-9 ]/g, "");

            var getTotalArf =(+getTotalArfDetail1 + +getTotalArfDetail2 + +getTotalArfDetail3 + +getTotalArfDetail4).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            var getBalance = ((+getTotalArfDetail1 + +getTotalArfDetail2 + +getTotalArfDetail3 + +getTotalArfDetail4) - getTotalArfDetail4).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

            $("#total_arf").val(getTotalArf);
            $("#total_arf2").val("IDR");
            $("#total_asf").val($("#getTotalArfDetail4").html());
            $("#total_asf2").val("IDR");
            $("#balance").val(getBalance);
            $("#balance2").val("IDR");
            $("#qty_expense2").val("Ls");
            $("#price_expense2").val("IDR");
            $("#total_expense2").val("IDR");
            $("#qty_amount2").val("Ls");
            $("#price_amount2").val("IDR");
            $("#total_amount2").val("IDR");
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".detailSettlement").click(function() {
            $("#tableShowHideBOQ2").find("input,button,textarea,select").attr("disabled", false);
        });
    });
</script>

<script>
    $('document').ready(function() {
        $('#price_expense').keyup(function() {
            var price_expense = $(this).val();
            var qty_expense = $('#qty_expense').val();
            var total_expense = price_expense * qty_expense;
            // var total_expense = parseFloat(price_expense * qty_expense).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            $("#total_expense").val(total_expense);
        });
    });
</script>

<script>
    $('document').ready(function() {
        $('#price_amount').keyup(function() {
            var price_amount = $(this).val();
            var qty_amount = $('#qty_amount').val();

            var total_amount = price_amount * qty_amount;
            // var total_amount = parseFloat(price_amount * qty_amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            $("#total_amount").val(total_amount);
        });
    });
</script>