<script>
    const dateRate = document.getElementById("rate_date");

    $('#tableCurrencies').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_currencies"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#currency_id").val(sysId);
        $("#currency_code").val(code);
        $("#currency_name").val(`${code} - ${name}`);
        $("#currency_name").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

        $('#myCurrencies').modal('toggle');
    });

    $('#submit-confirmation').on('click', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '{!! route("Rate.store") !!}',
            data: $('#rateForm').serialize(),
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
                        Utils.cancelForm("{{ route('Rate.index') }}");
                    });
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);

                if (jqXHR.status === 422) {
                    let errors = jqXHR.responseJSON.errors;
                }
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                Utils.hideLoading();
            });
    });

    $(document).ready(function () {
        $('#rate_date_range').daterangepicker({
            autoUpdateInput: false,
            minDate: moment().subtract(7, 'days'),
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#rate_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#rate_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#rate_date_range", "#dateRangeMessage");
        });

        $('#rate_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#rate_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#rate_date_range_container_icon').on('click', function () {
            $('#rate_date_range').trigger('click');
        });
    });
</script>