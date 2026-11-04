<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT SIDE -->
        <div class="col-md-12 col-lg-5" style="display: flex; flex-direction: column; gap: 1rem;">
            <!-- CURRENCY -->
            <span>
                @include('Components.currency')
            </span>

            <!-- EXCHANGE RATE -->
            <span>
                @include('Components.exchangeRate')
            </span>

            <!-- CUSTOMER ORDER REVISED -->
            <span>
                @include('Components.customerOrderRevised')
            </span>

            <!-- CUSTOMER ORDER VALUE -->
            <span id="customer_order_value_container" class="d-none">
                @include('Components.customerOrderValue')
            </span>
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-12 col-lg-5" style="display: flex; flex-direction: column; gap: 1rem;">
            <!-- REASON FOR MODIFY -->
            <span>
                @include('Components.reasonForModify')
            </span>
        </div>
    </div>
</div>