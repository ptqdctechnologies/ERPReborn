<script>
    const dummy = [
        // ===================== ASSETS =====================
        {
            type: "header",
            name: "ASSETS"
        },
        {
            type: "header",
            name: "CURRENT ASSETS"
        },
        {
            type: "detail",
            name: "Cash & Bank",
            y2026: 1564000000,
            y2025: 1180000000,
            change: "+32,5%"
        },
        {
            type: "detail",
            name: "Accounts Receivable",
            y2026: 2470000000,
            y2025: 1850000000,
            change: "+33,5%"
        },
        {
            type: "detail",
            name: "Retention Receivable",
            y2026: 680000000,
            y2025: 520000000,
            change: "+30,8%"
        },
        {
            type: "detail",
            name: "Materials Inventory",
            y2026: 845000000,
            y2025: 690000000,
            change: "+22,5%"
        },
        {
            type: "detail",
            name: "Work In Progress",
            y2026: 1920000000,
            y2025: 1540000000,
            change: "+24,3%"
        },
        {
            type: "header",
            name: "NON-CURRENT ASSETS"
        },
        {
            type: "detail",
            name: "Property & Equipment",
            y2026: 3200000000,
            y2025: 3050000000,
            change: "+4,9%"
        },
        {
            type: "detail",
            name: "Accummulated Depreciation",
            y2026: 1150000000,
            y2025: 980000000,
            change: "-17,3%"
        },
        {
            type: "total",
            name: "Total Assets",
            y2026: 9529000000,
            y2025: 7850000000,
            change: "+21,4%"
        },

        // ===================== LIABILITIES =====================
        {
            type: "header",
            name: "LIABILITIES"
        },
        {
            type: "header",
            name: "CURRENT LIABILITIES"
        },
        {
            type: "detail",
            name: "Accounts Payable",
            y2026: 1240000000,
            y2025: 980000000,
            change: "+26,5%"
        },
        {
            type: "detail",
            name: "Accrued Subcontractor Cost",
            y2026: 815000000,
            y2025: 640000000,
            change: "+27,5%"
        },
        {
            type: "detail",
            name: "Advances from Customers",
            y2026: 1350000000,
            y2025: 1100000000,
            change: "+22,3%"
        },
        {
            type: "detail",
            name: "Taxes Payable",
            y2026: 274000000,
            y2025: 210000000,
            change: "+30,5%"
        },
        {
            type: "header",
            name: "LONG-TERM LIABILITIES"
        },
        {
            type: "detail",
            name: "Bank Loan",
            y2026: 1500000000,
            y2025: 1700000000,
            change: "-11,8%"
        },
        {
            type: "total",
            name: "Total Liabilities",
            y2026: 5179000000,
            y2025: 4630000000,
            change: "+11,9%"
        },

        // ===================== EQUITY =====================
        {
            type: "header",
            name: "EQUITY"
        },
        {
            type: "detail",
            name: "Paid in Capital",
            y2026: 2500000000,
            y2025: 2500000000,
            change: "+0%"
        },
        {
            type: "detail",
            name: "Retained Earnings",
            y2026: 1120000000,
            y2025: 720000000,
            change: "+55,6%"
        },
        {
            type: "detail",
            name: "Current Year Earnings",
            y2026: 730000000,
            y2025: 0,
            change: "-"
        },
        {
            type: "total",
            name: "Total Equity",
            y2026: 4350000000,
            y2025: 3220000000,
            change: "+35,1%"
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