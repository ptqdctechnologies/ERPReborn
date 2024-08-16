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
        <div style="text-align: center; font-size: 20px; font-weight: bold;">CFS (CRM Field Service) Report</div>
        <div style="text-align: right; font-size: 14px;"><?= date('h:i A'); ?></div>

        <!-- HEADER -->
        <table style="margin: 30px 0px 15px 1px;">
            <tr>
                <!-- BUDGET -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Budget
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['budgetName']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <!-- DISINI -->
        <table class="TableReportAdvanceSummary" style="margin-left: 1px; width: 100%; margin-top: 30px;" id="TableReportAdvanceSummary">
            <tr style="border-top: 1px solid black; border-bottom: 1px dotted black;">
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Site/Code
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Name
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <table>
                        <tr>
                            <td colspan="3" style="text-align: center;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 8px 0px;">
                                    Customer Order
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Origin CO
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Variations
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Revised CO
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 8px 0px;">
                                    Progress
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    % Complete
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Amount
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 8px 0px;">
                                    Billing
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Invoiced
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Received
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <table>
                        <tr>
                            <td colspan="7" style="text-align: center;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 8px 0px;">
                                    Budget
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Product Id
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Qty
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Cost
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    UOM
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Origin Budget
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Variations
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Revised Budget
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 8px 0px;">
                                    Cost
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Committed Cost
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Previous Month Cost to Date
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Movement this Month Cost
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Current Cost
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Paid Cost
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 8px 0px;">
                                    Forecast
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Forecast Final Cost
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Current Margin
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 8px 0px;">
                                    Final Margin
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Final Margin
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Final %
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                <tr>
                    <th colspan="25"><?= $dataDetail['title']; ?></th>
                </tr>

                <?php foreach ($dataDetail['data'] as $data) { ?>
                    <tr>
                        <td><?= $data['site']; ?></td>
                        <td><?= $data['name']; ?></td>
                        <td><?= $data['originCO']; ?></td>
                        <td><?= $data['variationsCO']; ?></td>
                        <td><?= $data['revisedCO']; ?></td>
                        <td><?= $data['completeProgress']; ?></td>
                        <td><?= $data['amountProgress']; ?></td>
                        <td><?= $data['invoicedBilling']; ?></td>
                        <td><?= $data['receivedBilling']; ?></td>
                        <td><?= $data['productIdBudget']; ?></td>
                        <td><?= $data['qtyBudget']; ?></td>
                        <td><?= $data['costBudget']; ?></td>
                        <td><?= $data['uomBudget']; ?></td>
                        <td><?= $data['originBudget']; ?></td>
                        <td><?= $data['variationsBudget']; ?></td>
                        <td><?= $data['revisedBudget']; ?></td>
                        <td><?= $data['committedCost']; ?></td>
                        <td><?= $data['previousCost']; ?></td>
                        <td><?= $data['movementCost']; ?></td>
                        <td><?= $data['currentCost']; ?></td>
                        <td><?= $data['paidCost']; ?></td>
                        <td><?= $data['finalForecast']; ?></td>
                        <td><?= $data['currentMargin']; ?></td>
                        <td><?= $data['finalMargin']; ?></td>
                        <td><?= $data['final%Margin']; ?></td>
                    </tr>
                <?php } ?>

                <tr>
                    <td></td>
                    <th colspan="25">Total</th>
                </tr>
                <tr>
                    <td colspan="25">&nbsp;</td>
                </tr>
            <?php }; ?>

            <div style="height: 16px;"></div>

            <tr style="border-top: 1px solid black;">
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">Total</div>
                </td>
            </tr>
        </table>
        <!-- DISINI -->
    </div>
</body>

</html>