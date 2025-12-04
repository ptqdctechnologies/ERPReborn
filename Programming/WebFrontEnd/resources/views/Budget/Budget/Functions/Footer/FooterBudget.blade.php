<script>
    let data            = [];
    let dataProducts    = [];
    let dataWorks       = [];
    let dataCurrencies  = [];
    let dataAddManual   = [];
    let indexSubBudget  = null;
    let indexWork       = null;
    let indexProduct    = null;
    let indexCurrency   = null;

    function findSubBudgetByCode(codeToFind) {
        // const normalizeString = (str) => {
        //     return str
        //         .toLowerCase()                   // Mengubah menjadi lowercase
        //         .trim()                           // Menghapus spasi ekstra
        //         .replace(/[^\w\s]/g, '');         // Menghapus simbol selain huruf dan angka
        // };

        return data.find(item => item.code == codeToFind);
    }

    function findWorkByISOCode(codeToFind) {
        // const normalizeString = (str) => {
        //     return str
        //         .toLowerCase()                   // Mengubah menjadi lowercase
        //         .trim()                           // Menghapus spasi ekstra
        //         .replace(/[^\w\s]/g, '');         // Menghapus simbol selain huruf dan angka
        // };

        return dataWorks.find(item => item.code == codeToFind);
    }

    function findProductByCode(codeToFind) {
        // const normalizeString = (str) => {
        //     return str
        //         .toLowerCase()                   // Mengubah menjadi lowercase
        //         .trim()                           // Menghapus spasi ekstra
        //         .replace(/[^\w\s]/g, '');         // Menghapus simbol selain huruf dan angka
        // };

        return dataProducts.find(item => item.code == codeToFind);
    }

    function findCurrencyByISOCode(codeToFind) {
        // const normalizeString = (str) => {
        //     return str
        //         .toLowerCase()                   // Mengubah menjadi lowercase
        //         .trim()                           // Menghapus spasi ekstra
        //         .replace(/[^\w\s]/g, '');         // Menghapus simbol selain huruf dan angka
        // };

        return dataCurrencies.find(item => item.ISOCode == codeToFind);
    }

    function convertSubBudgetToVariable(Project_RefID) {
        $('#tableSites tbody').empty();
        $(".loadingSites").show();
        $(".errorSitesMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getNewSite") !!}?project_code=' + Project_RefID,
            success: function(response) {
                $(".loadingSites").hide();

                var no = 1;
                var table = $('#tableSites').DataTable();
                table.clear();

                if (Array.isArray(response) && response.length > 0) {
                    $.each(response, function(key, val) {
                        keys += 1;
                        table.row.add([
                            '<input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" data-trigger="sys_id_site" type="hidden">' + no++,
                            val.Code || '-',
                            val.Name || '-',
                        ]).draw();

                        data.push({
                            sys_id: val.Sys_ID,
                            code: val.Code,
                            name: val.Name
                        });
                    });

                    $("#tableSites_length").show();
                    $("#tableSites_filter").show();
                    $("#tableSites_info").show();
                    $("#tableSites_paginate").show();
                } else {
                    $(".errorSitesMessageContainer").show();
                    $("#errorSitesMessage").text(`No Data Available in Table.`);

                    $("#tableSites_length").hide();
                    $("#tableSites_filter").hide();
                    $("#tableSites_info").hide();
                    $("#tableSites_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableSites tbody').empty();
                $(".loadingSites").hide();
                $(".errorSitesMessageContainer").show();
                $("#errorSitesMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
    }

    function convertProductToVariable() {
        $('#tableGetProductss tbody').empty();
        $(".loadingGetModalProductss").show();
        $(".errorModalProductssMessageContainer").hide();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getProduct") !!}',
            success: function(data) {
                $(".loadingGetModalProductss").hide();

                var table = $('#tableGetProductss').DataTable();
                table.clear();

                if (Array.isArray(data.data.data) && data.data.data.length > 0) {
                    dataProducts = data.data.data;

                    $('#tableGetProductss').DataTable({
                        destroy: true,
                        data: data.data.data,
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true,
                        columns: [
                            {
                                data: null,
                                render: function (data, type, row, meta) {
                                    return '<td class="align-middle text-center">' +
                                        '<input id="sys_id_product' + (meta.row + 1) + '" value="' + data.sys_ID + '" data-trigger="sys_id_productss" type="hidden">' +
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

                    $('#tableGetProductss').css("width", "revert-layer");

                    $("#tableGetProductss_length").show();
                    $("#tableGetProductss_filter").show();
                    $("#tableGetProductss_info").show();
                    $("#tableGetProductss_paginate").show();
                } else {
                    $('#tableGetProductss tbody').empty();
                    $(".errorModalProductssMessageContainer").show();
                    $("#errorModalProductssMessage").text(`Data not found.`);

                    $("#tableGetProductss_length").hide();
                    $("#tableGetProductss_filter").hide();
                    $("#tableGetProductss_info").hide();
                    $("#tableGetProductss_paginate").hide();
                }
            },
            error: function (textStatus, errorThrown) {
                $('#tableGetProductss tbody').empty();
                $(".loadingGetModalProductss").hide();
                $(".errorModalProductssMessageContainer").show();
                $("#errorModalProductssMessage").text(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
            }
        });
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

    function submitJournalDetails() {
        // const testing = document.getElementById(`sub_budget_name${indexSubBudget}`);
        // console.log('testing', testing.value);
    }

    $('#excel_file').on('change', function() {
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
            success: function(res) {
                $('#table_import_from_excel tbody').empty();

                res.rows.slice(1).forEach((row, index) => {
                    const validateSubBudget = findSubBudgetByCode(row[1]);
                    const validateWork      = findWorkByISOCode(row[3]);
                    const validateProduct   = findProductByCode(row[5]);
                    const validateCurrency  = findCurrencyByISOCode(row[7]);

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
                            <input id="sub_budget_id${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" hidden value="${validateSubBudget.sys_id}" />
                            <input id="sub_budget_name${index}" style="border-radius:0;width:130px;background-color:white;" class="form-control" readonly value="${validateSubBudget.code} - ${validateSubBudget.name}" />
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
            }
        });
        
        $("#excel_file").prop("disabled", true);
        $("#uploadBudgetFile").css("cursor", "not-allowed");
    });

    $('#tableProjects').on('click', 'tbody tr', function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_project"]').val();
        let code    = $(this).find('td:nth-child(2)').text();
        let name    = $(this).find('td:nth-child(3)').text();

        $("#project_id").val(sysId);
        $("#project_name").val(`${code} - ${name}`);
        $("#project_name").css('background-color', '#e9ecef');
        
        $("#type_import_from_excel").prop("disabled", false);
        $("#type_add_manually").prop("disabled", false);

        $("#myProjectsTrigger").prop("disabled", true);
        $("#myProjectsTrigger").css("cursor", "not-allowed");

        $("#excel_file").prop("disabled", false);
        $("#uploadBudgetFile").css("cursor", "pointer");

        $('#myProjects').modal('hide');

        convertSubBudgetToVariable(sysId);
    });

    $('#tableCurrencies').on('click', 'tbody tr', function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_currencies"]').val();
        let code    = $(this).find('td:nth-child(2)').text();
        let name    = $(this).find('td:nth-child(3)').text();

        $("#currency_id").val(sysId);
        $("#currency_name").val(`${code} - ${name}`);
        $("#currency_name").css('background-color', '#e9ecef');

        $("#myCurrenciesTrigger").prop("disabled", true);
        $("#myCurrenciesTrigger").css("cursor", "not-allowed");

        $('#myCurrencies').modal('hide');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        if (indexSubBudget === null) return;

        let sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        let siteCode    = $(this).find('td:nth-child(2)').text();
        let siteName    = $(this).find('td:nth-child(3)').text();

        $(`#sub_budget_id${indexSubBudget}`).val(sysId);
        $(`#sub_budget_name${indexSubBudget}`).val(`${siteCode} - ${siteName}`);
        $(`#sub_budget_name${indexSubBudget}`).css('border', '1px solid #ced4da');

        $('#mySites').modal('hide');
    });

    $('#tableWorks tbody').on('click', 'tr', function () {
        if (indexWork === null) return;

        const table     = $('#tableWorks').DataTable();
        const dataRow   = table.row(this).data();

        if (dataRow) {
            $("#myWorks").modal('toggle');

            const workRefID = dataRow.id;
            const workCode  = dataRow.code;
            const workName  = dataRow.name;

            $(`#work_id${indexWork}`).val(workRefID);
            $(`#work_name${indexWork}`).val(`${workCode ?? ''} - ${workName ?? ''}`);
            $(`#work_name${indexWork}`).css("border", "1px solid #ced4da");
        }
    });

    $('#tableGetProductss tbody').on('click', 'tr', function () {
        if (indexProduct === null) return;

        const table     = $('#tableGetProductss').DataTable();
        const dataRow   = table.row(this).data();

        if (dataRow) {
            $("#myProductss").modal('toggle');

            const productRefID  = dataRow.sys_ID;
            const productCode   = dataRow.code;
            const productName   = dataRow.name;

            $(`#product_id${indexProduct}`).val(productRefID);
            $(`#product_name${indexProduct}`).val(`${productCode ?? ''} - ${productName ?? ''}`);
            $(`#product_name${indexProduct}`).css("border", "1px solid #ced4da");
        }
    });

    $('#tableCurrencies tbody').on('click', 'tr', function () {
        if (indexCurrency === null) return;

        const table     = $('#tableCurrencies').DataTable();
        const dataRow   = table.row(this).data();

        if (dataRow) {
            $("#myCurrencies").modal('toggle');

            const currencyRefID     = dataRow.sys_ID;
            const currencyISOCode   = dataRow.ISOCode;
            const currencyName      = dataRow.name;

            $(`#currency_id${indexCurrency}`).val(currencyRefID);
            $(`#currency_name${indexCurrency}`).val(`${currencyISOCode ?? ''} - ${currencyName ?? ''}`);
            $(`#currency_name${indexCurrency}`).css("border", "1px solid #ced4da");
        }
    });

    $(window).one('load', function() {
        $("#excel_file").prop("disabled", true);
        $("#uploadBudgetFile").css("cursor", "not-allowed");
        convertProductToVariable();
    });
</script>