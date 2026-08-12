<script>
    let countryCodeTemp = null;

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

    $('#tableCountries').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_country"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        countryCodeTemp = code;

        $("#country_code").val(code);
        $("#country_name").val(name);
        $("#country_name").css('background-color', '#e9ecef');

        $("#province_code").val("");
        $("#province_name").val("");
        $("#province_name").css('background-color', '#fff');

        $("#city_id").val("");
        $("#city_name").val("");
        $("#city_name").css('background-color', '#fff');

        // ErrorHandler.hideErrorInputMessage(formList.country_name.component, formList.country_name.containerMessageId);

        getProvincies(code);

        $("#myCountries").modal('toggle');
    });

    $('#tableProvincies').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_province"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#province_code").val(code);
        $("#province_name").val(name);
        $("#province_name").css('background-color', '#e9ecef');

        $("#city_id").val("");
        $("#city_name").val("");
        $("#city_name").css('background-color', '#fff');

        // ErrorHandler.hideErrorInputMessage(formList.province_name.component, formList.province_name.containerMessageId);

        getCities(countryCodeTemp, code);

        $("#myProvincies").modal('toggle');
    });

    $('#tableCities').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_country"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $("#city_id").val(id);
        $("#city_name").val(name);
        $("#city_name").css('background-color', '#e9ecef');

        // ErrorHandler.hideErrorInputMessage(formList.city_name.component, formList.city_name.containerMessageId);

        $("#myCities").modal('toggle');
    });

    $('#warehouseTypeListTable').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_modal_warehouse_type"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $("#warehouse_type_id").val(id);
        $("#warehouse_type").val(name);
        $("#warehouse_type").css('background-color', '#e9ecef');

        // ErrorHandler.hideErrorInputMessage(formList.warehouse_type.component, formList.warehouse_type.containerMessageId);

        $("#warehouseTypeListModal").modal('toggle');
    });

    $('#revision_warehouse').on('click', function (e) {
        getWarehouseList();
    });

    $('#modal_warehouse_document_number_icon').on('click', function () {
        $('#warehouseListModal').modal('toggle');
        $('#warehouseRevisionModal').modal('toggle');
    });

    $(document).ready(function () {
        getCountries();
        getDataWarehouses();
        getWarehouseTypeList();
    });
</script>