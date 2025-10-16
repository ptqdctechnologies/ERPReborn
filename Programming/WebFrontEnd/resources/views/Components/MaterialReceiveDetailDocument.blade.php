<!-- LEFT COLUMN -->
<div class="col-12 col-md-5 col-lg-5">
    <div class="form-group">
        <!-- MATERIAL RECEIVE NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                MR Number
            </div>
            <div class="col">
                : <?= $dataHeader['mrNumber']; ?>
            </div>
        </div>

        <?php if (!isset($dataHeaderTransactionHistory)) { ?>
            <!-- DELIVERY ORDER NUMBER -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                    DO Number
                </div>
                <div class="col">
                    : <?= $dataHeader['doNumber']; ?>
                </div>
            </div>

            <!-- DATE -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                    Date
                </div>
                <div class="col">
                    : <?= isset($dataHeader['date']) ? date('Y-m-d', strtotime($dataHeader['date'])) : '-'; ?>
                </div>
            </div>

            <!-- BUDGET -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                    Budget
                </div>
                <div class="col">
                    : <?= isset($dataHeader['budgetCode']) && isset($dataHeader['budgetName']) ? $dataHeader['budgetCode'] . ' - ' . $dataHeader['budgetName'] : '-'; ?>
                </div>
            </div>

            <!-- SUB BUDGET -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                    Sub Budget
                </div>
                <div class="col">
                    : <?= isset($dataHeader['subBudgetCode']) && isset($dataHeader['subBudgetName']) ? $dataHeader['subBudgetCode'] . ' - ' . $dataHeader['subBudgetName'] : '-'; ?>
                </div>
            </div>

            <!-- FILE ATTACHMENT -->
        <?php } else { ?>
            <!-- BUDGET -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                    Budget
                </div>
                <div class="col">
                    : <?= isset($dataHeader['budgetCode']) && isset($dataHeader['budgetName']) ? $dataHeader['budgetCode'] . ' - ' . $dataHeader['budgetName'] : '-'; ?>
                </div>
            </div>

            <!-- SUB BUDGET -->
            <div class="row">
                <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                    Sub Budget
                </div>
                <div class="col">
                    : <?= isset($dataHeader['subBudgetCode']) && isset($dataHeader['subBudgetName']) ? $dataHeader['subBudgetCode'] . ' - ' . $dataHeader['subBudgetName'] : '-'; ?>
                </div>
            </div>
        <?php } ?>

        <!-- FILE ATTACHMENT -->
        <div class="row" style="margin-top: 1rem;">
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
        <?php if (!isset($dataHeaderTransactionHistory)) { ?>
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
        <?php } else { ?>
            <!-- FILE ATTACHMENT -->
        <?php } ?>

        <!-- REVISION -->
        {{-- <div class="row" id="revisionAdvance" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Revision
            </div>
            <?php if (isset($dataHeader['dateUpdate'])) { ?>
                <div class="col d-flex" style="gap: .1rem;">
                    <div>
                        :
                    </div>
                    <div class="input-group">
                        <form method="POST" action="{{ route('LogTransaction') }}">
                            @csrf
                            <input type="hidden" name="id" value="<?php $dataHeader['materialReceive_RefID']; ?>" />
                            <input type="hidden" name="docNum" value="<?php $dataHeader['mrNumber']; ?>" />
                            <input type="hidden" name="docName" value="<?php $transactionForm; ?>" />
                            <input type="hidden" name="page" value="<?php $page; ?>" />
                            <button type="submit" class="btn btn-default btn-sm">
                                Show Revision History
                            </button>
                        </form>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col">
                    : -
                </div>
            <?php } ?>
        </div> --}}
    </div>
</div>