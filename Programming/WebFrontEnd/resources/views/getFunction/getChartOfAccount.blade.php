<div id="myGetChartOfAccount" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Warehouse</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap TableGetWarehouse" id="TableGetWarehouse">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Warehouse Code</th>
                                            <th>Warehouse Name</th>
                                            <th>Warehouse Type</th>
                                            <th>Address</th>
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
        $('.PopUpChartOfAccountRevision').one('click', function(e) {
            e.preventDefault();
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var keys = 0;

            $.ajax({
                type: 'GET',
                url: '{!! route("getWarehouse") !!}',
                success: function(data) {
                    var no = 1;
                    var t = $('#TableGetWarehouse').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys += 1;
                        t.row.add([
                            '<tbody><tr><input id="sys_id_warehouse' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + val.Code + '</td>',
                            '<td>' + val.Name + '</td>',
                            '<td>' + val.Type + '</td>',
                            '<td>' + val.Address + '</td></tr></tbody>',
                        ]).draw();
                    });
                }
            });

            $('#TableGetWarehouse tbody').on('click', 'tr', function() {

                $("#myGetChartOfAccount").modal('toggle');

                var row = $(this).closest("tr");
                var id = row.find("td:nth-child(1)").text();
                var sys_id_warehouse = $('#sys_id_warehouse' + id).val();
                var code = row.find("td:nth-child(2)").text();
                var name = row.find("td:nth-child(3)").text();
                var address = row.find("td:nth-child(5)").text();

                $("#warehouse_id").val(sys_id_warehouse);
                $("#warehouse_name").val(code);

            });

        });
    });
</script>