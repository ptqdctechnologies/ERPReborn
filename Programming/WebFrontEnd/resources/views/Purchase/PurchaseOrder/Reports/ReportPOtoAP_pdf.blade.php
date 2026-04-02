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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Purchase Order to Account Payable</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
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
        <!-- AP NUMBER -->
        <td style="width: 350px;">
          <table>
            <tr>
              <td style="width: 80px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  AP Number
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
    <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%;" id="TableReportAdvanceSummary">
      <thead>
        <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
          <td rowspan="2" style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              No
            </div>
          </td>
          <td colspan="8" style="border-top: 1px solid black; height: 20px; text-align: center;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Purchase Order
            </div>
          </td>
          <td colspan="6" style="border-top: 1px solid black; height: 20px; text-align: center;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Account Payable
            </div>
          </td>
          <td colspan="2" style="border-top: 1px solid black; height: 20px; text-align: center;">
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
              Budget
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Date
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Supplier
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
              Status
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              PO to AP
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              AP to Payment
            </div>
          </td>
        </tr>
      </thead>
      
      <?php 
        $counter = 1; 
        $grandPurchaseOrderTotalIDR = 0; 
        $grandPurchaseOrderTotalOtherCurrency = 0; 
        $grandPurchaseOrderTotalEquivalentIDR = 0; 
        $grandAccountPayableTotalIDR = 0; 
        $grandAccountPayableTotalOtherCurrency = 0; 
        $grandAccountPayableTotalEquivalentIDR = 0; 
      ?>
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
              <?= $data['combinedBudgetCode'] ?? ''; ?> - <?= $data['combinedBudgetName'] ?? ''; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['purchaseOrderDate'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['supplierCode'] ?? ''; ?> - <?= $data['supplierName'] ?? ''; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= number_format($data['purchaseOrderTotalIDR'] ?? 0, 2); ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= number_format($data['purchaseOrderTotalOtherCurrency'] ?? 0, 2); ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= number_format($data['purchaseOrderTotalEquivalentIDR'] ?? 0, 2); ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['purchaseOrderStatus'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['accountPayableNumber'] ?? '-'; ?>
            </div>
          </td>
          <td>
            <div style="margin-top: 4px; font-size: 12px;">
              <?= $data['accountPayableDate'] ?? '-'; ?>
            </div>
          </td>
        </tr>
      <?php } ?>

      <tr style="border-top: 1px solid black;">
        
      </tr>
    </table>
  </div>
</body>

</html>