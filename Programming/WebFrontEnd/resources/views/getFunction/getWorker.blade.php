<div id="myWorker" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Worker</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 425px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetWorker">
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
        $('.myWorker').one('click', function(e) {
            e.preventDefault();
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
                    var t = $('#tableGetWorker').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_requester' + keys + '" value="' + val.Sys_ID + '" type="hidden"><input id="contact_number_requester' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.PersonName + '</td>',
                            '<td>' + val.OrganizationalJobPositionName + '</td></tr></tbody>',
                        ]).draw();
                    });
                }
            });

        });
    });
</script>

<script>

    $('#tableGetWorker tbody').on('click', 'tr', function () {

        $("#myWorker").modal('toggle');

        var row = $(this).closest("tr");  
        var id = row.find("td:nth-child(1)").text();  
        var sys_id_requester = $('#sys_id_requester' + id).val();
        var contact_number_requester = $('#contact_number_requester' + id).val();
        var name = row.find("td:nth-child(2)").text();
        var position = row.find("td:nth-child(3)").text();

        $("#requester_id").val(sys_id_requester);
        $("#requester").val(name);
        $("#requester_detail").val(position);
        $("#contactPhone").val(contact_number_requester);

        adjustInputSize(document.getElementById("requester_detail"), "string");

        MandatoryFormFunctionFalse("#requester", "#requester_detail");

    });
    
</script>