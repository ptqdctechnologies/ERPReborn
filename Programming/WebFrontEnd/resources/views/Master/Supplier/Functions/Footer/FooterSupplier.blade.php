<script>
    function getDataSuppliers() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("Supplier.SupplierDetail") !!}',
            beforeSend: function () {
                $('#loading-table').show();
            },
            complete: function () {
                $('#loading-table').hide();
            },
            success: function (response) {
                const suppliers = response.data ?? [];

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
                        },
                        // {
                        //     data: null,
                        //     className: "align-middle text-center",
                        //     render: function (data) {
                        //         return `
                        //             <div class="d-flex justify-content-center" style="gap: .5rem;">
                        //                 <button class="btn btn-sm btn-warning btn-edit" data-id="${data.sys_ID}">
                        //                     Edit
                        //                 </button>
                        //             </div>
                        //         `;
                        //         // <button class="btn btn-sm btn-danger btn-delete" data-id="${data.sys_ID}">
                        //         //     Hapus
                        //         // </button>
                        //     }
                        // }
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