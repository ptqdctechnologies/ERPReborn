<div class="card-body">
  <div class="row pt-3" style="row-gap: 1rem; margin-bottom: 1rem;">
    <!-- ADVANCE NUMBER -->
    <div class="col-md-12 col-lg-5">
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Advance Number</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="advance_number" style="border-radius:0;" size="24" class="form-control" value="<?= $advanceNumber; ?>" readonly>
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
            <input id="beneficiary_name" style="border-radius:0;" size="24" class="form-control" value="<?= $beneficiaryName; ?>" readonly>
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
            <input id="bank_name" style="border-radius:0;" size="24" class="form-control" value="<?= $bankName; ?>" readonly>
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
            <input id="bank_account" style="border-radius:0;" size="24" class="form-control" value="<?= $bankAccount; ?>" readonly>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>