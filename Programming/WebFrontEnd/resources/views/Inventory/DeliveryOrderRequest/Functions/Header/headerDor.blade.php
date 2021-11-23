<div class="row">
    @csrf
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title">
                    Add New DOR
                </label>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td><label>Budget Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="headerProjectCode" style="border-radius:0;margin-left:25px;" name="headerProjectCode" class="form-control">
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="headerProjectCode" data-toggle="modal" data-target="#mySearchPr" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>PR Number</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="headerPrNumber" style="border-radius:0;margin-left:25px;" name="headerPrNumber" class="form-control">
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="headerPrNumber" data-toggle="modal" data-target="#mySearchPr" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Deliver Type</label></td>
                                    <td>
                                        <div class="input-group">
                                            <select class="form-control deliverType" style="width: 100%;margin-left:25px;" name="headerOriginBudget" id="headerOriginBudget">
                                                <option selected="selected">Select Type</option>
                                                <option value="Warehouse to Site">Warehouse to Site</option>
                                                <option value="Warehouse to Warehouse">Warehouse to Warehouse</option>
                                                <option value="Supplier to Site">Supplier to Site</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td><label>Receiver Name</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="headerReceiverName" style="border-radius:0;" name="headerReceiverName" class="form-control">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Receiver Number</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="headerReceiverNumber" style="border-radius:0;" name="headerReceiverNumber" class="form-control">

                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-4 headerDor1">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <div>
                                        <label>
                                            <strong>Warehouse Detail</strong>
                                        </label>
                                    </div>
                                </tr>
                                <tr>
                                    <td><label>Warehouse</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="headerWarehouse1" style="border-radius:0;margin-left:33px;" name="headerWarehouse1" class="form-control">
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="headerWarehouse1" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Addres</label></td>
                                    <td>
                                        <div class="input-group">
                                            <textarea class="form-control" name="" id="headerAddres1" cols="20" rows="5" style="border-radius:0;margin-left:33px;"></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-2 headerDor1">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <div>
                                        <img src="/AdminLTE-master/dist/img/right-arrow.png" width="50px;" style="position:relative;left:30px;top:30px;">
                                    </div>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6 headerDor1">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <div>
                                        <label>
                                            <strong>Site Detail</strong>
                                        </label>
                                    </div>
                                </tr>
                                <tr>
                                    <td><label>Site Name</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="headerSiteName1" id="headerSiteName1" style="border-radius:0;" type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Addres</label></td>
                                    <td>
                                        <div class="input-group">
                                            <textarea class="form-control" name="headerAddress2" id="headerAddress2" cols="25" rows="5"></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-4 headerDor2">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <div>
                                        <label>
                                            <strong>Warehouse Detail</strong>
                                        </label>
                                    </div>
                                </tr>
                                <tr>
                                    <td><label>Warehouse</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="headerWarehouse2" style="border-radius:0;margin-left:33px;" name="headerWarehouse2" class="form-control">
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="headerWarehouse2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Addres</label></td>
                                    <td>
                                        <div class="input-group">
                                            <textarea class="form-control" name="headerAddress3" id="headerAddress3" cols="20" rows="5" style="border-radius:0;margin-left:33px;"></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-2 headerDor2">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <div>
                                        <img src="/AdminLTE-master/dist/img/right-arrow.png" width="50px;" style="position:relative;left:30px;top:30px;">
                                    </div>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6 headerDor2">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <div>
                                        <label>
                                            <strong>Warehouse Detail</strong>
                                        </label>
                                    </div>
                                </tr>
                                <tr>
                                    <td><label>Warehouse Name</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="headerWarehouse3" id="headerWarehouse3" style="border-radius:0;" type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Addres</label></td>
                                    <td>
                                        <div class="input-group">
                                            <textarea class="form-control" name="headerAddress4" id="headerAddress4" cols="25" rows="5"></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-4 headerDor3">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <div>
                                        <label>
                                            <strong>Supplier Detail</strong>
                                        </label>
                                    </div>
                                </tr>
                                <tr>
                                    <td><label>Supplier</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="headerSupplier" style="border-radius:0;margin-left:48px;" name="headerSupplier" class="form-control">
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="headerSupplier" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Addres</label></td>
                                    <td>
                                        <div class="input-group">
                                            <textarea class="form-control" name="headerAddress5" id="headerAddress5" cols="20" rows="5" style="border-radius:0;margin-left:48px;"></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-2 headerDor3">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <div>
                                        <img src="/AdminLTE-master/dist/img/right-arrow.png" width="50px;" style="position:relative;left:30px;top:30px;">
                                    </div>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6 headerDor3">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <div>
                                        <label>
                                            <strong>Site Detail</strong>
                                        </label>
                                    </div>
                                </tr>
                                <tr>
                                    <td><label>Site Name</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="headerSiteName2" id="headerSiteName2" style="border-radius:0;" type="text" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Addres</label></td>
                                    <td>
                                        <div class="input-group">
                                            <textarea class="form-control" name="headerAddress6" id="headerAddress6" cols="25" rows="5"></textarea>
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