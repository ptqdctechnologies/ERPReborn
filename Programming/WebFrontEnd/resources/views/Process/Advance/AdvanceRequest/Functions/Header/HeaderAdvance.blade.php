<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- BUDGET CODE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label for="project_code_second" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="project_code_second" style="border-radius:0;" name="project_code" class="form-control" size="17" readonly>
            <input id="project_id_second" style="border-radius:0;" name="var_combinedBudget_RefID" class="form-control" hidden>
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myProjectSecondTrigger" data-toggle="modal" data-target="#myProjectSecond" style="display: block;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecondTrigger">
              </a>

              <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
              </div>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="project_name_second" style="border-radius:0;" name="project_code_detail" class="form-control" readonly aria-label="Project Name">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- SUB BUDGET CODE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label for="site_code_second" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget Code</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="site_code_second" style="border-radius:0;" name="site_code" class="form-control" size="17" readonly>
            <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden>
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySiteCodeSecond">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="site_name_second" style="border-radius:0;" name="site_code_detail" class="form-control" readonly aria-label="Site Name">
            </div>
          </div>
      </div>
      </div>
    </div>
  </div>
</div>