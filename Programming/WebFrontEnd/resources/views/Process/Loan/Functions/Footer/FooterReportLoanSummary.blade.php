<script>
    let isCreditorClicked   = false;
    let dataReport          = [];
    const budgetID          = document.getElementById("budget_id");
    const creditorID        = document.getElementById("creditor_id");
    const debitorID         = document.getElementById("debitor_id");
    const budgetCode        = document.getElementById("budget_code");
    const budgetName        = document.getElementById("budget_name");
    const loanDate          = document.getElementById("loan_date_range");
    const printType         = document.getElementById("print_type");

    function resetForm() {
        isCreditorClicked = false;
        dataReport = [];

        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#loan_date_range").css('background-color', '#fff');
        $(`#loan_date_range`).val("");

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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("Loan.ReportLoanSummaryStore") !!}',
            data: {
                creditor_id: creditorID.value,
                debitor_id: debitorID.value,
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                loanDate: loanDate.value
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 200 && response.data[0]) {
                    let data    = response.data;
                    dataReport  = JSON.stringify(data);
                    
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
                                data: 'loanNumber',
                                defaultContent: '-'
                            },
                            {
                                data: 'date',
                                defaultContent: '-'
                            },
                            {
                                data: 'type',
                                defaultContent: '-'
                            },
                            {
                                data: 'creditorName',
                                defaultContent: '-'
                            },
                            {
                                data: 'debitorName',
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.principleLoan_IDR || 0);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.principleLoan_Other_Currency || 0);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.principleLoan_Equivalent_IDR || 0);
                                }
                            },
                            {
                                data: 'rate',
                                defaultContent: '-'
                            },
                            {
                                data: 'term',
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.totalLoan_IDR || 0);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.totalLoan_Other_Currency || 0);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.totalLoan_Equivalent_IDR || 0);
                                }
                            },
                            {
                                data: 'notes',
                                defaultContent: '-'
                            }
                        ]
                    });

                    $('#table_container').css('display', 'block');
                } else {
                    $('#table_summary').DataTable().clear().draw();
                    ErrorNotif('Data Not Found');
                }

                HideLoading();
            },
            error: function (textStatus, errorThrown) {
                $('#table_summary').DataTable().clear().draw();
                HideLoading();
                ErrorNotif("An error occurred while processing the received data. Please try again later.");
                console.log(`[${textStatus.status}] ${textStatus.responseJSON.message}`);
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
            url: '{!! route("Loan.PrintExportReportLoanSummary") !!}',
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
                    link.download = "Export Report Loan Summary.pdf";
                } else {
                    link.download = "Export Report Loan Summary.xlsx";
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

    $('#tableSuppliers').on('click', 'tbody tr', function() {
        const sysId   = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        const code    = $(this).find('td:nth-child(2)').text();
        const name    = $(this).find('td:nth-child(3)').text();
        const address = $(this).find('td:nth-child(4)').text();
        
        if (isCreditorClicked) {
            $(`#creditor_id`).val(sysId);
            $(`#creditor_code`).val(code);
            $(`#creditor_name`).val(`${code} - ${name}`);
            $(`#creditor_name`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
            $("#creditor_message").hide();
        } else {
            $(`#debitor_id`).val(sysId);
            $(`#debitor_code`).val(code);
            $(`#debitor_name`).val(`${code} - ${name}`);
            $(`#debitor_name`).css({'background-color': '#e9ecef', 'border': '1px solid #ced4da'});
            $("#debitor_message").hide();
        }

        $("#mySuppliers").modal('toggle');
    });

    $('#tableProjects').on('click', 'tbody tr', function() {
        const sysId   = $(this).find('input[data-trigger="sys_id_project"]').val();
        const code    = $(this).find('td:nth-child(2)').text();
        const name    = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val(sysId);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');

        $('#myProjects').modal('hide');
    });

    $('#myCreditorsTrigger').on('click', function() {
        isCreditorClicked = true;
        $("#titleSuppliers").text('Choose Creditor');
    });

    $('#myDebitorsTrigger').on('click', function() {
        isCreditorClicked = false;
        $("#titleSuppliers").text('Choose Debitor');
    });

    $(window).one('load', function() {
        $('#loan_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#loan_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#loan_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#loan_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#loan_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#loan_date_range_container_icon').on('click', function () {
            $('#loan_date_range').trigger('click');
        });
    });
</script>