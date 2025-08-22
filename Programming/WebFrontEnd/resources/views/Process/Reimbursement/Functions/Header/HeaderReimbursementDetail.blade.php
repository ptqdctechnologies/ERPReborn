<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <div class="col-md-12 col-lg-5">
      <!-- CUSTOMER -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Customer</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div style="width: 42%;">
            <input id="date_customer" name="date_customer" style="border-radius:0;width: 100%;" type="date" class="form-control" />
          </div>
        </div>
      </div>
      <div class="row" id="customerMessage" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div class="text-red">
            Customer cannot be empty.
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-12 col-lg-5">
      <!-- BENEFICIARY -->
      <div class="row">
        <label for="beneficiary_second_person_position" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Beneficiary</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="beneficiary_second_person_position" style="border-radius:0;" name="beneficiary_detail" class="form-control" size="17" readonly />
            <input id="beneficiary_second_id" style="border-radius:0;" name="beneficiary_id" class="form-control" hidden />
            <input id="beneficiary_second_person_ref_id" style="border-radius:0;" name="person_refID" class="form-control" hidden />
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myBeneficiarySecondTrigger" data-toggle="modal" data-target="#myBeneficiarySecond">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="beneficiary_second_person_name" style="border-radius:0;" name="beneficiary" class="form-control" readonly aria-label="Beneficiary Name" />
          </div>
        </div>
      </div>
      <div class="row" id="beneficiaryMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div class="text-red">
            Beneficiary cannot be empty.
          </div>
        </div>
      </div>

      <!-- BANK NAME -->
      <div class="row" style="margin-top: 1rem;">
        <label for="bank_name_second_name" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="bank_name_second_name" style="border-radius:0;" name="bank_name" class="form-control" size="17" readonly />
            <input id="bank_name_second_id" style="border-radius:0;" class="form-control" name="bank_code" hidden />
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myGetBankSecondTrigger" data-toggle="modal" data-target="#myGetBankSecond" class="myGetBankSecond">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="bank_name_second_detail" style="border-radius:0;" class="form-control" name="bank_name_detail" readonly aria-label="Bank Name" />
          </div>
        </div>
      </div>
      <div class="row" id="bankNameMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div class="text-red">
            Bank Name cannot be empty.
          </div>
        </div>
      </div>

      <!-- BANK ACCOUNT -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
        <div for="bank_accounts" class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <input id="bank_accounts" style="border-radius:0;" name="bank_account" class="form-control number-without-characters" size="17" autocomplete="off" readonly aria-label="Bank Accounts" />
            <input id="bank_accounts_id" style="border-radius:0;" class="form-control" name="bank_account_id" hidden />
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myBankAccountTrigger" data-toggle="modal" data-target="#myBankAccount" class="myBankAccount">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="bank_accounts_detail" style="border-radius:0;" class="form-control" name="bank_account_detail" autocomplete="off" readonly aria-label="Bank Accounts Name" />
          </div>
        </div>
      </div>
      <div class="row" id="bankAccountMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div class="text-red">
            Bank Account cannot be empty.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>