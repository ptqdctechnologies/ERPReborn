<div class="card-body">
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 12px;"><label>Budget Code</label></td>
            <td>
              <div class="input-group" style="width: 70%;">
                <input id="projectcode" style="border-radius:0;" name="projectcode" class="form-control" readonly value="{{$dataRevisi['itemList']['ungrouped'][0]['entities']['combinedBudgetCode']}}">
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a id="projectcode2" data-toggle="modal" data-target="#myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group" style="width: 140%;position:relative;right:38%;">
              <input id="projectname" style="border-radius:0;" class="form-control" name="projectname" readonly value="{{$dataRevisi['itemList']['ungrouped'][0]['entities']['combinedBudgetName']}}">
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
            <td style="padding-top:12px;"><label>Requester</label></td>
            <td style="padding-top:8px;">
              <div class="input-group">
                <input name="request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly value="{{ $dataRevisi['involvedPersons']['requester']['name'] }}" required>
                <input name="request_name_id" id="request_name_id" style="border-radius:0;" type="hidden" class="form-control" value="{{ $dataRevisi['involvedPersons']['requester']['workerJobsPosition_RefID'] }}" readonly required>
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
            <td style="padding-bottom:20px;"><Label>Remark</Label></td>
            <td>
              <div class="input-group">
                <textarea name="remark" id="remark" style="border-radius:0;" cols="30" rows="3" class="form-control">{{$dataRevisi['advanceRemarks']}}</textarea>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>