<!-- BODY -->
<div class="card-body">
    <div class="row py-3" style="gap: 15px;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <!-- PURCHASE ORDER -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">PO Number</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group">
                            <input id="purchase_order_number" class="form-control" readonly style="border-radius:0; cursor: default;" value="<?= $header['purchaseOrderNumber']; ?>" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- SUPPLIER -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group">
                            <input id="purchase_order_supplier_id" style="border-radius:0;" class="form-control" value="<?= $header['supplier_RefID']; ?>" hidden>
                            <input id="purchase_order_supplier" style="border-radius:0;" class="form-control" value="<?= $header['supplierCode'] . ' - ' . $header['supplierName']; ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CURRENCY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Currency</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group">
                            <input id="purchase_order_currency" style="border-radius:0;" class="form-control" value="<?= $header['currencyISOCode']; ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PAYMENT TERM -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Payment Term</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group">
                            <input id="purchase_order_payment_term" style="border-radius:0;" class="form-control" value="<?= $header['paymentTerm']; ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- DELIVERY FROM -->
            <div class="row" style="margin-bottom: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Delivery From</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group">
                            <textarea id="purchase_order_delivery_from" cols="20" rows="4" class="form-control" readonly><?= $header['deliveryFrom']; ?> - <?= $header['supplierAddress']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DELIVERY TO -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Delivery To</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group">
                            <textarea id="purchase_order_delivery_to" cols="20" rows="4" class="form-control" readonly><?= $header['deliveryTo']; ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>