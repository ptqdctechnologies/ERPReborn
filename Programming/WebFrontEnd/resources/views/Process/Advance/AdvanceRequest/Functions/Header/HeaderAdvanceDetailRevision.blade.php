<div class="card-body">
    <div class="row py-3" style="gap: 15px;">
        <div class="col-md-12 col-lg-5">
            <!-- REQUESTER -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Requester</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="worker_position_second" style="border-radius:0;" name="requester_detail" class="form-control" size="17" readonly value="{{ $headerAdvanceRequestDetail['requesterPosition']; }}">
                        <input id="worker_id_second" style="border-radius:0;" name="requester_id" class="form-control" hidden value="{{ $headerAdvanceRequestDetail['requesterId']; }}">
                    </div>
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myWorkerSecondTrigger" data-toggle="modal" data-target="#myWorkerSecond">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myWorkerSecondTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input id="worker_name_second" style="border-radius:0;" name="requester" class="form-control" readonly value="{{ $headerAdvanceRequestDetail['requesterName']; }}">
                    </div>
                </div>
            </div>

            <!-- BENEFICIARY -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Beneficiary</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="beneficiary_second_person_position" style="border-radius:0;" name="beneficiary_detail" class="form-control" size="17" readonly value="{{ $headerAdvanceRequestDetail['beneficiaryPosition']; }}">
                        <input id="beneficiary_second_id" style="border-radius:0;" name="beneficiary_id" class="form-control" hidden value="{{ $headerAdvanceRequestDetail['beneficiaryId']; }}">
                        <input id="beneficiary_second_person_ref_id" style="border-radius:0;" name="person_refID" class="form-control" hidden value="{{ $headerAdvanceRequestDetail['person_RefId']; }}">
                    </div>
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myBeneficiarySecondTrigger" data-toggle="modal" data-target="#myBeneficiarySecond">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input id="beneficiary_second_person_name" style="border-radius:0;" name="beneficiary" class="form-control" readonly value="{{ $headerAdvanceRequestDetail['beneficiaryName']; }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-5">
            <!-- BANK NAME -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="bank_name_second_name" style="border-radius:0;" name="bank_name" class="form-control" size="17" readonly value="{{ $headerAdvanceRequestDetail['bankAcronym']; }}">
                        <input id="bank_name_second_id" style="border-radius:0;" class="form-control" name="bank_code" hidden value="{{ $headerAdvanceRequestDetail['bankId']; }}">
                    </div>
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myGetBankSecondTrigger" data-toggle="modal" data-target="#myGetBankSecond" class="myGetBankSecond">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input id="bank_name_second_detail" style="border-radius:0;" class="form-control" name="bank_name_detail" readonly value="{{ $headerAdvanceRequestDetail['bankName']; }}">
                    </div>
                </div>
            </div>

            <!-- BANK ACCOUNT -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <input id="bank_accounts" style="border-radius:0;" name="bank_account" class="form-control number-without-characters" size="17" autocomplete="off" readonly value="{{ $headerAdvanceRequestDetail['bankAccountNumber']; }}">
                        <input id="bank_accounts_id" style="border-radius:0;" class="form-control" name="bank_account_id" hidden value="{{ $headerAdvanceRequestDetail['bankAccountId']; }}">
                    </div>
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myBankAccountTrigger" data-toggle="modal" data-target="#myBankAccount" class="myBankAccount">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input id="bank_accounts_detail" style="border-radius:0;" class="form-control" name="bank_account_detail" autocomplete="off" readonly value="{{ $headerAdvanceRequestDetail['bankAccountName']; }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>