<div id="myDeliverTo" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Warehouse</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetDeliverTo">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Warehouse Code</th>
                                            <th>Warehouse Name</th>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        $('.myDeliverTo').on('click', function(e) {
            e.preventDefault();
            
            $.ajax({
                type: 'GET',
                url: '{!! route("getDeliverTo") !!}',
                success: function(data) {
                    var no = 1; t = $('#tableGetDeliverTo').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        t.row.add([

                            '<tbody><tr><td>' + no++ + '</td>',
                            '<td>' + val.sys_ID+ '</td>',
                            '<td>' + val.name + '</td>',
                            '<td>' + val.address + '</td></tr></tbody>',
                            // '<span style="display:none;"><td>' + val.sys_ID + '</td></span></tr></tbody>'

                        ]).draw();

                    });
                }
            });
        });

    });
</script>

<script>

    $('#tableGetDeliverTo tbody').on('click', 'tr', function () {

        $("#myDeliverTo").modal('toggle');

        var row = $(this).closest("tr");    
        var sys_ID = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();
        var address = row.find("td:nth-child(4)").text();
        
        $("#deliver_code").val(sys_ID);
        $("#deliver_name").val(name);
        $("#address").val(address);

    });
    
</script>