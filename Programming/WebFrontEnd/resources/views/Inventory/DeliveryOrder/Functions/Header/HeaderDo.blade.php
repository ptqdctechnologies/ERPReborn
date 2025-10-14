<!-- BODY -->
<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- LEFT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- REFERENCE TYPE -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Reference Type
        </label>
        <div class="col-sm-9 col-md-8 col-lg-4 d-flex p-0">
          <select id="reference_type" name="reference_type" class="form-control" onchange="referenceType(this);">
            <option disabled selected>Select a Source</option>
            <option value="0">Purchase Order</option>
            <option value="1">Internal Use</option>
            <option value="2">Stock Movement</option>
          </select>
        </div>
      </div>
      <div class="row" id="reference_type_message" style="display: none; margin-top: .3rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div class="text-red">
            Reference Type must be selected.
          </div>
        </div>
      </div>

      <!-- START OF PURCHASE ORDER TYPE -->
        <!-- PURCHASE ORDER -->
        <div class="row purchase-order-components" style="display: none;margin-top: 1rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            PO Number
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <span style="border-radius:0;" class="input-group-text form-control">
                <a href="javascript:;" id="purchase_order_trigger" data-toggle="modal" data-target="#mySearchPO" style="display: block;">
                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="purchase_order_trigger">
                </a>
              </span>
            </div>
            <div>
              <input id="purchase_order_number" style="border-radius:0;" class="form-control" size="20" readonly>
              <input id="purchase_order_id" style="border-radius:0;" name="purchase_order_id" class="form-control" hidden>
            </div>
          </div>
        </div>
        <div class="row" id="purchase_order_message" style="display: none; margin-top: .3rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div class="text-red">
              Purchase Order cannot be empty.
            </div>
          </div>
        </div>

        <!-- BUDGET -->
        <div class="row purchase-order-components" style="display: none; margin-top: 1rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Budget
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <input id="purchase_order_budget" class="form-control" style="border-radius:0;" size="24" readonly>
            </div>
          </div>
        </div>
      <!-- END OF PURCHASE ORDER TYPE -->

      <!-- START OF INTERNAL USE TYPE -->
        <!-- BUDGET -->
        <div class="row internal-use-components" style="display: none; margin-top: 1rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Budget Code
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <span style="border-radius:0;" class="input-group-text form-control">
                <a href="javascript:;" id="internal_use_budget_trigger" data-toggle="modal" data-target="#myProjectSecond" style="display: block;">
                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="internal_use_budget_trigger">
                </a>

                <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                  <span class="sr-only">Loading...</span>
                </div>
              </span>
            </div>
            <div>
              <input id="internal_use_budget_code" style="border-radius:0;" class="form-control" size="17" readonly>
              <input id="internal_use_budget_id" name="internal_use_budget_id" style="border-radius:0;" class="form-control" hidden>
            </div>
            <div style="flex: 100%;">
              <div class="input-group">
                <input id="internal_use_budget_name" style="border-radius:0;" class="form-control" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="internal_use_budget_message" style="display: none; margin-top: .3rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div class="text-red">
              Budget Code cannot be empty.
            </div>
          </div>
        </div>

        <!-- SUB BUDGET -->
        <div class="row internal-use-components" style="display: none; margin-top: 1rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Sub Budget Code
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <span style="border-radius:0;" class="input-group-text form-control">
                <a href="javascript:;" id="internal_use_site_trigger" data-toggle="modal" data-target="#mySiteCodeSecond">
                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="internal_use_site_trigger">
                </a>
              </span>
            </div>
            <div>
              <input id="internal_use_site_code" class="form-control" style="border-radius:0;" size="17" readonly>
              <input id="internal_use_site_id" class="form-control" name="internal_use_site_id" style="border-radius:0;" hidden>
            </div>
            <div style="flex: 100%;">
              <div class="input-group">
                <input id="internal_use_site_name" style="border-radius:0;" class="form-control" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="internal_use_site_message" style="display: none; margin-top: .3rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div class="text-red">
              Sub Budget Code cannot be empty.
            </div>
          </div>
        </div>
      <!-- END OF INTERNAL USE TYPE -->

      <!-- START OF STOCK MOVEMENT TYPE -->
        <!-- BUDGET -->
        <div class="row stock-movement-components" style="display: none; margin-top: 1rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Budget Code
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <span style="border-radius:0;" class="input-group-text form-control">
                <a href="javascript:;" id="stock_movement_budget_trigger" data-toggle="modal" data-target="#myProjectSecond" style="display: block;">
                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="stock_movement_budget_trigger">
                </a>

                <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                  <span class="sr-only">Loading...</span>
                </div>
              </span>
            </div>
            <div>
              <input id="stock_movement_budget_code" style="border-radius:0;" class="form-control" size="17" readonly>
              <input id="stock_movement_budget_id" name="stock_movement_budget_id" style="border-radius:0;" class="form-control" hidden>
            </div>
            <div style="flex: 100%;">
              <div class="input-group">
                <input id="stock_movement_budget_name" style="border-radius:0;" class="form-control" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="stock_movement_budget_message" style="display: none; margin-top: .3rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div class="text-red">
              Budget Code cannot be empty.
            </div>
          </div>
        </div>

        <!-- REQUESTER -->
        <div class="row stock-movement-components" style="display: none; margin-top: 1rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Requester
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <span style="border-radius:0;" class="input-group-text form-control">
                <a href="javascript:;" id="stock_movement_requester_trigger" data-toggle="modal" data-target="#myWorkerSecond">
                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="stock_movement_requester_trigger">
                </a>
              </span>
            </div>
            <div>
              <input id="stock_movement_requester_position" style="border-radius:0;" class="form-control" size="17" readonly>
              <input id="stock_movement_requester_id" style="border-radius:0;" name="stock_movement_requester_id" class="form-control" hidden>
            </div>
            <div style="flex: 100%;">
              <div class="input-group">
                <input id="stock_movement_requester_name" style="border-radius:0;" class="form-control" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="stock_movement_requester_message" style="display: none; margin-top: .3rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div class="text-red">
              Requester cannot be empty.
            </div>
          </div>
        </div>
      <!-- END OF STOCK MOVEMENT TYPE -->
    </div>

    <!-- RIGHT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- START OF PURCHASE ORDER TYPE -->
        <!-- BLANK SPACE -->
        <div class="row purchase-order-components" style="margin-bottom: 1rem; display: none; visibility: hidden;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-4 d-flex p-0"><select class="form-control"></select></div>
        </div>

        <!-- DELIVERY FROM -->
        <div class="row purchase-order-components" style="display: none;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Delivery From
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <input hidden id="purchase_order_delivery_from_id_duplicate">
              <input hidden name="purchase_order_delivery_from_id" id="purchase_order_delivery_from_id">
              <input hidden id="purchase_order_delivery_from_duplicate">
              <textarea id="purchase_order_delivery_from" name="purchase_order_delivery_from" rows="3" style="border-radius:0;" class="form-control" disabled></textarea>
            </div>
          </div>
        </div>
        <div class="row" id="purchase_order_delivery_from_message" style="margin-top: .3rem;display: none;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div class="text-red">
              Delivery From cannot be empty.
            </div>
          </div>
        </div>

        <!-- DELIVERY TO -->
        <div class="row purchase-order-components" style="margin-top: 1rem; display: none;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Delivery To
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <input hidden id="purchase_order_delivery_to_id_duplicate">
              <input hidden name="purchase_order_delivery_to_id" id="purchase_order_delivery_to_id">
              <input hidden id="purchase_order_delivery_to_duplicate">
              <textarea id="purchase_order_delivery_to" name="purchase_order_delivery_to" rows="3" style="border-radius:0;" class="form-control" disabled></textarea>
            </div>
          </div>
        </div>
        <div class="row" id="purchase_order_delivery_to_message" style="margin-top: .3rem;display: none;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div class="text-red">
              Delivery To cannot be empty.
            </div>
          </div>
        </div>
      <!-- END OF PURCHASE ORDER TYPE -->

      <!-- START OF INTERNAL USE TYPE -->
        <!-- BLANK SPACE -->
        <div class="row internal-use-components" style="margin-bottom: 1rem; display: none; visibility: hidden;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-4 d-flex p-0"><select class="form-control"></select></div>
        </div>

        <!-- DELIVERY FROM -->
        <div class="row internal-use-components" style="display: none;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Delivery From
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <span style="border-radius:0;" class="input-group-text form-control" onclick="deliveryTypeTrigger('from_internal_use')">
                <a href="javascript:;" id="internal_use_delivery_from_trigger" data-toggle="modal" data-target="#myGetModalWarehouses">
                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="internal_use_delivery_from_trigger">
                </a>
              </span>
            </div>
            <div>
              <input id="internal_use_delivery_from_name" class="form-control" style="border-radius:0;" name="internal_use_delivery_from_name" size="17" readonly>
              <input id="internal_use_delivery_from_id" class="form-control" style="border-radius:0;" name="internal_use_delivery_from_id" hidden>
            </div>
            <div style="flex: 100%;">
              <div class="input-group">
                <input id="internal_use_delivery_from_address" class="form-control" style="border-radius:0;" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="internal_use_delivery_from_message" style="display: none; margin-top: .3rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div class="text-red">
              Delivery From cannot be empty.
            </div>
          </div>
        </div>

        <!-- DELIVERY TO -->
        <div class="row internal-use-components" style="margin-top: 1rem; display: none;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Delivery To
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <span style="border-radius:0;" class="input-group-text form-control" onclick="deliveryTypeTrigger('to_internal_use')">
                <a href="javascript:;" id="internal_use_delivery_to_trigger" data-toggle="modal" data-target="#myGetModalWarehouses">
                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="internal_use_delivery_to_trigger">
                </a>
              </span>
            </div>
            <div>
              <input id="internal_use_delivery_to_name" class="form-control" style="border-radius:0;" name="internal_use_delivery_to_name" size="17" readonly>
              <input id="internal_use_delivery_to_id" class="form-control" style="border-radius:0;" name="internal_use_delivery_to_id" hidden>
            </div>
            <div style="flex: 100%;">
              <div class="input-group">
                <input id="internal_use_delivery_to_address" class="form-control" style="border-radius:0;" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="internal_use_delivery_to_message" style="display: none; margin-top: .3rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div class="text-red">
              Delivery To cannot be empty.
            </div>
          </div>
        </div>
      <!-- END OF INTERNAL USE TYPE -->

      <!-- START OF STOCK MOVEMENT TYPE -->
        <!-- STATUS -->
        <div class="row stock-movement-components" style="display: none;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Status
          </label>
          <div class="col-sm-9 col-md-8 col-lg-4 d-flex p-0">
            <select id="stock_movement_status" name="stock_movement_status" class="form-control" onchange="stockMovementStatusValue(this);">
              <option disabled selected value="">Select a Type</option>
              <option value="0">Rent</option>
              <option value="1">Permanent</option>
            </select>
          </div>
        </div>
        <div class="row" id="stock_movement_status_message" style="display: none; margin-top: .3rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div class="text-red">
              Status must be selected.
            </div>
          </div>
        </div>

        <!-- DELIVERY FROM -->
        <div class="row stock-movement-components" style="margin-top: 1rem; display: none;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Delivery From
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <span style="border-radius:0;" class="input-group-text form-control" onclick="deliveryTypeTrigger('from_stock_movement')">
                <a href="javascript:;" id="stock_movement_delivery_from_trigger" data-toggle="modal" data-target="#myGetModalWarehouses">
                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="stock_movement_delivery_from_trigger">
                </a>
              </span>
            </div>
            <div>
              <input id="stock_movement_delivery_from_name" style="border-radius:0;" name="stock_movement_delivery_from_name" class="form-control" size="17" readonly>
              <input id="stock_movement_delivery_from_id" style="border-radius:0;" name="stock_movement_delivery_from_id" class="form-control" hidden>
            </div>
            <div style="flex: 100%;">
              <div class="input-group">
                <input id="stock_movement_delivery_from_address" style="border-radius:0;" class="form-control" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="stock_movement_delivery_from_message" style="display: none; margin-top: .3rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div class="text-red">
              Delivery From cannot be empty.
            </div>
          </div>
        </div>

        <!-- DELIVERY TO -->
        <div class="row stock-movement-components" style="margin-top: 1rem; display: none;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Delivery To
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <span style="border-radius:0;" class="input-group-text form-control" onclick="deliveryTypeTrigger('to_stock_movement')">
                <a href="javascript:;" id="stock_movement_delivery_to_trigger" data-toggle="modal" data-target="#myGetModalWarehouses">
                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="stock_movement_delivery_to_trigger">
                </a>
              </span>
            </div>
            <div>
              <input id="stock_movement_delivery_to_name" name="stock_movement_delivery_to_name" class="form-control" style="border-radius:0;" size="17" readonly>
              <input id="stock_movement_delivery_to_id" name="stock_movement_delivery_to_id" class="form-control" style="border-radius:0;" hidden>
            </div>
            <div style="flex: 100%;">
              <div class="input-group">
                <input id="stock_movement_delivery_to_address" class="form-control" style="border-radius:0;" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="row" id="stock_movement_delivery_to_message" style="display: none; margin-top: .3rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div class="text-red">
              Delivery To cannot be empty.
            </div>
          </div>
        </div>
      <!-- END OF STOCK MOVEMENT TYPE -->
    </div>
  </div>
</div>