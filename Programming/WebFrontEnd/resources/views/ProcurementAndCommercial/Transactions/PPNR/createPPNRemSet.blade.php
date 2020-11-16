@extends('Partials.app')
  @section('main')
    @include('Partials.navbar')
    @include('Partials.sidebar')

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
                    <label class="card-title">Upload Document For This PPN REM Settlement</label>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Select a file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>                      
                  <div class="card">
                    <div class="card-body">
                      <div class="card-header">                          
                      </div>
                      <div class="card-body table-responsive p-0" style="height: 200px;">
                        <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>File Name</th>
                              <th>Action</th>                                
                            </tr>
                          </thead>
                          <tbody>
                            <tr>                                
                              <td>1</td>
                              <td>This is file name</td>
                              <td>                                  
                                <a class="btn btn-danger btn-sm" href="#">
                                  <i class="fas fa-trash"></i>
                                </a>
                              </td>
                            </tr>                         
                          </tbody>
                        </table>
                      </div>                        
                    </div>                    
                  </div>                  
                </div>
                </div>                  
                </div>
                <div class="col-md-6">
                <div class="card">
                  <div class="card-body">

                    <div class="card-header">
                    <label class="card-title">Add PPN Reimbursement Settlement Form</label>
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
                                  <a href="#"><i data-toggle="modal" data-target="#myProduct" class="fas fa-gift"></i></a>
                                </span>
                              </div>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><label>Total PO Trano</label></td>
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
                            <textarea name="" id="" cols="50" rows="3"></textarea>
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
                    <br><br><br>
                  </div>
                </div>
                </div>                  
                </div>
                <a class="btn btn-primary btn-sm float-right" href="#">
                  <i class="fa fa-check-square" aria-hidden="true"></i>
                  Submit PPN Rem
                </a>                                        
              </div>                    
            </div>                         
          </div>
        </div>
      </section>
    </div>
    @include('Partials.footer')
            
  @endsection