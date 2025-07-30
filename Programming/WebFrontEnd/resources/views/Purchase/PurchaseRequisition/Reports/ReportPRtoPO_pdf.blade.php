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
            <div style="text-align: center; font-size: 20px; font-weight: bold;">Purchase Requisition to Purchase Order Report</div>
          </center>
          <table style="float:left;">
            <tr>
              <td>Project</td>
              <td>:</td>
              <td><?= $dataPRtoPO[0]['combinedBudgetCode'] . ' - ' . $dataPRtoPO[0]['combinedBudgetName']; ?></td>
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
                      <tr>
                          <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">No</th>
                          <th colspan="6" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Purchase Requisition</th>
                          <th colspan="6" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Purchase Order</th>
                          <th rowspan="2" style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Balance</th>
                      </td>
                      <tr>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Product Name</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Equivalent IDR</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Number</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Date</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Qty</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total IDR</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Other Currency</th>
                          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;">Total Equivalent IDR</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $counter = 1;
                        $grandTotal_PR = 0;
                        $grandTotal_PO = 0;
                        $grandTotal_qtyPO = 0;
                        $grandTotal_Balance = 0;
                        $previousPR = null;
                        $previousPO = null;
                        $renderedPRs = [];
                        $prRowspans = [];
                        $renderedPOs = [];
                        $poRowspans = [];

                        foreach ($dataPRtoPO as $row) {
                            $prRowspans[$row['PR_Number']] = ($prRowspans[$row['PR_Number']] ?? 0) + 1;
                            $poRowspans[$row['PO_Number']] = ($poRowspans[$row['PO_Number']] ?? 0) + 1;
                        }
                      ?>

                      <?php foreach ($dataPRtoPO as $dataDetail): ?>
                        <?php
                            $grandTotal_PR += $dataDetail['PR_Total'];
                            $grandTotal_PO += $dataDetail['PO_Total'];
                            $grandTotal_qtyPO += $dataDetail['PO_Qty'];
                            $grandTotal_Balance += $dataDetail['balance'];

                            $isNewPR = $dataDetail['PR_Number'] !== $previousPR;
                            $isNewPO = $dataDetail['PO_Number'] !== $previousPO;
                        ?>
                        <tr>
                          <td><?= $counter++; ?></td> 
                          <?php if ($isNewPR): ?>
                              @if (!in_array($dataDetail['PR_Number'], $renderedPRs))
                                  <td rowspan="{{ $prRowspans[$dataDetail['PR_Number']] }}">{{ $dataDetail['PR_Number'] }}</td>
                                  @php $renderedPRs[] = $dataDetail['PR_Number']; @endphp
                              @endif
                              <td>{{ date('d-m-Y', strtotime($dataDetail['PR_Date'])) }}</td>
                              <td>{{ $dataDetail['product_Code'] }} - {{ $dataDetail['product_Name'] }}</td>
                              <td>{{ number_format($dataDetail['PR_Total'], 2, '.', ',') }}</td>
                              <td><?= number_format(0, 2, '.', ',') ?></td>
                              <td><?= number_format(0, 2, '.', ',') ?></td>
                              <td>{{ $dataDetail['PO_Number'] }}</td>
                              <!-- @if (!in_array($row['PO_Number'], $renderedPOs))
                                  <td rowspan="{{ $poRowspans[$dataDetail['PO_Number']] }}">{{ $dataDetail['PO_Number'] }}</td>
                                  @php $renderedPOs[] = $dataDetail['PO_Number']; @endphp
                              @endif -->
                              <td>{{ date('d-m-Y', strtotime($dataDetail['PO_Date'])) }}</td>
                              <td>{{ number_format($dataDetail['PO_Qty'], 2, '.', ',') }}</td>
                              <td>{{ number_format($dataDetail['PO_Total'], 2, '.', ',') }}</td>
                              <td><?= number_format(0, 2, '.', ',') ?></td>
                              <td><?= number_format(0, 2, '.', ',') ?></td>
                              <td>{{$dataDetail['balance']}}</td>
                                                        
                          <?php else: ?>
                            @if (!in_array($dataDetail['PR_Number'], $renderedPRs))
                                <td rowspan="{{ $prRowspans[$dataDetail['PR_Number']] }}">{{ $dataDetail['PR_Number'] }}</td>
                                @php $renderedPRs[] = $dataDetail['PR_Number']; @endphp
                            @endif
                            <td>{{ date('d-m-Y', strtotime($dataDetail['PR_Date'])) }}</td>
                            <td>{{ $dataDetail['product_Code'] }} - {{ $dataDetail['product_Name'] }}</td>
                            <td>{{ number_format($dataDetail['PR_Total'], 2, '.', ',') }}</td>
                            <td><?= number_format(0, 2, '.', ',') ?></td>
                            <td><?= number_format(0, 2, '.', ',') ?></td>
                            <td>{{ $dataDetail['PO_Number'] }}</td>
                            <!-- @if (!in_array($row['PO_Number'], $renderedPOs))
                                <td rowspan="{{ $poRowspans[$dataDetail['PO_Number']] }}">{{ $dataDetail['PO_Number'] }}</td>
                                @php $renderedPOs[] = $dataDetail['PO_Number']; @endphp
                            @endif -->
                            <td>{{ date('d-m-Y', strtotime($dataDetail['PO_Date'])) }}</td>
                            <td>{{ number_format($dataDetail['PO_Qty'], 2, '.', ',') }}</td>
                            <td>{{ number_format($dataDetail['PO_Total'], 2, '.', ',') }}</td>
                            <td><?= number_format(0, 2, '.', ',') ?></td>
                            <td><?= number_format(0, 2, '.', ',') ?></td>
                            <td>{{$dataDetail['balance']}}</td>
                            <td></td>
                          <?php endif; ?>
                        </tr>
                        <?php $previousPR = $dataDetail['PR_Number']; ?>
                        <?php $previousPO = $dataDetail['PO_Number']; ?>
                      <?php endforeach; ?>
                    </tbody>

                      <tfoot>
                        <tr style="font-weight:bolder;border: 1px solid #ced4da;border-collapse: collapse;">
                          
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
