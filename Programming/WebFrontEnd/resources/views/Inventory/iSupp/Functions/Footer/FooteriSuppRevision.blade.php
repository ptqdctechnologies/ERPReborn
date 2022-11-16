<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        // $(".headeriSupp1").hide();
        $(".headeriSupp2").hide();
        $("#detailPR").hide();
        $("#FileReceipt").hide();
        $("#DetailiSupp").hide();
        // $(".iSuppCart").hide();
        // $("#tableShowHideSupp").hide();
        $("#headerPrNumber2").prop("disabled", true);
        $("#SubmitiSupp").prop("disabled", true);
        $("#addToPoDetail").prop("disabled", true);
        $(".materialSource").prop("disabled", true);

        $("#po_number").css("background-color", "white");
        $("#warehouse1").css("background-color", "white");
        $("#do_number").css("background-color", "white");
        $("#warehouse1").css("background-color", "white");
        $("#warehouse2").css("background-color", "white");
        $("#warehouse3").css("background-color", "white");
    });
</script>

<script type="text/javascript">

    //GET PO

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var var_recordID = $("#var_recordID").val();

    $.ajax({
        type: "GET",
        url: '{!! route("iSupp.IsuppListDataByID") !!}?var_recordID=' + var_recordID,
        success: function(data) {
            $.each(data, function(key, value) {
                
                var html = '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:5%;">' +
                    '&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-xs klikPoDetail klikPoDetail2" data-dismiss="modal" data-id0="' + value.combinedBudget_SubSectionLevel1_RefID + '" data-id1="' + value.product_RefID + '" data-id2="' + value.productName + '" data-id3="' + value.quantity + '" data-id4="' + value.quantityUnitName + '" data-id5="' + value.remarks + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="18" alt="" title="Add"></button> ' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' +
                    '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.combinedBudget_SubSectionLevel1_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.combinedBudget_SubSectionLevel1Name + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                    '</tr>';

                $('table.tablePoDetailiSupp tbody').append(html);
            });

            $('.klikPoDetail').on('click', function(e) {
                var $this = $(this);
                $("#DetailiSupp").show();
                $("#putWorkId").val($this.data("id0"));
                $("#putProductId").val($this.data("id1"));
                $("#putProductName").val($this.data("id2"));
                $("#totalBalance").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#qtyCek").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                $("#putUom").val($this.data("id4"));
                $("#remark").val($this.data("id5"));
                $("#tableShowHideSupp").find("input,button,textarea,select").attr("disabled", true);

                $("#ValidateQuantity").val($this.data("id3"));


                $(".klikPoDetail2").prop("disabled", true);
                $(".ActionButton").prop("disabled", true);

            });
        },
    });

    //GET ISUPP LIST 

    var var_recordID = $("#var_recordID").val();

    $.ajax({
        type: "POST",
        url: '{!! route("iSupp.IsuppListCartRevision") !!}?var_recordID=' + var_recordID,
        success: function(data) {

            $.each(data, function(key, value) {

                //TOTAL ADVANCE
                if($("#TotalISupp").html() == ""){
                    $("#TotalISupp").html('0');
                }
                var TotalISupp = parseFloat(value.quantity.replace(/,/g, ''));
                var TotalISupp2 = parseFloat($("#TotalISupp").html().replace(/,/g, ''));
                $("#TotalISupp").html(parseFloat(+TotalISupp2 + +TotalISupp).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

                var html =
                    '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:5%;">' +
                    '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditiSupp(this)" data-dismiss="modal" data-id0="' + value.combinedBudget_SubSectionLevel1_RefID + '" data-id1="' + value.product_RefID + '" data-id2="' + value.productName + '" data-id3="' + value.quantity + '" data-id4="' + value.quantityUnitName + '" data-id5="' + value.quantity + '" data-id6="' + value.remarks + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="18" alt="" title="Edit"></button> ' +
                    '<input type="hidden" name="var_product_id[]" value="' + value.product_RefID + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + value.productName + '">' +
                    '<input type="hidden" name="var_quantity[]" value="' + value.quantity + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + value.quantityUnitName + '">' +
                    '<input type="hidden" name="var_price[]" value="' + value.productUnitPriceCurrencyValue + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + value.priceCurrencyISOCode + '">' +
                    '<input type="hidden" name="var_combinedBudget[]" value="' + value.combinedBudgetSectionDetail_RefID + '">' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.combinedBudget_SubSectionLevel1_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.product_RefID + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.productName + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + value.quantityUnitName + '</td>' +
                    '</tr>';

                $('table.TableiSuppCart tbody').append(html);
            });
        },
    });
</script>

<script type="text/javascript">

    function addFromDetailtoCartJs() {
        var putProductId = $("#putProductId").val();
        var qtyCek = $("#qtyCek").val();
        var remark = $("#remark").val();

        $("#putProductId").css("border", "1px solid #ced4da");
        $("#qtyCek").css("border", "1px solid #ced4da");
        $("#remark").css("border", "1px solid #ced4da");

        if (putProductId === "") {
            $("#putProductId").focus();
            $("#putProductId").attr('required', true);
            $("#putProductId").css("border", "1px solid red");
        } else if (qtyCek === "") {
            $("#qtyCek").focus();
            $("#qtyCek").attr('required', true);
            $("#qtyCek").css("border", "1px solid red");
        } else if (remark === "") {
            $("#remark").focus();
            $("#remark").attr('required', true);
            $("#remark").css("border", "1px solid red");
        } else {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: "POST",
                url: '{!! route("iSupp.StoreValidateiSupp") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                success: function(data) {

                    if (data == "200") {
                        $(".iSuppCart").show();

                        var putWorkId = $('#putWorkId').val();
                        var putProductId = $("#putProductId").val();
                        var putProductName = $("#putProductName").val();
                        var qtyCek = $('#qtyCek').val();
                        var putUom = $('#putUom').val();
                        var totalBalance = $('#totalBalance').val();
                        var remark = $('#remark').val();

                        if($("#TotalISupp").html() == ""){ $("#TotalISupp").html('0'); }
                        var TotalISupp = parseFloat($("#TotalISupp").html().replace(/,/g, ''));
                        $("#TotalISupp").html(parseFloat(+TotalISupp + +qtyCek).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        
                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditiSupp(this)" data-dismiss="modal" data-id0="' + putWorkId + '" data-id1="' + putProductId + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + totalBalance + '" data-id6="' + remark + '"  style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkId">' + putWorkId + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getProductId">' + putProductId + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getProductName">' + putProductName + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getQty">' + qtyCek + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getUom">' + putUom + '</span>' + '</td>' +
                            '</tr>';
                        $('table.TableiSuppCart tbody').append(html);
                        $("#statusEditiSupp").val("No");

                        $("#qtyCek").val("");
                        $("#putUom").val("");
                        $("#putWorkId").val("");
                        $("#putProductId").val("");
                        $("#putProductName").val("");
                        $("#remark").val("");
                        $("#totalBalance").val("");

                        $("#tableShowHideSupp").find("input,button,textarea,select").attr("disabled", false);
                        $("#SubmitiSupp").prop("disabled", false);
                        $(".klikPoDetail2").prop("disabled", false);
                        $(".ActionButton").prop("disabled", false);

                    } else {
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });
        }
    }
</script>

<script type="text/javascript">
    function CancelDetailIsupp() {
        var putWorkId = $('#putWorkId').val();
        var putProductId = $("#putProductId").val();
        var putProductName = $("#putProductName").val();
        var qtyCek = $('#qtyCek').val();
        var putUom = $('#putUom').val();
        var totalBalance = $('#totalBalance').val();
        var remark = $('#remark').val();
        var statusEditiSupp = $("#statusEditiSupp").val();
        if (statusEditiSupp == "Yes") {

            var qtyCek = $('#putQty').val();
            var remark = $('#remark2').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                type: "POST",
                url: '{!! route("iSupp.StoreValidateiSupp") !!}?putProductId=' + $('#putProductId').val() + '&putWorkId=' + $('#putWorkId').val(),
                success: function(data) {

                    if (data == "200") {

                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditiSupp(this)" data-dismiss="modal" data-id0="' + putWorkId + '" data-id1="' + putProductId + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + totalBalance + '" data-id6="' + remark + '"  style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkId">' + putWorkId + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getProductId">' + putProductId + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getProductName">' + putProductName + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getQty">' + qtyCek + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getUom">' + putUom + '</span>' + '</td>' +
                            '</tr>';
                        $('table.TableiSuppCart tbody').append(html);

                        var TotalISupp = parseFloat($("#TotalISupp").html().replace(/,/g, ''));
                        $("#TotalISupp").html(parseFloat(+TotalISupp + +qtyCek).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                    }else {
                        Swal.fire("Error !", "Please use edit to update this item !", "error");
                    }
                },
            });
            $("#statusEditiSupp").val("No");
        }

        $(".klikPoDetail2").prop("disabled", false);
        $(".ActionButton").prop("disabled", false);

        $("#tableShowHideSupp").find("input,button,textarea,select").attr("disabled", false);
        $("#putWorkId").val("");
        $("#putProductId").val("");
        $("#putProductName").val("");
        $("#qtyCek").val("");
        $("#putUom").val("");
        $("#totalBalance").val("");
        $("#remark").val("");
    }
</script>

<script>

    function RemoveIsuppCart(putWorkId, ProductId, qty, tr) {
        var i = tr.parentNode.parentNode.rowIndex;
        document.getElementById("TableiSuppCart").deleteRow(i);
        
        $.ajax({
            type: "POST",
            url: '{!! route("iSupp.StoreValidateiSupp2") !!}?putProductId=' + ProductId + '&putWorkId=' + putWorkId,
        });

        var totalQtyIsupp = parseFloat(qty.replace(/,/g, ''));
        var TotalISupp = parseFloat($("#TotalISupp").html().replace(/,/g, ''));
        $("#TotalISupp").html(parseFloat(TotalISupp - totalQtyIsupp).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }

</script>

<script>
    function EditiSupp(t) {
        var i = t.parentNode.parentNode.rowIndex;
        document.getElementById("TableiSuppCart").deleteRow(i);

        var $this = $(t);
       
        $.ajax({
            type: "POST",
            url: '{!! route("iSupp.StoreValidateiSupp2") !!}?putProductId=' + $this.data("id1") + '&putWorkId=' + $this.data("id0"),
        });

        $("#putWorkId").val($this.data("id0"));
        $("#putProductId").val($this.data("id1"));
        $("#putProductName").val($this.data("id2"));
        $("#qtyCek").val($this.data("id3"));
        $("#putQty").val($this.data("id3"));
        $("#ValidateQuantity").val($this.data("id3"));
        $("#putUom").val($this.data("id4"));
        $("#totalBalance").val($this.data("id5"));
        $("#remark").val($this.data("id6"));
        $("#remark2").val($this.data("id6"));
        $("#statusEditiSupp").val("Yes");

        var totalQtyIsupp = parseFloat($("#qtyCek").val().replace(/,/g, ''));
        var TotalISupp = parseFloat($("#TotalISupp").html().replace(/,/g, ''));
        $("#TotalISupp").html(parseFloat(TotalISupp - totalQtyIsupp).toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));

        $(".klikPoDetail2").prop("disabled", true);
        $(".ActionButton").prop("disabled", true);
        $("#DetailiSupp").show();
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".materialSource").on('click', function(e) {
            e.preventDefault();
            var valType = $(".materialSource").val();

            if (valType == "Supplier to Site") {
                $(".headeriSupp1").show();
                $(".headeriSupp2").hide();
            } else if (valType == "Warehouse to Warehouse") {
                $(".headeriSupp2").show();
                $(".headeriSupp1").hide();
            }
        });
    });
</script>

<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {
            var qtyReq = $(this).val();
            var putQty = $('#totalBalance').val();
            if (parseFloat(qtyReq) == '') {
                $("#qtyCek").css("border", "1px solid red");
            } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Quantity Request is Over", "error");
                $("#qtyCek").val("");
                $("#qtyCek").css("border", "1px solid red");
            } else {
                $("#qtyCek").css("border", "1px solid #ced4da");
            }
        });
    });
</script>

<script type="text/javascript">
    function CanceliSupp() {
        $("#loading").show();
        $(".loader").show();
        window.location.href = '/iSupp?var=1';
    }
</script>

<script>
    $(function() {
        $("#FormSubmitiSupp").on("submit", function(e) { //id of form 
            e.preventDefault();

            var po_number = $("#po_number").val();
            var cek = 0;
            if (po_number !== "") {
                var remarkPo = $("#remarkPo").val();
                var headerWarehouse1 = $("#headerWarehouse1").val();
                $("#remarkPo").css("border", "1px solid #ced4da");
                $("#headerWarehouse1").css("border", "1px solid #ced4da");
                if (remarkPo === "") {
                    $("#remarkPo").focus();
                    $("#remarkPo").attr('required', true);
                    $("#remarkPo").css("border", "1px solid red");
                } else if (headerWarehouse1 === "") {
                    $("#headerWarehouse1").focus();
                    $("#headerWarehouse1").attr('required', true);
                    $("#headerWarehouse1").css("border", "1px solid red");
                } else {
                    cek = 1;
                }
            } else {
                var remarkDo = $("#remarkDo").val();
                $("#remarkDo").css("border", "1px solid #ced4da");
                if (remarkDo === "") {
                    $("#remarkDo").focus();
                    $("#remarkDo").attr('required', true);
                    $("#remarkDo").css("border", "1px solid red");
                } else {
                    cek = 1;
                }
            }

            if (cek === 1) {
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
                                    html: 'Data has been saved',
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

                                        window.location.href = '/iSupp?var=1';
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

                                window.location.href = '/iSupp?var=1';
                            }
                        })
                    }
                })
            }
        });

    });
</script>