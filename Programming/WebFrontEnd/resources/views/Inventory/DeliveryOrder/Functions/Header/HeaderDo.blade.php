<!-- BODY -->
<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- LEFT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- REFERENCE TYPE -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Reference Type
        </label>
        <div class="col-sm-9 col-md-8 col-lg-4 d-flex p-0">
          <select class="form-control" onchange="referenceType(this);">
            <option disabled selected>Select a Source</option>
            <option value="PURCHASE_ORDER">Purchase Order</option>
            <option value="INTERNAL_USE">Internal Use</option>
            <option value="STOCK_MOVEMENT">Stock Movement</option>
          </select>
        </div>
      </div>

      <!-- PURCHASE ORDER -->
      <div class="row purchase-order-components" style="display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          PO Number
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="reference_number" style="border-radius:0;" class="form-control" size="20" readonly>
            <input id="reference_id" style="border-radius:0;" name="reference_id" class="form-control" hidden>
          </div>
          <div class="input-group-append">
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="referenceNumberTrigger" data-toggle="modal" data-target="#referenceNumberModal" style="display: block;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="referenceNumberTrigger">
              </a>
            </span>
          </div>
        </div>
      </div>

      <!-- BUDGET -->
      <div class="row internal-use-components" style="display: none; margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Budget Code
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="project_code_second" style="border-radius:0;" class="form-control" size="17" readonly>
            <input id="project_id_second" name="project_id_second" style="border-radius:0;" class="form-control" hidden>
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myProjectSecondTrigger" data-toggle="modal" data-target="#myProjectSecond" style="display: block;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myProjectSecondTrigger">
              </a>

              <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
              </div>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="project_name_second" style="border-radius:0;" class="form-control" readonly>
            </div>
          </div>
        </div>
      </div>

      <!-- SUB BUDGET -->
      <div class="row internal-use-components" style="display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Sub Budget Code
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="site_code_second" style="border-radius:0;" class="form-control" size="17" readonly>
            <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden>
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySiteCodeSecond">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="site_name_second" style="border-radius:0;" class="form-control" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- ============= PURCHASE ORDER ============= -->
      <div class="row purchase-order-components" style="margin-bottom: 1rem; display: none; visibility: hidden;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-4 d-flex p-0"><select class="form-control"></select></div>
      </div>

      <!-- DELIVERY FROM -->
      <div class="row purchase-order-components" style="margin-bottom: 1rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Delivery From
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <textarea id="delivery_from" name="delivery_from" rows="3" style="border-radius:0;" class="form-control"></textarea>
          </div>
        </div>
      </div>

      <!-- DELIVERY TO -->
      <div class="row purchase-order-components" style="display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Delivery To
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <textarea id="delivery_to" name="delivery_to" rows="3" style="border-radius:0;" class="form-control"></textarea>
          </div>
        </div>
      </div>

      <!-- ============= INTERNAL USE ============= -->
      <div class="row internal-use-components" style="margin-bottom: 1rem; display: none; visibility: hidden;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-4 d-flex p-0"><select class="form-control"></select></div>
      </div>

      <!-- DELIVERY FROM -->
      <div class="row internal-use-components" style="margin-bottom: 1rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Delivery From
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="site_code_second" style="border-radius:0;" class="form-control" size="17" readonly>
            <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden>
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySiteCodeSecond">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="site_name_second" style="border-radius:0;" class="form-control" readonly>
            </div>
          </div>
        </div>
      </div>

      <!-- DELIVERY TO -->
      <div class="row internal-use-components" style="display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Delivery To
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="site_code_second" style="border-radius:0;" class="form-control" size="17" readonly>
            <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden>
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySiteCodeSecond">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="site_name_second" style="border-radius:0;" class="form-control" readonly>
            </div>
          </div>
        </div>
      </div>

      <!-- ============= STOCK MOVEMENT ============= -->
      <!-- DELIVERY FROM -->
      <div class="row stock-movement-components" style="margin-bottom: 1rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Delivery From
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="site_code_second" style="border-radius:0;" class="form-control" size="17" readonly>
            <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden>
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySiteCodeSecond">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="site_name_second" style="border-radius:0;" class="form-control" readonly>
            </div>
          </div>
        </div>
      </div>

      <!-- DELIVERY TO -->
      <div class="row stock-movement-components" style="display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Delivery To
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="site_code_second" style="border-radius:0;" class="form-control" size="17" readonly>
            <input id="site_id_second" style="border-radius:0;" name="site_id_second" class="form-control" hidden>
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="mySiteCodeSecondTrigger" data-toggle="modal" data-target="#mySiteCodeSecond">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySiteCodeSecondTrigger">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input id="site_name_second" style="border-radius:0;" class="form-control" readonly>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>