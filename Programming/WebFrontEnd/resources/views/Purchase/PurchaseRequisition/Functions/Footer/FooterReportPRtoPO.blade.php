<script type="text/javascript">
    function resetForm() {
        $("#project_code_second").css('background-color', '#fff');
        $(`#project_code_second`).val("");
        $(`#project_id_second`).val("");
        $(`#project_name_second`).val("");
        
        $("#site_code_second").css('background-color', '#fff');
        $(`#site_code_second`).val("");
        $(`#site_id_second`).val("");
        $(`#site_name_second`).val("");

        $("#reservation").css('background-color', '#fff');
        $(`#reservation`).val("");

        $("#supplier_code").css('background-color', '#fff');
        $(`#supplier_code`).val("");
        $(`#supplier_id`).val("");
        $(`#address`).val("");
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