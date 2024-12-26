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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Business Trip Request Detail Report</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER ONE -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
        <!-- BRF NUMBER -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  BRF Number
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataHeader']['number'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- DATE COMMENCE TRAVEL -->
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
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataDetails']['details']['itemList'][0]['entities']['priceCurrencyISOCode'] ?? '-'; ?>
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
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataDetails']['details']['itemList'][0]['entities']['priceCurrencyISOCode'] ?? '-'; ?>
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
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataDetails']['general']['budget']['combinedBudgetCodeList'][0] . " - " . $dataReport['dataDetails']['general']['budget']['combinedBudgetNameList'][0]; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- DATE END TRAVEL -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Tanggal Akhir Perjalanan
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['requesterWorkerFullName'] ?? '-'; ?>
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
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['beneficiaryWorkerFullName'] ?? '-'; ?>
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
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataDetails']['general']['budget']['combinedBudgetSectionCodeList'][0] . " - " . $dataReport['dataDetails']['general']['budget']['combinedBudgetSectionNameList'][0]; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- DATE BRF -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Tanggal Akhir Perjalanan
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['requesterWorkerFullName'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- DEPARTING FROM -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Departing From
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['beneficiaryWorkerFullName'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <!-- PRODUCT -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Product
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataHeader']['date'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- CONTACT PHONE -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Contact Phone
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  (<?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAcronym']; ?>) <?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountNumber']; ?> - <?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountName']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- DESTINATION TO -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Destination To
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataDetails']['general']['involvedPersons'][0]['beneficiaryWorkerFullName'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <!-- UNKNOWN -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;"></div>
              </td>
              <td style="width: 5px;"></td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;"></div>
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
                <div style="font-size: 12px; line-height: 14px;">
                  (<?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAcronym']; ?>) <?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountNumber']; ?> - <?= $dataReport['dataDetails']['general']['bankAccount']['beneficiary']['bankAccountName']; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- UNKNOWN -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;"></div>
              </td>
              <td style="width: 5px;"></td>
              <td style="height: 20px;"></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <hr />

    <!-- HEADER TWO -->
    <table style="margin: 30px 0px 15px 1px; margin-top: 1rem;">
      <tr>
        <!-- TOTAL TRANSPORT -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Total Transport
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataHeader']['number'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- TOTAL ACCOMMODATION -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Total Accommodation
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataDetails']['details']['itemList'][0]['entities']['priceCurrencyISOCode'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- TOTAL BUSINESS TRIP -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Total Business Trip
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataDetails']['details']['itemList'][0]['entities']['priceCurrencyISOCode'] ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <!-- HEADER THREE -->
    <table style="margin: 30px 0px 15px 1px; margin-top: 1rem; width: 100%;">
      <tr>
        <td style="width:350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Reason to Travel
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <table>
            <tr>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>