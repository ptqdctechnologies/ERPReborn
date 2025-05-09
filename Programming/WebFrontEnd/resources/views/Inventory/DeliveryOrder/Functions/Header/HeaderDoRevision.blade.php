<!-- BODY -->
<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- LEFT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- DO NUMBER -->
      <div class="row">
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
            <textarea id="delivery_from" name="delivery_from" rows="3" style="border-radius:0;" class="form-control"><?= $header['deliveryFrom']; ?></textarea>
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
            <textarea id="delivery_to" name="delivery_to" rows="3" style="border-radius:0;" class="form-control"><?= $header['deliveryTo']; ?></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>