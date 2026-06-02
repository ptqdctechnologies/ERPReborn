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

        getDataProducts();
    });
</script>