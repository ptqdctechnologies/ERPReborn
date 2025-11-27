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
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input type="text" id="project_name" class="form-control" readonly style="border-radius:0;">
              <input type="hidden" id="project_id" class="form-control" name="project_id" style="border-radius:0;">
            </div>
          </div>
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
              <input type="text" id="currency_name" class="form-control" readonly style="border-radius:0;">
              <input type="hidden" id="currency_id" class="form-control" style="border-radius:0;" name="currency_id">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>