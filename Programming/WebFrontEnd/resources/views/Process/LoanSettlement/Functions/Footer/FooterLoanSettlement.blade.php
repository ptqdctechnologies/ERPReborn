<script>
    $('#tableLoanSettlements').on('click', 'tbody tr', function() {
        const sysID = $(this).find('input[data-trigger="sys_id_loan_settlements"]').val();
        const trano = $(this).find('td:nth-child(2)').text();

        $("#modal_loan_settlement_id").val(sysID);
        $("#modal_loan_settlement_document_number").val(trano);

        $('#myLoanSettlements').modal('hide');
    });
</script>