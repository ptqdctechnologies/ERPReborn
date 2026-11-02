<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        PR Number
    </label>
    <div class="col-5 d-flex">
        <div>
            <span id="purchase_requisition_container" class="input-group-text form-control" data-toggle="modal"
                data-target="#purchaseRequisitionModal" style="border-radius: 0; cursor: pointer;">
                <i id="purchase_requisition_icon" class="fas fa-gift"></i>

                <div id="purchase_requisition_loading" class="spinner-border spinner-border-sm" role="status"
                    style="display: none;">
                    <span class="sr-only">Loading...</span>
                </div>
            </span>
        </div>
        <div style="flex: 100%;">
            <div class="input-group">
                <input type="text" id="purchase_requisition_preview" class="form-control"
                    style="border-radius:0; background-color: #FFF;" readonly />
                <input type="hidden" class="form-control" id="purchase_requisition_id" name="purchase_requisition_id" />
            </div>
        </div>
    </div>
</div>
<div class="row" id="purchase_requisition_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="purchase_requisition_message_text"></div>
</div>