<div class="card-body">
  <div class="row py-3" style="gap: 1rem;">
    <!-- LEFT -->
    <div class="col-md-12 col-lg-5">
      <!-- BUDGET CODE -->
      @include('Components.Forms.budgetCode')

      <!-- TYPE -->
      <div class="row" style="margin-top: 1rem; display: <?= isset($customerOrder_RefID) ? 'none' : 'flex' ?>;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Type</label>
        <div class="col-5">
          <div>
            <select class="form-control" id="typeOption" name="typeValue" onchange="selectType(this)"
              style="border-radius:0;">
              <option disabled selected>Select a Type</option>
              <option value="SUB_BUDGET_BASE">Sub Budget Base</option>
              <option value="PRODUCT_BASE">Product Base</option>
            </select>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT -->
    <div class="col-md-12 col-lg-5">
      <!-- CURRENCY -->
      @include('Components.Forms.currency')
    </div>

    <!-- METHOD -->
    <div class="col-12" style="display: <?= isset($customerOrder_RefID) ? 'none' : 'flex' ?>;">
      <div class="row">
        <div class="form-group d-flex" style="gap: 20%;">
          <div class="custom-control custom-radio" style="min-width: max-content;">
            <input type="radio" id="type_import_from_excel" class="custom-control-input" name="type_customer_order"
              value="type_import_from_excel" disabled onclick="typeValue(this)">
            <label for="type_import_from_excel" class="custom-control-label">
              <div style="margin-top: 6%;">Import from Excel</div>
            </label>
          </div>
          <div class="custom-control custom-radio" style="min-width: max-content;">
            <input type="radio" id="type_add_manually" class="custom-control-input" name="type_customer_order"
              value="type_add_manually" disabled onclick="typeValue(this)">
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