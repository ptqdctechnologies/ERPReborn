<script>
    const params = new URLSearchParams(window.location.search);

    function getDataProducts() {
        $.ajax({
            type: 'GET',
            url: '{!! route("getProduct") !!}',
            beforeSend: function () {
                $('#loading-table').show();
            },
            complete: function () {
                $('#loading-table').hide();
            },
            success: function (response) {
                let products = response?.data?.data ?? [];

                if (products.length === 0) {
                    $('#table_product tbody').empty();
                    return;
                }

                $('#table_product').DataTable({
                    destroy: true,
                    processing: true,
                    data: products,
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
                            className: "align-middle text-wrap"
                        },
                        {
                            data: 'quantityUnitName',
                            defaultContent: '-',
                            className: "align-middle"
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
                $('#table_product tbody').empty();
            }
        });
    }

    $(document).ready(function () {
        if (params.get("var") == 1) {
            getDataProducts();
        }
    });
</script>