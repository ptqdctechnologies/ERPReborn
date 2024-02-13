<div id="mySearchWarehouse1" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Warehouse</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="TableGetWarehouse1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Warehouse Code</th>
                                            <th>Warehouse Name</th>
                                            <th>Address</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for($i = 1; $i < 10; $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>WH-000{{ $i }}</td>
                                            <td>Lekosula - {{ $i }}</td>
                                            <td>Jl. Baru Leko. Kode Pos, : 97796. Desa/Kelurahan, : DESA LEKO SULA. Kecamatan/Kota (LN), Kec. Mangoli Barat, Kab. Kepulauan Sula, Prov. Maluku Utara - {{ $i }}</td>
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
        $('.mySearchWarehouse1').on('click', function(e) {
            e.preventDefault();
            $('#TableGetWarehouse1').DataTable();
        });
    });
</script>


<script>

    $('#TableGetWarehouse1 tbody').on('click', 'tr', function() {

        $("#mySearchWarehouse1").modal('toggle');

        var row = $(this).closest("tr");
        var wh_code = row.find("td:nth-child(2)").text();
        $("#headerWarehouse1").val(wh_code);
    });
</script>
