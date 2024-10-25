<!-- DISABLE SUB BUDGET CODE KETIKA BUDGET CODE BELUM DIPILIH -->
<script>
    $("#project_code_popup").prop("disabled", true);
    $("#site_code_popup").prop("disabled", true);
    $("#currency_popup").prop("disabled", true);
</script>

<!-- FUNCTION INPUT NUMBER ONLY OR WITHOUT NEGATIVE -->
<script>
    $(document).on('input', '.number-only', function() {
        allowNumbersOnly(this);
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });
</script>

<!-- FUNCTION KETIKA ADDITIONAL YES OR NO -->
<script>
    function toggleCurrencyField() {
        const additionalCORadios = document.getElementsByName('additional_co');
        const currencyField = document.getElementById('currency_field');
        const valueIDRRateField = document.getElementById('value_idr_rate_field');
        const valueCOField = document.getElementById('value_co_field');
        const additionalCOUrl = '{{ $additionalCO }}';

        const toggleFields = (isVisible) => {
            const displayStyle = isVisible ? 'flex' : 'none';
            currencyField.style.display = displayStyle;
            valueIDRRateField.style.display = displayStyle;
            valueCOField.style.display = displayStyle;
        };

        if (additionalCOUrl === 'yes') {
            toggleFields(true);
        } else {
            toggleFields(false);
        }

        additionalCORadios.forEach(radio => {
            radio.addEventListener('change', function() {
                toggleFields(radio.value === 'yes' && radio.checked);
            });
        });
    }

    toggleCurrencyField();
</script>
