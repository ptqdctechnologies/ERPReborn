<div class="row">
    <label for="payment_notes" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Payment Notes
    </label>
    <div class="col-5 d-flex">
        <div class="input-group">
            <input type="text" id="payment_notes" name="payment_notes" autocomplete="off" class="form-control"
                style="border-radius:0;" value="<?= isset($payment_notes) ? $payment_notes : ''; ?>" />
        </div>
    </div>
</div>
<div class="row" id="payment_notes_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="payment_notes_message_text"></div>
</div>