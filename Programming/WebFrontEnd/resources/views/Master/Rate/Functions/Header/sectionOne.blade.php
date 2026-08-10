<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-3">
            <!-- CURRENCY -->
            <div class="row p-0 align-items-center">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Currency</label>
                <div class="col-6 d-flex">
                    <div>
                        <span class="input-group-text form-control" style="border-radius:0;cursor:pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div class="input-group">
                        <input type="hidden" id="currency_id" />
                        <input type="hidden" id="currency_code" />
                        <input type="text" id="currency_name" class="form-control"
                            style="border-radius:0;background-color:white;" readonly />
                    </div>
                </div>
            </div>

            <!-- RATE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Rate</label>
                <div class="col-6 d-flex">
                    <div class="input-group">
                        <input class="form-control number-without-characters" id="rate" name="rate"
                            style="border-radius:0;" autocomplete="off" />
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-3">
            <!-- DATE RANGE -->
            <div class="row p-0 align-items-center">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Date Range</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                    <div>
                        <div class="input-group" id="rate_date_range_container">
                            <div class="input-group-prepend"
                                style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
                                <span class="input-group-text" id="rate_date_range_container_icon"
                                    style="border-radius: 0;">
                                    <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
                                </span>
                            </div>
                            <input readonly type="text" class="form-control"
                                style="height: 21.8px;border-radius:0;background-color:white;" id="rate_date_range"
                                name="rate_date_range" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>