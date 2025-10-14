<!-- BODY -->
<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- LEFT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- TYPE -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Type
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input style="border-radius:0;" class="form-control" size="20" value="<?= $header['type']; ?>" readonly>
          </div>
        </div>
      </div>

      <!-- DO NUMBER -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          DO Number
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="do_number" style="border-radius:0;" class="form-control" size="20" value="<?= $header['doNumber']; ?>" readonly>
            <input id="do_id" style="border-radius:0;" name="do_id" class="form-control" value="<?= $header['doID']; ?>" hidden>
            <input id="do_detail_id" style="border-radius:0;" name="do_detail_id" class="form-control" value="<?= $header['doDetailID']; ?>" hidden>
          </div>
          <div class="input-group-append invisible">
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="referenceNumberTrigger" style="display: block;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="doNumberTrigger">
              </a>
            </span>
          </div>
        </div>
      </div>

      <!-- BUDGET -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Budget
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input style="border-radius:0;" class="form-control" size="20" value="<?= $header['combinedBudgetCode'] . ' - ' . $header['combinedBudgetName']; ?>" readonly>
          </div>
        </div>
      </div>

      <?php if ($header['type'] == "Stock Movement") { ?>
        <!-- REQUESTER -->
        <div class="row" >
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Requester
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <input style="border-radius:0;" class="form-control" size="20" value="<?= $header['requesterPosition'] . ' - ' . $header['requesterName']; ?>" readonly>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>

    <!-- RIGHT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <?php if ($header['type'] == "Stock Movement") { ?>
        <!-- STATUS -->
        <div class="row" style="margin-bottom: 1rem;">
          <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
            Status
          </label>
          <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
            <div>
              <input style="border-radius:0;" class="form-control" size="20" value="<?= $header['status']; ?>" readonly>
            </div>
          </div>
        </div>
      <?php } ?>

      <!-- DELIVERY FROM -->
      <div class="row" >
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Delivery From
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <textarea id="delivery_from" name="delivery_from" rows="3" style="border-radius:0;" class="form-control"><?= $header['deliveryFrom']; ?></textarea>
          </div>
        </div>
      </div>
      <div class="row" id="deliveryFromMessage" style="display: none; margin-top: .3rem;">
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
            <textarea id="delivery_to" name="delivery_to" rows="3" style="border-radius:0;" class="form-control"><?= $header['deliveryTo']; ?></textarea>
          </div>
        </div>
      </div>
      <div class="row" id="deliveryToMessage" style="display: none; margin-top: .3rem;">
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