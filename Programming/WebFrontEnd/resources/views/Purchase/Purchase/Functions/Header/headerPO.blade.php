<form action="">
    <!-- <div class="card"> -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <table>
                        <!-- <tr>
                            <td><label>Budget Code</label></td>
                            <td>
                                <div class="input-group">
                                    <input id="projectcode3" style="border-radius:0;" name="projectcode3" type="text" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i id="ProjectId" data-toggle="modal" class="fas fa-gift" style="color:grey;" readonly></i></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr> -->
                        <tr>
                            <td><label>Supplier Code</label></td>
                            <td>
                                <div class="input-group">
                                    <input name="supplier_code" id="supplier_code" style="border-radius:0;" type="text" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#" id="supplier_code2" data-toggle="modal" data-target="#mySupplier" class="mySupplier"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Supplier Name</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <div class="input-group">
                                    <input id="supplier_name" style="border-radius:0;" class="form-control" name="supplier_name" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Deliver To</label></td>
                            <td>
                                <div class="input-group">
                                    <input name="deliver_to" id="deliver_to" style="border-radius:0;" type="text" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#" id="deliver_to2" data-toggle="modal" data-target="#myDeliverTo" class="myDeliverTo"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Delivery Date Estimate</label></td>
                            <td>
                                <div class="input-group">
                                <input id="dateCommance" name="dateCommance" style="border-radius:0;" type="date" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>COD</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <input type="radio" id="yes" name="fav_language" value="HTML">
                                <label for="html">Yes</label>
                                <input type="radio" id="no" name="fav_language" value="HTML" checked="checked">
                                <label for="html">No</label>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <table>
                        <tr>
                            <td><label>Payment Term</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>TOP</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <div class="input-group">
                                    <input id="top" style="border-radius:0;" type="number" class="form-control"><label>Days</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Remark PO</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Internal Note</label></td>
                            <td style="border:1px solid #e9ecef;">
                                <div class="input-group">
                                    <textarea name="" id="" cols="30" rows="2" class="form-control"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card-body table-responsive p-0" style="height: 145px;width:100%;">
                    <table class="table table-head-fixed text-nowrap">
                        <div class="form-group input_fields_wrap">
                            <div class="input-group control-group" style="width:100%;">
                                <input type="file" class="form-control filenames_1" id="filenames_1" style="height:26px;" name="filenames">
                                <div class="input-group-btn">
                                    <a class="btn btn-outline btn-success btn-sm add_field_button">
                                        <i class="fas fa-plus" aria-hidden="true" title="Add File" style="color:white;">Add</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
</form>