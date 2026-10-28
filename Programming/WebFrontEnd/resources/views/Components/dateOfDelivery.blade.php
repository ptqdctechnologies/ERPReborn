<div class="row">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Date of Delivery
    </label>
    <div id="date_of_delivery_picker" class="col-5 d-flex" data-target-input="nearest">
        <div>
            <div class="input-group-append" data-target="#date_of_delivery_picker" data-toggle="datetimepicker"
                style="width: 27.78px; height: 21.8px; cursor: pointer;">
                <div class="input-group-text" style="border-radius: unset; justify-content: center; width: inherit;">
                    <i class="fa fa-calendar"></i>
                </div>
            </div>
        </div>
        <div style="flex: 100%;">
            <input type="text" class="form-control datetimepicker-input" name="date_of_delivery" id="date_of_delivery"
                data-target="#date_of_delivery_picker" autocomplete="off"
                style="border-radius: unset; background-color: <?= isset($date_of_delivery) ? '#e9ecef' : ''; ?>;" />
        </div>
    </div>
</div>
<div class="row" id="date_of_delivery_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="date_of_delivery_message_text"></div>
</div>