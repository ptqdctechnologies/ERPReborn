<!-- LEFT COLUMN -->
<div class="col-12 col-md-5 col-lg-6">
    <div class="form-group">
        <!-- ACCOUNT PAYABLE NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                AP Number
            </div>
            <div class="col">
                : <?= $dataHeader['documentNumber']; ?>
            </div>
        </div>

        <!-- PUCHASE ORDER NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                PO Number
            </div>
            <div class="col">
                : <?= $dataHeader['poNumber']; ?>
            </div>
        </div>

        <!-- SUPPLIER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                Supplier
            </div>
            <div class="col">
                : <?= $dataHeader['supplierCode']; ?> - <?= $dataHeader['supplierName']; ?>
            </div>
        </div>

        <?php if (!$dataHeader['dateUpdate']) { ?>
            <!-- SUPPLIER INVOICE NUMBER -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    Supplier Invoice Number
                </div>
                <div class="col">
                    : <?= $dataHeader['supplierInvoiceNumber']; ?>
                </div>
            </div>

            <!-- PAYMENT TO -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    Payment To
                </div>
                <div class="col">
                    : <?= $dataHeader['supplierBankAccountName'] . " - (" . $dataHeader['supplierBankName'] . ") " . $dataHeader['supplierBankAccount']; ?>
                </div>
            </div>

            <!-- RECEIPT/INVOICE ORIGIN -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    Receipt/Invoice Origin
                </div>
                <div class="col">
                    : <?= $dataHeader['receiptInvoiceOrigin']; ?>
                </div>
            </div>

            <!-- CONTRACT/PO SIGNED -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    Contract/PO Signed
                </div>
                <div class="col">
                    : <?= $dataHeader['contractPOSigned']; ?>
                </div>
            </div>

            <!-- VAT ORIGIN -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    VAT Origin
                </div>
                <div class="col">
                    : <?= $dataHeader['VATOrigin']; ?>
                </div>
            </div>

            <!-- VAT (%) -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    VAT (%)
                </div>
                <div class="col">
                    : <?= $dataHeader['VATValue']; ?>
                </div>
            </div>

            <!-- VAT NUMBER -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    VAT Number
                </div>
                <div class="col">
                    : <?= $dataHeader['VATNumber']; ?>
                </div>
            </div>

            <!-- FAT/PAT/DO ORIGIN -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    FAT/PAT/DO Origin
                </div>
                <div class="col">
                    : <?= $dataHeader['FATPATDOOrigin']; ?>
                </div>
            </div>
        <?php } ?>

        <!-- FILE ATTACHMENT -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                File Attachment
            </div>
            <div class="col">
                : -
            </div>
        </div>
    </div>
</div>

<!-- RIGHT COLUMN -->
<div class="col-12 col-md-5 col-lg-5">
    <div class="form-group">
        <!-- CURRENCY -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                Currency
            </div>
            <div class="col">
                : <?= $dataHeader['currency']; ?>
            </div>
        </div>
        
        <!-- DELIVERY FROM -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                Delivery From
            </div>
            <div class="col">
                : <?= $dataHeader['supplierCode']; ?> - <?= $dataHeader['supplierName']; ?>
            </div>
        </div>

        <!-- DELIVERY TO -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                Delivery To
            </div>
            <div class="col">
                : -
            </div>
        </div>

        <?php if (!$dataHeader['dateUpdate']) { ?>
            <!-- ASSET -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    Asset
                </div>
                <div class="col">
                    : <?= $dataHeader['asset']; ?>
                </div>
            </div>

            <!-- CATEGORY -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    Category
                </div>
                <div class="col">
                    : <?= $dataHeader['assetCategoryCode']; ?> - <?= $dataHeader['assetCategoryName']; ?>
                </div>
            </div>

            <!-- DEPRECIATION METHOD -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    Depreciation Method
                </div>
                <div class="col">
                    : <?= $dataHeader['depreciationMethod']; ?>
                </div>
            </div>

            <!-- DEPRECIATION RATE -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    Depreciation Rate
                </div>
                <div class="col">
                    : <?= $dataHeader['depreciationRate']; ?>
                </div>
            </div>

            <!-- DEPRECIATION YEARS -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    Depreciation Years
                </div>
                <div class="col">
                    : <?= $dataHeader['depreciationYears']; ?>
                </div>
            </div>

            <!-- DEPRECIATION COA -->
            <div class="row">
                <div class="col-4 col-sm-4 col-md-3 col-lg-4 text-bold">
                    Depreciation COA
                </div>
                <div class="col">
                    : <?= $dataHeader['depreciationCOACode'] . " - " . $dataHeader['depreciationCOAName']; ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
