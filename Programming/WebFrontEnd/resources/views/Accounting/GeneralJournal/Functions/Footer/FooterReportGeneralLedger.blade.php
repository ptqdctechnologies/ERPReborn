<script>
    $('#tableInstitutionBankAccount').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_bank_account_list"]').val();
        const bankAcronym = $(this).find('td:nth-child(2)').text();
        const accountNumber = $(this).find('td:nth-child(3)').text();
        const accountName = $(this).find('td:nth-child(4)').text();

        $("#account_id").val(sysId);
        $("#account_name").val(`(${bankAcronym}) ${accountNumber} - ${accountName}`);
        $("#account_name").css('background-color', '#e9ecef');

        $('#myInstitutionBankAccount').modal('toggle');
    });

    $(document).ready(function () {
        getInstitutionBankAccount();

        $('#general_ledger_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#general_ledger_date_range').on('apply.daterangepicker', function (ev, picker) {
            $("#general_ledger_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#general_ledger_date_range').on('cancel.daterangepicker', function (ev, picker) {
            $("#general_ledger_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#general_ledger_date_range_container_icon').on('click', function () {
            $('#general_ledger_date_range').trigger('click');
        });
    });
</script>