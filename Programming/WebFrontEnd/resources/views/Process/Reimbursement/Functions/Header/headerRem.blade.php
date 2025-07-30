<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <table>
          
          <tr>
            <td><label>Requester Name</label></td>
            <td>
              <div class="input-group">
                <input name="var_request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#"><i id="request_name2" data-toggle="modal" data-target="#myRequester" class="fas fa-gift" style="color:grey;"></i></a>
                  </span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td><label>Name Of Beneficiary</label></td>
            <td>
              <div class="input-group">
                <input name="var_beneficiary" id="beneficiary" style="border-radius:0;" type="text" class="form-control">
              </div>
            </td>
          </tr>
          <tr>
            <td><Label>Internal Notes</Label></td>
            <td>
              <div class="input-group">
                <textarea name="var_internal_notes" id="internal_notes" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 5px;"><label>Currency</label></td>
            <td>
              <div class="input-group">
                <input id="currencyCodeRem" style="border-radius:0;" name="currencyCodeRem" class="form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#"><i id="currencyPopUp" data-toggle="modal" data-target="#myCurrency" class="fas fa-gift" style="color:grey;"></i></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="input-group">
                <input id="currencyNameRem" style="border-radius:0;" class="form-control" name="currencyNameRem" readonly>
              </div>
            </td>
          </tr>
          <tr>
            <td><label>Bank Name</label></td>
            <td>
              <div class="input-group">
                <input name="var_bank_name" id="bank_name" style="border-radius:0;" type="text" class="form-control">
              </div>
            </td>
          </tr>
          <tr>
            <td><label>Account Name</label></td>
            <td>
              <div class="input-group">
                <input name="var_account_name" id="account_name" style="border-radius:0;" type="text" class="form-control">
              </div>
            </td>
          </tr>
          <tr>
            <td><label>Account Number</label></td>
            <td>
              <div class="input-group">
                <input name="var_account_number" id="account_number" style="border-radius:0;" type="number" class="form-control">
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  
  </div>
</div>