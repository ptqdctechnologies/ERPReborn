<!-- LEFT COLUMN -->
<div class="col-12 col-md-6 col-lg-6">
    <div class="form-group">
        <!-- DATE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Date
            </div>
            <div class="col">
                : <?= isset($dataHeader['date']) ? date('Y-m-d', strtotime($dataHeader['date'])) : '-'; ?>
            </div>
        </div>

        <!-- BUDGET CODE -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Budget Code
            </div>
            <div class="col">
                : <?= isset($dataHeader['budgetCode']) && isset($dataHeader['budgetName']) ? $dataHeader['budgetCode'] . ' - ' . $dataHeader['budgetName'] : '-'; ?>
            </div>
        </div>
    </div>
</div>
    
<!-- RIGHT COLUMN -->
<div class="col-12 col-md-5 col-lg-5">
    <div class="form-group">
        <!-- CURRENCY -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Currency
            </div>
            <div class="col">
                : <?= $dataHeader['currency']; ?>
            </div>
        </div>

        <!-- PIC -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                PIC
            </div>
            <div class="col">
                : <?= $dataHeader['pic']; ?>
            </div>
        </div>
    </div>
</div>