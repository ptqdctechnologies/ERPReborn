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
    const subBudgetID = document.getElementById("sub_budget_id");
    const subBudgetCode = document.getElementById("sub_budget_code");
    const requesterID = document.getElementById("requester_id");
    const businessTripID = document.getElementById("business_trip_id");
    const businessTripSettlementID = document.getElementById("business_trip_settlement_id");
    const brfToBsfDate = document.getElementById("brf_to_bsf_date_range");
    const startLimit = document.getElementById("start_limit");
    const endLimit = document.getElementById("end_limit");
    const totalData = document.getElementById("total_data");
    const printType = document.getElementById("print_type");

    function getDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("BusinessTripRequest.ReportBusinessTripToBSFStore") !!}',
            data: {
                budget_code: budgetCode.value,
                site_code: subBudgetCode.value,
                requester_id: requesterID.value,
                business_trip_id: businessTripID.value,
                business_trip_settlement_id: businessTripSettlementID.value,
                brfToBsfDate: brfToBsfDate.value,
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

                $('#table_container').css("display", "block");

                HideLoading();
            },
            error: function (xhr, status, error) {
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log('xhr, status, error', xhr, status, error);
            }
        });
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

            const brfNumberCell = document.createElement('td');
            brfNumberCell.textContent = item.brfNumber ?? '-';

            if (lastTransactionNumber === item.brfNumber) {
                brfNumberCell.style.display = 'none';
                rowspan++;
            } else {
                if (rowspan > 1) {
                    const targetIndex = rowIndex - rowspan;
                    if (tbody.rows[targetIndex]) {
                        tbody.rows[targetIndex].cells[1].rowSpan = rowspan;
                    }
                    // tbody.rows[rowIndex - rowspan].cells[1].rowSpan = rowspan;
                }
                lastTransactionNumber = item.brfNumber;
                rowspan = 1;
            }

            row.appendChild(brfNumberCell);

            const brfDateCell = document.createElement('td');
            brfDateCell.textContent = item.brfDate ?? '-';
            row.appendChild(brfDateCell);

            const requesterCell = document.createElement('td');
            requesterCell.textContent = item.requesterName ?? '-';
            row.appendChild(requesterCell);

            const dateCommenceCell = document.createElement('td');
            dateCommenceCell.textContent = item.dateCommenceTravel ?? '-';
            row.appendChild(dateCommenceCell);

            const dateEndCell = document.createElement('td');
            dateEndCell.textContent = item.dateEndTravel ?? '-';
            row.appendChild(dateEndCell);

            const brfTotalCell = document.createElement('td');
            brfTotalCell.textContent = item.brfTotal ?? '-';
            row.appendChild(brfTotalCell);

            const brfPaymentCell = document.createElement('td');
            brfPaymentCell.textContent = item.brfPayment ?? '-';
            row.appendChild(brfPaymentCell);

            const brfStatusCell = document.createElement('td');
            brfStatusCell.textContent = item.brfStatus ?? '-';
            row.appendChild(brfStatusCell);

            const bsfNumberCell = document.createElement('td');
            bsfNumberCell.textContent = item.bsfNumber ?? '-';
            row.appendChild(bsfNumberCell);

            const bsfDateCell = document.createElement('td');
            bsfDateCell.textContent = item.bsfDate ?? '-';
            row.appendChild(bsfDateCell);

            const bsfTotalCell = document.createElement('td');
            bsfTotalCell.textContent = item.bsfTotal ?? '-';
            row.appendChild(bsfTotalCell);

            const bsfStatusCell = document.createElement('td');
            bsfStatusCell.textContent = item.bsfStatus ?? '-';
            row.appendChild(bsfStatusCell);

            const balancePaymentCell = document.createElement('td');
            balancePaymentCell.textContent = item.balanceBrfToPayment ?? '-';
            row.appendChild(balancePaymentCell);

            const balanceSettlementCell = document.createElement('td');
            balanceSettlementCell.textContent = item.balanceBrfToBsf ?? '-';
            row.appendChild(balanceSettlementCell);

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
            "brf_number": "",
            "brf_date": "",
            "brf_requester": "",
            "brf_commence_travel": "",
            "brf_end_travel": "",
            "brf_total": "",
            "brf_payment": "",
            "brf_status": "",
            "bsf_number": "",
            "bsf_date": "",
            "bsf_total": "",
            "bsf_status": "",
            "balance_payment": "",
            "balance_settlement": ""
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
        getDataReport();
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

    $('#tableProjects').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        // if (Utils.isUserAuthorizedForReport()) {
        //     selectBudget(sysId, code, name);
        // } else {
        //     $("#loadingBudget").show();
        //     $("#iconBudget").hide();

        //     getWorkflow(sysId, code, name);
        // }

        $("#budget_id").val(sysId);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');

        getSites(sysId);

        $("#mySitesTrigger").css('cursor', 'pointer');
        $("#mySitesTrigger").attr({
            "data-toggle": "modal",
            "data-target": "#mySites"
        });

        ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");

        $("#myProjects").modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode = $(this).find('td:nth-child(2)').text();
        const siteName = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css('background-color', '#e9ecef');

        $("#mySites").modal('toggle');
    });

    $('#tableRequesters').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_requesters"]').val();
        const name = $(this).find('td:nth-child(2)').text();
        const position = $(this).find('td:nth-child(3)').text();

        $("#requester_id").val(sysId);
        $("#requester_name").val(`${position} - ${name}`);
        $("#requester_name").css('background-color', '#e9ecef');

        ErrorHandler.hideErrorInputMessage("#requester_name", "#requesterMessage");

        $('#myRequesters').modal('hide');
    });

    $('#table_brf').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_brf"]').val();
        const sysBudgetId = $(this).find('input[data-trigger="sys_id_budget"]').val();
        const sysText = $(this).find('td:nth-child(2)').text();

        $("#business_trip_id").val(sysId);
        $("#business_trip_number").val(sysText);
        $("#business_trip_number").css({ "display": "block", "background-color": "#e9ecef" });

        $("#myBusinessTripRequest").modal('toggle');
    });

    $('#table_bsf').on('click', 'tbody tr', async function () {
        const sysId = $(this).find('input[data-trigger="sys_id_bsf"]').val();
        const sysText = $(this).find('td:nth-child(2)').text();

        $("#business_trip_settlement_id").val(sysId);
        $("#business_trip_settlement_number").val(sysText);
        $("#business_trip_settlement_number").css({ "display": "block", "background-color": "#e9ecef" });

        $("#myBusinessTripSettlement").modal('toggle');
    });

    $(document).ready(function () {
        renderPage();
        renderPagination();

        $('#brf_to_bsf_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#brf_to_bsf_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#brf_to_bsf_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#brf_to_bsf_date_range", "#dateRangeMessage");
        });

        $('#brf_to_bsf_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#brf_to_bsf_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#brf_to_bsf_date_range_container_icon').on('click', function () {
            $('#brf_to_bsf_date_range').trigger('click');
        });
    })
</script>