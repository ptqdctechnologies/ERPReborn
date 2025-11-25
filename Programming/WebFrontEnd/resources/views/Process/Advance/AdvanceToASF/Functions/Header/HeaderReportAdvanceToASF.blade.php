<div class="col-sm-12 col-md-12 col-lg-3">
  <form id="reportAdvanceToASFForm" method="post" enctype="multipart/form-data" action="{{ route('AdvanceRequest.ReportAdvanceToASFStore') }}">
  @csrf
    <!-- BUDGET -->
    <div class="row p-0 align-items-center">
      <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Budget</label>
      <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
        <div>
          <span style="border-radius:0;" class="input-group-text form-control">
            <a href="javascript:;" id="myProjectsTrigger" data-toggle="modal" data-target="#myProjects">
              <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectsTrigger" />
            </a>

            <div id="project_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
              <span class="sr-only">Loading...</span>
            </div>
          </span>
        </div>
        <div>
          <input id="project_name" style="border-radius:0; background-color: <?= !empty($dataHeader['project']['name']) ? '#e9ecef' : 'white'; ?>;" name="project_name" class="form-control" readonly value="<?= $dataHeader['project']['name'] ?? ''; ?>" />
          <input id="project_id" style="border-radius:0;" name="project_id" class="form-control" hidden value="<?= $dataHeader['project']['id'] ?? ''; ?>" />
        </div>
        <div class="d-none">
          <input id="project_code" style="border-radius:0;" name="project_code" class="form-control invisible" value="<?= $dataHeader['project']['code'] ?? ''; ?>" />
        </div>
      </div>
    </div>
    <div id="project_message" class="row p-0 align-items-center" style="margin-top: .3rem; display: none;">
      <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold"></label>
      <div class="col-sm-9 col-md-8 col-lg-7 p-0 text-red" style="line-height: normal;">
        Budget Code cannot be empty.
      </div>
    </div>

    <!-- REQUESTER -->
    <div class="row p-0 align-items-center" style="margin-top: 1rem;">
      <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Requester</label>
      <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
        <div>
          <span style="border-radius:0;" class="input-group-text form-control">
            <a href="javascript:;" id="myRequestersTrigger" data-toggle="modal" data-target="#myRequesters">
              <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myRequestersTrigger" />
            </a>
          </span>
        </div>
        <div>
          <input id="requester_name" style="border-radius:0; background-color: <?= !empty($dataHeader['requester']['name']) ? '#e9ecef' : 'white'; ?>;" name="requester_name" class="form-control" readonly value="<?= $dataHeader['requester']['name'] ?? ''; ?>" />
          <input id="requester_id" style="border-radius:0;" name="requester_id" class="form-control" hidden value="<?= $dataHeader['requester']['id'] ?? ''; ?>" />
        </div>
      </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- SUB BUDGET -->
    <div class="row p-0 align-items-center" style="margin-bottom: 1rem;">
      <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Sub Budget</label>
      <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
        <div>
          <span style="border-radius:0;" class="input-group-text form-control">
            <a href="javascript:;" id="mySitesTrigger" data-toggle="modal" data-target="#mySites">
              <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySitesTrigger" />
            </a>
          </span>
        </div>
        <div>
          <input id="site_name" style="border-radius:0; background-color: <?= !empty($dataHeader['site']['name']) ? '#e9ecef' : 'white'; ?>;" name="site_name" class="form-control" readonly value="<?= $dataHeader['site']['name'] ?? ''; ?>" />
          <input id="site_id" style="border-radius:0;" name="site_id" class="form-control" hidden value="<?= $dataHeader['site']['id'] ?? ''; ?>" />
        </div>
        <div class="d-none">
          <input id="site_code" style="border-radius:0;" name="site_code" class="form-control invisible" value="<?= $dataHeader['site']['code'] ?? ''; ?>" />
        </div>
      </div>
    </div>

    <!-- DATE -->
    <div class="row p-0 align-items-center">
      <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Date</label>
      <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
        <div>
          <div class="input-group">
            <div class="input-group-prepend" style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
              <span class="input-group-text" id="reservation-icon">
                <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
              </span>
            </div>
            <input readonly type="text" class="form-control" style="height: 21.8px;border-radius:0; background-color: <?= !empty($dataHeader['date']) ? '#e9ecef' : 'white'; ?>;" id="reservation" name="date" value="<?= $dataHeader['date'] ?? ''; ?>" />
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<div class="col-sm-12 col-md-12 col-lg-4">
  <form method="post" enctype="multipart/form-data" action="{{ route('AdvanceRequest.PrintExportReportAdvanceToASF') }}">
  @csrf
    <!-- EXPORT -->
    <div class="row p-0 align-items-center" style="margin-bottom: 0.76rem; gap: 0.5rem;">
      <div class="col-sm-3 col-md-4 col-lg-4 p-0">
        <select name="print_type" id="print_type" class="form-control">
          <option value="PDF">Export PDF</option>
          <option value="Excel">Export Excel</option>
        </select>
      </div>
      <div class="col-sm-9 col-md-8 col-lg-7 p-0">
        <button class="btn btn-default btn-sm" type="submit" onclick="showLoadingAndSubmit(event)">
          <span>
            <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" />
          </span>
        </button>
      </div>
    </div>
  </form>

  <!-- SUBMIT -->
  <div class="row p-0">
    <div class="col-sm-3 col-md-4 col-lg-4 p-0">
      <button type="button" class="btn btn-default btn-sm" onclick="validationForm()">
        <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="show" title="Show">
        Show
      </button>
    </div>
  </div>
</div>