<form action="">
    <!-- <div class="card"> -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <table>
                        <tr>
                            <td><label>Budget Code</label></td>
                            <td>
                                <div class="input-group">
                                    <input id="projectCode" style="border-radius:0;" name="var_currency" type="text" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i id="ProjectId" data-toggle="modal" class="fas fa-gift" style="color:grey;" readonly></i></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Supplier Code</label></td>
                            <td>
                                <div class="input-group">
                                    <input id="supplierCode" style="border-radius:0;" name="var_currency" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i id="supplierId" data-toggle="modal" data-target="#mySupplier" class="fas fa-gift" style="color:grey;"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Supplier Name</label></td>
                            <td>
                                <div class="input-group">
                                    <input id="supplierName" style="border-radius:0;" type="text" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Currency</label></td>
                            <td>
                                <div class="input-group">
                                    <input id="currencyCode" style="border-radius:0;" type="text" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control" readonly>
                                            <a href="#"><i data-toggle="modal" data-target="#myCurrency" class="fas fa-gift" style="color:grey;"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Exchange Rate</label></td>
                            <td>
                                <div class="input-group">
                                    <input id="exchange" style="border-radius:0;" type="text" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td><label>COD</label></td>
                            <td>
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
                            <td><label>Deliver To</label></td>
                            <td>
                                <div class="input-group">
                                    <input id="deliverto" style="border-radius:0;" type="text" class="form-control">
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i data-toggle="modal" data-target="#myDelieverTo" class="fas fa-gift" style="color:grey;"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Delivery Date Estimate</label></td>
                            <td>
                                <div class="input-group">
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <!-- <input class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ date('m/d/Y H:i A', strtotime('3 month ago')) }}" /> -->
                                        <input class="form-control datetimepicker-input" data-target="#reservationdate">
                                        <div class="input-group-append" style="border-radius:0;" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text" style="height:17pt;"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Invoice To</label></td>
                            <td>
                                <div class="input-group">
                                    <input id="invoice" style="border-radius:0;" type="text" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Payment Term</label></td>
                            <td>
                                <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>TOP</label></td>
                            <td>
                                <div class="input-group">
                                    <input id="top" style="border-radius:0;" type="number" class="form-control"><label>Days</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Remark PO</label></td>
                            <td>
                                <div class="input-group">
                                    <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Internal Note</label></td>
                            <td>
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