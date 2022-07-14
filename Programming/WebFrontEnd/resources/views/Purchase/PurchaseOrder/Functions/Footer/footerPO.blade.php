<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".detailPO").hide();
        $("#addAsfListCart").prop("disabled", true);
        $("#saveAsfList").prop("disabled", true);
        $("#ManagerNameId").prop("disabled", true);
        $("#CurrencyId").prop("disabled", true);
        $("#FinanceId").prop("disabled", true);
        // $("#advance_number2").prop("disabled", true);
        $("#showContentBOQ2").hide();
        $("#tableShowHideBOQ2").hide();

        $("#amountCompanyCart").hide();
        $("#expenseCompanyCart").hide();
    });
</script>
<script>
    $(function() {
        $(".klikSearchArf").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            $("#advance_number").val($this.data("id1"));
            $("#hideProjectId").val($this.data("id2"));
            $("#hideProjectName").val($this.data("id3"));
            $("#hideSiteCode").val($this.data("id4"));
            $("#hideSiteName").val($this.data("id5"));
            //Batas
            $("#advance_number").prop("disabled", true);
            // $("#projectCode").val("Q000055");
            // $("#supplierCode").val("Supplier Code 1");
            // $("#suppliername").val("Supplier Name 1");
            $("#projectCode").val("Q000055");
            $("#invoice").val("Pt Qdc Technologies");
            $("#oob").val("Project");
            $("#currencyCode").val("IDR");
            $("#total").val("100000");
            $("#exchange").val("0");
            $("#totalDetail").val("Rp");
            $("#advance_number").prop("disabled", true);
            $("#requester").val("requester 1");
            $("#managerAsfUid").val("Manager 1");
            $("#managerAsfName").val("Manager Detail 1");
            $("#currency").val("IDR");
            $("#currencyCode").val("IDR");
            $("#financeArfUtableBudgetBrfid").val("finance 1");
            $("#financeArfName").val("Finance Detail 1");
            $("#total").val("100000");
            $("#totalDetail").val("Rp");
            //End batas
            
            var trano = $("#advance_number").val();
            var product_id = "PRO-0001";
            var budget_code = "Budget Code 1";
            var budget_name = "Budget Name 1";
            var work_id = "Work Code 1";
            var work_name = "Work Name 1";
            var product_name = "Besi";
            var uom = "LS";
            var price = "1,000,000";
            var qty_budget= "5";
            var qty_available= "3";
            var total = "5,000,000";
            var currency = "IDR";
            var description = "Test 1";
            $("#productIdHide").val(product_id);
            $("#nameMaterialHide").val(product_name);
            $("#uomHide").val(uom);
            $("#descriptionHide").val(description);
            var html = '<tr>'+
                            '<td>'+'<center><a class="btn btn-outline-success btn-rounded btn-sm my-0 addToDetailSettlement" style="border-radius: 100px;"><i class="fa fa-plus"></i></a></center>'+'</td>'+
                            '<td>'+trano+'</td>'+
                            '<td>'+budget_code+'</td>'+
                            '<td>'+budget_name+'</td>'+
                            '<td>'+work_id+'</td>'+
                            '<td>'+work_name+'</td>'+
                            '<td>'+product_id+'</td>'+
                            '<td>'+product_name+'</td>'+
                            '<td>'+qty_budget+'</td>'+
                            '<td>'+qty_available+'</td>'+
                            '<td>'+price+'</td>'+
                            '<td>'+total+'</td>'+
                            '<td>'+uom+'</td>'+
                            '<td>'+currency+'</td>'+
                        '</tr>';
            $('table.tablePRDetail tbody').append(html);
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $("body").on("click", ".addToDetailSettlement", function() {
            $("#addAsfListCart").prop("disabled", false);
            $(".detailASF").show();
            $("#arf_number").val($('#advance_number').val());
            $("#product_id").val("PRO-0001");
            $("#product_name").val("Besi");
            $("#balance").val('3,000,000');
            $("#uom").val('LS');
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".cancelDetailPO").click(function() {
            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);
            
            $("#arf_number").val("");
            $("#product_id").val("");
            $("#product_name").val("");
            $("#balance").val("0");
            $("#uom").val("");
            $("#qtyCek").val("0");
            $("#priceCek").val("0");
            $("#totalPO").val("0");
            
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

<script type="text/javascript">
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $(document).ready(function () {
        $('#addPOListCart').click(function(ev){
            ev.preventDefault();
            ev.stopPropagation();
            $.ajax({
                type: "POST",
                url: '{!! route("PO.StoreValidatePO") !!}?putProductName=' + $('#putProductName').val(),
                success: function(data) {

                    if(data == "200"){
                        var product_id = $("#putProductId").val();
                        var putProductName = $("#putProductName").val();
                        var qtyCek = $('#qtyCek').val();
                        var putUom = $("#putUom").val();
                        var priceCek = $("#priceCek").val().replace(/[^a-zA-Z0-9 ]/g, "");
                        var putCurrency = $("#putCurrency").val();
                        var totalArfDetails = $("#totalArfDetails").val().replace(/[^a-zA-Z0-9 ]/g, "");
                        var putRemark = $("#putRemark").val();
                        var totalBalance = $("#totalBalance").val();
                        var putPrice = $('#putPrice').val();
                        var status = $("#status").val();
                        var html = '<tr>'+
                                    '<td>'+
                                        '<button type="button" class="btn btn-danger btn-xs remove" data-id1="'+putProductName+'"><i class="fa fa-trash"></i></button> '+
                                        '<button type="button" class="btn btn-warning btn-xs edit" data-dismiss="modal" data-id1="'+product_id+'" data-id2="'+putProductName+'" data-id3="'+qtyCek+'" data-id4="'+putUom+'" data-id5="'+priceCek+'" data-id6="'+putCurrency+'" data-id7="'+totalArfDetails+'" data-id8="'+putRemark+'" data-id9="'+totalBalance+'" data-id10="'+status+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                                    '</td>'+
                                    '<td>'+product_id+'</td>'+
                                    '<td>'+putProductName+'</td>'+
                                    '<td>'+qtyCek+'</td>'+
                                    '<td>'+putUom+'</td>'+
                                    '<td>'+priceCek+'</td>'+
                                    '<td>'+(priceCek * qtyCek)+'</td>'+
                                    '<td>'+putCurrency+'</td>'+
                                    '<td>'+putRemark+'</td>'+
                                '</tr>';
                        $('table.tablePR tbody').append(html);

                        $("body").on("click", ".remove", function () {
                            $(this).closest("tr").remove();
                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("PO.StoreValidatePO2") !!}?putProductName=' + ProductId,
                            });
                        });
                        $("body").on("click", ".edit", function () {
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

                            $.ajax({
                                type: "POST",
                                url: '{!! route("PO.StoreValidatePO2") !!}?putProductName=' + id2,
                            });

                            $("#putProductId").val(id1);
                            $("#putProductName").val(id2);
                            $('#qtyCek').val(id3);
                            $("#putUom").val(id4);
                            $("#priceCek").val(id5);
                            $("#putCurrency").val(id6);
                            $("#totalArfDetails").val(id7);
                            $("#putRemark").val(id8);
                            $("#totalBalance").val(id9);

                            $(this).closest("tr").remove();

                            if(id10 == "Unspecified Product"){
                                $("#product_id2").prop("disabled", false);
                            }
                            else{
                                $("#product_id2").prop("disabled", true);
                            }
                        });

                        $("#putProductId").css("border", "1px solid #ced4da");
                        $("#putProductName").css("border", "1px solid #ced4da");
                        $("#putRemark").css("border", "1px solid #ced4da");
                        $("#qtyCek").css    ("border", "1px solid #ced4da");
                        $("#putUom").css    ("border", "1px solid #ced4da");

                        $("#putProductId").val("");
                        $("#putProductName").val("");
                        $("#qtyCek").val("0");
                        $("#putUom").val("");
                        $("#priceCek").val("0");
                        // $("#putCurrency").val("");
                        $("#putRemark").val("");
                        $("#totalArfDetails").val("");
                        $("#totalRequester").val("0");
                        $("#totalQtyRequest").val("0");
                        $("#totalBalance").val("0");

                        $("#iconProductId").hide();
                        $("#iconQty").hide();
                        $("#iconRemark").hide();
                        $("#iconProductId2").hide();
                        $("#iconQty2").hide();
                        $("#iconRemark2").hide();

                        $("#savePRList").prop("disabled", false);
                        $("#submitPR").prop("disabled", false);

                        $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
                        $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);
                        $("#detailPRList").show();
                    }
                    else{
                        Swal.fire("Cancelled", "Data is Available", "error");
                    }
                },
                
            });
        });
    });
</script>
<script>
    $('#addPOListCart').click(function() {

        var balance = $('#balance').val();
        var price = $('#price').val();
        var ppn_value = $('#total_value').val();
        var totalrequest = +total * +qty;
        
        if (totalrequest <= balance) {

            $.ajax({
                type: "POST",
                url: '{!! route("PO.StoreValidatePO") !!}?putProductName=' + $("#nameMaterialHide").val(),
                success: function(data) {
                
                    if(data == "200"){

                        var product_id =  $("#productIdHide").val();
                        var product_name =  $("#nameMaterialHide").val();
                        // var uom =  $("#uomHide").val();
                        var trano = $('#arf_number').val();
                        // var arf_date = $('#arf_date').val();
                        // var total_arf = $('#total_arf').val();
                        // var total_arf2 = $('#total_arf2').val();
                        // var total_asf = $('#total_asf').val();
                        // var total_asf2 = $('#total_asf2').val();
                        // var balance = $('#balance').val();
                        // var balance2 = $('#balance2').val();
                        // var qty_expense =  $('#qty_expense').val();
                        // var qty_expense2 =  $('#qty_expense2').val();
                        // var price_expense =  $('#price_expense').val();
                        // var price_expense2 =  $('#price_expense2').val();
                        // var total_expense =  $('#total_expense').val();
                        // var total_expense2 =  $('#total_expense2').val();
                        // var qty_amount =  $('#qty_amount').val();
                        // var qty_amount2 =  $('#qty_amount2').val();
                        // var price_amount =  $('#price_amount').val();
                        // var price_amount2 =  $('#price_amount2').val();
                        // var total_amount =  $('#total_amount').val();
                        // var total_amount2 =  $('#total_amount2').val();
                        // var description =  $("#descriptionHide").val();

                        var html = '<tr>'+
                                        '<td>'+
                                            '<button type="button" class="btn btn-danger btn-xs remove_amount" data-id1="'+product_name+'"><i class="fa fa-trash"></i></button> '+
                                            '<button type="button" class="btn btn-warning btn-xs edit_amount" data-dismiss="modal" data-id1="'+product_name+'" data-id2="'+arf_date+'" data-id3="'+total_arf+'" data-id4="'+total_arf2+'" data-id5="'+total_asf+'" data-id6="'+total_asf2+'" data-id7="'+balance+'" data-id8="'+balance2+'" data-id9="'+qty_expense+'" data-id10="'+qty_expense2+'" data-id11="'+price_expense+'" data-id12="'+price_expense2+'" data-id13="'+total_expense+'" data-id14="'+total_expense2+'" data-id15="'+qty_amount+'" data-id16="'+qty_amount2+'" data-id17="'+price_amount+'" data-id18="'+price_amount2+'" data-id19="'+total_amount+'" data-id20="'+total_amount2+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                                            '<input type="hidden" name="var_trano[]" value="'+trano+'">'+
                                            '<input type="hidden" name="var_product_id[]" value="'+product_id+'">'+
                                            '<input type="hidden" name="var_product_name[]" value="'+product_name+'">'+
                                            // '<input type="hidden" name="var_uom[]" value="'+uom+'">'+
                                            // '<input type="hidden" name="var_price_amount[]" value="'+price_amount+'">'+
                                            // '<input type="hidden" name="var_qty_amount[]" value="'+qty_amount+'">'+
                                            // '<input type="hidden" name="var_total_amount[]" value="'+total_amount+'">'+
                                            // '<input type="hidden" name="var_description[]" id="var_description[]" value="'+description+'">'+
                                        '</td>'+
                                        '<td>'+trano+'</td>'+
                                        '<td>'+product_id+'</td>'+
                                        '<td>'+product_name+'</td>'+
                                        // '<td>'+uom+'</td>'+
                                        // '<td>'+qty_amount+'</td>'+
                                        // '<td>'+price_amount+'</td>'+
                                        // '<td>'+total_amount+'</td>'+
                                        // '<td>'+description+'</td>'+
                                    '</tr>';
                            
                        $('table.tableAmountDueto tbody').append(html);

                        var html2 = '<tr>'+
                                        '<td>'+
                                            '<button type="button" class="btn btn-danger btn-xs remove_expense" data-id1="'+product_name+'"><i class="fa fa-trash"></i></button> '+
                                            '<button type="button" class="btn btn-warning btn-xs edit_expense" data-dismiss="modal" data-id1="'+product_name+'" data-id2="'+arf_date+'" data-id3="'+total_arf+'" data-id4="'+total_arf2+'" data-id5="'+total_asf+'" data-id6="'+total_asf2+'" data-id7="'+balance+'" data-id8="'+balance2+'" data-id9="'+qty_expense+'" data-id10="'+qty_expense2+'" data-id11="'+price_expense+'" data-id12="'+price_expense2+'" data-id13="'+total_expense+'" data-id14="'+total_expense2+'" data-id15="'+qty_amount+'" data-id16="'+qty_amount2+'" data-id17="'+price_amount+'" data-id18="'+price_amount2+'" data-id19="'+total_amount+'" data-id20="'+total_amount2+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                                            '<input type="hidden" id="var_tranox" name="var_trano[]" value="'+trano+'">'+
                                            '<input type="hidden" name="var_product_id[]" value="'+product_id+'">'+
                                            '<input type="hidden" name="var_product_name[]" value="'+product_name+'">'+
                                            // '<input type="hidden" name="var_uom[]" value="'+uom+'">'+
                                            // '<input type="hidden" name="var_price_expense[]" value="'+price_expense+'">'+
                                            // '<input type="hidden" name="var_qty_expense[]" value="'+qty_expense+'">'+
                                            // '<input type="hidden" name="var_total_expense[]" value="'+total_expense+'">'+
                                            // '<input type="hidden" name="var_description[]" value="'+description+'">'+
                                        '</td>'+
                                        '<td>'+trano+'</td>'+
                                        '<td>'+product_id+'</td>'+
                                        '<td>'+product_name+'</td>'+
                                        // '<td>'+uom+'</td>'+
                                        // '<td>'+qty_expense+'</td>'+
                                        // '<td>'+price_expense+'</td>'+
                                        // '<td>'+total_expense+'</td>'+
                                        // '<td>'+description+'</td>'+
                                    '</tr>';
                                
                        $('table.tableExpenseClaim tbody').append(html2);
                        $("#expenseCompanyCart").show();
                        $("#saveAsfList").prop("disabled", false);

                        $("body").on("click", ".remove_amount", function() {
                            $(this).closest("tr").remove();

                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("PO.StoreValidatePO2") !!}?putProductName=' + ProductId,
                            });
                        });

                        $("body").on("click", ".edit_amount", function () {
                            var $this = $(this);

                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("PO.StoreValidatePO2") !!}?putProductName=' + ProductId,
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
                                url: '{!! route("PO.StoreValidatePO2") !!}?putProductName=' + ProductId,
                            });
                            
                        });

                        $("body").on("click", ".edit_expense", function () {
                            var $this = $(this);

                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("PO.StoreValidatePO2") !!}?putProductName=' + ProductId,
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

<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {
            var qtyReq = $(this).val();
            if (qtyReq == 0 || qtyReq == '') {
                qtyReq = 0;
            }
            var putQty = $('#putQty').val();
            var priceCek = $('#priceCek').val();
            var total = putQty * priceCek;
            var total2 = qtyReq * priceCek;
            var balance = qty_available * price;
            if (parseFloat(qtyReq) == '') {
                $("#addFromDetailtoCart").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
                $('#priceCek').val(0);

            } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Qty Request is Over", "error");
                $("#qtyCek").val(0);
                $('#totalArfDetails').val(0);
                $("#addFromDetailtoCart").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
            } else if (parseFloat(total2) > parseFloat(total)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $('#totalArfDetails').val(0);
                $("#addFromDetailtoCart").prop("disabled", true);
            } else {
                var totalReq = parseFloat(total2);
                $('#totalPO').val(parseFloat(totalReq).toFixed(2));
                $("#addFromDetailtoCart").prop("disabled", false);
            // }
        });
    });
</script>

<script>
    $('document').ready(function() {
        $('.ChangePrice').keyup(function() {

            var priceReq = $(this).val();
                if (priceReq == 0 || priceReq == '') {
                    priceReq = 0;
                }

            var qtyCek = $('#qtyCek').val();
            var putPrice = $('#putPrice').val();

            var total = qtyCek * priceReq;
            var total2 = qtyCek * putPrice;
            // var totalBalance = $("#totalBalance").val();

            // if (priceReq == '') {
            //     $("#addFromDetailtoCart").prop("disabled", true);
            //     $('#totalArfDetails').val(0);

            // } else if (parseFloat(total) > parseFloat(total2)) {
            //     Swal.fire("Error !", "Your Request Is Over Budget", "error");
            //     $("#priceCek").val(0);
            //     $('#totalArfDetails').val(0);
            //     $("#addFromDetailtoCart").prop("disabled", true);
            // } else {
                var totalReq = total;
                $('#totalPO').val(parseFloat(totalReq).toFixed(2));
                $("#addFromDetailtoCart").prop("disabled", false);
            // }

        });
    });
</script>
