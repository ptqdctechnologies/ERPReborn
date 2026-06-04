<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
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
            <div class="row" id="productNameMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col text-red" id="productNameMessageText"></div>
            </div>

            <!-- UOM -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Unit of Measure (uom)</label>
                <div class="col-6 d-flex" style="gap: 1rem;">
                    <div class="d-flex justify-content-sm-end justify-content-md-end">
                        <div>
                            <span id="myUomTrigger" class="input-group-text form-control" data-toggle="modal"
                                data-target="#myUom" style="border-radius:0;cursor:pointer;">
                                <i class="fas fa-gift"></i>
                            </span>
                        </div>
                        <div style="width: 100%;">
                            <input type="text" id="uom_name" class="form-control"
                                style="border-radius:0;background-color:white;" readonly />
                            <input type="hidden" id="uom_value" class="form-control" style="border-radius:0;"
                                name="uom_value" />
                        </div>
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
            <div class="row" id="uomMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col text-red" id="uomMessageText"></div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-4">
            <!-- CATEGORY -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Category</label>
                <div class="col-6 d-flex" style="gap: 1rem;">
                    <div class="d-flex" style="width: 100%;">
                        <div>
                            <span id="myProductCategoryTrigger" class="input-group-text form-control"
                                data-toggle="modal" data-target="#myProductCategory"
                                style="border-radius:0;cursor:pointer;">
                                <i class="fas fa-gift"></i>
                            </span>
                        </div>
                        <div>
                            <input type="text" id="category_name" class="form-control"
                                style="border-radius:0;background-color:white;" readonly />
                            <input type="hidden" id="category_value" class="form-control" style="border-radius:0;"
                                name="category_value" />
                        </div>
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
            <div class="row" id="categoryMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col text-red" id="categoryMessageText"></div>
            </div>

            <!-- SUB CATEGORY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Sub Category</label>
                <div class="col-6 d-flex" style="gap: 1rem;">
                    <div class="d-flex" style="width: 100%;">
                        <div>
                            <span id="myProductSubCategoryTrigger" class="input-group-text form-control"
                                data-toggle="modal" data-target="#myProductSubCategory"
                                style="border-radius:0;cursor:pointer;">
                                <i class="fas fa-gift"></i>
                            </span>
                        </div>
                        <div>
                            <input type="text" id="sub_category" class="form-control"
                                style="border-radius:0;background-color:white;" readonly />
                            <input type="hidden" id="sub_category_value" class="form-control" style="border-radius:0;"
                                name="sub_category_value" />
                        </div>
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
            <div class="row" id="subCategoryMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col text-red" id="subCategoryMessageText"></div>
            </div>
        </div>
    </div>
</div>