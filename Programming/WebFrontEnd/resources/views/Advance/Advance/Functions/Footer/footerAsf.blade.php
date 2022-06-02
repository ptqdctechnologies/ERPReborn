<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".detailASF").hide();
        $("#addAsfListCart").prop("disabled", true);
        $("#saveAsfList").prop("disabled", true);
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
            $("#total_expense").val(parseFloat(total_expense).toFixed(2));
            
        });
    });
</script>

<script>
    $('document').ready(function() {
        $('#price_amount').keyup(function() {
            var price_amount = $(this).val();
            var qty_amount = $('#qty_amount').val();
            var total_amount = price_amount * qty_amount;// var total_amount = parseFloat(price_amount * qty_amount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            $("#total_amount").val(parseFloat(total_amount).toFixed(2));
        });
    });
</script>

<script>
    $('#qty_expense').on('blur', function() {
    var qty = $('#qty_expense').val().replace(/^\s+|\s+$/g, '');
    if( ($('#qty_expense').val() != '') && (!qty.match(/^$/) )){
        $('#qty_expense').val( parseFloat(qty).toFixed(2));
    }
    });

    $('#price_expense').on('blur', function() {
    var price = $('#price_expense').val().replace(/^\s+|\s+$/g, '');
    if( ($('#price_expense').val() != '') && (!price.match(/^$/) )){
        $('#price_expense').val( parseFloat(price).toFixed(2));
    }
    });

    $('#qty_amount').on('blur', function() {
    var qty = $('#qty_amount').val().replace(/^\s+|\s+$/g, '');
    if( ($('#qty_amount').val() != '') && (!qty.match(/^$/) )){
        $('#qty_amount').val( parseFloat(qty).toFixed(2));
    }
    });

    $('#price_amount').on('blur', function() {
    var price = $('#price_amount').val().replace(/^\s+|\s+$/g, '');
    if( ($('#price_amount').val() != '') && (!price.match(/^$/) )){
        $('#price_amount').val( parseFloat(price).toFixed(2));
    }
    });
    
</script>

<script>
    $('#addAsfListCart').click(function() {

        var balance = $('#balance').val();
        var total_expense = $('#total_expense').val();
        var total_amount = $('#total_amount').val();
        var totalExpenseAmount = +total_expense + +total_amount;
        
        if (totalExpenseAmount <= balance) {

            $.ajax({
                type: "POST",
                url: '{!! route("ASF.StoreValidateAsf") !!}?putProductName=' + $("#nameMaterialHide").val(),
                success: function(data) {
                
                    if(data == "200"){

                        var product_id =  $("#productIdHide").val();
                        var product_name =  $("#nameMaterialHide").val();
                        var uom =  $("#uomHide").val();
                        var trano = $('#arf_number').val();
                        var arf_date = $('#arf_date').val();
                        var total_arf = $('#total_arf').val();
                        var total_arf2 = $('#total_arf2').val();
                        var total_asf = $('#total_asf').val();
                        var total_asf2 = $('#total_asf2').val();
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
                                            '<button type="button" class="btn btn-danger btn-xs remove_amount" data-id1="'+product_name+'"><i class="fa fa-trash"></i></button> '+
                                            '<button type="button" class="btn btn-warning btn-xs edit_amount" data-dismiss="modal" data-id1="'+product_name+'" data-id2="'+arf_date+'" data-id3="'+total_arf+'" data-id4="'+total_arf2+'" data-id5="'+total_asf+'" data-id6="'+total_asf2+'" data-id7="'+balance+'" data-id8="'+balance2+'" data-id9="'+qty_expense+'" data-id10="'+qty_expense2+'" data-id11="'+price_expense+'" data-id12="'+price_expense2+'" data-id13="'+total_expense+'" data-id14="'+total_expense2+'" data-id15="'+qty_amount+'" data-id16="'+qty_amount2+'" data-id17="'+price_amount+'" data-id18="'+price_amount2+'" data-id19="'+total_amount+'" data-id20="'+total_amount2+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
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
                                            '<button type="button" class="btn btn-danger btn-xs remove_expense" data-id1="'+product_name+'"><i class="fa fa-trash"></i></button> '+
                                            '<button type="button" class="btn btn-warning btn-xs edit_expense" data-dismiss="modal" data-id1="'+product_name+'" data-id2="'+arf_date+'" data-id3="'+total_arf+'" data-id4="'+total_arf2+'" data-id5="'+total_asf+'" data-id6="'+total_asf2+'" data-id7="'+balance+'" data-id8="'+balance2+'" data-id9="'+qty_expense+'" data-id10="'+qty_expense2+'" data-id11="'+price_expense+'" data-id12="'+price_expense2+'" data-id13="'+total_expense+'" data-id14="'+total_expense2+'" data-id15="'+qty_amount+'" data-id16="'+qty_amount2+'" data-id17="'+price_amount+'" data-id18="'+price_amount2+'" data-id19="'+total_amount+'" data-id20="'+total_amount2+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
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
                        $("#saveAsfList").prop("disabled", false);

                        $("body").on("click", ".remove_amount", function() {
                            $(this).closest("tr").remove();

                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("ASF.StoreValidateAsf2") !!}?putProductName=' + ProductId,
                            });
                        });

                        $("body").on("click", ".edit_amount", function () {
                            var $this = $(this);

                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("ASF.StoreValidateAsf2") !!}?putProductName=' + ProductId,
                            });

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
                            

                            $("#arf_number").val(id1);
                            $("#arf_date").val(id2);
                            $('#total_arf').val(id3);
                            $("#total_arf2").val(id4);
                            $("#total_asf").val(id5);
                            $("#total_asf2").val(id6);
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

                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("ASF.StoreValidateAsf2") !!}?putProductName=' + ProductId,
                            });
                            
                        });

                        $("body").on("click", ".edit_expense", function () {
                            var $this = $(this);

                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("ASF.StoreValidateAsf2") !!}?putProductName=' + ProductId,
                            });

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
                            

                            $("#arf_number").val(id1);
                            $("#arf_date").val(id2);
                            $('#total_arf').val(id3);
                            $("#total_arf2").val(id4);
                            $("#total_asf").val(id5);
                            $("#total_asf2").val(id6);
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

                        $("#arf_number").val("");
                        $("#arf_date").val("");
                        $("#total_arf").val("");
                        $("#total_arf2").val("");
                        $("#priceCek").val("");
                        $("#total_asf").val("");
                        $("#total_asf2").val("");
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
                        Swal.fire("Cancelled", "Please use edit to update this item !", "error");
                    }
                },
            });
        }
        else{
            Swal.fire("Error !", "Request over budget", "error");
        }
    });
</script>