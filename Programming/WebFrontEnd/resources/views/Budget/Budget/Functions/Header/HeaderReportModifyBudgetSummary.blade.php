<div class="col-sm-12 col-md-12 col-lg-4">
    <form id="formReportModifyBudget" method="post" action="{{ route('Budget.ReportModifyBudgetSummaryStore') }}">
        @csrf
        <!-- BUDGET -->
        <div class="row p-0 align-items-center" style="margin-bottom: 1rem;">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Budget</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <input id="budget" style="border-radius:0;background-color:white;" class="form-control myProject" name="budget" readonly data-toggle="modal" data-target="#myProject">
                    <input id="budget_id" style="border-radius:0;" class="form-control" name="budget_id" type="hidden">
                </div>
                <div>
                    <span style="border-radius:0;" class="input-group-text form-control">
                        <a href="#" id="budget_popup" data-toggle="modal" data-target="#myProject" class="myProject">
                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="" />
                        </a>
                    </span>
                </div>
                <div class="d-sm-none d-md-none d-lg-block">
                    <input id="budget_name" style="border-radius:0;" class="form-control" name="budget_name" type="hidden">
                </div>
            </div>
        </div>

        <!-- SUB BUDGET -->
        <div class="row p-0 align-items-center">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Sub Budget</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <input id="sub_budget" style="border-radius:0;background-color:white;" class="form-control mySiteCode" name="sub_budget" readonly data-toggle="modal" data-target="#mySiteCode">
                    <input id="sub_budget_id" style="border-radius:0;" class="form-control" name="sub_budget_id" type="hidden">
                </div>
                <div>
                    <span style="border-radius:0;" class="input-group-text form-control">
                        <a href="#" id="sub_budget_popup" data-toggle="modal" data-target="#mySiteCode" class="mySiteCode">
                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="" />
                        </a>
                    </span>
                </div>
                <div class="d-sm-none d-md-none d-lg-block">
                </div>
            </div>
        </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-4">
        <!-- START DATE -->
        <div class="row p-0 align-items-center" style="margin-bottom: 1rem;">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Start Date</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <div class="input-group date" id="startDate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="startDate" id="startDate" data-target="#startDate" style="height: auto;" />
                        <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END DATE -->
        <div class="row p-0 align-items-center">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">End Date</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <div class="input-group date" id="finishDate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" name="finishDate" id="finishDate" data-target="#finishDate" style="height: auto;" />
                        <div class="input-group-append" data-target="#finishDate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-4 d-flex flex-column flex-column-reverse">
        <!-- SUBMIT -->
        <div class="align-items-center justify-content-sm-end justify-content-md-end justify-content-lg-start row p-0">
            <button class="btn btn-default btn-sm" type="submit" style="margin-top: -5px;">
                <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="show" title="Show">
                Show
            </button>
        </div>
    </form>

    <!-- EXPORT -->
    <form method="post" action="{{ route('Budget.PrintExportReportModifyBudgetSummary') }}">
    @csrf
        <div class="align-items-center justify-content-sm-end justify-content-md-end justify-content-lg-start row align-items-center p-0" style="margin-bottom: 1rem; gap: 0.5rem;">
            <div>
                <select name="print_type" id="print_type" class="form-control">
                    <option value="PDF">Export PDF</option>
                    <option value="Excel">Export Excel</option>
                </select>
            </div>
            <button class="btn btn-default btn-sm" type="submit">
                <span>
                    <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" />
                </span>
            </button>
        </div>
    </form>
</div>