<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <div class="col-md-12 col-lg-5">
      <!-- CUSTOMER -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Customer</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myCustomerTrigger" data-toggle="modal" data-target="#myCustomer">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="customer_name" class="form-control" style="border-radius:0;" readonly value="<?= $header['customerCode'] . " - " . $header['customerName']; ?>" />
            <input id="customer_code" class="form-control" style="border-radius:0;" hidden value="<?= $header['customerCode']; ?>" />
            <input id="customer_id" class="form-control" style="border-radius:0;" hidden value="<?= $header['customer_RefID']; ?>" name="customer_id" />
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 col-lg-5">
      <!-- BENEFICIARY -->
      <div class="row">
        <label for="beneficiary_second_person_position" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Beneficiary</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myBeneficiarySecondTrigger" data-toggle="modal" data-target="#myBeneficiarySecond">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="beneficiary_second_person_name" class="form-control" style="border-radius:0;" readonly value="<?= $header['beneficiaryPosition'] . " - " . $header['beneficiaryName']; ?>" />
            <input id="beneficiary_second_person_position" class="form-control" style="border-radius:0;" hidden value="<?= $header['beneficiaryPosition']; ?>" />
            <input id="beneficiary_second_id" class="form-control" style="border-radius:0;" hidden value="<?= $header['beneficiary_RefID']; ?>" name="beneficiary_id" />
            <input id="beneficiary_second_person_ref_id" class="form-control" style="border-radius:0;" hidden name="person_refID" />
          </div>
        </div>
      </div>

      <!-- BANK NAME -->
      <div class="row" style="margin-top: 1rem;">
        <label for="bank_name_second_name" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myGetBankSecondTrigger" data-toggle="modal" data-target="#myGetBankSecond" class="myGetBankSecond">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="bank_name_second_name" class="form-control" style="border-radius:0;" readonly value="<?= $header['beneficiaryBankAcronym'] . " - " . $header['beneficiaryBankName']; ?>" />
            <input id="bank_name_second_detail" class="form-control" style="border-radius:0;" hidden value="<?= $header['beneficiaryBankName']; ?>" />
            <input id="bank_name_second_id" class="form-control" style="border-radius:0;" hidden value="<?= $header['beneficiaryBank_RefID']; ?>" name="bank_code" />
          </div>
        </div>
      </div>

      <!-- BANK ACCOUNT -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myBankAccountTrigger" data-toggle="modal" data-target="#myBankAccount" class="myBankAccount">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="bank_accounts" class="form-control" style="border-radius:0;" readonly value="<?= $header['beneficiaryBankAccountNumber'] . " - " . $header['beneficiaryBankAccountName']; ?>" />
            <input id="bank_accounts_detail" class="form-control" style="border-radius:0;" hidden value="<?= $header['beneficiaryBankAccountName']; ?>" />
            <input id="bank_accounts_id" class="form-control" style="border-radius:0;" hidden value="<?= $header['beneficiaryBankAccount_RefID']; ?>" name="bank_account_id" />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>