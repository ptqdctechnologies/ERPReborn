<div class="card-body">
  <div class="row pt-3" style="row-gap: 1rem; margin-bottom: 1rem;">
    <!-- ADVANCE NUMBER -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Advance Number</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="advance_number" style="border-radius:0;" name="advance_number" size="20" class="form-control" readonly>
            <input id="advance_id" style="border-radius:0;" name="advance_id" class="form-control" hidden>
            <input id="modal_advance_document_number" style="border-radius:0;" name="modal_advance_document_number" class="form-control" hidden>
          </div>
          <div class="input-group-append">
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myGetModalAdvanceTrigger" data-toggle="modal" data-target="#myGetModalAdvance">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myGetModalAdvanceTrigger">
              </a>
            </span>
          </div>
        </div>
      </div>
    </div>

    <!-- BENEFICIARY -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Beneficiary</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="beneficiary_name" style="border-radius:0;" name="beneficiary_name" size="24" class="form-control" readonly>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row pb-3" style="row-gap: 1rem;">
    <!-- BANK NAME -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="bank_name" style="border-radius:0;" name="bank_name" size="24" class="form-control" readonly>
          </div>
        </div>
      </div>
    </div>

    <!-- BANK ACCOUNT -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="bank_account" style="border-radius:0;" name="bank_account" size="24" class="form-control" readonly>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>