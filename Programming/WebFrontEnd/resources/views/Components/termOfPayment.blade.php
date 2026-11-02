<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Term of Payment (TOP)
    </label>
    <div class="col-5">
        <div id="term_of_payment_loading_container" style="display: none;">
            <div class="d-flex flex-column justify-content-center">
                <div class="spinner-border spinner-border-sm" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>

        <div id="term_of_payment_container">
            <select id="term_of_payment_option" name="term_of_payment_value" class="form-control"
                style="border-radius:0;">
                <option>Select a TOP</option>
            </select>
        </div>
    </div>
</div>
<div class="row" id="term_of_payment_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="term_of_payment_message_text"></div>
</div>