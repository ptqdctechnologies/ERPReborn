<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <div class="col-md-12 col-lg-5">
      <!-- REQUESTER -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Requester</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="requester_popup" data-toggle="modal" data-target="#myWorker" class="myWorker">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input type="hidden" class="form-control" id="requester_detail" name="requester_detail" style="border-radius:0;" readonly value="<?= $requester['position']; ?>" />
            <input type="text" class="form-control" id="requester" name="requester" style="border-radius:0;" readonly value="<?= $requester['position'] ?? ''; ?> - <?= $requester['name'] ?? ''; ?>" />
            <input type="hidden" class="form-control" id="requester_id" name="requester_id" style="border-radius:0;" readonly value="<?= $requester['id']; ?>" />
          </div>
        </div>
      </div>

      <!-- CONTACT PHONE -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Contact Phone</label>
        <div class="col-5">
          <div style="flex: 100%;">
            <input type="text" class="form-control" id="contactPhone" name="contactPhone" style="border-radius:0;" disabled value="<?= $requester['contact']; ?>" />
          </div>
        </div>
      </div>

      <!-- DATE COMMANCE TRAVEL -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date Commence Travel</label>
        <div class="col-5">
          <div style="flex: 100%;">
            <input id="dateCommance" name="dateCommance" style="border-radius:0;" type="date" class="form-control" value="<?= $dateTravel['commence']; ?>">
          </div>
        </div>
      </div>
      <div class="row" id="dateCommenceTravelMessage" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5">
          <div class="text-red">
            Date Commence Travel cannot be empty.
          </div>
        </div>
      </div>

      <!-- DATE END TRAVEL -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date End Travel</label>
        <div class="col-5">
          <div style="flex: 100%;">
            <input id="dateEnd" name="dateEnd" style="border-radius:0;" type="date" class="form-control" value="<?= $dateTravel['end']; ?>" />
          </div>
        </div>
      </div>
      <div class="row" id="dateEndTravelMessage" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5">
          <div class="text-red">
            Date End Travel cannot be empty.
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-lg-5">
      <!-- DEPARTING FROM -->
      <div class="row" style="margin-bottom: 1rem;">
        <label for="departingFrom" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Departing From</label>
        <div class="col-5">
          <div style="flex: 100%;">
            <input id="departingFrom" name="departingFrom" style="border-radius:0;" type="text" class="form-control" autocomplete="off" value="<?= $departing['from']; ?>" />
          </div>
        </div>
      </div>
      <div class="row" id="departingFromMessage" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5">
          <div class="text-red">
            Departing From cannot be empty.
          </div>
        </div>
      </div>

      <!-- DESTINATION TO -->
      <div class="row" style="margin-bottom: 1rem;">
        <label for="destinationTo" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Departing From</label>
        <div class="col-5">
          <div style="flex: 100%;">
            <input id="destinationTo" name="destinationTo" style="border-radius:0;" type="text" class="form-control" autocomplete="off" value="<?= $departing['to']; ?>" />
          </div>
        </div>
      </div>
      <div class="row" id="destinationToMessage" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div class="text-red">
            Destination To cannot be empty.
          </div>
        </div>
      </div>
      
      <!-- REASON TO TRAVEL -->
      <div class="row" style="margin-top: 1rem;">
        <label for="reasonTravel" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Reason To Travel</label>
        <div class="col-5">
          <div style="flex: 100%;">
            <textarea id="reasonTravel" name="reasonTravel" style="border-radius:0;" cols="30" rows="3" class="form-control"><?= $reason; ?></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>