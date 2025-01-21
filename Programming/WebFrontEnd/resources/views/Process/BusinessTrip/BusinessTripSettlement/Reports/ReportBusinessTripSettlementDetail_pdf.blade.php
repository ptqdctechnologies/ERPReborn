<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>ERP Reborn</title>

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">

  <style>
    .dates {
      text-align: right; 
      font-size: 14px;
    }
    .title {
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
    .border_td {
      border-top: 1px solid black;
      border-bottom: 1px dotted black;
      height: 20px;
    }
    .text_td {
      font-size: 12px;
      font-weight: bold;
      margin: 4px 0px 16px 0px;
    }
    .text_footer_td {
      font-size: 12px;
      font-weight: bold;
      margin: 4px 0px 16px 0px;
    }
    .text_table {
      margin-top: 4px;
      font-size: 12px;
    }
    .text_header {
      font-size: 12px;
      font-weight: bold;
      line-height: 14px;
    }
    .text_title_header {
      font-size: 12px; 
      line-height: 14px;
    }
    .header_td {
      width: 110px;
      height: 20px;
    }
  </style>
</head>

<body>
  <div class="card-body table-responsive p-0">
    <div class="dates"><?= date('F j, Y'); ?></div>
    <div class="title">Business Trip Settlement Detail</div>
    <div class="dates"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
        <!-- BRF NUMBER -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td class="header_td">
                <div class="text_header">
                  BRF Number
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="text_title_header">
                  <?= $dataReport['dataHeader']['brfNumber']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- BSF NUMBER -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td class="header_td">
                <div class="text_header">
                  BSF Number
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="text_title_header">
                  <?= $dataReport['bsfNumber']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- CURRENCY -->
        <td style=" width: 320px;">
          <table>
            <tr>
              <td class="header_td">
                <div class="text_header">
                  Currency
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="text_title_header">
                  <?= $dataReport['dataDetails']['details']['itemList'][0]['entities']['priceCurrencyISOCode'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <!-- BRF DATE -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td class="header_td">
                <div class="text_header">
                  BRF Date
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="text_title_header">
                  <?= $dataReport['dataHeader']['brfDate'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- DATE -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td class="header_td">
                <div class="text_header">
                  Date
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="text_title_header">
                  <?= $dataReport['dataHeader']['date'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- REQUESTER -->
        <td style=" width: 320px;">
          <table>
            <tr>
              <td class="header_td">
                <div class="text_header">
                  Requester
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="text_title_header">
                  <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['requesterWorkerFullName'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <!-- BRF TOTAL -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td class="header_td">
                <div class="text_header">
                  BRF Total
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="text_title_header">
                  <?= number_format($dataReport['totalBSF'], 2, '.', ','); ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- BUDGET -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td class="header_td">
                <div class="text_header">
                  Budget
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="text_title_header">
                  <?= $dataReport['budgetCode'] . " - " . $dataReport['budgetName']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- BENEFICIARY -->
        <td style=" width: 320px;">
          <table>
            <tr>
              <td class="header_td">
                <div class="text_header">
                  Beneficiary
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="text_title_header">
                  <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['beneficiaryWorkerName'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <td style=" width: 350px;"></td>

        <!-- SUB BUDGET -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td class="header_td">
                <div class="text_header">
                  Sub Budget
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="text_title_header">
                  <?= $dataReport['siteCode'] . " - " . $dataReport['siteName']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- BANK -->
        <td style=" width: 200px;">
          <table>
            <tr>
              <td class="header_td">
                <div class="text_header">
                  Bank Account
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="text_title_header">
                  (<?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAcronym']; ?>) <?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountNumber']; ?> - <?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountName']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <!-- DETAIL -->
    <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%;" id="TableReportAdvanceSummary">
      <tr>
        <td rowspan="2" class="border_td">
          <div class="text_td">
            No
          </div>
        </td>
        <td rowspan="2" class="border_td">
          <div class="text_td">
            Product ID
          </div>
        </td>
        <td rowspan="2" class="border_td">
          <div class="text_td">
            Description & Spesification
          </div>
        </td>
        <td colspan="4" class="border_td" style="border-bottom: 0px; text-align: center;">
          <div class="text_td">
            Expense Claim
          </div>
        </td>
        <td colspan="4" class="border_td" style="border-bottom: 0px; text-align: center;">
          <div class="text_td">
            Amount Due to Company
          </div>
        </td>
        <td rowspan="2" class="border_td">
          <div class="text_td">
            Total
          </div>
        </td>
      </tr>

      <tr>
        <td style="border-bottom: 1px dotted black;">
          <div class="text_td">
            Travel & Fares
          </div>
        </td>
        <td style="border-bottom: 1px dotted black;">
          <div class="text_td">
            Allowance
          </div>
        </td>
        <td style="border-bottom: 1px dotted black;">
          <div class="text_td">
            Entertainment
          </div>
        </td>
        <td style="border-bottom: 1px dotted black;">
          <div class="text_td">
            Other
          </div>
        </td>
        <td style="border-bottom: 1px dotted black;">
          <div class="text_td">
            Travel & Fares
          </div>
        </td>
        <td style="border-bottom: 1px dotted black;">
          <div class="text_td">
            Allowance
          </div>
        </td>
        <td style="border-bottom: 1px dotted black;">
          <div class="text_td">
            Entertainment
          </div>
        </td>
        <td style="border-bottom: 1px dotted black;">
          <div class="text_td">
            Other
          </div>
        </td>
      </tr>

      <?php $counter = 1; ?>
      <?php foreach ($dataReport['dataDetails']['details']['itemList'] as $dataDetail) { ?>
        <?php $totalRowValue = $dataDetail['entities']['transport'] + $dataDetail['entities']['allowance'] + $dataDetail['entities']['entertainment'] + $dataDetail['entities']['other'] + $dataDetail['entities']['transport_company'] + $dataDetail['entities']['allowance_company'] + $dataDetail['entities']['entertainment_company'] + $dataDetail['entities']['other_company']; ?>
        <tr>
          <td>
            <div class="text_table">
              <?= $counter++; ?>
            </div>
          </td>
          <td>
            <div class="text_table">
              <?= $dataDetail['entities']['product_RefID']; ?>
            </div>
          </td>
          <td>
            <div class="text_table">
              <?= $dataDetail['entities']['productName']; ?>
            </div>
          </td>
          <td>
            <div class="text_table">
              <?= number_format($dataDetail['entities']['transport'], 2, '.', ','); ?>
            </div>
          </td>
          <td>
            <div class="text_table">
              <?= number_format($dataDetail['entities']['allowance'], 2, '.', ','); ?>
            </div>
          </td>
          <td>
            <div class="text_table">
              <?= number_format($dataDetail['entities']['entertainment'], 2, '.', ','); ?>
            </div>
          </td>
          <td>
            <div class="text_table">
              <?= number_format($dataDetail['entities']['other'], 2, '.', ','); ?>
            </div>
          </td>
          <td>
            <div class="text_table">
              <?= number_format($dataDetail['entities']['transport_company'], 2, '.', ','); ?>
            </div>
          </td>
          <td>
            <div class="text_table">
              <?= number_format($dataDetail['entities']['allowance_company'], 2, '.', ','); ?>
            </div>
          </td>
          <td>
            <div class="text_table">
              <?= number_format($dataDetail['entities']['entertainment_company'], 2, '.', ','); ?>
            </div>
          </td>
          <td>
            <div class="text_table">
              <?= number_format($dataDetail['entities']['other_company'], 2, '.', ','); ?>
            </div>
          </td>
          <td>
            <div class="text_table">
              <?= number_format($totalRowValue, 2, '.', ','); ?>
            </div>
          </td>
        </tr>
      <?php } ?>

      <div style="height: 16px;"></div>

      <tr>
        <td style="height: 20px; text-align: left;" colspan="11">
          <div class="text_footer_td">GRAND TOTAL BSF</div>
        </td>
        <td style="height: 20px;">
          <div class="text_footer_td"><?= number_format($dataReport['totalBSF'], 2, '.', ','); ?></div>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>