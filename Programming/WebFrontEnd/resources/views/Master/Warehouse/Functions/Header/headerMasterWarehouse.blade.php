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
                <div class="col-5">
                    <select type="text" class="form-control" id="type" name="type_value"
                        style="border-radius:0;width: 100%;">
                        <option value="Select a Type" disabled selected>Select a Type</option>
                        <option value="172000000000009">Kepentingan Publik</option>
                        <option value="172000000000002">Penyimpanan Bahan Baku</option>
                        <option value="172000000000003">Penyimpanan Barang Setengah Jadi</option>
                    </select>
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