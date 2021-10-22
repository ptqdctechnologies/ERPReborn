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


<!-- <script>
        $('.klikDetail1').on('click', function(e){
             e.preventDefault();
            var $this = $(this);
            var code = $this.data("id");
        alert(code);
          var idx=0;
            $.get('{{ url('') }}/packaging_receipt/view/add/ajax-state/' + po_packaging_id, function(data) {
                $('#packaging_detail').empty();
                $.each(data, function(index, subcatObj){
                    var qty = parseInt(subcatObj.quantity);
                    var acc = isNaN(parseInt(subcatObj.quantity))?0:parseInt(subcatObj.quantity);
                    var avb = qty-acc;
                    console.log(qty);
                    console.log(acc);
                    console.log(avb);
                    console.log(subcatObj);
                    $('#packaging_detail')
                    .append('<tr><td><input value="'
                    +subcatObj.packaging_code+'" class="form-control text-capitalize" type="text" readonly></td><td><input value="'
                    +subcatObj.packaging_name+'" class="form-control  text-capitalize" type="text" readonly></td><td><input value="'
                    +avb+'" min="0" max="'+avb+'" id="quantity'+idx+'" title="'+avb+' package that doesnt accepted yet" class="form-control text-capitalize" placeholder="Quantity" type="number" name="quantity[]"></td><td>'
                    +'<input id="packaging_id'+idx+'" type="hidden" name="packaging_id[]" value="'+subcatObj.id+'"></td><td>');
                    idx++;
                }); 
            });
        });
        
    </script> -->

<script>
    $(document).ready(function() {

        $('.klikDetail1').on('click', function(e){
            e.preventDefault();
            var $this = $(this);
            var status = $this.data("name");

            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", true);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", true);
            $("#addFromDetailtoCart").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);
            
            if(status == "Miscellaneous"){
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
            $("#status").val(status);
        });
        $('.klikDetail2').on('click', function(e){
            e.preventDefault();
            var $this = $(this);
            var status = $this.data("name");
            
            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", true);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", true);
            $("#addFromDetailtoCart").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);
            
            if(status == "Miscellaneous"){
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
            $("#status").val(status);
        });
        $('.klikDetail3').on('click', function(e){
            e.preventDefault();
            var $this = $(this);
            var status = $this.data("name");

            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", true);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", true);
            $("#addFromDetailtoCart").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);
            
            if(status == "Miscellaneous"){
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
            $("#status").val(status);
        });
        $('.klikDetail4').on('click', function(e){
            e.preventDefault();
            var $this = $(this);
            var status = $this.data("name");

            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", true);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", true);
            $("#addFromDetailtoCart").prop("disabled", true);
            $(".available").show();
            $("#detailTransAvail").show();
            $("#putProductId2").prop("disabled", true);

            if(status == "Miscellaneous"){
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
            $("#status").val(status);
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
        var totalBalance = $("#totalBalance").val();
        var qtyCek = $('#qtyCek').val();
        var putPrice = $('#putPrice').val();

        if (product_id == "") {
            $("#putProductId").css("border", "1px solid red");
            $("#putProductName").css("border", "1px solid red");
            $("#iconProductId").css("border", "1px solid red");
            $("#iconProductId").css("borderRadius", "100pt");
            $("#iconProductId").css("paddingRight", "5px");
            $("#iconProductId").css("paddingLeft", "5px");
            $("#iconProductId").css("paddingTop", "1px");
            $("#iconProductId").css("paddingBottom", "1px");
            $("#iconProductId2").show();
            return false;

        } else if (qtyx == 0) {
            $("#qtyCek").css    ("border", "1px solid red");
            $("#putUom").css("border", "1px solid red");
            $("#iconQty").css("border", "1px solid red");
            $("#iconQty").css("borderRadius", "100pt");
            $("#iconQty").css("paddingRight", "5px");
            $("#iconQty").css("paddingLeft", "5px");
            $("#iconQty").css("paddingTop", "1px");
            $("#iconQty").css("paddingBottom", "1px");
            $("#iconQty2").show();
            return false;

        } else if (priceCek == "") {
            $("#priceCek").css("border", "1px solid red");
            $("#putCurrency").css("border", "1px solid red");
            $("#iconUnitPrice").css("border", "1px solid red");
            $("#iconUnitPrice").css("borderRadius", "100pt");
            $("#iconUnitPrice").css("paddingRight", "5px");
            $("#iconUnitPrice").css("paddingLeft", "5px");
            $("#iconUnitPrice").css("paddingTop", "1px");
            $("#iconUnitPrice").css("paddingBottom", "1px");
            $("#iconUnitPrice2").show();
            return false;

        } else if (putRemark == "") {
            $("#putRemark").css("border", "1px solid red");
            $("#iconRemark").css("border", "1px solid red");
            $("#iconRemark").css("borderRadius", "100pt");
            $("#iconRemark").css("paddingRight", "5px");
            $("#iconRemark").css("paddingLeft", "5px");
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
                    putPrice: $('#priceCek').val().replace(/[^a-zA-Z0-9 ]/g, ""),
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
                            '<input name="qty" style="border-radius:0;width:50px;border:1px solid white;" type="text" class="form-control ChangeQtys" autocomplete="off" id="lastQty" value=' + val.putQty + '>',
                            '<span id="lastUom_' + y + '">' + val.putUom + '</span>',
                            '<input name="qty" style="border-radius:0;width:70px;border:1px solid white;" type="text" class="form-control ChangePrices" autocomplete="off" id="ChangePrices" value=' + val.putPrice + '>',
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
                            var qty = val.putQty;
                            var putPrice = val.putPrice.replace(/[^a-zA-Z0-9 ]/g, "");
                            var awal = putQty * putPrice;
                            var akhir = qtyReq * putPrice;
                            var status = $('#status').val();

                            qtyCek = qtyReq;

                            if(status == "Miscellaneous"){
                                if (qtyReq == '') {
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                    $("#saveArfList").prop("disabled", true);
                                } else if (akhir > totalBalance) {
                                    Swal.fire("Error !", "Your Request Is Over Budget", "error");
                                    $("#lastQty").val(qty);
                                    $('#totalAkhir').html(0);
                                    $("#saveArfList").prop("disabled", true);
                                } else {
                                    var totalReq = parseFloat(akhir);
                                    $('#totalAkhir').html(totalReq);
                                    $("#saveArfList").prop("disabled", false);
                                }
                            }
                            else{
                                if (qtyReq == '') {
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                    $("#saveArfList").prop("disabled", true);
                                } else if (qtyReq > putQty) {
                                    Swal.fire("Error !", "Your Qty Request is Over", "error");
                                    $("#lastQty").val(qty);
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                    $("#saveArfList").prop("disabled", true);
                                } else if (akhir > awal) {
                                    Swal.fire("Error !", "Your Request Is Over Budget", "error");
                                    $("#lastQty").val(qty);
                                    $('#totalAkhir').html(0);
                                    $("#saveArfList").prop("disabled", true);
                                } else {
                                    var totalReq = parseFloat(akhir);
                                    $('#totalAkhir').html(totalReq);
                                    $("#saveArfList").prop("disabled", false);
                                }
                            }

                        });

                        $('.ChangePrices').keyup(function() {
                            var priceReq = $(this).val().replace(/[^a-zA-Z0-9 ]/g, "");
                            if (priceReq == 0 || priceReq == '') {
                                priceReq = 0;
                            }
                            
                            var total = qtyCek * priceReq;
                            var total2 = qtyCek * putPrice;
                            var status = $('#status').val();

                            if(status == "Miscellaneous"){    
                                if (priceReq == '') {
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                    $('#totalAkhir').html(0);

                                } else if (total > totalBalance) {
                                    Swal.fire("Error !", "Your Request Price Is Over Budget", "error");
                                    $("#priceCek").val(0);
                                    $('#totalAkhir').html(0);
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                } else {
                                    var totalReq = total;
                                    $('#totalAkhir').html(totalReq);
                                    $("#addFromDetailtoCart").prop("disabled", false);
                                }
                            }
                            else{
                                
                                if (priceReq == '') {
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                    $('#totalAkhir').html(0);

                                }  
                                else if (priceReq > putPrice) {
                                    Swal.fire("Error !", "Your Price Is Over Budget", "error");
                                    $("#priceCek").val(0);
                                    $('#totalAkhir').html(0);
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                } 
                                else if (total > total2) {
                                    Swal.fire("Error !", "Your Request Price Is Over Budget", "error");
                                    $("#priceCek").val(0);
                                    $('#totalAkhir').html(0);
                                    $("#addFromDetailtoCart").prop("disabled", true);
                                }else {
                                    var totalReq = total;
                                    $('#totalAkhir').html(totalReq);
                                    $("#addFromDetailtoCart").prop("disabled", false);
                                }
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
            $("#qtyCek").css    ("border", "1px solid #ced4da");
            $("#putUom").css    ("border", "1px solid #ced4da");

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

            $("#iconProductId").hide();
            $("#iconQty").hide();
            $("#iconRemark").hide();
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

            var status = $('#status').val();

            if(status == "Miscellaneous"){
                if (qtyReq == '') {
                $("#addFromDetailtoCart").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
                $('#totalArfDetails').val(0);

                } else if (total2 > total) {
                    Swal.fire("Error !", "Your Request Is Over Budget", "error");
                    $('#totalArfDetails').val(0);
                    $("#addFromDetailtoCart").prop("disabled", true);
                } else {
                    var totalReq = parseFloat(total2);
                    $('#totalArfDetails').val(totalReq);
                    $("#addFromDetailtoCart").prop("disabled", false);
                }
            }
            else{
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
            var totalBalance = $("#totalBalance").val();
            
            var status = $('#status').val();

            if(status == "Miscellaneous"){    
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