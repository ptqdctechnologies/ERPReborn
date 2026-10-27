<div class="row">
    <label for="down_payment" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Down Payment (DP)
    </label>
    <div class="col-5 d-flex">
        <div class="input-group align-items-center" style="gap: .3rem;">
            <input type="number" id="down_payment" name="down_payment" autocomplete="off" class="form-control"
                style="border-radius:0;" />
            <label class="mb-0 text-bold">%</label>
        </div>
    </div>
</div>
<div class="row" id="down_payment_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="down_payment_message_text"></div>
</div>