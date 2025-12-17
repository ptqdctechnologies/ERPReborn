<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <!-- SUPPLIER -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="supplier_code2" data-toggle="modal" data-target="#mySuppliers" style="display: block;">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="mySuppliersTrigger">
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <input id="supplier_id" name="supplier_id" class="form-control" style="border-radius:0;" readonly hidden />
                        <input id="supplier_code" class="form-control" style="border-radius:0;" readonly hidden />
                        <input id="supplier_name" class="form-control" style="border-radius:0;background-color: white;" name="projectname" readonly>
                    </div>
                </div>
            </div>
            <div class="row" id="supplierMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red">
                    Supplier cannot be empty.
                </div>
            </div>

            <!-- DP -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">DP</label>
                <div class="col-5 d-flex">
                    <div id="dp_section">
                        <input type="number" id="downPaymentValue" name="downPaymentValue" max="100" style="width: 25%;" autocomplete="off" /> <strong>%</strong>
                    </div>
                </div>
            </div>
            <div class="row" id="dpMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red">
                    DP cannot be empty.
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
                        <select class="form-control" name="termOfPaymentValue" id="termOfPaymentOption" style="border-radius:0;" type="text">
                            <option disabled selected>Select a TOP</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" id="topMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red">
                    TOP cannot be empty.
                </div>
            </div>

            <!-- PAYMENT NOTES -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Payment Notes</label>
                <div class="col-5 d-flex">
                    <input id="paymentNotes" name="paymentNotes" style="border-radius:0;" type="text" class="form-control" autocomplete="off" />
                </div>
            </div>

            <!-- REMARK PO -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Remark PO</label>
                <div class="col-5 d-flex">
                    <input id="remarkPO" name="remarkPO" style="border-radius:0;" type="text" class="form-control" autocomplete="off" />
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- DATE OF DELIVERY -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date of Delivery</label>
                <div class="col-5 input-group date" id="startDate" data-target-input="nearest" style="flex-wrap: nowrap;">
                    <div>
                        <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker" style="width: 27.78px; height: 21.8px;">
                            <div class="input-group-text" style="border-radius: unset; justify-content: center; width: inherit;">
                                <i class="fa fa-calendar"></i>
                            </div>
                        </div>
                    </div>
                    <div style="flex: 100%;">
                        <input type="text" class="form-control datetimepicker-input" name="dateOfDelivery" id="dateOfDelivery" data-target="#startDate" autocomplete="off" style="border-radius: unset;" />
                    </div>
                </div>
            </div>
            <div class="row" id="dateOfDeliveryMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red">
                    Date of Delivery cannot be empty.
                </div>
            </div>

            <!-- DELIVERY TO -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Delivery To</label>
                <div class="col-5">
                    <input type="hidden" id="deliveryToDuplicate_RefID">
                    <input type="hidden" name="deliveryTo_RefID" id="deliveryTo_RefID">
                    <input type="hidden" id="deliveryToDuplicate">
                    <textarea name="delivery_to" id="delivery_to" cols="30" rows="4" class="form-control" autocomplete="off"></textarea>
                </div>
            </div>
            <div class="row" id="deliveryToMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red">
                    Delivery To cannot be empty.
                </div>
            </div>

            <!-- INTERNAL NOTE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Internal Note</label>
                <div class="col-5">
                    <textarea name="internalNote" id="internalNote" cols="30" rows="4" class="form-control" autocomplete="off"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>