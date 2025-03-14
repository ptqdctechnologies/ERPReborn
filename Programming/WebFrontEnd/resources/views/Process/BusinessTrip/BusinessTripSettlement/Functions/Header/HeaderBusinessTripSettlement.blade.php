<div class="card-body">
  <div class="row py-3" style="row-gap: 1rem;">
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bussines Trip Number</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="bussines_trip_number" style="border-radius:0;" name="bussines_trip_number" size="20" class="form-control" readonly>
          </div>
          <div class="input-group-append">
            <span style="border-radius:0;" class="input-group-text form-control">
              <a id="bussines_trip_number2" data-toggle="modal" data-target="#mySearchBrf" class="mySearchBrf"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Requester</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="requester_id" style="border-radius:0;" name="requester_id" type="hidden" class="form-control">
            <input id="requester_name" style="border-radius:0;" name="requester_name" type="text" size="20" class="form-control" readonly>
          </div>
          <div class="input-group-append d-none d-sm-none d-md-none d-lg-block invisible">
            <span style="border-radius:0;" class="input-group-text form-control">
              <a>
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>