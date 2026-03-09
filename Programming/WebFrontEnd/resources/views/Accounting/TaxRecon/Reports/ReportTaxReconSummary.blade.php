@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <!-- TITLE -->
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">
            Report Tax Recon Summary
          </label>
        </div>
      </div>

      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row p-1" style="row-gap: 1rem;">
                    @include('Accounting.TaxRecon.Functions.Header.HeaderTaxReconSummary')
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12" id="table_container" style="display: none;">
              <div class="card">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-head-fixed text-nowrap" id="table_summary">
                      <thead></thead>
                      <tbody></tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@include('Accounting.TaxRecon.Functions.Footer.FooterReportTaxReconSummary')
@include('Partials.footer')
@endsection