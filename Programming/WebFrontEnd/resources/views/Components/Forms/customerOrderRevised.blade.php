<div class="row">
    <label for="customer_order_revised" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
        Customer Order Revised
    </label>
    <div class="col-5">
        <div class="form-group d-flex" style="gap: 10%;">
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customer_order_revised_no" value="no"
                    name="customer_order_revised" onclick="coRevisedHandler(this)">
                <label for="customer_order_revised_no" class="custom-control-label" style="padding-top: 35%;">No</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customer_order_revised_yes" value="yes"
                    name="customer_order_revised" onclick="coRevisedHandler(this)">
                <label for="customer_order_revised_yes" class="custom-control-label"
                    style="padding-top: 28%;">Yes</label>
            </div>
        </div>
    </div>
</div>
<div class="row" id="customer_order_revised_message" style="margin-top: .3rem; display: none;">
    <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
    <div class="col text-red" id="customer_order_revised_message_text"></div>
</div>