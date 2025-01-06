<div class="col-sm-12 col-md-12 col-lg-4">
    <form method="POST" action="{{ route('BusinessTripSettlement.ReportBusinessTripSettlementDetailStore') }}">
    @csrf
    <!-- BUDGET -->
    <div class="row p-0 align-items-center" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Budget</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <input id="project_code_second" style="border-radius:0;" name="project_code_second" class="form-control" size="34" value="<?= $dataReport['budgetCode'] ?? ''; ?>" readonly>
                <input id="project_id_second" style="border-radius:0;" name="project_id_second" class="form-control" hidden>
            </div>
            <div>
                <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="javascript:;" id="myProjectSecondTrigger" data-toggle="modal" data-target="#myProjectSecond">
                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecondTrigger">
                    </a>
                </span>
            </div>
            <div class="d-sm-none d-md-none d-lg-block">
                <input id="project_name_second" style="border-radius:0;" name="project_name_second" class="form-control invisible" readonly>
            </div>
        </div>
    </div>

    <!-- SUB BUDGET -->
    <div class="row p-0 align-items-center">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Sub Budget</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <input id="site_code_second" style="border-radius:0;" name="site_code_second" class="form-control" size="34" value="<?= $dataReport['siteCode'] ?? ''; ?>" readonly>
                <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden>
            </div>
            <div>
                <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySiteCodeSecond">
                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
                    </a>
                </span>
            </div>
            <div class="d-sm-none d-md-none d-lg-block">
                <input id="site_name_second" style="border-radius:0;" name="site_name_second" class="form-control invisible" readonly>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-4">
    <!-- ADVANCE NUMBER -->
    <div class="row p-0 align-items-center" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">BSF Number</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <input id="modal_advance_document_number" style="border-radius:0;" name="modal_advance_document_number" class="form-control" size="34" value="<?= $dataReport['advanceNumber'] ?? ''; ?>" readonly>
                <input id="modal_advance_id" style="border-radius:0;" name="modal_advance_id" class="form-control" hidden>
            </div>
            <div>
                <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="javascript:;" id="myGetModalAdvanceTrigger" data-toggle="modal" data-target="#myGetModalAdvance">
                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myGetModalAdvanceTrigger">
                    </a>
                </span>
            </div>
            <div class="d-sm-none d-md-none d-lg-block">
                <input id="modal_advance_budget_code" style="border-radius:0;" name="modal_advance_budget_code" class="form-control invisible">
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
    <form method="POST" action="{{ route('BusinessTripSettlement.PrintExportReportBusinessTripSettlementDetail') }}">
    @csrf
        <div class="align-items-center justify-content-sm-end justify-content-md-end justify-content-lg-start row align-items-center p-0" style="margin-bottom: 1rem; gap: 0.5rem;">
            <select name="print_type" id="print_type" class="form-control" style="width: max-content;">
                <option value="PDF">Export PDF</option>
                <option value="Excel">Export Excel</option>
            </select>
            <button class="btn btn-default btn-sm" type="submit">
                <span>
                    <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="">
                </span>
            </button>
        </div>
    </form>
</div>