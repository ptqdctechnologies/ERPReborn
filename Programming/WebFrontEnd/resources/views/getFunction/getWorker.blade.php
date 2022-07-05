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
            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '{!! route("getWorker") !!}?workerid=' + id,
                success: function(data) {

                    $(".popUpPositionWorker").empty();

                    var option = "<option value='" + '' + "'>" + 'Select Job Position' + "</option>";
                    $(".popUpPositionWorker").append(option);

                    $.each(data, function(key, value) {

                        var option = "<option value='" + value.sys_ID + "'>" + value.sys_Text + "</option>";
                        $(".popUpPositionWorker").append(option);
                    });
                }
            });
            
        });
    });
    

    function FunctionJobPositioinAdvance(valueRequestId) {
        $("#request_name").val($("#popUpWorkerId").val())
        $("#request_name_id").val(valueRequestId)
    }
</script>