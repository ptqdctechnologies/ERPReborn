<script type="text/javascript">
    $(".ShowDocumentList").hide();
    $(".InternalNotes").hide();
    $(".FileAttachment").hide();
    $(".ApprovalHistory").hide();
</script>

<script>
    
    function CheckDocument(url){

        $('#TableCheckDocument').find('tbody').empty();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: url.value,
            success: function(data) {
                var no = 1; t = $('#TableCheckDocument').DataTable();
                t.clear();
                $.each(data.data, function(key, val) {
                    t.row.add([
                        '<tbody><tr><td><span style="position:relative;left:10px;">' + val.documentNumber + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.combinedBudgetCode + '</span></td>',
                        '<td><span style="position:relative;left:10px;">' + val.combinedBudgetSectionCode + '</span></td>',
                        '<span style="display:none;"><td">' + data.linkReportTransaction + '</span></td>',
                        '<span style="display:none;"><td">' + data.TransactionMenu + '</span></td>',
                        '<span style="display:none;"><td">' + val.sys_ID + '</td></span></tr></tbody>'
                    ]).draw();

                });
            }
        });

    }

</script>



<script>
    $('#TableCheckDocument tbody').on('click', 'tr', function () {

        $("#mySearchCheckDocument").modal('toggle');

        var row = $(this).closest("tr");    
        var sys_id = row.find("td:nth-child(6)").text();
        var documentNumber = row.find("td:nth-child(1)").text();
        var linkReportTransaction = row.find("td:nth-child(4)").text();
        var TransactionMenu = row.find("td:nth-child(5)").text();

        $("#sys_id").val(sys_id);
        $("#document_number").val(documentNumber);
        $("#linkReportTransaction").val(linkReportTransaction);
        $("#TransactionMenu").val(TransactionMenu);
    });
    
</script>

<script>

    $('.ViewDocument').on('click', function () {
        $(".ShowDocument").hide();
        $(".ShowDocumentList").show();
        $(".InternalNotes").show();
        $(".FileAttachment").show();
        $(".ApprovalHistory").show();
        
    });
</script>

<script>
    function addFromDetailtoCartJs() {

        $('#TablePurchaseRequisition').find('tbody').empty();

        $(".detailPurchaseRequisitionList").show();
        var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
        var getWorkId = $("input[name='getWorkId[]']").map(function(){return $(this).val();}).get();
        var getWorkName = $("input[name='getWorkName[]']").map(function(){return $(this).val();}).get();
        var getProductId = $("input[name='getProductId[]']").map(function(){return $(this).val();}).get();
        var getProductName = $("input[name='getProductName[]']").map(function(){return $(this).val();}).get();
        var getUom = $("input[name='getUom[]']").map(function(){return $(this).val();}).get();
        var getCurrency = $("input[name='getCurrency[]']").map(function(){return $(this).val();}).get();
        var getRemark = $("input[name='remark_req[]']").map(function(){return $(this).val();}).get();
        var qty_req = $("input[name='qty_req[]']").map(function(){return $(this).val();}).get();
        var price_req = $("input[name='price_req[]']").map(function(){return $(this).val();}).get();
        var combinedBudgetSectionDetail_RefID = $("input[name='combinedBudgetSectionDetail_RefID[]']").map(function(){return $(this).val();}).get();
        var combinedBudget_RefID = $("input[name='combinedBudget_RefID']").val();

        var combinedBudget = $("input[name='combinedBudget']").val();

        var TotalBudgetList = 0;
        var TotalQty = 0;
        var TotalPrice = 0;

        var total_req = $("input[name='total_req[]']").map(function(){return $(this).val();}).get();
        $.each(total_req, function(index, data) {
            if(total_req[index] != "" && total_req[index] > "0.00" && total_req[index] != "NaN.00"){

                var putProductId = getProductId[index];
                var putProductName = getProductName[index];

                if(getProductName[index] == "Unspecified Product"){
                    var putProductId = $("#putProductId"+index).val();
                    var putProductName = $("#putProductName"+index).html();
                }
                
                TotalBudgetList += +total_req[index].replace(/,/g, '');
                TotalQty+= +qty_req[index].replace(/,/g, '');
                TotalPrice+= +price_req[index].replace(/,/g, '');
                var html = '<tr>' +
                    '<input type="hidden" name="var_product_id[]" value="' + putProductId + '">' +
                    '<input type="hidden" name="var_product_name[]" id="var_product_name" value="' + putProductName + '">' +
                    '<input type="hidden" name="var_quantity[]" class="qty_req2'+ index +'" data-id="'+ index +'" value="' + currencyTotal(qty_req[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_uom[]" value="' + getUom[index] + '">' +
                    '<input type="hidden" name="var_price[]" class="price_req2'+ index +'" value="' + currencyTotal(price_req[index]).replace(/,/g, '') + '">' +
                    '<input type="hidden" name="var_total[]" class="total_req2'+ index +'" value="' + total_req[index] + '">' +
                    '<input type="hidden" name="var_currency[]" value="' + getCurrency[index] + '">' +
                    '<input type="hidden" name="var_date" value="' + date + '">' +
                    '<input type="hidden" name="var_remark[]" value="' + getRemark[index] + '">' +
                    '<input type="hidden" name="var_combinedBudgetSectionDetail_RefID[]" value="' + combinedBudgetSectionDetail_RefID[index] + '">' +
                    '<input type="hidden" name="var_combinedBudget_RefID" value="' + combinedBudget_RefID + '">' +

                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkId[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getWorkName[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductId + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + putProductName + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getUom[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getCurrency[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + getRemark[index] + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="price_req2'+ index +'">' + currencyTotal(price_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="qty_req2'+ index +'">' + currencyTotal(qty_req[index]) + '</span>' + '</td>' +
                    '<td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;">' + '<span data-id="'+ index +'" class="total_req2'+ index +'">' + currencyTotal(total_req[index]) + '</span>' + '</td>' +
                    
                    '</tr>';
                $('table.TablePurchaseRequisition tbody').append(html);

                $("#TotalBudgetList").html(currencyTotal(TotalBudgetList));
                $("#GrandTotal").html(currencyTotal(TotalBudgetList));
                $("#TotalQty").html(currencyTotal(TotalQty));
                $("#TotalPrice").html(currencyTotal(TotalPrice));

                $("#submitPR").prop("disabled", false);
                $(".ActionButton").prop("disabled", false);
                $(".ActionButtonAll").prop("disabled", false);        
            }
        });
        
    }
</script>

<script type="text/javascript">
    function ResetBudget() {
      $("input[name='qty_req[]']").val("");
      $("input[name='price_req[]']").val("");
      $("input[name='total_req[]']").val("");
    }
    
</script>


<script type="text/javascript">
    function CancelPurchaseRequisition() {
        $("#loading").show();
        $(".loader").show();
        location.reload();
    }
</script>

<script>
    $(function() {
        $("#FormSubmitProcReq").on("submit", function(e) { //id of form 
            e.preventDefault();

            $("#submitPR").prop("disabled", true);

            var varFileUpload_UniqueID = "Upload";
            window['JSFunc_GetActionPanel_CommitFromOutside_' + varFileUpload_UniqueID]();
                
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
                    $.ajax({
                        url: action,
                        dataType: 'json', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: method,
                        success: function(response) {
                            
                            console.log(response);

                            if(response.message === "SelectWorkFlow"){
                                
                                $("#loading").hide();
                                $(".loader").hide();

                                $('#getWorkFlow').modal('toggle');
                                
                                var t = $('#tableGetWorkFlow').DataTable();
                                t.clear();
                                $.each(response.data, function(key, val) {
                                    t.row.add([
                                        '<td><span data-dismiss="modal" onclick="SelectWorkFlow(\'' + val.sys_ID + '\', \'' + response.businessDocument_RefID + '\', \'' + response.documentNumber + '\', \'' + response.approverEntity_RefID + '\');"><img src="{{ asset("AdminLTE-master/dist/img/add.png") }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></span></td>',
                                        '<td style="border:1px solid #e9ecef;">' + val.fullApproverPath + '</td></tr></tbody>'
                                    ]).draw();
                                });
                                
                            }
                            else{
                                
                                $("#loading").hide();
                                $(".loader").hide();

                                swalWithBootstrapButtons.fire({

                                    title: 'Successful !',
                                    type: 'success',
                                    html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + response.documentNumber + '</span>',
                                    showCloseButton: false,
                                    showCancelButton: false,
                                    focusConfirm: false,
                                    confirmButtonText: '<span style="color:black;"> OK </span>',
                                    confirmButtonColor: '#4B586A',
                                    confirmButtonColor: '#e9ecef',
                                    reverseButtons: true
                                }).then((result) => {
                                    if (result.value) {
                                        $("#loading").show();
                                        $(".loader").show();

                                        window.location.href = '/PurchaseRequisition?var=1';
                                    }
                                })
                            }

                        },
                        error: function(response) { // handle the error

                            $("#submitPR").prop("disabled", false);

                            swalWithBootstrapButtons.fire({

                            title: 'Cancelled',
                            text: "You don't have access",
                            type: 'error',
                            confirmButtonColor: '#e9ecef',
                            confirmButtonText: '<span style="color:black;"> OK </span>',

                            }).then((result) => {
                            if (result.value) {
                                $("#loading").show();
                                $(".loader").show();
                                window.location.href = '/PurchaseRequisition?var=1';
                            }
                            })

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
                        confirmButtonText: '<span style="color:black;"> OK </span>',

                    }).then((result) => {
                        if (result.value) {
                            $("#loading").show();
                            $(".loader").show();
                            window.location.href = '/PurchaseRequisition?var=1';
                        }
                    })
                }
            })
        });

    });
</script>


<script>

    function SelectWorkFlow(workFlowPath_RefID, businessDocument_RefID, documentNumber, approverEntity_RefID) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("StoreWorkFlow") !!}?workFlowPath_RefID=' + workFlowPath_RefID + '&businessDocument_RefID=' + businessDocument_RefID + '&documentNumber=' + documentNumber + '&approverEntity_RefID=' + approverEntity_RefID,
            success: function(data) {

                $("#loading").hide();
                $(".loader").hide();

                const swalWithBootstrapButtons = Swal.mixin({
                    confirmButtonClass: 'btn btn-success btn-sm',
                    cancelButtonClass: 'btn btn-danger btn-sm',
                    buttonsStyling: true,
                })
                
                swalWithBootstrapButtons.fire({

                    title: 'Successful !',
                    type: 'success',
                    html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + data.documentNumber + '</span>',
                    showCloseButton: false,
                    showCancelButton: false,
                    focusConfirm: false,
                    confirmButtonText: '<span style="color:black;"> OK </span>',
                    confirmButtonColor: '#4B586A',
                    confirmButtonColor: '#e9ecef',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $("#loading").show();
                        $(".loader").show();

                        window.location.href = '/PurchaseRequisition?var=1';
                    }
                })
                
            },
            error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire("Cancelled", "Data Cancel Inputed", "error");
            }
        });

    }
</script>