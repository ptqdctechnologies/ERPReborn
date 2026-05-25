<script>
    function getDataSuppliers() {
        $('#table_supplier').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            searching: true,
            ordering: false,
            pageLength: 10,
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
                beforeSend: function () {
                    $('#loading-table').show();
                    $('#table_supplier tbody').empty();
                },
                complete: function () {
                    $('#loading-table').hide();
                }
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