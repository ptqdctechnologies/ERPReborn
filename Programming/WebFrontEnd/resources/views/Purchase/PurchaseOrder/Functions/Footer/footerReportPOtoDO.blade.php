<script>
    function resetForm() {
        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#sub_budget_name").css('background-color', '#fff');
        $(`#sub_budget_name`).val("");
        $(`#sub_budget_id`).val("");
        $(`#sub_budget_code`).val("");
        
        $("#purchase_order_date_range").css('background-color', '#fff');
        $(`#purchase_order_date_range`).val("");
    }

    $('#tableProjects').on('click', 'tbody tr', async function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_project"]').val();
        const projectCode = $(this).find('td:nth-child(2)').text();
        const projectName = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val(sysId);
        $("#budget_code").val(projectCode);
        $("#budget_name").val(`${projectCode} - ${projectName}`);
        $("#budget_name").css({"background-color":"#e9ecef"});

        getSites(sysId);

        $('#myProjects').modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode    = $(this).find('td:nth-child(2)').text();
        const siteName    = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css({"background-color":"#e9ecef"});

        $('#mySites').modal('toggle');
    });

    $(window).one('load', function() {
        $('#purchase_order_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#purchase_order_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#purchase_order_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#purchase_order_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#purchase_order_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#purchase_order_date_range_container_icon').on('click', function () {
            $('#purchase_order_date_range').trigger('click');
        });
    });
</script>