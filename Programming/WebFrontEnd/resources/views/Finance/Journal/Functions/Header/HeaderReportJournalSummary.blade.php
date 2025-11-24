<div class="col-sm-12 col-md-12 col-lg-3">
    <form id="formReportAccountPayable" method="post" action="{{ route('AccountPayable.ReportAccountPayableSummaryStore') }}">
        @csrf
        <!-- BUDGET -->
        <div class="row p-0 align-items-center">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Budget</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <input id="project_code_second" style="border-radius:0;" name="project_code_second" class="form-control" readonly value="<?= $dataReport['project']['code'] ?? ''; ?>" />
                    <input id="project_id_second" style="border-radius:0;" name="project_id_second" class="form-control" hidden value="<?= $dataReport['project']['id'] ?? ''; ?>" />
                </div>
                <div>
                    <span style="border-radius:0;" class="input-group-text form-control">
                        <a href="javascript:;" id="myProjectSecondTrigger" data-toggle="modal" data-target="#myProjectSecond">
                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecondTrigger" />
                        </a>
                    </span>
                </div>
                <div class="d-none">
                    <input id="project_name_second" style="border-radius:0;" name="project_name_second" class="form-control invisible" readonly value="<?= $dataReport['project']['name'] ?? ''; ?>" />
                </div>
            </div>
        </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-3">
        <!-- DATE -->
        <div class="row p-0 align-items-center">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Date</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <div class="input-group">
                        <input readonly type="text" class="form-control" style="height: 21.8px;border-radius:0;" id="reservation" name="date" value="<?= $dataReport['date'] ?? ''; ?>" />
                        <div class="input-group-prepend" style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
                            <span class="input-group-text" id="reservation-icon">
                                <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-3">
        <!-- TYPE -->
        <div class="row p-0 align-items-center">
            <label class="col-sm-3 col-md-4 col-lg-5 col-form-label p-0 text-bold">Transaction Type</label>
            <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                <div>
                    <select class="form-control">
                        <option selected disabled>Select a ...</option>
                        <option value="DEBIT">DB</option>
                        <option value="CREDIT">CR</option>
                    </select>
                </div>
            </div>
        </div>
</div>