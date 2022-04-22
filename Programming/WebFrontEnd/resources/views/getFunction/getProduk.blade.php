<div id="myProductArf" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
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
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetProduct">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>UOM</th>
                                            <th>Piece Meal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @for($i = 1; $i < 20; $i++)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikProduct" data-id="Product Code {{ $i }}" data-id2="PCS" data-id3="IDR" data-name="Product Name {{ $i }}">Product Code {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <p>Detail {{$i}}</p>
                                            </td>
                                            <td>Pcs</td>
                                            <td>N</td>
                                        </tr>
                                        @endfor
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
        $(".klikProduct").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            var code = $this.data("id");
            var name = $this.data("name");
            var uom = $this.data("id2");
            var valuta = $this.data("id3");
            $("#productIdRem").val(code);
            $("#productNameRem").val(name);
            $("#qtyNameRem").val(uom);
            $("#unitPriceNameRem").val(valuta);
        });
    });
</script>

