<script type="text/javascript">
    $(document).ready(function() {
        $("#detailDo").hide();
        // $(".detailDoList").hide();
        // $("#tableShowHideDo").hide();
        $("#transporter").css("background-color", "white");
        $("#searchDor").prop("disabled", true);
        $("#transporter2").prop("disabled", true);
        
    });
</script>

<script type="text/javascript">


    //GET DOR DETAIL
    $("#tableShowHideDo").show();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var var_recordID = $("#var_recordID").val();
    var trano = "Adv/QDC/2022/000238";

    $.ajax({
        type: "GET",
        url: '{!! route("DeliveryOrder.DeliveryOrderByDorID") !!}?var_recordID=' + var_recordID,
        success: function(data) {
            $.each(data.DataAdvanceList, function(key, value) {
                var html =
                    '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:5%;">' +
                    '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs AddToDetail AddToDetail2" data-dismiss="modal" data-id0="' + trano + '" data-id1="' + value.combinedBudget_SubSectionLevel1_RefID + '" data-id2="' + value.combinedBudget_SubSectionLevel1Name + '" data-id3="' + value.product_RefID + '" data-id4="' + value.productName + '" data-id5="' + value.quantity + '" data-id6="' + value.quantityUnitName + '" data-id7="' + value.priceCurrencyISOCode + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="18" alt="" title="Add"></button> ' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' +
                    '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '</tr>';

                $('table.TableDorDetail tbody').append(html);
            });

            $("body").on("click", ".AddToDetail", function() {
                $("#detailDo").show();
                var $this = $(this);
                $("#dor_number_detail").val($this.data("id0"));
                $("#putWorkId").val($this.data("id1"));
                $("#putWorkName").val($this.data("id2"));
                $("#putProductId").val($this.data("id3"));
                $("#putProductName").val($this.data("id4"));
                $("#delivery_type").val($this.data("id5"));
                $("#qtyCek").val($this.data("id5").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#putQty").val($this.data("id5"));
                $("#putUom").val($this.data("id6"));
                $("#putCurrency").val($this.data("id7"));

                $(".AddToDetail2").prop("disabled", true);
                $(".ActionButton").prop("disabled", true);

            });
        },
    });
    
    //GET DO LIST 

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var do_RefID = $("#var_recordID").val();

    $.ajax({
        type: "POST",
        url: '{!! route("DeliveryOrder.DeliveryOrderListCartRevision") !!}?do_RefID=' + do_RefID,
        success: function(data) {

            $.each(data, function(key, value) {
                
                //TOTAL DO
                if($("#TotalDeliveryOrder").html() == ""){
                    $("#TotalDeliveryOrder").html('0');
                }
                var TotalDeliveryOrder = parseFloat(value.quantity.replace(/,/g, ''));
                var TotalDeliveryOrder2 = parseFloat($("#TotalDeliveryOrder").html().replace(/,/g, ''));
                $("#TotalDeliveryOrder").html(parseFloat(+TotalDeliveryOrder2 + +TotalDeliveryOrder).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                var html = '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:7%;">' +
                    '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditDeliveryOrder(this)" data-dismiss="modal" data-id0="' + trano + '" data-id1="' + value.combinedBudget_SubSectionLevel1_RefID + '" data-id2="' + value.combinedBudget_SubSectionLevel1_RefID + '" data-id3="' + value.product_RefID + '" data-id4="' + value.productName + '" data-id5="' + value.priceCurrencyISOCode + '" data-id6="' + value.quantity + '" data-id7="' + value.quantityUnitName + '" data-id8="' + value.remarks + '" data-id9="' + value.priceCurrencyISOCode + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="18" alt="" title="Edit"></button> ' +
                    '<input type="hidden" name="var_putProductId[]" value="' + putProductId + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.combinedBudget_SubSectionLevel1_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.combinedBudget_SubSectionLevel1_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.combinedBudget_SubSectionLevel1Name + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.priceCurrencyISOCode + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.remarks + '</td>' +
                    '</tr>';
                $('table.TableDorCart tbody').append(html);
            });
        },
    });

</script>

<script type="text/javascript">

    function addFromDetailtoCartJs() {
        
        $("#detailDoList").show();
        var dor_number_detail = $("#dor_number_detail").val();
        var qtyCek = $("#qtyCek").val();
        var note = $("#note").val();

        $("#dor_number_detail").css("border", "1px solid #ced4da");
        $("#qtyCek").css("border", "1px solid #ced4da");
        $("#note").css("border", "1px solid #ced4da");

        if (dor_number_detail === "") {
            $("#dor_number_detail").focus();
            $("#dor_number_detail").attr('required', true);
            $("#dor_number_detail").css("border", "1px solid red");
        } else if (qtyCek === "") {
            $("#qtyCek").focus();
            $("#qtyCek").attr('required', true);
            $("#qtyCek").css("border", "1px solid red");
        } else if (note === "") {
            $("#note").focus();
            $("#note").attr('required', true);
            $("#note").css("border", "1px solid red");
        } else {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: "POST",
                url: '{!! route("DeliveryOrder.StoreValidateDeliveryOrder") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                success: function(data) {

                    if (data == "200") {
                        
                        var trano = $("#dor_number_detail").val();
                        var putWorkId = $("#putWorkId").val();
                        var putWorkName = $("#putWorkName").val();
                        var putProductId = $("#putProductId").val();
                        var putProductName = $("#putProductName").val();
                        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
                        var putUom = $("#putUom").val();
                        var putCurrency = $("#putCurrency").val();
                        var note = $("#note").val();
                        var delivery_type = $("#delivery_type").val();

                        //TOTAL DO
                        if($("#TotalDeliveryOrder").html() == ""){
                            $("#TotalDeliveryOrder").html('0');
                        }
                        var TotalDeliveryOrder = parseFloat($("#qtyCek").val().replace(/,/g, ''));
                        var TotalDeliveryOrder2 = parseFloat($("#TotalDeliveryOrder").html().replace(/,/g, ''));
                        $("#TotalDeliveryOrder").html(parseFloat(+TotalDeliveryOrder2 + +TotalDeliveryOrder).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditDeliveryOrder(this)" data-dismiss="modal" data-id0="' + trano + '" data-id1="' + putWorkId + '" data-id2="' + putWorkName + '" data-id3="' + putProductId + '" data-id4="' + putProductName + '" data-id5="' + delivery_type + '" data-id6="' + qtyCek + '" data-id7="' + putUom + '" data-id8="' + note + '" data-id9="' + putCurrency + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '<input type="hidden" name="var_putProductId[]" value="' + putProductId + '">' +
                            '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + parseFloat(qtyCek.replace(/,/g, '')) + '">' +
                            '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                            '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putWorkId + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putWorkName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + qtyCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putCurrency + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + note + '</td>' +
                            '</tr>';
                        $('table.TableDorCart tbody').append(html);
                        $("#statusEditDo").val("No");

                        $("#dor_number_detail").val("");
                        $("#putWorkId").val("");
                        $("#putWorkName").val("");
                        $("#putProductId").val("");
                        $("#putProductName").val("");
                        $("#delivery_type").val("");
                        $("#qtyCek").val("");
                        $("#putUom").val("");
                        $("#note").val("");

                        $(".AddToDetail2").prop("disabled", false);
                        $(".ActionButton").prop("disabled", false);
                        $(".detailDoList").show();

                    } else {
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });
        }
    }
</script>


<script type="text/javascript">
    function CancelDetailDo() {
        
        var trano = $("#dor_number_detail").val();
        var putWorkId = $("#putWorkId").val();
        var putWorkName = $("#putWorkName").val();
        var putProductId = $("#putProductId").val();
        var putProductName = $("#putProductName").val();
        var qtyCek = $('#qtyCek').val().replace(/^\s+|\s+$/g, '');
        var putUom = $("#putUom").val();
        var putCurrency = $("#putCurrency").val();
        var note = $("#note").val();
        var delivery_type = $("#delivery_type").val();
        var statusEditDo = $("#statusEditDo").val();
        if (statusEditDo == "Yes") {

            qtyCek = $('#ValidateQuantity').val();
            note = $('#ValidateNote').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: "POST",
                url: '{!! route("DeliveryOrder.StoreValidateDeliveryOrder") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                success: function(data) {

                    if (data == "200") {

                        let html = '<tr>' +
                        '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditDeliveryOrder(this)" data-dismiss="modal" data-id0="' + trano + '" data-id1="' + putWorkId + '" data-id2="' + putWorkName + '" data-id3="' + putProductId + '" data-id4="' + putProductName + '" data-id5="' + delivery_type + '" data-id6="' + qtyCek + '" data-id7="' + putUom + '" data-id8="' + note + '" data-id9="' + putCurrency + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '<input type="hidden" name="var_putProductId[]" value="' + putProductId + '">' +
                            '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                            '<input type="hidden" name="var_quantity[]" value="' + parseFloat(qtyCek.replace(/,/g, '')) + '">' +
                            '<input type="hidden" name="var_uom[]" value="' + putUom + '">' +
                            '<input type="hidden" name="var_currency[]" value="' + putCurrency + '">' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + trano + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putWorkId + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putWorkName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductId + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putProductName + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + qtyCek.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + putCurrency + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + note + '</td>' +
                            '</tr>';
                        $('table.TableDorCart tbody').append(html);

                        var TotalDeliveryOrder = parseFloat($("#TotalDeliveryOrder").html().replace(/,/g, ''));
                        $("#TotalDeliveryOrder").html(parseFloat(+TotalDeliveryOrder + +qtyCek).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                    }else {
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });
            $("#statusEditDo").val("No");
        }

        $(".AddToDetail2").prop("disabled", false);
        $(".ActionButton").prop("disabled", false);

        $("#putProductId").css("border", "1px solid #ced4da");
        $("#dor_number_detail").val("");
        $("#putWorkId").val("");
        $("#putWorkName").val("");
        $("#putProductId").val("");
        $("#putProductName").val("");
        $("#delivery_type").val("");
        $("#qtyCek").val("");
        $("#putUom").val("");
        $("#note").val("");
    }
</script>

<script>
    function EditDeliveryOrder(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TableDorCart").deleteRow(i);

        var $this = $(t);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: "POST",
            url: '{!! route("DeliveryOrder.StoreValidateDeliveryOrder2") !!}?putProductId=' + $this.data("id3") + '&putWorkId=' + $this.data("id1"),
        });

        $("#dor_number_detail").val($this.data("id0"));
        $("#putWorkId").val($this.data("id1"));
        $("#putWorkName").val($this.data("id2"));
        $("#putProductId").val($this.data("id3"));
        $("#putProductName").val($this.data("id4"));
        $("#delivery_type").val($this.data("id5"));
        $("#qtyCek").val($this.data("id6"));
        $("#ValidateQuantity").val($this.data("id6"));
        $("#putUom").val($this.data("id7"));
        $("#note").val($this.data("id8"));
        $("#putCurrency").val($this.data("id9"));
        $("#ValidateNote").val($this.data("id8"));
        $("#statusEditDo").val("Yes");

        var qtyCek = parseFloat($("#qtyCek").val().replace(/,/g, ''));
        var TotalDeliveryOrder = parseFloat($("#TotalDeliveryOrder").html().replace(/,/g, ''));
        $("#TotalDeliveryOrder").html(parseFloat(TotalDeliveryOrder - qtyCek).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        $("#detailDo").show();
        $(".AddToDetail2").prop("disabled", true);
        $(".ActionButton").prop("disabled", true);
    }
</script>


<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {

            var qtyReq = $(this).val();
            var putQty = $('#putQty').val();

            if (parseFloat(qtyReq) == '') {
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Quantity Request is Over", "error");
                $("#qtyCek").val(0);
                $("#qtyCek").css("border", "1px solid red");
            } else {
                $("#qtyCek").css("border", "1px solid #ced4da");
            }

        });
    });
</script>

<script type="text/javascript">
    function CancelDo() {
        $("#loading").show();
        $(".loader").show();
        window.location.href = '/DeliveryOrder?var=1';
    }
</script>


<script>
    $(function() {
        $("#FormSubmitDoRevision").on("submit", function(e) { //id of form 
            e.preventDefault();

            // var valRequestName = $("#request_name").val();
            // var valRemark = $("#putRemark").val();
            // $("#request_name").css("border", "1px solid #ced4da");
            // $("#putRemark").css("border", "1px solid #ced4da");

            // if (valRequestName === "") {
            //     $("#request_name").focus();
            //     $("#request_name").attr('required', true);
            //     $("#request_name").css("border", "1px solid red");
            // } else if (valRemark === "") {
            //     $("#putRemark").focus();
            //     $("#putRemark").attr('required', true);
            //     $("#putRemark").css("border", "1px solid red");
            // } else {
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
                                    html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + response.advnumber + '</span>',
                                    showCloseButton: false,
                                    showCancelButton: false,
                                    focusConfirm: false,
                                    confirmButtonText: '<span style="color:black;"> Ok </span>',
                                    confirmButtonColor: '#4B586A',
                                    confirmButtonColor: '#e9ecef',
                                    reverseButtons: true
                                }).then((result) => {
                                    if (result.value) {
                                        $("#loading").show();
                                        $(".loader").show();

                                        window.location.href = '/DeliveryOrder?var=1';
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

                        }).then((result) => {
                            if (result.value) {
                                $("#loading").show();
                                $(".loader").show();

                                window.location.href = '/DeliveryOrder?var=1';
                            }
                        })
                    }
                })
            // }
        });

    });
</script>