

<div id="myGetModalLoan" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Loan Number</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 430px;">
                                <table class="table table-head-fixed text-nowrap" id="TableSearchLoanRevision">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            <!-- <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#TableSearchLoanRevision tbody').on('click', 'tr', function () {

    var refID = $(this).find('input[type=hidden]').val();
    var docNumber = $(this).find('td:eq(1)').text();

    $('#modal_loan_id').val(refID);
    $('#modal_loan_document_number').val(docNumber);

    $('#myGetModalLoan').modal('hide');
});
</script>


