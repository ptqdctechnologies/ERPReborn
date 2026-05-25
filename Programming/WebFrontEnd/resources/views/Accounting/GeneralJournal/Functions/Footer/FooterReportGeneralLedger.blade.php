<script>
    // FinancialReport.ReportGeneralLedgerStore
    let data = [];
    let dataReport = [];
    let currentPage = 1;
    let rowsPerPage = 10;
    let filteredData = [...data];
    let sortColumn = null;
    let sortOrder = 'asc';
    const accountID = document.getElementById("account_id");
    const accountName = document.getElementById("account_name");
    const accountNumber = document.getElementById("account_number");
    const dateRange = document.getElementById("general_ledger_date_range");
    const startLimit = document.getElementById("start_limit");
    const endLimit = document.getElementById("end_limit");
    const totalData = document.getElementById("total_data");
    const printType = document.getElementById("print_type");

    function resetForm() {
        data = [];
        dataReport = [];
        currentPage = 1;
        rowsPerPage = 10;
        filteredData = [...data];
        sortColumn = null;
        sortOrder = 'asc';

        $("#account_name").css('background-color', '#fff');
        $(`#account_name`).val("");
        $(`#account_id`).val("");

        $("#general_ledger_date_range").css('background-color', '#fff');
        $(`#general_ledger_date_range`).val("");
    }

    function getDataReport() {
        Utils.showLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("FinancialReport.ReportGeneralLedgerStore") !!}',
            data: {
                account_number: accountNumber.value,
                date: dateRange.value
            },
            dataType: 'json',
            success: function (response) {
                console.log('response', response);
                data = (response.status === 200 && response.data[0]) ? response.data : [];
                dataReport = data;

                filteredData = [...data];
                currentPage = (response.status === 200 && response.data[0]) ? 1 : '-';
                sortColumn = null;
                sortOrder = 'asc';

                renderPage();
                renderPagination();

                $('#opening-balance-card').css("display", "block");
                $('#total-debit-card').css("display", "block");
                $('#total-credit-card').css("display", "block");
                $('#closing-balance-card').css("display", "block");
                $('#total-entries-card').css("display", "block");
                $('#table_container').css("display", "block");

                Utils.hideLoading();
            },
            error: function (xhr, status, error) {
                console.log('xhr, status, error', xhr, status, error);

                Utils.hideLoading();
                ErrorHandler.notifToast(
                    'error',
                    'An error occurred while processing the received data. Please try again later',
                    'Error!'
                );
            }
        });
    }

    function exportDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("FinancialReport.PrintExportReportGeneralLedger") !!}',
            data: {
                dataReport: JSON.stringify(dataReport),
                printType: printType.value
            },
            xhrFields: {
                responseType: 'blob'
            },
            success: function (response) {
                let blob = new Blob([response], { type: response.type });
                let link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);

                if (response.type === "application/pdf") {
                    link.download = "Export Report General Ledger.pdf";
                } else {
                    link.download = "Export Report General Ledger.xlsx";
                }

                link.click();

                window.URL.revokeObjectURL(link.href);

                HideLoading();
            },
            error: function (xhr, status, error) {
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log('xhr, status, error', xhr, status, error);
            }
        })
    }

    function renderTable(data) {
        const tbody = document.querySelector('#table_summary tbody');
        tbody.innerHTML = '';

        const grouped = data.reduce((acc, item) => {
            const key = item.chartOfAccountCode;

            if (!acc[key]) {
                acc[key] = {
                    chartOfAccountCode: item.chartOfAccountCode,
                    chartOfAccountName: item.chartOfAccountName,
                    items: []
                };
            }

            acc[key].items.push(item);

            return acc;
        }, {});

        let rowIndex = 0;

        Object.values(grouped).forEach(group => {

            // COA HEADER
            const header = document.createElement('tr');
            header.innerHTML = `
            <td colspan="8"><strong>${group.chartOfAccountCode} ${group.chartOfAccountName}</strong></td>
        `;
            tbody.appendChild(header);

            // DETAIL ROWS
            group.items.forEach((item, index) => {
                const row = document.createElement('tr');

                row.innerHTML = `
                    <td>${rowIndex + 1}</td>
                    <td>${item.date}</td>
                    <td>${item.journalNumber}</td>
                    <td>${item.description}</td>
                    <td>${item.refDocument}</td>
                    <td>${item.debit}</td>
                    <td>${item.credit}</td>
                    <td>${item.balance}</td>
                `;

                tbody.appendChild(row);

                rowIndex++;
            });
        });
    }

    function updatePaginationInfo() {
        const pageInfo = document.querySelector('#pageNumbers');
        pageInfo.textContent = `${currentPage}`;
    }

    function filterData(query, data) {
        if (!query) return data;

        const q = query.toLowerCase();

        return data.filter(item =>
            Object.values(item).some(val =>
                val != null && val.toString().toLowerCase().includes(q)
            )
        );
    }

    function changePage(page) {
        currentPage = page;
        renderPage();
    }

    function renderPage() {
        const sortedData = sortData(filteredData);

        const searchQuery = document.querySelector('#searchInput').value;
        const filteredAndSortedData = filterData(searchQuery, sortedData);

        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const pageData = filteredAndSortedData.length > 0 ? filteredAndSortedData.slice(start, end) : [{
            "no": "",
            "date": "",
            "journal_no": "",
            "description": "",
            "ref_doc": "",
            "debit": "",
            "credit": "",
            "balance": ""
        }];

        startLimit.textContent = start + 1;
        endLimit.textContent = Math.min(end, filteredAndSortedData.length);
        totalData.textContent = filteredAndSortedData.length;

        renderTable(pageData);
        updatePaginationInfo(filteredAndSortedData.length); // Update the page info based on filtered data
    }

    function renderPagination() {
        totalPages = Math.ceil(data.length / rowsPerPage);

        const pageNumbersContainer = document.querySelector('#pageNumbers');
        const prevButton = document.querySelector('#prevPage');
        const nextButton = document.querySelector('#nextPage');

        pageNumbersContainer.innerHTML = '';

        const startLimit = (currentPage - 1) * rowsPerPage + 1;
        const endLimit = Math.min(currentPage * rowsPerPage, data.length);
        document.querySelector('#start_limit').textContent = isNaN(startLimit) ? '0' : startLimit;
        document.querySelector('#end_limit').textContent = isNaN(endLimit) ? '0' : endLimit;
        document.querySelector('#total_data').textContent = data.length;

        let startPage = Math.max(1, currentPage - 1);
        let endPage = Math.min(totalPages, currentPage + 1);

        if (currentPage === 1) {
            endPage = Math.min(3, totalPages);
        }

        if (currentPage === totalPages) {
            startPage = Math.max(1, totalPages - 2);
        }

        if (startPage > 1) {
            const dots = document.createElement('span');

            if (data.length == 0) {
                dots.textContent = '';
            } else {
                dots.textContent = '...';
            }

            pageNumbersContainer.appendChild(dots);
        }

        for (let i = startPage; i <= endPage; i++) {
            const pageNumber = document.createElement('a');
            pageNumber.textContent = i;
            pageNumber.style.padding = '.5em 1em';
            pageNumber.style.cursor = 'pointer';

            if (i == currentPage) {
                pageNumber.style.background = 'linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)';
                pageNumber.style.border = '1px solid rgba(0, 0, 0, 0.3)';
            }

            pageNumber.addEventListener('click', () => {
                currentPage = i;
                renderPage();
                renderPagination();
            });

            pageNumbersContainer.appendChild(pageNumber);
        }

        if (endPage < totalPages) {
            const dots = document.createElement('span');

            if (data.length == 0) {
                dots.textContent = '';
            } else {
                dots.textContent = '...';
            }

            pageNumbersContainer.appendChild(dots);
        }

        prevButton.style.marginRight = '0.5rem';
        prevButton.style.pointerEvents = currentPage == 1 ? 'none' : 'auto';
        prevButton.style.opacity = currentPage == 1 ? '0.5' : '1';

        nextButton.style.marginLeft = '0.5rem';
        nextButton.style.pointerEvents = currentPage == totalPages ? 'none' : 'auto';
        nextButton.style.opacity = currentPage == totalPages ? '0.5' : '1';
    }

    function sortData(data) {
        if (!sortColumn) return data; // If no column is being sorted, return the data as-is

        return [...data].sort((a, b) => {
            const aValue = a[sortColumn];
            const bValue = b[sortColumn];

            if (aValue < bValue) return sortOrder === 'asc' ? -1 : 1;
            if (aValue > bValue) return sortOrder === 'asc' ? 1 : -1;
            return 0;
        });
    }

    function sortByColumn(index) {
        if (!data.length) return;

        const columnNames = Object.keys(data[0]); // Get the column names based on the data
        const columnName = columnNames[index];

        // Toggle the sort order if the same column is clicked again
        if (sortColumn === columnName && sortOrder === 'asc') {
            sortOrder = 'desc';
        } else {
            sortOrder = 'asc';
        }

        sortColumn = columnName; // Set the column to sort by
        renderPage(); // Re-render the table
        renderPagination();
    }

    function validateExportButton() {
        if (dataReport.length > 0) {
            exportDataReport();
        } else {
            ErrorHandler.notifToast(
                'error',
                'No data available to export. Please display the data first',
                'Error!'
            );
        }
    }

    document.querySelectorAll('#table_summary th').forEach((header, index) => {
        header.addEventListener('click', () => {
            sortByColumn(index);
        });
    });

    document.querySelector('#searchInput').addEventListener('input', () => {
        currentPage = 1;
        renderPage();
        renderPagination();
    });

    document.querySelector('#limitSelect').addEventListener('change', (e) => {
        rowsPerPage = parseInt(e.target.value);
        currentPage = 1;
        renderPage();
        renderPagination();
    });

    document.querySelector('#prevPage').addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            renderPage();
            renderPagination();
        }
    });

    document.querySelector('#nextPage').addEventListener('click', () => {
        if (currentPage * rowsPerPage < filteredData.length) {
            currentPage++;
            renderPage();
            renderPagination();
        }
    });

    $('#tableInstitutionBankAccount').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_bank_account_list"]').val();
        const bankAcronym = $(this).find('td:nth-child(2)').text();
        const accountNumber = $(this).find('td:nth-child(3)').text();
        const accountName = $(this).find('td:nth-child(4)').text();

        $("#account_id").val(sysId);
        $("#account_number").val(accountNumber);
        $("#account_name").val(`(${bankAcronym}) ${accountNumber} - ${accountName}`);
        $("#account_name").css('background-color', '#e9ecef');

        $('#myInstitutionBankAccount').modal('toggle');
    });

    $(document).ready(function () {
        renderPage();
        renderPagination();
        getInstitutionBankAccount();

        $('#general_ledger_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#general_ledger_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#general_ledger_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
        });

        $('#general_ledger_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#general_ledger_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#general_ledger_date_range_container_icon').on('click', function () {
            $('#general_ledger_date_range').trigger('click');
        });
    });
</script>