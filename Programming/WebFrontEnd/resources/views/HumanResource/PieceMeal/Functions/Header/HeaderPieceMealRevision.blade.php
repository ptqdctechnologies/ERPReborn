<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 5px;"><label>Budget Code</label></td>
            <td>
              <div class="input-group" style="width: 70%;">
                <input id="projectcode" style="border-radius:0;" name="projectcode" class="form-control" readonly value="{{$dataProcReqRevision['entities']['combinedBudget_RefID']}}">
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="projectcode2" data-toggle="modal"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group" style="width: 153%;position:relative;right:38%;">
                <input id="projectname" style="border-radius:0;" class="form-control" name="projectname" readonly value="{{$dataProcReqRevision['entities']['combinedBudgetName']}}">
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
            <td style="padding-top: 5px;"><label>Sub Budget Code</label></td>
            <td>
              <div class="input-group" style="width: 70%;">
                <input id="sitecode" style="border-radius:0;" name="sitecode" class="form-control" readonly value="{{$dataProcReqRevision['entities']['combinedBudgetSection_RefID']}}">
                <input name="var_combinedBudget" id="combinedBudget" style="border-radius:0;" type="hidden" class="form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="sitecode2" data-toggle="modal"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group" style="width: 153%;position:relative;right:38%;">
                <input id="sitename" style="border-radius:0;" class="form-control" name="sitename" readonly value="{{$dataProcReqRevision['entities']['combinedBudgetSectionName']}}">
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>