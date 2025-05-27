<script>
    let dataStore = [];
    const dataTable = document.getElementById('data_table');

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

    function GetReferenceNumberDetail(dataDetail) {
        $(".loadingReferenceNumberDetail").hide();

        let totalRefNumberDetail = 0;
        let tbody = $('#tableReferenceNumberDetail tbody');
        tbody.empty();

        let tbodyList = $('#tableDeliverOrderDetailList tbody');
        tbodyList.empty();

        $.each(dataDetail, function(key, val2) {
            totalRefNumberDetail += parseFloat(val2.qtyReq);

            dataStore.push({
                recordID: val2.deliveryOrderDetail_ID,
                entities: {
                    referenceDocument_RefID: null,
                    quantity: parseFloat(val2.qtyReq.replace(/,/g, '')),
                    quantityUnit_RefID: val2.quantityUnit_RefID,
                    remarks: val2.notes,
                    underlyingDetail_RefID: val2.underlyingDetail_RefID,
                    product_RefID: val2.product_RefID
                },
            });

            let balanced = parseFloat(val2.quantity) - parseFloat(val2.qtyReq);

            let row = `
                <tr>
                    <input id="deliveryOrderDetail_ID${key}" value="${val2.deliveryOrderDetail_ID || ''}" type="hidden" />
                    <input id="underlyingDetail_RefID${key}" value="${val2.underlyingDetail_RefID || ''}" type="hidden" />
                    <input id="product_RefID${key}" value="${val2.product_RefID || ''}" type="hidden" />
                    <input id="product_code${key}" value="${val2.productCode + key || ''}" type="hidden" />
                    <input id="product_name${key}" value="${val2.productName || ''}" type="hidden" />
                    <input id="uom${key}" value="${val2.quantityUnitName || ''}" type="hidden" />
                    <input id="qty_reference${key}" value="${currencyTotal(val2.quantity || 0)}" type="hidden" />
                    <input id="qty_avail${key}" value="-" type="hidden" />
                    <input id="qty_unit_refID${key}" value="${val2.quantityUnit_RefID || ''}" type="hidden" />

                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.productCode + key || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.productName || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.quantityUnitName || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.quantity || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">-</td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input class="form-control number-without-negative" id="qty_req${key}" data-index=${key} data-quantity=${val2.qtyReq || 0} autocomplete="off" value=${val2.qtyReq || 0} style="border-radius:0px;" />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input class="form-control number-without-negative" id="balance${key}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(balanced || 0)}" disabled />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 150px;">
                        <textarea id="note${key}" class="form-control">${val2.notes || ''}</textarea>
                    </td>
                </tr>
            `;

            tbody.append(row);

            $(`#qty_req${key}`).on('keyup', function() {
                var qty_req = $(this).val().replace(/,/g, '');
                var data_index = $(this).data('index');
                var result = val2.quantity - qty_req;

                if (qty_req > val2.quantity) {
                    $(this).val("");
                    $(`#balance${data_index}`).val("");
                    ErrorNotif("Qty Request is over Qty Avail !");
                } else {
                    $(`#balance${data_index}`).val(result.toFixed(2));
                    calculateTotal();
                }
            });

            let rowList = `
                <tr>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.productCode + key || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.productName || ''}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.quantityUnitName || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">-</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.qtyReq || ''}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${currencyTotal(balanced || 0)}</td>
                    <td style="text-align: center;padding: 0.8rem 0px;">${val2.notes || ''}</td>
                </tr>
            `;

            tbodyList.append(rowList);
        });

        dataStore = dataStore.filter(item => item !== undefined);
        $("#deliveryOrderDetail").val(JSON.stringify(dataStore));

        document.getElementById('TotalReferenceNumber').textContent = totalRefNumberDetail.toFixed(2);
        document.getElementById('GrandTotal').textContent = totalRefNumberDetail.toFixed(2);

        $("#tableReferenceNumberDetail tbody").show();
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
            RevisionDeliveryOrderStore({...formatData, comment: result.value});
        });
    }

    function RevisionDeliveryOrderStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("DeliveryOrder.updates") }}',
            success: function(res) {
                HideLoading();

                if (res.status === 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:red;">' + res.documentNumber + '</span>',
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
                HideLoading();
                console.log('error', jqXHR, textStatus, errorThrown);
            }
        });
    }

    $("#reference-number-details-add").on('click', function() {
        var totalReferenceNumber = document.getElementById('TotalReferenceNumber').textContent;

        $("#tableReferenceNumberDetail tbody tr").each(function(index) {
            var deliveryOrderDetail_ID  = $(this).find(`input[id="deliveryOrderDetail_ID${index}"]`).val();
            var product_RefID           = $(this).find(`input[id="product_RefID${index}"]`).val();
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

            $("#tableDeliverOrderDetailList tbody tr").each(function() {
                var existingProductCode = $(this).find("td:eq(0)").text();
                var existingProductName = $(this).find("td:eq(1)").text();
                var existingUOM         = $(this).find("td:eq(2)").text();
                var existingQtyAvail    = $(this).find("td:eq(3)").text();

                if (existingProductCode === productCode) {
                    if (existingProductName === productName && existingUOM === uom &&  existingQtyAvail === qtyAvail) {
                        rowToUpdate = $(this);
                    }
                }
            });

            if (rowToUpdate) {
                rowToUpdate.find("td:eq(4)").text(qtyReq);
                rowToUpdate.find("td:eq(5)").text(balance);
                rowToUpdate.find("td:eq(6)").text(note);

                dataStore[index] = {
                    recordID: deliveryOrderDetail_ID,
                    entities: {
                        referenceDocument_RefID: null,
                        quantity: parseFloat(qtyReq.replace(/,/g, '')),
                        quantityUnit_RefID: qtyUnitRefID,
                        remarks: note,
                        underlyingDetail_RefID: underlyingDetailRefID,
                        product_RefID: product_RefID
                    },
                };
            } else {
                var newRow = `<tr>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productCode}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productName}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${uom}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${qtyAvail}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(qtyReq)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(balance)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${note}</td>
                </tr>`;

                dataStore.push({
                    recordID: deliveryOrderDetail_ID,
                    entities: {
                        referenceDocument_RefID: null,
                        quantity: parseFloat(qtyReq.replace(/,/g, '')),
                        quantityUnit_RefID: qtyUnitRefID,
                        remarks: note,
                        underlyingDetail_RefID: underlyingDetailRefID,
                        product_RefID: product_RefID
                    },
                });

                $("#tableDeliverOrderDetailList").find("tbody").append(newRow);
            }
        });

        dataStore = dataStore.filter(item => item !== undefined);

        $("#deliveryOrderDetail").val(JSON.stringify(dataStore));
        document.getElementById('GrandTotal').textContent = totalReferenceNumber;
    });

    $('#reference-number-details-reset').on('click', function() {
        dataStore = [];

        $('input[id^="qty_req"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="balance"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('textarea[id^="note"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('#tableDeliverOrderDetailList tbody').empty();

        document.getElementById('GrandTotal').textContent = "0.00";
        document.getElementById('TotalReferenceNumber').textContent = "0.00";
    });

    $("#FormRevisionDeliveryOrder").on("submit", function(e) {
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
                            $("#submitRevisionDO").prop("disabled", false);

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
                        console.log('response error', response);
                        
                        HideLoading();
                        $("#submitRevisionDO").prop("disabled", false);
                        CancelNotif("You don't have access", '/DeliveryOrder?var=1');
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                HideLoading();
                CancelNotif("Data Cancel Inputed", '/DeliveryOrder?var=1');
            }
        });
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).on('load', function() {
        const data = JSON.parse(dataTable.value);

        GetReferenceNumberDetail(data);
        getDocumentType("Delivery Order Revision Form");
    });
</script>