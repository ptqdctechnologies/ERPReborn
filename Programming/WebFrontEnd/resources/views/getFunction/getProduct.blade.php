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
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <input type="hidden" id="key">
                                <table class="table table-head-fixed text-nowrap" id="tableGetProduct">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>UOM</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @for($i = 1; $i < 20; $i++)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikProduct" data-id1="00012345{{ $i }}" data-id2="Product Name {{ $i }}">00012345{{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <p>Product Name {{$i}}</p>
                                            </td>
                                            <td>Pcs</td>
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
    function KeyFunction(key) {
        $("#key").val(key);
    }
</script>

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
</script>
