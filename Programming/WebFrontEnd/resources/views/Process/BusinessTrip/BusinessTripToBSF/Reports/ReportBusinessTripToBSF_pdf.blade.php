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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Business Trip to BSF</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
        <!-- BRF NUMBER -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  BRF Number
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
                  Requester
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
      </tr>
      <tr>
        <!-- BSF NUMBER -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  BSF Number
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
                <div style="font-size: 14px; line-height: 14px;">
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
          <td rowspan="3" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              No
            </div>
          </td>
          <td colspan="9" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Business Trip
            </div>
          </td>
          <td colspan="5" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Settlement
            </div>
          </td>
        </tr>
        <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              BRF Number
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
              Date Commence Travel
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Date End Travel
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
              Business Trip to Payment Balance
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              BRF Status
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              BRF Number
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Date
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Total
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Business Trip to Settlement Balance
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              BSF Status
            </div>
          </td>
        </tr>
      </thead>

      <tbody>
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
              <?= $data['brfDate'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['requesterName'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['dateCommenceTravel'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['dateEndTravel'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['brfTotal'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['brfPayment'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['balanceBrfToPayment'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['brfStatus'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['bsfNumber'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['bsfDate'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['bsfTotal'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['balanceBrfToBsf'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['bsfStatus'] ?? '-'; ?>
            </div>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>

</html>