<form action="">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <table>
                        <tr>
                            <td><label>Requester</label></td>
                            <td>
                                <div class="input-group">
                                    <input name="request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly value="{{ $dataRequester['name'] }}" required>
                                    <input name="request_name_id" id="request_name_id" style="border-radius:0;" type="hidden" class="form-control" value="{{ $dataRequester['workerJobsPosition_RefID'] }}" readonly required>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <table>
                        <tr>
                            <td style="padding-bottom:30px;"><Label>Remark</Label></td>
                            <td>
                                <div class="input-group">
                                    <textarea name="remark" id="remark" style="border-radius:0;" cols="30" rows="3" class="form-control">{{$dataAdvanceRevisions['entities']['remarks']}}</textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>