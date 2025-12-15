<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <!-- REQUESTER -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Requester</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myRequestersTrigger" data-toggle="modal" data-target="#myRequesters">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myRequestersTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="worker_id_second" style="border-radius:0;" name="requester_id" class="form-control" hidden>
                            <input id="worker_name_second" style="border-radius:0; background-color: white;" name="requester" class="form-control" readonly />
                            <input id="worker_position_second" style="border-radius:0;" name="requester_detail" class="form-control" hidden>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="requesterMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red">
                    Requester cannot be empty.
                </div>
            </div>

            <!-- BENEFICIARY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Beneficiary</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myBeneficiariesTrigger" data-toggle="modal" data-target="#myBeneficiaries">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myBeneficiariesTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="beneficiary_second_id" style="border-radius:0;" name="beneficiary_id" class="form-control" hidden>
                            <input id="beneficiary_second_person_position" style="border-radius:0;" name="beneficiary_detail" class="form-control" hidden>
                            <input id="beneficiary_second_person_ref_id" style="border-radius:0;" name="person_refID" class="form-control" hidden>
                            <input id="beneficiary_second_person_name" style="border-radius:0; background-color: white;" name="beneficiary" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="beneficiaryMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red">
                    Beneficiary cannot be empty.
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- BANK NAME -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myBanksTrigger" data-toggle="modal" data-target="#myBanks">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myBanksTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="bank_name_second_detail" style="border-radius:0; background-color: white;" class="form-control" name="bank_name_detail" readonly>
                            <input id="bank_name_second_name" style="border-radius:0;" name="bank_name" class="form-control" hidden>
                            <input id="bank_name_second_id" style="border-radius:0;" class="form-control" name="bank_code" hidden>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BANK ACCOUNT -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account Number</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myBanksAccountTrigger" data-toggle="modal" data-target="#myBanksAccount">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="myBanksAccountTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="bank_accounts" style="border-radius:0;" name="bank_account" class="form-control number-without-characters" hidden>
                            <input id="bank_accounts_id" style="border-radius:0;" class="form-control" name="bank_account_id" hidden>
                            <input id="bank_accounts_detail" style="border-radius:0; background-color: white;" class="form-control" name="bank_account_detail" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>