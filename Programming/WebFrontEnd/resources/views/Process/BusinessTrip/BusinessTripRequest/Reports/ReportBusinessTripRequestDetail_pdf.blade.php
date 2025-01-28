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
                  <?= $dataReport['dataHeaderOne']['brfNumber']; ?>
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
                  Date Commence Travel
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataHeaderOne']['dateCommence']; ?>
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
                  <?= $dataReport['dataHeaderOne']['requester']; ?>
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
                  <?= $dataReport['dataHeaderOne']['budgetCode']; ?>
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
                  Date End Travel
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataHeaderOne']['dateEnd']; ?>
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
                  <?= $dataReport['dataHeaderOne']['beneficiary']; ?>
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
                  <?= $dataReport['dataHeaderOne']['siteCode']; ?>
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
                  BRF Date
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $dataReport['dataHeaderOne']['dateBRF']; ?>
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
                  <?= $dataReport['dataHeaderOne']['departingFrom']; ?>
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
                  <?= $dataReport['dataHeaderOne']['productID']; ?> (<?= $dataReport['dataHeaderOne']['productName']; ?>)
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
                  <?= $dataReport['dataHeaderOne']['contactPhone']; ?>
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
                  <?= $dataReport['dataHeaderOne']['destinationTo']; ?>
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
                  (<?= $dataReport['dataHeaderOne']['bankType']; ?>) <?= $dataReport['dataHeaderOne']['bankAccountNumber']; ?> - <?= $dataReport['dataHeaderOne']['bankAccountName']; ?>
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

    <!-- HEADER TWO -->
    <table style="margin: 30px 0px 15px 1px; margin-top: 1rem; border: 2px solid rgba(0,0,0,.1); border-radius: 4px;">
      <tr>
        <!-- TOTAL ALLOWANCE -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Total Allowance
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= number_format($dataReport['dataHeaderTwo']['totalAllowance'], 2, '.', ','); ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- TOTAL ENTERTAINMENT -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Total Entertainment
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= number_format($dataReport['dataHeaderTwo']['totalEntertainment'], 2, '.', ','); ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- TOTAL OTHER -->
        <td style=" width: 310px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Total Other
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= number_format($dataReport['dataHeaderTwo']['totalOther'], 2, '.', ','); ?>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
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
                  <?= number_format($dataReport['dataHeaderTwo']['totalTransport'], 2, '.', ','); ?>
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
                  <?= number_format($dataReport['dataHeaderTwo']['totalAccommodation'], 2, '.', ','); ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <td style=" width: 310px;">
          <table>
          </table>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <hr style="color: rgba(0,0,0,.1);" />
        </td>
      </tr>
      <tr>
        <td style=" width: 350px;">
          <table>
          </table>
        </td>

        <td style=" width: 350px;">
          <table>
          </table>
        </td>

        <!-- TOTAL BUSINESS TRIP -->
        <td style=" width: 310px;">
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
                  <?= number_format($dataReport['dataHeaderTwo']['totalBusinessTrip'], 2, '.', ','); ?>
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
                  <?= $dataReport['dataHeaderThree']['reason']; ?>
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