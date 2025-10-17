<div class="card-body">
  <div class="row py-3" style="gap: 1rem;">
    <!-- LEFT -->
    <div class="col-md-12 col-lg-5">
      <!-- BUDGET CODE -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myProjectSecondTrigger" data-toggle="modal" data-target="#myProjects" style="display: block;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecondTrigger">
              </a>

              <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
              </div>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="project_name_second" style="border-radius:0; background-color: white;" class="form-control" readonly>
              <input id="project_code_second" style="border-radius:0;" class="form-control" hidden>
              <input id="project_id_second" name="project_id_second" style="border-radius:0;" class="form-control" hidden>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="budgetMessage" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 text-red">
          Budget Code cannot be empty.
        </div>
      </div>
    </div>
    
    <!-- RIGHT -->
    <div class="col-md-12 col-lg-5">
      <!-- SUB BUDGET CODE -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget Code</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySites">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="site_name_second" style="border-radius:0; background-color: white;" class="form-control" readonly>
              <input id="site_code_second" style="border-radius:0;" class="form-control" hidden>
              <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="subBudgetMessage" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-6 text-red">
          Sub Budget Code cannot be empty.
        </div>
      </div>
    </div>
  </div>
</div>