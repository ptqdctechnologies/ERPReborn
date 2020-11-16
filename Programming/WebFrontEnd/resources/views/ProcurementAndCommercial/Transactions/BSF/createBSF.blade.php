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
                <div class="col-md-12">
                  <div class="card-header">
                    <label class="card-title">File Attachment</label>
                  </div>
                </div>
                
                <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
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
                  <div class="form-group">
                    <table>
                      <tr>
                        <td><label>Requester</label></td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Manager Name</label></td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                            <div class="input-group-append">
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                              </span>
                            </div>
                            <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Currency</label></td>
                        <td>
                          <div class="input-group">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            <div class="input-group-append">
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="#"><i data-toggle="modal" data-target="#myRequester" class="fas fa-gift"></i></a>
                              </span>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>PIC Name</label></td>
                        <td>
                          <div class="input-group">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Finance Receiving Name</label></td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                            <div class="input-group-append">
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                              </span>
                            </div>
                            <input id="projectname" style="border-radius:0;" type="text" class="form-control" placeholder="Text Input">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Remark</label></td>
                        <td>
                          <textarea name="" id="" cols="53" rows="3"></textarea>
                        </td>
                      </tr>
                      <tr>
                      <td><label>Total</label></td>
                        <td>
                          <div class="input-group">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <br><br><br><br><br>
                </div>                
              </div>                                  
              </div>              
              </div>              
              <a class="btn btn-danger btn-sm float-right" href="#">
                <i class="fa fa-times" aria-hidden="true"></i>
                Cancel
              </a>
              <a class="btn btn-primary btn-sm float-right" href="#">
                <i class="fa fa-check-square" aria-hidden="true"></i>
                Submit
              </a>
            </div>
            
            <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                  <div class="card-header">
                    <h3 class="card-title">ARF Detail</h3>
                  </div>
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                      <thead>
                        <tr>
                          <th>No Trans</th>
                          <th>Work ID</th>
                          <th>Work Name</th>
                          <th>Product ID</th>
                          <th>Name Material</th>
                          <th>Unit</th>
                          <th>Unit Price</th>
                          <th>QTY</th>
                          <th>Total Price</th>
                          <th>Currency</th>
                          <th>Description</th>
                          <th>Available</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <div class="row">                  
                  <div class="col-md-6">
                  <div class="card-header">
                      <label class="card-title">Detail Business Trip Settlement Form</label>
                    </div>

                  <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                      <table>
                        <tr>
                          <td><label>BRF Number</label></td>
                          <td>
                            <div class="input-group">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><label>BRF Date</label></td>
                          <td>
                            <div class="input-group">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><label>Project Code</label></td>
                          <td>
                            <div class="input-group">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><label>Site Code</label></td>
                          <td>
                            <div class="input-group">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><label>CFS Code</label></td>
                          <td>
                            <div class="input-group">
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
                  <div class="card-header">
                      <label class="card-title">Balance</label>
                    </div>
                  <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                      <table>
                        <tr>
                          <td><label>Total ARF</label></td>
                          <td>
                            <div class="input-group">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><label>Total BSF</label></td>
                          <td>
                            <div class="input-group">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><label>Balance</label></td>
                          <td>
                            <div class="input-group">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tr>                        
                      </table>
                    </div>
                    <br><br><br><br>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card-header">
                      <label class="card-title">Expense Claim</label>
                    </div>

                  <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                      <table>                        
                          <td><label>QTY</label></td>
                          <td>
                            <div class="input-group">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><label>Price</label></td>
                          <td>
                            <div class="input-group">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><label>Total</label></td>
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
                  <div class="card-header">
                      <label class="card-title">Amount Due to Company</label>
                    </div>

                  <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                      <table>                        
                        <tr>
                          <td><label>QTY</label></td>
                          <td>
                            <div class="input-group">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><label>Price</label></td>
                          <td>
                            <div class="input-group">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                              <input id="requestcode" style="border-radius:0;" type="text" class="form-control">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td><label>Total</label></td>
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

              </div>
              </div>
            </div>
            
            <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                  <div class="card-header">
                    <h3 class="card-title">Amount Due To Company Cart</h3>
                  </div>
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                      <thead>
                        <tr>
                          <th></th>
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
                          <th>CFS Code</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                  <div class="card-header">
                    <h3 class="card-title">Expense Claim Cart</h3>
                  </div>
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                      <thead>
                        <tr>
                          <th></th>
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
                          <th>CFS Code</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <a class="btn btn-warning btn-sm" href="#">
                              <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                          <td>yes</td>
                        </tr>
                      </tbody>
                    </table>
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