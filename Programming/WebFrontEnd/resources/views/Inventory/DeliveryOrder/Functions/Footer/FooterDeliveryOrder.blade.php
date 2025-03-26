<script>
    $('#referenceNumberModal').on('click', 'tbody tr', function() {
        var sysId           = $(this).find('input[data-trigger="sys_id_reference_number"]').val();
        var referenceNumber = $(this).find('td:nth-child(2)').text();

        $("#reference_id").val(sysId);
        $("#reference_number").val(referenceNumber);

        $('#referenceNumberModal').modal('hide');
    });
</script>