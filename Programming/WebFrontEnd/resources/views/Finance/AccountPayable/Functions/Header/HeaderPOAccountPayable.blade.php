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
                        <span class="input-group-text form-control" style="border-radius:0;">
                            <a href="javascript:;" id="purchase_order_trigger" data-toggle="modal" data-target="#mySearchPO" style="display: block; cursor: pointer;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="box" />
                            </a>

                            <div id="purchase_order_loading" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                                <span class="sr-only">Loading...</span>
                            </div>
                        </span>
                    </div>
                    <div>
                        <div class="input-group">
                            <input id="purchase_order_number" class="form-control" size="16" readonly style="border-radius:0; background-color: white; cursor: default;" />
                            <input id="purchase_order_id" name="purchase_order_id" style="border-radius:0;" class="form-control" hidden />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="purchase_order_message" style="margin-top: .3rem; display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div class="text-red">
                        Purchase Order cannot be empty.
                    </div>
                </div>
            </div>

            <!-- SUPPLIER -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier</label>
                <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0">
                    <div>
                        <div class="input-group">
                            <input id="purchase_order_supplier" style="border-radius:0;" class="form-control" readonly>
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
                            <input id="purchase_order_currency" style="border-radius:0;" class="form-control" readonly>
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
                            <input id="purchase_order_payment_term" style="border-radius:0;" class="form-control" readonly>
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
                            <textarea id="purchase_order_delivery_from" cols="20" rows="4" class="form-control"></textarea>
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
                            <textarea id="purchase_order_delivery_to" cols="20" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>