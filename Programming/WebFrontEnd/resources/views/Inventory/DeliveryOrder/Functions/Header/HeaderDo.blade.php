<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title">
                    Business Trip Cost Payment
                </label>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                </div>
            </div>
            <div class="card-body" id="brfhide5">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <table>
                                <tr class="budgetDetail">
                                    <td><label>Transporter</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="budget_name" id="budget_name" style="border-radius:0;" type="text" class="form-control">
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i data-toggle="modal" data-target="#myRequesterNameArf" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label><strong> Transporter Detail</strong></label></td>
                                </tr>
                                <tr class="budgetDetail">
                                    <td><label>Trans. Address</label></td>
                                    <td>
                                        <div class="input-group">
                                            <textarea id="sequenceRequest" name="sequenceRequest" style="border-radius:0;" class="form-control"></textarea>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Trans. Phone</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="budgetRequest" name="budgetRequest" style="border-radius:0;" type="number" class="form-control">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <table>
                                <tr class="budgetDetail">
                                    <td><label>Trans. Fax</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="budget_name" id="budget_name" style="border-radius:0;" type="text" class="form-control">
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i data-toggle="modal" data-target="#myRequesterNameArf" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="budgetDetail">
                                    <td><label>Trans. Contact Person</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="budget_name" id="budget_name" style="border-radius:0;" type="text" class="form-control">
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i data-toggle="modal" data-target="#myRequesterNameArf" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="budgetDetail">
                                    <td><label>Trans. Handphone</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input name="budget_name" id="budget_name" style="border-radius:0;" type="text" class="form-control">
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i data-toggle="modal" data-target="#myRequesterNameArf" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div style="padding-right:10px;padding-top:10px;">
                                
                                <a class="btn btn-default btn-sm float-right cancelDetailArf" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel to Add Advance List Cart"> Cancel
                                </a>
                                <a class="btn btn-default btn-sm float-right cancelDetailArf" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel to Add Advance List Cart"> Rest
                                </a>
                                <a class="btn btn-default btn-sm float-right" onclick="addFromDetailtoCartJs();" id="addFromDetailtoCart" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
                                    <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add to Advance List"> Search
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>