<script>
    let dataReport      = []; 
    const budgetID      = document.getElementById("budget_id");
    const budgetName    = document.getElementById("budget_name");
    const budgetCode    = document.getElementById("budget_code");
    const subBudgetID   = document.getElementById("site_id");
    const subBudgetName = document.getElementById("site_name");
    const subBudgetCode = document.getElementById("site_code");
    const asfDate       = document.getElementById("asfDate");
    const printType     = document.getElementById("print_type");

    function getDataReport() {
        ShowLoading();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{!! route("AdvanceSettlement.ReportAdvanceSettlementSummaryStore") !!}',
            type: 'POST',
            data: {
                budget_id: budgetID.value,
                budget_name: budgetName.value,
                budget_code: budgetCode.value,
                site_id: subBudgetID.value,
                site_name: subBudgetName.value,
                site_code: subBudgetCode.value,
                asfDate: asfDate.value
            },
            dataType: 'json',
            success: function(response) {
                HideLoading();

                if (response.status === 200) {
                    let data = response.data;
                    dataReport = JSON.stringify(data);

                    let totalExpenseClaim       = 0;
                    let totalAmountDueCompany   = 0;
                    let totalAdvanceSettlement  = 0;

                    data.forEach(function(row) {
                        totalExpenseClaim       += parseFloat(row.total_Expense_Claim) || 0;
                        totalAmountDueCompany   += parseFloat(row.total_Amount_Due_Company) || 0;
                        totalAdvanceSettlement  += parseFloat(row.total_Advance_Settlement) || 0;
                    });

                    $('#table_summary').DataTable({
                        destroy: true,
                        data: data,
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true,
                        columns: [
                            {
                                data: null,
                                render: function (data, type, row, meta) {
                                    return (meta.row + 1);
                                }
                            },
                            {
                                data: 'documentNumber',
                                defaultContent: '-'
                            },
                            {
                                data: 'date',
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Expense_Claim);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Amount_Due_Company);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Advance_Settlement);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-'
                            },
                            {
                                data: 'requester',
                                defaultContent: '-'
                            },
                            {
                                data: 'remarks',
                                defaultContent: '-'
                            }
                        ],
                        drawCallback: function(settings) {
                            // Start of Menghitung total berdasarkan data yang tampil pada halaman aktif
                            // let api                         = this.api();
                            // let totalExpenseClaimPage       = 0;
                            // let totalAmountDueCompanyPage   = 0;
                            // let totalAdvanceSettlementPage  = 0;

                            // api.rows({ page: 'current' }).every(function(rowIdx, tableLoop, rowLine) {
                            //     let row                     = api.row(rowIdx).data();
                            //     totalExpenseClaimPage       += parseFloat(row.total_Expense_Claim) || 0;
                            //     totalAmountDueCompanyPage   += parseFloat(row.total_Amount_Due_Company) || 0;
                            //     totalAdvanceSettlementPage  += parseFloat(row.total_Advance_Settlement) || 0;
                            // });
                            // End of Menghitung total berdasarkan data yang tampil pada halaman aktif

                            $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalExpenseClaim));
                            $('#table_summary tfoot th:nth-child(3)').text('0'); 
                            $('#table_summary tfoot th:nth-child(4)').text('0');
                            $('#table_summary tfoot th:nth-child(5)').text(currencyTotal(totalAmountDueCompany));
                            $('#table_summary tfoot th:nth-child(6)').text('0'); 
                            $('#table_summary tfoot th:nth-child(7)').text('0');
                            $('#table_summary tfoot th:nth-child(8)').text(currencyTotal(totalAdvanceSettlement));
                            $('#table_summary tfoot th:nth-child(9)').text('0'); 
                            $('#table_summary tfoot th:nth-child(10)').text('0');
                        }
                    });

                    $('#table_summary').css("width", "100%");
                    $('#table_container').css("display", "block");
                } else {
                    ErrorNotif(response.message);
                }
            },
            error: function(xhr, status, error) {
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log('xhr, status, error', xhr, status, error);
            }
        });
    }

    function exportDataReport() {
        ShowLoading();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{!! route("AdvanceSettlement.PrintExportReportAdvanceSettlementSummary") !!}',
            type: 'POST',
            data: {
                dataReport,
                printType: printType.value
            },
            xhrFields: { 
                responseType: 'blob'
            },
            success: function(response) {
                HideLoading();

                var blob = new Blob([response], { type: response.type });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);

                if (response.type === "application/pdf") {
                    link.download = "Export Report Advance Settlement Summary.pdf";
                } else {
                    link.download = "Export Report Advance Settlement Summary.xlsx";
                }

                link.click();

                window.URL.revokeObjectURL(link.href);
            },
            error: function(xhr, status, error) {
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log('xhr, status, error', xhr, status, error);
            }
        });
    }

    $('#tableProjects').on('click', 'tbody tr', function() {
        const sysId = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code  = $(this).find('td:nth-child(2)').text();
        const name  = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val(sysId);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');

        $("#myProjects").modal('toggle');

        getSites(sysId);
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        const sysId = $(this).find('input[data-trigger="sys_id_site"]').val();
        const code  = $(this).find('td:nth-child(2)').text();
        const name  = $(this).find('td:nth-child(3)').text();

        $("#site_id").val(sysId);
        $("#site_code").val(code);
        $("#site_name").val(`${code} - ${name}`);
        $("#site_name").css('background-color', '#e9ecef');

        $("#mySites").modal('toggle');
    });

    $(window).one('load', function(e) {
        $('#asfDate').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#asfDate').on('apply.daterangepicker', function(ev, picker) {
            $("#asfDate").css('background-color', '#e9ecef');

            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#asfDate').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });

        $('#asfDate-icon').on('click', function () {
            $('#asfDate').trigger('click');
        });
    });
</script>