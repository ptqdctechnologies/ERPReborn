<script>
    let dataReport      = [];
    const budgetID      = document.getElementById("budget_id");
    const budgetCode    = document.getElementById("budget_code");
    const subBudgetID   = document.getElementById("sub_budget_id");
    const subBudgetCode = document.getElementById("sub_budget_code");
    const poToApDate    = document.getElementById("po_to_ap_date_range");
    const printType     = document.getElementById("print_type");

    function resetForm() {
        $("#budget_name").css('background-color', '#fff');
        $(`#budget_name`).val("");
        $(`#budget_id`).val("");
        $(`#budget_code`).val("");

        $("#sub_budget_name").css('background-color', '#fff');
        $(`#sub_budget_name`).val("");
        $(`#sub_budget_id`).val("");
        $(`#sub_budget_code`).val("");

        $("#purchase_order_number").css('background-color', '#fff');
        $(`#purchase_order_number`).val("");
        $(`#purchase_order_id`).val("");

        $("#account_payable_number").css('background-color', '#fff');
        $(`#account_payable_number`).val("");
        $(`#account_payable_id`).val("");

        $("#supplier_name").css('background-color', '#fff');
        $(`#supplier_name`).val("");
        $(`#supplier_id`).val("");

        $("#po_to_ap_date_range").css('background-color', '#fff');
        $(`#po_to_ap_date_range`).val("");

        ErrorHandler.hideErrorInputMessage("#purchase_order_number", "#purchaseOrderMessage");
        ErrorHandler.hideErrorInputMessage("#account_payable_number", "#accountPayableMessage");
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

        $("#mySitesTrigger").css('cursor', 'pointer');
        $("#mySitesTrigger").attr({
            "data-toggle": "modal",
            "data-target": "#mySites"
        });

        $("#myProjects").modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode    = $(this).find('td:nth-child(2)').text();
        const siteName    = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css('background-color', '#e9ecef');

        $("#mySites").modal('toggle');
    });

    $('#tableSuppliers').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_supplier"]').val();
        const code  = $(this).find('td:nth-child(2)').text();
        const name  = $(this).find('td:nth-child(3)').text();

        $("#supplier_id").val(sysId);
        $("#supplier_name").val(`${code} - ${name}`);
        $("#supplier_name").css('background-color', '#e9ecef');

        $("#mySuppliers").modal('toggle');
    });

    $('#TableSearchPORevision tbody').on('click', 'tr', function () {
        const sysId  = $(this).find('input[data-trigger="sys_id_po"]').val();
        const number = $(this).find('td:nth-child(2)').text();

        $("#purchase_order_id").val(sysId);
        $("#purchase_order_number").val(number);
        $("#purchase_order_number").css('background-color', '#e9ecef');

        $("#mySearchPO").modal('toggle');
    });

    $('#tableAccountPayables').on('click', 'tbody tr', function() {
        const sysId           = $(this).find('input[data-trigger="sys_id_modal_account_payable"]').val();
        const trano           = $(this).find('td:nth-child(2)').text();

        $("#account_payable_id").val(sysId);
        $("#account_payable_number").val(trano);
        $("#account_payable_number").css('background-color', '#e9ecef');

        $('#myAccountPayables').modal('hide');
    });

    $(window).one('load', function() {
        $('#po_to_ap_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#po_to_ap_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#po_to_ap_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#po_to_ap_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#po_to_ap_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#po_to_ap_date_range_container_icon').on('click', function () {
            $('#po_to_ap_date_range').trigger('click');
        });
    });
</script>