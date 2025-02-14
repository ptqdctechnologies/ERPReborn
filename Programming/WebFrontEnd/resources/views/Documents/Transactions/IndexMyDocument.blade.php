@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getProject')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
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
                <!-- HEADER -->
                <div class="card-header">
                  <label class="card-title">
                    My Process Document
                  </label>
                </div>

                <!-- BODY -->
                <form method="post" enctype="multipart/form-data" action="{{ route('MyDocument.MyDocumentListDataFilter') }}" id="FormSubmitMyDocument">
                  @csrf
                  <div class="card-body">
                    <div class="row py-2 py-sm-2 py-md-3" style="row-gap: 1rem;">
                      <!-- TRANSACTION NUMBER -->
                      <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="row">
                          <label class="col-6 col-sm-6 col-md-6 col-lg-6 text-bold" style="margin-top: 4px;">Transaction Number</label>
                          <div class="col-6 col-sm-6">
                            <input id="trano" style="border-radius:0;" class="form-control" name="trano" type="text">
                          </div>
                        </div>
                      </div>

                      <!-- DOCUMENT TYPE -->
                      <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="row">
                          <label class="col-6 col-sm-6 col-md-6 col-lg-5 text-bold" style="margin-top: 4px;">Document Type</label>
                          <div class="col-6 col-sm-6 col-md-6 col-lg-7">
                            <select id="DocumentType" class="form-control DocumentType select2" name="DocumentType" style="width: 100% !important;">
                              <option selected="selected" value=""> Select Document Type </option>
                            </select>
                          </div>
                        </div>
                      </div>

                      <!-- BUDGET -->
                      <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="row">
                          <label class="col-6 col-sm-6 col-md-6 col-lg-5 text-bold" style="margin-top: 4px;">Budget</label>
                          <div class="col d-flex">
                            <div style="flex: 100%;">
                              <input id="projectid" style="border-radius:0;" class="form-control" name="projectid" type="hidden">
                              <input id="projectcode" style="border-radius:0;background-color:white;" class="form-control myProject" name="projectcode" readonly data-toggle="modal" data-target="#myProject">
                            </div>
                            <div>
                              <span style="border-radius:0;" class="input-group-text form-control">
                                <a href="#" id="projectcode2" data-toggle="modal" data-target="#myProject" class="myProject">
                                  <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="13" alt="">
                                </a>
                              </span>
                            </div>
                            <!-- <div style="flex: 100%;">
                              <div class="input-group">
                                <input id="project_name" hidden style="border-radius:0;" class="form-control" name="project_name" readonly>
                              </div>
                            </div> -->
                          </div>
                        </div>
                      </div>

                      <!-- SEARCH & RESET -->
                      <div class="col-12 col-sm-12 col-md-6 col-lg-2">
                        <div class="row px-2" style="justify-content: right; gap: .5rem;">
                          <button class="btn btn-default btn-sm" style="position: relative;bottom:1px;" disabled type="submit">
                            <img src="{{ asset('AdminLTE-master/dist/img/box.png') }}" width="12" alt="" title="Search"> &nbsp; Search
                          </button>
                          <a class="disabled btn btn-default btn-sm" style="position: relative;bottom:1px; cursor: not-allowed;" onclick="ResetFilter()">
                            <img src="{{ asset('AdminLTE-master/dist/img/reset.png') }}" width="12" alt="" title="Reset"> &nbsp; Reset
                          </a>
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

                    <tfoot>
                      <tr class="loadingGetMyDocument">
                        <td colspan="7" class="p-0">
                          <div class="d-flex flex-column justify-content-center align-items-center py-3">
                            <div class="spinner-border" role="status">
                              <span class="sr-only">Loading...</span>
                            </div>
                            <div class="mt-3" style="font-size: 0.75rem; font-weight: 700;">
                              Loading...
                            </div>
                          </div>
                        </td>
                      </tr>
                      <tr class="errorMessageMyDocumentContainer">
                        <td colspan="7" class="p-0">
                          <div class="d-flex flex-column justify-content-center align-items-center py-3">
                            <div id="errorMessageMyDocument" style="font-size: 0.8rem; font-weight: 500;">
                            </div>
                          </div>
                        </td>
                      </tr>
                    </tfoot>
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