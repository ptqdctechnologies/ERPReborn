<script>
    let journalTypeValue = null;
    let currentIndexPickCOA = 0;

    function pickCOA(index) {
        currentIndexPickCOA = index;
    }

    function onChangeJournalType(element){
        var journalType = element.value;
        if(journalType === "Select a Type"){
            document.getElementById("journal_type_message").style.display = "flex";
            document.querySelectorAll(".journal-type-settlement").forEach(function(el){
                el.style.display = "none";
            });
        } else {
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
            } else if(journalType === "POSTING"){
                document.querySelectorAll(".journal-type-posting").forEach(function(el){
                    el.style.display = "flex";
                });
                document.querySelectorAll(".journal-type-fixed-asset").forEach(function(el){
                    el.style.display = "none";
                });
                document.querySelectorAll(".journal-type-settlement").forEach(function(el){
                    el.style.display = "none";
                });
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
            }
        }

        journalTypeValue = journalType;
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
                
                getProductss();
            } else if (journalTypeValue === "FIXED_ASSET") {
                $(".journal-remark").show();
                $(".journal-button").show();
                $('.detail-journal-fixed-asset').show();
                $('.detail-journal-settlement').hide();
                $('.detail-journal-adjustment').hide();
            } else if (journalTypeValue === "ADJUSTMENT") {
                $(".journal-remark").show();
                $(".journal-button").show();
                $('.detail-journal-adjustment').show();
                $('.detail-journal-settlement').hide();
                $('.detail-journal-fixed-asset').hide();

                initiateJournalAdjustment();
            }
            
            $("#journal_type").prop("disabled", true);
        }
    }

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
</script>