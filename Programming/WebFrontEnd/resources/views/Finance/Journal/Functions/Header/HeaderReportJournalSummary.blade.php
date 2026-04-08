<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- BUDGET -->
    <div class="row p-0 align-items-center">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Budget</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <span id="myProjectsTrigger" class="input-group-text form-control" data-toggle="modal"
                    data-target="#myProjects" style="border-radius:0;cursor:pointer;">
                    <i id="iconBudget" class="fas fa-gift"></i>

                    <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status"
                        style="display: none;">
                        <span class="sr-only">Loading...</span>
                    </div>
                </span>
            </div>
            <div>
                <input type="text" id="budget_name" class="form-control" style="border-radius:0;background-color:white;"
                    readonly />
                <input type="hidden" id="budget_id" class="form-control" style="border-radius:0;" name="budget_id" />
                <input type="hidden" id="budget_code" class="form-control" style="border-radius:0;"
                    name="budget_code" />
            </div>
        </div>
    </div>
    <div class="row" id="budgetMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end text-red">
            Budget cannot be empty.
        </div>
    </div>

    <!-- DATE -->
    <div class="row p-0 align-items-center" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Date</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <div class="input-group" id="journal_date_range_container">
                    <div class="input-group-prepend"
                        style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
                        <span class="input-group-text" id="journal_date_range_container_icon" style="border-radius: 0;">
                            <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
                        </span>
                    </div>
                    <input readonly type="text" class="form-control"
                        style="height: 21.8px;border-radius:0;background-color:white;" id="journal_date_range"
                        name="journal_date_range" />
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="dateRangeMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end text-red">
            Date Range cannot be empty.
        </div>
    </div>
</div>

<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- TRANSACTION TYPE -->
    <div class="row p-0 align-items-center">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Trans. Type</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <span id="myTranoTrigger" class="input-group-text form-control" data-toggle="modal"
                    data-target="#myBusinessDocumentType" style="border-radius:0;cursor:pointer;">
                    <i class="fas fa-gift"></i>
                </span>
            </div>
            <div>
                <input type="text" id="trans_type_name" class="form-control"
                    style="border-radius:0;background-color:white;" readonly />
                <input type="hidden" id="trans_type_id" class="form-control" style="border-radius:0;"
                    name="trans_type_id" />
            </div>
        </div>
    </div>
    <div class="row" id="transactionTypeMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end text-red">
            Transaction Type cannot be empty.
        </div>
    </div>

    <!-- TRANO -->
    <div class="row p-0 align-items-center" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Trano</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <span id="myTranoTrigger" class="input-group-text form-control" data-toggle="modal" data-target="#"
                    style="border-radius:0;cursor:pointer;">
                    <i class="fas fa-gift"></i>
                </span>
            </div>
            <div>
                <input type="text" id="trano_name" class="form-control" style="border-radius:0;background-color:white;"
                    readonly />
                <input type="hidden" id="trano_id" class="form-control" style="border-radius:0;" name="trano_id" />
                <input type="hidden" id="trano_code" class="form-control" style="border-radius:0;" name="trano_code" />
            </div>
        </div>
    </div>
    <div class="row" id="tranoMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end text-red">
            Trano cannot be empty.
        </div>
    </div>
</div>

<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- BANK -->
    <div class="row p-0 align-items-center">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Bank</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div onclick="pickBanksAccount(false)">
                <span id="myBankTrigger" class="input-group-text form-control" data-toggle="modal"
                    data-target="#myBanksAccount" style="border-radius:0;cursor:pointer;">
                    <i class="fas fa-gift"></i>
                </span>
            </div>
            <div>
                <input type="text" id="bank_name" class="form-control" style="border-radius:0;background-color:white;"
                    readonly />
                <input type="hidden" id="bank_id" class="form-control" style="border-radius:0;" name="bank_id" />
                <input type="hidden" id="bank_code" class="form-control" style="border-radius:0;" name="bank_code" />
            </div>
        </div>
    </div>
    <div class="row" id="bankMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end text-red">
            Bank cannot be empty.
        </div>
    </div>

    <!-- FROM/TO -->
    <div class="row p-0 align-items-center" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">From/To</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div onclick="pickBanksAccount(true)">
                <span id="myFromToTrigger" class="input-group-text form-control" data-toggle="modal"
                    data-target="#myBanksAccount" style="border-radius:0;cursor:pointer;">
                    <i class="fas fa-gift"></i>
                </span>
            </div>
            <div>
                <input type="text" id="from_to_name" class="form-control"
                    style="border-radius:0;background-color:white;" readonly />
                <input type="hidden" id="from_to_id" class="form-control" style="border-radius:0;" name="from_to_id" />
                <input type="hidden" id="from_to_code" class="form-control" style="border-radius:0;"
                    name="from_to_code" />
            </div>
        </div>
    </div>
    <div class="row" id="fromToMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end text-red">
            From/To cannot be empty.
        </div>
    </div>
</div>

<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- EXPORT -->
    <div class="row align-items-center" style="margin-bottom: 1rem; gap: 0.5rem;">
        <div>
            <select name="print_type" id="print_type" class="form-control">
                <option value="PDF">Export PDF</option>
                <option value="EXCEL">Export Excel</option>
            </select>
        </div>
        <button type="button" class="btn btn-default btn-sm" onclick="validateExportButton()">
            <span>
                <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" />
            </span>
        </button>
    </div>

    <!-- SUBMIT -->
    <div class="row" style="gap: 0.5rem;">
        <button type="button" class="btn btn-default btn-sm" onclick="validateShowButton()" style="margin-top: -5px;">
            <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="show" title="Show">
            Show
        </button>
        <button type="button" class="btn btn-secondary btn-sm" onclick="resetForm()" style="margin-top: -5px;">
            Reset
        </button>
    </div>
</div>