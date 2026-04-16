<script>
    let isFromTo = false;
    let data = [];
    const documentTypeID = document.getElementById("documentTypeRefID");
    const organizationalDepartmentName = document.getElementById("organizationalDepartmentName"); // Finance & Accounting
    const organizationalJobPositionName = document.getElementById("organizationalJobPositionName"); // General Manager
    const startLimit = document.getElementById("start_limit");
    const endLimit = document.getElementById("end_limit");
    const totalData = document.getElementById("total_data");
    const budgetID = document.getElementById("budget_id");
    const transTypeID = document.getElementById("trans_type_id");
    const tranoID = document.getElementById("trano_id");
    const bankID = document.getElementById("bank_id");
    const fromToID = document.getElementById("from_to_id");
    const journalDate = document.getElementById("journal_date_range");
    let currentPage = 1;
    let rowsPerPage = 10;
    let filteredData = [...data];
    let sortColumn = null;
    let sortOrder = 'asc';
    let totalPages = Math.ceil(data.length / rowsPerPage);

    function selectBudget(id, code, name) {
        $("#budget_id").val(id);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');
    }

    function pickBanksAccount(value) {
        isFromTo = value;
    }

    function resetForm() {
        isFromTo = false;
        data = [];
        currentPage = 1;
        rowsPerPage = 10;
        filteredData = [...data];
        sortColumn = null;
        sortOrder = 'asc';

        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#trans_type_name").css('background-color', '#fff');
        $(`#trans_type_name`).val("");
        $(`#trans_type_id`).val("");

        $("#trano_name").css('background-color', '#fff');
        $(`#trano_name`).val("");
        $(`#trano_id`).val("");
        $(`#trano_code`).val("");

        $("#bank_name").css('background-color', '#fff');
        $(`#bank_name`).val("");
        $(`#bank_id`).val("");
        $(`#bank_code`).val("");

        $("#from_to_name").css('background-color', '#fff');
        $(`#from_to_name`).val("");
        $(`#from_to_id`).val("");
        $(`#from_to_code`).val("");

        $("#journal_date_range").css('background-color', '#fff');
        $(`#journal_date_range`).val("");
    }

    function getDataReport() {
        ShowLoading();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("Journal.ReportPaymentJournalStore") !!}',
            data: {},
            dataType: 'json',
            success: function (response) {
                if (response.status === 200 && response.data[0]) {
                    data = response.data;

                    filteredData = [...data];
                    currentPage = 1;
                    sortColumn = null;
                    sortOrder = 'asc';

                    renderPage();
                    renderPagination();

                    $('#table_container').css("display", "block");
                } else {
                    $('#table_container').css("display", "none");
                    ErrorNotif("No data available for the selected criteria.");
                }

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
        tbody.innerHTML = ''; // Clear previous rows

        let lastTransactionNumber = null;
        let rowspan = 1;
        let rowIndex = 0;

        data.forEach((item) => {
            const row = document.createElement('tr');

            // No
            const noCell = document.createElement('td');
            noCell.textContent = item.no;
            row.appendChild(noCell);

            // Transaction Number with rowspan
            const transNoCell = document.createElement('td');
            transNoCell.textContent = item.transaction_number;

            // If transaction_number is the same as previous, remove current cell
            if (lastTransactionNumber === item.transaction_number) {
                transNoCell.style.display = 'none';  // Hide the current cell to create rowspan
                rowspan++;
            } else {
                if (rowspan > 1) {
                    // Apply rowspan to the previous row
                    tbody.rows[rowIndex - rowspan].cells[1].rowSpan = rowspan;
                }
                lastTransactionNumber = item.transaction_number;
                rowspan = 1;
            }

            row.appendChild(transNoCell);

            // Other columns
            const dateCell = document.createElement('td');
            dateCell.textContent = item.date;
            row.appendChild(dateCell);

            const budgetCell = document.createElement('td');
            budgetCell.textContent = item.budget;
            row.appendChild(budgetCell);

            const transValCell = document.createElement('td');
            transValCell.textContent = item.transaction_value;
            row.appendChild(transValCell);

            const typeCell = document.createElement('td');
            typeCell.textContent = item.type;
            row.appendChild(typeCell);

            const paymentDateCell = document.createElement('td');
            paymentDateCell.textContent = item.payment_date;
            row.appendChild(paymentDateCell);

            const paymentValCell = document.createElement('td');
            paymentValCell.textContent = item.payment_value;
            row.appendChild(paymentValCell);

            const balanceCell = document.createElement('td');
            balanceCell.textContent = item.balance;
            row.appendChild(balanceCell);

            const fromToCell = document.createElement('td');
            fromToCell.textContent = item.from_to;
            row.appendChild(fromToCell);

            const coaCodeCell = document.createElement('td');
            coaCodeCell.textContent = item.coa_code;
            row.appendChild(coaCodeCell);

            const attachmentCell = document.createElement('td');
            attachmentCell.textContent = item.attachment;
            row.appendChild(attachmentCell);

            tbody.appendChild(row);
            rowIndex++;
        });

        // Apply rowspan to the last group
        if (rowspan > 1) {
            tbody.rows[tbody.rows.length - rowspan].cells[1].rowSpan = rowspan;
        }
    }

    function updatePaginationInfo() {
        const pageInfo = document.querySelector('#pageNumbers');
        pageInfo.textContent = `${currentPage}`;
    }

    // Function to handle search filter
    function filterData(query, data) {
        if (!query) return data; // No search query, return data as-is
        return data.filter(item =>
            Object.values(item).some(val =>
                val.toString().toLowerCase().includes(query.toLowerCase())
            )
        );
    }

    // Function to change page
    function changePage(page) {
        currentPage = page;
        renderPage();
    }

    // Function to render the current page with pagination, search, and limit
    function renderPage() {
        // First, sort the filteredData based on the current sorting state
        const sortedData = sortData(filteredData); // Apply sorting

        // Now apply search filtering to the sorted data
        const searchQuery = document.querySelector('#searchInput').value;
        const filteredAndSortedData = filterData(searchQuery, sortedData); // Apply search filtering after sorting

        // Paginate the filtered and sorted data
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const pageData = filteredAndSortedData.length > 0 ? filteredAndSortedData.slice(start, end) : [{
            "no": "",
            "transaction_number": "",
            "date": "",
            "type": "",
            "budget": "",
            "transaction_value": "",
            "payment_value": "",
            "balance": "",
            "from_to": "",
            "coa_code": "",
            "attachment": "",
            "payment_date": "",
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

        // Clear previous pagination
        pageNumbersContainer.innerHTML = '';

        // Calculate the range of entries to be displayed (start and end)
        const startLimit = (currentPage - 1) * rowsPerPage + 1;
        const endLimit = Math.min(currentPage * rowsPerPage, data.length);
        document.querySelector('#start_limit').textContent = startLimit;
        document.querySelector('#end_limit').textContent = endLimit;
        document.querySelector('#total_data').textContent = data.length;

        // Create the page number buttons
        for (let i = 1; i <= totalPages; i++) {
            const pageNumber = document.createElement('a');
            pageNumber.textContent = i;
            pageNumber.style.padding = '.5em 1em';
            pageNumber.style.cursor = 'pointer';

            // Set active page style
            if (i == currentPage) {
                pageNumber.style.background = 'linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%)';
                pageNumber.style.border = '1px solid rgba(0, 0, 0, 0.3)';
            }

            // Add click event for each page
            pageNumber.addEventListener('click', () => {
                currentPage = i;
                renderPage(); // Function to render page content based on currentPage
                renderPagination();
            });

            pageNumbersContainer.appendChild(pageNumber);
        }

        // Disable "Previous" button if it's the first page
        if (currentPage == 1) {
            prevButton.style.pointerEvents = 'none';
            prevButton.style.opacity = '0.5';
        } else {
            prevButton.style.pointerEvents = 'auto';
            prevButton.style.opacity = '1';
        }

        // Disable "Next" button if it's the last page
        if (currentPage == totalPages) {
            nextButton.style.pointerEvents = 'none';
            nextButton.style.opacity = '0.5';
        } else {
            nextButton.style.pointerEvents = 'auto';
            nextButton.style.opacity = '1';
        }
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
        const isTransTypeIDNotEmpty = transTypeID.value.trim() !== '';
        const isTranoIDNotEmpty = tranoID.value.trim() !== '';
        const isBankIDNotEmpty = bankID.value.trim() !== '';
        const isFromToIDNotEmpty = fromToID.value.trim() !== '';
        const isJournalDateNotEmpty = journalDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isTransTypeIDNotEmpty ||
            isTranoIDNotEmpty ||
            isBankIDNotEmpty ||
            isFromToIDNotEmpty ||
            isJournalDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#trans_type_name", "#transactionTypeMessage");
            ErrorHandler.hideErrorInputMessage("#trano_name", "#tranoMessage");
            ErrorHandler.hideErrorInputMessage("#bank_name", "#bankMessage");
            ErrorHandler.hideErrorInputMessage("#from_to_name", "#fromToMessage");
            ErrorHandler.hideErrorInputMessage("#journal_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#trans_type_name", "#transactionTypeMessage");
            ErrorHandler.showErrorInputMessage("#trano_name", "#tranoMessage");
            ErrorHandler.showErrorInputMessage("#bank_name", "#bankMessage");
            ErrorHandler.showErrorInputMessage("#from_to_name", "#fromToMessage");
            ErrorHandler.showErrorInputMessage("#journal_date_range", "#dateRangeMessage");
        }
    }

    function validateExportButton() {
        if (dataReport.length > 0) {
            exportDataReport();
        } else {
            ErrorNotif("No data available to export. Please display the data first.");
        }
    }

    function getWorkflow(combinedBudgetID, combinedBudgetCode, combinedBudgetName) {
        $.ajax({
            type: 'POST',
            url: '{!! route("GetWorkflow") !!}',
            data: {
                businessDocumentType_RefID: documentTypeID.value,
                combinedBudget_RefID: combinedBudgetID
            }
        })
            .done(function (data, textStatus, jqXHR) {
                console.log("Success:", data);

                if (data.status == 200) {
                    $("#budget_id").val(combinedBudgetID);
                    $("#budget_code").val(combinedBudgetCode);
                    $("#budget_name").val(`${combinedBudgetCode} - ${combinedBudgetName}`);
                    $("#budget_name").css('background-color', '#e9ecef');

                    getSites(combinedBudgetID);

                    $("#mySitesTrigger").css('cursor', 'pointer');
                    $("#mySitesTrigger").attr({
                        "data-toggle": "modal",
                        "data-target": "#mySites"
                    });
                } else {
                    ErrorHandler.notifToast(
                        'error',
                        'You are not included in this budget',
                        'Error!'
                    );
                }
            })
            .fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Error:", errorThrown);
            })
            .always(function (jqXHR, textStatus, errorThrown) {
                $("#loadingBudget").hide();
                $("#iconBudget").show();
            });
    }

    // Add sorting functionality to table headers
    document.querySelectorAll('#table_summary th').forEach((header, index) => {
        header.addEventListener('click', () => {
            sortByColumn(index);
        });
    });

    // Event listeners
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

        if (Utils.isUserAuthorizedForReport()) {
            selectBudget(sysId, code, name);
        } else {
            $("#loadingBudget").show();
            $("#iconBudget").hide();

            getWorkflow(sysId, code, name);
        }

        ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");

        $('#myProjects').modal('toggle');
    });

    $('#tableBanksAccount').on('click', 'tbody tr', function () {
        const sysID = $(this).find('input[type="hidden"]').val();
        const bankName = $(this).find('td:nth-child(2)').text();
        const bankAccount = $(this).find('td:nth-child(3)').text();
        const accountName = $(this).find('td:nth-child(4)').text();

        if (isFromTo) {
            $('#from_to_name').val(`(${bankName}) ${bankAccount} - ${accountName}`);
            $('#from_to_id').val(sysID);
            $('#from_to_code').val(accountName);
            $("#from_to_name").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

            ErrorHandler.hideErrorInputMessage("#from_to_name", "#fromToMessage");
        } else {
            $('#bank_name').val(`(${bankName}) ${bankAccount} - ${accountName}`);
            $('#bank_id').val(sysID);
            $('#bank_code').val(accountName);
            $("#bank_name").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

            ErrorHandler.hideErrorInputMessage("#bank_name", "#bankMessage");
        }

        $('#myBanksAccount').modal('toggle');
    });

    $('#tableGetBusinessDocumentType').on('click', 'tbody tr', function () {
        const sysID = $(this).find('input[data-trigger="sys_id_business_document"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $('#trans_type_name').val(name);
        $('#trans_type_id').val(sysID);
        $("#trans_type_name").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

        ErrorHandler.hideErrorInputMessage("#trans_type_name", "#transactionTypeMessage");

        $('#myBusinessDocumentType').modal('toggle');
    });

    $(window).one('load', function () {
        getBanksAccount("", "");
        getBusinessDocumentType();
        renderPage();
        renderPagination();

        $('#journal_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#journal_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#journal_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#journal_date_range", "#dateRangeMessage");
        });

        $('#journal_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#journal_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#journal_date_range_container_icon').on('click', function () {
            $('#journal_date_range').trigger('click');
        });
    });
</script>