<div class="card-body">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <table>
                  <!-- <tr class="budgetDetail">
                      <td><label>Transporter</label></td>
                      <td>
                          <div class="input-group">
                              <input name="transporter" id="transporter" style="border-radius:0;" type="text" class="form-control" disabled value="{{$dataAdvanceRevisions['entities']['combinedBudget_RefID']}}">
                              <div class="input-group-append">
                                  <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#" id="transporter2" data-toggle="modal" data-target="#myTransporter" class="myTransporter"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                  </span>
                              </div>
                          </div>
                      </td>
                  </tr> -->
                  <tr>
                      <td><label>Trans. Phone</label></td>
                      <td>
                          <div class="input-group">
                              <input id="phone" name="phone" style="border-radius:0;" type="number" class="form-control" value="{{$dataAdvanceRevisions['entities']['combinedBudget_RefID']}}">
                          </div>
                      </td>
                  </tr>
                  <tr class="budgetDetail">
                      <td><label>Trans. Fax</label></td>
                      <td>
                          <div class="input-group">
                              <input id="fax" name="fax" style="border-radius:0;" type="number" class="form-control" value="{{$dataAdvanceRevisions['entities']['combinedBudget_RefID']}}">
                          </div>
                      </td>
                  </tr>
                  <tr class="budgetDetail">
                      <td><label>Trans. Contact Person</label></td>
                      <td>
                          <div class="input-group">
                              <input id="contact_person" name="contact_person" style="border-radius:0;" type="number" class="form-control" value="{{$dataAdvanceRevisions['entities']['combinedBudget_RefID']}}">
                          </div>
                      </td>
                  </tr>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-body table-responsive p-0">
                <table>
                  <tr class="budgetDetail">
                      <td><label>Trans. Handphone</label></td>
                      <td>
                          <div class="input-group">
                              <input id="handphone" name="handphone" style="border-radius:0;" type="number" class="form-control" value="{{$dataAdvanceRevisions['entities']['combinedBudget_RefID']}}">
                          </div>
                      </td>
                  </tr>
                  <tr class="budgetDetail">
                      <td><label>Trans. Address</label></td>
                      <td>
                          <div class="input-group">
                              <textarea id="address" rows="3" name="address" style="border-radius:0;" class="form-control">{{$dataAdvanceRevisions['entities']['combinedBudget_RefID']}}</textarea>
                          </div>
                      </td>
                  </tr>
                </table>
                  <!-- <div style="padding-right:10px;padding-top:10px;">
                    <a class="btn btn-default btn-sm float-right cancelDetailArf" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
                        <img src="{{ asset('AdminLTE-master/dist/img/cancel.png') }}" width="13" alt="" title="Cancel"> Cancel
                    </a>
                    <a class="btn btn-default btn-sm float-right cancelDetailArf" style="background-color:#e9ecef;border:1px solid #ced4da;margin-right: 5px;">
                        <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="13" alt="" title="Reset"> Reset
                    </a>
                    <a class="btn btn-default btn-sm float-right" style="margin-right: 5px;background-color:#e9ecef;border:1px solid #ced4da;" data-toggle="modal" data-target="#mySearchDor" id="searchDor">
                        <img src="{{ asset('AdminLTE-master/dist/img/search.png') }}" width="13" alt="" title="Search"> Search DOR
                    </a>
                </div> -->
            </div>