<!-- CONTENT -->
<div class="card-body">
    <div class="row" style="margin: .6rem 0rem; gap: 1rem;">
        <div class="col-sm-12 col-md-4">
            <!-- SETTLEMENT VALUE -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-sm-4 col-md-4 p-0 text-bold">
                    Settlement Value
                </div>
                <div class="col-sm-8 col-md-7 p-0">
                    : <?= number_format($dataHeader['settlementValue'], 2, '.', ','); ?>
                </div>
            </div>

            <!-- PENALTY VALUE -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-sm-4 col-md-4 p-0 text-bold">
                    Penalty Value
                </div>
                <div class="col-sm-8 col-md-7 p-0">
                    : <?= number_format($dataHeader['penaltyValue'], 2, '.', ','); ?>
                </div>
            </div>

            <!-- INTEREST VALUE -->
            <div class="row">
                <div class="col-sm-4 col-md-4 p-0 text-bold">
                    Interest Value
                </div>
                <div class="col-sm-8 col-md-7 p-0">
                    : <?= number_format($dataHeader['interestValue'], 2, '.', ','); ?>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4">
            <!-- COA PENALTY -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-sm-4 col-md-3 p-0 text-bold">
                    COA Penalty
                </div>
                <div class="col-sm-8 col-md-7 p-0">
                    : <?= $dataHeader['coaPenaltyCode'] . ' - ' . $dataHeader['coaPenaltyName']; ?>
                </div>
            </div>

            <!-- COA INTEREST -->
            <div class="row">
                <div class="col-sm-4 col-md-3 p-0 text-bold">
                    COA Interest
                </div>
                <div class="col-sm-8 col-md-7 p-0">
                    : <?= $dataHeader['coaInterestCode'] . ' - ' . $dataHeader['coaInterestName']; ?>
                </div>
            </div>
        </div>
    </div>
</div>