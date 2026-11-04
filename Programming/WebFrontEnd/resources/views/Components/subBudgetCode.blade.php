<!-- CONTENT -->
<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Sub Budget Code
    </label>
    <div class="col-5 d-flex">
        <div>
            <span id="sub_budget_container" class="input-group-text form-control"
                style="border-radius:0;cursor:not-allowed;">
                <i id="icon_budget" class="fas fa-gift"></i>
            </span>
        </div>
        <div style="flex: 100%;">
            <div class="input-group">
                <input type="text" id="sub_budget_preview" class="form-control"
                    value="<?= isset($sub_budget['preview']) ? $sub_budget['preview'] : ''; ?>"
                    style="border-radius:0; background-color: <?= isset($sub_budget['preview']) ? '#e9ecef' : '#fff' ?>;"
                    readonly />
                <input type="hidden" class="form-control" id="sub_budget_id" name="sub_budget_id"
                    value="<?= isset($sub_budget['id']) ? $sub_budget['id'] : ''; ?>" />
                <input type="hidden" class="form-control" id="sub_budget_name" name="sub_budget_name"
                    value="<?= isset($sub_budget['name']) ? $sub_budget['name'] : ''; ?>" />
                <input type="hidden" class="form-control" id="sub_budget_code" name="sub_budget_code"
                    value="<?= isset($sub_budget['code']) ? $sub_budget['code'] : ''; ?>" />
            </div>
        </div>
    </div>
</div>
<div class="row" id="sub_budget_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="sub_budget_message_text"></div>
</div>