<script type="text/javascript">
    $("#mySiteCodeSecondTrigger").prop("disabled", true);
    $("#myGetModalAdvanceTrigger").prop("disabled", true);

    $('#tableGetProjectSecond').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        getSiteSecond(sysId);

        $("#site_code_second").val("");
        $("#site_id_second").val("");
        
        $("#modal_advance_document_number").val("");
        $("#modal_advance_id").val("");
        $("#modal_advance_budget_code").val("");

        $("#mySiteCodeSecondTrigger").prop("disabled", false);
    });

    $('#tableGetSiteSecond').on('click', 'tbody tr', function() {
        var sysId = $(this).find('input[data-trigger="sys_id_site_second"]').val();
        var projectID = $("#project_id_second").val();
        getModalAdvance(projectID, sysId);

        $("#modal_advance_document_number").val("");
        $("#modal_advance_id").val("");
        $("#modal_advance_budget_code").val("");
        
        $("#myGetModalAdvanceTrigger").prop("disabled", false);
    });
</script>