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
                                        <label class="card-title">Fund Business Trip Payment</label>
                                    </div>                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                    <div class="card-body">
                                    <div class="form-group">
                                        <table>
                                            <tr>
                                                <td><label>BRF Number</label></td>
                                                <td>
                                                    <div class="input-group">
                                                        <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                                                        <div class="input-group-append">
                                                        <span style="border-radius:0;" class="input-group-text form-control">
                                                            <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                                                        </span>
                                                        </div>
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
            <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                      <div class="card-body">
                      <label class="card-title">Create New ASF</label>
                      <br><hr><br>
                        <div class="form-group">
                          <table>
                            <tr>
                              <td><label>Porject</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="projectcode" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="managerNames" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Site</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="managerUid" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                              <td>
                              <div class="input-group">
                                  <input id="managerNames" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>
                            </tr>
                            <tr>
                              <td><label>Requester</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="currencyCodeId" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                              
                            </tr>
                            <tr>
                              <td><label>Business Trip Location</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="currencyCodeId" style="border-radius:0;" type="text" class="form-control">                                  
                                </div>
                              </td>                              
                            </tr>
                            <tr>
                              <td><label>Travel Date</label></td>
                              <td>
                                <div class="input-group">
                                  <input id="currencyCodeId" style="border-radius:0;" type="text" class="form-control">                                  
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
                        
                                <div class="col-md-12">
                                    <div class="card">
                                    <div class="card-body">
                                    <div class="card-body table-responsive p-0" style="height: 300px;">
                                        <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Sequence</th>
                                                    <th>Allowance</th>
                                                    <th>Transport</th>
                                                    <th>Airport Tax</th>
                                                    <th>Accomodation</th>
                                                    <th>Total Payment</th>
                                                    <th>Available Payment</th>
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