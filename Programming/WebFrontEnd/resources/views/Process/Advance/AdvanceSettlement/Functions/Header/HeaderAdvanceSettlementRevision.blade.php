<!-- BODY -->
<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <!-- LEFT COLUMN -->
    <div class="col-md-12 col-lg-5">
      <!-- ADVANCE NUMBER -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Advance Number
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="advance_number" style="border-radius:0;" size="24" class="form-control" value="<?= $advanceNumber; ?>" readonly />
          </div>
        </div>
      </div>

      <!-- BUDGET -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
          Budget
        </label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="budget_value" style="border-radius:0;" size="24" class="form-control" value="<?= $budget; ?>" readonly />
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
            <input id="beneficiary_name" style="border-radius:0;" size="24" class="form-control" value="<?= $beneficiaryName; ?>" readonly />
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
            <input id="bank_name" style="border-radius:0;" size="24" class="form-control" value="<?= $bankName; ?>" readonly />
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
            <input id="bank_account" style="border-radius:0;" size="24" class="form-control" value="<?= $bankAccount; ?>" readonly />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>