<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- BUDGET CODE -->
    <div class="row p-0 align-items-center">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Sub Budget Code</label>
        <div class="col-sm-9 col-md-8 col-lg-7">
            <div>
                <input class="form-control" id="sub_budget_code" name="sub_budget_code" style="border-radius:0;"
                    autocomplete="off">
            </div>
        </div>
    </div>

    <!-- BUDGET NAME -->
    <div class="row p-0 align-items-center" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Sub Budget Name</label>
        <div class="col-sm-9 col-md-8 col-lg-7">
            <div>
                <input class="form-control" id="sub_budget_name" name="sub_budget_name" style="border-radius:0;"
                    autocomplete="off">
            </div>
        </div>
    </div>
</div>
<div class="col-sm-12 col-md-12 col-lg-3">
    <!-- BUDGET -->
    @include('Components.Reports.budgetCode')

    <!-- SUB BUDGET GROUP -->
    <div class="row p-0 align-items-center" style="margin-top: 1rem;">
        <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Sub Budget Group</label>
        <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
            <div>
                <span id="sub_budget_group_trigger" class="input-group-text form-control" data-toggle="modal"
                    data-target="#sub_budget_group_modal" style="border-radius:0;cursor:pointer;">
                    <i class="fas fa-gift"></i>
                </span>
            </div>
            <div>
                <input type="text" id="sub_budget_group_preview" class="form-control"
                    style="border-radius:0;background-color:white;" readonly />
                <input type="hidden" id="sub_budget_group_id" class="form-control" style="border-radius:0;"
                    name="sub_budget_group_id" />
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
        <button type="button" class="btn btn-default btn-sm">
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