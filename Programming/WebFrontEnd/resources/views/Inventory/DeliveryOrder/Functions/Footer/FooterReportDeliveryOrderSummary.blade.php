<script>
    let dataReport      = [];
    const budgetID      = document.getElementById("budget_id");
    const budgetCode    = document.getElementById("budget_code");
    const subBudgetID   = document.getElementById("sub_budget_id");
    const subBudgetCode = document.getElementById("sub_budget_code");
    const warehouseID   = document.getElementById("warehouse_id");
    const doDate        = document.getElementById("delivery_order_date_range");
    const printType     = document.getElementById("print_type");

    function getDataReport() {
        ShowLoading();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '{!! route("DeliveryOrder.ReportDeliveryOrderSummaryStore") !!}',
            data: {
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                site_id: subBudgetID.value,
                site_code: subBudgetCode.value,
                warehouse_id: warehouseID.value,
                doDate: doDate.value
            },
            dataType: 'json',
            success: function(response) {
                console.log('response', response);
                if (response.status === 200 && response.data[0]) {
                    let data    = response.data;
                    dataReport  = JSON.stringify(data);

                    let totalQuantity = 0;

                    data.forEach(function(row) {
                        totalQuantity += parseFloat(row.quantity) || 0;
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
                                data: 'type',
                                defaultContent: '-'
                            },
                            {
                                data: 'quantity',
                                defaultContent: '-'
                            },
                            {
                                data: 'deliveryFrom_NonRefID.address',
                                defaultContent: '-'
                            },
                            {
                                data: 'deliveryTo_NonRefID.address',
                                defaultContent: '-'
                            },
                            {
                                data: null,
                                defaultContent: '-',
                                render: function (data, type, row, meta) {
                                    return `${data.transporter_Code ? `${data.transporter_Code} -` : ''} ${data.transporter_Name || ''}`;
                                }
                            }
                        ],
                        drawCallback: function(settings) {
                            $('#table_summary tfoot th:nth-child(2)').text(currencyTotal(totalQuantity));
                        }
                    });

                    $('#table_summary').css({"width": "100%", "min-width": "100%", "max-width": "100%"});
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
        const sysId     = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode  = $(this).find('td:nth-child(2)').text();
        const siteName  = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css('background-color', '#e9ecef');

        $('#mySites').modal('hide');
    });

    $('#tableGetModalWarehouses').on('click', 'tbody tr', function() {
        const sysId     = $(this).find('input[data-trigger="sys_id_modal_warehouse"]').val();
        const name      = $(this).find('td:nth-child(2)').text();
        const address   = $(this).find('td:nth-child(3)').text();

        $("#warehouse_id").val(sysId);
        $("#warehouse_name").val(`${name} - ${address}`);
        $("#warehouse_name").css('background-color', '#e9ecef');

        $('#myGetModalWarehouses').modal('toggle');
    });

    $(window).one('load', function() {
        $('#delivery_order_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#delivery_order_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#delivery_order_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#delivery_order_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#delivery_order_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#delivery_order_date_range_container_icon').on('click', function () {
            $('#delivery_order_date_range').trigger('click');
        });
    });
</script>