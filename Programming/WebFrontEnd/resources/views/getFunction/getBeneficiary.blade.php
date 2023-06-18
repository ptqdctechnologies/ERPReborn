<div id="myBeneficiary" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Beneficiary</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 425px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetBeneficiary">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Position</th>
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
    $(function() {
        $('.myBeneficiary').on('click', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '{!! route("getWorker") !!}',
                success: function(data) {
                    var no = 1;
                    var t = $('#tableGetBeneficiary').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        t.row.add([
                            '<tbody><tr><td>' + no++ + '</td>',
                            '<td>' + val.personName + '</td>',
                            '<td>' + val.organizationalJobPositionName + '</td>',
                            '<span style="display:none;"><td>' + val.sys_ID + '</td></span></tr></tbody>',
                        ]).draw();
                    });
                }
            });
        });
    });
</script>

<script>
    $('#tableGetBeneficiary tbody').on('click', 'tr', function() {

        $("#myBeneficiary").modal('toggle');

        var row = $(this).closest("tr");
        var sys_id = row.find("td:nth-child(4)").text();
        var name = row.find("td:nth-child(2)").text();
        var position = row.find("td:nth-child(3)").text();

        $("#beneficiary_name_id").val(sys_id);
        $("#beneficiary_name").val(name);
        $("#beneficiary_position").val(position);

        $("#bank_code").val("");
        $("#bank_name").val("");
        $("#bank_name_full").val("");
        $("#bank_account").val("");
        $("#account_name").val("");

        $('#tableGetBank').find('tbody').empty();
        $('#tableGetBankAccount').find('tbody').empty();

        $("#bank_name2").prop("disabled", false);

    });
</script>