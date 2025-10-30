<!-- BODY -->
<div class="card-body">
    <!-- INPUT COMPONENTS -->
    <div class="row pt-3" style="row-gap: 15px;">
        <!-- LEFT COLUMN -->
        <div class="col-md-12 col-lg-5">
            <!-- BANK ACCOUNT -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Bank Account</label>
                <div class="col-5 d-flex">
                    <div>
                        <span style="border-radius:0;" class="input-group-text form-control">
                            <a href="javascript:;" id="deliverModalTrigger" data-toggle="modal" data-target="#myGetModalWarehouses">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="" />
                            </a>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="deliverName" style="border-radius:0; background-color: white;" class="form-control" readonly>
                            <input id="deliverCode" style="border-radius:0;" class="form-control" hidden>
                            <input id="deliver_RefID" name="deliver_RefID" style="border-radius:0;" class="form-control" hidden>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-md-12 col-lg-5">
            <!-- DATE OF DELIVERY -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Date of Delivery</label>
                <div class="col-5 input-group date" id="dateOfDelivery" data-target-input="nearest" style="flex-wrap: nowrap;">
                    <div>
                        <div class="input-group-append" data-target="#dateOfDelivery" data-toggle="datetimepicker" style="width: 27.78px; height: 21.8px;">
                            <div class="input-group-text" style="border-radius: unset; justify-content: center; width: inherit;"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <div style="flex: 100%;">
                        <input type="text" class="form-control datetimepicker-input" name="dateCommance" id="dateCommance" onkeydown="return false"  data-target="#dateOfDelivery" autocomplete="off" style="border-radius: unset;" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CARD COMPONENTS -->
    <div class="row pb-3" style="margin-top: 1.5rem; gap: 1rem;">
        <!-- BEGINNING BALANCE -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold" style="background-color: #e8f6e9; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <div>BEGINNING BALANCE</div>
                <div class="d-flex align-items-center justify-content-center invisible" style="background-color: #36AE7C; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">0</div>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <div class="p-3 text-bold" style="font-size: larger;">
                IDR 5.000.000.000
            </div>
        </div>
        <!-- CASH OUT -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold" style="background-color: #ffebed; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <div>CASH OUT</div>
                <div id="total_cash_out" class="d-flex align-items-center justify-content-center" style="background-color: #EB5353; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">0</div>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <div id="nominal_cash_out" class="p-3 text-bold" style="font-size: larger;">
                IDR 0.00
            </div>
        </div>
        <!-- CASH IN -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold" style="background-color: #e8eaf6; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <div>CASH IN</div>
                <div id="total_cash_in" class="d-flex align-items-center justify-content-center" style="background-color: #187498; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">0</div>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <div id="nominal_cash_in" class="p-3 text-bold" style="font-size: larger;">
                IDR 0.00
            </div>
        </div>
        <!-- ENDING BALANCE -->
        <div class="col px-0" style="border: 1px solid #ced4da; border-radius: 15px;">
            <div class="p-3 d-flex align-items-center justify-content-between text-bold" style="background-color: #e8f6e9; color: #000; font-size: small; border-top-left-radius: 14px; border-top-right-radius: 14px;">
                <div>ENDING BALANCE</div>
                <div class="d-flex align-items-center justify-content-center invisible" style="background-color: #F9D923; padding: 5px; min-width: 25px; min-height: 25px; border-radius: 100%; color: #fff;">0</div>
            </div>
            <hr class="m-0" style="background-color: #ced4da;" />
            <div class="p-3 text-bold" style="font-size: larger;">
                IDR 6.500.000.000
            </div>
        </div>
    </div>
</div>