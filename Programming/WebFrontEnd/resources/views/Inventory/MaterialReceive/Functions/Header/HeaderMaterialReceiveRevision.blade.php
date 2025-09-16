<!-- BODY -->
<div class="card-body">
    <div class="row py-3" style="gap: 15px;">
        <!-- LEFT COLUMN -->
        <div class="col-md-12 col-lg-5">
            <!-- MATERIAL RECEIVE -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Material Receive Number
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="delivery_order_code" style="border-radius:0;" class="form-control" size="24" readonly value="<?= $header['materialReceiveNumber']; ?>" />
                        <input id="warehouseInboundOrderRefID" style="border-radius:0;" name="warehouseInboundOrderRefID" class="form-control" value="<?= $header['warehouseInboundOrderRefID']; ?>" hidden />
                    </div>
                </div>
            </div>

            <!-- RECEIVE DATE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Receive Date
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group date" id="startDate" data-target-input="nearest">
                            <input type="text" id="receive_date" name="receive_date" class="form-control datetimepicker-input" data-target="#startDate" style="height: 21.8px;border-radius:0;background-color:#e9ecef;">

                            <div class="input-group-prepend" data-target="#startDate" data-toggle="datetimepicker" style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="receiveDateMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Receive Date cannot be empty.
                    </div>
                </div>
            </div>

            <!-- RECEIVE IN -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Receive in
                </label>
                <div class="col-sm-9 col-md-8 col-lg-5 d-flex p-0">
                    <div>
                        <input hidden type="text" id="warehouse_id" name="warehouse_id" value="<?= $header['warehouseRefID']; ?>" />
                        <textarea disabled id="warehouse_name" rows="3" style="border-radius:0;" class="form-control"><?= $header['warehouseName']; ?></textarea>
                    </div>
                    <div style="background-color:#e9ecef;min-height:100%;border:1px solid #ced4da;">
                        <span style="border-radius:0;border:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myGetModalWarehousesTrigger" data-toggle="modal" data-target="#myGetModalWarehouses" style="display: block;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myGetModalWarehousesTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <textarea disabled id="warehouse_address" rows="3" style="border-radius:0;" class="form-control"><?= $header['warehouseAddress']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-md-12 col-lg-5">
            <!-- BUDGET -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Budget
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="budget_value" style="border-radius:0;" size="24" class="form-control" value="<?= $header['combinedBudgetCode'] . ' - ' . $header['combinedBudgetName']; ?>" readonly>
                    </div>
                </div>
            </div>

            <!-- SUB BUDGET -->
            <!-- <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Sub Budget
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="sub_budget_value" style="border-radius:0;" size="24" class="form-control" value="<?= $header['combinedBudgetSectionCode'] . ' - ' . $header['combinedBudgetSectionName']; ?>" readonly>
                    </div>
                </div>
            </div> -->

            <!-- DELIVERY FROM -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Delivery From
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input type="hidden" id="id_delivery_order_from_duplicate" style="border-radius:0;" class="form-control" size="20" value="<?= $header['deliveryFromRefID']; ?>" readonly>
                        <input type="hidden" id="id_delivery_order_from" name="id_delivery_order_from" style="border-radius:0;" class="form-control" size="20" value="<?= $header['deliveryFromRefID']; ?>" readonly>
                        <input type="hidden" id="address_delivery_order_from_duplicate" style="border-radius:0;" class="form-control" size="20" value="<?= $header['deliveryFromNonRefID']; ?>" readonly>
                        <textarea id="address_delivery_order_from" name="address_delivery_order_from" rows="3" style="border-radius:0;" class="form-control">
                            <?= $header['deliveryFromNonRefID']; ?>
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="row" id="deliveryFromMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Delivery From cannot be empty.
                    </div>
                </div>
            </div>

            <!-- DELIVERY TO -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Delivery To
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input type="hidden" id="id_delivery_order_to_duplicate" style="border-radius:0;" class="form-control" size="20" value="<?= $header['deliveryToRefID']; ?>" readonly>
                        <input type="hidden" id="id_delivery_order_to" name="id_delivery_order_to" style="border-radius:0;" class="form-control" size="20" value="<?= $header['deliveryToRefID']; ?>" readonly>
                        <input type="hidden" id="address_delivery_order_to_duplicate" style="border-radius:0;" class="form-control" size="20" value="<?= $header['deliveryToNonRefID']; ?>" readonly>
                        <textarea id="address_delivery_order_to" name="address_delivery_order_to" rows="3" style="border-radius:0;" class="form-control">
                            <?= $header['deliveryToNonRefID']; ?>
                        </textarea>
                    </div>
                </div>
            </div>
            <div class="row" id="deliveryToMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Delivery To cannot be empty.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>