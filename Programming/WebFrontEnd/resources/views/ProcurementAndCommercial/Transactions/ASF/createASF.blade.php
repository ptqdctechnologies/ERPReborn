@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('ProcurementAndCommercial.Functions.manager')
@include('ProcurementAndCommercial.Functions.currency')
@include('ProcurementAndCommercial.Functions.financeStaff')
@include('ProcurementAndCommercial.Functions.searchArf')
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">
                    Create New ASF
                  </label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>
                @include('ProcurementAndCommercial.Functions.sectHeaderAsf')
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <label class="card-title">
                  ARF Detail
                </label>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                  </button>
                </div>
              </div>
              @include('ProcurementAndCommercial.Functions.sectArfDetail')
            </div>
          </div>
          <form action="">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Detail Advance Settlement Form (ASF)
                    </label>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body detailASF">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>ARF Number</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>ARF Date</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Project Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Site Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>CFS Code</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="" style="border-radius:0;" type="text" class="form-control">
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
                              <div>
                                <label>
                                  <strong>Balance</strong><br>
                                </label>
                              </div>
                            </tr>
                            <tr>
                              <td><label>Total ARF</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Total ASF</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Balance</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="card-body detailASF">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <table>
                            <tr>
                              <div>
                                <label>
                                  <strong>Expense Claim</strong><br>
                                </label>
                              </div>
                            </tr>
                            <tr>
                              <td><label>QTY</label></td>
                              <td>
                                <div class="input-group" style="padding-left: 43px;">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Price</label></td>
                              <td>
                                <div class="input-group" style="padding-left: 43px;">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Total</label></td>
                              <td>
                                <div class="input-group" style="padding-left: 43px;">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
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
                              <div>
                                <label>
                                  <strong>Amount Due to Company</strong><br>
                                </label>
                              </div>
                            </tr>
                            <tr>
                              <td><label>QTY</label></td>
                              <td>
                                <div class="input-group" style="padding-left: 23px;">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Price</label></td>
                              <td>
                                <div class="input-group" style="padding-left: 23px;">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Total</label></td>
                              <td>
                                <div class="input-group" style="padding-left: 23px;">
                                  <input id="subprojectc" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <br>
                        <button type="reset" class="btn btn-outline-danger btn-sm float-right" title="Reset">
                          <i class="fa fa-times" aria-hidden="true">Cancel Add</i>
                        </button>
                        <a href="#" class="btn btn-outline-success btn-sm float-right"><i class="fas fa-plus" aria-hidden="true">Add to List Cart</i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <!--|-------------------------------------------------------------------------|
                  |                               End ARF Chart                             |
                  |-------------------------------------------------------------------------|-->


          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <label class="card-title">Amount Due to Company Cart</label>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                  </button>
                </div>
              </div>

              <div class="card-body table-responsive p-0" style="height: 230px;" id="amountCompanyCart">
                <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Action</th>
                      <th>No Trans</th>
                      <th>Work Id</th>
                      <th>Work Name</th>
                      <th>Product ID</th>
                      <th>Name Material</th>
                      <th>Unit</th>
                      <th>Unit Price</th>
                      <th>QTY</th>
                      <th>Total Price</th>
                      <th>Description</th>
                      <th>CFS Code</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <tr>
                      <td>1</td>
                      <td>

                        <a class="btn btn-outline-secondary btn-sm" href="#">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                      <td>1</td>
                      <td>2</td>
                      <td>3</td>
                      <td>4</td>
                      <td>5</td>
                      <td>6</td>
                      <td>7</td>
                      <td>8</td>
                      <td>9</td>
                      <td>10</td>
                      <td>11</td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <label class="card-title">Expense Claim Cart</label>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                  </button>
                </div>
              </div>

              <div class="card-body table-responsive p-0" style="height: 230px;" id="expenseClaimCart">
                <table id="editableAsf" class="table table-head-fixed text-nowrap table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Action</th>
                      <th>No Trans</th>
                      <th>Work ID</th>
                      <th>Work Name</th>
                      <th>Product ID</th>
                      <th>Name Material</th>
                      <th>Unit</th>
                      <th>Unit Price</th>
                      <th>QTY</th>
                      <th>Total Price</th>
                      <th>Description</th>
                      <th>CSF Code</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <tr>
                      <td>6</td>

                      <td>3</td>
                      <td>4</td>
                      <td>5</td>
                      <td>6</td>
                      <td>7</td>
                      <td>8</td>
                      <td>9</td>
                      <td>10</td>
                      <td>11</td>
                      <td>11</td>
                      <td>11</td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <button type="reset" class="btn btn-outline-danger btn-sm float-right">
            <i class="fa fa-times" aria-hidden="true"></i>
            Cancel ASF List (Cart)
          </button>
          <button type="submit" class="btn btn-outline-success btn-sm float-right">
            <i class="fa fa-save" aria-hidden="true"></i>
            Save ASF List(Cart)
          </button>
        </div>
      </div>
    </div>
  </section>
</div>
@include('Partials.footer')
@include('ProcurementAndCommercial.Functions.footerFunctionAsf')
@endsection