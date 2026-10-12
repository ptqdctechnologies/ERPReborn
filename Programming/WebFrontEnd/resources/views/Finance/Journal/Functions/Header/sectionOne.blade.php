<div class="card-body">
    <div class="row pt-3" style="gap: 1rem;">
        <!-- LEFT SIDE -->
        <div class="col-md-12 col-lg-5">
            <!-- ACCOUNT NUMBER -->
            <span>
                @include('getFunction.getBankAccountsWithCoA')
            </span>
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-12 col-lg-5">
            <!-- DATE -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Date
                </label>
                <div class="col-5 input-group date" id="journal_date_picker" data-target-input="nearest"
                    style="flex-wrap: nowrap;">
                    <div>
                        <div class="input-group-append" data-target="#journal_date_picker" data-toggle="datetimepicker"
                            style="width: 27.78px; height: 21.8px;">
                            <div class="input-group-text"
                                style="border-radius: unset; justify-content: center; width: inherit;">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <div style="flex: 100%;">
                        <input type="text" class="form-control datetimepicker-input" name="journal_date"
                            id="journal_date" onkeydown="return false" data-target="#journal_date_picker"
                            autocomplete="off" style="border-radius: unset;" />
                    </div>
                </div>
            </div>
            <div class="row" id="journal_date_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="journal_date_message_text"></div>
            </div>
        </div>
    </div>

    <div class="row pb-3" style="margin-top: 1.5rem; gap: 1rem;">
        <!-- BEGINNING BALANCE -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold"
                style="background-color: #e8f6e9; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <h3 class="text-bold">BEGINNING BALANCE</h3>
                <p class="d-flex align-items-center justify-content-center invisible"
                    style="background-color: #36AE7C; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">
                    0
                </p>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <p id="nominal_beginning_balance" class="p-3 text-bold mb-0" style="font-size: larger;">
                IDR 0.00
            </p>
        </div>

        <!-- CASH OUT -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold"
                style="background-color: #ffebed; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <h3 class="text-bold">CASH OUT</h3>
                <p id="total_cash_out" class="d-flex align-items-center justify-content-center"
                    style="background-color: #EB5353; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">
                    0
                </p>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <p id="nominal_cash_out" class="p-3 text-bold mb-0" style="font-size: larger;">
                IDR 0.00
            </p>
        </div>

        <!-- CASH IN -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold"
                style="background-color: #e8eaf6; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <h3 class="text-bold">CASH IN</h3>
                <p id="total_cash_in" class="d-flex align-items-center justify-content-center"
                    style="background-color: #187498; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">
                    0
                </p>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <p id="nominal_cash_in" class="p-3 text-bold mb-0" style="font-size: larger;">
                IDR 0.00
            </p>
        </div>

        <!-- VARIANCE -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold"
                style="background-color: #FFF3E0; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <h3 class="text-bold">VARIANCE</h3>
                <p id="total_variance" class="d-flex align-items-center justify-content-center"
                    style="background-color: #F57C00; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">
                    0
                </p>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <p id="nominal_variance" class="p-3 text-bold mb-0" style="font-size: larger;">
                IDR 0.00
            </p>
        </div>

        <!-- ENDING BALANCE -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold"
                style="background-color: #e8f6e9; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <h3 class="text-bold">ENDING BALANCE</h3>
                <p class="d-flex align-items-center justify-content-center invisible"
                    style="background-color: #F9D923; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">
                    0
                </p>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <p id="nominal_ending_balance" class="p-3 text-bold mb-0" style="font-size: larger;">
                IDR 0.00
            </p>
        </div>
    </div>
</div>