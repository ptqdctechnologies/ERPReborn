<div id="myBankAccount" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Bank Account</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetBankAccount">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bank Account</th>
                                            <th>Account Name</th>
                                            <th style="display:none;"></th>
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
    $('#tableGetBank tbody').on('click', 'tr', function () {

        $("#myGetBank").modal('toggle');

        var row = $(this).closest("tr");    
        var bank_ID = row.find("td:nth-child(4)").text();
        var acronym = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#bank_code").val(bank_ID);
        $("#bank_name").val(acronym);
        $("#bank_name_full").val(name);
        $("#bank_account").val("");
        $("#account_name").val("");

        $("#bank_account2").prop("disabled", false);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var sys_ID = $("#beneficiary_name_id").val();

        $.ajax({
            type: 'GET',
            url: '{!! route("getEntityBankAccount") !!}?sys_ID=' + sys_ID + '&bank_ID=' + bank_ID,
            success: function(data) {
                var no = 1;
                var t = $('#tableGetBankAccount').DataTable();
                t.clear();
                $.each(data, function(key, val) {
                    t.row.add([
                        '<tbody><tr><td>' + no++ + '</td>',
                        '<td>' + val.bankAccountNumber + '</td>',
                        '<td>' + val.bankAccountName + '</td>',
                        '<span style="display:none;"><td>' + val.bankAccount_RefID + '</td></span></tr></tbody>'
                    ]).draw();
                });
            }
        });
    });

</script>

<script>

    $('#tableGetBankAccount tbody').on('click', 'tr', function () {

        $("#myBankAccount").modal('toggle');

        var row = $(this).closest("tr");    
        var sys_ID = row.find("td:nth-child(4)").text();
        var accountNumber = row.find("td:nth-child(2)").text();
        var accountName = row.find("td:nth-child(3)").text();

        $("#beneficiaryBankAccount_RefID").val(sys_ID);
        $("#bank_account").val(accountNumber);
        $("#account_name").val(accountName);
    
    });
    
</script>