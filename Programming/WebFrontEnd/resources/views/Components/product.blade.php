<!-- CONTENT -->
<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Product
    </label>
    <div class="col-5 d-flex">
        <div>
            <span id="product_container" class="input-group-text form-control" data-toggle="modal" data-target="#"
                style="border-radius: 0; cursor: pointer;">
                <i id="product_icon" class="fas fa-gift"></i>

                <div id="product_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                    <span class="sr-only">Loading...</span>
                </div>
            </span>
        </div>
        <div style="flex: 100%;">
            <div class="input-group">
                <input type="text" id="product_preview" class="form-control"
                    style="border-radius:0; background-color: #fff;" readonly />
                <input type="hidden" class="form-control" id="product_id" name="product_id" />
                <input type="hidden" class="form-control" id="product_name" name="product_name" />
                <input type="hidden" class="form-control" id="product_code" name="product_code" />
            </div>
        </div>
    </div>
</div>
<div class="row" id="product_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="product_message_text"></div>
</div>