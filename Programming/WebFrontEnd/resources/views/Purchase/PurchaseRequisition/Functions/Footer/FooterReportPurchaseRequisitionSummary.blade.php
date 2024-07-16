<script>
    const dataWorker = JSON.parse(document.getElementById('TableReportAdvanceSummary').dataset.advance);

    function populateTable(data) {
        const tableBody = document.getElementById('dataBody');
        tableBody.innerHTML = ''; 

        data.forEach((dataWorkers, index) => {
            const row = document.createElement('tr');

            row.innerHTML = `
                <td>${index + 1}</td>
                <td>${dataWorkers.DocumentNumber}</td>
                <td>${formatDate(dataWorkers.DocumentDateTimeTZ)}</td>
                <td>${dataWorkers.BusinessDocument_RefID}</td>
                <td class="sticky-col second-col-asf-expense-qty">${dataWorkers.BusinessDocumentVersion_RefID}</td>
                <td class="sticky-col second-col-asf-expense-price">${dataWorkers.BeneficiaryWorkerName}</td>
            `;

            tableBody.appendChild(row);
        });
    }

    populateTable(dataWorker);
</script>