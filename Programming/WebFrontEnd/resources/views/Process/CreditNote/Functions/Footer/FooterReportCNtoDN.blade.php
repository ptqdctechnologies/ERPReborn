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

        $("#requester_name").css('background-color', '#fff');
        $(`#requester_name`).val("");
        $(`#requester_code`).val("");
        $(`#requester_id`).val("");

        $("#beneficiary_name").css('background-color', '#fff');
        $(`#beneficiary_name`).val("");
        $(`#beneficiary_code`).val("");
        $(`#beneficiary_id`).val("");
        
        $("#credit_note_date_range").css('background-color', '#fff');
        $(`#credit_note_date_range`).val("");
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

    $('#tableRequesters').on('click', 'tbody tr', function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_requesters"]').val();
        const name        = $(this).find('td:nth-child(2)').text();
        const position    = $(this).find('td:nth-child(3)').text();

        $("#requester_id").val(sysId);
        // $("#requester_code").val(position);
        $("#requester_name").val(`${position} - ${name}`);
        $("#requester_name").css({"background-color":"#e9ecef"});

        $('#myRequesters').modal('toggle');
    });

    $('#tableBeneficiaries').on('click', 'tbody tr', function() {
        const sysId           = $(this).find('input[data-trigger="sys_id_beneficiaries"]').val();
        const personRefId     = $(this).find('input[data-trigger="person_ref_id_beneficiaries"]').val();
        const personName      = $(this).find('td:nth-child(2)').text();
        const personPosition  = $(this).find('td:nth-child(3)').text();

        $("#beneficiary_id").val(sysId);
        // $("#beneficiary_code").val(siteCode);
        $("#beneficiary_name").val(`${personPosition} - ${personName}`);
        $("#beneficiary_name").css({"background-color":"#e9ecef"});

        $('#myBeneficiaries').modal('toggle');
    });

    $(window).one('load', function() {
        $('#credit_note_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#credit_note_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#credit_note_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#credit_note_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#credit_note_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#credit_note_date_range_container_icon').on('click', function () {
            $('#credit_note_date_range').trigger('click');
        });
    });
</script>