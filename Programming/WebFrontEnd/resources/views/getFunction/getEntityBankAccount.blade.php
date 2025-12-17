<div id="myEntityBankAccount" class="modal fade" role="dialog">
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
                                <table class="table table-head-fixed text-nowrap" id="tableGetEntityBankAccount">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bank Name</th>
                                            <th>Account Number</th>
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
        var Bank_RefID = $('#sys_id_bank' + id).val();
        var acronym = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#bank_code").val(Bank_RefID);
        $("#bank_name").val(acronym);
        $("#bank_name_detail").val(name);

        $("#bank_account").val("");
        $("#bank_account_detail").val("");

        $("#bank_account_popup").prop("disabled", false);

        MandatoryFormFunctionFalse("#bank_name", "#bank_name_detail");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var person_refID = $("#person_refID").val();

        var keys = 0;

        $.ajax({
            type: 'GET',
            url: '{!! route("getEntityBankAccount") !!}?person_refID=' + person_refID + '&Bank_RefID=' + Bank_RefID,
            success: function(data) {

                if(data.length == 1){
                    $("#bank_account_id").val(data[0].Sys_ID);
                    $("#bank_account").val(data[0].AccountNumber);
                    $("#bank_account_detail").val(data[0].AccountName);
                    
                    MandatoryFormFunctionFalse("#bank_account", "#bank_account_detail");
                }
                
                var no = 1;
                var t = $('#tableGetEntityBankAccount').DataTable();
                t.clear();
                $.each(data, function(key, val) {
                    keys += 1;
                    t.row.add([
                        '<tbody><tr><input id="sys_id_bank_account' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                        '<td>' + val.BankAcronym + '</td>',
                        '<td>' + val.AccountNumber + '</td>',
                        '<td>' + val.AccountName + '</td></tr></tbody>'
                    ]).draw();
                });
            }
        });
    });
</script>

<script>
    $('#tableGetEntityBankAccount tbody').on('click', 'tr', function() {

        $("#myEntityBankAccount").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();  
        var sys_id_bank_account = $('#sys_id_bank_account' + id).val();
        var accountNumber = row.find("td:nth-child(3)").text();
        var accountName = row.find("td:nth-child(4)").text();

        $("#bank_account_id").val(sys_id_bank_account);
        $("#bank_account").val(accountNumber);
        $("#bank_account_detail").val(accountName);

        MandatoryFormFunctionFalse("#bank_account", "#bank_account_detail");

    });
</script>