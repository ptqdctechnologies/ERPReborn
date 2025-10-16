<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <!-- SUPPLIER -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier</label>
                <div class="col-5 d-flex">
                    <div style="flex: 100%;">
                        <input id="supplier_id" name="supplier_id" style="border-radius:0;" type="hidden" class="form-control" readonly value="<?= $header['supplierID']; ?>">
                        <input id="supplier_code" style="border-radius:0;" class="form-control" readonly value="<?= "(". $header['supplierCode'] . ") " . $header['supplierName'] . ' - ' . $header['supplierAddress']; ?>">
                        <input id="supplier_name" style="border-radius:0;" class="form-control" name="projectname" type="hidden" value="<?= $header['supplierAddress']; ?>">
                    </div>
                </div>
            </div>

            <!-- DP -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">DP</label>
                <div class="col-5 d-flex">
                    <div id="dp_section">
                        <input type="number" id="downPaymentValue" name="downPaymentValue" max="100" style="width: 25%;" autocomplete="off" value="<?= $header['downPayment']; ?>" /><strong>%</strong>
                    </div>
                </div>
            </div>
            <div class="row" id="dpMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        DP cannot be empty.
                    </div>
                </div>
            </div>

            <!-- TOP -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">TOP</label>
                <div class="col-5 d-flex">
                    <div id="containerLoadingTOP">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>
                    </div>

                    <div id="containerSelectTOP" style="display: none;">
                        <input hidden id="termOfPaymentID" style="width: 20%;" value="<?= $header['termOfPaymentID']; ?>" />
                        <select class="form-control" name="termOfPaymentValue" id="termOfPaymentOption" style="border-radius:0;" type="text">
                            <option disabled selected>Select a TOP</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- PAYMENT NOTES -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Payment Notes</label>
                <div class="col-5 d-flex">
                    <input id="paymentNotes" name="paymentNotes" style="border-radius:0;" type="text" class="form-control" value="<?= $header['paymentNotes']; ?>" autocomplete="off">
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- REMARK PO -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Remark PO</label>
                <div class="col-5 d-flex">
                    <input id="remarkPO" name="remarkPO" style="border-radius:0;" type="text" class="form-control" value="<?= $header['remarkPO']; ?>" autocomplete="off">
                </div>
            </div>
            
            <!-- INTERNAL NOTE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Internal Note</label>
                <div class="col-5">
                    <textarea name="internalNote" id="internalNote" cols="30" rows="4" class="form-control" autocomplete="off"><?= $header['internalNote']; ?></textarea>
                </div>
            </div>
        </div>
    </div>
</div>