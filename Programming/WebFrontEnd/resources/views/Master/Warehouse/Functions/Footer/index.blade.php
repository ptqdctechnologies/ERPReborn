<script>
    function getDataWarehouses() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("Warehouse.picklist") !!}',
        })
            .done(function (response) {
                let data = (response.status == 200 && response.data[0]) ? response.data : [];

                $('#table_warehouse').DataTable({
                    destroy: true,
                    data: data,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true,
                    columns: [
                        {
                            data: null,
                            render: function (data, type, row, meta) {
                                return `
                                    <input type="hidden" value="${data.sys_ID}">
                                    ${meta.row + meta.settings._iDisplayStart + 1}
                                `;
                            }
                        },
                        {
                            data: "code",
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'sys_Text',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: 'address',
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        },
                        {
                            data: null,
                            defaultContent: '-',
                            className: "align-middle text-nowrap"
                        }
                    ]
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $("#loading-table").hide();
            });
    }

    $('#warehouseListTable').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_modal_warehouse"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $(`#modal_warehouse_id`).val(sysId);
        $(`#modal_warehouse_document_number`).val(`${code} - ${name}`);
        $(`#modal_warehouse_document_number`).css({ 'background-color': '#e9ecef', 'border': '1px solid #ced4da' });

        $('#warehouseListModal').modal('toggle');
        $('#warehouseRevisionModal').modal('toggle');
    });

    $('#revision_warehouse').on('click', function (e) {
        getWarehouseList();
    });

    $('#modal_warehouse_document_number_icon').on('click', function () {
        $('#warehouseListModal').modal('toggle');
        $('#warehouseRevisionModal').modal('toggle');
    });

    $(document).ready(function () {
        getDataWarehouses();
    });
</script>