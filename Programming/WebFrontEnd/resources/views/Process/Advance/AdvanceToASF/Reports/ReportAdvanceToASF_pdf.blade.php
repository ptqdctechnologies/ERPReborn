<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>ERP Reborn</title>

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">
</head>

<body>
  <div class="card-body table-responsive p-0">
    <div style="text-align: right; font-size: 14px;"><?= date('F j, Y'); ?></div>
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Advance Request to Advance Settlement</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
        <!-- BUDGET -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  Budget
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 14px; line-height: 14px;">
                  <?= $dataArftoASF[0]['combinedBudgetCode']; ?> - <?= $dataArftoASF[0]['combinedBudgetName']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- REQUESTER -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  Sub Budget
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 14px;line-height: 14px;">
                  
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <!-- <tr>
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  Requester
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 14px;line-height: 14px;">
                  <?= $dataArftoASF[0]['budget_Requester']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr> -->
    </table>

    <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%;" id="TableReportAdvanceSummary">
      <tr style="border-top: 1px solid black; border-bottom: 1px solid black;">
        <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            No
          </div>
        </td>
        <td colspan="6" style="border-top: 1px solid black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Advance Request
          </div>
        </td>
        <td colspan="6" style="border-top: 1px solid black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Advance Settlement
          </div>
        </td>
        <td colspan="2" style="border-top: 1px solid black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Balance
          </div>
        </td>
      </tr>
      <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Number
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Date
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Requester
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Total
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Payment
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Status
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Number
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Date
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Expense Claim
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Amount to the Company
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Total
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Status
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Advance to Payment
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Advance to Settlement
          </div>
        </td>
      </tr>

      <?php $counter = 1; ?>
      <?php foreach ($dataArftoASF as $dataDetail) { ?>
        <tr>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $counter++; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['ARF_Number']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= date('d-m-Y', strtotime($dataDetail['ARF_Date'])); ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['ARF_Requester']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['ARF_Total_IDR']; ?>
            </div>
          </td> 
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['ARF_Payment']; ?>
            </div>
          </td> 
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['ARF_Status']; ?>
            </div>
          </td>
          
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['ASF_Number']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= date('d-m-Y', strtotime($dataDetail['ASF_Date'])); ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['expense_Claim_IDR']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['amount_Due_Company_IDR']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['ASF_Total']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['ASF_Status']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['advance_ToPayment']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['advance_ToSettlement']; ?>
            </div>
          </td>
        </tr>
      <?php } ?>

      <div style="height: 16px;"></div>

      <tr style="border-top: 1px solid black;">
        <td style="height: 20px; text-align: left;" colspan="4">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">GRAND TOTAL</div>
        </td>
        
      </tr>
    </table>
  </div>
</body>

</html>