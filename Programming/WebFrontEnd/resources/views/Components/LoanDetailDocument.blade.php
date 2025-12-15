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

        <!-- LOAN TYPE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Loan Type
            </div>
            <div class="col">
                : <?= $dataHeader['loanType']; ?>
            </div>
        </div>

        <!-- LOAN TERM -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Term Loan
            </div>
            <div class="col">
                : <?= $dataHeader['loanTerm']; ?>
            </div>
        </div>

        <!-- CREDITORS -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Creditors
            </div>
            <div class="col">
                : <?= $dataHeader['creditors']; ?>
            </div>
        </div>

        <!-- DEBITORS -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Debitors
            </div>
            <div class="col">
                : <?= $dataHeader['debtor']; ?>
            </div>
        </div>
    </div>
</div>

<!-- RIGHT COLUMN -->
<div class="col-12 col-md-5 col-lg-5">
    <div class="form-group">
        <!-- BANK -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Bank
            </div>
            <div class="col">
                : <?= $dataHeader['bankName'] . ' - ' . $dataHeader['bankAccount']; ?> 
            </div>
        </div>

        <!-- PRINCIPAL LOAN -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Loan Amount
            </div>
            <div class="col">
                : 10,233.94
            </div>
        </div>

        <!-- LANDING RATE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Landing Rate
            </div>
            <div class="col">
                : <?= number_format($dataHeader['landingRate'], 2); ?>
            </div>
        </div>

        <!-- TOTAL RATE -->
        <!-- DIHAPUS -->
        {{-- <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Total Loan
            </div>
            <div class="col">
                : <?php number_format($dataHeader['totalRate'], 2); ?>
            </div>
        </div> --}}

        <!-- COA -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                COA
            </div>
            <div class="col">
                : <?= $dataHeader['COA']; ?>
            </div>
        </div>
    </div>
</div>