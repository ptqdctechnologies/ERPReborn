<script>
    const dataWorker = JSON.parse(document.getElementById('TableReportAdvanceSummary').dataset.worker);

    function populateTable(data) {
        const tableBody = document.getElementById('dataBody');
        tableBody.innerHTML = ''; 

        data.forEach((dataWorkers, index) => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${dataWorkers.Sys_ID}</td>
                <td>${formatDate(dataWorkers.DocumentDateTimeTZ)}</td>
                <td>${dataWorkers.CombinedBudgetSectionName}</td>
                <td class="sticky-col second-col-asf-expense-qty">${dataWorkers.CombinedBudgetSectionCode}</td>
                <td class="sticky-col second-col-asf-expense-price">${dataWorkers.Sys_RPK}</td>
                <td class="sticky-col first-col-asf-expense-total">${dataWorkers.CombinedBudgetSectionCode}</td>
                <td class="sticky-col first-col-asf-amount-qty">${dataWorkers.Sys_RPK}</td>
                <td>IDR</td>
                <td>${dataWorkers.BeneficiaryWorkerName}</td>
                <td>Sudah Diproses</td>
            `;

            tableBody.appendChild(row);
        });
    }

    populateTable(dataWorker);
</script>