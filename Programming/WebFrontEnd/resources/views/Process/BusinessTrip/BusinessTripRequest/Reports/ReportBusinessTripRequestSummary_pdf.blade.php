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
  <div>
    <div style="text-align: right; font-size: 14px;"><?= date('F j, Y'); ?></div>
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Business Trip Request Summary</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
        <!-- BUDGET -->
        <td style="width: 350px;">
          <table>
            <tr>
              <td style="width: 75px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  Budget
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="line-height: 14px; font-size: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- REQUESTER -->
        <td style="width: 350px;">
          <table>
            <tr>
              <td style="width: 75px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  Requester
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="line-height: 14px; font-size: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <!-- SUB BUDGET -->
        <td style="width: 350px;">
          <table>
            <tr>
              <td style="width: 75px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  Sub Budget
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="line-height: 14px; font-size: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- DATE RANGE -->
        <td style="width: 350px;">
          <table>
            <tr>
              <td style="width: 75px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  Date Range
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="line-height: 14px; font-size: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <!-- DETAIL -->
    <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%; margin-top: 30px;"
      id="TableReportAdvanceSummary">
      <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            No
          </div>
        </td>
        <td style="width: 90px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            BRF Number
          </div>
        </td>
        <td style="width: 150px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Sub Budget
          </div>
        </td>
        <td style="width: 90px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Departing From
          </div>
        </td>
        <td style="width: 80px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Departing To
          </div>
        </td>
        <td style="width: 70px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Date
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Currency
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
            Remark
          </div>
        </td>
      </tr>

      <?php $counter = 1; ?>
      <?php foreach ($dataReport as $data) { ?>
      <tr>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $counter++; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['brfNumber'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['combinedBudgetSectionCode'] ?? ''; ?> - <?= $data['combinedBudgetSectionName'] ?? ''; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['departurePoint'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['destinationPoint'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['brfDate'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['currencyISOCode'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['requesterName'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= number_format(($data['brfTotal'] ?? 0), 0, ',', '.') ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['remarks'] ?? '-'; ?>
          </div>
        </td>
      </tr>
      <?php } ?>

      <div style="height: 16px;"></div>
    </table>
  </div>
</body>

</html>