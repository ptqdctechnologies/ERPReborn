<!-- LEFT COLUMN -->
<div class="col-12 col-md-6 col-lg-6">
    <div class="form-group">
        <!-- DELIVERY ORDER NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                DO Number
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['documentNumber']) ? $dataHeader[0]['documentNumber'] : ($businessDocumentNumber ?? '-') ?>
            </div>
        </div>
        
        <!-- DELIVERY FROM -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Delivery From
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['deliveryFrom_NonRefID']['Address']) ? $dataHeader[0]['deliveryFrom_NonRefID']['Address'] : '-'; ?>
            </div>
        </div>
        
        <!-- DELIVERY TO -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Delivery To
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['deliveryTo_NonRefID']['Address']) ? $dataHeader[0]['deliveryTo_NonRefID']['Address'] : '-'; ?>
            </div>
        </div>
        
        <!-- BUDGET CODE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Budget Code
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['combinedBudgetCode']) && isset($dataHeader[0]['combinedBudgetName']) ? $dataHeader[0]['combinedBudgetCode'] . ' - ' . $dataHeader[0]['combinedBudgetName'] : '-'; ?>
            </div>
        </div>
        
        <!-- SUB BUDGET CODE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Sub Budget Code
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['combinedBudgetSectionCode']) && isset($dataHeader[0]['combinedBudgetSectionName']) ? $dataHeader[0]['combinedBudgetSectionCode'] . ' - ' . $dataHeader[0]['combinedBudgetSectionName'] : '-'; ?>
            </div>
        </div>
        
        <!-- FILE ATTACHMENT -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                File Attachment
            </div>
            <div class="col d-flex" style="gap: .2rem;">
                <div>
                    :
                </div>
                <?php if (isset($dataHeader[0]['log_FileUpload_Pointer_RefID']) && $dataHeader[0]['log_FileUpload_Pointer_RefID']) { ?>
                    <input type="text" id="dataInput_Log_FileUpload_1" name="dataInput_Log_FileUpload_1" style="display:none">
                    <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(
                        \App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                        $varAPIWebToken,
                        'dataInput_Log_FileUpload',
                        $dataHeader[0]['log_FileUpload_Pointer_RefID']
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
        <!-- TRANSPORTER NAME -->
        <div class="row" id="revisionAdvance" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Trans. Name
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['transporterName']) ? $dataHeader[0]['transporterName'] : '-'; ?>
            </div>
        </div>
        
        <!-- TRANSPORTER CONTACT PERSON -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Trans. Contact Person
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['transporterContactPerson']) ? $dataHeader[0]['transporterContactPerson'] : '-'; ?>
            </div>
        </div>
        
        <!-- TRANSPORTER PHONE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Trans. Phone
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['transporterPhone']) ? $dataHeader[0]['transporterPhone'] : '-'; ?>
            </div>
        </div>
        
        <!-- TRANSPORTER HANDPHONE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Trans. Handphone
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['transporterHandphone']) ? $dataHeader[0]['transporterHandphone'] : '-'; ?>
            </div>
        </div>
        
        <!-- TRANSPORTER FAX -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Trans. Fax
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['transporterFax']) ? $dataHeader[0]['transporterFax'] : '-'; ?>
            </div>
        </div>
        
        <!-- TRANSPORTER ADDRESS -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Trans. Address
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['transporterAddress']) ? $dataHeader[0]['transporterAddress'] : '-'; ?>
            </div>
        </div>
    </div>
</div>