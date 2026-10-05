<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT SIDE -->
        <div class="col-md-12 col-lg-5">
            <!-- REQUESTER -->
            <span>
                @include('getFunction.getRequester')
            </span>

            <!-- TOTAL PAYMENT -->
            <div class="row" style="margin-top: 1rem; display: <?= isset($total_payment) ? 'flex' : 'none' ?>;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">
                    Total Payment
                </label>
                <div class="col-5">
                    <div class="input-group">
                        <input type="text" id="total_payment" class="form-control"
                            value="<?= isset($total_payment) ? $total_payment : '0.00'; ?>"
                            style="border-radius:0; background-color: #e9ecef;" readonly />
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-12 col-lg-5" style="display: grid; gap: 1rem;">
            <!-- BENEFICIARY -->
            <span>
                @include('getFunction.getBeneficiary')
            </span>

            <!-- BANK NAME -->
            <span>
                @include('getFunction.getBanks')
            </span>

            <!-- ACCOUNT NUMBER -->
            <span>
                @include('getFunction.getBankAccounts')
            </span>
        </div>
    </div>
</div>