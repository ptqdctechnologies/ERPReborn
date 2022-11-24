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
                                    <td><label style="position:relative;top:4px;">Material Source</label></td>
                                    <td>
                                        <div class="input-group">
                                            <select class="form-control materialSource" style="border-radius:0;" name="origin_budget" id="origin_budget">
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
                                            <input name="sitecode" id="sitecode" style="border-radius:0;" type="hidden" class="form-control" readonly>
                                            <input name="projectcode" id="projectcode" style="border-radius:0;" type="text" class="form-control projectcode" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="projectcode2" style="border-radius:0;" class="form-control" name="projectcode2" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Supplier Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="supplier_code" id="supplier_code" style="border-radius:0;" type="text" class="form-control" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="supplier_code2" style="border-radius:0;" class="form-control" name="supplier_code2" readonly>
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
                                            <textarea name="remarkPo" id="remarkPo" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 5px;"><label>Warehouse</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="warehouse1" style="border-radius:0;" name="warehouse1" class="form-control" readonly>
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
                                            <input name="projectcode" id="projectcode" style="border-radius:0;" type="text" class="form-control projectcode" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="projectcode4" style="border-radius:0;" class="form-control" name="projectcode4" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><Label>Remark</Label></td>
                                    <td>
                                        <div class="input-group">
                                            <textarea name="remarkDo" id="remarkDo" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
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
                                            <input id="warehouse2" style="border-radius:0;" name="warehouse2" class="form-control" readonly>
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
                                            <input id="warehouse3" style="border-radius:0;" name="warehouse3" class="form-control" readonly>
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
                <a class="btn btn-default btn-sm float-right" id="addToPoDetail" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add"> Add
                </a>

            </div>
        </div>
    </div>
</div>