<div id="myDepartement" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Departement</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 425px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetDepartement">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
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
        $('.myDepartement').on('click', function(e) {
            e.preventDefault();
            // ShowLoading();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var keys = 0;
            
            $.ajax({
                type: 'GET',
                url: '{!! route("getDepartement") !!}',
                success: function(data) {
                    var no = 1;
                    var t = $('#tableGetDepartement').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_departemnt' + keys + '" value="' + val.sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.name + '</td></tr></tbody>',
                        ]).draw();
                    });

                    // HideLoading();
                }
            });
        });
    });
</script>

<script>
    $('#tableGetDepartement tbody').on('click', 'tr', function() {

        $("#myDepartement").modal('toggle');

        $("#user_role_popup").prop("disabled", false);

        var row = $(this).closest("tr");  
        var id = row.find("td:nth-child(1)").text();  
        var sys_id_departemnt = $('#sys_id_departemnt' + id).val();
        var name = row.find("td:nth-child(2)").text();

        $("#departement_id").val(sys_id_departemnt);
        $("#departement").val(name);

        $("#user_role_id").val("");
        $("#user_role").val("");
    });
</script>