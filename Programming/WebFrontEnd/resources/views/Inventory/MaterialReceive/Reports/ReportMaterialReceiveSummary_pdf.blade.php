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
            <div style="text-align: center; font-size: 20px; font-weight: bold;">Report Material Receive Summary</div>
          </center>
          <table style="float:left;">
            <tr>
              <td>Project</td>
              <td>:</td>
              <td>
            
              </td>
            </tr>
          </table>
          <table style="float:right;">
            <!-- <tr>
              <td><img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/AdminLTE-master/dist/img/qdc.png'))) }}" width="180"></td>
            </tr> -->
            </tr>
          </table>
          <br><br>
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
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">MR Number</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Date</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Reference Number</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Delivery From</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Delivery To</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Receive At</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Remark</th>
                      </tr>
                    </thead>
                                               
                    @foreach($dataMR as $key => $dataDetail)
                      <tbody>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $key + 1 }}</td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['MR_Number'] }}</td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ date('Y-m-d', strtotime($dataDetail['date'])) }}</td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['referenceNumber'] }}</td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['deliveryFrom_NonRefID']['address'] ?? '-' }}</td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['deliveryTo_NonRefID']['address'] ?? '-' }}</td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['receiveAt'] }}</td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['remarks'] }}</td>
                        
                      </tbody>
                     @endforeach

                      <tfoot>
                        <!-- <tr style="font-weight:bolder;border: 1px solid #ced4da;border-collapse: collapse;">
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;text-align:center;" colspan="3">GRAND TOTAL</td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"></td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"></td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;">-</td>
                        </tr> -->
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
