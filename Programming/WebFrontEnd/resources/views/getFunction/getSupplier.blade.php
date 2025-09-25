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
            var keys = 0;

            $.ajax({
                type: 'GET',
                url: '{!! route("getSupplier") !!}',
                success: function(data) {
                    console.log('data supplier', data);
                    
                    var no = 1;
                    t = $('#tableGetSupplier').DataTable();
                    t.clear();
                    $.each(data, function(key, val) {
                        keys +=1;
                        var code = val.code ? val.code : '-';
                        var name = val.name ? val.name : '-';
                        var address = val.address ? val.address : '-';

                        t.row.add([
                            '<tbody><tr><input id="sys_id_supplier' + key + '" value="' + val.sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                            '<td>' + code + '</td>',
                            '<td>' + name + '</td>',
                            '<td>' + address + '</td></tr></tbody>',
                        ]).draw();

                    });
                },
                error: function (textStatus, errorThrown) {
                    console.log('error', textStatus, errorThrown);
                }
            });
        });

    });
</script>

<script>
    let currentType = null;
    $(document).on('click', '.mySupplier', function() {
        currentType = $(this).data('type');
    });

    $('#tableGetSupplier tbody').on('click', 'tr', function() {
        $("#mySupplier").modal('toggle');

        var row = $(this).closest("tr");
        var sys_id_supplier = row.find(".sys_id_supplier").val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        if (currentType === 'creditor') {
            $("#creditor_id").val(sys_id_supplier);
            $("#creditor_code").val(code);
            $("#creditor_name").val(name);
        } 
        else if (currentType === 'debitor') {
            $("#debitor_id").val(sys_id_supplier);
            $("#debitor_code").val(code);
            $("#debitor_name").val(name);
        }else{
            $("#supplier_id").val(sys_id_supplier);
            $("#supplier_code").val(code);
            $("#supplier_name").val(name);
            $("#address").val(address);
        }
    });

    // $('#tableGetSupplier tbody').on('click', 'tr', function() {
    //     $("#mySupplier").modal('toggle');

    //     var row = $(this).closest("tr");
    //     var sys_id_supplier = row.find(".sys_id_supplier").val();
    //     var code = row.find("td:nth-child(2)").text();
    //     var name = row.find("td:nth-child(3)").text();
    //     var address = row.find("td:nth-child(4)").text();

    //     $("#supplier_id").val(sys_id_supplier);
    //     $("#supplier_code").val(code);
    //     $("#supplier_name").val(name);
    //     $("#address").val(address);
    // });

</script>
