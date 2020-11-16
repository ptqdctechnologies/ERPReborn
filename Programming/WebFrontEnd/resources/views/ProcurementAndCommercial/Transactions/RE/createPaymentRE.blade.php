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
                    <h4 class="carkemas pake zd-title">Create Debit Note Payment Reimbursement</h4>
                  </div>
                  <table>
                    <tr>
                      <td><label>Transaction Number</label></td>
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
                    <tr>
                      <td><label>Reimbursement Number</label></td>
                      <td>
                        <div class="input-group">
                          <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                        </div>
                      </td>                  
                    </tr>
                  </table>
                  <div class="card">
                    <div class="card-body">
                      <div class="col-md-12">
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                          <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Ref Number</th>
                                <th>Project Code</th>
                                <th>Site Code</th>
                                <th>COA Code</th>
                                <th>Valuta</th>
                                <th>Voucher Value</th>
                                <th>PPN</th>
                                <th>Holding Tax</th>
                                <th>Holding Tax Value</th>
                                <th>Total</th>
                                <th>Total Payment</th>
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
                <div class="col-md-6">
                  <div class="form-group">
                    <table>
                      <tr>
                        <td><label>Payment Type</label></td>
                        <td>
                          <div class="input-group">
                            <select class="form-control select2bs4" style="width: 100%; border-radius:0;">
                              <option selected="selected">Alabama</option>
                              <option>Alaska</option>
                              <option>California</option>
                              <option>Delaware</option>
                              <option>Tennessee</option>
                              <option>Texas</option>
                              <option>Washington</option>
                            </select>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Description</label></td>
                        <td>
                          <div class="input-group">
                            <textarea name="" id="" cols="55" rows="3"></textarea>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Currency Code</label></td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                            <div class="input-group-append">
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                              </span>
                            </div>
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Exchange Rate</label></td>
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
                        <td><label>Voucher Total Value</label></td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Voucher Already Paid</label></td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Voucher Balance</label></td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td><label>Payment Value</label></td>
                        <td>
                          <div class="input-group">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                            <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>                                         
              </div>                    
            </div>

            <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                  <div class="card-body table-responsive p-0" style="height: 300px;">
                    <table id="example1" class="table table-head-fixed text-nowrap table-striped">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Ref Number</th>
                          <th>COA Code</th>
                          <th>COA Name</th>
                          <th>Debit</th>
                          <th>Credit</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td></td>
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