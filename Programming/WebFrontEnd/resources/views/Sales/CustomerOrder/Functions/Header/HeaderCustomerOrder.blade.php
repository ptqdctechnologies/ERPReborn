<div class="card-body">
  <div class="row py-3" style="gap: 1rem;">
    <!-- BUDGET CODE -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Budget Code</label>
        <div class="col-5 d-flex">
          <div id="myProjectsTriggerContainer">
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myProjectsTrigger" data-toggle="modal" data-target="#myProjects" style="display: block;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectsTriggers">
              </a>

              <div id="project_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
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
      <div class="row" id="project_message" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
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
              <a href="javascript:;" id="myCurrenciesTrigger" data-toggle="modal" data-target="#myCurrencies">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myCurrenciesTrigger">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input type="text" id="currency_name" class="form-control" readonly style="border-radius:0; background-color: white;">
              <input type="hidden" id="currency_id" class="form-control" style="border-radius:0;" name="currency_id">
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="currency_message" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
        <div class="col text-red">
          Currency cannot be empty.
        </div>
      </div>
    </div>

    <!-- TYPE -->
    <div class="col-12" style="margin-top: .5rem;">
      <div class="row">
        <div class="form-group d-flex" style="gap: 20%;">
          <div class="custom-control custom-radio" style="min-width: max-content;">
            <input type="radio" id="type_import_from_excel" class="custom-control-input" name="type_customer_order" value="type_import_from_excel" disabled onclick="typeValue(this)">
            <label for="type_import_from_excel" class="custom-control-label">
              <div style="margin-top: 6%;">Import from Excel</div>
            </label>
          </div>
          <div class="custom-control custom-radio" style="min-width: max-content;">
            <input type="radio" id="type_add_manually" class="custom-control-input" name="type_customer_order" value="type_add_manually" disabled onclick="typeValue(this)">
            <label for="type_add_manually" class="custom-control-label">
              <div style="margin-top: 6%;">Add Manually</div>
            </label>
          </div>
        </div>
      </div>
      <div class="row" id="type_message" style="margin-top: .3rem; display: none;">
        <div class="col text-red p-0">
          Customer Order Type cannot be empty.
        </div>
      </div>
    </div>
  </div>
</div>