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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Advance Summary Detail Report</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
        <!-- ADVANCE NUMBER -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Advance Number
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="line-height: 14px;">
                  <?= $dataReport['dataHeader']['number']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- CURRENCY -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Currency
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="line-height: 14px;">
                  <?= $dataReport['dataDetail'][0]['entities']['priceCurrencyISOCode']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>

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
                <div style="line-height: 14px;">
                  <?= $dataReport['dataContent']['budget']['combinedBudgetCodeList'][0]; ?> - <?= $dataReport['dataContent']['budget']['combinedBudgetNameList'][0]; ?>
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
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Requester
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="line-height: 14px;">
                  <?= $dataReport['dataContent']['involvedPersons'][0]['requesterWorkerName']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <!-- SUB BUDGET -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Sub Budget
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="line-height: 14px;">
                  <?= $dataReport['dataContent']['budget']['combinedBudgetSectionCodeList'][0]; ?> - <?= $dataReport['dataContent']['budget']['combinedBudgetSectionNameList'][0]; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- BENEFICIARY -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Beneficiary
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="line-height: 14px;">
                  <?= $dataReport['dataContent']['involvedPersons'][0]['requesterWorkerName']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <!-- DATE -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Date
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="line-height: 14px;">
                  <?= date("d-m-Y", strtotime($dataReport['dataHeader']['date'])); ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- BANK -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Bank Account
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="line-height: 14px;">
                  <?= $dataReport["dataContent"]['bankAccount']['beneficiary']['bankAcronym']; ?> - <?= $dataReport["dataContent"]['bankAccount']['beneficiary']['bankAccountName']; ?> - <?= $dataReport["dataContent"]['bankAccount']['beneficiary']['bankAccountNumber']; ?>
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
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            No
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Product ID
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Description & Spesification
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Quantity
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Unit Price
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Total Advance
          </div>
        </td>
      </tr>

      @php $no = 1; $total = 0; @endphp
      @foreach($dataReport['dataDetail'] as $dataDetails)
      @php $total += $dataDetails['entities']['priceBaseCurrencyValue'] @endphp
      <tr>
        <td>
          <div style="margin-top: 4px;">
            {{ $no++ }}
          </div>
        </td>
        <td>
          <div style="margin-top: 4px;">
            {{ $dataDetails['entities']['product_RefID'] }}
          </div>
        </td>
        <td>
          <div style="margin-top: 4px;">
            {{ $dataDetails['entities']['productName'] }}
          </div>
        </td>
        <td>
          <div style="margin-top: 4px;">
            {{ number_format($dataDetails['entities']['quantity'],2) }}
          </div>
        </td>
        <td>
          <div style="margin-top: 4px;">
            {{ number_format($dataDetails['entities']['productUnitPriceBaseCurrencyValue'],2) }}
          </div>
        </td>
        <td>
          <div style="margin-top: 4px;">
            {{ number_format($dataDetails['entities']['priceBaseCurrencyValue'],2) }}
          </div>
        </td>
      </tr>
      @endforeach

      <div style="height: 16px;"></div>

      <tr style="border-top: 1px solid black;">
        <td style="height: 20px; text-align: left;" colspan="5">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">GRAND TOTAL ADVANCE</div>
        </td>
        <td style="height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">{{ number_format($total,2) }}</div>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>