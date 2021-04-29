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
    $(function() {
        $("#origin_budget").on('click', function(e) {
            e.preventDefault();
            var val = $("#origin_budget").val();
            if(val == ""){
                $("#projectcode2").prop("disabled", true);
            }
            else{
                $("#projectcode2").prop("disabled", false);
            }
        });

        $("#projectcode2").on('click', function(e) {
            e.preventDefault();
            $("#sitecode2").prop("disabled", false);
        });

        $("#sitecode2").on('click', function(e) {
            e.preventDefault();
            $("#requester_name2").prop("disabled", false);
        });
    });
</script>

<script>
    function formDetailTransAttch() {
        var original_budget = document.forms["formArf1"]["origin_budget"].value;
        var projectcode = document.forms["formArf1"]["projectcode"].value;
        var sitecode = document.forms["formArf1"]["sitecode"].value;
        var requester_name = document.forms["formArf1"]["requester_name"].value;
        var beneficiary = document.forms["formArf1"]["beneficiary"].value;
        var bank_name = document.forms["formArf1"]["bank_name"].value;
        var account_name = document.forms["formArf1"]["account_name"].value;
        var account_number = document.forms["formArf1"]["account_number"].value;
        var internal_notes = document.forms["formArf1"]["internal_notes"].value;
        var filenames = document.forms["formArf1"]["filenames"].value;
        
        if (original_budget == "") {
            document.formArf1.origin_budget.focus() ;
            document.formArf1.origin_budget.style.border = "1px solid red";
            document.getElementById("iconBudget").style.border = "1px solid red";
            document.getElementById("iconBudget").style.borderRadius = "100pt";
            document.getElementById("iconBudget").style.paddingRight = "7px";
            document.getElementById("iconBudget").style.paddingLeft = "8px";
            document.getElementById("iconBudget").style.paddingTop = "3px";
            document.getElementById("iconBudget").style.paddingBottom = "3px";
            document.getElementById("iconBudget").innerHTML = "&#33";
            return false;
        }
        else if (projectcode == "") {
            document.formArf1.projectcode.focus() ;
            document.formArf1.projectname.focus() ;
            document.formArf1.projectcode.style.border = "1px solid red";
            document.formArf1.projectname.style.border = "1px solid red";
            document.getElementById("iconProject").style.border = "1px solid red";
            document.getElementById("iconProject").style.borderRadius = "100pt";
            document.getElementById("iconProject").style.paddingRight = "7px";
            document.getElementById("iconProject").style.paddingLeft = "8px";
            document.getElementById("iconProject").style.paddingTop = "3px";
            document.getElementById("iconProject").style.paddingBottom = "3px";
            document.getElementById("iconProject").innerHTML = "&#33";

            $("#iconBudget").hide();
            document.formArf1.origin_budget.style.border = "1px solid #ced4da";

            return false;
        }
        else if (sitecode == "") {
            document.formArf1.sitecode.focus() ;
            document.formArf1.sitecode2.focus() ;
            document.formArf1.sitecode.style.border = "1px solid red";
            document.formArf1.sitecode2.style.border = "1px solid red";
            document.getElementById("iconSite").style.border = "1px solid red";
            document.getElementById("iconSite").style.borderRadius = "100pt";
            document.getElementById("iconSite").style.paddingRight = "7px";
            document.getElementById("iconSite").style.paddingLeft = "8px";
            document.getElementById("iconSite").style.paddingTop = "3px";
            document.getElementById("iconSite").style.paddingBottom = "3px";
            document.getElementById("iconSite").innerHTML = "&#33";

            $("#iconProject").hide();
            document.formArf1.projectcode.style.border = "1px solid #ced4da";
            document.formArf1.projectname.style.border = "1px solid #ced4da";

            return false;
        }
        
        else if (requester_name == "") {
            document.formArf1.requester_name.focus() ;
            document.formArf1.requester_name.style.border = "1px solid red";
            document.getElementById("iconRequester").style.border = "1px solid red";
            document.getElementById("iconRequester").style.borderRadius = "100pt";
            document.getElementById("iconRequester").style.paddingRight = "7px";
            document.getElementById("iconRequester").style.paddingLeft = "8px";
            document.getElementById("iconRequester").style.paddingTop = "3px";
            document.getElementById("iconRequester").style.paddingBottom = "3px";
            document.getElementById("iconRequester").innerHTML = "&#33";

            $("#iconSite").hide();
            document.formArf1.sitecode.style.border = "1px solid #ced4da";
            document.formArf1.sitecode2.style.border = "1px solid #ced4da";
            
            return false;
        }
        else if (beneficiary == "") {
            $("#iconBeneficiary").show();
            document.formArf1.beneficiary.focus() ;
            document.formArf1.beneficiary.style.border = "1px solid red";
            document.getElementById("iconBeneficiary").style.border = "1px solid red";
            document.getElementById("iconBeneficiary").style.borderRadius = "100pt";
            document.getElementById("iconBeneficiary").style.paddingRight = "7px";
            document.getElementById("iconBeneficiary").style.paddingLeft = "8px";
            document.getElementById("iconBeneficiary").style.paddingTop = "3px";
            document.getElementById("iconBeneficiary").style.paddingBottom = "3px";
            document.getElementById("iconBeneficiary").innerHTML = "&#33";

            $("#iconRequester").hide();
            document.formArf1.requester_name.style.border = "1px solid #ced4da";

            return false;
        }

        else if (internal_notes == "") {
            $("#iconInternal").show();
            document.formArf1.internal_notes.focus() ;
            document.formArf1.internal_notes.style.border = "1px solid red";
            document.getElementById("iconInternal").style.border = "1px solid red";
            document.getElementById("iconInternal").style.borderRadius = "100pt";
            document.getElementById("iconInternal").style.paddingRight = "7px";
            document.getElementById("iconInternal").style.paddingLeft = "8px";
            document.getElementById("iconInternal").style.paddingTop = "3px";
            document.getElementById("iconInternal").style.paddingBottom = "3px";
            document.getElementById("iconInternal").innerHTML = "&#33";

            $("#iconBeneficiary").hide();
            document.formArf1.beneficiary.style.border = "1px solid #ced4da";

            return false;
        }
        else if (bank_name == "") {
            $("#iconBankName").show();
            document.formArf1.bank_name.focus() ;
            document.formArf1.bank_name.style.border = "1px solid red";
            document.getElementById("iconBankName").style.border = "1px solid red";
            document.getElementById("iconBankName").style.borderRadius = "100pt";
            document.getElementById("iconBankName").style.paddingRight = "7px";
            document.getElementById("iconBankName").style.paddingLeft = "8px";
            document.getElementById("iconBankName").style.paddingTop = "3px";
            document.getElementById("iconBankName").style.paddingBottom = "3px";
            document.getElementById("iconBankName").innerHTML = "&#33";
            
            $("#iconInternal").hide();
            document.formArf1.internal_notes.style.border = "1px solid #ced4da";

            return false;
        }
        else if (account_name == "") {
            // $("#iconBudget").show();
            document.formArf1.account_name.focus() ;
            document.formArf1.account_name.style.border = "1px solid red";
            document.getElementById("iconAccountName").style.border = "1px solid red";
            document.getElementById("iconAccountName").style.borderRadius = "100pt";
            document.getElementById("iconAccountName").style.paddingRight = "7px";
            document.getElementById("iconAccountName").style.paddingLeft = "8px";
            document.getElementById("iconAccountName").style.paddingTop = "3px";
            document.getElementById("iconAccountName").style.paddingBottom = "3px";
            document.getElementById("iconAccountName").innerHTML = "&#33";
            
            $("#iconBankName").hide();
            document.formArf1.bank_name.style.border = "1px solid #ced4da";

            return false;
        }
        else if (account_number == "") {
            $("#iconAccountNumber").show();
            document.formArf1.account_number.focus() ;
            document.formArf1.account_number.style.border = "1px solid red";
            document.getElementById("iconAccountNumber").style.border = "1px solid red";
            document.getElementById("iconAccountNumber").style.borderRadius = "100pt";
            document.getElementById("iconAccountNumber").style.paddingRight = "7px";
            document.getElementById("iconAccountNumber").style.paddingLeft = "8px";
            document.getElementById("iconAccountNumber").style.paddingTop = "3px";
            document.getElementById("iconAccountNumber").style.paddingBottom = "3px";
            document.getElementById("iconAccountNumber").innerHTML = "&#33";
            
            $("#iconAccountName").hide();
            document.formArf1.account_name.style.border = "1px solid #ced4da";

            return false;
        }
        else{
            $("#projectcode").prop("disabled", true);
            $("#sitecode").prop("disabled", true);
            $("#projectcode2").prop("disabled", true);
            $("#sitecode2").prop("disabled", true);
            $("#product-comments-tab").prop("disabled", false);

            $("#iconAccountNumber").hide();
            document.formArf1.account_number.style.border = "1px solid #ced4da";
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
    $(document).ready(function() {

        $('.klikDetail1').click(function() {

            $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
            $("#buttonArfList").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);

            var get11 = $("#getWorkId1").html();
            var get21 = $("#getWorkName1").html();
            var get31 = $("#getProductId1").html();
            var get41 = $("#getQty1").html();
            var get51 = $("#getPrice1").html();
            var get61 = $("#getRemark1").html();
            var get71 = $("#getProductName1").html();
            var get81 = $("#getUom1").html();
            var get91 = $("#getCurrency1").html();
            var get101 = $("#getRequester1").html();
            var totalBOQ1 = get41 * get51;
            var totalBalance1 = totalBOQ1 - get101;
            $("#totalBalance").val(totalBalance1);
            $("#totalBOQ").val(totalBOQ1);
            $("#totalRequester").val(get101);
            $("#putWorkId").val(get11);
            $("#putWorkName").val(get21);
            $("#putProductId").val(get31);
            $("#putQty").val(get41);
            $("#putPrice").val(get51);            
            $("#putRemark").val(get61);
            $("#putProductName").val(get71);
            $("#putUom").val(get81);
            $("#putCurrency").val(get91);

        });
        $('.klikDetail2').click(function() {

            $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
            $("#buttonArfList").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);

            var get12 = $("#getWorkId2").html();
            var get22 = $("#getWorkName2").html();
            var get32 = $("#getProductId2").html();
            var get42 = $("#getQty2").html();
            var get52 = $("#getPrice2").html();
            var get62 = $("#getRemark2").html();
            var get72 = $("#getProductName2").html();
            var get82 = $("#getUom2").html();
            var get92 = $("#getCurrency2").html();
            var get102 = $("#getRequester2").html();
            var totalBOQ2 = get42 * get52;
            var totalBalance2 = totalBOQ2 - get102;
            $("#totalBalance").val(totalBalance2);
            $("#totalBOQ").val(totalBOQ2);
            $("#totalRequester").val(get102);
            $("#putWorkId").val(get12);
            $("#putWorkName").val(get22);
            $("#putProductId").val(get32);
            $("#putQty").val(get42);
            $("#putPrice").val(get52);            
            $("#putRemark").val(get62);
            $("#putProductName").val(get72);
            $("#putUom").val(get82);
            $("#putCurrency").val(get92);
        });
        $('.klikDetail3').click(function() {

            $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
            $("#buttonArfList").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);

            var get13 = $("#getWorkId3").html();
            var get23 = $("#getWorkName3").html();
            var get33 = $("#getProductId3").html();
            var get43 = $("#getQty3").html();
            var get53 = $("#getPrice3").html();
            var get63 = $("#getRemark3").html();
            var get73 = $("#getProductName3").html();
            var get83 = $("#getUom3").html();
            var get93 = $("#getCurrency3").html();
            var get103 = $("#getRequester3").html();
            var totalBOQ3 = get43 * get53;
            var totalBalance3 = totalBOQ3 - get103;
            $("#totalBalance").val(totalBalance3);
            $("#totalBOQ").val(totalBOQ3);
            $("#totalRequester").val(get103);
            $("#putWorkId").val(get13);
            $("#putWorkName").val(get23);
            $("#putProductId").val(get33);
            $("#putQty").val(get43);
            $("#putPrice").val(get53);            
            $("#putRemark").val(get63);
            $("#putProductName").val(get73);
            $("#putUom").val(get83);
            $("#putCurrency").val(get93);
        });
        $('.klikDetail4').click(function() {

            $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
            $("#buttonArfList").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);

            var get14 = $("#getWorkId4").html();
            var get24 = $("#getWorkName4").html();
            var get34 = $("#getProductId4").html();
            var get44 = $("#getQty4").html();
            var get54 = $("#getPrice4").html();
            var get64 = $("#getRemark4").html();
            var get74 = $("#getProductName4").html();
            var get84 = $("#getUom4").html();
            var get94 = $("#getCurrency4").html();
            var get104 = $("#getRequester4").html();
            var totalBOQ4 = get44 * get54;
            var totalBalance4 = totalBOQ4 - get104;
            $("#totalBalance").val(totalBalance4);
            $("#totalBOQ").val(totalBOQ4);
            $("#totalRequester").val(get104);
            $("#putWorkId").val(get14);
            $("#putWorkName").val(get24);
            $("#putProductId").val(get34);
            $("#putQty").val(get44);
            $("#putPrice").val(get54);            
            $("#putRemark").val(get64);
            $("#putProductName").val(get74);
            $("#putUom").val(get84);
            $("#putCurrency").val(get94);
        });
    });
</script>

<script>
    var x = 1,
        y = 0;

    $('#buttonArfList').click(function() {

        var product_id = document.forms["formArf2"]["putProductId"].value;
        var qtyx = document.forms["formArf2"]["qtyCek"].value;
        var putPrice = document.forms["formArf2"]["putPrice"].value;
        var putRemark = document.forms["formArf2"]["putRemark"].value;

        if (product_id == "") {
            document.formArf2.putProductId.focus() ;
            document.formArf2.putProductName.focus() ;
            document.formArf2.putProductId.style.border = "1px solid red";
            document.formArf2.putProductName.style.border = "1px solid red";
            document.getElementById("iconProductId").style.border = "1px solid red";
            document.getElementById("iconProductId").style.borderRadius = "100pt";
            document.getElementById("iconProductId").style.paddingRight = "7px";
            document.getElementById("iconProductId").style.paddingLeft = "8px";
            document.getElementById("iconProductId").style.paddingTop = "3px";
            document.getElementById("iconProductId").style.paddingBottom = "3px";
            document.getElementById("iconProductId").innerHTML = "&#33";
            return false;
        }
        else if (qtyx == 0) {
            document.formArf2.qtyx.focus() ;
            document.formArf2.putQty.focus() ;
            document.formArf2.qtyx.style.border = "1px solid red";
            document.formArf2.putQty.style.border = "1px solid red";
            document.getElementById("iconQty").style.border = "1px solid red";
            document.getElementById("iconQty").style.borderRadius = "100pt";
            document.getElementById("iconQty").style.paddingRight = "7px";
            document.getElementById("iconQty").style.paddingLeft = "8px";
            document.getElementById("iconQty").style.paddingTop = "3px";
            document.getElementById("iconQty").style.paddingBottom = "3px";
            document.getElementById("iconQty").innerHTML = "&#33";
            return false;
        }
        else if (putPrice == "") {
            document.formArf2.putPrice.focus() ;
            document.formArf2.putPrice.style.border = "1px solid red";
            document.getElementById("iconUnitPrice").style.border = "1px solid red";
            document.getElementById("iconUnitPrice").style.borderRadius = "100pt";
            document.getElementById("iconUnitPrice").style.paddingRight = "7px";
            document.getElementById("iconUnitPrice").style.paddingLeft = "8px";
            document.getElementById("iconUnitPrice").style.paddingTop = "3px";
            document.getElementById("iconUnitPrice").style.paddingBottom = "3px";
            document.getElementById("iconUnitPrice").innerHTML = "&#33";
            return false;
        }
        else if (putRemark == "") {
            document.formArf2.putRemark.focus() ;
            document.formArf2.putRemark.style.border = "1px solid red";
            document.getElementById("iconRemark").style.border = "1px solid red";
            document.getElementById("iconRemark").style.borderRadius = "100pt";
            document.getElementById("iconRemark").style.paddingRight = "7px";
            document.getElementById("iconRemark").style.paddingLeft = "8px";
            document.getElementById("iconRemark").style.paddingTop = "3px";
            document.getElementById("iconRemark").style.paddingBottom = "3px";
            document.getElementById("iconRemark").innerHTML = "&#33";

            $("#iconUnitPrice").hide();
            document.formArf2.putPrice.style.border = "1px solid #ced4da";
            document.formArf2.putCurrency.style.border = "1px solid #ced4da";

            return false;
        }
        else{

            $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", false);
            $("#detailArfList").show();
            var datas = [];

            for (var i = 1; i <= x; i++) {
                var data = {
                    origin_budget: $('#origin_budget').val(),
                    projectcode: $('#projectcode').val(),
                    projectname: $('#projectname').val(),
                    sitecode: $('#sitecode').val(),
                    sitecode2: $('#sitecode2').val(),
                    beneficiary: $('#beneficiary').val(),
                    bank_name: $('#bank_name').val(),
                    account_name: $('#account_name').val(),
                    account_number: $('#account_number').val(),
                    internal_notes: $('#internal_notes').val(),
                    requestNameArf: $('#requestNameArf').val(),
                    putProductId: $('#putProductId').val(),
                    putProductName: $('#putProductName').val(),
                    putQty: $('#qtyCek').val(),
                    putQtys: $('#putQty').val(),
                    putUom: $('#putUom').val(),
                    putPrice: $('#priceCek').val(),
                    putCurrency: $('#putCurrency').val(),
                    totalArfDetails: $('#totalArfDetails').val(),
                    putRemark: $('#putRemark').val(),
                    filenames: $('#filenames_' + i).val(),
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
                    console.log(data);
                    y++;
                    $.each(data, function(key, val) {
                        $('#tableArfListCart').append('<tr><td><center><button class="btn btn-outline-danger btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;"><i class="fa fa-trash"></i></button></center></td><td><span id="lastProductId_' + y + '">' + val.putProductId + '</span></td><td><span id="lastProductName_' + y + '">' + val.putProductName + '</span></td><td><input name="qty" style="border-radius:0;width:50px;border:1px solid white;" type="text" class="form-control ChangeQtys" autocomplete="off" id="lastQty_' + y + '" value=' + val.putQty + '></td><td><span id="lastUom_' + y + '">' + val.putUom + '</span></td><td><span id="lastPrice_' + y + '">' + val.putPrice + '</span></td><td><span id="totalArfDetails_' + y + '">' + val.totalArfDetails + '</span></td><td><span id="lastCurrency_' + y + '">' + val.putCurrency + '</span></td><td><span id="lastRemark_' + y + '">' + val.putRemark + '</span></td></tr>');

                        $('.ChangeQtys').keyup(function() {

                            var qtyReq = $(this).val();
                            if (qtyReq == 0 || qtyReq == '') {
                                qtyReq = 0;
                            }
                            var putQty = val.putQtys;
                            var priceCek = val.priceCek;
                            var total = parseFloat(putQty * priceCek);
                            var total2 = parseFloat(qtyReq * priceCek);

                            if (qtyReq == '') {
                                $("#buttonArfList").prop("disabled", true);
                                $("#saveArfList").prop("disabled", true);
                            }
                            else if (qtyReq > putQty) {
                                Swal.fire("Error !", "Your Qty Is Over", "error");
                                $("#qtyCek").val(0);
                                $("#buttonArfList").prop("disabled", true);
                                $("#saveArfList").prop("disabled", true);
                            }
                            else if (total2 > total) {
                                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                                $('#totalArfDetails_' + y + '').html(0);
                                $("#saveArfList").prop("disabled", true);
                            } else {
                                var totalReq = parseFloat(total2).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                                $('#totalArfDetails_' + y + '').html(totalReq);
                                $("#saveArfList").prop("disabled", false);
                            }

                        });

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
            
        }

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
        }
        else if (projectcode == "") {
            Swal.fire("Error !", "Please Input Project code !", "error");
        }
        else if (sitecode == "") {
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
            var priceCek = parseFloat($('#priceCek').val());
            var total = parseFloat(putQty * priceCek);
            var total2 = parseFloat(qtyReq * priceCek);

            if (qtyReq == '') {
                $("#buttonArfList").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);         
            }
            else if (qtyReq > putQty) {
                Swal.fire("Error !", "Your Qty Is Over x", "error");
                $("#qtyCek").val(0);
                $("#buttonArfList").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
            }
             else if (total2 > total) {
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

<script>
    $('document').ready(function() {
        $('.ChangePrice').keyup(function() {
            var priceReq = $(this).val();
            if (priceReq == 0 || priceReq == '') {
                priceReq = 0;
            }
            var qtyCek = parseFloat($('#qtyCek').val());
            var putPrice = parseFloat($('#putPrice').val());

            var total = parseFloat(qtyCek * priceReq);
            var total2 = parseFloat(qtyCek * putPrice);

            if (priceReq == '') {
                $("#buttonArfList").prop("disabled", true);             
            }
            else if (total > total2) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $('#totalArfDetails').val(0);
                $("#buttonArfList").prop("disabled", true);               
            } else {
                var totalReq = parseFloat(total).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                $('#totalArfDetails').val(totalReq);
                $("#buttonArfList").prop("disabled", false);
            }

        });
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

<script type="text/javascript">
    $(document).ready(function() {
        $("body").on("click", ".remove-attachment", function() {
            $(this).parents("#control-group").remove();
        });
    });
</script>