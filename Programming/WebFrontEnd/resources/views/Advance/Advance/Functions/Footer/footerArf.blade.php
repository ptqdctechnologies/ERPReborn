<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailArfList").hide();
        $("#detailTransAvail").hide();
        $("#projectcode2").prop("disabled", true);
        $("#sitecode2").prop("disabled", true);
        $("#request_name2").prop("disabled", true);
        $("#buttonArfList").prop("disabled", true);
        $("#showContentBOQ3").hide();
        $("#tableShowHideBOQ3").hide();
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
            var get4 = $("#getQty1").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get41 = $("#getQty11").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get51 = $("#getPrice1").html().replace(/[^a-zA-Z0-9 ]/g, "");
            var get61 = $("#getRemark1").html();
            var get71 = $("#getProductName1").html();
            var get81 = $("#getUom1").html();
            var get91 = $("#getCurrency1").html();
            var get101 = $("#getRequester1").html();

            var totalRequested = (get4 * get51).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            var totalBalance = ((get4 - get41) * get51).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

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

            $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
            $("#buttonArfList").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);

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


            var totalRequested = (get4 * get52).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            var totalBalance = ((get4 - get42) * get52).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

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

            $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
            $("#buttonArfList").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);

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


            var totalRequested = (get4 * get53).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            var totalBalance = ((get4 - get43) * get53).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

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

            $("#arfTableDisableEnable").find("input,button,textarea,select").attr("disabled", true);
            $("#buttonArfList").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);

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


            var totalRequested = (get4 * get54).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
            var totalBalance = ((get4 - get44) * get54).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

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

<script>
    var x = 1,
        y = 0;

    $('#buttonArfList').click(function() {

        var product_id = document.forms["formArf2"]["putProductId"].value;
        var qtyx = document.forms["formArf2"]["qtyCek"].value;
        var priceCek = document.forms["formArf2"]["priceCek"].value;
        var putRemark = document.forms["formArf2"]["putRemark"].value;

        if (product_id == "") {
            document.formArf2.putProductId.focus();
            document.formArf2.putProductName.focus();
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
        } else if (qtyx == 0) {
            document.formArf2.qtyx.focus();
            document.formArf2.putQty.focus();
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
        } else if (priceCek == "") {
            document.formArf2.priceCek.focus();
            document.formArf2.priceCek.style.border = "1px solid red";
            document.getElementById("iconUnitPrice").style.border = "1px solid red";
            document.getElementById("iconUnitPrice").style.borderRadius = "100pt";
            document.getElementById("iconUnitPrice").style.paddingRight = "7px";
            document.getElementById("iconUnitPrice").style.paddingLeft = "8px";
            document.getElementById("iconUnitPrice").style.paddingTop = "3px";
            document.getElementById("iconUnitPrice").style.paddingBottom = "3px";
            document.getElementById("iconUnitPrice").innerHTML = "&#33";
            return false;
        } else if (putRemark == "") {
            document.formArf2.putRemark.focus();
            document.formArf2.putRemark.style.border = "1px solid red";
            document.getElementById("iconRemark").style.border = "1px solid red";
            document.getElementById("iconRemark").style.borderRadius = "100pt";
            document.getElementById("iconRemark").style.paddingRight = "7px";
            document.getElementById("iconRemark").style.paddingLeft = "8px";
            document.getElementById("iconRemark").style.paddingTop = "3px";
            document.getElementById("iconRemark").style.paddingBottom = "3px";
            document.getElementById("iconRemark").innerHTML = "&#33";

            $("#iconUnitPrice").hide();
            document.formArf2.priceCek.style.border = "1px solid #ced4da";
            document.formArf2.putCurrency.style.border = "1px solid #ced4da";

            return false;
        } else {

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
                    filenames: $('#filenames_' + i).val(),
                    trano: '',
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

                        var t = $('#tableArf').DataTable();
                        t.row.add([
                            '<center><button class="btn btn-outline-danger btn-rounded btn-sm my-0 remove-val-list remove-attachment" style="border-radius: 100px;"><i class="fa fa-trash"></i></button></center>',
                            '<span id="lastProductId_' + y + '">' + val.putProductId + '</span>',
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
                                $("#buttonArfList").prop("disabled", true);
                                $("#saveArfList").prop("disabled", true);
                            } else if (qtyReq > putQty) {
                                Swal.fire("Error !", "Your Qty Request is Over", "error");
                                $("#lastQty_' + y + '").val(0);
                                $("#buttonArfList").prop("disabled", true);
                                $("#saveArfList").prop("disabled", true);
                            } else if (akhir > awal) {
                                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                                $("#lastQty_' + y + '").val(0);
                                $('#totalAkhir').html(0);
                                $("#saveArfList").prop("disabled", true);
                            } else {
                                var totalReq = parseFloat(akhir).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
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
                $("#buttonArfList").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
                $('#totalArfDetails').val(0);

            } else if (qtyReq > putQty) {
                Swal.fire("Error !", "Your Qty Request is Over", "error");
                $("#qtyCek").val(0);
                $('#totalArfDetails').val(0);
                $("#buttonArfList").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
            } else if (total2 > total) {
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
            var priceReq = $(this).val().replace(/[^a-zA-Z0-9 ]/g, "");
            if (priceReq == 0 || priceReq == '') {
                priceReq = 0;
            }
            var qtyCek = $('#qtyCek').val();
            var putPrice = $('#putPrice').val();
            var total = qtyCek * priceReq;
            var total2 = qtyCek * putPrice;

            if (priceReq == '') {
                $("#buttonArfList").prop("disabled", true);
                $('#totalArfDetails').val(0);

                // $("#totalRequester").val(total);

            } else if (total > total2) {
                Swal.fire("Error !", "Your Request Price Is Over Budget", "error");
                $("#priceCek").val(0);
                $('#totalArfDetails').val(0);
                $("#buttonArfList").prop("disabled", true);
            } else {
                var totalReq = total.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                $('#totalArfDetails').val(totalReq);
                $("#buttonArfList").prop("disabled", false);

                // var totalBudget = $("#totalBudget").val();
                // var totalBalance = (totalBudget - total).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

                // $("#totalRequester").val(totalReq);
                // $("#totalBalance").val(totalBalance);
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

<script type="text/javascript">
    $(document).ready(function() {
        $("body").on("click", ".remove-attachment", function() {
            $(this).parents("#control-group").remove();
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

<!-- <script>
    // var y = 1; //initlal text box count
    $('#saveArfList').click(function() {
        var original_budget = document.forms["formArf1"]["origin_budget"].value;
        var request_name = document.forms["formArf1"]["request_name"].value;
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
        } else if (request_name == "") {
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
</script> -->






<script>
    $(document).ready(function() {
        $("#formCreateArf").validate({
            rules: {
                origin_budget: "required",
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
                    selectRoleCheck: true
                }
            },
            messages: {
                origin_budget: "<span title='Please Enter Origin Budget ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                projectcode: "<span title='Please Enter Projec Code ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                projectname: "<span title='Please Enter Projec Name ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                sitecode: "<span title='Please Enter Site Code ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                sitename: "<span title='Please Enter Site Name ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                request_name: "<span title='Please Enter Request Name ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
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
    });
</script>