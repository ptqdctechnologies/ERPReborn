<div class="modal fade" id="supplierSpecializationModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"
        style="min-height: calc(100vh - 3.5rem); display: flex; align-items: center;">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h3 style="margin: 0px;font-weight:bold;">
                    Supplier Specialization
                </h3>
            </div>
            <div class="modal-body">
                <div class="row align-items-center">
                    <label class="col-sm-3 col-md-4 col-lg-1 col-form-label">Category</label>
                    <div class="col d-flex">
                        <div>
                            <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="javascript:;" id="myBanksTrigger" data-toggle="modal" data-target="#myBanks">
                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13"
                                        alt="myBanksTrigger">
                                </a>
                            </span>
                        </div>
                        <div class="col-4 p-0">
                            <div class="input-group">
                                <input id="bank_name_second_detail" style="border-radius:0; background-color: white;"
                                    class="form-control" name="bank_name_detail" readonly>
                                <input id="bank_name_second_name" style="border-radius:0;" name="bank_name"
                                    class="form-control" hidden>
                                <input id="bank_name_second_id" style="border-radius:0;" class="form-control"
                                    name="bank_code" hidden>
                            </div>
                        </div>
                        <div style="margin-left: 1rem;">
                            <button type="button" id="add-category" class="btn btn-default btn-sm" data-toggle="modal"
                                data-target="#supplierCategoryModal"
                                style="background-color:#e9ecef;border:1px solid #ced4da;">
                                Add Category
                            </button>
                        </div>
                    </div>
                </div>

                <hr />

                <div id="multiple-specialization">
                    <!-- <div class="row">
                        <div class="col-sm-3 col-md-4 col-lg-1 col-form-label">
                            <div class="icon-plus d-flex align-items-center justify-content-center" style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;
                                display:flex;">
                                <i class="fas fa-plus" style="color:#fff;"></i>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row align-items-center" style="gap: 2rem;">
                                <label class="col-sm-3 col-md-4 col-lg-1 col-form-label">Code</label>
                                <div class="col">
                                    <div class="input-group">
                                        <input class="form-control" id="supplier_specialization_code"
                                            name="supplier_specialization_code" style="border-radius:0;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row align-items-center" style="gap: 2rem;">
                                <label class="col-sm-3 col-md-4 col-lg-1 col-form-label">Name</label>
                                <div class="col">
                                    <div class="input-group">
                                        <input class="form-control" id="supplier_specialization_name"
                                            name="supplier_specialization_name" style="border-radius:0;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-md-4 col-lg-1 col-form-label">
                            <div class="icon-plus d-flex align-items-center justify-content-center" style="width:20px;height:20px;border-radius:100%;background-color:#4B586A;margin:2px;cursor:pointer;
                                display:flex;">
                                <i class="fas fa-plus" style="color:#fff;"></i>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row align-items-center" style="gap: 2rem;">
                                <label class="col-sm-3 col-md-4 col-lg-1 col-form-label">Code</label>
                                <div class="col">
                                    <div class="input-group">
                                        <input class="form-control" id="supplier_specialization_code"
                                            name="supplier_specialization_code" style="border-radius:0;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="row align-items-center" style="gap: 2rem;">
                                <label class="col-sm-3 col-md-4 col-lg-1 col-form-label">Name</label>
                                <div class="col">
                                    <div class="input-group">
                                        <input class="form-control" id="supplier_specialization_name"
                                            name="supplier_specialization_name" style="border-radius:0;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button id="cancel-specialization" type="button" class="btn btn-sm btn-default"
                    data-dismiss="modal">Cancel</button>
                <button id="submit-specialization" type="button" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>