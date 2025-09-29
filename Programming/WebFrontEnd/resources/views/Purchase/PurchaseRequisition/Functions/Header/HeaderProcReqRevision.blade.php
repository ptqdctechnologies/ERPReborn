<!-- BODY -->
<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- LEFT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myProjectSecondTrigger" data-toggle="modal" data-target="#myProjectSecond" style="cursor: not-allowed;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecondTrigger">
              </a>
            </span>
          </div>
          <div>
            <input id="project_code_second" style="border-radius:0;" class="form-control" size="17" readonly value="<?= $header['budgetCode']; ?>">
            <input id="project_id_second" style="border-radius:0;" name="var_combinedBudget_RefID" class="form-control" hidden value="<?= $header['budgetID']; ?>">
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="project_name_second" style="border-radius:0;" class="form-control" readonly value="<?= $header['budgetName']; ?>">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget Code</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySiteCodeSecond" style="cursor: not-allowed;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
              </a>
            </span>
          </div>
          <div>
            <input id="site_code_second" style="border-radius:0;" class="form-control" size="17" readonly value="<?= $header['subBudgetCode']; ?>">
            <input id="site_id_second" style="border-radius:0;" class="form-control" hidden value="<?= $header['subBudgetID']; ?>">
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="site_name_second" style="border-radius:0;" class="form-control" readonly value="<?= $header['subBudgetName']; ?>">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>