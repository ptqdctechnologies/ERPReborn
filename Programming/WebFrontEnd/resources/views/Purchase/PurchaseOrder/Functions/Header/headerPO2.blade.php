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
            <input id="modal_purchase_requisition_document_numbers" style="border-radius:0;" class="form-control" size="20" readonly>
            <input id="modal_purchase_requisition_ids" style="border-radius:0;" class="form-control" hidden>
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

      <!-- BUDGET -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0" style="margin-bottom: 1rem;">
          Budget
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="budget_value" style="border-radius:0;" size="24" class="form-control" readonly>
          </div>
        </div>
      </div>

      <!-- SUB BUDGET -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Sub Budget
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="sub_budget_value" style="border-radius:0;" size="24" class="form-control" readonly>
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
            <input id="dateOfDelivery" name="dateOfDelivery" style="border-radius:0;width: 100%;" type="date" class="form-control">
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
            <input type="hidden" id="deliveryToDuplicate_RefID">
            <input type="hidden" name="deliveryTo_RefID" id="deliveryTo_RefID">
            <input type="hidden" id="deliveryToDuplicate">
            <textarea name="delivery_to" id="delivery_to" cols="30" rows="4" class="form-control"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>