<div class="col-12 ShowDocument">
  <div class="card">
    <form method="post" action="{{ route('AdvanceRequest.ReportAdvanceSummaryDetailStore') }}"  id="FormSubmitReportAdvanceSummaryDetail">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                  <td>
                    <div class="input-group">
                      <input id="project_id" hidden name="project_id">
                      <input id="project_code" style="border-radius:0;background-color:white;" data-toggle="modal" data-target="#myProject" class="form-control myProject" readonly name="project_code">
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#" id="project_code_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Sub&nbsp;Budget&nbsp;</label></th>
                  <td>
                    <div class="input-group">
                      <input id="site_id" hidden name="site_id">
                      <input id="site_code" style="border-radius:0;background-color:white;" data-toggle="modal" data-target="#mySiteCode" class="form-control mySiteCode" readonly name="site_code">
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#" id="site_code_popup" data-toggle="modal" data-target="#mySiteCode" class="mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Advance&nbsp;Number&nbsp;</label></th>
                  <td>
                    <div class="input-group">
                      <input id="advance_RefID" hidden name="advance_RefID" value="">
                      <input id="advance_number" style="border-radius:0;background-color:white;" data-toggle="modal" data-target="#PopUpTableAdvanceRevision" class="PopUpTableAdvanceRevision form-control" name="advance_number" value="" readonly>
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#" id="advance_popup" data-toggle="modal" data-target="#PopUpTableAdvanceRevision" class="PopUpTableAdvanceRevision"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <table>
                <tr>
                  <td>
                    <button class="btn btn-default btn-sm" type="submit">
                      <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="" title="Show"> Show
                    </button>
                    &nbsp;&nbsp;&nbsp;
                  </td>
                  </form>

                  <form method="post" action="{{ route('AdvanceRequest.PrintExportReportAdvanceSummaryDetail') }}" id="FormPrintReportAdvanceSummaryDetail">
                    @csrf
                    <td>
                      <select name="print_type" id="print_type" class="form-control">
                        <option value="PDF">Export PDF</option>
                        <option value="Excel">Export Excel</option>
                      </select>
                    </td>
                    <td>
                      <button class="btn btn-default btn-sm" type="submit">
                        <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" title="Print">
                      </button>
                    </td>
                  </form>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>
