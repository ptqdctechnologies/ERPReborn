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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Material Receive Summary</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
        <!-- MATERIAL RECEIVE TYPE -->
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
                  Received At
                </div>
              </td>
              <td style="width: 5px; font-size: 12px;">
                : 
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $receivedName ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- MATERIAL RECEIVE TYPE -->
        <td style="width: 350px;">
          <table>
            <tr>
              <td style="width: 100px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Delivery From
                </div>
              </td>
              <td style="width: 5px; font-size: 12px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $deliveryFromName ?? '-'; ?>
                </div>
              </td>
            </tr>
            <tr>
              <td style="width: 100px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  Delivery To
                </div>
              </td>
              <td style="width: 5px;font-size: 12px; ">
                : 
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  <?= $deliveryToName ?? '-'; ?>
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- DATE -->
        <td style="width: 350px;">
          <table>
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
                  <?= $mrDate ?? '-'; ?>
                </div>
              </td>
            </tr>
            <tr>
              <td style="width: 100px; height: 20px;">
                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                  
                </div>
              </td>
              <td style="width: 5px;font-size: 12px; ">
                
              </td>
              <td style="height: 20px;">
                <div style="font-size: 12px; line-height: 14px;">
                  
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <!-- TABLE CONTENT -->
    <table style="width: 100%; border-collapse: collapse;" border="1">
      <thead>
        <tr>
          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;font-size:12px;width: 10px;">No</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;font-size:12px;">MR Number</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;font-size:12px;">Date</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;font-size:12px;">Budget</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;font-size:12px;">Reference Number</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;font-size:12px;">Delivery From</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;font-size:12px;">Delivery To</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;font-size:12px;">Receive At</th>
          <th style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;background-color:#4B586A;color:white;font-size:12px;">Remark</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($dataMR as $mr) {
        ?>
          <tr>
            <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;font-size:12px;"><?= $no++; ?></td>
            <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;font-size:12px;"><?= $mr['MR_Number'] ?? '-'; ?></td>
            <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;font-size:12px;"><?= date('Y-m-d', strtotime($mr['date'])); ?></td>
            <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;font-size:12px;"><?= $mr['combinedBudgetName'] ?? '-'; ?></td>
            <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;font-size:12px;"><?= $mr['referenceNumber'] ?? '-'; ?></td>
            <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;font-size:12px;"><?= $mr['deliveryFrom_NonRefID']['address'] ?? '-'; ?></td>
            <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;font-size:12px;"><?= $mr['deliveryTo_NonRefID']['address'] ?? '-'; ?></td>
            <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;font-size:12px;"><?= $mr['receiveAt'] ?? '-'; ?></td>
            <td style="padding-top: 10px;padding-bottom: 10px;border:1px solid #e9ecef;text-align: center;font-size:12px;"><?= $mr['remarks'] ?? '-'; ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
