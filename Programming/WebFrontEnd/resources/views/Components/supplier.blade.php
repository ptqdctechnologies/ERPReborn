<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Supplier
    </label>
    <div class="col-5 d-flex">
        <div>
            <span id="supplier_container" class="input-group-text form-control" data-toggle="modal"
                data-target="#mySuppliers" style="border-radius: 0;">
                <i id="supplier_icon" class="fas fa-gift"></i>

                <div id="supplier_loading" class="spinner-border spinner-border-sm" role="status"
                    style="display: none;">
                    <span class="sr-only">Loading...</span>
                </div>
            </span>
        </div>
        <div style="flex: 100%;">
            <div class="input-group">
                <input type="text" id="supplier_preview" class="form-control"
                    style="border-radius:0; background-color: #FFF;" readonly />
                <input type="hidden" class="form-control" id="supplier_id" name="supplier_id" />
                <input type="hidden" class="form-control" id="supplier_name" name="supplier_name" />
                <input type="hidden" class="form-control" id="supplier_code" name="supplier_code" />
                <input type="hidden" class="form-control" id="supplier_address" name="supplier_address" />
            </div>
        </div>
    </div>
</div>
<div class="row" id="supplier_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="supplier_message_text"></div>
</div>