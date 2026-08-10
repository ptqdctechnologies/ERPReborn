<div class="row p-1" style="row-gap: 1rem;">
    <div class="col-sm-12 col-md-12 col-lg-3">
        <!-- CURRENCY -->
        <div class="row p-0 align-items-center">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Currency</label>
            <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <span class="input-group-text form-control" data-toggle="modal" data-target="#myCurrencies"
                        style="border-radius:0;cursor:pointer;">
                        <i class="fas fa-gift"></i>
                    </span>
                </div>
                <div style="flex: 100%;">
                    <input type="hidden" id="currency_id" />
                    <input type="hidden" id="currency_code" />
                    <input type="text" id="currency_name" class="form-control"
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
            <button type="button" class="btn btn-default btn-sm" onclick="exportDataWorks()">
                <span>
                    <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" />
                </span>
            </button>
        </div>

        <!-- SUBMIT -->
        <div class="row" style="gap: 0.5rem;">
            <button type="submit" class="btn btn-default btn-sm" onclick="getDataWorks()" style="margin-top: -5px;">
                <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="show" title="Show">
                Show
            </button>
            <button type="button" class="btn btn-secondary btn-sm" onclick="resetForm()" style="margin-top: -5px;">
                Reset
            </button>
        </div>
    </div>
</div>