<!-- LEFT COLUMN -->
<div class="col-12 col-md-6 col-lg-6">
    <div class="form-group">
        <!-- DATE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Date
            </div>
            <div class="col">
                : <?= isset($dataHeader['date']) ? date('Y-m-d', strtotime($dataHeader['date'])) : '-'; ?>
            </div>
        </div>

        <!-- BUDGET CODE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Budget Code
            </div>
            <div class="col">
                : <?= isset($dataHeader['budgetCode']) && isset($dataHeader['budgetName']) ? $dataHeader['budgetCode'] . ' - ' . $dataHeader['budgetName'] : '-'; ?>
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
                    <input type="text" id="dataInput_Log_FileUpload_1" name="dataInput_Log_FileUpload_1" style="display:none">
                    <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(
                    \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'dataInput_Log_FileUpload',
                    $dataHeader['fileID']
                    ).
                    ''; ?>
                <?php } else { ?>
                    <div>-</div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- RIGHT COLUMN -->
<div class="col-12 col-md-5 col-lg-5">
    <div class="form-group">
        <!-- CURRENCY -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Customer
            </div>
            <div class="col">
                : <?= $dataHeader['customer']; ?>
            </div>
        </div>

        <!-- PIC -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                VAT 
            </div>
            <div class="col">
                : <?= $dataHeader['vat']; ?>
            </div>
        </div>

        <!-- CURRENCY -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Currency
            </div>
            <div class="col">
                : <?= $dataHeader['currency']; ?>
            </div>
        </div>
    </div>
</div>