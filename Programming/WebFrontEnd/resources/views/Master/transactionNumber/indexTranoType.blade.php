@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <form method="post" enctype="multipart/form-data" action="#" name="formHeaderMret">
            <div class="row">
              @csrf
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <label class="card-title">
                      Add Trano Type
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
                              <td><label>Trano Type</label></td>
                              <td>
                                <div class="input-group">
                                  <input autocomplete="off" id="projectcode" name="projectcode" class="form-control">
                                </div>
                              </td>
                            </tr>

                            <tr>
                              <td><label>Trano Prefix (Ex.PR01, PO01) </label></td>
                              <td>
                                <div class="input-group">
                                  <input autocomplete="off" id="projectcode" name="projectcode" class="form-control">
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Remark</label></td>
                              <td>
                                <div class="input-group">
                                  <textarea name="" id="address" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                        <button type="reset" class="btn btn-outline btn-success btn-sm float-right" id="saveArfList" style="margin-right: 5px;">
                          <i class="fas fa-plus" aria-hidden="true" title="Submit to Advance">Create</i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">Trano Type List</label>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-angle-down btn-sm" style="color:black;"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="table1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Delete</th>
                        <th>Type</th>
                        <th>Trano Prefix</th>
                        <th>Ket</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <button type="reset" class="btn btn-danger btn-sm float-right" title="Delete" style="border-radius: 100px;position:relative;right:120px;">
                            <i class="fas fa-minus" aria-hidden="true"></i>
                          </button>
                        </td>
                        <td>x</td>
                        <td>x</td>
                        <td>x</td>
                      </tr>
                    </tbody>
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
@endsection