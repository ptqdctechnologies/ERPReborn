<script>
    const dateRate = document.getElementById("rate_date");

    $('#tableCurrencies').on('click', 'tbody tr', function () {
        const sysId = $(this).find('input[data-trigger="sys_id_currencies"]').val();
        const code = $(this).find('td:nth-child(2)').text();
        const name = $(this).find('td:nth-child(3)').text();

        $("#currency_id").val(sysId);
        $("#currency_code").val(code);
        $("#currency_name").val(`${code} - ${name}`);
        $("#currency_name").css({ "background-color": "#e9ecef", "border": "1px solid #ced4da" });

        $('#myCurrencies').modal('toggle');
    });

    $(document).ready(function () {
        $('#rate_date_range').datetimepicker({
            format: 'L',
            minDate: moment().subtract(7, 'days'),
            maxDate: moment(),
        });

        $('#rate_date_range').on('change.datetimepicker', function (e) {
            if (dateRate.value) {
                $("#rate_date").css({
                    "background-color": "#e9ecef",
                    "border": "1px solid #ced4da"
                });
                // $("#dateOfDeliveryMessage").hide();
            }
        });
    });
</script>