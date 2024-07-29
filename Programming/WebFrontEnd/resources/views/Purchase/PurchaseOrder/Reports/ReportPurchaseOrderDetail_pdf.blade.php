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
        <div style="text-align: center; font-size: 20px; font-weight: bold;">Purchase Order Detail Report</div>
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
                                    <?= $dataReport['dataHeader']['budget']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- VENDOR -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Vendor
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['vendor']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- PO NUMBER -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    PO Number
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['poNumber']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- INVOICE TO -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Invoice To
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['invoice']; ?>
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
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Date
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['date']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

                <!-- CURRENCY -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Currency
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['currency']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- PAYMENT TERM -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Payment Term
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['paymentTerm']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                
                <!-- PIC -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    PIC Sourching
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['PIC']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <!-- REVISION -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Revision
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['revision']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                
                <!-- REMARK -->
                <td style=" width: 350px;">
                    <table>
                        <tr>
                            <td style="width: 90px; height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; line-height: 14px;">
                                    Remark
                                </div>
                            </td>
                            <td style="width: 5px;">
                                :
                            </td>
                            <td style="height: 20px;">
                                <div style="line-height: 14px;">
                                    <?= $dataReport['dataHeader']['remark']; ?>
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
                        No
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Transaction Number
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Qty
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Price
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        UOM
                    </div>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 8px 0px;">
                                    Total IDR
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    With PPN
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Without PPN
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
                                    Total Other Currency
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    With PPN
                                </div>
                            </td>
                            <td>
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 8px 16px 8px;">
                                    Without PPN
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="border-top: 1px solid black; border-bottom: 1px dotted black; height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                        Currency
                    </div>
                </td>
            </tr>
            
            <?php foreach ($dataReport['dataDetail'] as $dataDetail) { ?>
                <tr>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['no']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['transactionNumber']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['qty']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['price']; ?>
                        </div>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['uom']; ?>
                        </div>
                    </td>
                    <td>
                        <table style="width: 100%;">
                            <tr>
                                <td>
                                    <div style="margin-top: 4px;">
                                        <?= $dataDetail['totalIDRWithPPN']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="margin-top: 4px;">
                                        <?= $dataDetail['totalIDRWithoutPPN']; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <table style="width: 100%;">
                            <tr>
                                <td>
                                    <div style="margin-top: 4px;">
                                        <?= $dataDetail['totalOtherCurrencyWithPPN']; ?>
                                    </div>
                                </td>
                                <td>
                                    <div style="margin-top: 4px;">
                                        <?= $dataDetail['totalOtherCurrencyWithPPN']; ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <div style="margin-top: 4px;">
                            <?= $dataDetail['currency']; ?>
                        </div>
                    </td>
                </tr>
            <?php } ?>

            <div style="height: 16px;"></div>

            <tr style="border-top: 1px solid black;">
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">Total</div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= $dataReport['totalQty']; ?></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"><?= $dataReport['totalPrice']; ?></div>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"></div>
                </td>
                <td style="height: 20px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                                    <?= $dataReport['totalIDRWithPPN']; ?>
                                </div>
                            </td>
                            <td style="height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                                    <?= $dataReport['totalIDRWithoutPPN']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="height: 20px;">
                    <table style="width: 100%;">
                        <tr>
                            <td style="height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                                    <?= $dataReport['totalOtherCurrencyWithPPN']; ?>
                                </div>
                            </td>
                            <td style="height: 20px;">
                                <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;">
                                    <?= $dataReport['totalOtherCurrencyWithoutPPN']; ?>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="height: 20px;">
                    <div style="font-size: 12px; font-weight: bold; margin: 4px 0px 16px 0px;"></div>
                </td>
            </tr>
        </table>
        <!-- DISINI -->
    </div>
</body>

</html>