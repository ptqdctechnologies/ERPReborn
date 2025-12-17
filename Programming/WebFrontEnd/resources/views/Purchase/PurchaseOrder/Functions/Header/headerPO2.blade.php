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

              <div id="loading_workflow" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
              </div>
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
      <!-- PR DATE OF DELIVERY -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">PR Delivery Date</label>
        <div class="col-5">
          <input id="purchase_request_delivery_date" class="form-control" style="border-radius:0;" readonly>
        </div>
      </div>

      <!-- PR DELIVERY TO -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">PR Delivery To</label>
        <div class="col-5">
          <textarea id="purchase_request_delivery_to" cols="30" rows="4" class="form-control" autocomplete="off" readonly></textarea>
        </div>
      </div>
    </div>
  </div>
</div>