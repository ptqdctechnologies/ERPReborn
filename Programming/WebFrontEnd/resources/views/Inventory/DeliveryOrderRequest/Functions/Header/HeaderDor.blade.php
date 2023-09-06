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
                    <div class="col-md-4">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td style="padding-top:12px;"><label>Budget Code</label></td>
                                    <td>
                                        <div class="input-group" style="width: 70%;">
                                            <input id="projectcode" style="border-radius:0;" name="var_budget_code" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#" id="projectcode2" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group" style="width: 140%;position:relative;right:38%;">
                                            <input id="projectname" style="border-radius:0;" class="form-control" name="var_budget_code2" readonly>
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
                                    <td style="padding-top:15px;"><label>Receiver Name</label></td>
                                    <td style="padding-top:10px;">
                                        <div class="input-group">
                                            <input id="receiver_name" style="border-radius:0;" name="receiver_name" class="form-control" >

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
                                    <td style="padding-top:15px;"><label>Receiver Number</label></td>
                                    <td style="padding-top:10px;">
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