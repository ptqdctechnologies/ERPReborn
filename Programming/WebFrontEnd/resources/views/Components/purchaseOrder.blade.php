<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        PO Number
    </label>
    <div class="col-5 d-flex">
        <div>
            <span id="purchase_order_container" class="input-group-text form-control" data-toggle="modal"
                data-target="<?= isset($purchaseOrder_number) ? '' : '#'; ?>"
                style="border-radius: 0; cursor: <?= isset($purchaseOrder_number) ? 'not-allowed' : 'pointer'; ?>;">
                <i id="purchase_order_icon" class="fas fa-gift"></i>

                <div id="purchase_order_loading" class="spinner-border spinner-border-sm" role="status"
                    style="display: none;">
                    <span class="sr-only">Loading...</span>
                </div>
            </span>
        </div>
        <div style="flex: 100%;">
            <div class="input-group">
                <input type="text" id="purchase_order_preview" class="form-control"
                    value="<?= isset($purchaseOrder_number) ? $purchaseOrder_number : ''; ?>"
                    style="border-radius:0; background-color: <?= isset($purchaseOrder_number) ? '#e9ecef' : '#fff' ?>;"
                    readonly />
                <input type="hidden" class="form-control" id="purchase_order_id" name="purchase_order_id"
                    value="<?= isset($purchaseOrder_id) ? $purchaseOrder_id : ''; ?>" />
            </div>
        </div>
    </div>
</div>
<div class="row" id="purchase_order_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="purchase_order_message_text"></div>
</div>