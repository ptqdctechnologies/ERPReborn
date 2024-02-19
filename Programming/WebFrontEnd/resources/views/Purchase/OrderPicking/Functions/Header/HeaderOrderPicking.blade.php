<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;MSR Number</label></td>
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
                <input id="site_code" style="border-radius:0;" name="site_code" class="col-4 form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="site_code_popup" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
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
            <td style="padding-top: 5px;"><label>&nbsp;&nbsp;&nbsp;Delivery To</label></td>
            <td>
              <div class="input-group">
                <input id="site_code" style="border-radius:0;" name="site_code" class="col form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="site_code_popup" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                  </span>
                </div>
              </div>
            </td>
          </tr>
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
                <textarea name="var_remark" id="remark" rows="4" cols="20" class="form-control"></textarea>
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