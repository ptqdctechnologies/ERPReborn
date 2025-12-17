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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Advance Summary</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
        <!-- BUDGET -->
        <td style="width: 350px;">
          <table>
            <tr>
              <td style="width: 50px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Budget
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataARF[0]['combinedBudgetCode'] . ' - ' . $dataARF[0]['combinedBudgetName']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <!-- DETAIL -->
    <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%;" id="TableReportAdvanceSummary">
      <thead>
        <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
          <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              No
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Advance Number
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Sub Budget
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
              Beneficiary
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
              Remark
            </div>
          </td>
        </tr>
      </thead>

      <tbody>
        <?php $counter = 1; $grandTotalIDR = 0; $grandTotalOtherCurrency = 0; $grandTotalEquivalentIDR = 0; ?>
        <?php foreach ($dataARF as $dataDetail) { ?>
          <?php $grandTotalIDR            += $dataDetail['total_IDR']; ?>
          <?php $grandTotalOtherCurrency  += $dataDetail['total_Other_Currency']; ?>
          <?php $grandTotalEquivalentIDR  += $dataDetail['total_Equivalent_IDR']; ?>

          <tr>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= $counter++; ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= $dataDetail['advanceNumber'] ?? '-'; ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= $dataDetail['combinedBudgetSectionCode'] ?? ''; ?> - <?= $dataDetail['combinedBudgetSectionName'] ?? ''; ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= date('d-m-Y', strtotime($dataDetail['advanceDate'])); ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= $dataDetail['requesterName'] ?? '-'; ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= $dataDetail['beneficiaryName'] ?? '-'; ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= number_format($dataDetail['total_IDR'] ?? 0, 2, '.', ','); ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= number_format($dataDetail['total_Other_Currency'] ?? 0, 2, '.', ','); ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= number_format($dataDetail['total_Equivalent_IDR'] ?? 0, 2, '.', ','); ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= $dataDetail['remarks'] ?? '-'; ?>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
      
      <div style="height: 16px;"></div>

      <tr style="border-top: 1px solid black;">
        <td style="height: 20px; text-align: left;" colspan="6">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">GRAND TOTAL</div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalIDR, 2, '.', ','); ?></div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalOtherCurrency, 2, '.', ','); ?></div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalEquivalentIDR, 2, '.', ','); ?></div>
        </td>
        <td style="height: 20px; text-align: left;"></td>
      </tr>
    </table>
  </div>
</body>

</html>