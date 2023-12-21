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
        $('.myBeneficiary').one('click', function(e) {
            e.preventDefault();
            console.log("aa");
            // ShowLoading();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var keys = 0;
            
            $.ajax({
                type: 'GET',
                url: '{!! route("getWorker") !!}',
                success: function(data) {
                    var no = 1;
                    var t = $('#tableGetBeneficiary').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_beneficiary' + keys + '" value="' + val.Sys_ID + '" type="hidden"><input id="person_refID' + keys + '" value="' + val.Person_RefID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.PersonName + '</td>',
                            '<td>' + val.OrganizationalJobPositionName + '</td></tr></tbody>',
                        ]).draw();
                    });

                    // HideLoading();
                }
            });
        });
    });
</script>

<script>
    $('#tableGetBeneficiary tbody').on('click', 'tr', function() {

        $("#myBeneficiary").modal('toggle');

        var row = $(this).closest("tr");  
        var id = row.find("td:nth-child(1)").text();  
        var sys_id_beneficiary = $('#sys_id_beneficiary' + id).val();
        var person_refID = $('#person_refID' + id).val();
        var name = row.find("td:nth-child(2)").text();
        var position = row.find("td:nth-child(3)").text();

        $("#beneficiary_id").val(sys_id_beneficiary);
        $("#beneficiary").val(name);
        $("#beneficiary_detail").val(position);

        $("#person_refID").val(person_refID);

        $("#bank_code").val("");
        $("#bank_name").val("");
        $("#bank_name_detail").val("");
        $("#bank_account").val("");
        $("#bank_account_detail").val("");

        $('#tableGetBank').find('tbody').empty();
        $('#tableGetBankAccount').find('tbody').empty();

        $("#bank_name_popup").prop("disabled", false);


        MandatoryFormFunctionFalse("#beneficiary", "#beneficiary_detail");

    });
</script>