<div id="myProduct" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-bold">Choose Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 425px;">
                                <input type="text" id="key" hidden>
                                <table class="table table-head-fixed table-sm text-nowrap" id="tableGetProduct">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>UOM</th>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // $(function() {
    //     $('.myProduct').one('click', function(e) {
        $(window).one('load', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'GET',
            url: '{!! route("getProducts") !!}',
            success: function(data) {
                // var result = data.data.data;
                var result = data;

                var no = 1;
                var t = $('#tableGetProduct').DataTable();
                t.clear();
                $.each(result, function(key, val) {
                    t.row.add([
                        '<tbody><tr><input id="sys_id_products' + no + '" value="' + val.sys_ID + '" type="hidden"><td>' + no + '</td>',
                        '<td>' + val.sys_PID + '</td>',
                        '<td>' + val.quantityUnitName + '</td>',
                        '<td>' + val.name + '</td>',
                        '<span style="display:none;"><td">' + val.quantityUnit_RefID + '</td></span></tr></tbody>'
                    ]).draw();
                    no++;
                });
            }
        });
        });
    // });
</script>