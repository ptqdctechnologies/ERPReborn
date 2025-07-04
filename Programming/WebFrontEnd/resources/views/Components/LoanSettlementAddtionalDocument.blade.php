<div class="card-body">
    <div class="row" style="margin: .6rem 0rem; gap: 1rem;">
        <!-- LEFT COLUMN -->
        <div class="col-12 col-md-6 col-lg-6">
            <div class="form-group">
                <!-- PENALTY VALUE -->
                <div class="row" style="margin-bottom: 1rem;">
                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold" style="line-height: normal;">
                        Penalty Value
                    </div>
                    <div class="col">
                        : <?= number_format($dataAdditional['penaltyValue'], 2); ?>
                    </div>
                </div>

                <!-- PENALTY COA -->
                <div class="row" style="margin-bottom: 1rem;">
                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold" style="line-height: normal;">
                        Penalty COA
                    </div>
                    <div class="col">
                        : <?= number_format($dataAdditional['penaltyCOA'], 2); ?>
                    </div>
                </div>

                <!-- INTEREST VALUE -->
                <div class="row">
                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold" style="line-height: normal;">
                        Interest Value
                    </div>
                    <div class="col">
                        : <?= number_format($dataAdditional['interestValue'], 2); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-12 col-md-5 col-lg-5">
            <div class="form-group">
                <!-- INTEREST COA -->
                <div class="row" style="margin-bottom: 1rem;">
                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold" style="line-height: normal;">
                        Interest COA
                    </div>
                    <div class="col">
                        : <?= number_format($dataAdditional['interestCOA'], 2); ?>
                    </div>
                </div>

                <!-- TOTAL SETTLEMENT -->
                <div class="row">
                    <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold" style="line-height: normal;">
                        Total Settlement
                    </div>
                    <div class="col">
                        : <?= number_format($dataAdditional['totalSettlement'], 2); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>