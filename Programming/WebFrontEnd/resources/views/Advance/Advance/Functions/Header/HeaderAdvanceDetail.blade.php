<div class="card-body advance-detail">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <table>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Requester</label></td>
                        <td>
                            <div class="input-group">
                                <input name="request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly>
                                <input name="request_name_id" id="request_name_id" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                <input name="var_combinedBudget" id="combinedBudget" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="request_name2" data-toggle="modal" data-target="#myWorker" class="myWorker"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <input id="request_position" style="border-radius:0;" class="form-control" name="request_position" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Beneficiary</label></td>
                        <td>
                            <div class="input-group">
                                <input name="beneficiary_name" id="beneficiary_name" style="border-radius:0;" type="text" class="form-control" readonly>
                                <input name="beneficiary_name_id" id="beneficiary_name_id" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="beneficiary_name2" data-toggle="modal" data-target="#myWorker" class="myWorkerBeneficiary"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <input id="beneficiary_position" style="border-radius:0;" class="form-control" name="request_position" readonly>
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
                                <input id="bank_name" style="border-radius:0;" name="bank_name" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="bank_name2" data-toggle="modal" data-target="#myGetBank" class="myGetBank"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <input id="bank_name_full" style="border-radius:0;" class="form-control" name="bank_name_full" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Bank Account</label></td>
                        <td>
                            <div class="input-group">
                                <input id="beneficiaryBankAccount_RefID" style="border-radius:0;" class="form-control" name="beneficiaryBankAccount_RefID" hidden>
                                <input id="bank_account" style="border-radius:0;" name="bank_account" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="bank_account2" data-toggle="modal" data-target="#myBankAccount" class="myBankAccount"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <input id="account_name" style="border-radius:0;" class="form-control" name="account_name" readonly>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- <div class="col-md-6">
            <div class="form-group">
                <table>
                    
                </table>
            </div>
        </div> -->

        <!-- <div class="col-md-4">
            <div class="form-group">
                <table>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Account Name</label></td>
                        <td>
                        <td>
                            <div class="input-group">
                                <input id="account_name" style="border-radius:0;" class="form-control" name="account_name" readonly>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div> -->
    </div>
</div>