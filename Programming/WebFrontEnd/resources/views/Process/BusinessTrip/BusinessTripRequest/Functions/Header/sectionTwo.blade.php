<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Requester</label>
                <div class="col-5 d-flex">
                    <div>
                        <span id="myRequestersTrigger" class="input-group-text form-control" data-toggle="modal"
                            data-target="#myRequesters" style="border-radius:0; cursor: pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input type="text" id="requester_name" class="form-control"
                            value="<?= isset($requester) ? $requester['position'] . ' - ' . $requester['name'] : ''; ?>"
                            style="border-radius:0; background-color: <?= isset($requester) ? '' : 'white' ?>;"
                            readonly />
                        <input type="hidden" id="requester_id" name="requester_id"
                            value="<?= isset($requester) ? $requester['id'] : ''; ?>" />
                    </div>
                </div>
            </div>
            <div class="row" id="requesterMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col-5 d-flex">
                    <div class="text-red">
                        Requester cannot be empty.
                    </div>
                </div>
            </div>

            <!-- CONTACT PHONE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Contact Phone</label>
                <div class="col-5 d-flex">
                    <div>
                        <input type="text" class="form-control" id="contactPhone"
                            value="<?= isset($requester) ? $requester['contact'] : ''; ?>" style="border-radius:0;"
                            disabled />
                    </div>
                </div>
            </div>

            <!-- DATE COMMANCE TRAVEL -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Date Commence Travel</label>
                <div class="col-5 d-flex">
                    <div>
                        <input type="date" class="form-control" id="dateCommance" name="dateCommance"
                            value="<?= isset($dateCommanceTravel) ? date('Y-m-d', strtotime($dateCommanceTravel)) : ''; ?>"
                            style="border-radius:0;" />
                    </div>
                </div>
            </div>
            <div class="row" id="dateCommenceTravelMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col-7 text-red">
                    Date Commence Travel cannot be empty.
                </div>
            </div>

            <!-- DATE END TRAVEL -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Date End Travel</label>
                <div class="col-5 d-flex">
                    <div>
                        <input type="date" class="form-control" id="dateEnd" name="dateEnd"
                            value="<?= isset($dateEndTravel) ? date('Y-m-d', strtotime($dateEndTravel)) : ''; ?>"
                            style="border-radius:0;" />
                    </div>
                </div>
            </div>
            <div class="row" id="dateEndTravelMessage" style="margin-top: .3rem; margin-bottom: 1rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col-7 text-red">
                    Date End Travel cannot be empty.
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- DEPARTING FROM -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Departing From</label>
                <div class="col-5 d-flex">
                    <input type="text" class="form-control" id="departingFrom" name="departingFrom"
                        value="<?= isset($departingFrom) ? $departingFrom : ''; ?>" style="border-radius:0;"
                        autocomplete="off" />
                </div>
            </div>
            <div class="row" id="departingFromMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col-7 text-red">
                    Departing From cannot be empty.
                </div>
            </div>

            <!-- DESTINATION TO -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Destination To</label>
                <div class="col-5 d-flex">
                    <input type="text" class="form-control" id="destinationTo" name="destinationTo"
                        value="<?= isset($destinationTo) ? $destinationTo : ''; ?>" style="border-radius:0;"
                        autocomplete="off">
                </div>
            </div>
            <div class="row" id="destinationToMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col-7 text-red">
                    Destination To cannot be empty.
                </div>
            </div>

            <!-- REASON TO TRAVEL -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Reason To Travel</label>
                <div class="col-5 d-flex">
                    <textarea cols="30" rows="3" class="form-control" id="reasonTravel" style="border-radius:0;"
                        name="reasonTravel"><?= isset($reasonTravel) ? $reasonTravel : ''; ?></textarea>
                </div>
            </div>
            <div class="row" id="reasonToTravelMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col-7 text-red">
                    Reason to Travel cannot be empty.
                </div>
            </div>
        </div>
    </div>
</div>