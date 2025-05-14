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

<div class="col-sm-12 col-md-4">
    <!-- DATE COMMENCE TRAVEL -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-6 p-0 text-bold">
            Date Commence Travel
        </div>
        <div class="col-sm-8 col-md-6 p-0">
            : <?= $dataHeader['dateCommenceTravel']; ?>
        </div>
    </div>

    <!-- DATE END TRAVEL -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-6 p-0 text-bold">
            Date End Travel
        </div>
        <div class="col-sm-8 col-md-6 p-0">
            : <?= $dataHeader['dateEndTravel']; ?>
        </div>
    </div>

    <!-- BRF DATE -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-6 p-0 text-bold">
            BRF Date
        </div>
        <div class="col-sm-8 col-md-6 p-0">
            : <?= $dataHeader['brfDate']; ?>
        </div>
    </div>

    <!-- CONTACT PHONE -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-6 p-0 text-bold">
            Contact Phone
        </div>
        <div class="col-sm-8 col-md-6 p-0">
            : <?= $dataHeader['contactPhone']; ?>
        </div>
    </div>

    <!-- BANK ACCOUNT -->
    <div class="row">
        <div class="col-sm-4 col-md-6 p-0 text-bold">
            Bank Account
        </div>
        <div class="col-sm-8 col-md-6 p-0" style="line-height: 16px;">
            : (<?= $dataHeader['bankName']; ?>) <?= $dataHeader['accountNumber'] . ' - ' . $dataHeader['bankAccount']; ?>
        </div>
    </div>
</div>

<div class="col-sm-12 col-md-3">
    <!-- REQUESTER -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-6 p-0 text-bold">
            Requester
        </div>
        <div class="col-sm-8 col-md-6 p-0">
            : <?= $dataHeader['requesterName']; ?>
        </div>
    </div>

    <!-- BENEFICIARY -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-6 p-0 text-bold">
            Beneficiary
        </div>
        <div class="col-sm-8 col-md-6 p-0">
            : <?= $dataHeader['beneficiaryName']; ?>
        </div>
    </div>

    <!-- DEPARTING FROM -->
    <div class="row" style="margin-bottom: 1rem;">
        <div class="col-sm-4 col-md-6 p-0 text-bold">
            Departing From
        </div>
        <div class="col-sm-8 col-md-6 p-0">
            : <?= $dataHeader['departingFrom']; ?>
        </div>
    </div>

    <!-- DESTINATION TO -->
    <div class="row">
        <div class="col-sm-4 col-md-6 p-0 text-bold">
            Destination To
        </div>
        <div class="col-sm-8 col-md-6 p-0">
            : <?= $dataHeader['destinationTo']; ?>
        </div>
    </div>
</div>