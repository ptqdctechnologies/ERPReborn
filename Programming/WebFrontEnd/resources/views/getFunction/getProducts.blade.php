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
                                <table class="table table-head-fixed table-sm text-nowrap" id="tableGetProducts" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>UOM</th>
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
    $(window).one('load', function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function fetchProducts() {
            $.ajax({
                type: 'GET',
                url: '{!! route("getProduct") !!}',
                success: function(data) {
                    console.log('datasss', data);
                    
                    var result = data.data ? data.data.data : [];

                    if (!result || result.length === 0) {
                        setTimeout(fetchProducts, 3000);
                        return;
                    } else {
                        var dataShow = [];
                        for (var i = 0; i < result.length; i++) {
                            var no = i + 1;
                            dataShow.push([
                                '<tbody><tr><input id="sys_id_products' + no + '" value="' + result[i]['sys_ID'] + '" type="hidden"><input id="key' + i + '" value="' + i + '" type="hidden"><td>' + no + '</td>',
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
                },
                error: function() {
                    setTimeout(fetchProducts, 3000);
                }
            });
        }

        fetchProducts();
    });
</script>

<!-- PRODUCT -->
<script>
    $('#tableGetProducts tbody').on('click', 'tr', function() {

        $("#myProducts").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_products' + id).val();
        var sys_pid = row.find("td:nth-child(2)").text();
        var uom = row.find("td:nth-child(3)").text();
        var name = row.find("td:nth-child(4)").text();
        var key = $("#key").val();

        // DIGUNAKAN PADA HALAMAN MODIFY BUDGET
        if (isProductIdDuplicate(sys_id, key)) {
            Swal.fire("Error", "Product ID already exists, please choose another one.", "error");
            return;
        }

        $("#products_id").val(sys_id);
        $("#products_id_show").val(sys_pid);
        $("#products_name").val(uom);
    });
</script>