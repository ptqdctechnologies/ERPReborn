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
                                            <option value="" selected">Select Delivery Type</option>
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
                                            <strong>Warehouse Detail</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Warehouse</label></td>
                                <td>
                                    <div class="input-group">
                                        <input id="headerWarehouse1" style="border-radius:0;margin-left:33px;" name="headerWarehouse1" class="form-control">
                                        <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="headerWarehouse1" data-toggle="modal" data-target="#mySearchWarehouse1" class="fas fa-gift mySearchWarehouse1" style="color:grey;"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Addres</label></td>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control" name="" id="headerAddresWarehouse1" cols="20" rows="5" style="border-radius:0;margin-left:33px;"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>


                        <table class="SiteLeft">
                            <tr>
                                <td>
                                    <div>
                                        <label>
                                            <strong>Site Detail</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Site Name</label></td>
                                <td>
                                    <div class="input-group">
                                        <select name="headerSiteName1" id="headerSiteName1" style="border-radius:0;" class="form-control siteName1">
                                            <option value="">-- Select Site Name --</option>
                                            <option value="WH-001">WH-001</option>
                                            <option value="WH-002">WH-002</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Addres</label></td>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control" name="headerAddressSiteName1" id="headerAddressSiteName1" cols="25" rows="5"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="SupplierLeft">
                            <tr>
                                <td>
                                    <div>
                                        <label>
                                            <strong>Supplier Detail</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Supplier</label></td>
                                <td>
                                    <div class="input-group">
                                        <input id="supplier_code" style="border-radius:0;margin-left:48px;" name="supplier_code" class="form-control">
                                        <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="suppliercode2" data-toggle="modal" data-target="#mySupplier" class="fas fa-gift mySupplier" style="color:grey;"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Addres</label></td>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control" name="supplierAddress" id="supplierAddress" cols="20" rows="5" style="border-radius:0;margin-left:48px;"></textarea>
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
                                            <strong>Warehouse&nbsp;Detail</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Warehouse</label></td>
                                <td>
                                    <div class="input-group">
                                        <input id="headerWarehouse2" style="border-radius:0;margin-left:33px;" name="headerWarehouse2" class="form-control">
                                        <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="headerWarehouse2" data-toggle="modal" data-target="#mySearchWarehouse2" class="fas fa-gift mySearchWarehouse2" style="color:grey;"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Addres</label></td>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control" name="headerAddress3" id="headerAddresWarehouse2" cols="20" rows="5" style="border-radius:0;margin-left:33px;"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="SiteRight">
                            <tr>
                                <td>
                                    <div>
                                        <label>
                                            <strong>Site Detail</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Site Name</label></td>
                                <td>
                                    <div class="input-group">
                                        <select name="headerSiteName1" id="headerSiteName1" style="border-radius:0;" class="form-control siteName1">
                                            <option value="">-- Select Site Name --</option>
                                            <option value="WH-001">WH-001</option>
                                            <option value="WH-002">WH-002</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Addres</label></td>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control" name="headerAddressSiteName1" id="headerAddressSiteName1" cols="25" rows="5"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="SupplierRight">
                            <tr>
                                <td>
                                    <div>
                                        <label>
                                            <strong>Supplier Detail</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Supplier</label></td>
                                <td>
                                    <div class="input-group">
                                        <input id="supplier_code" style="border-radius:0;margin-left:48px;" name="supplier_code" class="form-control">
                                        <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="suppliercode2" data-toggle="modal" data-target="#mySupplier" class="fas fa-gift mySupplier" style="color:grey;"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>Addres</label></td>
                                <td>
                                    <div class="input-group">
                                        <textarea class="form-control" name="supplierAddress" id="supplierAddress" cols="20" rows="5" style="border-radius:0;margin-left:48px;"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table class="UserRight">
                            <tr>
                                <td>
                                    <div>
                                        <label>
                                            <strong>User&nbsp;Detail</strong>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><label>User</label></td>
                                <td>
                                    <div class="input-group">
                                        <input id="supplier_code" style="border-radius:0;margin-left:48px;" name="supplier_code" class="form-control">
                                        <div class="input-group-append">
                                            <span style="border-radius:0;" class="input-group-text form-control">
                                                <a href="#"><i id="suppliercode2" data-toggle="modal" data-target="#mySupplier" class="fas fa-gift mySupplier" style="color:grey;"></i></a>
                                            </span>
                                        </div>
                                        <input id="site_code_detail" style="border-radius:0;" class="col-8 form-control" name="site_code_detail">
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