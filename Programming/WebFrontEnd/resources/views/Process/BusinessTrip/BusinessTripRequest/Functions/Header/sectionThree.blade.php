<div class="card-body">
    <div class="row pt-3" style="gap: 1rem;">
        <!-- TRAVEL & FARES -->
        <div class="col-12">
            <div class="row" style="margin-bottom: 1rem;">
                <div style="font-size: 0.9rem; font-weight: bold;">
                    1. Travel & Fares
                </div>
            </div>

            <div class="row" style="row-gap: 1rem;" id="travel-fares-container">
                <div class="loading-container py-3" style="justify-items: center; width: 100%;">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                            Loading...
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ALLOWANCE -->
        <div class="col-12">
            <div class="row" style="margin-bottom: 1rem;">
                <div style="font-size: 0.9rem; font-weight: bold;">
                    2. Allowance
                </div>
            </div>

            <div class="row" id="allowance-container">
                <div class="loading-container py-3" style="justify-items: center; width: 100%;">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                            Loading...
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ENTERTAINMENT -->
        <div class="col-12">
            <div class="row" style="margin-bottom: 1rem;">
                <div style="font-size: 0.9rem; font-weight: bold;">
                    3. Entertainment
                </div>
            </div>
            <div class="row" id="entertainment-container">
                <div class="loading-container py-3" style="justify-items: center; width: 100%;">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                            Loading...
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- OTHER -->
        <div class="col-12" style="margin-bottom: 1rem;">
            <div class="row" style="margin-bottom: 1rem;">
                <div style="font-size: 0.9rem; font-weight: bold;">
                    4. Other
                </div>
            </div>
            <div class="row" id="other-container">
                <div class="loading-container py-3" style="justify-items: center; width: 100%;">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <div class="spinner-border" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                            Loading...
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <hr>
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-3">
                            <div class="row">
                                <label class="p-0 col-5 text-bold">Total BRF</label>
                                <div class="p-0">
                                    <div class="input-group">
                                        <input id="total_business_trip" name="total_business_trip"
                                            style="border-radius:0;" autocomplete="off"
                                            class="form-control number-without-negative" disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="totalBRFMessage" style="margin-top: .3rem; display: none;">
                                <label class="p-0 col-5 text-bold"></label>
                                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                                    <div class="text-red">
                                        Total BRF cannot be empty.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row py-3">
        <div class="col-12 p-0">
            <!-- PAYMENT -->
            <div class="row m-0">
                <div class="text-center" style="margin-bottom: 1rem; font-size: 0.9rem; font-weight: bold;">
                    Payment
                </div>
            </div>

            <!-- DIRECT TO VENDOR -->
            <div class="row m-0">
                <div class="col-md-12 col-lg-5 p-0" style="margin-bottom: 1rem;">
                    <div class="row mt-0 mx-0">
                        <label for="direct_to_vendor"
                            class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Direct to Vendor</label>
                        <div class="col-5 d-flex">
                            <div class="input-group">
                                <input class="form-control number-without-negative" id="direct_to_vendor"
                                    name="vendor_amount" style="border-radius:0;" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="directToVendorMessage" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-5 d-flex">
                            <div class="text-red">
                                Direct to Vendor cannot be empty.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-5 p-0">
                    <!-- BANK NAME -->
                    <div class="row mt-0 mx-0">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
                        <div class="col-5 d-flex">
                            <div onclick="changeLabelPayment('bank_name_vendor')">
                                <span id="bankVendorListModalTrigger" class="input-group-text form-control"
                                    data-toggle="modal" data-target="#bankListModal"
                                    style="border-radius: 0; cursor: pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <div style="flex: 100%;">
                                <input type="text" id="bank_name_vendor" class="form-control"
                                    style="border-radius:0; background-color: white;" readonly />
                                <input type="hidden" id="bank_id_vendor" />
                                <input type="hidden" id="bank_acronym_vendor" />
                            </div>
                        </div>
                    </div>
                    <div class="row" id="bankNameVendorMessage" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-5 d-flex">
                            <div class="text-red">
                                Bank Name cannot be empty.
                            </div>
                        </div>
                    </div>

                    <!-- BANK ACCOUNT -->
                    <div class="row mx-0" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account Number</label>
                        <div class="col-5 d-flex">
                            <div onclick="changeLabelPayment('bank_account_vendor')">
                                <span id="bankAccountVendorListModalTrigger" class="input-group-text form-control"
                                    data-toggle="modal" data-target="#bankAccountListModal"
                                    style="border-radius: 0; cursor: not-allowed;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <div style="flex: 100%;">
                                <input type="text" id="bank_account_name_vendor" class="form-control"
                                    style="border-radius:0; background-color: white;" readonly />
                                <input type="hidden" id="bank_account_id_vendor" name="bank_account_id_vendor" />
                            </div>
                        </div>
                    </div>
                    <div class="row" id="bankAccountVendorMessage" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-5 d-flex">
                            <div class="text-red">
                                Bank Account cannot be empty.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr />

            <!-- BY CORP CARD -->
            <div class="row m-0">
                <div class="col-md-12 col-lg-5 p-0" style="margin-bottom: 1rem;">
                    <div class="row mt-0 mx-0">
                        <label for="by_corp_card" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">By
                            Corp Card</label>
                        <div class="col-5 d-flex">
                            <div class="input-group">
                                <input id="by_corp_card" name="corp_amount" style="border-radius:0;" autocomplete="off"
                                    class="form-control number-without-negative">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="byCorpCardMessage" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-5 d-flex">
                            <div class="text-red">
                                By Corp Card cannot be empty.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-5 p-0">
                    <!-- BANK NAME -->
                    <div class="row mt-0 mx-0">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
                        <div class="col-5 d-flex">
                            <div onclick="changeLabelPayment('bank_name_corp_card')">
                                <span id="bankCorpCardListModalTrigger" class="input-group-text form-control"
                                    data-toggle="modal" data-target="#bankListModal"
                                    style="border-radius: 0; cursor: pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <div style="flex: 100%;">
                                <input type="text" id="bank_name_corp_card" class="form-control"
                                    style="border-radius:0; background-color: white;" readonly />
                                <input type="hidden" id="bank_id_corp_card" />
                                <input type="hidden" id="bank_acronym_corp_card" />
                            </div>
                        </div>
                    </div>
                    <div class="row" id="bankNameCorpCardMessage" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-5 d-flex">
                            <div class="text-red">
                                Bank Name cannot be empty.
                            </div>
                        </div>
                    </div>

                    <!-- BANK ACCOUNT -->
                    <div class="row mx-0" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account Number</label>
                        <div class="col-5 d-flex">
                            <div onclick="changeLabelPayment('bank_account_corp_card')">
                                <span id="bankAccountCorpCardListModalTrigger" class="input-group-text form-control"
                                    data-toggle="modal" data-target="#bankAccountListModal"
                                    style="border-radius: 0; cursor: not-allowed;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <div style="flex: 100%;">
                                <input type="text" id="bank_account_name_corp_card" class="form-control"
                                    style="border-radius:0; background-color: white;" readonly />
                                <input type="hidden" id="bank_account_id_corp_card" name="bank_account_id_corp_card" />
                            </div>
                        </div>
                    </div>
                    <div class="row" id="bankAccountCorpCardMessage" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-5 d-flex">
                            <div class="text-red">
                                Bank Account cannot be empty.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr />

            <!-- TO OTHER -->
            <div class="row m-0">
                <div class="col-md-12 col-lg-5 p-0" style="margin-bottom: 1rem;">
                    <div class="row mt-0 mx-0">
                        <label for="to_other" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">To
                            Other</label>
                        <div class="col-5 d-flex">
                            <div class="input-group">
                                <input id="to_other" name="other_amount" style="border-radius:0;" autocomplete="off"
                                    class="form-control number-without-negative">
                            </div>
                        </div>
                    </div>
                    <div class="row" id="toOtherMessage" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-5 d-flex">
                            <div class="text-red">
                                To Other cannot be empty.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-5 p-0">
                    <!-- BENEFICIARY -->
                    <div class="row mt-0 mx-0">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Beneficiary</label>
                        <div class="col-5 d-flex">
                            <div onclick="changeLabelPayment('beneficiary_other')">
                                <span id="myBeneficiariesTrigger" class="input-group-text form-control"
                                    data-toggle="modal" data-target="#myBeneficiaries"
                                    style="border-radius: 0; cursor: pointer;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <div style="flex: 100%;">
                                <input type="text" id="beneficiary_name" class="form-control"
                                    style="border-radius:0; background-color: white;" readonly />
                                <input type="hidden" id="beneficiary_id" name="beneficiary_id" />
                                <input type="hidden" id="person_id" />
                            </div>
                        </div>
                    </div>
                    <div class="row" id="beneficiaryToOtherMessage" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-5 d-flex">
                            <div class="text-red">
                                Beneficiary cannot be empty.
                            </div>
                        </div>
                    </div>

                    <!-- BANK NAME -->
                    <div class="row mx-0" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Name</label>
                        <div class="col-5 d-flex">
                            <div onclick="changeLabelPayment('bank_name_other')">
                                <span id="bankOtherListModalTrigger" class="input-group-text form-control"
                                    data-toggle="modal" data-target="#bankListModal"
                                    style="border-radius: 0; cursor: not-allowed;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <div style="flex: 100%;">
                                <input type="text" id="bank_name_other" class="form-control"
                                    style="border-radius:0; background-color: white;" readonly />
                                <input type="hidden" id="bank_id_other" />
                                <input type="hidden" id="bank_acronym_other" />
                            </div>
                        </div>
                    </div>
                    <div class="row" id="bankNameToOtherMessage" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-5 d-flex">
                            <div class="text-red">
                                Bank Name cannot be empty.
                            </div>
                        </div>
                    </div>

                    <!-- BANK ACCOUNT -->
                    <div class="row mx-0" style="margin-top: 1rem;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Account Number</label>
                        <div class="col-5 d-flex">
                            <div onclick="changeLabelPayment('bank_account_other')">
                                <span id="bankAccountOtherListModalTrigger" class="input-group-text form-control"
                                    data-toggle="modal" data-target="#bankAccountListModal"
                                    style="border-radius: 0; cursor: not-allowed;">
                                    <i class="fas fa-gift"></i>
                                </span>
                            </div>
                            <div style="flex: 100%;">
                                <input type="text" id="bank_account_name_other" class="form-control"
                                    style="border-radius:0; background-color: white;" readonly />
                                <input type="hidden" id="bank_account_id_other" name="bank_account_id_other" />
                            </div>
                        </div>
                    </div>
                    <div class="row" id="bankAccountToOtherMessage" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-5 d-flex">
                            <div class="text-red">
                                Bank Account cannot be empty.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr />

            <!-- TOTAL PAYMENT -->
            <div class="row m-0">
                <div class="col-md-12 col-lg-5 p-0">
                    <div class="row mt-0 mx-0">
                        <label for="total_payment" class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Total
                            Payment</label>
                        <div class="col-5 d-flex">
                            <div class="input-group">
                                <input id="total_payment" style="border-radius:0;" autocomplete="off"
                                    class="form-control number-without-negative" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="totalPaymentMessage" style="margin-top: .3rem; display: none;">
                        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                        <div class="col-5 text-red">
                            Total Payment cannot be empty.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>