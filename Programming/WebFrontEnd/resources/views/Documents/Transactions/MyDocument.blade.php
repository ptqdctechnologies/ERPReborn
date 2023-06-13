@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

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
            <div class="col-12 ShowDocument">
              <div class="card">
                <div class="card-header">
                  <label class="card-title">
                    My Process Document
                  </label>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-head-fixed text-nowrap table-sm TableMyDocument" id="TableMyDocument">
                    <thead>
                      <tr>
                        <th>Trano</th>
                        <th>Project</th>
                        <th>From</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Comment</th>
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
@include('Documents.Functions.Footer.FooterMyDocument')
@endsection