@extends('Partials.app')
@section('main')

<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="row mb-1">
        <div class="col-sm-12">
          <center>
            <div style="text-align: center; font-size: 20px; font-weight: bold;">Report Loan to Loan Settlement</div>
          </center>
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
                        <th rowspan="2" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">No</th>
                        <th colspan="7" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Loan</th>
                        <th colspan="5" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Loan Settlement</th>
                        <th colspan="3" style="padding: 6px;text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Balance</th>
                      </tr>
                      <tr>
                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Number</th>
                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Date</th>
                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Debitor</th>
                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Creditor</th>
                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total IDR</th>
                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Other Currency</th>
                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Equivalent IDR</th>

                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Number</th>
                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Date</th>
                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total IDR</th>
                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Other Currency</th>
                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Total Equivalent IDR</th>

                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Loan to Payment</th>
                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Loan to Settlement</th>
                        <th style="text-align: center;background-color:#E9ECEF;color:black;border: 1px solid #ced4da;border-collapse: collapse;">Settlement to Payment</th>
                      </tr>
                    </thead>
                    <?php 
                      $counter = 1; 
                      $grand_totalIDRSettle=0;
                      $grand_totalOtherSettle=0;
                      $grand_totalEquiSettle=0;

                      $grand_totalloantoPay=0;
                      $grand_totalLoantoSettle=0;
                      $grand_totalSettletoPay=0;
                    ?>
                    <?php foreach ($dataloantosettle as $dataDetail) { ?>
                      <?php $grand_totalIDRSettle += $dataDetail['loanSettle_Total_IDR'];?>
                      <?php $grand_totalOtherSettle += $dataDetail['loanSettle_Total_Other_Currency'];?>
                      <?php $grand_totalEquiSettle += $dataDetail['loanSettle_Total_Equivalent_IDR'];?>
                      <?php $grand_totalloantoPay += $dataDetail['loanToPaymnet'];?>
                      <?php $grand_totalLoantoSettle += $dataDetail['loanToSettlement'];?>
                      <?php $grand_totalSettletoPay += $dataDetail['settlementToPayment'];?>
                      <tbody>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">{{ $counter++ }}</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['loanNumber'] }}</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">{{ date('Y-m-d', strtotime($dataDetail['loanDate'])) }}</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail ['loanCreditorName'] }}</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail ['loanDebitorName'] }}</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">-</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">-</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">-</td>

                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">{{ $dataDetail['loanSettleNumber'] }}</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">{{ date('Y-m-d', strtotime($dataDetail['loanSettleDate'])) }}</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetail['loanSettle_Total_IDR'], 2, '.', ',') }}</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetail['loanSettle_Total_Other_Currency'], 2, '.', ',') }}</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetail['loanSettle_Total_Equivalent_IDR'], 2, '.', ',') }}</td>

                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetail['loanToPaymnet'], 2, '.', ',') }}</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetail['loanToSettlement'], 2, '.', ',') }}</td>
                        <td style="border: 1px solid #ced4da;border-collapse: collapse;">{{ number_format($dataDetail['settlementToPayment'], 2, '.', ',') }}</td>
                      </tbody>
                    <?php } ?>

                      <tfoot>
                        <tr style="font-weight:bolder;border: 1px solid #ced4da;border-collapse: collapse;">
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;text-align:center;" colspan="5">GRAND TOTAL</td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;">{{ number_format(0, 2, '.', ',') }}</td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;">{{ number_format(0, 2, '.', ',') }}</td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;">{{ number_format(0, 2, '.', ',') }}</td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;text-align:center;" colspan="2"></td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;">{{ number_format($grand_totalIDRSettle, 2, '.', ',') }}</td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;">{{ number_format($grand_totalOtherSettle, 2, '.', ',') }}</td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;">{{ number_format($grand_totalEquiSettle, 2, '.', ',') }}</td>

                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;">{{ number_format($grand_totalloantoPay, 2, '.', ',') }}</td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;">{{ number_format($grand_totalLoantoSettle, 2, '.', ',') }}</td>
                          <td style="border: 1px solid #ced4da;border-collapse: collapse;padding: 5px;">{{ number_format($grand_totalSettletoPay, 2, '.', ',') }}</td>
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
