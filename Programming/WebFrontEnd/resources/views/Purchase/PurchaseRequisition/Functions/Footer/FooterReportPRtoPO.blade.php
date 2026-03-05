<script>
    let isFromTo        = false;
    let data            = [];
    let dataReport      = [];
    let currentPage     = 1;
    let rowsPerPage     = 10;
    let filteredData    = [...data];
    let sortColumn      = null;
    let sortOrder       = 'asc'; 
    const projectCode   = document.getElementById("budget_code");
    const siteCode      = document.getElementById("sub_budget_code");
    const supplierID    = document.getElementById("supplier_id");
    const date          = document.getElementById("purchase_request_date_range");
    const startLimit    = document.getElementById("start_limit");
    const endLimit      = document.getElementById("end_limit");
    const totalData     = document.getElementById("total_data");
    const printType     = document.getElementById("print_type");

    function resetForm() {
        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#sub_budget_name").css('background-color', '#fff');
        $(`#sub_budget_name`).val("");
        $(`#sub_budget_id`).val("");
        $(`#sub_budget_code`).val("");

        $("#supplier_name").css('background-color', '#fff');
        $(`#supplier_name`).val("");
        $(`#supplier_code`).val("");
        $(`#supplier_id`).val("");
        
        $("#purchase_request_date_range").css('background-color', '#fff');
        $(`#purchase_request_date_range`).val("");
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
            url: '{!! route("PurchaseRequisition.ReportPRtoPOStore") !!}',
            data: {
                project_code: projectCode.value,
                site_code: siteCode.value,
                supplier_id: supplierID.value,
                date: date.value
            },
            dataType: 'json',
            success: function(response) {
                console.log('response', response);
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
            error: function(xhr, status, error) {
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

            let prDate = '-';
            let poDate = '-';

            if (item.PR_Date) {
                prDate = item.PR_Date.split(" ")[0];
            }

            if (item.PO_Date) {
                poDate = item.PO_Date.split(" ")[0];
            }

            const rowNumber = (currentPage - 1) * rowsPerPage + ind + 1;

            const noCell = document.createElement('td');
            noCell.textContent = rowNumber;
            row.appendChild(noCell);

            const prNumberCell = document.createElement('td');
            prNumberCell.textContent = item.PR_Number ?? '-';

            if (lastTransactionNumber === item.PR_Number) {
                prNumberCell.style.display = 'none';
                rowspan++;
            } else {
                if (rowspan > 1) {
                    const targetIndex = rowIndex - rowspan;
                    if (tbody.rows[targetIndex]) {
                        tbody.rows[targetIndex].cells[1].rowSpan = rowspan;
                    }
                    // tbody.rows[rowIndex - rowspan].cells[1].rowSpan = rowspan;
                }
                lastTransactionNumber = item.PR_Number;
                rowspan = 1;
            }

            row.appendChild(prNumberCell);

            const prDateCell = document.createElement('td');
            prDateCell.textContent = prDate;
            row.appendChild(prDateCell);

            const prProductCell = document.createElement('td');
            prProductCell.classList.add('text-wrap');
            prProductCell.textContent = `${item.product_Code ?? ''} - ${item.product_Name ?? ''}`;
            row.appendChild(prProductCell);

            const prTotalCell = document.createElement('td');
            prTotalCell.textContent = item.PR_Total ?? '-';
            row.appendChild(prTotalCell);

            const prTotalOtherCell = document.createElement('td');
            prTotalOtherCell.textContent = '-';
            row.appendChild(prTotalOtherCell);

            const prTotalEquivalentCell = document.createElement('td');
            prTotalEquivalentCell.textContent = '-';
            row.appendChild(prTotalEquivalentCell);

            const poNumberCell = document.createElement('td');
            poNumberCell.textContent = item.PO_Number ?? '-';
            row.appendChild(poNumberCell);

            const poDateCell = document.createElement('td');
            poDateCell.textContent = poDate;
            row.appendChild(poDateCell);

            const poQtyCell = document.createElement('td');
            poQtyCell.textContent = item.PO_Qty ?? '-';
            row.appendChild(poQtyCell);

            const poTotalCell = document.createElement('td');
            poTotalCell.textContent = item.PO_Total ?? '-';
            row.appendChild(poTotalCell);

            const poTotalOtherCell = document.createElement('td');
            poTotalOtherCell.textContent = '-';
            row.appendChild(poTotalOtherCell);

            const poTotalEquivalentCell = document.createElement('td');
            poTotalEquivalentCell.textContent = '-';
            row.appendChild(poTotalEquivalentCell);

            const balance = document.createElement('td');
            balance.textContent = item.balance ?? '-';
            row.appendChild(balance);

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
            "pr_number": "",
            "pr_date": "",
            "pr_product": "",
            "pr_total": "",
            "pr_total_other": "",
            "pr_total_equivalent": "",
            "po_number": "",
            "po_date": "",
            "po_quantity": "",
            "po_total": "",
            "po_total_other": "",
            "po_total_equivalent": "",
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
        document.querySelector('#start_limit').textContent = startLimit;
        document.querySelector('#end_limit').textContent = endLimit;
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
            dots.textContent = '...';
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
            dots.textContent = '...';
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

    $('#tableProjects').on('click', 'tbody tr', async function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_project"]').val();
        const projectCode = $(this).find('td:nth-child(2)').text();
        const projectName = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val(sysId);
        $("#budget_code").val(projectCode);
        $("#budget_name").val(`${projectCode} - ${projectName}`);
        $("#budget_name").css({"background-color":"#e9ecef"});

        getSites(sysId);

        $('#myProjects').modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode    = $(this).find('td:nth-child(2)').text();
        const siteName    = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css({"background-color":"#e9ecef"});

        $('#mySites').modal('toggle');
    });

    $('#tableSuppliers').on('click', 'tbody tr', function () {
        const sysId     = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        const code      = $(this).find('td:nth-child(2)').text();
        const name      = $(this).find('td:nth-child(3)').text();
        const address   = $(this).find('td:nth-child(4)').text();

        $("#supplier_id").val(sysId);
        $("#supplier_code").val(code);
        $("#supplier_name").val(`(${code}) ${name} - ${address}`);
        $("#supplier_name").css({"background-color":"#e9ecef"});

        $('#mySuppliers').modal('hide');
    });

    $(window).one('load', function() {
        renderPage();
        renderPagination();

        $('#purchase_request_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#purchase_request_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#purchase_request_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#purchase_request_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#purchase_request_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#purchase_request_date_range_container_icon').on('click', function () {
            $('#purchase_request_date_range').trigger('click');
        });
    });
</script>