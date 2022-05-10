<div class="row">
    @csrf
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title">
                    Add New iSupp
                </label>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-12">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td><label>Material Source</label></td>
                                    <td>
                                        <div class="input-group">
                                            <select class="form-control materialSource" style="border-radius:0;" name="headerOriginBudget" id="headerOriginBudget">
                                                <option selected="selected">Select Material Source</option>
                                                <option value="Supplier to Site">From Supplier</option>
                                                <option value="Warehouse to Warehouse">Warehouse to Warehouse</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>

                    

                    <div class="col-md-6 headeriSupp1">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td style="padding-top: 5px;"><label>PO Number</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="var_customer" style="border-radius:0;" name="var_customer" class="form-control" readonly>
                                            <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="customerPopUp" data-toggle="modal" data-target="#myCustomer" class="fas fa-gift" style="color:grey;"></i></a>
                                            </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Project Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="var_request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="var_customer2" style="border-radius:0;" class="form-control" name="var_customer2" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Supplier Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="var_request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="var_customer2" style="border-radius:0;" class="form-control" name="var_customer2" readonly>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 headeriSupp1">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td><label>Net Act</label></td>
                                    <td>
                                    <div class="input-group">
                                        <input name="var_beneficiary" id="beneficiary" style="border-radius:0;" type="text" class="form-control">
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><Label>Remark</Label></td>
                                    <td>
                                    <div class="input-group">
                                        <textarea name="var_internal_notes" id="internal_notes" style="border-radius:0;" cols="30" rows="1" class="form-control"></textarea>
                                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 5px;"><label>Warehouse</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="var_customer" style="border-radius:0;" name="var_customer" class="form-control" readonly>
                                            <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="customerPopUp" data-toggle="modal" data-target="#myCustomer" class="fas fa-gift" style="color:grey;"></i></a>
                                            </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6 headeriSupp2">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td style="padding-top: 5px;"><label>DO Number</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="var_customer" style="border-radius:0;" name="var_customer" class="form-control" readonly>
                                            <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="customerPopUp" data-toggle="modal" data-target="#myCustomer" class="fas fa-gift" style="color:grey;"></i></a>
                                            </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Project Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="var_request_name" id="request_name" style="border-radius:0;" type="text" class="form-control" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="var_customer2" style="border-radius:0;" class="form-control" name="var_customer2" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><Label>Remark</Label></td>
                                    <td>
                                    <div class="input-group">
                                        <textarea name="var_internal_notes" id="internal_notes" style="border-radius:0;" cols="30" rows="1" class="form-control"></textarea>
                                    </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 headeriSupp2">
                        <div class="form-group">
                            <table>
                                
                                <tr>
                                    <td style="padding-top: 5px;"><label>Warehouse (From)</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="var_customer" style="border-radius:0;" name="var_customer" class="form-control" readonly>
                                            <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="customerPopUp" data-toggle="modal" data-target="#myCustomer" class="fas fa-gift" style="color:grey;"></i></a>
                                            </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="padding-top: 5px;"><label>Warehouse (Destination)</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="var_customer" style="border-radius:0;" name="var_customer" class="form-control" readonly>
                                            <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="customerPopUp" data-toggle="modal" data-target="#myCustomer" class="fas fa-gift" style="color:grey;"></i></a>
                                            </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <button type="reset" class="btn btn-outline btn-danger btn-sm float-right CancelDor">
                    <i class="fa fa-times" aria-hidden="true" title="Cancel to Add DOR List Cart">Cancel</i>
                </button>
                <a class="btn btn-outline btn-success btn-sm float-right" id="addFromDetailDortoCart" style="margin-right: 5px;">
                    <i class="fa fa-plus" aria-hidden="true" title="Add to Advance List" style="color: white;">Submit</i>
                </a>
            </div>
        </div>
    </div>
</div>