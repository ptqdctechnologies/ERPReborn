<div class="card-body">
    <div class="row py-3" style="gap: 1rem;">
        <!-- LEFT -->
        <div class="col-md-12 col-lg-5">
            <!-- LEGAL ENTITY -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Legal
                    Entity</label>
                <div class="col-5">
                    <select class="form-control" id="legal_entity" name="legal_entity" style="border-radius:0;"
                        type="text">
                        <option disabled selected>Select a Legal Entity</option>
                        <option>PT (Perseroan Terbatas)</option>style="margin-top:
                        1rem;"
                        <option>CV (Commanditaire Vennootschap)</option>
                        <option>Koperasi</option>
                        <option>Yayasan</option>
                        <option>Firma (Fa)</option>
                        <option>Usaha Perseorangan</option>
                        <option>Bentuk Lain Khusus (BUT)</option>
                    </select>
                </div>
            </div>

            <!-- SUPPLIER CATEGORY -->
            <div class="row" style="margin-top: 1rem;">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier
                    Category</label>
                <div class="col-5">
                    <div class="d-flex">
                        <div class="form-group w-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" style="margin-top: 0;">
                                <label class="form-check-label">Mandor</label>
                            </div>
                            <div class="form-check" style="margin-top: .5rem;">
                                <input class="form-check-input" type="checkbox" style="margin-top: 0;">
                                <label class="form-check-label">Manufacture</label>
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
        </div>

        <!-- RIGHT -->
        <div class="col-md-12 col-lg-5">
            <!-- SUPPLIER SPECIALIZATION -->
            <div class="row">
                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0">Supplier
                    Specialization</label>
                <div class="col-5">
                    <div class="d-flex">
                        <div class="form-group w-100">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" style="margin-top: 0;">
                                <label class="form-check-label">Sipil</label>
                            </div>
                            <div class="form-check" style="margin-top: .5rem;">
                                <input class="form-check-input" type="checkbox" style="margin-top: 0;">
                                <label class="form-check-label">Tower</label>
                            </div>
                            <div class="form-check" style="margin-top: .5rem;">
                                <input class="form-check-input" type="checkbox" style="margin-top: 0;">
                                <label class="form-check-label">Electrical</label>
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
        </div>
    </div>
</div>