@extends('Partials.app')
@section('main')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1">
        <div class="col-sm-12">
          <center>
            <b><label style="font-size:18px;">{{ $title }}</label></b>
            <p style="font-size:16px;">Date : {{ $date }} <br> </p>
          </center>
        </div>
      </div>
      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">

            <div class="col-12 ShowTableReportAdvanceSummary">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="table table-head-fixed text-nowrap TableReportAdvanceSummary" id="TableReportAdvanceSummary" style="font-size: 14px;">
                    <thead style="border: 1px solid black;">
                      <tr>
                        <th style="border-right: 1px solid black;text-align: center;background-color:#4B586A;color:white;">No</th>
                        <th style="border-right: 1px solid black;text-align: center;background-color:#4B586A;color:white;">Transaction Number</th>
                        <th style="border-right: 1px solid black;text-align: center;background-color:#4B586A;color:white;">Date</th>
                        <th style="border-right: 1px solid black;text-align: center;background-color:#4B586A;color:white;">Currency</th>
                        <th style="border-right: 1px solid black;text-align: center;background-color:#4B586A;color:white;">Advance Total</th>
                        <th style="border-right: 1px solid black;text-align: center;background-color:#4B586A;color:white;">Beneficiary</th>
                        <th style="text-align: center;background-color:#4B586A;color:white;">Remark</th>
                      </tr>
                    </thead>
                    @php $no = 1; @endphp
                    @foreach($data['data'] as $datas)
                    <tbody style="border: 1px solid black;">
                      <td style="border-right: 1px solid black;padding:4px;">{{ $no++ }}</td>
                      <td style="border-right: 1px solid black;padding:4px;">{{ $datas['documentNumber'] }}</td>
                      <td style="border-right: 1px solid black;padding:4px;">{{ date('d-m-Y', strtotime($datas['documentDateTimeTZ'])) }}</td>
                      <td style="border-right: 1px solid black;padding:4px;">{{ $datas['currencyName'] }}</td>
                      <td style="border-right: 1px solid black;padding:4px;">{{ number_format($datas['totalAdvance'],2) }}</td>
                      <td style="border-right: 1px solid black;padding:4px;">{{ $datas['beneficiaryWorkerName'] }}</td>
                      <td> {{ $datas['remark'] }}</td>
                    </tbody>
                    @endforeach
                    <tfoot>
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
@endsection