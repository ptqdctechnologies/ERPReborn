<div class="col">
    <?php $currentRemarks = $dataHeader[0]['Remarks'] ?? $dataHeader[0]['remarks'] ?? $dataHeader[0]['RemarksDeliveryOrder'] ?? null; ?>
    <?php nl2br(e($currentRemarks)); ?>

    <?php if ($title === "ADVANCE FORM") { ?>
    <?php } else if ($title === "DELIVERY ORDER FORM") { ?>
    <?php } else if ($title === "PURCHASE ORDER FORM") { ?>
        <?= nl2br(e('-')); ?>
    <?php } else if ($title === "PURCHASE REQUISITION FORM") { ?>
        <?= nl2br(e($dataHeader[0]['remarks'])); ?>
    <?php } ?>
</div>