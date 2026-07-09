<script>
    $('#modal_specialization_supplier_trigger').on('click', function () {
        $('#mySpecializationSupplierRevision').modal('toggle');
        $('#supplierSpecializationListModal').modal('toggle');
    });

    $('#tableSupplierSpecializationListModal').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_supplier_specialization"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#modal_specialization_supplier_id").val(id);
        $("#modal_specialization_supplier_text").val(`${code} - ${name}`);
        $("#modal_specialization_supplier_text").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

        $('#mySpecializationSupplierRevision').modal('toggle');
        $('#supplierSpecializationListModal').modal('toggle');
    });

    $('#specializationSupplierForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'PUT',
            url: '{!! route("SpecializationSupplier.update", $specializationRefID) !!}',
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
                        Utils.cancelForm("{{ route('SpecializationSupplier.index') }}");
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
        getSupplierSpecialization();
    });
</script>