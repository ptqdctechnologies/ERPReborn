<script>
    let dataStore                           = [];
    const deliveryOrderCode                 = document.getElementById("delivery_order_code");
    const receiveDate                       = document.getElementById("receive_date");
    const tableMaterialReceiveLists         = document.querySelector("#tableMaterialReceiveList tbody");

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

        document.getElementById('TotalDeliveryOrder').textContent = decimalFormat(total);
    }

    function updateGrandTotal() {
        let total = 0;
        const rows = document.querySelectorAll('#tableMaterialReceiveList tbody tr');
        rows.forEach(row => {
            const totalCell = row.children[4];
            const value = parseFloat(totalCell.innerText.replace(/,/g, '')) || 0;
            total += value;
        });

        document.getElementById('GrandTotal').innerText = `Total ${decimalFormat(total)}`;
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
                $("#deliveryOrderDetailMessage").hide();
            } else {
                if (indexInput > -1) {
                    if (indexInput == index) {
                        if (qtyEl.value.trim() != "" || noteEl.value.trim() != "") {
                            $(qtyEl).css("border", "1px solid red");
                            $(noteEl).css("border", "1px solid red");
                            $("#deliveryOrderDetailMessage").show();
                        } else {
                            $(qtyEl).css("border", "1px solid #ced4da");
                            $(noteEl).css("border", "1px solid #ced4da");
                            $("#deliveryOrderDetailMessage").hide();
                        }
                    }

                    if (indexInput != index && (qtyEl.value.trim() == "" && noteEl.value.trim() == "")) {
                        $(qtyEl).css("border", "1px solid #ced4da");
                        $(noteEl).css("border", "1px solid #ced4da");
                    } 
                } else {
                    $(qtyEl).css("border", "1px solid red");noteEl
                    $(noteEl).css("border", "1px solid red");
                    $("#deliveryOrderDetailMessage").show();
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
            const deliveryOrderDetail_RefID             = row.querySelector('input[id^="delivery_order_detail_id"]');
            const product_RefID                         = row.querySelector('input[id^="product_RefID"]');
            const quantityUnit_RefID                    = row.querySelector('input[id^="quantityUnit_RefID"]');
            const productUnitPriceCurrency_RefID        = row.querySelector('input[id^="productUnitPriceCurrency_RefID"]');
            const productUnitPriceCurrencyExchangeRate  = row.querySelector('input[id^="productUnitPriceCurrencyExchangeRate"]');
            const productUnitPriceBaseCurrencyValue     = row.querySelector('input[id^="productUnitPriceBaseCurrencyValue"]');
            const qtyInput                              = row.querySelector('input[id^="qty_req"]');
            const noteInput                             = row.querySelector('textarea[id^="note"]');

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
                const price = productUnitPriceBaseCurrencyValue.value.trim();
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
                                    productCode: productCode,
                                    product_RefID: parseInt(product_RefID.value),
                                    quantityUnit_RefID: parseInt(quantityUnit_RefID.value),
                                    productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrency_RefID.value),
                                    productUnitPriceCurrencyExchangeRate: parseInt(productUnitPriceCurrencyExchangeRate.value),
                                    productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, ''))
                                }
                            };
                        }
                    }
                }

                if (!found) {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <input type="hidden" name="qty_avail[]" value="${qtyAvail}">
                        <td style="text-align: left;padding: 0.8rem; width: 15% !important;">${productCode}</td>
                        <td style="text-align: left;padding: 0.8rem;text-wrap: auto;">${productName}</td>
                        <td style="text-align: left;padding: 0.8rem;">${uom}</td>
                        <td style="text-align: right;padding: 0.8rem;">${qty}</td>
                        <td style="text-align: right;padding: 0.8rem;" hidden>${note}</td>
                    `;
                    targetTable.appendChild(newRow);

                    dataStore.push({
                        entities: {
                            deliveryOrderDetail_RefID: parseInt(deliveryOrderDetail_RefID.value),
                            quantity: parseFloat(qty.replace(/,/g, '')),
                            remarks: note,
                            productCode: productCode,
                            product_RefID: parseInt(product_RefID.value),
                            quantityUnit_RefID: parseInt(quantityUnit_RefID.value),
                            productUnitPriceCurrency_RefID: parseInt(productUnitPriceCurrency_RefID.value),
                            productUnitPriceCurrencyExchangeRate: parseInt(productUnitPriceCurrencyExchangeRate.value),
                            productUnitPriceCurrencyValue: parseFloat(price.replace(/,/g, ''))
                        }
                    });
                }
            }
        }
        
        dataStore = dataStore.filter(item => item !== undefined);

        updateGrandTotal();
    }

    function validationForm() {
        const isDeliveryOrderCodeNotEmpty           = deliveryOrderCode.value.trim() !== '';
        const isReceiveDateNotEmpty                 = receiveDate.value.trim() !== '';
        const isAddressDeliveryOrderFromNotEmpty    = addressDeliveryOrderFrom.value.trim() !== '';
        const isAddressDeliveryOrderToNotEmpty      = addressDeliveryOrderTo.value.trim() !== '';
        const isTableNotEmpty                       = checkOneLineBudgetContents();

        if (isDeliveryOrderCodeNotEmpty && isReceiveDateNotEmpty && isAddressDeliveryOrderFromNotEmpty && isAddressDeliveryOrderToNotEmpty && isTableNotEmpty) {
            $('#materialReceiveFormModal').modal('show');
            summaryData();
        } else {
            if (!isDeliveryOrderCodeNotEmpty && !isReceiveDateNotEmpty && !isAddressDeliveryOrderFromNotEmpty && !isAddressDeliveryOrderToNotEmpty) {
                $("#delivery_order_code").css("border", "1px solid red");
                $("#receive_date").css("border", "1px solid red");
                $("#address_delivery_order_from").css("border", "1px solid red");
                $("#address_delivery_order_to").css("border", "1px solid red");

                $("#deliveryOrderMessage").show();
                $("#receiveDateMessage").show();
                $("#deliveryFromMessage").show();
                $("#deliveryToMessage").show();
                return;
            }
            if (!isDeliveryOrderCodeNotEmpty) {
                $("#delivery_order_code").css("border", "1px solid red");
                $("#deliveryOrderMessage").show();
                return;
            }
            if (!isReceiveDateNotEmpty) {
                $("#receive_date").css("border", "1px solid red");
                $("#receiveDateMessage").show();
                return;
            }
            if (!isAddressDeliveryOrderFromNotEmpty) {
                $("#address_delivery_order_from").css("border", "1px solid red");
                $("#deliveryFromMessage").show();
                return;
            }
            if (!isAddressDeliveryOrderToNotEmpty) {
                $("#address_delivery_order_to").css("border", "1px solid red");
                $("#deliveryToMessage").show();
                return;
            }
            if (!isTableNotEmpty) {
                $("#deliveryOrderDetailMessage").show();
                return;
            }
        }
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
            success: async function(data) {
                let tbody = $('#tableMaterialReceiveDetail tbody');
                tbody.empty();

                if (Array.isArray(data) && data.length > 0) {
                    const documentTypeID = document.getElementById("DocumentTypeID");

                    if (documentTypeID.value) {
                        var checkWorkFlow = await checkingWorkflow(data[0].combinedBudget_RefID, documentTypeID.value);

                        if (!checkWorkFlow) {
                            $(".loadingMaterialReceiveDetail").hide();
                            return;
                        }
                    }

                    $("#transporterRefID").val(data[0].transporter_RefID);
                    $("#deliveryDateTimeTZ").val(data[0].deliveryDateTimeTZ);
                    $("#var_combinedBudget_RefID").val(data[0].combinedBudget_RefID);

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
                    $("#do_transporter").val(`${data[0].transporterCode} - ${data[0].transporterName}`);

                    $("#address_delivery_order_from").css("border", "1px solid #ced4da");
                    $("#deliveryFromMessage").hide();

                    $("#address_delivery_order_to").css("border", "1px solid #ced4da");
                    $("#deliveryToMessage").hide();

                    $.each(data, function(key, val2) {
                        let row = `
                            <tr>
                                <input id="trano${key}" value="${delivery_order_number}" type="hidden" />
                                <input id="delivery_order_detail_id${key}" value="${val2.deliveryOrderDetail_ID}" type="hidden" />
                                <input id="product_code${key}" value="${val2.productCode}" type="hidden" />
                                <input id="product_name${key}" value="${val2.productName}" type="hidden" />
                                <input id="qty_do${key}" value="${val2.qtyReq}" type="hidden" />
                                <input id="qty_available${key}" value="${val2.qtyAvail}" type="hidden" />
                                <input id="uom${key}" value="${val2.quantityUnitName}" type="hidden" />
                                <input id="product_RefID${key}" value="${val2.product_RefID}" type="hidden" />
                                <input id="quantityUnit_RefID${key}" value="${val2.quantityUnit_RefID}" type="hidden" />
                                <input id="productUnitPriceCurrency_RefID${key}" value="${val2.productUnitPriceCurrency_RefID}" type="hidden" />
                                <input id="productUnitPriceCurrencyExchangeRate${key}" value="${val2.productUnitPriceCurrencyExchangeRate}" type="hidden" />
                                <input id="productUnitPriceBaseCurrencyValue${key}" value="${val2.productUnitPriceBaseCurrencyValue}" type="hidden" />

                                <td style="text-align: center;">${data[0].combinedBudgetSectionCode + ' - ' + data[0].combinedBudgetSectionName}</td>
                                <td style="text-align: center;">${val2.productCode}</td>
                                <td style="text-align: center;text-wrap: auto;">${val2.productName}</td>
                                <td style="text-align: center;">${val2.qtyReq}</td>
                                <td style="text-align: center;">${val2.qtyAvail}</td>
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
                                calculateTotal();
                                ErrorNotif("Qty Receive is over!");
                            } else {
                                calculateTotal();
                            }

                            checkOneLineBudgetContents(key);
                        });

                        $(`#note${key}`).on('keyup', function() {
                            checkOneLineBudgetContents(key);
                        });
                    });

                    $(".loadingMaterialReceiveDetail").hide();
                    $("#tableMaterialReceiveDetail tbody").show();
                } else {
                    $(".loadingMaterialReceiveDetail").hide();
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
                MaterialReceiveStore({...formatData, comment: result.value});
            }
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

    function CancelMaterialReceive() {
        ShowLoading();
        window.location.href = "{{ route('MaterialReceive.index', ['var' => 1]) }}";
    }

    function SubmitForm() {
        $('#materialReceiveFormModal').modal('hide');

        let action = $('#FormSubmitMaterialReceive').attr("action");
        let method = $('#FormSubmitMaterialReceive').attr("method");
        let form_data = new FormData($('#FormSubmitMaterialReceive')[0]);
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

    $('#tableGetDeliveryOrder').on('click', 'tbody tr', function() {
        var sysId       = $(this).find('input[data-trigger="sys_id_delivery_order"]').val();
        var projectCode = $(this).find('td:nth-child(2)').text();

        $("#delivery_order_code").css("border", "1px solid #ced4da");
        $("#deliveryOrderMessage").hide();
        GetDeliveryOrderDetail(sysId, projectCode);
    });

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
        getDocumentType("Warehouse Inbound Order Form");

        $(".loadingMaterialReceiveDetail").hide();
        $(".errorMessageContainerMaterialReceiveDetail").hide();

        $('#startDate').datetimepicker({
            format: 'L'
        });
    });
</script>