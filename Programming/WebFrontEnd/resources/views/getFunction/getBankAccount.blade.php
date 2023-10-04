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
                                            <th>Bank Name</th>
                                            <th>Bank Account</th>
                                            <th>Account Name</th>
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
    $('#tableGetBank tbody').on('click', 'tr', function() {

        $("#myGetBank").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();  
        var bank_ID = $('#sys_id_bank' + id).val();
        var acronym = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#bank_code").val(bank_ID);
        $("#bank_name").val(acronym);
        $("#bank_name_full").val(name);

        $("#bank_account").val("");
        $("#account_name").val("");

        $("#bank_account2").prop("disabled", false);

        MandatoryFormFunctionFalse("#bank_name", "#bank_name_full");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var sys_ID = $("#beneficiary_id").val();

        var keys = 0;

        $.ajax({
            type: 'GET',
            url: '{!! route("getEntityBankAccount") !!}?sys_ID=' + sys_ID + '&bank_ID=' + bank_ID,
            success: function(data) {
                var no = 1;
                var t = $('#tableGetBankAccount').DataTable();
                t.clear();
                $.each(data, function(key, val) {
                    keys += 1;
                    t.row.add([
                        '<tbody><tr><input id="sys_id_bank_account' + keys + '" value="' + val.bankAccount_RefID + '" type="hidden"><td>' + no++ + '</td>',
                        '<td>' + val.bankAcronym + '</td>',
                        '<td>' + val.bankAccountNumber + '</td>',
                        '<td>' + val.bankAccountName + '</td></tr></tbody>'
                    ]).draw();
                });
            }
        });
    });
</script>

<script>
    $('#tableGetBankAccount tbody').on('click', 'tr', function() {

        $("#myBankAccount").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();  
        var sys_id_bank_account = $('#sys_id_bank_account' + id).val();
        var accountNumber = row.find("td:nth-child(3)").text();
        var accountName = row.find("td:nth-child(4)").text();

        $("#beneficiaryBankAccount_RefID").val(sys_id_bank_account);
        $("#bank_account").val(accountNumber);
        $("#account_name").val(accountName);

        MandatoryFormFunctionFalse("#bank_account", "#account_name");

    });
</script>