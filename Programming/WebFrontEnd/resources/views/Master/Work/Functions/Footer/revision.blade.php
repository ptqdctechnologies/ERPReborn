<script>
    $('#submit-confirmation').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'PUT',
            url: '{!! route("Work.update", $workRefID) !!}',
            data: $('#workForm').serialize(),
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
                        Utils.cancelForm("{{ route('Work.index') }}");
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
</script>