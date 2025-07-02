<!-- BODY -->
<div class="card-body">
    <div class="row py-3" style="gap: 15px;">
        <!-- LEFT COLUMN -->
        <div class="col-md-12 col-lg-5">
            <!-- MATERIAL RECEIVE -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Material Receive Number
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="delivery_order_code" style="border-radius:0;" class="form-control" size="20" readonly value="<?= $header['materialReceiveNumber']; ?>" />
                        <input id="warehouseInboundOrderRefID" style="border-radius:0;" name="warehouseInboundOrderRefID" class="form-control" value="<?= $header['warehouseInboundOrderRefID']; ?>" hidden />
                    </div>
                    {{-- <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="deliveryOrderTrigger" data-toggle="modal" data-target="#myDeliveryOrder" style="display: block;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="deliveryOrderTrigger">
                            </a>
                        </span>
                    </div> --}}
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-md-12 col-lg-5">
            <!-- DELIVERY FROM -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Delivery From
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="id_delivery_order_from" style="border-radius:0;" class="form-control" size="20" readonly hidden value="<?= $header['deliveryFromRefID']; ?>">
                        <textarea id="address_delivery_order_from" rows="3" style="border-radius:0;" class="form-control">
                            <?= $header['deliveryFromNonRefID']; ?>
                        </textarea>
                    </div>
                </div>
            </div>

            <!-- DELIVERY TO -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Delivery To
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="id_delivery_order_to" style="border-radius:0;" class="form-control" size="20" readonly hidden value="<?= $header['deliveryToRefID']; ?>">
                        <textarea id="address_delivery_order_to" rows="3" style="border-radius:0;" class="form-control">
                            <?= $header['deliveryToNonRefID']; ?>
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>