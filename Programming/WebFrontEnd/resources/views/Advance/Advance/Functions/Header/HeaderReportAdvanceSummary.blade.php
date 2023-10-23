<div class="col-12 ShowDocument">
  <div class="card">
    <form method="post" enctype="multipart/form-data" action="{{ route('AdvanceRequest.ReportAdvanceSummaryStore') }}" id="FormSubmitReportAdvanceSummary">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-2">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Budget&nbsp;</label></th>
                  <td>
                    <div class="input-group">
                      <input id="budget_id" style="border-radius:0;" class="form-control" name="budget_id" type="hidden">
                      <input id="budget" style="border-radius:0;background-color:white;" class="form-control myProject" name="budget" readonly data-toggle="modal" data-target="#myProject">
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#" id="budget_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Sub&nbsp;Budget&nbsp;</label></th>
                  <td>
                    <div class="input-group">
                      <input id="sub_budget_id" style="border-radius:0;" class="form-control" name="sub_budget_id" type="hidden">
                      <input id="sub_budget" style="border-radius:0;background-color:white;" class="form-control myProject" name="sub_budget" readonly data-toggle="modal" data-target="#myProject">
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#" id="sub_budget_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Work&nbsp;ID&nbsp;</label></th>
                  <td>
                    <div class="input-group">
                      <input id="work_id" style="border-radius:0;" class="form-control" name="work_id" type="hidden">
                      <input id="work" style="border-radius:0;background-color:white;" class="form-control myProject" name="work_id" readonly data-toggle="modal" data-target="#myProject">
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#" id="work_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Product&nbsp;</label></th>
                  <td>
                    <div class="input-group">
                      <input id="product_id" style="border-radius:0;" class="form-control" name="product_id" type="hidden">
                      <input id="product" style="border-radius:0;background-color:white;" class="form-control myProject" name="product_code" readonly data-toggle="modal" data-target="#myProject">
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#" id="product_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <table>
                <tr>
                  <th style="padding-top: 7px;"><label>Beneficiary&nbsp;</label></th>
                  <td>
                    <div class="input-group">
                      <input id="beneficiary_id" style="border-radius:0;" class="form-control" name="beneficiary_id" type="hidden">
                      <input id="beneficiary" style="border-radius:0;background-color:white;" class="form-control myProject" name="beneficiary_name" readonly data-toggle="modal" data-target="#myProject">
                      <div class="input-group-append">
                        <span style="border-radius:0;" class="input-group-text form-control">
                          <a href="#" id="beneficiary_popup" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                        </span>
                      </div>
                    </div>
                  </td>
                </tr>
              </table>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <table>
                <tr>
                  <td>
                    <button class="btn btn-default btn-sm" type="submit">
                      <img src="{{ asset('AdminLTE-master/dist/img/backwards.png') }}" width="12" alt="" title="Show"> Show
                    </button>
                  </td>
                  <td>
                    <select name="" id="" class="form-control">
                      <option value="PDF">PDF</option>
                      <option value="Excel">Excel</option>
                    </select>
                  </td>
                  <td>
                    &nbsp;&nbsp;<span><img src="{{ asset('AdminLTE-master/dist/img/printer.png') }}" width="17" alt=""></span>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>