<!-- CONTENT -->
<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Budget Code
    </label>
    <div class="col-5 d-flex">
        <div>
            <span id="budget_container" class="input-group-text form-control" data-toggle="modal"
                data-target="#budget_code_modal" style="border-radius: 0; cursor: 'pointer';">
                <i id="budget_icon" class="fas fa-gift"></i>

                <div id="budget_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                    <span class="sr-only">Loading...</span>
                </div>
            </span>
        </div>
        <div style="flex: 100%;">
            <div class="input-group">
                <input type="text" id="budget_preview" class="form-control"
                    style="border-radius:0; background-color: #FFF;" readonly />
                <input type="hidden" class="form-control" id="budget_id" name="budget_id" />
                <input type="hidden" class="form-control" id="budget_name" name="budget_name" />
                <input type="hidden" class="form-control" id="budget_code" name="budget_code" />
            </div>
        </div>
    </div>
</div>
<div class="row" id="budget_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="budget_message_text"></div>
</div>