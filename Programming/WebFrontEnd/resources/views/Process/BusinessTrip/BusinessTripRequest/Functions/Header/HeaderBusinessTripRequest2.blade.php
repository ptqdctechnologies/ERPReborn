<div class="card-body">
    <div class="row pt-3 pb-3" style="gap: 15px;">
        <div class="col-md-12 col-lg-5">
            <!-- REQUESTER -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Requester</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="requester_popup" data-toggle="modal" data-target="#myRequesters">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input id="requester" class="form-control" style="border-radius:0; background: #fff;" readonly>
                        <input id="requester_detail" class="form-control" style="border-radius:0;" hidden>
                        <input id="requester_id" class="form-control" style="border-radius:0;" name="requester_id" hidden>
                    </div>
                </div>
            </div>
            <div class="row" id="requesterMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-5 d-flex">
                    <div class="text-red">
                        Requester cannot be empty.
                    </div>
                </div>
            </div>

            <!-- CONTACT PHONE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Contact Phone</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input id="contactPhone" style="border-radius:0;" type="text" class="form-control" disabled>
                    </div>
                </div>
            </div>

            <!-- DATE COMMANCE TRAVEL -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date Commence Travel</label>
                <div class="col-5 d-flex">
                    <div class="input-group" style="width: 95px;">
                        <input id="dateCommance" name="dateCommance" style="border-radius:0;" type="date" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row" id="dateCommenceTravelMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-7 text-red">
                    Date Commence Travel cannot be empty.
                </div>
            </div>

            <!-- DATE END TRAVEL -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date End Travel</label>
                <div class="col-5 d-flex">
                    <div class="input-group" style="width: 95px;">
                        <input id="dateEnd" name="dateEnd" style="border-radius:0;" type="date" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row" id="dateEndTravelMessage" style="margin-top: .3rem; margin-bottom: 1rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-7 text-red">
                    Date End Travel cannot be empty.
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-5">
            <!-- DEPARTING FROM -->
            <div class="row">
                <label for="departingFrom" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Departing From</label>
                <div class="col-5 d-flex">
                    <input type="text" id="departingFrom" class="form-control" name="departingFrom" style="border-radius:0;" autocomplete="off">
                </div>
            </div>
            <div class="row" id="departingFromMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-7 text-red">
                    Departing From cannot be empty.
                </div>
            </div>

            <!-- DESTINATION TO -->
            <div class="row" style="margin-top: 1rem;">
                <label for="destinationTo" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Destination To</label>
                <div class="col-5 d-flex">
                    <input type="text" id="destinationTo" class="form-control" name="destinationTo" style="border-radius:0;" autocomplete="off">
                </div>
            </div>
            <div class="row" id="destinationToMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-5 d-flex">
                    <div class="text-red">
                        Destination To cannot be empty.
                    </div>
                </div>
            </div>

            <!-- REASON TO TRAVEL -->
            <div class="row" style="margin-top: 1rem;">
                <label for="reasonTravel" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Reason To Travel</label>
                <div class="col-5 d-flex">
                    <textarea class="form-control" id="reasonTravel" style="border-radius:0;" cols="30" rows="3" name="reasonTravel"></textarea>
                </div>
            </div>
            <div class="row" id="reasonToTravelMessage" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-6 text-red">
                    Reason to Travel cannot be empty.
                </div>
            </div>
        </div>
    </div>
</div>