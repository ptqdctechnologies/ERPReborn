<div class="card-body">
  <div class="row py-2 justify-content-between" style="gap: 15px;">
    <div class="col-md-12 col-lg-5">
      <div class="row align-items-center">
        <label class="col-4 col-form-label p-0">Budget Code</label>
        <div class="col d-flex p-0">
          <div>
            <input id="projectcode" style="border-radius:0;" name="projectcode" class="form-control" readonly>
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="#" id="projectcode2" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
            </span>
          </div>
          <div style="flex: 80%;">
            <div class="input-group">
              <input id="projectname" style="border-radius:0;" class="form-control" name="projectname" readonly>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 5px;"><label>Budget Code</label></td>
            <td>
              <div class="input-group" style="width: 70%;">
                <input id="projectcode" style="border-radius:0;" name="projectcode" class="form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="projectcode2" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
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
        </table>
      </div> -->
    </div>

    <div class="col-md-12 col-lg-5">
      <div class="row align-items-center">
        <label class="col-4 col-form-label p-0">Sub Budget Code</label>
        <div class="col d-flex p-0">
          <div>
            <input name="var_combinedBudget" id="combinedBudget" style="border-radius:0;" type="hidden" class="form-control" readonly>
            <input id="sitecode" style="border-radius:0;" name="sitecode" class="form-control" readonly>
          </div>
          <div>
            <span style="border-radius:0;" class="input-group-text form-control">
              <a href="#" id="sitecode2" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
            </span>
          </div>
          <div style="flex: 80%;">
            <div class="input-group">
              <input id="sitename" style="border-radius:0;" class="form-control" name="sitename" readonly>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="form-group">
        <table>
          <tr>
            <td style="padding-top: 5px;"><label>Sub Budget Code</label></td>
            <td>
              <div class="input-group" style="width: 70%;">
                <input id="sitecode" style="border-radius:0;" name="sitecode" class="form-control" readonly>
                <input name="var_combinedBudget" id="combinedBudget" style="border-radius:0;" type="hidden" class="form-control" readonly>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#" id="sitecode2" data-toggle="modal" data-target="#mySiteCode"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
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
      </div> -->
    </div>
  </div>
</div>