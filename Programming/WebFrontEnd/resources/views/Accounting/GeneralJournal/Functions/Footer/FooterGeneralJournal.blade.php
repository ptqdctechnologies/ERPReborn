<script>
    let journalTypeValue = null;

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
            }
            
            $("#journal_type").prop("disabled", true);
        }
    }
</script>