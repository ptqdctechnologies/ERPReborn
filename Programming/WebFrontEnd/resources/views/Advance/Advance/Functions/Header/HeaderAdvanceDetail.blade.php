<div class="card-body advance-detail">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <table>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Requester</label></td>
                        <td>
                            <div class="input-group">
                                <input name="request_name" id="request_name" style="border-radius:0;" type="text" class="col-4 form-control" readonly>
                                <input name="request_name_id" id="request_name_id" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                <input name="var_combinedBudget" id="combinedBudget" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="request_name2" data-toggle="modal" data-target="#myWorker" class="myWorker"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                                
                                <input id="request_position" style="border-radius:0;" class="col-7 form-control" name="request_position" readonly>
                                <span id="request_name_icon" title="Please Input Requester" style="position: relative;top:2px;left:3px;"><img src="{{ asset('AdminLTE-master/dist/img/mandatory.png') }}" width="17" alt=""></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Beneficiary</label></td>
                        <td>
                            <div class="input-group">
                                <input name="beneficiary_name" id="beneficiary_name" style="border-radius:0;" type="text" class="col-4 form-control" readonly>
                                <input name="beneficiary_id" id="beneficiary_id" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="beneficiary_name2" data-toggle="modal" data-target="#myBeneficiary" class="myBeneficiary"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                                
                                <input id="beneficiary_position" style="border-radius:0;" class="col-7 form-control" name="beneficiary_position" readonly>
                                <span id="beneficiary_name_icon" title="Please Input Beneficiary" style="position: relative;top:2px;left:3px;"><img src="{{ asset('AdminLTE-master/dist/img/mandatory.png') }}" width="17" alt=""></span>
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
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Bank Name</label></td>
                        <td>
                            <div class="input-group">
                                <input id="bank_code" style="border-radius:0;" class="form-control" name="bank_code" hidden>
                                <input id="bank_name" style="border-radius:0;" name="bank_name" class="col-4 form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="bank_name2" data-toggle="modal" data-target="#myGetBank" class="myGetBank"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>

                                <input id="bank_name_full" style="border-radius:0;" class="col-7 form-control" name="bank_name_full" readonly>
                                <span id="bank_name_icon" title="Please Input Bank Name" style="position: relative;top:2px;left:3px;"><img src="{{ asset('AdminLTE-master/dist/img/mandatory.png') }}" width="17" alt=""></span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Bank Account</label></td>
                        <td>
                            <div class="input-group">
                                <input id="beneficiaryBankAccount_RefID" style="border-radius:0;" class="form-control" name="beneficiaryBankAccount_RefID" hidden>
                                <input id="bank_account" style="border-radius:0;" name="bank_account" class="col-4 form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="bank_account2" data-toggle="modal" data-target="#myBankAccount" class="myBankAccount"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>

                                <input id="account_name" style="border-radius:0;" class="col-7 form-control" name="account_name" readonly>
                                <span id="bank_account_icon" title="Please Input Bank Account" style="position: relative;top:2px;left:3px;"><img src="{{ asset('AdminLTE-master/dist/img/mandatory.png') }}" width="17" alt=""></span>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>