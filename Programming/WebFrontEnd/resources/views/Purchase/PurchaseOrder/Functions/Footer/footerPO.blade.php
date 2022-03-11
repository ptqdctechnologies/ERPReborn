<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".detailPO").hide();
        $("#addPOListCart").prop("disabled", true);
        $("#savePOList").prop("disabled", true);
        $("#ManagerNameId").prop("disabled", true);
        $("#CurrencyId").prop("disabled", true);
        $("#FinanceId").prop("disabled", true);
        $("#advance_number2").prop("disabled", true);
        $("#showContentBOQ2").hide();
        $("#tableShowHideBOQ2").hide();

        $("#amountCompanyCart").hide();
        $("#expenseCompanyCart").hide();
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

    $('#addPOListCart').click(function() {

        var balance = $('#balance').val();
        var total_expense = $('#total_expense').val();
        var total_amount = $('#total_amount').val();
        var totalExpenseAmount = +total_expense + +total_amount;

        if (totalExpenseAmount <= balance) {

            var product_id =  $("#productIdHide").val();
            var product_name =  $("#nameMaterialHide").val();
            var uom =  $("#uomHide").val();
            var trano = $('#PO_number').val();
            var PO_date = $('#PO_date').val();
            var total_PO = $('#total_PO').val();
            var total_PO2 = $('#total_PO2').val();
            var total_PO = $('#total_PO').val();
            var total_PO2 = $('#total_PO2').val();
            var balance = $('#balance').val();
            var balance2 = $('#balance2').val();
            var qty_expense =  $('#qty_expense').val();
            var qty_expense2 =  $('#qty_expense2').val();
            var price_expense =  $('#price_expense').val();
            var price_expense2 =  $('#price_expense2').val();
            var total_expense =  $('#total_expense').val();
            var total_expense2 =  $('#total_expense2').val();
            var qty_amount =  $('#qty_amount').val();
            var qty_amount2 =  $('#qty_amount2').val();
            var price_amount =  $('#price_amount').val();
            var price_amount2 =  $('#price_amount2').val();
            var total_amount =  $('#total_amount').val();
            var total_amount2 =  $('#total_amount2').val();
            var description =  $("#descriptionHide").val();

            var html = '<tr>'+
                            '<td>'+
                                '<button type="button" class="btn btn-danger btn-xs remove_amount" data-id="1"><i class="fa fa-trash"></i></button> '+
                                '<button type="button" class="btn btn-warning btn-xs edit_amount" data-dismiss="modal" data-id1="'+trano+'" data-id2="'+PO_date+'" data-id3="'+total_PO+'" data-id4="'+total_PO2+'" data-id5="'+total_PO+'" data-id6="'+total_PO2+'" data-id7="'+balance+'" data-id8="'+balance2+'" data-id9="'+qty_expense+'" data-id10="'+qty_expense2+'" data-id11="'+price_expense+'" data-id12="'+price_expense2+'" data-id13="'+total_expense+'" data-id14="'+total_expense2+'" data-id15="'+qty_amount+'" data-id16="'+qty_amount2+'" data-id17="'+price_amount+'" data-id18="'+price_amount2+'" data-id19="'+total_amount+'" data-id20="'+total_amount2+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                                '<input type="hidden" name="var_trano[]" value="'+trano+'">'+
                                '<input type="hidden" name="var_product_id[]" value="'+product_id+'">'+
                                '<input type="hidden" name="var_product_name[]" value="'+product_name+'">'+
                                '<input type="hidden" name="var_uom[]" value="'+uom+'">'+
                                '<input type="hidden" name="var_price_amount[]" value="'+price_amount+'">'+
                                '<input type="hidden" name="var_qty_amount[]" value="'+qty_amount+'">'+
                                '<input type="hidden" name="var_total_amount[]" value="'+total_amount+'">'+
                                '<input type="hidden" name="var_description[]" id="var_description[]" value="'+description+'">'+
                            '</td>'+
                            '<td>'+trano+'</td>'+
                            '<td>'+product_id+'</td>'+
                            '<td>'+product_name+'</td>'+
                            '<td>'+uom+'</td>'+
                            '<td>'+qty_amount+'</td>'+
                            '<td>'+price_amount+'</td>'+
                            '<td>'+total_amount+'</td>'+
                            '<td>'+description+'</td>'+
                        '</tr>';
                
            $('table.tableAmountDueto tbody').append(html);

            var html2 = '<tr>'+
                            '<td>'+
                                '<button type="button" class="btn btn-danger btn-xs remove_expense" data-id="1"><i class="fa fa-trash"></i></button> '+
                                '<button type="button" class="btn btn-warning btn-xs edit_expense" data-dismiss="modal" data-id1="'+trano+'" data-id2="'+PO_date+'" data-id3="'+total_PO+'" data-id4="'+total_PO2+'" data-id5="'+total_PO+'" data-id6="'+total_PO2+'" data-id7="'+balance+'" data-id8="'+balance2+'" data-id9="'+qty_expense+'" data-id10="'+qty_expense2+'" data-id11="'+price_expense+'" data-id12="'+price_expense2+'" data-id13="'+total_expense+'" data-id14="'+total_expense2+'" data-id15="'+qty_amount+'" data-id16="'+qty_amount2+'" data-id17="'+price_amount+'" data-id18="'+price_amount2+'" data-id19="'+total_amount+'" data-id20="'+total_amount2+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                                '<input type="hidden" id="var_tranox" name="var_trano[]" value="'+trano+'">'+
                                '<input type="hidden" name="var_product_id[]" value="'+product_id+'">'+
                                '<input type="hidden" name="var_product_name[]" value="'+product_name+'">'+
                                '<input type="hidden" name="var_uom[]" value="'+uom+'">'+
                                '<input type="hidden" name="var_price_expense[]" value="'+price_expense+'">'+
                                '<input type="hidden" name="var_qty_expense[]" value="'+qty_expense+'">'+
                                '<input type="hidden" name="var_total_expense[]" value="'+total_expense+'">'+
                                '<input type="hidden" name="var_description[]" value="'+description+'">'+
                            '</td>'+
                            '<td>'+trano+'</td>'+
                            '<td>'+product_id+'</td>'+
                            '<td>'+product_name+'</td>'+
                            '<td>'+uom+'</td>'+
                            '<td>'+qty_expense+'</td>'+
                            '<td>'+price_expense+'</td>'+
                            '<td>'+total_expense+'</td>'+
                            '<td>'+description+'</td>'+
                        '</tr>';
                    
            $('table.tableExpenseClaim tbody').append(html2);
            $("#expenseCompanyCart").show();
            $("#savePOList").prop("disabled", false);

            $("body").on("click", ".remove_amount", function() {
                $(this).closest("tr").remove();
            });

            $("body").on("click", ".edit_amount", function () {
                var $this = $(this);
                var id1 = $this.data("id1");
                var id2 = $this.data("id2");
                var id3 = $this.data("id3");
                var id4 = $this.data("id4");
                var id5 = $this.data("id5");
                var id6 = $this.data("id6");
                var id7 = $this.data("id7");
                var id8 = $this.data("id8");
                var id9 = $this.data("id9");
                var id10 = $this.data("id10");
                var id11 = $this.data("id11");
                var id12 = $this.data("id12");
                var id13 = $this.data("id13");
                var id14 = $this.data("id14");
                var id15 = $this.data("id15");
                var id16 = $this.data("id16");
                var id17 = $this.data("id17");
                var id18 = $this.data("id18");
                var id19 = $this.data("id19");
                var id20 = $this.data("id20");
                

                $("#PO_number").val(id1);
                $("#PO_date").val(id2);
                $('#total_PO').val(id3);
                $("#total_PO2").val(id4);
                $("#total_PO").val(id5);
                $("#total_PO2").val(id6);
                $("#balance").val(id7);
                $("#balance2").val(id8);
                $("#qty_expense").val(id9);
                $("#qty_expense2").val(id10);
                $("#price_expense").val(id11);
                $("#price_expense2").val(id12);
                $("#total_expense").val(id13);
                $("#total_expense2").val(id14);
                $("#qty_amount").val(id15);
                $("#qty_amount2").val(id16);
                $("#price_amount").val(id17);
                $("#price_amount2").val(id18);
                $("#total_amount").val(id19);
                $("#total_amount2").val(id20);
                
                $(this).closest("tr").remove();

                $("#qty_expense").prop("disabled", true);
                $("#price_expense").prop("disabled", true);
            });
            $("body").on("click", ".remove_expense", function () {
                $(this).closest("tr").remove();
            });
            $("body").on("click", ".edit_expense", function () {
                var $this = $(this);
                var id1 = $this.data("id1");
                var id2 = $this.data("id2");
                var id3 = $this.data("id3");
                var id4 = $this.data("id4");
                var id5 = $this.data("id5");
                var id6 = $this.data("id6");
                var id7 = $this.data("id7");
                var id8 = $this.data("id8");
                var id9 = $this.data("id9");
                var id10 = $this.data("id10");
                var id11 = $this.data("id11");
                var id12 = $this.data("id12");
                var id13 = $this.data("id13");
                var id14 = $this.data("id14");
                var id15 = $this.data("id15");
                var id16 = $this.data("id16");
                var id17 = $this.data("id17");
                var id18 = $this.data("id18");
                var id19 = $this.data("id19");
                var id20 = $this.data("id20");
                

                $("#PO_number").val(id1);
                $("#PO_date").val(id2);
                $('#total_PO').val(id3);
                $("#total_PO2").val(id4);
                $("#total_PO").val(id5);
                $("#total_PO2").val(id6);
                $("#balance").val(id7);
                $("#balance2").val(id8);
                $("#qty_expense").val(id9);
                $("#qty_expense2").val(id10);
                $("#price_expense").val(id11);
                $("#price_expense2").val(id12);
                $("#total_expense").val(id13);
                $("#total_expense2").val(id14);
                $("#qty_amount").val(id15);
                $("#qty_amount2").val(id16);
                $("#price_amount").val(id17);
                $("#price_amount2").val(id18);
                $("#total_amount").val(id19);
                $("#total_amount2").val(id20);
                
                $(this).closest("tr").remove();

                $("#qty_amount").prop("disabled", true);
                $("#price_amount").prop("disabled", true);
            });

            $("#PO_number").val("");
            $("#PO_date").val("");
            $("#total_PO").val("");
            $("#total_PO2").val("");
            $("#priceCek").val("");
            $("#total_PO").val("");
            $("#total_PO2").val("");
            $("#balance").val("");
            $("#balance2").val("");
            $("#qty_expense").val("");
            $("#qty_expense2").val("");
            $("#price_expense").val("");
            $("#price_expense2").val("");
            $("#total_expense").val("");
            $("#total_expense2").val("");
            $("#qty_amount").val("");
            $("#qty_amount2").val("");
            $("#price_amount").val("");
            $("#price_amount2").val("");
            $("#total_amount").val("");
            $("#total_amount2").val("");

            $("#qty_expense").prop("disabled", false);
            $("#price_expense").prop("disabled", false);
            $("#qty_amount").prop("disabled", false);
            $("#price_amount").prop("disabled", false);

        } else {
            Swal.fire("Error !", "Request over budget", "error");
        }
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

        $('.klikPODetail1').click(function() {
            $("#tableShowHideBOQ2").find("input,button,textarea,select").attr("disabled", true);
            $("#addPOListCart").prop("disabled", false);
            $(".detailPO").show();
            $("#PO_number").val($("#getTrano1").html());
            $("#PO_date").val("23-02-2021");

            $("#productIdHide").val($("#getProductId1").html());
            
            $("#nameMaterialHide").val($("#getProductName1").html());
            $("#uomHide").val($("#getUom1").html());

            var getTotalPODetail1 = $("#getTotalPODetail1").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalPODetail2 = $("#getTotalPODetail2").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalPODetail3 = $("#getTotalPODetail3").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalPODetail4 = $("#getTotalPODetail4").html().replace(/[^a-zA-Z0-9 ]/g, "");

            var getTotalPO =(+getTotalPODetail1 + +getTotalPODetail2 + +getTotalPODetail3 + +getTotalPODetail4);
            var getBalance = (getTotalPO - getTotalPODetail1);

            $("#total_PO").val(getTotalPO);
            $("#total_PO2").val("IDR");
            $("#total_PO").val($("#getTotalPODetail1").html());
            $("#total_PO2").val("IDR");
            $("#balance").val(getBalance);
            $("#balance2").val("IDR");
            $("#qty_expense2").val("Ls");
            $("#price_expense2").val("IDR");
            $("#total_expense2").val("IDR");
            $("#qty_amount2").val("Ls");
            $("#price_amount2").val("IDR");
            $("#total_amount2").val("IDR");

        });
        $('.klikPODetail2').click(function() {

            $("#tableShowHideBOQ2").find("input,button,textarea,select").attr("disabled", true);
            $("#addPOListCart").prop("disabled", false);
            $(".detailPO").show();
            $("#PO_number").val($("#getTrano2").html());
            $("#PO_date").val("23-02-2021");

            $("#productIdHide").val($("#getProductId2").html());
            $("#nameMaterialHide").val($("#getProductName2").html());
            $("#uomHide").val($("#getUom2").html());

            var getTotalPODetail1 = $("#getTotalPODetail1").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalPODetail2 = $("#getTotalPODetail2").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalPODetail3 = $("#getTotalPODetail3").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalPODetail4 = $("#getTotalPODetail4").html().replace(/[^a-zA-Z0-9 ]/g, "");

            var getTotalPO =(+getTotalPODetail1 + +getTotalPODetail2 + +getTotalPODetail3 + +getTotalPODetail4).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            var getBalance = ((+getTotalPODetail1 + +getTotalPODetail2 + +getTotalPODetail3 + +getTotalPODetail4) - getTotalPODetail2).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

            $("#total_PO").val(getTotalPO);
            $("#total_PO2").val("IDR");
            $("#total_PO").val($("#getTotalPODetail2").html());
            $("#total_PO2").val("IDR");
            $("#balance").val(getBalance);
            $("#balance2").val("IDR");
            $("#qty_expense2").val("Ls");
            $("#price_expense2").val("IDR");
            $("#total_expense2").val("IDR");
            $("#qty_amount2").val("Ls");
            $("#price_amount2").val("IDR");
            $("#total_amount2").val("IDR");
        });
        $('.klikPODetail3').click(function() {

            $("#tableShowHideBOQ2").find("input,button,textarea,select").attr("disabled", true);
            $("#addPOListCart").prop("disabled", false);
            $(".detailPO").show();
            $("#PO_number").val($("#getTrano3").html());
            $("#PO_date").val("23-02-2021");

            $("#productIdHide").val($("#getProductId3").html());
            $("#nameMaterialHide").val($("#getProductName3").html());
            $("#uomHide").val($("#getUom3").html());

            var getTotalPODetail1 = $("#getTotalPODetail1").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalPODetail2 = $("#getTotalPODetail2").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalPODetail3 = $("#getTotalPODetail3").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalPODetail4 = $("#getTotalPODetail4").html().replace(/[^a-zA-Z0-9 ]/g, "");

            var getTotalPO =(+getTotalPODetail1 + +getTotalPODetail2 + +getTotalPODetail3 + +getTotalPODetail4).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            var getBalance = ((+getTotalPODetail1 + +getTotalPODetail2 + +getTotalPODetail3 + +getTotalPODetail4) - getTotalPODetail3).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

            $("#total_PO").val(getTotalPO);
            $("#total_PO2").val("IDR");
            $("#total_PO").val($("#getTotalPODetail3").html());
            $("#total_PO2").val("IDR");
            $("#balance").val(getBalance);
            $("#balance2").val("IDR");
            $("#qty_expense2").val("Ls");
            $("#price_expense2").val("IDR");
            $("#total_expense2").val("IDR");
            $("#qty_amount2").val("Ls");
            $("#price_amount2").val("IDR");
            $("#total_amount2").val("IDR");
        });
        $('.klikPODetail4').click(function() {

            $("#tableShowHideBOQ2").find("input,button,textarea,select").attr("disabled", true);
            $("#addPOListCart").prop("disabled", false);
            $(".detailPO").show();
            $("#PO_number").val($("#getTrano4").html());
            $("#PO_date").val("23-02-2021");

            $("#productIdHide").val($("#getProductId4").html());
            $("#nameMaterialHide").val($("#getProductName4").html());
            $("#uomHide").val($("#getUom4").html());

            var getTotalPODetail1 = $("#getTotalPODetail1").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalPODetail2 = $("#getTotalPODetail2").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalPODetail3 = $("#getTotalPODetail3").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var getTotalPODetail4 = $("#getTotalPODetail4").html().replace(/[^a-zA-Z0-9 ]/g, "");

            var getTotalPO =(+getTotalPODetail1 + +getTotalPODetail2 + +getTotalPODetail3 + +getTotalPODetail4).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            var getBalance = ((+getTotalPODetail1 + +getTotalPODetail2 + +getTotalPODetail3 + +getTotalPODetail4) - getTotalPODetail4).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

            $("#total_PO").val(getTotalPO);
            $("#total_PO2").val("IDR");
            $("#total_PO").val($("#getTotalPODetail4").html());
            $("#total_PO2").val("IDR");
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
            var total_expense = price_expense * qty_expense;$("#total_expense").val(total_expense);
        });
    });
</script>

<script>
    $('document').ready(function() {
        $('#price_amount').keyup(function() {
            var price_amount = $(this).val();
            var qty_amount = $('#qty_amount').val();
            var total_amount = price_amount * qty_amount;// var total_amount = parseFloat(price_amount * qty_amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            $("#total_amount").val(total_amount);
        });
    });
</script>