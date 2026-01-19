<!-- BODY -->
<div class="card-body">
    <div class="row py-3" style="gap: 15px;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <!-- SUPPLIER INVOICE NUMBER -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier Invoice Number</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group">
                            <input id="supplier_invoice_number" name="supplier_invoice_number" style="border-radius:0;" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="supplier_invoice_number_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Supplier Invoice Number cannot be empty.
                    </div>
                </div>
            </div>

            <!-- PAYMENT TO -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Payment To</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <span class="input-group-text form-control" style="border-radius:0;">
                            <a href="javascript:;" id="payment_transfer_trigger" data-toggle="modal" data-target="#myGetPaymentTransfer" style="display: block; cursor: pointer;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box">
                            </a>

                            <div id="payment_transfer_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span>
                    </div>
                    <div>
                        <div class="input-group">
                            <input id="payment_transfer_number" class="form-control" size="16" disabled style="border-radius:0; cursor: default;">
                            <input id="payment_transfer_id" name="payment_transfer_id" style="border-radius:0;" class="form-control" hidden>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="payment_transfer_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Payment To cannot be empty.
                    </div>
                </div>
            </div>

            <!-- RECEIPT/INVOICE ORIGIN -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Receipt/Invoice Origin</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="form-group d-flex" style="gap: 10%;">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="receipt_origin_no" value="no" name="receipt_origin" onclick="receiptOriginValue(this)">
                            <label for="receipt_origin_no" class="custom-control-label" style="padding-top: 35%;">No</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="receipt_origin_yes" value="yes" name="receipt_origin" onclick="receiptOriginValue(this)">
                            <label for="receipt_origin_yes" class="custom-control-label" style="padding-top: 28%;">Yes</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="receipt_origin_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Receipt/Invoice Origin cannot be empty.
                    </div>
                </div>
            </div>

            <!-- CONTRACT/PO SIGNED -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Contract/PO Signed</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="form-group d-flex" style="gap: 10%;">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="contract_signed_no" value="no" name="contract_signed" onclick="contractSignedValue(this)">
                            <label for="contract_signed_no" class="custom-control-label" style="padding-top: 35%;">No</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="contract_signed_yes" value="yes" name="contract_signed" onclick="contractSignedValue(this)">
                            <label for="contract_signed_yes" class="custom-control-label" style="padding-top: 28%;">Yes</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="contract_signed_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Contract/PO Signed cannot be empty.
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- VAT ORIGIN -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">VAT Origin</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="form-group d-flex" style="gap: 10%;">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="vat_origin_no" name="vat_origin" value="no" onclick="vatValue(this)">
                            <label for="vat_origin_no" class="custom-control-label" style="padding-top: 35%;">No</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="vat_origin_yes" name="vat_origin" value="yes" onclick="vatValue(this)">
                            <label for="vat_origin_yes" class="custom-control-label" style="padding-top: 28%;">Yes</label>
                        </div>
                        <div>
                            <select type="text" id="ppn" class="form-control vat-components" name="ppn" onchange="onChangeVAT(this)" style="border-radius:0;width:auto;display:none;"></select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="vat_origin_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red" id="vat_origin_text_message">
                        VAT Origin cannot be empty.
                    </div>
                </div>
            </div>

            <!-- VAT NUMBER -->
            <div class="row vat-components" style="margin-top: 1rem; display:none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">VAT Number</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group">
                            <input id="vat_number" name="vat_number" style="border-radius:0;" class="form-control number-without-characters" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="vat_number_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        VAT Number cannot be empty.
                    </div>
                </div>
            </div>

            <!-- FAT/PAT/DO ORIGIN -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">FAT/PAT/DO Origin</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="form-group d-flex" style="gap: 10%;">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="basft_origin_no" value="no" name="basft_origin" onclick="fatPatDOValue(this)">
                            <label for="basft_origin_no" class="custom-control-label" style="padding-top: 35%;">No</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="basft_origin_yes" value="yes" name="basft_origin" onclick="fatPatDOValue(this)">
                            <label for="basft_origin_yes" class="custom-control-label" style="padding-top: 28%;">Yes</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="basft_origin_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        FAT/PAT/DO Origin cannot be empty.
                    </div>
                </div>
            </div>

            <!-- NOTES -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Notes</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group">
                            <textarea id="account_payable_notes" name="account_payable_notes" cols="20" rows="4" class="form-control" autocomplete="off"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="account_payable_notes_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Notes cannot be empty.
                    </div>
                </div>
            </div>

            <!-- ASSET -->
            <div class="row" style="display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Asset</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="form-group d-flex" style="gap: 10%;">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="asset_no" name="asset" value="no" checked onclick="assetValue(this)">
                            <label for="asset_no" class="custom-control-label" style="padding-top: 35%;">No</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="asset_yes" name="asset" value="yes" onclick="assetValue(this)">
                            <label for="asset_yes" class="custom-control-label" style="padding-top: 28%;">Yes</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="asset_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Asset cannot be empty.
                    </div>
                </div>
            </div>

            <!-- CATEGORY -->
            <div class="row asset-components" style="margin-top: 1rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Category</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 align-items-center">
                    <div>
                        <span class="input-group-text form-control" style="border-radius:0;">
                            <a href="javascript:;" id="category_trigger" data-toggle="modal" data-target="#myGetCategory" style="display: block; cursor: pointer;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box">
                            </a>

                            <div id="category_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span>
                    </div>
                    <div>
                        <div class="input-group">
                            <input id="category_number" class="form-control" size="15" readonly style="border-radius:0; background-color: white; cursor: default;">
                            <input id="category_id" name="category_id" style="border-radius:0;" class="form-control" hidden>
                        </div>
                    </div>
                    <div class="ml-1">
                        <div data-toggle="modal" data-target="#myInformation" style="cursor: pointer;">
                            <i class="fa fa-info-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="category_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Category cannot be empty.
                    </div>
                </div>
            </div>

            <!-- DEPRECIATION METHOD -->
            <div class="row asset-components" style="margin-top: 1rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Depreciation Method</label>
                <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                    <div id="containerDepreciationMethod" style="display: none;">
                        <select class="form-control" name="depreciation_method" id="depreciation_method" style="border-radius:0;" type="text"></select>
                    </div>
                    <div id="containerLoadingDepreciationMethod">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="depreciation_method_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Depreciation Method cannot be empty.
                    </div>
                </div>
            </div>

            <!-- DEPRECIATION RATE -->
            <div class="row asset-components" style="margin-top: 1rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Depreciation Rate</label>
                <div class="col-sm-9 col-md-8 col-lg-4 p-0">
                    <div class="row" id="containerDepreciationRate">
                        <div class="col-4">
                            <input id="depreciation_rate_percentage" name="depreciation_rate_percentage" class="form-control number-without-negative" size="8" autocomplete="off" style="border-radius:0; cursor: default;" readonly>
                            <input id="depreciation_rate_years_id" name="depreciation_rate_years_id" hidden>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Years</label>
                                <div class="col-6">
                                    <input id="depreciation_rate_years" name="depreciation_rate_years" class="form-control number-without-characters" size="8" autocomplete="off" style="border-radius:0; cursor: default;" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row m-0" id="containerLoadingDepreciationRate" style="display: none;">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="depreciation_value_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div id="depreciation_value_text_message" class="text-red">
                        Depreciation Rate cannot be empty.
                    </div>
                </div>
            </div>

            <!-- DEPRECIATION COA -->
            <div class="row asset-components" style="margin-top: 1rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Depreciation COA</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <span class="input-group-text form-control" style="border-radius:0;">
                            <a href="javascript:;" id="purchase_order_trigger" data-toggle="modal" data-target="#myGetChartOfAccount" style="display: block; cursor: pointer;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box">
                            </a>

                            <div id="purchase_order_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span>
                    </div>
                    <div>
                        <div class="input-group">
                            <input id="depreciation_coa_number" class="form-control" size="15" readonly style="border-radius:0; background-color: white; cursor: default;">
                            <input id="depreciation_coa_id" name="depreciation_coa_id" style="border-radius:0;" class="form-control" hidden>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="depreciation_coa_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Depreciation COA cannot be empty.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>