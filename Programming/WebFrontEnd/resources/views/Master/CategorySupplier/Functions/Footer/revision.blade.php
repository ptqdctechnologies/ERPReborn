<script>
    $('#modal_category_supplier_trigger').on('click', function () {
        $('#myCategorySupplierRevision').modal('toggle');
        $('#supplierCategoryListModal').modal('toggle');
    });

    $('#tableSupplierCategoryListModal').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_supplier_category"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#modal_category_supplier_id").val(id);
        $("#modal_category_supplier_text").val(`${code} - ${name}`);
        $("#modal_category_supplier_text").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

        $('#myCategorySupplierRevision').modal('toggle');
        $('#supplierCategoryListModal').modal('toggle');
    });

    $('#categorySupplierForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'PUT',
            url: '{!! route("CategorySupplier.update", $categoryRefID) !!}',
            data: $(this).serialize(),
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
                        html: 'Data has been saved. Your category supplier is ' + '<span style="color:#0046FF;font-weight:bold;">' + response.documentNumber + '</span>',
                        showCloseButton: false,
                        showCancelButton: false,
                        focusConfirm: false,
                        confirmButtonText: '<span style="color:black;"> OK </span>',
                        confirmButtonColor: '#4B586A',
                        confirmButtonColor: '#e9ecef',
                        reverseButtons: true
                    }).then((result) => {
                        Utils.cancelForm("{{ route('CategorySupplier.index') }}");
                    });
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);

                if (jqXHR.status === 422) {
                    let errors = jqXHR.responseJSON.errors;

                    console.log('errors', errors);
                }
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                Utils.hideLoading();
            });
    });

    $(document).ready(function () {
        getSupplierCategory();
    });
</script>