<form action="">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <table>
                        <tr>
                            <td><label>BRF Number</label></td>
                            <td>
                                <div class="input-group">
                                    <input required="" id="arfNumberAsf" style="border-radius:0;" name="arfNumberAsf" type="text" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i data-toggle="modal" data-target="#mySearchBrf" class="fas fa-gift" style="color:grey;"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td><label>Requester</label></td>
                            <td>
                                <div class="input-group">
                                    <input required="" id="requester" style="border-radius:0;" name="requester" type="text" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Manager Name</label></td>
                            <td>
                                <div class="input-group">
                                    <input required="" id="managerUid" style="border-radius:0;" name="managerUid" type="text" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i data-toggle="modal" data-target="#myManager" class="fas fa-gift" style="color:grey;"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input required="" id="managerName" style="border-radius:0;" readonly="" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Currency</label></td>
                            <td>
                                <div class="input-group">
                                    <input required="" id="currencyCode" style="border-radius:0;" name="currencyCode" type="text" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i data-toggle="modal" data-target="#myCurrency" class="fas fa-gift" style="color:grey;"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <table>
                        <tr>
                            <td><label>Finance Receiving Name</label></td>
                            <td>
                                <div class="input-group">
                                    <input required="" id="financeUid" style="border-radius:0;" name="financeUid" type="text" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i data-toggle="modal" data-target="#myfinance" class="fas fa-gift" style="color:grey;"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input required="" id="financeName" style="border-radius:0;" readonly="" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Remark</label></td>
                            <td>
                                <div class="input-group">
                                    <input required="" id="remark" style="border-radius:0;" name="remark" type="text" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Total</label></td>
                            <td>
                                <div class="input-group">
                                    <input required="" id="total" style="border-radius:0;" name="total" type="text" class="form-control">
                                </div>
                            </td>
                            <td>
                                <input required="" id="totalDetail" style="border-radius:0;width:30px;" readonly="" class="form-control">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card-body table-responsive p-0" style="height: 100px;width:100%;">
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