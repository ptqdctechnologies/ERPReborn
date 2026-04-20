<script>
    let workflowState = [];
    const budgetID = document.getElementById("project_id");

    function addNextStep(newApproverName) {
        workflowState.splice(workflowState.length - 1, 0, {
            entities: {
                approverEntityName: newApproverName
            }
        });

        renderWorkflow();
    }

    function moveUp(index) {
        if (index <= 0) return;
        [workflowState[index], workflowState[index - 1]] =
            [workflowState[index - 1], workflowState[index]];
        renderWorkflow();
    }

    function moveDown(index) {
        if (index >= workflowState.length - 1) return;
        [workflowState[index], workflowState[index + 1]] =
            [workflowState[index + 1], workflowState[index]];
        renderWorkflow();
    }

    function deleteStep(index) {
        if (index >= workflowState.length - 1) return;

        workflowState.splice(index, 1);
        renderWorkflow();
    }

    function renderWorkflow() {
        $('.generated-next').remove();

        if (!workflowState.length) return;

        let lastItem = workflowState[workflowState.length - 1];

        workflowState.slice(0, -1).forEach((item, i) => {
            let approver = item.entities;

            let html = `
            <div class="generated-next">                
                
                <!-- NEXT ${i + 1} -->
                <div class="d-flex align-items-center" style="margin-bottom: 15px; margin-right: 10px; position: relative; left: 5px; gap: 0.3rem;">
                    <span class="bg-green" style="border-radius: 4px; font-weight: 600; padding: 5px;">
                        NEXT ${i + 1}
                    </span>
                    ${i !== 0
                    ? `<div onclick="moveUp(${i})" style="background-color: #e9ecef; padding: 4px; border: 1px solid #ced4da">
                                <i class="fas fa-chevron-up"></i>
                            </div>`
                    : ''
                }
                    ${(i + 1) !== workflowState.length - 1
                    ? `<div onclick="moveDown(${i})" style="background-color: #e9ecef; padding: 4px; border: 1px solid #ced4da">
                    <i class="fas fa-chevron-down"></i>
                    </div>`
                    : ''
                }
                    <div onclick="deleteStep(${i})" style="background-color: #e9ecef; padding: 4px; border: 1px solid #ced4da">
                        <i class="fas fa-minus"></i>
                    </div>
                </div>
                
                <div class="d-flex align-items-center" style="gap: 0.3rem;">
                    <div style="background-color: #e9ecef; padding: 4px; border: 1px solid #ced4da; margin-left: 60px;">
                        <i class="fas fa-gift"></i>
                    </div>
                    <div style="width: fit-content;">
                        <div class="input-group">
                            <input id="workflow_detail_next${i + 1}}" class="form-control" readonly value="${approver.approverEntityName}" style="border-radius:0; width: 181px;">
                        </div>
                    </div>
                </div>
            </div>
            `;

            $('#end-area').before(html);
        });

        if (lastItem) {
            $('#end-area input.form-control').val(lastItem.entities.approverEntityName);
        }

        $('#workflow_detail_content').show();
    }

    function getWorkflow(businessDocumentTypeRefID) {
        $.ajax({
            type: 'POST',
            url: '{!! route("GetWorkflow") !!}',
            data: {
                businessDocumentType_RefID: businessDocumentTypeRefID,
                combinedBudget_RefID: budgetID.value
            }
        })
            .done(function (response, textStatus, jqXHR) {
                workflowState = response.data[0].nextApproverPath || [];

                $('#workflow_detail_start').val(response.data[0].submitterEntityName || '');

                renderWorkflow();
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $('#workflow_detail_loading').hide();
            });
    }

    $('#tableProjects').on('click', 'tbody tr', async function () {
        const id = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#project_id").val(id);
        $("#project_code").val(code);
        $("#project_name").val(`${code} - ${name}`);
        $("#project_name").css({ "background-color": "#e9ecef" });

        getBusinessDocumentType();

        $("#myBusinessDocumentTypeTrigger").css('cursor', 'pointer');
        $("#myBusinessDocumentTypeTrigger").attr({
            "data-toggle": "modal",
            "data-target": "#myBusinessDocumentType"
        });

        $("#myProjects").modal('toggle');
    });

    $('#tableGetBusinessDocumentType').on('click', 'tbody tr', function () {
        const id = $(this).find('input[data-trigger="sys_id_business_document"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $('#transaction_type_id').val(id);
        $('#transaction_type_name').val(name);
        $("#transaction_type_name").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

        $('#workflow_detail_loading').show();
        $('#workflow_detail_container').removeClass('collapsed-card');

        getWorkflow(id);

        $('#myBusinessDocumentType').modal('toggle');
    });

    $(document).ready(function () {
    });
</script>