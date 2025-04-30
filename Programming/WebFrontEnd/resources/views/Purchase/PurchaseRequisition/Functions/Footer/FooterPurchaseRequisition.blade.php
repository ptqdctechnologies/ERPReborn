<script>
    var DocumentTypeID      = $("#DocumentTypeID").val();
    var TotalBudgetSelected = document.getElementById('TotalBudgetSelected');

    $("#deliverModalTrigger").prop("disabled", true);
    $(".loadingBudgetDetails").hide();
    $(".errorMessageContainerBudgetDetails").hide();

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
                const result = data.find(({ Name }) => Name === "Purchase Requisition Form");

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

    function calculateTotal() {
        let total = 0;
        
        document.querySelectorAll('input[id^="total_req"]').forEach(function(input) {
            let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma
            if (!isNaN(value)) {
                total += value;
            }
        });

        total = Math.ceil(total * 100) / 100;

        document.getElementById('TotalBudgetSelected').textContent = currencyTotal(total);
    }

    function getBudgetDetails(site_code) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBudget") !!}?site_code=' + site_code,
            success: function(data) {
                $(".loadingBudgetDetails").hide();

                let tbody = $('#tableGetBudgetDetails tbody');
                tbody.empty();

                let unspecifiedProducts = data.filter(item => item.productName === "Unspecified Product");

                if (unspecifiedProducts.length > 1) {
                    let maxBudgetProduct = unspecifiedProducts.reduce((max, item) => {
                        let totalBudget = item.quantity * item.priceBaseCurrencyValue;
                        return totalBudget > (max.quantity * max.priceBaseCurrencyValue) ? item : max;
                    });

                    data = data.filter(item => 
                        item.productName !== "Unspecified Product" || 
                        (item.productName === "Unspecified Product" && item === maxBudgetProduct)
                    );
                }

                $.each(data, function(key, val2) {
                    let isUnspecified = '';
                    let balanced = currencyTotal(val2.quantity);
                    let totalBudget = val2.quantity * val2.priceBaseCurrencyValue;
                    let productColumn = `
                        <td style="text-align: center;">${val2.product_RefID}</td>
                        <td style="text-align: center;">${val2.productName}</td>
                    `;

                    if (val2.productName === "Unspecified Product") {
                        productColumn = `
                            <td style="padding: 8px;">
                                <div class="input-group">
                                    <input id="product_id${key}" style="border-radius:0;width:130px;background-color:white;" name="product_id" class="form-control" readonly />
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" data-id="10">
                                            <a id="product_id2${key}" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(${key})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td id="product_name${key}" style="text-align: center;text-wrap: auto;" name="product_name">${val2.productName}</td>
                        `;
                        isUnspecified = 'disabled';
                        balanced = '-';
                    }

                    let row = `
                        <tr>
                            <input id="productId${key}" data-product-id="productId" value="${val2.product_RefID}" type="hidden" />
                            <input id="productName${key}" value="${val2.productName}" type="hidden" />
                            <input id="qtyId${key}" value="${val2.quantityUnit_RefID}" type="hidden" />
                            <input id="qty${key}" value="${val2.quantity}" type="hidden" />
                            <input id="price${key}" value="${val2.priceBaseCurrencyValue}" type="hidden" />
                            <input id="uom${key}" value="${val2.quantityUnitName}" type="hidden" />
                            <input id="currency${key}" value="${val2.priceBaseCurrencyISOCode}" type="hidden" />
                            <input id="currencyId${key}" value="${val2.sys_BaseCurrency_RefID}" type="hidden" />
                            <input id="combinedBudgetSectionDetail_RefID${key}" value="${val2.sys_ID}" type="hidden" />
                            <input id="combinedBudget_RefID${key}" value="${val2.combinedBudget_RefID}" type="hidden" />
                            
                            ${productColumn}
                            <td style="text-align: center;">${currencyTotal(val2.quantity)}</td>
                            <td style="text-align: center;">${val2.productName === "Unspecified Product" ? '-' : currencyTotal(val2.quantity)}</td>
                            <td style="text-align: center;">${val2.quantityUnitName || '-'}</td>
                            <td style="text-align: center;">${currencyTotal(val2.priceBaseCurrencyValue)}</td>
                            <td style="text-align: center;">${currencyTotal(totalBudget)}</td>
                            <td style="text-align: center;">${val2.priceBaseCurrencyISOCode}</td>
                            <td class="sticky-col fifth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="qty_req${key}" autocomplete="off" style="border-radius:0px;" ${isUnspecified} />
                            </td>
                            <td class="sticky-col forth-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="price_req${key}" autocomplete="off" style="border-radius:0px;" ${isUnspecified} />
                            </td>
                            <td class="sticky-col third-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="total_req${key}" autocomplete="off" style="border-radius:0px;background-color:white;" disabled />
                            </td>
                            <td class="sticky-col second-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <input class="form-control number-without-negative" id="balanced_qty${key}" autocomplete="off" style="border-radius:0px;width:90px;background-color:white;" value="${balanced}" disabled />
                            </td>
                            <td class="sticky-col first-col-pr" style="border:1px solid #e9ecef;background-color:white;">
                                <textarea id="remark${key}" class="form-control"></textarea>
                            </td>
                        </tr>
                    `;

                    tbody.append(row);

                    $(`#product_id${key}`).data('default', $(`#product_id${key}`).val());
                    $(`#product_name${key}`).data('default', $(`#product_name${key}`).text());
                    $(`#qty_req${key}`).data('default', $(`#qty_req${key}`).val());
                    $(`#price_req${key}`).data('default', $(`#price_req${key}`).val());
                    $(`#total_req${key}`).data('default', $(`#total_req${key}`).val());
                    $(`#balanced_qty${key}`).data('default', $(`#balanced_qty${key}`).val());

                    if (val2.productName === "Unspecified Product") {
                        $(`#product_id${key}`).on('input', function() {
                            if ($(this).val().trim() !== '') {
                                $(`#qty_req${key}, #price_req${key}`).prop('disabled', false);
                            } else {
                                $(`#qty_req${key}, #price_req${key}`).prop('disabled', true);
                            }
                        });

                        $(`#qty_req${key}`).on('keyup', function() {
                            var qty_req = $(this).val().replace(/,/g, '');
                            var price_req = $(`#price_req${key}`).val().replace(/,/g, '');
                            var total_req = parseFloat(qty_req || 1) * parseFloat(price_req || 1);
                            var total = parseFloat(qty_req || 0) + parseFloat(balanced);

                            if (!qty_req) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                ErrorNotif("Total Req is over budget !");
                            } else {
                                calculateTotal();
                                $(`#total_req${key}`).val(currencyTotal(total_req));
                            }
                        });
                    } else {
                        $(`#qty_req${key}`).on('keyup', function() {
                            var qty_req = $(this).val().replace(/,/g, '');
                            var price_req = $(`#price_req${key}`).val().replace(/,/g, '');
                            var total_req = parseFloat(qty_req || 1) * parseFloat(price_req || 1);
                            var total = parseFloat(balanced) - parseFloat(qty_req || 0);

                            if (parseFloat(qty_req) > val2.quantity) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                ErrorNotif("Qty Req is over budget !");
                            } else if (parseFloat(qty_req * price_req) > totalBudget) {
                                $(`#qty_req${key}`).val('');
                                $(`#total_req${key}`).val('');
                                ErrorNotif("Total Req is over budget !");
                            } else {
                                calculateTotal();
                                $(`#total_req${key}`).val(currencyTotal(total_req));
                                $(`#balanced_qty${key}`).val(currencyTotal(total));
                            }
                        });
                    }

                    $(`#price_req${key}`).on('keyup', function() {
                        var price_req = $(this).val().replace(/,/g, '');
                        var qty_req = $(`#qty_req${key}`).val().replace(/,/g, '');
                        var total_req = parseFloat(qty_req || 0) * parseFloat(price_req || 1);
                        var total = parseFloat(price_req || 0) + parseFloat(val2.priceBaseCurrencyValue);

                        if (parseFloat(price_req) > val2.priceBaseCurrencyValue) {
                            $(`#price_req${key}`).val('');
                            $(`#total_req${key}`).val('');
                            ErrorNotif("Price Req is over budget !");
                        } else if (parseFloat(qty_req * price_req) > totalBudget) {
                            $(`#price_req${key}`).val('');
                            $(`#total_req${key}`).val('');
                            ErrorNotif("Total Req is over budget !");
                        } else {
                            calculateTotal();
                            $(`#total_req${key}`).val(currencyTotal(total_req));
                        }
                    });
                });
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetBudgetDetails tbody').empty();
                $(".loadingBudgetDetails").hide();
                $(".errorMessageContainerBudgetDetails").show();
                $("#errorMessageBudgetDetails").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
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
            PurchaseRequisitionStore({...formatData, comment: result.value});
        });
    }

    function PurchaseRequisitionStore(res) {
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // $.ajax({
        //     type: 'POST',
        //     data: formatData,
        //     url: '{{ route("PurchaseRequisition.store") }}',
        //     success: function(res) {
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
                        window.location.href = '/PurchaseRequisition?var=1';
                    });
                } else {
                    ErrorNotif("Data Cancel Inputed");
                }
        //     },
        //     error: function(jqXHR, textStatus, errorThrown) {
        //         console.log('error', jqXHR, textStatus, errorThrown);
        //     }
        // });
    }

    $('#tableGetProjectSecond').on('click', 'tbody tr', async function() {
        var sysId       = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        var projectCode = $(this).find('td:nth-child(2)').text();
        var projectName = $(this).find('td:nth-child(3)').text();

        $("#project_id_second").val("");
        $("#project_code_second").val("");
        $("#project_name_second").val("");

        $("#loadingBudget").css({"display":"block"});
        $("#myProjectSecondTrigger").css({"display":"none"});

        try {
            // var checkWorkFlow = await checkingWorkflow(sysId, documentTypeID);

            // if (checkWorkFlow) {
                $("#project_id_second").val(sysId);
                $("#project_code_second").val(projectCode);
                $("#project_name_second").val(projectName);

                $("#var_combinedBudget_RefID").val(sysId);

                getSiteSecond(sysId);
                $("#mySiteCodeSecondTrigger").prop("disabled", false);
            // }

            $("#loadingBudget").css({"display":"none"});
            $("#myProjectSecondTrigger").css({"display":"block"});
        } catch (error) {
            console.error('Error checking workflow:', error);

            Swal.fire("Error", "Error Checking Workflow", "error");
        }
    });

    $('#tableGetSiteSecond').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_site_second"]').val();

        getBudgetDetails(sysId);
        $(".loadingBudgetDetails").show();
        $("#deliverModalTrigger").prop("disabled", false);
    });

    $('#budget-details-add').on('click', function() {
        let dataStore = [];

        $("#tableGetBudgetDetails tbody tr").each(function(index) {
            var productId                           = $(this).find(`input[id="productId${index}"]`).val();
            var productName                         = $(this).find(`input[id="productName${index}"]`).val();
            var qtyId                               = $(this).find(`input[id="qtyId${index}"]`).val();
            var uom                                 = $(this).find(`input[id="uom${index}"]`).val();
            var currency                            = $(this).find(`input[id="currency${index}"]`).val();
            var currencyId                          = $(this).find(`input[id="currencyId${index}"]`).val();
            var qtyReq                              = $(this).find(`input[id^="qty_req${index}"]`).val();
            var priceReq                            = $(this).find(`input[id^="price_req${index}"]`).val();
            var totalReq                            = $(this).find(`input[id^="total_req${index}"]`).val();
            var remark                              = $(this).find(`textarea[id^="remark${index}"]`).val();
            var combinedBudgetSectionDetail_RefID   = $(this).find(`input[id^="combinedBudgetSectionDetail_RefID${index}"]`).val();

            // totalReq = totalReq.replace(/,/g, ""); 
            // totalReq = parseFloat(totalReq) || 0;

            if (!productId || !qtyReq || !priceReq || !totalReq) {
                return;
            }

            var rowToUpdate = null;

            $("#tablePurchaseRequisitionList tbody tr").each(function() {
                var existingProductId = $(this).find("td:eq(0)").text();
                var existingQty = $(this).find("td:eq(5)").text();
                var existingPrice = $(this).find("td:eq(4)").text();

                if (existingProductId === productId) {
                    if (existingQty === qtyReq && existingPrice === priceReq) {
                        rowToUpdate = $(this);
                    } else {
                        rowToUpdate = $(this);
                    }
                    return false;
                }
            });

            if (rowToUpdate) {
                rowToUpdate.find("td:eq(0)").text(productId);
                rowToUpdate.find("td:eq(1)").text(productName);
                rowToUpdate.find("td:eq(2)").text(uom);
                rowToUpdate.find("td:eq(3)").text(currency);
                rowToUpdate.find("td:eq(4)").text(priceReq);
                rowToUpdate.find("td:eq(5)").text(qtyReq);
                rowToUpdate.find("td:eq(6)").text(totalReq);
                rowToUpdate.find("td:eq(7)").text(remark);

                dataStore[index] = {
                    combinedBudgetSectionDetail_RefID: combinedBudgetSectionDetail_RefID,
                    product_RefID: productId,
                    quantity: qtyReq,
                    quantityUnit_RefID: qtyId,
                    productUnitPriceCurrency_RefID: currencyId,
                    productUnitPriceCurrencyValue: priceReq,
                    productUnitPriceCurrencyExchangeRate: 1,
                    fulfillmentDeadlineDateTimeTZ: '',
                    remarks: remark
                };
            } else {
                var newRow = `<tr>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productId}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${productName}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${uom}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currency}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(priceReq)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(qtyReq)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${currencyTotal(totalReq)}</td>
                    <td style="text-align: center; padding: 0.8rem 0px;">${remark}</td>
                </tr>`;

                dataStore.push({
                    combinedBudgetSectionDetail_RefID: combinedBudgetSectionDetail_RefID,
                    product_RefID: productId,
                    quantity: qtyReq,
                    quantityUnit_RefID: qtyId,
                    productUnitPriceCurrency_RefID: currencyId,
                    productUnitPriceCurrencyValue: priceReq,
                    productUnitPriceCurrencyExchangeRate: 1,
                    fulfillmentDeadlineDateTimeTZ: '',
                    remarks: remark
                });

                $("#tablePurchaseRequisitionList").find("tbody").append(newRow);
            }
        });

        dataStore = dataStore.filter(item => item !== undefined);

        $("#purchaseRequisitionDetail").val(JSON.stringify(dataStore));
        document.getElementById('GrandTotal').textContent = TotalBudgetSelected.textContent;
    });

    $('#budget-details-reset').on('click', function() {
        $('input[id^="qty_req"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="price_req"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="total_req"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('input[id^="balance"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('textarea[id^="remark"]').each(function() {
            $(this).val($(this).data('default'));
        });
        $('#tablePurchaseRequisitionList tbody').empty();

        document.getElementById('TotalBudgetSelected').textContent = "0.00";
        document.getElementById('GrandTotal').textContent = "0.00";
    });

    $("#FormSubmitPurchaseRequisition").on("submit", function(e) {
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
                        HideLoading();

                        PurchaseRequisitionStore(response);
                        
                        // if (response.message == "WorkflowError") {
                        //     $("#submitPR").prop("disabled", false);
                        //     CancelNotif("You don't have access", '/PurchaseRequisition?var=1');
                        // } else if (response.message == "MoreThanOne") {
                        //     $('#getWorkFlow').modal('toggle');

                        //     var t = $('#tableGetWorkFlow').DataTable();
                        //     t.clear();
                        //     $.each(response.data, function(key, val) {
                        //         t.row.add([
                        //             '<td><span data-dismiss="modal" onclick="SelectWorkFlow(\'' + val.Sys_ID + '\', \'' + val.NextApprover_RefID + '\', \'' + response.approverEntity_RefID + '\', \'' + response.documentTypeID + '\');"><img src="{{ asset("AdminLTE-master/dist/img/add.png") }}" width="25" alt="" style="border: 1px solid #ced4da;padding-left:4px;padding-right:4px;padding-top:2px;padding-bottom:2px;border-radius:3px;"></span></td>',
                        //             '<td style="border:1px solid #e9ecef;">' + val.FullApproverPath + '</td></tr></tbody>'
                        //         ]).draw();
                        //     });
                        // } else {
                        //     const formatData = {
                        //         workFlowPath_RefID: response.workFlowPath_RefID, 
                        //         nextApprover: response.nextApprover_RefID, 
                        //         approverEntity: response.approverEntity_RefID, 
                        //         documentTypeID: response.documentTypeID,
                        //         storeData: response.storeData
                        //     };

                        //     SelectWorkFlow(formatData);
                        // }
                    },
                    error: function(response) {
                        console.log('response error', response);
                        
                        HideLoading();
                        $("#submitPR").prop("disabled", false);
                        CancelNotif("You don't have access", '/PurchaseRequisition?var=1');
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                HideLoading();
                CancelNotif("Data Cancel Inputed", '/PurchaseRequisition?var=1');
            }
        });
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });

    $(window).one('load', function(e) {
        getDocumentType();
    });
</script>