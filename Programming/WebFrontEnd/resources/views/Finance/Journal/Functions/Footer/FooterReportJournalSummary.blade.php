<script>
    let isFromTo = false;

    function pickBanksAccount(value) {
        isFromTo = value;
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

        $('#myProjects').modal('toggle');
    });

    $('#tableSites').on('click', 'tbody tr', function() {
        const sysId       = $(this).find('input[data-trigger="sys_id_site"]').val();
        const siteCode    = $(this).find('td:nth-child(2)').text();
        const siteName    = $(this).find('td:nth-child(3)').text();

        $("#sub_budget_id").val(sysId);
        $("#sub_budget_code").val(siteCode);
        $("#sub_budget_name").val(`${siteCode} - ${siteName}`);
        $("#sub_budget_name").css('background-color', '#e9ecef');

        $('#mySites').modal('toggle');
    });

    $('#tableBanksAccount').on('click', 'tbody tr', function() {
        const sysID       = $(this).find('input[type="hidden"]').val();
        const bankName    = $(this).find('td:nth-child(2)').text();
        const bankAccount = $(this).find('td:nth-child(3)').text();
        const accountName = $(this).find('td:nth-child(4)').text();

        if (isFromTo) {
            $('#from_to_name').val(`(${bankName}) ${bankAccount} - ${accountName}`);
            $('#from_to_id').val(sysID);
            $('#from_to_code').val(accountName);
            $("#from_to_name").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});
        } else {
            $('#bank_name').val(`(${bankName}) ${bankAccount} - ${accountName}`);
            $('#bank_id').val(sysID);
            $('#bank_code').val(accountName);
            $("#bank_name").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});
        }

        $('#myBanksAccount').modal('toggle');
    });

    $('#tableGetBusinessDocumentType').on('click', 'tbody tr', function() {
        const sysID = $(this).find('input[data-trigger="sys_id_business_document"]').val();
        const name  = $(this).find('td:nth-child(2)').text();

        $('#trans_type_name').val(name);
        $('#trans_type_id').val(sysID);
        $("#trans_type_name").css({"background-color":"#e9ecef", "border": "1px solid #ced4da"});

        $('#myBusinessDocumentType').modal('toggle');
    });

    $(window).one('load', function() {
        getBanksAccount("", "");
        getBusinessDocumentType();

        $('#journal_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#journal_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#journal_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#journal_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#journal_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#journal_date_range_container_icon').on('click', function () {
            $('#journal_date_range').trigger('click');
        });
    });
</script>