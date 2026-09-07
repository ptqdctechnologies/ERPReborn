<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Budget Code</label>
                <div class="col-5 d-flex">
                    <div>
                        <span id="myProjectsTrigger" class="input-group-text form-control" data-toggle="modal"
                            data-target="#myProjects" style="border-radius: 0; cursor: pointer;">
                            <i id="iconBudget" class="fas fa-gift"></i>
                            <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status"
                                style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input type="text" id="project_name" class="form-control"
                            value="<?= isset($budget) ? $budget['code'] . ' - ' . $budget['name'] : ''; ?>"
                            style="border-radius: 0; background-color: <?= isset($budget) ? '' : 'white' ?>;"
                            readonly />
                        <input type="hidden" id="project_id" value="<?= isset($budget) ? $budget['id'] : ''; ?>" />
                    </div>
                </div>
            </div>
            <div class="row" id="budgetMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col-5 d-flex">
                    <div class="text-red">
                        Budget Code cannot be empty.
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Sub Budget Code</label>
                <div class="col-5 d-flex">
                    <div>
                        <span id="mySitesTrigger" class="input-group-text form-control" data-toggle="modal"
                            data-target="#mySites" style="border-radius: 0; cursor: not-allowed;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input type="text" id="site_name" class="form-control"
                            value="<?= isset($site) ? $site['code'] . ' - ' . $site['name'] : ''; ?>"
                            style="border-radius:0; background-color: <?= isset($site) ? '' : 'white' ?>;" readonly />
                        <input type="hidden" id="site_id" value="<?= isset($site) ? $site['id'] : ''; ?>" />
                    </div>
                </div>
            </div>
            <div class="row" id="subBudgetMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col-5 d-flex">
                    <div class="text-red">
                        Sub Budget Code cannot be empty.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>