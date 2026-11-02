<div class="row">
    <label for="remark" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Remark
    </label>
    <div class="col-5 d-flex">
        <div class="input-group">
            <input type="text" id="remark" name="remark" autocomplete="off" class="form-control"
                style="border-radius:0;" value="<?= isset($remark) ? $remark : ''; ?>" />
        </div>
    </div>
</div>
<div class="row" id="remark_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="remark_message_text"></div>
</div>