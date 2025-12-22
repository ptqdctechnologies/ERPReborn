<script>
    let dataReport      = [];
    const budgetID      = document.getElementById("budget_id");
    const budgetCode    = document.getElementById("budget_code");
    const subBudgetID   = document.getElementById("sub_budget_id");
    const subBudgetCode = document.getElementById("sub_budget_code");
    const prDate        = document.getElementById("purchase_requisition_date_range");

    function getDataReport() {
        ShowLoading();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("PurchaseRequisition.ReportPurchaseRequisitionSummaryStore") !!}',
            data: {
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                site_id: subBudgetID.value,
                site_code: subBudgetCode.value,
                prDate: prDate.value
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 200 && response.data[0]) {
                    let data = response.data;
                    dataReport = JSON.stringify(data);

                    let totalIDR            = 0;
                    let totalOtherCurrency  = 0;
                    let totalEquivalentIDR  = 0;

                    data.forEach(function(row) {
                        totalIDR            += parseFloat(row.total_IDR) || 0;
                        totalOtherCurrency  += parseFloat(row.total_Other_Currency) || 0;
                        totalEquivalentIDR  += parseFloat(row.grand_Total_Equivalent_IDR) || 0;
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
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    let dateOrigin      = new Date(data.date);
                                    let formattedDate   = dateOrigin.toISOString().split('T')[0];

                                    return formattedDate;
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return `${data.combinedBudgetCode} - ${data.combinedBudgetName}`;
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    let dateOrigin      = new Date(data.dateOfDelivery);
                                    let formattedDate   = dateOrigin.toISOString().split('T')[0];

                                    return formattedDate;
                                }
                            },
                            {
                                data: 'deliveryTo_NonRefID.address',
                                defaultContent: '-',
                                className: "text-wrap"
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_IDR);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.total_Other_Currency);
                                }
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return currencyTotal(data.grand_Total_Equivalent_IDR);
                                }
                            }
                        ],
                        drawCallback: function(settings) {
                            $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalIDR));
                            $('#table_summary tfoot th:nth-child(3)').text(currencyTotal(totalOtherCurrency)); 
                            $('#table_summary tfoot th:nth-child(4)').text(currencyTotal(totalEquivalentIDR));
                        }
                    });

                    $('#table_summary').css("width", "100%");
                    $('#table_container').css("display", "block");
                } else {
                    $('#table_container').hide(); 
                    $('#table_summary tbody').empty();
                    $('#table_summary tfoot').empty();
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

    $('#tableProjects').on('click', 'tbody tr', function() {
        let sysId   = $(this).find('input[data-trigger="sys_id_project"]').val();
        let code    = $(this).find('td:nth-child(2)').text();
        let name    = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val(sysId);
        $("#budget_code").val(code);
        $("#budget_name").val(`${code} - ${name}`);
        $("#budget_name").css('background-color', '#e9ecef');

        getSites(sysId);

        $('#myProjects').modal('hide');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        let sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        let siteCode    = $(this).find('td:nth-child(2)').text();
        let siteName    = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css('background-color', '#e9ecef');

        $('#mySites').modal('hide');
    });

    $(window).one('load', function() {
        $('#purchase_requisition_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#purchase_requisition_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#purchase_requisition_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#purchase_requisition_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#purchase_requisition_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#purchase_requisition_date_range_container_icon').on('click', function () {
            $('#purchase_requisition_date_range').trigger('click');
        });
    });
</script>