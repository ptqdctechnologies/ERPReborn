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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Report Timesheet Summary</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
        <!-- BUDGET -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Budget
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="line-height: 14px; font-size: 12px;">
                  <?= $dataReport['budgetCode'] . ' - ' . $dataReport['budgetName']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <!-- DETAIL -->
    <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%;" id="TableReportAdvanceSummary">
      <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            No
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            PR Number
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            PR Date
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Product Id
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Description
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            PR Total
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Valuta
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            PO Number
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            PO Date
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            PO Qty
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            PO Total
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Balance
          </div>
        </td>
      </tr>

      <?php $counter = 1; ?>
      <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
        <tr>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $counter++; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['DocumentNumber']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= date('d-m-Y', strtotime($dataDetail['DocumentDateTimeTZ'])); ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['Product_ID']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['Description']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['TotalAdvance']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['CurrencyName']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['DepartingFrom']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?php $dataDetail['DestinationTo']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?php $dataDetail['TotalExpenseClaimCart']; ?>
            </div>
          </td>          
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['TotalAmountDueToCompanyCart']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['remark']; ?>
            </div>
          </td>
        </tr>
      <?php } ?>

      <div style="height: 16px;"></div>

      <!-- <tr style="border-top: 1px solid black;">
        <td style="height: 20px; text-align: left;" colspan="4">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">GRAND TOTAL</div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['totalExpense'], 2, '.', ','); ?></div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['totalAmount'], 2, '.', ','); ?></div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['total'], 2, '.', ','); ?></div>
        </td>
        <td style="height: 20px; text-align: left;" colspan="2"></td>
      </tr> -->
    </table>
  </div>
</body>

</html>