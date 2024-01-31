@extends('Partials.app')
@section('main')
@include('Partials.navbar')
@include('Partials.sidebar')
@include('getFunction.getSite')
@include('getFunction.getProject')
@include('getFunction.getProduct')
@include('getFunction.getWorker')
@include('getFunction.getBeneficiary')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1" style="background-color:#4B586A;">
        <div class="col-sm-6" style="height:30px;">
          <label style="font-size:15px;position:relative;top:7px;color:white;">Advance Request Summary</label>
        </div>
      </div>
      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">

            @include('Advance.Advance.Functions.Header.HeaderReportAdvanceSummary')


            <div class="col-12 ShowDocumentList" style="font-weight: bold;">
              <div class="card">

                <div class="card-body">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <table>
                          <tr>
                            <td style="padding-top: 9px;"><label>Budget</label></td>
                            <td>:</td>
                            <td><span id="budget_code"></span></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">

                <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary">
                  <thead>
                    <tr>
                      <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Advance Number</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Sub Budget</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Currency</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Requester</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Beneficiary</th>
                      <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Remark</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr style="font-weight:bolder;">
                      <td colspan="4">GRAND TOTAL</td>
                      <td><span id="Total"></span></td>
                      <td colspan="4"></td>
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
@include('Advance.Advance.Functions.Footer.FooterReportAdvanceSummary')
@endsection