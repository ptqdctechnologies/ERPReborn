@extends('Partials.app')
@section('main')

<!-- <style>
  table,
  th,
  td {
    border: 1px solid #ced4da;
    border-collapse: collapse;
  }
</style> -->

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1">
        <div class="col-sm-12">
          <center>
            <b><label style="font-size:20px;">{{ $title}} <br><br> </label></b>
          </center>
          <table style="float:left;">
            <tr>
              <td>Project</td>
              <td>:</td>
              <td>{{ $projectCode }} - {{ $projectName }}</td>
            </tr>
          </table>
          <table style="float:right;">
            <!-- <tr>
              <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/AdminLTE-master/dist/img/qdc.png'))) }}" width="180"></td>
            </tr> -->
            </tr>
          </table>
          <br><br><br><br><br><br>
        </div>
      </div>
      <div class="card">
        <div class="tab-content p-3" id="nav-tabContent">
          <div class="row">

            <div class="col-12 ShowTableReportAdvanceSummary">
              <div class="card">
                <div class="card-body table-responsive p-0">
                  <table class="TableReportAdvanceSummary" id="TableReportAdvanceSummary" style="font-size: 13px;width:100%;border: 1px solid #ced4da;border-collapse: collapse;">
                    <thead>
                      <tr style="border: 1px solid #ced4da;border-collapse: collapse;">
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">No</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">PR Number</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Date</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total IDR</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Other Currency</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Supplier</th>
                      </tr>
                    </thead>
                    @php $no = 1; $TotalAdvance = 0; $OtherCurrency = 0; $TotalIDR = 0; $TotalOtherCurrency = 0; @endphp
                    @foreach($data['data'] as $datas)

                    @php $TotalAdvance = 0; @endphp
                    @php $OtherCurrency = 0; @endphp
                    

                    @php $TotalIDR += $TotalAdvance @endphp
                    @php $TotalOtherCurrency += $OtherCurrency @endphp

                    <tbody>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $no++ }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $datas['documentNumber'] }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ date('d-m-Y', strtotime($datas['documentDateTimeTZ'])) }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($TotalAdvance,2) }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($OtherCurrency,2) }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $datas['requesterWorkerName'] }}</td>
                    </tbody>
                    @endforeach

                    <tfoot>
                      <tr style="font-weight:bolder;border: 1px solid #ced4da;border-collapse: collapse;">
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;text-align:center;" colspan="3">GRAND TOTAL</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;">{{ number_format($TotalIDR,2) }}</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;">{{ number_format($TotalOtherCurrency,2) }} </td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;" colspan="1"></td>
                      </tr>
                    </tfoot>

                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row mb-1">
        <div class="col-sm-12">
          <table style="position: fixed;bottom: 0;left: 0;right: 0;height: 50px;float:right;">
            <tr>
              <td>Printed By</td>
              <td>:</td>
              <td>{{ $printedBy }} - {{ $date }}</td>
            </tr>
          </table>
        </div>
      </div>

    </div>
  </section>
</div>
@endsection