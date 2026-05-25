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
    const supplierID = document.getElementById("supplier_id");
    const purchaseOrderID = document.getElementById("purchase_order_id");
    const accountPayableID = document.getElementById("account_payable_id");
    const poToApDate = document.getElementById("po_to_ap_date_range");
    const startLimit = document.getElementById("start_limit");
    const endLimit = document.getElementById("end_limit");
    const totalData = document.getElementById("total_data");
    const printType = document.getElementById("print_type");

    function selectBudget(id, code, name) {
        $("#budget_id").val(id);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');

        getSites(id);

        $("#mySitesTrigger").css('cursor', 'pointer');
        $("#mySitesTrigger").attr({
            "data-toggle": "modal",
            "data-target": "#mySites"
        });
    }

    function resetForm() {
        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#sub_budget_name").css('background-color', '#fff');
        $(`#sub_budget_name`).val("");
        $(`#sub_budget_id`).val("");
        $(`#sub_budget_code`).val("");

        $("#purchase_order_number").css('background-color', '#fff');
        $(`#purchase_order_number`).val("");
        $(`#purchase_order_id`).val("");

        $("#account_payable_number").css('background-color', '#fff');
        $(`#account_payable_number`).val("");
        $(`#account_payable_id`).val("");

        $("#supplier_name").css('background-color', '#fff');
        $(`#supplier_name`).val("");
        $(`#supplier_id`).val("");

        $("#po_to_ap_date_range").css('background-color', '#fff');
        $(`#po_to_ap_date_range`).val("");

        ErrorHandler.hideErrorInputMessage("#purchase_order_number", "#purchaseOrderMessage");
        ErrorHandler.hideErrorInputMessage("#account_payable_number", "#accountPayableMessage");
    }

    function getDataReport() {
        ShowLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("PurchaseOrder.ReportPOtoAPStore") !!}',
            data: {
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                site_id: subBudgetID.value,
                site_code: subBudgetCode.value,
                supplier_id: supplierID.value,
                purchaseOrder_id: purchaseOrderID.value,
                accountPayable_id: accountPayableID.value,
                poToApDate: poToApDate.value,
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

    function exportDataReport() {
        ShowLoading();

        $.ajax({
            url: '{!! route("PurchaseOrder.PrintExportReportPOtoAP") !!}',
            type: 'POST',
            data: {
                dataReport: JSON.stringify(dataReport),
                printType: printType.value
            },
            xhrFields: {
                responseType: 'blob'
            },
            success: function (response) {
                var blob = new Blob([response], { type: response.type });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);

                if (response.type === "application/pdf") {
                    link.download = "Export Report Purchase Order to Account Payable.pdf";
                } else {
                    link.download = "Export Report Purchase Order to Account Payable.xlsx";
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

            const poNumberCell = document.createElement('td');
            poNumberCell.textContent = item.purchaseOrderNumber ?? '-';

            if (lastTransactionNumber === item.purchaseOrderNumber) {
                poNumberCell.style.display = 'none';
                rowspan++;
            } else {
                if (rowspan > 1) {
                    const targetIndex = rowIndex - rowspan;
                    if (tbody.rows[targetIndex]) {
                        tbody.rows[targetIndex].cells[1].rowSpan = rowspan;
                    }
                    // tbody.rows[rowIndex - rowspan].cells[1].rowSpan = rowspan;
                }
                lastTransactionNumber = item.purchaseOrderNumber;
                rowspan = 1;
            }

            row.appendChild(poNumberCell);

            const poBudgetCell = document.createElement('td');
            poBudgetCell.textContent = `${item.combinedBudgetCode ?? ''} - ${item.combinedBudgetName ?? ''}`;
            row.appendChild(poBudgetCell);

            const poDateCell = document.createElement('td');
            poDateCell.textContent = item.purchaseOrderDate ?? '-';
            row.appendChild(poDateCell);

            const poSupplierCell = document.createElement('td');
            poSupplierCell.textContent = `${item.supplierCode ?? ''} - ${item.supplierName ?? ''}`;
            row.appendChild(poSupplierCell);

            const poTotalIdrCell = document.createElement('td');
            poTotalIdrCell.textContent = item.purchaseOrderTotalIDR ?? '-';
            row.appendChild(poTotalIdrCell);

            const poTotalOtherCurrencyCell = document.createElement('td');
            poTotalOtherCurrencyCell.textContent = item.purchaseOrderTotalOtherCurrency ?? '-';
            row.appendChild(poTotalOtherCurrencyCell);

            const poTotalEquivalentIdrCell = document.createElement('td');
            poTotalEquivalentIdrCell.textContent = item.purchaseOrderTotalEquivalentIDR ?? '-';
            row.appendChild(poTotalEquivalentIdrCell);

            const poToApBalanceCell = document.createElement('td');
            poToApBalanceCell.textContent = item.balancePurchaseOrderToAccountPayable ?? '-';
            row.appendChild(poToApBalanceCell);

            const poStatusCell = document.createElement('td');
            poStatusCell.textContent = item.purchaseOrderStatus ?? '-';
            row.appendChild(poStatusCell);

            const apNumberCell = document.createElement('td');
            apNumberCell.textContent = item.accountPayableNumber ?? '-';
            row.appendChild(apNumberCell);

            const apDateCell = document.createElement('td');
            apDateCell.textContent = item.accountPayableDate ?? '-';
            row.appendChild(apDateCell);

            const apTotalIdrCell = document.createElement('td');
            apTotalIdrCell.textContent = item.accountPayableTotalIDR ?? '-';
            row.appendChild(apTotalIdrCell);

            const apTotalOtherCurrencyCell = document.createElement('td');
            apTotalOtherCurrencyCell.textContent = item.accountPayableTotalOtherCurrency ?? '-';
            row.appendChild(apTotalOtherCurrencyCell);

            const apTotalEquivalentIdrCell = document.createElement('td');
            apTotalEquivalentIdrCell.textContent = item.accountPayableTotalEquivalentIDR ?? '-';
            row.appendChild(apTotalEquivalentIdrCell);

            const apToPaymentBalanceCell = document.createElement('td');
            apToPaymentBalanceCell.textContent = item.balanceAPtoPayment ?? '-';
            row.appendChild(apToPaymentBalanceCell);

            const apStatusCell = document.createElement('td');
            apStatusCell.textContent = item.accountPayableStatus ?? '-';
            row.appendChild(apStatusCell);

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
            "po_number": "",
            "po_budget": "",
            "po_date": "",
            "po_supplier": "",
            "po_total_idr": "",
            "po_total_other_currency": "",
            "po_total_equivalent_idr": "",
            "po_to_ap_balance": "",
            "po_status": "",
            "ap_number": "",
            "ap_date": "",
            "ap_total_idr": "",
            "ap_total_other_currency": "",
            "ap_total_equivalent_idr": "",
            "ap_to_payment_balance": "",
            "ap_status": ""
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
        const isSubBudgetIDNotEmpty = subBudgetID.value.trim() !== '';
        const isSupplierIDNotEmpty = supplierID.value.trim() !== '';
        const isPurchaseOrderIDNotEmpty = purchaseOrderID.value.trim() !== '';
        const isAccountPayableIDNotEmpty = accountPayableID.value.trim() !== '';
        const isPoToApDateNotEmpty = poToApDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (
            isBudgetIDNotEmpty ||
            isSupplierIDNotEmpty ||
            isPurchaseOrderIDNotEmpty ||
            isAccountPayableIDNotEmpty ||
            isPoToApDateNotEmpty
        ) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#purchase_order_number", "#purchaseOrderMessage");
            ErrorHandler.hideErrorInputMessage("#account_payable_number", "#accountPayableMessage");
            ErrorHandler.hideErrorInputMessage("#po_to_ap_date_range", "#dateRangeMessage");
            ErrorHandler.hideErrorInputMessage("#supplier_name", "#supplierMessage");

            if (isBudgetIDNotEmpty || isAuthorizedRole) {
                getDataReport();
            } else {
                ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#purchase_order_number", "#purchaseOrderMessage");
            ErrorHandler.showErrorInputMessage("#account_payable_number", "#accountPayableMessage");
            ErrorHandler.showErrorInputMessage("#po_to_ap_date_range", "#dateRangeMessage");
            ErrorHandler.showErrorInputMessage("#supplier_name", "#supplierMessage");
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
                    selectBudget(combinedBudgetID, combinedBudgetCode, combinedBudgetName);
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

        if (Utils.isUserAuthorizedForReport()) {
            selectBudget(sysId, code, name);
        } else {
            $("#loadingBudget").show();
            $("#iconBudget").hide();

            getWorkflow(sysId, code, name);
        }

        hideErrorInputMessage("#budget_name", "#budgetMessage");

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

    $('#tableSuppliers').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#supplier_id").val(sysId);
        $("#supplier_name").val(`${code} - ${name}`);
        $("#supplier_name").css('background-color', '#e9ecef');
        ErrorHandler.hideErrorInputMessage("#supplier_name", "#supplierMessage");

        $("#mySuppliers").modal('toggle');
    });

    $('#TableSearchPORevision tbody').on('click', 'tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_po"]').val();
        const number = $(this).find('td:nth-child(2)').text();

        $("#purchase_order_id").val(sysId);
        $("#purchase_order_number").val(number);
        $("#purchase_order_number").css('background-color', '#e9ecef');
        ErrorHandler.hideErrorInputMessage("#purchase_order_number", "#purchaseOrderMessage");

        $("#mySearchPO").modal('toggle');
    });

    $('#tableAccountPayables').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_modal_account_payable"]').val();
        const trano = $(this).find('td:nth-child(2)').text();

        $("#account_payable_id").val(sysId);
        $("#account_payable_number").val(trano);
        $("#account_payable_number").css('background-color', '#e9ecef');
        ErrorHandler.hideErrorInputMessage("#account_payable_number", "#accountPayableMessage");

        $('#myAccountPayables').modal('hide');
    });

    $(document).ready(function () {
        renderPage();
        renderPagination();
        getSuppliers();
        getAccountPayable();
        getModalPurchaseOrder();

        $('#po_to_ap_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#po_to_ap_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#po_to_ap_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#po_to_ap_date_range", "#dateRangeMessage");
        });

        $('#po_to_ap_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#po_to_ap_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#po_to_ap_date_range_container_icon').on('click', function () {
            $('#po_to_ap_date_range').trigger('click');
        });
    });
</script>