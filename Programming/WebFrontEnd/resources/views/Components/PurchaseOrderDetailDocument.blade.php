<!-- LEFT COLUMN -->
<div class="col-12 col-md-6 col-lg-6">
    <div class="form-group">
        <!-- PURCHASE ORDER NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                PO Number
            </div>
            <div class="col">
                : <?= $dataHeader['poNumber']; ?>
            </div>
        </div>

        <!-- BUDGET -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Budget
            </div>
            <div class="col">
                : <?= $dataHeader['budgetCode'] . " - " . $dataHeader['budgetName']; ?>
            </div>
        </div>

        <!-- SUB BUDGET -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Sub Budget
            </div>
            <div class="col">
                : <?= $dataHeader['subBudgetCode'] . " - " . $dataHeader['subBudgetName']; ?>
            </div>
        </div>

        <?php if (!isset($dataHeaderTransactionHistory)) { ?>
            <!-- VAT -->
            <div class="row" style="margin-bottom: 1rem; margin-top: 1rem;">
                <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                    VAT
                </div>
                <div class="col">
                    : <?= $dataHeader['ppn']; ?>
                </div>
            </div>
            
            <!-- DOWN PAYMENT -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                    DP
                </div>
                <div class="col">
                    : <?= $dataHeader['downPayment'] . "%"; ?>
                </div>
            </div>
            
            <!-- TOP -->
            <div class="row">
                <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                    TOP
                </div>
                <div class="col" style="line-height: normal;">
                    : <?= $dataHeader['termOfPayment']; ?>
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
            <!-- REVISION -->
            {{-- <div class="row" id="revisionAdvance" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-6 col-lg-4 text-bold">
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
                                <input type="hidden" name="id" value="<?= $dataHeader['purchaseOrderRefID']; ?>" />
                                <input type="hidden" name="docNum" value="<?= $dataHeader['poNumber']; ?>" />
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

            <!-- DELIVERY TO -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-6 col-lg-4 text-bold">
                    Delivery To
                </div>
                <div class="col">
                    : <?= $dataHeader['deliveryTo']; ?>
                </div>
            </div>

            <!-- SUPPLIER -->
            <div class="row" id="revisionAdvance" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-6 col-lg-4 text-bold">
                    Supplier
                </div>
                <div class="col" style="line-height: normal;">
                    : (<?= $dataHeader['supplierCode']; ?>) <?= $dataHeader['supplierName']; ?> - <?= $dataHeader['supplierAddress']; ?>
                </div>
            </div>
            
            <!-- PAYMENT NOTES -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-6 col-lg-4 text-bold">
                    Payment Notes
                </div>
                <div class="col">
                    : <?= $dataHeader['paymentNote']; ?>
                </div>
            </div>
            
            <!-- INTERNAL NOTE -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-6 col-lg-4 text-bold">
                    Internal Note
                </div>
                <div class="col">
                    : <?= $dataHeader['internalNote']; ?>
                </div>
            </div>

            <!-- FILE ATTACHMENT -->

            <!-- EXPORT -->
            <div class="row">
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-bold">
                    Export to PDF
                </div>
                <form method="POST" action="{{ route('CheckDocument.Export') }}">
                @csrf
                    <input type="hidden" name="transaction_RefID" id="transaction_RefID" value="<?= $transactionDetail_RefID; ?>">
                    <input type="hidden" name="transactionType" id="transactionType" value="<?= $transactionType; ?>">
                    <input type="hidden" name="print_type" id="print_type" value="PDF">
                    
                    <div class="col d-flex" style="gap: .2rem;">
                        <div>
                            :
                        </div>
                        {{-- <div>
                            <select name="print_type" id="print_type" class="form-control" style="width: max-content;">
                                <option value="PDF">PDF</option>
                                <option value="Excel">Excel</option>
                            </select>
                        </div> --}}
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
            <!-- SUPPLIER -->
            <div class="row" id="revisionAdvance" style="margin-bottom: 1rem;">
                <div class="col-4 col-sm-4 col-md-6 col-lg-4 text-bold">
                    Supplier
                </div>
                <div class="col" style="line-height: normal;">
                    : (<?= $dataHeader['supplierCode']; ?>) <?= $dataHeader['supplierName']; ?> - <?= $dataHeader['supplierAddress']; ?>
                </div>
            </div>

            <!-- FILE ATTACHMENT -->

            <!-- EXPORT -->
            <div class="row">
                <div class="col-4 col-sm-4 col-md-4 col-lg-4 text-bold">
                    Export to PDF
                </div>
                <form method="POST" action="{{ route('CheckDocument.Export') }}">
                @csrf
                    <input type="hidden" name="transaction_RefID" id="transaction_RefID" value="<?= $transactionDetail_RefID; ?>">
                    <input type="hidden" name="transactionType" id="transactionType" value="<?= $transactionType; ?>">
                    <input type="hidden" name="print_type" id="print_type" value="PDF">

                    <div class="col d-flex" style="gap: .2rem;">
                        <div>
                            :
                        </div>
                        {{-- <div>
                            <select name="print_type" id="print_type" class="form-control" style="width: max-content;">
                                <option value="PDF">PDF</option>
                                <option value="Excel">Excel</option>
                            </select>
                        </div> --}}
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
    </div>
</div>