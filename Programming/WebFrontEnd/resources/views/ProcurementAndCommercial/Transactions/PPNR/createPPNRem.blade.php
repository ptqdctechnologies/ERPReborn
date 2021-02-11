@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('ProcurementAndCommercial.Functions.PoTrano')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">

      <div class="card">
        <div class="card-body">
          <div class="row">

            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="card-header">
                    <label class="card-title">Add PPN Reimbursement Form</label>
                  </div>
                  <div class="form-group">
                    <table>
                      <tr>
                        <td><label>PO Trano</label></td>
                        <td>
                          <div class="input-group">
                            <input id="productcode" style="border-radius:0;" type="text" class="form-control form-control-sm">
                            <div class="input-group-append">
                              <span style="border-radius:0;" class="input-group-text form-control-sm">
                                <a href="#"><i data-toggle="modal" data-target="#mySearchPPNRem" class="fas fa-gift" style="color: grey;"></i></a>
                              </span>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Total PO Value</label></td>
                        <td>
                          <div class="input-group">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Project</label></td>
                        <td>
                          <div class="input-group">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Site</label></td>
                        <td>
                          <div class="input-group">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>PPN Reimbursement Value</label></td>
                        <td>
                          <div class="input-group">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Faktur Pajak No</label></td>
                        <td>
                          <div class="input-group">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Remark/Description</label></td>
                        <td>
                          <div class="input-group">
                            <textarea name="" id="" cols="50" rows="3" class="form-control"></textarea>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Rate IDR</label></td>
                        <td>
                          <div class="input-group">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <div class="card-header">
                  <label class="card-title">Upload Document For This PPN Reimbursement</label>
                </div>
                <div class="card-body table-responsive p-0" style="height: 240px;width:100%;">
                  <table class="table table-head-fixed text-nowrap">
                    <div class="form-group input_fields_wrap">
                      <div class="input-group control-group" style="width:100%;">
                        <input type="file" class="form-control filenames_1" id="filenames_1" style="height:26px;" name="filenames">
                        <div class="input-group-btn">
                          <a class="btn btn-outline btn-success btn-sm add_field_button">
                            <i class="fas fa-plus" aria-hidden="true" title="Add File" style="color:white;">Add</i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </table>
                </div>
                <a class="btn btn-success btn-sm float-right" href="#">
                  <i class="fa fa-check-square" aria-hidden="true"></i>
                  Submit PPN Rem
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>
  </section>
</div>
@include('Partials.footer')
@include('ProcurementAndCommercial.Functions.footerFunctionPpnRem')
@endsection