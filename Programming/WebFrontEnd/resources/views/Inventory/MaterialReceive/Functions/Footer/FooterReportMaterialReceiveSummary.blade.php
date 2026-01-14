<script>
    let dataReport          = [];
    let triggerWarehouse    = null;
    const budgetID          = document.getElementById("budget_id");
    const budgetCode        = document.getElementById("budget_code");
    const budgetName        = document.getElementById("budget_name");
    const receivedID        = document.getElementById("received_id");
    const receivedName      = document.getElementById("received_name");
    const deliveryFromID    = document.getElementById("delivery_from_id");
    const deliveryFromName  = document.getElementById("delivery_from_name");
    const deliveryToID      = document.getElementById("delivery_to_id");
    const deliveryToName    = document.getElementById("delivery_to_name");
    const mrDate            = document.getElementById("material_receive_date_range");
    const printType         = document.getElementById("print_type");

    function changeTriggerWarehouse(params) {
        triggerWarehouse = params;
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
            url: '{!! route("MaterialReceive.ReportMaterialReceiveSummaryStore") !!}',
            data: {
                budget_id: budgetID.value,
                budget_code: budgetCode.value,
                received_id: receivedID.value,
                delivery_from_id: deliveryFromID.value,
                delivery_to_id: deliveryToID.value,
                mrDate: mrDate.value
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
                                data: 'MR_Number',
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
                                data: 'combinedBudgetName',
                                defaultContent: '-'
                            },
                            {
                                data: 'referenceNumber',
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
                                data: 'receiveAt',
                                defaultContent: '-'
                            },
                            {
                                data: 'remarks',
                                defaultContent: '-'
                            }
                        ],
                        // footerCallback: function ( row, data, start, end, display ) {
                        //     var api = this.api(), data;
                        //     // Remove the formatting to get integer data for summation
                        //     var intVal = function ( i ) {
                        //         return typeof i === 'string' ?
                        //             i.replace(/[\$,]/g, '')*1 :
                        //             typeof i === 'number' ?
                        //                 i : 0;
                        //     };
                        //     // Total over all pages
                        //     total = api
                        //         .column( 4 )
                        //         .data()
                        //         .reduce( function (a, b) {
                        //             return intVal(a) + intVal(b);
                        //         }, 0 );
                        //     // Update footer
                        //     $( api.column( 4 ).footer() ).html(
                        //         total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2})
                        //     );
                        // }
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
            type: 'POST',
            url: '{!! route("MaterialReceive.PrintExportReportMaterialReceiveSummary") !!}',
            data: {
                dataReport,
                budgetName: budgetName.value,
                receivedName: receivedName.value,
                deliveryFromName: deliveryFromName.value,
                deliveryToName: deliveryToName.value,
                mrDate: mrDate.value,
                printType: printType.value
            },
            xhrFields: { 
                responseType: 'blob'
            },
            success: function(response) {
                let blob  = new Blob([response], { type: response.type });
                let link  = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);

                if (response.type === "application/pdf") {
                    link.download = 'Report Material Receive Summary.pdf';
                } else {
                    link.download = 'Report Material Receive Summary.xlsx';
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

        $('#myProjects').modal('hide');
    });

    $('#tableGetModalWarehouses').on('click', 'tbody tr', function() {
        const sysId     = $(this).find('input[data-trigger="sys_id_modal_warehouse"]').val();
        const name      = $(this).find('td:nth-child(2)').text();
        const address   = $(this).find('td:nth-child(3)').text();

        if (triggerWarehouse === "RECEIVED_AT") {
            $("#received_id").val(sysId);
            $("#received_name").val(`${name} - ${address}`);
            $("#received_name").css('background-color', '#e9ecef');
        } else if (triggerWarehouse === "DELIVERY_TO") {
            $("#delivery_to_id").val(sysId);
            $("#delivery_to_name").val(`${name} - ${address}`);
            $("#delivery_to_name").css('background-color', '#e9ecef');
        }

        $('#myGetModalWarehouses').modal('toggle');
    });

    $('#tableSuppliers').on('click', 'tbody tr', function () {
        const sysId     = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        const code      = $(this).find('td:nth-child(2)').text();
        const name      = $(this).find('td:nth-child(3)').text();
        const address   = $(this).find('td:nth-child(4)').text();

        $("#delivery_from_id").val(sysId);
        $("#delivery_from_name").val(`${code} - ${name}`);
        $("#delivery_from_name").css('background-color', '#e9ecef');

        $('#mySuppliers').modal('hide');
    });

    $(window).one('load', function() {
        $('#material_receive_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#material_receive_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#material_receive_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#material_receive_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#material_receive_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#material_receive_date_range_container_icon').on('click', function () {
            $('#material_receive_date_range').trigger('click');
        });
    });
</script>