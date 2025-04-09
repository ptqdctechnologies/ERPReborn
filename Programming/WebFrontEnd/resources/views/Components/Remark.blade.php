<div class="col">
    <?php $currentRemarks = $dataHeader[0]['Remarks'] ?? $dataHeader[0]['remarks'] ?? $dataHeader[0]['RemarksDeliveryOrder'] ?? null; ?>
    <?= nl2br(e($currentRemarks)); ?>
</div>