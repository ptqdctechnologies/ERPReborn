<div class="card-body">
  <div class="row py-3" style="gap: 15px;">
    <div class="col-md-12 col-lg-5">
      <!-- CUSTOMER -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Customer</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myCustomerTrigger" data-toggle="modal" data-target="#myCustomer">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="customer_name" class="form-control" style="border-radius:0;background-color:white;" readonly />
            <input id="customer_code" class="form-control" style="border-radius:0;" hidden />
            <input id="customer_id" name="customer_id" class="form-control" style="border-radius:0;" hidden />
          </div>
        </div>
      </div>
      <div class="row" id="customerMessage" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 d-flex">
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
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myBeneficiarySecondTrigger" data-toggle="modal" data-target="#myBeneficiaries">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="beneficiary_second_person_name" style="border-radius:0;background-color:white;" class="form-control" readonly />
            <input id="beneficiary_second_person_position" style="border-radius:0;" class="form-control" hidden />
            <input id="beneficiary_second_id" style="border-radius:0;" name="beneficiary_id" class="form-control" hidden />
            <input id="beneficiary_second_person_ref_id" style="border-radius:0;" name="person_refID" class="form-control" hidden />
          </div>
        </div>
      </div>
      <div class="row" id="beneficiaryMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 d-flex">
          <div class="text-red">
            Beneficiary cannot be empty.
          </div>
        </div>
      </div>

      <!-- BANK NAME -->
      <div class="row" style="margin-top: 1rem;">
        <label for="bank_name_second_name" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myGetBankSecondTrigger" data-toggle="modal" data-target="#myBanks">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="bank_name_second_detail" style="border-radius:0; background-color: white;" class="form-control" readonly />
            <input id="bank_name_second_name" style="border-radius:0;" class="form-control" hidden />
            <input id="bank_name_second_id" style="border-radius:0;" class="form-control" name="bank_code" hidden />
          </div>
        </div>
      </div>
      <div class="row" id="bankNameMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 d-flex">
          <div class="text-red">
            Bank Name cannot be empty.
          </div>
        </div>
      </div>

      <!-- BANK ACCOUNT -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myBankAccountTrigger" data-toggle="modal" data-target="#myBanksAccount" class="myBankAccount">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="bank_accounts_detail" style="border-radius:0; background-color: white;" class="form-control" autocomplete="off" readonly />
            <input id="bank_accounts" style="border-radius:0;" class="form-control number-without-characters" autocomplete="off" hidden />
            <input id="bank_accounts_id" style="border-radius:0;" class="form-control" name="bank_account_id" hidden />
          </div>
        </div>
      </div>
      <div class="row" id="bankAccountMessage" style="margin-top: .3rem;display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 d-flex">
          <div class="text-red">
            Bank Account cannot be empty.
          </div>
        </div>
      </div>
    </div>
  </div>
</div>