<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title">
                    Add New Delivery Order Request
                </label>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-8">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td><label style="position:relative;top:4px;">Source</label></td>
                                    <td>
                                        <div class="input-group">
                                            <select class="form-control Source" style="border-radius:0;" name="Source" id="Source">
                                                <option selected="selected">Select Source</option>
                                                <option value="Purchase Order">Purchase Order</option>
                                                <option value="Order Picking">Order Picking</option>
                                                <option value="Stock Movement">Stock Movement</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="ShowReceiver">
                                    <td style="padding-top:12px;"><label>Receiver Name</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="receiver_name" style="border-radius:0;" name="receiver_name" class="form-control">

                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-4 ShowReceiver">
                        <div class="form-group">
                            <table>
                                <tr class="ShowPO">
                                    <td style="padding-top:12px;"><label>Purchase Order</label></td>
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

                                <tr class="ShowOP">
                                    <td style="padding-top:12px;"><label>Order Picking</label></td>
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
                                <tr class="ShowSM">
                                    <td style="padding-top:12px;"><label>Stock Movement</label></td>
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

                                <tr class="ShowReceiver">
                                    <td style="padding-top:12px;"><label>Receiver Number</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="receiver_number" style="border-radius:0;" name="receiver_number" class="form-control">

                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>