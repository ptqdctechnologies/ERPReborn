<script>
    var dataStore                   = [];
    var date                        = new Date().toJSON().slice(0, 10).replace(/-/g, '-');
    var indexReferenceNumberDetail  = 0;
    var referenceNumber             = document.getElementById("reference_number");
    var deliveryFrom                = document.getElementById("delivery_from");
    var deliveryTo                  = document.getElementById("delivery_to");
    var transporterName             = document.getElementById("transporter_name");
    var tableDeliverOrderDetailList = document.querySelector("#tableDeliverOrderDetailList tbody");
    var submitDO                    = document.getElementById("submitDO");

    function checkTableDataDO() {
        const isReferenceNumberNotEmpty = referenceNumber.value.trim() !== '';
        const isDeliveryFromNotEmpty    = deliveryFrom.value.trim() !== '';
        const isDeliveryToNotEmpty      = deliveryTo.value.trim() !== '';
        const isTransporterNameNotEmpty = transporterName.value.trim() !== '';
        const isTableNotEmpty           = tableDeliverOrderDetailList.rows.length > 0;

        if (isReferenceNumberNotEmpty && isDeliveryFromNotEmpty && isDeliveryToNotEmpty && isTransporterNameNotEmpty && isTableNotEmpty) {
            submitDO.disabled = false;
        } else {
            submitDO.disabled = true;
        }
    }

    const observerTableDeliverOrderDetailList = new MutationObserver(checkTableDataDO);
    observerTableDeliverOrderDetailList.observe(tableDeliverOrderDetailList, { childList: true });

    referenceNumber.addEventListener('input', checkTableDataDO);
    deliveryFrom.addEventListener('input', checkTableDataDO);
    deliveryTo.addEventListener('input', checkTableDataDO);
    transporterName.addEventListener('change', checkTableDataDO);

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
                console.log('data', data);
                
                $(".loadingReferenceNumberDetail").hide();

                $("#delivery_from").val(data[0]['supplierAddress']);
                $("#delivery_to").val(data[0]['deliveryDestinationManualAddress']);
                $("#delivery_from").prop("disabled", false);
                $("#delivery_to").prop("disabled", false);

                let tbody = $('#tableReferenceNumberDetail tbody');

                if (Array.isArray(data) && data.length > 0) {
                    let modifyColumn = `<td rowspan="${data.length}" style="text-align: center; padding: 10px !important;">${reference_number}</td>`;

                    $.each(data, function(key, val2) {
                        let randomNumber = Math.floor(Math.random() * 11);
                        let balanced = currencyTotal(val2.quantity);
                        let row = `
                            <tr>
                                <input id="refDocument_RefID${indexReferenceNumberDetail}" value="${val2.purchaseOrder_RefID || ''}" type="hidden" />
                                <input id="underlyingDetail_RefID${indexReferenceNumberDetail}" value="${val2.purchaseOrderDetail_RefID || ''}" type="hidden" />
                                <input id="reference_number${indexReferenceNumberDetail}" value="${reference_number}" type="hidden" />
                                <input id="product_code${indexReferenceNumberDetail}" value="${val2.productCode || '1000742' + indexReferenceNumberDetail}" type="hidden" />
                                <input id="product_name${indexReferenceNumberDetail}" value="${val2.productName || '-'}" type="hidden" />
                                <input id="uom${indexReferenceNumberDetail}" value="${val2.quantityUnitName || ''}" type="hidden" />
                                <input id="qty_reference${indexReferenceNumberDetail}" value="${currencyTotal(val2.quantity)}" type="hidden" />
                                <input id="qty_avail${indexReferenceNumberDetail}" value="${currencyTotal(val2.quantity)}" type="hidden" />
                                <input id="qty_unit_refID${indexReferenceNumberDetail}" value="${val2.quantityUnit_RefID || '73000000000001'}" type="hidden" />
                                <input id="product_refID${indexReferenceNumberDetail}" value="${val2.product_RefID || '8800000000079' + indexReferenceNumberDetail}" type="hidden" />

                                ${key === 0 ? modifyColumn : ''}
                                <td style="text-align: center;">${val2.productCode || '1000742' + indexReferenceNumberDetail}</td>
                                <td style="text-align: center;">${val2.productName || '-'}</td>
                                <td style="text-align: center;">${val2.quantityUnitName || '-'}</td>
                                <td style="text-align: center;">${currencyTotal(val2.quantity)}</td>
                                <td style="text-align: center;">${currencyTotal(val2.quantity)}</td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                    <input class="form-control number-without-negative" id="qty_req${indexReferenceNumberDetail}" data-index=${indexReferenceNumberDetail} data-quantity="" autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                    <input class="form-control number-without-negative" id="balance${indexReferenceNumberDetail}" autocomplete="off" data-default="${balanced}" value="${balanced}" style="border-radius:0px;" disabled />
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
                            var result = val2.quantity - qty_req;

                            if (parseFloat(qty_req) > val2.quantity) {
                                $(this).val("");
                                $(`#balance${data_index}`).val(balanced);
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
                console.log('error', jqXHR, textStatus, errorThrown);
            }
        });
    }

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tableDeliverOrderDetailList tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[6];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        document.getElementById('TotalReferenceNumber').innerText = "0.00";
        document.getElementById('GrandTotal').innerText = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    function referenceType(source) {
        if (source.value == "PURCHASE_ORDER") {
            $(".purchase-order-components").css("display", "flex");
            $(".internal-use-components").css("display", "none");
            $(".stock-movement-components").css("display", "none");

            getReferenceNumber(source);
        } else if (source.value == "INTERNAL_USE") {
            $(".purchase-order-components").css("display", "none");
            $(".internal-use-components").css("display", "flex");
            $(".stock-movement-components").css("display", "none");
        } else {
            $(".purchase-order-components").css("display", "none");
            $(".internal-use-components").css("display", "none");
            $(".stock-movement-components").css("display", "flex");
        }
    }

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $("#reference-number-details-add").on('click', function() {
        const sourceTable = document.getElementById('tableReferenceNumberDetail').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tableDeliverOrderDetailList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const refDocument_RefID         = row.querySelector('input[id^="refDocument_RefID"]');
            const underlyingDetail_RefID    = row.querySelector('input[id^="underlyingDetail_RefID"]');
            const qtyInput                  = row.querySelector('input[id^="qty_req"]');
            const balanceInput              = row.querySelector('input[id^="balance"]');
            const noteInput                 = row.querySelector('textarea[id^="note"]');
            const qtyUnitRefId              = row.querySelector('input[id^="qty_unit_refID"]');
            const productRefId              = row.querySelector('input[id^="product_refID"]');

            if (
                qtyInput && balanceInput && noteInput &&
                qtyInput.value.trim() !== '' &&
                balanceInput.value.trim() !== '' &&
                noteInput.value.trim() !== ''
            ) {
                const refNumber     = row.children[2].value.trim();
                const productCode   = row.children[3].value.trim();
                const productName   = row.children[4].value.trim();
                const uom           = row.children[5].value.trim();
                const qtyAvail      = row.children[7].value.trim();

                const qty       = qtyInput.value.trim();
                const balance   = balanceInput.value.trim();
                const note      = noteInput.value.trim();

                let found           = false;
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetRefNumber   = targetRow.children[1].innerText.trim();
                    const targetProductCode = targetRow.children[2].innerText.trim();

                    if (targetRefNumber === refNumber && targetProductCode === productCode) {
                        targetRow.children[5].innerText = qty;
                        targetRow.children[6].innerText = balance;
                        targetRow.children[7].innerText = note;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.entities.refNumber === refNumber && item.entities.productCode === productCode);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                entities: {
                                    referenceDocument_RefID: parseInt(refDocument_RefID.value),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(qtyUnitRefId.value),
                                    remarks: note,
                                    underlyingDetail_RefID: underlyingDetail_RefID.value || null,
                                    product_RefID: parseInt(productRefId.value),
                                    refNumber: refNumber,
                                    productCode: productCode
                                }
                            };
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <input type="hidden" name="qty_avail[]" value="${qtyAvail}">
                        <td style="text-align: center;padding: 0.8rem;">${refNumber}</td>
                        <td style="text-align: center;padding: 0.8rem;">${productCode}</td>
                        <td style="text-align: center;padding: 0.8rem;">${productName}</td>
                        <td style="text-align: center;padding: 0.8rem;">${uom}</td>
                        <td style="text-align: center;padding: 0.8rem;">${qty}</td>
                        <td style="text-align: center;padding: 0.8rem;">${balance}</td>
                        <td style="text-align: center;padding: 0.8rem;">${note}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        entities: {
                            referenceDocument_RefID: parseInt(refDocument_RefID.value),
                            quantity: parseFloat(qty.replace(/,/g, '')),
                            quantityUnit_RefID: parseInt(qtyUnitRefId.value),
                            remarks: note,
                            underlyingDetail_RefID: underlyingDetail_RefID.value || null,
                            product_RefID: parseInt(productRefId.value),
                            refNumber: refNumber,
                            productCode: productCode
                        }
                    });
                }

                qtyInput.value = '';
                noteInput.value = '';
                balanceInput.value = balanceInput.getAttribute('data-default');
            }
        }

        dataStore = dataStore.filter(item => item !== undefined);
        $("#deliveryOrderDetail").val(JSON.stringify(dataStore));

        updateGrandTotal();
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
        $('#deliveryOrderDetail').val("");

        document.getElementById('GrandTotal').textContent = "0.00";
        document.getElementById('TotalReferenceNumber').textContent = "0.00";
    });

    document.querySelector('#tableDeliverOrderDetailList tbody').addEventListener('click', function (e) {
        const row = e.target.closest('tr');
        if (!row) return;

        if (['INPUT', 'TEXTAREA'].includes(e.target.tagName)) return;

        const qtyAvail = row.children[0];
        const qtyCell = row.children[5];
        const balanceCell = row.children[6];
        const noteCell = row.children[7];

        if (row.classList.contains('editing-row')) {
            const newQty = qtyCell.querySelector('input')?.value || '';
            const newBalance = balanceCell.querySelector('input')?.value || '';
            const newNote = noteCell.querySelector('textarea')?.value || '';

            qtyCell.innerHTML = newQty;
            balanceCell.innerHTML = newBalance;
            noteCell.innerHTML = newNote;

            const hidden = noteCell.querySelector('input[type="hidden"]');
            noteCell.innerHTML = `${newNote}`;
            if (hidden) noteCell.appendChild(hidden);

            row.classList.remove('editing-row');

            const refNumber   = row.children[1].innerText.trim();
            const productCode = row.children[2].innerText.trim();
            const storeItem   = dataStore.find(item => item.entities.refNumber === refNumber && item.entities.productCode === productCode);
            
            if (storeItem) {
                storeItem.entities.quantity = newQty;
                storeItem.entities.remarks = newNote;

                $("#deliveryOrderDetail").val(JSON.stringify(dataStore));
            }
        } else {
            const currentQty = qtyCell.innerText.trim();
            const currentBalance = balanceCell.innerText.trim();

            const hiddenInput = noteCell.querySelector('input[type="hidden"]');
            const currentNote = noteCell.childNodes[0]?.nodeValue?.trim() || '';

            qtyCell.innerHTML = `<input class="form-control number-without-negative qty-input" value="${currentQty}" autocomplete="off" style="border-radius:0px;width:100px;">`;
            balanceCell.innerHTML = `<input class="form-control number-without-negative balance-input" value="${currentBalance}" autocomplete="off" style="border-radius:0px;width:100px;" readonly>`;
            noteCell.innerHTML = `
                <textarea class="form-control" style="width:100px;">${currentNote}</textarea>
            `;
            if (hiddenInput) noteCell.appendChild(hiddenInput);

            row.classList.add('editing-row');

            const qtyInput = qtyCell.querySelector('.qty-input');
            const balanceInput = balanceCell.querySelector('.balance-input');

            function updateBalance() {
                var qty = parseFloat(qtyInput.value.replace(/,/g, '')) || 0;
                const qtyAvailValue = parseFloat(qtyAvail?.value.replace(/,/g, '')) || 0;
                var balance = qtyAvailValue - qty;

                if (qty > qtyAvailValue) {
                    balance = qtyAvailValue;
                    qty = qtyAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                    qtyInput.value = qtyAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                    ErrorNotif("Qty Req is over Qty Avail !");
                }

                balanceInput.value = balance.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            }

            qtyInput.addEventListener('input', updateBalance);

            document.getElementById('GrandTotal').innerText = qtyInput.value;
        }

        updateGrandTotal();
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
        var transporterNames = $(this).find('td:nth-child(2)').text();

        $("#transporter_id").val(sysId);
        $("#transporter_name").val(transporterNames);
        $("#transporter_phone").val('-');
        $("#transporter_fax").val('-');
        $("#transporter_contact").val('-');
        $("#transporter_handphone").val('-');
        $("#transporter_address").val('-');

        checkTableDataDO();
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
                            $("#submitDO").prop("disabled", false);

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
                        $("#submitDO").prop("disabled", false);
                        CancelNotif("You don't have access", '/DeliveryOrder?var=1');
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                HideLoading();
                CancelNotif("Data Cancel Inputed", '/DeliveryOrder?var=1');
            }
        });
    });

    $(window).one('load', function(e) {
        $(".loadingReferenceNumberDetail").hide();
        $(".errorMessageContainerReferenceNumberDetail").hide();
        $("#var_date").val(date);
        $("#delivery_from").prop("disabled", true);
        $("#delivery_to").prop("disabled", true);

        getDocumentType("Delivery Order Form");
        checkTableDataDO();
    });
</script>