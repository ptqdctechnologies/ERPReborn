<script>
    const countryCode = document.getElementById("country_code");
    const provinceCode = document.getElementById("province_code");

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

    $('#submit-confirmation').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'PUT',
            url: '{!! route("Warehouse.update", $warehouseRefID) !!}',
            data: $('#warehouseForm').serialize(),
            beforeSend: function () {
                Utils.showLoading();
            }
        })
            .done(function (response) {
                if (response.status === 200) {
                    const swalWithBootstrapButtons = Swal.mixin({
                        confirmButtonClass: 'btn btn-success btn-sm',
                        cancelButtonClass: 'btn btn-danger btn-sm',
                        buttonsStyling: true,
                    });

                    swalWithBootstrapButtons.fire({
                        title: 'Successful !',
                        type: 'success',
                        html: 'Data has been saved',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        Utils.cancelForm("{{ route('Warehouse.index') }}");
                    });
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                Utils.hideLoading();
            });
    });

    $(document).ready(function () {
        countryCodeTemp = countryCode.value;

        getCountries();
        getProvincies(countryCode.value);
        getCities(countryCode.value, provinceCode.value);
    });
</script>