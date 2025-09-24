<!-- LEFT COLUMN -->
<div class="col-12 col-md-5 col-lg-5">
    <div class="form-group">
        <!-- MATERIAL RECEIVE NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Material Return Number
            </div>
            <div class="col">
                : <?= $dataHeader['materialReturnNumber']; ?>
            </div>
        </div>

        <!-- DATE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Date
            </div>
            <div class="col">
                : 2025-09-18
            </div>
        </div>

        <!-- BUDGET CODE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Budget Code
            </div>
            <div class="col">
                : <?= $dataHeader['budgetCode']; ?> - <?= $dataHeader['budgetName']; ?>
            </div>
        </div>

        <!-- TRANSPORTER NAME -->
        <div class="row" id="revisionAdvance" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Trans. Name
            </div>
            <div class="col">
                : <?= $dataHeader['transporterName']; ?>
            </div>
        </div>
        
        <!-- TRANSPORTER CONTACT PERSON -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Trans. Contact Person
            </div>
            <div class="col">
                : <?= $dataHeader['transporterContactPerson']; ?>
            </div>
        </div>
    </div>
</div>

<!-- RIGHT COLUMN -->
<div class="col-12 col-md-5 col-lg-5">
    <div class="form-group">
        <!-- MATERIAL RECEIVE NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-bold">
                Material Receive Number
            </div>
            <div class="col">
                : WHIn/QDC/2025/000093
            </div>
        </div>

        <!-- TRANSPORTER PHONE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-bold">
                Trans. Phone
            </div>
            <div class="col">
                : <?= $dataHeader['transporterPhone']; ?>
            </div>
        </div>

        <!-- TRANSPORTER HANDPHONE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-bold">
                Trans. Handphone
            </div>
            <div class="col">
                : <?= $dataHeader['transporterHandphone']; ?>
            </div>
        </div>

        <!-- TRANSPORTER FAX -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-bold">
                Trans. Fax
            </div>
            <div class="col">
                : <?= $dataHeader['transporterFax']; ?>
            </div>
        </div>

        <!-- TRANSPORTER ADDRESS -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-bold" style="margin-bottom: 1rem;">
                Trans. Address
            </div>
            <div class="col">
                : <?= $dataHeader['transporterAddress']; ?>
            </div>
        </div>

        <!-- FILE ATTACHMENT -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-bold">
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