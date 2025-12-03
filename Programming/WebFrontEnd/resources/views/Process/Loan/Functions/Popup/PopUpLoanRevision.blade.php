<div id="myPopUpLoanRevision" class="modal fade" role="dialog" aria-hidden="true" style="margin-top: 180px;margin-left:6px;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content" style="width:90%;">
            <div class="modal-header">
                <div class="modal-body">
                    <span style="font-size: 15px;position:relative;left:35%;font-weight:bold;">
                        LOAN REVISION
                    </span>
                    <br><br><br>

                    <div class="card" style="margin-left: 8%;">
                        <div class="card-body">
                            <div class="form-group">
                                <table>
                                    <tr>
                                        <td><label>Revision Number&nbsp;</label></td>
                                        <td>
                                            <div class="input-group">

                                                <form id="editLoanForm" action="{{ route('Loan.RevisionLoanIndex') }}" method="POST">
                                                    @csrf
                                                    <input id="modal_loan_id" name="modal_loan_id" type="hidden">
                                                </form>

                                                <div class="input-group-append" style="cursor: pointer;">
                                                    <span class="input-group-text form-control" id="modal_loan_document_number_icon">
                                                        <a data-toggle="modal" data-target="#myLoans">
                                                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13">
                                                        </a>
                                                    </span>
                                                </div>

                                                <input id="modal_loan_document_number" 
                                                       name="modal_loan_document_number" 
                                                       type="text" class="form-control" readonly required>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <a class="btn btn-sm btn-loan-cancel" data-dismiss="modal"
                        style="margin-left: 38%;background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13"> Cancel
                    </a>

                    <a class="btn btn-sm btn-loan-edit" style="background-color:#e9ecef;border:1px solid #ced4da;">
                        <img src="{{ asset('AdminLTE-master/dist/img/edit.png') }}" width="13"> Edit
                    </a>
                </div>

                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
        </div>
    </div>
</div>

<script>

var tableLoan = $('#TableSearchLoanRevision').DataTable({
    processing: true,
    serverSide: false,
    paging: true,
    searching: true
});

// $('#modal_loan_document_number_icon').on('click', function() {

//     $.ajax({
//         type: 'GET',
//         url: '{{ route("getLoanList") }}',
//         success: function(data) {
//             console.log(data);

//             tableLoan.clear();
//             var no = 1;

//             $.each(data.data, function(key, val) {

//                 tableLoan.row.add([
//                     '<input type="hidden" value="'+ val.sys_ID +'">'+ (no++),
//                     val.sys_Text,
//                     val.combinedBudgetCode,
//                     val.combinedBudgetName
//                 ]);
//             });

//             tableLoan.draw();
//         }
//     });

// });
</script>
<script>
    $('.btn-loan-edit').on('click', function() {
    var refID = $('#modal_loan_id').val();

    if (refID) {
        ShowLoading();
        $('#editLoanForm').submit();
    } 
    else {
        $('#modal_loan_document_number').focus()
            .css("border", "1px solid red");
        $('#modal_loan_document_number_icon')
            .css("border", "1px solid red");
    }
});

$('.btn-loan-cancel').on('click', function() {
    $('#modal_loan_id').val("");
    $('#modal_loan_document_number').val("");
});

</script>