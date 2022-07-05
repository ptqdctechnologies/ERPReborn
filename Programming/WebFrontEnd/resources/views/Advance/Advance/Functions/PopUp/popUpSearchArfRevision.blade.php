<div id="mySearchArfRevision" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose ARF</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableSearchArfRevision">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php $no = 1 @endphp
                                        @foreach($dataAdvanceRequest as $dataAdvanceRequests)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArfRevision" data-id1="{{$dataAdvanceRequests['sys_ID']}}" data-id2="{{$dataAdvanceRequests['documentNumber']}}" data-id3="{{$dataAdvanceRequests['combinedBudgetSection_RefID']}}">{{$dataAdvanceRequests['documentNumber']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArfRevision" data-id1="{{$dataAdvanceRequests['sys_ID']}}" data-id2="{{$dataAdvanceRequests['documentNumber']}}" data-id3="{{$dataAdvanceRequests['combinedBudgetSection_RefID']}}">{{$dataAdvanceRequests['combinedBudget_RefID']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArfRevision" data-id1="{{$dataAdvanceRequests['sys_ID']}}" data-id2="{{$dataAdvanceRequests['documentNumber']}}" data-id3="{{$dataAdvanceRequests['combinedBudgetSection_RefID']}}">{{$dataAdvanceRequests['combinedBudgetName']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArfRevision" data-id1="{{$dataAdvanceRequests['sys_ID']}}" data-id2="{{$dataAdvanceRequests['documentNumber']}}" data-id3="{{$dataAdvanceRequests['combinedBudgetSection_RefID']}}">{{$dataAdvanceRequests['combinedBudgetSection_RefID']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArfRevision" data-id1="{{$dataAdvanceRequests['sys_ID']}}" data-id2="{{$dataAdvanceRequests['documentNumber']}}" data-id3="{{$dataAdvanceRequests['combinedBudgetSection_RefID']}}">{{$dataAdvanceRequests['combinedBudgetSectionName']}}</p>
                                                </td>
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
    $(function() {
        $(".klikSearchArfRevision").on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.data("id1");
            var code = $this.data("id2");
            var sitecode = $this.data("id3");
            $("#searchArfNumberRevisionId").val(id);
            $("#searchArfNumberRevisions").val(code);
            
        });
    });
</script>