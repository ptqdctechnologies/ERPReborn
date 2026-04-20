<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <div class="col-md-12 col-lg-5">
            <!-- BUDGET -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Budget
                    Code</label>
                <div class="col-4 d-flex p-0">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myProjectTrigger" data-toggle="modal" data-target="#myProjects"
                                style="display: block;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13"
                                    alt="myProjectTrigger">
                            </a>

                            <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status"
                                style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="project_name" style="border-radius:0; background-color: white;"
                                class="form-control" readonly>
                            <input id="project_code" style="border-radius:0;" class="form-control" hidden>
                            <input id="project_id" style="border-radius:0;" class="form-control" hidden>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-5">
            <!-- TRANSACTION TYPE -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Transaction
                    Type</label>
                <div class="col-4 d-flex p-0">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myBusinessDocumentTypeTrigger" style="cursor: not-allowed;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="transaction_type_name" style="border-radius:0; background-color: white;"
                                class="form-control" readonly>
                            <input id="transaction_type_id" style="border-radius:0;" class="form-control" hidden>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>