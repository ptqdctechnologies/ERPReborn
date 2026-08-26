<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-3">
            <!-- CURRENCY -->
            <div class="row p-0 align-items-center">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Currency</label>
                <div class="col-6 d-flex">
                    <div>
                        <span class="input-group-text form-control" data-toggle="modal" data-target="#myCurrencies"
                            style="border-radius:0;cursor:pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div class="input-group">
                        <input type="hidden" id="currency_id"
                            value="<?= isset($currencyRefID) ? $currencyRefID : ''; ?>" />
                        <input type="hidden" id="currency_code"
                            value="<?= isset($currencyCode) ? $currencyCode : ''; ?>" />
                        <input type="text" id="currency_name" class="form-control"
                            value="<?= isset($currencyCode) && isset($currencyName) ? $currencyCode . ' - ' . $currencyName : ''; ?>"
                            style="border-radius:0;background-color:<?= isset($currencyCode) && isset($currencyName) ? '' : 'white'; ?>;"
                            readonly />
                    </div>
                </div>
            </div>

            <!-- RATE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Rate</label>
                <div class="col-6 d-flex">
                    <div class="input-group">
                        <input class="form-control number-only" id="rate" name="rate"
                            value="<?= isset($rate) ? number_format($rate, 2) : ''; ?>" style="border-radius:0;"
                            autocomplete="off" />
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-3">
            <!-- DATE RANGE -->
            <div class="row p-0 align-items-center">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Date Range</label>
                <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0 justify-content-sm-end justify-content-md-end date"
                    id="rate_date_range" data-target-input="nearest">
                    <div>
                        <div class="input-group-append" data-target="#rate_date_range" data-toggle="datetimepicker"
                            style="width: 27.78px; height: 21.8px;">
                            <div class="input-group-text"
                                style="border-radius: unset; justify-content: center; width: inherit;"><i
                                    class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <div style="flex: 100%;">
                        <input type="text" class="form-control datetimepicker-input" name="rate_date" id="rate_date"
                            onkeydown="return false" data-target="#rate_date_range" autocomplete="off"
                            style="border-radius: unset;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>