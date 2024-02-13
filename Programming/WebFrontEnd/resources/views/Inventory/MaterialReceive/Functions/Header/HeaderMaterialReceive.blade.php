<div class="row">
    @csrf
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title">
                    Add New MaterialReceive
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

                    <div class="col-md-6 headerMaterialReceive1">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td style="padding-top:12px;"><label>Purchase Order Number</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="purchase_order_id" style="border-radius:0;" name="purchase_order_id" class="form-control" type="hidden">
                                            <input id="purchase_order" style="border-radius:0;" name="purchase_order" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a id="purchase_order2" data-toggle="modal" data-target="#mySearchPurchaseOrder" class="mySearchPurchaseOrder"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Budget Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="budget_code_po" id="budget_code_po" style="border-radius:0;" type="text" class="form-control" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="budget_name_po" style="border-radius:0;" class="form-control" name="budget_name_po" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Supplier Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="supplier_code_po" id="supplier_code_po" style="border-radius:0;" type="text" class="form-control" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="supplier_name_po" style="border-radius:0;" class="form-control" name="supplier_name_po" readonly>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 headerMaterialReceive1">
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
                                            <input id="headerWarehouse1" style="border-radius:0;" name="headerWarehouse1" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="customerPopUp" data-toggle="modal" data-target="#mySearchWarehouse1" class="fas fa-gift mySearchWarehouse1" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6 headerMaterialReceive2">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td style="padding-top: 5px;"><label>Delivery Order Number</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="delivery_order_id" style="border-radius:0;" name="delivery_order_id" class="form-control" type="hidden">
                                            <input id="delivery_order" style="border-radius:0;" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="delivery_order2" data-toggle="modal" data-target="#mySearchDeliveryOrder" class="fas fa-gift mySearchDeliveryOrder" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Budget Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="budget_code_do" id="budget_code_do" style="border-radius:0;" type="text" class="form-control projectcode" readonly>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="budget_name_do" style="border-radius:0;" class="form-control" name="budget_name_do" readonly>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><Label>Remark</Label></td>
                                    <td>
                                        <div class="input-group">
                                            <textarea name="remark_do" id="remark_do" style="border-radius:0;" cols="30" rows="3" class="form-control"></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 headerMaterialReceive2">
                        <div class="form-group">
                            <table>

                                <tr>
                                    <td style="padding-top: 5px;"><label>Warehouse (From)</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="headerWarehouse2" style="border-radius:0;" name="headerWarehouse2" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="customerPopUp" data-toggle="modal" data-target="#mySearchWarehouse2" class="fas fa-gift mySearchWarehouse2" style="color:grey;"></i></a>
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
                                                    <a href="#"><i id="customerPopUp" data-toggle="modal" data-target="#mySearchWarehouse3" class="fas fa-gift mySearchWarehouse3" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
                <a onclick="CancelMaterialReceive();" class="btn btn-default btn-sm float-right CancelDor" style="background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel"> Cancel
                </a>
                <a class="btn btn-default btn-sm float-right" id="AddToDetail" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                    <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add"> Add
                </a>

            </div>
        </div>
    </div>
</div>