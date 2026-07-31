<script>
    $(document).ready(function () {
        $('#balance_sheet_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#balance_sheet_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#balance_sheet_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
        });

        $('#balance_sheet_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#balance_sheet_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#balance_sheet_date_range_container_icon').on('click', function () {
            $('#balance_sheet_date_range').trigger('click');
        });
    });
</script>