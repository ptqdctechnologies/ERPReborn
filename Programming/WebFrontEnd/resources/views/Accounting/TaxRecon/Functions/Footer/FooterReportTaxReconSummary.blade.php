<script>
    const taxReconType = 'PREPAID WHT'; // VAT OR WHT OR PREPAID WHT

    function getDataReport() {
        if (taxReconType == 'VAT') {
            const dummy = [
                {
                    transactionNumber: "AP-23000091",
                    currency: "IDR",
                    vatType: "In",
                    taxType: "WHT 23",
                    transactionType: "Import",
                    name: "PT. X",
                    taxInvoiceNumber: "FP-010.000-26.00000001",
                    date: "03-01-2026",
                    taxBased: "100000000",
                    vatRate: "11",
                    vatValue: "11000000"
                },
                {
                    transactionNumber: "AP-23000092",
                    currency: "IDR",
                    vatType: "In",
                    taxType: "WHT 42",
                    transactionType: "Domestic",
                    name: "PT. X",
                    taxInvoiceNumber: "FP-020.000-26.00000002",
                    date: "05-01-2026",
                    taxBased: "50000000",
                    vatRate: "11",
                    vatValue: "5500000"
                },
                {
                    transactionNumber: "TREM-23000002",
                    currency: "IDR",
                    vatType: "In",
                    taxType: "WHT 98",
                    transactionType: "Import",
                    name: "PT. X",
                    taxInvoiceNumber: "FP-030.000-26.00000003",
                    date: "08-01-2026",
                    taxBased: "25000",
                    vatRate: "0",
                    vatValue: "0"
                },
                {
                    transactionNumber: "INV-23000002",
                    currency: "IDR",
                    vatType: "Out",
                    taxType: "WHT 67",
                    transactionType: "Domestic",
                    name: "PT. X",
                    taxInvoiceNumber: "FP-040.000-26.00000004",
                    date: "12-01-2026",
                    taxBased: "10000000",
                    vatRate: "11",
                    vatValue: "1100000"
                },
                {
                    transactionNumber: "DN-23000008",
                    currency: "IDR",
                    vatType: "Out",
                    taxType: "WHT 36",
                    transactionType: "Export",
                    name: "PT. X",
                    taxInvoiceNumber: "FP-050.000-26.00000005",
                    date: "15-01-2026",
                    taxBased: "75000000",
                    vatRate: "11",
                    vatValue: "8250000"
                },
            ];

            $('#table_summary').DataTable({
                destroy: true,
                data: dummy,
                deferRender: true,
                scrollCollapse: true,
                scroller: true,
                columns: [
                    {
                        title: "No",
                        data: null,
                        render: function (data, type, row, meta) {
                            return '<td class="align-middle text-center">' +
                                (meta.row + 1) +
                            '</td>';
                        }
                    },
                    {
                        title: "Transaction Number",
                        data: 'transactionNumber',
                        defaultContent: '-',
                        className: "align-middle"
                    },
                    {
                        title: "Date",
                        data: 'date',
                        defaultContent: '-',
                        className: "align-middle"
                    },
                    {
                        title: "Currency",
                        data: 'currency',
                        defaultContent: '-',
                        className: "align-middle"
                    },
                    {
                        title: "VAT Type",
                        data: 'vatType',
                        defaultContent: '-',
                        className: "align-middle"
                    },
                    {
                        title: "Transaction Type",
                        data: 'transactionType',
                        defaultContent: '-',
                        className: "align-middle"
                    },
                    {
                        title: "Name",
                        data: 'name',
                        defaultContent: '-',
                        className: "align-middle"
                    },
                    {
                        title: "Tax Invoice Number",
                        data: 'taxInvoiceNumber',
                        defaultContent: '-',
                        className: "align-middle"
                    },
                    {
                        title: "Tax Based",
                        data: null,
                        defaultContent: '-',
                        render: function (data, type, row, meta) {
                            return currencyTotal(data.taxBased || 0);
                        }
                    },
                    {
                        title: "VAT Rate",
                        data: null,
                        defaultContent: '-',
                        render: function (data, type, row, meta) {
                            return `${data.vatRate}%`;
                        }
                    },
                    {
                        title: "VAT Value",
                        data: null,
                        defaultContent: '-',
                        render: function (data, type, row, meta) {
                            return currencyTotal(data.vatValue || 0);
                        }
                    }
                ]
            });
        } else {
            const dummy = [
                {
                    transactionNumber: "AP-23000091",
                    currency: "IDR",
                    vatType: "In",
                    taxType: "WHT 23",
                    transactionType: "Import",
                    name: "PT. X",
                    taxInvoiceNumber: "FP-010.000-26.00000001",
                    date: "03-01-2026",
                    taxBased: "100000000",
                    vatRate: "11",
                    vatValue: "11000000"
                },
                {
                    transactionNumber: "AP-23000092",
                    currency: "IDR",
                    vatType: "In",
                    taxType: "WHT 23",
                    transactionType: "Domestic",
                    name: "PT. X",
                    taxInvoiceNumber: "FP-020.000-26.00000002",
                    date: "05-01-2026",
                    taxBased: "50000000",
                    vatRate: "11",
                    vatValue: "5500000"
                }
            ];

            $('#table_summary').DataTable({
                destroy: true,
                data: dummy,
                deferRender: true,
                scrollCollapse: true,
                scroller: true,
                columns: [
                    {
                        title: "No",
                        data: null,
                        render: function (data, type, row, meta) {
                            return '<td class="align-middle text-center">' +
                                (meta.row + 1) +
                            '</td>';
                        }
                    },
                    {
                        title: "Transaction Number",
                        data: 'transactionNumber',
                        defaultContent: '-',
                        className: "align-middle"
                    },
                    {
                        title: "Date",
                        data: 'date',
                        defaultContent: '-',
                        className: "align-middle"
                    },
                    {
                        title: "Currency",
                        data: 'currency',
                        defaultContent: '-',
                        className: "align-middle"
                    },
                    {
                        title: "Tax Type",
                        data: null,
                        defaultContent: '-',
                        render: function (data, type, row, meta) {
                            return taxReconType == 'WHT' ? data.taxType : 'WHT 42';
                        }
                    },
                    {
                        title: "Name",
                        data: 'name',
                        defaultContent: '-',
                        className: "align-middle"
                    },
                    {
                        title: "Tax Based",
                        data: null,
                        defaultContent: '-',
                        render: function (data, type, row, meta) {
                            return currencyTotal(data.taxBased || 0);
                        }
                    },
                    {
                        title: "WHT Rate",
                        data: null,
                        defaultContent: '-',
                        render: function (data, type, row, meta) {
                            return `${data.vatRate}%`;
                        }
                    },
                    {
                        title: "WHT Value",
                        data: null,
                        defaultContent: '-',
                        render: function (data, type, row, meta) {
                            return currencyTotal(data.vatValue || 0);
                        }
                    }
                ]
            });
        }

        $('#table_summary thead th').css({
            'padding-top': '10px',
            'padding-bottom': '10px',
            'border': '1px solid #e9ecef',
            'text-align': 'center',
            'background-color': '#4B586A',
            'color': 'white'
        });

        $('#table_summary').css("width", "100%");
        $('#table_container').css("display", "block");
    }

    $('#tableProjects').on('click', 'tbody tr', function() {
        const sysId   = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code    = $(this).find('td:nth-child(2)').text();
        const name    = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val(sysId);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');

        getSites(sysId);

        $('#myProjects').modal('hide');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode    = $(this).find('td:nth-child(2)').text();
        const siteName    = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css('background-color', '#e9ecef');

        $('#mySites').modal('hide');
    });

    $(window).one('load', function() {
        $('#tax_recon_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#tax_recon_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#tax_recon_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#tax_recon_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#tax_recon_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#tax_recon_date_range_container_icon').on('click', function () {
            $('#tax_recon_date_range').trigger('click');
        });
    });
</script>