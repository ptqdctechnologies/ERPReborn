<div class="col-sm-12 col-md-3">
    <!-- BT NUMBER -->
    <div class="row" style="margin-bottom: 1rem; line-height: 16px;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            BT Number
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : <?= $dataHeader['btNumber']; ?>
        </div>
    </div>

    <!-- BT DATE -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            BT Date
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : <?= substr($dataHeader['brfDate'], 0, 10); ?>
        </div>
    </div>

    <!-- BUDGET -->
    <div class="row" style="margin-bottom: 1rem; line-height: 16px;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            Budget
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : <?= $dataHeader['budgetCode'] . ' - ' . $dataHeader['budgetName']; ?>
        </div>
    </div>

    <!-- SUB BUDGET -->
    <div class="row" style="margin-bottom: 1rem; line-height: 16px;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            Sub Budget
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : <?= $dataHeader['subBudgetCode'] . ' - ' . $dataHeader['subBudgetName']; ?>
        </div>
    </div>

    <!-- WORK -->
    <div class="row" style="margin-bottom: 1rem; line-height: 16px;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            Work
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : -
        </div>
    </div>

    <!-- PRODUCT -->
    <div class="row" style="margin-bottom: 1rem; line-height: 16px;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            Product
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : -
        </div>
    </div>

    <!-- CURRENCY -->
    <div class="row" style="margin-bottom: 1rem; line-height: 16px;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            Currency
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : -
        </div>
    </div>
</div>

<div class="col-sm-12 col-md-4">
    <!-- REQUESTER -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            Requester
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : <?= $dataHeader['requesterName']; ?>
        </div>
    </div>

    <!-- CONTACT PHONE -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            Contact Phone
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : <?= $dataHeader['contactPhone']; ?>
        </div>
    </div>

    <!-- DATE COMMENCE TRAVEL -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            Date Commence Travel
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : <?= substr($dataHeader['dateCommenceTravel'], 0, 10); ?>
        </div>
    </div>

    <!-- DATE END TRAVEL -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            Date End Travel
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : <?= substr($dataHeader['dateEndTravel'], 0, 10); ?>
        </div>
    </div>

    <!-- DEPARTING FROM -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            Departing From
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : <?= $dataHeader['departingFrom']; ?>
        </div>
    </div>

    <!-- DESTINATION TO -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            Destination To
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : <?= $dataHeader['destinationTo']; ?>
        </div>
    </div>

    <!-- DESCRIPTION -->
    <div class="row" style="line-height: 16px;">
        <div class="col-sm-4 col-md-4 p-0 text-bold">
            Description
        </div>
        <div class="col-sm-8 col-md-8 p-0">
            : <?= $dataHeader['description']; ?>
        </div>
    </div>
</div>