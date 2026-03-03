<script>
    const journalDate       = document.getElementById("period_date");
    const taxType           = document.getElementById("tax_type");
    let beginningBalance    = 500000000;
    let taxInTotal          = 0;
    let taxOutTotal         = 0;
    let totalWHT            = 0;
    let totalPrepaidWHT     = 0;

    function calculationCard() {
        const result = beginningBalance + taxInTotal - taxOutTotal;

        $('#nominal_cash_in').text(currencyTotal(taxInTotal));
        $('#nominal_cash_out').text(currencyTotal(taxOutTotal));
        $('#nominal_ending_balance').text(currencyTotal(result));
    }

    function onSearchTaxType() {
        if (taxType.value === "VAT") {
            $('#submit-button-text').text("Submit to VAT Report");
            $('.vat-components').show();
            $('#vat-table').show();
            $('.wht-table').hide();
            $('.prepaid-wht-table').hide();
        } else if (taxType.value === "WHT") {
            $('#submit-button-text').text("Submit to WHT Report");
            $('.vat-components').hide();
            $('#vat-table').hide();
            $('.wht-table').show();
            $('.prepaid-wht-table').hide();
        } else if (taxType.value === "PREPAID_WHT") {
            $('#submit-button-text').text("Submit to Prepaid WHT Report");
            $('.vat-components').hide();
            $('#vat-table').hide();
            $('.wht-table').hide();
            $('.prepaid-wht-table').show();
        }
        
        $('.tax-components').show();
    }

    function onCheckVatDetails(value, index) {
        const rows = document.querySelectorAll("#vat_details_table tbody tr");

        rows.forEach((row, ind) => {
            const thirdCellText = row.querySelectorAll("td")[3].textContent;
            const tenCellText   = row.querySelectorAll("td")[10].textContent;

            if (thirdCellText == 'In') {
                if (index == ind && value.checked) {
                    taxInTotal  += parseFloat(tenCellText.replace(/,/g, ''));
                } else if (index == ind && !value.checked) {
                    taxInTotal  -= parseFloat(tenCellText.replace(/,/g, ''));
                }
            } else {
                if (index == ind && value.checked) {
                    taxOutTotal += parseFloat(tenCellText.replace(/,/g, ''));
                } else if (index == ind && !value.checked) {
                    taxOutTotal -= parseFloat(tenCellText.replace(/,/g, ''));
                }
            }
        });

        calculationCard();
    }

    function onCheckWhtDetails(value, index) {
        const rows = document.querySelectorAll("#wht_details_table tbody tr");

        rows.forEach((row, ind) => {
            const eightCellText = row.querySelectorAll("td")[8].textContent;

            if (index == ind && value.checked) {
                totalWHT += parseFloat(eightCellText.replace(/,/g, ''));
            } else if (index == ind && !value.checked) {
                totalWHT -= parseFloat(eightCellText.replace(/,/g, ''));
            }
        });

        $('#total_wht_table').text(currencyTotal(totalWHT));
    }

    function onCheckPrepaidWhtDetails(value, index) {
        const rows = document.querySelectorAll("#prepaid_wht_details_table tbody tr");

        rows.forEach((row, ind) => {
            const eightCellText = row.querySelectorAll("td")[8].textContent;

            if (index == ind && value.checked) {
                totalPrepaidWHT += parseFloat(eightCellText.replace(/,/g, ''));
            } else if (index == ind && !value.checked) {
                totalPrepaidWHT -= parseFloat(eightCellText.replace(/,/g, ''));
            }
        });

        $('#total_prepaid_wht_table').text(currencyTotal(totalPrepaidWHT));
    }

    $(window).one('load', function() {
        $('#nominal_beginning_balance').text(currencyTotal(beginningBalance));

        $('#period_date_range').daterangepicker({
            autoUpdateInput: false,
            maxDate: moment(),
            locale: {
                cancelLabel: 'Clear'
            }
        });

        $('#period_date_range').on('apply.daterangepicker', function(ev, picker) {
            $("#period_date_range").css('background-color', '#e9ecef');
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });

        $('#period_date_range').on('cancel.daterangepicker', function(ev, picker) {
            $("#period_date_range").css('background-color', '#fff');
            $(this).val('');
        });

        $('#period_date_range_container_icon').on('click', function () {
            $('#period_date_range').trigger('click');
        });
    });
</script>