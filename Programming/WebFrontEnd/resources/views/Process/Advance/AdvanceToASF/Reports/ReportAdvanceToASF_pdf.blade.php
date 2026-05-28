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
        <!-- ARF NUMBER -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  ARF Number
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 14px; line-height: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>

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
                  -
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
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <!-- ASF NUMBER -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  ASF Number
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 14px; line-height: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>

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
                <div style="font-size: 14px; line-height: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- DATE RANGE -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  Date Range
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 14px;line-height: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <table style="margin-left: 1px; width: 100%;">
      <thead>
        <tr style="border-top: 1px solid black; border-bottom: 1px solid black;">
          <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              No
            </div>
          </td>
          <td colspan="7" style="border-top: 1px solid black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Advance Request
            </div>
          </td>
          <td colspan="7" style="border-top: 1px solid black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Advance Settlement
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
              ARF to Payment Balance
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
              ARF to ASF Balance
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Status
            </div>
          </td>
        </tr>
      </thead>

      <tbody>
        <?php $counter = 1; ?>
        <?php foreach ($dataArftoASF as $data) { ?>
        <tr>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $counter++; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['ARF_Number'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= date('d-m-Y', strtotime($data['ARF_Date'])); ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['ARF_Requester'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['ARF_Total_IDR'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['ARF_Payment'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['advance_ToPayment'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['ARF_Status'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['ASF_Number'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['ASF_Date'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['expense_Claim_IDR'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['amount_Due_Company_IDR'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['ASF_Total'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['advance_ToSettlement'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['ASF_Status'] ?? '-'; ?>
            </div>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>

</html>