<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Budget Code</label></td>
            <td>
              <div class="input-group" style="width: 70%;">
                <input id="project_code" style="border-radius:0;" name="project_code" class="form-control" readonly value="{{ $dataContent['budget']['combinedBudgetCodeList'][0] }}">
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a id="project_code_popup" data-toggle="modal" data-target="#myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group" style="width: 140%;position:relative;right:38%;">
                <input id="project_code_detail" style="border-radius:0;" class="form-control" name="project_code_detail" readonly value="{{ $dataContent['budget']['combinedBudgetNameList'][0] }}">
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
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Sub Budget Code</label></td>
            <td>
              <div class="input-group" style="width: 70%;">
                <input id="site_code" style="border-radius:0;" name="site_code" class="form-control" readonly value="{{ $dataContent['budget']['combinedBudgetSectionCodeList'][0] }}">
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a id="site_code_popup" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group" style="width: 140%;position:relative;right:38%;">
                <input id="site_code_detail" style="border-radius:0;" class="form-control" name="site_code_detail" readonly value="{{ $dataContent['budget']['combinedBudgetSectionNameList'][0] }}">
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    
  </div>
</div>