<form action="">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <table>
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
                                    <input required="" id="managerAsfUid" style="border-radius:0;" name="managerAsfUid" type="text" class="form-control" readonly>
                                    <diRequesterv class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i id="ManagerNameId" data-toggle="modal" data-target="#myManager" class="fas fa-gift" style="color:grey;"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input required="" id="managerAsfName" style="border-radius:0;" readonly="" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td><label>Currency</label></td>
                            <td>
                                <div class="input-group">
                                    <input required="" id="currencyCode" style="border-radius:0;" name="currencyCode" type="text" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i id="CurrencyId" data-toggle="modal" data-target="#myCurrency" class="fas fa-gift" style="color:grey;"></i></a>
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
                                    <input required="" id="financeArfUtableBudgetBrfid" style="border-radius:0;" name="financeUid" type="text" class="form-control" readonly>
                                    <div class="input-group-append">
                                        <span style="border-radius:0;" class="input-group-text form-control">
                                            <a href="#"><i id="FinanceId" data-toggle="modal" data-target="#myfinance" class="fas fa-gift" style="color:grey;"></i></a>
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input required="" id="financeArfName" style="border-radius:0;" readonly="" class="form-control">
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
                        <!-- <tr>
                            <td><label>Total</label></td>
                            <td>
                                <div class="input-group">
                                    <input required="" id="total" style="border-radius:0;" name="total" type="text" class="form-control">
                                </div>
                            </td>
                            <td>
                                <input required="" id="totalDetail" style="border-radius:0;width:30px;" readonly="" class="form-control">

                                <input id="hideProjectId" type="hidden">
                                <input id="hideProjectName" type="hidden">
                                <input id="hideSiteCode" type="hidden">
                                <input id="hideSiteName" type="hidden">
                                
                            </td>
                        </tr> -->
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