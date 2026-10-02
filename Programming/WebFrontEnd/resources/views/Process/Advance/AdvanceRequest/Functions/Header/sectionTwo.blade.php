<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT SIDE -->
        <div class="col-md-12 col-lg-5">
            <!-- REQUESTER -->
            @include('getFunction.getRequester')
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