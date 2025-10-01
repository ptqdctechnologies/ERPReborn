<div class="card-body">
    <div class="row py-3" style="gap: 15px;">
        <div class="col-md-12 col-lg-5">
            <!-- DELIVERY TO -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Delivery To</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="deliverModalTrigger" data-toggle="modal" data-target="#myDeliverTo">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="" />
                            </a>
                        </span>
                    </div>
                    <div>
                        <input id="deliver_RefID" name="deliver_RefID" style="border-radius:0;" class="form-control" readonly hidden value="<?= $header['deliverToID']; ?>">
                        <input id="deliverCode" style="border-radius:0;" class="form-control" readonly value="<?= $header['deliverToCode']; ?>">
                    </div>
                    <div style="flex: 100%;">
                        <input id="deliverName" style="border-radius:0;" class="form-control" readonly value="<?= $header['deliverToName']; ?>">
                    </div>
                </div>
            </div>

            <!-- DATE OF DELIVERY -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date of Delivery</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div style="width: 42%;">
                        <input id="dateCommance" name="dateCommance" style="border-radius:0;width: 100%;" type="date" class="form-control" value="<?= $header['dateOfDelivery']; ?>">
                    </div>
                </div>
            </div>
            <div class="row" id="dateOfDeliveryMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Date of Delivery cannot be empty.
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-5">
            <!-- REMARKS -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Remarks
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <textarea id="remarks" name="remarks" rows="3" style="border-radius:0;" class="form-control"><?= $header['remarks']; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>