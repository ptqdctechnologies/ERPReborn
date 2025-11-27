<!-- LEFT COLUMN -->
<div class="col-12 col-md-6 col-lg-7">
    <div class="form-group">
        <!-- CUSTOMER ORDER NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Customer Order Number
            </div>
            <div class="col">
                : <?= $transactionNumber; ?>
            </div>
        </div>
    </div>
</div>

<div class="col-12 col-md-5 col-lg-4">
    <div class="form-group">
        <!-- REQUESTER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 text-bold">
                Currency
            </div>
            <div class="col">
                : <?= $dataHeader['currency']; ?>
            </div>
        </div>
    </div>
</div>