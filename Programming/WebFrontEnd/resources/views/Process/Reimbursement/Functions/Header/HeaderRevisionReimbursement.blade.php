<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- BUDGET CODE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Budget Code</label>
        <div class="col-5">
          <div style="flex: 100%;">
            <input id="project_name_second" class="form-control" style="border-radius:0;" readonly value="<?= $header['combinedBudgetCode'] . " - " . $header['combinedBudgetName']; ?>" />
            <input id="project_code_second" class="form-control" style="border-radius:0;" hidden value="<?= $header['combinedBudgetCode']; ?>" />
            <input id="project_id_second" class="form-control" style="border-radius:0;" hidden value="<?= $header['combinedBudget_RefID']; ?>" name="project_id_second" />
          </div>
        </div>
      </div>
    </div>

    <!-- SUB BUDGET CODE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget Code</label>
        <div class="col-5">
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="site_name_second" class="form-control" style="border-radius:0;" readonly value="<?= $header['combinedBudgetSectionCode'] . " - " . $header['combinedBudgetSectionName']; ?>" />
              <input id="site_code_second" class="form-control" style="border-radius:0;" hidden value="<?= $header['combinedBudgetSectionCode']; ?>" />
              <input id="site_id_second" class="form-control" style="border-radius:0;" hidden value="<?= $header['combinedBudgetSection_RefID']; ?>" name="site_id_second" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>