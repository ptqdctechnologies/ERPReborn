<!-- BODY -->
<div class="card-body">
    <div class="row py-3" style="gap: 15px;">
        <!-- LEFT COLUMN -->
        <div class="col-md-12 col-lg-5">
            <!-- DELIVERY ORDER -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Delivery Order Number
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="delivery_order_code" style="border-radius:0;" class="form-control" size="20" readonly>
                        <input id="delivery_order_id" style="border-radius:0;" name="delivery_order_id" class="form-control" hidden>
                    </div>
                    <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="deliveryOrderTrigger" data-toggle="modal" data-target="#myDeliveryOrder" style="display: block;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="deliveryOrderTrigger">
                            </a>
                        </span>
                    </div>
                </div>
            </div>

            <!-- GOODS RECEIPT -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Goods Receipt
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group date" id="startDate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#startDate" style="height: 21.8px;border-radius:0;background-color:#e9ecef;">

                            <div class="input-group-prepend" data-target="#startDate" data-toggle="datetimepicker" style="margin-right: 0px; width: 27.78px;cursor: pointer;height: 21.8px;">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt" style="width: 13px; height: 13px;"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BUDGET -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Budget
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="budget_value" style="border-radius:0;" size="24" class="form-control" readonly>
                    </div>
                </div>
            </div>

            <!-- SUB BUDGET -->
            {{-- <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Sub Budget
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="sub_budget_value" style="border-radius:0;" size="24" class="form-control" readonly>
                    </div>
                </div>
            </div> --}}
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-md-12 col-lg-5">
            <!-- WAREHOUSE -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Warehouse
                </label>
                <div class="col-sm-9 col-md-8 col-lg-4 d-flex p-0">
                    <div id="containerLoadingWarehouse">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>

                    <div id="containerSelectWarehouse">
                        <select class="form-control" onclick="selectWarehouse(this)" id="warehouseNameOption" style="border-radius:0;" type="text"></select>
                    </div>
                </div>
            </div>

            <!-- WAREHOUSE NAME -->
            <div id="containerWarehouseName" class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Warehouse Name
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <textarea id="warehouse_name" name="warehouse_name" rows="3" style="border-radius:0;" class="form-control"></textarea>
                    </div>
                </div>
            </div>

            <!-- DELIVERY FROM -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Delivery From
                </label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input type="hidden" id="id_delivery_order_from_duplicate" style="border-radius:0;" class="form-control" size="20" readonly>
                        <input type="hidden" id="id_delivery_order_from" name="id_delivery_order_from" style="border-radius:0;" class="form-control" size="20" readonly>
                        <input type="hidden" id="address_delivery_order_from_duplicate" style="border-radius:0;" class="form-control" size="20" readonly>
                        <textarea id="address_delivery_order_from" name="address_delivery_order_from" rows="3" style="border-radius:0;" class="form-control"></textarea>
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
                        <input type="hidden" id="id_delivery_order_to_duplicate" style="border-radius:0;" class="form-control" size="20" readonly>
                        <input type="hidden" id="id_delivery_order_to" name="id_delivery_order_to" style="border-radius:0;" class="form-control" size="20" readonly>
                        <input type="hidden" id="address_delivery_order_to_duplicate" style="border-radius:0;" class="form-control" size="20" readonly>
                        <textarea id="address_delivery_order_to" name="address_delivery_order_to" rows="3" style="border-radius:0;" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>