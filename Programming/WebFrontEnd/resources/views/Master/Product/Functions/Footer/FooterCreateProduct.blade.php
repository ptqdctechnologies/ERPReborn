<script>
    const formList = {
        product_name: {
            component: '#product_name',
            containerMessageId: '#productNameMessage',
            messageId: '#productNameMessageText'
        },
        uom_value: {
            component: '#uom',
            containerMessageId: '#uomMessage',
            messageId: '#uomMessageText'
        },
        category_value: {
            component: '#category',
            containerMessageId: '#categoryMessage',
            messageId: '#categoryMessageText'
        },
        sub_category_value: {
            component: '#sub_category',
            containerMessageId: '#subCategoryMessage',
            messageId: '#subCategoryMessageText'
        }
    };

    function getQuantityUnit() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("getQuantityUnit") !!}',
        })
            .done(function (response) {
                const data = (response.status == 200 && response.data[0]) ? response.data : [];

                data.forEach(function (project) {
                    $('#uom').append('<option value="' + project.sys_ID + '">' + project.name + '</option>');
                });
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                // $("#loadingGetModalAdvanceSettlement").hide();
            });
    }

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

                            if (formList[key].component == '#uom') {
                                $('#uom').next('.select2-container')
                                    .find('.select2-selection')
                                    .css("border", "1px solid red");
                            } else if (formList[key].component == '#category') {
                                $('#category').next('.select2-container')
                                    .find('.select2-selection')
                                    .css("border", "1px solid red");
                            } else if (formList[key].component == '#sub_category') {
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

    $('#tableGetProductss').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_product"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $(`#modal_product_id`).val(sysId);
        $(`#modal_product_number`).val(`${code} - ${name}`);
        $(`#modal_product_number`).css('background-color', '#e9ecef');

        $('#myProductss').modal('toggle');
    });

    $('#revision_product').on('click', function (e) {
        getProductss();
    });

    $(document).ready(function () {
        $('#uom').select2();
        $('#category').select2();
        $('#sub_category').select2();

        $('#uom').on('select2:select', function (e) {
            ErrorHandler.hideErrorInputMessage("", "#uomMessage");
            $('#uom').next('.select2-container')
                .find('.select2-selection')
                .css("border", "1px solid #ced4da");
        });
        $('#category').on('select2:select', function (e) {
            ErrorHandler.hideErrorInputMessage("", "#categoryMessage");
            $('#category').next('.select2-container')
                .find('.select2-selection')
                .css("border", "1px solid #ced4da");
        });
        $('#sub_category').on('select2:select', function (e) {
            ErrorHandler.hideErrorInputMessage("", "#subCategoryMessage");
            $('#sub_category').next('.select2-container')
                .find('.select2-selection')
                .css("border", "1px solid #ced4da");
        });

        getQuantityUnit();
    });
</script>