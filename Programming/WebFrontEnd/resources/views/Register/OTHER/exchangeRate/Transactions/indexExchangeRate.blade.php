@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">Rate List by Finance & Accounting Staff</label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->

                <div class="card-body">
                  <form>
                    <div class="form-group">
                      <table>
                        <tr>
                          <td><label>Currency</label></td>
                          <td>
                            <div class="input-group">
                              <select class="form-control" style="width: 100%;" name="origin_budget" id="origin_budget">
                                <option>USD</option>
                                <option>IDR</option>
                              </select>
                            </div>
                          </td>
                          <td><label style="margin-left:30px;">From</label></td>
                          <td>
                            <div class="input-group">
                              <input autocomplete="off" style="border-radius:0;" type="date" class="form-control" id="name" onkeyup="searchProjectName()">
                            </div>
                          </td>
                          <td><label style="margin-left:30px;">To</label></td>
                          <td>
                            <div class="input-group">
                              <input autocomplete="off" style="border-radius:0;" type="date" class="form-control" id="name" onkeyup="searchProjectName()">
                            </div>
                          </td>
                          <td>
                            <button class="btn btn-success btn-sm">Show</button>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </form>
                  <br>
                  <table id="table1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Date</th>
                        <th>ID Rate</th>
                        <th>Currency</th>
                        <th>Staff</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">Rate List by System</label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <form>
                    <div class="form-group">
                      <table>
                        <tr>
                          <td><label>Currency</label></td>
                          <td>
                            <div class="input-group">
                              <select class="form-control" style="width: 100%;" name="origin_budget" id="origin_budget">
                                <option>USD</option>
                                <option>IDR</option>
                              </select>
                            </div>
                          </td>
                          <td><label style="margin-left:30px;">From</label></td>
                          <td>
                            <div class="input-group">
                              <input autocomplete="off" style="border-radius:0;" type="date" class="form-control" id="name" onkeyup="searchProjectName()">
                            </div>
                          </td>
                          <td><label style="margin-left:30px;">To</label></td>
                          <td>
                            <div class="input-group">
                              <input autocomplete="off" style="border-radius:0;" type="date" class="form-control" id="name" onkeyup="searchProjectName()">
                            </div>
                          </td>
                          <td>
                            <button class="btn btn-success btn-sm">Show</button>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </form>
                  <br>

                  <table id="table2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Date</th>
                        <th>ID Rate</th>
                        <th>Currency</th>
                        <th>Staff</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@include('Partials.footer')
@include('Master.exchangeRate.Functions.Footer.footerExchangeRate')
@endsection