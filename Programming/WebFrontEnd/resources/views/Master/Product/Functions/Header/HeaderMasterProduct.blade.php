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
                            <option value="Electrical">Electrical</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Mechanical">Mechanical</option>
                            <option value="Vehicle">Vehicle</option>
                            <option value="Software">Software</option>
                            <option value="Service/Jasa">Service/Jasa</option>
                            <option value="Civil">Civil</option>
                            <option value="Tools">Tools</option>
                            <option value="Instrument/Alat-Ukur">Instrument/Alat Ukur</option>
                            <option value="Safety">Safety</option>
                            <option value="Agriculture/Pertanian">Agriculture/Pertanian</option>
                            <option value="Office-Supplies">Office Supplies</option>
                            <option value="Medical-Healthcare">Medical & Healthcare</option>
                            <option value="Telecommunication">Telecommunication</option>
                            <option value="Hardware">Hardware</option>
                            <option value="Consumer-Goods">Consumer Goods</option>
                            <option value="Textile-Garment">Textile & Garment</option>
                            <option value="Chemical">Chemical</option>
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
                            <option value="Admixture-Beton">Admixture Beton</option>
                            <option value="Waterproofing">Waterproofing</option>
                            <option value="Sealant">Sealant</option>
                            <option value="Adhesive-Bonding-Agent">Adhesive & Bonding Agent</option>
                            <option value="Grouting-Material">Grouting Material</option>
                            <option value="Flooring-Chemicals">Flooring Chemicals</option>
                            <option value="Protective-Coating">Protective Coating</option>
                            <option value="Repair-Rehabilitation">Repair & Rehabilitation</option>
                            <option value="Curing-Compound">Curing Compound</option>
                            <option value="Cleaning-Maintenance-Chemicals">Cleaning & Maintenance Chemicals</option>
                            <option value="Injection-Materials">Injection Materials</option>
                            <option value="Surface-Treatment">Surface Treatment</option>
                            <option value="Cable-Wire">Cable & Wire</option>
                            <option value="Circuit-Breaker">Circuit Breaker</option>
                            <option value="Panel-Listrik">Panel Listrik</option>
                            <option value="Transformer">Transformer</option>
                            <option value="Power-Supply">Power Supply</option>
                            <option value="Relay-Contactor">Relay & Contactor</option>
                            <option value="Switch-Socket">Switch & Socket</option>
                            <option value="Lighting">Lighting</option>
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
                            <option value="pcs">Pcs</option>
                            <option value="unit">Unit</option>
                            <option value="set">Set</option>
                            <option value="lot">Lot</option>
                            <option value="box">Box</option>
                            <option value="pack">Pack</option>
                            <option value="bottle">Bottle</option>
                            <option value="kg">Kg</option>
                            <option value="ton">Ton</option>
                            <option value="cm">Cm</option>
                            <option value="liter">Ltr</option>
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