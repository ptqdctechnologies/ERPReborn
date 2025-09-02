<script>
    let dataStore       = [];
    let deliveryFrom    = document.getElementById("delivery_from");
    let deliveryTo      = document.getElementById("delivery_to");
    const dataTable     = {!! json_encode($data ?? []) !!};

    function checkOneLineBudgetContents(indexInput) {
        const rows = document.querySelectorAll("#tableReferenceNumberDetail tbody tr");
        let hasFullRow = false;

        rows.forEach((row, index) => {
            const qty   = document.getElementById(`qty_req${index}`)?.value.trim();
            const note  = document.getElementById(`note${index}`)?.value.trim();

            if (qty !== "" && note !== "") {
                hasFullRow = true;
            }
        });

        rows.forEach((row, index) => {
            const qtyEl     = document.getElementById(`qty_req${index}`);
            const noteEl    = document.getElementById(`note${index}`);

            if (hasFullRow) {
                $(qtyEl).css("border", "1px solid #ced4da");
                $(noteEl).css("border", "1px solid #ced4da");
                $("#deliveryOrderDetailsMessage").hide();
            } else {
                if (indexInput > -1) {
                    if (indexInput == index) {
                        if (qtyEl.value.trim() != "" || noteEl.value.trim() != "") {
                            $(qtyEl).css("border", "1px solid red");
                            $(noteEl).css("border", "1px solid red");
                            $("#deliveryOrderDetailsMessage").show();
                        } else {
                            $(qtyEl).css("border", "1px solid #ced4da");
                            $(noteEl).css("border", "1px solid #ced4da");
                            $("#deliveryOrderDetailsMessage").hide();
                        }
                    }

                    if (indexInput != index && (qtyEl.value.trim() == "" && noteEl.value.trim() == "")) {
                        $(qtyEl).css("border", "1px solid #ced4da");
                        $(noteEl).css("border", "1px solid #ced4da");
                    } 
                } else {
                    $(qtyEl).css("border", "1px solid red");
                    $(noteEl).css("border", "1px solid red");
                    $("#deliveryOrderDetailsMessage").show();
                }
            }
        });

        return hasFullRow;
    }

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

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tableDeliverOrderDetailList tbody tr');

        rows.forEach(row => {
            const totalCell = row.children[5];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        document.getElementById('GrandTotal').innerText = `Total: ${total}`;
    }

    function summaryData() {
        const sourceTable = document.getElementById('tableReferenceNumberDetail').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tableDeliverOrderDetailList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const recordRefID               = row.querySelector('input[id^="record_RefID"]');
            const referenceDocumentRefID    = row.querySelector('input[id^="referenceDocument_RefID"]');
            const quantityUnitRefID         = row.querySelector('input[id^="quantityUnit_RefID"]');
            const underlyingDetailRefID     = row.querySelector('input[id^="underlyingDetail_RefID"]');
            const productRefID              = row.querySelector('input[id^="product_RefID"]');
            const qtyInput                  = row.querySelector('input[id^="qty_req"]');
            const noteInput                 = row.querySelector('textarea[id^="note"]');

            if (
                qtyInput && noteInput &&
                qtyInput.value.trim() !== '' &&
                noteInput.value.trim() !== ''
            ) {
                const productCode   = row.children[6].innerText.trim();
                const productName   = row.children[7].innerText.trim();
                const uom           = row.children[8].innerText.trim();
                const qtyAvail      = row.children[10].innerText.trim();

                const qty   = qtyInput.value.trim();
                const note  = noteInput.value.trim();

                let found           = false;
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const recordID = targetRow.children[0].value.trim();

                    if (recordID == recordRefID.value) {
                        targetRow.children[5].innerText = currencyTotal(qty);
                        targetRow.children[6].innerText = note;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.recordID == recordRefID.value);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                recordID: parseInt(recordRefID.value),
                                entities: {
                                    referenceDocument_RefID: parseInt(referenceDocumentRefID.value),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                    remarks: note,
                                    underlyingDetail_RefID: parseInt(underlyingDetailRefID.value),
                                    product_RefID: parseInt(productRefID.value)
                                },
                            }
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <tr>
                            <input type="hidden" name="recordID[]" value="${recordRefID.value}">
                            <input type="hidden" name="qty_avail[]" value="-">

                            <td style="text-align: right;padding: 0.8rem;">${productCode || '-'}</td>
                            <td style="text-align: left;padding: 0.8rem;">${productName || ''}</td>
                            <td style="text-align: left;padding: 0.8rem;">${uom || '-'}</td>
                            <td style="text-align: right;padding: 0.8rem;">${currencyTotal(qty) || ''}</td>
                            <td style="text-align: left;padding: 0.8rem;" hidden>${note || ''}</td>
                        </tr>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        recordID: parseInt(recordRefID.value),
                        entities: {
                            referenceDocument_RefID: parseInt(referenceDocumentRefID.value),
                            quantity: parseFloat(qty.replace(/,/g, '')),
                            quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                            remarks: note,
                            underlyingDetail_RefID: parseInt(underlyingDetailRefID.value),
                            product_RefID: parseInt(productRefID.value)
                        },
                    });
                }
            } else {
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const recordID = targetRow.children[0].value.trim();

                    if (recordID == recordRefID.value) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => {
                    return !(item.recordID == recordRefID.value);
                });
            }
        }

        updateGrandTotal();
    }

    function validationForm() {
        const isDeliveryFromNotEmpty    = deliveryFrom.value.trim() !== '';
        const isDeliveryToNotEmpty      = deliveryTo.value.trim() !== '';
        const isTableNotEmpty           = checkOneLineBudgetContents();

        if (isDeliveryFromNotEmpty && isDeliveryToNotEmpty) {
            $('#deliveryOrderFormModal').modal('show');
            summaryData();
        } else {
            if (!isDeliveryFromNotEmpty && !isDeliveryToNotEmpty) {
                $("#delivery_from").css("border", "1px solid red");
                $("#delivery_to").css("border", "1px solid red");

                $("#deliveryFromMessage").show();
                $("#deliveryToMessage").show();
                return;
            }
            if (!isDeliveryFromNotEmpty) {
                $("#delivery_from").css("border", "1px solid red");
                $("#deliveryFromMessage").show();
                return;
            }
            if (!isDeliveryToNotEmpty) {
                $("#delivery_to").css("border", "1px solid red");
                $("#deliveryToMessage").show();
                return;
            }
        }
    }

    function GetReferenceNumberDetail(dataDetail) {
        $(".loadingReferenceNumberDetail").hide();
        $(".errorMessageContainerReferenceNumberDetail").hide();

        let totalRefNumberDetail = 0;

        let tbody = $('#tableReferenceNumberDetail tbody');
        tbody.empty();

        let tbodyList = $('#tableDeliverOrderDetailList tbody');
        tbodyList.empty();

        $.each(dataDetail, function(key, val2) {
            totalRefNumberDetail += parseFloat(val2.qtyReq);

            dataStore.push({
                recordID: parseInt(val2.deliveryOrderDetail_ID),
                entities: {
                    referenceDocument_RefID: parseInt(val2.referenceDocument_RefID),
                    quantity: parseFloat(val2.qtyReq.replace(/,/g, '')),
                    quantityUnit_RefID: parseInt(val2.quantityUnit_RefID),
                    remarks: val2.notes,
                    underlyingDetail_RefID: parseInt(val2.underlyingDetail_RefID),
                    product_RefID: parseInt(val2.product_RefID)
                },
            });

            let balanced = parseFloat(val2.quantity) - parseFloat(val2.qtyReq);

            let row = `
                <tr>
                    <input id="record_RefID${key}" value="${val2.deliveryOrderDetail_ID}" type="hidden" />
                    <input id="referenceDocument_RefID${key}" value="${val2.referenceDocument_RefID}" type="hidden" />
                    <input id="quantityUnit_RefID${key}" value="${val2.quantityUnit_RefID}" type="hidden" />
                    <input id="underlyingDetail_RefID${key}" value="${val2.underlyingDetail_RefID}" type="hidden" />
                    <input id="product_RefID${key}" value="${val2.product_RefID}" type="hidden" />

                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.combinedBudgetSectionCode} - ${val2.combinedBudgetSectionName}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.productCode || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.productName || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.quantityUnitName || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.quantity || '-'}</td>
                    <td style="text-align: center;border:1px solid #e9ecef;">${val2.qtyAvail || '-'}</td>
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
                var result = val2.qtyAvail - qty_req;

                if (qty_req > val2.qtyAvail) {
                    $(this).val("");
                    $(`#balance${data_index}`).val("");
                    ErrorNotif("Qty Request is over Qty Avail !");
                } else {
                    $(`#balance${data_index}`).val(result.toFixed(2));
                    calculateTotal();
                }

                checkOneLineBudgetContents(key);
            });

            $(`#note${key}`).on('keyup', function() {
                checkOneLineBudgetContents(key);
            });

            let rowList = `
                <tr>
                    <input type="hidden" name="recordID[]" value="${val2.deliveryOrderDetail_ID}">
                    <input type="hidden" name="qty_avail[]" value="${val2.quantity}">

                    <td style="text-align: right;padding: 0.8rem;">${val2.productCode || '-'}</td>
                    <td style="text-align: left;padding: 0.8rem;">${val2.productName || ''}</td>
                    <td style="text-align: left;padding: 0.8rem;">${val2.quantityUnitName || '-'}</td>
                    <td style="text-align: right;padding: 0.8rem;">${val2.qtyReq || ''}</td>
                    <td style="text-align: left;padding: 0.8rem;" hidden>${val2.notes || ''}</td>
                </tr>
            `;

            tbodyList.append(rowList);
        });

        dataStore = dataStore.filter(item => item !== undefined);
        $("#deliveryOrderDetail").val(JSON.stringify(dataStore));

        document.getElementById('TotalReferenceNumber').textContent = currencyTotal(totalRefNumberDetail);
        document.getElementById('GrandTotal').textContent = currencyTotal(totalRefNumberDetail);
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
            showCancelButton: true,
            focusConfirm: false,
            cancelButtonText: '<span style="color:black;"> Cancel </span>',
            confirmButtonText: '<span style="color:black;"> OK </span>',
            cancelButtonColor: '#DDDAD0',
            confirmButtonColor: '#DDDAD0',
            reverseButtons: true
        }).then((result) => {
            if ('value' in result) {
                ShowLoading();
                RevisionDeliveryOrderStore({...formatData, comment: result.value});
            }
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
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:#0046FF;font-weight:bold;">' + res.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        cancelForm("{{ route('DeliveryOrder.index', ['var' => 1]) }}");
                    });
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error', jqXHR, textStatus, errorThrown);
                HideLoading();
                ErrorNotif("Data Cancel Inputed");
            }
        });
    }

    function SubmitForm() {
        $('#deliveryOrderFormModal').modal('hide');

        var action = $('#FormRevisionDeliveryOrder').attr("action");
        var method = $('#FormRevisionDeliveryOrder').attr("method");
        var form_data = new FormData($('#FormRevisionDeliveryOrder')[0]);
        form_data.append('deliveryOrderDetail', JSON.stringify(dataStore));

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
                HideLoading();

                if (response.message == "WorkflowError") {
                    $("#submitRevisionDO").prop("disabled", false);

                    CancelNotif("You don't have access", "{{ route('DeliveryOrder.index', ['var' => 1]) }}");
                } else if (response.message == "MoreThanOne") {
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

                    SelectWorkFlow(formatData);
                }
            },
            error: function(response) {
                HideLoading();
                CancelNotif("You don't have access", "{{ route('DeliveryOrder.index', ['var' => 1]) }}");
            }
        });
    }

    $(window).on('load', function() {
        GetReferenceNumberDetail(dataTable);
        getDocumentType("Delivery Order Revision Form");
    });
</script>