<div id="mySearchPieceMealRevision" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose Piece Meal</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="TableSearchProcReq">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Budget Code</th>
                                            <th>Budget Name</th>
                                            <th>Sub Budget Code</th>
                                            <th>Sub Budget Name</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php $no = 1 @endphp
                                        @foreach($dataPieceMeal as $dataPieceMeals)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchProcReq" data-id1="{{$dataPieceMeals['sys_ID']}}" data-id2="{{$dataPieceMeals['documentNumber']}}" data-id3="{{$dataPieceMeals['combinedBudgetSection_RefID']}}">{{$dataPieceMeals['documentNumber']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchProcReq" data-id1="{{$dataPieceMeals['sys_ID']}}" data-id2="{{$dataPieceMeals['documentNumber']}}" data-id3="{{$dataPieceMeals['combinedBudgetSection_RefID']}}">{{$dataPieceMeals['combinedBudget_RefID']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchProcReq" data-id1="{{$dataPieceMeals['sys_ID']}}" data-id2="{{$dataPieceMeals['documentNumber']}}" data-id3="{{$dataPieceMeals['combinedBudgetSection_RefID']}}">{{$dataPieceMeals['combinedBudgetName']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchProcReq" data-id1="{{$dataPieceMeals['sys_ID']}}" data-id2="{{$dataPieceMeals['documentNumber']}}" data-id3="{{$dataPieceMeals['combinedBudgetSection_RefID']}}">{{$dataPieceMeals['combinedBudgetSection_RefID']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchProcReq" data-id1="{{$dataPieceMeals['sys_ID']}}" data-id2="{{$dataPieceMeals['documentNumber']}}" data-id3="{{$dataPieceMeals['combinedBudgetSection_RefID']}}">{{$dataPieceMeals['combinedBudgetSectionName']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchProcReq" data-id1="{{$dataPieceMeals['sys_ID']}}" data-id2="{{$dataPieceMeals['documentNumber']}}" data-id3="{{$dataPieceMeals['combinedBudgetSection_RefID']}}">0</p>
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
        $(".klikSearchProcReq").on('click', function(e) {
            e.preventDefault();
            var $this = $(this);
            var id = $this.data("id1");
            var code = $this.data("id2");
            var sitecode = $this.data("id3");
            $("#searchPrNumberRevisionId").val(id);
            $("#searchPrNumberRevisions").val(code);
            
        });
    });
</script>