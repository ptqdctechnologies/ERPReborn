<div class="modal fade" id="supplierSpecializationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document"
        style="min-height: calc(100vh - 3.5rem); display: flex; align-items: center;">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h3 style="margin: 0px;font-weight:bold;">
                    Supplier Specialization
                </h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">Category</label>
                    <div class="col-4 d-flex">
                        <div>
                            <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="javascript:;" id="myBanksTrigger" data-toggle="modal" data-target="#myBanks">
                                    <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13"
                                        alt="myBanksTrigger">
                                </a>
                            </span>
                        </div>
                        <div style="flex: 100%;">
                            <div class="input-group">
                                <input id="bank_name_second_detail" style="border-radius:0; background-color: white;"
                                    class="form-control" name="bank_name_detail" readonly>
                                <input id="bank_name_second_name" style="border-radius:0;" name="bank_name"
                                    class="form-control" hidden>
                                <input id="bank_name_second_id" style="border-radius:0;" class="form-control"
                                    name="bank_code" hidden>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 1rem;">
                    <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">Code</label>
                    <div class="col-4">
                        <div class="input-group">
                            <input class="form-control" id="supplier_specialization_code"
                                name="supplier_specialization_code" style="border-radius:0;">
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 1rem;">
                    <label class="col-sm-3 col-md-4 col-lg-2 col-form-label p-0">Name</label>
                    <div class="col-4">
                        <div class="input-group">
                            <input class="form-control" id="supplier_specialization_name"
                                name="supplier_specialization_name" style="border-radius:0;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-sm btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>