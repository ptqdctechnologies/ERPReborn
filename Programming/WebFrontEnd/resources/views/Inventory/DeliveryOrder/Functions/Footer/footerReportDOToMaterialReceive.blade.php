<script type="text/javascript">
    function resetForm() {
        $("#project_code_second1").css('background-color', '#fff');
        $(`#project_code_second1`).val("");
        $(`#project_id_second1`).val("");
        $(`#project_name_second`).val("");

        $("#supplier_code").css('background-color', '#fff');
        $(`#supplier_code`).val("");
        $(`#supplier_id`).val("");
        $(`#address`).val("");

        $("#project_code_second2").css('background-color', '#fff');
        $(`#project_code_second2`).val("");
        $(`#project_id_second2`).val("");
        $(`#project_name_second`).val("");

        $("#project_code_second3").css('background-color', '#fff');
        $(`#project_code_second3`).val("");
        $(`#project_id_second3`).val("");
        $(`#project_name_second`).val("");

        $("#project_code_second").css('background-color', '#fff');
        $(`#project_code_second`).val("");
        $(`#project_id_second`).val("");
        $(`#project_name_second`).val("");

        $("#reservation").css('background-color', '#fff');
        $(`#reservation`).val("");
    }

    $("#mySiteCodeSecondTrigger").prop("disabled", true);

    $('#tableGetProjectSecond').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        getSiteSecond(sysId);

        $("#site_code_second").val("");
        $("#site_id_second").val("");
        $("#mySiteCodeSecondTrigger").prop("disabled", false);
    });

    // $('#tableGetBeneficiarySecond').on('click', 'tbody tr', function() {
    //     adjustInputSize(document.getElementById("beneficiary_second_person_name"), "string");
    // });

    // $('#tableGetWorkerSecond').on('click', 'tbody tr', function() {
    //     adjustInputSize(document.getElementById("worker_name_second"), "string");
    // });
</script>