<div class="modal fade" id="supplierCategoryModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document"
        style="min-height: calc(100vh - 3.5rem); display: flex; align-items: center;">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h3 style="margin: 0px;font-weight:bold;">
                    Supplier Category
                </h3>
            </div>
            <form id="categoryForm">
                <div class="modal-body">
                    <div class="row" style="gap: 1rem;">
                        <div class="col">
                            <div class="row">
                                <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">Code</label>
                                <div class="col">
                                    <div class="input-group">
                                        <input class="form-control" id="supplier_category_code"
                                            name="supplier_category_code" autocomplete="off" style="border-radius:0;">
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="supplierCategoryCodeMessage" style="margin-top: .3rem;display: none;">
                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                                <div class="col text-red" id="supplierCategoryCodeMessageText"></div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">Name</label>
                                <div class="col">
                                    <div class="input-group">
                                        <input class="form-control" id="supplier_category_name"
                                            name="supplier_category_name" autocomplete="off" style="border-radius:0;">
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="supplierCategoryNameMessage" style="margin-top: .3rem;display: none;">
                                <label class="col-sm-3 col-md-4 col-lg-4 col-form-label p-0"></label>
                                <div class="col text-red" id="supplierCategoryNameMessageText"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="cancel-category" type="button" class="btn btn-sm btn-default"
                        data-dismiss="modal">Cancel</button>
                    <button id="submit-category" type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>