<div class="card-body">
  <div class="row py-3" style="gap: 1rem;">
    <!-- BUDGET CODE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Budget Code</label>
        <div class="col-5 d-flex">
          <div id="myProjectsTriggerContainer">
            <span id="myProjectsTrigger" class="input-group-text form-control" data-toggle="modal" data-target="#myProjects" style="border-radius:0;cursor:pointer;">
              <i class="fas fa-gift"></i>

              <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
              </div>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input type="text" id="project_name" class="form-control" readonly style="border-radius:0; background-color: white;">
              <input type="hidden" id="project_id" class="form-control" name="project_id" style="border-radius:0;">
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="budgetMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col text-red">
          Budget Code cannot be empty.
        </div>
      </div>
    </div>

    <div class="col-md-12 col-lg-5">
    </div>
  </div>
</div>