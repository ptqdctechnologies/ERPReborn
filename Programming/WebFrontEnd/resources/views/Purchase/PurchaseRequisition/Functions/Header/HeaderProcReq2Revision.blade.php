<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <!-- DELIVERY TO -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Delivery To</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="deliverModalTrigger" data-toggle="modal" data-target="#myGetModalWarehouses">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="" />
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="deliverName" style="border-radius:0;" class="form-control" readonly value="<?= $header['deliverToCode'] . ' - ' . $header['deliverToName']; ?>">
                            <input id="deliverCode" style="border-radius:0;" class="form-control" hidden value="<?= $header['deliverToCode']; ?>">
                            <input id="deliver_RefID" name="deliver_RefID" style="border-radius:0;" class="form-control" hidden value="<?= $header['deliverToID']; ?>">
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATE OF DELIVERY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date of Delivery</label>
                <div class="col-5 input-group date" id="dateOfDelivery" data-target-input="nearest" style="flex-wrap: nowrap;">
                    <div>
                        <div class="input-group-append" data-target="#dateOfDelivery" data-toggle="datetimepicker" style="width: 27.78px; height: 21.8px;">
                            <div class="input-group-text" style="border-radius: unset; justify-content: center; width: inherit;"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <div style="flex: 100%;">
                        <input type="text" class="form-control datetimepicker-input" name="dateCommance" id="dateCommance" onkeydown="return false"  data-target="#dateOfDelivery" autocomplete="off" value="<?= $header['dateOfDelivery']; ?>" style="border-radius: unset; background-color: #e9ecef;" />
                    </div>
                </div>
            </div>
            <div class="row" id="dateOfDeliveryMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-5 text-red">
                    Date of Delivery cannot be empty.
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- REMARK -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Remark</label>
                <div class="col-5">
                    <textarea id="remarks" name="remarks" rows="3" style="border-radius:0;" class="form-control"><?= $header['remarks']; ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>