<div id="myDelivery" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Delivery</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <table>
                            <tr>
                                <td><label>Name</label></td>
                                <td>
                                    <div class="input-group">
                                        <input autocomplete="off" style="border-radius:0;" type="text" class="form-control" id="name_delivery" onkeyup="searchDeliveryName()">
                                        <br><br>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableDelivery">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @for($i = 1; $i < 20; $i++)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikTableDelivery" data-name="Delivery Name {{ $i }}">Delivery Name {{$i}}</p>
                                                </span>
                                            </td>
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
<!--|----------------------------------------------------------------------------------|
    |                            End Function My Project Code                          |
    |----------------------------------------------------------------------------------|-->
<script>

    $(".klikTableDelivery").on('click', function(e) {
        e.preventDefault(); // in chase you change to a link or button
        var $this = $(this);
        var nama = $this.data("name");
        $("#delivery").val(nama);
    });
</script>