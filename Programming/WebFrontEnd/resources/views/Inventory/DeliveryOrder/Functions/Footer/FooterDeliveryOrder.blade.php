<script>
    let dataStore                   = [];
    let indexReferenceNumberDetail  = 0;
    let referenceTypeValue          = document.getElementById("reference_type");
    let referenceNumber             = document.getElementById("reference_number");
    let deliveryDate                = '';
    let deliveryFrom                = document.getElementById("delivery_from");
    let deliveryFromDuplicate       = document.getElementById("delivery_fromDuplicate");
    let deliveryFromRefID           = document.getElementById("deliveryFrom_RefID");
    let deliveryFromDuplicateRefID  = document.getElementById("deliveryFromDuplicate_RefID");
    let deliveryTo                  = document.getElementById("delivery_to");
    let deliveryToDuplicate         = document.getElementById("delivery_toDuplicate");
    let deliveryToRefID             = document.getElementById("deliveryTo_RefID");
    let deliveryToDuplicateRefID    = document.getElementById("deliveryToDuplicate_RefID");
    let transporterName             = document.getElementById("transporter_name");
    let isDeliveryFromStockMovement = false;

    function deliveryFromStockMovementTrigger(value) {
        isDeliveryFromStockMovement = value;
    }

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

        document.getElementById('TotalReferenceNumber').textContent = decimalFormat(parseFloat(total));
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
            const refDocument_RefID         = row.querySelector('input[id^="refDocument_RefID"]');
            const underlyingDetail_RefID    = row.querySelector('input[id^="underlyingDetail_RefID"]');
            const qtyInput                  = row.querySelector('input[id^="qty_req"]');
            const noteInput                 = row.querySelector('textarea[id^="note"]');
            const qtyUnitRefId              = row.querySelector('input[id^="qty_unit_refID"]');
            const productRefId              = row.querySelector('input[id^="product_refID"]');

            if (
                qtyInput && noteInput &&
                qtyInput.value.trim() !== '' &&
                noteInput.value.trim() !== ''
            ) {
                const refNumber     = row.children[2].value.trim();
                const productCode   = row.children[3].value.trim();
                const productName   = row.children[4].value.trim();
                const uom           = row.children[5].value.trim();
                const qtyAvail      = row.children[7].value.trim();

                const qty       = qtyInput.value.trim();
                const note      = noteInput.value.trim();

                let found           = false;
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetRefNumber   = targetRow.children[1].innerText.trim();
                    const targetProductCode = targetRow.children[2].innerText.trim();

                    if (targetRefNumber === refNumber && targetProductCode === productCode) {
                        targetRow.children[5].innerText = qty;
                        targetRow.children[6].innerText = note;
                        found = true;

                        const indexToUpdate = dataStore.findIndex(item => item.entities.refNumber === refNumber && item.entities.productCode === productCode);
                        if (indexToUpdate !== -1) {
                            dataStore[indexToUpdate] = {
                                entities: {
                                    referenceDocument_RefID: parseInt(refDocument_RefID.value),
                                    quantity: parseFloat(qty.replace(/,/g, '')),
                                    quantityUnit_RefID: parseInt(qtyUnitRefId.value),
                                    remarks: note,
                                    underlyingDetail_RefID: parseInt(underlyingDetail_RefID.value),
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
                        <td style="text-align: left;padding: 0.8rem;">${refNumber}</td>
                        <td style="text-align: right;padding: 0.8rem;">${productCode}</td>
                        <td style="text-align: left;padding: 0.8rem;">${productName}</td>
                        <td style="text-align: left;padding: 0.8rem;">${uom}</td>
                        <td style="text-align: right;padding: 0.8rem;">${qty}</td>
                        <td style="text-align: left;padding: 0.8rem;" hidden>${note}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        entities: {
                            referenceDocument_RefID: parseInt(refDocument_RefID.value),
                            quantity: parseFloat(qty.replace(/,/g, '')),
                            quantityUnit_RefID: parseInt(qtyUnitRefId.value),
                            remarks: note,
                            underlyingDetail_RefID: parseInt(underlyingDetail_RefID.value),
                            product_RefID: parseInt(productRefId.value),
                            refNumber: refNumber,
                            productCode: productCode
                        }
                    });
                }
            } else {
                const refNumber     = row.children[2].value.trim();
                const productCode   = row.children[3].value.trim();
                const existingRows  = targetTable.getElementsByTagName('tr');

                for (let targetRow of existingRows) {
                    const targetRefNumber   = targetRow.children[1].innerText.trim();
                    const targetProductCode = targetRow.children[2].innerText.trim();

                    if (targetRefNumber === refNumber && targetProductCode === productCode) {
                        targetRow.remove();
                        break;
                    }
                }

                dataStore = dataStore.filter(item => {
                    return !(item.entities.refNumber === refNumber && item.entities.productCode === productCode);
                });
            }
        }

        console.log('dataStore', dataStore);

        // $("#deliveryOrderDetail").val(JSON.stringify(dataStore));
        updateGrandTotal();
    }

    function validationForm() {
        const isReferenceTypeValueNotSelected   = referenceTypeValue.value.trim() !== 'Select a Source';
        const isReferenceNumberNotEmpty         = referenceNumber.value.trim() !== '';
        const isDeliveryFromNotEmpty            = deliveryFrom.value.trim() !== '';
        const isDeliveryToNotEmpty              = deliveryTo.value.trim() !== '';
        const isTransporterNameNotEmpty         = transporterName.value.trim() !== '';
        const isTableNotEmpty                   = checkOneLineBudgetContents();

        if (isReferenceTypeValueNotSelected && isReferenceNumberNotEmpty && isDeliveryFromNotEmpty && isDeliveryToNotEmpty && isTransporterNameNotEmpty && isTableNotEmpty) {
            $('#deliveryOrderFormModal').modal('show');
            summaryData();
        } else {
            if (!isReferenceTypeValueNotSelected) {
                $("#reference_type").css("border", "1px solid red");
                $("#referenceTypeMessage").show();
                return;
            }
            if (!isReferenceNumberNotEmpty && !isDeliveryFromNotEmpty && !isDeliveryToNotEmpty && !isTransporterNameNotEmpty) {
                $("#reference_number").css("border", "1px solid red");
                $("#delivery_from").css("border", "1px solid red");
                $("#delivery_to").css("border", "1px solid red");
                $("#transporter_name").css("border", "1px solid red");

                $("#purchaseOrderMessage").show();
                $("#deliveryFromMessage").show();
                $("#deliveryToMessage").show();
                $("#transporterMessage").show();
                return;
            }
            if (!isReferenceNumberNotEmpty) {
                $("#reference_number").css("border", "1px solid red");
                $("#purchaseOrderMessage").show();
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
            if (!isTransporterNameNotEmpty) {
                $("#transporter_name").css("border", "1px solid red");
                $("#transporterMessage").show();
                return;
            }
            if (!isTableNotEmpty) {
                $("#deliveryOrderDetailsMessage").show();
                return;
            }
        }
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
            success: async function(data) {
                if (Array.isArray(data) && data.length > 0) {
                    const documentTypeID = document.getElementById("DocumentTypeID");

                    if (documentTypeID.value) {
                        var checkWorkFlow = await checkingWorkflow(data[0].combinedBudget_RefID, documentTypeID.value);

                        if (!checkWorkFlow) {
                            $(".loadingReferenceNumberDetail").hide();
                            $("#reference_number").val("");
                            $("#reference_id").val("");
                            return;
                        }
                    }

                    let deliveryFroms = `(${data[0]['supplierCode']}) ${data[0]['supplierName']} - ${data[0]['supplierAddress']}`;
                    let deliveryToNonRefIDs = data[0]['deliveryTo_NonRefID'] ? data[0]['deliveryTo_NonRefID'].Address : '';

                    $("#reference_id").val(reference_id);
                    $("#reference_number").val(reference_number);
                    $("#var_combinedBudget_RefID").val(data[0].combinedBudget_RefID);
                    // $("#requesterWorkerJobsPosition_RefID").val(data.combinedBudget_RefID);
                    $("#budget_value").val(`${data[0]['combinedBudgetCode']} - ${data[0]['combinedBudgetName']}`);

                    $("#delivery_fromDuplicate").val(deliveryFroms);
                    $("#delivery_from").val(deliveryFroms);
                    $("#deliveryFromDuplicate_RefID").val(data[0]['supplier_RefID']);
                    $("#deliveryFrom_RefID").val(data[0]['supplier_RefID']);
                    $("#delivery_from").prop("disabled", false);

                    $("#delivery_to").val(deliveryToNonRefIDs);
                    $("#delivery_toDuplicate").val(deliveryToNonRefIDs);
                    $("#deliveryTo_RefID").val(data[0]['deliveryTo_RefID']);
                    $("#deliveryToDuplicate_RefID").val(data[0]['deliveryTo_RefID']);
                    $("#delivery_to").prop("disabled", false);

                    $("#reference_number").css("border", "1px solid #ced4da");
                    $("#purchaseOrderMessage").hide();
                    $("#delivery_from").css("border", "1px solid #ced4da");
                    $("#deliveryFromMessage").hide();
                    $("#delivery_to").css("border", "1px solid #ced4da");
                    $("#deliveryToMessage").hide();

                    deliveryDate = data[0].deliveryDateTimeTZ;

                    let tbody = $('#tableReferenceNumberDetail tbody');
                    let modifyColumn = `<td rowspan="${data.length}" style="text-align: center; padding: 10px !important;">${reference_number}</td>`;

                    $.each(data, function(key, val2) {
                        let randomNumber = Math.floor(Math.random() * 11);
                        let balanced = currencyTotal(val2.quantity);
                        let row = `
                            <tr>
                                <input id="refDocument_RefID${indexReferenceNumberDetail}" value="${val2.purchaseOrder_RefID || ''}" type="hidden" />
                                <input id="underlyingDetail_RefID${indexReferenceNumberDetail}" value="${val2.sys_ID || ''}" type="hidden" />
                                <input id="reference_number${indexReferenceNumberDetail}" value="${reference_number}" type="hidden" />
                                <input id="product_code${indexReferenceNumberDetail}" value="${val2.productCode || ''}" type="hidden" />
                                <input id="product_name${indexReferenceNumberDetail}" value="${val2.productName || ''}" type="hidden" />
                                <input id="uom${indexReferenceNumberDetail}" value="${val2.quantityUnitName || ''}" type="hidden" />
                                <input id="qty_reference${indexReferenceNumberDetail}" value="${currencyTotal(val2.quantity)}" type="hidden" />
                                <input id="qty_avail${indexReferenceNumberDetail}" value="${currencyTotal(val2.qtyAvail)}" type="hidden" />
                                <input id="qty_unit_refID${indexReferenceNumberDetail}" value="${val2.quantityUnit_RefID || ''}" type="hidden" />
                                <input id="product_refID${indexReferenceNumberDetail}" value="${val2.product_RefID || ''}" type="hidden" />

                                ${key === 0 ? modifyColumn : ''}
                                <td style="text-align: center;">${val2.combinedBudgetSectionCode + ' - ' + val2.combinedBudgetSectionName}</td>
                                <td style="text-align: center;">${val2.productCode || '-'}</td>
                                <td style="text-align: center;">${val2.productName || '-'}</td>
                                <td style="text-align: center;">${val2.quantityUnitName || '-'}</td>
                                <td style="text-align: center;">${currencyTotal(val2.quantity)}</td>
                                <td style="text-align: center;">${currencyTotal(val2.qtyAvail)}</td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                    <input class="form-control number-without-negative" id="qty_req${indexReferenceNumberDetail}" data-index=${indexReferenceNumberDetail} data-quantity="" autocomplete="off" style="border-radius:0px;" />
                                </td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                                    <input class="form-control number-without-negative" id="balance${indexReferenceNumberDetail}" autocomplete="off" data-default="${balanced}" value="${balanced}" style="border-radius:0px;" disabled />
                                </td>
                                <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 150px;">
                                    <textarea id="note${indexReferenceNumberDetail}" class="form-control" data-index=${indexReferenceNumberDetail}></textarea>
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

                            checkOneLineBudgetContents(data_index);
                        });

                        $(`#note${indexReferenceNumberDetail}`).on('keyup', function() {
                            var data_index = $(this).data('index');

                            checkOneLineBudgetContents(data_index);
                        });

                        indexReferenceNumberDetail += 1;
                    });

                    $(".loadingReferenceNumberDetail").hide();
                    $("#tableReferenceNumberDetail tbody").show();
                } else {
                    $(".loadingReferenceNumberDetail").hide();
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
    
    function getStockMovementDetail() {
        const data = [
            {
                id: 0,
                productCode: '2000185',
                productName: 'Cable BCC / NYA 35 mm2',
                uom: 'm',
                qtyStock: 9
            },
            {
                id: 1,
                productCode: '2000190',
                productName: 'Cable NYM 3x2.5 mm2',
                uom: 'm',
                qtyStock: 120
            },
            {
                id: 2,
                productCode: '2000191',
                productName: 'MCB 6A Schneider',
                uom: 'pcs',
                qtyStock: 45
            },
            {
                id: 3,
                productCode: '2000192',
                productName: 'MCB 10A Schneider',
                uom: 'pcs',
                qtyStock: 30
            },
            {
                id: 4,
                productCode: '2000193',
                productName: 'Panel LVMDP 3 Phase',
                uom: 'unit',
                qtyStock: 5
            },
            {
                id: 5,
                productCode: '2000194',
                productName: 'Trafo 100 kVA 20/0.4 kV',
                uom: 'unit',
                qtyStock: 2
            },
            {
                id: 6,
                productCode: '2000195',
                productName: 'Arrester Tegangan Menengah',
                uom: 'pcs',
                qtyStock: 20
            },
            {
                id: 7,
                productCode: '2000196',
                productName: 'Isolator Keramik 24kV',
                uom: 'pcs',
                qtyStock: 75
            },
            {
                id: 8,
                productCode: '2000197',
                productName: 'Kabel ACSR 50 mm2',
                uom: 'm',
                qtyStock: 500
            },
            {
                id: 9,
                productCode: '2000198',
                productName: 'Tiang Beton 12 Meter',
                uom: 'batang',
                qtyStock: 15
            }
        ];

        let tbody = $('#tableReferenceNumberDetail tbody');
        tbody.empty();

        $.each(data, function(key, val) {
            let row = `
                <tr>
                    <td style="text-align: center;">${val.productCode || '-'}</td>
                    <td style="text-align: center;">${val.productName || '-'}</td>
                    <td style="text-align: center;">${val.uom || '-'}</td>
                    <td style="text-align: center;">${val.qtyStock || '-'}</td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input class="form-control number-without-negative" autocomplete="off" style="border-radius:0px;" />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input class="form-control number-without-negative" autocomplete="off" style="border-radius:0px;" />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input class="form-control number-without-negative" autocomplete="off" style="border-radius:0px;" />
                    </td>
                </tr>
            `;

            tbody.append(row);
        });
    }

    function getInternalUseDetail() {
        const data = [
            {
                id: 0,
                productCode: '2000185',
                productName: 'Cable BCC / NYA 35 mm2',
                uom: 'm',
                qtyBudget: 15,
                qtyAvailBudget: 7,
                priceBudget: 82756.94,
                totalBudget: 1241354.10,
                qtyStok: 4,
                priceStok: 47295.08,
                totalStok: 189180.32
            },
        ];

        let tbody = $('#tableReferenceNumberDetail tbody');
        tbody.empty();

        $.each(data, function(key, val) {
            let row = `
                <tr>
                    <td style="text-align: center;">${val.productCode || '-'}</td>
                    <td style="text-align: center;">${val.productName || '-'}</td>
                    <td style="text-align: center;">${val.uom || '-'}</td>
                    <td style="text-align: center;">${val.qtyBudget || '-'}</td>
                    <td style="text-align: center;">${val.qtyAvailBudget || '-'}</td>
                    <td style="text-align: center;">${val.priceBudget || '-'}</td>
                    <td style="text-align: center;">${val.totalBudget || '-'}</td>
                    <td style="text-align: center;">${val.qtyStok || '-'}</td>
                    <td style="text-align: center;">${val.priceStok || '-'}</td>
                    <td style="text-align: center;">${val.totalStok || '-'}</td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input class="form-control number-without-negative" autocomplete="off" style="border-radius:0px;" />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input class="form-control number-without-negative" autocomplete="off" style="border-radius:0px;" />
                    </td>
                    <td style="border:1px solid #e9ecef;background-color:white; padding: 0.5rem !important; width: 100px;">
                        <input class="form-control number-without-negative" autocomplete="off" style="border-radius:0px;" />
                    </td>
                </tr>
            `;

            tbody.append(row);
        });
    }

    function referenceType(source) {
        let tbody = $('#tableReferenceNumberDetail tbody');
        tbody.empty();

        if (source.value == "PURCHASE_ORDER") {
            $(".purchase-order-components").css("display", "flex");
            $(".internal-use-components").css("display", "none");
            $(".stock-movement-components").css("display", "none");

            $(".thead-purchase-order").css("display", "table-row");
            $(".thead-internal-use").css("display", "none");
            $(".thead-stock-movement").css("display", "none");
            getReferenceNumber(source);
        } else if (source.value == "INTERNAL_USE") {
            $(".purchase-order-components").css("display", "none");
            $(".internal-use-components").css("display", "flex");
            $(".stock-movement-components").css("display", "none");

            $(".thead-purchase-order").css("display", "none");
            $(".thead-internal-use").css("display", "table-row");
            $(".thead-stock-movement").css("display", "none");
        } else {
            $(".purchase-order-components").css("display", "none");
            $(".internal-use-components").css("display", "none");
            $(".stock-movement-components").css("display", "flex");

            $(".thead-purchase-order").css("display", "none");
            $(".thead-internal-use").css("display", "none");
            $(".thead-stock-movement").css("display", "table-row");
        }

        $("#reference_type").css("border", "1px solid #ced4da");
        $("#referenceTypeMessage").hide();
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
                DeliveryOrderStore({...formatData, comment: result.value});
            }
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

        var action = $('#FormSubmitDeliveryOrder').attr("action");
        var method = $('#FormSubmitDeliveryOrder').attr("method");
        var form_data = new FormData($('#FormSubmitDeliveryOrder')[0]);
        form_data.append('deliveryOrderDetail', JSON.stringify(dataStore));
        form_data.append('delivery_date', deliveryDate.split(" ")[0]);

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

    $('#tableGetProjectSecond').on('click', 'tbody tr', async function() {
        var sysId       = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        var projectCode = $(this).find('td:nth-child(2)').text();
        var projectName = $(this).find('td:nth-child(3)').text();

        $("#project_id_second").val(sysId);
        $("#project_code_second").val(projectCode);
        $("#project_name_second").val(projectName);

        getSiteSecond(sysId);
    });

    $('#tableGetSiteSecond').on('click', 'tbody tr', function() {
        getInternalUseDetail();
    });

    $('#delivery_from').on('input', function(e) {
        if (e.target.value == deliveryFromDuplicate.value) {
            $("#deliveryFrom_RefID").val(deliveryFromDuplicateRefID.value);
        } else {
            $("#deliveryFrom_RefID").val("");
        }

        $("#delivery_from").css("border", "1px solid #ced4da");
        $("#deliveryFromMessage").hide();
    });

    $('#delivery_to').on('input', function(e) {
        if (e.target.value == deliveryToDuplicate.value) {
            $("#deliveryTo_RefID").val(deliveryToDuplicateRefID.value);
        } else {
            $("#deliveryTo_RefID").val("");
        }

        $("#delivery_to").css("border", "1px solid #ced4da");
        $("#deliveryToMessage").hide();
    });

    $('#referenceNumberModal').on('click', 'tbody tr', function() {
        var table = $('#referenceNumberTable').DataTable();
        var data = table.row(this).data();

        if (data) {
            $("#referenceNumberModal").modal('toggle');

            // $("#reference_id").val(data.sys_ID);
            // $("#reference_number").val(data.sys_Text);
            // $("#var_combinedBudget_RefID").val(data.combinedBudget_RefID);
            // $("#requesterWorkerJobsPosition_RefID").val(data.combinedBudget_RefID);

            GetReferenceNumberDetail(data.sys_ID, data.sys_Text);
        }


        // var sysId                   = $(this).find('input[data-trigger="sys_id_reference_number"]').val();
        // var sysCombineBudgetRefID   = $(this).find('input[data-trigger="sys_combined_budget_RefID"]').val();
        // var sysRequesterRefID       = $(this).find('input[data-trigger="sys_requester_RefID"]').val();
        // var referenceNumber         = $(this).find('td:nth-child(2)').text();
        
        // $("#reference_id").val(sysId);
        // $("#var_combinedBudget_RefID").val(sysCombineBudgetRefID);
        // $("#requesterWorkerJobsPosition_RefID").val(sysRequesterRefID);
        // $("#reference_number").val(referenceNumber);
        // GetReferenceNumberDetail(sysId, referenceNumber);

        // $('#referenceNumberModal').modal('hide');
    });

    $('#tableGetTransporter tbody').on('click', 'tr', function () {
        var sysId               = $(this).find('input[data-trigger="sys_id_transporter"]').val();
        var fax                 = $(this).find('input[data-trigger="fax_transporter"]').val();
        var phone               = $(this).find('input[data-trigger="phone_transporter"]').val();
        var email               = $(this).find('input[data-trigger="email_transporter"]').val();
        var phoneOffice         = $(this).find('input[data-trigger="office_phone_transporter"]').val();
        var address             = $(this).find('input[data-trigger="address_transporter"]').val();
        var transporterNames    = $(this).find('td:nth-child(2)').text();

        $("#transporter_id").val(sysId);
        $("#transporter_name").val(transporterNames);
        $("#transporter_phone").val(phone);
        $("#transporter_fax").val(fax);
        $("#transporter_contact").val(email);
        $("#transporter_handphone").val(phoneOffice);
        $("#transporter_address").val(address);

        $("#transporter_name").css("border", "1px solid #ced4da");
        $("#transporterMessage").hide();
    });

    $('#tableGetModalWarehouses').on('click', 'tbody tr', function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_modal_warehouse"]').val();
        let name    = $(this).find('td:nth-child(2)').text();
        let address = $(this).find('td:nth-child(3)').text();

        if (isDeliveryFromStockMovement == "from_internal_use") {
            $("#delivery_from_id_internal_use").val(sysId);
            $("#delivery_from_name_internal_use").val(name);
            $("#delivery_from_address_internal_use").val(address);
        } else if (isDeliveryFromStockMovement == "to_internal_use") {
            $("#delivery_to_id_internal_use").val(sysId);
            $("#delivery_to_name_internal_use").val(name);
            $("#delivery_to_address_internal_use").val(address);
        } else if (isDeliveryFromStockMovement == "from_stock_movement") {
            $("#delivery_from_id_stock_movement").val(sysId);
            $("#delivery_from_name_stock_movement").val(name);
            $("#delivery_from_address_stock_movement").val(address);
            getStockMovementDetail();
        } else if (isDeliveryFromStockMovement == "to_stock_movement") {
            $("#delivery_to_id_stock_movement").val(sysId);
            $("#delivery_to_name_stock_movement").val(name);
            $("#delivery_to_address_stock_movement").val(address);
        }

        $("#myGetModalWarehouses").modal('toggle');
    });

    $(window).one('load', function(e) {
        $(".loadingReferenceNumberDetail").hide();
        $(".errorMessageContainerReferenceNumberDetail").hide();
        $("#delivery_from").prop("disabled", true);
        $("#delivery_to").prop("disabled", true);

        getDocumentType("Delivery Order Form");
    });
</script>