<div class="card-body">
    <div class="row py-3" style="gap: 15px;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Budget Code</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myProjectSecondTrigger" data-toggle="modal" data-target="#myProjects">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecondTrigger">
                            </a>
                            <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input id="project_name_second" class="form-control" style="border-radius:0; background-color: white;" readonly>
                        <input id="project_id_second" class="form-control" style="border-radius:0;" hidden>
                        <input id="project_code_second" class="form-control" style="border-radius:0;" hidden>
                    </div>
                </div>
            </div>
            <div class="row" id="budgetMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
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
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Sub Budget Code</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySites">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input id="site_name_second" class="form-control" style="border-radius:0; background-color: white;" readonly>
                        <input id="site_id_second" class="form-control" style="border-radius:0;" hidden>
                        <input id="site_code_second" class="form-control" style="border-radius:0;" hidden>
                    </div>
                </div>
            </div>
            <div class="row" id="subBudgetMessage" style="margin-top: .3rem;display: none;">
                <label for="project_code_second" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red">
                    Sub Budget Code cannot be empty.
                </div>
            </div>
        </div>
    </div>
</div>