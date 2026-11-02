<div class="row">
    <label for="delivery_to" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Delivery To
    </label>
    <div class="col-5 d-flex">
        <div class="input-group">
            <textarea id="delivery_to" class="form-control" rows="3"
                name="delivery_to"><?= isset($delivery_to) ? $delivery_to : ''; ?></textarea>
        </div>
    </div>
</div>
<div class="row" id="delivery_to_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="delivery_to_message_text"></div>
</div>