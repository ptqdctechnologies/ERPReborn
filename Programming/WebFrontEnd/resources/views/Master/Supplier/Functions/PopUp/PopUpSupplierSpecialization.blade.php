<div class="modal fade" id="supplierSpecializationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"
        style="min-height: calc(100vh - 3.5rem); display: flex; align-items: center;">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h3 style="margin: 0px;font-weight:bold;">
                    Supplier Specialization
                </h3>
            </div>
            <form id="specializationForm">
                <div class="modal-body">
                    <div class="row align-items-center">
                        <label class="col-sm-3 col-md-4 col-lg-1 col-form-label">Category</label>
                        <div class="col d-flex">
                            <div>
                                <span id="supplierCategoryListModalTrigger" style="border-radius:0; cursor: pointer;"
                                    class="input-group-text form-control">
                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13"
                                        alt="supplierCategoryListModalTrigger">
                                </span>
                            </div>
                            <div class="col-4 p-0">
                                <div class="input-group">
                                    <input id="supplier_category_name_modal" class="form-control"
                                        style="border-radius:0; background-color: white;" readonly>
                                    <input id="supplier_category_code_modal" class="form-control"
                                        style="border-radius:0; background-color: white;" hidden>
                                    <input id="supplier_category_id_modal" class="form-control" style="border-radius:0;"
                                        hidden>
                                </div>
                            </div>
                            <div style="margin-left: 1rem;">
                                <button type="button" id="add-category" class="btn btn-default btn-sm"
                                    data-toggle="modal" data-target="#supplierCategoryModal"
                                    style="background-color:#e9ecef;border:1px solid #ced4da;">
                                    Add Category
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="supplierCategoryMessage" style="margin-top: .3rem;">
                        <label class="col-sm-3 col-md-4 col-lg-1 col-form-label"></label>
                        <div class="col text-red" id="supplierCategoryMessageText"></div>
                    </div>
                    <hr />
                    <div id="multiple-specialization"></div>
                    <div class="row" id="supplierSpecialiationMessage" style="margin-top: .3rem;">
                        <label class="col-sm-3 col-md-4 col-lg-1 col-form-label"></label>
                        <div class="col text-red" id="supplierSpecialiationMessageText"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="cancel-specialization" type="button" class="btn btn-sm btn-default"
                        data-dismiss="modal">Cancel</button>
                    <button id="submit-specialization" type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>