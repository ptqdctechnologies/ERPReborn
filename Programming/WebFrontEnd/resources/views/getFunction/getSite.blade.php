<div id="mySiteCode" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Sub Budget Code</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetSite">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
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
        $('.mySiteCodeFrom').one('click', function(e) {
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
                url: '{!! route("getSite") !!}',
                success: function(data) {
                    var no = 1;
                    var t = $('#tableGetSite').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.Code + '</td>',
                            '<td>' + val.Name + '</td></tr></tbody>'
                        ]).draw();
                    });
                }
            });

            $('#tableGetSite tbody').on('click', 'tr', function() {

                $("#mySiteCode").modal('toggle');

                var row = $(this).closest("tr");
                var id = row.find("td:nth-child(1)").text();
                var sys_id_site = $('#sys_id_site' + id).val();
                var code = row.find("td:nth-child(2)").text();
                var name = row.find("td:nth-child(3)").text();

                $("#site_from_id").val(sys_id_site);
                $("#site_from").val(code  + ' - ' + name);

            });

        });
    });
</script>

<script>
    $(function() {
        $('.mySiteCodeTo').one('click', function(e) {
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
                url: '{!! route("getSite") !!}',
                success: function(data) {

                    var no = 1;
                    var t = $('#tableGetSite').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.Code + '</td>',
                            '<td>' + val.Name + '</td></tr></tbody>'
                        ]).draw();
                    });
                }
            });

            $('#tableGetSite tbody').on('click', 'tr', function() {

                $("#mySiteCode").modal('toggle');

                var row = $(this).closest("tr");
                var id = row.find("td:nth-child(1)").text();
                var sys_id_site = $('#sys_id_site' + id).val();
                var code = row.find("td:nth-child(2)").text();
                var name = row.find("td:nth-child(3)").text();

                $("#site_to_id").val(sys_id_site);
                $("#site_to").val(code  + ' - ' + name);

            });

        });
    });
</script>