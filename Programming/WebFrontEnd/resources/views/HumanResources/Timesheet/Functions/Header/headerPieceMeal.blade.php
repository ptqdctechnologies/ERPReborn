<div class="card-body">
    <div class="row">
        @csrf
        <div class="col-md-4">
            <div class="form-group">
                <table>
                    <tr>
                        <td><label>Project Code</label></td>
                        <td>
                            <div class="input-group">
                                <input required="" id="projectcode" style="border-radius:0;" name="projek_code" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input required="" id="projectname" style="border-radius:0;" readonly="" class="form-control">
                        </td> 
                    </tr>
                    <tr>
                        <td><label>Remark</label></td>
                        <td>
                            <input required="" id="" style="border-radius:0;" class="form-control">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <table>
                    <tr>
                        <td><label>Section Code</label></td>
                        <td>
                            <div class="input-group">
                                <input required="" id="subprojectc" style="border-radius:0;" name="sub_projek_code" type="text" class="form-control">
                                <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                        <a href="#"><i data-toggle="modal" data-target="#mySPC" class="fas fa-gift" style="color:grey;"></i></a>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <input required="" id="subprojectn" style="border-radius:0;" readonly="" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Total</label></td>
                        <td>
                            <input required="" id="" style="border-radius:0;" readonly="" class="form-control">
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
        </div>
    </div>