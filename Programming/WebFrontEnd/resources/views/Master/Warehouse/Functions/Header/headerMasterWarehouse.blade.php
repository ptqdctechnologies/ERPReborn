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
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- WAREHOUSE TYPE -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Type</label>
                <div class="col-5 d-flex">
                    <div>
                        <span id="provinceTrigger" data-toggle="modal" data-target="#myProvincies"
                            class="input-group-text form-control" style="border-radius:0;cursor:pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div style="flex: 1;">
                        <input type="text" id="supplier_province" class="form-control"
                            style="border-radius:0;background-color:white;" readonly />
                    </div>
                </div>
            </div>

            <!-- ADDRESS -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Address</label>
                <div class="col-5">
                    <textarea id="address" name="address" cols="30" rows="4" class="form-control"
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