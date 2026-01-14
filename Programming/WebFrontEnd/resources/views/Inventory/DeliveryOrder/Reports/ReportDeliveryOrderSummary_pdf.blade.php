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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Delivery Order Summary</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
        <!-- DELIVERY ORDER TYPE -->
        <td style="width: 350px;">
          <table>
            <tr>
              <td style="width: 100px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Budget
                </div>
              </td>
              <td style="width: 5px; font-size: 12px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $budgetName; ?>
                </div>
              </td>
            </tr>
            <tr>
              <td style="width: 100px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Sub Budget
                </div>
              </td>
              <td style="width: 5px; font-size: 12px;">
                : 
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $subBudgetName ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- DELIVERY ORDER TYPE -->
        <td style="width: 350px;">
          <table>
            <tr>
              <td style="width: 100px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Warehouse
                </div>
              </td>
              <td style="width: 5px;font-size: 12px; ">
                : 
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $warehouseName ?? '-'; ?>
                </div>
              </td>
            </tr>
            <tr>
              <td style="width: 100px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Date
                </div>
              </td>
              <td style="width: 5px; font-size: 12px;">
                : 
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $doDate ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <!-- DETAIL -->
    <table class="TableReportDeliveryOrderSummary" style="margin-left: 1px; width: 100%;" id="TableReportDeliveryOrderSummary">
      <thead>
        <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
          <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              No
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              DO Number
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Date
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Type
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Quantity
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Delivery From
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Delivery To
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Transporter
            </div>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
          $no = 1;
          $totalQuantity = 0;
        ?>
        @foreach($dataDO as $do)
        <tr>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px; text-align: center;">
              <?= $no; ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= $do['documentNumber']; ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= date('Y-m-d', strtotime($do['date'])); ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= $do['type'] ?? ''; ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= number_format($do['quantity'] ?? 0, 2, '.', ','); ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= $do['deliveryFrom_NonRefID']['address'] ?? '-'; ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= $do['deliveryTo_NonRefID']['address'] ?? '-'; ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= ($do['transporter_Code'] ? $do['transporter_Code'] . ' - ' : '') . $do['transporter_Name']; ?>
            </div>
          </td>
        </tr>
        <?php
          $no++;
          $totalQuantity += $do['quantity'] ?? 0;
        ?>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
          <td colspan="4" style="height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              GRAND TOTAL
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px; text-align: left;">
              <?= number_format($totalQuantity, 2, '.', ','); ?>
            </div>
          </td>
          <td style="height: 20px;"></td>
          <td style="height: 20px;"></td>
          <td style="height: 20px;"></td>
        </tr>
      </tfoot>
    </table>
  </div>
</body>

</html>