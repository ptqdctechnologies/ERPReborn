<!--  SHOW HIDE AVAILABEL -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".headeriSupp1").hide();
        $(".headeriSupp2").hide();
        $("#detailPR").hide();
        $("#FileReceipt").hide();
        $("#DetailiSupp").hide();
        $(".iSuppCart").hide();
        $("#tableShowHideSupp").hide();
        $("#headerPrNumber2").prop("disabled", true);
        $("#SubmitiSupp").prop("disabled", true);
        $("#addToPoDetail").prop("disabled", true);
        $("#po_number").css("background-color", "white");
        $("#warehouse1").css("background-color", "white");
        $("#do_number").css("background-color", "white");
        $("#warehouse1").css("background-color", "white");
        $("#warehouse2").css("background-color", "white");
        $("#warehouse3").css("background-color", "white");
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
                url: '{!! route("getBudget") !!}?sitecode=' + $('#sitecode').val(),
                success: function(data) {
                    var no = 1;
                    $.each(data, function(key, val2) {
                        let applied = Math.round(val2.quantityRemainRatio * 100);
                        var status = "";
                        if(applied == 100){
                            var status = "disabled";
                        }
                        var html = '<tr>' +
                            '<td style="border:1px solid #e9ecef;width:7%;">' +
                            '&nbsp;&nbsp;<button type="reset" class="btn btn-sm klikPoDetail klikPoDetail2" data-id0="' + val2.combinedBudgetSubSectionLevel1_RefID + '" data-id1="' + val2.product_RefID + '" data-id2="' + val2.productName + '" data-id3="' + val2.quantityRemain + '" data-id4="' + val2.unitPriceBaseCurrencyValue + '" data-id5="' + val2.priceBaseCurrencyValue + '" data-id6="' + val2.quantityUnitName + '" title="Submit"  style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/add.png" width="15" alt="" title="Add to Detail"></button>' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' +
                            '<div class="progress progress-xs" style="height: 14px;border-radius:8px;"> @if('+ applied +' >= '+0+' && '+ applied +' <= '+40+')<div class="progress-bar bg-red" style="width:'+ applied +'%;"></div> @elseif('+ applied +' >= '+41+' && '+ applied +' <= '+89+')<div class="progress-bar bg-blue" style="width:'+ applied +'%;"></div> @elseif('+ applied + ' >= '+ 90 +' && ' + applied + ' <= '+ 100 +')<div class="progress-bar bg-green" style="width:'+ applied +'%;"></div> @else<div class="progress-bar bg-grey" style="width:100%;"></div> @endif</div><small><center>'+ applied +' %</center></small>' +
                            '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkId">' + val2.combinedBudgetSubSectionLevel1_RefID + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getWorkName">' + val2.combinedBudgetSubSectionLevel2Name + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getProductId">' + val2.product_RefID + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getProductName">' + val2.productName + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getQty">' + val2.quantity.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getQty2">' + val2.quantityRemain.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + '</span>' + '</td>' +
                            '<td style="border:1px solid #e9ecef;">' + '<span id="getUom">' + val2.quantityUnitName + '</span>' + '</td>' +
                            '</tr>';
                        $('table.tablePoDetailiSupp tbody').append(html);
                    });

                    $('.klikPoDetail').on('click', function(e) {
                        e.preventDefault();
                        var $this = $(this);
                        $("#DetailiSupp").show();
                        $("#putWorkId").val($this.data("id0"));
                        $("#putProductId").val($this.data("id1"));
                        $("#putProductName").val($this.data("id2"));
                        $("#totalBalance").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        $("#qtyCek").val($this.data("id3").toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
                        $("#putUom").val($this.data("id6"));
                        $("#tableShowHideSupp").find("input,button,textarea,select").attr("disabled", true);

                        $(".klikPoDetail2").prop("disabled", true);
                        $(".ActionButton").prop("disabled", true);
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
                            '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="RemoveIsuppCart(\'' + putWorkId + '\', \'' + putProductId + '\', \'' + qtyCek + '\', this);" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                            '&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditiSupp(this)" data-dismiss="modal" data-id0="' + putWorkId + '" data-id1="' + putProductId + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + totalBalance + '" data-id6="' + remark + '"  style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
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
                            '&nbsp;&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="RemoveIsuppCart(\'' + putWorkId + '\',\'' + putProductId + '\', \'' + qtyCek + '\', this);" style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/delete.png" width="18" alt="" title="Remove"></button> ' +
                            '&nbsp;<button type="button" class="btn btn-xs ActionButton" onclick="EditiSupp(this)" data-dismiss="modal" data-id0="' + putWorkId + '" data-id1="' + putProductId + '" data-id2="' + putProductName + '" data-id3="' + qtyCek + '" data-id4="' + putUom + '" data-id5="' + totalBalance + '" data-id6="' + remark + '"  style="border: 1px solid #ced4da;padding-left:2px;padding-right:2px;padding-top:2px;padding-bottom:2px;border-radius:3px;"><img src="AdminLTE-master/dist/img/edit.png" width="17" alt="" title="Edit"></button> ' +
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
        $("#putProductId").val("");
        $("#putWorkId").val("");
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