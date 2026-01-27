<div class="card-body">
    <div class="row py-3 justify-content-between" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-3">
            <!-- SETTLEMENT VALUE -->
            <div class="row" style="margin-bottom: 1rem;">
                <label for="settlement_value" class="col-sm-3 col-md-4 col-lg-5 col-form-label p-0">Settlement Value</label>
                <div class="col-sm-9 col-md-8 col-lg-5 p-0">
                    <div class="input-group">
                        <input id="settlement_value" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                    </div>
                </div>
            </div>

            <!-- PENALTY VALUE -->
            <div class="row" style="margin-bottom: 1rem;">
                <label for="penalty_value" class="col-sm-3 col-md-4 col-lg-5 col-form-label p-0">Penalty Value</label>
                <div class="col-sm-9 col-md-8 col-lg-5 p-0">
                    <div class="input-group">
                        <input id="penalty_value" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                    </div>
                </div>
            </div>

            <!-- INTEREST VALUE -->
            <div class="row" style="margin-bottom: 1rem;">
                <label for="interest_value" class="col-sm-3 col-md-4 col-lg-5 col-form-label p-0">Interest Value</label>
                <div class="col-sm-9 col-md-8 col-lg-5 p-0">
                    <div class="input-group">
                        <input id="interest_value" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                    </div>
                </div>
            </div>
        </div>

        <!-- CENTER -->
        <div class="col-md-12 col-lg-4">
            <!-- COA SETTLEMENT -->
            <div class="row" style="margin-bottom: 1rem;">
                <label for="taxi" class="col-sm-3 col-md-4 col-lg-5 col-form-label p-0">COA Settlement</label>
                <div class="col-sm-9 col-md-8 col-lg-4 d-flex p-0">
                    <div>
                        <span id="creditor_trigger" class="input-group-text form-control" data-toggle="modal" data-target="#myGetChartOfAccount" onclick="changeTypeOfCOA('SETTLEMENT')" style="border-radius:0;cursor:pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input type="hidden" id="coa_settlement_id" class="form-control" style="border-radius:0;" />
                            <input type="text" id="coa_settlement_name" class="form-control" style="border-radius:0;background:white;" readonly />
                        </div>
                    </div>
                </div>
            </div>

            <!-- COA PENALTY -->
            <div class="row" style="margin-bottom: 1rem;">
                <label for="taxi" class="col-sm-3 col-md-4 col-lg-5 col-form-label p-0">COA Penalty</label>
                <div class="col-sm-9 col-md-8 col-lg-4 d-flex p-0">
                    <div>
                        <span id="creditor_trigger" class="input-group-text form-control" data-toggle="modal" data-target="#myGetChartOfAccount" onclick="changeTypeOfCOA('PENALTY')" style="border-radius:0;cursor:pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input type="hidden" id="coa_penalty_id" class="form-control" style="border-radius:0;" />
                            <input type="text" id="coa_penalty_name" class="form-control" style="border-radius:0;background:white;" readonly />
                        </div>
                    </div>
                </div>
            </div>

            <!-- COA INTEREST -->
            <div class="row" style="margin-bottom: 1rem;">
                <label for="taxi" class="col-sm-3 col-md-4 col-lg-5 col-form-label p-0">COA Interest</label>
                <div class="col-sm-9 col-md-8 col-lg-4 d-flex p-0">
                    <div>
                        <span id="creditor_trigger" class="input-group-text form-control" data-toggle="modal" data-target="#myGetChartOfAccount" onclick="changeTypeOfCOA('INTEREST')" style="border-radius:0;cursor:pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input type="hidden" id="coa_interest_id" class="form-control" name="coa_interest_id" style="border-radius:0;" />
                            <input type="text" id="coa_interest_name" class="form-control" style="border-radius:0;background:white;" readonly />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-4">
            <div class="row py-3 px-2" style="border: 1px solid rgba(0,0,0,.1); border-radius: 2px;">
                <div class="col">
                    <!-- TITLE -->
                    <div class="row text-bold" style="margin-bottom: 1rem; font-size: 0.9rem;">
                        Transaction Information
                    </div>

                    <!-- TOTAL LOAN -->
                    <div class="row" style="margin-bottom: 1rem;">
                        <div class="col">
                            <div class="row">
                                <label for="taxi" class="col-sm-3 col-md-4 col-lg-7 col-form-label p-0">Total Loan</label>
                                <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                    <div class="input-group">
                                        <input disabled id="total_loan" name="total_loan" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TOTAL SETTLEMENT -->
                    <div class="row" style="margin-bottom: 1rem;">
                        <div class="col">
                            <div class="row">
                                <label for="taxi" class="col-sm-3 col-md-4 col-lg-7 col-form-label p-0">Total Settlement</label>
                                <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                    <div class="input-group">
                                        <input disabled id="total_settlement" name="total_settlement" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TOTAL UNSETTLEMENT -->
                    <div class="row" style="margin-bottom: 1rem;">
                        <div class="col">
                            <div class="row">
                                <label for="taxi" class="col-sm-3 col-md-4 col-lg-7 col-form-label p-0">Total Unsettlement</label>
                                <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                    <div class="input-group">
                                        <input disabled id="total_unsettlement" name="total_unsettlement" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- BALANCE -->
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <label for="taxi" class="col-sm-3 col-md-4 col-lg-7 col-form-label p-0">Balance</label>
                                <div class="col-sm-9 col-md-8 col-lg-3 p-0">
                                    <div class="input-group">
                                        <!-- Rumus: Total unsettlement - Settlement Value -->
                                        <input disabled id="total_balance" name="total_balance" style="border-radius:0;" autocomplete="off" class="form-control number-without-negative">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>