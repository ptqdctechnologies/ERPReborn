<script>
    $("#mySiteCodeSecondTrigger").prop("disabled", true);

    $('#tableGetProjectSecond').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        getSiteSecond(sysId);

        $("#site_code_second").val("");
        $("#site_id_second").val("");
        $("#site_name_second").val("");

        $("#mySiteCodeSecondTrigger").prop("disabled", false);
    });

    $(window).one('load', function() {
        $('#business_trip_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#business_trip_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#business_trip_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#business_trip_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#business_trip_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#business_trip_date_range_container_icon').on('click', function () {
            $('#business_trip_date_range').trigger('click');
        });
    });
</script>