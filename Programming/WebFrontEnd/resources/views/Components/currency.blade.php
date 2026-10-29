<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Currency
    </label>
    <div class="col-5 d-flex">
        <div>
            <span id="currency_container" class="input-group-text form-control" data-toggle="modal"
                data-target="<?= isset($currency['preview']) ? '' : '#myCurrencies'; ?>"
                style="border-radius: 0; cursor: <?= isset($currency['preview']) ? 'not-allowed' : 'pointer'; ?>;">
                <i id="currency_icon" class="fas fa-gift"></i>

                <div id="currency_loading" class="spinner-border spinner-border-sm" role="status"
                    style="display: none;">
                    <span class="sr-only">Loading...</span>
                </div>
            </span>
        </div>
        <div style="flex: 100%;">
            <div class="input-group">
                <input type="text" id="currency_preview" class="form-control"
                    value="<?= isset($currency['preview']) ? $currency['preview'] : ''; ?>"
                    style="border-radius:0; background-color: <?= isset($currency['preview']) ? '#e9ecef' : '#fff' ?>;"
                    readonly />
                <input type="hidden" class="form-control" id="currency_id" name="currency_id"
                    value="<?= isset($currency['id']) ? $currency['id'] : ''; ?>" />
                <input type="hidden" class="form-control" id="currency_name" name="currency_name"
                    value="<?= isset($currency['name']) ? $currency['name'] : ''; ?>" />
                <input type="hidden" class="form-control" id="currency_code" name="currency_code"
                    value="<?= isset($currency['code']) ? $currency['code'] : ''; ?>" />
            </div>
        </div>
    </div>
</div>
<div class="row" id="currency_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="currency_message_text"></div>
</div>