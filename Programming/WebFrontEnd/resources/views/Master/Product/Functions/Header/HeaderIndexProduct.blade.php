<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- PRODUCT CODE -->
    <div class="row p-0 align-items-center">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Product Code</label>
        <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <input class="form-control" id="product_code" name="product_code" style="border-radius:0;"
                    autocomplete="off">
            </div>
        </div>
    </div>

    <!-- PRODUCT NAME -->
    <div class="row p-0 align-items-center" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Product Name</label>
        <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <input class="form-control" id="product_name" name="product_name" style="border-radius:0;"
                    autocomplete="off">
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- CATEGORY -->
    <div class="row p-0 align-items-center">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Category</label>
        <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0">
            <div style="width: 100%;">
                <select class="form-control" id="category" name="category_value" style="border-radius:0;" type="text">
                    <option value="" disabled selected>Select a Category</option>
                </select>
            </div>
        </div>
    </div>

    <!-- SUB CATEGORY -->
    <div class="row p-0 align-items-center" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Sub Category</label>
        <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0">
            <div style="width: 100%;">
                <select class="form-control" id="sub_category" name="sub_category_value" style="border-radius:0;"
                    type="text">
                    <option value="" disabled selected>Select a Sub Category</option>
                </select>
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