<div class="card-body">
  <div class="row py-3" style="gap: 1rem;">
    <!-- LEFT -->
    <div class="col-md-12 col-lg-5">
      <!-- PR NUMBER -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">PR Number</label>
        <div class="col-5 d-flex">
          <div style="flex: 100%;">
            <input id="modal_purchase_requisition_document_number" style="border-radius:0;" name="modal_purchase_requisition_document_number" class="form-control" readonly value="<?= $header['poNumber']; ?>">
            <input id="modal_purchase_requisition_id" style="border-radius:0;" name="modal_purchase_requisition_id" class="form-control" hidden value="<?= $header['poNumberID']; ?>">
          </div>
        </div>
      </div>

      <!-- BUDGET -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
        <div class="col-5 d-flex">
          <div style="flex: 100%;">
            <input id="budget_value" style="border-radius:0;" class="form-control" readonly value="<?= $header['budgetValue']; ?>">
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT -->
    <div class="col-md-12 col-lg-5">
      <!-- DATE OF DELIVERY -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date of Delivery</label>
        <div class="col-5 input-group date" id="startDate" data-target-input="nearest" style="flex-wrap: nowrap;">
          <div>
            <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker" style="width: 27.78px; height: 21.8px;">
              <div class="input-group-text" style="border-radius: unset; justify-content: center; width: inherit;"><i class="fa fa-calendar"></i></div>
            </div>
          </div>
          <div style="flex: 100%;">
            <input type="text" class="form-control datetimepicker-input" name="dateOfDelivery" id="dateOfDelivery" value="<?= $header['deliveryDateTime']; ?>" data-target="#startDate" autocomplete="off" style="border-radius: unset;" />
          </div>
        </div>
      </div>

      <!-- DELIVERY TO -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Delivery To</label>
        <div class="col-5">
          <input id="delivery_to_id" style="border-radius:0;" name="delivery_to_id" class="form-control" hidden value="<?= $header['deliveryToID']; ?>">
            <textarea name="delivery_to" id="delivery_to" cols="30" rows="4" class="form-control" autocomplete="off"><?= $header['deliveryTo']; ?></textarea>
        </div>
      </div>
      <div class="row" id="deliveryToMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div class="text-red">
            Delivery To cannot be empty.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>