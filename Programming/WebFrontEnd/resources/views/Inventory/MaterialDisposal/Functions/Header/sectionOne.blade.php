<div class="card-body py-3">
    <div class="row" style="gap: 1rem;">
        <div class="col-md-12 col-lg-2">
            <div class="d-flex align-items-center" style="gap: 2rem;">
                <label class="mb-0" style="flex: 0.3;">Type</label>
                <div style="flex: 1; background-color: yellow;">
                    <select type="text" class="form-control" name="stockOpnameValue" id="stockOpnameType"
                        onchange="selectType(this)" style="border-radius: 0;">
                        <option disabled selected value="Select a Type">Select a Type
                        </option>
                        <option value="ALL">All</option>
                        <option value="WAREHOUSE">Warehouse</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-2">
            <div class="d-flex align-items-center" style="gap: 2rem;">
                <label class="mb-0" style="flex: 0.3;">Warehouse</label>
                <div class="d-flex" style="flex: 1; background-color: yellow;">
                    <div>
                        <span id="warehouseListModalTrigger" data-toggle="modal" data-target="#warehouseListModal"
                            class="input-group-text form-control" style="border-radius:0;cursor:pointer;">
                            <i class="fas fa-gift"></i>
                        </span>
                    </div>
                    <div style="flex: auto;">
                        <input type="text" id="warehouse_name" class="form-control"
                            style="border-radius:0;background-color:white;" readonly />
                        <input type="hidden" id="warehouse_id" name="warehouse_id" class="form-control"
                            style="border-radius:0;background-color:white;" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>