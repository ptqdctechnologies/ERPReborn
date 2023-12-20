
<!-- VALIDATION IF FORM DOCUMENT NUMBER INPUTED, PURPOSE FOR DELETE DOCUMENT REF ID -->
<script>
    var triggered = 0;
    $('#advance_number').on('input', function() {
        if (triggered == 0) {
            $('#advance_RefID').val("");
            triggered++;
        }
    });

    $('#advance_number').on('blur', function() {
        // reset the triggered value to 0
        triggered = 0;
    });
</script>