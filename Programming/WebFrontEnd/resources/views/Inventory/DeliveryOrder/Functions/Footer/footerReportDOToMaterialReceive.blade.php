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
    const doToMrDate = document.getElementById("do_to_mr_date_range");
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
        isFromTo = false;
        data = [];
        dataReport = [];
        currentPage = 1;
        rowsPerPage = 10;
        filteredData = [...data];
        sortColumn = null;
        sortOrder = 'asc';

        $("#delivery_order_number").css('background-color', '#fff');
        $(`#delivery_order_number`).val("");
        $(`#delivery_order_id`).val("");

        $("#material_receive_number").css('background-color', '#fff');
        $(`#material_receive_number`).val("");
        $(`#material_receive_id`).val("");

        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#do_to_mr_date_range").css('background-color', '#fff');
        $(`#do_to_mr_date_range`).val("");

        $("#delivery_from_name").css('background-color', '#fff');
        $(`#delivery_from_name`).val("");
        $(`#delivery_from_id`).val("");

        $("#delivery_to_name").css('background-color', '#fff');
        $(`#delivery_to_name`).val("");
        $(`#delivery_to_id`).val("");
    }

    function getDataReport() {
        Utils.showLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("DeliveryOrder.ReportDOToMaterialReceiveStore") !!}',
            data: {
                budget_code: budgetCode.value,
                doToMrDate: doToMrDate.value
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
        Utils.showLoading();

        $.ajax({
            type: 'POST',
            url: '{!! route("PurchaseOrder.PrintExportReportPOtoDO") !!}',
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
                    link.download = 'Report Delivery Order To Material Receive.pdf';
                } else {
                    link.download = 'Report Delivery Order To Material Receive.xlsx';
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
        })
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

            const doNumberCell = document.createElement('td');
            doNumberCell.textContent = item.DO_Number ?? '-';

            if (lastTransactionNumber === item.DO_Number) {
                doNumberCell.style.display = 'none';
                rowspan++;
            } else {
                if (rowspan > 1) {
                    const targetIndex = rowIndex - rowspan;
                    if (tbody.rows[targetIndex]) {
                        tbody.rows[targetIndex].cells[1].rowSpan = rowspan;
                    }
                    // tbody.rows[rowIndex - rowspan].cells[1].rowSpan = rowspan;
                }
                lastTransactionNumber = item.DO_Number;
                rowspan = 1;
            }

            row.appendChild(doNumberCell);

            const doDateCell = document.createElement('td');
            doDateCell.textContent = item.DO_Date ?? '-';
            row.appendChild(doDateCell);

            const budgetCell = document.createElement('td');
            budgetCell.textContent = '-';
            row.appendChild(budgetCell);

            const deliveryFromCell = document.createElement('td');
            deliveryFromCell.textContent = item.warehouseSource_DO ? item.warehouseSource_DO : '-';
            row.appendChild(deliveryFromCell);

            const deliveryToCell = document.createElement('td');
            deliveryToCell.textContent = item.warehouseDestination_DO ? item.warehouseDestination_DO : '-';
            row.appendChild(deliveryToCell);

            const transporterCell = document.createElement('td');
            transporterCell.textContent = item.transporter_Name ?? '-';
            row.appendChild(transporterCell);

            const mrNumberCell = document.createElement('td');
            mrNumberCell.textContent = item.MR_Number ?? '-';
            row.appendChild(mrNumberCell);

            const mrDateCell = document.createElement('td');
            mrDateCell.textContent = item.MR_Date ?? '-';
            row.appendChild(mrDateCell);

            const deliveryFromMrCell = document.createElement('td');
            deliveryFromMrCell.textContent = item.warehouseSource_MR ? item.warehouseSource_MR : '-';
            row.appendChild(deliveryFromMrCell);

            const deliveryToMrCell = document.createElement('td');
            deliveryToMrCell.textContent = item.warehouseDestination_MR ? item.warehouseDestination_MR : '-';
            row.appendChild(deliveryToMrCell);

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
            "do_number": "",
            "do_date": "",
            "budget": "",
            "do_delivery_from": "",
            "do_delivery_to": "",
            "transporter": "",
            "mr_number": "",
            "mr_date": "",
            "mr_delivery_from": "",
            "mr_delivery_to": "",
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
        const isDoToMrDateNotEmpty = doToMrDate.value.trim() !== '';

        const isAuthorizedRole = Utils.isUserAuthorizedForReport();

        if (isBudgetIDNotEmpty) {
            ErrorHandler.hideErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.hideErrorInputMessage("#do_to_mr_date_range", "#dateRangeMessage");

            // if (isBudgetIDNotEmpty || isAuthorizedRole) {
            getDataReport();
            // } else {
            //     ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            // }
        } else {
            ErrorHandler.showErrorInputMessage("#budget_name", "#budgetMessage");
            ErrorHandler.showErrorInputMessage("#do_to_mr_date_range", "#dateRangeMessage");
        }
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

    $(document).ready(function () {
        renderPage();
        renderPagination();

        $('#do_to_mr_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#do_to_mr_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#do_to_mr_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            ErrorHandler.hideErrorInputMessage("#do_to_mr_date_range", "#dateRangeMessage");
        });

        $('#do_to_mr_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#do_to_mr_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#do_to_mr_date_range_container_icon').on('click', function () {
            $('#do_to_mr_date_range').trigger('click');
        });
    });
</script>