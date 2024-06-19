 <div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 12px;"><label>Advance Number</label></td>
            <td>
              <div class="input-group">
                <input id="advance_number" style="border-radius:0;" name="advance_number" class="form-control" readonly value="{{ $dataHeader['number'] }}">
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a id="advance_number2" data-toggle="modal" data-target="#mySearchArf" class="mySearchArf"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top:12px;"><label>Beneficiary</label></td>
            <td style="padding-top:8px;">
              <div class="input-group">
                <input id="beneficiary_id" style="border-radius:0;" name="beneficiary_id" type="hidden" class="form-control" value="{{ $dataContent['involvedPersons'][0]['beneficiaryWorkerJobsPosition_RefID']}}">
                <input id="beneficiary" style="border-radius:0;" name="beneficiary" type="text" class="form-control" readonly value="{{ $dataContent['involvedPersons'][0]['beneficiaryWorkerName'] }}">
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
