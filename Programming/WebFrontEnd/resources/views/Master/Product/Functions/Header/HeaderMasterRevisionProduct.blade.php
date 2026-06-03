<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-4">
            <!-- PRODUCT NAME -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Product Name</label>
                <div class="col-4 pr-0">
                    <div class="input-group">
                        <input class="form-control" id="product_name" name="product_name"
                            value="<?= $header['productName']; ?>" style="border-radius:0;" autocomplete="off">
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
                <div class="col-4 d-flex" style="gap: 1rem;">
                    <div style="width: 100%;">
                        <select class="form-control" id="uom" name="uom_value" style="border-radius:0;width: 100%;"
                            type="text">
                            <option value="" disabled selected>Select a Unit of Measure</option>
                        </select>
                    </div>
                    <!-- <div>
                        <button type="button" id="add_uom" class="btn btn-default btn-sm" data-toggle="modal"
                            data-target="#productUomModal"
                            style="background-color:#e9ecef;border:1px solid #ced4da;width:max-content;">
                            Add UOM
                        </button>
                    </div> -->
                </div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-4">
            <!-- CATEGORY -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Category</label>
                <div class="col-4 d-flex" style="gap: 1rem;">
                    <div style="width: 100%;">
                        <select class="form-control" id="category" name="category_value"
                            style="border-radius:0;width: 100%;" type="text">
                            <option value="" disabled selected>Select a Category</option>
                            <option value="305000000000001">Electrical</option>
                            <option value="305000000000001">Elektronik</option>
                            <option value="305000000000001">Mechanical</option>
                            <option value="305000000000001">Vehicle</option>
                            <option value="305000000000001">Software</option>
                            <option value="305000000000001">Service/Jasa</option>
                            <option value="305000000000001">Civil</option>
                            <option value="305000000000001">Tools</option>
                            <option value="305000000000001">Instrument/Alat Ukur</option>
                            <option value="305000000000001">Safety</option>
                            <option value="305000000000001">Agriculture/Pertanian</option>
                            <option value="305000000000001">Office Supplies</option>
                            <option value="305000000000001">Medical & Healthcare</option>
                            <option value="305000000000001">Telecommunication</option>
                            <option value="305000000000001">Hardware</option>
                            <option value="305000000000001">Consumer Goods</option>
                            <option value="305000000000001">Textile & Garment</option>
                            <option value="305000000000001">Chemical</option>
                        </select>
                    </div>
                    <!-- <div>
                        <button type="button" id="add-category" class="btn btn-default btn-sm" data-toggle="modal"
                            data-target="#productCategoryModal"
                            style="background-color:#e9ecef;border:1px solid #ced4da;width:max-content;">
                            Add Category
                        </button>
                    </div> -->
                </div>
            </div>
            <!-- <div class="row" id="categoryMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col text-red" id="categoryMessageText"></div>
            </div> -->

            <!-- SUB CATEGORY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0">Sub Category</label>
                <div class="col-4 d-flex" style="gap: 1rem;">
                    <div style="width: 100%;">
                        <select class="form-control" id="sub_category" name="sub_category_value"
                            style="border-radius:0;width: 100%;" type="text">
                            <option value="" disabled selected>Select a Sub Category</option>
                            <option value="306000000000001">Admixture Beton</option>
                            <option value="306000000000001">Waterproofing</option>
                            <option value="306000000000001">Sealant</option>
                            <option value="306000000000001">Adhesive & Bonding Agent</option>
                            <option value="306000000000001">Grouting Material</option>
                            <option value="306000000000001">Flooring Chemicals</option>
                            <option value="306000000000001">Protective Coating</option>
                            <option value="306000000000001">Repair & Rehabilitation</option>
                            <option value="306000000000001">Curing Compound</option>
                            <option value="306000000000001">Cleaning & Maintenance Chemicals</option>
                            <option value="306000000000001">Injection Materials</option>
                            <option value="306000000000001">Surface Treatment</option>
                            <option value="306000000000001">Cable & Wire</option>
                            <option value="306000000000001">Circuit Breaker</option>
                            <option value="306000000000001">Panel Listrik</option>
                            <option value="306000000000001">Transformer</option>
                            <option value="306000000000001">Power Supply</option>
                            <option value="306000000000001">Relay & Contactor</option>
                            <option value="306000000000001">Switch & Socket</option>
                            <option value="306000000000001">Lighting</option>
                        </select>
                    </div>
                    <!-- <div>
                        <button type="button" id="add_sub_category" class="btn btn-default btn-sm" data-toggle="modal"
                            data-target="#productSubCategoryModal"
                            style="background-color:#e9ecef;border:1px solid #ced4da;width:max-content;">
                            Add Sub Cat.
                        </button>
                    </div> -->
                </div>
            </div>
            <!-- <div class="row" id="subCategoryMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-3 col-form-label p-0"></label>
                <div class="col text-red" id="subCategoryMessageText"></div>
            </div> -->
        </div>
    </div>
</div>