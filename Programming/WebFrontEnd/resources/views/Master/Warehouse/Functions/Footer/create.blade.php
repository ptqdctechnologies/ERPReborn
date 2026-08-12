<script>
    let countryCodeTemp = null;
    const formList = {
        warehouse_code: {
            component: '#warehouse_code',
            containerMessageId: '#warehouseCodeMessage',
            messageId: '#warehouseCodeMessageText'
        },
        warehouse_name: {
            component: '#warehouse_name',
            containerMessageId: '#warehouseNameMessage',
            messageId: '#warehouseNameMessageText'
        },
        country_name: {
            component: '#country_name',
            containerMessageId: '#warehouseCountryMessage',
            messageId: '#warehouseCountryMessageText'
        },
        province_name: {
            component: '#province_name',
            containerMessageId: '#warehouseProvinceMessage',
            messageId: '#warehouseProvinceMessageText'
        },
        city_name: {
            component: '#city_name',
            containerMessageId: '#warehouseCityMessage',
            messageId: '#warehouseCityMessageText'
        },
        warehouse_type: {
            component: '#warehouse_type',
            containerMessageId: '#warehouseTypeMessage',
            messageId: '#warehouseTypeMessageText'
        },
        warehouse_address: {
            component: '#warehouse_address',
            containerMessageId: '#warehouseAddressMessage',
            messageId: '#warehouseAddressMessageText'
        }
    };

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

        ErrorHandler.hideErrorInputMessage(formList.country_name.component, formList.country_name.containerMessageId);

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

        ErrorHandler.hideErrorInputMessage(formList.province_name.component, formList.province_name.containerMessageId);

        getCities(countryCodeTemp, code);

        $("#myProvincies").modal('toggle');
    });

    $('#tableCities').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_country"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $("#city_id").val(id);
        $("#city_name").val(name);
        $("#city_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage(formList.city_name.component, formList.city_name.containerMessageId);

        $("#myCities").modal('toggle');
    });

    $('#warehouseTypeListTable').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_modal_warehouse_type"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $("#warehouse_type_id").val(id);
        $("#warehouse_type").val(name);
        $("#warehouse_type").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage(formList.warehouse_type.component, formList.warehouse_type.containerMessageId);

        $("#warehouseTypeListModal").modal('toggle');
    });

    $(formList.warehouse_code.component).on('input', function (e) {
        if (!e.target.value) {
            ErrorHandler.showErrorInputMessage(formList.warehouse_code.component, formList.warehouse_code.containerMessageId);
        } else {
            ErrorHandler.hideErrorInputMessage(formList.warehouse_code.component, formList.warehouse_code.containerMessageId);
        }
    });

    $(formList.warehouse_name.component).on('input', function (e) {
        if (!e.target.value) {
            ErrorHandler.showErrorInputMessage(formList.warehouse_name.component, formList.warehouse_name.containerMessageId);
        } else {
            ErrorHandler.hideErrorInputMessage(formList.warehouse_name.component, formList.warehouse_name.containerMessageId);
        }
    });

    $(formList.warehouse_address.component).on('input', function (e) {
        if (!e.target.value) {
            ErrorHandler.showErrorInputMessage(formList.warehouse_address.component, formList.warehouse_address.containerMessageId);
        } else {
            ErrorHandler.hideErrorInputMessage(formList.warehouse_address.component, formList.warehouse_address.containerMessageId);
        }
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

                if (jqXHR.status === 422) {
                    let errors = jqXHR.responseJSON.errors;

                    $.each(formList, function (key, field) {
                        ErrorHandler.hideErrorInputMessage(
                            field.component,
                            field.containerMessageId,
                            field.messageId
                        );
                    });

                    $.each(errors, function (key, value) {
                        console.log(key + ': ' + value[0]);

                        if (formList[key]) {
                            ErrorHandler.showErrorInputMessage(
                                formList[key].component,
                                formList[key].containerMessageId,
                                formList[key].messageId,
                                value[0]
                            );
                        }
                    });
                }
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