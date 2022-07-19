<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailPieceMealList").hide();
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

        $("#submitPR").prop("disabled", true);
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


<script type="text/javascript">
    $(document).ready(function() {
        $(".CancelDetailPieceMeal").click(function() {
            let product_id = $("#putProductId").val();
            let putProductName = $("#putProductName").val();
            let qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
            let putUom = $("#putUom").val();
            let priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
            let putCurrency = $("#putCurrency").val();
            let totalPrDetails = $("#totalPrDetails").val().replace(/^\s+|\s+$/g, '');
            let putRemark = $("#putRemark").val();
            let totalBalance = $("#totalBalance").val();
            let putPrice = $('#putPrice').val();
            let statusEditPr = $("#statusEditPr").val();
            if (statusEditPr == "Yes") {
                var html = '<tr>' +
                    '<td>' +
                    '&nbsp;<button type="button" class="btn btn-xs RemoveProcurementRequest" data-id1="' + product_id + '"><img src="AdminLTE-master/dist/img/delete.png" width="25" alt="" title="Remove" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></button> ' +
                    '<button type="button" class="btn btn-xs EditProcurementRequest" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + totalPrDetails + '" data-id8="' + putRemark + '" data-id9="' + totalBalance + '"><img src="AdminLTE-master/dist/img/edit.png" width="25" alt="" title="Edit" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></button> ' +
                    '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                    '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                    '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                    '<input type="hidden" name="var_remark[]" value="' + putRemark + '">' +
                    '</td>' +
                    '<td>' + product_id + '</td>' +
                    '<td>' + putProductName + '</td>' +
                    '<td>' + qtyCek + '</td>' +
                    '<td>' + putUom + '</td>' +
                    '<td>' + priceCek + '</td>' +
                    '<td>' + totalPrDetails + '</td>' +
                    '<td>' + putCurrency + '</td>' +
                    '<td>' + putRemark + '</td>' +
                    '</tr>';
                $('table.tableProcurementRequest tbody').append(html);
                $("#statusEditPr").val("No");
            }
            $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
            $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);
            $("#putProductId").css("border", "1px solid #ced4da");

            $("#putProductId").val("");
            $("#putProductName").val("");
            $("#qtyCek").val("");
            $("#putUom").val("");
            $("#priceCek").val("");
            $("#putCurrency").val("");
            $("#totalBalance").val("");
            $("#totalPrDetails").val("");
            $("#putRemark").val("");
        });
    });
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function addFromDetailtoCartJs() {

        var valProductId = $("#putProductId").val();
        var valQty = $("#qtyCek").val();
        var valPrice = $("#priceCek").val();

        $("#putProductId").css("border", "1px solid #ced4da");

        if (valProductId === "") {
            $("#putProductId").focus();
            $("#putProductId").attr('required', true);
            $("#putProductId").css("border", "1px solid red");
        } else if (valQty === "") {
            $("#qtyCek").focus();
            $("#qtyCek").attr('required', true);
            $("#qtyCek").css("border", "1px solid red");
        } else if (valPrice === "") {
            $("#priceCek").focus();
            $("#priceCek").attr('required', true);
            $("#priceCek").css("border", "1px solid red");
        } else {
            $.ajax({
                type: "POST",
                url: '{!! route("PieceMeal.StoreValidatePieceMeal") !!}?putProductId=' + $('#putProductId').val(),
                success: function(data) {

                    if (data == "200") {

                        $("#product_id2").prop("disabled", true);

                        var product_id = $("#putProductId").val();
                        var putProductName = $("#putProductName").val();
                        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
                        var putUom = $("#putUom").val();
                        var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
                        var putCurrency = $("#putCurrency").val();
                        var totalPieceMealDetails = $("#totalPieceMealDetails").val().replace(/^\s+|\s+$/g, '');
                        var putRemark = $("#putRemark").val();
                        var totalBalance = $("#totalBalance").val();
                        var putPrice = $('#putPrice').val();
                        var html = '<tr>' +
                            '<td>' +
                            '&nbsp;<button type="button" class="btn btn-xs RemoveProcurementRequest" data-id1="' + product_id + '"><img src="AdminLTE-master/dist/img/delete.png" width="25" alt="" title="Remove" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></button> ' +
                            '<button type="button" class="btn btn-xs EditProcurementRequest" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + totalPieceMealDetails + '" data-id8="' + putRemark + '" data-id9="' + totalBalance + '"><img src="AdminLTE-master/dist/img/edit.png" width="25" alt="" title="Edit" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></button> ' +
                            '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                            '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                            '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                            '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                            '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                            '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                            '<input type="hidden" name="var_remark[]" value="' + putRemark + '">' +
                            '</td>' +
                            '<td>' + product_id + '</td>' +
                            '<td>' + putProductName + '</td>' +
                            '<td>' + qtyCek + '</td>' +
                            '<td>' + putUom + '</td>' +
                            '<td>' + priceCek + '</td>' +
                            '<td>' + totalPieceMealDetails + '</td>' +
                            '<td>' + putCurrency + '</td>' +
                            '<td>' + putRemark + '</td>' +
                            '</tr>';
                        $('table.tableProcurementRequest tbody').append(html);
                        $("#statusEditPr").val("No");

                        $("body").on("click", ".RemoveProcurementRequest", function() {
                            $(this).closest("tr").remove();
                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("PieceMeal.StoreValidatePieceMeal2") !!}?putProductId=' + ProductId,
                            });
                        });
                        $("body").on("click", ".EditProcurementRequest", function() {
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
                                url: '{!! route("PieceMeal.StoreValidatePieceMeal2") !!}?putProductId=' + id1,
                            });

                            $("#putProductId").val(id1);
                            $("#putProductName").val(id2);
                            $('#qtyCek').val(id3);
                            $("#putUom").val(id4);
                            $("#priceCek").val(id5);
                            $("#putCurrency").val(id6);
                            $("#totalPieceMealDetails").val(id7);
                            $("#putRemark").val(id8);
                            $("#totalBalance").val(id9);
                            $("#statusEditPr").val("Yes");

                            $(this).closest("tr").remove();

                            if (id10 == "Yes") {
                                $("#product_id2").prop("disabled", false);
                            } else {
                                $("#product_id2").prop("disabled", true);
                            }
                        });

                        $("#putProductId").val("");
                        $("#putProductName").val("");
                        $("#putUom").val("");
                        $("#qtyCek").val("");
                        $("#priceCek").val("");
                        $("#putCurrency").val("");
                        $("#putRemark").val("");
                        $("#totalPieceMealDetails").val("");
                        $("#totalBalance").val("");

                        $("#iconProductId").hide();
                        $("#iconQty").hide();
                        $("#iconRemark").hide();
                        $("#iconProductId2").hide();
                        $("#iconQty2").hide();
                        $("#iconRemark2").hide();

                        $("#saveArfList").prop("disabled", false);
                        $("#submitPR").prop("disabled", false);

                        $("#tableShowHideBOQ1").find("input,button,textarea,select").attr("disabled", false);
                        $("#tableShowHideBOQ3").find("input,button,textarea,select").attr("disabled", false);
                        $("#detailProcurementRequestList").show();

                        $("#qtyCek").attr('required', false);
                        $("#putProductId").attr('required', false);
                        $("#priceCek").attr('required', false);
                    } else {
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });
        }
    }
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
            if (parseFloat(qtyReq) == '') {
                $('#totalPieceMealDetails').val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Qty Request is Over", "error");
                $("#qtyCek").val(0);
                $('#totalPieceMealDetails').val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(total2) > parseFloat(total)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $('#totalPieceMealDetails').val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else {
                var totalReq = parseFloat(total2);
                $('#totalPieceMealDetails').val(parseFloat(totalReq).toFixed(2));
                $("#qtyCek").css("border", "1px solid #ced4da");
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
                $("#priceCek").css("border", "1px solid red");
                $('#totalPieceMealDetails').val(0);

            } else if (parseFloat(total) > parseFloat(total2)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#priceCek").val(0);
                $('#totalPieceMealDetails').val(0);
                $("#priceCek").css("border", "1px solid red");
            } else {
                var totalReq = total;
                $('#totalPieceMealDetails').val(parseFloat(totalReq).toFixed(2));
                $("#priceCek").css("border", "1px solid #ced4da");
            }

        });
    });
</script>

<script>
    $(function() {
      $("#FormSubmitPieceMeal").on("submit", function(e) { //id of form 
        e.preventDefault();

        var action = $(this).attr("action"); //get submit action from form
        var method = $(this).attr("method"); // get submit method
        var form_data = new FormData($(this)[0]); // convert form into formdata 
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
                        
                        $("#loading").hide();
                        $(".loader").hide();
                    
                        swalWithBootstrapButtons.fire({

                            title: 'Successful !',
                            type: 'success',
                            html:'Data has been saved. Your transaction number is '+'<span style="color:red;">'+response.advnumber+'</span>',
                            showCloseButton: false,
                            showCancelButton: false,
                            focusConfirm: false,
                            confirmButtonText:'<span style="color:black;"> Ok </span>',
                            confirmButtonColor: '#4B586A',
                            confirmButtonColor: '#e9ecef',
                            reverseButtons: true
                            }).then((result) => {
                            if (result.value) {
                                $("#loading").show();
                                $(".loader").show();
                                location.reload();
                            }
                        })
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
      });

    });
</script>

<script>
    $('#qtyCek').on('blur', function() {
        var amount = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
        if (($('#qtyCek').val() != '') && (!amount.match(/^$/))) {
            $('#qtyCek').val(parseFloat(amount).toFixed(2));
        }
    });

    $('#priceCek').on('blur', function() {
        var price = $('#priceCek').val().replace(/^\s+|\s+$/g, '');
        if (($('#priceCek').val() != '') && (!price.match(/^$/))) {
            $('#priceCek').val(parseFloat(price).toFixed(2));
        }
    });
</script>

<script type="text/javascript">
    function CancelProcurementRequest() {
        $("#loading").show();
        $(".loader").show();
        location.reload();
    }
</script>