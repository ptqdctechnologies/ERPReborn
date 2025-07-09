<div id="myTransporter" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Transporter</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetTransporter">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Transporter Code</th>
                                            <th>Transporter Name</th>
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
        $('.myTransporter').one('click', function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var keys = 0;

            $.ajax({
                type: 'GET',
                url: '{!! route("getTransporter") !!}',
                success: function(data) {
                    console.log('data', data);
                    
                    var no = 1;
                    var t = $('#tableGetTransporter').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_transporter' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_transporter" type="hidden"><input id="email_transporter' + keys + '" value="' + val.EMailAccount_Business + '" data-trigger="email_transporter" type="hidden"><td>' + no++ + '</td>',
                            '<td><input id="fax_transporter' + keys + '" value="' + val.contactNumber_Faximile + '" data-trigger="fax_transporter" type="hidden"><input id="office_phone_transporter' + keys + '" value="' + val.contactNumber_OfficePhone + '" data-trigger="office_phone_transporter" type="hidden">' + val.code + '</td>',
                            '<td><input id="phone_transporter' + keys + '" value="' + val.contactNumber_MobilePhone + '" data-trigger="phone_transporter" type="hidden"><input id="address_transporter' + keys + '" value="' + val.address + '" data-trigger="address_transporter" type="hidden">' + val.sys_Text + '</td></tr></tbody>',
                        ]).draw();
                    });
                }
            });

        });
    });
</script>

<script>

    $('#tableGetTransporter tbody').on('click', 'tr', function () {

        $("#myTransporter").modal('toggle');

        var row                         = $(this).closest("tr");  
        var id                          = row.find("td:nth-child(1)").text();
        var sys_id_transporter          = $('#sys_id_transporter' + id).val();
        var fax_transporter             = $('#fax_transporter' + id).val();
        var phone_transporter           = $('#phone_transporter' + id).val();
        var email_transporter           = $('#email_transporter' + id).val();
        var office_phone_transporter    = $('#office_phone_transporter' + id).val();
        var address_transporter         = $('#address_transporter' + id).val();
        var name                        = row.find("td:nth-child(2)").text();

        $("#transporter_id").val(sys_id_transporter);
        $("#transporter").val(name);
        $("#trans_phone").val(office_phone_transporter);
        $("#trans_fax").val(fax_transporter);
        $("#trans_contact_person").val(email_transporter);
        $("#trans_handphone").val(phone_transporter);
        $("#trans_address").val(address_transporter);

        MandatoryFormFunctionFalse("#transporter", "#transporter_detail");

    });
    
</script>