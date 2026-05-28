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
                        <input class="form-control" id="supplier_name" name="supplier_name" style="border-radius:0;"
                            autocomplete="off" value="<?= $headerSupplier['supplierName']; ?>"
                            <?= $headerSupplier['status'] === 'FINAL APPROVED' ? 'disabled' : '' ?>>
                    </div>
                </div>
            </div>
            <div class="row" id="supplierNameMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="supplierNameMessageText"></div>
            </div>

            <!-- TAX ID -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Tax
                    ID</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control number-without-characters" id="tax_id" name="tax_id"
                            style="border-radius:0;" autocomplete="off" value="<?= $headerSupplier['taxID']; ?>"
                            <?= $headerSupplier['status'] === 'FINAL APPROVED' ? 'disabled' : '' ?>>
                    </div>
                </div>
            </div>

            <!-- PHONE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Phone</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control number-without-characters" id="phone_number" name="phone_number"
                            style="border-radius:0;" autocomplete="off" value="<?= $headerSupplier['phoneNumber']; ?>"
                            <?= $headerSupplier['status'] === 'FINAL APPROVED' ? 'disabled' : '' ?>>
                    </div>
                </div>
            </div>
            <div class="row" id="phoneNumberMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="phoneNumberMessageText"></div>
            </div>

            <!-- EMAIL -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Email</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="email" name="email" style="border-radius:0;" autocomplete="off"
                            value="<?= $headerSupplier['email']; ?>" <?= $headerSupplier['status'] === 'FINAL APPROVED' ? 'disabled' : '' ?>>
                    </div>
                </div>
            </div>
            <div class="row" id="emailMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="emailMessageText"></div>
            </div>

            <!-- COUNTRY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Country</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myCountryTrigger" data-toggle="modal" data-target="#myCountries">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13"
                                    alt="countryTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="country_name" class="form-control" readonly name="country_name"
                                value="<?= $headerSupplier['country']; ?>" style="border-radius:0; ">
                            <input id="country_id" class="form-control" hidden name="country_id"
                                style="border-radius:0; ">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="countryMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="countryMessageText"></div>
            </div>

            <!-- PROVINCE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Province</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="provinceTrigger" data-toggle="modal" data-target="#myProvincies">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13"
                                    alt="provinceTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="province_name" class="form-control" name="province_name" readonly
                                value="<?= $headerSupplier['province']; ?>" style="border-radius:0; ">
                            <input id="province_id" class="form-control" name="province_id" hidden
                                style="border-radius:0;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="provinceMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="provinceMessageText"></div>
            </div>

            <!-- CITY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">City</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="cityTrigger" data-toggle="modal" data-target="#myCities">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="cityTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="city_name" class="form-control" name="city_name" readonly
                                value="<?= $headerSupplier['city']; ?>" style="border-radius:0; ">
                            <input id="city_id" class="form-control" name="city_id" hidden style="border-radius:0;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="cityMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="cityMessageText"></div>
            </div>

            <!-- ADDRESS -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Address</label>
                <div class="col-5">
                    <textarea id="address" name="address" cols="30" rows="4" class="form-control" autocomplete="off"
                        <?= $headerSupplier['status'] === 'FINAL APPROVED' ? 'disabled' : '' ?>><?= $headerSupplier['address']; ?></textarea>
                </div>
            </div>
            <div class="row" id="addressMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="addressMessageText"></div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <?php if ($headerSupplier['status'] == 'FINAL APPROVED') { ?>
            <!-- STATUS -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier Status</label>
                <div class="col-5 d-flex" style="gap: 1rem;">
                    <div class="form-check d-flex align-items-center">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="radioGroup"
                            id="active"
                            checked
                        />
                        <label class="form-check-label" for="active">Active</label>
                    </div>
                    <div class="form-check d-flex align-items-center">
                        <input
                            class="form-check-input"
                            type="radio"
                            name="radioGroup"
                            id="inactive"
                        />
                        <label class="form-check-label" for="inactive">Inactive</label>
                    </div>
                    <!-- <div class="form-check form-switch" style="margin-bottom: 0rem; min-height: auto;">
                        <input class="form-check-input" type="checkbox" role="switch" id="switchCheckChecked" checked
                            style="height: 1rem; width: 2rem;">
                        <label class="form-check-label" for="switchCheckChecked">Checked switch checkbox input</label>
                    </div> -->
                </div>
            </div>
            <?php } ?>

            <!-- LEGAL ENTITY -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Legal
                    Entity</label>
                <div class="col-5">
                    <select class="form-control" id="legal_entity" name="legal_entity_value"
                        style="border-radius:0;width: 100%;" type="text" <?= $headerSupplier['status'] === 'FINAL APPROVED' ? 'disabled' : '' ?>>
                        <option value="" disabled selected>Select a Legal Entity</option>
                        <!-- <option value="PT (Perseroan Terbatas)">PT (Perseroan Terbatas)</option>
                        <option value="CV (Commanditaire Vennootschap)">CV (Commanditaire Vennootschap)</option>
                        <option value="Koperasi">Koperasi</option>
                        <option value="Yayasan">Yayasan</option>
                        <option value="Firma (Fa)">Firma (Fa)</option>
                        <option value="Usaha Perseorangan">Usaha Perseorangan</option>
                        <option value="Bentuk Lain Khusus (BUT)">Bentuk Lain Khusus (BUT)</option> -->
                    </select>
                </div>
            </div>
            <div class="row" id="legalEntityMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="legalEntityMessageText"></div>
            </div>

            <!-- CONTACT PERSON -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Contact
                    Person</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="contact_person" name="contact_person" style="border-radius:0;"
                            autocomplete="off" value="<?= $headerSupplier['contactPerson']; ?>"
                            <?= $headerSupplier['status'] === 'FINAL APPROVED' ? 'disabled' : '' ?>>
                    </div>
                </div>
            </div>
            <div class="row" id="contactPersonMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="contactPersonMessageText"></div>
            </div>

            <!-- BANK NAME -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank
                    Name</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="myGetBankListTrigger" data-toggle="modal"
                                data-target="#myGetBankList">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13"
                                    alt="myGetBankListTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="bank_name" style="border-radius:0;" class="form-control" readonly
                                value="<?= $headerSupplier['bankAcronym'] . ' - ' . $headerSupplier['bankName']; ?>">
                            <input id="bank_id" style="border-radius:0;" class="form-control" name="bank_id" hidden>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="bankNameMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="bankNameMessageText"></div>
            </div>

            <!-- ACCOUNT NUMBER -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account
                    Number</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control number-without-characters" id="account_number" name="account_number"
                            value="<?= $headerSupplier['accountNumber']; ?>" style="border-radius:0;" autocomplete="off"
                            <?= $headerSupplier['status'] === 'FINAL APPROVED' ? 'disabled' : '' ?>>
                    </div>
                </div>
            </div>
            <div class="row" id="accountNumberMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="accountNumberMessageText"></div>
            </div>

            <!-- ACCOUNT NAME -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account
                    Name</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="account_name" name="account_name"
                            value="<?= $headerSupplier['accountName']; ?>" style="border-radius:0;" autocomplete="off"
                            <?= $headerSupplier['status'] === 'FINAL APPROVED' ? 'disabled' : '' ?>>
                    </div>
                </div>
            </div>
            <div class="row" id="accountNameMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="accountNameMessageText"></div>
            </div>

            <!-- REMARK -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Remark</label>
                <div class="col-5">
                    <textarea id="remark" class="form-control" cols="30" rows="4" autocomplete="off" name="remark"
                        <?= $headerSupplier['status'] === 'FINAL APPROVED' ? 'disabled' : '' ?>><?= $headerSupplier['remark']; ?></textarea>
                </div>
            </div>
            <div class="row" id="remarkMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="remarkMessageText"></div>
            </div>
        </div>
    </div>
</div>