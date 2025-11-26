<script>
    $('#tableProjects').on('click', 'tbody tr', function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_project"]').val();
        let code    = $(this).find('td:nth-child(2)').text();
        let name    = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val(sysId);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');

        getSites(sysId);

        $('#myProjects').modal('hide');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        let sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        let siteCode    = $(this).find('td:nth-child(2)').text();
        let siteName    = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css('background-color', '#e9ecef');

        $('#mySites').modal('hide');
    });

    $('#tableRequesters').on('click', 'tbody tr', function() {
        let sysId       = $(this).find('input[data-trigger="sys_id_requesters"]').val();
        let name        = $(this).find('td:nth-child(2)').text();
        let position    = $(this).find('td:nth-child(3)').text();

        $("#requester_id").val(sysId);
        $("#requester_name").val(`${position} - ${name}`);
        $("#requester_name").css('background-color', '#e9ecef');

        $('#myRequesters').modal('hide');
    });

    $('#tableBeneficiaries').on('click', 'tbody tr', function() {
        let sysId       = $(this).find('input[data-trigger="sys_id_beneficiaries"]').val();
        let name        = $(this).find('td:nth-child(2)').text();
        let position    = $(this).find('td:nth-child(3)').text();

        $("#beneficiary_id").val(sysId);
        $("#beneficiary_name").val(`${position} - ${name}`);
        $("#beneficiary_name").css('background-color', '#e9ecef');

        $('#myBeneficiaries').modal('hide');
    });

    $(window).one('load', function() {
        $('#advance_summary_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#advance_summary_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#advance_summary_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#advance_summary_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#advance_summary_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#advance_summary_date_range_container_icon').on('click', function () {
            $('#advance_summary_date_range').trigger('click');
        });
    });
</script>