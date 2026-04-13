<script>
    let countryCodeTemp = null;

    $('#tableGetBankList').on('click', 'tbody tr', function () {
        const id = $(this).find('input[type="hidden"]').val();
        const acronym = $(this).find('td:nth-child(2)').text();
        const fullName = $(this).find('td:nth-child(3)').text();

        $("#bank_id").val(id);
        $("#bank_name").val(`(${acronym}) ${fullName}`);
        $("#bank_name").css({ "background-color": "#e9ecef" });

        $('#myGetBankList').modal('hide');
    });

    $('#tableCountries').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_country"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        countryCodeTemp = code;

        $("#country_id").val(id);
        $("#country_name").val(`${code} - ${name}`);
        $("#country_name").css('background-color', '#e9ecef');

        getProvincies(code);

        $("#myCountries").modal('toggle');
    });

    $('#tableProvincies').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_province"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#province_id").val(id);
        $("#province_name").val(`${code} - ${name}`);
        $("#province_name").css('background-color', '#e9ecef');

        getCities(countryCodeTemp, code);

        $("#myProvincies").modal('toggle');
    });

    $('#tableCities').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_country"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $("#city_id").val(id);
        $("#city_name").val(name);
        $("#city_name").css('background-color', '#e9ecef');

        $("#myCities").modal('toggle');
    });

    $(document).ready(function () {
        $('#legal_entity').select2();

        getCountries();
    });
</script>