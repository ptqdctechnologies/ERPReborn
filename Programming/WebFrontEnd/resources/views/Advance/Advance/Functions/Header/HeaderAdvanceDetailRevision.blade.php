<div class="card-body advance-detail">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <table>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Requester</label></td>
                        <td>
                            <div class="input-group">
                                <input name="requester" id="requester" style="border-radius:0;" type="text" class="col-4 form-control" readonly value="{{ $dataGeneral['involvedPersons'][0]['requesterWorkerName'] }}">
                                <input name="requester_id" id="requester_id" style="border-radius:0;" type="hidden" class="form-control" readonly value="{{ $dataGeneral['involvedPersons'][0]['requesterWorkerJobsPosition_RefID'] }}">
                                <input name="var_combinedBudget" id="combinedBudget" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="requester_popup" data-toggle="modal" data-target="#myWorker" class="myWorker"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                                
                                <input id="requester_detail" style="border-radius:0;" class="col-7 form-control" name="requester_detail" readonly value="{{ $dataGeneral['involvedPersons'][0]['requesterWorkerJobsPositionName']}}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Beneficiary</label></td>
                        <td>
                            <div class="input-group">
                                <input name="beneficiary" id="beneficiary" style="border-radius:0;" type="text" class="col-4 form-control" readonly value="{{ $dataGeneral['involvedPersons'][0]['beneficiaryWorkerName'] }}">
                                <input name="beneficiary_id" id="beneficiary_id" style="border-radius:0;" type="hidden" class="form-control" readonly value="{{ $dataGeneral['involvedPersons'][0]['beneficiaryWorkerJobsPosition_RefID']}}">
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="beneficiary_popup" data-toggle="modal" data-target="#myBeneficiary" class="myBeneficiary"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>
                                
                                <input id="beneficiary_detail" style="border-radius:0;" class="col-7 form-control" name="beneficiary_detail" value="{{ $dataGeneral['involvedPersons'][0]['beneficiaryWorkerJobsPositionName'] }}" readonly>
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
                                <input id="bank_name" style="border-radius:0;" name="bank_name" class="col-4 form-control" value="{{ $dataGeneral['bankAccount']['beneficiary']['bankAcronym'] }}" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="bank_name_popup" data-toggle="modal" data-target="#myGetBank" class="myGetBank"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>

                                <input id="bank_name_detail" style="border-radius:0;" class="col-7 form-control" name="bank_name_detail" readonly value="{{ $dataGeneral['bankAccount']['beneficiary']['bankName'] }}">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Bank Account</label></td>
                        <td>
                            <div class="input-group">
                                <input id="beneficiaryBankAccount_RefID" style="border-radius:0;" class="form-control" name="beneficiaryBankAccount_RefID"  value="{{ $dataGeneral['bankAccount']['beneficiary']['bankAccountNumber'] }}" hidden>
                                <input id="bank_account" style="border-radius:0;" name="bank_account" class="col-4 form-control" readonly value="{{ $dataGeneral['bankAccount']['beneficiary']['bankAccountNumber'] }}">
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="bank_account_popup" data-toggle="modal" data-target="#myBankAccount" class="myBankAccount"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                </div>

                                <input id="bank_account_detail" style="border-radius:0;" class="col-7 form-control" name="bank_account_detail" readonly value="{{ $dataGeneral['bankAccount']['beneficiary']['bankAccountName'] }}">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>