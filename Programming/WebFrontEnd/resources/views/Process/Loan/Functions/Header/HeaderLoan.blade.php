<div class="card-body">
  <div class="row py-3" style="gap: 1rem;">
    <!-- KOLOM KIRI -->
    <div class="col-md-12 col-lg-5">
      <!-- Loan Type -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Type</label>
        <div class="col-5 d-flex">
          <select id="loanType" name="loanType" class="form-control" style="border-radius:0;">
            <option value="">-- Select Loan Type --</option>
            <option value="lender">Lender</option>
            <option value="borrower">Borrower</option>
          </select>
        </div>
      </div>
      
      <!-- Creditor -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Creditor</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" data-toggle="modal" data-target="#mySupplier" 
                class="mySupplier" data-type="creditor">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="" />
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
              <input id="creditor_id" name="creditor_id" style="border-radius:0;" class="form-control" readonly hidden>
              <input id="creditor_code" style="border-radius:0;" class="form-control" readonly>
              <input id="creditor_name" style="border-radius:0;" class="form-control" readonly hidden>
          </div>
        </div>
      </div>

      <!-- Debitor -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Debitor</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" data-toggle="modal" data-target="#mySupplier" 
                class="mySupplier" data-type="debitor">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="" />
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
              <input id="debitor_id" name="debitor_id" style="border-radius:0;" class="form-control" readonly hidden>
              <input id="debitor_code" style="border-radius:0;" class="form-control" readonly>
              <input id="debitor_name" style="border-radius:0;" class="form-control" readonly hidden>
          </div>
        </div>
      </div>

      <!-- Currency -->
      <div class="row" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Currency</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="tes2Trigger" data-toggle="modal" data-target="#myCurrency" class="myCurrency">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="" />
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="deliver_RefID" name="deliver_RefID" style="border-radius:0;" class="form-control" readonly hidden>
            <input id="deliverCode" style="border-radius:0;" class="form-control" readonly>
            <input id="deliverName" style="border-radius:0;" class="form-control" readonly hidden>
          </div>
        </div>
      </div>


      <!-- Bank Name -->
       <div class="row" style="margin-bottom: 1rem;">
        <label for="bank_name_second_name" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
        <div class="col-5 d-flex">
        <div>
          <span style="border-radius:0;" class="input-group-text form-control">
            <a href="javascript:;" id="bank_list_popup_vendor" data-toggle="modal" data-target="#myGetBankList" class="myGetBankList">
              <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
            </a>
          </span>
        </div>                 
        <div style="flex: 100%;">
          <input id="bank_list_name" style="border-radius:0;" class="form-control" readonly />
          <input id="bank_list_code" name="vendor_bank_name" style="border-radius:0;" class="form-control" hidden />
          <input id="bank_list_detail" style="border-radius:0;" class="form-control" readonly hidden/>
        </div>
        </div>
      </div>

      <!-- Bank Account -->
       <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
        <div class="col-5 d-flex">
          <div>
            
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="myBankAccountTrigger" data-toggle="modal" data-target="#myBankAccount" class="myBankAccount">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div>
          <div style="flex: 100%;">
            <input id="bank_accounts" style="border-radius:0;" name="bank_account" class="form-control" readonly/>
            <input id="bank_accounts_id" style="border-radius:0;" class="form-control" name="bank_account_id" hidden>
            <input id="bank_accounts_detail" style="border-radius:0;" class="form-control" readonly hidden />
          </div>
        </div>
      </div>
    </div>

    <!-- KOLOM KANAN -->
    <div class="col-md-12 col-lg-5">
    
      <!-- Principle Loan -->
      <div class="row">
        <label for="principle_loan" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Principle Loan</label>
        <div class="col-5 d-flex">
          <input id="principle_loan" name="principle_loan" class="form-control" style="border-radius:0;">
        </div>
      </div>

      <!-- Landing Rate -->
      <div class="row" style="margin-top: 1rem;">
        <label for="landing_rate" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Landing Rate</label>
        <div class="col-5 d-flex">
          <input id="landing_rate" name="landing_rate" type="text" class="form-control" style="border-radius:0;">
        </div>
      </div>

      <!-- Total Loan -->
      <div class="row" style="margin-top: 1rem;">
        <label for="total_loan" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Total Loan</label>
        <div class="col-5 d-flex">
          <input id="total_loan" name="total_loan" type="text" class="form-control" style="border-radius:0;">
        </div>
      </div>

      <!-- Loan Term -->
      <div class="row" style="margin-top: 1rem;">
        <label for="loan_term" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Term</label>
        <div class="col-5 d-flex">
          <input id="loan_term" name="loan_term" type="text" class="form-control" style="border-radius:0;">
        </div>
      </div>

      <!-- COA -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">COA</label>
        <div class="col-5 d-flex">
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="javascript:;" id="" data-toggle="modal" data-target="#myGetChartOfAccount" class="myGetChartOfAccount">
                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
              </a>
            </span>
          </div> 
          <div style="flex: 100%;">
            <input id="coa_RefID" name="coa_RefID" style="border-radius:0;" class="form-control" readonly hidden>
            <input id="coaCode" style="border-radius:0;" class="form-control" readonly>
            <input id="coaName" style="border-radius:0;" class="form-control" name="bank_account_detail" autocomplete="off" readonly aria-label="Bank Accounts Name" hidden>
          </div>
        </div>
      </div>

      <!-- Remark -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Remark</label>
        <div class="col-5 d-flex">
          <div style="flex: 100%;">
            <textarea id="notes" name="notes" rows="3" style="border-radius:0;" class="form-control"></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>