<div class="card-body">
  <div class="row py-3" style="gap: 1rem;">
    <!-- LEFT -->
    <div class="col-md-12 col-lg-5">
      <!-- BUDGET CODE -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
        <div class="col-5 input-group">
          <input id="project_name_second" style="border-radius:0;" class="form-control" readonly value="<?= $header['budgetCode'] . ' - ' . $header['budgetName']; ?>">
          <input id="project_code_second" style="border-radius:0;" class="form-control" hidden value="<?= $header['budgetCode']; ?>">
          <input id="project_id_second" style="border-radius:0;" name="var_combinedBudget_RefID" class="form-control" hidden value="<?= $header['budgetID']; ?>">
        </div>
      </div>
    </div>

    <!-- RIGHT -->
    <div class="col-md-12 col-lg-5">
      <!-- SUB BUDGET CODE -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget Code</label>
        <div class="col-5 input-group">
          <input id="site_name_second" style="border-radius:0;" class="form-control" readonly value="<?= $header['subBudgetCode'] . ' - ' . $header['subBudgetName']; ?>">
          <input id="site_code_second" style="border-radius:0;" class="form-control" hidden value="<?= $header['subBudgetCode']; ?>">
          <input id="site_id_second" style="border-radius:0;" class="form-control" hidden value="<?= $header['subBudgetID']; ?>">
        </div>
      </div>
    </div>
  </div>
</div>