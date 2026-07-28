<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>ERP Reborn</title>
</head>

<body>
  <div class="card-body table-responsive p-0">
    <div style="text-align: right; font-size: 14px;"><?= date('F j, Y'); ?></div>
    <div style="text-align: center; font-size: 20px; font-weight: bold;">Delivery Order to Material Receive</div>
    <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

    <!-- HEADER -->
    <table style="margin: 30px 0px 15px 1px;">
      <tr>
        <!-- DO NUMBER -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  DO Number
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 14px; line-height: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- BUDGET -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  Budget
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 14px; line-height: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- DELIVERY FROM -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  Delivery From
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 14px; line-height: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <!-- MR NUMBER -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  MR Number
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 14px; line-height: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- DATE -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  Date
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 14px; line-height: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>

        <!-- DELIVERY TO -->
        <td style=" width: 350px;">
          <table>
            <tr>
              <td style="width: 110px; height: 20px;">
                <div style="font-size: 14px; font-weight: bold; line-height: 14px;">
                  Delivery To
                </div>
              </td>
              <td style="width: 5px;">
                :
              </td>
              <td style="height: 20px;">
                <div style="font-size: 14px; line-height: 14px;">
                  -
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>

    <table style="margin-left: 1px; width: 100%;">
      <thead>
        <tr style="border-top: 1px solid black; border-bottom: 1px solid black;">
          <td rowspan="2" style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              No
            </div>
          </td>
          <td colspan="6" style="border-top: 1px solid black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Delivery Order
            </div>
          </td>
          <td colspan="4" style="border-top: 1px solid black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Material Receive
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
              Date
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Budget
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Delivery From
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Delivery To
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Transporter
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
              Delivery From
            </div>
          </td>
          <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
            <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
              Delivery To
            </div>
          </td>
        </tr>
      </thead>
    </table>
  </div>
</body>

</html>