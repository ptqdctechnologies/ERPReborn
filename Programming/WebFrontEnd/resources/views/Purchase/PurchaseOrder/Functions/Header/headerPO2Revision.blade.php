<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- LEFT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- PO NUMBER -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">PO Number</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
              <input id="modal_purchase_requisition_document_number" style="border-radius:0;" name="modal_purchase_requisition_document_number" class="form-control" readonly value="<?= $header['poNumber']; ?>">
              <input id="modal_purchase_requisition_id" style="border-radius:0;" name="modal_purchase_requisition_id" class="form-control" hidden value="<?= $header['poNumberID']; ?>">
          </div>
        </div>
      </div>

      <!-- BUDGET -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="budget_value" style="border-radius:0;" class="form-control" readonly value="<?= $header['budgetValue']; ?>">
          </div>
        </div>
      </div>

      <!-- SUB BUDGET -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="sub_budget_value" style="border-radius:0;" class="form-control" readonly value="<?= $header['subBudgetValue']; ?>">
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- DATE OF DELIVERY -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date of Delivery</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div style="width: 42%;">
            <input id="dateOfDelivery" name="dateOfDelivery" style="border-radius:0;width: 100%;" type="date" class="form-control" value="<?= $header['deliveryDateTime']; ?>">
          </div>
        </div>
      </div>

      <!-- DELIVERY TO -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Delivery To</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="delivery_to_id" style="border-radius:0;" name="delivery_to_id" class="form-control" hidden value="<?= $header['deliveryToID']; ?>">
            <textarea name="delivery_to" id="delivery_to" cols="30" rows="4" class="form-control"><?= $header['deliveryTo']; ?></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>