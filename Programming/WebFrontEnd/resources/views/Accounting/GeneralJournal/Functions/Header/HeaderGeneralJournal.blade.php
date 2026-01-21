<!-- BODY -->
<div class="card-body">
    <div class="row py-3" style="gap: 15px;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <!-- JOURNAL TYPE -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Journal Type</label>
                <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                    <div style="background-color:white; width:100%;">
                        <select class="form-control" id="journal_type" onchange="onChangeJournalType(this)" style="border-radius:0;" type="text">
                            <option disabled selected value="Select a Type">Select a Type</option>
                            <option value="SETTLEMENT">Settlement</option>
                            <option value="ADJUSTMENT">Adjustment</option>
                            <option value="FIXED_ASSET">Fixed Asset</option>
                            <option value="POSTING">Posting</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" id="journal_type_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Journal Type cannot be empty.
                    </div>
                </div>
            </div>

            <!-- TRANSACTION NUMBER SETTLEMENT -->
            <div class="row journal-type-settlement" style="margin-top: 1rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Transaction Number</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <span class="input-group-text form-control" style="border-radius:0;">
                            <a href="javascript:;" data-toggle="modal" data-target="#myAllTransactions" style="display: block; cursor: pointer;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box" />
                            </a>
                        </span>
                    </div>
                    <div>
                        <div class="input-group">
                            <input id="transaction_number_settlement" class="form-control" size="16" readonly style="border-radius:0; background-color: white; cursor: default;" />
                            <input id="transaction_id_settlement" name="transaction_id_settlement" style="border-radius:0;" class="form-control" hidden />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="journal_settlement_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Transaction Number cannot be empty.
                    </div>
                </div>
            </div>

            <!-- TRANSACTION NUMBER FIXED ASSET -->
            <div class="row journal-type-fixed-asset" style="margin-top: 1rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Transaction Number</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <span class="input-group-text form-control" style="border-radius:0;">
                            <a href="javascript:;" data-toggle="modal" data-target="#myAccountPayables" style="display: block; cursor: pointer;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box" />
                            </a>
                        </span>
                    </div>
                    <div>
                        <div class="input-group">
                            <input id="transaction_number_fixed_asset" class="form-control" size="16" readonly style="border-radius:0; background-color: white; cursor: default;" />
                            <input id="transaction_id_fixed_asset" name="transaction_id_fixed_asset" style="border-radius:0;" class="form-control" hidden />
                        </div>
                    </div>
                </div>
            </div>

            <!-- TRANSACTION NUMBER POSTING -->
            <div class="row journal-type-posting" style="margin-top: 1rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Transaction Number</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <span class="input-group-text form-control" onclick="onChangeTransaction(false)" style="border-radius:0;">
                            <a href="javascript:;" data-toggle="modal" data-target="#myAllTransactions" style="display: block; cursor: pointer;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box" />
                            </a>
                        </span>
                    </div>
                    <div>
                        <div class="input-group">
                            <input id="transaction_number_posting" class="form-control" size="16" readonly style="border-radius:0; background-color: white; cursor: default;" />
                            <input id="transaction_id_posting" name="transaction_id_posting" style="border-radius:0;" class="form-control" hidden />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5"></div>
    </div>
    <!-- <div class="row justify-content-end">
        <button type="button" class="btn btn-default btn-sm d-flex" onclick="onClickGeneralJournalButton()" style="background-color:#e9ecef; border:1px solid #ced4da; gap: 5px;">
            <i class="fas fa-save" style="font-size: 16px; color: #1679AB;"></i>
            <div>Add</div>
        </button>
    </div> -->
</div>