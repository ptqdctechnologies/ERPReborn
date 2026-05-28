<div class="modal fade" id="productUomModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document"
        style="min-height: calc(100vh - 3.5rem); display: flex; align-items: center;">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h3 style="margin: 0px;font-weight:bold;">
                    Unit of Measure (UOM)
                </h3>
            </div>
            <div class="modal-body">
                <div class="row" style="gap: 1rem;">
                    <div class="col">
                        <div class="row">
                            <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">Code</label>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" id="product_uom_code" name="product_uom_code"
                                        style="border-radius:0;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">Name</label>
                            <div class="col">
                                <div class="input-group">
                                    <input class="form-control" id="product_uom_name" name="product_uom_name"
                                        style="border-radius:0;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="cancel-uom" type="button" class="btn btn-sm btn-default"
                    data-dismiss="modal">Cancel</button>
                <button id="submit-uom" type="button" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>