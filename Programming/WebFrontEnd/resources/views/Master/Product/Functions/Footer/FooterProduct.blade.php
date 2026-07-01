<script>
    let dataReport = [];
    const printType = document.getElementById("print_type");

    function getDataProducts() {
        $('#table_product').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            searching: false,
            ordering: false,
            lengthMenu: [
                [10, 20, 50, 100, -1],
                [10, 20, 50, 100, "All"]
            ],
            pageLength: 20,
            ajax: {
                type: 'GET',
                url: '{!! route("Product.summary") !!}',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function (d) {
                    // d.supplier_id = $('#supplier_id').val();

                    return d;
                },
                dataSrc: function (json) {

                    // simpan seluruh response
                    dataReport = json.data;

                    // wajib return data untuk DataTable
                    return json.data;
                },
                beforeSend: function () {
                    $('#loading-table').show();
                    $('#table_product tbody').empty();
                },
                complete: function () {
                    $('#loading-table').hide();
                },
            },
            columns: [
                {
                    data: null,
                    className: "align-middle text-center",
                    render: function (data, type, row, meta) {
                        return `
                            <input type="hidden" value="${data.Sys_ID}">
                            ${meta.row + meta.settings._iDisplayStart + 1}
                        `;
                    }
                },
                {
                    data: 'Code',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'Name',
                    defaultContent: '-',
                    className: "align-middle text-wrap"
                },
                {
                    data: 'UnitOfMeasureName',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'CategoryName',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'SubCategoryName',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                }
            ]
        });
    }

    function exportDataProducts() {
        Utils.showLoading();

        $.ajax({
            url: '{!! route("Product.export") !!}',
            type: 'POST',
            data: {
                dataReport: JSON.stringify(dataReport),
                printType: printType.value
            },
            xhrFields: {
                responseType: 'blob'
            },
            success: function (response) {
                var blob = new Blob([response], { type: response.type });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);

                if (response.type === "application/pdf") {
                    link.download = "Product.pdf";
                } else {
                    link.download = "Product.xlsx";
                }

                link.click();

                window.URL.revokeObjectURL(link.href);

                Utils.hideLoading();
            },
            error: function (xhr, status, error) {
                console.log('xhr, status, error', xhr, status, error);

                Utils.hideLoading();
                ErrorHandler.notifToast(
                    'error',
                    'An error occurred while processing the received data. Please try again later',
                    'Error!'
                );
            }
        });
    }

    $('#tableGetProductCategory').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_product_category"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $(`#category_value`).val(sysId);
        $(`#category_name`).val(name);
        $(`#category_name`).css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#category_name", "#categoryMessage");

        $('#myProductCategory').modal('toggle');
    });

    $('#tableGetProductSubCategory').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_product_sub_category"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $(`#sub_category_value`).val(sysId);
        $(`#sub_category`).val(name);
        $(`#sub_category`).css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#sub_category", "#subCategoryMessage");

        $('#myProductSubCategory').modal('toggle');
    });

    $('#tableGetProductss').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_product"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $(`#modal_product_id`).val(sysId);
        $(`#modal_product_number`).val(`${code} - ${name}`);
        $(`#modal_product_number`).css('background-color', '#e9ecef');

        $('#myProductss').modal('toggle');
    });

    $('#myProductCategoryTrigger').on('click', function (e) {
        getProductCategory();
    });

    $('#myProductSubCategoryTrigger').on('click', function (e) {
        getProductSubCategory();
    });

    $('#revision_product').on('click', function (e) {
        getProductss();
    });

    $(document).ready(function () {
        getDataProducts();
    });
</script>