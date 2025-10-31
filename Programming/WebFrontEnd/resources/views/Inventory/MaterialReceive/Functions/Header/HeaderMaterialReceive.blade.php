<!-- BODY -->
<div class="card-body">
    <div class="row py-3" style="row-gap: 15px;">
        <!-- LEFT COLUMN -->
        <div class="col-md-12 col-lg-4">
            <!-- DELIVERY ORDER NUMBER -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">
                    DO Number
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="deliveryOrderTrigger" data-toggle="modal" data-target="#myDeliveryOrder" style="display: block;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="deliveryOrderTrigger">
                            </a>
                        </span>
                    </div>
                    <div>
                        <input id="delivery_order_id" style="border-radius:0;" name="delivery_order_id" class="form-control" hidden>
                        <input id="delivery_order_code" style="border-radius:0; background-color: white;" class="form-control" size="19" readonly>
                    </div>
                </div>
            </div>
            <div class="row" id="deliveryOrderMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Delivery Order cannot be empty.
                    </div>
                </div>
            </div>

            <!-- RECEIVE DATE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">
                    Receive Date
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group date" id="startDate" data-target-input="nearest">
                            <div class="input-group-prepend" data-target="#startDate" data-toggle="datetimepicker" style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
                                </span>
                            </div>

                            <input type="text" size="19" id="receive_date" name="receive_date" class="form-control datetimepicker-input" data-target="#startDate" style="height: 21.8px;border-radius:0;background-color:#fff;">
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
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">
                    Receive in
                </label>
                <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0">
                    <div style="background-color:#e9ecef;min-height:100%;border:1px solid #ced4da;">
                        <span style="border-radius:0;border:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myGetModalWarehousesTrigger" data-toggle="modal" data-target="#myGetModalWarehouses" style="display: block;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myGetModalWarehousesTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input hidden type="text" id="warehouse_id" name="warehouse_id" />
                            <textarea id="warehouse_name" class="form-control" style="border-radius:0;" rows="3" hidden></textarea>
                            <textarea disabled id="warehouse_address" class="form-control" style="border-radius:0; background-color: white;" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="receiveInMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Receive In cannot be empty.
                    </div>
                </div>
            </div>
        </div>

        <!-- MIDDLE COLUMN -->
        <div class="col-md-12 col-lg-4">
            <!-- TYPE -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">
                    Type
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="do_type" style="border-radius:0;" size="23" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <!-- BUDGET -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">
                    Budget
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="budget_value" style="border-radius:0;" size="23" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <!-- REQUESTER -->
            <div id="requester_stock_movement_container" class="row" style="margin-bottom: 1rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">
                    Requester
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="do_requester" style="border-radius:0;" size="23" class="form-control" readonly>
                    </div>
                </div>
            </div>
            
            <!-- STATUS -->
            <div id="status_stock_movement_container" class="row" style="display: none;">
                <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">
                    Status
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="do_status" style="border-radius:0;" size="23" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-md-12 col-lg-4">
            <!-- TRANSPORTER -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">
                    Transporter
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="do_transporter" style="border-radius:0;" size="23" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <!-- DELIVERY FROM -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">
                    Delivery From
                </label>
                <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0">
                    <div style="width: 100%;">
                        <input type="hidden" id="id_delivery_order_from_duplicate" style="border-radius:0;" class="form-control" size="24" readonly>
                        <input type="hidden" id="id_delivery_order_from" name="id_delivery_order_from" style="border-radius:0;" class="form-control" size="24" readonly>
                        <input type="hidden" id="address_delivery_order_from_duplicate" style="border-radius:0;" class="form-control" size="24" readonly>
                        <textarea id="address_delivery_order_from" name="address_delivery_order_from" rows="3" style="border-radius:0;" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="row" id="deliveryFromMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-6 p-0">
                    <div class="text-red">
                        Delivery From cannot be empty.
                    </div>
                </div>
            </div>

            <!-- DELIVERY TO -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">
                    Delivery To
                </label>
                <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0">
                    <div style="width: 100%;">
                        <input type="hidden" id="id_delivery_order_to_duplicate" style="border-radius:0;" class="form-control" size="20" readonly>
                        <input type="hidden" id="id_delivery_order_to" name="id_delivery_order_to" style="border-radius:0;" class="form-control" size="20" readonly>
                        <input type="hidden" id="address_delivery_order_to_duplicate" style="border-radius:0;" class="form-control" size="20" readonly>
                        <textarea id="address_delivery_order_to" name="address_delivery_order_to" rows="3" style="border-radius:0;" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="row" id="deliveryToMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-6 p-0">
                    <div class="text-red">
                        Delivery To cannot be empty.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>