<div class="card-body">
    <div class="row py-3">
        <div class="col p-0">
            <textarea id="remark" class="form-control"
                name="remark"><?= isset($remark) ? trim($remark) : ''; ?></textarea>
            <div id="remark_message" style="margin-top: .3rem;display: none;">
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div id="remark_message_text" class="text-red"></div>
                </div>
            </div>
        </div>
    </div>
</div>