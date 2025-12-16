<div class="card-body">
  <div class="row py-3" style="gap: 1rem;">
    <!-- LEFT -->
    <div class="col-md-12 col-lg-5">
      <!-- LOAN TYPE -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Type</label>
        <div class="col-5 p-0">
          <div id="container_loan_type">
            <select id="loan_type" class="form-control" name="loan_type" style="border-radius:0;">
              <option value="select_loan_type" selected disabled>Select Loan Type</option>
              <option value="LENDING">Lending</option>
              <option value="BORROWING">Borrowing</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row" id="loan_type_message" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 p-0 text-red">
          Loan Type cannot be empty.
        </div>
      </div>

      <!-- CREDITOR -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Creditor</label>
        <div class="col-5 d-flex p-0">
          <div>
            <span id="creditor_trigger" class="input-group-text form-control" data-toggle="modal" data-target="#mySuppliers" onclick="chooseSupplierBy('creditor')" style="border-radius:0;cursor:pointer;">
              <i class="fas fa-gift"></i>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input type="hidden" id="creditor_id" class="form-control" name="creditor_id" style="border-radius:0;" />
              <input type="text" id="creditor_name" class="form-control" style="border-radius:0;background:white;" readonly />
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="creditor_message" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 p-0 text-red">
          Creditor cannot be empty.
        </div>
      </div>

      <!-- DEBITOR -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Debitor</label>
        <div class="col-5 d-flex p-0">
          <div>
            <span id="debitor_trigger" class="input-group-text form-control" data-toggle="modal" data-target="#mySuppliers" onclick="chooseSupplierBy('debitor')" style="border-radius:0;cursor:pointer;">
              <i class="fas fa-gift"></i>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input type="hidden" id="debitor_id" class="form-control" name="debitor_id" style="border-radius:0;" />
              <input type="text" id="debitor_name" class="form-control" style="border-radius:0;background:white;" readonly />
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="debitor_message" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 p-0 text-red">
          Debitor cannot be empty.
        </div>
      </div>

      <!-- CURRENCY -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Currency</label>
        <div class="col-5 d-flex p-0">
          <div>
            <span id="currency_trigger" class="input-group-text form-control" data-toggle="modal" data-target="#myCurrencies" style="border-radius:0;cursor:pointer;">
              <i class="fas fa-gift"></i>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input type="hidden" id="currency_id" class="form-control" name="currency_id" style="border-radius:0;" />
              <input type="text" id="currency_name" class="form-control" style="border-radius:0;background:white;" readonly />
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="currency_message" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 p-0 text-red">
          Currency cannot be empty.
        </div>
      </div>

      <!-- BANK NAME -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
        <div class="col-5 d-flex p-0">
          <div>
            <span id="bank_name_trigger" class="input-group-text form-control" data-toggle="modal" data-target="#myGetBankList" style="border-radius:0;cursor:pointer;">
              <i class="fas fa-gift"></i>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input type="hidden" id="bank_name_id" class="form-control" name="bank_name_id" style="border-radius:0;" />
              <input type="text" id="bank_name" class="form-control" style="border-radius:0;background:white;" readonly />
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="bank_name_message" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 p-0 text-red">
          Bank Name cannot be empty.
        </div>
      </div>

      <!-- ACCOUNT NUMBER -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account Number</label>
        <div class="col-5 d-flex p-0">
          <div>
            <span id="bank_account_trigger" class="input-group-text form-control" data-toggle="modal" data-target="#myBanksAccount" style="border-radius:0;cursor:pointer;">
              <i class="fas fa-gift"></i>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input type="hidden" id="bank_account_id" class="form-control" name="bank_account_id" style="border-radius:0;" />
              <input type="text" id="bank_account_name" class="form-control" style="border-radius:0;background:white;" readonly />
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="bank_account_message" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 p-0 text-red">
          Bank Account cannot be empty.
        </div>
      </div>
    </div>

    <!-- RIGHT -->
    <div class="col-md-12 col-lg-5">
      <!-- DATE OF DELIVERY -->
      <div class="row">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Date</label>
        <div class="col-5 p-0 input-group date" id="loanDate" data-target-input="nearest" style="flex-wrap: nowrap;">
          <div>
            <div class="input-group-append" data-target="#loanDate" data-toggle="datetimepicker" style="width: 27.78px; height: 21.8px;">
              <div class="input-group-text" style="border-radius: unset; justify-content: center; width: inherit;"><i class="fa fa-calendar"></i></div>
            </div>
          </div>
          <div style="flex: 100%;">
            <input type="text" class="form-control datetimepicker-input" name="loanDate" id="loanDate" data-target="#loanDate" autocomplete="off" style="border-radius: unset;" />
          </div>
        </div>
      </div>
      
      <!-- LOAN PRINCIPLE -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Principle</label>
        <div class="col-5 p-0">
          <input type="text" id="principle_loan" name="principle_loan" class="form-control number-without-characters" style="border-radius:0;" />
        </div>
      </div>
      <div class="row" id="principle_loan_message" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 p-0 text-red">
          Loan Principle cannot be empty.
        </div>
      </div>

      <!-- LENDING RATE -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Lending Rate</label>
        <div class="col-5 p-0">
          <input type="text" id="lending_rate" name="lending_rate" class="form-control number-without-characters" style="border-radius:0;" />
        </div>
      </div>
      <div class="row" id="lending_rate_message" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 p-0 text-red">
          Lending Rate cannot be empty.
        </div>
      </div>

      <!-- LOAN TOTAL -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Total</label>
        <div class="col-5 p-0">
          <input type="text" id="total_loan" name="total_loan" class="form-control number-without-characters" style="border-radius:0;" />
        </div>
      </div>
      <div class="row" id="total_loan_message" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 p-0 text-red">
          Loan Total cannot be empty.
        </div>
      </div>

      <!-- LOAN TERM -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Loan Term</label>
        <div class="col-5 p-0">
          <input type="text" id="loan_term" name="loan_term" class="form-control number-without-characters" style="border-radius:0;" />
        </div>
      </div>
      <div class="row" id="loan_term_message" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 p-0 text-red">
          Loan Term cannot be empty.
        </div>
      </div>

      <!-- COA -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">COA</label>
        <div class="col-5 d-flex p-0">
          <div>
            <span id="coa_trigger" class="input-group-text form-control" data-toggle="modal" data-target="#myGetChartOfAccount" style="border-radius:0;cursor:pointer;">
              <i class="fas fa-gift"></i>
            </span>
          </div>
          <div style="flex: 100%;">
            <div class="input-group">
              <input type="hidden" id="coa_id" class="form-control" name="coa_id" style="border-radius:0;" />
              <input type="text" id="coa_name" class="form-control" style="border-radius:0;background:white;" readonly />
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="coa_message" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 p-0 text-red">
          COA cannot be empty.
        </div>
      </div>

      <!-- REMARK -->
      <div class="row" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Remark</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
          <div>
            <div class="input-group">
              <textarea id="remark" cols="25" rows="4" class="form-control" name="remark" autocomplete="off"></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="row" id="remark_message" style="margin-top: .3rem; display: none;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
        <div class="col-5 p-0 text-red">
          Remark cannot be empty.
        </div>
      </div>
    </div>
  </div>
</div>