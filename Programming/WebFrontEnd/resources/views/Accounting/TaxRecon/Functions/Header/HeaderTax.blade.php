<!-- BODY -->
<div class="card-body">
    <!-- INPUT COMPONENTS -->
    <div class="row pt-3" style="row-gap: 15px;">
        <!-- LEFT COLUMN -->
        <div class="col-md-12 col-lg-7">
            <div class="row" style="gap: 1rem;">
                <div class="col">
                    <div class="row">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Tax Type</label>
                        <div class="col-sm-9 col-md-8 col-lg-3 d-flex p-0">
                            <div style="width: 100%;">
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
                    <div class="row" id="bank_accounts_message" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col text-red">
                            Account Number cannot be empty.
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Date</label>
                        <div class="col-5 input-group date" id="dateOfJournal" data-target-input="nearest" style="flex-wrap: nowrap;">
                            <div>
                                <div class="input-group-append" data-target="#dateOfJournal" data-toggle="datetimepicker" style="width: 27.78px; height: 21.8px;">
                                    <div class="input-group-text" style="border-radius: unset; justify-content: center; width: inherit;">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                            <div style="flex: 100%;">
                                <input type="text" class="form-control datetimepicker-input" name="journal_date" id="journal_date" onkeydown="return false"  data-target="#dateOfJournal" autocomplete="off" style="border-radius: unset;" />
                            </div>
                        </div>
                    </div>
                    <div class="row" id="journal_date_message" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col text-red">
                            Date cannot be empty.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col"></div>
    </div>

    <!-- CARD COMPONENTS -->
    <div class="row pb-3" style="margin-top: 1.5rem; gap: 1rem;">
        <!-- SALDO AWAL -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold" style="background-color: #e8f6e9; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <div>SALDO AWAL</div>
                <div class="d-flex align-items-center justify-content-center invisible" style="background-color: #36AE7C; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">0</div>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <div id="nominal_beginning_balance" class="p-3 text-bold" style="font-size: larger;">
                IDR 0.00
            </div>
            <div class="px-3 pb-3 text-bold">
                (Lebih Bayar)
            </div>
        </div>
        <!-- TAX IN -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold" style="background-color: #e8eaf6; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <div>TAX IN</div>
                <div id="total_cash_in" class="d-flex align-items-center justify-content-center invisible" style="background-color: #187498; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">0</div>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <div id="nominal_cash_in" class="p-3 text-bold" style="font-size: larger;">
                IDR 0.00
            </div>
        </div>
        <!-- TAX OUT -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold" style="background-color: #ffebed; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <div>TAX OUT</div>
                <div id="total_cash_out" class="d-flex align-items-center justify-content-center invisible" style="background-color: #EB5353; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">0</div>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <div id="nominal_cash_out" class="p-3 text-bold" style="font-size: larger;">
                IDR 0.00
            </div>
        </div>
        <!-- SALDO AKHIR -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold" style="background-color: #e8f6e9; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <div>SALDO AKHIR</div>
                <div class="d-flex align-items-center justify-content-center invisible" style="background-color: #F9D923; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">0</div>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <div id="nominal_ending_balance" class="p-3 text-bold" style="font-size: larger;">
                IDR 0.00
            </div>
            <div class="px-3 pb-3 text-bold">
                (Kurang Bayar)
            </div>
        </div>
    </div>
</div>

<!-- LEFT COLUMN -->
<!-- <div class="col-md-12 col-lg-5">
    <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account Number</label>
        <div class="col-5 d-flex">
            <div>
                <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="javascript:;" id="banksAccountTrigger" data-toggle="modal" data-target="#myBanksAccount">
                        <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="" />
                    </a>
                </span>
            </div>
            <div style="flex: 100%;">
                <div class="input-group">
                    <input id="bank_accounts_name" style="border-radius:0; background-color: white;" class="form-control" readonly>
                    <input id="bank_accounts_id" name="bank_accounts_id" style="border-radius:0;" class="form-control" hidden>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- RIGHT COLUMN -->
<!-- <div class="col-md-12 col-lg-5">
    <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date</label>
        <div class="col-5 input-group date" id="dateOfJournal" data-target-input="nearest" style="flex-wrap: nowrap;">
            <div>
                <div class="input-group-append" data-target="#dateOfJournal" data-toggle="datetimepicker" style="width: 27.78px; height: 21.8px;">
                    <div class="input-group-text" style="border-radius: unset; justify-content: center; width: inherit;"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
            <div style="flex: 100%;">
                <input type="text" class="form-control datetimepicker-input" name="journal_date" id="journal_date" onkeydown="return false"  data-target="#dateOfJournal" autocomplete="off" style="border-radius: unset;" />
            </div>
        </div>
    </div>
</div> -->