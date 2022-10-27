<script type="text/javascript">
    $(document).ready(function() {
        $(".DetailBsf").hide();
        $("#detailBrfList").hide();
        // $("#butto.DetailBsf").prop("disabled", true);
        $("#saveBsf").prop("disabled", true);
        $("#ManagerNameId").prop("disabled", true);
        $("#CurrencyId").prop("disabled", true);
        $("#FinanceId").prop("disabled", true);
        $("#brf_number2").prop("disabled", true);
        $("#amountCompanyCart").hide();
        $("#expenseCompanyCart").hide();
        $("#tableShowHideBrfDetail").hide();
    });
</script>

<script>
    function klikProject(code, name) {
        $("#projectcode").val(code);
        $("#projectname").val(name);
        $("#brf_number2").prop("disabled", false);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("BusinessTripSettlement.BusinessTripRequestByBudgetID") !!}?projectcode=' + $('#projectcode').val(),
            success: function(data) {

                var no = 1;
                t = $('#TableSearchBrfInBsf').DataTable();
                $.each(data.DataAdvanceRequest, function(key, val) {
                    t.row.add([
                        '<tbody><tr><td>' + no++ + '</td>',
                        '<td><span data-dismiss="modal" onclick="klikBrfNumberInBsf(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.documentNumber + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikBrfNumberInBsf(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.documentNumber + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikBrfNumberInBsf(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudget_RefID + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikBrfNumberInBsf(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudgetName + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikBrfNumberInBsf(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudgetSection_RefID + '</span></td>',
                        '<td><span data-dismiss="modal" onclick="klikBrfNumberInBsf(\'' + val.sys_ID + '\', \'' + val.documentNumber + '\', \'' + val.requesterWorkerJobsPosition_RefID + '\', \'' + val.requesterWorkerName + '\');">' + val.combinedBudgetSectionName + '</span></td>',
                    ]).draw();

                });
            }
        });
    }
</script>


<script>
    function klikBrfNumberInBsf(id, docNum, reqId, reqName) {
        var advance_RefID = id;
        var brf_number = docNum;
        var requester_RefID = reqId;
        var requester_name = reqName;
        $("#brf_number").val(docNum);
        $("#tableShowHideBrfDetail").show();
        $("#projectcode2").prop("disabled", true);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '{!! route("BusinessTripSettlement.StoreValidateBusinessTripSettlementRequester") !!}?requester_id=' + requester_RefID + '&requester_name=' + requester_name + '&requester_id2=' + $('#requester_id').val() + '&advance_RefID=' + advance_RefID,
            success: function(data) {
                if (data.status == "200") {

                    $("#requester_id").val(data.requester_id);
                    $("#requester_name").val(data.requester_name);

                    $.each(data.DataAdvanceList, function(key, value) {
                        var html =
                            '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:5%;">' +
                            '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs AddToDetailSettlement" data-dismiss="modal" data-id1="' + brf_number + '" data-id2="' + value.quantity + '" data-id3="' + value.productUnitPriceCurrencyValue + '" data-id4="' + value.priceBaseCurrencyValue + '" data-id5="' + value.priceCurrencyISOCode + '" data-id6="' + value.quantityUnitName + '" data-id7="' + value.product_RefID + '" data-id8="' + value.productName + '" data-id9="' + value.remarks + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="18" alt="" title="Add"></button> ' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' +
                            '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + brf_number + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.combinedBudget_SubSectionLevel1_RefID + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.combinedBudget_SubSectionLevel1Name + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.productUnitPriceCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + value.remarks + '</td>' +
                            '</tr>';

                        $('table.TableBrfDetail tbody').append(html);
                    });

                    $("body").on("click", ".AddToDetailSettlement", function() {
                        $(".DetailBsf").show();

                        var $this = $(this);
                        $("#brf_number_detail").val($this.data("id1"));
                        $("#brf_date").val("23-02-2021");
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

                        $("#total_brf").val($this.data("id4"));
                        $("#total_brf2").val($this.data("id5"));
                        $("#total_bsf").val("500000");
                        $("#total_bsf2").val($this.data("id5"));
                        $("#balance").val($this.data("id4").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        $("#balance2").val($this.data("id5"));

                        $("#productIdHide").val($this.data("id7"));
                        $("#nameMaterialHide").val($this.data("id8"));
                        $("#descriptionHide").val($this.data("id9"));

                    });
                } else if (data.status == "501") {
                    Swal.fire("Cancelled", "You have chosen this number !", "error");
                } else {
                    Swal.fire("Cancelled", "Please use same requester !", "error");
                }
            },
        });
    }
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addFromDetailtoCartJs() {

        var VarBrfNumber = $("#brf_number").val();
        $("#brf_number").css("border", "1px solid #ced4da");

        if (VarBrfNumber === "") {
            $("#brf_number").focus();
            $("#brf_number").attr('required', true);
            $("#brf_number").css("border", "1px solid red");
        } else {
            var balance = parseFloat($('#balance').val().replace(/,/g, ''));
            var productIdHide = $('#productIdHide').val();
            var total_expense = parseFloat($('#total_expense').val().replace(/,/g, ''));
            var total_amount = parseFloat($('#total_amount').val().replace(/,/g, ''));
            var totalExpenseAmount = +total_expense + +total_amount;
            if (totalExpenseAmount <= balance) {
                $.ajax({
                    type: "POST",
                    url: '{!! route("AdvanceSettlement.StoreValidateAdvanceSettlement") !!}?putProductId=' + $("#productIdHide").val(),
                    success: function(data) {
                        if (data == "200") {

                            var product_id = $("#productIdHide").val();
                            var product_name = $("#nameMaterialHide").val();
                            var trano = $('#brf_number').val();
                            var brf_date = $('#brf_date').val();
                            var total_brf = $('#total_brf').val();
                            var total_brf2 = $('#total_brf2').val();
                            var total_bsf = $('#total_bsf').val();
                            var total_bsf2 = $('#total_bsf2').val();
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
                                '&nbsp;<button type="button" class="btn btn-xs edit_amount" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + brf_date + '" data-id3="' + total_brf + '" data-id4="' + total_brf2 + '" data-id5="' + total_bsf + '" data-id6="' + total_bsf2 + '" data-id7="' + balance + '" data-id8="' + balance2 + '" data-id9="' + qty_expense + '" data-id10="' + qty_expense2 + '" data-id11="' + price_expense + '" data-id12="' + price_expense2 + '" data-id13="' + total_expense + '" data-id14="' + total_expense2 + '" data-id15="' + qty_amount + '" data-id16="' + qty_amount2 + '" data-id17="' + price_amount + '" data-id18="' + price_amount2 + '" data-id19="' + total_amount + '" data-id20="' + total_amount2 + '" data-id21="' + trano + '" data-id22="' + product_name + '" data-id23="' + description + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
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
                                '&nbsp;<button type="button" class="btn btn-xs edit_expense" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + brf_date + '" data-id3="' + total_brf + '" data-id4="' + total_brf2 + '" data-id5="' + total_bsf + '" data-id6="' + total_bsf2 + '" data-id7="' + balance + '" data-id8="' + balance2 + '" data-id9="' + qty_expense + '" data-id10="' + qty_expense2 + '" data-id11="' + price_expense + '" data-id12="' + price_expense2 + '" data-id13="' + total_expense + '" data-id14="' + total_expense2 + '" data-id15="' + qty_amount + '" data-id16="' + qty_amount2 + '" data-id17="' + price_amount + '" data-id18="' + price_amount2 + '" data-id19="' + total_amount + '" data-id20="' + total_amount2 + '" data-id21="' + trano + '" data-id22="' + product_name + '" data-id23="' + description + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
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

                            $("#statusEditBsf").val("No");
                            $("#expenseCompanyCart").show();
                            $("#SaveBsfList").prop("disabled", false);


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
                                $("#brf_number").val($this.data("id21"));
                                $("#brf_date").val($this.data("id2"));
                                $('#total_brf').val($this.data("id3"));
                                $("#total_brf2").val($this.data("id4"));
                                $("#total_bsf").val($this.data("id5"));
                                $("#total_bsf2").val($this.data("id6"));
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
                                $("#statusEditBsf").val("Yes");

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
                                $("#brf_number").val($this.data("id21"));
                                $("#brf_date").val($this.data("id2"));
                                $('#total_brf').val($this.data("id3"));
                                $("#total_brf2").val($this.data("id4"));
                                $("#total_bsf").val($this.data("id5"));
                                $("#total_bsf2").val($this.data("id6"));
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
                                $("#statusEditBsf").val("Yes");

                                $("#ValidateQuantityExpense").val($this.data("id9"));
                                $("#ValidatePriceExpense").val($this.data("id11"));
                                $("#ValidateQuantityAmount").val($this.data("id15"));
                                $("#ValidatePriceAmount").val($this.data("id17"));

                                $(this).closest("tr").remove();
                            });

                            $("#brf_number").val("");
                            $("#brf_date").val("");
                            $("#total_brf").val("");
                            $("#total_brf2").val("");
                            $("#priceCek").val("");
                            $("#total_bsf").val("");
                            $("#total_bsf2").val("");
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
                            $("#tableShowHidebrfDetail").find("input,button,textarea,select").attr("disabled", false);

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


<!-- 
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

    $('#addBsfListCart').click(function() {
      
        var balance = $('#balance').val();
        var total_expense = $('#total_expense').val();
        var total_amount = $('#total_amount').val();
        var totalExpenseAmount = +total_expense + +total_amount;

        if (totalExpenseAmount <= balance) {

          var trano = $('#tranoHide').val();
          var product_id =  $("#productIdHide").val();
          var product_name =  $("#productNameHide").val();
          var uom =  $("#uomHide").val();
          var brf_date = $('#brf_date').val();
          var total_brf = $('#total_brf').val();
          var total_brf2 = $('#total_brf2').val();
          var total_bsf = $('#total_bsf').val();
          var total_bsf2 = $('#total_bsf2').val();
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
          var description =  "cek";

          var html = '<tr>'+
                          '<td>'+
                              '<button type="button" class="btn btn-danger btn-xs remove_amount" data-id="1"><i class="fa fa-trash"></i></button> '+
                              '<button type="button" class="btn btn-warning btn-xs edit_amount" data-dismiss="modal" data-id1="'+trano+'" data-id2="'+brf_date+'" data-id3="'+total_brf+'" data-id4="'+total_brf2+'" data-id5="'+total_bsf+'" data-id6="'+total_bsf2+'" data-id7="'+balance+'" data-id8="'+balance2+'" data-id9="'+qty_expense+'" data-id10="'+qty_expense2+'" data-id11="'+price_expense+'" data-id12="'+price_expense2+'" data-id13="'+total_expense+'" data-id14="'+total_expense2+'" data-id15="'+qty_amount+'" data-id16="'+qty_amount2+'" data-id17="'+price_amount+'" data-id18="'+price_amount2+'" data-id19="'+total_amount+'" data-id20="'+total_amount2+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                              '<input type="hidden" name="var_trano[]" value="'+trano+'">'+
                              '<input type="hidden" name="var_product_id[]" value="'+product_id+'">'+
                              '<input type="hidden" name="var_product_name[]" value="'+product_name+'">'+
                              '<input type="hidden" name="var_uom[]" value="'+uom+'">'+
                              '<input type="hidden" name="var_price_amount[]" value="'+price_amount+'">'+
                              '<input type="hidden" name="var_qty_amount[]" value="'+qty_amount+'">'+
                              '<input type="hidden" name="var_total_amount[]" value="'+total_amount+'">'+
                              '<input type="hidden" name="var_description[]" value="'+description+'">'+
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
                              '<button type="button" class="btn btn-warning btn-xs edit_expense" data-dismiss="modal" data-id1="'+trano+'" data-id2="'+brf_date+'" data-id3="'+total_brf+'" data-id4="'+total_brf2+'" data-id5="'+total_bsf+'" data-id6="'+total_bsf2+'" data-id7="'+balance+'" data-id8="'+balance2+'" data-id9="'+qty_expense+'" data-id10="'+qty_expense2+'" data-id11="'+price_expense+'" data-id12="'+price_expense2+'" data-id13="'+total_expense+'" data-id14="'+total_expense2+'" data-id15="'+qty_amount+'" data-id16="'+qty_amount2+'" data-id17="'+price_amount+'" data-id18="'+price_amount2+'" data-id19="'+total_amount+'" data-id20="'+total_amount2+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                              '<input type="hidden" id="var_trano" name="var_trano[]" value="'+trano+'">'+
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
          $("#saveBsfList").prop("disabled", false);

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
              

              $("#brf_number_detail").val(id1);
              $("#brf_date").val(id2);
              $('#total_brf').val(id3);
              $("#total_brf2").val(id4);
              $("#total_bsf").val(id5);
              $("#total_bsf2").val(id6);
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
              

              $("#brf_number_detail").val(id1);
              $("#brf_date").val(id2);
              $('#total_brf').val(id3);
              $("#total_brf2").val(id4);
              $("#total_bsf").val(id5);
              $("#total_bsf2").val(id6);
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

          $("#brf_number_detail").val("");
          $("#brf_date").val("");
          $("#total_brf").val("");
          $("#total_brf2").val("");
          $("#priceCek").val("");
          $("#total_bsf").val("");
          $("#total_bsf2").val("");
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
</script> -->

<script>
  $('#saveBsf').click(function() {

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
              totalbrfDetails: $('#totalbrfDetails_' + i).html(),
              lastCurrency: $('#lastCurrency_' + i).html(),
              lastRemark: $('#lastRemark_' + i).html(),

            }
            datax.push(data);
          }

          var json_object = JSON.stringify(datax);
          console.log(json_object);

          $.ajax({
            type: "POST",
            url: '{{route("AdvanceRequest.store")}}',
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

<!-- <script>
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
</script> -->

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