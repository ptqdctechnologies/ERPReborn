<script>
    const dataWorker = JSON.parse(document.getElementById('TableReportAdvanceSummary').dataset.pr);

    function populateTable(data) {
        const tableBody = document.getElementById('dataBody');
        tableBody.innerHTML = ''; 

        data.forEach((dataWorkers, index) => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${dataWorkers.sys_ID}</td>
                <td>${dataWorkers.requesterWorkerName}</td>
                <td>${dataWorkers.sys_PID}</td>
                <td class="sticky-col second-col-asf-expense-qty">${dataWorkers.combinedBudgetName}</td>
                <td class="sticky-col second-col-asf-expense-price">${dataWorkers.combinedBudgetSectionCode}</td>
                <td class="sticky-col first-col-asf-expense-total">IDR</td>
                <td class="sticky-col first-col-asf-amount-qty">${dataWorkers.businessDocument_RefID}</td>
                <td>${dataWorkers.requesterWorkerJobsPosition_RefID}</td>
            `;

            tableBody.appendChild(row);
        });
    }

    populateTable(dataWorker);
</script>