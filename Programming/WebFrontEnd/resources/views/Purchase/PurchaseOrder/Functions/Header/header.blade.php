<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT SIDE -->
        <div class="col-md-12 col-lg-5" style="display: flex; flex-direction: column; gap: 1rem;">
            <!-- SUPPLIER -->
            <span>
                @include('Components.supplier')
            </span>

            <!-- CURRENCY -->
            <span>
                @include('Components.currency')
            </span>

            <!-- EXCHANGE RATE -->
            <span>
                @include('Components.exchangeRate')
            </span>

            <!-- DOWN PAYMENT -->
            <span>
                @include('Components.downPayment')
            </span>

            <!-- TERM OF PAYMENT -->
            <span>
                @include('Components.termOfPayment')
            </span>

            <!-- PAYMENT NOTES -->
            <span>
                @include('Components.paymentNotes')
            </span>

            <!-- REMARK -->
            <span>
                @include('Components.remark')
            </span>
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-12 col-lg-5" style="display: flex; flex-direction: column; gap: 1rem;">
            <!-- DATE OF DELIVERY -->
            <span>
                @include('Components.dateOfDelivery')
            </span>

            <!-- DELIVERY TO -->
            <span>
                @include('Components.deliveryTo')
            </span>

            <!-- INTERNAL NOTE -->
            <span>
                @include('Components.internalNote')
            </span>
        </div>
    </div>
</div>