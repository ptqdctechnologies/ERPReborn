<script>
    const formList = {
        product_name: {
            component: '#product_name',
            containerMessageId: '#productNameMessage',
            messageId: '#productNameMessageText'
        },
        uom_value: {
            component: '#uom_name',
            containerMessageId: '#uomMessage',
            messageId: '#uomMessageText'
        },
        category_value: {
            component: '#category_name',
            containerMessageId: '#categoryMessage',
            messageId: '#categoryMessageText'
        },
        sub_category_value: {
            component: '#sub_category',
            containerMessageId: '#subCategoryMessage',
            messageId: '#subCategoryMessageText'
        }
    };

    $('#product_name').on('input', function (e) {
        if (!e.target.value) {
            ErrorHandler.showErrorInputMessage("#product_name", "#productNameMessage");
        } else {
            ErrorHandler.hideErrorInputMessage("#product_name", "#productNameMessage");
        }
    });

    $('#productForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '{!! route("Product.store") !!}',
            data: $(this).serialize(),
            beforeSend: function () {
                Utils.showLoading();
            }
        })
            .done(function (response) {
                console.log('response', response);

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
                        Utils.cancelForm("{{ route('Product.index') }}");
                    });
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);

                if (jqXHR.status === 422) {
                    let errors = jqXHR.responseJSON.errors;

                    console.log('errors', errors);

                    $.each(errors, function (key, value) {
                        if (formList[key]) {
                            ErrorHandler.showErrorInputMessage(formList[key].component, formList[key].containerMessageId, formList[key].messageId, value[0]);

                            if (formList[key].component == '#sub_category') {
                                $('#sub_category').next('.select2-container')
                                    .find('.select2-selection')
                                    .css("border", "1px solid red");
                            }
                        }
                    });
                }
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                Utils.hideLoading();
            });
    });

    $('#tableGetUom').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_uom"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $(`#uom_value`).val(sysId);
        $(`#uom_name`).val(name);
        $(`#uom_name`).css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#uom_name", "#uomMessage");

        $('#myUom').modal('toggle');
    });

    $('#tableGetProductCategory').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_product_category"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $(`#category_value`).val(sysId);
        $(`#category_name`).val(name);
        $(`#category_name`).css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#category_name", "#categoryMessage");

        $('#myProductCategory').modal('toggle');
    });

    $('#tableGetProductSubCategory').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_product_sub_category"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $(`#sub_category_value`).val(sysId);
        $(`#sub_category`).val(name);
        $(`#sub_category`).css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#sub_category", "#subCategoryMessage");

        $('#myProductSubCategory').modal('toggle');
    });

    $('#tableGetProductss').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_product"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $(`#modal_product_id`).val(sysId);
        $(`#modal_product_number`).val(`${code} - ${name}`);
        $(`#modal_product_number`).css('background-color', '#e9ecef');

        $('#myProductss').modal('toggle');
    });

    $('#myProductCategoryTrigger').on('click', function (e) {
        getProductCategory();
    });

    $('#myProductSubCategoryTrigger').on('click', function (e) {
        getProductSubCategory();
    });

    $('#myUomTrigger').on('click', function (e) {
        getUom();
    });

    $('#revision_product').on('click', function (e) {
        getProductss();
    });
</script>