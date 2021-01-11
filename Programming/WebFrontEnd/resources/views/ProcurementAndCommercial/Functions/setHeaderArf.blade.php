<div class="row">
  @csrf
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <label class="card-title">
          Add New Advanced Request Form (ARF)
        </label>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
          </button>
        </div>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <table>
                <tr>
                  <td><label>Origin Of Budget</label></td>
                  <td>
                    <div class="input-group">
                      <select class="form-control select2bs4" style="width: 100%;" name="origin_budget" id="origin_budget">
                        <option selected="selected">Project</option>
                        <option>Overhead</option>
                        <option>Sales</option>
                      </select>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td><label>Project Code</label></td>
                  <td>
                    <div class="input-group">
                      <input id="projectcode" style="border-radius:0;" name="project_code" type="text" class="form-control">
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift" style="color:grey;"></i></a>
                        </span>
                      </div>
                    </div>
                  </td>

                  <td>
                    <input id="projectname" style="border-radius:0;" readonly="" class="form-control" name="projek_name">
                  </td>
                </tr>
                <tr>
                  <td><label>Site Code</label></td>
                  <td>
                    <div class="input-group">
                      <input id="subprojectc" style="border-radius:0;" name="site_code" type="text" class="form-control">
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#"><i data-toggle="modal" data-target="#mySPC" class="fas fa-gift" style="color:grey;"></i></a>
                        </span>
                      </div>
                    </div>
                  </td>
                  <td>
                    <input id="subprojectn" style="border-radius:0;" readonly="" class="form-control" name="site_name">
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>