<script>
    let countryCodeTemp = null;

    $('#tableCountries').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_country"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        countryCodeTemp = code;

        $("#country_id").val(id);
        $("#country_name").val(name);
        $("#country_name").css('background-color', '#e9ecef');

        $("#province_id").val("");
        $("#province_name").val("");
        $("#province_name").css('background-color', '#fff');

        $("#city_id").val("");
        $("#city_name").val("");
        $("#city_name").css('background-color', '#fff');

        ErrorHandler.hideErrorInputMessage("#country_name", "#countryMessage");

        getProvincies(code);

        $("#myCountries").modal('toggle');
    });

    $('#tableProvincies').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_province"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#province_id").val(id);
        $("#province_name").val(name);
        $("#province_name").css('background-color', '#e9ecef');

        $("#city_id").val("");
        $("#city_name").val("");
        $("#city_name").css('background-color', '#fff');

        ErrorHandler.hideErrorInputMessage("#province_name", "#provinceMessage");

        getCities(countryCodeTemp, code);

        $("#myProvincies").modal('toggle');
    });

    $('#tableCities').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_country"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $("#city_id").val(id);
        $("#city_name").val(name);
        $("#city_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#city_name", "#cityMessage");

        $("#myCities").modal('toggle');
    });

    $('#warehouseTypeListTable').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_modal_warehouse_type"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $("#warehouse_type_id").val(id);
        $("#warehouse_type").val(name);
        $("#warehouse_type").css('background-color', '#e9ecef');

        $("#warehouseTypeListModal").modal('toggle');
    });

    $('#submit-confirmation').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '{!! route("Warehouse.store") !!}',
            data: $('#warehouseForm').serialize(),
            beforeSend: function () {
                Utils.showLoading();
            }
        })
            .done(function (response) {
                console.log('response', response);
            })
            .fail(function (jqXHR, textStatus, errorThrown) {

            })
            .always(function (jqXHR, textStatus, errorThrown) {
                Utils.hideLoading();
            });
    });

    $(document).ready(function () {
        getCountries();
        getWarehouseTypeList();
    });
</script>