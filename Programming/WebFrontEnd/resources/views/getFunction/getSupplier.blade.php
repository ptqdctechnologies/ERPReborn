<div id="mySupplier" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Supplier</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetSupplier">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Supplier Code</th>
                                            <th>Supplier Name</th>
                                            <th>Address</th>
                                            <!-- <th style="display:none;"></th> -->
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
        $('.mySupplier').on('click', function(e) {
            e.preventDefault();
            
            $.ajax({
                type: 'GET',
                url: '{!! route("getSupplier") !!}',
                success: function(data) {
                    var no = 1; t = $('#tableGetSupplier').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        t.row.add([

                            '<tbody><tr><td>' + no++ + '</td>',
                            '<td>' + val.sys_ID+ '</td>',
                            '<td>' + val.fullName + '</td>',
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

    $('#tableGetSupplier tbody').on('click', 'tr', function () {

        $("#mySupplier").modal('toggle');

        var row = $(this).closest("tr");    
        var sys_ID = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();
        var address = row.find("td:nth-child(4)").text();
        
        $("#supplier_code").val(sys_ID);
        $("#supplier_name").val(name);
        $("#address").val(address);

    });
    
</script>