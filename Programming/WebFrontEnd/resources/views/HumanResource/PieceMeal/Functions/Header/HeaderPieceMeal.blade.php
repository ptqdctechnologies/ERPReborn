<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <table>
                    <tr>
                        <td style="padding-top: 5px;"><label>Budget Code</label></td>
                        <td>
                            <div class="input-group" style="width: 70%;">
                                <input id="projectcode" style="border-radius:0;" name="projectcode" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#" id="projectcode2" data-toggle="modal" data-target="#myProject" class="myProject"><i class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group" style="width: 153%;position:relative;right:38%;">
                                <input id="projectname" style="border-radius:0;" class="form-control" name="projectname" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input name="status" id="status" style="border-radius:0;width:100px;" type="hidden" class="form-control" readonly="">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <table>
                    <tr>
                        <td style="padding-top: 5px;"><label>Sub Budget Code</label></td>
                        <td>
                            <div class="input-group" style="width: 70%;">
                                <input id="sitecode" style="border-radius:0;" name="sitecode" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#"><i id="sitecode2" data-toggle="modal" data-target="#mySiteCode" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group" style="width: 153%;position:relative;right:38%;">
                                <input id="sitename" style="border-radius:0;" class="form-control" name="sitename" readonly>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>