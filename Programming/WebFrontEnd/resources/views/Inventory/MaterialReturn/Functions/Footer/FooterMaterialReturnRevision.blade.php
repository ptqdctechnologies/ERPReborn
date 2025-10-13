<script>
    let dataStore = [];

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="qty_return"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, ''));
            if (!isNaN(value)) {
                total += value;
            }
        });

        document.getElementById('material_return_details_total').textContent   = decimalFormat(total);
        document.getElementById('material_return_list_total_modal').textContent = `Total: ${decimalFormat(total)}`;
    }

    function summaryData() {
        const sourceTable = document.getElementById('material_return_details_table').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('material_return_list_table_modal').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const recordRefID                   = row.querySelector('input[id^="record_RefID"]');
            const materialReceiveDetailRefID    = row.querySelector('input[id^="warehouseInboundOrderDetail_RefID"]');
            const materialReturnValueInput      = row.querySelector('input[id^="qty_return"]');
            const materialReturnNoteInput       = row.querySelector('textarea[id^="note"]');

            if (
                materialReturnValueInput && materialReturnValueInput.value.trim() !== ''
            ) {
                const subBudget   = row.children[2].innerText.trim();
                const productCode = row.children[3].innerText.trim();
                const productName = row.children[4].innerText.trim();
                const uom         = row.children[5].innerText.trim();

                const materialReturnValue = materialReturnValueInput.value.trim();
                const materialReturnNote  = materialReturnNoteInput.value.trim();

                let found = false;
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetRecordRefID                 = targetRow.children[0]?.value?.trim();
                    const targetMaterialReceiveDetailRefID  = targetRow.children[1]?.value?.trim();

                    if (targetRecordRefID == recordRefID.value && targetMaterialReceiveDetailRefID == materialReceiveDetailRefID.value) {
                        targetRow.children[5].innerText = materialReturnValue;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.recordID == recordRefID.value && item.entities.warehouseInboundOrderDetail_RefID == materialReceiveDetailRefID.value);
                        
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                recordID: parseInt(recordRefID.value),
                                entities: {
                                    warehouseInboundOrderDetail_RefID: parseInt(materialReceiveDetailRefID.value),
                                    quantity: parseFloat(materialReturnValue.replace(/,/g, '')),
                                    note: materialReturnNote
                                }
                            };
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <input type="hidden" id="target_record_id[]" value="${recordRefID.value}">
                        <input type="hidden" id="target_warehouse_inbound_order_detail_id[]" value="${materialReceiveDetailRefID.value}">

                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${subBudget}</td>
                        <td style="text-align: center;padding: 0.8rem 0.5rem;">${productCode}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${productName}</td>
                        <td style="text-align: left;padding: 0.8rem 0.5rem;">${uom}</td>
                        <td style="text-align: right;padding: 0.8rem 0.5rem;">${decimalFormat(materialReturnValue)}</td>
                    `;

                    targetTable.appendChild(newRow);

                    dataStore.push({
                        recordID: parseInt(recordRefID.value),
                        entities: {
                            warehouseInboundOrderDetail_RefID: parseInt(materialReceiveDetailRefID.value),
                            quantity: parseFloat(materialReturnValue.replace(/,/g, '')),
                            note: materialReturnNote
                        }
                    });
                }
                
            } else {
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetRecordRefID                 = targetRow.children[0]?.value?.trim();
                    const targetMaterialReceiveDetailRefID  = targetRow.children[1]?.value?.trim();

                    if (targetRecordRefID == recordRefID.value && targetMaterialReceiveDetailRefID == materialReceiveDetailRefID.value) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => item.recordID == recordRefID.value && item.entities.warehouseInboundOrderDetail_RefID == materialReceiveDetailRefID.value);
            }
        }

        dataStore = dataStore.filter(item => item !== undefined);

        calculateTotal();
    }

    function validationForm() {
        summaryData();
        $('#material_return_submit_modal').modal('show');
    }
    
    function getMaterialReturnDetails() {
        const dataTable = {!! json_encode($detail ?? []) !!};

        $.each(dataTable, function(key, val) {
            dataStore.push({
                recordID: parseInt(val.Sys_ID),
                entities: {
                    warehouseInboundOrderDetail_RefID: parseInt(val.WarehouseInboundOrderDetail_RefID),
                    quantity: val.QtyWarehouseOutboundOrder,
                    note: val.Remarks
                }
            });

            let row = `
                <tr>
                    <input type="hidden" id="record_RefID${key}" value="${val.Sys_ID}" />
                    <input type="hidden" id="warehouseInboundOrderDetail_RefID${key}" value="${val.WarehouseInboundOrderDetail_RefID}" />

                    <td style="text-align: center;">${val.CombinedBudgetSectionCode} - ${val.CombinedBudgetSectionName}</td>
                    <td style="text-align: center;">${val.ProductCode}</td>
                    <td style="text-align: center;">${val.ProductName}</td>
                    <td style="text-align: center;">${val.QuantityUnitName}</td>
                    <td style="text-align: center;">${val.noteWarehouseInboundOrderDetail}</td>
                    <td style="text-align: center;">${decimalFormat(parseFloat(val.QtyWarehouseInboundOrderDetail))}</td>
                    <td>
                        <input class="form-control number-without-negative" id="qty_return${key}" autocomplete="off" data-default="${decimalFormat(parseFloat(val.QtyWarehouseOutboundOrder))}" value="${decimalFormat(parseFloat(val.QtyWarehouseOutboundOrder))}" style="border-radius:0px;" />
                    </td>
                    <td>
                        <textarea id="note${key}" class="form-control">${val.Note || ''}</textarea>
                    </td>
                </tr>
            `;

            $('#material_return_details_table tbody').append(row);

            $(`#qty_return${key}`).on('keyup', function() {
              let qty_return  = $(this).val().replace(/,/g, '');

              if (parseFloat(qty_return) > val.QtyWarehouseInboundOrderDetail) {
                $(this).val("");
                ErrorNotif("Qty Return is over!");
              } 

              calculateTotal();
            });

            let rowList = `
                <tr>
                    <input type="hidden" id="target_record_id${key}" value="${val.Sys_ID}" />
                    <input type="hidden" id="target_warehouse_inbound_order_detail_id${key}" value="${val.WarehouseInboundOrderDetail_RefID}" />

                    <td style="text-align: right;padding: 0.8rem;">${val.ProductCode || '-'}</td>
                    <td style="text-align: left;padding: 0.8rem;">${val.ProductName || '-'}</td>
                    <td style="text-align: left;padding: 0.8rem;">${val.QuantityUnitName || '-'}</td>
                    <td style="text-align: right;padding: 0.8rem;">${val.QtyWarehouseOutboundOrder || ''}</td>
                </tr>
            `;

            $('#material_return_list_table_modal tbody').append(rowList);
        });

        calculateTotal();
    }

    function submitForm() {
        $('#material_return_submit_modal').modal('hide');

        let action = $('#form_submit_material_return').attr("action");
        let method = $('#form_submit_material_return').attr("method");
        let form_data = new FormData($('#form_submit_material_return')[0]);
        form_data.append('material_return_detail', JSON.stringify(dataStore));

        ShowLoading();

        $.ajax({
            url: action,
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: method,
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
                        cancelForm("{{ route('MaterialReturn.index', ['var' => 1]) }}");
                    });
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }
            },
            error: function(response) {
                console.log('response error', response);
                
                HideLoading();
                CancelNotif("You don't have access", "{{ route('DebitNote.index', ['var' => 1]) }}");
            }
        });
    }

    $('#tableGetModalMaterialReturn tbody').on('click', 'tr', function () {
        let sysId = $(this).find('input[data-trigger="sys_id_modal_material_return"]').val();
        let trano = $(this).find('td:nth-child(2)').text();

        $("#material_return_id").val(sysId);
        $("#material_return_number").val(trano);

        $('#myGetModalMaterialReturn').modal('hide');
    });

    $(window).one('load', function(e) {
        getMaterialReturnDetails();
    });
</script>