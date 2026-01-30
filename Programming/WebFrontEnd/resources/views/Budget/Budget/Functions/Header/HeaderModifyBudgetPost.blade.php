<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="project_code_popup" data-toggle="modal" data-target="#myProjects" style="display: block;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                            </a>

                            <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="project_name" style="border-radius:0;" name="project_name" class="form-control" value="<?= $budgetName; ?>" readonly>
                            <input id="project_code" style="border-radius:0;" name="project_code" class="form-control" value="<?= $budgetCode; ?>" hidden>
                            <input id="project_id" style="border-radius:0;" name="project_id" class="form-control" value="<?= $budgetID; ?>" hidden>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="budgetMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red">
                    Budget Code cannot be empty.
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget Code</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="site_code_popup" data-toggle="modal" data-target="#mySites">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="site_name" style="border-radius:0;" name="site_name" class="form-control" value="<?= $subBudgetName; ?>" readonly>
                            <input id="site_code" style="border-radius:0;" name="site_code" class="form-control" value="<?= $subBudgetCode; ?>" hidden>
                            <input id="site_id" style="border-radius:0;" name="site_id" class="form-control" value="<?= $subBudgetID; ?>" hidden>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="subBudgetMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red">
                    Sub Budget Code cannot be empty.
                </div>
            </div>
        </div>
    </div>
</div>