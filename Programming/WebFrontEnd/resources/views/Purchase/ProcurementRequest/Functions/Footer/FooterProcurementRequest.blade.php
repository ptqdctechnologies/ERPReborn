<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailProcurementRequestList").hide();
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
        $(".CancelDetailProcurementRequest").click(function() {
            let product_id = $("#putProductId").val();
            let putProductName = $("#putProductName").val();
            let qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
            let putUom = $("#putUom").val();
            let priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
            let putCurrency = $("#putCurrency").val();
            let totalProcReqDetails = $("#totalProcReqDetails").val().replace(/^\s+|\s+$/g, '');
            let putRemark = $("#putRemark").val();
            let totalBalance = $("#totalBalance").val();
            let putPrice = $('#putPrice').val();
            let combinedBudget = $("#combinedBudget").val();
            let statusEditPr = $("#statusEditPr").val();
            if (statusEditPr == "Yes") {
                
                qtyCek = $('#ValidateQuantity').val().replace(/^\s+|\s+$/g, '');
                priceCek = $("#ValidatePrice").val().replace(/^\s+|\s+$/g, '');
                totalProcReqDetails = parseFloat(qtyCek * priceCek).toFixed(2);
                putRemark = $("#putRemark2").val();

                var html = '<tr>' +
                    '<td>' +
                    '&nbsp;<button type="button" class="btn btn-xs RemoveProcurementRequest" data-id1="' + product_id + '"><img src="AdminLTE-master/dist/img/delete.png" width="25" alt="" title="Remove" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></button> ' +
                    '<button type="button" class="btn btn-xs EditProcurementRequest" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + totalProcReqDetails + '" data-id8="' + putRemark + '" data-id9="' + totalBalance + '"><img src="AdminLTE-master/dist/img/edit.png" width="25" alt="" title="Edit" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></button> ' +
                    '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                    '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                    '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                    '<input type="hidden" name="var_remark[]" value="' + putRemark + '">' +
                            '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +
                    '</td>' +
                    '<td>' + product_id + '</td>' +
                    '<td>' + putProductName + '</td>' +
                    '<td>' + qtyCek + '</td>' +
                    '<td>' + putUom + '</td>' +
                    '<td>' + priceCek + '</td>' +
                    '<td>' + totalProcReqDetails + '</td>' +
                    '<td>' + putCurrency + '</td>' +
                    '<td>' + putRemark + '</td>' +
                    '</tr>';
                $('table.TableProcurementRequest tbody').append(html);
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
            $("#totalProcReqDetails").val("");
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
        var valRemark = $("#putRemark").val();

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
        } else if (valRemark === "") {
            $("#putRemark").focus();
            $("#putRemark").attr('required', true);
            $("#putRemark").css("border", "1px solid red");
        } else {
            $.ajax({
                type: "POST",
                url: '{!! route("ProcurementRequest.StoreValidateProcurementRequest") !!}?putProductId=' + $('#putProductId').val(),
                success: function(data) {

                    if (data == "200") {

                        $("#product_id2").prop("disabled", true);

                        var product_id = $("#putProductId").val();
                        var putProductName = $("#putProductName").val();
                        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
                        var putUom = $("#putUom").val();
                        var priceCek = $("#priceCek").val().replace(/^\s+|\s+$/g, '');
                        var putCurrency = $("#putCurrency").val();
                        var totalProcReqDetails = $("#totalProcReqDetails").val().replace(/^\s+|\s+$/g, '');
                        var putRemark = $("#putRemark").val();
                        var totalBalance = $("#totalBalance").val();
                        var combinedBudget = $("#combinedBudget").val();
                        var putPrice = $('#putPrice').val();
                        var html = '<tr>' +
                            '<td>' +
                            '&nbsp;<button type="button" class="btn btn-xs RemoveProcurementRequest" data-id1="' + product_id + '"><img src="AdminLTE-master/dist/img/delete.png" width="25" alt="" title="Remove" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></button> ' +
                            '<button type="button" class="btn btn-xs EditProcurementRequest" data-dismiss="modal" data-id1="' + product_id + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + priceCek + '" data-id6="' + putCurrency + '" data-id7="' + totalProcReqDetails + '" data-id8="' + putRemark + '" data-id9="' + totalBalance + '"><img src="AdminLTE-master/dist/img/edit.png" width="25" alt="" title="Edit" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></button> ' +
                            '<input type="hidden" name="var_product_id[]" value="' + product_id + '">' +
                            '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + qtyCek + '">' +
                            '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                            '<input type="hidden" name="var_price[]" value="' + priceCek + '">' +
                            '<input type="hidden" name="var_totalPrice[]" value="' + (priceCek * qtyCek) + '">' +
                            '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                            '<input type="hidden" name="var_remark[]" value="' + putRemark + '">' +
                            '<input type="hidden" name="var_combinedBudget[]" value="' + combinedBudget + '">' +
                            '</td>' +
                            '<td>' + product_id + '</td>' +
                            '<td>' + putProductName + '</td>' +
                            '<td>' + qtyCek + '</td>' +
                            '<td>' + putUom + '</td>' +
                            '<td>' + priceCek + '</td>' +
                            '<td>' + totalProcReqDetails + '</td>' +
                            '<td>' + putCurrency + '</td>' +
                            '<td>' + putRemark + '</td>' +
                            '</tr>';
                        $('table.TableProcurementRequest tbody').append(html);
                        $("#statusEditPr").val("No");

                        $("body").on("click", ".RemoveProcurementRequest", function() {
                            $(this).closest("tr").remove();
                            var ProductId = $(this).data("id1");
                            $.ajax({
                                type: "POST",
                                url: '{!! route("ProcurementRequest.StoreValidateProcurementRequest2") !!}?putProductId=' + ProductId,
                            });
                        });
                        $("body").on("click", ".EditProcurementRequest", function() {
                            var $this = $(this);

                            $.ajax({
                                type: "POST",
                                url: '{!! route("ProcurementRequest.StoreValidateProcurementRequest2") !!}?putProductId=' + $this.data("id1"),
                            });

                            $("#putProductId").val($this.data("id1"));
                            $("#putProductName").val($this.data("id2"));
                            $("#qtyCek").val($this.data("id3"));
                            $("#ValidateQuantity").val($this.data("id3"));
                            $("#putUom").val($this.data("id4"));
                            $("#priceCek").val($this.data("id5"));
                            $("#ValidatePrice").val($this.data("id5"));
                            $("#putCurrency").val($this.data("id6"));
                            $("#putRemark").val($this.data("id8"));
                            $("#putRemark2").val($this.data("id8"));
                            $("#totalProcReqDetails").val($this.data("id7"));
                            $("#totalBalance").val($this.data("id9"));
                            $("#statusEditPr").val("Yes");

                            $(this).closest("tr").remove();

                            if ($this.data("id10") == "Yes") {
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
                        $("#totalProcReqDetails").val("");
                        $("#totalBalance").val("");

                        $("#iconProductId").hide();
                        $("#iconQty").hide();
                        $("#iconRemark").hide();
                        $("#iconProductId2").hide();
                        $("#iconQty2").hide();
                        $("#iconRemark2").hide();
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
            var putQty = $('#putQty').val();
            var priceCek = $('#priceCek').val();
            var total = putQty * priceCek;
            var total2 = qtyReq * priceCek;

            if (parseFloat(qtyReq) == '') {
                $('#totalProcReqDetails').val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Qty Request is Over", "error");
                $("#qtyCek").val(0);
                $('#totalProcReqDetails').val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(total2) > parseFloat(total)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $('#totalProcReqDetails').val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else {
                var totalReq = parseFloat(total2);
                $('#totalProcReqDetails').val(parseFloat(totalReq).toFixed(2));
                $("#qtyCek").css("border", "1px solid #ced4da");
            }
        });
    });
</script>

<script>
    $('document').ready(function() {
        $('.ChangePrice').keyup(function() {

            var priceReq = $(this).val();
            var qtyCek = $('#qtyCek').val();
            var putPrice = $('#putPrice').val();
            var total = qtyCek * priceReq;
            var total2 = qtyCek * putPrice;
            var totalBalance = $("#totalBalance").val();

            if (priceReq == '') {
                $("#priceCek").css("border", "1px solid red");
                $('#totalProcReqDetails').val(0);

            } else if (parseFloat(total) > parseFloat(total2)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#priceCek").val(0);
                $('#totalProcReqDetails').val(0);
                $("#priceCek").css("border", "1px solid red");
            } else {
                var totalReq = total;
                $('#totalProcReqDetails').val(parseFloat(totalReq).toFixed(2));
                $("#priceCek").css("border", "1px solid #ced4da");
            }

        });
    });
</script>

<script>
    $(function() {
      $("#FormSubmitProcReq").on("submit", function(e) { //id of form 
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

                        location.reload();
                    
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
