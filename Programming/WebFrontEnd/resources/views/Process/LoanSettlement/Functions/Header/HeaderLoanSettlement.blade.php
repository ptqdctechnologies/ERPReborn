<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <!-- LOAN NUMBER -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Number</label>
                <div class="col-5 d-flex p-0">
                    <div>
                        <span id="creditor_trigger" class="input-group-text form-control" data-toggle="modal" data-target="#myLoans" style="border-radius:0;cursor:pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input type="hidden" id="loan_id" class="form-control" style="border-radius:0;" />
                            <input type="text" id="loan_name" class="form-control" style="border-radius:0;background:white;" readonly />
                        </div>
                    </div>
                </div>
            </div>

            <!-- LOAN TYPE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Type</label>
                <div id="loan_type" class="col-5 d-flex p-0">
                    : -
                </div>
            </div>

            <!-- CREDITOR -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Creditor</label>
                <div id="loan_credit" class="col-5 d-flex p-0">
                    : -
                </div>
            </div>

            <!-- DEBITOR -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Debitor</label>
                <div id="loan_debit" class="col-5 d-flex p-0">
                    : -
                </div>
            </div>

            <!-- CURRENCY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Currency</label>
                <div id="loan_currency" class="col-5 d-flex p-0">
                    : -
                </div>
            </div>

            <!-- ACCOUNT NUMBER -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account Number</label>
                <div id="loan_account_bank" class="col-5 d-flex p-0">
                    : -
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- LOAN DATE -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Date</label>
                <div id="loan_date" class="col-5 d-flex p-0">
                    : -
                </div>
            </div>

            <!-- COA -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">COA</label>
                <div id="loan_coa" class="col-5 d-flex p-0">
                    : -
                </div>
            </div>

            <!-- LOAN PRINCIPLE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Principle</label>
                <div id="loan_principle" class="col-5 d-flex p-0">
                    : -
                </div>
            </div>

            <!-- LENDING RATE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Lending Rate</label>
                <div id="loan_lending_rate" class="col-5 d-flex p-0">
                    : -
                </div>
            </div>

            <!-- LOAN TERM -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Term</label>
                <div id="loan_term" class="col-5 d-flex p-0">
                    : -
                </div>
            </div>

            <!-- LOAN TOTAL -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Total</label>
                <div id="loan_total" class="col-5 d-flex p-0">
                    : -
                </div>
            </div>

            <!-- REMARK -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Remark</label>
                <div id="loan_remark" class="col-5 d-flex p-0">
                    : -
                </div>
            </div>
        </div>
    </div>
</div>