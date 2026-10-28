<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT SIDE -->
        <div class="col-md-12 col-lg-5" style="display: flex; flex-direction: column; gap: 1rem;">
            <?php if (isset($purchaseOrder_id)) { ?>
            <!-- PO NUMBER -->
            @include('Components.purchaseOrder')
            <?php } else { ?>
            <!-- PR NUMBER -->
            @include('Components.purchaseRequisition')
            <?php } ?>

            <!-- BUDGET CODE -->
            @include('Components.budgetCode')
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-12 col-lg-5" style="display: flex; flex-direction: column; gap: 1rem;">
            <?php if (!isset($purchaseOrder_id)) { ?>
            <!-- PR DELIVERY DATE -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    PR Delivery Date
                </label>
                <div class="col-5">
                    <div class="input-group">
                        <input type="text" id="pr_delivery_date" class="form-control" style="border-radius:0;"
                            readonly />
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    PR Delivery To
                </label>
                <div class="col-5">
                    <div class="input-group">
                        <input type="text" id="pr_delivery_to" class="form-control" style="border-radius:0;" readonly />
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>