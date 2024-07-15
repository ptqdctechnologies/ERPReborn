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
                <td>${dataWorkers.Person_RefID}</td>
                <td>${dataWorkers.PersonName}</td>
                <td class="sticky-col second-col-asf-expense-qty">${dataWorkers.OrganizationalJobPositionName}</td>
                <td class="sticky-col second-col-asf-expense-price">${dataWorkers.Person_RefID}</td>
                <td class="sticky-col first-col-asf-expense-total">${dataWorkers.PersonName}</td>
                <td class="sticky-col first-col-asf-amount-qty">${dataWorkers.OrganizationalJobPositionName}</td>
                <td>${dataWorkers.Sys_ID}</td>
                <td>${dataWorkers.OrganizationalJobPositionName}</td>
                <td>${dataWorkers.Person_RefID}</td>
            `;

            tableBody.appendChild(row);
        });
    }

    populateTable(dataWorker);
</script>