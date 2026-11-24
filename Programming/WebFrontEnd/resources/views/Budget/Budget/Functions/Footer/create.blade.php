<script>
    let dataSubBudget = [];
    let dataProducts = [];
    let dataWorks = [];
    let dataCurrencies = [];
    let dataExcel = [];
    let dataTimelineDate = [];
    let indexSubBudget = null;
    let indexWork = null;
    let indexProduct = null;
    let indexCurrency = null;
    let indexStartDate = null;
    const budgetID = document.getElementById('budget_id');
    const ctx = document.getElementById('myChart');
    const documentTypeRefID = {!! json_encode($documentTypeRefID ?? '') !!};
    const defaultRow = {
        entities: {
            combinedBudgetSection_RefID: '',
            combinedBudgetSectionCode: '',
            combinedBudgetSectionName: '',
            work_RefID: '',
            workCode: '',
            workName: '',
            product_RefID: '',
            productCode: '',
            productName: '',
            currency_RefID: '',
            currrencyISOCode: '',
            currencyName: '',
            currencyExchangeRate: '',
            quantityUnit_RefID: '',
            qty: '',
            price: '',
            total: '',
            isDefault: true
        }
    };

    function getDefaultRow() {
        return JSON.parse(JSON.stringify(defaultRow));
    }

    function addRow() {
        dataExcel.push(getDefaultRow());

        renderBudgetTable();
    }

    function removeRow(index) {
        dataExcel.splice(index, 1);
        renderBudgetTable();
    }

    function updateField(index, field, value) {
        dataExcel[index].entities[field] = value;

        console.log("Updated:", dataExcel); // untuk debugging
    }

    function findSubBudgetByCode(codeToFind) {
        return dataSubBudget.find(item => item.Code == codeToFind);
    }

    function findWorkByCode(codeToFind) {
        return dataWorks.find(item => item.additionalData.code == codeToFind);
    }

    function findProductByCode(codeToFind) {
        return dataProducts.find(item => item.code == codeToFind);
    }

    function findCurrencyByISOCode(codeToFind) {
        return dataCurrencies.find(item => item.ISOCode == codeToFind);
    }

    function findTimelineDateByCode(codeToFind) {
        return dataTimelineDate.find(item => item && item.code == codeToFind);
    }

    function pickSubBudget(index) {
        indexSubBudget = index;
    }

    function pickWork(index) {
        indexWork = index;
    }

    function pickProduct(index) {
        indexProduct = index;
    }

    function pickCurrency(index) {
        indexCurrency = index;
    }

    function pickStartDate(index) {
        indexCurrency = index;
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
        let table = $('#tableWorks').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            info: true,
            paging: true,
            searching: true,
            lengthChange: true,
            pageLength: 10,
            ajax: {
                url: '{!! route("Work.picklist") !!}',
                type: 'GET',
                data: function (d) {
                    // d.combinedBudgetCode = combinedBudgetCode;
                    // d.combinedBudgetSectionCode = combinedBudgetSectionCode;

                    return d;
                },
                dataSrc: function (json) {
                    dataWorks = json.data;

                    // wajib return data untuk DataTable
                    return json.data;
                },
                beforeSend: function () {
                    $('#tableWorks tbody').empty();
                    $("#loadingGetModalWorks").show();
                },
                complete: function () {
                    $("#loadingGetModalWorks").hide();
                },
                error: function (xhr, error, thrown) {
                    $("#loadingGetModalWorks").hide();
                }
            },
            columns: [
                {
                    data: null,
                    render: function (data, type, row, meta) {
                        return '<input id="sys_id_work' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_work" type="hidden">' + (meta.row + 1)
                    }
                },
                {
                    data: null,
                    defaultContent: '-',
                    className: "align-middle text-nowrap",
                    render: function (data, type, row, meta) {
                        return data.additionalData.code
                    }
                },
                {
                    data: 'sys_Text',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                }
            ],
            initComplete: function () {
                let api = this.api();

                let $filter = $('#tableWorks_filter');
                let $searchLabel = $filter.find('label');
                let $searchInput = $filter.find('input');

                $searchLabel.css('margin-bottom', '0');
                $searchInput
                    .attr('placeholder', 'Search...')
                    .off('.DT')
                    .on('keypress', function (e) {
                        if (e.which === 13) {
                            api.search(this.value).draw();
                        }
                    });

                if ($('#searchHintWork').length === 0) {
                    $filter.append(
                        '<small id="searchHintWork" class="form-text text-muted" style="margin-bottom: .5rem;">' +
                        'Press <strong>Enter</strong> to start searching.' +
                        '</small>'
                    );
                }
            }
        });
    }

    function getCustomCurrencies() {
        $(".loadingCurrencies").show();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getCurrency") !!}',
        })
            .done(function (response) {
                let data = response.data ? response.data : [];
                dataCurrencies = data;

                $('#tableCurrencies').DataTable({
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
                                    '<input id="sys_id_currencies' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_currencies" type="hidden">' +
                                    (meta.row + 1) +
                                    '</td>';
                            }
                        },
                        {
                            data: 'ISOCode',
                            defaultContent: '-',
                            className: "align-middle"
                        },
                        {
                            data: 'name',
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
                $(".loadingCurrencies").hide();
            });
    }

    function getBudgetProgress(combinedBudgetRefID, combinedBudgetCode, combinedBudgetName) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("BudgetProgress.lastWeekAvailable") !!}',
            data: {
                record_id: combinedBudgetRefID
            },
            success: function (response) {
                if (response.status === 200 && response.isAvailable) {
                    $("#budget_id").val(combinedBudgetRefID);
                    $("#budget_code").val(combinedBudgetCode);
                    $("#budget_name").val(combinedBudgetName);
                    $("#budget_preview").val(`${combinedBudgetCode} - ${combinedBudgetName}`);
                    $("#budget_preview").css('background-color', '#e9ecef');

                    $("#type_import_from_excel").prop("disabled", false);
                    $("#type_add_manually").prop("disabled", false);

                    $("#myProjectsTrigger").prop("disabled", true);
                    $("#myProjectsTrigger").css("cursor", "not-allowed");

                    $("#excel_file").prop("disabled", false);
                    $("#uploadBudgetFile").css("cursor", "pointer");

                    getCustomSites(combinedBudgetRefID);

                    getCustomWorks();
                } else {
                    Swal.fire("Error", "Budget progress from last week has not been entered yet", "error");
                }

                $("#budget_icon").show();
                $("#budget_loading").hide();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);
            }
        });
    }

    function workflowValidate(combinedBudgetRefID, combinedBudgetCode, combinedBudgetName) {
        $.ajax({
            type: 'GET',
            url: '{!! route("Workflow.UserAllowedToSubmit") !!}',
            data: {
                businessDocumentType_RefID: documentTypeRefID,
                combinedBudget_RefID: combinedBudgetRefID
            },
            success: function (response) {
                if (response.status === 200 && !response.data[0].signAccess) {
                    // getBudgetProgress(combinedBudgetRefID, combinedBudgetCode, combinedBudgetName);

                    $("#budget_id").val(combinedBudgetRefID);
                    $("#budget_code").val(combinedBudgetCode);
                    $("#budget_name").val(combinedBudgetName);
                    $("#budget_preview").val(`${combinedBudgetCode} - ${combinedBudgetName}`);
                    $("#budget_preview").css('background-color', '#e9ecef');

                    $("#type_import_from_excel").prop("disabled", false);
                    $("#type_add_manually").prop("disabled", false);

                    $("#myProjectsTrigger").prop("disabled", true);
                    $("#myProjectsTrigger").css("cursor", "not-allowed");

                    $("#excel_file").prop("disabled", false);
                    $("#uploadBudgetFile").css("cursor", "pointer");

                    getCustomSites(combinedBudgetRefID);

                    getCustomWorks();
                } else {
                    // $("#budget_icon").show();
                    // $("#budget_loading").hide();

                    Swal.fire("Error", "You are not included in this budget", "error");
                }

                $("#budget_icon").show();
                $("#budget_loading").hide();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('jqXHR, textStatus, errorThrown', jqXHR, textStatus, errorThrown);
                Swal.fire("Error", "Data Error", "error");

                $("#budget_loading").css({ "display": "none" });
                $("#myProjectSecondTrigger").css({ "display": "block" });
            }
        });
    }

    function renderTimeline() {
        $('#table_timeline tbody').empty();

        const groupingDataExcelByWork = dataExcel.reduce((acc, currentItem) => {
            const validateSubBudgetValue = findSubBudgetByCode(currentItem.entities.combinedBudgetSectionCode);
            const validateValue = findWorkByCode(currentItem.entities.workCode);

            const isSubBudgetExist = acc.some(
                item => item.entities.combinedBudgetSectionCode === currentItem.entities.combinedBudgetSectionCode
            );

            const isExist = acc.some(
                item => item.entities.workCode === currentItem.entities.workCode
            );

            if (!isSubBudgetExist && !isExist && validateSubBudgetValue && validateValue) {
                acc.push(currentItem);
            }

            return acc;
        }, []);

        groupingDataExcelByWork.forEach((row, index) => {
            const findDate = findTimelineDateByCode(row.entities.workCode);

            let componentStartDate = `
                <input type="text" class="form-control datetimepicker-input" name="dateStart" id="dateStart${index}" onkeydown="return false" data-target="#dateTimelineStart${index}" autocomplete="off" style="border-radius: unset;" />
            `;

            let componentEndDate = `
                <input type="text" class="form-control datetimepicker-input" name="dateEnd" id="dateEnd${index}" onkeydown="return false" data-target="#dateTimelineEnd${index}" autocomplete="off" style="border-radius: unset;" />
            `;

            if (findDate) {
                componentStartDate = `
                    <input type="text" class="form-control datetimepicker-input" name="dateStart" id="dateStart${index}" onkeydown="return false" data-target="#dateTimelineStart${index}" value="${findDate.start}" autocomplete="off" style="border-radius: unset; background-color: #E9ECEF;" />
                `;

                componentEndDate = `
                    <input type="text" class="form-control datetimepicker-input" name="dateEnd" id="dateEnd${index}" onkeydown="return false" data-target="#dateTimelineEnd${index}" value="${findDate.end}" autocomplete="off" style="border-radius: unset; background-color: #E9ECEF;" />
                `;
            }

            $('#table_timeline tbody').append(`
                <tr>
                    <td style="padding: 5px;">
                        <input id="timeline_sub_budget${index}" style="border-radius:0;" class="form-control" readonly value="${row.entities.combinedBudgetSectionCode} - ${row.entities.combinedBudgetSectionName}" />
                    </td><td style="padding: 5px;">
                        <input id="timeline_work_name${index}" style="border-radius:0;" class="form-control" readonly value="${row.entities.workCode} - ${row.entities.workName}" />
                    </td>
                    <td style="padding: 5px;">
                        <div class="input-group date" id="dateTimelineStart${index}" data-target-input="nearest" style="flex-wrap: nowrap;">
                            <div>
                                <div class="input-group-append" data-target="#dateTimelineStart${index}" data-toggle="datetimepicker" style="width: 27.78px; height: 21.8px;">
                                    <div class="input-group-text" style="border-radius: unset; justify-content: center; width: inherit;">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div style="flex: 100%;">
                                ${componentStartDate}
                            </div>
                        </div>
                    </td>
                    <td style="padding: 5px;">
                        <div class="input-group date" id="dateTimelineEnd${index}" data-target-input="nearest" style="flex-wrap: nowrap;">
                            <div>
                                <div class="input-group-append" data-target="#dateTimelineEnd${index}" data-toggle="datetimepicker" style="width: 27.78px; height: 21.8px;">
                                    <div class="input-group-text" style="border-radius: unset; justify-content: center; width: inherit;">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div style="flex: 100%;">
                                ${componentEndDate}
                            </div>
                        </div>
                    </td>
                </tr>
            `);

            $(`#dateTimelineStart${index}`).datetimepicker({
                format: 'L',
                widgetPositioning: {
                    horizontal: 'auto',
                    vertical: 'bottom'
                }
            });

            $(`#dateTimelineStart${index}`).on('change.datetimepicker', function (e) {
                const dateTimelineStart = document.getElementById(`dateStart${index}`);

                if (dateTimelineStart.value) {
                    const existingIndex = dataTimelineDate.findIndex(item => item.code === row.entities.workCode);

                    if (existingIndex !== -1) {
                        dataTimelineDate[existingIndex].start = dateTimelineStart.value;
                    } else {
                        dataTimelineDate.push({
                            code: row.entities.workCode,
                            start: dateTimelineStart.value
                        });
                    }

                    $(`#dateStart${index}`).css({
                        "background-color": "#e9ecef",
                        "border": "1px solid #ced4da"
                    });
                }
            });

            $(`#dateTimelineEnd${index}`).datetimepicker({
                format: 'L',
                widgetPositioning: {
                    horizontal: 'auto',
                    vertical: 'bottom'
                }
            });

            $(`#dateTimelineEnd${index}`).on('change.datetimepicker', function (e) {
                const dateTimelineEnd = document.getElementById(`dateEnd${index}`);

                if (dateTimelineEnd.value) {
                    const existingIndex = dataTimelineDate.findIndex(item => item.code === row.entities.workCode);

                    if (existingIndex !== -1) {
                        dataTimelineDate[existingIndex].end = dateTimelineEnd.value;
                    } else {
                        dataTimelineDate.push({
                            code: row.entities.workCode,
                            end: dateTimelineEnd.value
                        });
                    }

                    $(`#dateEnd${index}`).css({
                        "background-color": "#e9ecef",
                        "border": "1px solid #ced4da"
                    });
                }
            });
        })
    }

    function renderBudgetTable() {
        const tbody = document.getElementById("tbody_table_import_from_excel");
        tbody.innerHTML = "";

        dataExcel.forEach((row, index) => {
            const tr = document.createElement("tr");

            if (index === dataExcel.length - 1) {
                tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON PLUS -->
                            <div class="icon-plus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;
                                display:${index === dataExcel.length - 1 ? 'flex' : 'none !important'};"
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
                `;
            } else {
                tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON MINUS -->
                            <div class="icon-minus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;display:${index === dataExcel.length - 1 ? 'none !important' : 'flex'};"
                                onclick="removeRow(${index})">
                                <i class="fas fa-minus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td style="padding: 5px;">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" data-toggle="modal" data-target="#mySites" onclick="pickSubBudget(${index})">
                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box${index}">
                                </span>
                            </div>
                            <input type="hidden" id="combinedBudgetSection_RefID${index}" value="${row.entities.combinedBudgetSection_RefID}">
                            <input type="text" id="combinedBudgetSectionName${index}" class="form-control" readonly value="${row.entities.combinedBudgetSectionCode} - ${row.entities.combinedBudgetSectionName}" onchange="updateField(${index}, 'combinedBudgetSectionName', this.value)" style="background-color: ${row.entities.combinedBudgetSectionName ? '#e9ecef' : 'white'}; border: ${row.entities.combinedBudgetSection_RefID ? '1px solid #ced4da' : '1px solid red'}">
                        </div>
                    </td>
                    <td style="padding: 5px;">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" data-toggle="modal" data-target="#myWorks" onclick="pickWork(${index})">
                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box${index}">
                                </span>
                            </div>
                            <input type="hidden" id="work_RefID${index}" value="${row.entities.work_RefID}">
                            <input type="text" id="workName${index}" class="form-control" readonly value="${row.entities.workCode} - ${row.entities.workName}" onchange="updateField(${index}, 'workName', this.value)" style="background-color: ${row.entities.workName ? '#e9ecef' : 'white'}; border: ${row.entities.work_RefID ? '1px solid #ced4da' : '1px solid red'}">
                        </div>
                    </td>
                    <td style="padding: 5px;">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" data-toggle="modal" data-target="#myProductss" onclick="pickProduct(${index})">
                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box${index}">
                                </span>
                            </div>
                            <input type="hidden" id="product_RefID${index}" value="${row.entities.product_RefID}">
                            <input type="text" id="productName${index}" class="form-control" readonly value="${row.entities.productCode} - ${row.entities.productName}" onchange="updateField(${index}, 'productName', this.value)" style="background-color: ${row.entities.productName ? '#e9ecef' : 'white'}; border: ${row.entities.product_RefID ? '1px solid #ced4da' : '1px solid red'}">
                        </div>
                    </td>
                    <td style="padding: 5px;">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control" data-toggle="modal" data-target="#myCurrencies" onclick="pickCurrency(${index})">
                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box${index}">
                                </span>
                            </div>
                            <input type="hidden" id="currency_RefID${index}" value="${row.entities.currency_RefID}">
                            <input type="text" id="currencyName${index}" class="form-control" readonly value="${row.entities.currrencyISOCode} - ${row.entities.currencyName}" onchange="updateField(${index}, 'currencyName', this.value)" style="background-color: ${row.entities.currencyName ? '#e9ecef' : 'white'}; border: ${row.entities.currency_RefID ? '1px solid #ced4da' : '1px solid red'}">
                        </div>
                    </td>
                    <td style="padding: 5px;">
                        <div class="input-group">
                            <input
                                class="form-control number-without-negative"
                                id="qty${index}"
                                autocomplete="off"
                                style="border-radius:0px;"
                                value="${Utils.formatCurrency(row.entities.qty)}"
                                onchange="updateField(${index}, 'qty', Utils.removeCommas(this.value))"
                            />
                        </div>
                    </td>

                    <td style="padding: 5px;">
                        <div class="input-group">
                            <input
                                class="form-control number-without-negative"
                                id="price${index}"
                                autocomplete="off"
                                style="border-radius:0px;"
                                value="${Utils.formatCurrency(row.entities.price)}"
                                onchange="updateField(${index}, 'price', Utils.removeCommas(this.value))"
                            />
                        </div>
                    </td>

                    <td style="padding: 5px;">
                        <div class="input-group">
                            <input class="form-control number-without-negative" id="total${index}" autocomplete="off" style="border-radius:0px;" value="${Utils.formatCurrency(row.entities.total)}" />
                        </div>
                    </td>
                `;
            }

            tbody.appendChild(tr);

            $(`#qty${index}`).on('keyup', function () {
                const value = $(this).val().replace(/,/g, '');
                const priceValue = $(`#price${index}`).val().replace(/,/g, '');
                const total = parseFloat(value || 1) * parseFloat(priceValue || 1);

                $(`#total${index}`).val(Utils.formatCurrency(total));
                updateField(index, 'total', Number(total.toFixed(2)));
            });

            $(`#price${index}`).on('keyup', function () {
                const value = $(this).val().replace(/,/g, '');
                const qtyValue = $(`#qty${index}`).val().replace(/,/g, '');
                const total = parseFloat(value || 1) * parseFloat(qtyValue || 1);

                $(`#total${index}`).val(Utils.formatCurrency(total));
                updateField(index, 'total', Number(total.toFixed(2)));
            });
        });

        renderTimeline();
    }

    function showBudgetSummary() {
        let dataStore = [];
        const targetTable = document.getElementById('budget_summary_table').getElementsByTagName('tbody')[0];

        targetTable.innerHTML = '';

        for (let data of dataExcel) {
            if (
                data.entities.combinedBudgetSection_RefID &&
                data.entities.work_RefID &&
                data.entities.product_RefID &&
                data.entities.currency_RefID &&
                data.entities.qty &&
                data.entities.price
            ) {
                dataStore.push({
                    entities: {
                        version: 1,
                        combinedBudget_RefID: parseInt(budgetID.value),
                        combinedBudgetSection_RefID: parseInt(data.entities.combinedBudgetSection_RefID),
                        combinedBudgetSubSectionLevel1_RefID: null,
                        combinedBudgetSubSectionLevel2_RefID: null,
                        product_RefID: parseInt(data.entities.product_RefID),
                        description: data.entities.productName,
                        quantity: Utils.parseFloatSafe(data.entities.qty),
                        quantityUnit_RefID: parseInt(data.entities.quantityUnit_RefID),
                        unitPriceCurrency_RefID: parseInt(data.entities.currency_RefID),
                        unitPriceCurrencyValue: Utils.parseFloatSafe(data.entities.price),
                        unitPriceCurrencyExchangeRate: Utils.parseFloatSafe(data.entities.currencyExchangeRate),
                        work_RefID: parseInt(data.entities.work_RefID)
                    }
                });

                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td style="text-wrap: auto;line-height: normal; padding: 0.8rem 0.5rem;">${data.entities.combinedBudgetSectionCode} - ${data.entities.combinedBudgetSectionName}</td>
                    <td style="text-wrap: auto;line-height: normal; padding: 0.8rem 0.5rem;">${data.entities.workCode} - ${data.entities.workName}</td>
                    <td style="text-wrap: auto;line-height: normal; padding: 0.8rem 0.5rem;">${data.entities.productCode} - ${data.entities.productName}</td>
                    <td style="text-wrap: auto;line-height: normal; padding: 0.8rem 0.5rem;">${data.entities.currrencyISOCode} - ${data.entities.currencyName}</td>
                    <td style="padding: 0.8rem 0.5rem;">${Utils.formatCurrency(data.entities.qty)}</td>
                    <td style="padding: 0.8rem 0.5rem;">${Utils.formatCurrency(data.entities.price)}</td>
                    <td style="padding: 0.8rem 0.5rem;">${Utils.formatCurrency(data.entities.total)}</td>
                `;

                targetTable.appendChild(newRow);
            }
        }

        $('#data_store').val(JSON.stringify(dataStore));
    }

    function commentWorkflow() {
        $('#budget_summary_modal').modal('toggle');

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
                $("#workflow_comment").val(result.value);

                document.getElementById('budgetForm').requestSubmit();
            }
        });
    }

    function validateForm() {
        const findEmptyData = dataExcel.find(
            ({ entities }) =>
                !entities.isDefault &&
                (
                    !entities.combinedBudgetSection_RefID ||
                    !entities.currency_RefID ||
                    !entities.product_RefID ||
                    !entities.work_RefID ||
                    !entities.qty ||
                    !entities.price
                )
        );

        if (findEmptyData) {
            ErrorHandler.notifToast(
                'error',
                'Please review the highlighted fields (red border) and ensure all required values are filled in correctly before proceeding.',
                'Validation Error'
            );
        } else {
            showBudgetSummary();
            $('#budget_summary_modal').modal('toggle');
            // commentWorkflow();
        }
    }

    $('#budgetForm').on('submit', function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("Budget.store") !!}',
            data: $(this).serialize(),
            beforeSend: function () {
                Utils.showLoading();
            },
            success: function (response) {
                console.log('response', response);

                if (response.status == 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved.',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        cancelForm("{{ route('Budget.index') }}");
                    });
                } else {
                    ErrorNotif("Create Budget Failed");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.responseJSON);

                // Utils.hideLoading();

                // if (jqXHR.status === 422) {
                //     let errors = jqXHR.responseJSON.errors;

                //     $.each(errors, function (key, value) {
                //         // console.log(key + ': ' + value[0]);

                //         if (formList[key]) {
                //             ErrorHandler.showErrorInputMessage(formList[key].component, formList[key].containerMessageId, formList[key].messageId, value[0]);
                //         }
                //     });
                // }
            },
            complete: function (jqXHR, textStatus) {
                Utils.hideLoading();
            }
        });
    });

    $('#excel_file').on('change', function () {
        let fileName = this.files[0].name;
        $('#excel_name').val(fileName);
        $('#excel_name').css('background-color', '#e9ecef');
    });

    $('#uploadBudgetFile input[type=file]').on('change', function () {
        let formData = new FormData();
        formData.append("excel_file", this.files[0]);
        formData.append("_token", "{{ csrf_token() }}");

        $.ajax({
            url: "{{ route('Budget.Import') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (res) {
                $('#table_import_from_excel tbody').empty();

                res.rows.slice(1).forEach((row, index) => {
                    const validateSubBudget = findSubBudgetByCode(row[1]);
                    const validateWork = findWorkByCode(row[3]);
                    const validateProduct = findProductByCode(row[5]);
                    const validateCurrency = findCurrencyByISOCode(row[7]);

                    dataExcel.push({
                        entities: {
                            combinedBudgetSection_RefID: validateSubBudget ? validateSubBudget.Sys_ID : '',
                            combinedBudgetSectionCode: validateSubBudget ? validateSubBudget.Code : row[1],
                            combinedBudgetSectionName: validateSubBudget ? validateSubBudget.Name : row[2],
                            work_RefID: validateWork ? validateWork.sys_ID : '',
                            workCode: validateWork ? validateWork.additionalData.code : row[3],
                            workName: validateWork ? validateWork.sys_Text : row[4],
                            product_RefID: validateProduct ? validateProduct.sys_ID : '',
                            productCode: validateProduct ? validateProduct.code : row[5],
                            productName: validateProduct ? validateProduct.name : row[6],
                            currency_RefID: validateCurrency ? validateCurrency.sys_ID : '',
                            currrencyISOCode: validateCurrency ? validateCurrency.ISOCode : row[7],
                            currencyName: validateCurrency ? validateCurrency.name : row[8],
                            currencyExchangeRate: validateCurrency ? validateCurrency.exchangeRate : 0,
                            quantityUnit_RefID: validateProduct ? validateProduct.quantityUnit_RefID : '',
                            qty: row[9] > 0 ? Utils.parseFloatSafe(row[9]) : Utils.parseFloatSafe(0),
                            price: row[10] > 0 ? Utils.parseFloatSafe(row[10]) : Utils.parseFloatSafe(0),
                            total: row[11] > 0 ? Utils.parseFloatSafe(row[11]) : Utils.parseFloatSafe(0),
                            isDefault: false
                        }
                    });
                });

                dataExcel.push(getDefaultRow());

                renderBudgetTable();
            }
        });

        $("#excel_file").prop("disabled", true);
        $("#uploadBudgetFile").css("cursor", "not-allowed");
    });

    $('#budget_code_list_table').on('click', 'tbody tr', function () {
        const table = $('#budget_code_list_table').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const code = dataRow.code;
            const name = dataRow.name;

            $("#budget_icon").hide();
            $("#budget_loading").show();

            getCustomCurrencies();

            workflowValidate(id, code, name);
        }

        $("#budget_code_modal").modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function () {
        if (indexSubBudget === null) return;

        const sysId = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode = $(this).find('td:nth-child(2)').text();
        const siteName = $(this).find('td:nth-child(3)').text();

        $(`#combinedBudgetSection_RefID${indexSubBudget}`).val(sysId);
        $(`#combinedBudgetSectionName${indexSubBudget}`).val(`${siteCode} - ${siteName}`);
        $(`#combinedBudgetSectionName${indexSubBudget}`).css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

        updateField(indexSubBudget, 'combinedBudgetSection_RefID', sysId);
        updateField(indexSubBudget, 'combinedBudgetSectionCode', siteCode);
        updateField(indexSubBudget, 'combinedBudgetSectionName', siteName);

        renderBudgetTable();

        $('#mySites').modal('toggle');
    });

    $('#tableWorks tbody').on('click', 'tr', function () {
        if (indexWork === null) return;

        const table = $('#tableWorks').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            $("#myWorks").modal('toggle');

            const workRefID = dataRow.sys_ID;
            const workCode = dataRow.additionalData.code;
            const workName = dataRow.sys_Text;

            $(`#work_RefID${indexWork}`).val(workRefID);
            $(`#workName${indexWork}`).val(`${workCode ?? ''} - ${workName ?? ''}`);
            $(`#workName${indexWork}`).css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

            updateField(indexWork, 'work_RefID', workRefID);
            updateField(indexWork, 'workCode', workCode);
            updateField(indexWork, 'workName', workName);

            renderBudgetTable();
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
            const quantityUnitRefID = dataRow.quantityUnit_RefID;

            $(`#product_RefID${indexProduct}`).val(productRefID);
            $(`#productName${indexProduct}`).val(`${productCode ?? ''} - ${productName ?? ''}`);
            $(`#productName${indexProduct}`).css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

            updateField(indexProduct, 'quantityUnit_RefID', quantityUnitRefID);
            updateField(indexProduct, 'product_RefID', productRefID);
            updateField(indexProduct, 'productCode', productCode);
            updateField(indexProduct, 'productName', productName);
        }
    });

    $('#tableCurrencies tbody').on('click', 'tr', function () {
        if (indexCurrency === null) return;

        const table = $('#tableCurrencies').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const currencyRefID = dataRow.sys_ID;
            const currencyISOCode = dataRow.ISOCode;
            const currencyName = dataRow.name;
            const currencyExchangeRate = dataRow.exchangeRate || 0;

            if (currencyISOCode != "USD" && currencyISOCode != "IDR" && currencyISOCode != "EUR") {
                Swal.fire("Error", "Please Call Accounting Staffs to Input Current Exchange Rate. Thank You.", "error");

                return;
            } else {
                $(`#currency_RefID${indexCurrency}`).val(currencyRefID);
                $(`#currencyName${indexCurrency}`).val(`${currencyISOCode ?? ''} - ${currencyName ?? ''}`);
                $(`#currencyName${indexCurrency}`).css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

                updateField(indexCurrency, 'currency_RefID', currencyRefID);
                updateField(indexCurrency, 'currrencyISOCode', currencyISOCode);
                updateField(indexCurrency, 'currencyName', currencyName);
                updateField(indexCurrency, 'currencyExchangeRate', currencyExchangeRate);
            }

            $("#myCurrencies").modal('toggle');
        }
    });

    $(document).ready(function () {
        $("#excel_file").prop("disabled", true);
        $("#uploadBudgetFile").css("cursor", "not-allowed");

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [
                    {
                        label: '# of Votes',
                        data: [12, 50, 3, 5, 2, 3],
                        borderWidth: 1
                    },
                    {
                        label: '# of Testing',
                        data: [19, 3, 5, 2, 12, 3],
                        borderWidth: 1
                    },
                    {
                        label: '# of Hello',
                        data: [3, 12, 19, 5, 2, 3],
                        borderWidth: 1
                    },
                    {
                        label: '# of World',
                        data: [5, 2, 19, 3, 12, 3],
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Chart.js Line Chart'
                    }
                }
            }
        });

        getCustomProducts();
    });
</script>