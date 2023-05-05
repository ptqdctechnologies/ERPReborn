<div id="myProject" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Budget</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap table-striped" id="tableGetProject">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('.myProject').on('click', function(e) {
            e.preventDefault();
            
            $.ajax({
                type: 'GET',
                url: '{!! route("getProject") !!}',
                success: function(data) {
                    var no = 1; 
                    var t = $('#tableGetProject').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        t.row.add([
                            '<tbody><tr><td><span data-dismiss="modal" onclick="klikProject(\'' + val.sys_ID + '\', \'' + val.code + '\', \'' + val.name + '\');">' + no++ + '</span></td>',
                            '<td><span data-dismiss="modal" onclick="klikProject(\'' + val.sys_ID + '\', \'' + val.code + '\', \'' + val.name + '\');">' + val.code + '</span></td>',
                            '<td><span data-dismiss="modal" onclick="klikProject(\'' + val.sys_ID + '\', \'' + val.code + '\', \'' + val.name + '\');">' + val.name + '</span></td></tr></tbody>'
                        ]).draw();

                    });
                }
            });
            
        });

    });
</script>