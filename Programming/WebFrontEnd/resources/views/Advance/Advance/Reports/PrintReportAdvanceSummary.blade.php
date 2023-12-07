@extends('Partials.app')
@section('main')

<style>
  table,
  th,
  td {
    border: 1px solid #ced4da;
    border-collapse: collapse;
  }
</style>

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1">
        <div class="col-sm-12">
          <center>
            <b><label style="font-size:17px;">{{ $title }}</label></b>
            <p style="font-size:15px;">Print Date : {{ $date }} <br> </p>
          </center>
        </div>
      </div>
      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">

            <div class="col-12 ShowTableReportAdvanceSummary">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="TableReportAdvanceSummary" id="TableReportAdvanceSummary" style="font-size: 14px;">
                    <thead>
                      <tr>
                        <th style="text-align: center;background-color:#4B586A;color:white;">No</th>
                        <th style="text-align: center;background-color:#4B586A;color:white;">Transaction Number</th>
                        <th style="text-align: center;background-color:#4B586A;color:white;">Date</th>
                        <th style="text-align: center;background-color:#4B586A;color:white;">Currency</th>
                        <th style="text-align: center;background-color:#4B586A;color:white;">Advance Total</th>
                        <th style="text-align: center;background-color:#4B586A;color:white;">Beneficiary</th>
                        <th style="text-align: center;background-color:#4B586A;color:white;">Remark</th>
                      </tr>
                    </thead>
                    @php $no = 1; @endphp 
                    @foreach($data['data'] as $datas)
                    <tbody>
                      <td style="padding:4px;">{{ $no++ }}</td>
                      <td style="padding:4px;">{{ $datas['documentNumber'] }}</td>
                      <td style="padding:4px;">{{ date('d-m-Y', strtotime($datas['documentDateTimeTZ'])) }}</td>
                      <td style="padding:4px;">{{ $datas['currencyName'] }}</td>
                      <td style="padding:4px;">{{ number_format($datas['totalAdvance'],2) }}</td>
                      <td style="padding:4px;">{{ $datas['beneficiaryWorkerName'] }}</td>
                      <td style="padding:4px;">{{ $datas['remark'] }}</td>
                    </tbody>
                    @endforeach
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
@endsection