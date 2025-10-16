<div class="card-body">
  <div class="row py-3" style="gap: 1rem;">
    <!-- LEFT -->
    <div class="col-md-12 col-lg-5">
      <!-- PR NUMBER -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">PR Number</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="purchaseRequisitionTrigger" data-toggle="modal" data-target="#purchaseRequisitionModal" style="display: block;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="purchaseRequisitionTrigger">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="modal_purchase_requisition_ids" class="form-control" style="border-radius:0;" hidden>
            <input id="modal_purchase_requisition_document_numbers" class="form-control" style="border-radius:0; background-color: white;" readonly>
          </div>
        </div>
      </div>
      <div class="row" id="prNumberMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col text-red">
          PR Number cannot be empty.
        </div>
      </div>

      <!-- BUDGET -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
        <div class="col-5">
          <div style="flex: 100%;">
            <input id="budget_value" style="border-radius:0;" class="form-control" readonly>
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
            <input type="text" class="form-control datetimepicker-input" name="dateOfDelivery" id="dateOfDelivery" data-target="#startDate" autocomplete="off" style="border-radius: unset;" />
          </div>
        </div>
      </div>

      <!-- DELIVERY TO -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Delivery To</label>
        <div class="col-5">
          <input type="hidden" id="deliveryToDuplicate_RefID">
          <input type="hidden" name="deliveryTo_RefID" id="deliveryTo_RefID">
          <input type="hidden" id="deliveryToDuplicate">
          <textarea name="delivery_to" id="delivery_to" cols="30" rows="4" class="form-control" autocomplete="off"></textarea>
        </div>
      </div>
      <div class="row" id="deliveryToMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col text-red">
          Delivery To cannot be empty.
        </div>
      </div>
    </div>
  </div>
</div>