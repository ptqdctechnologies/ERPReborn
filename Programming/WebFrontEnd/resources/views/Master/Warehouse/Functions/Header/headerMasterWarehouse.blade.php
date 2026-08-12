<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <!-- WAREHOUSE CODE -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Code</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="warehouse_code" name="warehouse_code" style="border-radius:0;"
                            autocomplete="off" />
                    </div>
                </div>
            </div>
            <div class="row" id="warehouseCodeMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="warehouseCodeMessageText"></div>
            </div>

            <!-- WAREHOUSE NAME -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Name</label>
                <div class="col-5 d-flex">
                    <div class="input-group">
                        <input class="form-control" id="warehouse_name" name="warehouse_name" style="border-radius:0;"
                            autocomplete="off" />
                    </div>
                </div>
            </div>
            <div class="row" id="warehouseNameMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="warehouseNameMessageText"></div>
            </div>

            <!-- COUNTRY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Country</label>
                <div class="col-5 d-flex">
                    <div>
                        <span id="myCountryTrigger" data-toggle="modal" data-target="#myCountries"
                            class="input-group-text form-control" style="border-radius:0; cursor:pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="country_name" class="form-control" readonly name="country_name"
                                style="border-radius:0; background-color: white;">
                            <input id="country_id" class="form-control" hidden name="country_id"
                                style="border-radius:0; background-color: white;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="countryMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="countryMessageText"></div>
            </div>

            <!-- PROVINCE -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Province</label>
                <div class="col-5 d-flex">
                    <div>
                        <span id="provinceTrigger" data-toggle="modal" data-target="#myProvincies"
                            class="input-group-text form-control" style="border-radius:0; cursor:pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="province_name" class="form-control" name="province_name" readonly
                                style="border-radius:0; background-color: white;">
                            <input id="province_id" class="form-control" name="province_id" hidden
                                style="border-radius:0;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="provinceMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="provinceMessageText"></div>
            </div>

            <!-- CITY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">City</label>
                <div class="col-5 d-flex">
                    <div>
                        <span id="cityTrigger" data-toggle="modal" data-target="#myCities"
                            class="input-group-text form-control" style="border-radius:0; cursor:pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div style="flex: 100%;">
                        <div class="input-group">
                            <input id="city_name" class="form-control" name="city_name" readonly
                                style="border-radius:0; background-color: white;">
                            <input id="city_id" class="form-control" name="city_id" hidden style="border-radius:0;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="cityMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="cityMessageText"></div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- WAREHOUSE TYPE -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Type</label>
                <div class="col-5 d-flex">
                    <div>
                        <span id="warehouseTypeTrigger" data-toggle="modal" data-target="#warehouseTypeListModal"
                            class="input-group-text form-control" style="border-radius:0;cursor:pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div style="flex: 1;">
                        <input type="hidden" id="warehouse_type_id" name="warehouse_type_id" class="form-control" />
                        <input type="text" id="warehouse_type" class="form-control"
                            style="border-radius:0;background-color:white;" readonly />
                    </div>
                </div>
            </div>

            <!-- ADDRESS -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Address</label>
                <div class="col-5">
                    <textarea id="warehouse_address" name="warehouse_address" cols="30" rows="4" class="form-control"
                        autocomplete="off"></textarea>
                </div>
            </div>
            <div class="row" id="addressMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="addressMessageText"></div>
            </div>
        </div>
    </div>
</div>