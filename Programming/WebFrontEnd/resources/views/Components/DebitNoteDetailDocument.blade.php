<!-- LEFT COLUMN -->
<div class="col-12 col-md-6 col-lg-6">
    <div class="form-group">
        <!-- DEBIT NOTE NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-2 text-bold">
                DN Number
            </div>
            <div class="col">
                : <?= $dataHeader['dnNumber']; ?>
            </div>
        </div>

        <!-- DATE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-2 text-bold">
                Date
            </div>
            <div class="col">
                : <?= isset($dataHeader['date']) ? date('Y-m-d', strtotime($dataHeader['date'])) : '-'; ?>
            </div>
        </div>

        <!-- CUSTOMER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-2 text-bold">
                Customer
            </div>
            <div class="col">
                : <?= $dataHeader['customerCode']; ?> - <?= $dataHeader['customerName']; ?>
            </div>
        </div>
    </div>
</div>

<!-- RIGHT COLUMN -->
<div class="col-12 col-md-5 col-lg-5">
    <div class="form-group">
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