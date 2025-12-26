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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Purchase Order Summary</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
        <!-- BUDGET -->
        <td style="width: 300px;">
          <table>
            <tr>
              <td style="width: 75px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Budget
                </div>
              </td>
              <td style="font-size: 12px; width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $budgetName; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
        <!-- SUPPLIER -->
        <td style="width: 300px;">
          <table>
            <tr>
              <td style="width: 50px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Supplier
                </div>
              </td>
              <td style="font-size: 12px; width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $supplierName ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <!-- SUB BUDGET -->
        <td style="width: 300px;">
          <table>
            <tr>
              <td style="width: 75px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Sub Budget
                </div>
              </td>
              <td style="font-size: 12px; width: 5px;">
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
        <!-- DATE -->
        <td style="width: 300px;">
          <table>
            <tr>
              <td style="width: 50px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Date
                </div>
              </td>
              <td style="font-size: 12px; width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $poDate ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <!-- DETAIL -->
    <table style="margin-left: 1px; width: 100%;" id="TableReportPurchaseOrderSummary">
      <thead>
        <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
          <td rowspan="2" style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              No
            </div>
          </td>
          <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              PO Number
            </div>
          </td>
          <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Supplier
            </div>
          </td>
          <td colspan="2" style="border-top: 1px solid black; height: 20px; text-align: center;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              PO
            </div>
          </td>
          <td colspan="2" style="border-top: 1px solid black; height: 20px; text-align: center;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              PO Other Currency
            </div>
          </td>
          <td colspan="2" style="border-top: 1px solid black; height: 20px; text-align: center;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              PO Equivalent IDR
            </div>
          </td>
        </tr>
        <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Value
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              VAT
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Value
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              VAT
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Value
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              VAT
            </div>
          </td>
        </tr>
      </thead>

      <tbody>
        <?php 
          $counter                        = 1;
          $grandTotalValuePO              = 0;
          $grandTotalVATPO                = 0;
          $grandTotalValuePOOtherCurrency = 0;
          $grandTotalVATPOOtherCurrency   = 0;
          $grandTotalValuePOEquivalentIDR = 0;
          $grandTotalVATPOEquivalentIDR   = 0;
        ?>
        <?php foreach ($dataPO as $dataDetail) { ?>
          <?php $grandTotalValuePO              += $dataDetail['total_Idr_WithoutVat'] ?? 0; ?>
          <?php $grandTotalVATPO                += $dataDetail['total_Vat_IDR'] ?? 0; ?>
          <?php $grandTotalValuePOOtherCurrency += $dataDetail['total_Other_Currency_WithoutVat'] ?? 0; ?>
          <?php $grandTotalVATPOOtherCurrency   += $dataDetail['total_Vat_Other_Currency'] ?? 0; ?>
          <?php $grandTotalValuePOEquivalentIDR += $dataDetail['total_Equivalent_Value'] ?? 0; ?>
          <?php $grandTotalVATPOEquivalentIDR   += $dataDetail['total_Equivalent_Vat'] ?? 0; ?>

          <tr>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= $counter++; ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= $dataDetail['documentNumber'] ?? '-'; ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= $dataDetail['supplier_Code'] ?? ''; ?> - <?= $dataDetail['supplier_Name'] ?? ''; ?> 
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= number_format($dataDetail['total_Idr_WithoutVat'] ?? 0, 2); ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= number_format($dataDetail['total_Vat_IDR'] ?? 0, 2); ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= number_format($dataDetail['total_Other_Currency_WithoutVat'] ?? 0, 2); ?>
              </div>
            </td>
            <td>
              <div style="margin-top: 4px; font-size: 12px;">
                <?= number_format($dataDetail['total_Vat_Other_Currency'] ?? 0, 2); ?>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
      
      <div style="height: 16px;"></div>

      <tr style="border-top: 1px solid black;">
        <td colspan="3" style="height: 20px; text-align: left;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">GRAND TOTAL</div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalValuePO, 2); ?></div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalVATPO, 2); ?></div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalValuePOOtherCurrency, 2); ?></div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalVATPOOtherCurrency, 2); ?></div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalValuePOEquivalentIDR, 2); ?></div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= number_format($grandTotalVATPOEquivalentIDR, 2); ?></div>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>