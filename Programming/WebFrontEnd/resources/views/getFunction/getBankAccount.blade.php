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
                                <table class="table table-head-fixed text-nowrap table-striped" id="tableGetBankAccount">
                                    <thead>
                                        <tr>
                                            <th>No</th>
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
    function klikGetBank(code, name) {
        $("#bank_code").val(code);
        $("#bank_name").val(name);
        $("#bank_account2").prop("disabled", false);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getBankAccount") !!}?bank_code=' + $('#bank_code').val(),
            success: function(data) {

                var no = 1;

                var t = $('#tableGetBankAccount').DataTable();
                t.clear();
                $.each(data, function(key, val) {
                    t.row.add([
                        '<tbody><tr><td>' + no++ + '</td>',
                        '<td><span data-dismiss="modal" onclick="klikBankAccount(\'' + val.sys_ID + '\', \'' + val.accountNumber + '\', \'' + val.accountName + '\');">' + val.accountNumber + '</span></td>',
                        '<td style="border:1px solid #e9ecef;">' + val.accountName + '</td></tr></tbody>'
                    ]).draw();
                });
            }
        });
    }

</script>

<script>
    function klikBankAccount(id, code, name) {
        $("#beneficiaryBankAccount_RefID").val(id);
        $("#bank_account").val(code);
        $("#account_name").val(name);
    }
    
</script>