<div class="card-body">
  <div class="row">
    <div class="col-md-8">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 12px;"><label>Budget Code</label></td>
            <td>
              <div class="input-group" style="width: 70%;">
                <input id="projectcode" style="border-radius:0;" name="projectcode" class="form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a id="projectcode2" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group" style="width: 140%;position:relative;right:38%;">
                <input id="projectname" style="border-radius:0;" class="form-control" name="projectname" readonly>
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
            <td style="padding-top:12px;"><label>Beneficiary</label></td>
            <td style="padding-top:8px;">
              <div class="input-group">
                <input id="beneficiary_id" style="border-radius:0;" name="beneficiary_id" type="hidden" class="form-control">
                <input id="beneficiary_name" style="border-radius:0;" name="beneficiary_name" type="text" class="form-control" readonly>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>