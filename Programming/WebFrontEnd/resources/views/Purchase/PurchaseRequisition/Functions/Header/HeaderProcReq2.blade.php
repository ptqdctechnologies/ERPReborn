<div class="card-body">
    <div class="row py-3" style="gap: 15px;">
        <div class="col-md-12 col-lg-5">
            <!-- DELIVERY TO -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Delivery To</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="deliver_RefID" name="deliver_RefID" style="border-radius:0;" class="form-control" readonly hidden>
                        <input id="deliverCode" style="border-radius:0;" class="form-control" readonly>
                    </div>
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="deliverModalTrigger" data-toggle="modal" data-target="#myDeliverTo">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="" />
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input id="deliverName" style="border-radius:0;" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <!-- DATE OF DELIVERY -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date of Delivery</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div style="width: 42%;">
                        <input id="dateCwommance" name="dateCommance" style="border-radius:0;width: 100%;" type="date" class="form-control">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-5">
            <!-- NOTES -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Notes
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <textarea id="notes" name="notes" rows="3" style="border-radius:0;" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>