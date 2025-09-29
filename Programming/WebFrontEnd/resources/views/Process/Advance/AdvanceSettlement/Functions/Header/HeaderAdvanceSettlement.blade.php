<!-- BODY -->
<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- LEFT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- ADVANCE NUMBER -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Advance Number
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div class="input-group-append">
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myGetModalAdvanceTrigger" data-toggle="modal" data-target="#myGetModalAdvance">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myGetModalAdvanceTrigger">
              </a>

              <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                <span class="sr-only">Loading...</span>
              </div>
            </span>
          </div>
          <div>
            <input id="advance_number" style="border-radius:0;" size="20" class="form-control" readonly />
            <input id="advance_id" style="border-radius:0;" class="form-control" hidden />
            <input id="modal_advance_document_number" style="border-radius:0;" class="form-control" hidden />
          </div>
        </div>
      </div>
      <div class="row" id="advanceNumberMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div class="text-red">
            Advance Number cannot be empty.
          </div>
        </div>
      </div>

      <!-- BUDGET -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Budget
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="budget_value" style="border-radius:0;" size="24" class="form-control" readonly />
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- BENEFICIARY -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Beneficiary
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="beneficiary_name" style="border-radius:0;" size="24" class="form-control" readonly />
          </div>
        </div>
      </div>

      <!-- BANK NAME -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Bank Name
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="bank_name" style="border-radius:0;" size="24" class="form-control" readonly />
          </div>
        </div>
      </div>

      <!-- BANK ACCOUNT -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Bank Account
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="bank_account" style="border-radius:0;" size="24" class="form-control" readonly />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>