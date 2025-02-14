<script>
    var documentTypeID = $("#DocumentTypeID").val();

    $("#mySiteCodeSecondTrigger").prop("disabled", true);
    $("#myWorkerSecondTrigger").prop("disabled", true);
    $("#beneficiary_second_popup").prop("disabled", true);
    $("#bank_list_popup_vendor").prop("disabled", true);
    $("#bank_accounts_popup_vendor").prop("disabled", true);
    $("#submitArf").prop("disabled", true);

    $('#tableGetProjectSecond').on('click', 'tbody tr', async function() {
        var sysId       = $(this).find('input[data-trigger="sys_id_project_second"]').val();
        var projectCode = $(this).find('td:nth-child(2)').text();
        var projectName = $(this).find('td:nth-child(3)').text();

        $("#project_id_second").val("");
        $("#project_code_second").val("");
        $("#project_name_second").val("Checking Workflow...");

        $("#loadingBudget").css({"display":"block"});
        $("#myProjectSecondTrigger").css({"display":"none"});

        try {
            var checkWorkFlow = await checkingWorkflow(sysId, documentTypeID);

            if (checkWorkFlow) {
                $("#project_id_second").val(sysId);
                $("#project_code_second").val(projectCode);
                $("#project_name_second").val(projectName);

                getSiteSecond(sysId);
                $("#mySiteCodeSecondTrigger").prop("disabled", false);
            }

            $("#loadingBudget").css({"display":"none"});
            $("#myProjectSecondTrigger").css({"display":"block"});
        } catch (error) {
            console.error('Error checking workflow:', error);

            Swal.fire("Error", "Error Checking Workflow", "error");
        }
    });

    $('#tableGetSiteSecond').on('click', 'tbody tr', function() {
        $("#myWorkerSecondTrigger").prop("disabled", false);
        $("#beneficiary_second_popup").prop("disabled", false);
        $("#bank_list_popup_vendor").prop("disabled", false);
        $("#bank_accounts_popup_vendor").prop("disabled", false);
        $("#submitArf").prop("disabled", false);
    });
</script>