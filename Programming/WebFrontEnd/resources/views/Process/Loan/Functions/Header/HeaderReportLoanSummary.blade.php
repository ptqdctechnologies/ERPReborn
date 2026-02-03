<div class="col-sm-12 col-md-12 col-lg-3">
  <!-- BUDGET -->
  <div class="row p-0 align-items-center" style="margin-bottom: 1rem;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Budget</label>
    <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
      <div>
        <span id="myProjectsTrigger" class="input-group-text form-control" data-toggle="modal" data-target="#myProjects" style="border-radius:0;cursor:pointer;">
          <i class="fas fa-gift"></i>
        </span>
      </div>
      <div>
        <input type="text" id="budget_name" class="form-control" style="border-radius:0;background-color:white;" readonly />
        <input type="hidden" id="budget_id" class="form-control" style="border-radius:0;" name="budget_id" />
        <input type="hidden" id="budget_code" class="form-control" style="border-radius:0;" name="budget_code" />
      </div>
    </div>
  </div>

  <!-- DATE -->
  <div class="row p-0 align-items-center">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Date</label>
    <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
      <div>
        <div class="input-group" id="loan_date_range_container">
          <div class="input-group-prepend" style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
            <span class="input-group-text" id="loan_date_range_container_icon" style="border-radius: 0;">
              <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
            </span>
          </div>
          <input readonly type="text" class="form-control" style="height: 21.8px;border-radius:0;background-color:white;" id="loan_date_range" name="loan_date_range" />
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-3">
  <!-- CREDITOR -->
  <div class="row p-0 align-items-center" style="margin-bottom: 1rem;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Creditor</label>
    <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
      <div>
        <span id="myCreditorsTrigger" class="input-group-text form-control" data-toggle="modal" data-target="#" style="border-radius:0;cursor:pointer;">
          <i class="fas fa-gift"></i>
        </span>
      </div>
      <div>
        <input type="text" id="creditor_name" class="form-control" style="border-radius:0;background-color:white;" readonly />
        <input type="hidden" id="creditor_id" class="form-control" style="border-radius:0;" name="creditor_id" />
        <input type="hidden" id="creditor_code" class="form-control" style="border-radius:0;" name="creditor_code" />
      </div>
    </div>
  </div>

  <!-- DEBITOR -->
  <div class="row p-0 align-items-center">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Debitor</label>
    <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
      <div>
        <span id="myDebitorsTrigger" class="input-group-text form-control" data-toggle="modal" data-target="#" style="border-radius:0;cursor:pointer;">
          <i class="fas fa-gift"></i>
        </span>
      </div>
      <div>
        <input type="text" id="debitor_name" class="form-control" style="border-radius:0;background-color:white;" readonly />
        <input type="hidden" id="debitor_id" class="form-control" style="border-radius:0;" name="debitor_id" />
        <input type="hidden" id="debitor_code" class="form-control" style="border-radius:0;" name="debitor_code" />
      </div>
    </div>
  </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-3 d-flex flex-column flex-column-reverse">
  <!-- SUBMIT -->
  <div class="align-items-center justify-content-sm-end justify-content-md-end justify-content-lg-start row p-0">
    <button type="button" class="btn btn-default btn-sm" style="margin-top: -5px;" onclick="getDataReport()">
      <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="show" title="Show">
      Show
    </button>
  </div>

  <!-- EXPORT -->
  <div class="align-items-center justify-content-sm-end justify-content-md-end justify-content-lg-start row align-items-center p-0" style="margin-bottom: 1rem; gap: 0.5rem;">
    <div>
      <select name="print_type" id="print_type" class="form-control">
        <option value="PDF">Export PDF</option>
        <option value="EXCEL">Export Excel</option>
      </select>
    </div>
    <button type="button" class="btn btn-default btn-sm" onclick="exportDataReport()">
      <span>
        <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" />
      </span>
    </button>
  </div>
</div>