<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- BUDGET CODE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="project_code_second" style="border-radius:0;" name="project_code" class="form-control" size="17" readonly value="{{ $headerAdvanceRevision['budgetCode']; }}">
            <input id="project_id_second" style="border-radius:0;" name="var_combinedBudget_RefID" class="form-control" hidden value="{{ $headerAdvanceRevision['budgetCodeId']; }}">
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myProjectSecondTrigger" data-toggle="modal" data-target="#myProjectSecond" style="cursor: not-allowed;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecondTrigger">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="project_name_second" style="border-radius:0;" name="project_code_detail" class="form-control" readonly value="{{ $headerAdvanceRevision['budgetCodeName']; }}">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- SUB BUDGET CODE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget Code</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="site_code_second" style="border-radius:0;" name="site_code" class="form-control" size="17" readonly value="{{ $headerAdvanceRevision['subBudgetCode']; }}">
            <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden value="{{ $headerAdvanceRevision['subBudgetCodeId']; }}">
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySiteCodeSecond" style="cursor: not-allowed;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="site_name_second" style="border-radius:0;" name="site_code_detail" class="form-control" readonly value="{{ $headerAdvanceRevision['subBudgetCodeName']; }}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>