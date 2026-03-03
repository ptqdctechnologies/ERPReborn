<script>
    let dataStore = [];
    let journalTypeValue = null;
    // let isAdjustmentType = true;
    let currentIndexPickAccountPayablePosting = -1;
    let currentIndexPickCOA = 0;

    function pickCOA(index) {
        currentIndexPickCOA = index;
    }

    function pickAccountPayable(index) {
        currentIndexPickAccountPayablePosting = index;
    }

    // function onChangeTransaction(value) {
    //     isAdjustmentType = value;
    // }

    function onChangeJournalType(element){
        var journalType = element.value;
        if(journalType === "Select a Type"){
            document.getElementById("journal_type_message").style.display = "flex";
            document.querySelectorAll(".journal-type-settlement").forEach(function(el){
                el.style.display = "none";
            });
        } else {
            journalTypeValue = journalType;
            document.getElementById("journal_type_message").style.display = "none";
            if(journalType === "SETTLEMENT"){
                document.querySelectorAll(".journal-type-settlement").forEach(function(el){
                    el.style.display = "flex";
                });
                document.querySelectorAll(".journal-type-fixed-asset").forEach(function(el){
                    el.style.display = "none";
                });
                document.querySelectorAll(".journal-type-posting").forEach(function(el){
                    el.style.display = "none";
                });

                $(".journal-remark").hide();
                $(".journal-button").hide();
                $('.detail-journal-adjustment').hide();
            } else if(journalType === "FIXED_ASSET"){
                document.querySelectorAll(".journal-type-fixed-asset").forEach(function(el){
                    el.style.display = "flex";
                });
                document.querySelectorAll(".journal-type-settlement").forEach(function(el){
                    el.style.display = "none";
                });
                document.querySelectorAll(".journal-type-posting").forEach(function(el){
                    el.style.display = "none";
                });
                
                $(".journal-remark").hide();
                $(".journal-button").hide();
                $('.detail-journal-adjustment').hide();
            } else if(journalType === "POSTING"){
                // document.querySelectorAll(".journal-type-posting").forEach(function(el){
                //     el.style.display = "flex";
                // });
                document.querySelectorAll(".journal-type-fixed-asset").forEach(function(el){
                    el.style.display = "none";
                });
                document.querySelectorAll(".journal-type-settlement").forEach(function(el){
                    el.style.display = "none";
                });

                initiateJournalPosting();
                
                // $(".journal-remark").hide();
                // $(".journal-button").hide();
                // $('.detail-journal-adjustment').hide();
            } else {
                document.querySelectorAll(".journal-type-settlement").forEach(function(el){
                    el.style.display = "none";
                });
                document.querySelectorAll(".journal-type-fixed-asset").forEach(function(el){
                    el.style.display = "none";
                });
                document.querySelectorAll(".journal-type-posting").forEach(function(el){
                    el.style.display = "none";
                });
                initiateJournalAdjustment();
            }
        }

        $("#journal_type_message").hide();
    }

    function onClickGeneralJournalButton() {
        if (journalTypeValue === null || journalTypeValue === "Select a Type") {
            $("#journal_type_message").show();
        } else {
            if (journalTypeValue === "SETTLEMENT") {
                $(".journal-remark").show();
                $(".journal-button").show();
                $('.detail-journal-settlement').show();
                $('.detail-journal-adjustment').hide();
                $('.detail-journal-fixed-asset').hide();
                $('.detail-journal-posting').hide();
                $("#journal_type").prop("disabled", true);
                
                getProductss();
            } else if (journalTypeValue === "FIXED_ASSET") {
                $(".journal-remark").show();
                $(".journal-button").show();
                $('.detail-journal-fixed-asset').show();
                $('.detail-journal-settlement').hide();
                $('.detail-journal-adjustment').hide();
                $('.detail-journal-posting').hide();
                $("#journal_type").prop("disabled", true);
            } else if (journalTypeValue === "ADJUSTMENT") {
                $(".journal-remark").show();
                $(".journal-button").show();
                $('.detail-journal-adjustment').show();
                $('.detail-journal-settlement').hide();
                $('.detail-journal-fixed-asset').hide();
                $('.detail-journal-posting').hide();

                // initiateJournalAdjustment();
            } else if (journalTypeValue === "POSTING") {
                $(".journal-button").show();
                $('.detail-journal-fixed-asset').hide();
                $('.detail-journal-settlement').hide();
                $('.detail-journal-adjustment').hide();
                $('.detail-journal-posting').show();
                // $("#journal_type").prop("disabled", true);
            }
            
            // $("#journal_type").prop("disabled", true);
        }
    }

    function onClickSubmitButton() {
        if (journalTypeValue === "SETTLEMENT") {
            validationSettlementForm();
        } else if (journalTypeValue === "FIXED_ASSET") {
            validationFixedAssetForm();
        } else if (journalTypeValue === "POSTING") {
            validationPostingForm();
        } else {
            validationAdjustmentForm();
        }
    }

    $('#tableAccountPayables').on('click', 'tbody tr', function() {
        const sysId         = $(this).find('input[data-trigger="sys_id_modal_account_payable"]').val();
        const trano         = $(this).find('td:nth-child(2)').text();
        const budgetCode    = $(this).find('td:nth-child(3)').text();
        const budgetName    = $(this).find('td:nth-child(4)').text();
        const supplierCode  = $(this).find('td:nth-child(5)').text();
        const supplierName  = $(this).find('td:nth-child(6)').text();

        if (currentIndexPickAccountPayablePosting > -1) {
            updateJournalPostingField(currentIndexPickAccountPayablePosting, 'transaction_id_posting', trano);
            updateJournalPostingField(currentIndexPickAccountPayablePosting, 'transaction_number_posting', trano);
            updateJournalPostingField(currentIndexPickAccountPayablePosting, 'budget_code_posting', `${budgetCode} - ${budgetName}`);
            updateJournalPostingField(currentIndexPickAccountPayablePosting, 'supplier_code_posting', `${supplierCode} - ${supplierName}`);

            checkOneLinePostingContents(currentIndexPickAccountPayablePosting);

            $(`#transaction_id_posting${currentIndexPickAccountPayablePosting}`).val(sysId);
            $(`#transaction_number_posting${currentIndexPickAccountPayablePosting}`).val(trano);
            $(`#budget_code_posting${currentIndexPickAccountPayablePosting}`).val(`${budgetCode} - ${budgetName}`);
            $(`#supplier_code_posting${currentIndexPickAccountPayablePosting}`).val(`${supplierCode} - ${supplierName}`);
            $(`#transaction_number_posting${currentIndexPickAccountPayablePosting}`).css({"background-color": "#e9ecef"});
            $(`#budget_code_posting${currentIndexPickAccountPayablePosting}`).css({"background-color": "#e9ecef"});
            $(`#supplier_code_posting${currentIndexPickAccountPayablePosting}`).css({"background-color": "#e9ecef"});

            currentIndexPickAccountPayablePosting = -1;
        } else {
            $("#transaction_id_fixed_asset").val(sysId);
            $("#transaction_number_fixed_asset").val(trano);
            $(`#transaction_number_fixed_asset`).css({"background-color": "#e9ecef", "border": "1px solid #ced4da"});

            getDetailJournalFixedAsset(sysId);
            onClickGeneralJournalButton();
        }

        $('#myAccountPayables').modal('hide');
    });

    $('#tableGetChartOfAccount').on('click', 'tbody tr', async function() {
        let sysId = $(this).find('input[data-trigger="sys_id_modal_coa"]').val();
        let code  = $(this).find('td:nth-child(2)').text();
        let name  = $(this).find('td:nth-child(3)').text();

        if (journalTypeValue === "SETTLEMENT") {
            $(`#coa_id${currentIndexPickCOA}`).val(sysId);
            $(`#coa_name${currentIndexPickCOA}`).val(`${code} - ${name}`);
            $(`#coa_name${currentIndexPickCOA}`).css('background-color', '#e9ecef');

            updateField(currentIndexPickCOA, 'coa_id', parseInt(sysId));
            updateField(currentIndexPickCOA, 'coa_name', `${code} - ${name}`);

            checkOneLineSettlementContents(currentIndexPickCOA);
        } else if (journalTypeValue === "FIXED_ASSET") {
            $(`#coaID${currentIndexPickCOA}`).val(sysId);
            $(`#coaName${currentIndexPickCOA}`).val(`${code} - ${name}`);
            $(`#coaName${currentIndexPickCOA}`).css('background-color', '#e9ecef');
        } else if (journalTypeValue === "ADJUSTMENT") {
            $(`#coa_adjustment_id${currentIndexPickCOA}`).val(sysId);
            $(`#coa_adjustment_name${currentIndexPickCOA}`).val(`${code} - ${name}`);
            $(`#coa_adjustment_name${currentIndexPickCOA}`).css('background-color', '#e9ecef');

            updateJournalAdjustmentField(currentIndexPickCOA, 'coa_adjustment_id', parseInt(sysId));
            updateJournalAdjustmentField(currentIndexPickCOA, 'coa_adjustment_name', `${code} - ${name}`);
        }
        
        $('#myGetChartOfAccount').modal('hide');
    });

    $('#tableAllTransactions').on('click', 'tbody tr', function() {
        const sysId     = $(this).find('input[data-trigger="sys_id_transaction"]').val();
        const trano     = $(this).find('td:nth-child(2)').text();
        const project   = $(this).find('td:nth-child(3)').text();
        const site      = $(this).find('td:nth-child(4)').text();
        
        journalSettlementDetails = [];
        getDetailJournalSettlement(sysId);

        $(`#transaction_id_settlement`).val(sysId);
        $(`#transaction_number_settlement`).val(trano);
        $(`#transaction_number_settlement`).css('background-color', '#e9ecef');
        $('#total_settlement').text(currencyTotal(0.00));
        $('#total_settlement_table').text(currencyTotal(0.00));

        // if (isAdjustmentType) {
        // } else {
        //     $(`#transaction_id_posting`).val(sysId);
        //     $(`#transaction_number_posting`).val(trano);
        //     $(`#transaction_number_posting`).css('background-color', '#e9ecef');
        // }
        
        onClickGeneralJournalButton();
        $('#myAllTransactions').modal('hide');
    });
</script>