<script>
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