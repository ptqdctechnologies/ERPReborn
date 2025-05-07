<!-- BODY -->
<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- LEFT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- PR NUMBER -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          PR Number
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="modal_purchase_requisition_document_number" style="border-radius:0;" name="modal_purchase_requisition_document_number" class="form-control" readonly>
            <input id="modal_purchase_requisition_id" style="border-radius:0;" name="modal_purchase_requisition_id" class="form-control" hidden>
          </div>
          <div class="input-group-append">
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="purchaseRequisitionTrigger" data-toggle="modal" data-target="#purchaseRequisitionModal" style="display: block;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="purchaseRequisitionTrigger">
              </a>
            </span>
          </div>
        </div>
      </div>

      <!-- BUDGET CODE -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Budget Code
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="budget_code_id" style="border-radius:0;" name="budget_code_id" class="form-control" readonly>
            <input id="budget_code_name" style="border-radius:0;" name="budget_code_name" class="form-control" hidden>
          </div>
        </div>
      </div>

      <!-- ITEM LOCATION -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Item Location
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="warehouse_from_id" name="warehouse_from_id" class="form-control" hidden>
            <input id="warehouse_from" name="warehouse_from" class="form-control" style="border-radius:0;" readonly>
          </div>
          <div class="input-group-append">
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;">
                <i id="warehouse_from_2" data-toggle="modal" data-target="#myGetWarehouse" class="fas fa-gift myGetWarehouseFrom" style="color:grey;"></i>
              </a>
            </span>
          </div>
        </div>
      </div>

      <!-- DELIVERY TO -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Delivery To
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="warehouse_to_id" name="warehouse_to_id" class="form-control" hidden>
            <input id="warehouse_to" name="warehouse_to" class="form-control" style="border-radius:0;" readonly>
          </div>
          <div class="input-group-append">
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;">
                <i id="warehouse_to_2" data-toggle="modal" data-target="#myGetWarehouse" class="fas fa-gift myGetWarehouseTo" style="color:grey;"></i>
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- DELIVERY DATE -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Delivery Date
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div style="width: 42%;">
            <input id="dateCommance" name="dateCommance" style="border-radius:0;width: 100%;" type="date" class="form-control">
          </div>
        </div>
      </div>

      <!-- NOTES -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Notes
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <textarea id="notes" name="notes" rows="3" style="border-radius:0;" class="form-control"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>