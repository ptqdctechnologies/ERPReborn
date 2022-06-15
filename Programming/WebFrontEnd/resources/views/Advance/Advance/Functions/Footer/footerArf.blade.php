<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#detailArfList").hide();
        $("#detailTransAvail").hide();
        $("#sitecode2").prop("disabled", true);
        $("#request_name2").prop("disabled", true);
        $("#request_name").prop("readonly", true);
        // $("#addFromDetailtoCart").prop("disabled", true);

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

<script type="text/javascript">
    $(document).ready(function() {
        $(".cancelDetailArf").click(function() {
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

        if(valProductId === ""){
            $("#putProductId").focus();
            $("#putProductId").attr('required', true);
            $("#putProductId").css("border", "1px solid red");
        }
        else if(valQty === ""){
            $("#qtyCek").focus();
            $("#qtyCek").attr('required', true);
            $("#qtyCek").css("border", "1px solid red");
        }
        else if(valPrice === ""){
            $("#priceCek").focus();
            $("#priceCek").attr('required', true);
            $("#priceCek").css("border", "1px solid red");
        }
        else{
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
                                        '<button type="button" class="btn btn-danger btn-xs remove" data-id1="'+product_id+'"><i class="fa fa-trash"></i></button> '+
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

                        $("#putProductId").val("");
                        $("#putProductName").val("");
                        $("#putUom").val("");
                        $("#qtyCek").val("");
                        $("#priceCek").val("");
                        $("#putCurrency").val("");
                        $("#putRemark").val("");
                        $("#totalArfDetails").val("");
                        $("#totalBalance").val("");

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

                        $("#qtyCek").attr('required', false);
                        $("#putProductId").attr('required', false);
                        $("#priceCek").attr('required', false);
                    }
                    else{
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });   
        }
    }
</script>

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
                // $("#addFromDetailtoCart").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
                $('#totalArfDetails').val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Qty Request is Over", "error");
                $("#qtyCek").val(0);
                $('#totalArfDetails').val(0);
                // $("#addFromDetailtoCart").prop("disabled", true);
                $("#saveArfList").prop("disabled", true);
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(total2) > parseFloat(total)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $('#totalArfDetails').val(0);
                // $("#addFromDetailtoCart").prop("disabled", true);
                $("#qtyCek").css("border", "1px solid red");
            } else {
                var totalReq = parseFloat(total2);
                $('#totalArfDetails').val(parseFloat(totalReq).toFixed(2));
                // $("#addFromDetailtoCart").prop("disabled", false);
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
                // $("#addFromDetailtoCart").prop("disabled", true);
                $('#totalArfDetails').val(0);
                $("#priceCek").css("border", "1px solid red");

            } else if (parseFloat(total) > parseFloat(total2)) {
                Swal.fire("Error !", "Your Request Is Over Budget", "error");
                $("#priceCek").val(0);
                $('#totalArfDetails').val(0);
                // $("#addFromDetailtoCart").prop("disabled", true);
                $("#priceCek").css("border", "1px solid red");
            } else {
                var totalReq = total;
                $('#totalArfDetails').val(parseFloat(totalReq).toFixed(2));
                // $("#addFromDetailtoCart").prop("disabled", false);
                $("#priceCek").css("border", "1px solid #ced4da");
            }

        });
    });
</script>

<script>
    $(function() {
      $("#formUpdateArf").on("submit", function(e) { //id of form 
        e.preventDefault();

        var valRequestName = $("#request_name").val();
        var valRemark = $("#putRemark").val();
        $("#request_name").css("border", "1px solid #ced4da");
        $("#putRemark").css("border", "1px solid #ced4da");

        if(valRequestName === ""){
            $("#request_name").focus();
            $("#request_name").attr('required', true);
            $("#request_name").css("border", "1px solid red");
        }
        else if(valRemark === ""){
            $("#putRemark").focus();
            $("#putRemark").attr('required', true);
            $("#putRemark").css("border", "1px solid red");
        }
        else{
            var action = $(this).attr("action"); //get submit action from form
            var method = $(this).attr("method"); // get submit method
            var form_data = new FormData($(this)[0]); // convert form into formdata 
            var form = $(this);


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
                    $.ajax({
                        url: action,
                        dataType: 'json', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: method,

                        
                        success: function(response) {
                            if(response.status){

                                $(document).ready(function() {
                                    $("#loading").show();
                                    $(".loader").show();

                                    setTimeout(function() {
                                        $("#loading").hide();
                                        $(".loader").hide();
                                            location.reload();
                                    }, 1000);
                                })

                                swalWithBootstrapButtons.fire(
                                    'Succesful!',
                                    'Data has been updated !',
                                    'success'
                                )
                            }
                        },
                        
                        error: function(response) { // handle the error
                            Swal.fire("Cancelled", "Data Cancel Inputed", "error");
                            try {
                            var erroJson = JSON.parse(response.responseText);
                            for (var err in erroJson) {
                                for (var errstr of erroJson[err])
                                $("[name='" + err + "']").after("<div class='alert alert-danger'>" + errstr + "</div>");
                            }
                            if (options.error) {
                                options.error(response);
                            }
                            } catch (err) {

                            }

                        },

                    })


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