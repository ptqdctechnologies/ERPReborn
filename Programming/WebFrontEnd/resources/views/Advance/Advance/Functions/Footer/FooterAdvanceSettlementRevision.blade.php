<script type="text/javascript">
    $(document).ready(function() {
        $("#addAsfListCart").prop("disabled", true);
        $("#SaveAsfList").prop("disabled", true);
        $("#projectcode2").prop("disabled", true);
        $("#advance_number2").prop("disabled", true);
        $("#detailASF").hide();
        // $("#tableShowHideArfDetail").hide();
        $("#amountCompanyCart").hide();
        $("#expenseCompanyCart").hide();
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".CancelDetailAsf").click(function() {

            var product_id = $("#productIdHide").val();
            var product_name = $("#nameMaterialHide").val();
            var trano = $('#arf_number').val();
            var arf_date = $('#arf_date').val();
            var total_arf = $('#total_arf').val();
            var total_arf2 = $('#total_arf2').val();
            var total_asf = $('#total_asf').val();
            var total_asf2 = $('#total_asf2').val();
            var balance = $('#balance').val();
            var balance2 = $('#balance2').val();
            var qty_expense = $('#qty_expense').val();
            var qty_expense2 = $('#qty_expense2').val();
            var price_expense = $('#price_expense').val();
            var price_expense2 = $('#price_expense2').val();
            var total_expense = $('#total_expense').val();
            var total_expense2 = $('#total_expense2').val();
            var qty_amount = $('#qty_amount').val();
            var qty_amount2 = $('#qty_amount2').val();
            var price_amount = $('#price_amount').val();
            var price_amount2 = $('#price_amount2').val();
            var total_amount = $('#total_amount').val();
            var total_amount2 = $('#total_amount2').val();
            var description = $("#descriptionHide").val();
            var statusEditAsf = $("#statusEditAsf").val();
            if (statusEditAsf == "Yes") {

                var qty_expense = $("#put_qty_expense").val();
                var price_expense = $("#put_price_expense").val();
                var qty_amount = $("#put_qty_amount").val();
                var price_amount = $("#put_price_amount").val();
                var total_amount = parseFloat(qty_amount * price_amount).toFixed(2);
                var total_expense = parseFloat(qty_expense * price_expense).toFixed(2);


                if (total_amount != "") {
                    var html = '<tr>' +
                        '<td style="border:1px solid #e9ecef;width:7%;">' +
                        '&nbsp;&nbsp;<button type="button" class="btn btn-xs remove_amount"  data-id1="' + product_id + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                        '&nbsp;<button type="button" class="btn btn-xs edit_amount" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + arf_date + '" data-id3="' + total_arf + '" data-id4="' + total_arf2 + '" data-id5="' + total_asf + '" data-id6="' + total_asf2 + '" data-id7="' + balance + '" data-id8="' + balance2 + '" data-id9="' + qty_expense + '" data-id10="' + qty_expense2 + '" data-id11="' + price_expense + '" data-id12="' + price_expense2 + '" data-id13="' + total_expense + '" data-id14="' + total_expense2 + '" data-id15="' + qty_amount + '" data-id16="' + qty_amount2 + '" data-id17="' + price_amount + '" data-id18="' + price_amount2 + '" data-id19="' + total_amount + '" data-id20="' + total_amount2 + '" data-id21="' + trano + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                        '<input type="hidden" name="var_trano[]" value="' + trano + '">' +
                        '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                        '<input type="hidden" name="var_product_name[]" value="' + product_name + '">' +
                        '<input type="hidden" name="var_uom[]" value="' + qty_amount2 + '">' +
                        '<input type="hidden" name="var_price_amount[]" value="' + price_amount + '">' +
                        '<input type="hidden" name="var_qty_amount[]" value="' + qty_amount + '">' +
                        '<input type="hidden" name="var_total_amount[]" value="' + total_amount + '">' +
                        '<input type="hidden" name="var_description[]" id="var_description[]" value="' + description + '">' +
                        '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + product_name + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + qty_amount2 + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + qty_amount + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + price_amount + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + total_amount + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + description + '</td>' +
                        '</tr>';

                    $('table.tableAmountDueto tbody').append(html);
                }
                if (total_expense !== "") {
                    var html2 = '<tr>' +
                        '<td style="border:1px solid #e9ecef;width:7%;">' +
                        '&nbsp;&nbsp;<button type="button" class="btn btn-xs remove_expense" data-id1="' + product_id + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                        '&nbsp;<button type="button" class="btn btn-xs edit_expense" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + arf_date + '" data-id3="' + total_arf + '" data-id4="' + total_arf2 + '" data-id5="' + total_asf + '" data-id6="' + total_asf2 + '" data-id7="' + balance + '" data-id8="' + balance2 + '" data-id9="' + qty_expense + '" data-id10="' + qty_expense2 + '" data-id11="' + price_expense + '" data-id12="' + price_expense2 + '" data-id13="' + total_expense + '" data-id14="' + total_expense2 + '" data-id15="' + qty_amount + '" data-id16="' + qty_amount2 + '" data-id17="' + price_amount + '" data-id18="' + price_amount2 + '" data-id19="' + total_amount + '" data-id20="' + total_amount2 + '" data-id21="' + trano + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                        '<input type="hidden" id="var_tranox" name="var_trano[]" value="' + trano + '">' +
                        '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                        '<input type="hidden" name="var_product_name[]" value="' + product_name + '">' +
                        '<input type="hidden" name="var_uom[]" value="' + qty_expense2 + '">' +
                        '<input type="hidden" name="var_price_expense[]" value="' + price_expense + '">' +
                        '<input type="hidden" name="var_qty_expense[]" value="' + qty_expense + '">' +
                        '<input type="hidden" name="var_total_expense[]" value="' + total_expense + '">' +
                        '<input type="hidden" name="var_description[]" value="' + description + '">' +
                        '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + product_name + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + qty_expense2 + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + qty_expense + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + price_expense + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + total_expense + '</td>' +
                        '<td style="border:1px solid #e9ecef;">' + description + '</td>' +
                        '</tr>';

                    $('table.tableExpenseClaim tbody').append(html2);
                }
                $("#statusEditAsf").val("No");
            }

            $("#tableShowHideArfDetail").find("input,button,textarea,select").attr("disabled", false);

            $("#arf_number").val("");
            $("#arf_date").val("");
            $("#total_arf").val("");
            $("#total_arf2").val("");
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

            $("#putProductId").css("border", "1px solid #ced4da");
        });
    });
</script>

<script type="text/javascript">
    function addFromDetailtoCartJs() {
        var VarArfNumber = $("#arf_number").val();
        $("#arf_number").css("border", "1px solid #ced4da");

        if (VarArfNumber === "") {
            $("#arf_number").focus();
            $("#arf_number").attr('required', true);
            $("#arf_number").css("border", "1px solid red");
        } else {
            var balance = parseFloat($('#balance').val().replace(/,/g, ''));
            var productIdHide = $('#productIdHide').val();
            var total_expense = parseFloat($('#total_expense').val().replace(/,/g, ''));
            var total_amount = parseFloat($('#total_amount').val().replace(/,/g, ''));
            var totalExpenseAmount = +total_expense + +total_amount;
            if (totalExpenseAmount <= balance) {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "POST",
                    url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement") !!}?putProductId=' + $("#productIdHide").val(),
                    success: function(data) {
                        if (data == "200") {

                            var product_id = $("#productIdHide").val();
                            var product_name = $("#nameMaterialHide").val();
                            var trano = $('#arf_number').val();
                            var arf_date = $('#arf_date').val();
                            var total_arf = $('#total_arf').val();
                            var total_arf2 = $('#total_arf2').val();
                            var total_asf = $('#total_asf').val();
                            var total_asf2 = $('#total_asf2').val();
                            var balance = $('#balance').val();
                            var balance2 = $('#balance2').val();
                            var qty_expense = $('#qty_expense').val();
                            var qty_expense2 = $('#qty_expense2').val();
                            var price_expense = $('#price_expense').val();
                            var price_expense2 = $('#price_expense2').val();
                            var total_expense = $('#total_expense').val();
                            var total_expense2 = $('#total_expense2').val();
                            var qty_amount = $('#qty_amount').val();
                            var qty_amount2 = $('#qty_amount2').val();
                            var price_amount = $('#price_amount').val();
                            var price_amount2 = $('#price_amount2').val();
                            var total_amount = $('#total_amount').val();
                            var total_amount2 = $('#total_amount2').val();
                            var description = $("#descriptionHide").val();

                            // if (total_amount != "") {
                            var html = '<tr>' +
                                '<td style="border:1px solid #e9ecef;width:7%;">' +
                                '&nbsp;&nbsp;<button type="button" class="btn btn-xs remove_amount"  data-id1="' + product_id + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                                '&nbsp;<button type="button" class="btn btn-xs edit_amount" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + arf_date + '" data-id3="' + total_arf + '" data-id4="' + total_arf2 + '" data-id5="' + total_asf + '" data-id6="' + total_asf2 + '" data-id7="' + balance + '" data-id8="' + balance2 + '" data-id9="' + qty_expense + '" data-id10="' + qty_expense2 + '" data-id11="' + price_expense + '" data-id12="' + price_expense2 + '" data-id13="' + total_expense + '" data-id14="' + total_expense2 + '" data-id15="' + qty_amount + '" data-id16="' + qty_amount2 + '" data-id17="' + price_amount + '" data-id18="' + price_amount2 + '" data-id19="' + total_amount + '" data-id20="' + total_amount2 + '" data-id21="' + trano + '" data-id22="' + product_name + '" data-id23="' + description + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                                '<input type="hidden" name="var_trano[]" value="' + trano + '">' +
                                '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                                '<input type="hidden" name="var_product_name[]" value="' + product_name + '">' +
                                '<input type="hidden" name="var_uom[]" value="' + qty_amount2 + '">' +
                                '<input type="hidden" name="var_price_amount[]" value="' + price_amount + '">' +
                                '<input type="hidden" name="var_qty_amount[]" value="' + qty_amount + '">' +
                                '<input type="hidden" name="var_total_amount[]" value="' + total_amount + '">' +
                                '<input type="hidden" name="var_description[]" id="var_description[]" value="' + description + '">' +
                                '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + product_name + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + qty_amount2 + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + qty_amount + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + price_amount + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + total_amount + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + description + '</td>' +
                                '</tr>';

                            $('table.tableAmountDueto tbody').append(html);
                            // }
                            // if (total_expense !== "") {
                            var html2 = '<tr>' +
                                '<td style="border:1px solid #e9ecef;width:7%;">' +
                                '&nbsp;&nbsp;<button type="button" class="btn btn-xs remove_expense" data-id1="' + product_id + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                                '&nbsp;<button type="button" class="btn btn-xs edit_expense" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + arf_date + '" data-id3="' + total_arf + '" data-id4="' + total_arf2 + '" data-id5="' + total_asf + '" data-id6="' + total_asf2 + '" data-id7="' + balance + '" data-id8="' + balance2 + '" data-id9="' + qty_expense + '" data-id10="' + qty_expense2 + '" data-id11="' + price_expense + '" data-id12="' + price_expense2 + '" data-id13="' + total_expense + '" data-id14="' + total_expense2 + '" data-id15="' + qty_amount + '" data-id16="' + qty_amount2 + '" data-id17="' + price_amount + '" data-id18="' + price_amount2 + '" data-id19="' + total_amount + '" data-id20="' + total_amount2 + '" data-id21="' + trano + '" data-id22="' + product_name + '" data-id23="' + description + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                                '<input type="hidden" id="var_tranox" name="var_trano[]" value="' + trano + '">' +
                                '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                                '<input type="hidden" name="var_product_name[]" value="' + product_name + '">' +
                                '<input type="hidden" name="var_uom[]" value="' + qty_expense2 + '">' +
                                '<input type="hidden" name="var_price_expense[]" value="' + price_expense + '">' +
                                '<input type="hidden" name="var_qty_expense[]" value="' + qty_expense + '">' +
                                '<input type="hidden" name="var_total_expense[]" value="' + total_expense + '">' +
                                '<input type="hidden" name="var_description[]" value="' + description + '">' +
                                '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + product_id + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + product_name + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + qty_expense2 + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + qty_expense + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + price_expense + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + total_expense + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + description + '</td>' +
                                '</tr>';

                            $('table.tableExpenseClaim tbody').append(html2);
                            // }

                            $("#statusEditAsf").val("No");
                            $("#expenseCompanyCart").show();
                            $("#SaveAsfList").prop("disabled", false);


                            $("body").on("click", ".remove_amount", function() {
                                $(this).closest("tr").remove();

                                var ProductId = $(this).data("id1");
                                $.ajax({
                                    type: "POST",
                                    url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement2") !!}?putProductId=' + ProductId,
                                });
                            });

                            $("body").on("click", ".edit_amount", function() {
                                var $this = $(this);

                                var ProductId = $(this).data("id1");
                                $.ajax({
                                    type: "POST",
                                    url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement2") !!}?putProductId=' + ProductId,
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
                                var id21 = $this.data("id21");
                                var id22 = $this.data("id22");
                                var id23 = $this.data("id23");

                                $("#productIdHide").val(id1);
                                $("#nameMaterialHide").val(id22);
                                $("#descriptionHide").val(id23);
                                $("#arf_number").val(id21);
                                $("#arf_date").val(id2);
                                $('#total_arf').val(id3);
                                $("#total_arf2").val(id4);
                                $("#total_asf").val(id5);
                                $("#total_asf2").val(id6);
                                $("#balance").val(id7.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
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
                                $("#statusEditAsf").val("Yes");

                                $("put_qty_expense").val(id9);
                                $("put_price_expense").val(id11);
                                $("put_qty_amount").val(id15);
                                $("put_price_amount").val(id17);


                                $(this).closest("tr").remove();
                            });

                            $("body").on("click", ".remove_expense", function() {
                                $(this).closest("tr").remove();

                                var ProductId = $(this).data("id1");
                                $.ajax({
                                    type: "POST",
                                    url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement2") !!}?putProductId=' + ProductId,
                                });

                            });

                            $("body").on("click", ".edit_expense", function() {
                                var $this = $(this);

                                var ProductId = $(this).data("id1");
                                $.ajax({
                                    type: "POST",
                                    url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement2") !!}?putProductId=' + ProductId,
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
                                var id21 = $this.data("id21");
                                var id22 = $this.data("id22");
                                var id23 = $this.data("id23");

                                $("#productIdHide").val(id1);
                                $("#nameMaterialHide").val(id22);
                                $("#descriptionHide").val(id23);
                                $("#arf_number").val(id21);
                                $("#arf_date").val(id2);
                                $('#total_arf').val(id3);
                                $("#total_arf2").val(id4);
                                $("#total_asf").val(id5);
                                $("#total_asf2").val(id6);
                                $("#balance").val(id7.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
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
                                $("#statusEditAsf").val("Yes");

                                $("put_qty_expense").val(id9);
                                $("put_price_expense").val(id11);
                                $("put_qty_amount").val(id15);
                                $("put_price_amount").val(id17);

                                $(this).closest("tr").remove();
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
                            $("#tableShowHideArfDetail").find("input,button,textarea,select").attr("disabled", false);

                            $("#qty_expense").css("border", "1px solid #ced4da");
                            $("#price_expense").css("border", "1px solid #ced4da");
                            $("#qty_amount").css("border", "1px solid #ced4da");
                            $("#price_amount").css("border", "1px solid #ced4da");

                        } else {
                            Swal.fire("Cancelled", "Please use edit to update this item !", "error");
                        }
                    },
                });
            } else {
                Swal.fire("Error !", "Request over budget", "error");
            }
        }
    }
</script>


<script type="text/javascript">
    //GET ASF LIST 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var var_recordID = $("#var_recordID").val();

    $.ajax({
        type: "GET",
        url: '{!! route("AdvanceSettlement.AdvanceSettlementListCartRevision") !!}?var_recordID=' + var_recordID,
        success: function(data) {
            $.each(data, function(key, value) {
                var html = '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:7%;">' +
                    '&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs edit_amount" data-dismiss="modal" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                    '<input type="hidden" name="var_trano[]" value="' + value.product_RefID + '">' +
                    '<input type="hidden" name="var_product_id[]" value="' + value.product_RefID + '">' +
                    '<input type="hidden" name="var_product_name[]" value="' + value.productName + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + value.quantityUnitName + '">' +
                    '<input type="hidden" name="var_price_amount[]" value="' + value.productUnitPriceCurrencyValue + '">' +
                    '<input type="hidden" name="var_qty_amount[]" value="' + value.quantity + '">' +
                    '<input type="hidden" name="var_total_amount[]" value="' + value.priceBaseCurrencyValue + '">' +
                    '<input type="hidden" name="var_description[]" id="var_description[]" value="' + value.remarks + '">' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.remarks + '</td>' +
                    '</tr>';

                $('table.tableAmountDueto tbody').append(html);

                var html2 = '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:7%;">' +
                    '&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs edit_expense" data-dismiss="modal" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                    '<input type="hidden" id="var_tranox" name="var_trano[]" value="' + value.product_RefID + '">' +
                    '<input type="hidden" name="var_product_id[]" value="' + value.product_RefID + '">' +
                    '<input type="hidden" name="var_product_name[]" value="' + value.productName + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + value.quantityUnitName + '">' +
                    '<input type="hidden" name="var_price_expense[]" value="' + value.productUnitPriceCurrencyValue + '">' +
                    '<input type="hidden" name="var_qty_expense[]" value="' + value.quantity + '">' +
                    '<input type="hidden" name="var_total_expense[]" value="' + value.priceBaseCurrencyValue + '">' +
                    '<input type="hidden" name="var_description[]" value="' + value.remarks + '">' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.remarks + '</td>' +
                    '</tr>';

                $('table.tableExpenseClaim tbody').append(html2);
            });

            $("#statusEditAsf").val("No");
            $("#expenseCompanyCart").show();
            $("#SaveAsfList").prop("disabled", false);


            $("body").on("click", ".remove_amount", function() {
                $(this).closest("tr").remove();

                var ProductId = $(this).data("id1");
                $.ajax({
                    type: "POST",
                    url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement2") !!}?putProductId=' + ProductId,
                });
            });

            $("body").on("click", ".edit_amount", function() {
                var $this = $(this);

                var ProductId = $(this).data("id1");
                $.ajax({
                    type: "POST",
                    url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement2") !!}?putProductId=' + ProductId,
                });

                $("#productIdHide").val($this.data("id1"));
                $("#nameMaterialHide").val($this.data("id22"));
                $("#descriptionHide").val($this.data("id23"));
                $("#arf_number").val($this.data("id21"));
                $("#arf_date").val($this.data("id2"));
                $('#total_arf').val($this.data("id3"));
                $("#total_arf2").val($this.data("id4"));
                $("#total_asf").val($this.data("id5"));
                $("#total_asf2").val($this.data("id6"));
                $("#balance").val($this.data("id7").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#balance2").val($this.data("id8"));
                $("#qty_expense").val($this.data("id9"));
                $("#qty_expense2").val($this.data("id10"));
                $("#price_expense").val($this.data("id11"));
                $("#price_expense2").val($this.data("id12"));
                $("#total_expense").val($this.data("id13"));
                $("#total_expense2").val($this.data("id14"));
                $("#qty_amount").val($this.data("id15"));
                $("#qty_amount2").val($this.data("id16"));
                $("#price_amount").val($this.data("id17"));
                $("#price_amount2").val($this.data("id18"));
                $("#total_amount").val($this.data("id19"));
                $("#total_amount2").val($this.data("id20"));
                $("#statusEditAsf").val("Yes");

                $("#ValidateQuantityExpense").val($this.data("id9"));
                $("#ValidatePriceExpense").val($this.data("id11"));
                $("#ValidateQuantityAmount").val($this.data("id15"));
                $("#ValidatePriceAmount").val($this.data("id17"));


                $(this).closest("tr").remove();
            });

            $("body").on("click", ".remove_expense", function() {
                $(this).closest("tr").remove();

                var ProductId = $(this).data("id1");
                $.ajax({
                    type: "POST",
                    url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement2") !!}?putProductId=' + ProductId,
                });

            });

            $("body").on("click", ".edit_expense", function() {
                var $this = $(this);

                var ProductId = $(this).data("id1");
                $.ajax({
                    type: "POST",
                    url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement2") !!}?putProductId=' + ProductId,
                });

                $("#productIdHide").val($this.data("id1"));
                $("#nameMaterialHide").val($this.data("id22"));
                $("#descriptionHide").val($this.data("id23"));
                $("#arf_number").val($this.data("id21"));
                $("#arf_date").val($this.data("id2"));
                $('#total_arf').val($this.data("id3"));
                $("#total_arf2").val($this.data("id4"));
                $("#total_asf").val($this.data("id5"));
                $("#total_asf2").val($this.data("id6"));
                $("#balance").val($this.data("id7").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#balance2").val($this.data("id8"));
                $("#qty_expense").val($this.data("id9"));
                $("#qty_expense2").val($this.data("id10"));
                $("#price_expense").val($this.data("id11"));
                $("#price_expense2").val($this.data("id12"));
                $("#total_expense").val($this.data("id13"));
                $("#total_expense2").val($this.data("id14"));
                $("#qty_amount").val($this.data("id15"));
                $("#qty_amount2").val($this.data("id16"));
                $("#price_amount").val($this.data("id17"));
                $("#price_amount2").val($this.data("id18"));
                $("#total_amount").val($this.data("id19"));
                $("#total_amount2").val($this.data("id20"));
                $("#statusEditAsf").val("Yes");

                $("#ValidateQuantityExpense").val($this.data("id9"));
                $("#ValidatePriceExpense").val($this.data("id11"));
                $("#ValidateQuantityAmount").val($this.data("id15"));
                $("#ValidatePriceAmount").val($this.data("id17"));

                $(this).closest("tr").remove();
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
            $("#tableShowHideArfDetail").find("input,button,textarea,select").attr("disabled", false);

            $("#qty_expense").css("border", "1px solid #ced4da");
            $("#price_expense").css("border", "1px solid #ced4da");
            $("#qty_amount").css("border", "1px solid #ced4da");
            $("#price_amount").css("border", "1px solid #ced4da");
        }
    });

    //GET ARF DATA

    var var_recordID = $("#var_recordID").val();
    var advance_number = $("#advance_number").val();

    $.ajax({
        type: 'GET',
        url: '{!! route("AdvanceSettlement.AdvanceSettlementListDataById") !!}?var_recordID=' + var_recordID,

        success: function(data) {
            $.each(data, function(key, value) {
                var html =
                    '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:5%;">' +
                    '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs AddToDetailSettlement" data-dismiss="modal" data-id1="' + advance_number + '" data-id2="' + value.quantity + '" data-id3="' + value.productUnitPriceCurrencyValue + '" data-id4="' + value.priceBaseCurrencyValue + '" data-id5="' + value.priceCurrencyISOCode + '" data-id6="' + value.quantityUnitName + '" data-id7="' + value.product_RefID + '" data-id8="' + value.productName + '" data-id9="' + value.remarks + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="18" alt="" title="Add"></button> ' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' +
                    '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + advance_number + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + 'N/A' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.remarks + '</td>' +
                    '</tr>';

                $('table.tableArfDetail tbody').append(html);
            });

            $("body").on("click", ".AddToDetailSettlement", function() {
                $("#tableShowHideArfDetail").find("input,button,textarea,select").attr("disabled", true);
                $("#detailASF").show();

                var $this = $(this);
                $("#arf_number").val($this.data("id1"));
                $("#arf_date").val("23-02-2021");
                $("#qty_expense").val($this.data("id2").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#put_qty_expense").val($this.data("id2"));
                $("#TotalQty").val($this.data("id2"));
                $("#qty_expense2").val($this.data("id6"));
                $("#price_expense").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#put_price_expense").val($this.data("id3"));
                $("#price_expense2").val($this.data("id5"));
                $("#total_expense").val($this.data("id4").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#total_expense2").val($this.data("id5"));
                $("#qty_amount").val("0.00");
                $("#qty_amount2").val($this.data("id6"));
                $("#price_amount").val("0.00");
                $("#price_amount2").val($this.data("id5"));
                $("#total_amount").val("0.00");
                $("#total_amount2").val($this.data("id5"));

                $("#total_arf").val($this.data("id4"));
                $("#total_arf2").val($this.data("id5"));
                $("#total_asf").val("500000");
                $("#total_asf2").val($this.data("id5"));
                $("#balance").val($this.data("id4").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#balance2").val($this.data("id5"));

                $("#productIdHide").val($this.data("id7"));
                $("#nameMaterialHide").val($this.data("id8"));
                $("#descriptionHide").val($this.data("id9"));

            });
        }
    });
</script>
<script>
    $('document').ready(function() {
        $('#qty_expense').keyup(function() {
            var qty_expense = $(this).val();
            var qty_amount = $('#qty_amount').val();
            var price_expense = parseFloat($('#price_expense').val().replace(/,/g, ''));
            var total_expense = qty_expense * price_expense;
            var TotalQty = $('#TotalQty').val();
            var TotalQty2 = +qty_expense + +qty_amount;
            if (qty_expense == '') {
                $('#total_expense').val("");
            } else if (parseFloat(TotalQty2) > parseFloat(TotalQty)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#qty_expense").css("border", "1px solid red");
                $('#qty_expense').val("");
                $('#total_expense').val("");
            } else {
                $("#qty_expense").css("border", "1px solid #ced4da");
                $('#total_expense').val(parseFloat(total_expense).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }
        });

        $('#qty_amount').keyup(function() {
            var qty_amount = $(this).val();
            var qty_expense = $('#qty_expense').val();
            var price_amount = parseFloat($('#price_amount').val().replace(/,/g, ''));
            var total_amount = qty_amount * price_amount;
            var TotalQty = $('#TotalQty').val();
            var TotalQty2 = +qty_expense + +qty_amount;
            if (qty_amount == '') {
                $('#total_amount').val("");
            } else if (parseFloat(TotalQty2) > parseFloat(TotalQty)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#qty_amount").css("border", "1px solid red");
                $('#qty_amount').val("");
                $('#total_amount').val("");
            } else {
                $("#qty_amount").css("border", "1px solid #ced4da");
                $('#total_amount').val(parseFloat(total_amount).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }
        });

        $('#price_expense').keyup(function() {
            var price_expense = $(this).val();
            var qty_expense = $('#qty_expense').val();
            var put_price_expense = $('#put_price_expense').val();
            var total_expense = price_expense * qty_expense;

            if (price_expense == '') {
                $('#total_expense').val("");
            } else if (parseFloat(price_expense) > parseFloat(put_price_expense)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#price_expense").css("border", "1px solid red");
                $('#price_expense').val("");
                $('#total_expense').val("");
            } else {
                $("#price_expense").css("border", "1px solid #ced4da");
                $('#total_expense').val(parseFloat(total_expense).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }
        });

        $('#price_amount').keyup(function() {
            var price_amount = $(this).val();
            var qty_amount = $('#qty_amount').val();
            var put_price_expense = $('#put_price_expense').val();
            var total_amount = price_amount * qty_amount;
            if (price_amount == '') {
                $('#total_amount').val("");
            } else if (parseFloat(price_amount) > parseFloat(put_price_expense)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#price_amount").css("border", "1px solid red");
                $('#price_amount').val("");
                $('#total_amount').val("");
            } else {
                $("#price_amount").css("border", "1px solid #ced4da");
                $('#total_amount').val(parseFloat(total_amount).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
            }
        });
    });
</script>


<script>
    $(function() {
        $("#FormStoreAdvanceSettlementRevision").on("submit", function(e) {
            e.preventDefault();
            var valRemark = $("#remark").val();
            $("#remark").css("border", "1px solid #ced4da");
            if (valRemark === "") {
                $("#remark").focus();
                $("#remark").attr('required', true);
                $("#remark").css("border", "1px solid red");
            } else {
                var action = $(this).attr("action");
                var method = $(this).attr("method");
                var form_data = new FormData($(this)[0]);
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
                                if (response.status) {

                                    $("#loading").hide();
                                    $(".loader").hide();

                                    swalWithBootstrapButtons.fire(
                                        'Succesful ',
                                        'Data has been updated',
                                        'success'
                                    )

                                    window.location.href = '/AdvanceRequest?var=1';
                                }
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

<script type="text/javascript">
    function CancelAdvanceSettlement() {
        $("#loading").show();
        $(".loader").show();
        location.reload();
    }
</script>