<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- TRANSACTION NUMBER -->
    <div class="row p-0 align-items-center" style="margin-bottom: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Transaction Number</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <span id="myProjectsTrigger" class="input-group-text form-control" data-toggle="modal" data-target="#" style="border-radius:0;cursor:pointer;">
                    <i class="fas fa-gift"></i>
                </span>
            </div>
            <div>
                <input type="text" id="transaction_name" class="form-control" style="border-radius:0;background-color:white;" readonly />
                <input type="hidden" id="transaction_id" class="form-control" style="border-radius:0;" name="transaction_id" />
                <input type="hidden" id="transaction_code" class="form-control" style="border-radius:0;" name="transaction_code" />
            </div>
        </div>
    </div>
    
    <!-- NAME -->
    <div class="row p-0 align-items-center">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Name</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <span id="myProjectsTrigger" class="input-group-text form-control" data-toggle="modal" data-target="#" style="border-radius:0;cursor:pointer;">
                    <i class="fas fa-gift"></i>
                </span>
            </div>
            <div>
                <input type="text" id="transaction_name" class="form-control" style="border-radius:0;background-color:white;" readonly />
                <input type="hidden" id="transaction_id" class="form-control" style="border-radius:0;" name="transaction_id" />
                <input type="hidden" id="transaction_code" class="form-control" style="border-radius:0;" name="transaction_code" />
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-3 d-flex flex-column flex-column-reverse">
    <!-- SUBMIT -->
    <div class="align-items-center justify-content-sm-end justify-content-md-end justify-content-lg-start row p-0" style="gap: 0.5rem;">
        <button type="button" class="btn btn-default btn-sm" style="margin-top: -5px;" onclick="getDataReport()">
            <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="show" title="Show">
            Show
        </button>
        <button type="button" class="btn btn-secondary btn-sm" style="margin-top: -5px;" onclick="resetForm()">
            Reset
        </button>
    </div>

    <!-- EXPORT -->
    <div class="align-items-center justify-content-sm-end justify-content-md-end justify-content-lg-start row align-items-center p-0" style="margin-bottom: 1rem; gap: 0.5rem;">
        <div>
            <select name="print_type" id="print_type" class="form-control">
                <option value="PDF">Export PDF</option>
                <option value="EXCEL">Export Excel</option>
            </select>
        </div>
        <button type="button" class="btn btn-default btn-sm" onclick="exportDataReport()">
            <span>
                <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" />
            </span>
        </button>
    </div>
</div>