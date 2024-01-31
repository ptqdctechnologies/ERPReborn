@extends('Partials.app')
@section('main')

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
            <tr>
              <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/AdminLTE-master/dist/img/qdc.png'))) }}" width="180"></td>
            </tr>
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
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Advance&nbsp;Number</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Sub&nbsp;Budget</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Date</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Currency</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Requester</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Beneficiary</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Remark</th>
                      </tr>
                    </thead>
                    @php $no = 1; $TotalAdvance = 0; @endphp
                    @foreach($data['data'] as $datas)

                    @php $TotalAdvance += $datas['TotalAdvance']; @endphp
                    
                    <tbody>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $no++ }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $datas['DocumentNumber'] }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $datas['CombinedBudgetSectionName'] }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ date('d-m-Y', strtotime($datas['DocumentDateTimeTZ'])) }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($TotalAdvance,2) }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $datas['CurrencyName'] }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $datas['RequesterWorkerName'] }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $datas['BeneficiaryWorkerName'] }}</td>
                      <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"> {{ucfirst(trans($datas['remark']))}} </td>
                    </tbody>
                    @endforeach

                    <tfoot>
                      <tr style="font-weight:bolder;border: 1px solid #ced4da;border-collapse: collapse;">
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;text-align:center;" colspan="4">GRAND TOTAL</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;">{{ number_format($TotalAdvance,2) }}</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;" colspan="4"></td>
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