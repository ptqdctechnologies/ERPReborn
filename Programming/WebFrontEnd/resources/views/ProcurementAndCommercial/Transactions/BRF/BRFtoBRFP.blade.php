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
                    <h3 class="card-title">Choose Transaction</h3>
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
                          <th>
                            <label>Select Trano</label>
                          </th>
                          <th>
                            <div class="input-group">
                              <input id="projectcode" style="border-radius:0;" type="text" class="form-control">
                              <div class="input-group-append">
                                <span style="border-radius:0;" class="input-group-text form-control">
                                  <a href="#"><i data-toggle="modal" data-target="#myProject" class="fas fa-gift"></i></a>
                                </span>
                              </div>
                            </div>
                          </th>
                        </tr>
                        <tr>
                          <th>BRF Trano</th>
                          <th>BRF Payment Trano</th>
                          <th>BSF Trano</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
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