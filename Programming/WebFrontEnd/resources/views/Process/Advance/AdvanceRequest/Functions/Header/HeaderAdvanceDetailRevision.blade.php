<div class="card-body">
    <div class="row py-3" style="gap: 15px;">
        <div class="col-md-12 col-lg-5">
            <!-- REQUESTER -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Requester</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myWorkerSecondTrigger" style="cursor: not-allowed;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myWorkerSecondTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input id="worker_id_second" style="border-radius:0;" name="requester_id" class="form-control" hidden value="{{ $headerAdvanceRequestDetail['requesterId'] }}">
                        <input id="worker_position_second" style="border-radius:0;" name="requester_detail" class="form-control" hidden value="{{ $headerAdvanceRequestDetail['requesterPosition'] }}">
                        <input id="worker_name_second" style="border-radius:0;" name="requester" class="form-control" readonly value="{{ $headerAdvanceRequestDetail['requesterPosition'] . ' - ' . $headerAdvanceRequestDetail['requesterName'] }}">
                    </div>
                </div>
            </div>

            <!-- BENEFICIARY -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Beneficiary</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myBeneficiarySecondTrigger" style="cursor: not-allowed;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input id="beneficiary_second_id" style="border-radius:0;" name="beneficiary_id" class="form-control" hidden value="{{ $headerAdvanceRequestDetail['beneficiaryId'] }}">
                        <input id="beneficiary_second_person_ref_id" style="border-radius:0;" name="person_refID" class="form-control" hidden value="{{ $headerAdvanceRequestDetail['person_RefId'] }}">
                        <input id="beneficiary_second_person_name" style="border-radius:0;" name="beneficiary" class="form-control" hidden value="{{ $headerAdvanceRequestDetail['beneficiaryName'] }}">
                        <input id="beneficiary_second_person_position" style="border-radius:0;" name="beneficiary_detail" class="form-control" size="17" readonly value="{{ $headerAdvanceRequestDetail['beneficiaryPosition'] . ' - ' . $headerAdvanceRequestDetail['beneficiaryName'] }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-5">
            <!-- BANK NAME -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myGetBankSecondTrigger" style="cursor: not-allowed;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input id="bank_name_second_id" style="border-radius:0;" class="form-control" name="bank_code" hidden value="{{ $headerAdvanceRequestDetail['bankId'] }}">
                        <input id="bank_name_second_name" style="border-radius:0;" name="bank_name" class="form-control" hidden value="{{ $headerAdvanceRequestDetail['bankAcronym'] }}">
                        <input id="bank_name_second_detail" style="border-radius:0;" class="form-control" name="bank_name_detail" readonly value="{{ $headerAdvanceRequestDetail['bankAcronym'] . ' - ' . $headerAdvanceRequestDetail['bankName'] }}">
                    </div>
                </div>
            </div>

            <!-- BANK ACCOUNT -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account Number</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myBankAccountTrigger" data-toggle="modal" data-target="#myBankAccount" class="myBankAccount" style="cursor: not-allowed;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input id="bank_accounts_id" style="border-radius:0;" class="form-control" name="bank_account_id" hidden value="{{ $headerAdvanceRequestDetail['bankAccountId'] }}">
                        <input id="bank_accounts" style="border-radius:0;" name="bank_account" class="form-control number-without-characters" hidden value="{{ $headerAdvanceRequestDetail['bankAccountNumber'] }}">
                        <input id="bank_accounts_detail" style="border-radius:0;" class="form-control" name="bank_account_detail" readonly value="{{ $headerAdvanceRequestDetail['bankAccountNumber'] . ' - ' .$headerAdvanceRequestDetail['bankAccountName'] }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>