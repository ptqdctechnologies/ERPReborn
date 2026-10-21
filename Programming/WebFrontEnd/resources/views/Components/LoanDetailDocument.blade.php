<!-- LEFT COLUMN -->
<div class="col-12 col-md-6 col-lg-6">
    <div class="form-group">
        <!-- LOAN NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Loan Number
            </div>
            <div class="col">
                : <?= $dataHeader['loanNumber']; ?>
            </div>
        </div>

        <!-- BUDGET CODE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Budget Code
            </div>
            <div class="col">
                : <?= $dataHeader['budgetCode'] . ' - ' . $dataHeader['budgetName']; ?>
            </div>
        </div>

        <!-- LOAN TYPE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Loan Type
            </div>
            <div class="col">
                : <?= $dataHeader['loanType']; ?>
            </div>
        </div>

        <!-- CREDITOR -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Creditor
            </div>
            <div class="col">
                : <?= $dataHeader['creditors']; ?>
            </div>
        </div>

        <!-- DEBITOR -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Debitor
            </div>
            <div class="col">
                : <?= $dataHeader['debitor']; ?>
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

        <!-- ACCOUNT NUMBER -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Account Number
            </div>
            <div class="col">
                : <?= $dataHeader['bankName'] . ' - ' . $dataHeader['bankAccount']; ?>
            </div>
        </div>
    </div>
</div>

<!-- RIGHT COLUMN -->
<div class="col-12 col-md-5 col-lg-5">
    <div class="form-group">
        <!-- LOAN DATE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Loan Date
            </div>
            <div class="col">
                : <?= $dataHeader['loanDate']; ?>
            </div>
        </div>

        <!-- COA -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                COA
            </div>
            <div class="col">
                : <?= $dataHeader['coaCode'] . ' - ' . $dataHeader['coaName']; ?>
            </div>
        </div>

        <?php if (!$dataHeader['dateUpdate']) { ?>
        <!-- LOAN PRINCIPAL -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Loan Principal
            </div>
            <div class="col">
                : -
            </div>
        </div>

        <!-- LENDING RATE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Lending Rate
            </div>
            <div class="col">
                : <?= number_format($dataHeader['lendingRate'], 2); ?>
            </div>
        </div>

        <!-- LOAN TERM -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Loan Term
            </div>
            <div class="col">
                : <?= $dataHeader['loanTerm']; ?>
            </div>
        </div>

        <!-- LOAN TOTAL -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Loan Total
            </div>
            <div class="col">
                : -
            </div>
        </div>
        <?php } ?>

        <!-- FILE ATTACHMENT -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                File Attachment
            </div>
            <div class="col">
                : -
            </div>
        </div>
    </div>
</div>