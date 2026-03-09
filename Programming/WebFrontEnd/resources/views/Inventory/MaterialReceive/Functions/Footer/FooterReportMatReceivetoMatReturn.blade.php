<script>
    $('#tableProjects').on('click', 'tbody tr', async function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_project"]').val();
        const projectCode = $(this).find('td:nth-child(2)').text();
        const projectName = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val(sysId);
        $("#budget_code").val(projectCode);
        $("#budget_name").val(`${projectCode} - ${projectName}`);
        $("#budget_name").css({"background-color":"#e9ecef"});

        $('#myProjects').modal('toggle');
    });

    $(window).one('load', function() {
        $('#material_receive_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#material_receive_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#material_receive_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#material_receive_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#material_receive_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#material_receive_date_range_container_icon').on('click', function () {
            $('#material_receive_date_range').trigger('click');
        });
    });
</script>