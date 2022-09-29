<div class="card-body">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <table>
                    <tr>
                        <td><label>Budget Code</label></td>
                        <td>
                            <div class="input-group">
                                <input id="projectcode" style="border-radius:0;" name="projectcode" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group">
                                <input id="projectname" style="border-radius:0;" class="form-control" name="projectname" readonly>
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
                        <td><label>Sub Budget Code</label></td>
                        <td>
                            <div class="input-group">
                                <input id="sitecode" style="border-radius:0;" name="sitecode" class="form-control" readonly>
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#"><i id="sitecode2" data-toggle="modal" data-target="#mySiteCode" class="fas fa-gift" style="color:grey;"></i></a>
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
        <div class="col-md-4">
            <div class="card-body table-responsive p-0" style="width:100%;">
                <table class="table table-head-fixed text-nowrap">
                    <div class="form-group input_fields_wrap">
                        <div class="input-group control-group" style="width:100%;">

                            <div class="input-group-btn">
                                <button style="background-color:#e9ecef;border:1px solid #ced4da;" class="btn btn-sm add_field_button" type="button"><img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="15" alt=""> Add</button>
                            </div>
                        </div>
                    </div>

                </table>
            </div>
        </div>
    </div>
</div>