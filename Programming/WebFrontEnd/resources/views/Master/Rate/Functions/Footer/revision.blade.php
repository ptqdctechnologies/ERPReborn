<script>
    $('#tableCurrencies').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_currencies"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        if (code != "USD" && code != "IDR" && code != "EUR") {
            Swal.fire("Error", "Please Call Accounting Staffs to Input Current Exchange Rate. Thank You.", "error");

            return;
        } else {
            $("#currency_id").val(sysId);
            $("#currency_code").val(code);
            $("#currency_name").val(`${code} - ${name}`);
            $("#currency_name").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });
        }

        $('#myCurrencies').modal('toggle');
    });

    $(document).ready(function () {
        $('#rate_date_range').daterangepicker({
            autoUpdateInput: false,
            startDate: moment('<?= isset($startDate) ? $startDate : ''; ?>', 'MM/DD/YYYY'),
            endDate: moment('<?= isset($endDate) ? $endDate : ''; ?>', 'MM/DD/YYYY'),
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