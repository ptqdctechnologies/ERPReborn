<script>
    const dataAdvance = JSON.parse(document.getElementById('TableReportAdvanceSummary').dataset.advance);

    function populateTable(data) {
        const tableBody = document.getElementById('dataBody');
        tableBody.innerHTML = ''; 

        data.forEach((dataAdvances, index) => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${dataAdvances.DocumentNumber}</td>
                <td>${dataAdvances.CombinedBudgetCode}</td>
                <td>${dataAdvances.CombinedBudgetSectionCode}</td>
                <td>Rp 1000</td>
                <td>${dataAdvances.Sys_RPK}</td>
                <td>${dataAdvances.BeneficiaryWorkerName}</td>
            `;

            tableBody.appendChild(row);
        });
    }

    populateTable(dataAdvance);
</script>