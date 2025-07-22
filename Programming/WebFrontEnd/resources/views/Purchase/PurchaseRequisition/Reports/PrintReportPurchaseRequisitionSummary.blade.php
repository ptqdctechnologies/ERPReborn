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
            <div style="text-align: center; font-size: 20px; font-weight: bold;">Purchase Requisition Report Summary</div>
          </center>
          <table style="float:left;">
            <tr>
              <td>Project</td>
              <td>:</td>
              <td><?= $dataPO[0]['combinedBudgetCode'] . ' - ' . $dataPO[0]['combinedBudgetName']; ?></td>
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
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">PR Number</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Date</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Sub Budget</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Date Of Delivery</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Delivery To</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total IDR</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Other Currency</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Equivalent Idr</th>
                      </tr>
                    </thead>
                    <?php $counter = 1; ?>
                    <?php foreach ($dataPO as $dataDetail) { ?>
                      <tbody>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $counter++; ?></td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $dataDetail['documentNumber']; ?></td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">{{ date('Y-m-d', strtotime($dataDetail['date'])) }}</td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">-</td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">-</td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;">-</td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= number_format($dataDetail['total_IDR'], 2, '.', ','); ?></td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= number_format($dataDetail['total_Other_Currency'], 2, '.', ','); ?></td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"></td>
                        
                      </tbody>
                    <?php } ?>

                      <tfoot>
                        <tr style="font-weight:bolder;border: 1px solid #ced4da;border-collapse: collapse;">
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;text-align:center;" colspan="6">GRAND TOTAL</td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($dataDetail['grand_Total_IDR'], 2, '.', ','); ?></td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"><?= number_format($dataDetail['grand_Total_Other_Currency'], 2, '.', ','); ?></td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"></td>
                          
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
