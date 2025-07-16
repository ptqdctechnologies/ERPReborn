<div id="myRole" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Role</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetRole">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
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
        $('.myRole').on('click', function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var keys = 0;
            var departement_id = $("#departement_id").val();

            $.ajax({
                type: 'GET',
                url: '{!! route("getRole") !!}?departement_id=' + departement_id,
                success: function(data) {
                    var no = 1;
                    var t = $('#tableGetRole').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_role' + keys + '" value="' + val.sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.fullName + '</td></tr></tbody>',
                        ]).draw();
                    });
                }
            });
        });
    });
</script>

<script>
    $('#tableGetRole tbody').on('click', 'tr', function() {
        $("#myRole").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id_role = $('#sys_id_role' + id).val();
        var user_role_name = row.find("td:nth-child(2)").text();

        $("#user_role_id").val(sys_id_role);
        $("#user_role").val(user_role_name);

        $("#Modul").prop("disabled", false);

        $('#TableSubMenu').find('tbody').empty();

        checkedValue = [];
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'GET',
            url: '{!! route("getMenuGroup") !!}',
            success: function(data) {
                $(".Modul").empty();

                var option = "<option value='" + '' + "'>" + 'Select Modul' + "</option>";
                $(".Modul").append(option);

                var len = data.data.length;
                for (var i = 0; i < len; i++) {
                    var ids = data.data[i].Sys_ID;
                    var names = data.data[i].Name;
                    var option2 = "<option value='" + ids + "'>" + names + "</option>";
                    $(".Modul").append(option2);
                }
            }
        });

        $("#SavePrivilageMenu").prop("disabled", true);

        $.ajax({
            type: 'GET',
            url: '{!! route("PrivilageMenu.DataListPrivilageMenu") !!}?sys_id_role=' + sys_id_role,
            success: function(data) {
                if(data.status == 200){
                    $("#SavePrivilageMenu").prop("disabled", false);

                    var len = data.data.length;
                    for (var i = 0; i < len; i++) {
                        if(!checkedValue.includes(data.data[i]['menuAction_RefID'])){
                            checkedValue.push(data.data[i]['menuAction_RefID']);
                        }
                    }
                }
            }
        });
    });
</script>