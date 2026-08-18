<div class="row p-1" style="row-gap: 1rem;">
    <div class="col-sm-12 col-md-12 col-lg-3">
        <!-- WAREHOUSE CODE -->
        <div class="row p-0 align-items-center">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Code</label>
            <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <input class="form-control" id="warehouse_code" name="warehouse_code" style="border-radius:0;"
                        autocomplete="off">
                </div>
            </div>
        </div>

        <!-- WAREHOUSE NAME -->
        <div class="row p-0 align-items-center" style="margin-top: 1rem;">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Name</label>
            <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <input class="form-control" id="warehouse_name" name="warehouse_name" style="border-radius:0;"
                        autocomplete="off">
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-3">
        <!-- WAREHOUSE TYPE -->
        <div class="row p-0 align-items-center">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Type</label>
            <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <span id="warehouseTypeTrigger" data-toggle="modal" data-target="#warehouseTypeListModal"
                        class="input-group-text form-control" style="border-radius:0;cursor:pointer;">
                        <i class="fas fa-gift"></i>
                    </span>
                </div>
                <div>
                    <input type="hidden" id="warehouse_type_id" name="warehouse_type_id" class="form-control" />
                    <input type="text" id="warehouse_type" name="warehouse_type" class="form-control"
                        style="border-radius:0;background-color:white;" readonly />
                </div>
            </div>
        </div>

        <!-- WAREHOUSE COUNTRY -->
        <div class="row p-0 align-items-center d-none" style="margin-top: 1rem;">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Country</label>
            <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <span id="myCountryTrigger" data-toggle="modal" data-target="#myCountries"
                        class="input-group-text form-control" style="border-radius:0; cursor:pointer;">
                        <i class="fas fa-gift"></i>
                    </span>
                </div>
                <div>
                    <div class="input-group">
                        <input id="country_name" class="form-control" readonly name="country_name"
                            style="border-radius:0; background-color: white;">
                        <input id="country_code" class="form-control" hidden name="country_code"
                            style="border-radius:0; background-color: white;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-3 d-none">
        <!-- WAREHOUSE PROVINCE -->
        <div class="row p-0 align-items-center">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">Province</label>
            <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <span class="input-group-text form-control" data-toggle="modal" data-target="#myProvincies"
                        style="border-radius:0;cursor:pointer;">
                        <i class="fas fa-gift"></i>
                    </span>
                </div>
                <div>
                    <input id="province_name" class="form-control" name="province_name" readonly
                        style="border-radius:0; background-color: white;">
                    <input id="province_code" class="form-control" name="province_code" hidden style="border-radius:0;">
                </div>
            </div>
        </div>

        <!-- WAREHOUSE CITY -->
        <div class="row p-0 align-items-center" style="margin-top: 1rem;">
            <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0 text-bold">City</label>
            <div class="col-sm-9 col-md-8 col-lg-6 d-flex p-0 justify-content-sm-end justify-content-md-end">
                <div>
                    <span id="cityTrigger" data-toggle="modal" data-target="#myCities"
                        class="input-group-text form-control" style="border-radius:0; cursor:pointer;">
                        <i class="fas fa-gift"></i>
                    </span>
                </div>
                <div>
                    <div class="input-group">
                        <input id="city_name" class="form-control" name="city_name" readonly
                            style="border-radius:0; background-color: white;">
                    </div>
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
            <button type="button" class="btn btn-default btn-sm" onclick="exportDataWarehouse()">
                <span>
                    <img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt="" />
                </span>
            </button>
        </div>

        <!-- SUBMIT -->
        <div class="row" style="gap: 0.5rem;">
            <button type="submit" class="btn btn-default btn-sm" onclick="getDataWarehouses()"
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