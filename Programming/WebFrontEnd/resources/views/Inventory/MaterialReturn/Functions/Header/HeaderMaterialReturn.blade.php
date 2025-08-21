<div class="row">
    @csrf
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title">
                    Add New Materail Return
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
                                            <input id="project_code" style="border-radius:0;" name="project_code" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#" id="project_code2" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="project_code_detail" style="border-radius:0;" class="form-control" name="project_code_detail" readonly>
                                        </div>
                                    </td>
                                </tr>

                                <!-- <tr>
                                    <td><label>Warehouse</label></td>
                                    <td>
                                        <div class="input-group">
                                            <select class="form-control warehouseMret" name="warehouseMret" id="warehouseMret">
                                                <option selected="selected" value="">Select Warehouse</option>
                                                <option value="Jakarta">Jakarta</option>
                                                <option value="Bandung">Bandung</option>
                                                <option value="Surabaya">Surabaya</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td><label>Sub Budget Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input type="hidden" id="siteid" style="border-radius:0;" name="siteid" class="form-control" readonly>
                                            <input id="sitecode" style="border-radius:0;" name="sitecode" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#" id="sitecode2" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="sitename" style="border-radius:0;" class="form-control" name="sitename" readonly>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <table>
                                <!-- <tr>
                                    <td><label>Sub Budget Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input type="hidden" id="siteid" style="border-radius:0;" name="siteid" class="form-control" readonly>
                                            <input id="sitecode" style="border-radius:0;" name="sitecode" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#" id="sitecode2" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="sitename" style="border-radius:0;" class="form-control" name="sitename" readonly>
                                        </div>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td><label>DO Number</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="project_code" style="border-radius:0;" name="project_code" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#" id="project_code2" data-toggle="modal" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td>
                                        <div class="input-group">
                                            <input id="project_code_detail" style="border-radius:0;" class="form-control" name="project_code_detail" readonly>
                                        </div>
                                    </td> -->
                                </tr>
                                <tr>
                                    <td><label>Delivery By</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="supplier_name" name="supplier_name" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="supplier_name2" data-toggle="modal" data-target="#mySupplier" class="fas fa-gift mySupplier" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td>
                                        <div class="input-group">
                                            <input id="delivery2" style="border-radius:0;" class="form-control" name="projectname" readonly>
                                        </div>
                                    </td> -->
                                </tr>
                                <tr>
                                    <td><label>Receive By</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="requester" name="requester" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="requester2" data-toggle="modal" data-target="#myWorker" class="fas fa-gift myWorker" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <a onclick="ResetMaterialReturn();" class="btn btn-default btn-sm float-right" style="background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Reset"> Reset
                        </a>
                        <button class="btn btn-default btn-sm float-right" id="addToDoDetail" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                            <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add"> Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>