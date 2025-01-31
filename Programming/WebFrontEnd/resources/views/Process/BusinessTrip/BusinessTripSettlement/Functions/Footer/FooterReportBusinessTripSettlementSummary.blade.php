<script type="text/javascript">
    $("#mySiteCodeSecondTrigger").prop("disabled", true);

    $('#tableGetProjectSecond').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        getSiteSecond(sysId);

        $("#site_code_second").val("");
        $("#site_id_second").val("");
        $("#site_name_second").val("");

        $("#worker_name_second").val("");
        $("#worker_id_second").val("");
        $("#worker_position_second").val("");

        $("#beneficiary_second_person_name").val("");
        $("#beneficiary_second_id").val("");
        $("#beneficiary_second_person_position").val("");

        $("#mySiteCodeSecondTrigger").prop("disabled", false);
    });

    $('#tableGetBeneficiarySecond').on('click', 'tbody tr', function() {
        adjustInputSize(document.getElementById("beneficiary_second_person_name"), "string");
    });

    $('#tableGetWorkerSecond').on('click', 'tbody tr', function() {
        adjustInputSize(document.getElementById("worker_name_second"), "string");
    });

    $(".header_table").css({
        "padding-top": "10px",
        "padding-bottom": "10px",
        "border": "1px solid #e9ecef",
        "text-align": "center",
        "background-color": "#4B586A",
        "color": "white",
    });

    $(".footer_table").css({
        "padding-top": "10px",
        "padding-bottom": "10px",
        "border": "1px solid #e9ecef",
        "text-align": "left",
        "background-color": "#4B586A",
        "color": "white",
    });
</script>