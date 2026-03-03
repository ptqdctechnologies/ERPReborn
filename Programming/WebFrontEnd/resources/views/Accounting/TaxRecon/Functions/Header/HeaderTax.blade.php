<!-- BODY -->
<div class="card-body">
    <!-- INPUT COMPONENTS -->
    <div class="row pt-3" style="row-gap: 15px; margin-bottom: 1rem; ">
        <!-- LEFT COLUMN -->
        <div class="col-md-12 col-lg-7">
            <div class="row" style="gap: 1rem;">
                <div class="col-4">
                    <div class="row">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Period</label>
                        <div class="col-7">
                            <div>
                                <div class="input-group" id="period_date_range_container">
                                    <div class="input-group-prepend" style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
                                        <span class="input-group-text" id="period_date_range_container_icon" style="border-radius: 0;">
                                            <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
                                        </span>
                                    </div>
                                    <input readonly type="text" class="form-control" style="height: 21.8px;border-radius:0;background-color:white;" id="period_date_range" name="period_date_range" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="period_date_message" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col text-red">
                            Period cannot be empty.
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Tax Type</label>
                        <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                            <div style="width: 100%;">
                                <select class="form-control" id="tax_type" style="border-radius:0;" type="text">
                                    <option disabled selected value="Select a Type">Select a Type</option>
                                    <option value="VAT">VAT</option>
                                    <option value="WHT">WHT</option>
                                    <option value="PREPAID_WHT">Prepaid WHT</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="tax_type_message" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col text-red">
                            Tax Type cannot be empty.
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row">
                        <button type="button" class="btn btn-default btn-sm float-right" onclick="onSearchTaxType(this)"  style="background-color:#e9ecef;border:1px solid #ced4da;">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col"></div>
    </div>

    <!-- CARD COMPONENTS -->
    <div class="row pb-3 vat-components" style="gap: 1rem; display: none;">
        <!-- BEGINNING BALANCE -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold" style="background-color: #e8f6e9; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <div>BEGINNING BALANCE</div>
                <div class="d-flex align-items-center justify-content-center invisible" style="background-color: #36AE7C; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">0</div>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <div id="nominal_beginning_balance" class="p-3 text-bold" style="font-size: larger;">
                IDR 0.00
            </div>
            <div class="px-3 pb-3 text-bold">
                (Overpayment)
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
        <!-- ENDING BALANCE -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold" style="background-color: #e8f6e9; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <div>ENDING BALANCE</div>
                <div class="d-flex align-items-center justify-content-center invisible" style="background-color: #F9D923; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">0</div>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <div id="nominal_ending_balance" class="p-3 text-bold" style="font-size: larger;">
                IDR 0.00
            </div>
            <div class="px-3 pb-3 text-bold">
                (Underpayment)
            </div>
        </div>
    </div>
</div>