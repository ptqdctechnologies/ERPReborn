<script>
    let isFromTo = false;
    let data = [];
    let dataReport = [];
    let currentPage = 1;
    let rowsPerPage = 10;
    let filteredData = [...data];
    let sortColumn = null;
    let sortOrder = 'asc';
    const documentTypeID = document.getElementById("documentTypeRefID");
    const organizationalDepartmentName = document.getElementById("organizationalDepartmentName"); // Finance & Accounting
    const organizationalJobPositionName = document.getElementById("organizationalJobPositionName"); // General Manager
    const budgetID = document.getElementById("budget_id");
    const budgetCode = document.getElementById("budget_code");
    const customerID = document.getElementById("customer_id");
    const date = document.getElementById("reimbursement_date_range");
    const startLimit = document.getElementById("start_limit");
    const endLimit = document.getElementById("end_limit");
    const totalData = document.getElementById("total_data");
    const printType = document.getElementById("print_type");

    function selectBudget(id, code, name) {
        $("#budget_id").val(id);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');
    }

    function resetForm() {
        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#customer_name").css('background-color', '#fff');
        $(`#customer_name`).val("");
        $(`#customer_code`).val("");
        $(`#customer_id`).val("");

        $("#reimbursement_date_range").css('background-color', '#fff');
        $(`#reimbursement_date_range`).val("");
    }

    function getDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("Reimbursement.ReportRemToDNStore") !!}',
            data: {
                budget_code: budgetCode.value,
                customer_id: customerID.value,
                date: date.value
            },
            dataType: 'json',
            success: function (response) {
                data = (response.status === 200 && response.data[0]) ? response.data : [];
                dataReport = data;

                filteredData = [...data];
                currentPage = (response.status === 200 && response.data[0]) ? 1 : '-';
                sortColumn = null;
                sortOrder = 'asc';

                renderPage();
                renderPagination();

                $('#table_container').css("display", "block");

                HideLoading();
            },
            error: function (xhr, status, error) {
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log('xhr, status, error', xhr, status, error);
            }
        })
    }

    function exportDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("Reimbursement.PrintExportReportRemToDN") !!}',
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
                    link.download = "Export Report Reimbursement to Debit Note.pdf";
                } else {
                    link.download = "Export Report Reimbursement to Debit Note.xlsx";
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
        });

        HideLoading();
    }

    function renderTable(data) {
        const tbody = document.querySelector('#table_summary tbody');
        tbody.innerHTML = '';

        let lastTransactionNumber = null;
        let rowspan = 1;
        let rowIndex = 0;

        data.forEach((item, ind) => {
            const row = document.createElement('tr');

            const rowNumber = (currentPage - 1) * rowsPerPage + ind + 1;

            const noCell = document.createElement('td');
            noCell.textContent = isNaN(rowNumber) ? '-' : rowNumber;
            row.appendChild(noCell);

            const remNumberCell = document.createElement('td');
            remNumberCell.textContent = item.REM_Number ?? '-';

            if (lastTransactionNumber === item.REM_Number) {
                remNumberCell.style.display = 'none';
                rowspan++;
            } else {
                if (rowspan > 1) {
                    const targetIndex = rowIndex - rowspan;
                    if (tbody.rows[targetIndex]) {
                        tbody.rows[targetIndex].cells[1].rowSpan = rowspan;
                    }
                    // tbody.rows[rowIndex - rowspan].cells[1].rowSpan = rowspan;
                }
                lastTransactionNumber = item.REM_Number;
                rowspan = 1;
            }

            row.appendChild(remNumberCell);

            const remDateCell = document.createElement('td');
            remDateCell.textContent = item.REM_Date ?? '-';
            row.appendChild(remDateCell);

            const remCustomerCell = document.createElement('td');
            remCustomerCell.classList.add('text-wrap');
            remCustomerCell.textContent = `${item.REM_CustomerCode ?? ''} - ${item.REM_CustomerName ?? ''}`;
            row.appendChild(remCustomerCell);

            const remTotalIDRCell = document.createElement('td');
            remTotalIDRCell.textContent = isNaN(item.REM_Total_IDR) ? '-' : Utils.formatCurrency(item.REM_Total_IDR);
            row.appendChild(remTotalIDRCell);

            const remTotalOtherCell = document.createElement('td');
            remTotalOtherCell.textContent = isNaN(item.REM_Total_Other_Currency) ? '-' : Utils.formatCurrency(item.REM_Total_Other_Currency);
            row.appendChild(remTotalOtherCell);

            const remTotalEquivalentCell = document.createElement('td');
            remTotalEquivalentCell.textContent = isNaN(item.REM_Total_Equivalent_IDR) ? '-' : Utils.formatCurrency(item.REM_Total_Equivalent_IDR);
            row.appendChild(remTotalEquivalentCell);

            const balanceRemToPaymentCell = document.createElement('td');
            balanceRemToPaymentCell.textContent = isNaN(item.balanceREM_ToPayment) ? '-' : Utils.formatCurrency(item.balanceREM_ToPayment);
            row.appendChild(balanceRemToPaymentCell);

            const remStatusCell = document.createElement('td');
            remStatusCell.textContent = item.REM_Status ?? '-';
            row.appendChild(remStatusCell);

            const dnNumberCell = document.createElement('td');
            dnNumberCell.textContent = item.DN_Number ?? '-';
            row.appendChild(dnNumberCell);

            const dnDateCell = document.createElement('td');
            dnDateCell.textContent = item.DN_Date ?? '-';
            row.appendChild(dnDateCell);

            const dnTotalIDRCell = document.createElement('td');
            dnTotalIDRCell.textContent = isNaN(item.REM_Total_IDR) ? '-' : Utils.formatCurrency(item.REM_Total_IDR);
            row.appendChild(dnTotalIDRCell);

            const dnTotalOtherCell = document.createElement('td');
            dnTotalOtherCell.textContent = isNaN(item.REM_Total_Other_Currency) ? '-' : Utils.formatCurrency(item.REM_Total_Other_Currency);
            row.appendChild(dnTotalOtherCell);

            const dnTotalEquivalentCell = document.createElement('td');
            dnTotalEquivalentCell.textContent = isNaN(item.REM_Total_Equivalent_IDR) ? '-' : Utils.formatCurrency(item.REM_Total_Equivalent_IDR);
            row.appendChild(dnTotalEquivalentCell);

            const balanceRemToDebitNoteCell = document.createElement('td');
            balanceRemToDebitNoteCell.textContent = isNaN(item.balanceREM_ToDN) ? '-' : Utils.formatCurrency(item.balanceREM_ToPayment);
            row.appendChild(balanceRemToDebitNoteCell);

            const dnStatusCell = document.createElement('td');
            dnStatusCell.textContent = item.DN_Status ?? '-';
            row.appendChild(dnStatusCell);

            tbody.appendChild(row);
            rowIndex++;
        });

        if (rowspan > 1) {
            const targetIndex = tbody.rows.length - rowspan;
            if (tbody.rows[targetIndex]) {
                tbody.rows[targetIndex].cells[1].rowSpan = rowspan;
            }
            // tbody.rows[tbody.rows.length - rowspan].cells[1].rowSpan = rowspan;
        }
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
            "rem_number": "",
            "rem_date": "",
            "rem_customer": "",
            "rem_total": "",
            "rem_total_other": "",
            "rem_total_equivalent": "",
            "rem_status": "",
            "dn_number": "",
            "dn_date": "",
            "dn_total": "",
            "dn_total_other": "",
            "dn_total_equivalent": "",
            "dn_status": "",
            "balance_rem_to_payment": "",
            "balance_rem_to_dn": ""
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

    function validateShowButton() {
        const isBudgetIDNotEmpty = budgetID.value.trim() !== '';
        const isCustomerIDNotEmpty = customerID.value.trim() !== '';
        const isDateNotEmpty = date.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isCustomerIDNotEmpty ||
            isDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#customer_name", "#customerMessage");
            ErrorHandler.hideErrorInputMessage("#reimbursement_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#customer_name", "#customerMessage");
            ErrorHandler.showErrorInputMessage("#reimbursement_date_range", "#dateRangeMessage");
        }
    }

    function validateExportButton() {
        if (dataReport.length > 0) {
            exportDataReport();
        } else {
            ErrorNotif("No data available to export. Please display the data first.");
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

    $('#tableProjects').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val("");
        $("#budget_code").val("");
        $("#budget_name").val("");
        $("#budget_name").css('background-color', '#fff');

        if (Utils.isUserAuthorizedForReport()) {
            selectBudget(sysId, code, name);
        } else {
            Utils.showBudgetLoading();

            userAllowedToInvolve(sysId, code, name, documentTypeID.value, selectBudget);
        }

        ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");

        $('#myProjects').modal('toggle');
    });

    $('#tableGetCustomer').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_customer"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#customer_id").val(sysId);
        $("#customer_code").val(code);
        $("#customer_name").val(`${code} - ${name}`);
        $("#customer_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#customer_name", "#customerMessage");

        $('#myCustomers').modal('toggle');
    });

    $(document).ready(function () {
        renderPage();
        renderPagination();
        getModalCustomers();

        $('#reimbursement_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#reimbursement_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#reimbursement_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#reimbursement_date_range", "#dateRangeMessage");
        });

        $('#reimbursement_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#reimbursement_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#reimbursement_date_range_container_icon').on('click', function () {
            $('#reimbursement_date_range').trigger('click');
        });
    });
</script>