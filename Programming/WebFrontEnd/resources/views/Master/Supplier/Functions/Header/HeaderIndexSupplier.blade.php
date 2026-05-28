<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- SUPPLIER CODE -->
    <div class="row p-0 align-items-center">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Supplier Code</label>
        <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <input class="form-control" id="supplier_code" name="supplier_code" style="border-radius:0;"
                    autocomplete="off">
            </div>
        </div>
    </div>

    <!-- SUPPLIER NAME -->
    <div class="row p-0 align-items-center" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Supplier Name</label>
        <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <input class="form-control" id="supplier_name" name="supplier_name" style="border-radius:0;"
                    autocomplete="off">
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- SUPPLIER CATEGORY -->
    <div class="row p-0 align-items-center">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Supplier Category</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <span id="" class="input-group-text form-control" style="border-radius:0;cursor:pointer;">
                    <i id="iconBudget" class="fas fa-gift"></i>
                </span>
            </div>
            <div>
                <input type="text" id="supplier_category" class="form-control"
                    style="border-radius:0;background-color:white;" readonly />
            </div>
        </div>
    </div>

    <!-- COUNTRY -->
    <div class="row p-0 align-items-center" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Country</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <span id="" class="input-group-text form-control" style="border-radius:0;cursor:pointer;">
                    <i id="iconBudget" class="fas fa-gift"></i>
                </span>
            </div>
            <div>
                <input type="text" id="supplier_country" class="form-control"
                    style="border-radius:0;background-color:white;" readonly />
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- PROVINCE -->
    <div class="row p-0 align-items-center">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Province</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <span id="" class="input-group-text form-control" style="border-radius:0;cursor:pointer;">
                    <i id="iconBudget" class="fas fa-gift"></i>
                </span>
            </div>
            <div>
                <input type="text" id="supplier_province" class="form-control"
                    style="border-radius:0;background-color:white;" readonly />
            </div>
        </div>
    </div>

    <!-- CITY -->
    <div class="row p-0 align-items-center" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">City</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <span id="" class="input-group-text form-control" style="border-radius:0;cursor:pointer;">
                    <i id="iconBudget" class="fas fa-gift"></i>
                </span>
            </div>
            <div>
                <input type="text" id="supplier_city" class="form-control"
                    style="border-radius:0;background-color:white;" readonly />
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- EXPORT -->
    <div class="row align-items-center" style="margin-bottom: 1rem; gap: 0.5rem;">
        <div>
            <select name="print_type" id="print_type" class="form-control">
                <option value="PDF">Export PDF</option>
                <option value="EXCEL">Export Excel</option>
            </select>
        </div>
        <button type="button" class="btn btn-default btn-sm" onclick="validateExportButton()">
            <span>
                <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" />
            </span>
        </button>
    </div>

    <!-- SUBMIT -->
    <div class="row" style="gap: 0.5rem;">
        <button type="button" class="btn btn-default btn-sm" onclick="validateShowButton()" style="margin-top: -5px;">
            <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="show" title="Show">
            Show
        </button>
        <button type="button" class="btn btn-secondary btn-sm" onclick="resetForm()" style="margin-top: -5px;">
            Reset
        </button>
    </div>
</div>