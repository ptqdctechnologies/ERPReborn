<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Budget Code</label></td>
            <td>
              <div class="input-group">
                <input id="projectcode" style="border-radius:0;" name="projectcode" class="form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="projectcode2" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group">
                <input id="projectname" style="border-radius:0;" class="form-control" name="projectname" readonly>
              </div>
            </td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Sub Budget Code</label></td>
            <td>
              <div class="input-group">
                <input id="sitecode" style="border-radius:0;" name="sitecode" class="form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="sitecode2" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group">
                <input id="sitename" style="border-radius:0;" class="form-control" name="sitename" readonly>
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
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Requester</label></td>
            <td>
              <div class="input-group">
                <input name="request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly>
                <input name="request_name_id" id="request_name_id" style="border-radius:0;" type="hidden" class="form-control" readonly>
                <input name="var_combinedBudget" id="combinedBudget" style="border-radius:0;" type="hidden" class="form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="request_name2" data-toggle="modal" data-target="#myWorker" class="myWorker"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group">
                <input id="request_position" style="border-radius:0;" class="form-control" name="request_position" readonly>
              </div>
            </td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Beneficiary</label></td>
            <td>
              <div class="input-group">
                <input name="beneficiary_name" id="beneficiary_name" style="border-radius:0;" type="text" class="form-control" readonly>
                <input name="beneficiary_name_id" id="beneficiary_name_id" style="border-radius:0;" type="hidden" class="form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="beneficiary_name2" data-toggle="modal" data-target="#myWorker" class="myWorkerBeneficiary"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group">
                <input id="beneficiary_position" style="border-radius:0;" class="form-control" name="request_position" readonly>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>