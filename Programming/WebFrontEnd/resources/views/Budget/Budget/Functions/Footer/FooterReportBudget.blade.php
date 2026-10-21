<style>
    /*
     * Table scroll behavior:
     * - The wrapper's height is fixed via JS (adjustTableScrollHeight) to always match
     *   header height + 10 body rows, regardless of the selected limit (10/20/50/100/ALL).
     * - Only this wrapper scrolls vertically; horizontal scrolling is disabled so cell
     *   content wraps instead of overflowing.
     * - thead cells are sticky so the header never scrolls out of view.
     */
    .table-scroll-wrapper {
        position: relative;
        overflow-y: auto;
        overflow-x: hidden;
    }

    #table_summary {
        width: 100%;
        margin-bottom: 0;
    }

    #table_summary th,
    #table_summary td {
        word-break: break-word;
        overflow-wrap: break-word;
    }

    #table_summary thead th {
        position: sticky;
        z-index: 4;
    }

    /* First header row sticks to the very top of the scroll area.
       The second header row's top offset is set dynamically in JS
       (adjustStickyHeaderOffsets) to equal the first row's height,
       since row height depends on rendered padding/line-height. */
    #table_summary thead tr:first-child th {
        top: 0;
    }

    /* Grand Total row stays pinned to the bottom of the scroll area while
       the body scrolls underneath it. z-index is below the header (4) so
       the header always wins if the table is ever short enough for both
       to be near each other, but above body rows (auto/0) so it never
       looks transparent or gets overlapped. */
    #table_summary tfoot th {
        position: sticky;
        bottom: 0;
        z-index: 3;
        background-color: #4B586A;
    }
</style>

<script>
    let isFromTo = false;
    let data = [];
    let dataReport = [];
    let currentPage = 1;
    let rowsPerPage = 10;
    let filteredData = [...data];
    let sortColumn = null;
    let sortOrder = 'asc';
    let totalRecords = 0;
    let totalPages = 0;

    function adjustStickyHeaderOffsets() {
        const thead = document.querySelector('#table_summary thead');
        if (!thead) return;

        const firstRow = thead.querySelector('tr:first-child');
        const secondRow = thead.querySelector('tr:nth-child(2)');

        if (!firstRow || !secondRow) return;

        const firstRowHeight = firstRow.getBoundingClientRect().height;

        secondRow.querySelectorAll('th').forEach(function (th) {
            th.style.top = firstRowHeight + 'px';
        });
    }

    function adjustTableScrollHeight() {
        const wrapper = document.getElementById('tableScrollWrapper');
        const thead = document.querySelector('#table_summary thead');
        const tbody = document.querySelector('#table_summary tbody');
        const tfoot = document.querySelector('#table_summary tfoot');

        if (!wrapper || !thead) return;

        const visibleRows = 10;
        const headerHeight = thead.getBoundingClientRect().height;
        const footerHeight = tfoot ? tfoot.getBoundingClientRect().height : 0;

        let rowHeight = 0;
        if (tbody && tbody.rows.length) {
            rowHeight = tbody.rows[0].getBoundingClientRect().height;
        }

        if (!rowHeight) {
            rowHeight = 45; // fallback estimate before any data has rendered
        }

        // Header + ~10 body rows + the sticky Grand Total row, so all three
        // are visible together before any scrolling is needed.
        wrapper.style.maxHeight = Math.ceil(headerHeight + (rowHeight * visibleRows) + footerHeight) + 'px';
    }

    function refreshTableLayout() {
        adjustStickyHeaderOffsets();
        adjustTableScrollHeight();
    }

    // -------------------------------------------------------------------------------

    function getDataReport(page = currentPage) {
        Utils.showLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("Budget.ReportBudgetStore") !!}',
            data: {
                // project_code: projectCode.value,
                // date: date.value,
                page: page,
                limit: rowsPerPage
            },
            dataType: 'json',
            success: function (response) {

                data = response.data || [];

                currentPage = response.page;
                rowsPerPage = response.limit;

                totalRecords = response.totalRecords;
                totalPages = Math.ceil(totalRecords / rowsPerPage);

                dataReport = data;

                renderTable(data);
                renderPagination();

                $('#table_container').show();

                // Recalculate once the table is visible and populated, so the
                // measured header/row heights are accurate.
                refreshTableLayout();

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

    function renderTable(data) {
        const tbody = document.querySelector('#table_summary tbody');
        tbody.innerHTML = '';

        let lastTransactionNumber = null;
        let lastTransactionDate = null;
        let lastTransactionSubBudget = null;

        let rowspanNumber = 1;
        let rowspanDate = 1;
        let rowspanSubBudget = 1;

        let rowIndex = 0;

        let totalBudget = 0;
        let totalRealization = 0;
        let totalPaymentBalanceARF = 0;
        let totalASF = 0;
        let totalPaymentASF = 0;
        let totalPaymentBalanceASF = 0;

        data.forEach((item, ind) => {
            const row = document.createElement('tr');

            const rowNumber = (currentPage - 1) * rowsPerPage + ind + 1;

            const noCell = document.createElement('td');
            noCell.textContent = isNaN(rowNumber) ? ind + 1 : rowNumber;
            row.appendChild(noCell);

            // NUMBER
            const numberCell = document.createElement('td');
            numberCell.textContent = item.number ?? '-';

            if (lastTransactionNumber === item.number) {
                numberCell.style.display = 'none';
                rowspanNumber++;
            } else {
                if (rowspanNumber > 1) {
                    const targetIndex = rowIndex - rowspanNumber;
                    if (tbody.rows[targetIndex]) {
                        tbody.rows[targetIndex].cells[1].rowSpan = rowspanNumber;
                    }
                }

                lastTransactionNumber = item.number;
                rowspanNumber = 1;
            }

            row.appendChild(numberCell);

            // DATE
            const dateCell = document.createElement('td');
            dateCell.textContent = item.date ?? '-';

            if (lastTransactionDate === item.date) {
                dateCell.style.display = 'none';
                rowspanDate++;
            } else {
                if (rowspanDate > 1) {
                    const targetIndex = rowIndex - rowspanDate;
                    if (tbody.rows[targetIndex]) {
                        tbody.rows[targetIndex].cells[2].rowSpan = rowspanDate;
                    }
                }

                lastTransactionDate = item.date;
                rowspanDate = 1;
            }

            row.appendChild(dateCell);

            // SUB BUDGET
            const subBudgetCell = document.createElement('td');
            subBudgetCell.textContent = item.sub_budget ?? '-';

            if (lastTransactionSubBudget === item.sub_budget) {
                subBudgetCell.style.display = 'none';
                rowspanSubBudget++;
            } else {
                if (rowspanSubBudget > 1) {
                    const targetIndex = rowIndex - rowspanSubBudget;
                    if (tbody.rows[targetIndex]) {
                        tbody.rows[targetIndex].cells[3].rowSpan = rowspanSubBudget;
                    }
                }

                lastTransactionSubBudget = item.sub_budget;
                rowspanSubBudget = 1;
            }

            row.appendChild(subBudgetCell);

            const workCell = document.createElement('td');
            workCell.textContent = item.work_id ?? '-';
            row.appendChild(workCell);

            const productCell = document.createElement('td');
            productCell.textContent = item.product ?? '-';
            row.appendChild(productCell);

            const budgetCell = document.createElement('td');
            budgetCell.textContent = item.budget_value != null
                ? Utils.formatCurrency(item.budget_value)
                : '-';
            row.appendChild(budgetCell);

            const realizationCell = document.createElement('td');
            realizationCell.textContent = item.realization_value != null
                ? Utils.formatCurrency(item.realization_value)
                : '-';
            row.appendChild(realizationCell);

            const balanceRemainingCell = document.createElement('td');
            balanceRemainingCell.textContent = item.balance_remaining != null
                ? Utils.formatCurrency(item.balance_remaining)
                : '-';
            row.appendChild(balanceRemainingCell);

            const balanceUsageCell = document.createElement('td');
            balanceUsageCell.textContent = item.balance_usage != null
                ? item.balance_usage
                : '-';
            row.appendChild(balanceUsageCell);

            tbody.appendChild(row);
            rowIndex++;
        });

        // FINAL ROWSPAN NUMBER
        if (rowspanNumber > 1) {
            const targetIndex = tbody.rows.length - rowspanNumber;
            if (tbody.rows[targetIndex]) {
                tbody.rows[targetIndex].cells[1].rowSpan = rowspanNumber;
            }
        }

        // FINAL ROWSPAN DATE
        if (rowspanDate > 1) {
            const targetIndex = tbody.rows.length - rowspanDate;
            if (tbody.rows[targetIndex]) {
                tbody.rows[targetIndex].cells[2].rowSpan = rowspanDate;
            }
        }

        // FINAL ROWSPAN SUB BUDGET
        if (rowspanSubBudget > 1) {
            const targetIndex = tbody.rows.length - rowspanSubBudget;
            if (tbody.rows[targetIndex]) {
                tbody.rows[targetIndex].cells[3].rowSpan = rowspanSubBudget;
            }
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
        renderTable(data);
    }

    function renderPagination() {
        totalPages = Math.ceil(totalRecords / rowsPerPage);

        const pageNumbersContainer = document.querySelector('#pageNumbers');
        const prevButton = document.querySelector('#prevPage');
        const nextButton = document.querySelector('#nextPage');

        pageNumbersContainer.innerHTML = '';

        // Tambahkan di sini
        if (rowsPerPage === 'ALL') {
            document.getElementById('prevPage').style.display = 'none';
            document.getElementById('nextPage').style.display = 'none';
            // document.getElementById('pageNumbers').textContent = '1';
            // document.getElementById('pageNumbers').style.padding = '.5em 1em';
            // document.getElementById('pageNumbers').style.marginRight = '0.5rem';
            // document.getElementById('pageNumbers').style.cursor = 'pointer';
            // document.getElementById('pageNumbers').style.background = 'linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)';
            // document.getElementById('pageNumbers').style.border = '1px solid rgba(0, 0, 0, 0.3)';
        } else {
            document.getElementById('prevPage').style.display = 'inline';
            document.getElementById('nextPage').style.display = 'inline';
        }

        const startLimitValue =
            totalRecords === 0 ? 0 : ((currentPage - 1) * rowsPerPage) + 1;

        const endLimitValue =
            Math.min(currentPage * rowsPerPage, totalRecords);

        document.querySelector('#start_limit').textContent = rowsPerPage == 'ALL' ? 1 : startLimitValue;
        document.querySelector('#end_limit').textContent = rowsPerPage == 'ALL' ? totalRecords : endLimitValue;
        document.querySelector('#total_data').textContent = totalRecords;

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
                // currentPage = i;
                // renderPage();
                // renderPagination();
                getDataReport(i);
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
        getDataReport();
    }

    document.querySelectorAll('#table_summary th').forEach((header, index) => {
        header.addEventListener('click', () => {
            sortByColumn(index);
        });
    });

    document.querySelector('#limitSelect').addEventListener('change', (e) => {
        // rowsPerPage = parseInt(e.target.value);
        // currentPage = 1;
        // renderPage();
        // renderPagination();

        // rowsPerPage = parseInt(e.target.value);
        // getDataReport(1);

        rowsPerPage = e.target.value;
        getDataReport(1);
    });

    document.querySelector('#prevPage').addEventListener('click', () => {
        if (currentPage > 1) {
            getDataReport(currentPage - 1);
        }
    });

    document.querySelector('#nextPage').addEventListener('click', () => {
        if (currentPage < totalPages) {
            getDataReport(currentPage + 1);
        }
    });

    $('#tableProjects').on('click', 'tbody tr', function () {
        const table = $('#tableProjects').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.sys_ID;
            const code = dataRow.code;
            const name = dataRow.name;

            $("#budget_name").val(`${code} - ${name}`);
            $("#budget_code").val(code);

            $("#budget_name").css("background-color", "#e9ecef");

            $("#mySitesTrigger").prop("disabled", false);
            $("#mySitesTrigger").css("cursor", "pointer");

            getSites(id);

            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
        }

        $("#myProjects").modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function () {
        const table = $('#tableSites').DataTable();
        const dataRow = table.row(this).data();

        if (dataRow) {
            const id = dataRow.Sys_ID;
            const code = dataRow.Code;
            const name = dataRow.Name;

            $("#sub_budget_number").val(`${code} - ${name}`);
            $("#sub_budget_code").val(code);

            $("#sub_budget_number").css("background-color", "#e9ecef");
        }

        $("#mySites").modal('toggle');
    });

    $(document).ready(function () {
        $("#mySitesTrigger").prop("disabled", true);
        $("#mySitesTrigger").css("cursor", "not-allowed");

        $('#budget_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#budget_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#budget_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            hideErrorInputMessage("#budget_date_range", "#dateRangeMessage");
        });

        $('#budget_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#budget_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#budget_date_range_container_icon').on('click', function () {
            $('#budget_date_range').trigger('click');
        });
    });
</script>