<script>
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
    const budgetName = document.getElementById("budget_name");
    const creditorID = document.getElementById("creditor_id");
    const debitorID = document.getElementById("debitor_id");
    const loanToSettlementDate = document.getElementById("loan_to_settlement_date_range");
    const startLimit = document.getElementById("start_limit");
    const endLimit = document.getElementById("end_limit");
    const totalData = document.getElementById("total_data");
    const printType = document.getElementById("print_type");

    function modalPayment(params, title) {
        // buka modal dulu
        $('#paymentModal').modal('show');

        // loading state
        // document.getElementById('modalBody').innerHTML = 'Loading...';

        try {

            // misalnya pakai id payment
            // const paymentId = item.id;

            // hit API
            // const response = await fetch(`/api/payment/${paymentId}`);

            // if (!response.ok) {
            //     throw new Error('Gagal mengambil data');
            // }

            // const result = await response.json();
            document.getElementById('paymentModalLabel').textContent = `${title ?? '-'}`;

            // render hasil API ke modal
            // document.getElementById('modalBody').innerHTML = `
            //     <p><strong>Payment No:</strong> -</p>
            //     <p><strong>Customer:</strong> -</p>
            //     <p><strong>Amount:</strong> -</p>
            //     <p><strong>Status:</strong> -</p>
            // `;

            const dummyData = [
                {
                    transaction_number: 'TRX/QDC/2026/001',
                    payment_value: 1500000,
                    currency: 'IDR',
                    payment_number_date: '2026-05-26'
                },
                {
                    transaction_number: 'TRX/QDC/2026/002',
                    payment_value: 2750000,
                    currency: 'IDR',
                    payment_number_date: '2026-05-25'
                },
                {
                    transaction_number: 'TRX/QDC/2026/003',
                    payment_value: 3200000,
                    currency: 'IDR',
                    payment_number_date: '2026-05-24'
                },
                {
                    transaction_number: 'TRX/QDC/2026/004',
                    payment_value: 4500000,
                    currency: 'IDR',
                    payment_number_date: '2026-05-23'
                },
                {
                    transaction_number: 'TRX/QDC/2026/005',
                    payment_value: 1850000,
                    currency: 'IDR',
                    payment_number_date: '2026-05-22'
                }
            ];

            $('#paymentTable').DataTable({
                destroy: true,
                data: dummyData,
                deferRender: true,
                scrollCollapse: true,
                scroller: true,
                // paging: false,     // mematikan limit/pagination
                searching: false, // mematikan search
                lengthChange: false, // mematikan dropdown limit per halaman
                // info: false        // opsional: hilangkan tulisan "Showing 1 to ..."
                columns: [
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            return (meta.row + 1);
                        }
                    },
                    {
                        data: 'transaction_number',
                        defaultContent: '-',
                        className: "text-nowrap",
                    },
                    {
                        data: 'payment_number_date',
                        defaultContent: '-',
                        className: "text-nowrap",
                    },
                    {
                        data: 'payment_value',
                        defaultContent: '-',
                        className: "text-nowrap",
                    },
                    {
                        data: 'currency',
                        defaultContent: '-',
                        className: "text-nowrap",
                    },
                    {
                        data: '-',
                        defaultContent: '-',
                        className: "text-nowrap",
                    }
                ]
            });
        } catch (error) {
            document.getElementById('modalBody').innerHTML = `
                <div class="text-danger">
                    ${error.message}
                </div>
            `;
        }
    }

    function selectBudget(id, code, name) {
        $("#budget_id").val(id);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');
    }

    function resetForm() {
        dataReport = [];

        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#loan_to_settlement_date_range").css('background-color', '#fff');
        $(`#loan_to_settlement_date_range`).val("");

        $("#creditor_name").css('background-color', '#fff');
        $(`#creditor_name`).val("");
        $(`#creditor_id`).val("");
        $(`#creditor_code`).val("");

        $("#debitor_name").css('background-color', '#fff');
        $(`#debitor_name`).val("");
        $(`#debitor_id`).val("");
        $(`#debitor_code`).val("");
    }

    function getDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("Loan.ReportLoantoLoanSettlementStore") !!}',
            data: {
                creditor_id: creditorID.value,
                debitor_id: debitorID.value,
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                loanToSettlementDate: loanToSettlementDate.value
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
        });
    }

    function exportDataReport() {
        Utils.showLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("Loan.PrintExportReportLoantoLoanSettlement") !!}',
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
                    link.download = 'Report Loan To Loan Settlement.pdf';
                } else {
                    link.download = 'Report Loan To Loan Settlement.xlsx';
                }

                link.click();

                window.URL.revokeObjectURL(link.href);

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

        // let lastTransactionNumber = null;
        // let rowspan = 1;
        let rowIndex = 0;

        data.forEach((item, ind) => {
            const row = document.createElement('tr');

            const rowNumber = (currentPage - 1) * rowsPerPage + ind + 1;

            const noCell = document.createElement('td');
            noCell.textContent = isNaN(rowNumber) ? '-' : rowNumber;
            row.appendChild(noCell);

            const loanNumberCell = document.createElement('td');
            loanNumberCell.textContent = item.loanNumber ?? '-';
            row.appendChild(loanNumberCell);

            const loanDateCell = document.createElement('td');
            loanDateCell.textContent = item.loanDate ?? '-';
            row.appendChild(loanDateCell);

            const loanDebitorCell = document.createElement('td');
            loanDebitorCell.textContent = item.loanDebitorName ?? '-';
            row.appendChild(loanDebitorCell);

            const loanCreditorCell = document.createElement('td');
            loanCreditorCell.textContent = item.loanCreditorName ?? '-';
            row.appendChild(loanCreditorCell);

            const loanRateCell = document.createElement('td');
            loanRateCell.textContent = '-';
            row.appendChild(loanRateCell);

            const loanTermCell = document.createElement('td');
            loanTermCell.textContent = '-';
            row.appendChild(loanTermCell);

            const loanPrincipalIDRCell = document.createElement('td');
            loanPrincipalIDRCell.textContent = '-';
            row.appendChild(loanPrincipalIDRCell);

            const loanPrincipalOtherCurrencyCell = document.createElement('td');
            loanPrincipalOtherCurrencyCell.textContent = '-';
            row.appendChild(loanPrincipalOtherCurrencyCell);

            const loanPrincipalEquivalentIDRCell = document.createElement('td');
            loanPrincipalEquivalentIDRCell.textContent = '-';
            row.appendChild(loanPrincipalEquivalentIDRCell);

            const loanPrincipalToPaymentCell = document.createElement('td');
            loanPrincipalToPaymentCell.textContent = '-';
            row.appendChild(loanPrincipalToPaymentCell);

            const loanPrincipalToSettlementCell = document.createElement('td');
            loanPrincipalToSettlementCell.textContent = '-';
            row.appendChild(loanPrincipalToSettlementCell);

            const loanIDRCell = document.createElement('td');
            loanIDRCell.textContent = '-';
            row.appendChild(loanIDRCell);

            const loanOtherCurrencyCell = document.createElement('td');
            loanOtherCurrencyCell.textContent = '-';
            row.appendChild(loanOtherCurrencyCell);

            const loanEquivalentIDRCell = document.createElement('td');
            loanEquivalentIDRCell.textContent = '-';
            row.appendChild(loanEquivalentIDRCell);

            const loanPaymentCell = document.createElement('td');
            const loanPaymentLink = document.createElement('a');
            loanPaymentLink.href = '#';
            loanPaymentLink.textContent = '0';
            loanPaymentLink.style.cssText = "text-decoration: underline;";

            loanPaymentLink.addEventListener('click', async function (e) {
                e.preventDefault();

                modalPayment(item, item.loanNumber);
            });
            loanPaymentCell.appendChild(loanPaymentLink);
            row.appendChild(loanPaymentCell);

            const loanStatusCell = document.createElement('td');
            loanStatusCell.textContent = '-';
            row.appendChild(loanStatusCell);

            const loanRemarkCell = document.createElement('td');
            loanRemarkCell.textContent = '-';
            row.appendChild(loanRemarkCell);

            const loanSettlementNumberCell = document.createElement('td');
            loanSettlementNumberCell.textContent = item.loanSettleNumber ?? '-';
            row.appendChild(loanSettlementNumberCell);

            const loanSettlementDateCell = document.createElement('td');
            loanSettlementDateCell.textContent = item.loanSettleDate ?? '-';
            row.appendChild(loanSettlementDateCell);

            const loanSettlementDebitorCell = document.createElement('td');
            loanSettlementDebitorCell.textContent = '-';
            row.appendChild(loanSettlementDebitorCell);

            const loanSettlementCreditorCell = document.createElement('td');
            loanSettlementCreditorCell.textContent = '-';
            row.appendChild(loanSettlementCreditorCell);

            const loanSettlementIDRCell = document.createElement('td');
            loanSettlementIDRCell.textContent = '-';
            row.appendChild(loanSettlementIDRCell);

            const loanSettlementOtherCurrencyCell = document.createElement('td');
            loanSettlementOtherCurrencyCell.textContent = '-';
            row.appendChild(loanSettlementOtherCurrencyCell);

            const loanSettlementEquivalentIDRCell = document.createElement('td');
            loanSettlementEquivalentIDRCell.textContent = '-';
            row.appendChild(loanSettlementEquivalentIDRCell);

            const loanSettlementPaymentCell = document.createElement('td');
            loanSettlementPaymentCell.textContent = '-';
            row.appendChild(loanSettlementPaymentCell);

            const loanSettlementPenaltyIDRCell = document.createElement('td');
            loanSettlementPenaltyIDRCell.textContent = '-';
            row.appendChild(loanSettlementPenaltyIDRCell);

            const loanSettlementPenaltyOtherCurrencyCell = document.createElement('td');
            loanSettlementPenaltyOtherCurrencyCell.textContent = '-';
            row.appendChild(loanSettlementPenaltyOtherCurrencyCell);

            const loanSettlementPenaltyEquivalentIDRCell = document.createElement('td');
            loanSettlementPenaltyEquivalentIDRCell.textContent = '-';
            row.appendChild(loanSettlementPenaltyEquivalentIDRCell);

            const loanSettlementInterestIDRCell = document.createElement('td');
            loanSettlementInterestIDRCell.textContent = '-';
            row.appendChild(loanSettlementInterestIDRCell);

            const loanSettlementInterestOtherCurrencyCell = document.createElement('td');
            loanSettlementInterestOtherCurrencyCell.textContent = '-';
            row.appendChild(loanSettlementInterestOtherCurrencyCell);

            const loanSettlementInterestEquivalentIDRCell = document.createElement('td');
            loanSettlementInterestEquivalentIDRCell.textContent = '-';
            row.appendChild(loanSettlementInterestEquivalentIDRCell);

            const loanSettlementPaymentItemCell = document.createElement('td');
            const loanSettlementPaymentItemLink = document.createElement('a');
            loanSettlementPaymentItemLink.href = '#';
            loanSettlementPaymentItemLink.textContent = '0';
            loanSettlementPaymentItemLink.style.cssText = "text-decoration: underline;";

            loanSettlementPaymentItemLink.addEventListener('click', async function (e) {
                e.preventDefault();

                modalPayment(item, item.loanSettleNumber);
            });
            loanSettlementPaymentItemCell.appendChild(loanSettlementPaymentItemLink);
            row.appendChild(loanSettlementPaymentItemCell);

            const loanSettlementStatusCell = document.createElement('td');
            loanSettlementStatusCell.textContent = '-';
            row.appendChild(loanSettlementStatusCell);

            const loanSettlementRemarkCell = document.createElement('td');
            loanSettlementRemarkCell.textContent = '-';
            row.appendChild(loanSettlementRemarkCell);

            tbody.appendChild(row);
            rowIndex++;
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
            "loan_number": "",
            "loan_date": "",
            "loan_debitor": "",
            "loan_creditor": "",
            "loan_rate": "",
            "loan_term": "",
            "loan_principal_idr": "",
            "loan_principal_other_currency": "",
            "loan_principal_equivalent_idr": "",
            "loan_principal_payment": "",
            "loan_principal_settlement": "",
            "loan_total_idr": "",
            "loan_total_other_currency": "",
            "loan_total_equivalent_idr": "",
            "loan_payment": "",
            "loan_status": "",
            "loan_remark": "",
            "loan_settlement_number": "",
            "loan_settlement_date": "",
            "loan_settlement_debitor": "",
            "loan_settlement_creditor": "",
            "loan_settlement_settlement_idr": "",
            "loan_settlement_settlement_other_currency": "",
            "loan_settlement_settlement_equivalent_idr": "",
            "loan_settlement_settlement_to_payment": "",
            "loan_settlement_penalty_idr": "",
            "loan_settlement_penalty_other_currency": "",
            "loan_settlement_penalty_equivalent_idr": "",
            "loan_settlement_interest_idr": "",
            "loan_settlement_interest_other_currency": "",
            "loan_settlement_interest_equivalent_idr": "",
            "loan_settlement_payment": "",
            "loan_settlement_status": "",
            "loan_settlement_remark": ""
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
        const isCreditorIDNotEmpty = creditorID.value.trim() !== '';
        const isDebitorIDNotEmpty = debitorID.value.trim() !== '';
        const isLoanToSettlementDateNotEmpty = loanToSettlementDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isCreditorIDNotEmpty ||
            isDebitorIDNotEmpty ||
            isLoanToSettlementDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#creditor_name", "#creditorMessage");
            ErrorHandler.hideErrorInputMessage("#debitor_name", "#debitorMessage");
            ErrorHandler.hideErrorInputMessage("#loan_to_settlement_date_range", "#dateRangeMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#creditor_name", "#creditorMessage");
            ErrorHandler.showErrorInputMessage("#debitor_name", "#debitorMessage");
            ErrorHandler.showErrorInputMessage("#loan_to_settlement_date_range", "#dateRangeMessage");
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

    $('#tableSuppliers').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();
        const address = $(this).find('td:nth-child(4)').text();

        if (isCreditorClicked) {
            $(`#creditor_id`).val(sysId);
            $(`#creditor_code`).val(code);
            $(`#creditor_name`).val(`${code} - ${name}`);
            $(`#creditor_name`).css({ 'background-color': '#e9ecef', 'border': '1px solid #ced4da' });
            $("#creditor_message").hide();

            ErrorHandler.hideErrorInputMessage("#creditor_name", "#creditorMessage");
        } else {
            $(`#debitor_id`).val(sysId);
            $(`#debitor_code`).val(code);
            $(`#debitor_name`).val(`${code} - ${name}`);
            $(`#debitor_name`).css({ 'background-color': '#e9ecef', 'border': '1px solid #ced4da' });
            $("#debitor_message").hide();

            ErrorHandler.showErrorInputMessage("#debitor_name", "#debitorMessage");
        }

        $("#mySuppliers").modal('toggle');
    });

    $('#tableProjects').on('click', 'tbody tr', function () {
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

    $('#tableLoans').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_loans"]').val();
        const name = $(this).find('td:nth-child(2)').text();

        $("#loan_id").val(sysId);
        $("#loan_number").val(name);
        $("#loan_number").css('background-color', '#e9ecef');

        $("#myLoans").modal('toggle');
    });

    $('#loanSettlementListTable').on('click', 'tbody tr', function () {
        const sysID = $(this).find('input[data-trigger="sys_id_loan_settlements"]').val();
        const trano = $(this).find('td:nth-child(2)').text();

        $("#loan_settlement_id").val(sysID);
        $("#loan_settlement_number").val(trano);
        $("#loan_settlement_number").css('background-color', '#e9ecef');

        $('#loanSettlementListModal').modal('toggle');
    });

    $('#myCreditorsTrigger').on('click', function () {
        isCreditorClicked = true;
        $("#titleSuppliers").text('Choose Creditor');
    });

    $('#myDebitorsTrigger').on('click', function () {
        isCreditorClicked = false;
        $("#titleSuppliers").text('Choose Debitor');
    });

    $(document).ready(function () {
        $('#loan_to_settlement_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#loan_to_settlement_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#loan_to_settlement_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#loan_to_settlement_date_range", "#dateRangeMessage");
        });

        $('#loan_to_settlement_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#loan_to_settlement_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#loan_to_settlement_date_range_container_icon').on('click', function () {
            $('#loan_to_settlement_date_range').trigger('click');
        });

        renderPage();
        renderPagination();
        getSuppliers();
    });
</script>