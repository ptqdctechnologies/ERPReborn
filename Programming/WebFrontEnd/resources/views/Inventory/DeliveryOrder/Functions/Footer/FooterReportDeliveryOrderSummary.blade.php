<script type="text/javascript">
    $("#mySiteCodeSecondTrigger").prop("disabled", true);

    $('#tableGetProjectSecond').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        getSiteSecond(sysId);

        $("#site_code_second").val("");
        $("#site_id_second").val("");
        $("#mySiteCodeSecondTrigger").prop("disabled", false);
    });

    $('#tableGetBeneficiarySecond').on('click', 'tbody tr', function() {
        adjustInputSize(document.getElementById("beneficiary_second_person_name"), "string");
    });

    $('#tableGetWorkerSecond').on('click', 'tbody tr', function() {
        adjustInputSize(document.getElementById("worker_name_second"), "string");
    });
</script>