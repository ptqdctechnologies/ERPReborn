<div class="row p-1" style="row-gap: 1rem;">
    <div class="col-sm-12 col-md-12 col-lg-3">
        <!-- BUDGET -->
        <div class="row align-items-center">
            <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0 text-bold">Budget</label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <span id="myProjectsTrigger" class="input-group-text form-control" data-toggle="modal"
                        data-target="#myProjects" style="border-radius:0;cursor:pointer;">
                        <i id="iconBudget" class="fas fa-gift"></i>

                        <div id="loadingBudget" class="spinner-border spinner-border-sm" role="status"
                            style="display: none;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </span>
                </div>
                <div>
                    <input type="text" id="budget_name" class="form-control"
                        style="border-radius:0;background-color:white;" readonly />
                    <input type="hidden" id="budget_code" name="budget_code" />
                </div>
            </div>
        </div>
        <div class="row" id="budgetMessage" style="margin-top: .3rem;display: none;">
            <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
            <div class="col-sm-9 col-md-8 col-lg-7 d-flex p-0 justify-content-sm-end justify-content-md-end text-red">
                Budget cannot be empty.
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
            <button type="button" class="btn btn-default btn-sm" onclick="validateShowButton()"
                style="margin-top: -5px;">
                <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="show" title="Show">
                Show
            </button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="resetForm()" style="margin-top: -5px;">
                Reset
            </button>
        </div>
    </div>
</div>