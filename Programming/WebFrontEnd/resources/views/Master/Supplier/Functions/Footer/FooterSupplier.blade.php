<script>
    function getDataSuppliers() {
        $.ajax({
            type: 'GET',
            url: '{!! route("getSupplier") !!}',
            beforeSend: function () {
                $('#loading-table').show();
            },
            complete: function () {
                $('#loading-table').hide();
            },
            success: function (response) {
                const suppliers = response ?? [];

                if (suppliers.length === 0) {
                    $('#table_supplier tbody').empty();
                    return;
                }

                $('#table_supplier').DataTable({
                    destroy: true,
                    processing: true,
                    data: suppliers,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            className: "align-middle text-center",
                            render: function (data, type, row, meta) {
                                return `<input type="hidden" value="${data.sys_ID}"> ${meta.row + 1}`;
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
                            data: 'address',
                            defaultContent: '-',
                            className: "align-middle text-wrap"
                        },
                        {
                            data: null,
                            className: "align-middle text-center",
                            render: function (data) {
                                return `
                                    <div class="d-flex justify-content-center" style="gap: .5rem;">
                                        <button class="btn btn-sm btn-warning btn-edit" data-id="${data.sys_ID}">
                                            Edit
                                        </button>
                                    </div>
                                `;
                                // <button class="btn btn-sm btn-danger btn-delete" data-id="${data.sys_ID}">
                                //     Hapus
                                // </button>
                            }
                        }
                    ]
                });
            },
            error: function (textStatus, errorThrown) {
                $('#table_supplier tbody').empty();
            }
        });
    }

    $(document).ready(function () {
        getDataSuppliers();
    });
</script>