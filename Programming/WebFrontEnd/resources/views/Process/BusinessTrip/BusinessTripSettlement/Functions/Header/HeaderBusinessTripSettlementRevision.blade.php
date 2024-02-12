<div class="card-body">
  <div class="row">
    <div class="col-md-8">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 12px;"><label>Bussines&nbsp;Trip&nbsp;Number</label></td>
            <td>
              <div class="input-group" style="width: 70%;">
                <input id="bussines_trip_number" style="border-radius:0;" name="bussines_trip_number" class="form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a id="bussines_trip_number2" data-toggle="modal" data-target="#mySearchBrf" class="mySearchBrf"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
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
                <input name="request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly value="{{ $dataRevisi['involvedPersons'][0]['requesterWorkerJobsPositionName']  }}" required>
                <input name="request_name_id" id="request_name_id" style="border-radius:0;" type="hidden" class="form-control" value="{{ $dataRevisi['involvedPersons'][0]['requesterWorkerJobsPosition_RefID'] }}" readonly required>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>

  </div>
</div>