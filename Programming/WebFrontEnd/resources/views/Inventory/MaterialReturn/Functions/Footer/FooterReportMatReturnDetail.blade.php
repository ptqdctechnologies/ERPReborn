<script>
    const dataWorker = JSON.parse(document.getElementById('TableReportAdvanceSummary').dataset.advance);

    function populateTable(data) {
        const tableBody = document.getElementById('dataBody');
        tableBody.innerHTML = ''; 

        data.forEach((dataWorkers, index) => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${index + 1}</td>
                <td>DOR-2400000${index + 1}</td>
                <td>${dataWorkers.Sys_ID}</td>
                <td>${dataWorkers.CombinedBudgetSectionCode}</td>
                <td>${dataWorkers.Sys_RPK * index}</td>
                <td>${dataWorkers.CombinedBudgetSectionCode * dataWorkers.Sys_RPK}</td>
                <td>${dataWorkers.RequesterWorkerName}</td>
            `;

            tableBody.appendChild(row);
        });
    }

    populateTable(dataWorker);
</script>