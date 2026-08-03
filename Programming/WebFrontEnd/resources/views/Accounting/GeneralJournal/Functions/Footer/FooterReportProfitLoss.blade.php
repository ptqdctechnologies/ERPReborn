<script>
    const dummy = [
        // ===================== REVENUE =====================
        {
            type: "header",
            name: "REVENUE"
        },
        {
            type: "detail",
            name: "Project Revenue",
            y2026: 8450000000,
            y2025: 6800000000,
            change: "+22,0%"
        },
        {
            type: "detail",
            name: "Other Operating Income",
            y2026: 120000000,
            y2025: 85000000,
            change: "+41,2%"
        },
        {
            type: "total",
            name: "Total Revenue",
            y2026: 8570000000,
            y2025: 6885000000,
            change: "+24,5%"
        },

        // ===================== COGS =====================
        {
            type: "header",
            name: "COGS"
        },
        {
            type: "detail",
            name: "Material Cost",
            y2026: 300000000,
            y2025: 200000000,
            change: "+15%"
        },
        {
            type: "detail",
            name: "Labor Cost",
            y2026: 150000000,
            y2025: 120000000,
            change: "+15,7%"
        },
        {
            type: "detail",
            name: "Subcontractor Cost",
            y2026: 1350000000,
            y2025: 1100000000,
            change: "+18,9%"
        },
        {
            type: "detail",
            name: "Equipment Rental",
            y2026: 285000000,
            y2025: 240000000,
            change: "+18,8%"
        },
        {
            type: "detail",
            name: "Other Direct Cost",
            y2026: 205000000,
            y2025: 150000000,
            change: "+13,9%"
        },
        {
            type: "total",
            name: "COGS Profit",
            y2026: 3645000000,
            y2025: 580000000,
            change: "+24,5%"
        },

        // ===================== OPERATING EXPENSES =====================
        {
            type: "header",
            name: "OPERATING EXPENSES"
        },
        {
            type: "detail",
            name: "Salaries & Admin Budget",
            y2026: 220000000,
            y2025: 195000000,
            change: "+12,8%"
        },
        {
            type: "detail",
            name: "Office & General Admin",
            y2026: 95000000,
            y2025: 80000000,
            change: "+15,9%"
        },
        {
            type: "detail",
            name: "Depreciation",
            y2026: 170000000,
            y2025: 150000000,
            change: "+13,3%"
        },
        {
            type: "detail",
            name: "Marketing & Ticket Cost",
            y2026: 45000000,
            y2025: 18000000,
            change: "+18%"
        },
        {
            type: "total",
            name: "Operating Profit",
            y2026: 435000000,
            y2025: 580000000,
            change: "+39,3%"
        },

        // ===================== OTHER INCOME / (EXPENSE) =====================
        {
            type: "header",
            name: "OTHER INCOME / (EXPENSE)"
        },
        {
            type: "detail",
            name: "Income",
            y2026: 35000000,
            y2025: 22000000,
            change: "+59,1%"
        },
        {
            type: "detail",
            name: "Expense",
            y2026: 118000000,
            y2025: 125000000,
            change: "+12,0%"
        },
        {
            type: "total",
            name: "Profit Before Tax",
            y2026: 865000000,
            y2025: 407000000,
            change: "+39,3%"
        },
        {
            type: "detail",
            name: "Income Tax/Expense",
            y2026: 235000000,
            y2025: 120000000,
            change: "-95,8%"
        }
    ];

    function formatRupiah(value) {
        return "Rp " + value.toLocaleString("id-ID");
    }

    function getChangeClass(change) {
        if (change.startsWith('+')) {
            return 'text-success';
        }

        if (change.startsWith('-')) {
            return 'text-danger';
        }

        return '';
    }

    function renderTable() {
        let html = "";

        dummy.forEach(item => {

            if (item.type === "header") {
                const changeColorText =
                    item.name == "CURRENT ASSETS" ||
                        item.name == "NON-CURRENT ASSETS" ||
                        item.name == "CURRENT LIABILITIES" ||
                        item.name == "LONG-TERM LIABILITIES" ? '#6c757d' : '#000';

                html += `
                <tr class="font-weight-bold" style="font-size: larger;">
                    <td style="color: ${changeColorText};">${item.name}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>`;
            }

            if (item.type === "detail" || item.type === "total") {

                const changeClass = getChangeClass(item.change);

                html += `
                <tr style="font-size: larger;">
                    <td class="${item.type === 'total' ? 'text-bold' : ''}">
                        ${item.name}
                    </td>
                    <td>${formatRupiah(item.y2026)}</td>
                    <td style="color: #6c757d;">${formatRupiah(item.y2025)}</td>
                    <td class="${changeClass} text-bold">${item.change}</td>
                </tr>`;
            }

        });

        $("#table_summary tbody").html(html);
    }

    $(document).ready(function () {
        renderTable();

        $('#table_summary').DataTable({
            paging: false,
            searching: false,
            info: false,
            ordering: false
        });

        $('#balance_sheet_date_range').daterangepicker({
            autoUpdateInput: false,
            showDropdowns: true,
            minYear: 2000,
            // maxYear: parseInt(moment().format('YYYY'), 10),
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#balance_sheet_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#balance_sheet_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
        });

        $('#balance_sheet_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#balance_sheet_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#balance_sheet_date_range_container_icon').on('click', function () {
            $('#balance_sheet_date_range').trigger('click');
        });
    });
</script>