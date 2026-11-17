<!-- CONTENT -->
<div class="row p-0 align-items-center">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">
        Budget
    </label>
    <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
        <div>
            <span id="budget_container" class="input-group-text form-control" data-toggle="modal"
                data-target="<?= isset($budget['preview']) ? '' : '#budget_code_modal'; ?>"
                style="border-radius: 0; cursor: <?= isset($budget['preview']) ? 'not-allowed' : 'pointer'; ?>;">
                <i id="budget_icon" class="fas fa-gift"></i>

                <div id="budget_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                    <span class="sr-only">Loading...</span>
                </div>
            </span>
        </div>
        <div>
            <input type="text" id="budget_preview" class="form-control"
                value="<?= isset($budget['preview']) ? $budget['preview'] : ''; ?>"
                style="border-radius:0; background-color: <?= isset($budget['preview']) ? '#e9ecef' : '#fff' ?>;"
                readonly />
            <input type="hidden" class="form-control" id="budget_id" name="budget_id"
                value="<?= isset($budget['id']) ? $budget['id'] : ''; ?>" />
            <input type="hidden" class="form-control" id="budget_name" name="budget_name"
                value="<?= isset($budget['name']) ? $budget['name'] : ''; ?>" />
            <input type="hidden" class="form-control" id="budget_code" name="budget_code"
                value="<?= isset($budget['code']) ? $budget['code'] : ''; ?>" />
        </div>
    </div>
</div>
<div class="row" id="budget_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="budget_message_text"></div>
</div>