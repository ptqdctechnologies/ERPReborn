<script>
    const dataWorker = JSON.parse(document.getElementById('TableReportAdvanceSummary').dataset.pr);

    function populateTable(data) {
        const tableBody = document.getElementById('dataBody');
        tableBody.innerHTML = ''; 

        data.forEach((dataWorkers, index) => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${dataWorkers.documentNumber}</td>
                <td>${formatDate(dataWorkers.documentDateTimeTZ)}</td>
                <td>${dataWorkers.combinedBudgetSectionName}</td>
                <td class="sticky-col second-col-asf-expense-qty">${dataWorkers.businessDocument_RefID}</td>
                <td class="sticky-col second-col-asf-expense-price">${dataWorkers.sys_Branch_RefID}</td>
                <td class="sticky-col first-col-asf-expense-total">${dataWorkers.businessDocument_RefID}</td>
                <td class="sticky-col first-col-asf-amount-qty">${dataWorkers.sys_Branch_RefID}</td>
                <td>IDR</td>
                <td>${dataWorkers.requesterWorkerName}</td>
                <td>Sudah Diproses</td>
            `;

            tableBody.appendChild(row);
        });
    }

    populateTable(dataWorker);
</script>