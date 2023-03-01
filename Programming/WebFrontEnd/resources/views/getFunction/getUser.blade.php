<div id="myUser" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
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
                                <input type="hidden" id="idx">
                                <table class="table table-head-fixed text-nowrap" id="tableGetUser">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Supplier Code</th>
                                            <th>Supplier Name</th>
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
<!--|----------------------------------------------------------------------------------|
    |                            End Function My Project Code                          |
    |----------------------------------------------------------------------------------|-->
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    function myUser(idx) {
        
        $("#idx").val(idx);
        $('#tableGetUser').DataTable();

        var idx = $("#idx").val();
        console.log(idx);

        $.ajax({
            type: 'GET',
            url: '{!! route("getSupplier") !!}',
            success: function(data) {
                var no = 1;
                t = $('#tableGetUser').DataTable();
                t.clear();
                $.each(data, function(key, val) {
                    t.row.add([
                        '<tbody><tr><td>' + no++ + '</td>',
                        '<td><span data-dismiss="modal" onclick="klikSupplier(\'' + val.sys_ID + '\', \'' + val.code + '\', \'' + val.fullName + '\', \'' + val.fullName + '\', \'' + idx + '\');">' + val.fullName + '</span></td>',
                        '<td style="border:1px solid #e9ecef;">' + val.fullName + '</td>',
                        '<td style="border:1px solid #e9ecef;">' + val.fullName + '</td></tr></tbody>'
                    ]).draw();

                });
            }
        });
        
    }
</script>

<script>
    function klikSupplier(id, code, name, address, idx) {
        $("#user_code"+idx).val(name);
        $("#supplier_name").val(name);
        $("#supplierAddress").val(address);
    }
</script>