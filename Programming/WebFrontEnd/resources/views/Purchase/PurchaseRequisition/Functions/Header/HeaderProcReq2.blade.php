<div class="card-body"> 
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <table>
                    <tr>
                        <td style="padding-top: 5px;"><label>Deliver To</label></td>
                        <td>
                            <div class="input-group" style="width: 70%;">
                            <input id="deliver_code" style="border-radius:0;" class="form-control" readonly>
                            <div class="input-group-append">
                                <span style="border-radius:0;" class="input-group-text form-control">
                                    <a href="#" id="deliver_code2" data-toggle="modal" data-target="#myDeliverTo" class="myDeliverTo"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                </span>
                            </div>
                            </div>
                        </td>
                        <td>
                            <div class="input-group" style="width: 153%;position:relative;right:38%;">
                                <input id="deliver_name" style="border-radius:0;" class="form-control" name="projectname" readonly>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Date of Delivery</label></td>
                        <td>
                            <div class="input-group">
                            <input id="dateCwommance" name="dateCommance" style="border-radius:0;" type="date" class="form-control">
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
                        <td><label>Notes</label></td>
                        <td style="border:1px solid #e9ecef;">
                            <div class="input-group">
                                <textarea name="" id="" cols="50" rows="2" class="form-control"></textarea>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
  </div>
</div>