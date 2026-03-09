<script>
    let isFromTo        = false;
    let data            = [];
    let dataReport      = [];
    let currentPage     = 1;
    let rowsPerPage     = 10;
    let filteredData    = [...data];
    let sortColumn      = null;
    let sortOrder       = 'asc';
    const projectCode   = document.getElementById("budget_code");
    const siteCode      = document.getElementById("sub_budget_code");
    const date          = document.getElementById("invoice_date_range");
    const startLimit    = document.getElementById("start_limit");
    const endLimit      = document.getElementById("end_limit");
    const totalData     = document.getElementById("total_data");
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
        
        $("#invoice_date_range").css('background-color', '#fff');
        $(`#invoice_date_range`).val("");
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
            url: '{!! route("Reimbursement.ReportInvoiceToCNStore") !!}',
        });
    }

    $('#tableProjects').on('click', 'tbody tr', async function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_project"]').val();
        const projectCode = $(this).find('td:nth-child(2)').text();
        const projectName = $(this).find('td:nth-child(3)').text();

        $("#budget_id").val(sysId);
        $("#budget_code").val(projectCode);
        $("#budget_name").val(`${projectCode} - ${projectName}`);
        $("#budget_name").css({"background-color":"#e9ecef"});

        getSites(sysId);

        $('#myProjects').modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode    = $(this).find('td:nth-child(2)').text();
        const siteName    = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css({"background-color":"#e9ecef"});

        $('#mySites').modal('toggle');
    });

    $(window).one('load', function() {
        $('#invoice_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#invoice_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#invoice_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#invoice_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#invoice_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#invoice_date_range_container_icon').on('click', function () {
            $('#invoice_date_range').trigger('click');
        });
    });
</script>