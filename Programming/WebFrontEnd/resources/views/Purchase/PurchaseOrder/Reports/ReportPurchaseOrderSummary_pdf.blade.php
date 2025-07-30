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
            <div style="text-align: center; font-size: 20px; font-weight: bold;">Purchase Order Report Summary</div>
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
                        <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">No</th>
                        <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">PO Number</th>
                        <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Supplier</th>
                        <th colspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Idr</th>
                        <th colspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Other Currency</th>
                        <th colspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Equivalent Idr</th>
                      </tr>
                      <tr>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Value</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">VAT</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Value</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">VAT</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Value</th>
                        <th style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">VAT</th>
                      </tr>
                    </thead>
                    <?php $counter = 1; ?>
                    <?php foreach ($dataPO as $dataDetail) { ?>
                      <tbody>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $counter++; ?></td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $dataDetail['documentNumber']; ?></td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $dataDetail['supplier_Code']; ?> - <?= $dataDetail['supplier_Name']; ?></td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $dataDetail['total_Idr_WithoutVat']; ?></td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $dataDetail['total_Vat_IDR']; ?></td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $dataDetail['total_Other_Currency_WithoutVat']; ?></td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $dataDetail['total_Vat_Other_Currency']; ?></td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $dataDetail['total_Equivalent_Value']; ?></td>
                        <td style="padding:4px;border: 1px solid #ced4da;border-collapse: collapse;"><?= $dataDetail['total_Equivalent_Vat']; ?></td>
                        
                      </tbody>
                    <?php } ?>

                      <tfoot>
                        <tr style="font-weight:bolder;border: 1px solid #ced4da;border-collapse: collapse;">
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;text-align:center;" colspan="3">GRAND TOTAL</td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"></td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"></td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"></td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"></td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;"></td>
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
