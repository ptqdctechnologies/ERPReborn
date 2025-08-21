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
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Advance Summary Report</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
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
        <td style="width: 20px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            No
          </div>
        </td>
        <td style="width: 130px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Advance Number
          </div>
        </td>
        <td style="width: 150px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Sub Budget
          </div>
        </td>
        <td style="width: 70px; border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Date
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Requester
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Beneficiary
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Total Idr
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Total Other Currency
          </div>
        </td>
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Total Equivalent Idr
          </div>
        </td>
        <!-- <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Currency
          </div>
        </td> -->
        
        <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
            Remark
          </div>
        </td>
      </tr>

      
      <div style="height: 16px;"></div>

      <tr style="border-top: 1px solid black;">
        <td style="height: 20px; text-align: left;" colspan="6">
          <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">GRAND TOTAL</div>
        </td>
        <td style="height: 20px;">
          
        </td>
        <td style="height: 20px; text-align: left;" colspan="6"></td>
      </tr>
    </table>
  </div>
</body>

</html>