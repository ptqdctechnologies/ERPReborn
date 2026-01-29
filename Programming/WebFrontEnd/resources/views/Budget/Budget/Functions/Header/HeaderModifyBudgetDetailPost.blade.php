<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Currency</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="currency_popup" data-toggle="modal" data-target="#myCurrencies">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="currency_name" style="border-radius:0;" name="currency_name" class="form-control" value="<?= $currencyName; ?>" readonly>
                            <input id="currency_symbol" style="border-radius:0;" name="currency_symbol" class="form-control" value="<?= $currencySymbol; ?>" hidden>
                            <input id="currency_id" style="border-radius:0;" name="currency_id" class="form-control" value="<?= $currencyID; ?>" hidden>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Exchange Rate</label>
                <div class="col-5">
                    <div>
                        <input id="exchange_rate" style="border-radius:0;" class="form-control" name="exchange_rate" value="<?= $exchangeRate && $exchangeRate != '-' ? number_format($exchangeRate, 2, '.', ',') : ''; ?>" readonly>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Value CO(+/-)</label>
                <div class="col-5">
                    <div>
                        <input id="value_co" style="border-radius:0;" class="form-control number-only" name="value_co" autocomplete="off" value="<?= number_format($valueCO, 2, '.', ','); ?>">
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Reason for Modify</label>
                <div class="col-5">
                    <div>
                        <input id="reason_modify" style="border-radius:0;" class="form-control" name="reason_modify" autocomplete="off" value="<?= $reason; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>