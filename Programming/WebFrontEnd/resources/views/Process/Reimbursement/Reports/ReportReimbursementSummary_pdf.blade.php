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
    .titles {
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
    .header_width_td {
      width: 110px;
      height: 20px;
    }
    .header_text_td {
      font-size: 12px;
      font-weight: bold;
      line-height: 14px;
    }
    .header_value_td {
      line-height: 14px;
      font-size: 12px;
    }
    .detail_td {
      border-top: 1px solid black;
      border-bottom: 1px dotted black;
      height: 20px;
    }
    .value_text_td {
      font-size: 12px;
      font-weight: bold;
      margin: 4px 0px 16px 0px;
    }
    .value_table {
      margin-top: 4px;
      font-size: 12px;
    }
  </style>
</head>

<body>
  <div class="card-body table-responsive p-0">
    <div class="dates"><?= date('F j, Y'); ?></div>
    <div class="titles">Report Reimbursement Summary</div>
    <div class="dates"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
        <!-- BUDGET -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td class="header_width_td">
                <div class="header_text_td">
                  Budget
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="header_value_td">
                  <?= $dataReport['budgetCode'] . ' - ' . $dataReport['budgetName']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <td style=" width: 350px;">
          <table>
            <tr>
              <td class="header_width_td">
                <div class="header_text_td">
                  Customer/Vendor Code 
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="header_value_td">
                  <?= $dataReport['requesterName'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- REQUESTER -->
        <!-- <td style=" width: 350px;">
          <table>
            <tr>
              <td class="header_width_td">
                <div class="header_text_td">
                  Requester
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="header_value_td">
                  <?= $dataReport['requesterName'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td> -->
      </tr>
      <tr>
        <!-- SUB BUDGET -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td class="header_width_td">
                <div class="header_text_td">
                  Sub Budget
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="header_value_td">
                  <?= $dataReport['siteCode'] . ' - ' .$dataReport['siteName']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- BENEFICIARY -->
        <!-- <td style=" width: 350px;">
          <table>
            <tr>
              <td class="header_width_td">
                <div class="header_text_td">
                  Beneficiary
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div class="header_value_td">
                  <?= $dataReport['beneficiaryName'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td> -->
      </tr>
    </table>

    <!-- DETAIL -->
    <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%;" id="TableReportAdvanceSummary">
      <tr>
        <td class="detail_td">
          <div class="value_text_td">
            No
          </div>
        </td>
        <td class="detail_td">
          <div class="value_text_td">
            Reimbursement Number
          </div>
        </td>
        <td class="detail_td">
          <div class="value_text_td">
            Currency
          </div>
        </td>
        <td class="detail_td">
          <div class="value_text_td">
            Total
          </div>
        </td>
        <td class="detail_td">
          <div class="value_text_td">
            Detail
          </div>
        </td>
        <td class="detail_td">
          <div class="value_text_td">
            Notes
          </div>
        </td>
        <!-- <td class="detail_td">
          <div class="value_text_td">
            Total Expense Claim
          </div>
        </td>
        <td class="detail_td">
          <div class="value_text_td">
            Total Amount Due to Company
          </div>
        </td>
        <td class="detail_td">
          <div class="value_text_td">
            Total BSF
          </div>
        </td>
        <td class="detail_td">
          <div class="value_text_td">
            Currency
          </div>
        </td>
        <td class="detail_td">
          <div class="value_text_td">
            Requester
          </div>
        </td>
        <td class="detail_td">
          <div class="value_text_td">
            Beneficiary
          </div>
        </td>
        <td class="detail_td">
          <div class="value_text_td">
            Remark
          </div>
        </td> -->
      </tr>

      <?php $counter = 1; ?>
      <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
        <tr>
          <td>
            <div class="value_table">
              <?= $counter++; ?>
            </div>
          </td>
          <td>
            <div class="value_table">
              <?= $dataDetail['DocumentNumber']; ?>
            </div>
          </td>
          <td>
            <div class="value_table">
              <?= $dataDetail['CurrencyName']; ?>
            </div>
          </td>
          <td>
            <div class="value_table">
              
            </div>
          </td>
          <td>
            <div class="value_table">
              
            </div>
          </td>
          <td>
            <div class="value_table">
              <?= $dataDetail['remark']; ?>
            </div>
          </td>

          <!-- <td>
            <div class="value_table">
              <?= $dataDetail['CombinedBudgetSectionName']; ?>
            </div>
          </td> -->
          <!-- <td>
            <div class="value_table">
              <?= $dataDetail['DepartingFrom']; ?>
            </div>
          </td>
          <td>
            <div class="value_table">
              <?= $dataDetail['DestinationTo']; ?>
            </div>
          </td>
          <td>
            <div class="value_table">
              <?= date('d-m-Y', strtotime($dataDetail['DocumentDateTimeTZ'])); ?>
            </div>
          </td>
          <td>
            <div class="value_table">
              
            </div>
          </td>
          <td>
            <div class="value_table">
             
            </div>
          </td>
          <td>
            <div class="value_table">
              
            </div>
          </td>
          
          <td>
            <div class="value_table">
              <?= $dataDetail['RequesterWorkerName']; ?>
            </div>
          </td>
          <td>
            <div class="value_table">
              <?= $dataDetail['BeneficiaryWorkerName']; ?>
            </div>
          </td> -->
          
        </tr>
      <?php } ?>

      <div style="height: 16px;"></div>

      <tr style="border-top: 1px solid black;">
        <td style="height: 20px; text-align: left;" colspan="3">
          <div class="value_text_td">GRAND TOTAL</div>
        </td>
        <td style="height: 20px;">
          <div class="value_text_td"></div>
        </td>
        <!-- <td style="height: 20px;">
          <div class="value_text_td"></div>
        </td>
        <td style="height: 20px;">
          <div class="value_text_td"></div>
        </td>
        <td style="height: 20px; text-align: left;" colspan="4"></td> -->
      </tr>
    </table>
  </div>
</body>

</html>