<div id="myWorker" class="modal fade" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Select Worker</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableGetWorker">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1 @endphp
                                        @foreach($dataWorker as $dataWorkers)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td data-dismiss="modal" class="klikWorker" data-id="{{$dataWorkers['sys_ID']}}" data-name="{{$dataWorkers['name']}}">{{$dataWorkers['sys_ID']}}</td>
                                            <td>{{$dataWorkers['name']}}</td>
                                        </tr>
                                        @endforeach
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
    ----------------------------------------------------------------------------------|-->

<script>
    $('document').ready(function() {
        $(".klikWorker").on('click', function(e) {
            e.preventDefault(); // in chase you change to a link or button
            var $this = $(this);
            var id = $this.data("id");
            var name = $this.data("name");
            $("#popUpWorkerId").val(name);
            // $("#request_name").val(name);
            // $("#budget_name").val(name);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '{!! route("getWorker") !!}?workerid=' + id,
                success: function(data) {

                    var no = 1;

                    var t = $('#tableGetRequester').DataTable();
                    $.each(data, function(key, value) {

                        t.row.add([
                                '<tbody><tr><td>' + no++ + '</td>',
                                '<td><span data-dismiss="modal" class="klikRequester" data-id="' + value.sys_ID + '" data-name="' + value.sys_Text + '">' + value.sys_ID + '</span></td>',
                                '<td><span data-dismiss="modal" class="klikRequester" data-id="' + value.sys_ID + '" data-name="' + value.sys_Text + '">' + value.sys_Text + '</span></td></tr></tbody>'
                        ])  .draw();
                        
                    });

                    $('.klikRequester').on('click', function(e){
                        e.preventDefault();
                        
                        var $this = $(this);
                        var id = $this.data("id");
                        var position = $this.data("name");
                        var worker = $("#popUpWorkerId").val();
                        $("#popUpPositionWorker").val(position);
                        $("#request_name").val(worker)
                        $("#request_name_id").val(id)
                    });
                }
            });
            
        });
    });
</script>