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
                            autocomplete="off" value="<?= isset($warehouseCode) ? $warehouseCode : ''; ?>" />
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
                            autocomplete="off" value="<?= isset($warehouseName) ? $warehouseName : ''; ?>" />
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
                                value="<?= isset($warehouseLocation) && isset($warehouseLocation['country']) ? $warehouseLocation['country'] : ''; ?>"
                                style="border-radius:0; background-color: <?= isset($warehouseLocation) && isset($warehouseLocation['country']) ? '#e9ecef' : 'white' ?>;">
                            <input id="country_code" class="form-control" hidden name="country_code"
                                value="<?= isset($warehouseLocation) && isset($warehouseLocation['country_code']) ? $warehouseLocation['country_code'] : ''; ?>"
                                style="border-radius:0; background-color: white;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="warehouseCountryMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="warehouseCountryMessageText"></div>
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
                                value="<?= isset($warehouseLocation) && isset($warehouseLocation['province']) ? $warehouseLocation['province'] : ''; ?>"
                                style="border-radius:0; background-color: <?= isset($warehouseLocation) && isset($warehouseLocation['province']) ? '#e9ecef' : 'white' ?>;">
                            <input id="province_code" class="form-control" name="province_code" hidden
                                value="<?= isset($warehouseLocation) && isset($warehouseLocation['province_code']) ? $warehouseLocation['province_code'] : ''; ?>"
                                style="border-radius:0;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="warehouseProvinceMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="warehouseProvinceMessageText"></div>
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
                                value="<?= isset($warehouseLocation) && isset($warehouseLocation['city']) ? $warehouseLocation['city'] : ''; ?>"
                                style="border-radius:0; background-color: <?= isset($warehouseLocation) && isset($warehouseLocation['city']) ? '#e9ecef' : 'white' ?>;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="warehouseCityMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="warehouseCityMessageText"></div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- STATUS -->
            <div class="row" style="margin-bottom: 1rem; display: <?= isset($warehouseStatus) ? 'flex' : 'none'; ?>">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Status</label>
                <div class="col-4 d-flex" style="gap: 1rem;">
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="warehouse_status" id="active" value="1"
                            <?= isset($warehouseStatus) && $warehouseStatus == 1 ? 'checked' : ''; ?> />
                        <label class="form-check-label" for="active">Active</label>
                    </div>
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="radio" name="warehouse_status" id="inactive" value="0"
                            <?= isset($warehouseStatus) && $warehouseStatus == 0 ? 'checked' : ''; ?> />
                        <label class="form-check-label" for="inactive">Inactive</label>
                    </div>
                </div>
            </div>

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
                        <input type="hidden" id="warehouse_type_id" name="warehouse_type_id" class="form-control"
                            value="<?= isset($warehouseTypeRefID) ? $warehouseTypeRefID : ''; ?>" />
                        <input type="text" id="warehouse_type" name="warehouse_type" class="form-control"
                            value="<?= isset($warehouseTypeName) ? $warehouseTypeName : ''; ?>"
                            style="border-radius:0;background-color:<?= isset($warehouseTypeName) ? '#e9ecef' : ''; ?>;"
                            readonly />
                    </div>
                </div>
            </div>
            <div class="row" id="warehouseTypeMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="warehouseTypeMessageText"></div>
            </div>

            <!-- ADDRESS -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Address</label>
                <div class="col-5">
                    <textarea id="warehouse_address" name="warehouse_address" cols="30" rows="4" class="form-control"
                        autocomplete="off"><?= isset($warehouseAddress) ? $warehouseAddress : ''; ?></textarea>
                </div>
            </div>
            <div class="row" id="warehouseAddressMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="warehouseAddressMessageText"></div>
            </div>
        </div>
    </div>
</div>