<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <table>
                    <!-- <tr>
                        <td><label>Origin Of Budget</label></td>
                        <td>
                            <div class="input-group">
                                <select class="form-control select2bs4" style="width: 100%;">
                                    <option selected="selected">Project</option>
                                    <option>Overhead</option>
                                    <option>Sales</option>
                                </select>
                            </div>
                        </td>
                    </tr> -->
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
                        <td><label>Site Code</label></td>
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
                        <td><label>Remark</label></td>
                        <td>
                            <input required="" id="subprojectn" style="border-radius:0;" class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <td><label>Total</label></td>
                        <td>
                            <input required="" id="subprojectn" style="border-radius:0;" readonly="" class="form-control">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group control-group increment">
                    <input type="file" name="filename[]" class="form-control">
                    <div class="input-group-btn">
                        <button class="btn btn-outline-primary btn-sm fileInputMultiArf" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                    </div>
                </div>
                <div class="clone hide">
                    <div class="control-group input-group" style="margin-top:10px">
                        <input type="file" name="filename[]" class="form-control">
                        <div class="input-group-btn">
                            <button class="btn btn-outline-secondary btn-sm remove-attachment" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <button type="reset" class="btn btn-outline-danger btn-sm float-right" title="Cancel">
                <i class="fa fa-times" aria-hidden="true">Cancel</i>
            </button>
            <button type="submit" class="btn btn-outline-success btn-sm float-right" title="Submit" style="margin-right:5px;">
                <i class="fas fa-plus" aria-hidden="true">Submit</i>
            </button>   
        </div>
    </div>
</div>
