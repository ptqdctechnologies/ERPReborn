<script>
    let dataStore   = [];
    const dataTable = {!! json_encode($dataDetail ?? []) !!};

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

    function viewMaterialReceiveDetail(dataDetail) {
        $(".loadingMaterialReceiveDetail").hide();
        $(".errorMessageContainerMaterialReceiveDetail").hide();

        let tbody = $('#tableMaterialReceiveDetail tbody');
        tbody.empty();

        let tbodyList = $('#tableMaterialReceiveList tbody');
        tbodyList.empty();

        let totalRequest = 0;

        $.each(dataDetail, function(key, val2) {
            totalRequest += val2.quantity;

            dataStore.push({
                recordID: val2.sys_ID,
                entities: {
                    deliveryOrderDetail_RefID: val2.deliveryOrderDetail_RefID,
                    quantity: parseFloat(val2.quantity),
                    remarks: val2.note
                }
            });

            let row = `
                <tr>
                    <input id="record_RefID${key}" value="${val2.sys_ID}" type="hidden" />
                    <input id="deliveryOrderDetail_RefID${key}" value="${val2.deliveryOrderDetail_RefID}" type="hidden" />

                    <td style="text-align: center;">${val2.productCode || '-'}</td>
                    <td style="text-align: center;">${val2.productName || '-'}</td>
                    <td style="text-align: center;">${currencyTotal(val2.qtyDO) || '-'}</td>
                    <td style="text-align: center;">${currencyTotal(val2.qtyAvailableDO) || '-'}</td>
                    <td style="text-align: center;">${val2.quantityUnitName || '-'}</td>
                    <td style="text-align: center; width: 100px;">
                        <input class="form-control number-without-negative" id="qty_req${key}" data-index=${key} data-default="${currencyTotal(val2.quantity || 0)}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(val2.quantity) || '-'}" />
                    </td>
                    <td style="text-align: center; width: 150px; padding: 0.5rem !important;">
                        <textarea id="note${key}" class="form-control" data-default="${val2.note}">${val2.note}</textarea>
                    </td>
                </tr>
            `;

            tbody.append(row);

            $(`#qty_req${key}`).on('keyup', function() {
                var qty_req     = $(this).val().replace(/,/g, '');
                var data_index  = $(this).data('index');
                var sumQty      = val2.quantity + val2.qtyAvailableDO;

                if (parseFloat(qty_req) > sumQty) {
                    $(this).val("");
                    ErrorNotif("Qty Request is over Qty Avail !");
                } else {
                    calculateTotal();
                }
            });

            let rowList = `
                <tr>
                    <input type="hidden" name="recordID[]" value="${val2.sys_ID}">
                    <input type="hidden" name="deliveryOrderDetailRefID[]" value="${val2.deliveryOrderDetail_RefID}">
                    <input type="hidden" name="qty_avail[]" value="${val2.quantity}">
                    <td style="text-align: center;padding: 0.8rem;">${val2.productCode || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem;">${val2.productName || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem;">${val2.quantityUnitName || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem;">${val2.quantity || '-'}</td>
                    <td style="text-align: center;padding: 0.8rem;">${val2.note || '-'}</td>
                </tr>
            `;

            tbodyList.append(rowList);
        });

        document.getElementById('TotalDeliveryOrder').textContent = currencyTotal(totalRequest);
        document.getElementById('GrandTotal').textContent = currencyTotal(totalRequest);
    }

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tableMaterialReceiveList tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[6];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        document.getElementById('TotalDeliveryOrder').innerText = "0.00";
        document.getElementById('GrandTotal').innerText = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
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
            RevisionMaterialReceiveStore({...formatData, comment: result.value});
        });
    }

    function RevisionMaterialReceiveStore(formatData) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            data: formatData,
            url: '{{ route("MaterialReceive.UpdateMaterialReceive") }}',
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

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $('#material-receive-details-add').on('click', function() {
        const sourceTable = document.getElementById('tableMaterialReceiveDetail').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tableMaterialReceiveList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const recordRefID               = row.querySelector('input[id^="record_RefID"]');
            const deliveryOrderDetailRefID  = row.querySelector('input[id^="deliveryOrderDetail_RefID"]');
            const qtyInput                  = row.querySelector('input[id^="qty_req"]');
            const noteInput                 = row.querySelector('textarea[id^="note"]');

            if (
                qtyInput && noteInput &&
                qtyInput.value.trim() !== '' &&
                noteInput.value.trim() !== ''
            ) {
                const productCode   = row.children[2].innerText.trim();
                const productName   = row.children[3].innerText.trim();
                const qtyAvail      = row.children[5].innerText.trim();
                const uom           = row.children[6].innerText.trim();

                const qty   = qtyInput.value.trim();
                const note  = noteInput.value.trim();

                let found           = false;
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const recordID = targetRow.children[0].value.trim();

                    if (recordID == recordRefID.value) {
                        targetRow.children[6].innerText = currencyTotal(qty);
                        targetRow.children[7].innerText = note;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.recordID == recordRefID.value);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                recordID: parseInt(recordRefID.value),
                                entities: {
                                    deliveryOrderDetail_RefID: parseInt(deliveryOrderDetailRefID.value),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    remarks: note
                                }
                            };
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <tr>
                            <input type="hidden" name="recordID[]" value="${recordRefID.value}">
                            <input type="hidden" name="deliveryOrderDetailRefID[]" value="${deliveryOrderDetailRefID.value}">
                            <input type="hidden" name="qty_avail[]" value="${qtyAvail}">
                            <td style="text-align: center;padding: 0.8rem;">${productCode || '-'}</td>
                            <td style="text-align: center;padding: 0.8rem;">${productName || '-'}</td>
                            <td style="text-align: center;padding: 0.8rem;">${uom || '-'}</td>
                            <td style="text-align: center;padding: 0.8rem;">${currencyTotal(qty)}</td>
                            <td style="text-align: center;padding: 0.8rem;">${note || '-'}</td>
                        </tr>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        recordID: parseInt(recordRefID.value),
                        entities: {
                            deliveryOrderDetail_RefID: parseInt(deliveryOrderDetailRefID.value),
                            quantity: parseFloat(qty.replace(/,/g, '')),
                            remarks: note
                        }
                    });
                }

                qtyInput.value = '';
                noteInput.value = '';
            }
        }

        dataStore = dataStore.filter(item => item !== undefined);

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

        document.getElementById('GrandTotal').textContent = "0.00";
        calculateTotal();
    });

    $("#FormSubmitRevisionMaterialReceive").on("submit", function(e) {
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
                form_data.append('materialReceiveDetail', JSON.stringify(dataStore));

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

    $(window).one('load', function(e) {
        viewMaterialReceiveDetail(dataTable);
        getDocumentType("Warehouse Inbound Order Revision Form");
    });
</script>