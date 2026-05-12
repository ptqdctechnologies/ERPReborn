<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-4">
            <!-- CATEGORY -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Category</label>
                <div class="col-6 d-flex" style="gap: 1rem;">
                    <div style="width: 100%;">
                        <select class="form-control" id="category" name="category_value"
                            style="border-radius:0;width: 100%;" type="text">
                            <option value="" disabled selected>Select a Category</option>
                        </select>
                    </div>
                    <div>
                        <button type="button" id="add-category" class="btn btn-default btn-sm" data-toggle="modal"
                            data-target="#productCategoryModal"
                            style="background-color:#e9ecef;border:1px solid #ced4da;width:max-content;">
                            Add Category
                        </button>
                    </div>
                </div>
            </div>

            <!-- SUB CATEGORY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Sub Category</label>
                <div class="col-6 d-flex" style="gap: 1rem;">
                    <div style="width: 100%;">
                        <select class="form-control" id="sub_category" name="sub_category_value"
                            style="border-radius:0;width: 100%;" type="text">
                            <option value="" disabled selected>Select a Sub Category</option>
                        </select>
                    </div>
                    <div>
                        <button type="button" id="add_sub_category" class="btn btn-default btn-sm" data-toggle="modal"
                            data-target="#productSubCategoryModal"
                            style="background-color:#e9ecef;border:1px solid #ced4da;width:max-content;">
                            Add Sub Cat.
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-4">
            <!-- PRODUCT NAME -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Product Name</label>
                <div class="col-4 pr-0">
                    <div class="input-group">
                        <input class="form-control" id="product_name" name="product_name" style="border-radius:0;"
                            autocomplete="off">
                    </div>
                </div>
            </div>

            <!-- UOM -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Unit of Measure (uom)</label>
                <div class="col-6 d-flex" style="gap: 1rem;">
                    <div style="width: 100%;">
                        <select class="form-control" id="uom" name="uom_value" style="border-radius:0;width: 100%;"
                            type="text">
                            <option value="" disabled selected>Select a Unit of Measure</option>
                        </select>
                    </div>
                    <div>
                        <button type="button" id="add_uom" class="btn btn-default btn-sm" data-toggle="modal"
                            data-target="#productUomModal"
                            style="background-color:#e9ecef;border:1px solid #ced4da;width:max-content;">
                            Add UOM
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>