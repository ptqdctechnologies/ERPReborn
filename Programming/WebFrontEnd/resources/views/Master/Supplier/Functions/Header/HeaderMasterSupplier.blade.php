<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <!-- SUPPLIER NAME -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier
                    Name</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="supplier_name" name="supplier_name" style="border-radius:0;">
                    </div>
                </div>
            </div>

            <!-- TAX ID -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Tax
                    ID</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="tax_id" name="tax_id" style="border-radius:0;">
                    </div>
                </div>
            </div>

            <!-- PHONE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Phone</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="phone_number" name="phone_number" style="border-radius:0;">
                    </div>
                </div>
            </div>

            <!-- EMAIL -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Email</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="email" name="email" style="border-radius:0;">
                    </div>
                </div>
            </div>

            <!-- COUNTRY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Country</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myBanksTrigger" data-toggle="modal" data-target="#myBanks">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13"
                                    alt="myBanksTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="bank_name_second_detail" style="border-radius:0; background-color: white;"
                                class="form-control" name="bank_name_detail" readonly>
                            <input id="bank_name_second_name" style="border-radius:0;" name="bank_name"
                                class="form-control" hidden>
                            <input id="bank_name_second_id" style="border-radius:0;" class="form-control"
                                name="bank_code" hidden>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PROVINCE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Province</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myBanksTrigger" data-toggle="modal" data-target="#myBanks">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13"
                                    alt="myBanksTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="bank_name_second_detail" style="border-radius:0; background-color: white;"
                                class="form-control" name="bank_name_detail" readonly>
                            <input id="bank_name_second_name" style="border-radius:0;" name="bank_name"
                                class="form-control" hidden>
                            <input id="bank_name_second_id" style="border-radius:0;" class="form-control"
                                name="bank_code" hidden>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CITY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">City</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myBanksTrigger" data-toggle="modal" data-target="#myBanks">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13"
                                    alt="myBanksTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="bank_name_second_detail" style="border-radius:0; background-color: white;"
                                class="form-control" name="bank_name_detail" readonly>
                            <input id="bank_name_second_name" style="border-radius:0;" name="bank_name"
                                class="form-control" hidden>
                            <input id="bank_name_second_id" style="border-radius:0;" class="form-control"
                                name="bank_code" hidden>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ADDRESS -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Address</label>
                <div class="col-5">
                    <textarea id="address" name="address" cols="30" rows="4" class="form-control"
                        autocomplete="off"></textarea>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- CONTACT PERSON -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Contact
                    Person</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="contact_person" name="contact_person" style="border-radius:0;">
                    </div>
                </div>
            </div>

            <!-- BANK NAME -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank
                    Name</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myBanksTrigger" data-toggle="modal" data-target="#myBanks">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13"
                                    alt="myBanksTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="bank_name_second_detail" style="border-radius:0; background-color: white;"
                                class="form-control" name="bank_name_detail" readonly>
                            <input id="bank_name_second_name" style="border-radius:0;" name="bank_name"
                                class="form-control" hidden>
                            <input id="bank_name_second_id" style="border-radius:0;" class="form-control"
                                name="bank_code" hidden>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ACCOUNT NUMBER -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account
                    Number</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="account_number" name="account_number" style="border-radius:0;">
                    </div>
                </div>
            </div>

            <!-- ACCOUNT NAME -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account
                    Name</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="account_name" name="account_name" style="border-radius:0;">
                    </div>
                </div>
            </div>

            <!-- REMARK -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Remark</label>
                <div class="col-5">
                    <textarea name="internalNote" id="internalNote" cols="30" rows="4" class="form-control"
                        autocomplete="off"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>