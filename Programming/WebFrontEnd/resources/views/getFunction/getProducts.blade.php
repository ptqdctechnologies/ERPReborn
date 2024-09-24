<div id="myProducts" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
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
                                <table class="table table-head-fixed table-sm text-nowrap" id="tableGetProducts">
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
    $(window).one('load', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var dataShow = [];

        $.ajax({
            type: 'GET',
            url: '{!! route("getProduct") !!}',
            success: function(data) {
                var result = data.data.data;
                
                for (var i = 0; i < result.length; i++) {
                    var no = i + 1;
                    dataShow.push([
                        '<tbody><tr><input id="sys_id_products' + no + '" value="' + result[i]['sys_ID'] + '" type="hidden"><td>' + no + '</td>',
                        '<td>' + result[i]['sys_ID'] + '</td>',
                        '<td>' + result[i]['name'] + '</td>',
                        '<td>' + result[i]['quantityUnitName'] + '</td>',
                        '<span style="display:none;"><td">' + result[i]['quantityUnit_RefID'] + '</td></span></tr></tbody>'
                    ]);
                }

                $('#tableGetProducts').DataTable({
                    data: dataShow,
                    deferRender: true,
                    scrollCollapse: true,
                    scroller: true
                });
            }
        });
    });
</script>