<div id="myDoNumber" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Document</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;width:100%;">
                                <table class="table table-head-fixed text-nowrap" id="tableDoNumber">
                                    <thead>
                                        <tr>
                                            <th>Trano</th>
                                            <th>Project Code</th>
                                            <th>Site Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @for($i = 1; $i < 4; $i++) 
                                        <tr>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchDoNumber" data-id="Q00018{{ $i }}">Q00018{{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchDoNumber" data-id="project_id {{ $i }}">Project Code {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchDoNumber" data-id="site_code {{ $i }}" data-name="site_name {{ $i }}">Site Code {{$i}}</p>
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

<script>

    $(function() {
        $('.myDoNumber').on('click', function(e) {
            e.preventDefault();
            $('#tableDoNumber').DataTable();
        });
    });
</script>

<script>
    $(function() {
        $(".klikSearchDoNumber").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            var code = $this.data("id");
            $("#do_number").val(code);
            $("#sitecode").val("143000000000300");
            $(".projectcode").val("143000000000300");
            $("#projectcode4").val("Pengadaan jasa elektrifikasi PI 402 (Kluster KMJ 11, KMJ9, dan KMJ 24) di PT PGE area Kamojang");
            // $("#remarkiSupp2").val("Tagihan Listrik Infra media dinamika bulan Mei 2022.");
            $("#warehouse2").val("Head Office Jakarta");
            $("#warehouse3").val("Pasar Jatinegara");
            $("#addToPoDetail").prop("disabled", false);
        });
    });
</script>