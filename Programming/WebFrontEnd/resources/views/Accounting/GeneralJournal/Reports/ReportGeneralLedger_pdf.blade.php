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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">General Ledger</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>
  </div>

  <!-- HEADER -->
  <table style="margin: 30px 0px 15px 1px;">
    <tr>
      <!-- ACCOUNT NAME -->
      <td style="width: 350px;">
        <table>
          <tr>
            <td style="width: 80px; height: 20px;">
              <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                Account Name
              </div>
            </td>
            <td style="width: 5px;">
              :
            </td>
            <td style="height: 20px;">
              <div style="font-size: 12px; line-height: 14px;">
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
            <td style="width: 80px; height: 20px;">
              <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                Date Range
              </div>
            </td>
            <td style="width: 5px;">
              :
            </td>
            <td style="height: 20px;">
              <div style="font-size: 12px; line-height: 14px;">
                -
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

  <!-- DETAIL -->
  <table style="margin-left: 1px; width: 100%;">
    <thead>
      <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            No
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Date
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Journal Number
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Description
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Ref Doc
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Debit (Rp)
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Credit (Rp)
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Balance (Rp)
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            COA
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
            <?= $data['date'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['journalNumber'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['description'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['refDocument'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['debit'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['credit'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['balance'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['chartOfAccountCode'] ?? ''; ?> - <?= $data['chartOfAccountName'] ?? ''; ?>
          </div>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>

</html>