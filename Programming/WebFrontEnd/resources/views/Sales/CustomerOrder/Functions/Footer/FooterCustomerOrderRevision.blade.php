<script>
    let data = [];
    let dataAddManual = [];
    let dataSubBudget = [];
    let dataProducts = [];
    let dataWorks = [];
    let dataUom = [];
    let indexSubBudget = null;
    let indexProduct = null;
    let indexUom = null;
    let indexWork = null;
    let coType = null;
    let coVat = null;
    let coRatio = null;
    let dataWorkflow = {
        workFlowPathRefID: null,
        approverEntityRefID: null,
        comment: null
    };
    const vatRatio = document.getElementById('VatRatio');
    const budgetID = document.getElementById("budget_id");
    const customerOrderType = document.getElementById("CustomerOrderType");
    const currencyID = document.getElementById("currency_id");
    const fileID = document.getElementById("dataInput_Log_FileUpload");
    const dataTable = {!! json_encode($details ?? []) !!};

    function pickSubBudget(index) {
        indexSubBudget = index;
    }

    function calculateTotal() {
        let total = 0;

        if (customerOrderType.value === "SUB_BUDGET_BASE") {
            document.querySelectorAll('input[id^="value"]').forEach(function (input) {
                let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma

                if (!isNaN(value)) {
                    total += value;
                }
            });
        } else {
            document.querySelectorAll('input[id^="total"]').forEach(function (input) {
                let value = parseFloat(input.value.replace(/,/g, '')); // Mengambil nilai dan menghilangkan koma

                if (!isNaN(value)) {
                    total += value;
                }
            });
        }

        document.getElementById('table_total').textContent = total.toLocaleString('en-US', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });

        const tableTotalVAT = document.getElementById("ppn_percentage_option");
        const resultVAT = (Utils.parseFloatSafe(tableTotalVAT.value) / 100) * Utils.parseFloatSafe(total);
        const resultGrandTotal = tableTotalVAT.value == 'Select a VAT' ? total : resultVAT + total;

        $("#table_total_vat").text(Utils.formatCurrency(Utils.parseFloatSafe(resultVAT)));
        $("#table_grand_total").text(Utils.formatCurrency(Utils.parseFloatSafe(resultGrandTotal)));
    }

    function calculateTotalLine(index) {
        const qtyLine = document.getElementById(`quantity${index}`);
        const priceLine = document.getElementById(`price${index}`);
        const result = Utils.parseFloatSafe(Utils.removeCommas(qtyLine.value)) * Utils.parseFloatSafe(Utils.removeCommas(priceLine.value));

        calculateTotal();
        $(`#total${index}`).val(Utils.formatCurrency(result));
        updateField(index, 'total', Utils.parseFloatSafe(Utils.removeCommas(Utils.formatCurrency(result))));
    }

    function selectType(params) {
        coType = params;

        $('#ppn_percentage_option').val('Select a VAT');

        if (params == "SUB_BUDGET_BASE") {
            $(".productField").hide();
            $(".subBudgetField").show();
        } else {
            $(".productField").show();
            $(".subBudgetField").hide();
        }
    }

    function selectPercentageVAT(params) {
        coRatio = params.value;

        const tableTotal = document.getElementById("table_total");
        const resultVAT = (Utils.parseFloatSafe(params.value) / 100) * Utils.parseFloatSafe(Utils.removeCommas(tableTotal.textContent));
        const resultGrandTotal = resultVAT + Utils.parseFloatSafe(Utils.removeCommas(tableTotal.textContent));

        $("#table_total_vat").text(Utils.formatCurrency(Utils.parseFloatSafe(resultVAT)));
        $("#table_grand_total").text(Utils.formatCurrency(Utils.parseFloatSafe(resultGrandTotal)));
    }

    function selectVAT(params) {
        coVat = params.value;

        if (params.value == "NO") {
            coRatio = 0;

            $('#ppn_percentage_container').css('display', 'none');
            $('#ppn_percentage_option').val('Select a VAT');
        } else {
            $('#ppn_percentage_container').css('display', 'flex');
        }

        calculateTotal();
    }

    function addRow() {
        if (customerOrderType.value == "SUB_BUDGET_BASE") {
            dataAddManual.push({
                recordID: "",
                entities: {
                    combinedBudgetSection_RefID: "",
                    combinedBudgetSectionName: "",
                    value: "",
                    notes: "",
                    isDefault: true
                }
            });
        } else {
            dataAddManual.push({
                recordID: "",
                entities: {
                    combinedBudgetSection_RefID: "",
                    combinedBudgetSectionName: "",
                    product_RefID: "",
                    product_name: "",
                    work_RefID: "",
                    work_name: "",
                    uom_RefID: "",
                    uom_name: "",
                    quantity: "",
                    price: "",
                    total: "",
                    notes: "",
                    isDefault: true
                }
            });
        }

        renderTable();
    }

    function removeRow(index) {
        dataAddManual.splice(index, 1);
        renderTable();
    }

    function updateField(index, field, value) {
        dataAddManual[index].entities[field] = value;

        calculateTotal();
        console.log("Updated:", dataAddManual); // untuk debugging
    }

    function renderTable() {
        const tbody = document.getElementById("table_tbody_add_manually");
        tbody.innerHTML = "";

        dataAddManual.forEach((row, index) => {
            const tr = document.createElement("tr");
            if (customerOrderType.value == "SUB_BUDGET_BASE") {
                if (index === dataAddManual.length - 1) {
                    tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON PLUS -->
                            <div class="icon-plus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;
                                display:${index === dataAddManual.length - 1 ? 'flex' : 'none !important'};"
                                onclick="addRow()">
                                <i class="fas fa-plus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                `;
                } else {
                    tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON MINUS -->
                            <div class="icon-minus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;display:${index === dataAddManual.length - 1 ? 'none !important' : 'flex'};"
                                onclick="removeRow(${index})">
                                <i class="fas fa-minus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" style="cursor:pointer;">
                                    <a href="javascript:;" data-toggle="modal" data-target="#mySites" onclick="pickSubBudget(${index})" style="color: #000;">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" id="combinedBudgetSection_RefID${index}" value="${row.entities.combinedBudgetSection_RefID}">
                            <input type="text" id="combinedBudgetSectionName${index}" class="form-control" readonly value="${row.entities.combinedBudgetSectionName}" onchange="updateField(${index}, 'combinedBudgetSectionName', this.value)" style="background-color: ${row.entities.combinedBudgetSectionName ? '#e9ecef' : 'white'};">
                        </div>
                    </td>
                    <td>
                        <input type="text" id="value${index}" class="form-control form-control number-without-negative" value="${row.entities.value ? Utils.formatCurrency(row.entities.value) : row.entities.value}" onkeyup="calculateTotal()" onchange="updateField(${index}, 'value', parseFloat(this.value.replace(/,/g, '')))">
                    </td>
                    <td>
                        <textarea id="notes${index}" class="form-control" onchange="updateField(${index}, 'notes', this.value)">${row.entities.notes}</textarea>
                    </td>
                `;
                }
            } else {
                if (index === dataAddManual.length - 1) {
                    tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON PLUS -->
                            <div class="icon-plus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;
                                display:${index === dataAddManual.length - 1 ? 'flex' : 'none !important'};"
                                onclick="addRow()">
                                <i class="fas fa-plus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                `;
                } else {
                    tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON MINUS -->
                            <div class="icon-minus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;display:${index === dataAddManual.length - 1 ? 'none !important' : 'flex'};"
                                onclick="removeRow(${index})">
                                <i class="fas fa-minus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" style="cursor:pointer;">
                                    <a href="javascript:;" data-toggle="modal" data-target="#mySites" onclick="pickSubBudget(${index})" style="color: #000;">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" id="combinedBudgetSection_RefID${index}" value="${row.entities.combinedBudgetSection_RefID}">
                            <input type="text" id="combinedBudgetSectionName${index}" class="form-control" readonly value="${row.entities.combinedBudgetSectionName}" onchange="updateField(${index}, 'combinedBudgetSectionName', this.value)" style="background-color: ${row.entities.combinedBudgetSectionName ? '#e9ecef' : 'white'}; border: ${row.entities.combinedBudgetSection_RefID ? '1px solid #ced4da' : '1px solid red'}">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" style="cursor:pointer;">
                                    <a href="javascript:;" data-toggle="modal" data-target="#myWorks" onclick="pickWork(${index})" style="color: #000;">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" id="work_RefID${index}" value="${row.entities.work_RefID}">
                            <input type="text" id="work_name${index}" class="form-control" readonly value="${row.entities.work_name}" onchange="updateField(${index}, 'work_name', this.value)" style="background-color: ${row.entities.work_name ? '#e9ecef' : 'white'}; border: ${row.entities.work_RefID ? '1px solid #ced4da' : '1px solid red'}">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" style="cursor:pointer;">
                                    <a href="javascript:;" data-toggle="modal" data-target="#myProductss" onclick="pickProduct(${index})" style="color: #000;">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" id="product_RefID${index}" value="${row.entities.product_RefID}">
                            <input type="text" id="product_name${index}" class="form-control" readonly value="${row.entities.product_name}" onchange="updateField(${index}, 'product_name', this.value)" style="background-color: ${row.entities.product_name ? '#e9ecef' : 'white'}; border: ${row.entities.product_RefID ? '1px solid #ced4da' : '1px solid red'}">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" style="cursor:pointer;">
                                    <a href="javascript:;" data-toggle="modal" data-target="#myUom" onclick="pickUom(${index})" style="color: #000;">
                                        <i class="fas fa-gift"></i>
                                    </a>
                                </span>
                            </div>
                            <input type="hidden" id="uom_RefID${index}" value="${row.entities.uom_RefID}">
                            <input type="text" id="uom_name${index}" class="form-control" readonly value="${row.entities.uom_name}" onchange="updateField(${index}, 'uom_name', this.value)" style="background-color: ${row.entities.uom_name ? '#e9ecef' : 'white'}; border: ${row.entities.uom_RefID ? '1px solid #ced4da' : '1px solid red'}">
                        </div>
                    </td>
                    <td>
                        <input type="text" id="quantity${index}" class="form-control form-control number-without-negative" value="${row.entities.quantity ? Utils.formatCurrency(row.entities.quantity) : row.entities.quantity}" onkeyup="calculateTotalLine(${index})" onkeydown="calculateTotalLine(${index})" onchange="updateField(${index}, 'quantity', parseFloat(this.value.replace(/,/g, '')))">
                    </td>
                    <td>
                        <input type="text" id="price${index}" class="form-control form-control number-without-negative" value="${row.entities.price ? Utils.formatCurrency(row.entities.price) : row.entities.price}" onkeyup="calculateTotalLine(${index})" onkeydown="calculateTotalLine(${index})" onchange="updateField(${index}, 'price', parseFloat(this.value.replace(/,/g, '')))">
                    </td>
                    <td>
                        <input type="text" id="total${index}" class="form-control form-control number-without-negative" value="${row.entities.total ? Utils.formatCurrency(row.entities.total) : row.entities.total}" onchange="updateField(${index}, 'total', parseFloat(this.value.replace(/,/g, '')))" disabled>
                    </td>
                    <td style="padding-right: 0.3rem;">
                        <textarea id="notes${index}" class="form-control" onchange="updateField(${index}, 'notes', this.value)">${row.entities.notes}</textarea>
                    </td>
                `;
                }
            }

            tbody.appendChild(tr);
        });

        calculateTotal();
    }

    function findByCode(codeToFind) {
        const normalizeString = (str) => {
            return str
                .toLowerCase()                   // Mengubah menjadi lowercase
                .trim()                           // Menghapus spasi ekstra
                .replace(/[^\w\s]/g, '');         // Menghapus simbol selain huruf dan angka
        };

        return data.find(item => item.code == codeToFind);
        // return data.find(item => normalizeString(item.code) == normalizeString(codeToFind));
    }

    function findSubBudgetByCode(codeToFind) {
        return dataSubBudget.find(item => item.Code == codeToFind);
    }

    function findWorkByCode(codeToFind) {
        return dataWorks.find(item => item.code == codeToFind);
    }

    function findProductByCode(codeToFind) {
        return dataProducts.find(item => item.code == codeToFind);
    }

    function findUomByName(nameToFind) {
        return dataUom.find(item => item.name == nameToFind);
    }

    function pickSubBudget(index) {
        indexSubBudget = index;
    }

    function pickProduct(index) {
        indexProduct = index;
    }

    function pickUom(index) {
        indexUom = index;
    }

    function pickWork(index) {
        indexWork = index;
    }

    function customerOrderDetail(dataDetail) {
        if (customerOrderType.value === "SUB_BUDGET_BASE") {
            dataDetail.forEach(element => {
                dataAddManual.push({
                    recordID: element.Sys_ID,
                    entities: {
                        combinedBudgetSection_RefID: element.CombinedBudgetSection_RefID,
                        combinedBudgetSectionName: `${element.CombinedBudgetSectionCode} - ${element.CombinedBudgetSectionName}`,
                        value: element.Value,
                        notes: element.Notes,
                    }
                });
            });
        } else {
            dataDetail.forEach(element => {
                dataAddManual.push({
                    recordID: element.Sys_ID,
                    entities: {
                        combinedBudgetSection_RefID: element.CombinedBudgetSection_RefID,
                        combinedBudgetSectionName: `${element.CombinedBudgetSectionCode} - ${element.CombinedBudgetSectionName}`,
                        product_RefID: element.Product_RefID,
                        product_name: `${element.ProductCode} - ${element.ProductName}`,
                        work_RefID: element.Work_RefID,
                        work_name: `${element.WorkCode} - ${element.WorkName}`,
                        uom_RefID: element.QuantityUnit_RefID,
                        uom_name: `${element.UomCode} - ${element.UomName}`,
                        quantity: element.Quantity,
                        price: element.ProductUnitPriceCurrencyValue,
                        total: element.Quantity * element.ProductUnitPriceCurrencyValue,
                        notes: element.Notes
                    }
                });
            });
        }

        addRow();
        getCustomSites(dataDetail[0].CombinedBudget_RefID);
    }

    function revisionForm() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'PUT',
            url: '{!! route("CustomerOrder.update", $customerOrder_RefID) !!}',
            data: {
                // workFlowPath_RefID: dataWorkflow.workFlowPathRefID,
                // approverEntity: dataWorkflow.approverEntityRefID,
                comment: dataWorkflow.comment,
                storeData: {
                    coVat: coVat,
                    coRatio: coRatio,
                    coType: coType,
                    combinedBudgetRefID: budgetID.value,
                    currencyRefID: currencyID.value,
                    logFileUploadPointerRefID: fileID.value,
                    customerOrderDetail: JSON.stringify(dataAddManual.filter(val => val.entities.combinedBudgetSection_RefID))
                }
            },
            success: function (res) {
                HideLoading();

                if (res.status == 200) {
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
                        cancelForm("{{ route('CustomerOrder.index', ['var' => 1]) }}");
                    });
                } else {
                    ErrorNotif("Revision Customer Order Failed");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                HideLoading();
                ErrorNotif("Internal Server Error");
            }
        });
    }

    function commentWorkflow() {
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
                dataWorkflow.comment = result.value;
                ShowLoading();
                revisionForm();
            }
        });
    }

    function validationForm() {
        let isValid = true;
        const isBudgetIDNotEmpty = budgetID.value.trim() !== '';
        const isCurrencyIDNotEmpty = currencyID.value.trim() !== '';

        if (
            isBudgetIDNotEmpty &&
            isCurrencyIDNotEmpty
        ) {
            if (isValid) {
                commentWorkflow();
            }
        } else {
            if (
                !isBudgetIDNotEmpty &&
                !isCurrencyIDNotEmpty
            ) {
                $("#project_name").css("border", "1px solid red");
                $("#currency_name").css("border", "1px solid red");

                $("#project_message").show();
                $("#currency_message").show();
                return;
            }
            if (!isBudgetIDNotEmpty) {
                $("#project_name").css("border", "1px solid red");
                $("#project_message").show();
                return;
            }
            if (!isCurrencyIDNotEmpty) {
                $("#currency_name").css("border", "1px solid red");
                $("#currency_message").show();
                return;
            }
        }
    }

    function getCustomSites(Project_RefID) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getNewSite") !!}?project_code=' + Project_RefID,
        })
            .done(function (response) {
                let data = response[0] ? response : [];
                dataSubBudget = data;

                $('#tableSites').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return '<input id="sys_id_site' + (meta.row + 1) + '" value="' + data.Sys_ID + '" data-trigger="sys_id_site" type="hidden">' + (meta.row + 1)
                            }
                        },
                        {
                            data: 'Code',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        },
                        {
                            data: 'Name',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $("#loadingSites").hide();
            });
    }

    function getCustomProducts() {
        $(".loadingGetModalProductss").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getProduct") !!}',
        })
            .done(function (response) {
                let data = response.data.data ? response.data.data : [];
                dataProducts = data;

                $('#tableGetProductss').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return '<td class="align-middle text-center">' +
                                    '<input id="sys_id_product' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_product" type="hidden">' +
                                    (meta.row + 1) +
                                    '</td>';
                            }
                        },
                        {
                            data: 'code',
                            defaultContent: '-',
                            className: "align-middle"
                        },
                        {
                            data: 'name',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        },
                        {
                            data: 'quantityUnitName',
                            defaultContent: '-',
                            className: "align-middle"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $(".loadingGetModalProductss").hide();
            });
    }

    function getCustomWorks() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getWorks") !!}',
        })
            .done(function (response) {
                const data = response && response[0] ? response : [];
                dataWorks = data;

                $('#tableWorks').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return '<input id="sys_id_work' + (meta.row + 1) + '" value="' + data.id + '" data-trigger="sys_id_work" type="hidden">' + (meta.row + 1)
                            }
                        },
                        {
                            data: 'code',
                            defaultContent: '-',
                            className: "align-middle"
                        },
                        {
                            data: 'name',
                            defaultContent: '-',
                            className: "align-middle"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $("#loadingGetModalWorks").hide();
            });
    }

    function getCustomUom() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("getQuantityUnit") !!}',
        })
            .done(function (response) {
                const data = response.data && response.data[0] ? response.data : [];
                dataUom = data;

                $('#tableGetUom').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return '<input id="sys_id_uom' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_uom" type="hidden">' + (meta.row + 1)
                            }
                        },
                        {
                            data: 'name',
                            defaultContent: '-',
                            className: "align-middle"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $("#loadingGetModalUom").hide();
            });
    }

    function getVAT() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getVAT") !!}',
            success: function (data) {
                if (data && Array.isArray(data)) {
                    $('#ppn_percentage_option').empty();
                    $('#ppn_percentage_option').append('<option disabled selected value="Select a VAT">Select a VAT</option>');

                    data.forEach(function (project) {
                        let isSelected = parseFloat(project.tariffFixRate) == parseFloat(vatRatio.value) ? ' selected ' : ' ';
                        $('#ppn_percentage_option').append('<option' + isSelected + 'value="' + project.tariffFixRate + '">' + project.tariffFixRate + '</option>');
                    });

                    calculateTotal();
                } else {
                    console.log('Data vat not found.');
                }
            },
            error: function (textStatus, errorThrown) {
                console.log('Function getVAT error: ', textStatus, errorThrown);
            }
        });
    }

    $('#tableSites').on('click', 'tbody tr', function () {
        if (indexSubBudget === null) return;

        const sysId = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode = $(this).find('td:nth-child(2)').text();
        const siteName = $(this).find('td:nth-child(3)').text();

        const findData = dataAddManual.find(val => val.entities.combinedBudgetSection_RefID == sysId);

        if (findData) {
            ErrorHandler.notifToast(
                'error',
                'The Sub Budget already exists. Please select a different Sub Budget.',
                'Error!'
            );
        } else {
            $(`#combinedBudgetSection_RefID${indexSubBudget}`).val(sysId);
            $(`#combinedBudgetSectionName${indexSubBudget}`).val(`${siteCode} - ${siteName}`);
            $(`#combinedBudgetSectionName${indexSubBudget}`).css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

            updateField(indexSubBudget, 'combinedBudgetSection_RefID', sysId);
            updateField(indexSubBudget, 'combinedBudgetSectionName', `${siteCode} - ${siteName}`);

            $('#mySites').modal('toggle');
        }
    });

    $('#tableGetProductss tbody').on('click', 'tr', function () {
        if (indexProduct === null) return;

        const table = $('#tableGetProductss').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            $("#myProductss").modal('toggle');

            const productRefID = dataRow.sys_ID;
            const productCode = dataRow.code;
            const productName = dataRow.name;

            $(`#product_RefID${indexProduct}`).val(productRefID);
            $(`#product_name${indexProduct}`).val(`${productCode ?? ''} - ${productName ?? ''}`);
            $(`#product_name${indexProduct}`).css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

            updateField(indexProduct, 'product_RefID', productRefID);
            updateField(indexProduct, 'product_name', `${productCode ?? ''} - ${productName ?? ''}`);
        }
    });

    $('#tableGetUom').on('click', 'tbody tr', async function () {
        if (indexUom === null) return;

        const sysId = $(this).find('input[data-trigger="sys_id_uom"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $(`#uom_RefID${indexUom}`).val(sysId);
        $(`#uom_name${indexUom}`).val(name);
        $(`#uom_name${indexUom}`).css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

        updateField(indexUom, 'uom_RefID', sysId);
        updateField(indexUom, 'uom_name', name);

        $('#myUom').modal('toggle');
    });

    $('#tableWorks tbody').on('click', 'tr', function () {
        if (indexWork === null) return;

        const table = $('#tableWorks').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            $("#myWorks").modal('toggle');

            const workRefID = dataRow.id;
            const workCode = dataRow.code;
            const workName = dataRow.name;

            $(`#work_RefID${indexWork}`).val(workRefID);
            $(`#work_name${indexWork}`).val(`${workCode ?? ''} - ${workName ?? ''}`);
            $(`#work_name${indexWork}`).css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

            updateField(indexWork, 'work_RefID', workRefID);
            updateField(indexWork, 'work_name', `${workCode ?? ''} - ${workName ?? ''}`);
        }
    });

    $('#customerOrderListTable').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_customer_order"]').val();
        const status = $(this).find('input[data-trigger="workflow_status_customer_order"]').val();
        const trano = $(this).find('td:nth-child(2)').text();

        $(`#modal_customer_order_id`).val(sysId);
        $(`#modal_customer_order_document_number`).val(trano);
        $(`#modal_customer_order_document_number`).css({ 'border': '1px solid #ced4da', 'background-color': '#e9ecef' });

        $('#customerOrderRevisionModal').modal('toggle');
        $('#customerOrderModal').modal('toggle');
    });

    $('#revision_customer_order').on('click', function (e) {
        getCustomerOderList();
    });

    $('#modal_customer_order_document_number_icon').on('click', function () {
        $('#customerOrderRevisionModal').modal('toggle');
        $('#customerOrderModal').modal('toggle');
    });

    $(document).ready(function () {
        getVAT();
        getCustomUom();
        getCustomWorks();
        getCustomProducts();
        customerOrderDetail(dataTable);
        selectType(customerOrderType.value);
    });
</script>