<div class="row">
    @csrf
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title">
                    iSupp Revision
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
                                    <td><label style="position:relative;top:4px;">Material Source</label></td>
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
                                            <input id="po_number" style="border-radius:0;" name="po_number" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="customerPopUp" data-toggle="modal" data-target="#myPoNumber" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Budget Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="projectCodeiSupp" id="projectCodeiSupp" style="border-radius:0;" type="text" class="form-control projectCodeiSupp" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="projectCodeiSupp2" style="border-radius:0;" class="form-control" name="projectCodeiSupp2" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Supplier Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="supplierCodeiSupp" id="supplierCodeiSupp" style="border-radius:0;" type="text" class="form-control" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="supplierCodeiSupp2" style="border-radius:0;" class="form-control" name="supplierCodeiSupp2" readonly>
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
                                    <td><Label>Remark</Label></td>
                                    <td>
                                        <div class="input-group">
                                            <textarea name="remarkiSupp" id="remarkiSupp" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 5px;"><label>Warehouse</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="headerWarehouse1" style="border-radius:0;" name="headerWarehouse1" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="customerPopUp" data-toggle="modal" data-target="#mySearchWarehouse1" class="fas fa-gift" style="color:grey;"></i></a>
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
                                            <input id="do_number" style="border-radius:0;" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="customerPopUp" data-toggle="modal" data-target="#myDoNumber" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Budget Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="projectCodeiSupp" id="projectCodeiSupp" style="border-radius:0;" type="text" class="form-control projectCodeiSupp" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="projectCodeiSupp4" style="border-radius:0;" class="form-control" name="projectCodeiSupp4" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><Label>Remark</Label></td>
                                    <td>
                                        <div class="input-group">
                                            <textarea name="remarkiSupp2" id="remarkiSupp2" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
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
                                            <input id="headerWarehouse2" style="border-radius:0;" name="headerWarehouse2" class="form-control" readonly>
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
                                            <input id="headerWarehouse3" style="border-radius:0;" name="headerWarehouse3" class="form-control" readonly>
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
                <a onclick="CanceliSupp();" class="btn btn-default btn-sm float-right CancelDor" style="background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel"> Cancel
                </a>
                <button class="btn btn-default btn-sm float-right" id="addToPoDetail" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add"> Add
                </button>

            </div>
        </div>
    </div>
</div>