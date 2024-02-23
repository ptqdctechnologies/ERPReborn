<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;MSR Number</label></td>
            <td>
              <div class="input-group">
                <input id="msr_number" style="border-radius:0;" name="msr_number" class="col-4 form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="msr_number_popup" data-toggle="modal" data-target="#myMaterialServiceRequest" class="myMaterialServiceRequest"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Budget Code</label></td>
            <td>
              <div class="input-group">
                <input id="project_code" style="border-radius:0;" name="project_code" class="col-4 form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="project_code_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
                <input id="project_code_detail" style="border-radius:0;" class="col-8 form-control" name="project_code_detail" readonly>
              </div>
            </td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Sub Budget Code</label></td>
            <td>
              <div class="input-group">
                <input id="site_code" style="border-radius:0;" name="site_code" class="col-4 form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="site_code_popup" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
                <input id="site_code_detail" style="border-radius:0;" class="col-8 form-control" name="site_code_detail" readonly>
              </div>
            </td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Item Location</label></td>
            <td>
              <div class="input-group">
                <input id="warehouse_from_id" name="warehouse_from_id" class="form-control" hidden>
                <input id="warehouse_from" name="warehouse_from" class="form-control">
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#"><i id="warehouse_from_2" data-toggle="modal" data-target="#myGetWarehouse" class="fas fa-gift myGetWarehouseFrom" style="color:grey;"></i></a>
                  </span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Delivery To</label></td>
            <td>
              <div class="input-group">
                <input id="warehouse_to_id" name="warehouse_to_id" class="form-control" hidden>
                <input id="warehouse_to" name="warehouse_to" class="form-control">
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#"><i id="warehouse_to_2" data-toggle="modal" data-target="#myGetWarehouse" class="fas fa-gift myGetWarehouseTo" style="color:grey;"></i></a>
                  </span>
                </div>
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
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Delivery Date</label></td>
            <td>
              <div class="input-group">
                <input id="dateCommance" name="dateCommance" style="border-radius:0;" type="date" class="form-control">
              </div>
            </td>
          </tr>
          <tr>
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Notes</label></td>
            <td>
              <div class="input-group">
                <textarea name="var_remark" id="remark" rows="5" cols="20" class="form-control"></textarea>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <a onclick="CancelMaterialReceive();" class="btn btn-default btn-sm float-right CancelDor" style="background-color:#e9ecef;border:1px solid #ced4da;">
    <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel"> Cancel
  </a>

  <a onclick="CancelMaterialReceive();" class="btn btn-default btn-sm float-right CancelDor" style="background-color:#e9ecef;border:1px solid #ced4da;">
    <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Cancel"> Reset
  </a>
  <a class="btn btn-default btn-sm float-right" id="AddToDetail" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;">
    <img src="{{ asset('AdminLTE-master/dist/img/add.png') }}" width="13" alt="" title="Add"> Add
  </a>
</div>