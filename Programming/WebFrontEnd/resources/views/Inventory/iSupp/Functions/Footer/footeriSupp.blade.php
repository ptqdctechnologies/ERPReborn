<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".headeriSupp1").hide();
        $(".headeriSupp2").hide();
        $("#detailPR").hide();
        $("#FileReceipt").hide();
        $("#DetailiSupp").hide();
        $("#iSuppCart").hide();
        $("#tableShowHideSupp").hide();
        $("#headerPrNumber2").prop("disabled", true);
        $("#SubmitiSupp").prop("disabled", true);
        $("#addToPoDetail").prop("disabled", true);
    });
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

<script type="text/javascript">
    $(document).ready(function() {
        $(".CancelDetailiSupp").click(function() {

            var workIdiSuppDetail = $('#workIdiSuppDetail').val();
            var productiSuppDetail = $("#productiSuppDetail").val();
            var productiSuppDetail2 = $("#productiSuppDetail2").val();
            var qtyiSuppChange = $('#qtyiSuppChange').val();
            var UomiSupp = $('#UomiSupp').val();
            var balanceiSupp = $('#balanceiSupp').val();
            var remarkiSuppDetail = $('#remarkiSuppDetail').val();
            var statusEditiSupp = $("#statusEditiSupp").val();
            if (statusEditiSupp == "Yes") {

                var qtyiSuppChange = $('#qtyiSuppEdit').val();
                var remarkiSuppDetail = $('#remarkiSuppDetail2').val();

                var html = '<tr>' +
                    '<td style="border:1px solid #e9ecef;width:7%;">' +
                    '&nbsp;&nbsp;<button type="button" class="btn btn-xs RemoveIsuppCart" data-id1="' + productiSuppDetail + '"  style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                    '&nbsp;<button type="button" class="btn btn-xs EditiSupp" data-dismiss="modal" data-id1="' + productiSuppDetail + '" data-id2="' + productiSuppDetail2 + '" data-id3="' + qtyiSuppChange + '" data-id4="' + UomiSupp + '" data-id5="' + balanceiSupp + '" data-id6="' + remarkiSuppDetail + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                    '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkId">' + workIdiSuppDetail + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getProductId">' + productiSuppDetail + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getProductName">' + productiSuppDetail2 + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getQty">' + qtyiSuppChange + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getUom">' + UomiSupp + '</span>' + '</td>' +
                    '<td style="border:1px solid #e9ecef;">' + '<span id="getUom">' + remarkiSuppDetail + '</span>' + '</td>' +
                    '</tr>';
                $('table.tableiSuppCart tbody').append(html);
                $("#statusEditiSupp").val("No");
            }

            $("#tableShowHideSupp").find("input,button,textarea,select").attr("disabled", false);
            $("#productiSuppDetail").val("");
            $("#productiSuppDetail2").val("");
            $("#qtyiSuppChange").val("");
            $("#UomiSupp").val("");
            $("#balanceiSupp").val("");
            $("#remarkiSuppDetail").val("");
        });
    });
</script>

<script>
    $(function() {

        $('#addToPoDetail').on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            $("#tableShowHideSupp").show();
            $("#FileReceipt").show();
            $("#addToPoDetail").prop("disabled", true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '{!! route("getSite") !!}?sitecode=' + $('.projectCodeiSupp').val() + '&var=' + 1,
                success: function(data) {
                    var no = 1;
                    $.each(data, function(key, val2) {
                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;<button type="reset" class="btn btn-sm klikPoDetail" data-id1="' + val2.product_RefID + '" data-id2="' + val2.productName + '" data-id3="' + val2.quantity + '" data-id4="' + val2.unitPriceBaseCurrencyValue + '" data-id5="' + val2.priceBaseCurrencyValue + '" data-id6="' + val2.combinedBudgetSubSectionLevel1_RefID + '" data-id7="' + val2.quantityUnitName + '" title="Submit"  style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="15" alt="" title="Add to Detail"></button>' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkId">' + val2.combinedBudgetSubSectionLevel1_RefID + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkName">' + val2.combinedBudgetSubSectionLevel2Name + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getProductId">' + val2.product_RefID + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getProductName">' + val2.productName + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getQty">' + 'N/A' + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getQty2">' + val2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getPrice">' + val2.unitPriceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="totalArf">' + val2.priceBaseCurrencyValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getUom">' + val2.quantityUnitName + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getCurrency">' + val2.priceBaseCurrencyISOCode + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' +
                            '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"><div class="progress-bar bg-red" style="width:50%;"></div><small><center>50 %</center></small></div>' +
                            '</td>' +
                            '</tr>';
                        $('table.tablePoDetailiSupp tbody').append(html);
                    });

                    $('.klikPoDetail').on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        $("#DetailiSupp").show();

                        $("#productiSuppDetail").val($this.data("id1"));
                        $("#productiSuppDetail2").val($this.data("id2"));
                        $("#balanceiSupp").val($this.data("id5").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        $("#qtyiSuppChange").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        $("#qtyiSupp").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        $("#UomiSupp").val($this.data("id7"));
                        $("#workIdiSuppDetail").val($this.data("id6"));
                        $("#tableShowHideSupp").find("input,button,textarea,select").attr("disabled", true);
                    });
                }
            });
        });
    });
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('#addFromDetailiSupptoCart').click(function(ev) {
            ev.preventDefault();
            ev.stopPropagation();

            var productiSuppDetail = $("#productiSuppDetail").val();
            var qtyiSuppChange = $("#qtyiSuppChange").val();
            var remarkiSuppDetail = $("#remarkiSuppDetail").val();

            if (productiSuppDetail === "") {
                Swal.fire("Error !", "Product Cannot Empty", "error");
            } else if (qtyiSuppChange === "") {
                Swal.fire("Error !", "Quantity Cannot Empty", "error");
            } else if (remarkiSuppDetail === "") {
                Swal.fire("Error !", "Remark Cannot Empty", "error");
            } else {

                $.ajax({
                    type: "POST",
                    url: '{!! route("iSupp.StoreValidateiSupp") !!}?productiSuppDetail=' + $('#productiSuppDetail').val(),
                    success: function(data) {

                        if (data == "200") {
                            $("#iSuppCart").show();

                            var workIdiSuppDetail = $('#workIdiSuppDetail').val();
                            var productiSuppDetail = $("#productiSuppDetail").val();
                            var productiSuppDetail2 = $("#productiSuppDetail2").val();
                            var qtyiSuppChange = $('#qtyiSuppChange').val();
                            var UomiSupp = $('#UomiSupp').val();
                            var balanceiSupp = $('#balanceiSupp').val();
                            var remarkiSuppDetail = $('#remarkiSuppDetail').val();

                            var html = '<tr>' +
                                '<td style="border:1px solid #e9ecef;width:7%;">' +
                                '&nbsp;&nbsp;<button type="button" class="btn btn-xs RemoveIsuppCart" data-id1="' + productiSuppDetail + '"  style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                                '&nbsp;<button type="button" class="btn btn-xs EditiSupp" data-dismiss="modal" data-id1="' + productiSuppDetail + '" data-id2="' + productiSuppDetail2 + '" data-id3="' + qtyiSuppChange + '" data-id4="' + UomiSupp + '" data-id5="' + balanceiSupp + '" data-id6="' + remarkiSuppDetail + '" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
                                '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkId">' + workIdiSuppDetail + '</span>' + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + '<span id="getProductId">' + productiSuppDetail + '</span>' + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + '<span id="getProductName">' + productiSuppDetail2 + '</span>' + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + '<span id="getQty">' + qtyiSuppChange + '</span>' + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + '<span id="getUom">' + UomiSupp + '</span>' + '</td>' +
                                '<td style="border:1px solid #e9ecef;">' + '<span id="getUom">' + remarkiSuppDetail + '</span>' + '</td>' +
                                '</tr>';
                            $('table.tableiSuppCart tbody').append(html);
                            $("#statusEditiSupp").val("No");

                            $("body").on("click", ".RemoveIsuppCart", function() {
                                $(this).closest("tr").remove();
                                var ProductId = $(this).data("id1");
                                $.ajax({
                                    type: "POST",
                                    url: '{!! route("iSupp.StoreValidateiSupp2") !!}?productiSuppDetail=' + ProductId,
                                });
                            });

                            $("body").on("click", ".EditiSupp", function() {
                                var $this = $(this);

                                $.ajax({
                                    type: "POST",
                                    url: '{!! route("iSupp.StoreValidateiSupp2") !!}?productiSuppDetail=' + $this.data("id1"),
                                });

                                $("#productiSuppDetail").val($this.data("id1"));
                                $("#productiSuppDetail2").val($this.data("id2"));
                                $("#qtyiSuppChange").val($this.data("id3"));
                                $("#qtyiSuppEdit").val($this.data("id3"));
                                $("#UomiSupp").val($this.data("id4"));
                                $("#balanceiSupp").val($this.data("id5"));
                                $("#remarkiSuppDetail").val($this.data("id6"));
                                $("#remarkiSuppDetail2").val($this.data("id6"));
                                $("#statusEditiSupp").val("Yes");

                                $(this).closest("tr").remove();
                            });

                            $("#qtyiSuppChange").val("");
                            $("#UomiSupp").val("");
                            $("#productiSuppDetail").val("");
                            $("#productiSuppDetail2").val("");
                            $("#remarkiSuppDetail").val("");
                            $("#balanceiSupp").val("");

                            $("#tableShowHideSupp").find("input,button,textarea,select").attr("disabled", false);
                            $("#SubmitiSupp").prop("disabled", false);

                        } else {
                            Swal.fire("Error !", "Please use edit to update this item !", "error");
                        }
                    },
                });
            }
        });
    });
</script>



<script>
    $(function() {
        $("#formSubmitiSupp").on("submit", function(e) { //id of form 
            e.preventDefault();

            var po_number = $("#po_number").val();
            var cek = 0;
            if (po_number !== "") {
                var remarkiSupp = $("#remarkiSupp").val();
                var headerWarehouse1 = $("#headerWarehouse1").val();
                $("#remarkiSupp").css("border", "1px solid #ced4da");
                $("#headerWarehouse1").css("border", "1px solid #ced4da");
                if (remarkiSupp === "") {
                    $("#remarkiSupp").focus();
                    $("#remarkiSupp").attr('required', true);
                    $("#remarkiSupp").css("border", "1px solid red");
                } else if (headerWarehouse1 === "") {
                    $("#headerWarehouse1").focus();
                    $("#headerWarehouse1").attr('required', true);
                    $("#headerWarehouse1").css("border", "1px solid red");
                } else {
                    cek = 1;
                }
            } else {
                var remarkiSupp2 = $("#remarkiSupp2").val();
                $("#remarkiSupp2").css("border", "1px solid #ced4da");
                if (remarkiSupp2 === "") {
                    $("#remarkiSupp2").focus();
                    $("#remarkiSupp2").attr('required', true);
                    $("#remarkiSupp2").css("border", "1px solid red");
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

                        })
                    }
                })
            }
        });

    });
</script>

<script>
    $('document').ready(function() {
        $('.ChangeQty').keyup(function() {
            var qtyReq = $(this).val();
            var putQty = $('#qtyiSupp').val();
            if (parseFloat(qtyReq) == '') {
                $("#qtyiSuppChange").css("border", "1px solid red");
            } else if (parseFloat(qtyReq) > parseFloat(putQty)) {
                Swal.fire("Error !", "Your Quantity Request is Over", "error");
                $("#qtyiSuppChange").val("");
                $("#qtyiSuppChange").css("border", "1px solid red");
            } else {
                $("#qtyiSuppChange").css("border", "1px solid #ced4da");
            }
        });
    });
</script>

<script>
    $('#qtyiSuppChange').on('blur', function() {
        var amount = $('#qtyiSuppChange').val().replace(/^\s+|\s+$/g, '');
        if (($('#qtyiSuppChange').val() != '') && (!amount.match(/^$/))) {
            $('#qtyiSuppChange').val(parseFloat(amount).toFixed(2));
        }
    });
</script>

<script type="text/javascript">
    function CanceliSupp() {
        $("#loading").show();
        $(".loader").show();
        window.location.href = '/iSupp?var=1';
    }
</script>