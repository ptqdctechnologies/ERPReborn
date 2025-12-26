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

  <!-- SUB BUDGET -->
  <div class="row p-0 align-items-center">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Sub Budget</label>
    <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
      <div>
        <span id="mySitesTrigger" class="input-group-text form-control" data-toggle="modal" data-target="#mySites" style="border-radius:0;cursor:pointer;">
          <i class="fas fa-gift"></i>
        </span>
      </div>
      <div>
        <input type="text" id="sub_budget_name" class="form-control" style="border-radius:0;background-color:white;" readonly />
        <input type="hidden" id="sub_budget_id" class="form-control" style="border-radius:0;" name="sub_budget_id" />
        <input type="hidden" id="sub_budget_code" class="form-control" style="border-radius:0;" name="sub_budget_code" />
      </div>
    </div>
  </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-3">
  <!-- SUPPLIER -->
  <div class="row p-0 align-items-center" style="margin-bottom: 1rem;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Supplier</label>
    <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
      <div>
        <span id="mySuppliersTrigger" class="input-group-text form-control" data-toggle="modal" data-target="#mySuppliers" style="border-radius:0;cursor:pointer;">
          <i class="fas fa-gift"></i>
        </span>
      </div>
      <div>
        <input type="text" id="supplier_name" class="form-control" style="border-radius:0;background-color:white;" readonly />
        <input type="hidden" id="supplier_id" class="form-control" style="border-radius:0;" name="supplier_id" />
        <input type="hidden" id="supplier_code" class="form-control" style="border-radius:0;" name="supplier_code" />
      </div>
    </div>
  </div>
  <!-- DATE -->
  <div class="row p-0 align-items-center">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Date</label>
    <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
      <div>
        <div class="input-group" id="purchase_order_date_range_container">
          <div class="input-group-prepend" style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
            <span class="input-group-text" id="purchase_order_date_range_container_icon" style="border-radius: 0;">
              <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
            </span>
          </div>
          <input readonly type="text" class="form-control" style="height: 21.8px;border-radius:0;background-color:white;" id="purchase_order_date_range" name="purchase_order_date_range" />
        </div>
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