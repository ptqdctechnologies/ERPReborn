<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Budget Code</label></td>
            <td>
              <div class="input-group" style="width: 70%;">
                <input id="projectcode" style="border-radius:0;" name="projectcode" class="form-control" readonly value="{{$dataRevisi['budget']['combinedBudget_RefIDList'][0] }}">
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a id="projectcode2" data-toggle="modal" data-target="#myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group" style="width: 140%;position:relative;right:38%;">
                <input id="projectname" style="border-radius:0;" class="form-control" name="projectname" readonly value="{{$dataRevisi['budget']['combinedBudgetCodeList'][0] }}">
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
                <input id="sitecode" style="border-radius:0;" name="sitecode" class="form-control" readonly value="{{$dataRevisi['budget']['combinedBudgetSection_RefIDList'][0] }}">
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a id="sitecode2" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group" style="width: 140%;position:relative;right:38%;">
                <input id="sitename" style="border-radius:0;" class="form-control" name="sitename" readonly value="{{$dataRevisi['budget']['combinedBudgetSectionCodeList'][0] }}">
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>