<script>
    let dataStore           = [];
    const receiveDateValue  = {!! json_encode($header['receiveDate']) !!};
    const dataTable         = {!! json_encode($dataDetail ?? []) !!};

    const receiveDate                       = document.getElementById("receive_date");

    const addressDeliveryOrderFrom          = document.getElementById("address_delivery_order_from");
    const addressDeliveryOrderFromDuplicate = document.getElementById("address_delivery_order_from_duplicate");
    const idDeliveryOrderFromDuplicate      = document.getElementById("id_delivery_order_from_duplicate");

    const addressDeliveryOrderTo            = document.getElementById("address_delivery_order_to");
    const addressDeliveryOrderToDuplicate   = document.getElementById("address_delivery_order_to_duplicate");
    const idDeliveryOrderToDuplicate        = document.getElementById("id_delivery_order_to_duplicate");

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="qty_req"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, ''));
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

        document.getElementById('totalMaterialReceiveDetail').textContent = currencyTotal(total);
    }

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tableMaterialReceiveList tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[6];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        document.getElementById('GrandTotal').innerText = `Total: ${decimalFormat(total)}`;
    }

    function checkOneLineBudgetContents(indexInput) {
        const rows = document.querySelectorAll("#tableMaterialReceiveDetail tbody tr");
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
                $("#materialReceiveDetailMessage").hide();
            } else {
                if (indexInput > -1) {
                    if (indexInput == index) {
                        if (qtyEl.value.trim() != "" || noteEl.value.trim() != "") {
                            $(qtyEl).css("border", "1px solid red");
                            $(noteEl).css("border", "1px solid red");
                            $("#materialReceiveDetailMessage").show();
                        } else {
                            $(qtyEl).css("border", "1px solid #ced4da");
                            $(noteEl).css("border", "1px solid #ced4da");
                            $("#materialReceiveDetailMessage").hide();
                        }
                    }

                    if (indexInput != index && (qtyEl.value.trim() == "" && noteEl.value.trim() == "")) {
                        $(qtyEl).css("border", "1px solid #ced4da");
                        $(noteEl).css("border", "1px solid #ced4da");
                    } 
                } else {
                    $(qtyEl).css("border", "1px solid red");noteEl
                    $(noteEl).css("border", "1px solid red");
                    $("#materialReceiveDetailMessage").show();
                }
            }
        });

        return hasFullRow;
    }

    function summaryData() {
        const sourceTable = document.getElementById('tableMaterialReceiveDetail').getElementsByTagName('tbody')[0];
        const targetTable = document.getElementById('tableMaterialReceiveList').getElementsByTagName('tbody')[0];

        const rows = sourceTable.getElementsByTagName('tr');

        for (let row of rows) {
            const recordRefID                   = row.querySelector('input[id^="record_RefID"]');
            const deliveryOrderDetailRefID      = row.querySelector('input[id^="deliveryOrderDetail_RefID"]');
            const productRefID                  = row.querySelector('input[id^="product_RefID"]');
            const quantityUnitRefID             = row.querySelector('input[id^="quantityUnit_RefID"]');
            const productUnitPriceCurrencyRefID = row.querySelector('input[id^="productUnitPriceCurrency_RefID"]');
            const qtyInput                      = row.querySelector('input[id^="qty_req"]');
            const noteInput                     = row.querySelector('textarea[id^="note"]');

            if (
                qtyInput && noteInput &&
                qtyInput.value.trim() !== '' &&
                noteInput.value.trim() !== ''
            ) {
                const productCode   = row.children[3].innerText.trim();
                const productName   = row.children[4].innerText.trim();
                const qtyAvail      = row.children[6].innerText.trim();
                const uom           = row.children[7].innerText.trim();

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
                                    product_RefID: parseInt(productRefID.value),
                                    quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                                    productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                                    productUnitPriceCurrencyExchangeRate: parseFloat(1),
                                    productUnitPriceCurrencyValue: parseFloat(0),
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
                            product_RefID: parseInt(productRefID.value),
                            quantityUnit_RefID: parseInt(quantityUnitRefID.value),
                            productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrencyRefID.value),
                            productUnitPriceCurrencyExchangeRate: parseFloat(1),
                            productUnitPriceCurrencyValue: parseFloat(0),
                            remarks: note
                        }
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
        const isReceiveDateNotEmpty     = receiveDate.value.trim() !== '';
        const isDeliveryFromNotEmpty    = addressDeliveryOrderFrom.value.trim() !== '';
        const isDeliveryToNotEmpty      = addressDeliveryOrderTo.value.trim() !== '';
        const isTableNotEmpty           = checkOneLineBudgetContents();

        if (isReceiveDateNotEmpty && isDeliveryFromNotEmpty && isDeliveryToNotEmpty && isTableNotEmpty) {
            $('#materialReceiveFormModal').modal('show');
            summaryData();
        } else {
            if (!isReceiveDateNotEmpty && !isDeliveryFromNotEmpty && !isDeliveryToNotEmpty) {
                $("#receive_date").css("border", "1px solid red");
                $("#address_delivery_order_from").css("border", "1px solid red");
                $("#address_delivery_order_to").css("border", "1px solid red");

                $("#receiveDateMessage").show();
                $("#deliveryFromMessage").show();
                $("#deliveryToMessage").show();
                return;
            }
            if (!isReceiveDateNotEmpty) {
                $("#receive_date").css("border", "1px solid red");
                $("#receiveDateMessage").show();
                return;
            }
            if (!isDeliveryFromNotEmpty) {
                $("#address_delivery_order_from").css("border", "1px solid red");
                $("#deliveryFromMessage").show();
                return;
            }
            if (!isDeliveryToNotEmpty) {
                $("#address_delivery_order_to").css("border", "1px solid red");
                $("#deliveryToMessage").show();
                return;
            }
            if (!isTableNotEmpty) {
                $("#materialReceiveDetailMessage").show();
                return;
            }
        }
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
                recordID: parseInt(val2.sys_ID),
                entities: {
                    deliveryOrderDetail_RefID: parseInt(val2.deliveryOrderDetail_RefID),
                    quantity: parseFloat(val2.quantity),
                    product_RefID: parseInt(val2.product_RefID),
                    quantityUnit_RefID: parseInt(val2.quantityUnit_RefID),
                    productUnitPriceCurrency_RefID: parseInt(val2.sys_BaseCurrency_RefID),
                    productUnitPriceCurrencyExchangeRate: parseFloat(1),
                    productUnitPriceCurrencyValue: parseFloat(0),
                    remarks: val2.note
                }
            });

            let row = `
                <tr>
                    <input id="record_RefID${key}" value="${val2.sys_ID}" type="hidden" />
                    <input id="deliveryOrderDetail_RefID${key}" value="${val2.deliveryOrderDetail_RefID}" type="hidden" />

                    <td style="text-align: center;">${val2.combinedBudgetSectionCode} - ${val2.combinedBudgetSectionName}</td>
                    <td style="text-align: center;">${val2.productCode || '-'}</td>
                    <td style="text-align: center;">${val2.productName || '-'}</td>
                    <td style="text-align: center;">${currencyTotal(val2.qtyDO) || '-'}</td>
                    <td style="text-align: center;">${currencyTotal(val2.qtyAvailableDO) || '-'}</td>
                    <td style="text-align: center;">${val2.quantityUnitName || '-'}</td>
                    <td style="text-align: center; width: 100px;">
                        <input class="form-control number-without-negative" id="qty_req${key}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(val2.quantity) || '-'}" />
                    </td>
                    <td style="text-align: center; width: 150px; padding: 0.5rem !important;">
                        <textarea id="note${key}" class="form-control" data-default="${val2.note}">${val2.note}</textarea>
                    </td>

                    <input id="product_RefID${key}" value="${val2.product_RefID}" type="hidden" />
                    <input id="quantityUnit_RefID${key}" value="${val2.quantityUnit_RefID}" type="hidden" />
                    <input id="productUnitPriceCurrency_RefID${key}" value="${val2.sys_BaseCurrency_RefID}" type="hidden" />
                </tr>
            `;

            tbody.append(row);

            $(`#qty_req${key}`).on('keyup', function() {
                var qty_req     = $(this).val().replace(/,/g, '');
                var sumQty      = val2.quantity + val2.qtyAvailableDO;

                if (parseFloat(qty_req) > sumQty) {
                    $(this).val("");
                    ErrorNotif("Qty Receive is over!");
                } else {
                    calculateTotal();
                }

                checkOneLineBudgetContents(key);
            });

            $(`#note${key}`).on('keyup', function() {
                checkOneLineBudgetContents(key);
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

        document.getElementById('totalMaterialReceiveDetail').textContent = currencyTotal(totalRequest);
    }

    function CancelRevisionMaterialReceive() {
        ShowLoading();
        window.location.href = "{{ route('MaterialReceive.index', ['var' => 1]) }}";
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
                RevisionMaterialReceiveStore({...formatData, comment: result.value});
            }
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
                        html: 'Data has been saved. Your transaction number is ' + '<span style="color:#0046FF;font-weight:bold;">' + res.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        window.location.href = "{{ route('MaterialReceive.index', ['var' => 1]) }}";
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

    function submitForm() {
        $('#materialReceiveFormModal').modal('hide');

        let action = $('#FormSubmitRevisionMaterialReceive').attr("action");
        let method = $('#FormSubmitRevisionMaterialReceive').attr("method");
        let form_data = new FormData($('#FormSubmitRevisionMaterialReceive')[0]);
        form_data.append('materialReceiveDetail', JSON.stringify(dataStore));

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
                    CancelNotif("You don't have access", "{{ route('MaterialReceive.index', ['var' => 1]) }}");
                } else if (response.message == "MoreThanOne") {
                    $('#getWorkFlow').modal('toggle');

                    let t = $('#tableGetWorkFlow').DataTable();
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
                console.log('response error', response);
                
                HideLoading();
                CancelNotif("You don't have access", "{{ route('MaterialReceive.index', ['var' => 1]) }}");
            }
        });
    }

    $('#tableGetModalWarehouses').on('click', 'tbody tr', function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_modal_warehouse"]').val();
        let name    = $(this).find('td:nth-child(2)').text();
        let address = $(this).find('td:nth-child(3)').text();

        $("#warehouse_id").val(sysId);
        $("#warehouse_name").val(name);
        $("#warehouse_address").val(address);

        $("#myGetModalWarehouses").modal('toggle');
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

    $(window).one('load', function(e) {
        viewMaterialReceiveDetail(dataTable);
        getDocumentType("Warehouse Inbound Order Revision Form");

        $('#startDate').datetimepicker({
            format: 'L',
            defaultDate: receiveDateValue
        });
    });
</script>