<div class="col-sm-12 col-md-12 col-lg-4">
    <form method="POST" action="{{ route('LoanSettlement.ReportLoanSettlementDetailStore') }}">
    @csrf
    <!-- BRF NUMBER -->
    <div class="row p-0 align-items-center" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Loan Settlement Number</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <input id="brf_number_trano" style="border-radius:0;" name="brf_number_trano" class="form-control" size="34" value="<?= $dataReport['dataHeaderOne']['brfNumber'] ?? ''; ?>" readonly>
                <input id="brf_number_id" style="border-radius:0;" name="brf_number_id" class="form-control" value="<?= $dataReport['dataHeaderOne']['brfId'] ?? ''; ?>" hidden>
            </div>
            <div>
                <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="javascript:;" id="myGetModalBRFNumberTrigger" data-toggle="modal" data-target="#myGetModalBRFNumber">
                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myGetModalBRFNumberTrigger">
                    </a>
                </span>
            </div>
            <div class="d-sm-none d-md-none d-lg-block">
                <input id="brf_number_budget" style="border-radius:0;" name="brf_number_budget" class="form-control invisible" value="<?= $dataReport['dataHeaderOne']['budgetCode'] ?? ''; ?>">
                <input id="brf_number_budget_name" style="border-radius:0;" name="brf_number_budget_name" class="form-control d-none" value="<?= $dataReport['dataHeaderOne']['budgetName'] ?? ''; ?>">
                <input id="brf_number_sub_budget" style="border-radius:0;" name="brf_number_sub_budget" class="form-control d-none" value="<?= $dataReport['dataHeaderOne']['siteCode'] ?? ''; ?>">
                <input id="brf_number_sub_budget_name" style="border-radius:0;" name="brf_number_sub_budget_name" class="form-control d-none" value="<?= $dataReport['dataHeaderOne']['siteName'] ?? ''; ?>">
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
    <form method="POST" action="{{ route('LoanSettlement.PrintExportReportLoanSettlementDetail') }}">
    @csrf
        <input id="project_code_second_trigger" style="border-radius:0;" name="project_code_second_trigger" class="form-control" size="34" value="<?= $dataReport['dataHeaderOne']['budgetCode'] ?? null; ?>" readonly hidden>
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