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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Loan Summary</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
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
                  -
                </div>
              </td>
            </tr>
            <tr>
              <td style="width: 100px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Date
                </div>
              </td>
              <td style="width: 5px;font-size: 12px; ">
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

        <td style="width: 350px;">
          <table>
            <tr>
              <td style="width: 100px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Creditor
                </div>
              </td>
              <td style="width: 5px; font-size: 12px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  -
                </div>
              </td>
            </tr>
            <tr>
              <td style="width: 100px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Debitor
                </div>
              </td>
              <td style="width: 5px;font-size: 12px; ">
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
    <table style="margin-left: 1px; width: 100%;" id="TableReportLoanSummary">
      <thead>
        <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
          <td rowspan="2" style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              No
            </div>
          </td>
          <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Loan Number
            </div>
          </td>
          <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Date
            </div>
          </td>
          <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Type
            </div>
          </td>
          <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Creditor
            </div>
          </td>
          <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Debitor
            </div>
          </td>
          <td colspan="3" style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px; text-align: center;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Principal Loan
            </div>
          </td>
          <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Rate (%)
            </div>
          </td>
          <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Term
            </div>
          </td>
          <td colspan="3" style="border-top: 1px solid black; border-bottom: 1px solid black; height: 20px; text-align: center;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Total Loan
            </div>
          </td>
          <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Remark
            </div>
          </td>
        </tr>
        <tr style="border-bottom: 1px dotted black;">
          <td style="border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Total IDR
            </div>
          </td>
          <td style="border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Total Other Currency
            </div>
          </td>
          <td style="border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Total Equivalent IDR
            </div>
          </td>
          <td style="border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Total IDR
            </div>
          </td>
          <td style="border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Total Other Currency
            </div>
          </td>
          <td style="border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Total Equivalent IDR
            </div>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
          $no = 1;
        ?>
        @foreach($dataLoan as $loan)
        <tr>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px; text-align: center;">
              <?= $no; ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= $loan['loanNumber']; ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= $loan['date']; ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= $loan['type']; ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= $loan['creditorName'] ?? '-'; ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= $loan['debitorName'] ?? '-'; ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= number_format($loan['principleLoan_IDR'] ?? 0, 2, '.', ','); ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= number_format($loan['principleLoan_Other_Currency'] ?? 0, 2, '.', ','); ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= number_format($loan['principleLoan_Equivalent_IDR'] ?? 0, 2, '.', ','); ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= $loan['rate']; ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= $loan['term']; ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= number_format($loan['totalLoan_IDR'] ?? 0, 2, '.', ','); ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= number_format($loan['totalLoan_Other_Currency'] ?? 0, 2, '.', ','); ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= number_format($loan['totalLoan_Equivalent_IDR'] ?? 0, 2, '.', ','); ?>
            </div>
          </td>
          <td style="height: 20px;">
            <div style="font-size: 12px; margin: 4px 0px 16px 0px;">
              <?= $loan['notes']; ?>
            </div>
          </td>
        </tr>
        <?php
          $no++;
        ?>
        @endforeach
      </tbody>
    </table>
  </div>
</body>

</html>