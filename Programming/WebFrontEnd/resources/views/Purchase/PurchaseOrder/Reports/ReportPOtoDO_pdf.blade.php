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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Report PO to DO</div>
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
                  -
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
            Product
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Qty PO
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            DO Number
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            DO Date
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Delivery From
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Delivery To
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Transporter
          </div>
        </td>
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Qty DO
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
            <?= $data['purchaseOrderNumber'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['purchaseOrderDate'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['productCode'] ?? ''; ?> - <?= $data['productName'] ?? ''; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['purchaseOrderQty'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['deliveryOrderNumber'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['deliveryOrderDate'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['deliveryFrom'] ? $data['deliveryFrom']['address'] : '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['deliveryTo'] ? $data['deliveryTo']['address'] : '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['transporter_Name'] ?? '-'; ?>
          </div>
        </td>
        <td>
          <div style="margin-top: 4px; font-size: 12px;">
            <?= $data['deliveryOrderQty'] ?? '-'; ?>
          </div>
        </td>
      </tr>
      <?php } ?>

      <div style="height: 16px;"></div>
    </table>
  </div>
</body>

</html>