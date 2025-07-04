<!-- LEFT COLUMN -->
<div class="col-12 col-md-6 col-lg-6">
    <div class="form-group">
        <!-- DELIVERY ORDER NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                DO Number
            </div>
            <div class="col">
                : <?= $dataHeader['doNumber']; ?>
            </div>
        </div>
        
        <!-- DELIVERY FROM -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Delivery From
            </div>
            <div class="col">
                : <?= $dataHeader['deliveryFrom']; ?>
            </div>
        </div>
        
        <!-- DELIVERY TO -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Delivery To
            </div>
            <div class="col">
                : <?= $dataHeader['deliveryTo']; ?>
            </div>
        </div>
        
        <!-- BUDGET CODE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Budget Code
            </div>
            <div class="col">
                : <?= isset($dataHeader['budgetCode']) && isset($dataHeader['budgetName']) ? $dataHeader['budgetCode'] . ' - ' . $dataHeader['budgetName'] : '-'; ?>
            </div>
        </div>
        
        <!-- SUB BUDGET CODE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Sub Budget Code
            </div>
            <div class="col">
                : <?= isset($dataHeader['subBudgetCode']) && isset($dataHeader['subBudgetName']) ? $dataHeader['subBudgetCode'] . ' - ' . $dataHeader['subBudgetName'] : '-'; ?>
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
        <!-- REVISION -->
        <div class="row" id="revisionAdvance" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Revision
            </div>
            <?php if (isset($dataHeader['dateUpdate'])) { ?>
                <div class="col d-flex" style="gap: .1rem;">
                    <div>
                        :
                    </div>
                    <div class="input-group">
                        <button class="btn btn-default btn-sm" onclick="window.location.href='{{ route('LogTransaction', [
                            'id'        => $dataHeader['deliveryOrderRefID'],
                            'docNum'    => $dataHeader['doNumber'],
                            'docName'   => $transactionForm
                            ]) }}'">
                            Show Revision History
                        </button>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col">
                    : 0
                </div>
            <?php } ?>
        </div>

        <!-- TRANSPORTER NAME -->
        <div class="row" id="revisionAdvance" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Trans. Name
            </div>
            <div class="col">
                : <?= $dataHeader['transporterName']; ?>
            </div>
        </div>
        
        <!-- TRANSPORTER CONTACT PERSON -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Trans. Contact Person
            </div>
            <div class="col">
                : <?= $dataHeader['transporterContactPerson']; ?>
            </div>
        </div>
        
        <!-- TRANSPORTER PHONE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Trans. Phone
            </div>
            <div class="col">
                : <?= $dataHeader['transporterPhone']; ?>
            </div>
        </div>
        
        <!-- TRANSPORTER HANDPHONE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Trans. Handphone
            </div>
            <div class="col">
                : <?= $dataHeader['transporterHandphone']; ?>
            </div>
        </div>
        
        <!-- TRANSPORTER FAX -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Trans. Fax
            </div>
            <div class="col">
                : <?= $dataHeader['transporterFax']; ?>
            </div>
        </div>
        
        <!-- TRANSPORTER ADDRESS -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
                Trans. Address
            </div>
            <div class="col">
                : <?= $dataHeader['transporterAddress']; ?>
            </div>
        </div>
    </div>
</div>