<script>
    let dataReport      = [];
    const budgetID      = document.getElementById("budget_id");
    const budgetCode    = document.getElementById("budget_code");
    const budgetName    = document.getElementById("budget_name");
    const loanDate      = document.getElementById("loan_date_range");

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
                                    return currencyTotal(data.principleLoan || 0);
                                }
                            },
                            {
                                data: '-',
                                defaultContent: '-'
                            },
                            {
                                data: '-',
                                defaultContent: '-'
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
                                data: '-',
                                defaultContent: '-'
                            },
                            {
                                data: '-',
                                defaultContent: '-'
                            },
                            {
                                data: '-',
                                defaultContent: '-'
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