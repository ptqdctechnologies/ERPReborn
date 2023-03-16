<div id="myProduct" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button> 
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 425px;">
                                <table class="table table-head-fixed table-sm text-nowrap" id="tableGetProduct">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>UOM</th>
                                        </tr>
                                    </thead>
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
    function KeyFunction(key) {

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
                var no = 1;

                for ( var i=0 ; i< Object.keys(data).length ; i++ ) {
                    dataShow.push([
                        i+1,
                        '<span data-dismiss="modal" onclick="klikProduct(\'' + data[i]['sys_ID'] + '\', \'' + data[i]['name'] + '\', \'' + data[i]['quantityUnitName'] + '\', \'' + key + '\');">' + data[i]['sys_ID'] + '</span>',
                        '<span data-dismiss="modal" onclick="klikProduct(\'' + data[i]['sys_ID'] + '\', \'' + data[i]['name'] + '\', \'' + data[i]['quantityUnitName'] + '\', \'' + key + '\');">' + data[i]['name'] + '</span>',
                        '<span data-dismiss="modal" onclick="klikProduct(\'' + data[i]['sys_ID'] + '\', \'' + data[i]['name'] + '\', \'' + data[i]['quantityUnitName'] + '\', \'' + key + '\');">' + data[i]['quantityUnitName'] + '</span>',  
                    ]);
                }

                $("#tableGetProduct").dataTable().fnDestroy()

                $('#tableGetProduct').DataTable( {
                    data:           dataShow,
                    deferRender:    true,
                    // scrollY:        200,
                    scrollCollapse: true,
                    scroller:       true
                } );
            }
        });
    }
</script>

<script>
    function klikProduct(id, name, uom, key) {

        $("#putProductId"+key).val(id);
        $("#putProductName"+key).html(name);
        $("#putUom"+key).val(uom);

        $("#qty_req"+key).prop("disabled", false);
        $("#price_req"+key).prop("disabled", false);
        $("#remark_req"+key).prop("disabled", false);
    }
</script>
<!-- 


<script>
    $(function() {
        $(".klikProduct").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            var code = $this.data("id1");
            var name = $this.data("id2");
            var key = $("#key").val();

            $("#putProductId"+key).val(code);
            $("#putProductName"+key).html(name);

            $("#qty_req"+key).prop("disabled", false);
            $("#price_req"+key).prop("disabled", false);
            $("#remark_req"+key).prop("disabled", false);

        });
    });
</script> -->
