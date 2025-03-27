<!-- BODY -->
<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Reference Number
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="reference_number" style="border-radius:0;" name="reference_number" class="form-control" size="20" readonly>
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
    </div>
  </div>
</div>