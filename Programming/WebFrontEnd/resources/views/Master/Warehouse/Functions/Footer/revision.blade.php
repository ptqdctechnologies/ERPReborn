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

    $(document).ready(function () {
        getCountries();
    });
</script>