<div class="col-12">
    <div class="card">
        <div class="card-header">
            <label class="card-title">
                Delivery Order Request Detail
            </label>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                </button>
            </div>
        </div>
        <div class="card-body DorDetail">
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 20px;">
                    <div class="form-group">
                        <table>
                            <tr>
                                <td><label>Deliver Type</label></td>
                                <td>
                                    <div class="input-group">
                                        <select class="form-control deliverType" style="border-radius:0;" name="deliver_type" id="deliver_type">
                                            <option value="" selected>Select Delivery Type</option>
                                            <option id="WTH" value="Warehouse to Warehouse">Warehouse to Warehouse</option>
                                            <option id="WTS" value="Warehouse to Site">Warehouse to Site</option>
                                            <option id="WTU" value="Warehouse to User">Warehouse to User</option>
                                            <option id="SUTW" value="Supplier to Warehouse">Supplier to Warehouse</option>
                                            <option id="STS" value="Supplier to Site">Supplier to Site</option>
                                            <option id="SITW" value="Site to Warehouse">Site to Warehouse</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <table class="WarehouseLeft">
                            <tr>
                                <td>
                                    <div>
                                        <label>
                                            <strong>Warehouse From</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Warehouse</label></td>
                                <td>
                                    <div class="input-group">
                                        <input id="warehouse_from_id" style="border-radius:0;margin-left:33px;" name="warehouse_from_id" class="form-control" hidden>
                                        <input id="warehouse_from" style="border-radius:0;margin-left:33px;" name="warehouse_from" class="form-control">
                                        <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="warehouse_from_2" data-toggle="modal" data-target="#myGetWarehouse" class="fas fa-gift myGetWarehouseFrom" style="color:grey;"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Addres</label></td>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control" name="" id="warehouse_from_addres" cols="20" rows="5" style="border-radius:0;margin-left:33px;"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>


                        <table class="SiteLeft">
                            <tr>
                                <td>
                                    <div>
                                        <label>
                                            <strong>Site From</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Site Name</label></td>
                                <td>
                                    <div class="input-group">
                                        <input id="site_from_id" style="border-radius:0;margin-left:33px;" name="site_from_id" class="form-control" hidden>
                                        <input id="site_from" style="border-radius:0;margin-left:33px;" name="site_from" class="form-control">
                                        <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="site_from_2" data-toggle="modal" data-target="#mySiteCode" class="fas fa-gift mySiteCodeFrom" style="color:grey;"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Addres</label></td>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control" name="site_from_address" id="site_from_address" cols="25" rows="5"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="Supplier">
                            <tr>
                                <td>
                                    <div>
                                        <label>
                                            <strong>Supplier From</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Supplier</label></td>
                                <td>
                                    <div class="input-group">
                                        <input id="supplier_id" style="border-radius:0;margin-left:48px;" name="supplier_id" class="form-control" hidden>
                                        <input id="supplier_code" style="border-radius:0;margin-left:48px;" name="supplier_code" class="form-control">
                                        <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="supplier_code_2" data-toggle="modal" data-target="#mySupplier" class="fas fa-gift mySupplier" style="color:grey;"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Addres</label></td>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control" name="supplier_address" id="supplier_address" cols="20" rows="5" style="border-radius:0;margin-left:48px;"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>

                <div class="col-md-2 ArrowIcon">
                    <div class="form-group">
                        <table>
                            <tr>
                                <div>
                                    <img src="/AdminLTE-master/dist/img/right-arrow.png" width="50px;" style="position:relative;right:15px;"><br><br>
                                </div>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">

                        <table class="WarehouseRight">
                            <tr>
                                <td>
                                    <div>
                                        <label>
                                            <strong>Warehouse&nbsp;To</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Warehouse</label></td>
                                <td>
                                    <div class="input-group">
                                        <input id="warehouse_to_id" style="border-radius:0;margin-left:33px;" name="warehouse_to_id" class="form-control" hidden>
                                        <input id="warehouse_to" style="border-radius:0;margin-left:33px;" name="warehouse_to" class="form-control">
                                        <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="warehouse_to_2" data-toggle="modal" data-target="#myGetWarehouse" class="fas fa-gift myGetWarehouseTo" style="color:grey;"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Addres</label></td>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control" name="warehouse_to_addres" id="warehouse_to_addres" cols="20" rows="5" style="border-radius:0;margin-left:33px;"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="SiteRight">
                            <tr>
                                <td>
                                    <div>
                                        <label>
                                            <strong>Site To</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Site Name</label></td>
                                <td>
                                    <div class="input-group">
                                        <input id="site_to_id" style="border-radius:0;margin-left:33px;" name="site_to_id" class="form-control" hidden>
                                        <input id="site_to" style="border-radius:0;margin-left:33px;" name="site_to" class="form-control">
                                        <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="site_to_2" data-toggle="modal" data-target="#mySiteCode" class="fas fa-gift mySiteCodeTo" style="color:grey;"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Addres</label></td>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control" name="site_to_address" id="site_to_address" cols="25" rows="5"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="UserRight">
                            <tr>
                                <td>
                                    <div>
                                        <label>
                                            <strong>User&nbsp;To</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>User</label></td>
                                <td>
                                    <div class="input-group">
                                        <input id="requester_id" style="border-radius:0;margin-left:48px;" name="requester_id" class="form-control" hidden>
                                        <input id="requester" style="border-radius:0;margin-left:48px;" name="requester" class="form-control">
                                        <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="requester2" data-toggle="modal" data-target="#myWorker" class="fas fa-gift myWorker" style="color:grey;"></i></a>
                                            </span>
                                        </div>
                                        <input id="requester_detail" style="border-radius:0;" class="col-8 form-control" name="requester_detail">
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