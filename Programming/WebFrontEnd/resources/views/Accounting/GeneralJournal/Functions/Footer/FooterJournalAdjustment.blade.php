<script>
    let journalAdjustmentDetails = [];
    let currentIndexPickBudget   = null;
    let currentIndexPickSubBudget   = null;

    function pickBudget(index) {
        currentIndexPickBudget = index;
    }

    function pickSubBudget(index) {
        const budgetID = document.getElementById(`budget_id${index}`);

        currentIndexPickSubBudget = index;

        if (budgetID.value) {
            getSites(budgetID.value);
        }
    }

    function initiateJournalAdjustment() {
        journalAdjustmentDetails = [];
        addRowJournalAdjustment();
    }

    function addRowJournalAdjustment(value) {
        if (value) {
            $("#journal_type").prop("disabled", true);
        }

        const newRow = {
            budget_id: '',
            budget_name: '',
            site_budget_id: '',
            site_budget_name: '',
            coa_adjustment_id: '',
            coa_adjustment_name: '',
            coa_adjustment_status: '',
            value_adjustment: ''
        };

        journalAdjustmentDetails.push(newRow);

        onClickGeneralJournalButton();
        renderTableJournalAdjustment();
    }

    function removeRowJournalAdjustment(index) {
        journalAdjustmentDetails.splice(index, 1);
        renderTableJournalAdjustment();
    }

    function updateJournalAdjustmentField(index, field, value) {
        journalAdjustmentDetails[index][field] = value;
    }

    function renderTableJournalAdjustment() {
        const tbody = document.getElementById("journal_adjustment_body_table");
        tbody.innerHTML = "";

        journalAdjustmentDetails.forEach((row, index) => {
            const tr = document.createElement("tr");

            if (index === journalAdjustmentDetails.length - 1) {
                tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON PLUS -->
                            <div class="icon-plus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;
                                display:${index === journalAdjustmentDetails.length - 1 ? 'flex' : 'none !important'};"
                                onclick="addRowJournalAdjustment('clicked')">
                                <i class="fas fa-plus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                `;
            } else {
                tr.innerHTML = `
                    <td style="text-align: center; padding-left: 4px !important;">
                        <div class="d-flex justify-content-center">
                            <!-- ICON MINUS -->
                            <div class="icon-minus d-flex align-items-center justify-content-center" 
                                style="width:20px;height:20px;border-radius:100%;background-color:red;margin:2px;cursor:pointer;display:flex;"
                                onclick="{removeRowJournalAdjustment(${index});}">
                                <i class="fas fa-minus" style="color:#fff;"></i>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" data-toggle="modal" data-target="#myProjects" onclick="pickBudget(${index})" style="cursor:pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input type="text" id="budget_name${index}" class="form-control" readonly value="${row.budget_name}">
                            <input type="hidden" id="budget_id${index}" class="form-control" value="${row.budget_id}">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span id="mySiteTrigger${index}" class="input-group-text form-control" data-toggle="modal" onclick="pickSubBudget(${index})" style="cursor:pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input type="text" id="site_budget_name${index}" class="form-control" readonly value="${row.site_budget_name}">
                            <input type="hidden" id="site_budget_id${index}" class="form-control" value="${row.site_budget_id}">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text form-control" data-toggle="modal" data-target="#myGetChartOfAccount" onclick="pickCOA(${index})" style="cursor:pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <input type="text" id="coa_adjustment_name${index}" class="form-control" readonly value="${row.coa_adjustment_name}">
                            <input type="hidden" id="coa_adjustment_id${index}" class="form-control" value="${row.coa_adjustment_id}">
                        </div>
                    </td>
                    <td>
                        <select class="form-control" id="coa_adjustment_status${index}" onchange="updateJournalAdjustmentField(${index}, 'coa_adjustment_status', this.value)">
                            <option value="" disabled selected>Select a ...</option>
                            <option value="214000000000001" ${row.coa_adjustment_status == '214000000000001' ? 'selected' : ''}>DB</option>
                            <option value="214000000000002" ${row.coa_adjustment_status == '214000000000002' ? 'selected' : ''}>CR</option>
                        </select>
                    </td>
                    <td style="padding-right: .3rem;">
                        <input id="value_adjustment${index}" class="form-control number-without-negative" autocomplete="off" value="${row.value_adjustment ? currencyTotal(row.value_adjustment) : row.value_adjustment}" onchange="updateJournalAdjustmentField(${index}, 'value_adjustment', parseFloat(this.value.replace(/,/g, '')))" style="border-radius:0px;" />
                    </td>
                `;
            }

            tbody.appendChild(tr);
        });
    }

    $('#tableProjects').on('click', 'tbody tr', async function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_project"]').val();
        const projectCode = $(this).find('td:nth-child(2)').text();
        const projectName = $(this).find('td:nth-child(3)').text();

        $(`#budget_id${currentIndexPickBudget}`).val(sysId);
        $(`#budget_name${currentIndexPickBudget}`).val(`${projectCode} - ${projectName}`);
        $(`#mySiteTrigger${currentIndexPickBudget}`).attr('data-target', '#mySites');

        updateJournalAdjustmentField(currentIndexPickBudget, 'budget_id', parseInt(sysId));
        updateJournalAdjustmentField(currentIndexPickBudget, 'budget_name', `${projectCode} - ${projectName}`);

        getSites(sysId);

        $("#myProjects").modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode    = $(this).find('td:nth-child(2)').text();
        const siteName    = $(this).find('td:nth-child(3)').text();
        
        $(`#site_budget_id${currentIndexPickSubBudget}`).val(sysId);
        $(`#site_budget_name${currentIndexPickSubBudget}`).val(`${siteCode} - ${siteName}`);

        updateJournalAdjustmentField(currentIndexPickSubBudget, 'site_budget_id', parseInt(sysId));
        updateJournalAdjustmentField(currentIndexPickSubBudget, 'site_budget_name', `${siteCode} - ${siteName}`);
        
        $('#mySites').modal('hide');
    });
</script>