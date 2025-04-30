<!-- LEFT COLUMN -->
<div class="col-12 col-md-6 col-lg-6">
    <div class="form-group">
        <!-- PURCHASE ORDER NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                PO Number
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['documentNumber']) ? $dataHeader[0]['documentNumber'] : ($businessDocumentNumber ?? '-') ?>
            </div>
        </div>
        
        <!-- DELIVERY TO -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Delivery To
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['deliveryDestinationManualAddress']) ? $dataHeader[0]['deliveryDestinationManualAddress'] : '-'; ?>
            </div>
        </div>
        
        <!-- DOWN PAYMENT -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                DP
            </div>
            <div class="col">
                : -
            </div>
        </div>
        
        <!-- TOP -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                TOP
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['paymentTerm']) ? $dataHeader[0]['paymentTerm'] : '-'; ?>
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
        <!-- SUPPLIER CODE -->
        <div class="row" id="revisionAdvance" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Supplier Code
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['supplierCode']) ? $dataHeader[0]['supplierCode'] : '-'; ?>
            </div>
        </div>

        <!-- SUPPLIER NAME -->
        <div class="row" id="revisionAdvance" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Supplier Name
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['supplierName']) ? $dataHeader[0]['supplierName'] : '-'; ?>
            </div>
        </div>
        
        <!-- SUPPLIER ADDRESS -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Supplier Address
            </div>
            <div class="col">
                : <?= isset($dataHeader[0]['supplierAddress']) ? $dataHeader[0]['supplierAddress'] : '-'; ?>
            </div>
        </div>
        
        <!-- PAYMENT NOTES -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Payment Notes
            </div>
            <div class="col">
                : -
            </div>
        </div>
        
        <!-- INTERNAL NOTE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Internal Note
            </div>
            <div class="col">
                : -
            </div>
        </div>
    </div>
</div>