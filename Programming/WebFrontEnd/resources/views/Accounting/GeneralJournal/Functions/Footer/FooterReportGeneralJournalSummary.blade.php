<script>
    let dataReport              = [];
    const budgetID              = document.getElementById("budget_id");
    const budgetCode            = document.getElementById("budget_code");
    const subBudgetID           = document.getElementById("sub_budget_id");
    const subBudgetCode         = document.getElementById("sub_budget_code");
    const generalJournalType    = document.getElementById("journal_type");
    const generalJournalDate    = document.getElementById("general_journal_summary_date_range");
    const printType             = document.getElementById("print_type");

    function getDataReport() {
        ShowLoading();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("GeneralJournal.ReportGeneralJournalSummaryStore") !!}',
            data: {
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                site_id: subBudgetID.value,
                site_code: subBudgetCode.value,
                generalJournalType: generalJournalType.value,
                generalJournalDate: generalJournalDate.value,
            },
            dataType: 'json',
            success: function(response) {
                console.log('response', response);
                
                if (response.status === 200 && response.data[0]) {
                    let data = response.data;
                    dataReport = JSON.stringify(data);

                    if (generalJournalType.value == "SETTLEMENT") {
                        $('#table_settlement_summary').DataTable({
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
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return `${data.budget_code} - ${data.budget_name}`;
                                    }
                                },
                                {
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return `${data.sub_budget} - ${data.sub_budget_name}`;
                                    }
                                },
                                {
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return `${data.product_code} - ${data.product_name}`;
                                    }
                                },
                                {
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return `${data.coa_code} - ${data.coa_name}`;
                                    }
                                },
                                {
                                    data: 'coa_status',
                                    defaultContent: '-'
                                },
                                {
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return currencyTotal(data.amount);
                                    }
                                }
                            ]
                        });

                        $('#table_settlement_summary').css({"width": "100%", "display": "block"});
                        $('#table_adjustment_summary').css("display", "none");
                        $('#table_asset_summary').css("display", "none");
                        $('#table_adjustment_summary_wrapper').css("display", "none");
                        $('#table_asset_summary_wrapper').css("display", "none");
                    } else if (generalJournalType.value == "ADJUSTMENT") {
                        $('#table_adjustment_summary').DataTable({
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
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return `${data.budget_code} - ${data.budget_name}`;
                                    }
                                },
                                {
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return `${data.sub_budget} - ${data.sub_budget_name}`;
                                    }
                                },
                                {
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return `${data.coa_code} - ${data.coa_name}`;
                                    }
                                },
                                {
                                    data: 'coa_status',
                                    defaultContent: '-'
                                },
                                {
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return currencyTotal(data.amount);
                                    }
                                }
                            ]
                        });

                        $('#table_adjustment_summary').css({"width": "100%", "display": "block"});
                        $('#table_settlement_summary').css("display", "none");
                        $('#table_asset_summary').css("display", "none");
                        $('#table_settlement_summary_wrapper').css("display", "none");
                        $('#table_asset_summary_wrapper').css("display", "none");
                    } else if (generalJournalType.value == "FIXED_ASSET") {
                        $('#table_asset_summary').DataTable({
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
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return `${data.budget_code} - ${data.budget_name}`;
                                    }
                                },
                                {
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return `${data.sub_budget} - ${data.sub_budget_name}`;
                                    }
                                },
                                {
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return `${data.product_code} - ${data.product_name}`;
                                    }
                                },
                                {
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return `${data.coa_code} - ${data.coa_name}`;
                                    }
                                },
                                {
                                    data: 'coa_status',
                                    defaultContent: '-'
                                },
                                {
                                    data: null,
                                    defaultContent: '-',
                                    render: function (data, type, row, meta) {
                                        return currencyTotal(data.amount);
                                    }
                                }
                            ]
                        });

                        $('#table_asset_summary').css({"width": "100%", "display": "block"});
                        $('#table_settlement_summary').css("display", "none");
                        $('#table_adjustment_summary').css("display", "none");
                        $('#table_settlement_summary_wrapper').css("display", "none");
                        $('#table_adjustment_summary_wrapper').css("display", "none");
                    }

                    $('#table_container').css("display", "block");
                } else {
                    $('#table_container').hide(); 
                    $('#table_settlement_summary tbody').empty();
                    $('#table_settlement_summary tfoot').empty();
                    $('#table_adjustment_summary tbody').empty();
                    $('#table_adjustment_summary tfoot').empty();
                    $('#table_asset_summary tbody').empty();
                    $('#table_asset_summary tfoot').empty();
                    ErrorNotif("Error");
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

    function exportDataReport() {
        ShowLoading();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '{!! route("AdvanceRequest.PrintExportReportAdvanceSummary") !!}',
            type: 'POST',
            data: {
                dataReport,
                printType: printType.value
            },
            xhrFields: { 
                responseType: 'blob'
            },
            success: function(response) {
                var blob = new Blob([response], { type: response.type });
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);

                if (response.type === "application/pdf") {
                    link.download = "Export Report Advance Summary.pdf";
                } else {
                    link.download = "Export Report Advance Summary.xlsx";
                }

                link.click();

                window.URL.revokeObjectURL(link.href);

                HideLoading();
            },
            error: function(xhr, status, error) {
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log('xhr, status, error', xhr, status, error);
            }
        });
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
        $('#general_journal_summary_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#general_journal_summary_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#general_journal_summary_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#general_journal_summary_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#general_journal_summary_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#general_journal_summary_date_range_container_icon').on('click', function () {
            $('#general_journal_summary_date_range').trigger('click');
        });
    });
</script>