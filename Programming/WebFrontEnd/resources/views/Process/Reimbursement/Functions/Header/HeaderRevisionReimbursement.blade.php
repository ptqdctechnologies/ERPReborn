<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- BUDGET CODE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div style="cursor: not-allowed;">
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" style="cursor: not-allowed;" id="myProjectSecondTrigger" style="display: block;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecondTrigger">
              </a>
            </span>
          </div>
          <div>
            <input id="project_code_second" style="border-radius:0;" class="form-control" size="17" readonly value="<?= $header['combinedBudgetCode']; ?>" />
            <input id="project_id_second" name="project_id_second" style="border-radius:0;" class="form-control" value="<?= $header['combinedBudget_RefID']; ?>" hidden />
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="project_name_second" style="border-radius:0;" class="form-control" value="<?= $header['combinedBudgetName']; ?>" readonly />
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
          <div style="cursor: not-allowed;">
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" style="cursor: not-allowed;" id="mySiteCodeSecondTrigger">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
              </a>
            </span>
          </div>
          <div>
            <input id="site_code_second" style="border-radius:0;" class="form-control" size="17" value="<?= $header['combinedBudgetSectionCode']; ?>" readonly />
            <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" value="<?= $header['combinedBudgetSection_RefID']; ?>" hidden />
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="site_name_second" style="border-radius:0;" class="form-control" value="<?= $header['combinedBudgetSectionName']; ?>" readonly />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>