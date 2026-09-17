<!-- LEFT COLUMN -->
<div class="col-12 col-md-6 col-lg-6">
    <div class="form-group">
        <!-- STOCK OPNAME NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Stock Opname Number
            </div>
            <div class="col">
                : <?= $transactionNumber; ?>
            </div>
        </div>

        <!-- DATE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Date
            </div>
            <div class="col">
                : <?= date('Y-m-d', strtotime($dataHeader['date'])); ?>
            </div>
        </div>

        <!-- TYPE -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Type
            </div>
            <div class="col">
                : <?= $dataHeader['type']; ?>
            </div>
        </div>

        <?php if ($dataHeader['type'] != "ALL") { ?>
        <!-- WAREHOUSE NAME -->
        <div class="row" style="margin-top: 1rem;">
            <div class="col-4 col-sm-4 col-md-3 col-lg-3 text-bold">
                Warehouse Name
            </div>
            <div class="col">
                : <?= $dataHeader['warehouseName'] ?? '-'; ?>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<!-- RIGHT COLUMN -->
<div class="col-12 col-md-5 col-lg-5">
    <div class="form-group">
    </div>
</div>