<!-- LEFT COLUMN -->
<div class="col-12 col-md-6 col-lg-7">
    <div class="form-group">
        <!-- CUSTOMER ORDER NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Customer Order Number
            </div>
            <div class="col">
                : <?= $transactionNumber; ?>
            </div>
        </div>

        <!-- BUDGET CODE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Budget Code
            </div>
            <div class="col">
                : <?= $dataHeader['budgetCode']; ?> - <?= $dataHeader['budgetName']; ?>
            </div>
        </div>

        <!-- DATE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Date
            </div>
            <div class="col">
                : <?= $dataHeader['date']; ?>
            </div>
        </div>

        <!-- TYPE -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Type
            </div>
            <div class="col">
                : <?= $dataHeader['type'] == "PRODUCT_BASE" ? 'Product Base' : 'Sub Budget Base'; ?>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-md-5 col-lg-4">
    <div class="form-group">
        <!-- CURRENCY -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Currency
            </div>
            <div class="col">
                : <?= $dataHeader['currencyCode']; ?> - <?= $dataHeader['currencyName']; ?>
            </div>
        </div>

        <!-- VAT -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                VAT
            </div>
            <div class="col">
                : <?= $dataHeader['vatStatus'] == "YES" ? $dataHeader['vatRatio'] : 'No'; ?>
            </div>
        </div>

        <!-- FILE ATTACHMENT -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                File Attachment
            </div>
            <div class="col d-flex" style="gap: .2rem;">
                <div>
                    :
                </div>
                <?php if ($dataHeader['fileID']) { ?>
                <input type="text" id="dataInput_Log_FileUpload_1" name="dataInput_Log_FileUpload_1"
                    style="display:none">
                <?php    echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(
        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
        $varAPIWebToken,
        'dataInput_Log_FileUpload',
        $dataHeader['fileID']
    ) .
        ''; ?>
                <?php } else { ?>
                <div>-</div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>