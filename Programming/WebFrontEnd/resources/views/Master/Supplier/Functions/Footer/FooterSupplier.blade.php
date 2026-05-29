<script>
    let dataReport = [];
    const printType = document.getElementById("print_type");

    function getDataSuppliers() {
        $('#table_supplier').DataTable({
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
                type: 'POST',
                url: '{!! route("Supplier.SupplierSummary") !!}',
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
                    $('#table_supplier tbody').empty();
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
                            <input type="hidden" value="${data.sys_ID}">
                            ${meta.row + meta.settings._iDisplayStart + 1}
                        `;
                    }
                },
                {
                    data: 'code',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'name',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'tax_ID',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'phoneNumber',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'email',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'country',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'province',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'city',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'institutionTypeName',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'contactPerson',
                    defaultContent: '-',
                    className: "align-middle text-wrap line-height-normal"
                },
                {
                    data: 'bankAcronym',
                    defaultContent: '-',
                    className: "align-middle text-wrap line-height-normal"
                },
                {
                    data: 'accountNumber',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'accountName',
                    defaultContent: '-',
                    className: "align-middle text-nowrap"
                },
                {
                    data: 'address',
                    defaultContent: '-',
                    className: "align-middle text-wrap line-height-normal"
                }
            ]
        });
    }

    function exportDataSuppliers() {
        Utils.showLoading();

        $.ajax({
            url: '{!! route("Supplier.export") !!}',
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
                    link.download = "Supplier.pdf";
                } else {
                    link.download = "Supplier.xlsx";
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

    function validateExportButton() {
        if (dataReport.length > 0) {
            exportDataReport();
        } else {
            ErrorHandler.notifToast(
                'error',
                'No data available to export. Please display the data first',
                'Error!'
            );
        }
    }

    $('#tableSuppliers').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#modal_supplier_id").val(sysId);
        $("#modal_supplier_number").val(`${code} - ${name}`);

        $('#mySuppliers').modal('toggle');
    });

    $('#revision_supplier').on('click', function (e) {
        getSuppliers();
    });

    $(document).ready(function () {
        getDataSuppliers();
    });
</script>