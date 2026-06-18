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

    function findSubBudgetByCode(codeToFind) {
        return dataSubBudget.find(item => item.Code == codeToFind);
    }

    function findWorkByCode(codeToFind) {
        return dataWorks.find(item => item.code == codeToFind);
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
        $(".loadingGetModalWorks").show();

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
                let data = response[0] ? response : [];
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
                                return '<td class="align-middle text-center">' +
                                    '<input id="sys_id_work' + (meta.row + 1) + '" value="' + data.id + '" type="hidden">' +
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
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $(".loadingGetModalWorks").hide();
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

    function workflowValidate(combinedBudgetRefID, combinedBudgetCode, combinedBudgetName) {
        $.ajax({
            type: 'POST',
            url: '{!! route("Workflow.UserAllowedToSubmit") !!}',
            data: {
                businessDocumentType_RefID: '77000000000057',
                combinedBudget_RefID: combinedBudgetRefID
            },
            success: function (response) {
                if (response.status === 200 && response.data[0].signAccess) {
                    $("#project_id").val(combinedBudgetRefID);
                    $("#project_name").val(`${combinedBudgetCode} - ${combinedBudgetName}`);
                    $("#project_name").css('background-color', '#e9ecef');

                    $("#type_import_from_excel").prop("disabled", false);
                    $("#type_add_manually").prop("disabled", false);

                    $("#myProjectsTrigger").prop("disabled", true);
                    $("#myProjectsTrigger").css("cursor", "not-allowed");

                    $("#excel_file").prop("disabled", false);
                    $("#uploadBudgetFile").css("cursor", "pointer");

                    getCustomSites(combinedBudgetRefID);

                    getCustomWorks();
                } else {
                    Swal.fire("Error", "You are not included in this budget", "error");
                }

                $("#iconBudget").show();
                $("#loadingBudget").hide();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('jqXHR, textStatus, errorThrown', jqXHR, textStatus, errorThrown);
                Swal.fire("Error", "Data Error", "error");

                $("#loadingBudget").css({ "display": "none" });
                $("#myProjectSecondTrigger").css({ "display": "block" });
            }
        });
    }

    function showTimeline() {
        $('#table_timeline tbody').empty();

        const groupingDataExcelByWork = dataExcel.reduce((acc, currentItem) => {
            const key = currentItem[3];
            const validateValue = findWorkByCode(currentItem[3]);

            if (!acc[key] && validateValue) {
                acc[key] = currentItem;
            }

            return acc;
        }, {});

        Object.values(groupingDataExcelByWork).forEach((row, index) => {
            const findDate = findTimelineDateByCode(row[3]);

            let componentStartDate = `
                <input type="text" class="form-control datetimepicker-input" name="dateCommance" id="dateCommance${index}" onkeydown="return false" data-target="#dateOfDelivery${index}" autocomplete="off" style="border-radius: unset;" />
            `;

            let componentEndDate = `
                <input type="text" class="form-control datetimepicker-input" name="dateCommanceEnd" id="dateCommanceEnd${index}" onkeydown="return false" data-target="#dateOfDeliveryEnd${index}" autocomplete="off" style="border-radius: unset;" />
            `;

            if (findDate) {
                componentStartDate = `
                    <input type="text" class="form-control datetimepicker-input" name="dateCommance" id="dateCommance${index}" onkeydown="return false" data-target="#dateOfDelivery${index}" value="${findDate.start}" autocomplete="off" style="border-radius: unset; background-color: #E9ECEF;" />
                `;

                componentEndDate = `
                    <input type="text" class="form-control datetimepicker-input" name="dateCommanceEnd" id="dateCommanceEnd${index}" onkeydown="return false" data-target="#dateOfDeliveryEnd${index}" value="${findDate.end}" autocomplete="off" style="border-radius: unset; background-color: #E9ECEF;" />
                `;
            }

            $('#table_timeline tbody').append(`
                <tr>
                    <td style="padding: 5px;">
                        <input id="timeline_work_name${index}" style="border-radius:0;" class="form-control" readonly value="${row[3]} - ${row[4]}" />
                    </td>
                    <td style="padding: 5px;">
                        <div class="input-group date" id="dateOfDelivery${index}" data-target-input="nearest" style="flex-wrap: nowrap;">
                            <div>
                                <div class="input-group-append" data-target="#dateOfDelivery${index}" data-toggle="datetimepicker" style="width: 27.78px; height: 21.8px;">
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
                        <div class="input-group date" id="dateOfDeliveryEnd${index}" data-target-input="nearest" style="flex-wrap: nowrap;">
                            <div>
                                <div class="input-group-append" data-target="#dateOfDeliveryEnd${index}" data-toggle="datetimepicker" style="width: 27.78px; height: 21.8px;">
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

            $(`#dateOfDelivery${index}`).datetimepicker({
                format: 'L',
                widgetPositioning: {
                    horizontal: 'auto',
                    vertical: 'bottom'
                }
            });

            $(`#dateOfDelivery${index}`).on('change.datetimepicker', function (e) {
                const dateDelivery = document.getElementById(`dateCommance${index}`);

                if (dateDelivery.value) {
                    const existingIndex = dataTimelineDate.findIndex(item => item.code === row[3]);

                    if (existingIndex !== -1) {
                        dataTimelineDate[existingIndex].start = dateDelivery.value;
                    } else {
                        dataTimelineDate.push({
                            code: row[3],
                            start: dateDelivery.value
                        });
                    }

                    $(`#dateCommance${index}`).css({
                        "background-color": "#e9ecef",
                        "border": "1px solid #ced4da"
                    });
                }
            });

            $(`#dateOfDeliveryEnd${index}`).datetimepicker({
                format: 'L',
                widgetPositioning: {
                    horizontal: 'auto',
                    vertical: 'bottom'
                }
            });

            $(`#dateOfDeliveryEnd${index}`).on('change.datetimepicker', function (e) {
                const dateDeliveryEnd = document.getElementById(`dateCommanceEnd${index}`);

                if (dateDeliveryEnd.value) {
                    const existingIndex = dataTimelineDate.findIndex(item => item.code === row[3]);

                    if (existingIndex !== -1) {
                        dataTimelineDate[existingIndex].end = dateDeliveryEnd.value;
                    } else {
                        dataTimelineDate.push({
                            code: row[3],
                            end: dateDeliveryEnd.value
                        });
                    }

                    $(`#dateCommanceEnd${index}`).css({
                        "background-color": "#e9ecef",
                        "border": "1px solid #ced4da"
                    });
                }
            });
        });
    }

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

                dataExcel = res.rows.slice(1);

                res.rows.slice(1).forEach((row, index) => {
                    const validateSubBudget = findSubBudgetByCode(row[1]);
                    const validateWork = findWorkByCode(row[3]);
                    const validateProduct = findProductByCode(row[5]);
                    const validateCurrency = findCurrencyByISOCode(row[7]);

                    let componentSubBudget = `
                        <input id="sub_budget_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                        <input id="sub_budget_name${index}" style="border-radius:0;width:130px;background-color:white;border-color:red;" class="form-control" readonly value="${row[1] ?? ''} - ${row[2] ?? ''}" />
                    `;
                    let componentWork = `
                        <input id="work_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                        <input id="work_name${index}" style="border-radius:0;width:130px;background-color:white;border-color:red;" class="form-control" readonly value="${row[3] ?? ''} - ${row[4] ?? ''}" />
                    `;
                    let componentProduct = `
                        <input id="product_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                        <input id="product_name${index}" style="border-radius:0;width:130px;background-color:white;border-color:red;" class="form-control" readonly value="${row[5] ?? ''} - ${row[6] ?? ''}" />
                    `;
                    let componentCurrency = `
                        <input id="currency_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden />
                        <input id="currency_name${index}" style="border-radius:0;width:130px;background-color:white;border-color:red;" class="form-control" readonly value="${row[7] ?? ''} - ${row[8] ?? ''}" />
                    `;

                    if (validateSubBudget) {
                        componentSubBudget = `
                            <input id="sub_budget_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden value="${validateSubBudget.Sys_ID}" />
                            <input id="sub_budget_name${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" readonly value="${validateSubBudget.Code} - ${validateSubBudget.Name}" />
                        `;
                    }

                    if (validateWork) {
                        componentWork = `
                            <input id="work_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden value="${validateWork.id}" />
                            <input id="work_name${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" readonly value="${validateWork.code} - ${validateWork.name}" />
                        `;
                    }

                    if (validateProduct) {
                        componentProduct = `
                            <input id="product_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden value="${validateProduct.sys_ID}" />
                            <input id="product_name${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" readonly value="${validateProduct.code} - ${validateProduct.name}" />
                        `;
                    }

                    if (validateCurrency) {
                        componentCurrency = `
                            <input id="currency_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden value="${validateCurrency.sys_ID}" />
                            <input id="currency_name${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" readonly value="${validateCurrency.ISOCode} - ${validateCurrency.name}" />
                        `;
                    }

                    $('#table_import_from_excel tbody').append(`
                        <tr>
                            <td style="padding: 5px;">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                            <a data-toggle="modal" data-target="#mySites" onclick="pickSubBudget(${index})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box${index}">
                                            </a>
                                        </span>
                                    </div>
                                    ${componentSubBudget}
                                </div>
                            </td>

                            <td style="padding: 5px;">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                            <a href="javascript:;" data-toggle="modal" data-target="#myWorks" onclick="pickWork(${index})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box${index}">
                                            </a>
                                        </span>
                                    </div>
                                    ${componentWork}
                                </div>
                            </td>

                            <td style="padding: 5px;">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                            <a href="javascript:;" data-toggle="modal" data-target="#myProductss" onclick="pickProduct(${index});">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box${index}">
                                            </a>
                                        </span>
                                    </div>
                                    ${componentProduct}
                                </div>
                            </td>

                            <td style="padding: 5px;">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;cursor:pointer;" class="input-group-text form-control">
                                            <a href="javascript:;" data-toggle="modal" data-target="#myCurrencies" onclick="pickCurrency(${index})">
                                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box${index}">
                                            </a>
                                        </span>
                                    </div>
                                    ${componentCurrency}
                                </div>
                            </td>

                            <td style="padding: 5px;">
                                <div class="input-group">
                                    <input class="form-control number-without-negative" id="qty${index}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(row[9])}" />
                                </div>
                            </td>
                            <td style="padding: 5px;">
                                <div class="input-group">
                                    <input class="form-control number-without-negative" id="price${index}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(row[10])}" />
                                </div>
                            </td>
                            <td style="padding-right:5px;">
                                <div class="input-group">
                                    <input class="form-control number-without-negative" id="total${index}" autocomplete="off" style="border-radius:0px;" value="${currencyTotal(row[11])}" />
                                </div>
                            </td>
                        </tr>
                    `);
                });

                // showTimeline();
            }
        });

        $("#excel_file").prop("disabled", true);
        $("#uploadBudgetFile").css("cursor", "not-allowed");
    });

    $('#tableProjects').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#iconBudget").hide();
        $("#loadingBudget").show();

        getCustomCurrencies();

        workflowValidate(sysId, code, name);

        $('#myProjects').modal('hide');
    });

    $(document).ready(function () {
        $("#excel_file").prop("disabled", true);
        $("#uploadBudgetFile").css("cursor", "not-allowed");
        getCustomProducts();
    });
</script>