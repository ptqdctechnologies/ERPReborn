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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Repoort Loan to Loan Settlement</div>
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
                  <?= $dataReport['project']['code']; ?> - <?= $dataReport['project']['name']; ?>
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
                  Requester
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 14px;line-height: 14px;">
                  <?= $dataReport['requester']['name']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <!-- SUB BUDGET -->
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
                  <?= $dataReport['site']['code']; ?> - <?= $dataReport['site']['name']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
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
            Loan
          </div>
        </td>
        <td colspan="6" style="border-top: 1px solid black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Loan Settlement
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
            Debitor
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Creditor
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Total IDR
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Total Other Currency
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Total Equivalent IDR
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
            Total IDR
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Total Other Currency
          </div>
        </td>
        {{-- <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Description
          </div>
        </td> --}}
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Total Equivalent IDR
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Loan to Payment
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Loan to Settlement
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
              -
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              -
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= number_format($dataDetail['TotalAdvance'], 2, '.', ','); ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              -
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              -
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $dataDetail['DocumentASFNumber']; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= date('d-m-Y', strtotime($dataDetail['DocumentDateTimeTZ'])); ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= number_format($dataDetail['TotalSettlement'], 2, '.', ','); ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              -
            </div>
          </td>
          {{-- <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?php $dataDetail['Description']; ?>
            </div>
          </td> --}}
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              -
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              -
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              -
            </div>
          </td>
        </tr>
      <?php } ?>

      <div style="height: 16px;"></div>

      <tr style="border-top: 1px solid black;">
        <td style="height: 20px; text-align: left;" colspan="4">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">GRAND TOTAL</div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['totalAdvance'], 2, '.', ','); ?></div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['totalPayment'], 2, '.', ','); ?></div>
        </td>
        <td style="height: 20px; text-align: left;" colspan="3"></td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['totalExpenseClaim'], 2, '.', ','); ?></div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['totalAmountCompany'], 2, '.', ','); ?></div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['totalSettlement'], 2, '.', ','); ?></div>
        </td>
        <td style="height: 20px; text-align: left;"></td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['totalAdvancePayment'], 2, '.', ','); ?></div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($dataReport['totalAdvanceSettlement'], 2, '.', ','); ?></div>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>