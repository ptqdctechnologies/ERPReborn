<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- BUDGET CODE -->
        <div class="col-md-12 col-lg-3">
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget
                    Code</label>
                <div class="col-6 d-flex">
                    <div>
                        <span class="input-group-text form-control" data-toggle="modal" data-target="#myProjects"
                            style="border-radius:0;cursor:pointer;">
                            <i id="iconBudget" class="fas fa-gift"></i>

                            <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status"
                                style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input type="text" id="budget_name" class="form-control"
                                style="border-radius:0; background-color: <?= isset($combinedBudgetRefID) ? '#e9ecef' : '#fff';?>;"
                                readonly
                                value="<?= isset($combinedBudgetCode) && isset($combinedBudgetName) ? $combinedBudgetCode . ' - ' . $combinedBudgetName : ''; ?>" />
                            <input type="hidden" class="form-control" id="budget_id" name="budget_id"
                                value="<?= isset($combinedBudgetRefID) ? $combinedBudgetRefID : ''; ?>" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-3">
            <!-- DATE RANGE -->
            <div class="row p-0 align-items-center">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Date Range</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                    <div>
                        <div class="input-group" id="budget_progress_date_range_container">
                            <div class="input-group-prepend" style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
                                <span class="input-group-text" id="budget_progress_date_range_container_icon" style="border-radius: 0;">
                                    <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
                                </span>
                            </div>
                            <input readonly type="text" class="form-control" style="height: 21.8px;border-radius:0;background-color:white;" id="budget_progress_date_range" name="budget_progress_date_range" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>