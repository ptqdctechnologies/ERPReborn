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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">PR to PO</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>
  </div>

  <!-- HEADER -->
  <table style="margin: 30px 0px 15px 1px;">
    <tr>
      <!-- PR NUMBER -->
      <td style="width: 350px;">
        <table>
          <tr>
            <td style="width: 80px; height: 20px;">
              <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                PR Number
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

      <!-- BUDGET -->
      <td style="width: 350px;">
        <table>
          <tr>
            <td style="width: 80px; height: 20px;">
              <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                Budget
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

      <!-- SUPPLIER -->
      <td style="width: 350px;">
        <table>
          <tr>
            <td style="width: 80px; height: 20px;">
              <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                Supplier
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

    <tr>
      <!-- PO NUMBER -->
      <td style="width: 350px;">
        <table>
          <tr>
            <td style="width: 80px; height: 20px;">
              <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                PO Number
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

      <!-- SUB BUDGET -->
      <td style="width: 350px;">
        <table>
          <tr>
            <td style="width: 80px; height: 20px;">
              <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                Sub Budget
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
        <td rowspan="2"
          style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            No
          </div>
        </td>
        <td colspan="7" style="border-top: 1px solid black; height: 20px; text-align: center;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Purchase Requisition
          </div>
        </td>
        <td colspan="8" style="border-top: 1px solid black; height: 20px; text-align: center;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Purchase Order
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
            Product Name
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
            PR Status
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
            Qty
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
            PR to PO Balance
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            PO Status
          </div>
        </td>
      </tr>
    </thead>

    <tbody>
      <?php $counter = 1; ?>
      <?php foreach ($dataPRtoPO as $data) { ?>
      <tr>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $counter++; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['PR_Number'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= date('d-m-Y', strtotime($data['PR_Date'])); ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['product_Code'] ?? ''; ?> -
            <?= $data['product_Name'] ?? ''; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['PR_Total'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['PO_Number'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= date('d-m-Y', strtotime($data['PO_Date'])); ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['PO_Qty'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['PO_Total'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['balance'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= '-'; ?>
          </div>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>

</html>