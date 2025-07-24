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
        <?php } else { ?>
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
        <?php } ?>
    </div>
</div>

<!-- RIGHT COLUMN -->
<div class="col-12 col-md-5 col-lg-5">
    <div class="form-group">
        <?php if (!isset($dataHeaderTransactionHistory)) { ?>
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
                <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold" style="margin-bottom: 1rem;">
                    Trans. Address
                </div>
                <div class="col">
                    : <?= $dataHeader['transporterAddress']; ?>
                </div>
            </div>

            <!-- EXPORT -->
            <div class="row">
                <div class="col-4 col-sm-4 col-md-4 col-lg-5 text-bold">
                    Export
                </div>
                <form method="POST" action="{{ route('CheckDocument.Export') }}">
                @csrf
                    <input type="hidden" name="transaction_RefID" id="transaction_RefID" value="<?= $transactionDetail_RefID; ?>">
                    <input type="hidden" name="transactionType" id="transactionType" value="<?= $transactionType; ?>">

                    <div class="col d-flex" style="gap: .2rem;">
                        <div>
                            :
                        </div>
                        <div>
                            <select name="print_type" id="print_type" class="form-control" style="width: max-content;">
                                <option value="PDF">PDF</option>
                                {{-- <option value="Excel">Excel</option> --}}
                            </select>
                        </div>
                        <div style="margin-left: .3rem;">
                            <button class="btn btn-default btn-sm" type="submit">
                                <span>
                                    <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="">
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        <?php } else { ?>
            <!-- FILE ATTACHMENT -->
            <div class="row" style="margin-bottom: 1rem;">
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

            <!-- EXPORT -->
            <div class="row">
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-bold">
                    Export
                </div>
                <form method="POST" action="{{ route('CheckDocument.Export') }}">
                @csrf
                    <input type="hidden" name="transaction_RefID" id="transaction_RefID" value="<?= $transactionDetail_RefID; ?>">
                    <input type="hidden" name="transactionType" id="transactionType" value="<?= $transactionType; ?>">

                    <div class="col d-flex" style="gap: .2rem;">
                        <div>
                            :
                        </div>
                        <div>
                            <select name="print_type" id="print_type" class="form-control" style="width: max-content;">
                                <option value="PDF">PDF</option>
                                {{-- <option value="Excel">Excel</option> --}}
                            </select>
                        </div>
                        <div style="margin-left: .3rem;">
                            <button class="btn btn-default btn-sm" type="submit">
                                <span>
                                    <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="">
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>

        <!-- REVISION -->
        {{-- <div class="row" id="revisionAdvance" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-6 col-lg-5 text-bold">
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
                            <input type="hidden" name="id" value="<?= $dataHeader['deliveryOrderRefID']; ?>" />
                            <input type="hidden" name="docNum" value="<?= $dataHeader['doNumber']; ?>" />
                            <input type="hidden" name="docName" value="<?= $transactionForm; ?>" />
                            <input type="hidden" name="page" value="<?= $page; ?>" />
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