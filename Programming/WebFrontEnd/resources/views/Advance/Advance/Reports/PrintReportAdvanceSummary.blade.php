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
            <b><label style="font-size:17px;">{{ $title}} <br><br> </label></b>
          </center>

          <span style="font-size:13px;float:left;">Project Code &nbsp;: {{ $projectCode }} <br> Project Name : {{ $projectName }}</span>
          <span style="font-size:13px;float:right;">Printed By &nbsp;&nbsp;&nbsp; : {{ $printedBy }} <br> Date & Time : {{ $date }}</span>

          <br><br><br>
        </div>
      </div>
      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">

            <div class="col-12 ShowTableReportAdvanceSummary">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="TableReportAdvanceSummary" id="TableReportAdvanceSummary" style="font-size: 13px;width:100%;">
                    <thead>
                      <tr>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;">No</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;">Transaction Number</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;">Date</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;">Total IDR</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;">Other Currency</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;">Beneficiary</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;">Remark</th>
                      </tr>
                    </thead>
                    @php $no = 1; $TotalAdvance = 0; $OtherCurrency = 0; $TotalIDR = 0; $TotalOtherCurrency = 0; @endphp
                    @foreach($data['data'] as $datas)

                    @if($datas['CurrencyName'] == "IDR")
                    @php $TotalAdvance = $datas['TotalAdvance']; @endphp
                    @else
                    @php $OtherCurrency = $datas['TotalAdvance']; @endphp
                    @endif

                    @php $TotalIDR += $TotalAdvance @endphp
                    @php $TotalOtherCurrency += $OtherCurrency @endphp

                    <tbody>
                      <td style="padding:4px;">{{ $no++ }}</td>
                      <td style="padding:4px;">{{ $datas['DocumentNumber'] }}</td>
                      <td style="padding:4px;">{{ date('d-m-Y', strtotime($datas['DocumentDateTimeTZ'])) }}</td>
                      <td style="padding:4px;">{{ number_format($TotalAdvance,2) }}</td>
                      <td style="padding:4px;">{{ number_format($OtherCurrency,2) }}</td>
                      <td style="padding:4px;">{{ $datas['BeneficiaryWorkerName'] }}</td>
                      <td style="padding:4px;"> {{ucfirst(trans($datas['remark']))}} </td>
                    </tbody>
                    @endforeach

                    <tfoot>
                      <tr style="font-weight:bolder;">
                        <td style="padding: 5px;text-align:center;" colspan="3">GRAND TOTAL</td>
                        <td style="padding: 5px;">{{ number_format($TotalIDR,2) }}</td>
                        <td style="padding: 5px;">{{ number_format($TotalOtherCurrency,2) }} </td>
                        <td style="padding: 5px;" colspan="2"></td>
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
@endsection