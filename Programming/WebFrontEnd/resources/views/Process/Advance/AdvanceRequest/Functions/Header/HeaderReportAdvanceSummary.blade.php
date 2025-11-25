<div class="col-12 ShowDocument">
  <div class="card">
    <form method="post" enctype="multipart/form-data" action="{{ route('AdvanceRequest.ReportAdvanceSummaryStore') }}" id="FormSubmitReportAdvanceSummary">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-2">
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
          <div class="col-md-2">
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
          <div class="col-md-2">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Requester&nbsp;</label></th>
                  <td>
                    <div class="input-group">
                      <input id="requester_id" hidden name="requester_id">
                      <input id="requester" style="border-radius:0;background-color:white;" data-toggle="modal" data-target="#myWorker" class="form-control myWorker" readonly name="Requester">
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#" id="requester_popup" data-toggle="modal" data-target="#myWorker" class="myWorker"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Beneficiary&nbsp;</label></th>
                  <td>
                    <div class="input-group">
                      <input id="beneficiary_id" hidden name="beneficiary_id">
                      <input id="beneficiary" style="border-radius:0;background-color:white;" data-toggle="modal" data-target="#myBeneficiary" class="form-control myBeneficiary" readonly name="beneficiary">
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#" id="beneficiary_popup" data-toggle="modal" data-target="#myBeneficiary" class="myBeneficiary"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Date</label></th>
                  <td>
                    <div class="input-group">
                        <input readonly type="text" class="form-control" id="reservation" name="date" value="<?= $dataReport['date'] ?? ''; ?>" />
                        <div class="input-group-prepend" style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
                            <span class="input-group-text" id="reservation-icon">
                                <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
                            </span>
                        </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-2">
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

                  <form method="post" enctype="multipart/form-data" action="{{ route('AdvanceRequest.PrintExportReportAdvanceSummary') }}" id="exportForm">
                    @csrf
                    <td>
                      <select name="print_type" id="print_type" class="form-control">
                        <option value="PDF">Export PDF</option>
                        <option value="Excel">Export Excel</option>
                      </select>
                    </td>
                    <td>
                      <button class="btn btn-default btn-sm" type="submit" onclick="showLoadingAndSubmit(event)">
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