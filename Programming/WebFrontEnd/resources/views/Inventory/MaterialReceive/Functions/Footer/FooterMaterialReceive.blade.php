<script>
    let dataStore                           = [];
    const deliveryOrderCode                 = document.getElementById("delivery_order_code");
    const tableMaterialReceiveLists         = document.querySelector("#tableMaterialReceiveList tbody");

    const addressDeliveryOrderFrom          = document.getElementById("address_delivery_order_from");
    const addressDeliveryOrderFromDuplicate = document.getElementById("address_delivery_order_from_duplicate");
    const idDeliveryOrderFromDuplicate      = document.getElementById("id_delivery_order_from_duplicate");

    const addressDeliveryOrderTo            = document.getElementById("address_delivery_order_to");
    const addressDeliveryOrderToDuplicate   = document.getElementById("address_delivery_order_to_duplicate");
    const idDeliveryOrderToDuplicate        = document.getElementById("id_delivery_order_to_duplicate");

    $("#submitMaterialReceive").prop("disabled", true);

    function CancelMaterialReceive() {
        ShowLoading();
        window.location.href = '/MaterialReceive?var=1';
    }

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="qty_req"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, ''));
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

        document.getElementById('TotalDeliveryOrder').textContent = currencyTotal(total);
    }

    function GetDeliveryOrderDetail(delivery_order_id, delivery_order_number) {
        $("#tableMaterialReceiveDetail tbody").hide();
        $(".loadingMaterialReceiveDetail").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getDeliveryOrderDetail") !!}?delivery_order_id=' + delivery_order_id,
            success: function(data) {
                $(".loadingMaterialReceiveDetail").hide();

                let tbody = $('#tableMaterialReceiveDetail tbody');
                tbody.empty();

                if (Array.isArray(data) && data.length > 0) {
                    $("#transporterRefID").val(data[0].transporter_RefID);

                    $("#budget_value").val(data[0].combinedBudgetCode + ' - ' + data[0].combinedBudgetName);
                    $("#sub_budget_value").val(data[0].combinedBudgetSectionCode + ' - ' + data[0].combinedBudgetSectionName);
                    $("#address_delivery_order_from").val(data[0].deliveryFrom_NonRefID.Address);
                    $("#address_delivery_order_from_duplicate").val(data[0].deliveryFrom_NonRefID.Address);
                    $("#id_delivery_order_from").val(data[0].deliveryFrom_RefID);
                    $("#id_delivery_order_from_duplicate").val(data[0].deliveryFrom_RefID);
                    $("#address_delivery_order_to").val(data[0].deliveryTo_NonRefID.Address);
                    $("#address_delivery_order_to_duplicate").val(data[0].deliveryTo_NonRefID.Address);
                    $("#id_delivery_order_to").val(data[0].deliveryTo_RefID);
                    $("#id_delivery_order_to_duplicate").val(data[0].deliveryTo_RefID);

                    $.each(data, function(key, val2) {
                        let row = `
                            <tr>
                                <input id="trano${key}" value="${delivery_order_number}" type="hidden" />
                                <input id="delivery_order_detail_id${key}" value="${val2.deliveryOrderDetail_ID}" type="hidden" />
                                <input id="product_code${key}" value="${val2.productCode}" type="hidden" />
                                <input id="product_name${key}" value="${val2.productName}" type="hidden" />
                                <input id="qty_do${key}" value="${val2.qtyReq}" type="hidden" />
                                <input id="qty_available${key}" value="${val2.qtyReq}" type="hidden" />
                                <input id="uom${key}" value="${val2.quantityUnitName}" type="hidden" />

                                <td style="text-align: center;">${val2.productCode}</td>
                                <td style="text-align: center;text-wrap: auto;">${val2.productName}</td>
                                <td style="text-align: center;">${val2.qtyReq}</td>
                                <td style="text-align: center;">${val2.qtyReq}</td>
                                <td style="text-align: center;">${val2.quantityUnitName}</td>
                                <td style="text-align: center; width: 100px;">
                                    <input class="form-control number-without-negative" id="qty_req${key}" data-index=${key} data-default="" autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="text-align: center; width: 150px; padding: 0.5rem !important;">
                                    <textarea id="note${key}" class="form-control" data-default=""></textarea>
                                </td>
                            </tr>
                        `;

                        tbody.append(row);

                        $(`#qty_req${key}`).on('keyup', function() {
                            var qty_req     = $(this).val().replace(/,/g, '');
                            var data_index  = $(this).data('index');
                            var result      = val2.qtyReq - qty_req;

                            if (parseFloat(qty_req) > val2.qtyReq) {
                                $(this).val("");
                                ErrorNotif("Qty Request is over Qty Avail !");
                            } else {
                                calculateTotal();
                            }
                        });
                    });

                    $("#tableMaterialReceiveDetail tbody").show();
                } else {
                    $(".errorMessageContainerMaterialReceiveDetail").show();
                    $("#errorMessageMaterialReceiveDetail").text(`Data not found.`);

                    $("#tableMaterialReceiveDetail_length").hide();
                    $("#tableMaterialReceiveDetail_filter").hide();
                    $("#tableMaterialReceiveDetail_info").hide();
                    $("#tableMaterialReceiveDetail_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableMaterialReceiveDetail tbody').empty();
                $(".loadingMaterialReceiveDetail").hide();
                $(".errorMessageContainerMaterialReceiveDetail").show();
                $("#errorMessageMaterialReceiveDetail").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
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
            MaterialReceiveStore({...formatData, comment: result.value});
        });
    }

    function MaterialReceiveStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("MaterialReceive.store") }}',
            success: function(res) {
                HideLoading();

                if (res.status == 200) {
                    const swalWithBootstrapButtonsss = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtonsss.fire({
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
                        window.location.href = '/MaterialReceive?var=1';
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

    function validationForm() {
        const isDeliveryOrderCodeNotEmpty           = deliveryOrderCode.value.trim() !== '';
        const isAddressDeliveryOrderFromNotEmpty    = addressDeliveryOrderFrom.value.trim() !== '';
        const isAddressDeliveryOrderToNotEmpty      = addressDeliveryOrderTo.value.trim() !== '';
        const isTableNotEmpty                       = tableMaterialReceiveLists.rows.length > 0;

        if (isDeliveryOrderCodeNotEmpty && isAddressDeliveryOrderFromNotEmpty && isAddressDeliveryOrderToNotEmpty && isTableNotEmpty) {
            $("#submitMaterialReceive").prop("disabled", false);
        } else {
            $("#submitMaterialReceive").prop("disabled", true);
        }
    }

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tableMaterialReceiveList tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[5];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        document.getElementById('TotalDeliveryOrder').innerText = "0.00";
        document.getElementById('GrandTotal').innerText = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    const observertableMaterialReceiveList = new MutationObserver(validationForm);
    observertableMaterialReceiveList.observe(tableMaterialReceiveLists, { childList: true });
    deliveryOrderCode.addEventListener('input', validationForm);
    addressDeliveryOrderFrom.addEventListener('input', validationForm);
    addressDeliveryOrderTo.addEventListener('input', validationForm);

    $('#material-receive-details-add').on('click', function() {
        const sourceTable = document.getElementById('tableMaterialReceiveDetail').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tableMaterialReceiveList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const deliveryOrderDetail_RefID = row.querySelector('input[id^="delivery_order_detail_id"]');
            const qtyInput                  = row.querySelector('input[id^="qty_req"]');
            const noteInput                 = row.querySelector('textarea[id^="note"]');

            if (
                qtyInput && noteInput &&
                qtyInput.value.trim() !== '' &&
                noteInput.value.trim() !== ''
            ) {
                const transNumber   = row.children[0].value.trim();
                const productCode   = row.children[2].value.trim();
                const productName   = row.children[3].value.trim();
                const qtyAvail      = row.children[5].value.trim();
                const uom           = row.children[6].value.trim();

                const qty   = qtyInput.value.trim();
                const note  = noteInput.value.trim();

                let found           = false;
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetProductCode = targetRow.children[1].innerText.trim();

                    if (targetProductCode == productCode) {
                        targetRow.children[4].innerText = qty;
                        targetRow.children[5].innerText = note;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.entities.productCode == productCode);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                entities: {
                                    deliveryOrderDetail_RefID: parseInt(deliveryOrderDetail_RefID.value),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    remarks: note,
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
                        <td style="text-align: center;padding: 0.8rem;">${productCode}</td>
                        <td style="text-align: center;padding: 0.8rem;text-wrap: auto;">${productName}</td>
                        <td style="text-align: center;padding: 0.8rem;">${uom}</td>
                        <td style="text-align: center;padding: 0.8rem;">${qty}</td>
                        <td style="text-align: center;padding: 0.8rem;">${note}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        entities: {
                            deliveryOrderDetail_RefID: parseInt(deliveryOrderDetail_RefID.value),
                            quantity: parseFloat(qty.replace(/,/g, '')),
                            remarks: note,
                            productCode: productCode
                        }
                    });
                }

                qtyInput.value = '';
                noteInput.value = '';
            }
        }
        
        dataStore = dataStore.filter(item => item !== undefined);
        $("#materialReceiveDetail").val(JSON.stringify(dataStore));

        updateGrandTotal();
    });

    $('#material-receive-details-reset').on('click', function() {
        dataStore = [];

        $('input[id^="qty_req"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('textarea[id^="note"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('#tableMaterialReceiveList tbody').empty();
        $('#materialReceiveDetail').val("");

        document.getElementById('GrandTotal').textContent = "0.00";
        document.getElementById('TotalDeliveryOrder').textContent = "0.00";
    });

    document.querySelector('#tableMaterialReceiveList tbody').addEventListener('click', function (e) {
        const row = e.target.closest('tr');
        if (!row) return;

        if (['INPUT', 'TEXTAREA'].includes(e.target.tagName)) return;

        const qtyAvail = row.children[0];
        const qtyCell = row.children[4];
        const noteCell = row.children[5];

        if (row.classList.contains('editing-row')) {
            const newQty = qtyCell.querySelector('input')?.value || '';
            const newNote = noteCell.querySelector('textarea')?.value || '';

            qtyCell.innerHTML = newQty;
            noteCell.innerHTML = newNote;

            const hidden = noteCell.querySelector('input[type="hidden"]');
            noteCell.innerHTML = `${newNote}`;
            if (hidden) noteCell.appendChild(hidden);

            row.classList.remove('editing-row');

            const productCode = row.children[1].innerText.trim();
            const storeItem   = dataStore.find(item => item.entities.productCode == productCode);

            if (storeItem) {
                storeItem.entities.quantity = parseFloat(newQty.replace(/,/g, ''));
                storeItem.entities.remarks = newNote;

                $("#materialReceiveDetail").val(JSON.stringify(dataStore));
            }
        } else {
            const currentQty = qtyCell.innerText.trim();

            const hiddenInput = noteCell.querySelector('input[type="hidden"]');
            const currentNote = noteCell.childNodes[0]?.nodeValue?.trim() || '';

            qtyCell.innerHTML = `<input class="form-control number-without-negative qty-input" value="${currentQty}" autocomplete="off" style="border-radius:0px;width:100px;">`;
            noteCell.innerHTML = `
                <textarea class="form-control" style="width:100px;">${currentNote}</textarea>
            `;
            if (hiddenInput) noteCell.appendChild(hiddenInput);

            row.classList.add('editing-row');

            const qtyInput = qtyCell.querySelector('.qty-input');

            function updateBalance() {
                var qty = parseFloat(qtyInput.value.replace(/,/g, '')) || 0;
                const qtyAvailValue = parseFloat(qtyAvail?.value.replace(/,/g, '')) || 0;
                var balance = qtyAvailValue - qty;

                if (qty > qtyAvailValue) {
                    qty = qtyAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                    qtyInput.value = qtyAvailValue.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                    ErrorNotif("Qty Req is over Qty Avail !");
                }
            }

            qtyInput.addEventListener('input', updateBalance);

            document.getElementById('GrandTotal').innerText = qtyInput.value;
        }

        updateGrandTotal();
    });

    $('#tableGetDeliveryOrder').on('click', 'tbody tr', function() {
        var sysId       = $(this).find('input[data-trigger="sys_id_delivery_order"]').val();
        var projectCode = $(this).find('td:nth-child(2)').text();

        GetDeliveryOrderDetail(sysId, projectCode);
    });

    $('#address_delivery_order_from').on('input', function() {
        if ($(this).val().trim() === addressDeliveryOrderFromDuplicate.value) {
            $("#id_delivery_order_from").val(idDeliveryOrderFromDuplicate.value);
        } else {
            $("#id_delivery_order_from").val('');
        }
    });

    $('#address_delivery_order_to').on('input', function() {
        if ($(this).val().trim() === addressDeliveryOrderToDuplicate.value) {
            $("#id_delivery_order_to").val(idDeliveryOrderToDuplicate.value);
        } else {
            $("#id_delivery_order_to").val('');
        }
    });

    $("#FormSubmitMaterialReceive").on("submit", function(e) {
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
            ShowLoading();

            if (result.value) {
                var action = $(this).attr("action");
                var method = $(this).attr("method");
                var form_data = new FormData($(this)[0]);

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
                            $("#submitMaterialReceive").prop("disabled", false);

                            CancelNotif("You don't have access", '/MaterialReceive?var=1');
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
                        console.log('response error', response.responseText);
                        
                        HideLoading();
                        $("#submitMaterialReceive").prop("disabled", false);
                        CancelNotif("You don't have access", '/MaterialReceive?var=1');
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                HideLoading();
                CancelNotif("Data Cancel Inputed", '/MaterialReceive?var=1');
            }
        });
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        getDocumentType("Warehouse Inbound Order Form");

        $(".loadingMaterialReceiveDetail").hide();
        $(".errorMessageContainerMaterialReceiveDetail").hide();
    });
</script>