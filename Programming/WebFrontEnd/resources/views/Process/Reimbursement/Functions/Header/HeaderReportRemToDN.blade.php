<div class="col-12 ShowDocument">
  <div class="card">
    <form method="post" enctype="multipart/form-data" action="{{ route('Reimbursement.ReportRemToDNStore') }}">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                  <td>
                    <div class="input-group" style="width:200px;">
                          <input id="project_code_second" style="border-radius:0;" name="project_code_second" class="form-control" size="34" value="<?= $dataReport['budgetCode'] ?? ''; ?>" readonly>
                        <input id="project_id_second" style="border-radius:0;" name="project_id_second" class="form-control" hidden>
                    <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myProjectSecondTrigger" data-toggle="modal" data-target="#myProjectSecond">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecondTrigger">
                            </a>
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
                  <th style="padding-top: 7px;"><label>Customer</label></th>
                  <td>
                    <div class="input-group" style="width:200px;">
                        <input id="site_code_second" style="border-radius:0;" name="site_code_second" class="form-control" size="34" value="<?= $dataReport['siteCode'] ?? ''; ?>" readonly>
                        <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden>
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySiteCodeSecond">
                                 <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
                            </a>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <!-- <div class="col-md-3">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Sub&nbsp;Budget&nbsp;</label></th>
                  <td>
                    <div class="input-group" style="width:200px;">
                        <input id="site_code_second" style="border-radius:0;" name="site_code_second" class="form-control" size="34" value="<?= $dataReport['siteCode'] ?? ''; ?>" readonly>
                        <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden>
                    <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySiteCodeSecond">
                                 <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
                            </a>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div> -->
          <div class="col-md-3">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Date Range</label></th>
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
          <div class="col-md-3">
            <div class="form-group">
              <table>
                <tr>
                  <td>
                    <button class="btn btn-default btn-sm" type="submit">
                      <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="" title="Show"> Show
                    </button>
                  </td>
                 </form>

                  <form method="post" enctype="multipart/form-data" action="{{ route('Reimbursement.PrintExportReportRemToDN') }}">
                    @csrf
                    <td>
                      <select name="print_type" id="print_type" class="form-control">
                        <option value="PDF">Export PDF</option>
                        <option value="Excel">Export Excel</option>
                      </select>
                    </td>
                    <td>
                      <button class="btn btn-default btn-sm" type="submit">
                        <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="">
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