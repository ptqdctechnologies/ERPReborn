<div id="myPoNumber" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Document</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- <form>
                    <div class="form-group">
                        <table>
                            <tr>
                                <td><label>Transaction</label></td>
                                <td>
                                    <div class="input-group">
                                        <select class="form-control select2bs4" style="width: 100%; border-radius:0;">
                                            <option selected="selected">Select Transaction</option>
                                            <option>PO</option>
                                            <option>POO</option>
                                        </select>
                                        <br><br><br>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form> -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tablePoNumber">
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
                                                    <p data-dismiss="modal" class="klikSearchPoNumber" data-id="Q00018{{ $i }}">Q00018{{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchPoNumber" data-id="project_id {{ $i }}">Project Code {{$i}}</p>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="tag tag-success">
                                                    <p data-dismiss="modal" class="klikSearchPoNumber" data-id="site_code {{ $i }}" data-name="site_name {{ $i }}">Site Code {{$i}}</p>
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
        $(".klikSearchPoNumber").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            var code = $this.data("id");
            $("#po_number").val(code);
            $("#sitecode").val("143000000000300");
            $(".projectcode").val("143000000000300");
            $("#projectcode2").val("Pengadaan jasa elektrifikasi PI 402 (Kluster KMJ 11, KMJ9, dan KMJ 24) di PT PGE area Kamojang");
            $("#supplier_code").val("VDR2279");
            $("#supplier_code2").val("Infra Media Dinamika");
            $("#netActiSupp").val("");
            $("#addToPoDetail").prop("disabled", false);
        });
    });
</script>