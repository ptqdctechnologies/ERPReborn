<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        // $("#detailArfList").hide();
        // $("#detailTransAvail").hide();
        $("#projectcode2").prop("disabled", true);
        $("#sitecode2").prop("disabled", true);
        // $("#request_name2").prop("disabled", true);
        $("#addFromDetailtoCart").prop("disabled", true);
        $("#showContentBOQ3").hide();
        // $("#tableShowHideBOQ3").hide();

        $("#iconProductId2").hide();
        $("#iconQty2").hide();
        $("#iconUnitPrice2").hide();
        $("#iconRemark2").hide();
        $("#product_id2").prop("disabled", true);

        $("#submitArf").prop("disabled", true);
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".cancelDetailArf").click(function() {
            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);

            $("#putProductId").val("");
            $("#putProductName").val("");
            $("#qtyCek").val("0");
            $("#putUom").val("");
            $("#priceCek").val("0");
            $("#putCurrency").val("");
            $("#totalBalance").val("0");
            
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
    $('#addFromDetailtoCart').click(function(ev){
        ev.preventDefault();
        ev.stopPropagation();

        var val = $("#putProductId").val();
        if(val != ""){
            $.ajax({
                type: "POST",
                url: '{!! route("ARF.StoreValidateArf") !!}?putProductId=' + $('#putProductId').val(),
                success: function(data) {

                    if(data == "200"){

                        $("#product_id2").prop("disabled", true);

                        var product_id = $("#putProductId").val();
                        var putProductName = $("#putProductName").val();
                        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
                        var putUom = $("#putUom").val();
                        var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
                        var putCurrency = $("#putCurrency").val();
                        var totalArfDetails = $("#totalArfDetails").val().replace(/^\s+|\s+$/g, '');
                        var putRemark = $("#putRemark").val();
                        var totalBalance = $("#totalBalance").val();
                        var putPrice = $('#putPrice').val();
                        var combinedBudget = $("#combinedBudget").val();
                        var statusProduct = $("#statusProduct").val();
                        var html = '<tr>'+
                                    '<td>'+
                                        '<button type="button" class="btn btn-warning btn-xs edit" data-dismiss="modal" data-id1="'+product_id+'" data-id2="'+putProductName+'" data-id3="'+qtyCek+'" data-id4="'+putUom+'" data-id5="'+priceCek+'" data-id6="'+putCurrency+'" data-id7="'+totalArfDetails+'" data-id8="'+putRemark+'" data-id9="'+totalBalance+'" data-id10="'+statusProduct+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                                        '<input type="hidden" name="var_product_id[]" value="'+product_id+'">'+
                                        '<input type="hidden" name="var_product_name[]" id="var_product_name" value="'+putProductName+'">'+
                                        '<input type="hidden" name="var_quantity[]" value="'+qtyCek+'">'+
                                        '<input type="hidden" name="var_uom[]" value="'+putUom+'">'+
                                        '<input type="hidden" name="var_price[]" value="'+priceCek+'">'+
                                        '<input type="hidden" name="var_totalPrice[]" value="'+(priceCek * qtyCek)+'">'+
                                        '<input type="hidden" name="var_currency[]" value="'+putCurrency+'">'+
                                        '<input type="hidden" name="var_combinedBudget[]" value="'+combinedBudget+'">'+
                                        '<input type="hidden" name="var_statusProduct[]" value="'+statusProduct+'">'+
                                    '</td>'+
                                    '<td>'+product_id+'</td>'+
                                    '<td>'+putProductName+'</td>'+
                                    '<td>'+qtyCek+'</td>'+
                                    '<td>'+putUom+'</td>'+
                                    '<td>'+priceCek+'</td>'+
                                    '<td>'+totalArfDetails+'</td>'+
                                    '<td>'+putCurrency+'</td>'+
                                '</tr>';
                        $('table.tableArf tbody').append(html);

                        $("body").on("click", ".remove", function () {
                            $(this).closest("tr").remove();
                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("ARF.StoreValidateArf2") !!}?putProductId=' + ProductId,
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
                            console.log(id10);

                            $.ajax({
                                type: "POST",
                                url: '{!! route("ARF.StoreValidateArf2") !!}?putProductId=' + id1,
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

                            if(id10 == "Yes"){
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
                    else{
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });   
        }
        else{
            Swal.fire("Error !", "Data Cannot Empty", "error");
        }
    });
});
</script>


<script type="text/javascript">
    
    //GET ARF LIST 
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var val = $("#var_recordID").val();

    $.ajax({
        type: "POST",
        url: '{!! route("ARF.AdvanceListCartRevision") !!}?putProductId=' + val,
        success: function(data) {

            $.each(data, function(key, value) {
                $("#product_id2").prop("disabled", true);
                var combinedBudget = $("#combinedBudget").val();
                var statusProduct = $("#statusProduct").val();
                    var html = 
                        '<tr>'+
                            '<td>'+
                                '<button type="button" class="btn btn-warning btn-xs edit" data-dismiss="modal" data-id1="'+value.product_RefID+'" data-id2="'+value.productName+'" data-id3="'+value.quantity+'" data-id4="'+value.quantityUnitName+'" data-id5="'+value.productUnitPriceCurrencyValue+'" data-id6="'+value.priceCurrencyISOCode+'" data-id7="'+value.remarks+'" data-id8="'+value.priceBaseCurrencyValue+'" data-id9="'+statusProduct+'"><i class="fa fa-edit" style="color:white;"></i></button> '+
                                '<input type="hidden" name="var_product_id[]" value="'+value.product_RefID+'">'+
                                '<input type="hidden" name="var_product_name[]" id="var_product_name" value="'+value.productName+'">'+
                                '<input type="hidden" name="var_quantity[]" value="'+value.quantity+'">'+
                                '<input type="hidden" name="var_uom[]" value="'+value.quantityUnitName+'">'+
                                '<input type="hidden" name="var_price[]" value="'+value.productUnitPriceCurrencyValue+'">'+
                                '<input type="hidden" name="var_totalPrice[]" value="'+(priceCek * qtyCek)+'">'+
                                '<input type="hidden" name="var_currency[]" value="'+value.priceCurrencyISOCode+'">'+
                                '<input type="hidden" name="var_combinedBudget[]" value="'+combinedBudget+'">'+
                                '<input type="hidden" name="var_statusProduct[]" value="'+statusProduct+'">'+
                            '</td>'+
                            '<td>'+value.product_RefID+'</td>'+
                            '<td>'+value.productName+'</td>'+
                            '<td>'+value.quantity+'</td>'+
                            '<td>'+value.quantityUnitName+'</td>'+
                            '<td>'+value.productUnitPriceCurrencyValue+'</td>'+
                            '<td>'+value.priceBaseCurrencyValue+'</td>'+
                            '<td>'+value.priceCurrencyISOCode+'</td>'+
                        '</tr>';
            
                    $('table.tableArf tbody').append(html);
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
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                
                $.ajax({
                    type: "POST",
                    url: '{!! route("ARF.StoreValidateArf2") !!}?putProductId=' + id1,
                });

                $("#putProductId").val(id1);
                $("#putProductName").val(id2);
                $('#qtyCek').val(id3);
                $("#putUom").val(id4);
                $("#priceCek").val(id5);
                $("#putCurrency").val(id6);
                $("#totalArfDetails").val(id8);
                $("#totalBalance").val(id8);

                $(this).closest("tr").remove();

                if(id9 == "Yes"){
                    $("#product_id2").prop("disabled", false);
                }
                else{
                    $("#product_id2").prop("disabled", true);
                }
            });

            $("#putProductId").val("");
            $("#putProductName").val("");
            $("#qtyCek").val("0");
            $("#putUom").val("");
            $("#priceCek").val("0");
            $("#putCurrency").val("");
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
        
        },
    });

    //GET BUDGET

    $.ajax({
        type: 'GET',
        url: '{!! route("getSite") !!}?sitecode=' + 143000000000029 + '&var=' + 1,
        
        success: function(data) {    
            var no = 1;
            $.each(data, function(key, value2) {
                var html = '<tr>'+
                            '<td>'+
                                '<button type="reset" class="btn btn-outline-success btn-sm float-right klikBudgetDetail" data-id1="' + value2.product_RefID + '" data-id2="' + value2.quantity + '" data-id3="' + value2.unitPriceBaseCurrencyValue + '" data-id4="' + value2.sys_ID + '" data-id5="' + value2.productName + '" data-id6="' + value2.quantityUnitName + '" data-id7="' + value2.priceBaseCurrencyISOCode + '" title="Submit" style="border-radius: 100px;"><i class="fas fa-plus" aria-hidden="true"></i></button>'+
                            '</td>'+
                            '<td>'+
                                '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>'+
                            '</td>'+
                            '<td>'+'<span id="getWorkId">' + value2.combinedBudgetSubSectionLevel1_RefID + '</span>'+'</td>'+
                            '<td>'+'<span id="getWorkName">' + value2.combinedBudgetSubSectionLevel2Name + '</span>'+'</td>'+
                            '<td>'+'<span id="getProductId">' + value2.product_RefID + '</span>'+'</td>'+
                            '<td>'+'<span id="getProductName">' + value2.productName + '</span>'+'</td>'+
                            '<td>'+'<span id="getQty">' + 'N/A' + '</span>'+'</td>'+
                            '<td>'+'<span id="getQty2">' + value2.quantity + '</span>'+'</td>'+
                            '<td>'+'<span id="getPrice">' + value2.unitPriceBaseCurrencyValue + '</span>'+'</td>'+
                            '<td>'+'<span id="totalArf">' + value2.priceBaseCurrencyValue + '</span>'+'</td>'+
                            '<td>'+'<span id="getUom">' + value2.quantityUnitName + '</span>'+'</td>'+
                            '<td>'+'<span id="getCurrency">' + value2.priceBaseCurrencyISOCode + '</span>'+'</td>'+
                        '</tr>';
                        
                $('table.tableBudgetDetail tbody').append(html);
            });

            $('.klikBudgetDetail').on('click', function(e){
                e.preventDefault();
                var $this = $(this);
                var price = $this.data("id3");
                var productId = $this.data("id1");
                var qty = $this.data("id2");
                var combinedBudget = $this.data("id4");
                var productName = $this.data("id5");
                var uom = $this.data("id6");
                var currency = $this.data("id7");
                
                if(productName == "Unspecified Product"){
                    $("#product_id2").prop("disabled", false);
                    var putProductName = "";
                    var putProductId = "";
                    $("#statusProduct").val("Yes");
                }
                else{
                    $("#product_id2").prop("disabled", true);
                    var putProductName = productName;
                    var putProductId = productId;
                    $("#statusProduct").val("No");
                }
                $("#putProductId").val(putProductId);
                $("#putProductName").val(putProductName);
                $("#putQty").val(qty);
                $("#putUom").val(uom);
                $("#putPrice").val(price);
                $("#putCurrency").val(currency);
                $("#totalBalance").val(parseFloat(qty * price).toFixed(2));
                $("#combinedBudget").val(combinedBudget);


                $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", true);
                $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", true);
                $("#addFromDetailtoCart").prop("disabled", true);
                $(".available").show();
                $("#detailTransAvail").show();
                $("#putProductId2").prop("disabled", true);
            });
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: 'GET',
                url: '{!! route("getSite") !!}?sitecode=' + 143000000000029 + '&var=' + 1,
                
                success: function(data) {    
                    var no = 1;
                    $.each(data, function(key, value3) {
                        var putProductId = $('#putProductId').val();
                        if(putProductId == value3.product_RefID){
                            var putQty = value3.quantity;
                            console.log(putQty);    
                        }
                    });
                }
            });
            
            var priceCek = $('#priceCek').val();
            var total = putQty * priceCek;
            var total2 = qtyReq * priceCek;
            if (parseFloat(qtyReq) == '') {
                $("#addFromDetailtoCart").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
                $('#totalArfDetails').val(0);

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
                $('#totalArfDetails').val(parseFloat(totalReq).toFixed(2));
                $("#addFromDetailtoCart").prop("disabled", false);
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
            var qtyCek = $('#qtyCek').val();
            var putPrice = $('#putPrice').val();
            var total = qtyCek * priceReq;
            var total2 = qtyCek * putPrice;
            var totalBalance = $("#totalBalance").val();

            if (priceReq == '') {
                $("#addFromDetailtoCart").prop("disabled", true);
                $('#totalArfDetails').val(0);

            } else if (parseFloat(total) > parseFloat(total2)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#priceCek").val(0);
                $('#totalArfDetails').val(0);
                $("#addFromDetailtoCart").prop("disabled", true);
            } else {
                var totalReq = total;
                $('#totalArfDetails').val(parseFloat(totalReq).toFixed(2));
                $("#addFromDetailtoCart").prop("disabled", false);
            }

        });
    });
</script>
<!-- 
<script type="text/javascript">
    $(document).ready(function() {
        // Format mata uang.
        $('.uang').mask('000.000.000.000', {
            reverse: true
        });
        // $( '.quantity' ).mask('000.000.000', {reverse: true});
    })
</script> -->


<script>
    $('#qtyCek').on('blur', function() {
    var amount = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
    if( ($('#qtyCek').val() != '') && (!amount.match(/^$/) )){
        $('#qtyCek').val( parseFloat(amount).toFixed(2));
    }
    });

    $('#priceCek').on('blur', function() {
    var price = $('#priceCek').val().replace(/^\s+|\s+$/g, '');
    if( ($('#priceCek').val() != '') && (!price.match(/^$/) )){
        $('#priceCek').val( parseFloat(price).toFixed(2));
    }
    });
    
</script>

<script>
    $(document).ready(function() {
        $("#formUpdateArf").validate({
            rules: {
                projectcode: "required",
                sitecode: "required",
                request_name: "required",
                putRemark: "required",
            },
            messages: {
                projectcode: "<span title='Please Enter Projec Name ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                sitecode: "<span title='Please Enter Site Name ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                request_name: "<span title='Please Enter Beneficiary ' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
                putRemark: "<span title='Please Enter Internal Notes' style='color:red;font-size:10px;'>&nbsp!&nbsp</span>",
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