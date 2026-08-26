<script>
    $('#tableCurrencies').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_currencies"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        if (code != "USD" && code != "IDR" && code != "EUR") {
            Swal.fire("Error", "Please Call Accounting Staffs to Input Current Exchange Rate. Thank You.", "error");

            return;
        } else {
            $("#currency_id").val(sysId);
            $("#currency_code").val(code);
            $("#currency_name").val(`${code} - ${name}`);
            $("#currency_name").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });
        }

        $('#myCurrencies').modal('toggle');
    });
</script>