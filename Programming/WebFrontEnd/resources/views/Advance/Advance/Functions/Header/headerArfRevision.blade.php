<div class="card-body">
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 5px;"><label>Budget Code</label></td>
            <td>
              <div class="input-group">
                <input id="projectcode" style="border-radius:0;" name="var_budget_code" class="form-control" readonly value="{{$datas['sys_ID']}}">
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group">
                <input id="projectname" style="border-radius:0;" class="form-control" name="var_budget_code2" readonly value="{{$datas['sys_ID']}}">
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
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Sub Budget &nbsp;&nbsp;&nbsp;Code</label></td>
            <td>
              <div class="input-group">
                <input id="sitecode" style="border-radius:0;" name="var_sub_budget_code" class="form-control" readonly value="{{$datas['sys_ID']}}">
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#"><i id="sitecode2" data-toggle="modal" data-target="#mySiteCode" class="fas fa-gift" style="color:grey;"></i></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group">
                <input id="sitename" style="border-radius:0;" class="form-control" name="var_sub_budget_code2" readonly value="{{$datas['sys_ID']}}">
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
            <td style="padding-top: 12px;"><label>&nbsp;&nbsp;&nbsp;Requester Name</label></td>
            <td style="padding-top: 10px;">
              <div class="input-group">
                <input name="var_request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly value="{{$datas['sys_ID']}}" required>
                <input name="var_request_name_id" id="request_name_id" style="border-radius:0;" type="hidden" class="form-control" readonly required>
                <input name="var_combinedBudget" id="combinedBudget" style="border-radius:0;" type="hidden" class="form-control" readonly required>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#"><i id="request_name2" data-toggle="modal" data-target="#myRequester" class="fas fa-gift" style="color:grey;"></i></a>
                  </span>
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>