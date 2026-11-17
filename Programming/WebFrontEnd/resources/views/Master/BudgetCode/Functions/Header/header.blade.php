<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-4">
            <!-- BUDGET CODE -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Budget Code</label>
                <div class="col-4 pr-0">
                    <div class="input-group">
                        <input class="form-control" id="budget_code" name="budget_code" style="border-radius:0;"
                            autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row" id="budgetCodeMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col text-red" id="budgetCodeMessageText"></div>
            </div>

            <!-- BUDGET NAME -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Budget Name</label>
                <div class="col-4 pr-0">
                    <div class="input-group">
                        <input class="form-control" id="budget_name" name="budget_name" style="border-radius:0;"
                            autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="row" id="budgetNameMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col text-red" id="budgetNameMessageText"></div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-4">
            <!-- CUSTOMER -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Customer</label>
                <div class="col-6 d-flex" style="gap: 1rem;">
                    <div class="d-flex justify-content-sm-end justify-content-md-end">
                        <div>
                            <span id="myCustomerTrigger" class="input-group-text form-control" data-toggle="modal"
                                data-target="#myCustomers" style="border-radius:0;cursor:pointer;">
                                <i class="fas fa-gift"></i>
                            </span>
                        </div>
                        <div style="width: 100%;">
                            <input type="text" id="customer_preview" class="form-control"
                                style="border-radius:0;background-color:white;" readonly />
                            <input type="hidden" id="customer_id" class="form-control" style="border-radius:0;"
                                name="customer_id" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="customerMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col text-red" id="customerMessageText"></div>
            </div>
        </div>
    </div>
</div>