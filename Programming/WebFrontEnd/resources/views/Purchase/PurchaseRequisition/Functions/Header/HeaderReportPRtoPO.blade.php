<div class="col-sm-12 col-md-12 col-lg-3">
    <form id="formReportAccountPayable" method="post" action="{{ route('PurchaseRequisition.ReportPRtoPOStore') }}">
        @csrf
        <!-- BUDGET -->
        <div class="row p-0 align-items-center" style="margin-bottom: 1rem;">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Budget</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <input id="project_code_second" style="border-radius:0;" name="project_code_second" class="form-control" readonly value="<?= $dataReport['project']['code'] ?? ''; ?>" />
                    <input id="project_id_second" style="border-radius:0;" name="project_id_second" class="form-control" hidden value="<?= $dataReport['project']['id'] ?? ''; ?>" />
                </div>
                <div>
                    <span style="border-radius:0;" class="input-group-text form-control">
                        <a href="javascript:;" id="myProjectSecondTrigger" data-toggle="modal" data-target="#myProjectSecond">
                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecondTrigger" />
                        </a>
                    </span>
                </div>
                <div class="d-none">
                    <input id="project_name_second" style="border-radius:0;" name="project_name_second" class="form-control invisible" readonly value="<?= $dataReport['project']['name'] ?? ''; ?>" />
                </div>
            </div>
        </div>

        <!-- DATE -->
        <div class="row p-0 align-items-center">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Date</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <div class="input-group">
                        <input readonly type="text" class="form-control" style="height: 21.8px;border-radius:0;" id="reservation" name="date" value="<?= $dataReport['date'] ?? ''; ?>" />
                        <div class="input-group-prepend" style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
                            <span class="input-group-text" id="reservation-icon">
                                <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
</div>
<div class="col-sm-12 col-md-12 col-lg-3">
        <!-- SUB BUDGET -->
        <div class="row p-0 align-items-center" style="margin-bottom: 1rem;">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">PR Number</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <input id="site_code_second" style="border-radius:0;" name="site_code_second" class="form-control" readonly value="<?= $dataReport['site']['code'] ?? ''; ?>" />
                    <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden value="<?= $dataReport['site']['id'] ?? ''; ?>" />
                </div>
                <div>
                    <span style="border-radius:0;" class="input-group-text form-control">
                        <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySiteCodeSecond">
                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger" />
                        </a>
                    </span>
                </div>
                <div class="d-none">
                    <input id="site_name_second" style="border-radius:0;" name="site_name_second" class="form-control invisible" readonly value="<?= $dataReport['site']['name'] ?? ''; ?>" />
                </div>
            </div>
        </div>

        <!-- SUPPLIER -->
        <div class="row p-0 align-items-center">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">PO Number</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <input id="supplier_code" style="border-radius:0;" name="supplier_code" class="form-control" readonly value="<?= $dataReport['supplier']['code'] ?? ''; ?>" />
                    <input id="supplier_id" style="border-radius:0;" name="supplier_id" class="form-control" hidden value="<?= $dataReport['supplier']['id'] ?? ''; ?>" />
                </div>
                <div>
                    <span style="border-radius:0;" class="input-group-text form-control">
                        <a href="javascript:;" id="supplier_code2" data-toggle="modal" data-target="#mySupplier" class="mySupplier">
                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySupplierTrigger" />
                        </a>
                    </span>
                </div>
                <div class="d-none">
                    <input id="address" style="border-radius:0;" name="supplier_address" class="form-control invisible" value="<?= $dataReport['supplier']['address'] ?? ''; ?>" />
                </div>
            </div>
        </div>
        
</div>
<div class="col-sm-12 col-md-12 col-lg-4 d-flex flex-column flex-column-reverse">
        <!-- SUBMIT -->
        <div class="align-items-center justify-content-sm-end justify-content-md-end justify-content-lg-start row p-0">
            <button class="btn btn-default btn-sm" type="submit" style="margin-top: -5px;">
                <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="show" title="Show">
                Show
            </button>
        </div>
    </form>

    <!-- EXPORT -->
    <form method="post" action="{{ route('PurchaseRequisition.PrintExportReportPRtoPO') }}">
    @csrf
        <div class="align-items-center justify-content-sm-end justify-content-md-end justify-content-lg-start row align-items-center p-0" style="margin-bottom: 1rem; gap: 0.5rem;">
            <div>
                <select name="print_type" id="print_type" class="form-control">
                    <option value="PDF">Export PDF</option>
                    <option value="Excel">Export Excel</option>
                </select>
            </div>
            <button class="btn btn-default btn-sm" type="submit">
                <span>
                    <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" />
                </span>
            </button>
        </div>
    </form>
</div>

<!-- <div class="col-12 ShowDocument">
  <div class="card">
    <form method="post" enctype="multipart/form-data" action="{{ route('PurchaseRequisition.ReportPRtoPOStore') }}" id="FormSubmitReportPurchaseRequisitionSummary">
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
          </div> -->
          <!-- <div class="col-md-3">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Sub&nbsp;Budget&nbsp;</label></th>
                  <td>
                    <div class="input-group">
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
          <!-- <div class="col-md-3">
            <div class="form-group">
              <table>
                <tr>
                  <td>
                    <button class="btn btn-default btn-sm" type="submit">
                      <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="" title="Show"> Show
                    </button>
                  </td>
                 </form>

                  <form method="post" enctype="multipart/form-data" action="{{ route('PurchaseRequisition.PrintExportReportPRtoPO') }}">
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
</div> -->
