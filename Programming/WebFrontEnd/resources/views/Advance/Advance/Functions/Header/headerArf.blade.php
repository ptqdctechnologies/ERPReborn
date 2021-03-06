<div class="card-body">
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <table>
          <tr>
            <td><label>Origin Of Budget</label></td>
            <td>
              <div class="input-group">
                <select class="form-control" style="width: 100%;" name="origin_budget" id="origin_budget">
                  <option selected="selected" value="">Select Budget</option>
                  <option>Project</option>
                  <option>Overhead</option>
                </select>
              </div>
            </td>
            <td>
              <div id="iconBudget" style="color: red;margin-left:5px;" title="Please input origin budget"></div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <table>
          <tr>
            <td><label>Project Code</label></td>
            <td>
              <div class="input-group">
                <input id="projectcode" style="border-radius:0;" name="project_code" class="form-control" readonly required>
                <div class="input-group-append">
                  <span style="border-radius:0;" class="input-group-text form-control">
                    <a href="#"><i id="projectcode2" data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                  </span>
                </div>
              </div>
            </td>
            <td>
              <input id="projectname" style="border-radius:0;" class="form-control" name="projek_name" readonly>
            </td>
            <td>
              <div id="iconProject" style="color: red;margin-left:5px;" title="Please input project code"></div>
            </td>
          </tr>
        </table>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <table>
          <tr>
            <td><label>Site Code</label></td>
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
              <input id="sitename" style="border-radius:0;" class="form-control" name="site_name" readonly>
            </td>
            <td>
              <div id="iconSite" style="color: red;margin-left:5px;" title="Please input site code"></div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>