<div class="card-body">
  <div class="row py-3" style="gap: 1rem;">
    <div class="col-md-12 col-lg-4">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bussines Trip Number</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myBusinessTripSettlement" data-toggle="modal" data-target="#" style="display: block;">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myBusinessTripSettlement">
              </a>
              
              <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
              </div>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input type="text" class="form-control" id="brf_number" style="border-radius:0;">
              <input type="hidden" class="form-control" id="brf_id" style="border-radius:0;">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12 col-lg-4">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Requester</label>
        <div class="col-5 d-flex">
          <div style="flex: 100%;">
            <div class="input-group">
              <input type="text" class="form-control" id="requester_name" readonly style="border-radius:0;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>