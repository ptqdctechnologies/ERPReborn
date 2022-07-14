<div id="mySearchPR" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="card-title">Choose PR</label>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 400px;">
                                <table class="table table-head-fixed text-nowrap" id="tableSearchArfinAsf">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Trano</th>
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>Site Code</th>
                                            <th>Site Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php $no = 1 @endphp
                                        @foreach($data5 as $datas)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$datas['documentNumber']}}" data-id2="{{$datas['documentNumber']}}" data-id3="{{$datas['documentNumber']}}" data-id4="{{$datas['documentNumber']}}" data-id5="{{$datas['documentNumber']}}">{{$datas['documentNumber']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$datas['documentNumber']}}" data-id2="{{$datas['documentNumber']}}" data-id3="{{$datas['documentNumber']}}" data-id4="{{$datas['documentNumber']}}" data-id5="{{$datas['documentNumber']}}">{{$datas['documentNumber']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$datas['documentNumber']}}" data-id2="{{$datas['documentNumber']}}" data-id3="{{$datas['documentNumber']}}" data-id4="{{$datas['documentNumber']}}" data-id5="{{$datas['documentNumber']}}">{{$datas['documentNumber']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$datas['documentNumber']}}" data-id2="{{$datas['documentNumber']}}" data-id3="{{$datas['documentNumber']}}" data-id4="{{$datas['documentNumber']}}" data-id5="{{$datas['documentNumber']}}">{{$datas['documentNumber']}}</p>
                                                </td>
                                                <td>
                                                    <p data-dismiss="modal" class="klikSearchArf" data-id1="{{$datas['documentNumber']}}" data-id2="{{$datas['documentNumber']}}" data-id3="{{$datas['documentNumber']}}" data-id4="{{$datas['documentNumber']}}" data-id5="{{$datas['documentNumber']}}">{{$datas['documentNumber']}}</p>
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
    |----------------------------------------------------------------------------------|-->