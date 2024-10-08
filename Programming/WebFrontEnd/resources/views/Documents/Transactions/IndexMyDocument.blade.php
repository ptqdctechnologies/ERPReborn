@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">My Document</label>
        </div>
      </div>
      @include('Documents.Functions.Menu.MenuMyDocument')
      <div class="card" style="position:relative;bottom:10px;">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">
            <!-- MY PROCESS DOCUMENT -->
            <div class="col-12 ShowDocument">
              <div class="card">
                <!-- TITLE -->
                <div class="card-header">
                  <label class="card-title">
                    My Process Document
                  </label>
                </div>
                <br>
                <form method="post" enctype="multipart/form-data" action="{{ route('MyDocument.MyDocumentListDataFilter') }}" id="FormSubmitMyDocument">
                  @csrf
                  <div class="card-body">
                    <div class="row">
                      <!-- TRANSACTION NUMBER -->
                      <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="form-group">
                          <table style="width: 100%;">
                            <tr>
                              <th class="col-5 pl-0"><label>Transaction&nbsp;Number</label></th>
                              <td class="col-7 p-0">
                                <div class="input-group" style="padding-bottom: 7px;">
                                  <input id="trano" style="border-radius:0;" class="form-control" name="trano" type="text">
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <!-- DOCUMENT TYPE -->
                      <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="form-group">
                          <table style="width: 100%;">
                            <tr>
                              <th class="col-5 pl-0" style="padding-top: 7px;"><label>Document Type</label></th>
                              <td class="col-7 p-0">
                                <div class="input-group" style="padding-bottom: 3px;">
                                  <select id="DocumentType" class="form-control DocumentType select2" name="DocumentType" style="width: 100%;">
                                    <option selected="selected" value=""> Select Document Type </option>
                                  </select>
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <!-- BUDGET -->
                      <div class="col-sm-12 col-md-4 col-lg-3">
                        <div class="form-group">
                          <table style="width: 100%;">
                            <tr>
                              <th class="col-5 pl-0" style="padding-top: 7px;"><label>Budget</label></th>
                              <td class="col-7 p-0">
                                <div class="input-group" style="padding-bottom: 3px;">
                                  <input id="projectid" style="border-radius:0;" class="form-control" name="projectid" type="hidden">
                                  <input id="projectcode" style="border-radius:0;background-color:white;" class="form-control myProject" name="projectcode" readonly data-toggle="modal" data-target="#myProject">
                                  <div class="input-group-append">
                                    <span style="border-radius:0;" class="input-group-text form-control">
                                      <a href="#" id="projectcode2" data-toggle="modal" data-target="#myProject" class="myProject"><img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt=""></a>
                                    </span>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <!-- BUTTON -->
                      <div class="col-sm-12 col-md-12 col-lg-2 mt-sm-0 mt-md-2 mt-lg-0 d-md-flex justify-content-md-end d-lg-block justify-content-lg-start">
                        <div class="form-group mt-3 mt-sm-3 mt-md-0 d-flex d-sm-flex d-md-block justify-content-end justify-content-sm-end">
                          <table>
                            <tr>
                              <button class="btn btn-default btn-sm" style="position: relative;bottom:1px;" type="submit">
                                <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="12" alt="" title="Search"> &nbsp; Search
                              </button>
                              &nbsp;&nbsp;
                              <a class="btn btn-default btn-sm" style="position: relative;bottom:1px;" onclick="ResetFilter()">
                                <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="12" alt="" title="Reset"> &nbsp; Reset
                              </a>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <!-- TABLE -->
            <div class="col-12 ShowDocument">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="table table-head-fixed text-nowrap TableMyDocument" id="TableMyDocument">
                    <thead>
                      <tr>
                        <th style="border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                        <th style="border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Transaction Number</th>
                        <th style="border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Budget</th>
                        <th style="border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">From</th>
                        <th style="border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                        <th style="border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Status</th>
                        <th style="border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Comment</th>
                      </tr>
                    </thead>
                    <tbody>
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
@include('Documents.Functions.Footer.FooterMyDocument')
@endsection