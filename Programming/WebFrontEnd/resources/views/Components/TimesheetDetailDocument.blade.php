<!-- LEFT COLUMN -->
<div class="col-12 col-md-6 col-lg-6">
    <div class="form-group">
        <!-- TIMESHEET NUMBER -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Timesheet Number
            </div>
            <div class="col">
                : <?= $dataHeader['timesheetNUmber']; ?>
            </div>
        </div>

        <!-- DATE -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Date
            </div>
            <div class="col">
                : <?= isset($dataHeader['date']) ? date('Y-m-d', strtotime($dataHeader['date'])) : '-'; ?>
            </div>
        </div>
    </div>
</div>

<!-- RIGHT COLUMN -->
<div class="col-12 col-md-5 col-lg-5">
    <div class="form-group">
        <!-- REVISION -->
        <div class="row" id="revisionAdvance" style="margin-bottom: 1rem;">
            <div class="col-4 text-bold">
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
                            <input type="hidden" name="id" value="<?= $dataHeader['advance_RefID']; ?>" />
                            <input type="hidden" name="docNum" value="<?= $dataHeader['timesheetNUmber']; ?>" />
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
                    : 0
                </div>
            <?php } ?>
        </div>
        
        <!-- AUTHORIZED BY -->
        <div class="row" style="margin-bottom: 1rem;">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                Authorized By
            </div>
            <div class="col">
                : <?= $dataHeader['authorizedCode']; ?> - <?= $dataHeader['authorizedName']; ?>
            </div>
        </div>

        <!-- ON BEHALF OF -->
        <div class="row">
            <div class="col-4 col-sm-4 col-md-4 col-lg-3 text-bold">
                On Behalf Of
            </div>
            <div class="col">
                : <?= $dataHeader['onBehalfOf']; ?>
            </div>
        </div>
    </div>
</div>