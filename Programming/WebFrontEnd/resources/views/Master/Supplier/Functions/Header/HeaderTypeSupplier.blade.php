<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <!-- LEGAL ENTITY -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Legal
                    Entity</label>
                <div class="col-5">
                    <select class="form-control" id="legal_entity" name="legal_entity_value" style="border-radius:0;"
                        type="text">
                        <option value="" disabled selected>Select a Legal Entity</option>
                        <option value="PT (Perseroan Terbatas)">PT (Perseroan Terbatas)</option>
                        <option value="CV (Commanditaire Vennootschap)">CV (Commanditaire Vennootschap)</option>
                        <option value="Koperasi">Koperasi</option>
                        <option value="Yayasan">Yayasan</option>
                        <option value="Firma (Fa)">Firma (Fa)</option>
                        <option value="Usaha Perseorangan">Usaha Perseorangan</option>
                        <option value="Bentuk Lain Khusus (BUT)">Bentuk Lain Khusus (BUT)</option>
                    </select>
                </div>
            </div>
            <div class="row" id="legalEntityMessage" style="margin-top: .3rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="legalEntityMessageText"></div>
            </div>

            <!-- SUPPLIER CATEGORY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier
                    Category</label>
                <div class="col-5">
                    <div class="d-flex">
                        <div class="form-group w-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="mandor" value="123"
                                    name="category[]" style="margin-top: 0;">
                                <label for="mandor" class="form-check-label">Mandor</label>
                            </div>
                            <div class="form-check" style="margin-top: .5rem;">
                                <input class="form-check-input" type="checkbox" id="manufacture" value="456"
                                    name="category[]" style="margin-top: 0;">
                                <label for="manufacture" class="form-check-label">Manufacture</label>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-default btn-sm float-right" data-toggle="modal"
                                data-target="#supplierCategoryModal"
                                style="background-color:#e9ecef;border:1px solid #ced4da;width:max-content;">
                                Add New
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="categoryMessage" style="margin-top: .5rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="categoryMessageText"></div>
            </div>
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- SUPPLIER SPECIALIZATION -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier
                    Specialization</label>
                <div class="col-5">
                    <div class="d-flex">
                        <div class="form-group w-100" id="specialization_group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="sipil" value="147"
                                    name="specialization[123][]" style="margin-top: 0;">
                                <label for="sipil" class="form-check-label">Sipil</label>
                            </div>
                            <div class="form-check" style="margin-top: .5rem;">
                                <input class="form-check-input" type="checkbox" id="tower" value="258"
                                    name="specialization[123][]" style="margin-top: 0;">
                                <label for="tower" class="form-check-label">Tower</label>
                            </div>
                            <div class="form-check" style="margin-top: .5rem;">
                                <input class="form-check-input" type="checkbox" id="electrical" value="369"
                                    name="specialization[456][]" style="margin-top: 0;">
                                <label for="electrical" class="form-check-label">Electrical</label>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-default btn-sm float-right" data-toggle="modal"
                                data-target="#supplierSpecializationModal"
                                style="background-color:#e9ecef;border:1px solid #ced4da;width:max-content;">
                                Add New
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="specializationMessage" style="margin-top: .5rem;display: none;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                <div class="col text-red" id="specializationMessageText"></div>
            </div>
        </div>
    </div>
</div>