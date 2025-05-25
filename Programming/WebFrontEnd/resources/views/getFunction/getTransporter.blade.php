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

<!-- <script>
    $(function() {
        $('.myTransporter').on('click', function(e) {
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
                    var t = $('#tableGetTransporter').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        t.row.add([
                            '<tbody><tr><td>' + no++ + '</td>',
                            '<td><span data-dismiss="modal" onclick="klikTransporter(\'' + val.sys_ID + '\', \'' + val.personName + '\', \'' + val.sys_ID + '\', \'' + val.sys_ID + '\', \'' + val.sys_ID + '\', \'' + val.sys_ID + '\', \'' + val.sys_ID + '\');">' + val.sys_ID + '</span></td>',
                            '<td style="border:1px solid #e9ecef;">' + val.personName + '</td>',
                        ]).draw();
                    });
                }
            });
        });
    });
</script> -->


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
                            '<tbody><tr><input id="sys_id_transporter' + keys + '" value="' + val.sys_ID + '" data-trigger="sys_id_transporter" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.code + '</td>',
                            '<td>' + val.sys_Text + '</td></tr></tbody>',
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

        var row = $(this).closest("tr");  
        var id = row.find("td:nth-child(1)").text();  
        var sys_id_transporter = $('#sys_id_transporter' + id).val();
        var name = row.find("td:nth-child(2)").text();

        $("#transporter_id").val(sys_id_transporter);
        $("#transporter").val(name);
        $("#trans_phone").val(sys_id_transporter);
        $("#trans_fax").val(sys_id_transporter);
        $("#trans_contact_person").val(sys_id_transporter);
        $("#trans_handphone").val(sys_id_transporter);
        $("#trans_address").val(name);

        MandatoryFormFunctionFalse("#transporter", "#transporter_detail");

    });
    
</script>