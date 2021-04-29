<div class="row">
    @csrf
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <label class="card-title">
                    Add New Materail Return
                </label>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td><label>Project Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="projectcode" name="projectcode" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="projectcode" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td><label>Warehouse</label></td>
                                    <td>
                                        <div class="input-group">
                                            <select class="form-control warehouseMret" name="warehouseMret">
                                                <option selected="selected" value="">Select Warehouse</option>
                                                <option value="Jakarta">Jakarta</option>
                                                <option value="Bandung">Bandung</option>
                                                <option value="Surabaya">Surabaya</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Addres</label></td>
                                    <td>
                                        <div class="input-group">
                                            <textarea name="" id="address" cols="30" rows="4" class="form-control" readonly></textarea>
                                        </div>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td><label>Site Code</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="sitecode" name="sitecode" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="sitecode" data-toggle="modal" data-target="#mySiteCode" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>DO Number</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="doNumberMret" style="border-radius:0;" name="doNumberMret" class="form-control">

                                        </div>
                                    </td>
                                </tr>                                
                                <tr>
                                    <td><label>Delivery By</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="delivery" name="delivery" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="delivery" data-toggle="modal" data-target="#myDelivery" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label>Receive By</label></td>
                                    <td>
                                        <div class="input-group">
                                            <input id="receive" name="receive" class="form-control" readonly>
                                            <div class="input-group-append">
                                                <span style="border-radius:0;" class="input-group-text form-control">
                                                    <a href="#"><i id="receive" data-toggle="modal" data-target="#myReceive" class="fas fa-gift" style="color:grey;"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <button type="reset" class="btn btn-danger btn-sm float-right" title="Reset">
                            <i class="fa fa-times" aria-hidden="true">Reset</i>
                        </button>
                        <a class="btn btn-success btn-sm float-right" href="javascript:validateFormHeaderMret()"><i class="fas fa-plus" aria-hidden="true">Add</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>