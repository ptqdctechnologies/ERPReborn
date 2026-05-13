<script>
    $(document).ready(function () {
        $('#general_ledger_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#general_ledger_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#general_ledger_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#general_ledger_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#general_ledger_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#general_ledger_date_range_container_icon').on('click', function () {
            $('#general_ledger_date_range').trigger('click');
        });
    });
</script>