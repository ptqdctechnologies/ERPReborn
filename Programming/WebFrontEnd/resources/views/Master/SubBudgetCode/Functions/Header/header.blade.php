<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-4">
            <!-- SUB BUDGET CODE -->
            <div class="row">
                <label for="sub_budget_code" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget
                    Code</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="sub_budget_code" name="sub_budget_code" style="border-radius:0;"
                            autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row" id="subBudgetCodeMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="subBudgetCodeMessageText"></div>
            </div>

            <!-- SUB BUDGET NAME -->
            <div class="row" style="margin-top: 1rem;">
                <label for="sub_budget_name" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget
                    Name</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="sub_budget_name" name="sub_budget_name" style="border-radius:0;"
                            autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row" id="subBudgetNameMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="subBudgetNameMessageText"></div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-4">
            <!-- BUDGET CODE -->
            @include('Components.Forms.budgetCode')

            <!-- SUB BUDGET GROUP -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget Group</label>
                <div class="col-5 d-flex justify-content-sm-end justify-content-md-end">
                    <div>
                        <span id="sub_budget_group_trigger" class="input-group-text form-control" data-toggle="modal"
                            data-target="#sub_budget_group_modal" style="border-radius:0;cursor:pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div style="width: 100%;">
                        <input type="text" id="sub_budget_group_preview" class="form-control"
                            style="border-radius:0;background-color:white;" readonly />
                        <input type="hidden" id="sub_budget_group_id" class="form-control" style="border-radius:0;"
                            name="sub_budget_group_id" />
                    </div>
                </div>
            </div>
            <div class="row" id="subBudgetGroupMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="subBudgetGroupMessageText"></div>
            </div>
        </div>
    </div>
</div>