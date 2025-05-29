<!-- CONTENT -->
<div class="card-body">
    <div class="row" style="margin: .6rem 0rem; gap: 1rem;">
        <div class="col-sm-12 col-md-3">
            <!-- TOTAL ALLOWANCE -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-sm-4 col-md-5 p-0 text-bold">
                    Total Allowance
                </div>
                <div class="col-sm-8 col-md-7 p-0">
                    : <?= number_format($dataAdditional['allowance'], 2); ?>
                </div>
            </div>

            <!-- TOTAL TRANSPORT -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-sm-4 col-md-5 p-0 text-bold">
                    Total Transport
                </div>
                <div class="col-sm-8 col-md-7 p-0">
                    : <?= number_format($dataAdditional['transport'], 2); ?>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4">
            <!-- TOTAL ENTERTAINMENT -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-sm-4 col-md-5 p-0 text-bold">
                    Total Entertainment
                </div>
                <div class="col-sm-8 col-md-7 p-0">
                    : <?= number_format($dataAdditional['entertainment'], 2); ?>
                </div>
            </div>

            <!-- TOTAL ACCOMMODATION -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-sm-4 col-md-5 p-0 text-bold">
                    Total Accommodation
                </div>
                <div class="col-sm-8 col-md-7 p-0">
                    : <?= number_format($dataAdditional['accommodation'], 2); ?>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-3">
            <!-- TOTAL OTHER -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-sm-4 col-md-6 p-0 text-bold">
                    Total Other
                </div>
                <div class="col-sm-8 col-md-6 p-0">
                    : <?= number_format($dataAdditional['other'], 2); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-0">
        <hr class="m-0" style="width: 100%;"/>
    </div>
    <div class="row" style="margin-top: 1rem; gap: 1rem;">
        <div class="d-sm-none d-md-block col-sm-12 col-md-3"></div>
        <div class="d-sm-none d-md-block col-sm-12 col-md-4"></div>
        <div class="col-sm-12 col-md-3">
            <!-- TOTAL BUSINESS TRIP -->
            <div class="row" style="margin-bottom: 1rem;">
                <div class="col-sm-4 col-md-6 p-0 text-bold">
                    Total Business Trip
                </div>
                <div class="col-sm-8 col-md-6 p-0">
                    : <?= number_format($dataAdditional['totalBRF'], 2); ?>
                </div>
            </div>
        </div>
    </div>
</div>
