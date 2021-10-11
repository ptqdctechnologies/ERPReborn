<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailArfList").hide();
        $("#detailTransAvail").hide();
        $("#sitecode2").prop("disabled", true);
        $("#request_name2").prop("disabled", true);
        $("#addFromDetailtoCart").prop("disabled", true);
        $("#showContentBOQ3").hide();
        $("#tableShowHideBOQ3").hide();

        $("#iconProductId2").hide();
        $("#iconQty2").hide();
        $("#iconUnitPrice2").hide();
        $("#iconRemark2").hide();
        $("#product_id2").prop("disabled", true);

        $("#submitArf").prop("disabled", true);
    });
</script>

<script>
    $(document).ready(function() {

        $('.klikDetail1').click(function() {

            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", true);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", true);
            $("#addFromDetailtoCart").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);

            var getStatus1 = $("#getStatus1").html();
            
            if(getStatus1 == "Miscellaneous"){
                $("#product_id2").prop("disabled", false);
                var get31 = "";
                var get71 = "";
            }
            else{
                $("#product_id2").prop("disabled", true);
                var get31 = $("#getProductId1").html();
                var get71 = $("#getProductName1").html();
            }

            var get11 = $("#getWorkId1").html();
            var get21 = $("#getWorkName1").html();
            var get4 = $("#getQty1").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get41 = $("#getQty11").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get51 = $("#getPrice1").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get61 = $("#getRemark1").html();
            var get81 = $("#getUom1").html();
            var get91 = $("#getCurrency1").html();
            var get101 = $("#getRequester1").html();

            var totalBalance = (get41 * get51);
            var totalRequested = ((get4 - get41) * get51);

            $("#putWorkId").val(get11);
            $("#putWorkName").val(get21);
            $("#putProductId").val(get31);
            $("#totalRequester").val(totalRequested);
            $("#totalQtyRequest").val(get4 - get41);
            $("#totalBalance").val(totalBalance);
            $("#putQty").val(get41);
            $("#putPrice").val(get51);
            $("#putRemark").val(get61);
            $("#putProductName").val(get71);
            $("#putUom").val(get81);
            $("#putCurrency").val(get91);

        });
        $('.klikDetail2').click(function() {

            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", true);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", true);
            $("#addFromDetailtoCart").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);
            
            var getStatus2 = $("#getStatus2").html();
            
            if(getStatus2 == "Miscellaneous"){
                $("#product_id2").prop("disabled", false);
            }
            else{
                $("#product_id2").prop("disabled", true);
            }

            var get12 = $("#getWorkId2").html();
            var get22 = $("#getWorkName2").html();
            var get32 = $("#getProductId2").html();
            var get4 = $("#getQty2").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get42 = $("#getQty22").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get52 = $("#getPrice2").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get62 = $("#getRemark2").html();
            var get72 = $("#getProductName2").html();
            var get82 = $("#getUom2").html();
            var get92 = $("#getCurrency2").html();
            var get102 = $("#getRequester2").html();


            var totalBalance = (get42 * get52);
            var totalRequested = ((get4 - get42) * get52);

            $("#putWorkId").val(get12);
            $("#putWorkName").val(get22);
            $("#putProductId").val(get32);
            $("#totalRequester").val(totalRequested);
            $("#totalQtyRequest").val(get4 - get42);
            $("#totalBalance").val(totalBalance);
            $("#putQty").val(get42);
            $("#putPrice").val(get52);
            $("#putRemark").val(get62);
            $("#putProductName").val(get72);
            $("#putUom").val(get82);
            $("#putCurrency").val(get92);
        });
        $('.klikDetail3').click(function() {

            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", true);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", true);
            $("#addFromDetailtoCart").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);
            
            var getStatus3 = $("#getStatus3").html();
            
            if(getStatus3 == "Miscellaneous"){
                $("#product_id2").prop("disabled", false);
            }
            else{
                $("#product_id2").prop("disabled", true);
            }

            var get13 = $("#getWorkId3").html();
            var get23 = $("#getWorkName3").html();
            var get33 = $("#getProductId3").html();
            var get4 = $("#getQty3").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get43 = $("#getQty33").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get53 = $("#getPrice3").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get63 = $("#getRemark3").html();
            var get73 = $("#getProductName3").html();
            var get83 = $("#getUom3").html();
            var get93 = $("#getCurrency3").html();
            var get103 = $("#getRequester3").html();


            var totalBalance = (get43 * get53);
            var totalRequested = ((get4 - get43) * get53);

            $("#putWorkId").val(get13);
            $("#putWorkName").val(get23);
            $("#putProductId").val(get33);
            $("#totalRequester").val(totalRequested);
            $("#totalQtyRequest").val(get4 - get43);
            $("#totalBalance").val(totalBalance);
            $("#putQty").val(get43);
            $("#putPrice").val(get53);
            $("#putRemark").val(get63);
            $("#putProductName").val(get73);
            $("#putUom").val(get83);
            $("#putCurrency").val(get93);
        });
        $('.klikDetail4').click(function() {

            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", true);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", true);
            $("#addFromDetailtoCart").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);

            var getStatus4 = $("#getStatus4").html();
            if(getStatus4 == "Miscellaneous"){
                $("#product_id2").prop("disabled", false);
            }
            else{
                $("#product_id2").prop("disabled", true);
            }

            var get14 = $("#getWorkId4").html();
            var get24 = $("#getWorkName4").html();
            var get34 = $("#getProductId4").html();
            var get4 = $("#getQty4").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get44 = $("#getQty44").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get54 = $("#getPrice4").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get64 = $("#getRemark4").html();
            var get74 = $("#getProductName4").html();
            var get84 = $("#getUom4").html();
            var get94 = $("#getCurrency4").html();
            var get104 = $("#getRequester4").html();


            var totalBalance = (get44 * get54);
            var totalRequested = ((get4 - get44) * get54);

            $("#putWorkId").val(get14);
            $("#putWorkName").val(get24);
            $("#putProductId").val(get34);
            $("#totalRequester").val(totalRequested);
            $("#totalQtyRequest").val(get4 - get44);
            $("#totalBalance").val(totalBalance);
            $("#putQty").val(get44);
            $("#putPrice").val(get54);
            $("#putRemark").val(get64);
            $("#putProductName").val(get74);
            $("#putUom").val(get84);
            $("#putCurrency").val(get94);
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".detailTransaction").click(function() {
            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);
        });
    });
</script>

<script>
    var x = 1,
        y = 0;

    $('#addFromDetailtoCart').click(function() {

        var product_id = $("#putProductId").val();
        var qtyx = $("#qtyCek").val();
        var priceCek = $("#priceCek").val();
        var putRemark = $("#putRemark").val();

        if (product_id == "") {
            $("#putProductId").css("border", "1px solid red");
            $("#putProductName").css("border", "1px solid red");
            $("#iconProductId").css("border", "1px solid red");
            $("#iconProductId").css("borderRadius", "100pt");
            $("#iconProductId").css("paddingRight", "3px");
            $("#iconProductId").css("paddingLeft", "3px");
            $("#iconProductId").css("paddingTop", "1px");
            $("#iconProductId").css("paddingBottom", "1px");
            $("#iconProductId2").show();
            return false;

        } else if (qtyx == 0) {
            $("#qtyCek").css    ("border", "1px solid red");
            $("#putUom").css("border", "1px solid red");
            $("#iconQty").css("border", "1px solid red");
            $("#iconQty").css("borderRadius", "100pt");
            $("#iconQty").css("paddingRight", "3px");
            $("#iconQty").css("paddingLeft", "3px");
            $("#iconQty").css("paddingTop", "1px");
            $("#iconQty").css("paddingBottom", "1px");
            $("#iconQty2").show();
            return false;

        } else if (priceCek == "") {
            $("#priceCek").css("border", "1px solid red");
            $("#putCurrency").css("border", "1px solid red");
            $("#iconUnitPrice").css("border", "1px solid red");
            $("#iconUnitPrice").css("borderRadius", "100pt");
            $("#iconUnitPrice").css("paddingRight", "3px");
            $("#iconUnitPrice").css("paddingLeft", "3px");
            $("#iconUnitPrice").css("paddingTop", "1px");
            $("#iconUnitPrice").css("paddingBottom", "1px");
            $("#iconUnitPrice2").show();
            return false;

        } else if (putRemark == "") {
            $("#putRemark").css("border", "1px solid red");
            $("#iconRemark").css("border", "1px solid red");
            $("#iconRemark").css("borderRadius", "100pt");
            $("#iconRemark").css("paddingRight", "3px");
            $("#iconRemark").css("paddingLeft", "3px");
            $("#iconRemark").css("paddingTop", "1px");
            $("#iconRemark").css("paddingBottom", "1px");
            $("#iconRemark2").show();
            return false;

        } else {

            var datas = [];
            var tamp = [];

            for (var i = 1; i <= x; i++) {
                var data = {
                    // origin_budget: $('#origin_budget').val(),
                    projectcode: $('#projectcode').val(),
                    projectname: $('#projectname').val(),
                    sitecode: $('#sitecode').val(),
                    sitecode2: $('#sitecode2').val(),
                    beneficiary: $('#beneficiary').val(),
                    bank_name: $('#bank_name').val(),
                    account_name: $('#account_name').val(),
                    account_number: $('#account_number').val(),
                    internal_notes: $('#internal_notes').val(),
                    request_name: $('#request_name').val(),
                    putProductId: $('#putProductId').val(),
                    putProductName: $('#putProductName').val(),
                    putQty: $('#qtyCek').val(),
                    putQtys: $('#putQty').val(),
                    putUom: $('#putUom').val(),
                    putPrice: $('#priceCek').val(),
                    putCurrency: $('#putCurrency').val(),
                    totalArfDetails: $('#totalArfDetails').val(),
                    putRemark: $('#putRemark').val(),
                    // filenames: $('#dataInput_Log_FileUpload_Pointer_RefID' + i).val(),
                    trano: '',
                }
                datas.push(data);
            }

            var json_object = JSON.stringify(datas);    
            console.log(json_object);

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

                        var t = $('#tableArf').DataTable();
                        t.row.add([
                            '<center><button class="btn btn-outline-danger btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;"><i class="fa fa-trash"></i></button></center>',
                            '<span id="lastProductId' + y + '">' + val.putProductId + '</span>',
                            '<span id="lastProductName_' + y + '">' + val.putProductName + '</span>',
                            '<input name="qty" style="border-radius:0;width:50px;border:1px solid white;" type="text" class="form-control ChangeQtys" autocomplete="off" id="lastQty_' + y + '" value=' + val.putQty + '>',
                            '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                            '<span id="lastPrice_' + y + '">' + val.putPrice + '</span>',
                            '<span id="totalAkhir">' + val.totalArfDetails + '</span>',
                            '<span id="lastCurrency_' + y + '">' + val.putCurrency + '</span>',
                            '<span id="lastRemark_' + y + '">' + val.putRemark + '</span>'
                        ]).draw();

                        $('.ChangeQtys').keyup(function() {

                            var qtyReq = $(this).val().replace(/[^a-zA-Z0-9 ]/g, "");
                            if (qtyReq == 0 || qtyReq == '') {
                                qtyReq = 0;
                            }
                            var putQty = val.putQtys;
                            var putPrice = val.putPrice;
                            var awal = putQty * putPrice;
                            var akhir = qtyReq * putPrice;

                            if (qtyReq == '') {
                                $("#addFromDetailtoCart").prop("disabled", true);
                                $("#saveArfList").prop("disabled", true);
                            } else if (qtyReq > putQty) {
                                Swal.fire("Error !", "Your Qty Request is Over", "error");
                                $("#lastQty_' + y + '").val(0);
                                $("#addFromDetailtoCart").prop("disabled", true);
                                $("#saveArfList").prop("disabled", true);
                            } else if (akhir > awal) {
                                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                                $("#lastQty_' + y + '").val(0);
                                $('#totalAkhir').html(0);
                                $("#saveArfList").prop("disabled", true);
                            } else {
                                var totalReq = parseFloat(akhir);
                                $('#totalAkhir').html(totalReq);
                                $("#saveArfList").prop("disabled", false);
                            }

                        });

                    });
                },
                error: function(data) {
                    Swal.fire("Error !", "Data Canceled Added", "error");
                }
            });


            $("#putProductId").css("border", "1px solid #ced4da");
            $("#putProductName").css("border", "1px solid #ced4da");
            $("#putRemark").css("border", "1px solid #ced4da");

            $("#putProductId").val("");
            $("#putProductName").val("");
            $("#qtyCek").val("0");
            $("#putUom").val("");
            $("#priceCek").val("0");
            $("#putCurrency").val("");
            $("#putRemark").val("");
            $("#totalArfDetails").val("");
            $("#totalRequester").val("0");
            $("#totalQtyRequest").val("0");
            $("#totalBalance").val("0");

            $("#iconProductId2").hide();
            $("#iconQty2").hide();
            $("#iconRemark2").hide();

            $("#saveArfList").prop("disabled", false);




            $("#submitArf").prop("disabled", false);

            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);
            $("#detailArfList").show();

        }

    });
</script>

<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {
            var qtyReq = $(this).val().replace(/[^a-zA-Z0-9 ]/g, "");
            if (qtyReq == 0 || qtyReq == '') {
                qtyReq = 0;
            }
            var putQty = $('#putQty').val();
            var priceCek = $('#priceCek').val();
            var total = putQty * priceCek;
            var total2 = qtyReq * priceCek;

            if (qtyReq == '') {
                $("#addFromDetailtoCart").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
                $('#totalArfDetails').val(0);

            } else if (qtyReq > putQty) {
                Swal.fire("Error !", "Your Qty Request is Over", "error");
                $("#qtyCek").val(0);
                $('#totalArfDetails').val(0);
                $("#addFromDetailtoCart").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
            } else if (total2 > total) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $('#totalArfDetails').val(0);
                $("#addFromDetailtoCart").prop("disabled", true);
            } else {
                var totalReq = parseFloat(total2);
                $('#totalArfDetails').val(totalReq);
                $("#addFromDetailtoCart").prop("disabled", false);
            }

        });
    });
</script>

<script>
    $('document').ready(function() {
        $('.ChangePrice').keyup(function() {

            var priceReq = $(this).val().replace(/[^a-zA-Z0-9 ]/g, "");
            if (priceReq == 0 || priceReq == '') {
                priceReq = 0;
            }
            var qtyCek = $('#qtyCek').val();
            var putPrice = $('#putPrice').val();
            var total = qtyCek * priceReq;
            var total2 = qtyCek * putPrice;


            var getStatus1= $("#getStatus1").html();
            var getStatus2= $("#getStatus2").html();
            var getStatus3= $("#getStatus3").html();
            var getStatus4= $("#getStatus4").html();
            var totalBalance = $("#totalBalance").val();
            
            if(getStatus1 == "Miscellaneous" || getStatus2 == "Miscellaneous" || getStatus3 == "Miscellaneous" || getStatus4 == "Miscellaneous"){
                
                if (priceReq == '') {
                    $("#addFromDetailtoCart").prop("disabled", true);
                    $('#totalArfDetails').val(0);

                } else if (total > totalBalance) {
                    Swal.fire("Error !", "Your Request Price Is Over Budget", "error");
                    $("#priceCek").val(0);
                    $('#totalArfDetails').val(0);
                    $("#addFromDetailtoCart").prop("disabled", true);
                } else {
                    var totalReq = total;
                    $('#totalArfDetails').val(totalReq);
                    $("#addFromDetailtoCart").prop("disabled", false);
                }
            }
            else{
                
                if (priceReq == '') {
                    $("#addFromDetailtoCart").prop("disabled", true);
                    $('#totalArfDetails').val(0);

                } else if (total > total2) {
                    Swal.fire("Error !", "Your Request Price Is Over Budget", "error");
                    $("#priceCek").val(0);
                    $('#totalArfDetails').val(0);
                    $("#addFromDetailtoCart").prop("disabled", true);
                } else {
                    var totalReq = total;
                    $('#totalArfDetails').val(totalReq);
                    $("#addFromDetailtoCart").prop("disabled", false);
                }
            }

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // Format mata uang.
        $('.uang').mask('000.000.000.000', {
            reverse: true
        });
        // $( '.quantity' ).mask('000.000.000', {reverse: true});
    })
</script>

<script>
    $(document).ready(function() {
        $("#formCreateArf").validate({
            rules: {
                // origin_budget: "required",
                projectcode: "required",
                projectname: "required",
                sitecode: "required",
                sitename: "required",
                request_name: "required",
                beneficiary: "required",
                internal_notes: "required",
                bank_name: "required",
                account_name: "required",
                account_number: {
                    required: true,
                    number: true,
                    min: 0,
                }
            },
            messages: {
                // origin_budget: "<span title='Please Enter Origin Budget ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                projectcode: "",
                projectname: "<span title='Please Enter Projec Name ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                sitecode: "",
                sitename: "<span title='Please Enter Site Name ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                request_name: "",
                beneficiary: "<span title='Please Enter Beneficiary ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                internal_notes: "<span title='Please Enter Internal Notes' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                bank_name: "<span title='Please Enter Bank Name ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                account_name: "<span title='Please Enter Account Name ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                account_number: "<span title='Please Enter Account Number ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
            },
            unhighlight: function(element) {
                $(element).removeClass('error');
            },
            submitHandler: function(form) {

                form.submit();

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
                            url: '{{route("ARF.store2")}}',
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
    });
</script>