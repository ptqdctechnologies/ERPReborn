@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProject')
@include('Process.Advance.AdvanceRequest.Functions.Table.TableAdvanceRevision')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Advance Report Detail</label>
        </div>
      </div>
      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">
            @include('Process.Advance.AdvanceRequest.Functions.Header.HeaderReportAdvanceSummaryDetail')

            <?php if ($dataReport) { ?>
            <div class="card">
              <div class="tab-content p-3" id="nav-tabContent">
                <div class="row">
                  <div class="col-12 ShowDocumentList">
                    <div class="card">
                      <div class="card-header">
                        <center>
                          <h3><span style="text-transform:uppercase;font-weight:bold;">Advance Form</span></h3>
                        </center>
                      </div>

                      <div class="card-body">
                        <div class="row" style="margin: .6rem 0rem; gap: 1rem;">
                          @include('Components.AdvanceDetailDocument')
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12 ShowDocumentList">
                    <div class="card">
                      <div class="card-body p-0">
                        @include('Components.AdvanceDetailDocumentTable')
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php }; Session::forget("AdvanceSummaryReportDetailIsSubmit"); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@include('Partials.footer')
@include('Process.Advance.AdvanceRequest.Functions.Footer.FooterReportAdvanceSummaryDetail')
@endsection