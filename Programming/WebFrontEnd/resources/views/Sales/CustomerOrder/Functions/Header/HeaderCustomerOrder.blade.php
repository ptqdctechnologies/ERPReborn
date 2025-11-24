<div class="card-body">
  <div class="row py-3" style="gap: 1rem;">
    <!-- BUDGET CODE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Budget Code</label>
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

    <!-- CURRENCY -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Currency</label>
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
              <input id="site_name_second" style="border-radius:0; background-color: white;" name="site_code_detail" class="form-control" readonly>
              <input id="site_code_second" style="border-radius:0;" name="site_code" class="form-control" hidden>
              <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="subBudgetMessage" style="margin-top: .3rem;display: none;">
        <label for="project_code_second" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col text-red">
          Sub Budget Code cannot be empty.
        </div>
      </div>
    </div>

    <!-- TYPE -->
    <div class="col-12" style="margin-top: .5rem;">
      <div class="row">
        <div class="form-group d-flex" style="gap: 20%;">
          <div class="custom-control custom-radio" style="min-width: max-content;">
            <input type="radio" id="type_import_from_excel" class="custom-control-input" name="type_customer_order" value="type_import_from_excel" onclick="typeValue(this)">
            <label for="type_import_from_excel" class="custom-control-label">
              <div style="margin-top: 6%;">Import from Excel</div>
            </label>
          </div>
          <div class="custom-control custom-radio" style="min-width: max-content;">
            <input type="radio" id="type_add_manually" class="custom-control-input" name="type_customer_order" value="type_add_manually" onclick="typeValue(this)">
            <label for="type_add_manually" class="custom-control-label">
              <div style="margin-top: 6%;">Add Manually</div>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>