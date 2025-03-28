<script>
    var date = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
    var indexReferenceNumberDetail  = 0;

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="qty_req"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

        document.getElementById('TotalReferenceNumber').textContent = currencyTotal(total);
    }

    function CancelDeliveryOrder() {
        ShowLoading();
        window.location.href = '/DeliveryOrder?var=1';
    }

    function GetReferenceNumberDetail(reference_id, reference_number) {
        $("#tableReferenceNumberDetail tbody").hide();
        $(".loadingReferenceNumberDetail").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getPurchaseOrderDetail") !!}?purchase_order_id=' + reference_id,
            success: function(data) {
                $(".loadingReferenceNumberDetail").hide();

                let tbody = $('#tableReferenceNumberDetail tbody');

                if (Array.isArray(data) && data.length > 0) {
                    let modifyColumn = `<td rowspan="${data.length}" style="text-align: center; padding: 10px !important;">${reference_number}</td>`;

                    $.each(data, function(key, val2) {
                        let randomNumber = Math.floor(Math.random() * 11);
                        let row = `
                            <tr>
                                <input id="underlyingDetail_RefID${indexReferenceNumberDetail}" value="${val2.Sys_PID}" type="hidden" />
                                <input id="reference_number${indexReferenceNumberDetail}" value="${reference_number}" type="hidden" />
                                <input id="product_code${indexReferenceNumberDetail}" value="-" type="hidden" />
                                <input id="product_name${indexReferenceNumberDetail}" value="-" type="hidden" />
                                <input id="uom${indexReferenceNumberDetail}" value="-" type="hidden" />
                                <input id="qty_reference${indexReferenceNumberDetail}" value="${currencyTotal(val2.Quantity)}" type="hidden" />
                                <input id="qty_avail${indexReferenceNumberDetail}" value="${currencyTotal(randomNumber)}" type="hidden" />
                                <input id="qty_unit_refID${indexReferenceNumberDetail}" value="${val2.QuantityUnit_RefID}" type="hidden" />

                                ${key === 0 ? modifyColumn : ''}
                                <td style="text-align: center;">-</td>
                                <td style="text-align: center;">-</td>
                                <td style="text-align: center;">-</td>
                                <td style="text-align: center;">${currencyTotal(val2.Quantity)}</td>
                                <td style="text-align: center;">${currencyTotal(randomNumber)}</td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                    <input class="form-control number-without-negative" id="qty_req${indexReferenceNumberDetail}" data-index=${indexReferenceNumberDetail} data-quantity=${randomNumber} autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                    <input class="form-control number-without-negative" id="balance${indexReferenceNumberDetail}" autocomplete="off" style="border-radius:0px;" disabled />
                                </td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 150px;">
                                    <textarea id="note${indexReferenceNumberDetail}" class="form-control"></textarea>
                                </td>
                            </tr>
                        `;

                        tbody.append(row);

                        $(`#qty_req${indexReferenceNumberDetail}`).on('keyup', function() {
                            var qty_req = $(this).val().replace(/,/g, '');
                            var data_index = $(this).data('index');
                            var data_total_request = $(this).data('quantity');
                            var result = data_total_request - qty_req;

                            if (Math.sign(result) === -1) {
                                $(this).val("");
                                $(`#balance${data_index}`).val("");
                                ErrorNotif("Qty Request is over Qty Avail !");
                            } else {
                                $(`#balance${data_index}`).val(result.toFixed(2));
                                calculateTotal();
                            }
                        });

                        indexReferenceNumberDetail += 1;
                    });

                    $("#tableReferenceNumberDetail tbody").show();
                } else {
                    $(".errorMessageContainerReferenceNumberDetail").show();
                    $("#errorMessageReferenceNumberDetail").text(`Data not found.`);

                    $("#tableReferenceNumberDetail_length").hide();
                    $("#tableReferenceNumberDetail_filter").hide();
                    $("#tableReferenceNumberDetail_info").hide();
                    $("#tableReferenceNumberDetail_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableReferenceNumberDetail tbody').empty();
                $(".loadingReferenceNumberDetail").hide();
                $(".errorMessageContainerReferenceNumberDetail").show();
                $("#errorMessageReferenceNumberDetail").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    function getDocumentType() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDocumentType") !!}',
            success: function(data) {
                const result = data.find(({ Name }) => Name === "Delivery Order Form");

                if (Object.keys(result).length > 0) {
                    $("#DocumentTypeID").val(result.Sys_ID);
                } else {
                    console.log('error get document type');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('error', textStatus, errorThrown);
            }
        });
    }

    function SelectWorkFlow(formatData) {
        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success btn-sm',
            cancelButtonClass: 'btn btn-danger btn-sm',
            buttonsStyling: true,
        });

        swalWithBootstrapButtons.fire({
            title: 'Comment',
            text: "Please write your comment here",
            type: 'question',
            input: 'textarea',
            showCloseButton: false,
            showCancelButton: false,
            focusConfirm: false,
            confirmButtonText: '<span style="color:black;"> OK </span>',
            confirmButtonColor: '#4B586A',
            confirmButtonColor: '#e9ecef',
            reverseButtons: true
        }).then((result) => {
            ShowLoading();
            DeliveryOrderStore({...formatData, comment: result.value});
        });
    }

    function DeliveryOrderStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("DeliveryOrder.store") }}',
            success: function(res) {
                HideLoading();

                if (typeof res == 'object' && Object.keys(res).length > 0 && res.metadata.HTTPStatusCode == 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + res.data.businessDocument.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        ShowLoading();
                        window.location.href = '/DeliveryOrder?var=1';
                    });
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error', jqXHR, textStatus, errorThrown);
            }
        });
    }

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $("#reference-number-details-add").on('click', function() {
        let dataStore = [];
        var totalReferenceNumber = document.getElementById('TotalReferenceNumber').textContent;

        $("#tableReferenceNumberDetail tbody tr").each(function(index) {
            var referenceNumber         = $(this).find(`input[id="reference_number${index}"]`).val();
            var productCode             = $(this).find(`input[id="product_code${index}"]`).val();
            var productName             = $(this).find(`input[id="product_name${index}"]`).val();
            var uom                     = $(this).find(`input[id="uom${index}"]`).val();
            var qtyAvail                = $(this).find(`input[id="qty_avail${index}"]`).val();
            var qtyReq                  = $(this).find(`input[id="qty_req${index}"]`).val();
            var balance                 = $(this).find(`input[id="balance${index}"]`).val();
            var note                    = $(this).find(`textarea[id="note${index}"]`).val();
            var underlyingDetailRefID   = $(this).find(`input[id="underlyingDetail_RefID${index}"]`).val();
            var qtyUnitRefID            = $(this).find(`input[id="qty_unit_refID${index}"]`).val();

            if (!qtyReq || !note) {
                return;
            }

            var rowToUpdate = null;

            $("#tableReferenceNumberList tbody tr").each(function() {
                var existingRefNumber   = $(this).find("td:eq(0)").text();
                var existingProductCode = $(this).find("td:eq(1)").text();
                var existingProductName = $(this).find("td:eq(2)").text();
                var existingUOM         = $(this).find("td:eq(3)").text();
                var existingQtyAvail    = $(this).find("td:eq(4)").text();

                if (existingRefNumber === referenceNumber) {
                    if (existingProductCode === productCode && existingProductName === productName && existingUOM === uom &&  existingQtyAvail === qtyAvail) {
                        rowToUpdate = $(this);
                    }
                }
            });

            if (rowToUpdate) {
                rowToUpdate.find("td:eq(5)").text(qtyReq);
                rowToUpdate.find("td:eq(6)").text(balance);
                rowToUpdate.find("td:eq(7)").text(note);

                dataStore[index] = {
                    quantity: qtyReq,
                    quantityUnit_RefID: qtyUnitRefID,
                    remarks: note,
                    underlyingDetail_RefID: underlyingDetailRefID,
                };
            } else {
                var newRow = `<tr>
                    <td style="text-align: center; padding: 0.8rem 0px;">${referenceNumber}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productCode}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productName}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${uom}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${qtyAvail}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(qtyReq)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(balance)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${note}</td>
                </tr>`;

                dataStore.push({
                    quantity: qtyReq,
                    quantityUnit_RefID: qtyUnitRefID,
                    remarks: note,
                    underlyingDetail_RefID: underlyingDetailRefID,
                });

                $("#tableReferenceNumberList").find("tbody").append(newRow);
            }
        });

        dataStore = dataStore.filter(item => item !== undefined);

        $("#deliveryOrderDetail").val(JSON.stringify(dataStore));
        document.getElementById('GrandTotal').textContent = totalReferenceNumber;
    });

    $('#reference-number-details-reset').on('click', function() {
        $('input[id^="qty_req"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="balance"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('textarea[id^="note"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('#tableReferenceNumberList tbody').empty();

        document.getElementById('GrandTotal').textContent = "0.00";
        document.getElementById('TotalReferenceNumber').textContent = "0.00";
    });

    $('#referenceNumberModal').on('click', 'tbody tr', function() {
        var sysId                   = $(this).find('input[data-trigger="sys_id_reference_number"]').val();
        var sysCombineBudgetRefID   = $(this).find('input[data-trigger="sys_combined_budget_RefID"]').val();
        var sysRequesterRefID       = $(this).find('input[data-trigger="sys_requester_RefID"]').val();
        var referenceNumber         = $(this).find('td:nth-child(2)').text();
        
        $("#reference_id").val(sysId);
        $("#var_combinedBudget_RefID").val(sysCombineBudgetRefID);
        $("#requesterWorkerJobsPosition_RefID").val(sysRequesterRefID);
        $("#reference_number").val(referenceNumber);
        GetReferenceNumberDetail(sysId, referenceNumber);

        $('#referenceNumberModal').modal('hide');
    });

    $('#tableGetTransporter tbody').on('click', 'tr', function () {
        var sysId           = $(this).find('input[data-trigger="sys_id_transporter"]').val();
        var transporterName = $(this).find('td:nth-child(2)').text();

        $("#transporter_id").val(sysId);
        $("#transporter_name").val(transporterName);
        $("#transporter_phone").val('-');
        $("#transporter_fax").val('-');
        $("#transporter_contact").val('-');
        $("#transporter_handphone").val('-');
        $("#transporter_address").val('-');
    });

    $("#FormSubmitDeliveryOrder").on("submit", function(e) {
        e.preventDefault();

        const swalWithBootstrapButtons = Swal.mixin({
            confirmButtonClass: 'btn btn-success btn-sm',
            cancelButtonClass: 'btn btn-danger btn-sm',
            buttonsStyling: true,
        });

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
                var action = $(this).attr("action");
                var method = $(this).attr("method");
                var form_data = new FormData($(this)[0]);

                ShowLoading();

                $.ajax({
                    url: action,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: method,
                    success: function(response) {
                        if (response.message == "WorkflowError") {
                            HideLoading();
                            $("#submitArf").prop("disabled", false);

                            CancelNotif("You don't have access", '/DeliveryOrder?var=1');
                        } else if (response.message == "MoreThanOne") {
                            HideLoading();

                            $('#getWorkFlow').modal('toggle');

                            var t = $('#tableGetWorkFlow').DataTable();
                            t.clear();
                            $.each(response.data, function(key, val) {
                                t.row.add([
                                    '<td><span data-dismiss="modal" onclick="SelectWorkFlow(\'' + val.Sys_ID + '\', \'' + val.NextApprover_RefID + '\', \'' + response.approverEntity_RefID + '\', \'' + response.documentTypeID + '\');"><img src="{{ asset("AdminLTE-master/dist/img/add.png") }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></span></td>',
                                    '<td style="border:1px solid #e9ecef;">' + val.FullApproverPath + '</td></tr></tbody>'
                                ]).draw();
                            });
                        } else {
                            const formatData = {
                                workFlowPath_RefID: response.workFlowPath_RefID, 
                                nextApprover: response.nextApprover_RefID, 
                                approverEntity: response.approverEntity_RefID, 
                                documentTypeID: response.documentTypeID,
                                storeData: response.storeData
                            };

                            HideLoading();
                            SelectWorkFlow(formatData);
                        }
                    },
                    error: function(response) {
                        HideLoading();
                        $("#submitArf").prop("disabled", false);
                        CancelNotif("You don't have access", '/DeliveryOrder?var=1');
                    }
                });
            } else {
                HideLoading();
                CancelNotif("Data Cancel Inputed", '/DeliveryOrder?var=1');
            }
        });
    });

    $(window).one('load', function(e) {
        $(".loadingReferenceNumberDetail").hide();
        $(".errorMessageContainerReferenceNumberDetail").hide();
        $("#var_date").val(date);

        getDocumentType();
    });
</script>