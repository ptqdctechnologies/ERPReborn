<!-- LEFT COLUMN -->
<div class="col-12 col-md-6 col-lg-7">
    <div class="form-group">
        <!-- ADVANCE FORM -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Advance Form
            </div>
            <div class="col">
                : <?= $dataHeader['advanceNumber']; ?>
            </div>
        </div>

        <!-- DATE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Date
            </div>
            <div class="col">
                : <?= isset($dataHeader['date']) ? date('Y-m-d', strtotime($dataHeader['date'])) : '-'; ?>
            </div>
        </div>

        <!-- CURRENCY -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Currency
            </div>
            <div class="col">
                : <?= $dataHeader['currency']; ?>
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

        <!-- SUB BUDGET CODE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Sub Budget Code
            </div>
            <div class="col">
                : <?= isset($dataHeader['subBudgetCode']) && isset($dataHeader['subBudgetName']) ? $dataHeader['subBudgetCode'] . ' - ' . $dataHeader['subBudgetName'] : '-'; ?>
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
<div class="col-12 col-md-5 col-lg-4">
    <div class="form-group">
        <!-- REVISION -->
        <div class="row" id="revisionAdvance" style="margin-bottom: 1rem;">
            <div class="col-4 text-bold">
                Revision
            </div>
            <?php if (isset($dataHeader['dateUpdate'])) { ?>
                <div class="col d-flex" style="gap: .1rem;">
                    <div>
                        :
                    </div>
                    <div class="input-group">
                        <button class="btn btn-default btn-sm" onclick="window.location.href='{{ route('LogTransaction', [
                            'id'        => $dataHeader['Sys_ID_Advance'],
                            'docNum'    => $dataHeader['DocumentNumber'],
                            'docName'   => $dataHeader['BusinessDocumentType_Name']
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

        <!-- REQUESTER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 text-bold">
                Requester
            </div>
            <div class="col">
                : <?= $dataHeader['requesterName']; ?>
            </div>
        </div>

        <!-- BENEFICIARY -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 text-bold">
                Beneficiary
            </div>
            <div class="col">
                : <?= $dataHeader['beneficiaryName']; ?>
            </div>
        </div>

        <!-- BANK NAME -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 text-bold">
                Bank Name
            </div>
            <div class="col">
                : <?= $dataHeader['bankName']; ?>
            </div>
        </div>

        <!-- ACCOUNT NAME -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 text-bold">
                Account Name
            </div>
            <div class="col">
                : <?= $dataHeader['accountName']; ?>
            </div>
        </div>

        <!-- ACCOUNT NUMBER -->
        <div class="row">
            <div class="col-4 text-bold">
                Account Number
            </div>
            <div class="col">
                : <?= $dataHeader['accountNumber']; ?>
            </div>
        </div>
    </div>
</div>

<script>
    let currentLocation = window.location.href;

    if (currentLocation.includes("ReportAdvanceSummaryDetail")) {
        $('#revisionAdvance').hide();
    }
</script>